<?php

    if( empty( $__pageTitle )){
        $__pageTitle = 'Галерея';
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Галерея'
        )
    );

    $__activeElement = Site::GetWebPath( '/gallery/' );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row">
        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-9">
            <h1>Наши объекты</h1>
            <div class="row">
                <?php foreach ( $albumObject as $item ){ ?>
                    <div class="col-md-4 mb-4 productItemList">
                        <div class="border text-center mb-2 galleryitem">
                            <a href="/gallery/{$item.alias}">
                                <img src="/shared/files/{$item.image.path}" class="img-fluid"/>
                            </a>
                        </div>
			<a href="/gallery/{$item.alias}">{$item.title}</a>
                    </div>
                <?php } ?>
            </div>
            <hr class="mb-4"/>
            <h4 class="h4">{$__pageTitle}</h4>
            <?php foreach( $albums as $item ){ ?>
            <h5 class="mt-4">{$item.title}</h5>
            <div class="galleryItem--photos">
                <?php if( !empty( $item->images )){ ?>
                    <div class="row">
                        <?php $index = 0; foreach( $item->images as $image ){ ?>
                        <div class="col-md-3 mt-3 <?= ($index > 2)?'hidden':''?>">
                            <!--a class="fancybox" rel="{$item.albumId}" href="{web:vfs://}{$image.bigImage.path}"-->
				<a href="{web:vfs://}{$image.bigImage.path}" data-lightbox="gallery" data-title="{$image.smallImage.title}" title="{$image.smallImage.title}">
					<img src="{web:vfs://}{$image.smallImage.path}" alt="{$albumItem.title}" class="img-fluid">
				</a>
                        </div>
                        <?php $index++; } ?>
                    </div>
                <?php } ?>
                <div><a href="/gallery/{$item.alias}">Посмотеть все фото</a> ({$item.count})</div>
            </div>
            <hr/>
            <?php } ?>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
<script src="/shared/js/fe/lightbox.js"></script>