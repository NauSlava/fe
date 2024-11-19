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
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    {$__page.content}
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <h5>Написать письмо</h5>
                    <p>Заполните необходимые поля. Наш сотрудник свяжется с вами в ближайшее время.</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-12 col-md-12">
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
            </div>
        </div>
        <div class="col-md-4">
            <div id="map" style="width: 100%; height:300px"></div>
            <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
            <script type="text/javascript">
                ymaps.ready(init);
                var myMap;

                function init(){
                    myMap = new ymaps.Map("map", {
                        center: [55.459986, 37.579637],
                        zoom: 13,
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
            </script>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
