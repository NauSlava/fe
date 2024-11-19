<?php
    $__metaDetail = MetaDetailUtility::GetForContext( false, Page::$RequestData[0] );

    if( empty( $__pageTitle )){
        $__pageTitle = 'Новинки';
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Новинки'
        )
    );

?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='block-content block-content-catalog'>
    <div class='block-title'>Новинки</div>
    <div class='block-body clearfix'>
        <?php if( !empty( $products )){ ?>
            <ul class='products-grid'>
                <?php
                    $i = 0;
                    foreach( $products as $product ){
                    $i++;
                    ?>
                    <li>
                        <div class='product-item <?=( $i % 5 )?'product-item-last':''?>'>
                            <a href='<?= LinkUtility::GetProductItemUrl( $product );?>' class='product-item-thumb'><img src="{web:vfs://}{$product.smallImage.path}" alt="{$product.title}"/></a>
                            <div class="product-item-title"><a href="<?= LinkUtility::GetProductItemUrl( $product );?>">{$product.title}</a></div>
                            <div class='ov product-item-footer'>
                                <div class='product-item-brand fl-l'>
                                    <a href='<?= LinkUtility::GetBrandItemUrl( $product->brand );?>'>{$product.brand.title}</a>
                                </div>
                                <div class='product-item-price fl-r'>
                                    <?=TextRender::GetRurString( $product->price, false );?> <small><?= !empty( $product->priceType )?ProductUtility::$PriceTypes[$product->priceType]:'руб.'; ?></small>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}