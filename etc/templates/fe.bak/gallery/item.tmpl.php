<?php

    if( empty( $__pageTitle )){
        $__pageTitle = $albumItem->title;
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Галерея'
            , 'path' => '/gallery/'
        )
        , array(
            'title'  => $albumItem->title
        )
    );

    $__activeElement = Site::GetWebPath( '/gallery/' );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class='galleryItem--title'>{$albumItem.title}</h1>
            <?php if( !empty( $albumItem->images )){ ?>
                <div class="row">
                    <?php foreach( $albumItem->images as $image ){ ?>
                        <div class="col-md-3 mb-3">
                            <a class="fancybox" rel="{$albumItem.albumId}" href="{web:vfs://}{$image.bigImage.path}">
				<img src="/thumb.php?src=shared/files/{$image.smallImage.path}&size=250x250&crop=1" alt="{$image.title}" class="img-fluid">
			    </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
