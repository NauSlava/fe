<?php
    /** @var City[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.city.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.city.title" )
            , LocaleLoader::Translate( "vt.city.preposTitle" )
            , LocaleLoader::Translate( "vt.city.genitTitle" )
            , LocaleLoader::Translate( "vt.city.areaName" )
            , LocaleLoader::Translate( "vt.city.statusId" )
        )
        , "colspans"	=> array()
        , "sorts"		=> array(0 => "title", 1 => "preposTitle", 2 => "genitTitle", 3 => "areaName", 4 => "statusId")
        , "operations"	=> true
        , "allowAdd"	=> true
        , "canPages"	=> CityFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://cities/" )
        , "addpath"		=> Site::GetWebPath( "vt://cities/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.city.deleteString")
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
                    <label>{lang:vt.city.title}</label>
                    <?= FormHelper::FormInput( "search[title]", $search['title'], 'title', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.city.preposTitle}</label>
                    <?= FormHelper::FormInput( "search[preposTitle]", $search['preposTitle'], 'preposTitle', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.city.genitTitle}</label>
                    <?= FormHelper::FormInput( "search[genitTitle]", $search['genitTitle'], 'genitTitle', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.city.areaName}</label>
                    <?= FormHelper::FormInput( "search[areaName]", $search['areaName'], 'areaName', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.city.statusId}</label>
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
        $id         = $object->cityId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
                <td>{$object.title}</td>
                <td>{$object.preposTitle}</td>
                <td>{$object.genitTitle}</td>
                <td>{$object.areaName}</td>
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