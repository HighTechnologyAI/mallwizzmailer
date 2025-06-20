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
 * @since 1.3.3.1
 */

/** @var Controller $controller */
$controller = controller();

/** @var string $pageHeading */
$pageHeading = (string)$controller->getData('pageHeading');

?>
<div class="box box-primary borderless" id="ea-box-wrapper" data-success="<?php echo t('app', 'Your action completed successfully'); ?>" data-error="<?php echo t('app', 'Your action completed with errors'); ?>">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title">
                <span class="fa fa-warning"></span> <?php echo html_encode((string)$pageHeading); ?>
            </h3>
        </div>
        <div class="pull-right"></div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body">
        <div class="callout callout-danger">
            <h4><?php echo t('app', 'Please use with caution!'); ?></h4>
            <p><?php echo t('app', 'Please use below options only if you know what you are doing. The way your application works and behaves depends on these actions.'); ?></p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="box box-primary borderless">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo t('app', 'Campaign status'); ?></h3>
                    </div>
                    <div class="box-body">
                    <span>
                        <?php echo t('app', 'Change the status of stuck campaigns from processing to sending!'); ?><br />
                    </span>
                        <div class="clearfix"><!-- --></div>
                        <br />
                        <span>
                        <div class="pull-right">
                            <a class="btn btn-danger btn-flat reset-campaigns" href="<?php echo createUrl('misc/reset_campaigns'); ?>" data-confirm="<?php echo t('app', 'Are you sure you need to run this action?'); ?>"><?php echo t('app', 'I understand, do it!'); ?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box box-primary borderless">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo t('app', 'Bounce servers'); ?></h3>
                    </div>
                    <div class="box-body">
                    <span>
                        <?php echo t('app', 'Change the status of stuck bounce servers from cron-running to active!'); ?><br />
                    </span>
                        <div class="clearfix"><!-- --></div>
                        <br />
                        <span>
                        <div class="pull-right">
                            <a class="btn btn-danger btn-flat reset-bounce-servers" href="<?php echo createUrl('misc/reset_bounce_servers'); ?>" data-confirm="<?php echo t('app', 'Are you sure you need to run this action?'); ?>"><?php echo t('app', 'I understand, do it!'); ?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box box-primary borderless">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo t('app', 'Feedback loop servers'); ?></h3>
                    </div>
                    <div class="box-body">
                    <span>
                        <?php echo t('app', 'Change the status of stuck feedback loop servers from cron-running to active!'); ?><br />
                    </span>
                        <div class="clearfix"><!-- --></div>
                        <br />
                        <span>
                        <div class="pull-right">
                            <a class="btn btn-danger btn-flat reset-fbl-servers" href="<?php echo createUrl('misc/reset_fbl_servers'); ?>" data-confirm="<?php echo t('app', 'Are you sure you need to run this action?'); ?>"><?php echo t('app', 'I understand, do it!'); ?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="box box-primary borderless">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo t('app', 'Email box monitors'); ?></h3>
                    </div>
                    <div class="box-body">
                    <span>
                        <?php echo t('app', 'Change the status of stuck email box monitors from cron-running to active!'); ?><br />
                    </span>
                        <div class="clearfix"><!-- --></div>
                        <br />
                        <span>
                        <div class="pull-right">
                            <a class="btn btn-danger btn-flat reset-email-box-monitors" href="<?php echo createUrl('misc/reset_email_box_monitors'); ?>" data-confirm="<?php echo t('app', 'Are you sure you need to run this action?'); ?>"><?php echo t('app', 'I understand, do it!'); ?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </span>
                    </div>
                </div>
            </div>
        </div>
                            
        <div class="clearfix"><!-- --></div>
    </div>
</div>