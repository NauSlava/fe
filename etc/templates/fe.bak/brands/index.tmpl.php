<?php
    $__metaDetail = MetaDetailUtility::GetForContext( false, Page::$RequestData[0] );

    if( empty( $__pageTitle )){
        $__pageTitle = "Бренды и дизайнеры";
    }

    $__breadcrumbs = array(
        array(
            'title' => 'Бренды и дизайнеры'
        )
    )
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='block-content'>
    {increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
    <div class='block-body ov'>
        <div class='join-block-line ov'>
            <?php foreach( $brands as $item ){?>
                <div class='join-block'>
                    <div class="image-feat">
                        <a href="<?=LinkUtility::GetBrandItemUrl( $item );?>"><img src="{web:vfs://}{$item.bigImage.path}" alt="sample image" property="thumbnailUrl"></a>
                    </div>
                    <div class='join-block-wrap'>
                        <div class='join-title'>
                           {$item.title}
                        </div>
                        <div class='join-view-production'><a href="<?=LinkUtility::GetBrandItemUrl( $item );?>">Подробнее</a></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
