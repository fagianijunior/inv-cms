<?php

/**
 * Cria o tipo de post Carteira Mensal
 */
function post_type_infograficos() {
    $args = array(
        'label' => 'Infográficos',
        'hierarchical' => false,
        'has_archive' => false,
        'exclude_from_search' => false,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'infograficos'],
        'capability_type' => 'post',
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'),
        'menu_icon' => 'dashicons-analytics',
        'show_in_rest' => true, 
        'taxonomies' => array('post_tag')
    );
    register_post_type( 'infograficos', $args );
}
add_action( 'init', 'post_type_infograficos', 0 );


/**
 * Cria a função que busca os posts relacionados por tags
 */
if ( !function_exists( 'mvp_RelatedPosts_infograficos' ) ) {
function mvp_RelatedPosts_infograficos() {
    global $post;
    $orig_post = $post;
    $tags = get_the_terms($post->ID, 'post_tag');
    if ($tags) {
	    $mvp_related_num = esc_html(get_option('mvp_related_num'));
      $tag_ids = array();
      foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
      $args = array(
        'post_type' => 'infograficos',
	      'order' => 'DESC',
	      'orderby' => 'date',
        'post__not_in' => array($post->ID),
        'posts_per_page'=> $mvp_related_num,
        'ignore_sticky_posts'=> 1,
        'tag__in' => $tag_ids
      );
      $my_query = new WP_Query( $args );
      if( $my_query->have_posts() ) { ?>
      <ul class="mvp-related-posts-list left related">
        <?php while( $my_query->have_posts() ) { $my_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" aria-label="Entrar" rel="bookmark">
          <li>
            <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
              <div class="mvp-related-img left relative">
                <?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-reg-img' )); ?>
                <?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mvp-mob-img' )); ?>
                <?php if ( has_post_format( 'video' )) { ?>
                  <div class="mvp-vid-box-wrap mvp-vid-box-mid mvp-vid-marg">
                    <i class="fa fa-2 fa-play" aria-hidden="true"></i>
                  </div><!--mvp-vid-box-wrap-->
                <?php } else if ( has_post_format( 'gallery' )) { ?>
                  <div class="mvp-vid-box-wrap mvp-vid-box-mid">
                    <i class="fa fa-2 fa-camera" aria-hidden="true"></i>
                  </div><!--mvp-vid-box-wrap-->
                <?php } ?>
              </div><!--mvp-related-img-->
            <?php } ?>
            <div class="mvp-related-text left relative">
              <p><?php the_title(); ?></p>
            </div>
          </li>
        </a>
        <?php }
      echo '</ul>';
      }
    }
    $post = $orig_post;
    wp_reset_query();
  }
}