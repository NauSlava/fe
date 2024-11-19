<?php
    $__breadcrumbs = array(
        array(
            'title'  => "Подписаться на рассылку"
        )
    );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='block-content'>
    {increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
    <div class='block-body ov'>
        <h1>Подписаться на рассылку</h1>
        <?php if(!empty( $errors["fields"]["isExist"])){?>
            <p>Вы уже подписаны на новости этого сайта!</p>
        <?php } ?>
        <div class="add-adress subscribe">
            <form class='simple_form' method="post" action="/subscribe/">
                <div class="row">
                    <label for="field1">Email<span class='reguired'>*</span></label>
                    <input type='text' value="" name="subscriber[email]" placeholder='Введите адрес электронной почты'/> <button name="save" value="true" class='btn btn-pink round'>подписаться</button>
                </div>
            </form>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
