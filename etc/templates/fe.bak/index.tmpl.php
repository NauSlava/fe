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
            <h2>Recro</h2>
            <p>
                Проектирование, строительство и оснащение спортивных объектов.<br/>
				Устройство покрытий беговых дорожек, футбольных полей и спортивных залов.
            </p>
        </div>
    </div>
</section>
<div class="container mt-2 mb-5">
    <div class="row mt-4 mb-4">
        <h4 class="col-md-6 col-sm-12 ">Популярные товары</h4>
    </div>
	<div class="row">
	<?php if( !empty( $__recomendProducts )){ ?>
		<?php foreach( $__recomendProducts as $item ){ ?>
		<div class="col-lg-3 col-md-4 col-sm-6 productItemWrapper mb-4">
            <div class="productItem text-center">
				<a href="<?= LinkUtility::GetProductItemUrl( $item );?>">
					<img src="{web:vfs://}{$item.smallImage.path}" class="img-fluid"/>
				</a>
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
                <div class="productItem--prices">
					<div class="productItem--price productItem--price-new">Цена {$item.price} руб.</div>
					<?php if( !empty( $item->oldPrice )){ ?>
					<div class="productItem--price productItem--price-old">{$item.oldPrice} руб</div>
					<?php } ?>
				</div>
            </div>
            <a href="<?= LinkUtility::GetProductItemUrl( $item );?>">{$item.title}</a>
            <p>{$item.foreword}</p>
        </div>
		<?php } ?>
    <?php } ?>
	</div>
    <div class="row" id="recomendProductMore"></div>
    <div class="row mt-2 mb-5">
        <div class="col-md-12 text-center">
            <a href="" data-page="1" id="getMoreProducts" class="getMore">Загрузить еще товаров</a>
        </div>
    </div>
</div>
<section id="sectionAbout" class="pt-5">
    <div class="container">
        <div class="row pt-4">
            <div class="col-md-3">
                <img src="/shared/images/fe/logo-white.png" class="img-fluid"/>
            </div>
            <div class="col-md-9">
                <h1>Производство, продажа и укладка покрытий из резиновой крошки</h1>
                <p>Компания Recro создана в 2014 году с целью производства и реализации резиновой крошки и изделий на ее основе.</p>

                <p>Структура компании включает в себя:</p>
                <ul>
                    <li>Завод по производству плитки из резиновой крошки методом горячего формования.</li>
                    <li>Завод по производству EPDM гранул.</li>
                    <li>Складской комплекс для обеспечения бесперебойных поставок производителей покрытий резиновой крошкой,
                        полиуретановым связующим, красящими пигментами и инструментами для укладки.</li>
                    <li>Профессиональные бригады по укладке покрытий из резиновой крошки.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container mt-5">
    <div class="row mt-4 mb-4">
         <a class="h4 col-md-6" href="/gallery/">Наши работы</a>
    </div>
    <div class="row">
		<div class="col-md-3 col-sm-6 mt-2 text-center">
			<a href="/gallery/">
				<img src="/shared/images/fe/works/1.jpg" class="img-fluid"/>
			</a>
        </div>
        <div class="col-md-3 col-sm-6 mt-2 text-center">
			<a href="/gallery/">
				<img src="/shared/images/fe/works/2.jpg" class="img-fluid"/>
			</a>
        </div>
        <div class="col-md-3 col-sm-6 mt-2 text-center">
			<a href="/gallery/">
				<img src="/shared/images/fe/works/3.jpg" class="img-fluid"/>
			</a>	
        </div>
        <div class="col-md-3 col-sm-6 mt-2 text-center">
			<a href="/gallery/">
				<img src="/shared/images/fe/works/4.jpg" class="img-fluid"/>
			</a>	
        </div>
    </div>
	<hr class="mt-5 mb-5"/>
	<div class="row">
		<div class="col-md-12"><h4>Наши клиенты</h4></div>
	</div>
	<div class="row mt-5 d-flex justify-content-center">
		<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/1.jpg"/></div>
		<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/2.jpg"/></div>
		<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/3.jpg"/></div>
		<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/4.jpg"/></div>
		<div class="col-md-2 col-sm-2 col-4 mb-4"><img class="img-fluid" src="/shared/images/fe/builders/5.jpg"/></div>
	</div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}