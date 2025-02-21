<?php get_header();?>
<?php 
  $term = get_queried_object()->term_id;
  $editorial_sponsored_by = get_field('editorial_sponsored_by', 'post_tag_'.$term);
  if($editorial_sponsored_by) {
      $editorial_sponsored_by_status = $editorial_sponsored_by;
      // echo 'TAG $editorial_sponsored_by -> ';
      // var_dump($editorial_sponsored_by);
      $text_above_company_block = get_field('text_above_company_block', 'post_tag_'.$term);
      $company_url = get_field('company_url', 'post_tag_'.$term);
      $company_logo = get_field('company_logo', 'post_tag_'.$term);
      $company_name = get_field('company_name', 'post_tag_'.$term);
  }
?>
<section class="tag-title">
  <div class="container">
    <h1><?php single_tag_title(); ?></h1>
    <?php if($editorial_sponsored_by) { ?>
      <div class="sponsor-area">
          <div class="container">
              <?php if($text_above_company_block) { ?>
                  <span class="above-text"><?php echo $text_above_company_block; ?></span>
              <?php } ?>
              <?php if($company_logo) { ?>
                  <div class="company">
                      <a <?php echo $company_url ? 'href="'.$company_url.'"' : false ?> title="<?php echo $company_name; ?>" class="link" >
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
<section class="tag-second">
  <div class="container">
    <div class="tag-second-content">
      <div class="tag-posts">
        <div class="tag-posts-content">
          <?php 
          $args = array(
            'post_type' => array('post', 'patrocinados', 'guias'),
            'posts_per_page' => 10,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            'tag_id' => get_queried_object_id(),
            'post_status' => 'publish',
          );
          $query = new WP_Query($args);
          $posts_gerais = [];
          $posts_patrocinados = [];

          if ($query->have_posts()) :
              while ($query->have_posts()) :
                  $query->the_post();
                  $post_type = get_post_type();

                  if ($post_type == 'patrocinados') {
                      $posts_patrocinados[] = $query->post;
                  } else {
                      $posts_gerais[] = $query->post;
                  }
              endwhile;
              wp_reset_postdata();

              $posts_ordenados = array_merge(
                  array_slice($posts_gerais, 0, 2),
                  array_slice($posts_patrocinados, 0, 1), 
                  array_slice($posts_gerais, 2) 
              );
              $posts_ordenados = array_slice($posts_ordenados, 0, 10);

              foreach ($posts_ordenados as $post) :
                setup_postdata($post);
                $post_type = get_post_type();
                ?>
                <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_field($post->ID); ?>" class="tag-post">
                  <div class="tag-post-image">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="">
                  </div>
                  <div class="tag-post-content">
                    <?php if ($post_type == 'patrocinados'): ?>
                      <span class="brand-flag">
                        Conteúdo de marca
                      </span>
                    <?php else:?>
                      <span>
                        <?php single_tag_title(); ?>
                      </span>
                    <?php endif;?>
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
                            'total' => $wp_query->max_num_pages,
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
      <div class="tag-side">
        <?php echo get_template_part('components/on-code/newsletter/newsletter') ?>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>