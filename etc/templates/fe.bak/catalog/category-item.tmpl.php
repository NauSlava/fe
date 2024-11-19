<?php
    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $__category ), Page::$RequestData[0] );

    if ( empty( $__pageTitle ) ) {
        $__pageTitle = !empty( $__metaDetail->pageTitle ) ? $__metaDetail->pageTitle : $__category->title;
    }

    $__breadcrumbs = array();

    if ( !empty( $__category->parentCategory->alias ) ) {
        $__breadcrumbs = array(
            array(
                'path' => '/catalog/'
            , 'title'  => 'Каталог'
            )
        , array(
                'path' => '/catalog/' . $__category->parentCategory->alias . '/'
            , 'title'  => $__category->parentCategory->title
            )
        , array(
                'title' => $__category->title
            )
        );
    } else {
        $__breadcrumbs = array(
            array(
                'path' => '/catalog/'
            , 'title'  => 'Каталог'
            )
        , array(
                'title' => $__category->title
            )
        );
    }

    $__activeElement = Site::GetWebPath( '/catalog/' );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<?php if( !empty( $__childCategories )){ ?>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>{$__pageTitle}</h1>
        </div>
    </div>
    <div class="row">
        <?php foreach ( $__childCategories as $child ){ ?>
        <div class="col-md-3 mb-4 p-1 productItemList">
            <div class="border text-center mb-2 p-2">
				<a href="/catalog/{$child.alias}/">
					<img src="/shared/files/{$child.image.path}" class="img-fluid m-auto categoryImage"/>
					<!--img src="/thumb.php?src=shared/files/{$child.image.path}&size=x270" class="img-fluid m-auto categoryImage"/-->
				</a>
            </div>
            <a href="/catalog/{$child.alias}/">{$child.title}</a>
        </div>
        <?php } ?>
    </div>
</div>
<?php }else{ ?>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3 sidebar">
                {increal:tmpl://fe/elements/sidebar.tmpl.php}
            </div>
            <div class="col-md-9">
                <h1 class="mb-4">{$__pageTitle}</h1>
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
                <?php if ( empty( $__pageNumber ) && !empty( $__category->content ) ) { ?>
                <hr/>
                <div class="row mt-4">
                    <div class="col-md-12">
                        {$__category.content}
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
{increal:tmpl://fe/elements/footer.tmpl.php}
