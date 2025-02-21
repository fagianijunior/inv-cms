<?php 
    if( isset( $block['data']['investnews_block_preview_image_help'] )  ) {    
    /* rendering in inserter preview  */
    echo '<img src="'. $block['data']['investnews_block_preview_image_help'] .'" style="width:100%; height:auto;">';
    } else {
?>
<section class="three-featured-columns">
	<div class="container">
		<?php 
			$ordem_cronologica_geral = get_field('ordem_cronologica_geral');
			// == DESTAQUE 1 == 
			include('block-parts/three-featured-columns/column-1.php'); 
			// == DESTAQUE 2 == 
			include('block-parts/three-featured-columns/column-2.php'); 
			// == DESTAQUE 3 == 
			include('block-parts/three-featured-columns/column-3.php'); 
		?>
	</div>
</section>	
<?php } ?>