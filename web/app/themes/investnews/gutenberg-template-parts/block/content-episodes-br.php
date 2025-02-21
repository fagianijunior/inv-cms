<?php 
    if( isset( $block['data']['investnews_block_preview_image_help'] )  ) {    
    /* rendering in inserter preview  */
    echo '<img src="'. $block['data']['investnews_block_preview_image_help'] .'" style="width:100%; height:auto;">';
    } else {
    // Componente for intenal list episodes on posts
?>
<section class="eps">
    <div class="container">
        <?php
        include('block-parts/episodes-br/content.php'); 
        ?>
    </div>
</section>
<?php } ?>