<?php
    /** @var Order $object */

    $prefix = "order";

    if ( empty( $errors ) ) $errors = array();
	if ( empty( $jsonErrors ) ) $jsonErrors = '{}';

    if ( !empty($errors["fatal"] ) ) {
		?><h3 class="error"><?= LocaleLoader::Translate( 'errors.fatal.' . $errors["fatal"] ); ?></h3><?
	}
?>
<div class="tabs">
	<?= FormHelper::FormHidden( 'selectedTab', !empty( $selectedTab ) ? $selectedTab : 0, 'selectedTab' ); ?>
    <ul class="tabs-list">
        <li><a href="#page-0">{lang:vt.common.commonInfo}</a></li>
        <li><a href="#page-1">{lang:vt.order.positions}</a></li>
    </ul>

    <div id="page-0" class="tab-page rows">
        <div data-row="contact" class="row required">
            <label>{lang:vt.order.contact}</label>
            <?= FormHelper::FormInput( $prefix . '[contact]', $object->contact, 'contact', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="phone" class="row required">
            <label>{lang:vt.order.phone}</label>
            <?= FormHelper::FormInput( $prefix . '[phone]', $object->phone, 'phone', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="email" class="row">
            <label>{lang:vt.order.email}</label>
            <?= FormHelper::FormInput( $prefix . '[email]', $object->email, 'email', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="cityId" class="row">
            <label>{lang:vt.order.cityId}</label>
            <?= FormHelper::FormSelect( $prefix . '[cityId]', $cities, "cityId", "title", $object->cityId, null, null, true ); ?>
        </div>
        <div data-row="address" class="row">
            <label>{lang:vt.order.address}</label>
            <?= FormHelper::FormInput( $prefix . '[address]', $object->address, 'address', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="comments" class="row">
            <label>{lang:vt.order.comments}</label>
            <?= FormHelper::FormInput( $prefix . '[comments]', $object->comments, 'comments', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="createdAt" class="row required">
            <label>{lang:vt.order.createdAt}</label>
            <?= FormHelper::FormDateTime( $prefix . '[createdAt]', $object->createdAt, 'd.m.Y G:i' ); ?>
        </div>
        <div data-row="deliveryType" class="row">
            <label>{lang:vt.order.deliveryType}</label>
            <?= FormHelper::FormInput( $prefix . '[deliveryType]', $object->deliveryType, 'deliveryType', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="totalAmount" class="row required">
            <label>{lang:vt.order.totalAmount}</label>
            <?= FormHelper::FormInput( $prefix . '[totalAmount]', $object->totalAmount, 'totalAmount', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.order.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
    <div id="page-1" class="tab-page rows">
        <table class="objects" style="width: 100%;">
            <thead><tr>
                <th width="55%">Название</th>
                <th width="10%">Вариант</th>
                <th width="15%">Цена, р.</th>
                <th width="10%">Кол-во</th>
                <th width="15%">Стоимость, р.</th>
            </tr></thead>
            <? foreach( $object->orderDetails as $item ) { ?>
                <tr>
                    <td class="left"><a target="_blank" href="{$item[url]}">{$item[baseTitle]}</a><br/>{$item[description]}</td>
                    <td><?= !empty( $item['title'] ) ? $item['title'] : '-' ?></td>
                    <td><?= TextRender::GetRurString( $item['price'], false ) ?></td>
                    <td>{$item[quantity]}</td>
                    <td><?= TextRender::GetRurString( $item['totalPrice'], false ) ?></td>
                </tr>
            <? } ?>
        </table>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
 