<?php
    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $__category ), Page::$RequestData[0] );

    if( empty( $__pageTitle )){
        $__pageTitle = $__category->title;
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
                'title' => $__category->title
            )
        );
    }else{
        $__breadcrumbs = array(
            array(
                'path'  => '/catalog/'
            , 'title' => 'Каталог'
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
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 col-lg-3 sidebar col-12">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-12 col-lg-9 col-12">
            <h1 class="mb-4">{$__pageTitle}</h1>
            <div class="row">
                <div class="col-md-7 col-sm-12 col-12">
                    <div class="productItem--image">
                        <a class="fancybox"  rel="{$__category.categoryId}" href="/shared/files/{$__category.image.path}">
                        <img alt="{$__pageTitle}" title="{$__pageTitle}" class="img-fluid" src="/shared/files/{$__category.image.path}">
                        <!--img alt="{$__pageTitle}" title="{$__pageTitle}" class="img-fluid" src="/thumb.php?src=shared/files/{$__category.image.path}&size=x400"-->

                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-12">
                    <div class="row mt-4 mt-lg-0">
                        <?php if( !empty( $images)){ ?>
                            <?php foreach( $images as $image ){ ?>
                                <div class="col-md-4 col-sm-4 col-4 mb-3 thumb-post">
                                    <a class="img-fluid fancybox " rel="{$__category.categoryId}" href="{web:vfs://}{$image.bigImage.path}">
					<img alt="{$__pageTitle}" class="img-fluid" title="{$__pageTitle}" src="/shared/files/{$image.smallImage.path}">
					<!--img alt="{$__pageTitle}" class="img-fluid" title="{$__pageTitle}" src="/thumb.php?src=shared/files/{$image.smallImage.path}&size=250x250&crop=1"-->
				</a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <hr  class="mt-4 mb-4"/>
            {$__category.content}
            <div>
                <button data-title="{$__category.title}" class="messageTrigger button button-orange" onclick="yaCounter29298175.reachGoal('request_main');return true;">Сделать заказ</button>
            </div>
            <?php if( !empty( $__category->foreword ) ){ ?>
                <hr class="mt-3 mb-3"/>
                {$__category.foreword}
            <?php } ?>
            <hr  class="mt-4 mb-4"/>
            <?php if( !empty( $examples )){ ?>
                <section class='section section-examples'>
                    <header class='section--header section--header-10'>
                        <div class="section--label galleryItem--title h5">Примеры применения</div>
                    </header>
                    <div class='section-content'>
                        <div class='row'>
                            <?php foreach( $examples as $image ){ ?>
                                <div class="col-md-4 mb-3">
                                    <a class="fancybox" rel="pr{$__category.categoryId}" href="{web:vfs://}{$image.bigImage.path}">
		<img class="img-fluid" alt="{$__pageTitle}" title="{$__pageTitle}" src="/shared/files/{$image.smallImage.path}">
		<!--img class="img-fluid" alt="{$__pageTitle}" title="{$__pageTitle}" src="/thumb.php?src=shared/files/{$image.smallImage.path}&size=x255"-->
				</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
