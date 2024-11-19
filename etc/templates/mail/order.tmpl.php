<? /** @var FormResult $formResult */ ?>
<? /** @var Order $order */ ?>
<?php $fields = array( "contact", "email", "phone", "address" ); ?>
Здравствуйте, поступил новый заказ №{$order.orderId}.<br/><br/>
<h2>Данные заказа</h2>
<table>
    <?php foreach( $fields as $item ){ ?>
    <?php if( !empty( $order->$item ) ){ ?>
    <tr>
        <th align="left"><?= LocaleLoader::Translate( "fe.$item"); ?></th>
        <td><?= $order->$item ?></td>
    </tr>
    <?php } ?>
    <?php } ?>
    <tr>
        <th align="left">Дата создания</th>
        <td><?= $order->createdAt->DefaultFormat() ?></td>
    </tr>
</table>

<h2>Корзина</h2>
<table border="1">
    <thead><tr>
        <th width="45%">Название</th>
        <th width="15%">Вариант</th>
        <th width="15%">Цена, р.</th>
        <th width="10%">Кол-во</th>
        <th width="20%">Стоимость, р.</th>
    </tr></thead>
    <? foreach( $order->orderDetails as $item ) { ?>
        <tr>
            <td><a target="_blank" href="{$item[url]}">{$item[baseTitle]}</a></td>
            <td><?= !empty( $item['title'] ) ? $item['title'] : '-' ?></td>
            <td align="right"><?= TextRender::GetRurString( $item['price'], false ) ?></td>
            <td align="right">{$item[quantity]}</td>
            <td align="right"><?= TextRender::GetRurString( $item['totalPrice'], false ) ?></td>
        </tr>
    <? } ?>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td align="right"  colspan="4">Итого</td>
        <td align="right"><strong><?= TextRender::GetRurString( $order->totalAmount, true ) ?></strong></td>
    </tr>
</table>

<p><a href="{web:vt://orders/edit/}{$order.orderId}">{web:vt://orders/edit/}{$order.orderId}</a></p>