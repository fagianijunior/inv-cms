<?php
    $coluna_2 = get_field('coluna_2');
    $ordem_cronologica_coluna_2 = $coluna_2['ordem_cronologica_coluna_2'];

    // DESTAQUE 2 - ORDEM CRONOLÓGICA
    if(($ordem_cronologica_geral === true) || ($ordem_cronologica_coluna_2 === true)) { ?>

        <div class="column column-2">
            <div class="post-list">
                <?php
                    global $do_not_duplicate;
                    global $post;
                    $recent = new WP_Query(
                        array(
                            'post_type'      => 'post',
                            'post__not_in' => $do_not_duplicate,
                            'orderby'        => 'date',
                            'posts_per_page' => 4,
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
                            <?php $post_type = get_post_type( $post->ID ); ?>
                            <div class="item-post">
                                <?php if($post_type == 'patrocinados') { ?>
                                    <a href="<?php echo get_permalink(); ?>" title="Conteúdo de marca" class="category brand-flag">Conteúdo de marca</a>
                                <?php } if($post_type == 'infograficos') { ?>
                                    <a href="<?php echo home_url('/infograficos/');?>" title="Infográficos" class="category"><?php echo 'Infográficos'; ?></a>
                                <?php } else { ?>
                                    
                                    <?php $categories = get_the_category($post->ID); ?>
                                    <?php 
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
                                    ?>
                                <?php } ?>
                                <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="title"><?php the_title(); ?></a>
                                <?php 
                                    $posts_relacionados_home = get_field('posts_relacionados_home'); 
                                    if($posts_relacionados_home) {
                                        $posts_relacionados_home = array_slice( $posts_relacionados_home, 0, 1 );
                                    }
                                ?>
                                <?php if($posts_relacionados_home) { ?>
                                    <ul class="featured-related-list">
                                        <?php foreach( $posts_relacionados_home as $item ){ ?>
                                            <?php setup_postdata($item); ?> 
                                            <li class="item">
                                                <a href="<?php the_permalink($item->ID) ?>" title="<?php echo get_the_title($item->ID); ?>" class="title"><?php echo get_the_title($item->ID); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        <?php }
                    }
                    wp_reset_postdata(); ?>
            </div>
        </div>
    <?php } ?>

    <?php
    // DESTAQUE 2 - SELEÇÃO MANUAL
    if(($ordem_cronologica_geral !== true) && ($ordem_cronologica_coluna_2 !== true)) { ?>
        <?php if(have_rows('coluna_2')) { ?>
            <?php while(have_rows('coluna_2')) { the_row(); ?>
                <?php if(have_rows('conteudo_coluna_2')) { ?>
                    <div class="column column-2">
                        <div class="post-list">
                            <?php while(have_rows('conteudo_coluna_2')) { the_row(); ?>
                                <?php $post_item = get_sub_field('post_item'); ?>
                                <?php if($post_item) { ?>
                                    <div class="item-post">
                                        <?php $post_type = get_post_type( $post_item[0] ); ?>
                                        <?php if($post_type == 'patrocinados') { ?>
                                            <a href="<?php echo get_permalink(); ?>" title="Conteúdo de marca" class="category brand-flag">Conteúdo de marca</a>
                                        <?php } if($post_type == 'infograficos') { ?>
                                            <a href="<?php echo home_url('/infograficos/');?>" title="Infográficos" class="category"><?php echo 'Infográficos'; ?></a>
                                        <?php } else { ?>
                                            <?php
                                            $categories = get_the_category($post_item[0]);

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
                                            ?>
                                        <?php } ?>
                                        <a href="<?php the_permalink($post_item[0]); ?>" title="<?php echo get_the_title($post_item[0]); ?>" class="title"><?php echo get_the_title($post_item[0]); ?></a>
                                        <?php 
                                            $posts_relacionados_home = get_sub_field('posts_relacionados'); 
                                            if($posts_relacionados_home) {
                                                $posts_relacionados_home = array_slice( $posts_relacionados_home, 0, 1 );
                                            }
                                        ?>
                                        <?php if($posts_relacionados_home) { ?>
                                            <ul class="featured-related-list">
                                                <?php foreach( $posts_relacionados_home as $item ){ ?>
                                                    <?php setup_postdata($item); ?> 
                                                    <li class="item">
                                                        <a href="<?php the_permalink($posts_relacionados_home[0]) ?>" title="<?php echo get_the_title($posts_relacionados_home[0]); ?>" class="title"><?php echo get_the_title($posts_relacionados_home[0]); ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>