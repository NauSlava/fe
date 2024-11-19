<?php if( !empty( $products )){ ?>
    <?php foreach( $products as $item ){ ?>
        <div class="col-md-3 productItemWrapper mb-4">
            <div class="productItem text-center">
                <a href="<?= LinkUtility::GetProductItemUrl( $item );?>">
                    <img src="{web:vfs://}{$item.smallImage.path}" class="img-fluid"/>
                </a>
                <div class="productItem--labels">
                    <?php if( !empty( $item->isLatest )){ ?>
                        <div class="productItem--label productItem--label-n"></div>
                    <?php } ?>
                    <?php if( !empty( $item->isRecomend )){ ?>
                        <div class="productItem--label productItem--label-fav"></div>
                    <?php } ?>
                    <?php if( !empty( $item->oldPrice )){ ?>
                        <div class="productItem--label productItem--label-pr"></div>
                    <?php } ?>
                </div>
                <div class="productItem--prices">
                    <div class="productItem--price productItem--price-new">Цена {$item.price} руб.</div>
                    <?php if( !empty( $item->oldPrice )){ ?>
                        <div class="productItem--price productItem--price-old">{$item.oldPrice} руб</div>
                    <?php } ?>
                </div>
            </div>
            <a href="<?= LinkUtility::GetProductItemUrl( $item );?>">{$item.title}</a>
            <p>{$item.foreword}</p>
        </div>
    <?php } ?>
<?php } ?>