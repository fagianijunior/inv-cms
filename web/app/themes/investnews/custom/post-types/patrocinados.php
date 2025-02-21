<?php

/**
 * Cria post type de Patrocinados
 */

function post_type_patrocinados()
{
    $args = array(
        'labels' => array(
            'name' => __('Posts patrocinados', 'textdomain'),
            'singular_name' => __('Post patrocinado', 'textdomain'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes'),
        'publicly_queryable' => true,
        'show_in_rest' => true,
        'capability_type' => 'post',
        'taxonomies' => array('marcas', 'post_tag'),
        'hierarchical' => true,
		'menu_icon' 	=> 'dashicons-welcome-write-blog',
    );

    register_post_type('patrocinados', $args);
}

add_action('init', 'post_type_patrocinados');

/**
 * Categoria - Marcas
 */

function patrocinados_taxonomy()
{
    $args = array(
        'hierarchical' => true,
        'public' => true,
        'label' => 'Marcas',
        'show_in_rest' => true,
        'rewrite' => array(
            'slug' => 'patrocinados',
            'with_front' => true,
        ),
    );

    register_taxonomy('marcas', 'patrocinados', $args);
}

add_action('init', 'patrocinados_taxonomy');

function register_custom_endpoint()
{
    add_rewrite_rule('^patrocinados/([^/]+)/([^/]+)/?', 'index.php?marcas=$matches[1]&post_type=patrocinados&name=$matches[2]', 'top');
    add_rewrite_rule('^patrocinados/([^/]+)/?', 'index.php?marcas=$matches[1]&post_type=patrocinados', 'top');
}
add_action('init', 'register_custom_endpoint');

function custom_post_type_permalink_structure($post_link, $post)
{
    if ($post->post_type === 'patrocinados' && !is_admin()) {
        
        if ($post->post_status !== 'publish' || is_preview()) {
            return $post_link;
        }

        $marca = get_the_terms($post, 'marcas');

        if ($marca && !is_wp_error($marca)) {
            $marca_slug = $marca[0]->slug;
        } else {
            $marca_slug = 'sem-marca';
        }

        $post_link = trailingslashit(home_url("/patrocinados/{$marca_slug}/{$post->post_name}"));
    }

    return $post_link;
}
add_filter('post_type_link', 'custom_post_type_permalink_structure', 10, 2);




function remove_permalink_link($permalink_html, $post_id, $new_title, $new_slug)
{
    if ('patrocinados' === get_post_type($post_id)) {
        $post_item = get_post($post_id);
        $permalink_html = str_replace('%postname%', $post_item->post_name, $permalink_html);
    }

    return $permalink_html;
}
add_filter('get_sample_permalink_html', 'remove_permalink_link', 10, 4);

function remove_view_post_link( $actions, $post ) {
    if ( 'patrocinados' === $post->post_type ) {
        unset( $actions['view'] );
    }

    return $actions;
}
add_filter( 'page_row_actions', 'remove_view_post_link', 10, 2 );


function add_custom_query_var($query_vars)
{
    $query_vars[] = 'marcas';
    $query_vars[] = 'post_type';
    return $query_vars;
}
add_filter('query_vars', 'add_custom_query_var');

function display_custom_posts($template)
{
    if (get_query_var('post_type') === 'patrocinados' && !is_404()) {
        if (is_singular('patrocinados')) {
            $template = get_stylesheet_directory() . '/pages/branded-content/archive-patrocinados.php';
        } elseif (get_query_var('marcas')) {
            $template = get_stylesheet_directory() . '/pages/branded-content/taxonomy-marcas.php';
        }
    }

    return $template;
}
add_filter('template_include', 'display_custom_posts');

function custom_body_tax_class($classes)
{
    if (is_tax('marcas')) {
        $classes = array_diff($classes, array('post-type-archive-patrocinados'));
        $classes[] = 'tax-marcas';
    }

    return $classes;
}

add_filter('body_class', 'custom_body_tax_class');