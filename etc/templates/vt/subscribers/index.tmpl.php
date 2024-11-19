<?php
    /** @var Subscriber[] $list */

    $__pageTitle = LocaleLoader::Translate( "vt.screens.subscriber.list");

    $grid = array(
        "columns" => array(
           LocaleLoader::Translate( "vt.subscriber.email" )
            , LocaleLoader::Translate( "vt.subscriber.checkSum" )
            , LocaleLoader::Translate( "vt.subscriber.createdAt" )
            , LocaleLoader::Translate( "vt.subscriber.isValid" )
            , LocaleLoader::Translate( "vt.subscriber.isUnsubscribe" )
            , LocaleLoader::Translate( "vt.subscriber.statusId" )
        )
        , "colspans"	=> array()
        , "sorts"		=> array(0 => "email", 1 => "checkSum", 2 => "createdAt", 3 => "isValid", 4 => "isUnsubscribe", 5 => "statusId")
        , "operations"	=> true
        , "allowAdd"	=> true
        , "canPages"	=> SubscriberFactory::CanPages()
        , "basepath"	=> Site::GetWebPath( "vt://subscribers/" )
        , "addpath"		=> Site::GetWebPath( "vt://subscribers/add" )
        , "title"		=> $__pageTitle
		, "description"	=> ''
        , "pageSize"	=> HtmlHelper::RenderToForm( $search["pageSize"] )
        , "deleteStr"	=> LocaleLoader::Translate( "vt.subscriber.deleteString")
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
                    <label>{lang:vt.subscriber.email}</label>
                    <?= FormHelper::FormInput( "search[email]", $search['email'], 'email', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.subscriber.checkSum}</label>
                    <?= FormHelper::FormInput( "search[checkSum]", $search['checkSum'], 'checkSum', null, array( 'size' => 80 ) ); ?>
                </div>
                <div class="row">
                    <label>{lang:vt.subscriber.statusId}</label>
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
        $id         = $object->subscriberId;
        $editpath   = $grid['basepath'] . "edit/" . $id;
?>
			<tr data-object-id="{$id}">
                <td class="header">{$object.email}</td>
                <td>{$object.checkSum}</td>
                <td><?= ( !empty( $object->createdAt ) ? $object->createdAt->DefaultFormat() : '' ) ?></td>
                <td><?= StatusUtility::GetBoolTemplate( $object->isValid );?></td>
                <td><?= StatusUtility::GetBoolTemplate( $object->isUnsubscribe );?></td>
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