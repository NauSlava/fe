<?php
    JsHelper::PushFile( 'js://vt/form-fields.js' );

    /** @var FormField $object */

    $prefix = "formField";

    if ( empty( $errors ) ) $errors = array();
	if ( empty( $jsonErrors ) ) $jsonErrors = '{}';

    if ( !empty($errors["fatal"] ) ) {
		?><h3 class="error"><?= LocaleLoader::Translate( 'errors.fatal.' . $errors["fatal"] ); ?></h3><?
	}
?>
<div class="tabs">
	<?= FormHelper::FormHidden( 'selectedTab', !empty( $selectedTab ) ? $selectedTab : 0, 'selectedTab' ); ?>
    <ul class="tabs-list">
        <li><a href="#page-0">{lang:vt.common.commonInfo}</a></li>
    </ul>

    <div id="page-0" class="tab-page rows">
        <div data-row="formId" class="row required">
            <label>{lang:vt.formField.formId}</label>
            <?= FormHelper::FormSelect( $prefix . '[formId]', $forms, "formId", "title", $object->formId, null, null, true ); ?>
        </div>
        <div data-row="title" class="row required">
            <label>{lang:vt.formField.title}</label>
            <?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="isRequired" class="row">
            <label>{lang:vt.formField.isRequired}</label>
            <?= FormHelper::FormCheckBox( $prefix . '[isRequired]', null, 'isRequired', null, $object->isRequired ); ?>
        </div>
        <div data-row="errorMessage" class="row">
            <label>{lang:vt.formField.errorMessage}</label>
            <?= FormHelper::FormInput( $prefix . '[errorMessage]', $object->errorMessage, 'errorMessage', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="hint" class="row">
            <label>{lang:vt.formField.hint}</label>
            <?= VtHelper::GetHint( 'vt.hints.formField.hint' ); ?>
            <?= FormHelper::FormInput( $prefix . '[hint]', $object->hint, 'hint', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="fieldType" class="row required">
            <label>{lang:vt.formField.fieldType}</label>
            <?= VtHelper::GetHint( 'vt.hints.formField.fieldType' ); ?>
            <?= FormHelper::FormSelect( $prefix . '[fieldType]', FormFieldUtility::$Types, null, null, $object->fieldType, 'fieldType', null, true, 'FormFieldUtility::TranslateType' ); ?>
        </div>
        <div data-row="fieldValues" class="row">
            <label>{lang:vt.formField.fieldValues}</label>
            <?= VtHelper::GetHint( 'vt.hints.formField.fieldValues' ); ?>
            <?= FormHelper::FormTextArea( $prefix . '[fieldValues]', $object->fieldValues, 'fieldValues', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="fieldFormat" class="row required">
            <label>{lang:vt.formField.fieldFormat}</label>
            <?= VtHelper::GetHint( 'vt.hints.formField.fieldFormat' ); ?>
            <?= FormHelper::FormSelect( $prefix . '[fieldFormat]', FormFieldUtility::$Formats, null, null, $object->fieldFormat, null, null, true, 'FormFieldUtility::TranslateFormat' ); ?>
        </div>
        <div data-row="orderNumber" class="row required">
            <label>{lang:vt.formField.orderNumber}</label>
            <?= FormHelper::FormInput( $prefix . '[orderNumber]', $object->orderNumber, 'orderNumber', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.formField.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
 