<?php if ( have_rows('tools_list') ) : ?>
    <?php while( have_rows('tools_list') ) : the_row(); ?>
    <?php 
    $link = get_sub_field('tool_link');
    if( $link ): 
        $link_url = $link['url'];
        ?>
        <a  href="<?php echo esc_url( $link_url ); ?>" title="<?php the_sub_field('tool_name'); ?>" class="item-tools">
            <div class="tool-icon">
                <img src="<?php the_sub_field('tool_ico'); ?>" alt="<?php the_sub_field('tool_name'); ?>">
            </div>
            <span><?php the_sub_field('subtitle'); ?></span>
            <h2><?php the_sub_field('tool_name'); ?></h2>
        </a>
    <?php endif; ?>
    <?php endwhile; ?>

<?php endif; ?>
