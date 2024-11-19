<?php
    if ( !empty($__page) ) {
        $__pageTitle       = !empty($__page->pageTitle) ? $__page->pageTitle : $__page->title;
        $__metaDescription = $__page->metaDescription;
        $__metaKeywords    = $__page->metaKeywords;
    }

    $__breadcrumbs = array(
        array(
            'title'  => $__page->title
        )
    );

    $__activeElement = Site::GetWebPath( $__page->url );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
{increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {$__page.content}
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
