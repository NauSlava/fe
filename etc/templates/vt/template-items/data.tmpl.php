<?php
    /** @var TemplateItem $object */

    $prefix = "templateItem";

    if ( empty( $errors ) ) $errors = array();
	if ( empty( $jsonErrors ) ) $jsonErrors = '{}';

    if ( !empty($errors["fatal"] ) ) {
		?><h3 class="error"><?= LocaleLoader::Translate( 'errors.fatal.' . $errors["fatal"] ); ?></h3><?
	}

    JsHelper::PushFile( 'js://vt/template-items.js' );
    $__useEditor = true;
?>
<div class="tabs">
	<?= FormHelper::FormHidden( 'selectedTab', !empty( $selectedTab ) ? $selectedTab : 0, 'selectedTab' ); ?>
    <ul class="tabs-list">
        <li><a href="#page-0">{lang:vt.common.commonInfo}</a></li>
    </ul>

    <div id="page-0" class="tab-page rows">
        <div data-row="group" class="row required">
            <label>{lang:vt.templateItem.group}</label>
            <?= FormHelper::FormSelect( $prefix . '[group]', TemplateItemUtility::$Groups, '', '', $object->group, null, null, true, 'TemplateItemHelper::TranslateGroup' ); ?>
        </div>
        <div data-row="type" class="row required">
            <label>{lang:vt.templateItem.type}</label>
            <?= FormHelper::FormSelect( $prefix . '[type]', TemplateItemUtility::$Types, '', '', $object->type, 'type', null, false, 'TemplateItemHelper::TranslateType' ); ?>
        </div>
        <div data-row="title" class="row required">
            <label>{lang:vt.templateItem.title}</label>
            <?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="alias" class="row required">
            <label>{lang:vt.templateItem.alias}</label>
            <?= FormHelper::FormInput( $prefix . '[alias]', $object->alias, 'alias', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="value" class="row">
            <label>{lang:vt.templateItem.value}</label>
            <?= FormHelper::FormInput( $prefix . '[value]', $object->value, 'value', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.templateItem.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = <?=$jsonErrors?>;
</script>
 