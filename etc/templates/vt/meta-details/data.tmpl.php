<?php
    /** @var MetaDetail $object */

    $prefix = "metaDetail";

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
        <div data-row="url" class="row">
            <label>{lang:vt.metaDetail.url}</label>
            <?= FormHelper::FormInput( $prefix . '[url]', $object->url, 'url', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="objectId" class="row">
            <label>{lang:vt.metaDetail.objectId}</label>
            <?= FormHelper::FormInput( $prefix . '[objectId]', $object->objectId, 'objectId', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="objectClass" class="row">
            <label>{lang:vt.metaDetail.objectClass}</label>
            <?= FormHelper::FormInput( $prefix . '[objectClass]', $object->objectClass, 'objectClass', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="pageTitle" class="row">
            <label>{lang:vt.metaDetail.pageTitle}</label>
            <?= FormHelper::FormInput( $prefix . '[pageTitle]', $object->pageTitle, 'pageTitle', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="metaKeywords" class="row">
            <label>{lang:vt.metaDetail.metaKeywords}</label>
            <?= FormHelper::FormTextArea( $prefix . '[metaKeywords]', $object->metaKeywords, 'metaKeywords', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="metaDescription" class="row">
            <label>{lang:vt.metaDetail.metaDescription}</label>
            <?= FormHelper::FormTextArea( $prefix . '[metaDescription]', $object->metaDescription, 'metaDescription', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="alt" class="row">
            <label>{lang:vt.metaDetail.alt}</label>
            <?= FormHelper::FormInput( $prefix . '[alt]', $object->alt, 'alt', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="canonicalUrl" class="row">
            <label>{lang:vt.metaDetail.canonicalUrl}</label>
            <?= FormHelper::FormInput( $prefix . '[canonicalUrl]', $object->canonicalUrl, 'canonicalUrl', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.metaDetail.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
 