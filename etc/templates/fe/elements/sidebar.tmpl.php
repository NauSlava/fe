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
            <a href="<?=LinkUtility::GetCategoryItemUrl( $item );?>" title="{$item.title}"><span class="nav--label">{$item.title}</span></a>
            <?php if( !empty( $item->nodes )){ ?>
                <ul class='nav-sub' <?= !empty( $addClass ) ? 'style="display:block;padding:0 0 0 10px;"' :'';?>>
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

//print_r($nItem);
					if($nItem->categoryId!=50) { 
?>
                            <a href="<?= LinkUtility::GetCategoryItemUrl( $nItem );?>" title="{$nItem.title}" <?= !empty( $addChildClass ) ? 'class="active"':"";?>><span class="nav--label">{$nItem.title}</span></a>
				<? } else { 
?>
				<a  href="/catalog/materiali/kroshka-dlya-polya" title="{$nItem.title}" <?= !empty( $addChildClass ) ? 'class="active"':"";?>><span class="nav--label">{$nItem.title}</span></a-->
				<? }
 ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </li>
    <?php } ?>
</ul>
            <?php $counterArticles = 1;
		$art=0;
	        if (!empty($lastArticles)){ 
		?>
	            <div class="row leftarticles hidden">
			<h3>Полезные статьи</h3>
	        	    <?php foreach ($lastArticles as $item){
				$art++;
				if($art<4) {
				 ?>
			            <div class="articleItem mb-4">
        			        <a href="{web:/}articles/{$item.alias}" class="h5 d-block"><h4>{$item.title}</h4></a>
                			<p>
		                	    <span class="articleDate"><?= $item->publicationDate->format('d.m.Y'); ?></span>. <? echo substr($item->foreword,0,500);?>
	        		            <a href="{web:/}articles/{$item.alias}">Читать далее</a>
		        	        </p>
			            </div>
		            <?php } } //print_r($item);?>

	            </div>
            <?php } ?>
