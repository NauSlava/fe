<?php if( !empty( $__menu )){ ?>
    <ul class="mf_usc">
        <?php foreach ( $__menu as $item ) { ?>
            <li class="mf_fl"><a href="{$item.url}" title="{$item.title}">{$item.title}</a></li>
        <?php } ?>
    </ul>
<?php } ?>