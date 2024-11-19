<?php
    $__metaDetail = MetaDetailUtility::GetForContext( null, Page::$RequestData[0] );

    if( empty( $__pageTitle )){
        $__pageTitle = "Оформление заказа";
    }

    $__breadcrumbs = array(
        array(
            "title"  => "Корзина"
        )
    );
?>
{increal:tmpl://fe/elements/header.tmpl.php}
<div class="block-content">
    {increal:tmpl://fe/elements/breadcrumbs.tmpl.php}
    <div class="block-body clearfix">
        <!-- корзина -->
        <div class="order-basket">
            <div class="lt-corner">&nbsp;</div>
            <div class="lr-corner">&nbsp;</div>
            <?php if(!empty ($__cart)){ ?>
                <table>
                    <thead>
                    <tr>
                        <td class="order-item-product"><span>Товар</span></td>
                        <td class="order-item-size"><span>Размер</span></td>
                        <td class="order-item-count"><span>Кол-во</span></td>
                        <td class="order-item-price"><span>Цена</span></td>
                        <td class="order-item-action"><span>Удалить</span></td>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="3">
                            <div class="fl-l">
                                Оформить заказ без регистрации
                            </div>
                        </td>
                        <td colspan="2">

                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach( $__cart["products"] as $product ){?>
                        <tr>
                            <td class="order-item-product">
                                <a href="{$product[url]}" class="product-thumb-view"><img src="{web:vfs://}{$product[smallImage]}" alt="sample image" property="thumbnailUrl"></a>
                                <div>{$product[baseTitle]}
                                </div>
                            </td>
                            <td>{$product[title]}</td>
                            <td>
                                <a class="plus" data-product-id="{$product[id]}" data-v-id="{$product[vId]}">+</a>
                                <div class="order-item-counter">{$product[quantity]}</div>
                                <a class="minus" data-product-id="{$product[id]}" data-v-id="{$product[vId]}">-</a>
                            </td>
                            <td class="price">{$product[totalPrice]} руб</td>
                            <td><a class="delete-item" data-product-id="{$product[id]}" data-v-id="{$product[vId]}">&nbsp;</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
        <div class="fast-order fast-order-moveup">
            <form class="simple_form" method="post">
                <div class="column column-left">
                    <div class="row">
                        <label for="field1">ФИО<span class="reguired">*</span></label>
                        <input class="text <?= array_key_exists( "contact", $errors )?'error':'';?>" type="text" name="order[contact]" value="{form:$object.contact}" />
                    </div>
                    <div class="row">
                        <label for="field1">Телефон<span class="reguired">*</span></label>
                        <input class="text <?= array_key_exists( "phone", $errors )?'error':'';?>" type="text" name="order[phone]" value="{form:$object.phone}" />
                    </div>
                    <div class="row">
                        <label for="field1">Email</label>
                        <input class="text <?= array_key_exists( "email", $errors )?'error':'';?>" type="text" name="order[email]" value="{form:$object.email}" />
                    </div>
                </div>
                <div class="column column-right">
                    <div class="row">
                        <label for="field1">Адрес</label>
                        <input class="text <?= array_key_exists( "address", $errors )?'error':'';?>" type="text" name="order[address]" value="{form:$object.address}" />
                    </div>
                    <div class="row">
                        <label for="field1">Cпособ доставки<span class="reguired">*</span></label>
                        <div>
                            <select name="order[deliveryType]#" id="">
                                <option value="1">курьером</option>
                                <option value="2">самовывоз</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label>&nbsp;</label>
                        <button class="btn btn-black fl-l order-save" type="submit" name="save" value="true">оформить заказ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{increal:tmpl://fe/elements/footer.tmpl.php}
