<?php get_header(); ?>
<?php
    global $post;
    $post_id = get_the_ID();

    $terms = get_the_terms(get_the_ID(), 'marcas');

    if ($terms && !is_wp_error($terms)) {
        $term = $terms[0];
        $term_id = $term->term_id;
        $image_url = get_field('brand_image', 'term_' . $term_id);
    } else {
        echo 'Nenhum termo encontrado para este post.';
    } 
    ?>
<section class="singular-post default-post-template">
   
    <span class="brand-top">
    <div class="container">
        Conteúdo de marca
        </div>
    </span>
    <?php // top area of the post ?>
    <?php echo get_template_part('components/on-code/post-parts/top-area-branded-content/index')?>

    <?php // Featured image ?>
    <?php if ( has_post_thumbnail() ) { ?>
        <?php $show_featured_image = get_field('show_featured_image'); ?>
        <?php if($show_featured_image === true || $show_featured_image === NULL ) { ?>
            <?php $featured_image_caption = get_the_post_thumbnail_caption() ?>
            <div class="featured-image">
                <div class="container">
                    <img src="<?php echo get_the_post_thumbnail_url($post_id, array( 1256, 692)) ?>" alt="<?php echo get_post_meta ( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>" width="1256" height="692" onerror="this.parentNode.parentNode.remove()">
                    <?php 
                        if ($featured_image_caption) {
                        ?>
                            <div class="image-caption"><?php echo $featured_image_caption; ?></div> 
                        <?php
                        }
                    ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?> 

    <?php // Post content ?>
    <div class="post-content">
        <?php the_content(); ?>
    </div>

    <div class="post-author-list">
        <div class="image-brand">
            <div class="img">
                <img src="<?php echo esc_url($image_url) ?>" alt="">
            </div>
            <p>Por <span><?php echo esc_html($term->name) ?></span></p>
        </div>
        <p class="sponsor-brand">
        Conteúdo de responsabilidade do anunciante.
        </p>
    </div>
</section>
    <?php related_posts($post_id); ?>
<?php get_footer(); ?>