<?php 
    if( isset( $block['data']['investnews_block_preview_image_help'] )  ) {    
    /* rendering in inserter preview  */
    echo '<img src="'. $block['data']['investnews_block_preview_image_help'] .'" style="width:100%; height:auto;">';
    } else {
?>
<section class="author-list">
    <?php
        // == CONTENT == 
        include('block-parts/author-list/content.php'); 
    ?>
</section>
<?php } ?>