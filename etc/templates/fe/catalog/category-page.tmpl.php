<?php

    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $__category ), Page::$RequestData[0] );

    if( empty( $__pageTitle )){
        $__pageTitle = $__category->title;
    }
    $__metaDescription = $__metaDetail->metaDescription;
    $__metaKeywords    = $__metaDetail->metaKeywords;

    $__breadcrumbs = array();
//print_r($__category);
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
                'title' => $__category->title
            )
        );
    }else{
        $__breadcrumbs = array(
            array(
                'path'  => '/catalog/'
            , 'title' => 'Каталог'
            )
        , array(
                'title' => $__category->title
            )
        );
    }

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
//if($__category->categoryId==28)
//	print_r($__category->categoryId);
	$products='';
	$query="SELECT * FROM `products` WHERE categoryId=28 AND statusId=1 ORDER BY orderNumber"; // GROUP BY orderNumber
//echo $query;
	$query_id1=$db->query ($query);
	while ($row=$db->get_row($query_id1)) {
		$query2="SELECT * FROM vfsFiles WHERE fileId=".$row['bigImageId']." LIMIT 1";
		$query_id_big=$db->super_query ($query2);
		$query2="SELECT * FROM vfsFiles WHERE fileId=".$row['smallImageId']." LIMIT 1";
		$query_id_small=$db->super_query ($query2);
//		$pr_img="<img style='width:100%; margin:0 3px 3px 0;' src='/shared/files/".$query_id_small['path']."' alt=''>";
//	$products.='<div class="productitemall" style="display:inline-block; vertical-align:top; margin:2%; width:27%;">'.$pr_img.'<a href="/catalog/kroshka-epdm/'.$row['alias'].'">'.$row['title'].'</div>';

	$products.='<div class="productitemall" style="display:inline-block; vertical-align:top; margin:2%; width:27%;">
			<img style="width:100%; margin:0 3px 3px 0;" src="/shared/files/'.$query_id_small['path'].'" alt="">
			<a href="/catalog/kroshka-epdm/'.$row['alias'].'">'.$row['title']
		.'</a></div>';
}


	$query="SELECT * FROM objectImages WHERE objectId='".$__category->categoryId."' AND objectClass='Category' "; // GROUP BY orderNumber
//echo $query;
	$query_id1=$db->query ($query);
	while ($row=$db->get_row($query_id1)) {
		$query2="SELECT * FROM vfsFiles WHERE fileId=".$row['bigImageId']." LIMIT 1";
		$query_id_big=$db->super_query ($query2);
		$query2="SELECT * FROM vfsFiles WHERE fileId=".$row['smallImageId']." LIMIT 1";
		$query_id_small=$db->super_query ($query2);

		$imgs.="<a class='galleryitempreview' data-lightbox='cataloggallery' href='/shared/files/".$query_id_big['path']."' title='".$query_id_big['title']."' >
				<img style='width:135px; margin:0 3px 3px 0;' src='/shared/files/".$query_id_small['path']."' alt='".$query_id_big['title']."'>
			</a>";
	}
    $__activeElement = Site::GetWebPath( '/catalog/' );

//print_r($__category);
//echo $__pageTitle.'dcvsdcascsa';

?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 col-lg-9 col-12">
            <h1>{$__pageTitle}</h1>
		<!--p style='width:100%;display: inline-block;text-align: left;color: #e65224;margin: 20px 0 10px;'>Срочный выезд на ваш объект в день обращения.<br><span style='color: #212529;'>Оставьте заявку и с вами свяжется наш лучший менеджер!</span></p--> 
		<div class='fb-block' style=''>
			<p>Оставьте заявку и получите скидку до 5% на EPDM крошку Recro</p>
			<div style='margin-bottom:20px; float:right; width: 100%;'>
				<script data-b24-form="click/7/0zylq2" data-skip-moving="true">
					(function(w,d,u){
						var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
						var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
					})(window,document,'https://cdn-ru.bitrix24.ru/b20449236/crm/form/loader_7.js');
				</script>
				<button data-title="{$__category.title}" class=" button button-orange" onclick="yaCounter29298175.reachGoal('request_main');return true;">Оставить заявку</button>
			</div>
        	</div>
            <div class="row">
                <div class="col-md-7 col-sm-12 col-12">
                    <div class="productItem--image">
                        <!--a class="fancybox a1"  rel="{$__category.categoryId}" href="/shared/files/{$__category.image.path}"-->
			<a href="/shared/files/{$__category.image.path}" data-lightbox="cataloggallery" data-title="{$__pageTitle}">
                        <img alt="{$__pageTitle}" title="{$__pageTitle}" class="img-fluid" src="/shared/files/{$__category.image.path}">
                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-12 scrollbar">
                    <div class="row mt-4 mt-lg-0 ">
                        <?php
echo $imgs;
/*
				foreach( $image as $images ){
echo $images[3]; ?>
                                <!--div class="col-md-4 col-sm-4 col-4 mb-3 thumb-post">
                                    <!--a class="img-fluid fancybox " rel="{$__category.categoryId}" href="{web:vfs://}{$image.bigImage.path}"->
					<a href="{web:vfs://}{$images.path}" data-lightbox="cataloggallery" data-title="{$product.title}">
					<img alt="{$__pageTitle}" class="img-fluid" title="{$__pageTitle}" src="/shared/files/{$image.smallImage.path}">1</a>
                                </div-->
                        <?php }*/ ?>
                    </div>
                </div>
            </div>

            <hr  class="mt-4 mb-4"/>
            {$__category.content}
<?		if($__category->categoryId==52)
			
			echo '<div class="pr_lst" style="display:inline-block;">'.$products.'</div>';
?>
            <?php if( !empty( $__category->foreword ) ){ ?>
                <hr class="mt-3 mb-3"/>
                {$__category.foreword}
            <?php } ?>
		<div class='fb-block' style=''>
			<p>Оставьте заявку и получите скидку до 5% на EPDM крошку Recro</p>
			<div style='margin-bottom:20px; float:right; width: 100%;'>
				<script data-b24-form="click/7/0zylq2" data-skip-moving="true">
					(function(w,d,u){
						var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
						var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
					})(window,document,'https://cdn-ru.bitrix24.ru/b20449236/crm/form/loader_7.js');
				</script>
				<button data-title="{$__category.title}" class=" button button-orange" onclick="yaCounter29298175.reachGoal('request_main');return true;">Оставить заявку</button>
			</div>
        	</div>

            <hr  class="mt-4 mb-4"/>

            <?php $counterArticles = 1;
		$art=0;
	        if (!empty($lastArticles)){ 
		?>
	            <div class="row leftarticles">
			<h3>Полезные статьи</h3>
	        	    <?php foreach ($lastArticles as $item){
				$art++;
				if($art<4) {
				 ?>
			            <div class="articleItem mb-4">
        			        <a href="{web:/}articles/{$item.alias}" class="h5 d-block"><h4>{$item.title}</h4></a>
                			<p>
		                	    <span class="articleDate"><?= $item->publicationDate->format('d.m.Y'); ?></span>. <? echo substr($item->foreword,0,500);?>
	        		            <a href="{web:/}articles/{$item.alias}">Читать далее</a>
		        	        </p>
			            </div>
		            <?php } } //print_r($item);?>

	            </div>
            <?php } ?>

            <?php if( !empty( $examples )){ ?>
                <section class='section section-examples'>
                    <header class='section--header section--header-10'>
                        <div class="section--label galleryItem--title h5">Примеры применения</div>
                    </header>
                    <div class='section-content'>
                        <div class='row'>
                            <?php foreach( $examples as $image ){ ?>
                                <div class="col-md-4 mb-3">
                                    <!--a class="fancybox" rel="pr{$__category.categoryId}" href="{web:vfs://}{$image.bigImage.path}"-->
					<a href="{web:vfs://}{$image.bigImage.path}" data-lightbox="cataloggallery" data-title="{$product.title}">
						<img class="img-fluid" alt="{$__pageTitle}" title="{$__pageTitle}" src="/shared/files/{$image.smallImage.path}">
					</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </div>


        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>

    </div>
</div>
<section id="sectionAbout" class="pt-5">
    <div class="container">
        <div class="row pt-4">
            <div class="col-md-12 maintext">
                <!--h2>Компания Recro создана в 2014 году с целью производства и реализации резиновой крошки и изделий на ее основе.</h2-->
		<h2>Компания Recro работает с 2014 года, производит резиновую и каучуковую крошку, формованную плитку, производит монтаж покрытий различного назначения</h2>
                <h3>Структура компании включает в себя:</h3>
                <ul class='maintextlist'>
			<li><span class="circle-number">1</span><h4><span class='aspan'>700 м2 в день</span>Осуществляем в среднем от 700м2 покрытия за день за счет профессионализма бригад</h4>
			<li><span class="circle-number">2</span><h4><span class='aspan'>Высококвалифицированные бригады</span>Технический специалисты с большим профессиональным стажем</h4>
			<li><span class="circle-number">3</span><h4><span class='aspan'>Выезд в день обращения</span> Спасем ваши сроки, мы знаем как для вас это важно. Все материалы для работы в наличии</h4>
			<li><span class="circle-number">4</span><h4><span class='aspan'>Собственное производство</span>Это позволяет нам гарантировать высокий уровень качества и повышенную износостойкость покрытий</h4>
			<li><span class="circle-number">5</span><h4><span class='aspan'>Гарантия качества</span>Мы уверенны в своём качестве материалов и укладки покрытия</h4>
			<li><span class="circle-number">6</span><h4><span class='aspan'>Доступные цены</span>Выстроенные процессы и регламенты работ, собственное производство</h4>
                </ul>
            </div>
        </div>
    </div>
</section>

{increal:tmpl://fe/elements/footer.tmpl.php}
<script src="/shared/js/fe/lightbox.js"></script>