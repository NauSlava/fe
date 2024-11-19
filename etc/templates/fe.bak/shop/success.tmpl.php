<?php
    $__pageTitle = "Оформление заказа";

    $__breadcrumbs = array(
        array(
            'title'  => 'Корзина'
        )
    );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='block-content'>
    {increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
    <div class='block-body ov'>
        <div class='block-text'>
            <h1>Оформление заказа</h1>
            <p>
                Поздравляем, Ваш заказ № {$resultId} был удачно оформлен.<br/>
                В ближайшее время мы свяжемся с вами,
                для подтверждения заказа.
            </p>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
