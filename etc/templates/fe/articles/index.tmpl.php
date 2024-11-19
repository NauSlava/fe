<?
    if( empty( $__pageTitle )){ $__pageTitle = 'Статьи применения резиновой крошки';}
    $__metaDescription = "Статьи по применению изделий из резиновой крошки, особенности материалов из резиновой крошки, производству бесшовных резиновых покрытий.";
    $__metaKeywords    = "Резиновая крошка, резиновая плитка, укладка резиновых покрытий, инструмент для укладки резиновых покрытий";
    $__breadcrumbs = array(array('title' => 'Статьи'));
    $hideArticles = true;
//print_r($articles);
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row mb-4">
        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-9">
            <h1>Полезные статьи применения резиновой крошки</h1>
            <?php $counterArticles = 1;
            if (!empty($articles)){ ?>
            <div class="row">
            <?php foreach (array_reverse($articles) as $item){ ?>
            <div class="col-md-6 articleItem mb-4">
                <a href="{web:/}articles/{$item.alias}" class="h5 d-block"><h2>{$item.title}</h2></a>
                <p>
                    <span class="articleDate"><?= $item->publicationDate->format('d.m.Y'); ?></span>. {$item.foreword}
                    <a href="{web:/}articles/{$item.alias}">Читать далее</a>
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