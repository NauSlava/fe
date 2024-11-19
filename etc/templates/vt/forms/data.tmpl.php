<?php
    /** @var Form $object */

    $prefix = "form";

    if ( empty( $errors ) ) $errors = array();
	if ( empty( $jsonErrors ) ) $jsonErrors = '{}';

    if ( !empty($errors["fatal"] ) ) {
		?><h3 class="error"><?= LocaleLoader::Translate( 'errors.fatal.' . $errors["fatal"] ); ?></h3><?
	}
?>
<div class="tabs">
	<?= FormHelper::FormHidden( 'selectedTab', !empty( $selectedTab ) ? $selectedTab : 0, 'selectedTab' ); ?>
    <ul class="tabs-list">
        <li><a href="#page-0">{lang:vt.common.commonInfo}</a></li>
    </ul>

    <div id="page-0" class="tab-page rows">
        <h2 class="legend">Настройки формы</h2>
        <div data-row="title" class="row required">
            <label>{lang:vt.form.title}</label>
            <?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="staticPageId" class="row required">
            <label>{lang:vt.form.staticPageId}</label>
            <?= VtHelper::GetHint( 'vt.hints.form.staticPageId' ); ?>
            <?= StaticPageHelper::FormSelect( $prefix . '[staticPageId]', $staticPages, $object->staticPageId, false ); ?>
        </div>
        <div data-row="resultStaticPageId" class="row required">
            <label>{lang:vt.form.resultStaticPageId}</label>
            <?= VtHelper::GetHint( 'vt.hints.form.resultStaticPageId' ); ?>
            <?= StaticPageHelper::FormSelect( $prefix . '[resultStaticPageId]', $staticPages, $object->resultStaticPageId, false ); ?>
        </div>
        <div data-row="emails" class="row">
            <label>{lang:vt.form.emails}</label>
            <?= VtHelper::GetHint( 'vt.hints.form.emails' ); ?>
            <?= FormHelper::FormTextArea( $prefix . '[emails]', $object->emails, 'emails', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <h2 class="legend">Оформление формы</h2>
        <div data-row="headerText" class="row">
            <label>{lang:vt.form.headerText}</label>
            <?= FormHelper::FormEditor( $prefix . '[headerText]', $object->headerText, 'headerText', null, array( 'rows' => 5, 'cols' => 85 ) ); ?>
            <?= VtHelper::GetHint( 'vt.hints.form.headerText' ); ?>
        </div>
        <div data-row="footerText" class="row">
            <label>{lang:vt.form.footerText}</label>
            <?= FormHelper::FormEditor( $prefix . '[footerText]', $object->footerText, 'footerText', null, array( 'rows' => 5, 'cols' => 85 ) ); ?>
            <?= VtHelper::GetHint( 'vt.hints.form.footerText' ); ?>
        </div>
        <div data-row="submitText" class="row required">
            <label>{lang:vt.form.submitText}</label>
            <?= VtHelper::GetHint( 'vt.hints.form.submitText' ); ?>
            <?= FormHelper::FormInput( $prefix . '[submitText]', $object->submitText, 'submitText', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.form.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Forms, null, null, $object->statusId, null, null, false ); ?>
        </div>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
<?php
	$__useEditor = true;
?>
 