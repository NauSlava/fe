<?php
    /** @var Product $object */

    $prefix = "product";

    if ( empty( $errors ) ) $errors = array();
	if ( empty( $jsonErrors ) ) $jsonErrors = '{}';

    if ( !empty($errors["fatal"] ) ) {
		?><h3 class="error"><?= LocaleLoader::Translate( 'errors.fatal.' . $errors["fatal"] ); ?></h3><?
	}

    JsHelper::PushFile( 'js://vt/translit-alias.js' );
//print_r($object);
?>
<div class="tabs">
	<?= FormHelper::FormHidden( 'selectedTab', !empty( $selectedTab ) ? $selectedTab : 0, 'selectedTab' ); ?>
    <ul class="tabs-list">
        <li><a href="#page-0">{lang:vt.common.commonInfo}</a></li>
        <li><a href="#page-1">{lang:vt.common.images}</a></li>
        <li><a href="#page-6">{lang:vt.common.examples}</a></li>
        <li><a href="#page-5">{lang:vt.common.seo}</a></li>
    </ul>

    <div id="page-0" class="tab-page rows">
        <div data-row="smallImageId" class="row">
            <label>{lang:vt.product.smallImageId}</label>
          <?= VfsHelper::FormVfsFile( $prefix . '[smallImageId]', 'smallImageId', $object->smallImage, "image" );?>
        </div>
        <div data-row="bigImageId" class="row">
            <label>{lang:vt.product.bigImageId}</label>
            <?= VfsHelper::FormVfsFile( $prefix . '[bigImageId]', 'bigImageId', $object->bigImage, "image" ); ?>
        </div>

        <div data-row="title" class="row required">
            <label>{lang:vt.product.title}</label>
            <?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="alias" class="row required">
            <label>{lang:vt.product.alias}</label>
            <?= FormHelper::FormInput( $prefix . '[alias]', $object->alias, 'alias', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="article" class="row">
            <label>{lang:vt.product.article}</label>
            <?= FormHelper::FormInput( $prefix . '[article]', $object->article, 'article', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="brandId" class="row">
            <label>{lang:vt.product.brandId}</label>
            <?= FormHelper::FormSelect( $prefix . '[brandId]', $brands, "brandId", "title", $object->brandId, null, null, true ); ?>
        </div>
        <div data-row="categoryId" class="row required">
            <label>{lang:vt.product.categoryId}</label>
            <?= CategoryHelper::FormSelect( $prefix . '[categoryId]', $categories, $object->categoryId, true ); ?>
        </div>
        <div data-row="foreword" class="row">
            <label>{lang:vt.product.foreword}</label>
            <?= FormHelper::FormTextArea( $prefix . '[foreword]', $object->foreword, 'foreword', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="content" class="row">
            <label>{lang:vt.product.content}</label>
            <?= FormHelper::FormEditor( $prefix . '[content]', $object->content, 'content', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="features" class="row">
            <label>{lang:vt.product.features}</label>
            <?= FormHelper::FormEditor( $prefix . '[features]', $object->features, 'features', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="scope" class="row">
            <label>{lang:vt.product.scope}</label>
            <?= FormHelper::FormEditor( $prefix . '[scope]', $object->scope, 'scope', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="orderNumber" class="row">
            <label>{lang:vt.product.orderNumber}</label>
            <?= FormHelper::FormInput( $prefix . '[orderNumber]', $object->orderNumber, 'orderNumber', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="orderShow" class="row">
            <label>{lang:vt.product.orderShow}</label>
            <?= FormHelper::FormInput( $prefix . '[orderShow]', $object->orderShow, 'orderShow', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="isAvailable" class="row required">
            <label>{lang:vt.product.isAvailable}</label>
            <?= FormHelper::FormCheckBox( $prefix . '[isAvailable]', null, 'isAvailable', null, $object->isAvailable ); ?>
        </div>
        <div data-row="isLatest" class="row">
            <label>{lang:vt.product.isLatest}</label>
            <?= FormHelper::FormCheckBox( $prefix . '[isLatest]', null, 'isLatest', null, $object->isLatest ); ?>
        </div>
        <div data-row="isRecomend" class="row">
            <label>{lang:vt.product.isRecomend}</label>
            <?= FormHelper::FormCheckBox( $prefix . '[isRecomend]', null, 'isRecomend', null, $object->isRecomend ); ?>
        </div>
        <div data-row="price" class="row">
            <label>{lang:vt.product.price}</label>
            <?= FormHelper::FormInput( $prefix . '[price]', $object->price, 'price', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="price" class="row">
            <label>{lang:vt.product.oldPrice}</label>
            <?= FormHelper::FormInput( $prefix . '[oldPrice]', $object->oldPrice, 'oldPrice', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="colors" class="row">
            <label>{lang:vt.product.colors}</label>
            <?php if( !empty( $colors )){ ?>
                <ul class="options-list">
                    <?php foreach( $colors as $item ){ ?>
                        <li>
                            <?php
                                $cheked = false;
                                if( !empty( $object->colors ) && in_array( $item->colorId, $object->colors )){
                                    $cheked = true;
                                }
                            ?>
                            <label>
                                <?= FormHelper::FormCheckBox( $prefix . "[colors][]", $item->colorId, "", "", $cheked );?>
                                {$item.title}
                            </label>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div data-row="sizes" class="row">
            <label>{lang:vt.product.sizes}</label>
            <?php if( !empty( $sizes )){ ?>
                <ul class="options-list">
                    <?php foreach( $sizes as $item ){ ?>
                        <li>
                            <?php
                                $cheked = false;
                                if( !empty( $object->sizes ) && in_array( $item->sizeId, $object->sizes )){
                                    $cheked = true;
                                }
                            ?>
                            <label>
                                <?= FormHelper::FormCheckBox( $prefix . "[sizes][]", $item->sizeId, "", "", $cheked );?>
                                {$item.title}
                            </label>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div data-row="depths" class="row">
            <label>{lang:vt.product.depths}</label>
            <?php if( !empty( $depths )){ ?>
                <ul class="options-list">
                    <?php foreach( $depths as $item ){ ?>
                        <li>
                            <?php
                                $cheked = false;
                                if( !empty( $object->depths ) && in_array( $item->depthId, $object->depths )){
                                    $cheked = true;
                                }
                            ?>
                            <label>
                                <?= FormHelper::FormCheckBox( $prefix . "[depths][]", $item->depthId, "", "", $cheked );?>
                                {$item.title}
                            </label>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div data-row="priceType" class="row required">
            <label>{lang:vt.product.priceType}</label>
            <?= FormHelper::FormSelect( $prefix . '[priceType]', ProductUtility::$PriceTypes, "", "", $object->priceType, null, null, false ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.product.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
    {increal:tmpl://vt/elements/images1.tmpl.php}
    {increal:tmpl://vt/elements/meta-details.tmpl.php}
    {increal:tmpl://vt/elements/examples.tmpl.php}
</div>

<script >
	var jsonErrors = {$jsonErrors};
</script>
<script src="{web:js://vfs/vfs.selector.js}"></script>
<script>
    var vfsSelector = new VfsSelector( "{web:vt://vfs/}" );
    vfsSelector.Init();
</script>
<?php
	$__useEditor = true;
?>
 