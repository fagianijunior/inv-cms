<?php 
    $author_id = get_the_author_meta('ID'); 
    $author_display_name = get_the_author_meta('display_name', $author_id); 
    $author_url = get_author_posts_url($author_id);

    $args = array(
        'posts_per_page'=> 4,
        'post_type' => 'post',
        'author' => $author_id
    );
    $query = new WP_Query($args);
?>
<?php if ( $query->have_posts() ) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/components/on-code/related-posts/assets/css/related-posts.css">
    <section class="related-posts">
        <div class="container">
            <div class="top">
                <p class="title">Mais de <span class="related-term"><?php echo $author_display_name; ?></span></p>
                <a href="<?php echo $author_url; ?>" title="Ver todos" class="see-all">
                    <span class="text">Ver todos</span>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none">
                            <path d="M1.0015 0.989883C1.0015 0.829007 1.08044 0.671884 1.22553 0.578666C1.45256 0.432826 1.75476 0.498234 1.9006 0.725264C3.29435 2.89032 5.09932 4.69527 7.26362 6.08978C7.40419 6.18073 7.49062 6.33485 7.49062 6.50249C7.49062 6.67088 7.40419 6.82575 7.26287 6.9167C5.10459 8.30594 3.30562 10.1034 1.91488 12.2602C1.76979 12.4857 1.47059 12.5729 1.24056 12.4346C1.003 12.2917 0.931596 11.982 1.08044 11.7505C2.28175 9.88236 3.77322 8.2691 5.52556 6.93925C5.81498 6.71974 5.81498 6.28448 5.52556 6.06497C3.77472 4.73586 2.28174 3.12186 1.07819 1.253C1.02556 1.17106 1 1.07934 1 0.98913L1.0015 0.989883Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                        </svg>
                    </div>
                </a>
            </div>
                <div class="related-post-list">
                    <?php while($query->have_posts()) { $query->the_post(); ?>
                        <?php 
                            $post_item_id = get_the_ID(); 
                            $post_item_type = get_post_type($post_item_id);
                            $post_format = get_post_format($post_item_id);
                        ?>
                        <div class="post-item">
                            <div class="item-image">
                                <a href="<?php echo get_the_permalink($post_item_id); ?>" title="<?php echo get_the_title($post_item_id); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php if ( has_post_thumbnail($post_item_id) ) { ?>
                                        <?php 
                                            echo get_the_post_thumbnail($post_item_id, array(300,197), array( 'class' => 'reg-img lazy' )); 
                                            echo get_the_post_thumbnail($post_item_id, array(86,86), array( 'class' => 'mob-img lazy' ));
                                        ?>
                                    <?php } else { ?>
                                        <img src="<?php bloginfo('template_url'); ?>/gutenberg-template-parts/block/block-parts/simple-list/assets/images/investnews-logo.png" class="logo-img" alt="InvestNews" width="300" height="157">
                                    <?php } ?>
                                    <?php
                                        if($post_format == 'video') {
                                            ?>
                                                <div class="player-icon">
                                                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="0.5" width="40" height="40" rx="20" fill="white" fill-opacity="0.8"/>
                                                        <path d="M15 12.5V28.5L21.7692 24.4941L28.5385 20.4883L15 12.5Z" fill="#777777"/>
                                                        <path d="M15 12.5V28.5L21.7692 24.4941L28.5385 20.4883L15 12.5Z" fill="#777777"/>
                                                    </svg>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </a>
                            </div>
                            <div class="item-content">
                                <?php if($post_item_type == 'post') { ?>
                                    <?php $category = get_the_category($post_item_id); ?>
                                    <span class="category"><a href="/<?php echo $category[0]->slug; ?>" title="<?php echo esc_html( $category[0]->cat_name ); ?>"> <?php  if (isset($category)) { echo esc_html( $category[0]->cat_name ); } ?></a></span>
                                <?php } ?>

                                <?php if($post_item_type == 'guias') { ?>
                                    <span class="category"><a href="/guias" title="Guias">Guias</a></span>
                                <?php } ?>

                                <?php if($post_item_type == 'wsj') { ?>
                                    <?php 
                                        $terms = get_the_terms( $post_item_id, 'categoria-wsj' );	
                                        if ( !empty( $terms ) ){
                                                // retorna primeiro item
                                                $term = array_shift( $terms );
                                                $catName = $term->name;
                                                $catSlug = get_term_link( $term->slug, 'categoria-wsj' )
                                            ?>
                                                <span class="category"><a href="<?php echo $catSlug;?>" title="<?php echo $catName; ?>"><?php echo $catName; ?></a></span>
                                            <?php
                                        }
                                    ?>
                                <?php } if($post_item_type == 'infograficos') { ?>
                                    <span class="category"><a href="<?php echo home_url('/infograficos/');?>" title="Infográficos"><?php echo 'Infográficos'; ?></a></span>
                                <?php } ?>


                                <a href="<?php echo get_the_permalink($post_item_id); ?>" title="<?php echo get_the_title($post_item_id); ?>" class="title" target="_blank" rel="noopener noreferrer">
                                    <?php echo get_the_title($post_item_id); ?> 
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <a href="<?php echo $category_link; ?>" title="Ver todos" class="see-all mobile">
                    <span class="text">Ver todos</span>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none">
                            <path d="M1.0015 0.989883C1.0015 0.829007 1.08044 0.671884 1.22553 0.578666C1.45256 0.432826 1.75476 0.498234 1.9006 0.725264C3.29435 2.89032 5.09932 4.69527 7.26362 6.08978C7.40419 6.18073 7.49062 6.33485 7.49062 6.50249C7.49062 6.67088 7.40419 6.82575 7.26287 6.9167C5.10459 8.30594 3.30562 10.1034 1.91488 12.2602C1.76979 12.4857 1.47059 12.5729 1.24056 12.4346C1.003 12.2917 0.931596 11.982 1.08044 11.7505C2.28175 9.88236 3.77322 8.2691 5.52556 6.93925C5.81498 6.71974 5.81498 6.28448 5.52556 6.06497C3.77472 4.73586 2.28174 3.12186 1.07819 1.253C1.02556 1.17106 1 1.07934 1 0.98913L1.0015 0.989883Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                        </svg>
                    </div>
                </a>
        </div>
    </section>
    <!-- <script src="<?php echo get_template_directory_uri(); ?>/components/on-code/related-posts/assets/js/related-posts.js"></script> -->
<?php } ?>