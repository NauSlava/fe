<?php
    /** @var Form[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.form.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.form.title" )
            , LocaleLoader::Translate( "vt.form.staticPageId" )
            , LocaleLoader::Translate( "vt.form.statusId" )
            , 'Переход'
        )
        , "colspans"	=> array( 3 => 2 )
        , "sorts"		=> array(0 => "title", 1 => "staticPage.title", 2 => "statusId")
        , "operations"	=> true
        , "allowAdd"	=> true
        , "canPages"	=> FormFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://forms/" )
        , "addpath"		=> Site::GetWebPath( "vt://forms/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.form.deleteString")
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
                    <label>{lang:vt.form.statusId}</label>
                    <?= FormHelper::FormSelect( "search[statusId]", StatusUtility::$Forms, null, null, $search['statusId'], null, null, true ); ?>
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
        $id         = $object->formId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
                <td class="header">{$object.title}</td>
                <td>{$object.staticPage.title}</td>
                <td><?= StatusUtility::GetStatusTemplate($object->statusId) ?></td>
                <td width="5%"><a href="{web:vt://forms/results/}?search[formId]={$id}" style="color: #291;" title="Отклики">Отклики</a></td>
                <td width="5%"><a href="{web:vt://forms/fields/}?search[formId]={$id}" style="color: #d46432;" title="Поля">Поля</a></td>
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