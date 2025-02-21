<div class="content-top">
    <h2><?php the_field('section_title'); ?></h2>
</div>
<div class="content-body">
    <?php
   $current_post_id = get_queried_object_id();

    global $post;

    $args = array(
        'post_type'      => 'post', 
        'posts_per_page' => 10, 
        'post_status'    => 'publish',
        'category_name'  => 'brasil-em-wall-street',
        'meta_key'       => 'numero_do_episodio',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
    );

    $query = new WP_Query($args);
  
    if ($query->have_posts()) :?>
        <div class="grid">
            <?php while ($query->have_posts()) : $query->the_post(); 
            $is_active = ($post->ID === $current_post_id) ? 'active' : '';
            ?>
                <div class="item-ep <?php echo $is_active; ?>"> 
                    <a href="<?php the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID)?>">
                        <?php if ( has_post_thumbnail($post->ID) ) { ?>
                            <?php 
                                echo get_the_post_thumbnail($post->ID, array(300,169), array( 'class' => 'reg-img lazy' )); 
                            ?>
                        <?php } else { ?>
                            <img src="<?php bloginfo('template_url'); ?>/gutenberg-template-parts/block/block-parts/simple-list/assets/images/investnews-logo.png" class="logo-img" alt="InvestNews" width="300" height="157">
                        <?php } ?>
                    </a>
                    <div class="text-ep">
                    <a href="<?php the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID)?>">
                        <span>Episódio <?php the_field('numero_do_episodio', $post->ID) ?></span>
                        <h3><?php the_title()?></h3>
                    </a>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();?>
        </div>
    <?php else :
        echo '<p>Sem posts encontrados.</p>';
    endif;
    ?>
</div>