<?php  
   /* 
   Template Name: Página Infograficos
   */
   get_header();  ?>
<section class="category-title">
   <div class="container">
      <h1><?php the_title(); ?></h1>
      <hr>
   </div>
</section>
<section class="category-featured">
   <div class="container">
      <?php
         $featured_posts = new WP_Query([
           'post_type' => 'infograficos',
           'posts_per_page' => 3,
           'post_status' => 'publish',
           'orderby' => 'date',
           'order' => 'DESC',
         ]);
         
         if ($featured_posts->have_posts()) :
             $posts = [];
             while ($featured_posts->have_posts()) : $featured_posts->the_post();
                 $posts[] = get_post();
             endwhile;
             wp_reset_postdata();
         ?>
      <div class="category-featured-content">
         <?php if (isset($posts[0])) : ?>
         <a href="<?php echo get_permalink($posts[0]->ID); ?>" class="featured-post highlight">
            <div class="featured-post-image">
               <img src="<?php echo get_the_post_thumbnail_url($posts[0]->ID); ?>" alt="">
            </div>
            <div class="featured-post-content">
               <span>
               <?php echo get_cat_name(get_cat_ID('infograficos')); ?>
               </span>
               <h2><?php echo $posts[0]->post_title; ?></h2>
               <p><?php echo $posts[0]->post_excerpt; ?></p>
            </div>
         </a>
         <?php endif; ?>
         <?php if (isset($posts[1])) : ?>
         <a href="<?php echo get_permalink($posts[1]->ID); ?>" class="featured-post">
            <div class="featured-post-content">
               <span>
               <?php echo get_cat_name(get_cat_ID('infograficos')); ?>
               </span>
               <h2><?php echo $posts[1]->post_title; ?></h2>
               <p><?php echo $posts[1]->post_excerpt; ?></p>
            </div>
         </a>
         <?php endif; ?>
         <?php if (isset($posts[2])) : ?>
         <a href="<?php echo get_permalink($posts[2]->ID); ?>" class="featured-post">
            <div class="featured-post-content">
               <span>
               <?php echo get_cat_name(get_cat_ID('infograficos')); ?>
               </span>
               <h2><?php echo $posts[2]->post_title; ?></h2>
               <p><?php echo $posts[2]->post_excerpt; ?></p>
            </div>
         </a>
         <?php endif; ?>
      </div>
      <?php endif; ?>
   </div>
</section>
<section class="category-second">
   <div class="container">
      <div class="category-second-content">
         <div class="category-posts">
            <div class="category-posts-content">
               <!-- Posts with pagination -->
               <?php
                  $featured_posts = new WP_Query([
                      'post_type' => 'infograficos',
                      'posts_per_page' => 3,
                      'post_status' => 'publish',
                      'orderby' => 'date',
                      'order' => 'DESC',
                  ]);
                  
                  $excluded_ids = [];
                  if ($featured_posts->have_posts()) :
                      while ($featured_posts->have_posts()) : $featured_posts->the_post();
                          $excluded_ids[] = get_the_ID();
                      endwhile;
                      wp_reset_postdata();
                  endif;
                  
                  $rest_posts = new WP_Query([
                      'post_type' => 'infograficos',
                      'posts_per_page' => -1 , 
                      'post_status' => 'publish',
                      'orderby' => 'date',
                      'order' => 'DESC',
                      'post__not_in' => $excluded_ids
                  ]);
                  
                  ?>
               <div class="category-posts-content">
                  <!-- Posts com paginação -->
                  <?php if ($rest_posts->have_posts()) : ?>
                  <?php while ($rest_posts->have_posts()) : $rest_posts->the_post(); ?>
                  <a href="<?php echo get_permalink(); ?>" class="category-post">
                     <div class="category-post-image">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                     </div>
                     <div class="category-post-content">
                        <span><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo get_the_date('j \d\e F \d\e Y'); ?></p>
                     </div>
                  </a>
                  <hr>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                  <?php endif; ?>
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