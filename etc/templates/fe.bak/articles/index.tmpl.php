<?php

    if( empty( $__pageTitle )){
        $__pageTitle = 'Статьи';
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Статьи'
        )
    );

    $hideArticles = true;
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row mb-4">
        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-9">
            <div class="row mb-4">
                <h1 class="col-md-6">Полезные статьи</h1>
            </div>
            <?php $counterArticles = 1;
            if (!empty($articles)){ ?>
            <div class="row">
            <?php foreach ($articles as $item){ ?>
            <div class="col-md-6 articleItem mb-4">
                <a href="{web:/}articles/{$item.alias}" class="h5 d-block">{$item.title}</a>
                <p>
                    <span class="articleDate"><?= $item->publicationDate->format('d.m.Y'); ?></span>. {$item.foreword}
                    <noindex><a href="{web:/}articles/{$item.alias}">Читать далее</a></noindex>
                </p>
            </div>
            <?php if (($counterArticles % 2) == 0){ ?>
             </div>
            <div class="row">
            <?php } ?>
            <?php $counterArticles++; ?>
            <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}