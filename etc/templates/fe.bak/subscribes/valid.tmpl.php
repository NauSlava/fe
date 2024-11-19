<?php
    $__pageTitle = "Подписка";
    $__breadcrumbs = array(
        array(
            'title'  => 'Подписка'
        )
    );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='block-content'>
    {increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
    <div class='block-body ov'>
        <div class='block-text'>
            <h1>Подписка</h1>
            <p>
                <?php if( empty($errors )){ ?>
                    Спасибо. Подписка подтверждена.
                <?php }else{ ?>
                    <?php if( !empty($errors['notEmpty'])){ ?>
                        Ошибка проверки ключа подписки.<br/>
                    <?php } ?>
                    <?php if( !empty($errors['isValid'])){ ?>
                        Email уже подтвержден<br/>
                    <?php } ?>
                    <?php if( !empty($errors['isUnsubscribe'])){ ?>
                        Email был отписан от рассылки<br/>
                    <?php } ?>
                <?php } ?>
            </p>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}