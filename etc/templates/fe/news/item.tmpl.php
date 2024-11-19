<?php

    if( empty( $__pageTitle )){
        $__pageTitle = $newsItem->title;
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Новости'
            , 'path' => '/news/'
        )
    , array(
            'title'  => $newsItem->title
        )
    );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='content vspl'>
    <div class='row row2'>
        {increal:tmpl://fe/elements/sidebar.tmpl.php}
        <div class='CenterLine column column3'>
            <section class='section'>
                <section class='section-content'>
                    <div class="section--tools section--tools-same">
                        <a href="/news/" class="section--tool section--tool-archive">Все новости</a>
                        <a href="/news/" class="section--tool section--tool-archive">Архив новостей</a>
                    </div>
                </section>
            </section>
            <div class='articleItem articleItem-full'>
                <div class='articleItem--title'>{$newsItem.title}</div>
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
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}