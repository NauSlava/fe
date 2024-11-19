<?php
    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $product ), Page::$RequestData[0] );

    if( empty( $__pageTitle )){
        $__pageTitle = !empty( $__metaDetail->pageTitle )?$__metaDetail->pageTitle:$product->title . ' ' . $product->foreword;
    }
    $__metaDescription = $__metaDetail->metaDescription;
    $__metaKeywords    = $__metaDetail->metaKeywords;

/*

    if ( !empty($__page) ) {
        $__pageTitle = !empty( $__metaDetail->pageTitle )?$__metaDetail->pageTitle:$product->title . ' ' . $product->foreword;
        $__metaDescription = $__page->metaDescription;
        $__metaKeywords    = $__page->metaKeywords;
    }
*/
    $__breadcrumbs = array();

    if( !empty( $__category->parentCategory->alias )){
        $__breadcrumbs = array(
            array(
                'path'  => '/catalog/'
                , 'title' => 'Каталог'
            )
            , array(
                'path'  => '/catalog/' . $__category->parentCategory->alias . '/'
                , 'title' => $__category->parentCategory->title
            )
            , array(
                'path'  => '/catalog/' . $__category->alias . '/'
                , 'title' => $__category->title
            )
            , array(
                'title' => $product->title
            )
        );
    }else{
        $__breadcrumbs = array(
            array(
                'path'  => '/catalog/'
                , 'title' => 'Каталог'
            )
            , array(
                'path'  => '/catalog/' . $__category->parentCategory->alias . '/'
                , 'title' => $__category->title
            )
            , array(
                'title' => $product->title
            )
        );
    }

    $__activeElement = Site::GetWebPath( '/catalog/' );

	define('ROOT_DIR', $path);
	define('PIENGINE',true);
	define('ENGINE_DIR', '/home/b/born2fly/public_html/shared/myengine');
	define('INC_DIR', '/home/b/born2fly/public_html/include');
	require_once ENGINE_DIR.'/classes/mysql.php';

	define ("DBHOST", "localhost"); 
	define ("DBNAME", "born2fly_new");
	define ("DBUSER", "born2fly_new"); 	
	define ("DBPASS", "zNjGXInHcAyIIBKAi8V4");  
	define ("COLLATE", "UTF8"); 

	$db = new db;
	$i=0;
	$imgs='';
	$query="SELECT * FROM objectImages WHERE objectId='".$product->productId."' AND objectClass='Product' "; // GROUP BY orderNumber
//echo $query;
	$query_id1=$db->query ($query);
	while ($row=$db->get_row($query_id1)) {

		$query2="SELECT * FROM vfsFiles WHERE fileId=".$row['bigImageId']." LIMIT 1";
		$query_id_big=$db->super_query ($query2);
		$query2="SELECT * FROM vfsFiles WHERE fileId=".$row['smallImageId']." LIMIT 1";
		$query_id_small=$db->super_query ($query2);

		$imgs.="<a class='galleryitempreview' data-lightbox='cataloggallery' href='/shared/files/".$query_id_big['path']."' title='".$query_id_big['title']."' >
				<img style='width:90px; margin:0 5px 5px 0;' src='/shared/files/".$query_id_small['path']."' alt=''>
			</a>";
	}

	$product->examples=$imgs;
?>
{increal:tmpl://fe/elements/header.tmpl.php}

{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container wwww">
    <div class="row mb-4">
        <div class="col-lg-3 sidebar d-none d-lg-block">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-lg-9 col-md-12" itemscope itemtype="http://schema.org/Product">
                    <h1 itemprop="name">{$__pageTitle}</h1>
            <div class="row">
                <div class="col-lg-9 col-md-8 order-0 order-md-0 order-lg-0 mb-3">
                    <div class="productItem bigimg">
                        <!--a class="fancybox1" href="/shared/files/{$product.bigImage.path}" rel="{$product.productId}">
                            <img itemprop="image" alt="{$product.title}" class="img-fluid " title="{$product.title}" src="/shared/files/{$product.bigImage.path}"-->
			<a href="/shared/files/{$product.bigImage.path}" data-lightbox="cataloggallery" data-title="{$product.title}">
				<img src='/shared/files/{$product.bigImage.path}' alt='{$product.title}'>
			</a>
                        <!--/a-->
                        <div class="productItem--labels">
                            <div class="productItem--label productItem--label-fav"></div>
                        </div>
                    </div>
                    <div class="row mt-3 galleryProduct col-md-10 mb-4 mb-lg-0">
                        <?php 
echo $product->examples;

//print_r($product)
/*
foreach( $examples as $example ){ ?>
                             <div class="col-md-2 col-3 galleryProductFirst">
                                <!--a class="productItem--otherImage fancybox2" rel="{$product.productId}" href="{web:vfs://}{$image.bigImage.path}"-->
				<a href="{web:vfs://}{$example.bigImage.path}" data-lightbox="cataloggallery" data-title="{$product.title}">
					<img alt="{$product.title}"  class="img-fluid border" title="{$product.title}" src="/shared/files/{$example.smallImage.path}">
				</a>
                             </div>
*/
//                        <?php }
 ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 order-1 order-md-1 order-lg-1">
                    <?php if( $product->productId==85 ){ ?>
			<p>Полная цена материалов без учета работ на покрытие 14мм</p>
                    <?php } ?>
                    <button class="btn btn-default btn-block" itemprop="offers" itemscope itemtype="http://schema.org/Offer" >
                        <meta itemprop="priceCurrency" content="RUR" />
                        Цена: <span itemprop="price">{$product.price}</span>&nbsp;<?= !empty( $product->priceType )?ProductUtility::$PriceTypes[$product->priceType]:'руб.'?>
                    </button>
                    <?php if( !empty( $product->oldPrice )){ ?>
                        <div class="old">
                            Старая цена: <span class="productItem--price productItem--price-old">{$product.oldPrice} руб.</span>
                        </div>
                    <?php } ?>
			<script data-b24-form="click/7/0zylq2" data-skip-moving="true">
				(function(w,d,u){
					var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
					var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
				})(window,document,'https://cdn-ru.bitrix24.ru/b20449236/crm/form/loader_7.js');
			</script>

                    <button class="btn btn-primary btn-block mt-2 ">
                         Отправить запрос
                    </button>
                    <div class="dotted mt-4 mb-4"></div>
			<?php if( !empty( $colors )){ ?>
				<h3>Цвет</h3>
				<ul class="values-colors list-inline">
					<?php foreach( $colors as $item ){ ?><li class="list-inline-item" style="background:{$item.code}"></li><?php } ?>
				</ul>
			<?php } ?>
                    <div class="dotted mt-4 mb-4"></div>
                    <?php if (!empty($sizes)) { ?>
                        <h3>Размеры</h3>
                        <?php foreach ($sizes as $item) { ?>
                            <p>{$item.title}</p>
                        <?php } ?>
                    <?php } ?>
                    <?php if (!empty($depths)) { ?>
                        <h3>Толщина</h3>
                        <?php foreach ($depths as $item) { ?>
                            <p>{$item.title}</p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <!--p class="title title-sub"></p-->
                    <div itemprop="description" class="mb-4">
                        {$product.content}
                    </div>
                    <hr class="mb-4"/>

                    <p class="title title-sub mb-4"><h2>Характеристики:</h2></p>
                    {$product.features}

                    <hr class="mt-4 mb-4"/>

                    <p class="title title-sub"><h2>Область применения:</h2></p>
                    {$product.scope}
					
                    <hr class="mt-4 mb-4"/>
                    <?php if( !empty( $examples )){ ?>
                        <section class='section section-examples'>
                            <header class='section--header section--header-10'>
                                <div class="section--label galleryItem--title">Примеры применения</div>
                            </header>
                            <div class='section-content'>
                                <div class='row row3'>
                                    <?php foreach( $examples as $image ){ ?>
                                        <div class="column column1">
                                        	<!--a class="fancybox" rel="pr{$product.productId}" href="{web:vfs://}{$image.bigImage.path}"-->
						<a href="{web:vfs://}{$image.bigImage.path}" data-lightbox="gallery" data-title="{$product.title}">
							<img alt="{$product.title}" title="{$product.title}" class="img-responsive" alt="" src="{web:vfs://}{$image.smallImage.path}">
						</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>
                    <?php } ?>
                    </div>
            </div>

        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
<script src="/shared/js/fe/lightbox.js"></script>