<?
    JsHelper::PushFiles( array( 'js://ext/jquery.plugins/jquery.tmpl.min.js', 'js://vt/counter.js', 'js://vt/product.js' ) );
    if ( !$object->versions ) {
        $object->versions = array();
    }
?>
<div id="page-3" class="tab-page rows">
    <div data-row="versions" style="display: none;"></div>
    <div class="row">
        <ul class="actions">
            <li class="edit"><a href="#" id="add-version">Добавить вариант товара</a></li>
        </ul>
    </div>
    <div class="row">
        <table class="objects versions" style="width:auto;">
            <tr>
                <th colspan="2">Название*</th>
                <th>Описание</th>
                <th>Цена, р.*</th>
                <th>В наличии</th>
                <th></th>
            </tr>
        </table>
    </div>

</div>
<script type="text/javascript">
    var versionData = <?= ObjectHelper::ToJSON( $object->versions ); ?>;
    <? if ( !empty( $versionErrors) ) { ?>
    var versionErrors  = <?= ObjectHelper::ToJSON( $versionErrors )?>;
    <? } ?>
</script>
<script id="versionTemplate" type="text/x-jquery-tmpl">
    <tr class="version sort" id="version-${ $item.counter.nextIndex() }">
        <td class="handle"></td>
        <td><input type="text" name="{$prefix}[versions][${ $item.counter.index }][title]" value="${title}" class="title-${ $item.counter.index }" size="40" style="width: auto;" /></td>
        <td><input type="text" name="{$prefix}[versions][${ $item.counter.index }][description]" value="${description}" class="title-${ $item.counter.index }" size="60" style="width: auto;" /></td>
        <td><input type="text" name="{$prefix}[versions][${ $item.counter.index }][price]" value="${price}" size="10" style="width: auto;"/></td>
        <td><input type="checkbox" name="{$prefix}[versions][${ $item.counter.index }][isAvailable]" value="1" {{if isAvailable}}checked="checked"{{/if}}/></td>
        <td width="10%">
            <ul class="actions">
                <li class="delete"><a class="delete-version" data-version-id="${ $item.counter.index }" href="#" title="Удалить">Удалить</a></li>
            </ul>
        </td>
    </tr>
</script>