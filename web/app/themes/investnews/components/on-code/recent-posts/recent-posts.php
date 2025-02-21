<?php
global $post;
$quantity = $args['quantity'] ? $args['quantity'] : 4;
$classPost = $args['side'] ? 'recent-posts-side' : 'recent-posts';

$recent = new WP_Query(array(
  'post_type' => array('post'),
  'posts_per_page' => $quantity,
  'ignore_sticky_posts' => 1,
  "orderby" =>  "post_date",
  "order"   =>  "DESC",
));
?>

<section class="<?php echo $classPost ?>" class="container">
  <h3>
    Últimas Notícias
  </h3>
  <div class="recent-posts-wrapper">
    <div class="recent-posts-items">
      <?php
      while ($recent->have_posts()) : $recent->the_post(); ?>
        <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" aria-label="Entrar" rel="bookmark" class="post-item">
          <div class="post-item-thumb">
            <img
              src="<?php echo get_the_post_thumbnail_url(); ?>"
              alt="<?php the_title(); ?>"
              width="308"
              height="180">
          </div>
          <div class="post-item-content">
            <div class="post-item-tag">
              <span>
                <?php
                $category = get_the_category();
                echo esc_html($category[0]->cat_name);
                ?>
              </span>
            </div>
            <h2>
              <?php the_title(); ?>
            </h2>
            <p>
              <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
            </p>
          </div>
        </a>
      <?php
      endwhile;
      wp_reset_postdata(); ?>
    </div>
  </div>
</section>