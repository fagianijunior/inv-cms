<?php $off_grid_image = get_field('off-grid-image'); ?>
<?php if($off_grid_image) { ?>
    <?php echo wp_get_attachment_image( $off_grid_image['ID'], 'full', "", array( "class" => "image-item" ) ); ?>
    <?php $off_grid_image_caption = get_field('off-grid-image-caption') ?>
    <?php if($off_grid_image_caption) { ?>
        <figcaption class="image-caption"><?php echo $off_grid_image_caption; ?></figcaption>
    <?php } ?>
<?php } ?>