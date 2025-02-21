<?php 
    if( isset( $block['data']['investnews_block_preview_image_help'] )  ) {    
    /* rendering in inserter preview  */
    echo '<img src="'. $block['data']['investnews_block_preview_image_help'] .'" style="width:100%; height:auto;">';
    } else {
?>
   <section id="destaques">
       <div class="container">
            <div class="grid">
            <?php include('block-parts/top-video/content.php') ?>
            </div>
        </div>
    </section>
<?php } ?>