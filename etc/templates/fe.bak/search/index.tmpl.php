<?php

    if( empty( $__pageTitle )){
        $__pageTitle = 'Поиск';
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Поиск'
        )
    );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='content vspl'>
    <div class='row row2'>
        {increal:tmpl://fe/elements/sidebar.tmpl.php}
        <div class='CenterLine column column3'>
            <section class='section'>
                <header class='section--header'>
                    <div class="section--label">Поиск
                        <p class="search-request">Вы искали: <em>{$searchWord}</em></p>
                    </div>
                    <div class="section--tools"></div>
                </header>
                <div class='section--content section-useful'>
                    <?php foreach( $searchResults as $item ){ ?>
                        <div class='articleItem--row'>
                            <div class='articleItem articleItem-short'>
                                <div class='searchItem--wrap'>
                                    <div class='articleItem--title'>
                                        <a href="<?= SearchHelper::GetUrl( $item->url, $item->type ); ?>">
                                            {$item.title}
                                        </a>
                                    </div>
                                    <div class='articelItem--body'>
                                        <div class='articleItem--text'>
                                            <p><?= mb_substr( strip_tags( $item->foreword ), 0, 500 ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='section--split section--split-v'>&nbsp;</div>
                    <?php } ?>
                </div>
                <div class='section--footer'>
                    <?php $__pagesLink = !empty ( $searchWord ) ? "/search/?search=$searchWord&page=" : ""; ?>
                    {increal:tmpl://fe/elements/paginator.tmpl.php}
                </div>
            </section>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}