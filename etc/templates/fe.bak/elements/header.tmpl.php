<?
    /** @var TemplateItemWrapper $tiw */
    /** @var Navigation[] $__menu */

	if (!isset($__activeElement)) $__activeElement = NULL;

    $__metaDetail = MetaDetailUtility::GetForContext( false, Page::$RequestData[0]);

    /**
     * Manual set meta or reset of meta
     */
    $__sitePageTitle    = 'Recro';
    $__pageTitle        = !empty( $__pageTitle ) ? $__pageTitle : '';
    $__metaDescription  = !empty( $__metaDescription ) ? $__metaDescription : '';
    $__metaKeywords     = !empty( $__metaKeywords ) ? $__metaKeywords : '';
    $__imageAlt         = !empty( $__imageAlt ) ? $__imageAlt : '';

	/*
	 * Meta tags from MetaDetail object or Page object
	*/
	if ( !empty( $__metaDetail ) ) {
        if ( !empty( $__metaDetail->pageTitle ) )       $__pageTitle       = $__metaDetail->pageTitle;
        if ( !empty( $__metaDetail->metaDescription ) ) $__metaDescription = $__metaDetail->metaDescription;
        if ( !empty( $__metaDetail->metaKeywords) )     $__metaKeywords    = $__metaDetail->metaKeywords;
        if ( !empty( $__metaDetail->alt) )         		$__imageAlt        = $__metaDetail->alt;
    } else if( !empty( $__page ) ) {
        $__pageTitle = !empty( $__page->pageTitle ) ? $__page->pageTitle : ( $__page->title . ' | ' . $__sitePageTitle );

        if ( !empty( $__page->metaDescription ) ) $__metaDescription = $__page->metaDescription;
        if ( !empty( $__page->metaKeywords) )     $__metaKeywords    = $__page->metaKeywords;
    }

    /**
     * Default page title
     */
    $__pageTitle = !empty( $__pageTitle ) ? $__pageTitle : $__sitePageTitle;

    $cssFiles = array(
        AssetHelper::AnyBrowser => array(

             "css://fe/custom.css"
            , "css://fe/jquery.fancybox.css"
        )
    );

    $jsFiles = array(
        "js://fe/jquery-3.3.1.min.js"
        , "js://fe/bootstrap.min.js"
        , "js://fe/jquery.fancybox.pack.js"
        , "js://fe/jquery.qtip.min.js"
        , "js://fe/custom.js"
    );

    CssHelper::Init( true );
    JsHelper::Init( true );

    CssHelper::PushGroups( $cssFiles );
    if( !empty( $cssFilesAdds ) ) {
        CssHelper::PushGroups( $cssFilesAdds );
    }

    JsHelper::PushFiles( $jsFiles );
    if( !empty( $jsFilesAdds ) ) {
        JsHelper::PushFiles( $jsFilesAdds );
    }
?>
<!DOCTYPE html>
<!--[if IE 9]>
<html lang="ru" class="ie9"> <![endif]-->
<!--[if IE 8]>
<html lang="ru" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?= LocaleLoader::$HtmlEncoding ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$__pageTitle?></title>
    <meta name="keywords" content="{form:$__metaKeywords}" />
	<meta name="description" content="{form:$__metaDescription}" />
    <meta name='yandex-verification' content='2f7afabd7c45ff86' />
    <? if (!empty( $__params[SiteParamHelper::GoogleMeta] ) ) { ?>
    <meta name='google-site-verification' content='<?= $__params[SiteParamHelper::GoogleMeta]->value ?>' />
    <? } ?>
<!--	<link rel="icon" href="{web:/favicon.ico}" type="image/x-icon" />
-->
    <link rel="shortcut icon" href="{web:/favicon.ico}" type="image/x-icon" />
    <script type="text/javascript">
        document.documentElement.id = "js";
        var root = '{web:/}';
        var controlsRoot = '{web:controls://}';
    </script>

    <link rel="canonical" href="https://recro.ru<?=Page::$RequestData[0];?>"/>
</head>
<body>
<div class="container" id="topHeader">
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-3 col-10">
			<div>
				<a href="{web:/}" class="navbar-brand">
					<img src="/shared/images/fe/index.jpg" class="img-fluid"/>
				</a>
				 <p class="slogan">Производство, продажа и монтаж покрытий из резиновой крошки</p>
			</div>
        </div>
        <div class="col-sm-6 col-md-6 col-2 d-lg-none text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#globalNavbarMobile"
                    aria-controls="globalNavbar" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="globalNavbarMobile">
                <ul class="navbar-nav" id="globalNavbarMobileInner">
                    <?php if( !empty( $__menu )){ ?>
                        <?php foreach( $__menu as $item ){ ?>
                            <?php $isActive = ($__activeElement == $item->getLink())?true:false; ?>
                            <li class="nav-item mainMenuLink">
                                <a href="{$item.url}" alt="{$item.title}">{$item.title}</a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                        <li class="divider"></li>
                    <?php if( !empty( $__catalogMenu )){ ?>
                        <?php $counter = 0; ?>
                        <?php foreach( $__catalogMenu as $item ){ ?>
                            <?php if( !empty( $item->nodes )){?>
                                <li class="nav-item catalogMenuLink dropdown">
                                    <a href="{$item.getLink()}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {$item.title}
                                    </a>
                                    <div class="dropdown-menu">
                                        <?php foreach( $item->nodes as $child ){ ?>
                                            <a  href="{$child.getLink()}" class="dropdown-item">{$child.title}</a>
                                        <?php } ?>
                                    </div>
                                </li>
                            <?php }else{ ?>
                                <li class="nav-item catalogMenuLink"><a href="{$item.url}">{$item.title}</a></li>
                            <?php } ?>
                            <?php $counter++; } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-md-6 d-none d-lg-block">
			<?php if( !empty( $__menu )){ ?>
			<ul class="list-unstyled list-inline top-menu text-center lg-text-right md-text-right mt-1">
				<?php foreach( $__menu as $item ){ ?>
				<?php $isActive = ($__activeElement == $item->getLink())?true:false; ?>
				<li class="list-inline-item">
					<a class="underline" href="{$item.url}" alt="{$item.title}">{$item.title}</a>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
			<div class="row mt-4">
				 <div class="col-md-7 d-none d-lg-block">
					<p class="address">Адрес: Московская область, г. Подольск, ул Шамотная <a class="underline" href="/contacts/">Схема проезда</a></p>
				</div>
				<!--div class="col-md-5 d-none d-lg-block">
					<p class="price-list"><?= $tiw->GetPriceList();?></p>
				</div-->
			</div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 d-lg-none text-center mb-2">
            <?= $tiw->GetPhone();?>
            <a href="tel://+74957240924" class="btn btn-primary btn-sm mt-2 pr-2 pl-2 pt-1 pb-1 mb-2 ml-3 messageTrigger " onclick="yaCounter29298175.reachGoal('request_top');return true;"  id="topFeedback">
                <i class="fa fa-phone"></i>
            </a>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 text-center d-none d-lg-block">
            <?= $tiw->GetPhone();?>
			<div class="text-right d-none d-lg-block">
				<button class="btn btn-primary btn-sm mt-2 mb-2 messageTrigger" onclick="yaCounter29298175.reachGoal('request_top');return true;"  id="topFeedback">Оставить заявку</button>
			</div>
        </div>
	</div>
</div>
<?php if( empty( $isMainPage )){?>
<hr class="d-lg-none"/>
<?php } ?>
<nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block">
    <?php if( !empty( $__catalogMenu )){ ?>
    <?php foreach( $__catalogMenu as $item ){ ?>
    <?php if( !empty( $item->nodes )){?>
    <div id="gd{$item.navigationId}" class="backgroundMenu" style="height: <?= count( $item->nodes ) * 40 ?>px">&nbsp;</div>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <div class="container">

        <div class="collapse navbar-collapse" id="globalNavbar">

            <ul class="navbar-nav  d-lg-table">
				<?php if( !empty( $__catalogMenu )){ ?>
					<?php $counter = 0; ?>
					<?php foreach( $__catalogMenu as $item ){ ?>
                    <?php if( !empty( $item->nodes )){?>
                        <li class="nav-item d-lg-table-cell dropdown">
                            <a href="{$item.getLink()}" class="dropdown-toggle">
                                {$item.title}
                            </a>
                            <div class="dropdown-menu" id="d{$item.navigationId}">
                                <?php foreach( $item->nodes as $child ){ ?>
                                    <a  href="{$child.getLink()}" class="dropdown-item">{$child.title}</a>
                                <?php } ?>
                            </div>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item d-lg-table-cell <?= empty($counter)?'text-lg-left':'';?> <?= (!empty($counter)&&($counter+1 == count($__catalogMenu)))?'text-lg-right':'';?>"><a class="nav-link" href="{$item.url}">{$item.title}</a></li>
                    <?php } ?>
                    <?php $counter++; } ?>
				<?php } ?>
            </ul>
        </div>
    </div>
</nav>
