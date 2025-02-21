<?php 
    if( isset( $block['data']['investnews_block_preview_image_help'] )  ) {    
    /* rendering in inserter preview  */
    echo '<img src="'. $block['data']['investnews_block_preview_image_help'] .'" style="width:100%; height:auto;">';
    } else {

$row_title = get_field('row_title'); 
$row_title_slug = str_replace(' ', '-', strtolower($row_title)); 

?>


<section class="simple-list <?php echo $row_title_slug; ?>">
    <?php
        // == CONTENT == 
        include('block-parts/simple-list/content.php'); 
    ?>
</section>
<?php } ?>