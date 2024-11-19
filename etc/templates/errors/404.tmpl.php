<?php
    $__pageTitle = 'Страница не найдена - 404'
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-3 sidebar">
            {increal:tmpl://fe/elements/sidebar.tmpl.php}
        </div>
        <div class="col-md-9">
            <h1 class="h4 mt-2">404 - страница не найдена</h1>
            <p>
                Запрошенная вами страница не найдена на сайте. Скорее всего она устарела и была удалена.
            </p>
            <p>
                Чтобы продолжить работу перейдите на <a href="{web:/}">главную</a>
            </p>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}