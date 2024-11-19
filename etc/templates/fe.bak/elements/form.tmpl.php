<?
    /** @var Form $form */
    /** @var array $errors */
    /** @var FormResult $formResult */

    if ( empty( $formResult->answers ) ) {
        $formResult->answers = array();
    }
?>
<a name="form"></a>
{typo:$form.headerText}
<form class="std_form" action="{web:$__page.url}#form" method="post">
    <?= FormHelper::FormHidden( 'sendForm', 1 ); ?>
    <? if ( !empty( $errors ) ) { ?>
    <p class="warning">При заполнении формы возникли ошибки!</p>
    <? } ?>

    <? if ( !empty( $errors['db'] ) ) { ?>
    <p class="warning">Пожалуйста, перезвоните нам по телефону.</p>
    <? } ?>

    <? foreach( $form->formFields as $formFieldId => $field ) { ?>
        <? $hasError = array_key_exists( $formFieldId, $errors ); ?>
    <dl>
        <dt><label for="ff{$formFieldId}">{$field.title}<?= !empty( $field->isRequired )?'<span class="warning">*</span>':'';?></label>
        <? if ( !empty( $field->hint ) || $field->isRequired ) { ?>
        <div class="hint <?= $field->isRequired ? 'required' : '' ?>">
            <div class="hint_body">
                {typo:$field.hint}
            </div>
            <i></i>
        </div>
        <? } ?>
        </dt>
        <dd>
            <?= FormFieldHelper::Render( 'formResult[answers]', 'ff' . $formFieldId, $field, ArrayHelper::GetValue( $formResult->answers, $formFieldId ), ( $hasError ? 'error' : null)  ); ?>
            <? if ( $hasError ) { ?>
            <? $errorMessage = !empty( $field->errorMessage ) ? $field->errorMessage : 'Поле обязательно для заполнения' ?>
            <p class="warning">{typo:$errorMessage}</p>
            <? } ?>
        </dd>
    </dl>
    <? } ?>
    <dl style="display: none;">
        <input type="text" name="email" class="required" />
    </dl>
    <dl>
        <dd><input type="submit" value="{form:$form.submitText}"></dd>
    </dl>
</form>
{typo:$form.footerText}