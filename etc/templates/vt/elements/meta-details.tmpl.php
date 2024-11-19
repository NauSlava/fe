<?
    /** @var MetaDetail $metaDetail */
    if( !$metaDetail->statusId ) {
        $metaDetail->statusId = 1;
    }
?>
<div id="page-5" class="tab-page rows">
    <?= FormHelper::FormHidden( 'metaDetail[metaDetailId]', $metaDetail->metaDetailId  ); ?>
    <?= FormHelper::FormHidden( 'metaDetail[statusId]',     $metaDetail->statusId  ); ?>
    <div data-row="pageTitle" class="row">
        <label>{lang:vt.metaDetail.pageTitle}</label>
        <?= FormHelper::FormInput( 'metaDetail[pageTitle]', $metaDetail->pageTitle, 'pageTitle', null, array( 'size' => 80 ) ); ?>
    </div>
    <div data-row="metaKeywords" class="row">
        <label>{lang:vt.metaDetail.metaKeywords}</label>
        <?= FormHelper::FormTextArea( 'metaDetail[metaKeywords]', $metaDetail->metaKeywords, 'metaKeywords', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
    </div>
    <div data-row="metaDescription" class="row">
        <label>{lang:vt.metaDetail.metaDescription}</label>
        <?= FormHelper::FormTextArea( 'metaDetail[metaDescription]', $metaDetail->metaDescription, 'metaDescription', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
    </div>
    <div data-row="alt" class="row">
        <label>{lang:vt.metaDetail.alt}</label>
        <?= FormHelper::FormInput( 'metaDetail[alt]', $metaDetail->alt, 'alt', null, array( 'size' => 80 ) ); ?>
    </div>
    <div data-row="canonicalUrl" class="row">
        <label>{lang:vt.metaDetail.canonicalUrl}</label>
        <?= FormHelper::FormInput( 'metaDetail[canonicalUrl]', $metaDetail->canonicalUrl, 'canonicalUrl', null, array( 'size' => 80 ) ); ?>
    </div>
</div>