<?php
    /** @var int $__pageNumber */
    /** @var float $__pageCount */

    /** Paginator Area */
    $__pageNumber ++;
    $__pageCount        = ceil( $__pageCount );
    $endPosition      = $__pageNumber;
    $startPosition    = $__pageNumber;
    $selectedPosition = $__pageNumber;
    $subInterval      = 3;

    while ( ( ($endPosition < $__pageNumber +  $subInterval)
            && ($endPosition < $__pageCount) )
                ||
            ( ($endPosition < $__pageCount)
                && ($endPosition < $subInterval*2)
                && ($__pageNumber < $subInterval)) ) {
        $endPosition++;
    }

    while( ( ($startPosition > $__pageNumber -  $subInterval +1 )
            && ($startPosition > 1 ) )
                ||
            ( ($startPosition > 1)
                && ($startPosition > $__pageCount - $subInterval*2 + 1)
                && ($__pageNumber > $__pageCount - $subInterval)) ) {
        $startPosition --;
    }

    if ( $__pageCount > 1 ) {
?>
    <div class="pagination<?= !empty( $__paginatorClass ) ? $__paginatorClass : '' ?>">
        <div class='pagination--label'>Страницы</div>
        <ul class="pagination--pages">
		<?php $__pagesLinkOld = $__pagesLink; ?>
        <? if ( $__pageNumber != 1 ) {
            $__paginatorNumber = $__pageNumber - 2;
            $__paginatorNumber = !empty($__paginatorNumber )?$__paginatorNumber:'';

            if( empty( $__paginatorNumber )){
               $__pagesLink = $__pagesLinkNull;
            }
			
        ?><li  class="_nosep"><a  href="{web:$__pagesLink}<?= $__paginatorNumber ?><?= !empty($__paginatorNumber)?'/':''?>">←</a></li><? } ?>
<?php
		
        for( $i = $startPosition;  $i <= $endPosition; $i ++ ) {
            if  ($i == $__pageNumber ) {
?>
                <li class="active"><a href="">{$i}</a></li>
<?          } else  {
                $__paginatorNumber = $i - 1;
                $__paginatorNumber = !empty($__paginatorNumber )?$__paginatorNumber:'';

                if( empty( $__paginatorNumber )){
                    $__pagesLink = $__pagesLinkNull;
                }else{
					$__pagesLink = $__pagesLinkOld;
				}

             ?>
            <li><a href="{web:$__pagesLink}<?= $__paginatorNumber; ?><?= !empty($__paginatorNumber)?'/':''?>" title="{$i}">{$i}</a></li>
<?php
            }
        }
?>
            <? $__pagesLink = $__pagesLinkOld; if ( $__pageNumber < $__pageCount ) { ?><li><a href="{web:$__pagesLink}<?= $__paginatorNumber; ?><?= !empty($__paginatorNumber)?'/':''?>">→</a></li><? } ?>
        </ul>
    </div>
<?php
    }

    $__pageNumber --;
?>
