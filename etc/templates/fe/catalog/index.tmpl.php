<?php
//print_r($__page);
    /** @var Category $object */
//    $__metaDetail = MetaDetailUtility::GetForContext( null, Page::$RequestData[0] );
//    if ( !empty($__page) ) {
//    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $object ), Page::$RequestData[0] );
    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $__category ), Page::$RequestData[0] );

    if ( empty( $__pageTitle ) ) {
        $__pageTitle = !empty( $__metaDetail->pageTitle ) ? $__metaDetail->pageTitle : $__category->title;
    }

//print_r($__category);

//    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $__page ), Page::$RequestData[0] );

        $__pageTitle       = !empty($__page->pageTitle) ? $__page->pageTitle : $__page->title;
        $__metaDescription = $__page->metaDescription;
        $__metaKeywords    = $__page->metaKeywords;
//    }

    $__breadcrumbs = array(
        array(
            'title' => 'Каталог'
        )
    );
    $__activeElement = Site::GetWebPath( '/catalog/' );
//print_r ($object);
//echo "sdfwsdfdsfsdfsd";
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
	$imgs='';$cat=[]; $imges=[];
	$j=0;
	$query="SELECT * FROM categories WHERE parentCategoryId IS NULL AND statusId='1' AND categoryId!=4"; // GROUP BY orderNumber
	$query_id1=$db->query ($query);
	while ($row=$db->get_row($query_id1)) {
		$i++;
		if($row['categoryId']==3 OR $row['categoryId']==37 OR $row['categoryId']==43) {
			$query1[$i]="SELECT * FROM categories WHERE categoryId='".$row['categoryId']."' AND statusId='1' ";
			$query_id2=$db->query ($query1[$i]);
			while ($row1=$db->get_row($query_id2)) {
				$j++;
				$query3="SELECT * FROM vfsFiles WHERE fileId=".$row1['smallImageId']." LIMIT 1";
				$query_id_small=$db->super_query ($query3);
				$images[$i][$j]=$query_id_small['path'];
				$cat[$i].='<div class="col-md-4 productItemWrapper mb-4">
					<div class="catItem ">
						<a href="/catalog/'.$row1['alias'].'/">
							<img src="/shared/files/'.$query_id_small['path'].'" class="img-fluid m-auto ategoryImage" width="200px">
						</a>
					</div>
					<a href="/catalog/'.$row1['alias'].'/">'.$row1['title'].'</a>
				</div>';
			}
		} else {
			$query1[$i]="SELECT * FROM categories WHERE parentCategoryId='".$row['categoryId']."' AND statusId='1' ";
			$query_id2=$db->query ($query1[$i]);
			while ($row1=$db->get_row($query_id2)) {
				$j=0;
				$query2[$i][$j]="SELECT * FROM objectImages WHERE objectId='".$row1['categoryId']."' AND objectClass='Category' LIMIT 1"; // GROUP BY orderNumber
				$query_id3=$db->query ($query2[$i][$j]);
				while ($row2=$db->get_row($query_id3)) {
					$j++;
					$query3="SELECT * FROM vfsFiles WHERE fileId=".$row2['bigImageId']." LIMIT 1";
					$query_id_big=$db->super_query ($query3);
					$query3="SELECT * FROM vfsFiles WHERE fileId=".$row2['smallImageId']." LIMIT 1";
					$query_id_small=$db->super_query ($query3);

					$images[$i][$j]=$query_id_small['path'];


				$cat[$i].='<div class="col-md-4 productItemWrapper mb-4">
					<div class="catItem ">
						<a href="/catalog/'.$row1['alias'].'/">
							<img src="/shared/files/'.$query_id_small['path'].'" class="img-fluid m-auto ategoryImage" width="200px">
						</a>
					</div>
					<a href="/catalog/'.$row1['alias'].'/">'.$row1['title'].'</a>
				</div>';
				}
			}
		}
	}
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row mb-4">
        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-9">
            <h1>Каталог резиновых покрытий</h1>
            <h2>Резиновое покрытие из крошки для площадок и залов</h2>
	    <div class="row"><? print_r($cat[1]); ?></div>

            <h2>Стадионы беговые дорожки</h2>
	    <div class="row"><? print_r($cat[2]); ?></div>
            <h2>Бесшовное, наливное покрытие для спортивных залов в помещениях</h2>
	    <div class="row"><? print_r($cat[4]); ?></div>
            <h2>Промышленные полы, наливные, модульные</h2>
	    <div class="row"><? print_r($cat[3]); ?></div>
            <h2>RecroStone</h2>
	    <div class="row"><? print_r($cat[5]); ?></div>
            <h2>Материалы резиновых покрытий, крошка, плитка, пигмент, клей, инструмент</h2>
            <div class="row">
                <? 
		$counterProducts = 1;
                if ( !empty( $products ) ) {  
                foreach ( $products as $product ) { 
?>
                <div class="col-md-4 productItemWrapper mb-4">
                    <div class="productItem text-center">
                        <a href="<?= LinkUtility::GetProductItemUrl( $product ); ?>" title='<? echo $product->title; ?> <? echo $product->foreword; ?>'>
				<img src="/shared/files/{$product.smallImage.path}" class="img-fluid m-auto" alt='<? echo $product->title; ?> <? echo $product->foreword; ?>'>
			</a>
                        <div class="productItem--labels">
                            <?php if ( !empty( $product->isLatest ) ) { ?>
                                <div class="productItem--label productItem--label-n"></div>
                            <?php } ?>
                            <?php if ( !empty( $product->isRecomend ) ) { ?>
                                <div class="productItem--label productItem--label-fav" title='Recro рекомендует: <? echo $product->title; ?> <? echo $product->foreword; ?>'></div>
                            <?php } ?>
                            <?php if ( !empty( $product->oldPrice ) ) { ?>
                                <div class="productItem--label productItem--label-pr"></div>
                            <?php } ?>
                        </div>
                        <div class="productItem--prices">
                            <div class="productItem--price productItem--price-new">Цена: <i><b><span itemprop="price">{$product.price}</span></b> 
				<span itemprop="priceCurrency" content="RUB"><?= !empty( $product->priceType )?ProductUtility::$PriceTypes[$product->priceType]:'руб.'; ?></span></i>
			    </div>
                            <?php if ( !empty( $product->oldPrice ) ) { ?>
                                <div class="productItem--price productItem--price-old">{$product.oldPrice} руб</div>
                            <?php } ?>
                        </div>
                    </div>
                    <a href="<?= LinkUtility::GetProductItemUrl( $product ); ?>"><h2>{$product.title}</h2></a>
                    <p>{$product.foreword}</p>
                </div>

                <?php 
if( ($counterProducts % 3) == 0) { ?>

            </div>

<div class="row">
                <?php } ?>
                <?php $counterProducts++; } ?>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}