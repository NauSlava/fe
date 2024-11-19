<?php
    /** @var FormResult $object */

    $prefix = "formResult";

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
            <label>{lang:vt.formResult.formId}</label>
            {$object.form.title}
        </div>
        <div data-row="comments" class="row">
            <label>{lang:vt.formResult.comments}</label>
            <?= FormHelper::FormTextArea( $prefix . '[comments]', $object->comments, 'comments', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.formResult.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$FormResults, null, null, $object->statusId, null, null, false ); ?>
        </div>
        <h2 class="legend">Данные формы</h2>
        <? foreach( $object->form->formFields as $field ) { ?>
        <div data-row="ff-{$field->formFieldId}" class="row inline">
            <label>{$field.title}</label>
            <?= str_replace( '<br/>', '', FormFieldHelper::Render( $prefix . '[answers]', null, $field, ArrayHelper::GetValue( $object->answers, $field->formFieldId ) ) ); ?>
        </div>
        <? } ?>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
 