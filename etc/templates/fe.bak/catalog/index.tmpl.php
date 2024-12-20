<?php
    $__metaDetail = MetaDetailUtility::GetForContext( null, Page::$RequestData[0] );

    $__breadcrumbs = array(
        array(
            'title' => 'Каталог'
        )
    );

    $__activeElement = Site::GetWebPath( '/catalog/' );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row mb-4">
        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-9">
            <h1 class="h4 mb-4">Каталог резиновых рулонных покрытий, резиновой плитки, крошки и инструментов для работы с материалами из резиновой крошки</h1>
            <div class="row">
                <?php $counterProducts = 1;?>
                <?php if ( !empty( $products ) ) { ?>
                <?php foreach ( $products as $product ) { ?>
                <div class="col-md-4 productItemWrapper mb-4">
                    <div class="productItem text-center">
                        <a href="<?= LinkUtility::GetProductItemUrl( $product ); ?>">
<img src="/shared/files/{$product.smallImage.path}" class="img-fluid m-auto"/>
						<!--img src="/thumb.php?src=shared/files/{$product.smallImage.path}&size=x270" class="img-fluid m-auto"/-->
						</a>
                        <div class="productItem--labels">
                            <?php if ( !empty( $product->isLatest ) ) { ?>
                                <div class="productItem--label productItem--label-n"></div>
                            <?php } ?>
                            <?php if ( !empty( $product->isRecomend ) ) { ?>
                                <div class="productItem--label productItem--label-fav"></div>
                            <?php } ?>
                            <?php if ( !empty( $product->oldPrice ) ) { ?>
                                <div class="productItem--label productItem--label-pr"></div>
                            <?php } ?>
                        </div>
                        <div class="productItem--prices">
                            <div class="productItem--price productItem--price-new">Цена: <i><b><span itemprop="price">{$product.price}</span></b> <span itemprop="priceCurrency" content="RUB">руб.</span></i></div>
                            <?php if ( !empty( $product->oldPrice ) ) { ?>
                                <div class="productItem--price productItem--price-old">{$product.oldPrice} руб</div>
                            <?php } ?>
                        </div>
                    </div>
                    <a href="<?= LinkUtility::GetProductItemUrl( $product ); ?>">{$product.title}</a>
                    <p>{$product.foreword}</p>
                </div>
                <?php if( ($counterProducts % 3) == 0){ ?>
            </div><div class="row">
                <?php } ?>
                <?php $counterProducts++; } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}