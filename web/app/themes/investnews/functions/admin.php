<?php
/**
 * Return Widgets to classic layout
 *
 * @return null
 */
function disable_modern_widgets() {
    add_filter( 'use_widgets_block_editor', '__return_false' );
}

add_action( 'after_setup_theme', 'disable_modern_widgets' );
