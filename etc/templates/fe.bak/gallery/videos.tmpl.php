<?php

    if( empty( $__pageTitle )){
        $__pageTitle = 'Видеоролики';
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Видеоролики'
        )
    );

    $__activeElement = Site::GetWebPath( '/gallery/' );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='content vspl'>
    <div class='row row2'>
        {increal:tmpl://fe/elements/sidebar.tmpl.php}
        <div class='CenterLine column column3'>
            <section class='section'>
                <header class='section--header'>
                    <div class="section--label">Видеоролики</div>
                    <div class="section--tools">
                        <a href="/gallery/" class="section--tool section--tool-gallery">Перейти в галерею</a>
                    </div>
                </header>
                <div class='section--content'>
                    <?php foreach( $albums as $item ){ ?>
                        <div class='videoItem'>
                            <div class='videoItem--title'>
                                {$item.title}
                            </div>
                            <div class='videoItem--preview'>
                                {$item.content}
                            </div>
                        </div>
                        <div class='section--split section--split-v'>&nbsp;</div>
                    <?php } ?>
                </div>
                <div class='section--footer'>
                    <?php $__pagesLink = '/videos/?page=';?>
                    {increal:tmpl://fe/elements/paginator.tmpl.php}
                </div>
            </section>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}