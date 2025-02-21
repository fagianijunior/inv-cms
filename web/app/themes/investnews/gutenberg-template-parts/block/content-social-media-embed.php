<?php
/**
 * Social Media Embed Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'social-media-embed-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'social-media-embed';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$social_media_type = get_field('social_media_type') ?: 'instagram';
$post_url = get_field('post_url') ?: '';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="social-media-embed-container" data-type="<?php echo esc_attr($social_media_type); ?>" data-url="<?php echo esc_url($post_url); ?>">
        <?php if( $is_preview ): ?>
            <p><?php echo esc_html($social_media_type); ?></p>
        <?php endif; ?>
    </div>
</div>
