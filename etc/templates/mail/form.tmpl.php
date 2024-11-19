<? /** @var FormResult $formResult */ ?>
Здравствуйте, с формы &laquo;{$formResult.form.title}&raquo; поступил новый отклик №{$formResult.formResultId}.<br/><br/>
<table>
    <tr>
        <th align="left">Дата создания</th>
        <td><?= $formResult->createdAt->DefaultFormat() ?></td>
    </tr>
<? foreach( $formResult->form->formFields as $field ) { ?>
    <tr>
        <th align="left">{$field.title}</th>
        <? $value = ArrayHelper::GetValue( $formResult->answers, $field->formFieldId, '' ); ?>
        <? if ( is_array( $value ) ) { $value = implode(', ', $value ); } ?>
        <td><?= HtmlHelper::RenderToForm(  $value ) ?></td>
    </tr>
<? } ?>
</table>

<p><a href="{web:vt://forms/results/edit/}{$formResult.formResultId}">{web:vt://forms/results/edit/}{$formResult.formResultId}</a></p>