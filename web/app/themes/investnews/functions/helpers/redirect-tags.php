<?php
// Redireciona para a home se o checkbox ACF estiver marcado
add_action('template_redirect', 'redirect_tag_no_page');
function redirect_tag_no_page() {
    if (is_tag()) {
        $tag_id = get_queried_object_id();
        $tag_page = get_field('tag_page', 'term_' . $tag_id);

        if (!$tag_page) {
            wp_redirect(home_url(), 301);
            exit;
        }
    }
}
