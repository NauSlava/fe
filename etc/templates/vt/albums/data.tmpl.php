<?php
    /** @var Album $object */

    $prefix = "album";

    if ( empty( $errors ) ) $errors = array();
	if ( empty( $jsonErrors ) ) $jsonErrors = '{}';

    if ( !empty($errors["fatal"] ) ) {
		?><h3 class="error"><?= LocaleLoader::Translate( 'errors.fatal.' . $errors["fatal"] ); ?></h3><?
	}

//    JsHelper::PushFile( 'js://vt/translit-alias.js' );
?>
<div class="tabs">
	<?= FormHelper::FormHidden( 'selectedTab', !empty( $selectedTab ) ? $selectedTab : 0, 'selectedTab' ); ?>
    <ul class="tabs-list">
        <li><a href="#page-0">{lang:vt.common.commonInfo}</a></li>
        <li><a href="#page-1">{lang:vt.common.images}</a></li>
    </ul>

	<div id="page-0" class="tab-page rows">
		<div data-row="title" class="row required">
			<label>{lang:vt.album.title}</label>
			<?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
		</div>
		<div data-row="alias" class="row required">
			<label>{lang:vt.album.alias}</label>
			<?= FormHelper::FormInput( $prefix . '[alias]', $object->alias, 'alias', null, array( 'size' => 80 ) ); ?>
	        </div>
	        <div data-row="isRequired" class="row">
	        	<label>Объект</label>
	        	<?= FormHelper::FormCheckBox( $prefix . '[isObject]', null, 'isObject', null, $object->isObject ); ?>
		</div>
	        <div data-row="createdAt" class="row required">
	        	<label>{lang:vt.album.createdAt}</label>
	        	<?= FormHelper::FormDateTime( $prefix . '[createdAt]', $object->createdAt, 'd.m.Y G:i' ); ?>
	        </div>
	        <div data-row="imageId" class="row">
	        	<label>{lang:vt.category.imageId}</label>
	        	<?= VfsHelper::FormVfsFile( $prefix . '[imageId]', 'imageId', $object->image, "image" ); ?>
	        </div>
	        <div data-row="statusId" class="row required">
	        	<label>{lang:vt.album.statusId}</label>
	        	<?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
	        </div>
	</div>
	{increal:tmpl://vt/elements/images1.tmpl.php}
</div>
<script type="text/javascript" src="{web:js://vfs/vfs.selector.js}"></script>
<script type="text/javascript">
    var jsonErrors = {$jsonErrors};
    var vfsSelector = new VfsSelector( "{web:vt://vfs/}" );
    vfsSelector.Init();
</script>
 