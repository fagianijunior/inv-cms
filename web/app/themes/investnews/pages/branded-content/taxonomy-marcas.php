<?php get_header();

// Obter o objeto da taxonomia atual
$current_term = get_queried_object();

$term = get_queried_object()->term_id;
$image_branded = get_field('brand_image', 'post_tag_'.$term);


// Recuperar posts automáticos e selecionados com ACF
$auto_posts = get_field('category_auto_posts', $current_term);
$select_posts_items = get_field('category_posts', $current_term);

// Obter posts da taxonomia
$query_args = array(
  'post_type' => 'patrocinados', // Ajuste para o CPT relevante, se necessário
  'posts_per_page' => 3,
  'orderby' => 'date',
  'order' => 'DESC',
  'tax_query' => array(
    array(
      'taxonomy' => $current_term->taxonomy,
      'field' => 'term_id',
      'terms' => $current_term->term_id,
    ),
  ),
);
$posts_query = new WP_Query($query_args);
$posts = $posts_query->posts;

// Definir posts destacados
$source_posts = is_array($auto_posts) ? $auto_posts : (is_array($select_posts_items) ? $select_posts_items : []);
$featured_posts = array_slice($source_posts, 0, 3);

// Paginação
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


$featured_posts_ids = array_map(function ($post) {
  return $post->ID;
}, $featured_posts);

// Recuperar o restante dos posts para exibir
$rest_query_args = array(
  'post_type' => 'patrocinados', // Ajuste para o CPT relevante, se necessário
  'posts_per_page' => 12,
  'paged' => $paged,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => $featured_posts_ids,
  'tax_query' => array(
    array(
      'taxonomy' => $current_term->taxonomy,
      'field' => 'term_id',
      'terms' => $current_term->term_id,
    ),
  ),
);
$rest_posts_query = new WP_Query($rest_query_args);
$rest_posts = $rest_posts_query->posts;

$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  


?>

<section class="category-title bc-hero">
    <div class="container">
        <span class="brand-top">
            Conteúdo de marca
        </span>
        <div class="d-flex">
            <h1><?php single_cat_title(); ?></h1>
            <img src="<?php echo $image_branded;?>" alt="<?php single_cat_title(); ?>" title="<?php single_cat_title(); ?>">
        </div>
        <hr>
    </div>
</section>
<section class="category-featured">
    <div class="container">
        <div class="category-featured-content">
            <a href="<?php echo get_permalink($featured_posts[0]->ID); ?>" class="featured-post highlight" title="<?php echo $featured_posts[0]->post_title; ?>">
                <div class="featured-post-image">
                    <img src="<?php echo get_the_post_thumbnail_url($featured_posts[0]->ID); ?>" alt="">
                </div>
                <div class="featured-post-content">
                    <h2>
                        <?php echo $featured_posts[0]->post_title; ?>
                    </h2>
                    <p>
                        <?php echo $featured_posts[0]->post_excerpt; ?>
                    </p>
                </div>
            </a>

            <a href="<?php echo get_permalink($featured_posts[1]->ID); ?>" class="featured-post" title="<?php echo $featured_posts[1]->post_title; ?>">
                <div class="featured-post-content">
                    <h2>
                        <?php echo $featured_posts[1]->post_title; ?>
                    </h2>
                    <p>
                        <?php echo $featured_posts[1]->post_excerpt; ?>
                    </p>
                </div>
            </a>

            <a href="<?php echo get_permalink($featured_posts[2]->ID); ?>" class="featured-post" title="<?php echo $featured_posts[2]->post_title; ?>">
                <div class="featured-post-content">
                    <h2>
                        <?php echo $featured_posts[2]->post_title; ?>
                    </h2>
                    <p>
                        <?php echo $featured_posts[2]->post_excerpt; ?>
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>
<section class="category-second">
    <div class="container">
        <div class="category-second-content">
            <div class="category-posts">
                <div class="category-posts-content">
                    <!-- Posts with pagination -->
                    <?php
                    if ($rest_posts) :
                        foreach ($rest_posts as $post) :
                        setup_postdata($post);
                    ?>
                    <a href="<?php echo get_permalink($post->ID); ?>" class="category-post" title="<?php echo $post->post_title;  ?>">
                        <div class="category-post-image">
                            <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="">
                        </div>
                        <div class="category-post-content">
                            <h2>
                                <?php echo $post->post_title; ?>
                            </h2>
                            <p>
                                <?php echo get_the_date('j \d\e F \d\e Y', $post->ID); ?>
                            </p>
                        </div>
                    </a>
                    <hr>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="pagination">
                    <div class="nu-nav-links pagination">
                        <?php echo paginate_links(array(
                        'total' => $rest_posts_query->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
                        'format' => '?paged=%#%',
                        'show_all' => false,
                        'type' => 'plain',
                        'prev_next' => true,
                        'prev_text' => __('<svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none">
                        <path d="M6.9985 0.988906C6.9985 0.828031 6.91956 0.670908 6.77447 0.57769C6.54744 0.431849 6.24524 0.497257 6.0994 0.724287C4.70565 2.88934 2.90068 4.69429 0.736384 6.0888C0.595811 6.17975 0.50938 6.33387 0.50938 6.50151C0.50938 6.66991 0.59581 6.82477 0.737131 6.91572C2.89541 8.30497 4.69438 10.1024 6.08512 12.2592C6.23021 12.4847 6.52941 12.5719 6.75944 12.4336C6.997 12.2908 7.0684 11.981 6.91956 11.7495C5.71825 9.88138 4.22678 8.26813 2.47444 6.93827C2.18502 6.71876 2.18502 6.2835 2.47444 6.06399C4.22528 4.73489 5.71826 3.12088 6.92181 1.25202C6.97444 1.17008 7 1.07836 7 0.988153L6.9985 0.988906Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                        </svg> Anterior'),
                        'next_text' => __('Próximo <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none">
                        <path d="M1.0015 0.988906C1.0015 0.828031 1.08044 0.670908 1.22553 0.57769C1.45256 0.431849 1.75476 0.497257 1.9006 0.724287C3.29435 2.88934 5.09932 4.69429 7.26362 6.0888C7.40419 6.17975 7.49062 6.33387 7.49062 6.50151C7.49062 6.66991 7.40419 6.82477 7.26287 6.91572C5.10459 8.30497 3.30562 10.1024 1.91488 12.2592C1.76979 12.4847 1.47059 12.5719 1.24056 12.4336C1.003 12.2908 0.931596 11.981 1.08044 11.7495C2.28175 9.88138 3.77322 8.26813 5.52556 6.93827C5.81498 6.71876 5.81498 6.2835 5.52556 6.06399C3.77472 4.73489 2.28174 3.12088 1.07819 1.25202C1.02556 1.17008 1 1.07836 1 0.988153L1.0015 0.988906Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                        </svg>'),
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <div class="category-side">
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>