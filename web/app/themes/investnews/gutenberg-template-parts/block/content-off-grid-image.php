<?php 
    if( isset( $block['data']['investnews_block_preview_image_help'] )  ) {    
    /* rendering in inserter preview  */
    echo '<img src="'. $block['data']['investnews_block_preview_image_help'] .'" style="width:100%; height:auto;">';
    } else {
?>
    <section class="off-grid-image">
        <div class="container">
            <?php
                // == CONTENT == 
                include('block-parts/off-grid-image/content.php'); 
            ?>
        </div>
    </section>
<?php } ?>