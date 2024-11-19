Новое сообщение  от: <br />
{$object->contact}<br />
<strong>Текст:</strong><br />
{$object.message}<br/>
<strong>Контакты для связи</strong><br/>
<?php if( !empty( $object->email )){ ?>
Email: {$object.email}<br/>
<?php } ?>
<?php if( !empty( $object->phone )){ ?>
Телефон: {$object.phone}<br/>
<?php } ?>
<a href="{web:/}vt/feedbacks/">Страница сообщений</a>