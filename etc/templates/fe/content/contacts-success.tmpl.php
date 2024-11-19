<?php
    if ( !empty($__page) ) {
        $__pageTitle       = !empty($__page->pageTitle) ? $__page->pageTitle : $__page->title;
        $__metaDescription = $__page->metaDescription;
        $__metaKeywords    = $__page->metaKeywords;
    }
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="h4 mt-5">Запрос отправлен</h1>
            <p>Спасибо за обращение. Ваше сообщение отправлено.<br>Наши менеджеры свяжутся с Вами в ближайшее время</p>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}