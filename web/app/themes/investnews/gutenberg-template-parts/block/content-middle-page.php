<?php 
    if( isset( $block['data']['investnews_block_preview_image_help'] )  ) {    
    /* rendering in inserter preview  */
    echo '<img src="'. $block['data']['investnews_block_preview_image_help'] .'" style="width:100%; height:auto;">';
    } else {
?>
<section class="middle-page">
    <div class="container">
        <div class="d-flex">
            <?php include('block-parts/middle-page/content.php') ?>
        </div>
    </div>
</section>
<?php } ?>