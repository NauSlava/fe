<?php
    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $__category ), Page::$RequestData[0] );

    if ( empty( $__pageTitle ) ) {
        $__pageTitle = !empty( $__metaDetail->pageTitle ) ? $__metaDetail->pageTitle : $__category->title;
    }

    $__metaDescription = $__metaDetail->metaDescription;
    $__metaKeywords    = $__metaDetail->metaKeywords;

    $__breadcrumbs = array();

    if ( !empty( $__category->parentCategory->alias ) ) {
        $__breadcrumbs = array(
            array(
                'path' => '/catalog/'
            , 'title'  => 'Каталог'
            )
        , array(
                'path' => '/catalog/' . $__category->parentCategory->alias . '/'
            , 'title'  => $__category->parentCategory->title
            )
        , array(
                'title' => $__category->title
            )
        );
    } else {
        $__breadcrumbs = array(
            array(
                'path' => '/catalog/'
            , 'title'  => 'Каталог'
            )
        , array(
                'title' => $__category->title
            )
        );
    }

    $__activeElement = Site::GetWebPath( '/catalog/' );

//if($__category->categoryId==28)
//	print_r($__category->categoryId);

?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<?php if( !empty( $__childCategories )){ 

echo $__category->categoryId;
?>
<div class="container" >
    <div class="row mb-4">
        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-9">
            <h1>{$__pageTitle}</h1>
	    <div class="row">
        	<? foreach ( $__childCategories as $child ){ 
//echo $child->categoryId;
			if($child->categoryId!=50) { ?>
			        <div class="col-md-3 mb-4 p-1 productItemWrapper ">
		        	    <div class="productItem noheight">
					<a href="/catalog/{$child.alias}/">
						<img src="/shared/files/{$child.image.path}" class="img-fluid m-auto ategoryImage"/>
					</a>
			            </div>
	        		    <a href="/catalog/{$child.alias}/">{$child.title}</a>
			        </div>
	        	<?php } else { ?>
			        <div class="col-md-3 mb-4 p-1 productItemWrapper ">
        			    <div class="productItem noheight">
					<a href="/catalog/dlya-begovyh-pokrytiy/recro-tartsw">
						<img src="/shared/files/{$child.image.path}" class="img-fluid m-auto ategoryImage"/>
					</a>
			            </div>
			            <a href="/catalog/materiali/kroshka-dlya-polya">{$child.title}</a>
			        </div>
			<? }
		}  ?>
            </div>
	    <div class="row">
            <?php if( !empty( $__category->foreword ) ){ ?>
                {$__category.foreword}
            <?php } ?>

	    </div>
	</div>
    </div>
</div>
<?php } else { ?>
    <div class="container dddd">
        <div class="row mb-4">
            <div class="col-md-3 sidebar">
                {increal:tmpl://fe/elements/sidebar.tmpl.php}
            </div>
            <div class="col-md-9">
                <h1 class="mb-4">{$__pageTitle}</h1>
                <div class="row">
                    <?php 
			if($products[65]->productId==65) echo '<p class="col-md-12" style="font-size:20px;">Благодаря особенностям производства, окрашенная крошка Recro Color имеет яркий насыщенный цвет. По своим качествам и цвету она не уступает <a href="/catalog/kroshka-epdm/" target="_blank">EPDM крошке</a>, но при этом практически в два раза дешевле.<br><br><strong>По вашему запросу, мы можем отправить образцы крошки и вы сами убедитесь в ее качестве!</strong></p>';
			$counterProducts = 1;?>
                    <?php if ( !empty( $products ) ) { ?>
                    <?php foreach ( $products as $product ) { ?>
                    <div class="col-md-4 productItemWrapper mb-4">
                        <div class="productItem">
				<a href="<?= LinkUtility::GetProductItemUrl( $product ); ?>">
					<img src="/shared/files/{$product.smallImage.path}" class="img-fluid m-auto" alt="<?= $product->title; ?>">
				</a>
                            <div class="productItem--labels">
                                <?php if ( !empty( $product->isLatest ) ) { ?>
                                    <div class="productItem--label productItem--label-n"></div>
                                <?php } ?>
                                <?php if ( !empty( $product->isRecomend ) ) { ?>
                                    <div class="productItem--label productItem--label-fav"></div>
                                <?php } ?>
                                <?php if ( !empty( $product->oldPrice ) ) { ?>
                                    <div class="productItem--label productItem--label-pr"></div>
                                <?php } ?>
                            </div>
                            <div class="productItem--prices">
                                <div class="productItem--price productItem--price-new" title="<?= $product->title; ?> цена за <?= mb_substr(strip_tags(ProductUtility::$PriceTypes[$product->priceType]),1);?>, цвет: {$product.foreword},">
					Цена: <i><b><span itemprop="price">{$product.price}</span></b> <span itemprop="priceCurrency" content="RUB"><?= !empty( $product->priceType )?ProductUtility::$PriceTypes[$product->priceType]:'руб.'; ?></span></i></div>
                                <?php if ( !empty( $product->oldPrice ) ) { ?>
                                    <div class="productItem--price productItem--price-old">{$product.oldPrice} руб</div>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="<?= LinkUtility::GetProductItemUrl( $product ); ?>">{$product.title}</a>
                        <p>{$product.foreword}</p>
                    </div>
                    <?php if( ($counterProducts % 3) == 0){ ?>
                    </div><div class="row">
                    <?php } ?>
                    <?php $counterProducts++; } ?>
                    <?php } ?>
                </div>
                <?php if ( empty( $__pageNumber ) && !empty( $__category->content ) ) { ?>
                <hr/>
                <div class="row mt-4">
                    <div class="col-md-12">
                        {$__category.content}
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
{increal:tmpl://fe/elements/footer.tmpl.php}
