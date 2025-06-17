#!/bin/bash

### === CONFIGURATION === ###
DOMAIN="bloop77.site"  
SELECTOR="default"
KEY_DIR="/etc/opendkim/keys/$DOMAIN"
PRIVATE_KEY="$KEY_DIR/$SELECTOR.private"
PUBLIC_KEY="$KEY_DIR/$SELECTOR.txt"

### === INSTALLATION === ###
apt update && apt install -y opendkim opendkim-tools postfix

mkdir -p $KEY_DIR
opendkim-genkey -s $SELECTOR -d $DOMAIN -D $KEY_DIR
chown -R opendkim:opendkim $KEY_DIR
chmod go-rw $PRIVATE_KEY

# KeyTable
cat > /etc/opendkim/KeyTable <<EOF
$SELECTOR._domainkey.$DOMAIN $DOMAIN:$SELECTOR:$PRIVATE_KEY
EOF

# SigningTable
cat > /etc/opendkim/SigningTable <<EOF
*@${DOMAIN} ${SELECTOR}._domainkey.${DOMAIN}
EOF

# TrustedHosts
cat > /etc/opendkim/TrustedHosts <<EOF
127.0.0.1
localhost
::1
$DOMAIN
EOF

# Main config
cat >> /etc/opendkim.conf <<EOF

Socket inet:12301@localhost
Umask 002
Canonicalization relaxed/simple
Mode sv
SubDomains yes
AutoRestart yes
Syslog yes
OversignHeaders From
KeyTable /etc/opendkim/KeyTable
SigningTable /etc/opendkim/SigningTable
ExternalIgnoreList /etc/opendkim/TrustedHosts
InternalHosts /etc/opendkim/TrustedHosts
EOF

# Connect DKIM with Postfix
postconf -e "milter_default_action = accept"
postconf -e "milter_protocol = 2"
postconf -e "smtpd_milters = inet:localhost:12301"
postconf -e "non_smtpd_milters = inet:localhost:12301"

# Restart services
systemctl restart opendkim
systemctl restart postfix

echo ""
echo "✅ DKIM настроен для домена: $DOMAIN"
echo "📌 Вставь в DNS запись TXT:"
echo ""
echo "_domainkey.${DOMAIN}  IN  TXT  \"v=DKIM1; k=rsa; p=$(grep -v '-----' $PUBLIC_KEY | tr -d '\n')\""
echo ""