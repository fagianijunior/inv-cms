<?php
    $coluna_3 = get_field('coluna_3');
    $ordem_cronologica_coluna_3 = $coluna_3['ordem_cronologica_coluna_3'];
    $ordem_cronologica_coluna_3_lista_posts = $coluna_3['ordem_cronologica_coluna_3_lista_posts'];
    ?>
    <div class="column column-3">

        <?php // DESTAQUE 3 | POST GRANDE - ORDEM CRONOLÓGICA ?>
        <?php if(($ordem_cronologica_geral === true) || ($ordem_cronologica_coluna_3 === true)) { ?>
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
                <div class="featured-bigger">
                    <div class="content">
                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title($post->ID) ?>" class="post-thumbnail">
                                <?php the_post_thumbnail(array(300,180)); ?>
                            </a>
                        <?php } ?>
                        <?php $post_type = get_post_type( $post->ID ); ?>
                        <?php if($post_type == 'wsj') { ?>
                            <?php 
                                $terms = get_the_terms( $post->ID, 'categoria-wsj' );	
                                if ( !empty( $terms ) ){
                                        // retorna primeiro item
                                        $term = array_shift( $terms );
                                        $catName = $term->name;
                                        $catSlug = get_term_link( $term->slug, 'categoria-wsj' )
                                    ?>
                                        <a href="<?php echo $catSlug;?>" title="<?php echo $catName; ?>" class="category"><?php echo $catName; ?></a>
                                    <?php
                                }
                            ?>
                        <?php } if($post_type == 'infograficos') { ?>
                            <a href="<?php echo home_url('/infograficos/');?>" title="Infográficos" class="category"><?php echo 'Infográficos'; ?></a>
                        <?php } else { ?>
                            
                                            <?php
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
                                            ?>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="title"><?php the_title(); ?></a>
                        <?php 
                            $posts_relacionados_home = get_field('posts_relacionados_home'); 
                            if($posts_relacionados_home) {
                                $posts_relacionados_home = array_slice( $posts_relacionados_home, 0, 2 );
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
                </div>
                <?php } ?>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
        <?php } ?>

        <?php // DESTAQUE 3 | POST GRANDE - SELEÇÃO MANUAL ?>
        <?php if(($ordem_cronologica_geral !== true) && ($ordem_cronologica_coluna_3 !== true)) { ?>
            <?php if(have_rows('coluna_3')) { ?>
                <?php while(have_rows('coluna_3')) { the_row(); ?>
                    <?php if(have_rows('conteudo_coluna_3')) { ?>
                        <?php while(have_rows('conteudo_coluna_3')) { the_row(); ?>
                            <div class="featured-bigger">
                                <?php $post_item = get_sub_field('post_item'); ?>
                                <?php if($post_item) { ?>
                                    <?php $post_type = get_post_type( $post_item[0] ); ?>
                                    <div class="content">
                                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail($post_item[0]))) { ?>
                                            <a href="<?php the_permalink($post_item[0]); ?>" title="<?php echo get_the_title($post_item[0]) ?>" class="post-thumbnail">
                                                <?php echo get_the_post_thumbnail($post_item[0], array(300,180)); ?>
                                            </a>
                                        <?php } ?>
                                        
                                        <?php if($post_type == 'wsj') { ?>
                                            <?php 
                                                $terms = get_the_terms(  $post_item[0], 'categoria-wsj' );	
                                                if ( !empty( $terms ) ){
                                                        // retorna primeiro item
                                                        $term = array_shift( $terms );
                                                        $catName = $term->name;
                                                        $catSlug = get_term_link( $term->slug, 'categoria-wsj' )
                                                    ?>
                                                        <a href="<?php echo $catSlug;?>" title="<?php echo $catName; ?>" class="category"><?php echo $catName; ?></a>
                                                    <?php
                                                }
                                            ?>
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
                                            $posts_relacionados_home = array_slice( $posts_relacionados_home, 0, 3 );
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
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            
        <?php } ?>

        <?php // DESTAQUE 3 | POSTS REUTERS - ORDEM CRONOLÓGICA ?>
        <?php if(($ordem_cronologica_geral === true) || ($ordem_cronologica_coluna_3_lista_posts === true)) { ?>
                                    
            <div class="posts-list">
                <?php global $do_not_duplicate;
                global $post;
                $recent = new WP_Query(
                    array(
                        'post_type'      => 'post',
                        'post__not_in' => $do_not_duplicate,
                        'orderby'        => 'date',
                        'posts_per_page' => 2,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'post_tag',
                                'field'    => 'slug',
                                'terms'    => 'reuters',
                            ),
                        ),
                        'ignore_sticky_posts' => 1,
                    )
                );
                while ($recent->have_posts()) : $recent->the_post();
                $do_not_duplicate[] = $post->ID;
                    if (isset($do_not_duplicate)) { ?>
                        <div class="item-post">
                            <a href="/tag/reuters" title="Reuters" class="category">Reuters</a>
                            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="title"><?php the_title(); ?></a>
                        </div>
                    <?php } 
                endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php } ?>

        <?php // DESTAQUE 3 | POSTS REUTERS - SELEÇÃO MANUAL ?>
        <?php if(($ordem_cronologica_geral !== true) && ($ordem_cronologica_coluna_3_lista_posts !== true)) { ?>
            <?php if(have_rows('coluna_3')) { ?>
                <?php while(have_rows('coluna_3')) { the_row(); ?>
                    <?php if(have_rows('conteudo_coluna_3_lista_posts')) { ?>
                        <div class="posts-list">
                            <?php while(have_rows('conteudo_coluna_3_lista_posts')) { the_row(); ?>
                                <?php 
                                    $post_list_item = get_sub_field('post_list_item');
                                ?>
                                <?php if($post_list_item) { ?>
                                    <?php
                                        $post_author = $post_list_item[0]->post_author;
                                        //$sponsored_content = get_sub_field('sponsored_content'); 
                                        $post_type = get_post_type( $post_list_item[0]->ID );
                                    ?>
                                    <div class="item-post">
                                        <?php if($post_type == 'patrocinados') { ?>
                                            <a href="<?php echo get_permalink(); ?>" title="Conteúdo de marca" class="category brand-flag">Conteúdo de marca</a>
                                        <?php } if($post_type == 'infograficos') { ?>
                                            <a href="<?php echo home_url('/infograficos/');?>" title="Infográficos" class="category"><?php echo 'Infográficos'; ?></a>
                                        <?php } if($post_type == 'post') { ?>
                                            <?php if($post_author == '61') { //Reuters ?>
                                                <a href="/tag/reuters" title="Reuters" class="category">Reuters</a>
                                            <?php } else { ?>
                                            <?php $categories = get_the_category($post_list_item[0]->ID); ?>
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
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <a href="<?php the_permalink($post_list_item[0]); ?>" title="<?php echo get_the_title($post_list_item[0]); ?>" class="title"><?php echo get_the_title($post_list_item[0]); ?></a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>

    </div>	