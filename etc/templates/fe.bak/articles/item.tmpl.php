<?php

    if( empty( $__pageTitle )){
        $__pageTitle = $newsItem->title;
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Статьи'
            , 'path' => '/articles/'
        )
        , array(
            'title'  => $newsItem->title
        )
    );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row mb-4">
        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-9">
            <h1 class='articleItem--title'>{$newsItem.title}</h1>
            <?php if( !empty( $newsItem->bigImage->path )){?>
                <div class='articleItem--image'>
                    <a href="#">
                        <img class="img-responsive" src="{web:vfs://}{$newsItem.bigImage.path}">
                    </a>
                </div>
            <?php } ?>
            <div class='articelItem--body'>
                <div class='articleItem--date'><?= $newsItem->publicationDate->format('d.m.Y'); ?></div>
                <div class='articleItem--text'>
                    {$newsItem.content}
                </div>
            </div>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}