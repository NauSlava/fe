<?php
    /** @var TemplateItem[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.templateItem.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.templateItem.group" )
            , LocaleLoader::Translate( "vt.templateItem.type" )
            , LocaleLoader::Translate( "vt.templateItem.title" )
            , LocaleLoader::Translate( "vt.templateItem.alias" )
            , LocaleLoader::Translate( "vt.templateItem.statusId" )
        )
        , "colspans"	=> array()
        , "sorts"		=> array(0 => "group", 1 => "type", 2 => "title", 3 => "alias", 4 => "value", 5 => "statusId")
        , "operations"	=> true
        , "allowAdd"	=> true
        , "canPages"	=> TemplateItemFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://template-items/" )
        , "addpath"		=> Site::GetWebPath( "vt://template-items/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.templateItem.deleteString")
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
                    <label>{lang:vt.templateItem.group}</label>
                    <?= FormHelper::FormSelect( 'search[group]', TemplateItemUtility::$Groups, null, null, $search['group'], null, null, true, 'TemplateItemHelper::TranslateGroup' ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.templateItem.type}</label>
                    <?= FormHelper::FormSelect( 'search[type]', TemplateItemUtility::$Types, null, null, $search['type'], null, null, true, 'TemplateItemHelper::TranslateType'  ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.templateItem.title}</label>
                    <?= FormHelper::FormInput( "search[title]", $search['title'], 'title', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.templateItem.statusId}</label>
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
        $id         = $object->templateItemId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
                <td><?= TemplateItemHelper::GetGroupTemplate( $object->group ); ?></td>
                <td><?= TemplateItemHelper::GetTypeTemplate( $object->type ); ?></td>
                <td class="header">{$object.title}</td>
                <td>{$object.alias}</td>
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