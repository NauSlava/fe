<?php
    if ( empty( $__noMenu ) ) {
        $__noMenu = false;
    }

    $__breadcrumbs = !empty( $__breadcrumbs ) ? $__breadcrumbs : array();

    $__currentLang = ( class_exists( "LocaleLoader" ) ) ? LocaleLoader::$CurrentLanguage : "ru";

    if ( empty( $__pageTitle ) ) {
        $__pageTitle = ( class_exists( "LocaleLoader" ) ) ? LocaleLoader::Translate( "vt.common.title" ) : "Virtual Terminal";
    }

    /** Menu Structure */
    $__menu = array(
        "static-pages" => array(
            "title"  => "vt.menu.staticPages"
            , "link" => "vt://static-pages/"
            , "menu" => array(
                array(
                    "title"  => "vt.menu.navigations"
                    , "link" => "vt://navigations/"
                )
                , array(
                    "title"  => "vt.menu.navigationTypes"
                    , "link" => "vt://navigations/types/"
                )
                , array(
                    "title"  => "vt.menu.metaDetails"
                    , "link" => "vt://meta-details/"
                )
            )
        )
        , "documents" => array(
            "title"  => "vt.menu.documents"
            , "link" => "vt://documents/"
            , "menu" => array(
                array(
                    "title"  => "vt.menu.albums"
                    , "link" => "vt://albums/"
                )
            )
        )
        , "feedbacks" => array(
            "title"  => "vt.menu.feedbacks"
            , "link" => "vt://feedbacks/"
        )
        , "products" => array(
            "title"  => "vt.menu.products"
            , "link" => "vt://products/"
            , "menu" => array(
                array(
                    "title"  => "vt.menu.categories"
                    , "link" => "vt://products/categories/"
                )
                , array(
                    "title"  => "vt.menu.brands"
                    , "link" => "vt://brands/"
                )
                , array(
                    "title"  => "vt.menu.colors"
                    , "link" => "vt://colors/"
                )
                , array(
                    "title"  => "vt.menu.sizes"
                    , "link" => "vt://sizes/"
                )
                , array(
                    "title"  => "vt.menu.depths"
                    , "link" => "vt://depths/"
                )
            )
        )
        , 'forms' => array(
            'title'  => 'vt.menu.forms'
            , 'link' => 'vt://forms/'
            , 'menu' => array(
                array(
                    'title'  => 'vt.menu.formResults'
                    , 'link' => 'vt://forms/results/'
                )
                , array(
                    'title'  => 'vt.menu.formFields'
                    , 'link' => 'vt://forms/fields/'
                )
            )
        )
        , "site-params" => array(
            "title"  => "vt.menu.siteParams"
            , "link" => "vt://site-params/"
            , "menu" => array(
                array(
                    "title"  => "vt.menu.users"
                    , "link" => "vt://users/"
                )
                , array(
                    'title'  => 'vt.menu.templateItems'
                    , 'link' => 'vt://template-items/'
                )
                , array(
                    "title"  => "vt.menu.vfs"
                    , "link" => "vt://vfs/"
                )
                , array(
                    "title"  => "vt.menu.memcached"
                    , "link" => "vt://modules/memcached"
                )
            )            
        )
        , "exit" => array (
            "title"  => "vt.menu.exit"
            , "link" => "vt://login"
            , "menu" => array(
                array(
                    "title"  => "vt.menu.logout"
                    , "link" => "vt://login"
                )
                , array(
                    "title"  => "vt.menu.toSite"
                    , "link" => "/"
                )
                , array(
                    "title"    => "vt.menu.toSiteNew"
                    , "link"   => "/"
                    , "target" => "_blank"
                )
            )
        )
    );

    $cssFiles = array(
        AssetHelper::AnyBrowser => array(
            'css://vt/common.css'
            , 'css://vt/tags.css'
            , 'css://vt/classes.css'
            , 'css://vt/layout.css'
            , 'css://vt/ui.css'
            , 'css://vt/custom.css'

            , 'js://ext/fancybox/jquery.fancybox-1.3.4.css'
        )
        , AssetHelper::IE7 => array(
            'css://vt/common-ie.css'
            , 'css://vt/tags-ie.css'
            , 'css://vt/classes-ie.css'
            , 'css://vt/layout-ie.css'
        )
    );

    $jsFiles = array(
        'js://ext/jquery/jquery.js'
        , 'js://ext/jquery.plugins/jquery.superfish.js'
        , 'js://ext/jquery.plugins/jquery.clearable.js'
        , 'js://ext/jquery.plugins/jquery.datetimepicker.js'
        , 'js://ext/jquery.plugins/jquery.maskedinput.js'
        , 'js://ext/jquery.plugins/jquery.confirmdialog.js'
        , 'js://ext/jquery.plugins/jquery.blockui.js'
        , 'js://ext/jquery.plugins/jquery.cookie.js'
        , 'js://ext/jquery.ui/jquery-ui.js'

        , 'js://ext/fancybox/jquery.easing-1.3.pack.js'
        , 'js://ext/fancybox/jquery.fancybox-1.3.4.js'

        , 'js://vfs/vfsConstants.'. $__currentLang . '.js'

        , 'js://vt/locale/'. $__currentLang . '.js'
        , 'js://vt/counter.js'
        , 'js://vt/script.js'
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
<html lang="ru">
<head>
	<title><?= $__pageTitle ?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
	<meta http-equiv="Content-Type" content="text/html; charset=<?= LocaleLoader::$HtmlEncoding ?>" />

	<script type="text/javascript">
		document.documentElement.id = "js";
		var root = '{web:/}';
		var controlsRoot = '{web:controls://}';
	</script>
 	<link href="/shared/css/vt/common.css" rel="stylesheet">
 	<link href="/shared/css/vt/tags.css" rel="stylesheet">
 	<link href="/shared/css/vt/classes.css" rel="stylesheet">
 	<link href="/shared/css/vt/layout.css" rel="stylesheet">
 	<link href="/shared/css/vt/ui.css" rel="stylesheet">
 	<link href="/shared/css/vt/custom.css" rel="stylesheet">
 	<link href="/shared/js/ext/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">

	<script src="/shared/js/ext/jquery/jquery.js"></script>
	<script src="/shared/js/ext/jquery.plugins/jquery.superfish.js"></script>
	<script src="/shared/js/ext/jquery.plugins/jquery.clearable.js"></script>
	<script src="/shared/js/ext/jquery.plugins/jquery.datetimepicker.js"></script>
	<script src="/shared/js/ext/jquery.plugins/jquery.maskedinput.js"></script>
	<script src="/shared/js/ext/jquery.plugins/jquery.confirmdialog.js"></script>
	<script src="/shared/js/ext/jquery.plugins/jquery.blockui.js"></script>
	<script src="/shared/js/ext/jquery.plugins/jquery.cookie.js"></script>
	<script src="/shared/js/ext/jquery.ui/jquery-ui.js"></script>

	<script src="/shared/js/ext/fancybox/jquery.easing-1.3.pack.js"></script>
	<script src="/shared/js/ext/fancybox/jquery.fancybox-1.3.4.js"></script>
	<script src="/shared/js/vfs/vfsConstants.ru.js"></script>
	<script src="/shared/js/vt/locale/ru.js"></script>
	<script src="/shared/js/vt/counter.js"></script>
	<script src="/shared/js/vt/script.js"></script>
	<script src="/shared/js/vt/translit-alias.js"></script>
    <?= JsHelper::Flush(); ?>
</head>
<body>
    <? if ( !$__noMenu ) { ?>
        {increal:tmpl://vt/elements/menu/menu.tmpl.php}
    <? } ?>