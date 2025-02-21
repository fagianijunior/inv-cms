<?php get_header();?>
<section class="tag-title">
  <div class="container">
    <h1><?php single_tag_title(); ?></h1>
    <hr>
  </div>
</section>
<section class="tag-second">
  <div class="container">
    <div class="tag-second-content">
      <div class="tag-posts">
        <div class="tag-posts-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <a href="<?php echo get_permalink($post->ID); ?>" class="tag-post">
                <div class="tag-post-content">
                  <span>
                    <?php single_tag_title(); ?>
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
            <?php endwhile; endif; ?>
        </div>
        <div class="pagination">
          <div class="nu-nav-links">
            <?php if (function_exists("pagination")) {
              pagination($wp_query->max_num_pages);
            } ?>
          </div>
        </div>
      </div>
      <div class="tag-side">
        <?php echo get_template_part('components/on-code/newsletter/newsletter') ?>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>