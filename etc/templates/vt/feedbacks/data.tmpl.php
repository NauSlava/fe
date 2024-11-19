<?php
    /** @var Feedback $object */

    $prefix = "feedback";

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
        <div data-row="contact" class="row required">
            <label>{lang:vt.feedback.contact}</label>
            <?= FormHelper::FormInput( $prefix . '[contact]', $object->contact, 'contact', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="email" class="row required">
            <label>{lang:vt.feedback.email}</label>
            <?= FormHelper::FormInput( $prefix . '[email]', $object->email, 'email', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="phone" class="row">
            <label>{lang:vt.feedback.phone}</label>
            <?= FormHelper::FormInput( $prefix . '[phone]', $object->phone, 'phone', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="subject" class="row">
            <label>{lang:vt.feedback.subject}</label>
            <?= FormHelper::FormInput( $prefix . '[subject]', $object->subject, 'subject', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="message" class="row">
            <label>{lang:vt.feedback.message}</label>
            <?= FormHelper::FormTextArea( $prefix . '[message]', $object->message, 'message', null, array( 'rows' => 5, 'cols' => 80 ) ); ?>
        </div>
        <div data-row="isCopy" class="row">
            <label>{lang:vt.feedback.isCopy}</label>
            <?= FormHelper::FormCheckBox( $prefix . '[isCopy]', null, 'isCopy', null, $object->isCopy ); ?>
        </div>
        <div data-row="createdAt" class="row required">
            <label>{lang:vt.feedback.createdAt}</label>
            <?= FormHelper::FormDateTime( $prefix . '[createdAt]', $object->createdAt, 'd.m.Y G:i' ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.feedback.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
 