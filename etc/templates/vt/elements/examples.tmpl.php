<?
    JsHelper::PushLine( sprintf( 'sessionData = { "%s" : "%s" };', Session::getName(), Session::getId() ) );

    /** @var array $folders */
?>
<div id="page-6" class="tab-page rows ">
    <div class="tabrow">
        <table class="objects images" id='imgblock2'>
            <tr>
                <th>Номер</th>
                <th>Маленькая картинка * </th>
                <th>Большая картинка *</th>
                <th>Удалить</th>
            </tr>
		<? print_r($examples);?>
        </table>

    </div>
</div>
