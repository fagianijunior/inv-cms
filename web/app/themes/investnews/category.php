<?php get_header();

// Verification to show sponsored infos
$term = get_queried_object()->term_id;
$editorial_sponsored_by = get_field('editorial_sponsored_by', 'post_tag_'.$term);
if($editorial_sponsored_by) {
  $editorial_sponsored_by_status = $editorial_sponsored_by;
  $text_above_company_block = get_field('text_above_company_block', 'post_tag_'.$term);
  $company_url = get_field('company_url', 'post_tag_'.$term);
  $company_logo = get_field('company_logo', 'post_tag_'.$term);
  $company_name = get_field('company_name', 'post_tag_'.$term);
}


// Get category auto posts and selected posts
$auto_posts = get_field('category_auto_posts', 'category_' . get_query_var('cat'));
$select_posts_items = get_field('category_posts', 'category_' . get_query_var('cat'));

// Get posts from category 
$query_args = array(
  'cat' => get_query_var('cat'),
  'posts_per_page' => 3,
  'orderby' => 'date',
  'order' => 'DESC',
);
$posts_query = new WP_Query($query_args);
$posts = $posts_query->posts;

// Variable to store featured posts
$featured_posts = array();

// Set featured posts 
$source_posts = $auto_posts ? $posts : $select_posts_items;
$featured_posts = array_slice($source_posts, 0, 3);

// Pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$featured_posts_ids = array_map(function ($post) {
  return $post->ID;
}, $featured_posts);

// Get rest of posts to show
$rest_query_args = array(
  'cat' => get_query_var('cat'),
  'posts_per_page' => 12,
  'paged' => $paged,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => $featured_posts_ids
);
$rest_posts_query = new WP_Query($rest_query_args);
$rest_posts = $rest_posts_query->posts;

?>
<section class="category-title">
  <div class="container">
    <h1><?php single_cat_title(); ?></h1>
    <?php if($editorial_sponsored_by) { ?>
      <div class="sponsor-area">
          <div class="container">
              <?php if($text_above_company_block) { ?>
                  <span class="above-text"><?php echo $text_above_company_block; ?></span>
              <?php } ?>
              <?php if($company_logo) { ?>
                  <div class="company">
                      <a <?php echo $company_url ? 'href="'.$company_url.'"' : false ?> class="link" title="<?php echo $company_name;?>" >
                          <div class="logo">
                              <?php echo wp_get_attachment_image( $company_logo['ID'], 'full' ); ?>
                          </div>
                          <?php if($company_name) { ?>
                              <div class="name">
                                  <?php echo $company_name; ?>
                              </div>
                          <?php } ?>
                      </a>
                  </div>
              <?php } ?>
          </div>
      </div>
    <?php } ?>
  </div>
</section>
<section class="category-featured">
  <div class="container">
    <div class="category-featured-content">
      <a href="<?php echo get_permalink($featured_posts[0]->ID); ?>" class="featured-post highlight" title="<?php echo $featured_posts[0]->post_title; ?>">
        <div class="featured-post-image">
         <?php echo get_the_post_thumbnail($featured_posts[0]->ID, 'crop-category'); ?>
        </div>
        <div class="featured-post-content">
          <span>
            <?php single_cat_title(); ?>
          </span>
          <h2>
            <?php echo $featured_posts[0]->post_title; ?>
          </h2>
          <p>
            <?php echo $featured_posts[0]->post_excerpt; ?>
          </p>
        </div>
      </a>

      <div class="featured-post-list">
        <a href="<?php echo get_permalink($featured_posts[1]->ID); ?>" class="featured-post" title="<?php echo $featured_posts[1]->post_title; ?>">
          <div class="featured-post-content">
            <span>
              <?php single_cat_title(); ?>
            </span>
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
            <span>
              <?php single_cat_title(); ?>
            </span>
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
            <a href="<?php echo get_permalink($post->ID); ?>" class="category-post" title="<?php echo $post->post_title; ?>">
              <div class="category-post-image">
                <?php echo get_the_post_thumbnail($post->ID, 'crop-category-list'); ?>
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
          <?php
            endforeach;
            wp_reset_postdata();
          endif;
          ?>
        </div>
        <div class="pagination">
          <div class="nu-nav-links">
            <?php if (function_exists("pagination")) {
              pagination($wp_query->max_num_pages);
            } ?>
          </div>
        </div>
      </div>
      <div class="category-side">
        <?php echo get_template_part('components/on-code/newsletter/newsletter') ?>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>