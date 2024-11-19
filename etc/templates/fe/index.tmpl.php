<?php
    /** @var TemplateItemWrapper $tiw */
    $__activeElement = Site::GetWebPath( '/' );
    $certificates = $tiw->GetByAlias( "certifications" );
    $isMainPage = true;
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<section id="slider">
    <div class="container">
        <div id="blockSlider">
            <h1>Производство и монтаж профессиональных беговых покрытий<br>Оснащение спортивных объектов</h1>
            <p>Собственное производство, склады готовой продукции, опыт укладки покрытий с 2014 года, профессиональные бригады монтажников.</p>
        </div>
    </div>
</section>
<div class="container" style='margin: 50px auto;'>
        <h2>Популярные товары для покрытий из резиновой крошки</h2>
	<div class="row">
	<?php if( !empty( $__recomendProducts )){ 
		foreach( $__recomendProducts as $item ){ ?>
		<div class="col-lg-3 col-md-4 col-sm-6 productItemWrapper mb-4">
			<div class="productItem text-center">
				<a href="<?= LinkUtility::GetProductItemUrl( $item );?>">
					<img src="{web:vfs://}{$item.smallImage.path}" class="img-fluid" alt="{$item.title}">
				</a>
		                <div class="productItem--labels">
				<? 	if( !empty( $item->isLatest )){ ?><div class="productItem--label productItem--label-n"></div><? } 
					if( !empty( $item->isRecomend )){ ?><div class="productItem--label productItem--label-fav"></div><? } 
					if( !empty( $item->oldPrice )){ ?><div class="productItem--label productItem--label-pr"></div><? } ?>
				</div>
                		<div class="productItem--prices">
					<div class="productItem--price productItem--price-new">Цена {$item.price} руб.</div>
					<?php if( !empty( $item->oldPrice )){ ?>
					<div class="productItem--price productItem--price-old">{$item.oldPrice} руб</div>
					<?php } ?>
				</div>
			</div>
			<a href="<?= LinkUtility::GetProductItemUrl( $item );?>"><h3>{$item.title}</h3></a>
			<p>{$item.foreword}</p>
		</div>
		<?php } ?>
    <?php } ?>
	</div>
	<div class="row" id="recomendProductMore"></div>
	<div class="row mt-2 mb-5">
		<div class="col-md-12 text-center">
			<a href="" data-page="1" id="getMoreProducts" class="getMore">Загрузить еще</a>
		</div>
	</div>
</div>
<section id="sectionAbout" class="pt-5">
    <div class="container">
        <div class="row mt-4 mb-5">
            <div class="col-md-12 maintext">
                <!--h2>Компания Recro создана в 2014 году с целью производства и реализации резиновой крошки и изделий на ее основе.</h2-->
		<h2>Компания Recro работает с 2014 года, производит резиновую и каучуковую крошку, формованную плитку, производит монтаж покрытий различного назначения</h2>
                <h3>Структура компании включает в себя:</h3>
                <ul class='maintextlist mt-3'>
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
<div class="container mt-5">
	<a class="ourworks" href="/gallery/"><h2>Резиновая крошка и резиновые покрытия. Примеры работ</h2></a>
	<div class="row mb-5">
		<div class="col-md-6 col-sm-12 mt-2 text-center">
		<a href="/gallery/"><img src="/shared/images/fe/nleft-w.webp" class="img-fluid" alt="Готовые работы recro"></a>
        </div>
        <div class="col-md-6 col-sm-12 mt-2 text-center">
		<a href="/gallery/"><img src="/shared/images/fe/nright-w.webp" class="img-fluid" alt="Готовые работы recro"></a>
        </div>
    </div>
    <div class="row mt-5 mb-4">
        <div class="col-md-12 articles">
		<h2>Резиновая крошка. Статьи по применению</h2>
		<?php $counterArticles = 1;
	        if (!empty($lastArticles)){ ?>
                <div class="row">
                <?php foreach ($lastArticles as $item){ ?>
                    <div class="col-md-6 articleItem mb-4">
                        <a href="{web:/}articles/{$item.alias}" class="h5 d-block">{$item.title}</a>
                        <p>
                            {$item.foreword}
                            <a href="{web:/}articles/{$item.alias}" title='{$item.title}'>Читать далее</a>
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
    <div class="row mt-2 mb-5">
        <div class="col-md-12 text-center">
            <a href="/articles/" class="getMoreA">Посмотреть все статьи</a>
        </div>
    </div>
	<hr class="mt-5 mb-5"/>
	<div class="builders">
		<h2>Застройщики выбравшие резиновое покрытие Recro</h2>
		<div class="row mt-5 d-flex justify-content-around">
			<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/1.jpg" alt="Группа ПИК"></div>
			<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/2.jpg" alt="А101 комфорт"></div>
			<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/3.jpg" alt="МосКомСпорт"></div>
			<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/4.jpg" alt="МосГорПарк"></div>
			<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/5.jpg" alt="Ашан"></div>
		</div>
	</div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}