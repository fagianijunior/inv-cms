<?php
// Function to add character counter to title and content
function title_count_js(){ 
	
	wp_enqueue_style('elements-counter-admin-style', get_stylesheet_directory_uri() . '/assets/css/admin/elements-counter-admin.css', array());
	wp_enqueue_script('elements-counter-admin-script', get_template_directory_uri() . '/assets/js/admin/elements-counter-admin.js', array('jquery'), '', true);
}
add_action( 'admin_head-post.php', 'title_count_js');
add_action( 'admin_head-post-new.php', 'title_count_js');