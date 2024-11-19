<?php
    /** @var Document[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.document.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.document.type" )
            , LocaleLoader::Translate( "vt.document.title" )
            , LocaleLoader::Translate( "vt.document.alias" )
            , LocaleLoader::Translate( "vt.document.publicationDate" )
            , LocaleLoader::Translate( "vt.document.orderNumber" )
            , LocaleLoader::Translate( "vt.document.statusId" )
            , LocaleLoader::Translate( "vt.document.pagelink" )
        )
        , "colspans"	=> array()
        , "sorts"		=> array(0 => "type", 1 => "title", 2 => "alias", 3 => "publicationDate", 4 => "orderNumber", 5 => "statusId", 6=>"pagelink")
        , "operations"	=> true
        , "allowAdd"	=> true
        , "canPages"	=> DocumentFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://documents/" )
        , "addpath"		=> Site::GetWebPath( "vt://documents/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.document.deleteString")
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
                    <label>{lang:vt.document.type}</label>
                    <?= FormHelper::FormSelect( "search[type]", DocumentUtility::$Types, '', '', $search['title'], 'type', null, true, 'DocumentUtility::TranslateType' ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.document.title}</label>
                    <?= FormHelper::FormInput( "search[title]", $search['title'], 'title', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.document.alias}</label>
                    <?= FormHelper::FormInput( "search[alias]", $search['alias'], 'alias', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.document.statusId}</label>
                    <?= FormHelper::FormSelect( "search[statusId]", StatusUtility::$Common[$__currentLang], "", "", $search['statusId'], null, null, true ); ?>
                </div>
		<div class="row">
			<label>{lang:vt.document.pagelink}</label>
			<?= FormHelper::FormInput( "search[pagelink]", $search['pagelink'], 'pagelink', null, array( 'size' => 80 ) ); ?>
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
        $id         = $object->documentId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
                <td><span class="status blue"><?= DocumentUtility::TranslateType( $object->type );?></span></td>
                <td>{$object.title}</td>
                <td>{$object.alias}</td>
                <td><?= ( !empty( $object->publicationDate ) ? $object->publicationDate->DefaultFormat() : '' ) ?></td>
                <td>{$object.orderNumber}</td>
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