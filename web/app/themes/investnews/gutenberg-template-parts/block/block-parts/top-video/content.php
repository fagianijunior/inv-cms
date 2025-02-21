
<?php 
$exibir_destaques_bws = get_field('exibir_destaques_bws'); 
$episodio_destacado_bws = get_field('episodio_destacado_bws'); ?>
<?php foreach( $episodio_destacado_bws as $item ) { ?>
    <div class="column-item first-column featured-episode">
        <div class="video">
            <?php
            // Load value.
            $iframe = get_field('url_do_episodio', $item->ID);

            // Use preg_match to find iframe src.
            preg_match('/src="(.+?)"/', $iframe, $matches);
            $src = $matches[1];

            // Add extra parameters to src and replace HTML.
            $params = array(
                'controls'  => 1,
                'autoplay'  => 1,
                'hd'        => 1,
                'mute'     => 1
            );
            $new_src = add_query_arg($params, $src);
            $iframe = str_replace($src, $new_src, $iframe);

            // Add extra attributes to iframe HTML.
            $attributes = 'frameborder="0"';
            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

            // Display customized HTML.
            echo $iframe;
            ?>
        </div>
        <?php 
            $numero_do_episodio = get_field('numero_do_episodio', $item->ID); 
        ?>
        <?php if($numero_do_episodio){ ?>
            <span class="title-sm episode"> <a href="<?php echo get_the_permalink($item->ID) ?>" title="<?php echo 'EPISÓDIO '.$numero_do_episodio; ?>"><?php echo 'EPISÓDIO '.$numero_do_episodio ?></a> </span>
        <?php } ?>
        <h2 class="title"> <a href="<?php echo get_the_permalink($item->ID) ?>" title="<?php echo get_the_title($item->ID); ?>"><?php echo get_the_title($item->ID) ?></a> </h2>
        <div class="excerpt"> <a href="<?php echo get_the_permalink($item->ID) ?>" title="<?php echo substr( get_the_excerpt($item->ID), 0, 200 ); ?>"><?php echo substr( get_the_excerpt($item->ID), 0, 200 ); ?></a> </div>
    </div>
<?php } ?>
<div class="column-item second-column">
    <?php foreach( $episodio_destacado_bws as $item ) { ?>
        <?php $sinopse = get_field('sinopse', $item->ID); ?>
        <?php if($sinopse) { ?>
            <div class="featured-episode-summary">
                <div class="title-sm summary">Sinopse</div>
                <div class="content">
                    <?php echo substr( $sinopse, 0, 550 ); ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    <?php $posts_em_destaque_bws = get_field('posts_em_destaque_bws'); ?>
    <?php if($posts_em_destaque_bws) { ?>
        <div class="featured-posts">
            <?php foreach($posts_em_destaque_bws as $item) { ?>
                <div class="post-item">
                    <?php $post_type = get_post_type( $item->ID ); ?>
                    <?php if($post_type == 'wsj') { ?>
                        <?php 
                            $terms = get_the_terms( $item->ID, 'categoria-wsj' );	
                            if ( !empty( $terms ) ){
                                    // retorna primeiro item
                                    $term = array_shift( $terms );
                                    $catName = $term->name;
                                    $catSlug = get_term_link( $term->slug, 'categoria-wsj' )
                                ?>
                                    <a href="<?php echo $catSlug;?>" class="title-sm cat-featured" title="<?php echo $catName; ?>"><?php echo $catName; ?></a>
                                <?php
                            }
                        ?>
                    <?php } else { ?>
                        <?php foreach((get_the_category($item->ID)) as $category){
                            $catName = $category->cat_name;
                            $catSlug = $category->slug;
                        ?>
                            <a href="<?php echo $catSlug;?>" title="<?php echo $catName; ?>" class="title-sm cat-featured"><?php echo $catName; ?></a>
                        <?php } ?>
                    <?php } ?>
                    <a href="<?php echo get_the_permalink($item->ID); ?>" title="<?php echo get_the_title($item->ID); ?>" class="title"><?php echo get_the_title($item->ID); ?></a>
                    <a href="<?php echo get_the_permalink($item->ID); ?>" title="<?php echo substr( get_the_excerpt($item->ID), 0, 120 ); ?>" class="excerpt"><?php echo substr( get_the_excerpt($item->ID), 0, 120 ); ?></a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>