<?php
    /** @var Product[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.product.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.product.title" )
            , LocaleLoader::Translate( "vt.product.alias" )
            , LocaleLoader::Translate( "vt.product.categoryId" )
            , LocaleLoader::Translate( "vt.product.orderNumber" )
            , LocaleLoader::Translate( "vt.product.orderShow" )
            , LocaleLoader::Translate( "vt.product.isAvailable" )
            , LocaleLoader::Translate( "vt.product.isLatest" )
            , LocaleLoader::Translate( "vt.product.price" )
            , LocaleLoader::Translate( "vt.product.statusId" )
        )
        , "colspans"	=> array()
        , "sorts"		=> array(0 => "title", 1 => "alias",  2 => "category.title", 3 => "orderNumber", 4 => "orderShow", 5 => "isAvailable", 6 => "isVersions", 7 => "price", 8 => "statusId")
        , "operations"	=> true
        , "allowAdd"	=> true
        , "canPages"	=> ProductFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://products/" )
        , "addpath"		=> Site::GetWebPath( "vt://products/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.product.deleteString")
    );
	
	$__breadcrumbs = array( array( 'link' => $grid['basepath'], 'title' => $__pageTitle ) );

//print_r($list);
//echo LocaleLoader::Translate( "vt.product.categoryId" )." 1111dsacsdcsdc";
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
                    <label>{lang:vt.product.title}</label>
                    <?= FormHelper::FormInput( "search[title]", $search['title'], 'title', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.product.alias}</label>
                    <?= FormHelper::FormInput( "search[alias]", $search['alias'], 'alias', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.product.categoryId}</label>
                    <?= CategoryHelper::FormSelect( 'search[categoryId]', $categories, $search['categoryId'], true ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.product.orderNumber}</label>
                    <?= FormHelper::FormInput( "search[orderNumber]", $search['orderNumber'], 'orderNumber', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.product.price}</label>
                    <?= FormHelper::FormInput( "search[price]", $search['price'], 'price', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.product.statusId}</label>
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
        $id         = $object->productId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
		                <td class="header">{$object.title}</td>
			        <td>{$object.alias}</td>
		                <td>{$object.category.title}</td>
		                <td>{$object.orderNumber}</td>
		                <td>{$object.orderShow}</td>
		                <td><?= StatusUtility::GetBoolTemplate( $object->isAvailable );?></td>
                		<td><?= StatusUtility::GetBoolTemplate( $object->isLatest );?></td>
		                <td>{$object.price}</td>
		                <td><?= StatusUtility::GetStatusTemplate($object->statusId) ?></td>
				<td width="10%">
					<ul class="actions">
						<li class="edit"><a href="{$editpath}" title="{$langEdit}">{$langEdit}</a>
						<li class="delete"><a href="#" class="delete-object" title="{$langDelete}">{$langDelete}</a>
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