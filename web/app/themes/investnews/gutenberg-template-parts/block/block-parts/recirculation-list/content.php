<div class="container">
    <?php 
        $recirculation_title = get_field('recirculation_title'); 
        $recirculation_list = get_field('recirculation_list');
    ?>
    <?php if($recirculation_title) { ?>
        <p class="title"><?php echo $recirculation_title; ?></p>
    <?php } ?> 
    <?php if($recirculation_list) { ?>
        <ul class="recirculation-list">
            <?php foreach( $recirculation_list as $item ) { ?>
                <li class="list-item">
                    <a href="<?php echo get_the_permalink($item->ID); ?>" title="<?php echo get_the_title($item->ID); ?>" class="item-title"><?php echo get_the_title($item->ID); ?></a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>