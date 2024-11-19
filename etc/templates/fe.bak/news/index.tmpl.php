<?php

    if( empty( $__pageTitle )){
        $__pageTitle = 'Новости';
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Новости'
        )
    );

    $hideNews = true;
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='content vspl'>
    <div class='row row2'>
        {increal:tmpl://fe/elements/sidebar.tmpl.php}
        <div class='CenterLine column column3'>
            <section class='section'>
                <header class='section--header'>
                    <div class="section--label">Новости</div>
                    <div class="section--tools">
                        <a href="/news/" class="section--tool section--tool-archive">Архив новостей</a>
                    </div>
                </header>
                <div class='section--content'>
                    <?php foreach( $articles as $item ){ ?>
                    <div class='articleItem--row'>
                        <div class='articleItem articleItem-short'>
                            <?php if( !empty( $item->smallImageId )){ ?>
                            <div class='articleItem--image'>
                                <a href="/news/{$item.alias}">
                                    <img class="img-responsive" src="{web:vfs://}{$item.smallImage.path}">
                                </a>
                            </div>
                            <?php } ?>
                            <div class='articleItem--wrap'>
                                <div class='articleItem--title'>
                                    <a href="/news/{$item.alias}">
                                        {$item.title}
                                    </a>
                                </div>
                                <div class='articelItem--body'>
                                    <div class='articleItem--date'><?= $item->publicationDate->format('d.m.Y');?></div>
                                    <div class='articleItem--text'>
                                        {$item.foreword}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='section--split section--split-v'>&nbsp;</div>
                    <?php } ?>
                </div>
                <div class='section--footer'>
                    <?php $__pagesLink = '/news/page';?>
                    {increal:tmpl://fe/elements/paginator.tmpl.php}
                </div>
            </section>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}