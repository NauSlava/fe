<?php
    // add default path to breadcrumbs
    if ( isset( $__breadcrumbs ) ) {
        array_unshift( $__breadcrumbs, array( 'title' => 'Главная', 'path' => '/' ) );
    }

    // Create breadcrumbs array for view
    if ( !empty( $__breadcrumbs ) ) {
        foreach( $__breadcrumbs as $breadcrumb ) {
            $__breadcrumbsArr[] = ( !empty( $breadcrumb['path'] ) ) ? FormHelper::FormLink( Site::GetWebPath( $breadcrumb['path'] ), $breadcrumb['title'] ) : $breadcrumb['title'];
        }
    }

    // render breadcrumbs
    if (!empty( $__breadcrumbs ) ) { ?>
    <div class="container">
        <ol class="breadcrumb mt-2 mb-4"  itemscope itemtype="https://schema.org/BreadcrumbList">
            <?php foreach( $__breadcrumbs as $breadcrumb){?>
                <?php if( !empty( $breadcrumb["path"] ) ){?>
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="<?=Site::GetWebPath( $breadcrumb['path']);?>" itemprop="item" alt="{$breadcrumb[title]}"><span itemprop="name">{$breadcrumb[title]}</span></a></li>
                <?php }else{?>
                    <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">{$breadcrumb[title]}</li>
                <?php } ?>
            <?php } ?>
        </ol>
    </div>
    <?php } ?>
