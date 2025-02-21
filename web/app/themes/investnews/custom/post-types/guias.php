<?php
/**
 * Register Guias post type
 *
 * @return null
 */
function post_type_guias() {
    $args = array(
        'label' => 'Guias',
        'hierarchical' => false,
        'has_archive' => false,
        'exclude_from_search' => false,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'),
        'menu_icon' => 'dashicons-sos',
        'show_in_rest' => true, 
        'taxonomies' => array('post_tag')
    );

    register_post_type( 'guias', $args );
}

add_action( 'init', 'post_type_guias', 0 );


/**
 * Shortcode to display post titles from IDs in an ACF repeater field.
 *
 * @return string List of numbered post titles or a message if no posts are found.
 */
function shortcode_posts_per_ids($atts) {
    $guias = get_field('guias_mais_lidos');
    
    if ($guias) {
        $output = '<div class="widget-guias-mais-lidos">';
        $output .= '<h3 class="widget-guias-title">Mais Lidos</h3>';
        $output .= '<ul class="widget-guias-list">';
        $count = 1;

        foreach ($guias as $guia) {
            $post_id = $guia['guia'];
            $post = get_post($post_id);
            if ($post) {
                $output .= '<li class="widget-guias-list-item"><span>' . $count . '</span> <a class="widget-guias-list-item-link" href="' . get_permalink($post_id) . '">' . get_the_title($post_id) . '</a></li>';
                $count++;
            }
        }

        $output .= '</ul>';
        $output .= '</div>';
    } else {
        $output = '<p>Nenhum post encontrado.</p>';
    }

    return $output;
}

add_shortcode('guias-mais-lidos-widget', 'shortcode_posts_per_ids');


/**
 * Get related posts based on tags
 *
 * @return null
 */
function ins_RelatedPostsGuias() {
    global $post;
    $orig_post = $post;
    $tags = get_the_terms($post->ID, 'post_tag');
    if ($tags) {
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $args = array(
                'post_type' => 'post',
                'order' => 'DESC',
                'orderby' => 'date',
                'post__not_in' => array($post->ID),
                'posts_per_page'=> 3,
                'ignore_sticky_posts'=> 1,
                'tag__in' => $tag_ids
            );
            $my_query = new WP_Query( $args );
            if ($my_query->have_posts()) { ?>
                <div class="related-posts-section">
                    <div class="related-posts-inner">
                        <div class="related-posts-container">
                            <?php while ($my_query->have_posts()) { $my_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" class="related-post-item">
                                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                <div class="related-post-image">
                                    <?php the_post_thumbnail('ins-mid-thumb', array( 'class' => 'ins-reg-img', 'alt' => get_the_title() )); ?>
                                    <div class="overlay"></div>
                                </div>
                                <?php } ?>
                                <div class="related-post-texts">
                                    <p class="related-post-cat"><?php $category = get_the_category(); if (isset($category)) { echo esc_html( $category[0]->cat_name ); } ?></p>
                                    <h3 class="related-post-item-title"><?php the_title(); ?></h3>
                                </div>
                            </a>
                            <?php }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
    }
    $post = $orig_post;
    wp_reset_query();
}
