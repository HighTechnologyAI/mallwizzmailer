<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * This file is part of the MailWizz EMA application.
 *
 * @package MailWizz EMA
 * @author MailWizz Development Team <support@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright MailWizz EMA (https://www.mailwizz.com)
 * @license https://www.mailwizz.com/license/
 * @since 1.3.4
 */

/** @var Controller $controller */
$controller = controller();

/** @var CActiveForm $form */
$form = $controller->getData('form');

/** @var CustomerGroupOptionServers $model */
$model = $controller->getData('model');

/** @var DeliveryServer[] $allDeliveryServers */
$allDeliveryServers = $controller->getData('allDeliveryServers');

/** @var DeliveryServerToCustomerGroup $deliveryServerToCustomerGroup */
$deliveryServerToCustomerGroup = $controller->getData('deliveryServerToCustomerGroup');

/** @var array $assignedDeliveryServers */
$assignedDeliveryServers = $controller->getData('assignedDeliveryServers');

?>
<div class="box box-primary borderless">
    <div class="box-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'max_delivery_servers'); ?>
                    <?php echo $form->numberField($model, 'max_delivery_servers', $model->fieldDecorator->getHtmlOptions('max_delivery_servers')); ?>
                    <?php echo $form->error($model, 'max_delivery_servers'); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'max_bounce_servers'); ?>
                    <?php echo $form->numberField($model, 'max_bounce_servers', $model->fieldDecorator->getHtmlOptions('max_bounce_servers')); ?>
                    <?php echo $form->error($model, 'max_bounce_servers'); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'max_fbl_servers'); ?>
                    <?php echo $form->numberField($model, 'max_fbl_servers', $model->fieldDecorator->getHtmlOptions('max_fbl_servers')); ?>
                    <?php echo $form->error($model, 'max_fbl_servers'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
			        <?php echo $form->labelEx($model, 'max_email_box_monitors'); ?>
			        <?php echo $form->numberField($model, 'max_email_box_monitors', $model->fieldDecorator->getHtmlOptions('max_email_box_monitors')); ?>
			        <?php echo $form->error($model, 'max_email_box_monitors'); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'must_add_bounce_server'); ?>
                    <?php echo $form->dropDownList($model, 'must_add_bounce_server', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('must_add_bounce_server')); ?>
                    <?php echo $form->error($model, 'must_add_bounce_server'); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'can_select_delivery_servers_for_campaign'); ?>
                    <?php echo $form->dropDownList($model, 'can_select_delivery_servers_for_campaign', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('can_select_delivery_servers_for_campaign')); ?>
                    <?php echo $form->error($model, 'can_select_delivery_servers_for_campaign'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
			        <?php echo $form->labelEx($model, 'can_send_from_system_servers'); ?>
			        <?php echo $form->dropDownList($model, 'can_send_from_system_servers', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('can_send_from_system_servers')); ?>
			        <?php echo $form->error($model, 'can_send_from_system_servers'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <hr />
                <div class="pull-left">
                    <h5><?php echo t('settings', 'Custom headers'); ?>:</h5>
                </div>
                <?php echo $form->textArea($model, 'custom_headers', $model->fieldDecorator->getHtmlOptions('custom_headers', ['rows' => 5])); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <hr />
                <div class="pull-left">
                    <h5><?php echo t('servers', 'Assigned servers'); ?>:</h5>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="row">
                    <div class="panel-delivery-servers-pool">
                        <?php foreach ($allDeliveryServers as $server) { ?>
                            <div class="col-lg-4">
                                <div class="item">
                                    <?php echo CHtml::checkBox($deliveryServerToCustomerGroup->getModelName() . '[]', in_array($server->server_id, $assignedDeliveryServers), ['value' => $server->server_id]); ?>
                                    <span><?php echo html_encode((string)$server->getDisplayName()); ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <hr />
                <div class="pull-left">
                    <h5><?php echo t('settings', 'Allowed server types'); ?>:</h5>
                </div>
                <div class="clearfix"><!-- --></div>
                <?php echo $form->error($model, 'allowed_server_types'); ?>
                <div class="clearfix"><!-- --></div>

                <div class="row">
                    <?php foreach ($model->getServerTypesList() as $type => $name) { ?>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php echo CHtml::label(t('settings', 'Server type'), '_dummy_'); ?>
                                    <?php echo CHtml::textField('_dummy_', $name, $model->fieldDecorator->getHtmlOptions('allowed_server_types', ['readonly' => true])); ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo CHtml::label(t('settings', 'Allowed'), '_dummy_'); ?>
                                    <?php echo CHtml::dropDownList($model->getModelName() . '[allowed_server_types][' . $type . ']', in_array($type, $model->allowed_server_types) ? 'yes' : 'no', $model->getYesNoOptions(), $model->fieldDecorator->getHtmlOptions('allowed_server_types')); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"><!-- --></div>
</div>