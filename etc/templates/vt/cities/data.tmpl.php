<?php
    /** @var City $object */

    $prefix = "city";

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
        <div data-row="title" class="row required">
            <label>{lang:vt.city.title}</label>
            <?= FormHelper::FormInput( $prefix . '[title]', $object->title, 'title', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="preposTitle" class="row required">
            <label>{lang:vt.city.preposTitle}</label>
            <?= FormHelper::FormInput( $prefix . '[preposTitle]', $object->preposTitle, 'preposTitle', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="genitTitle" class="row required">
            <label>{lang:vt.city.genitTitle}</label>
            <?= FormHelper::FormInput( $prefix . '[genitTitle]', $object->genitTitle, 'genitTitle', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="areaName" class="row required">
            <label>{lang:vt.city.areaName}</label>
            <?= FormHelper::FormInput( $prefix . '[areaName]', $object->areaName, 'areaName', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="lat" class="row required">
            <label>{lang:vt.city.lat}</label>
            <?= FormHelper::FormInput( $prefix . '[lat]', $object->lat, 'lat', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="lng" class="row required">
            <label>{lang:vt.city.lng}</label>
            <?= FormHelper::FormInput( $prefix . '[lng]', $object->lng, 'lng', null, array( 'size' => 80 ) ); ?>
        </div>
        <div data-row="statusId" class="row required">
            <label>{lang:vt.city.statusId}</label>
            <?= FormHelper::FormSelect( $prefix . '[statusId]', StatusUtility::$Common[$__currentLang], "", "", $object->statusId, null, null, false ); ?>
        </div>
	</div>
</div>
<script type="text/javascript">
	var jsonErrors = {$jsonErrors};
</script>
 