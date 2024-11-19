<?php
    $__activeElement = '/subscribs/';
    $__pageTitle = "Подписка";
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div id="content_cont">
    <div id="content">
        <div id="left_content"></div>
        <div id="center_content" class="center_c2">
            <p>Для того, чтобы отписаться укажите свой email и мы удалим его из списка рассылки</p>
            <form class="form-horizontal" method="post" action="/subscribs/unsubscribe">
                <div class="control-group">
                    <label class="control-label">Ваш email:</label>
                    <div class="controls <?=!empty( $errors["fields"]["email"] ) ? "error" : "" ;?>">
                        <?= HtmlHelper::FormInput( 'subscriber[email]', $unsubscriberObject->email, "40", "email","input_form" ); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls" style="padding-left: 176px;">
                        <button type="submit" name="save" value="true" class="button_form">Отписаться</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clear clearfix"></div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}