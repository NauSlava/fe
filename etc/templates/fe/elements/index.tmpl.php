<?php
    /** @var TemplateItemWrapper $tiw */
    $__activeElement = Site::GetWebPath( '/' );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='media'>
	<?php 
		$menuClasses = array();
	?>
    <div class='nav nav-media'>
        <ul class="main-level">
            <?php $index = 0; foreach( $categoryMenu as $item ){?>
			<?php $menuClasses[] = $item->menuClass; ?>
            <li class='navigation-slide nav--item <?= !empty( $item->menuClass ) ? 'nav--item-'.$item->menuClass :''; ?>' data-modif="{$item.menuClass}" data-id="{$item.categoryId}" data-slide="{$index}">
                <a href="<?= LinkUtility::GetCategoryItemUrl( !empty($item->nodes)?current($item->nodes):$item) ;?>">
                    <span class='nav--label'>{$item.title}</span>
                </a>
            </li>
            <?php $index++; } ?>
        </ul>
        <?php foreach( $categoryMenu as $item ){?>
        <?php if( !empty( $item->nodes )){ ?>
			<ul class="nav nav-sub {$item.menuClass}" data-id="{$item.categoryId}">
				<?php foreach( $item->nodes as $nItem ){?>
				<li class='nav--item'><a href="<?= LinkUtility::GetCategoryItemUrl( $nItem );?>"><span class='nav--label'>{$nItem.title}</span></a></li>
				<?php } ?>
			</ul>
        <?php } ?>
        <?php } ?>
    </div>
    <div class='slider slider-main'>
        <div class="flexslider">
            <ul class="slides">
                <li class="slide-<?= $menuClasses[0] ?>">
                    <img class="img-responsive" src="/shared/images/fe/slides/Plate.jpg" alt="Производство резиновой плитки">
					<div class="slide--title">Производство резиновой плитки</div>
                </li>
                <li class="slide-<?= $menuClasses[1] ?>">
                    <img class="img-responsive" src="/shared/images/fe/slides/Area.jpg" alt="Детские и спортивные площадки">
					<div class="slide--title">Детские и спортивные площадки</div>
                </li>
                <li class="slide-<?= $menuClasses[2] ?>">
                    <img class="img-responsive" src="/shared/images/fe/slides/Grass.jpg" alt="Искусственная трава со склада">
					<div class="slide--title">Искусственная трава со склада</div>
                </li>
                <li class="slide-<?= $menuClasses[3] ?>">
                    <img class="img-responsive" src="/shared/images/fe/slides/Materials.jpg" alt="Материалы на складе в наличии">
					<div class="slide--title">Материалы на складе в наличии</div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class='content'>
    <section class='section section-catalog vspl'>
    <header class='section--header'>
        <div class="section--label">Популярные товары для резиновых покрытий</div>
    </header>
    <div class='section-content'>
        <div class='productlist row row4'>
            <?php if( !empty( $__recomendProducts )){ ?>
            <?php foreach( $__recomendProducts as $item ){ ?>
            <div class="column column1">
                <div class="productItem productItem-short">
                    <div class="productItem--image">
                        <a href="<?= LinkUtility::GetProductItemUrl( $item );?>">
                            <img class="img-responsive" src="{web:vfs://}{$item.smallImage.path}" alt="">
                        </a>
                        <div class="productItem--prices">
                            <div class="productItem--price productItem--price-new"><?= !empty( $item->priceType )?ProductUtility::$PriceTypes[$item->priceType]:'руб.'; ?></div>
                            <?php if( !empty( $item->oldPrice )){ ?>
                            <div class="productItem--price productItem--price-old">{$item.oldPrice} руб</div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="productItem--info">
                        <a class="productItem--title" href="<?= LinkUtility::GetProductItemUrl( $item );?>"><h3>{$item.title}</h3></a>
                        <div class="productItem--text">{$item.foreword}</div>
                    </div>
                    <div class="productItem--labels">
                        <?php if( !empty( $item->isLatest )){ ?>
                        <div class="productItem--label productItem--label-n"></div>
                        <?php } ?>
                        <?php if( !empty( $item->isRecomend )){ ?>
                        <div class="productItem--label productItem--label-fav"></div>
                        <?php } ?>
                        <?php if( !empty( $item->oldPrice )){ ?>
                        <div class="productItem--label productItem--label-pr"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
<section class='section section-about vspl'>
    <div class='row row2'>
        <div class="column column1">
            <header class='section--header'>
                <div class="section--label">
				<img src="/shared/images/fe/wlogo.png" alt="Recro" >
                </div>
            </header>
        </div>
        <div class="column column3">
            <div class='section--content'>
				{$__page.content}
                <section class='section section-gallery'>
                    <div class='section-content'>
                        <div class='galleryItem'>

                            <div class='galleryItem--photos'>
                                <div class='row row3'>
                                    <div class="column column1">
                                        <img class="img-responsive" src="/shared/images/fe/about/i1.jpg" alt="">
                                    </div>
                                    <div class="column column1">
                                        <img class="img-responsive" src="/shared/images/fe/about/i2.jpg" alt="">
                                    </div>
                                    <div class="column column1">
                                        <img class="img-responsive" src="/shared/images/fe/about/i3.jpg" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<div class='sections vspl'>
    <div class='row row2'>
        <section class='column column4 section section-useful'>
            <header class='section--header'>
                <div class="section--label">Полезные статьи</div>
            </header>
            <div class='section--content'>
                <div class='row row2'>
                    <?php if( !empty( $lastArticles )){ ?>
                        <?php foreach( $lastArticles as $item ){ ?>
                            <div class='column column1'>
                                <div class='articleItem articleItem-short'>
                                    <div class='articleItem--title'>{$item.title}</div>
                                    <?php if( !empty( $item->smallImage->path )){ ?>
                                        <div class='articleItem--image'>
                                            <a href="{web:/}news/{$item.alias}">
                                                <img class="img-responsive" src="{web:vfs://}{$item.smallImage.path}" alt="">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class='articelItem--body'>
                                        <div class='articleItem--date'><?= $item->publicationDate->format('d.m.Y');?></div>
                                        <div class='articleItem--text'>
                                            {$item.foreword}
                                            <a href="{web:/}news/{$item.alias}">Читать далее</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class='section--footer'>
                <div class="section--tools">
	                    <a href="{web:/}articles/" class="section--tool section--tool-archive2">Читать все статьи</a>
                </div>
            </div>
        </section>
    </div>
</div>

    <section class='section section-banners vspl'>
    <div class='section--content'>
        <div class='row row2'>
            <div class='column column2'>
                <?= $tiw->GetBannerLeft(); ?>
            </div>
            <div class='column column2'>
                <?= $tiw->GetBannerRight(); ?>
            </div>
        </div>
    </div>
    <section>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}