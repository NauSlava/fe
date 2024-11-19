<?php
    /** @var FormField[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.formField.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.formField.formId" )
            , LocaleLoader::Translate( "vt.formField.title" )
            , LocaleLoader::Translate( "vt.formField.isRequired" )
            , LocaleLoader::Translate( "vt.formField.fieldFormat" )
            , LocaleLoader::Translate( "vt.formField.fieldType" )
            , LocaleLoader::Translate( "vt.formField.orderNumber" )
            , LocaleLoader::Translate( "vt.formField.statusId" )
        )
        , "colspans"	=> array()
        , "sorts"		=> array(0 => "form.title", 1 => "title", 2 => "isRequired", 3 => "fieldFormat", 4 => "fieldType", 5 => "orderNumber", 6 => "statusId")
        , "operations"	=> true
        , "allowAdd"	=> true
        , "canPages"	=> FormFieldFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://forms/fields/" )
        , "addpath"		=> Site::GetWebPath( "vt://forms/fields/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.formField.deleteString")
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
                    <label>{lang:vt.formField.formId}</label>
                    <?= FormHelper::FormSelect( "search[formId]", $forms, "formId", "title", $search['formId'], null, null, true ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.formField.title}</label>
                    <?= FormHelper::FormInput( "search[title]", $search['title'], 'title', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.formField.fieldFormat}</label>
                    <?= FormHelper::FormSelect( "search[fieldFormat]", FormFieldUtility::$Formats, null, null, $search['fieldFormat'], null, null, true, 'FormFieldUtility::TranslateFormat'); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.formField.fieldType}</label>
                    <?= FormHelper::FormSelect( "search[fieldType]", FormFieldUtility::$Types, null, null, $search['fieldType'], null, null, true, 'FormFieldUtility::TranslateType' ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.formField.statusId}</label>
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
        $id         = $object->formFieldId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
                <td>{$object.form.title}</td>
                <td class="header">{$object.title}</td>
                <td><?= VtHelper::GetBoolTemplate( $object->isRequired ); ?></td>
                <td><span class="status blue"><?= FormFieldUtility::TranslateFormat( $object->fieldFormat ); ?></span></td>
                <td><span class="status blue"><?= FormFieldUtility::TranslateType( $object->fieldType ); ?></span></td>
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