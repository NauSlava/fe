<?
    /** @var TemplateItemWrapper $tiw */
    /** @var Navigation[] $__menu */

	if (!isset($__activeElement)) $__activeElement = NULL;
	$__metaDetail = MetaDetailUtility::GetForContext( false, Page::$RequestData[0]);

    /**    * Manual set meta or reset of meta    */
	$__sitePageTitle    = 'Recro';
	$__pageTitle        = !empty( $__pageTitle ) ? $__pageTitle : '';
	$__metaDescription  = !empty( $__metaDescription ) ? $__metaDescription : '';
	$__metaKeywords     = !empty( $__metaKeywords ) ? $__metaKeywords : '';
	$__imageAlt         = !empty( $__imageAlt ) ? $__imageAlt : '';

	/* * Meta tags from MetaDetail object or Page object */
	if ( !empty( $__metaDetail ) ) {
	        if ( !empty( $__metaDetail->pageTitle ) )       $__pageTitle       = $__metaDetail->pageTitle;
        	if ( !empty( $__metaDetail->metaDescription ) ) $__metaDescription = $__metaDetail->metaDescription;
	        if ( !empty( $__metaDetail->metaKeywords) )     $__metaKeywords    = $__metaDetail->metaKeywords;
        	if ( !empty( $__metaDetail->alt) )     		$__imageAlt        = $__metaDetail->alt;
	} else if( !empty( $__page ) ) {
        	$__pageTitle = !empty( $__page->pageTitle ) ? $__page->pageTitle : ( $__page->title . ' | ' . $__sitePageTitle );
	        if ( !empty( $__page->metaDescription ) ) $__metaDescription = $__page->metaDescription;
        	if ( !empty( $__page->metaKeywords) )     $__metaKeywords    = $__page->metaKeywords;
	}
    /**    * Default page title     */
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
/*

            , "css://fe/jquery.fancybox.css"
        , "js://fe/jquery.fancybox.pack.js"
        , "js://fe/jquery.qtip.min.js"
//        , "js://fe/bootstrap.min.js"

*/
    CssHelper::Init( false );
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title><?=$__pageTitle?></title>
	<!--Покрытия из резиновой крошки и изделия на ее основе-->
	<meta name="keywords" content="{form:$__metaKeywords}">
	<meta name="description" content="{form:$__metaDescription}">
	<meta name='yandex-verification' content='2f7afabd7c45ff86'>
	<meta property="og:locale" content="ru_RU" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$__pageTitle?>" />

	<?if(!empty($product->smallImage->path)) { ?>
	<meta property="og:image" content="/shared/files/<?=$product->smallImage->path;?>" />
	<meta property="og:image:secure_url" content="/shared/files/<?=$product->smallImage->path;?>" />  
	<? } else { if(!empty($__category->smallImage->path)){ ?>
	<meta property="og:image" content="/shared/files/<?=$__category->smallImage->path;?>" />
	<meta property="og:image:secure_url" content="/shared/files/<?=$__category->smallImage->path;?>" />  
	<? } else { ?>
	<meta property="og:image" content="https://recro.ru/shared/images/fe/slide50_480.webp" />
	<meta property="og:image:secure_url" content="https://recro.ru/shared/images/fe/slide50_480.webp" />  
	<?} } ?>


	<meta property="og:image:type" content="image/jpeg" />  <meta property="og:image:width" content="375" />  
	<meta property="og:image:height" content="281" />  
	<meta property="og:image:alt" content="Покрытия из резиновой крошки и изделия на ее основе" />
	<meta property="og:description" content="{form:$__metaDescription}" />
	<meta property="og:url" content="https://recro.ru/catalog/rezinovoe-pokrytie-is-kroshki/" />
	<meta property="og:site_name" content="Резиновая крошка и изделия на ее основе" />

	<meta name="DC.Title" content="<?=$__pageTitle?>">
	<meta name="DC.Creator" content="Recro">
	<meta name="DC.Subject" content="{form:$__metaKeywords}">
	<meta name="DC.Description" content="{form:$__metaDescription}">
	<meta name="DC.Publisher" content="ITRecro">
	<meta name="DC.Contributor" content="Recro team">
	<meta name="DC.Date" content="<?= date('Y-m-d'); ?>">
	<meta name="DC.Type" content="Collection">
	<meta name="DC.Format" content="text/html">
	<meta name="DC.Identifier" content="https://recro.ru<?= Page::$RequestData[0]; ?>">
	<meta name="DC.Source" content="">
	<meta name="DC.Language" content="ru-RU">
	<meta name="DC.Coverage" content="Российская Федерация">
	<meta name="DC.Rights" content="Recro ">
	<!--meta name="yandex-verification" content="d92cb5cbcb1aca3c"-->
    <? if (!empty( $__params[SiteParamHelper::GoogleMeta] ) ) { ?>
	<meta name='google-site-verification' content='<?= $__params[SiteParamHelper::GoogleMeta]->value ?>'>
    <? } ?>

	<link href="/shared/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet preload" as="style">
 	<link href="/shared/css/fe/bootstrap.min.css" rel="stylesheet preload" as="style">
	<link href="https://recro.ru/shared/css/fe/custom.css" rel="stylesheet preload" as ="style" >
	<link href="https://recro.ru/shared/css/fe/lightbox.css" rel="stylesheet preload" as ="style" >
	<link rel="shortcut icon" href="{web:/favicon.ico}" type="image/x-icon" />
	<?if(!empty($product->smallImage->path)) { ?>
		<link rel="preload" as="image" href="/shared/files/<?=$product->smallImage->path;?>" />
	<? } else { 
		if(!empty($__category->smallImage->path)){ ?>
			<link rel="preload" as="image" href="/shared/files/<?=$__category->smallImage->path;?>" />
	<?	 } else { ?>
		<link rel="preload" as="image" href="/shared/images/fe/slide50_480.webp" />
		<?} ?>
	<?} ?>

	<script>
	        document.documentElement.id = "js";
		var root = '{web:/}';
		var controlsRoot = '{web:controls://}';
	</script>
	<link rel="canonical" href="https://recro.ru<?=Page::$RequestData[0];?>"/>
</head>
<body>
<div class="header-wrapper">
    <div class="container">
        <div class="mobile-top">
                <a href="/" class='logo'><img src="/shared/images/fe/logonew.png" style="max-height: 100px;" class="img-fluid" alt="Recro.ru - резиновая крошка и изделия на ее основе"></a>
                <a class="phone" href="tel:8-800-555-08-07" title="Телефон для связи с Recro.ru">8-800-555-08-07</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#globalNavbarMobile"
                        aria-controls="globalNavbar" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars fa-4" aria-hidden="true"></i>
                </button>
                <div class="btnblock">
			<script data-b24-form="click/7/0zylq2" data-skip-moving="true">
				(function(w,d,u){
					var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
					var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
				})(window,document,'https://cdn-ru.bitrix24.ru/b20449236/crm/form/loader_7.js');
//				document.location.href = "https://recro.ru/thanks/";
			</script>

                    <button >Оставить заявку</button>
                    <!--button class="messageTrigger" onclick="yaCounter29298175.reachGoal('request_top');return true;"  id="topFeedback">Оставить заявку</button-->
	            <!--p class="price-list"><a href="/shared/files/201807/23_472.pdf">Скачать прайс лист</a> 862,50 Кб</p-->
                </div>

		<!--p class="address">Адрес: Московская область, г. Подольск,<br/> ул Шамотная <a class="underline" href="/contacts/">Схема проезда</a></p-->
        </div>
    </div>
    <div class="collapse navbar-collapse" id="globalNavbarMobile">
        <?php if( !empty( $__menu )){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="top-menu2">
                        <?php foreach( $__menu as $item ){ ?>
                            <?php $isActive = ($__activeElement == $item->getLink())?true:false; ?>
                            <li class="d-inline">
                            <a class="underline" href="{$item.url}" title="{$item.title}">{$item.title}</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        <ul class="navbar-nav" id="globalNavbarMobileInner">
            <?php if( !empty( $__catalogMenu )){ ?>
                <?php $counter = 0; ?>
                <?php foreach( $__catalogMenu as $item ){ ?>
                    <?php if( !empty( $item->nodes )){?>
                        <li class="nav-item catalogMenuLink dropdown ">
                            <a href="{$item.getLink()}" class="dropdown-toggle mobileCenterLi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {$item.title}
                            </a>
                            <div class="dropdown-menu">
                                <?php foreach( $item->nodes as $child ){ ?>
                                    <a  href="{$child.getLink()}" class="dropdown-item mobileCenterLi">{$child.title}</a>
                                <?php } ?>
                            </div>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item catalogMenuLink"><a href="{$item.url}" class="mobileCenterLi">{$item.title}</a></li>
                    <?php } ?>
                    <?php $counter++; } ?>
            <?php } ?>
        </ul>
    </div>
    <div class="container" id="topHeader">
                <a href="/" class="logo">
                    <img src="/shared/images/fe/logonew.png" class="img-fluid" alt="Recro.ru - резиновая крошка и изделия на ее основе">
                </a>
                 <div class="topmenu">
                        <?php if( !empty( $__menu )){ ?>
                            <ul class="list-unstyled list-inline top-menu lg-text-right md-text-right mt-1 ">
                                <?php foreach( $__menu as $item ){ ?>
                                    <?php $isActive = ($__activeElement == $item->getLink())?true:false; ?>
                                    <li class="d-inline-flex">
                                        <a class="underline" href="{$item.url}" title="{$item.title}">{$item.title}</a>
                                    </li>
                                <?php } ?>
				<li><a style='text-decoration: none;' href="tel:8-903-724-09-24"><strong>8-903-724-09-24</strong></a></li>
                            </ul>
				
                        <?php } ?>
			<p class="address"><a href="/contacts/">Работаем по всей России</a></p>
		</div>
                <div class="btnblock">
			<script data-b24-form="click/7/0zylq2" data-skip-moving="true">
				(function(w,d,u){
					var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
					var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
				})(window,document,'https://cdn-ru.bitrix24.ru/b20449236/crm/form/loader_7.js');
//				document.location.href = "https://recro.ru/thanks/";
			</script>

                    <button >Оставить заявку</button>
                    <!--button class="messageTrigger" onclick="yaCounter29298175.reachGoal('request_top');return true;"  id="topFeedback">Оставить заявку</button-->
	            <!--p class="price-list"><a href="/shared/files/201807/23_472.pdf">Скачать прайс лист</a> 862,50 Кб</p-->
                </div>
     </div>
</div>
<? if( empty( $isMainPage )){?><hr class="d-lg-none"><? } ?>
<nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block">
    <?php if( !empty( $__catalogMenu )){ ?>
    <?php foreach( $__catalogMenu as $item ){ ?>
    <?php if( !empty( $item->nodes )){?>
    <!--div id="gd{$item.navigationId}" class="backgroundMenu" style="height: <?= count( $item->nodes ) * 40 ?>px">&nbsp;</div-->
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
                                <? foreach( $item->nodes as $child ){ 
					if($child->navigationId!=68) { ?>
	                                    <a  href="{$child.getLink()}" class="dropdown-item">{$child.title}</a>
					<?} else { ?>
	                                    <a  href="/catalog/materiali/kroshka-dlya-polya" class="dropdown-item">{$child.title}</a>
                                <?php } }?>
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
