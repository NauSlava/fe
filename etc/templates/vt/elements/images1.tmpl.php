<?
    JsHelper::PushLine( sprintf( 'sessionData = { "%s" : "%s" };', Session::getName(), Session::getId() ) );

    /** @var array $folders */
?>
<div id="page-1" class="tab-page rows ">
    <div class="tabrow">
        <table class="objects images" id='imgblock1'>
            <tr>
                <th>Номер</th>
                <th>Маленькая картинка * </th>
                <th>Большая картинка *</th>
                <th>Удалить</th>
            </tr>
		<? print_r($images);?>
        </table>

    </div>
</div>
