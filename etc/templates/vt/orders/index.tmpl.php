<?php
    /** @var Order[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.order.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.order.contact" )
            , LocaleLoader::Translate( "vt.order.phone" )
            , LocaleLoader::Translate( "vt.order.email" )
            , LocaleLoader::Translate( "vt.order.cityId" )
            , LocaleLoader::Translate( "vt.order.address" )
            , LocaleLoader::Translate( "vt.order.createdAt" )
            , LocaleLoader::Translate( "vt.order.deliveryType" )
            , LocaleLoader::Translate( "vt.order.totalAmount" )
            , LocaleLoader::Translate( "vt.order.statusId" )
        )
        , "colspans"	=> array()
        , "sorts"		=> array(0 => "contact", 1 => "phone", 2 => "email", 3 => "city.title", 4 => "address", 5 => "orderDetails", 6 => "createdAt", 7 => "deliveryType", 8 => "totalAmount", 9 => "statusId")
        , "operations"	=> true
        , "allowAdd"	=> true
        , "canPages"	=> OrderFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://orders/" )
        , "addpath"		=> Site::GetWebPath( "vt://orders/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.order.deleteString")
    );
	
	$__breadcrumbs = array( array( 'link' => $grid['basepath'], 'title' => $__pageTitle ) );
?>
{increal:tmpl://vt/header.tmpl.php}
<div class="main">
	<div class="inner">
		{increal:tmpl://vt/elements/menu/breadcrumbs.tmpl.php}
		<div class="pagetitle">
			<? if( $grid['allowAdd'] ) { ?>
			<div class="controls"><a href="{$grid[addpath]}" class="add"><span>{lang:vt.common.add}</span></a></div>
			<? } ?>
			<h1>{$__pageTitle}</h1>
		</div>
		{$grid[description]}
		<div class="search<?= $hideSearch == "true" ? " closed" : ""  ?>">
			<a href="#" class="search-close"><span>{lang:vt.common.closeSearch}</span></a>
			<a href="#" class="search-open"><span>{lang:vt.common.openSearch}</span></a>
			<form class="search-form" id="searchForm" method="post" action="{$grid[basepath]}">
				<input type="hidden" value="1" name="searchForm" />
				<input type="hidden" value="" id="pageId" name="page" />
				<input type="hidden" value="{$grid[pageSize]}" id="pageSize" name="search[pageSize]" />
				<input type="hidden" value="{form:$sortField}" id="sortField" name="sortField" />
				<input type="hidden" value="{form:$sortType}" id="sortType" name="sortType" />
                <div class="row">
                    <label>{lang:vt.order.contact}</label>
                    <?= FormHelper::FormInput( "search[contact]", $search['contact'], 'contact', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.order.phone}</label>
                    <?= FormHelper::FormInput( "search[phone]", $search['phone'], 'phone', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.order.email}</label>
                    <?= FormHelper::FormInput( "search[email]", $search['email'], 'email', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.order.cityId}</label>
                    <?= FormHelper::FormSelect( "search[cityId]", $cities, "cityId", "title", $search['cityId'], null, null, true ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.order.address}</label>
                    <?= FormHelper::FormInput( "search[address]", $search['address'], 'address', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.order.totalAmount}</label>
                    <?= FormHelper::FormInput( "search[totalAmount]", $search['totalAmount'], 'totalAmount', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.order.deliveryType}</label>
                    <?= FormHelper::FormSelect( "search[deliveryType]", CartUtility::$DeliveryTypes, "", "", $search['deliveryType'], null, null, true ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.order.statusId}</label>
                    <?= FormHelper::FormSelect( "search[statusId]", StatusUtility::$Common[$__currentLang], "", "", $search['statusId'], null, null, true ); ?>
                </div>
				<input type="submit" value="{lang:vt.common.find}" />
			</form>
		</div>
		
		<!-- GRID -->
		{increal:tmpl://vt/elements/datagrid/header.tmpl.php}
<?php
    $langEdit   = LocaleLoader::Translate( "vt.common.edit" );
    $langDelete = LocaleLoader::Translate( "vt.common.delete" );

    foreach ( $list as $object )  {
        $id         = $object->orderId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
                <td>{form:$object.contact}</td>
                <td>{form:$object.phone}</td>
                <td>{form:$object.email}</td>
                <td><?= !empty($object->city) ? $object->city->title : "" ?></td>
                <td>{form:$object.address}</td>
                <td><?= ( !empty( $object->createdAt ) ? $object->createdAt->DefaultFormat() : '' ) ?></td>
                <td><?= CartUtility::$DeliveryTypes[$object->deliveryType];?></td>
                <td>{$object.totalAmount}</td>
                <td><?= StatusUtility::GetStatusTemplate($object->statusId) ?></td>
				<td width="10%">
					<ul class="actions">
						<li class="edit"><a href="{$editpath}" title="{$langEdit}">{$langEdit}</a></li><li class="delete"><a href="#" class="delete-object" title="{$langDelete}">{$langDelete}</a></li>
					</ul>
				</td>
	        </tr>
<?php
    }
?>
		{increal:tmpl://vt/elements/datagrid/footer.tmpl.php}
		<!-- EOF GRID -->
	</div>
</div>
{increal:tmpl://vt/footer.tmpl.php}