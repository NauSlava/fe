<ul class="list-unstyled sidebarMenu">
    <?php foreach( $categoryMenu as $item ){
        $addClass = "";
        if(
            ( !empty( $__category->parentCategoryId ) &&  ( $__category->parentCategoryId == $item->categoryId ))
            ||
            ( !empty( $__category->categoryId ) &&  ( $__category->categoryId == $item->categoryId ))
        ){
            $addClass = "active";
        }
        ?>
        <li class="nav--item {$item.menuClass} {$addClass} <?=!empty( $item->nodes )?'dropdown':''?>">
            <a href="<?=LinkUtility::GetCategoryItemUrl( $item );?>" alt="{$item.title}"><span class="nav--label">{$item.title}</span></a>
            <?php if( !empty( $item->nodes )){ ?>
                <ul class='nav-sub' <?= !empty( $addClass ) ? 'style="display:block"' :'';?>>
                    <?php foreach( $item->nodes as $nItem ){ ?>
                        <li class="nav--item">
                            <?php
                            $addChildClass = "";
                            if(
                                ( !empty( $__category->parentCategoryId ) &&  ( $__category->parentCategoryId == $nItem->categoryId ))
                                ||
                                ( !empty( $__category->categoryId ) &&  ( $__category->categoryId == $nItem->categoryId ))
                            ){
                                $addChildClass = "active";
                            }
                            ?>
                            <a href="<?= LinkUtility::GetCategoryItemUrl( $nItem );?>" alt="{$nItem.title}" <?= !empty( $addChildClass ) ? 'class="active"':"";?>><span class="nav--label">{$nItem.title}</span></a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </li>
    <?php } ?>
</ul>