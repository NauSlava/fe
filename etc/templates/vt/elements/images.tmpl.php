<?
    CssHelper::PushFiles( array(
        'js://ext/uploadify/uploadify.css'
    , 'js://vt/chosen/chosen.css'
    ));

    JsHelper::PushFiles( array(
        'js://ext/jquery.plugins/jquery.tmpl.min.js'
        , 'js://vt/object-images.js'
        , 'js://ext/swfobject/swfobject.js'
        , 'js://ext/uploadify/jquery.uploadify.js'
        , 'js://vt/chosen/chosen.jquery.min.js'
    ));

    JsHelper::PushLine( sprintf( 'sessionData = { "%s" : "%s" };', Session::getName(), Session::getId() ) );

    /** @var array $folders */
//print_r(ObjectImageUtility);
?>

<div id="page-1" class="tab-page rows">
    <!--div class="row" style="overflow: visible;">
        <label>Выберите папку для загрузки</label>
        <div class="with_chosen">
            <?= FormHelper::FormSelect( 'currentFolderId', $folders, null, null, !empty( $currentFolderId ) ? $currentFolderId : null, 'currentFolderId', 'chosen', false, null, array( 'style' => 'width:600px;' )  ); ?>
        </div>
    </div>
    <div class="row">
        <label>Массовая загрузка файлов</label>
        <div style="display: inline-block; //display: inline;">
            <input id="image_upload" name="image_upload" type="file" />
        </div>
    </div>
    <div data-row="images" style="display: none;"></div>
    <div class="row">
        <ul class="actions">
            <li class="edit"><a href="#" id="add-image">Добавить картинку</a></li>
        </ul>
    </div-->
    <div class="row">
        <p>Маленькая картинка &mdash; рекомендуется <?= implode( 'x', ObjectImageUtility::$DefaultImageSize ) ?>.</p>
        <table class="objects images">
            <tr>
                <th>Номер</th>
                <th>Маленькая картинка * </th>
                <th>Большая картинка *</th>
            </tr>
		<? print_r($images);?>
        </table>

    </div>
</div>

<script type="text/javascript">
    var imageData = <?= ObjectHelper::ToJSON( $imageData ); ?>;
    <? if ( !empty( $imageErrors) ) { ?>
    var imageErrors  = <?= ObjectHelper::ToJSON( $imageErrors )?>
    <? } ?>
</script>
<!--script id="imageTemplate" type="text/x-jquery-tmpl">
    <tr class="image sort" id="image-${ $item.counter.nextIndex() }">
        <td class="handle"><input type="hidden" name="{$prefix}[images][${ $item.counter.index }][objectImageId]" value="${id}" /></td>
        <td><input type="text" name="{$prefix}[images][${ $item.counter.index }][title]" value="${imgName}" class="title-${ $item.counter.index }" size="60" style="width: auto;" /></td>
        <td class="left"><input type="hidden" class="vfsFile" name="{$prefix}[images][${ $item.counter.index }][smallImageId]" rel="smallImageId-${ $item.counter.index }" id="photo-small-${ $item.counter.index }" vfs:previewType="image"  {{if smallImage}}value="${ smallImage.id}" data-mode="fileId" vfs:src="{web:vfs://}${ smallImage.src}" vfs:name="${ smallImage.name}"{{/if}}/></td>
        <td class="left"><input type="hidden" class="vfsFile" name="{$prefix}[images][${ $item.counter.index }][bigImageId]" rel="bigImageId-${ $item.counter.index }" id="photo-big-${ $item.counter.index }" vfs:previewType="image" {{if bigImage}}value="${ bigImage.id}" data-mode="fileId"  vfs:src="{web:vfs://}${ bigImage.src}" vfs:name="${ bigImage.name}"{{/if}}/></td>
        <td width="10%">
            <ul class="actions">
                <li class="delete"><a class="delete-image" data-image-id="${ $item.counter.index }" href="#" title="Удалить">Удалить</a></li>
            </ul>
        </td>
    </tr>
</script-->