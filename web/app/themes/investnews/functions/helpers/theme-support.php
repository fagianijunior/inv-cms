<?php 
function investnews_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails' );
    add_theme_support('post-formats', array('gallery', 'video'));
    add_theme_support('automatic-feed-links');
    add_theme_support('editor-styles');
    add_theme_support('appearance-tools');
    add_theme_support('menus');
}
add_action( 'after_setup_theme', 'investnews_theme_setup' );

// add custom image sizes
add_image_size( 'middle-page-current', 1256, 934 );
add_image_size( 'thumb-middle-size', 172, 172 );
add_image_size('crop-category', 631, 410, true); 
add_image_size('crop-category-list', 191, 125, true); 
add_image_size('custom-sponsor', 200, 100, true); 

/**
 * Cleanup wp_head().
 */
function ins_head_cleanup()
{
	// Remove EditURI link.
	remove_action('wp_head', 'rsd_link');

	// Remove Windows live writer link.
	remove_action('wp_head', 'wlwmanifest_link');

	// Remove WP version.
	remove_action('wp_head', 'wp_generator');

	// Remove Emoji's assets
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('emoji_svg_url', '__return_false');

	// Disable XML-RPC
	add_filter('xmlrpc_enabled', '__return_false');

	// Remove WP version from RSS
	add_filter('the_generator', '__return_false');
}

add_action('init', 'ins_head_cleanup');

function remove_gutenberg_scripts() {
    wp_dequeue_style('wp-block-library'); // Remove estilos básicos do Gutenberg
    wp_dequeue_style('wp-block-library-theme'); // Remove estilos de temas
    wp_dequeue_script('wp-embed'); // Remove scripts do WordPress Embed
}
add_action('wp_enqueue_scripts', 'remove_gutenberg_scripts', 100);


function remove_jquery_migrate( $scripts ) {
    if ( !is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

function jquery_register() {
    if (!is_admin()) {
		wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array(), null, false);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'jquery_register');
