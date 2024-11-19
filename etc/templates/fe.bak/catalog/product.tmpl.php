<?php
    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $product ), Page::$RequestData[0] );

    if( empty( $__pageTitle )){
        $__pageTitle = !empty( $__metaDetail->pageTitle )?$__metaDetail->pageTitle:$product->title . ' ' . $product->foreword;
    }


    $__breadcrumbs = array();

    if( !empty( $__category->parentCategory->alias )){
        $__breadcrumbs = array(
            array(
                'path'  => '/catalog/'
                , 'title' => 'Каталог'
            )
            , array(
                'path'  => '/catalog/' . $__category->parentCategory->alias . '/'
                , 'title' => $__category->parentCategory->title
            )
            , array(
                'path'  => '/catalog/' . $__category->alias . '/'
                , 'title' => $__category->title
            )
            , array(
                'title' => $product->title
            )
        );
    }else{
        $__breadcrumbs = array(
            array(
                'path'  => '/catalog/'
                , 'title' => 'Каталог'
            )
            , array(
                'path'  => '/catalog/' . $__category->parentCategory->alias . '/'
                , 'title' => $__category->title
            )
            , array(
                'title' => $product->title
            )
        );
    }

    $__activeElement = Site::GetWebPath( '/catalog/' );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-3 sidebar d-none d-lg-block">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-lg-9 col-md-12" itemscope itemtype="http://schema.org/Product">
            <div class="row">
                <div class="col-lg-9 col-md-8 order-1 order-md-0 order-lg-0">
                    <div class="productItem">
                        <a class="fancybox" href="/shared/files/{$product.bigImage.path}" rel="{$product.productId}">
                            <img itemprop="image" alt="{$product.title}" class="img-fluid " title="{$product.title}" src="/shared/files/{$product.bigImage.path}">
                            <!--img itemprop="image" alt="{$product.title}" class="img-fluid " title="{$product.title}" src="/thumb.php?src=shared/files/{$product.bigImage.path}&size=x615"-->
                        </a>
                        <div class="productItem--labels">
                            <div class="productItem--label productItem--label-fav"></div>
                        </div>
                    </div>
                    <div class="row mt-3 galleryProduct mb-4 mb-lg-0">
                        <?php foreach( $images as $image ){ ?>
                             <div class="col-md-2 col-3 galleryProductFirst">
                                 <a class="productItem--otherImage fancybox" rel="{$product.productId}" href="{web:vfs://}{$image.bigImage.path}">
					<img alt="{$product.title}"  class="img-fluid border" title="{$product.title}" src="/thumb.php?src=shared/files/{$image.smallImage.path}&size=x100"></a>
<!--img alt="{$product.title}"  class="img-fluid border" title="{$product.title}" src="/thumb.php?src=shared/files/{$image.smallImage.path}&size=x100"-->
                             </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 order-0 order-md-1 order-lg-1">
                    <h1 itemprop="name" class="mb-4">{$__pageTitle}</h1>
                    <button class="btn btn-default btn-block" itemprop="offers" itemscope itemtype="http://schema.org/Offer" >
                        <meta itemprop="priceCurrency" content="RUR" />
                        Цена: <span itemprop="price">{$product.price}</span>&nbsp;<?= !empty( $product->priceType )?ProductUtility::$PriceTypes[$product->priceType]:'руб.'?>
                    </button>
                    <?php if( !empty( $product->oldPrice )){ ?>
                        <div class="old">
                            Старая цена: <span class="productItem--price productItem--price-old">{$product.oldPrice} руб.</span>
                        </div>
                    <?php } ?>
                    <button class="btn btn-primary btn-block mt-2 messageTrigger">
                        Отправить запрос
                    </button>
                    <div class="dotted mt-4 mb-4"></div>
                    
                    <?php if( !empty( $colors )){ ?>
							<h5>Цвет</h5>
                            <ul class="values-colors list-inline">
                            <?php foreach( $colors as $item ){ ?>
								<li class="list-inline-item" style="background:{$item.code}"></li>
							<?php } ?>
                            </ul>
                            <?php } ?>
                    <div class="dotted mt-4 mb-4"></div>
                    <?php if (!empty($sizes)) { ?>
                        <h5>Размеры</h5>
                        <?php foreach ($sizes as $item) { ?>
                            <p>{$item.title}</p>
                        <?php } ?>
                    <?php } ?>
                    <?php if (!empty($depths)) { ?>
                        <h5>Толщина</h5>
                        <?php foreach ($depths as $item) { ?>
                            <p>{$item.title}</p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <p class="title title-sub"><h2>Описание:</h2></p>
                    <div itemprop="description" class="mb-4">
                        {$product.content}
                    </div>
                    <hr class="mb-4"/>

                    <p class="title title-sub mb-4"><h2>Характеристики:</h2></p>
                    {$product.features}

                    <hr class="mt-4 mb-4"/>

                    <p class="title title-sub"><h2>Область применения:</h2></p>
                    {$product.scope}
					
                    <hr class="mt-4 mb-4"/>
                    <?php if( !empty( $examples )){ ?>
                        <section class='section section-examples'>
                            <header class='section--header section--header-10'>
                                <div class="section--label galleryItem--title">Примеры применения</div>
                            </header>
                            <div class='section-content'>
                                <div class='row row3'>
                                    <?php foreach( $examples as $image ){ ?>
                                        <div class="column column1">
                                            <a class="fancybox" rel="pr{$product.productId}" href="{web:vfs://}{$image.bigImage.path}">
<img alt="{$product.title}" title="{$product.title}" class="img-responsive" alt="" src="{web:vfs://}{$image.smallImage.path}"></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>
                    <?php } ?>
                    </div>
            </div>

        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}