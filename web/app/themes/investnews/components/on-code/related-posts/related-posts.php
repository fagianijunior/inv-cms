<?php
function related_posts($post_id)
{
    $post_type = get_post_type($post_id);

    if ($post_type === 'patrocinados') {
        $terms = get_the_terms($post_id, 'marcas');
        if ($terms && !is_wp_error($terms)) {
            $first_term = $terms[0];
            $term_name = $first_term->name;
            $term_id = $first_term->term_id;
            $term_link = get_term_link($term_id, 'marcas');
        }
    } else {
        $category = get_the_category($post_id);
        if ($category) {
            $first_category_name = $category[0]->cat_name;
            $category_id = $category[0]->term_id;
            $category_link = get_category_link($category_id);
        }
    }
    if ($post_type === 'patrocinados') {
        $title_link  = "Mais de ";
    } else {
        $title_link  = "Mais em ";
    
    }

    if (isset($term_name) || isset($first_category_name)) {
?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/components/on-code/related-posts/assets/css/related-posts.css">
        <section class="related-posts">
            <div class="container">
                <div class="top">
                    <p class="title"><?php echo  $title_link;?>
                        <span class="related-term">
                            <?php echo $post_type === 'patrocinados' ? $term_name : $first_category_name; ?>
                        </span>
                    </p>
                    <a href="<?php echo $post_type === 'patrocinados' ? $term_link : $category_link; ?>" title="Ver todos" class="see-all">
                        <span class="text">Ver todos</span>
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                <path d="M1.0015 1.32289C1.0015 1.16202 1.08044 1.00489 1.22553 0.911674C1.45256 0.765834 1.75476 0.831242 1.9006 1.05827C3.29435 3.22333 5.09932 5.02827 7.26362 6.42279C7.40419 6.51374 7.49062 6.66786 7.49062 6.8355C7.49062 7.00389 7.40419 7.15876 7.26287 7.24971C5.10459 8.63895 3.30562 10.4364 1.91488 12.5932C1.76979 12.8187 1.47059 12.9059 1.24056 12.7676C1.003 12.6248 0.931596 12.315 1.08044 12.0835C2.28175 10.2154 3.77322 8.60211 5.52556 7.27226C5.81498 7.05275 5.81498 6.61749 5.52556 6.39798C3.77472 5.06887 2.28174 3.45487 1.07819 1.586C1.02556 1.50406 1 1.41235 1 1.32214L1.0015 1.32289Z" fill="#777777" stroke="#777777" stroke-width="0.5" />
                            </svg>
                        </div>
                    </a>
                </div>
                <?php
                $related_posts_query_args = array(
                    'post__not_in' => array($post_id),
                    'posts_per_page' => 4,
                );

                if ($post_type === 'patrocinados') {
                    $related_posts_query_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'marcas',
                            'field' => 'term_id',
                            'terms' => $term_id,
                        ),
                    );
                } else {
                    $related_posts_query_args['cat'] = $category_id;
                }

                $related_posts_query = new WP_Query($related_posts_query_args);

                if ($related_posts_query->have_posts()) {
                ?>
                    <div class="related-post-list">
                        <?php while ($related_posts_query->have_posts()) {
                            $related_posts_query->the_post(); ?>
                            <div class="post-item">
                                <div class="item-image">
                                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="noopener noreferrer">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <?php
                                            echo get_the_post_thumbnail(null, array(300, 197), array('class' => 'reg-img lazy'));
                                            echo get_the_post_thumbnail(null, array(86, 86), array('class' => 'mob-img lazy'));
                                            ?>
                                        <?php } else { ?>
                                            <img src="<?php bloginfo('template_url'); ?>/gutenberg-template-parts/block/block-parts/simple-list/assets/images/investnews-logo.png" class="logo-img" alt="InvestNews" width="300" height="157">
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="item-content">
                                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="title" rel="noopener noreferrer">
                                        <?php echo get_the_title(); ?>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <a href="<?php echo $post_type === 'patrocinados' ? $term_link : $category_link; ?>" title="Ver todos" class="see-all mobile">
                        <span class="text">Ver todos</span>
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                <path d="M1.0015 1.32289C1.0015 1.16202 1.08044 1.00489 1.22553 0.911674C1.45256 0.765834 1.75476 0.831242 1.9006 1.05827C3.29435 3.22333 5.09932 5.02827 7.26362 6.42279C7.40419 6.51374 7.49062 6.66786 7.49062 6.8355C7.49062 7.00389 7.40419 7.15876 7.26287 7.24971C5.10459 8.63895 3.30562 10.4364 1.91488 12.5932C1.76979 12.8187 1.47059 12.9059 1.24056 12.7676C1.003 12.6248 0.931596 12.315 1.08044 12.0835C2.28175 10.2154 3.77322 8.60211 5.52556 7.27226C5.81498 7.05275 5.81498 6.61749 5.52556 6.39798C3.77472 5.06887 2.28174 3.45487 1.07819 1.586C1.02556 1.50406 1 1.41235 1 1.32214L1.0015 1.32289Z" fill="#777777" stroke="#777777" stroke-width="0.5" />
                            </svg>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </section>
<?php
    }
}
?>