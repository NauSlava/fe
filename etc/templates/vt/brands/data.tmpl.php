<?php
    /** @var Brand $object */

    $prefix = "brand";

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
    </ul>

    <div id="page-0" class="tab-page rows">
        <div data-row="title" class="row required">
            <label>{lang:vt.brand.title}</label>
            <?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="alias" class="row required">
            <label>{lang:vt.brand.alias}</label>
            <?= FormHelper::FormInput( $prefix . '[alias]', $object->alias, 'alias', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="foreword" class="row">
            <label>{lang:vt.brand.foreword}</label>
            <?= FormHelper::FormTextArea( $prefix . '[foreword]', $object->foreword, 'foreword', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="content" class="row">
            <label>{lang:vt.brand.content}</label>
            <?= FormHelper::FormEditor( $prefix . '[content]', $object->content, 'content', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="orderNumber" class="row">
            <label>{lang:vt.brand.orderNumber}</label>
            <?= FormHelper::FormInput( $prefix . '[orderNumber]', $object->orderNumber, 'orderNumber', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="smallImageId" class="row">
            <label>{lang:vt.brand.smallImageId}</label>
            <?= VfsHelper::FormVfsFile( $prefix . '[smallImageId]', 'smallImageId', $object->smallImage, "image" ); ?>
        </div>
        <div data-row="bigImageId" class="row">
            <label>{lang:vt.brand.bigImageId}</label>
            <?= VfsHelper::FormVfsFile( $prefix . '[bigImageId]', 'bigImageId', $object->bigImage, "image" ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.brand.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
<script type="text/javascript" src="{web:js://vfs/vfs.selector.js}"></script>
<script type="text/javascript">
    var vfsSelector = new VfsSelector( "{web:vt://vfs/}" );
    vfsSelector.Init();    
</script>
<?php
	$__useEditor = true;
?>
 