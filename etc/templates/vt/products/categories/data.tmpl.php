<?php
    /** @var Category $object */

    $prefix = "category";

    if ( empty( $errors ) ) $errors = array();
	if ( empty( $jsonErrors ) ) $jsonErrors = '{}';

    if ( !empty($errors["fatal"] ) ) {
		?><h3 class="error"><?= LocaleLoader::Translate( 'errors.fatal.' . $errors["fatal"] ); ?></h3><?
	}
//    JsHelper::PushFile( 'js://vt/translit-alias.js' );
//print_r($object);
?>
<div class="tabs">
	<?= FormHelper::FormHidden( 'selectedTab', !empty( $selectedTab ) ? $selectedTab : 0, 'selectedTab' ); ?>
    <ul class="tabs-list">
        <li><a href="#page-0">{lang:vt.common.commonInfo}</a></li>
        <li><a href="#page-1">{lang:vt.common.images}</a></li>
        <!--li><a href="#page-6">{lang:vt.common.examples}</a></li-->
        <li><a href="#page-5">{lang:vt.common.seo}</a></li>
    </ul>

    <div id="page-0" class="tab-page rows">
        <div data-row="title" class="row required">
            <label>{lang:vt.category.title}</label>
            <?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="alias" class="row required">
            <label>{lang:vt.category.alias}</label>
            <?= FormHelper::FormInput( $prefix . '[alias]', $object->alias, 'alias', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="parentCategoryId" class="row">
            <label>{lang:vt.category.parentCategoryId}</label>
            <?= CategoryHelper::FormSelect( $prefix . '[parentCategoryId]', $categories, $object->parentCategoryId, true ); ?>
        </div>
        <div data-row="content" class="row">
            <label>{lang:vt.category.content}</label>
            <?= FormHelper::FormEditor( $prefix . '[content]', $object->content, 'content', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
		<div data-row="foreword" class="row">
            <label>{lang:vt.category.foreword}</label>
            <?= FormHelper::FormEditor( $prefix . '[foreword]', $object->foreword, 'foreword', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="orderNumber" class="row">
            <label>{lang:vt.category.orderNumber}</label>
            <?= FormHelper::FormInput( $prefix . '[orderNumber]', $object->orderNumber, 'orderNumber', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="smallImageId" class="row">
            <label>{lang:vt.product.smallImageId}</label>
	    <?= VfsHelper::FormVfsFile( $prefix . '[smallImageId]', 'smallImageId', $object->smallImage, "image" ); ?>
        </div>
        <div data-row="imageId" class="row">
            <label>{lang:vt.category.imageId}</label>
            <?= VfsHelper::FormVfsFile( $prefix . '[imageId]', 'imageId', $object->image, "image" ); ?>
        </div>
        <div data-row="menuClass" class="row">
            <label>{lang:vt.category.menuClass}</label>
            <?= FormHelper::FormInput( $prefix . '[menuClass]', $object->menuClass, 'menuClass', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="isList" class="row">
            <label>{lang:vt.category.isList}</label>
            <?= FormHelper::FormCheckBox( $prefix . '[isList]', true, 'isList', null, $object->isList ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.category.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
    {increal:tmpl://vt/elements/meta-details.tmpl.php}
    {increal:tmpl://vt/elements/images1.tmpl.php}
    {increal:tmpl://vt/elements/examples.tmpl.php}
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