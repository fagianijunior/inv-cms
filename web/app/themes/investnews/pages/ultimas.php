<?php
/* Template Name: Últimas */
get_header();

$paged = max(1, get_query_var('paged')); 
$args = [
    'post_type' => array('post', 'guias', 'patrocinados'),
    'posts_per_page' => 12, 
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish', 
];
$all_posts_query = new WP_Query($args);

?>
<section class="category-title">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</section>
<section class="category-second">
    <div class="container">
        <div class="category-second-content">
            <div class="category-posts">
                <?php if ($all_posts_query->have_posts()): ?>
                    <div class="category-posts-content">
                        <?php while ($all_posts_query->have_posts()): $all_posts_query->the_post(); ?>
                        <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>" class="category-post">
                <div class="category-post-image">
                  <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="">
                </div>
                <div class="category-post-content">
                  <span>
                    <?php single_cat_title(); ?>
                  </span>
                  <h2>
                    <?php echo $post->post_title; ?>
                  </h2>
                  <p>
                    <?php echo get_the_date('j \d\e F \d\e Y', $post->ID); ?>
                  </p>
                </div>
              </a>
                            <hr>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Nenhum post encontrado.</p>
                <?php endif; ?>
                <div class="pagination">
                   <div class="nu-nav-links">
                    <?php if (function_exists("pagination")) {
                    pagination($all_posts_query->max_num_pages);
                    } ?>
                </div>
                </div>
            </div>
            <div class="category-side">
                <?php get_template_part('components/on-code/newsletter/newsletter'); ?>
            </div>
        </div>
    </div>
</section>

<?php
// Resetando a query principal
wp_reset_postdata();

get_footer();
?>
