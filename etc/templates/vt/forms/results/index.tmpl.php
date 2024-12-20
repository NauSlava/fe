<?php
    /** @var FormResult[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.formResult.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.formResult.formId" )
            , LocaleLoader::Translate( "vt.formResult.createdAt" )
            , LocaleLoader::Translate( "vt.formResult.comments" )
            , LocaleLoader::Translate( "vt.formResult.statusId" )
        )
        , "colspans"	=> array( 0 => 2 )
        , "sorts"		=> array(0 => "form.title", 1 => "createdAt", 2 => "comments", 3 => "statusId")
        , "operations"	=> true
        , "allowAdd"	=> false
        , "canPages"	=> FormResultFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://forms/results/" )
        , "addpath"		=> Site::GetWebPath( "vt://forms/results/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.formResult.deleteString")
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
                    <label>Номер отклика</label>
                    <?= FormHelper::FormInput( "search[formResultId]", $search['formResultId'], 'formResultId', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.formResult.formId}</label>
                    <?= FormHelper::FormSelect( "search[formId]", $forms, "formId", "title", $search['formId'], null, null, true ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.formResult.comments}</label>
                    <?= FormHelper::FormInput( "search[comments]", $search['comments'], 'comments', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.formResult.statusId}</label>
                    <?= FormHelper::FormSelect( "search[statusId]", StatusUtility::$FormResults, null, null, $search['statusId'], null, null, true ); ?>
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
        $id         = $object->formResultId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
                <td><span class="status blue" title="Номер отклика">{$object.formResultId}</span></td>
                <td>{$object.form.title}</td>
                <td><?= ( !empty( $object->createdAt ) ? $object->createdAt->DefaultFormat() : '' ) ?></td>
                <td>{form:$object.comments}</td>
                <td><?= FormUtility::GetStatusTemplate($object->statusId) ?></td>
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