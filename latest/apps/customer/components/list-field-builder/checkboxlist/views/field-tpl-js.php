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
 * @since 1.4.4
 */

?>

<div id="field-checkboxlist-javascript-template" style="display: none;">
    <div class="field-row" data-start-index="{index}" data-field-type="<?php echo $fieldType->identifier; ?>">
        <?php echo CHtml::hiddenField($model->getModelName() . '[' . $fieldType->identifier . '][{index}][field_id]', (int)$model->field_id); ?>
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;"><span class="glyphicon glyphicon-th-list"></span> <?php echo t('list_fields', 'New checkboxlist field'); ?></a>
            </li>
        </ul>
        <div class="panel panel-default no-top-border">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'label'); ?>
                            <?php echo CHtml::textField($model->getModelName() . '[' . $fieldType->identifier . '][{index}][label]', $model->label, $model->getHtmlOptions('label')); ?>
                            <?php echo CHtml::error($model, 'label'); ?>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'tag'); ?>
                            <?php echo CHtml::textField($model->getModelName() . '[' . $fieldType->identifier . '][{index}][tag]', $model->tag, $model->getHtmlOptions('tag')); ?>
                            <?php echo CHtml::error($model, 'tag'); ?>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'required'); ?>
                            <?php echo CHtml::dropDownList($model->getModelName() . '[' . $fieldType->identifier . '][{index}][required]', $model->required, $model->getRequiredOptionsArray(), $model->getHtmlOptions('required')); ?>
                            <?php echo CHtml::error($model, 'required'); ?>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'visibility'); ?>
                            <?php echo CHtml::dropDownList($model->getModelName() . '[' . $fieldType->identifier . '][{index}][visibility]', $model->visibility, $model->getVisibilityOptionsArray(), $model->getHtmlOptions('visibility')); ?>
                            <?php echo CHtml::error($model, 'visibility'); ?>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'sort_order'); ?>
                            <?php echo CHtml::dropDownList($model->getModelName() . '[' . $fieldType->identifier . '][{index}][sort_order]', $model->sort_order, $model->getSortOrderOptionsArray(), $model->getHtmlOptions('sort_order', ['data-placement' => 'left'])); ?>
                            <?php echo CHtml::error($model, 'sort_order'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'help_text'); ?>
                            <?php echo CHtml::textField($model->getModelName() . '[' . $fieldType->identifier . '][{index}][help_text]', $model->help_text, $model->getHtmlOptions('help_text')); ?>
                            <?php echo CHtml::error($model, 'help_text'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'default_value'); ?>
                            <?php echo CHtml::textField($model->getModelName() . '[' . $fieldType->identifier . '][{index}][default_value]', $model->default_value, $model->getHtmlOptions('default_value')); ?>
                            <?php echo CHtml::error($model, 'default_value'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'description'); ?>
                            <?php echo CHtml::textArea($model->getModelName() . '[' . $fieldType->identifier . '][{index}][description]', $model->description, $model->getHtmlOptions('description')); ?>
                            <?php echo CHtml::error($model, 'description'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'import_values_strategy'); ?>
                            <?php echo CHtml::dropDownList($model->getModelName() . '[' . $fieldType->identifier . '][{index}][import_values_strategy]', $model->import_values_strategy, $model->getImportValuesStrategiesList(), $model->getHtmlOptions('import_values_strategy')); ?>
                            <?php echo CHtml::error($model, 'import_values_strategy'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <?php echo CHtml::activeLabelEx($model, 'multi_values_separator'); ?>
                            <?php echo CHtml::dropDownList($model->getModelName() . '[' . $fieldType->identifier . '][{index}][multi_values_separator]', $model->multi_values_separator, $model->getMultiValuesSeparatorsList(), $model->getHtmlOptions('multi_values_separator')); ?>
                            <?php echo CHtml::error($model, 'multi_values_separator'); ?>
                        </div>
                    </div>
                </div>
                <hr />
                <h4><?php echo t('list_fields', 'Options'); ?> <a href="javascript:;" class="btn btn-flat btn-primary pull-right btn-checkboxlist-add-option"><?php echo IconHelper::make('create'); ?></a></h4>
                <hr />
                <div class="row">
                    <div class="checkboxlist-options-list">

                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="pull-right">
                    <a href="javascript:;" class="btn btn-danger btn-flat btn-remove-checkboxlist-field" data-field-id="0" data-message="<?php echo t('list_fields', 'Are you sure you want to remove this field? There is no coming back from this after you save the changes.'); ?>"><?php echo IconHelper::make('delete'); ?></a>
                </div>
                <div class="clearfix"><!-- --></div>
            </div>
        </div>
    </div>
</div>

<div id="field-checkboxlist-option-javascript-template" style="display: none;">
    <div class="col-lg-6 checkboxlist-option-row" data-start-index="{optionIndex}" data-parent-index="{parentIndex}">
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <?php echo CHtml::activeLabelEx($option, 'name'); ?>
                    <?php echo CHtml::textField($option->getModelName() . '[' . $fieldType->identifier . '][{parentIndex}][{optionIndex}][name]', null, $option->getHtmlOptions('name')); ?>
                    <?php echo CHtml::error($option, 'name'); ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <?php echo CHtml::activeLabelEx($option, 'value'); ?>
                    <?php echo CHtml::textField($option->getModelName() . '[' . $fieldType->identifier . '][{parentIndex}][{optionIndex}][value]', null, $option->getHtmlOptions('value')); ?>
                    <?php echo CHtml::error($option, 'value'); ?>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="pull-left" style="margin-top: 25px;">
                    <a href="javascript:;" class="btn btn-danger btn-flat btn-remove-checkboxlist-option-field" data-option-id="0" data-message="<?php echo t('list_fields', 'Are you sure you want to remove this option? There is no coming back from this after you save the changes.'); ?>"><?php echo IconHelper::make('delete'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
