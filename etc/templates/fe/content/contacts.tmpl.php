<?php
    if ( !empty($__page) ) {
        $__pageTitle       = !empty($__page->pageTitle) ? $__page->pageTitle : $__page->title;
        $__metaDescription = $__page->metaDescription;
        $__metaKeywords    = $__page->metaKeywords;
    }

    $__breadcrumbs = array(
        array(
            'title'  => $__page->title
        )
    );

    $__activeElement = Site::GetWebPath( '/contacts/' );

// https://p2pi.ru/hide-email.html
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
	<h1>Контакты</h1>
	<div class="contacts">
		<p style='display:block;'>Наш адрес:<br><strong>Московская область, г. Подольск, ул. Рощинская д. 3, телефон: +7 (903) 724-09-24<br>Краснодарский край, г. Краснодар, Сормовская д.7, лит г71</strong></p> 
		<p>E-mail по общим вопросам:<br><strong><script>var x1,x2,x3,x4,x5,x6,x7; x1='<a href="'; x1+='mai'; x1+='lto:'; x2 ='&#105;&#110;&#102;&#111;'; x3 ='&#64;'; x4 ='&#114;&#101;&#99;&#114;&#111;&#46;&#114;&#117;'; x5 ='">'; x6 = x2+'&#64;'+x4 ; x7 ='</a>';document.write(x1+x2+x3+x4+x5+x6+x7);</script></strong></p>
		<p>E-mail отдела продаж:<br><strong> <script>var x1,x2,x3,x4,x5,x6,x7; x1='<a href="'; x1+='mai'; x1+='lto:'; x2 ='&#115;&#97;&#108;&#101;'; x3 ='&#64;'; x4 ='&#114;&#101;&#99;&#114;&#111;&#46;&#114;&#117;'; x5 ='">'; x6 = x2+'&#64;'+x4 ; x7 ='</a>';document.write(x1+x2+x3+x4+x5+x6+x7);</script></strong></p>
		<p>Время работы офиса:<br> <strong>Понедельник-пятница, 09:00-19:00</strong></p>
		<p>Время работы склада:<br> <strong>Понедельник-пятница, 09:00-19:00</strong></p>

	</div>
	<div id="map" style="width: 100%; height:550px;border: solid 1px #cccdcd;">
	<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3069efc990f162f6fb5ea319ad2e18cedf2ac2c97a16bb684f0c8422c43fe411&amp;width=100%25&amp;height=550&amp;lang=ru_RU&amp;scroll=true"></script>
	</div>
            <!--script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
            <script type="text/javascript">
                ymaps.ready(init);
                var myMap;

                function init(){
                    myMap = new ymaps.Map("map", {
                        center: [55.459986, 37.579637],
                        zoom: 12,
                        controls: []
                    });

                    var myPlacemark = new ymaps.Placemark([55.459986, 37.579637],
                        {
                            balloonContent: ' Московская область, г. Подольск ул. Шамотная <br/>Телефон: +7 (495) 724-09-24<br/> Пн-Пт: 09:00-19.00'
                        }, {
                            preset: 'islands#governmentCircleIcon',
                            iconColor: '#3b5998'
                            /*iconLayout: 'default#image',
                            iconImageHref: '/shared/images/fe/geologo.png',
                            iconImageSize: [50, 50],
                            iconImageOffset: [-3, -42]*/
                        });

                    myMap.geoObjects.add(myPlacemark);
                }
            </script-->
            <div class="row mt-5">
                <div class="col-md-12">
                    <h2>Написать письмо</h2>
                    <p>Заполните необходимые поля. Наш сотрудник свяжется с вами в ближайшее время.</p>
                </div>
            </div>
            <form class="form form-contact" role="form" action="/contacts/" method="post">
                        <?= SecureTokenHelper::FormHidden();?>
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control <?= array_key_exists( "contact", $errors )?'has-error':""?>" type='text'  name="message[contact]" value="{$object.contact}" placeholder='Имя *'/>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6  mb-sm-3 mb-md-0">
                                <input class="form-control <?= array_key_exists( "email", $errors )?'has-error':""?>" type='text' name="message[email]"  value="{$object.email}" placeholder='Email*' />
                            </div>
                            <div class="col-md-6">
                                <input  class="form-control <?= array_key_exists( "phone", $errors )?'has-error':""?>"  type='text'  name="message[phone]" value="{$object.phone}"  placeholder='Телефон для связи' />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <textarea name="message[message]" class="form-control <?= array_key_exists( "message", $errors )?'has-error':""?>" placeholder='Ваше сообщение'>{$object.message}</textarea>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck"  name="message[isCopy]" <?=!empty($object->isCopy)?'checked="checked"':'';?>>
                                <label class="form-check-label" for="gridCheck">
                                    Отправить копию на ваш e-mail
                                </label>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary" name="save" value="true">Отправить сообщение</button>
                    </form>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
