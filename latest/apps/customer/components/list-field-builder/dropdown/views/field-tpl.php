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
 * @since 1.3.4.3
 */

?>

<div class="field-row" data-start-index="<?php echo (int)$index; ?>" data-field-type="<?php echo html_encode((string)$model->type->identifier); ?>">
    <?php echo CHtml::hiddenField($model->getModelName() . '[' . html_encode((string)$fieldType->identifier) . '][' . (int) $index . '][field_id]', (int)$model->field_id); ?>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="javascript:;"><span class="glyphicon glyphicon-th-list"></span> <?php echo t('list_fields', 'Dropdown field'); ?></a>
        </li>
    </ul>
    <div class="panel panel-default no-top-border">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($model, 'label'); ?>
                        <?php echo CHtml::textField($model->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][label]', $model->label, $model->getHtmlOptions('label')); ?>
                        <?php echo CHtml::error($model, 'label'); ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($model, 'tag'); ?>
                        <?php echo CHtml::textField($model->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][tag]', $model->tag, $model->getHtmlOptions('tag')); ?>
                        <?php echo CHtml::error($model, 'tag'); ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($model, 'required'); ?>
                        <?php echo CHtml::dropDownList($model->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][required]', $model->required, $model->getRequiredOptionsArray(), $model->getHtmlOptions('required')); ?>
                        <?php echo CHtml::error($model, 'required'); ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($model, 'visibility'); ?>
                        <?php echo CHtml::dropDownList($model->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][visibility]', $model->visibility, $model->getVisibilityOptionsArray(), $model->getHtmlOptions('visibility')); ?>
                        <?php echo CHtml::error($model, 'visibility'); ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($model, 'sort_order'); ?>
                        <?php echo CHtml::dropDownList($model->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][sort_order]', $model->sort_order, $model->getSortOrderOptionsArray(), $model->getHtmlOptions('sort_order', ['data-placement' => 'left'])); ?>
                        <?php echo CHtml::error($model, 'sort_order'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($model, 'help_text'); ?>
                        <?php echo CHtml::textField($model->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][help_text]', $model->help_text, $model->getHtmlOptions('help_text')); ?>
                        <?php echo CHtml::error($model, 'help_text'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($model, 'default_value'); ?>
                        <?php echo CHtml::textField($model->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][default_value]', $model->default_value, $model->getHtmlOptions('default_value')); ?>
                        <?php echo CHtml::error($model, 'default_value'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <?php echo CHtml::activeLabelEx($model, 'description'); ?>
                        <?php echo CHtml::textArea($model->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][description]', $model->description, $model->getHtmlOptions('description')); ?>
                        <?php echo CHtml::error($model, 'description'); ?>
                    </div>
                </div>
            </div>
            <hr />
            <h4><?php echo t('list_fields', 'Dropdown options'); ?> <a href="javascript:;" class="btn btn-primary pull-right btn-flat btn-dropdown-add-option"><?php echo IconHelper::make('create'); ?></a></h4>
            <hr />
            <div class="row">
                <div class="dropdown-options-list">
                    <?php if (!empty($model->options)) {
    foreach ($model->options as $optionIndex => $option) { ?>
                        <div class="dropdown-option-row" data-start-index="<?php echo (int)$optionIndex; ?>" data-parent-index="<?php echo (int)$index; ?>">
                            <div class="col-lg-6">
                                <?php echo CHtml::hiddenField($option->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][' . $optionIndex . '][field_id]', (int)$option->field_id); ?>
                                <?php echo CHtml::hiddenField($option->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][' . $optionIndex . '][option_id]', (int)$option->option_id); ?>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <?php echo CHtml::activeLabelEx($option, 'name'); ?>
                                            <?php echo CHtml::textField($option->getModelName() . '[' . html_encode((string)$fieldType->identifier) . '][' . (int)$index . '][' . (int)$optionIndex . '][name]', html_encode((string)$option->name), $option->getHtmlOptions('name')); ?>
                                            <?php echo CHtml::error($option, 'name'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <?php echo CHtml::activeLabelEx($option, 'value'); ?>
                                            <?php echo CHtml::textField($option->getModelName() . '[' . $fieldType->identifier . '][' . $index . '][' . $optionIndex . '][value]', $option->value, $option->getHtmlOptions('value')); ?>
                                            <?php echo CHtml::error($option, 'value'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <div class="pull-left" style="margin-top: 25px;">
                                                <a href="javascript:;" class="btn btn-danger btn-flat btn-remove-dropdown-option-field" data-option-id="<?php echo (int)$option->option_id; ?>" data-message="<?php echo t('list_fields', 'Are you sure you want to remove this option? There is no coming back from this after you save the changes.'); ?>"><?php echo IconHelper::make('delete'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
}?>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="pull-right">
                <a href="javascript:;" class="btn btn-danger btn-flat btn-remove-dropdown-field" data-field-id="<?php echo (int)$model->field_id; ?>" data-message="<?php echo t('list_fields', 'Are you sure you want to remove this field? There is no coming back from this after you save the changes.'); ?>"><?php echo IconHelper::make('delete'); ?></a>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
</div>
