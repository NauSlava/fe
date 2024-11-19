<?php
    /** @var Subscriber $object */

    $prefix = "subscriber";

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
        <div data-row="email" class="row required">
            <label>{lang:vt.subscriber.email}</label>
            <?= FormHelper::FormInput( $prefix . '[email]', $object->email, 'email', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="checkSum" class="row required">
            <label>{lang:vt.subscriber.checkSum}</label>
            <?= FormHelper::FormInput( $prefix . '[checkSum]', $object->checkSum, 'checkSum', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="createdAt" class="row required">
            <label>{lang:vt.subscriber.createdAt}</label>
            <?= FormHelper::FormDateTime( $prefix . '[createdAt]', $object->createdAt, 'd.m.Y G:i' ); ?>
        </div>
        <div data-row="isValid" class="row">
            <label>{lang:vt.subscriber.isValid}</label>
            <?= FormHelper::FormCheckBox( $prefix . '[isValid]', null, 'isValid', null, $object->isValid ); ?>
        </div>
        <div data-row="isValidAt" class="row">
            <label>{lang:vt.subscriber.isValidAt}</label>
            <?= FormHelper::FormDateTime( $prefix . '[isValidAt]', $object->isValidAt, 'd.m.Y G:i' ); ?>
        </div>
        <div data-row="unsubscribeAt" class="row">
            <label>{lang:vt.subscriber.unsubscribeAt}</label>
            <?= FormHelper::FormDateTime( $prefix . '[unsubscribeAt]', $object->unsubscribeAt, 'd.m.Y G:i' ); ?>
        </div>
        <div data-row="isUnsubscribe" class="row">
            <label>{lang:vt.subscriber.isUnsubscribe}</label>
            <?= FormHelper::FormCheckBox( $prefix . '[isUnsubscribe]', null, 'isUnsubscribe', null, $object->isUnsubscribe ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.subscriber.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
 