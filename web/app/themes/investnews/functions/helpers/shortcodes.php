<?php
/**
 * Includes the newsletter widget template and returns the captured output.
 *
 * @return string The HTML content of the newsletter template.
 */
function include_newsletter_widget_template() {
    ob_start(); // Starts the output buffer
    
    // Include newsletter template file
    include get_template_directory() . '/components/on-code/newsletter/newsletter.php';

    return ob_get_clean(); // Returns the captured content
}

add_shortcode('newsletter-widget', 'include_newsletter_widget_template');