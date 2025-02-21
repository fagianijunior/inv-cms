<?php
    $coluna_1 = get_field('coluna_1');
    $ordem_cronologica_coluna_1 = $coluna_1['ordem_cronologica_coluna_1'];

    // DESTAQUE 1 - ORDEM CRONOLÓGICA
    if(($ordem_cronologica_geral === true) || ($ordem_cronologica_coluna_1 === true)) { ?>
        <div class="column column-1">
            <?php 	
            global $do_not_duplicate;
            global $post;
            $recent = new WP_Query(
                array(
                    'post_type'      => 'post',
                    'post__not_in' => $do_not_duplicate,
                    'orderby'        => 'date',
                    'posts_per_page' => 1,
                    'ignore_sticky_posts' => 1,
                    'tax_query'            => array(
                        array(
                            'taxonomy' => 'post_tag',
                            'field'    => 'slug',
                            'terms'    => 'reuters',
                            'operator' => 'NOT IN',
                        ),
                    ),
                )
            );
            while ($recent->have_posts()) { $recent->the_post();
                $do_not_duplicate[] = $post->ID;
                if (isset($do_not_duplicate)) { ?>
                    <div class="content">
                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title($post->ID); ?>" class="post-thumbnail">
                                <?php the_post_thumbnail(array(628, 377)); ?>
                            </a>
                        <?php } ?>
                        <?php $post_type = get_post_type( $post->ID ); ?>
                        <?php if($post_type == 'patrocinados') { ?>
                            <a href="<?php echo get_permalink(); ?>" title="Conteúdo de marca" class="category brand-flag">Conteúdo de marca</a>
                        <?php } if($post_type == 'infograficos') { ?>
                            <a href="<?php echo home_url('/infograficos/');?>" title="Infográficos" class="category"><?php echo 'Infográficos'; ?></a>
                        <?php } else { 
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
                        } ?>
                        <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="title"><?php the_title(); ?></a>
                        <?php $posts_relacionados_home = get_field('posts_relacionados_home'); ?>
                        <?php if($posts_relacionados_home) { ?>
                            <ul class="related-post-list">
                                <?php foreach( $posts_relacionados_home as $item ){ ?>
                                    <?php setup_postdata($item); ?> 
                                    <li class="item">
                                        <a href="<?php the_permalink($item->ID) ?>" title="<?php echo get_the_title($item->ID); ?>" class="title"><?php echo get_the_title($item->ID); ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } else { ?>
                            <a href="<?php the_permalink(); ?>" title="<?php echo wp_trim_words(get_the_excerpt(), 23, ''); ?>" class="excerpt"><p><?php echo wp_trim_words(get_the_excerpt(), 23, ''); ?></p></a>
                        <?php } ?>
                    </div>
                <?php 
                    }
                }	
            wp_reset_postdata(); ?>
        </div>
    <?php } ?>
    <?php 
    // DESTAQUE 1 - SELEÇÃO MANUAL
    if(($ordem_cronologica_geral !== true) && ($ordem_cronologica_coluna_1 !== true)) { ?>
        <div class="column column-1">
            <?php if(have_rows('coluna_1')) { ?>
                <?php while( have_rows('coluna_1') ){ the_row(); ?>
                    <?php if(have_rows('conteudo_coluna_1')) { ?>
                        <?php while( have_rows('conteudo_coluna_1') ){ the_row(); ?>
                            <?php
                            $featured_post = get_sub_field('post_item');
                            if( $featured_post ){ ?>
                                <?php foreach( $featured_post as $post ){ 
                                    setup_postdata($post); 
                                    $post_type = get_post_type( $post->ID );
                                    ?>
                                    <div class="content">
                                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                            <a href="<?php echo get_the_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="post-thumbnail">
                                                <?php echo get_the_post_thumbnail($post->ID, array(628, 377)); ?>
                                            </a>
                                        <?php } ?>
                                        
                                        <?php if($post_type == 'patrocinados') { ?>
                                            <a href="<?php echo get_permalink(); ?>" title="Conteúdo de marca" class="category brand-flag">Conteúdo de marca</a>
                                        <?php } if($post_type == 'infograficos') { ?>
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

                                    </div>
                                    <?php $posts_relacionados = get_sub_field('posts_relacionados'); ?>
                                    <?php if($posts_relacionados) { ?>
                                        <ul class="related-post-list">
                                            <?php foreach( $posts_relacionados as $item ){ ?>
                                                <?php setup_postdata($item); ?> 
                                                <li class="item">
                                                    <a href="<?php the_permalink($item->ID) ?>" title="<?php echo get_the_title($item->ID); ?>" class="title"><?php echo get_the_title($item->ID); ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } else { ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php echo wp_trim_words(get_the_excerpt(), 23, ''); ?>"><p><?php echo wp_trim_words(get_the_excerpt(), 23, ''); ?></p></a>
                                    <?php } ?>
                                <?php } ?>
                                <?php 
                                    wp_reset_postdata(); 
                                ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>