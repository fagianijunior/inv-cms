<?php
// function delete_all_comments() {
//     global $wpdb;

//     $wpdb->query("DELETE FROM {$wpdb->comments}");
//     $wpdb->query("UPDATE {$wpdb->posts} SET comment_count = 0, comment_status = 'closed', ping_status = 'closed'");
// }
// add_action('init', 'delete_all_comments');

function disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php'); 
}
add_action('admin_menu', 'disable_comments_admin_menu');

function remove_comments_from_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('comments');
}
add_action('wp_before_admin_bar_render', 'remove_comments_from_admin_bar');

function disable_comments_support() {
    foreach (get_post_types() as $post_type) {
        remove_post_type_support($post_type, 'comments');
        remove_post_type_support($post_type, 'trackbacks');
    }
}
add_action('init', 'disable_comments_support');

function redirect_comments_page() {
    if (is_comment_feed() || is_singular() && comments_open()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'redirect_comments_page');

function remove_dashboard_widgets() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

function block_comment_feed() {
    wp_die(__('Os comentários foram desativados neste site.'));
}
add_action('do_feed_rss2_comments', 'block_comment_feed', 1);
add_action('do_feed_atom_comments', 'block_comment_feed', 1);
