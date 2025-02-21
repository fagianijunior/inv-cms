<?php get_header(); ?>
<?php global $author; $userdata = get_userdata($author); ?>
<section class="about">
    <div class="container">
        <?php
            $author_id = $userdata->ID;
            $profile_image = get_field('profile_image', 'user_'.$author_id);
        ?>
        <div class="author-image">
            <?php if($profile_image) { ?>
                <?php echo wp_get_attachment_image( $profile_image['ID'], array(500,500) ); ?>
            <?php } else { ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" viewBox="0 0 250 250" fill="none">
                    <rect y="0.500977" width="250" height="250" rx="125" fill="#C4C4C4"/>
                </svg>
            <?php } ?>
        </div>
        <div class="author-informations">
            <p class="author-name"><?php echo $userdata->display_name; ?></p>
            <p class="author-description">
                <?php echo $userdata->user_description; ?>
            </p>
            <ul class="author-social-links">
                <?php $user_email = $userdata->user_email;
                if ($user_email) { ?>
                    <a href="mailto:<?php echo $user_email; ?>" aria-label="Entrar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                            <circle cx="20" cy="20.501" r="20" fill="#2C2C2C"/>
                            <path d="M12 13.8801V27.1187C12 27.352 12.172 27.527 12.4014 27.4978H12.6881C17.3611 27.2645 24.2703 27.2645 28.1119 27.4978H28.3986C28.628 27.4978 28.8 27.352 28.8 27.1187V13.8801C28.8 13.6759 28.628 13.501 28.4273 13.501H12.3727C12.172 13.501 12 13.6759 12 13.8801ZM23.6683 20.0037L26.8218 16.5919C27.0512 16.3295 27.4812 16.5045 27.4812 16.8544V23.9986C27.4812 24.3485 27.0512 24.5235 26.8218 24.261L23.6683 20.5285C23.5536 20.3827 23.5536 20.1495 23.6683 20.0037ZM17.1604 20.4994L14.0068 24.2319C13.7775 24.4943 13.3474 24.3485 13.3474 23.9694V16.8544C13.3474 16.5045 13.7775 16.3295 14.0068 16.5919L17.1604 20.0037C17.3038 20.1495 17.3038 20.3827 17.1604 20.5285V20.4994ZM15.0676 14.8423H25.7324C26.0765 14.8423 26.2485 15.2506 26.0191 15.4839L21.8048 20.0328C21.4321 20.4411 20.916 20.6743 20.4 20.6743C19.884 20.6743 19.3679 20.4411 18.9952 20.0328L14.7809 15.4839C14.5515 15.2214 14.7235 14.8423 15.0676 14.8423ZM14.6949 25.4566C15.641 24.3194 17.5331 22.1323 18.1065 21.4325C18.6799 20.7327 18.3645 21.2867 18.4792 21.3742C19.0239 21.7824 19.6833 22.0157 20.3713 22.0157C21.0594 22.0157 21.6614 21.8116 22.2061 21.4325C22.7509 21.0534 22.5788 21.345 22.7222 21.4908L26.0765 25.4274C26.3058 25.6899 26.1051 26.069 25.7898 26.069C22.6075 25.9815 18.4792 25.9815 15.0102 26.069C14.6662 26.069 14.4942 25.6899 14.7235 25.4274L14.6949 25.4566Z" fill="white"/>
                        </svg>
                    </a>
                <?php } ?>
                <?php $user_lin = $userdata->linkedin;
                if ($user_lin) { ?>
                    <a href="<?php echo $user_lin; ?>" aria-label="Entrar" alt="LinkedIn" target="_blank">
                        <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20.501" r="20" fill="#2C2C2C"/>
                            <path d="M13.2316 18.1444H16.1381V27.501H13.2316V18.1444ZM14.6791 13.501C15.6055 13.501 16.3581 14.2555 16.3581 15.1842C16.3581 16.1129 15.6055 16.8675 14.6791 16.8675C13.7527 16.8675 13 16.1129 13 15.1842C13 14.2555 13.7527 13.501 14.6791 13.501Z" fill="white"/>
                            <path d="M17.9561 18.1443H20.7352V19.4212H20.77C21.1637 18.6899 22.1016 17.9121 23.5144 17.9121C26.4556 17.9121 26.9883 19.8507 26.9883 22.3698V27.5008H24.0934V22.9503C24.0934 21.859 24.0702 20.466 22.588 20.466C21.1058 20.466 20.851 21.6501 20.851 22.869V27.5008H17.9561V18.1443Z" fill="white"/>
                        </svg>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>
<?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;		
    $args = array(
        'paged' => $paged,
        'posts_per_page' => 10,
        'author' => $author_id
    );
    $query_author_posts = new WP_Query($args);
?>
<?php if($query_author_posts->have_posts()) { ?>
    <section class="side-areas">
        <div class="container">
            <div class="posts-by-author side-item">
                <h2 class="section-title">Artigos escritos por <?php echo esc_html( $userdata->display_name ); ?></h2>
                <div class="post-list">
                    <?php while($query_author_posts->have_posts()) { $query_author_posts->the_post(); ?>
                        <?php
                            $post_item_id = get_the_ID();
                            $post_item_type = get_post_type($post_item_id);
                            $post_format = get_post_format($post_item_id);
                        ?>
                        <div class="post-item">
                            <div class="item-image">
                                <a href="<?php echo get_the_permalink($post_item_id); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php if ( has_post_thumbnail($post_item_id) ) { ?>
                                        <?php 
                                            echo get_the_post_thumbnail($post_item_id, array(300,197), array( 'class' => 'reg-img lazy' )); 
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
                                    <a href="/<?php echo $category[0]->slug; ?>" class="category"> <?php  if (isset($category)) { echo esc_html( $category[0]->cat_name ); } ?></a>
                                <?php } ?>
        
                                <?php if($post_item_type == 'guias') { ?>
                                    <a href="/guias" class="category">Guias</a>
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
                                                <a href="<?php echo $catSlug;?>" class="category"><?php echo $catName; ?></a>
                                            <?php
                                        }
                                    ?>
                                <?php } if($post_item_type == 'infograficos') { ?>
                                    <a href="<?php echo home_url('/infograficos/');?>" class="category"><?php echo 'Infográficos'; ?></a>
                                <?php } ?>
        
                                
                                <a href="<?php echo get_the_permalink($post_item_id); ?>" class="title" target="_blank" rel="noopener noreferrer">
                                    <?php echo get_the_title($post_item_id); ?> 
                                </a>
                                <a href="<?php echo get_the_permalink($post_item_id); ?>" class="description"><?php echo get_the_excerpt($post_item_id); ?> </a>
                                
                                <div class="reading-time">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Icon - Post - Tempo de leitura">
                                            <g id="Icon">
                                                <path d="M7.33333 3.00065V6.72451L9.13807 8.52925L8.19526 9.47206L6 7.27679V3.00065H7.33333Z" fill="#777777"/>
                                                <path d="M13.3333 7.00065C13.3333 10.6825 10.3486 13.6673 6.66667 13.6673C2.98477 13.6673 0 10.6825 0 7.00065C0 3.31875 2.98477 0.333984 6.66667 0.333984C10.3486 0.333984 13.3333 3.31875 13.3333 7.00065ZM12 7.00065C12 4.05513 9.61219 1.66732 6.66667 1.66732C3.72115 1.66732 1.33333 4.05513 1.33333 7.00065C1.33333 9.94617 3.72115 12.334 6.66667 12.334C9.61219 12.334 12 9.94617 12 7.00065Z" fill="#777777"/>
                                            </g>
                                        </g>
                                    </svg>
                                    <span><?php echo estimated_reading_time($post_item_id); ?></span>
                                </div>
    
                            </div>
                        </div>
                    <?php } ?>                    
                </div>
            </div>
            <div class="newsletter side-item">
                <?php include get_template_directory() . '/components/on-code/newsletter/newsletter.php'; ?>
            </div>
        </div>
    </section>
    <div class="pagination">
        <div class="nu-nav-links">
        <?php if (function_exists("pagination")) {
            pagination($query_author_posts->max_num_pages);
        } ?>
        </div>
    </div>

    <div class="categories">
        <div class="container">
            <p class="title">Navegue nas principais categorias:</p>
            <div class="category-list">
                <?php $terms = get_categories(array('orderby' => 'count', 'order' => 'DESC', 'number' => 6)); ?>
                <?php foreach ($terms as $term) { ?>
                    <?php 
                        $category_id = $term->term_id;
                        $category_name = $term->name;
                    ?>
                        <a href="<?php echo get_category_link($category_id) ?>" class="category-item"><?php echo $category_name; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php } ?>
<?php get_footer(); ?>