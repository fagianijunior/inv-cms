<?php 
/**
 * variables items
 */

$title_block = get_field('block_title');
$link_block = get_field('link_block_title');
$alt_title_post = get_field('alternative_title');
$ads_option = get_field('ads_option');

?>
<div class="content-middle">
    <h2>
        <?php if($link_block) { ?>
            <?php
                $link_url = $link_block['url'];
                $link_target = $link_block['target'] ? $link_block['target'] : '_self';
            ?>
            <a href="<?php echo $link_url; ?>" target="<?php echo esc_attr( $link_target ); ?>" title="<?php echo $title_block; ?>">
                <?php echo $title_block; ?>
            </a>
        <?php } else { ?>
            <?php echo $title_block; ?>
        <?php } ?>
    </h2>
    <div class="d-grid">
        <div class="featured-post-middle">
            <?php
            $featured_posts = get_field('current_post');
            if( $featured_posts ): ?>
                <?php foreach( $featured_posts as $post ): 
                    setup_postdata($post); 
                    $post_type = get_post_type( $post->ID );
                    ?>
                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                        <a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID) ?>" class="img-current">
                            <?php echo get_the_post_thumbnail($post->ID, 'middle-page-current'); ?>
                        </a>
                    <?php } else { ?>
                        <img src="<?php bloginfo('template_url'); ?>/gutenberg-template-parts/block/block-parts/simple-list/assets/images/investnews-logo.png" class="logo-img" alt="InvestNews" width="300" height="157">
                    <?php } ?>
                    <?php if($post_type == 'infograficos') { ?>
                        <a href="<?php echo home_url('/infograficos/');?>" title="Infográficos" class="category"><?php echo 'Infográficos'; ?></a>
                    <?php } if($post_type == 'post') { 
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) {
                            // Encontre a categoria pai
                            $parent_category = $categories[0];
                            foreach ($categories as $category) {
                                if ($category->category_parent == 0) {
                                    $parent_category = $category;
                                    break;
                                }
                            }
                            $catName = $parent_category->cat_name;
                            $catSlug = $parent_category->slug;
                            ?>
                            <a href="<?php echo esc_url(get_category_link($parent_category->term_id)); ?>" title="<?php echo esc_html($catName); ?>" class="category"><?php echo esc_html($catName); ?></a>
                            <?php
                        }
                    }
                    ?>
                    <a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="title"><?php echo get_the_title($post->ID); ?></a>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="posts-middle-list">
            <?php if ( have_rows('posts_list') ) : ?>
                <?php while( have_rows('posts_list') ) : the_row(); ?>
                    <div class="item-post">
                        <?php
                        $featured_posts = get_sub_field('post_item');
                        if( $featured_posts ): ?>
                            <?php foreach( $featured_posts as $post ): 
                                setup_postdata($post); 
                                $post_type = get_post_type( $post->ID );
                                ?>
                                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                    <a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID) ?>" class="item-thumb">
                                        <?php echo get_the_post_thumbnail($post->ID, 'thumb-middle-size'); ?>
                                    </a>
                                <?php } ?>
                                <div class="conent-post">
                                    <?php if($post_type == 'infograficos') { ?>
                                        <a href="<?php echo home_url('/infograficos/');?>" title="Infográficos" class="category"><?php echo 'Infográficos'; ?></a>
                                        <?php } if($post_type == 'patrocinados') { ?>
                                            <a href="<?php echo get_permalink(); ?>" title="Conteúdo de marca" class="category brand-flag">Conteúdo de marca</a>
                                        <?php } if($post_type == 'post') { 
                                        $categories = get_the_category($post->ID);
                                        if (!empty($categories)) {
                                            // Encontre a categoria pai
                                            $parent_category = $categories[0];
                                            foreach ($categories as $category) {
                                                if ($category->category_parent == 0) {
                                                    $parent_category = $category;
                                                    break;
                                                }
                                            }
                                            $catName = $parent_category->cat_name;
                                            $catSlug = $parent_category->slug;
                                            ?>
                                            <a href="<?php echo esc_url(get_category_link($parent_category->term_id)); ?>" title="<?php echo esc_html($catName); ?>" class="category"><?php echo esc_html($catName); ?></a>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <?php if(!$alt_title_post):?>
                                        <a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="title"><?php echo get_the_title($post->ID); ?></a>
                                    <?php else:?>
                                        <a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo $alt_title_post; ?>" class="title"><?php echo $alt_title_post; ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="components-side">
    <?php if($ads_option == true): ?>
    <div class="ads">
        <span>Publicidade</span>
        <?php echo adrotate_ad(4); ?>
    </div>
    <?php endif; 
    echo get_template_part('components/on-code/newsletter/newsletter') ?>
</div>