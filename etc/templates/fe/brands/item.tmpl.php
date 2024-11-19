<?php
    $__metaDetail = MetaDetailUtility::GetForContext( ObjectInfo::Get( $brandItem ), Page::$RequestData[0] );

    if( empty( $__pageTitle )){
        $__pageTitle = $brandItem->title;
    }

    $__breadcrumbs = array(
        array(
            'path'  => '/brands/'
            , 'title' => 'Бренды и дизайнеры'
        )
        , array(
            'title' => $brandItem->title
        )
    )
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class='block-content'>
    {increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
    <div class='block-body ov'>
        <div class='block-text'>
            <h1>{$brandItem.title}</h1
            {$brandItem.content}
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
