<?php
    /** @var Document $object */

    $prefix = "document";

    if ( empty( $errors ) ) $errors = array();
	if ( empty( $jsonErrors ) ) $jsonErrors = '{}';

    if ( !empty($errors["fatal"] ) ) {
		?><h3 class="error"><?= LocaleLoader::Translate( 'errors.fatal.' . $errors["fatal"] ); ?></h3><?
	}

	JsHelper::PushFile( 'js://vt/translit-alias.js' );
?>
<div class="tabs">
	<?= FormHelper::FormHidden( 'selectedTab', !empty( $selectedTab ) ? $selectedTab : 0, 'selectedTab' ); ?>
    <ul class="tabs-list">
        <li><a href="#page-0">{lang:vt.common.commonInfo}</a></li>
        <li><a href="#page-1">{lang:vt.common.images}</a></li>
        <li><a href="#page-5">{lang:vt.common.seo}</a></li>
    </ul>

    <div id="page-0" class="tab-page rows">
        <div data-row="type" class="row required">
            <label>{lang:vt.document.type}</label>
            <?= FormHelper::FormSelect( $prefix . '[type]', DocumentUtility::$Types, '', '', $object->type, 'type', null, false, 'DocumentUtility::TranslateType' ); ?>
        </div>
        <div data-row="title" class="row required">
            <label>{lang:vt.document.title}</label>
            <?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="alias" class="row required">
            <label>{lang:vt.document.alias}</label>
            <?= FormHelper::FormInput( $prefix . '[alias]', $object->alias, 'alias', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="foreword" class="row">
            <label>{lang:vt.document.foreword}</label>
            <?= FormHelper::FormTextArea( $prefix . '[foreword]', $object->foreword, 'foreword', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="content" class="row">
            <label>{lang:vt.document.content}</label>
            <?= FormHelper::FormEditor( $prefix . '[content]', $object->content, 'content', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="publicationDate" class="row required">
            <label>{lang:vt.document.publicationDate}</label>
            <?= FormHelper::FormDateTime( $prefix . '[publicationDate]', $object->publicationDate, 'd.m.Y G:i' ); ?>
        </div>
        <div data-row="orderNumber" class="row">
            <label>{lang:vt.document.orderNumber}</label>
            <?= FormHelper::FormInput( $prefix . '[orderNumber]', $object->orderNumber, 'orderNumber', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="smallImageId" class="row">
            <label>{lang:vt.document.smallImageId}</label>
            <?= VfsHelper::FormVfsFile( $prefix . '[smallImageId]', 'smallImageId', $object->smallImage, "image" ); ?>
        </div>
        <div data-row="bigImageId" class="row">
            <label>{lang:vt.document.bigImageId}</label>
            <?= VfsHelper::FormVfsFile( $prefix . '[bigImageId]', 'bigImageId', $object->bigImage, "image" ); ?>
        </div>
        <div data-row="pagelink" class="row">
            <label>{lang:vt.document.pagelink}</label>
            <?= FormHelper::FormInput( $prefix . '[pagelink]', $object->pagelink, 'pagelink', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.document.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
	{increal:tmpl://vt/elements/images.tmpl.php}
    {increal:tmpl://vt/elements/meta-details.tmpl.php}
</div>
<script type="text/javascript" src="{web:js://vfs/vfs.selector.js}"></script>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
    var vfsSelector = new VfsSelector( "{web:vt://vfs/}" );
    vfsSelector.Init();
</script>
<?php
	$__useEditor = true;
?>
