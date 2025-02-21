<?php get_header(); global $post; ?>
<div class="container">
    <div class="content-wrap">

        <div class="main-content post-guias">

            <?php if (have_posts()) : the_post(); ?>
            <header id="post-header">
                <div class="content">
                    
                    <h1 class="title"><?php the_title(); ?></h1>
                    
                    <?php if (has_excerpt()) { ?>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                    <?php } ?>
                    
                    <div class="post-infos">
                        <?php 
                            $author_info = get_option('mvp_author_info');
                            if ($author_info == "true") { 
                        ?>
                        <div class="author-info">
                            <span><?php esc_html_e('Por:', 'investnews'); ?> </span>
                            <span class="author-name vcard fn author">
                                <?php
                                $author = get_post_meta($post->ID, 'mvp_post_author', true);
                                if ($author) :
                                    $author = trim($author);
                                    echo "<strong>" . $author . "</strong>";
                                elseif (function_exists('coauthors_posts_links')) :
                                    coauthors_posts_links();
                                else :
                                    the_author_posts_link();
                                endif;
                                ?>
                            </span>
                        </div>
                        <?php } ?>

                        <div class="date-and-reading-time">
                            <div class="post-date-info">
                                <span class="post-date">
                                    <time class="date-text" datetime="<?php echo get_the_date('c'); ?>">
                                    <?php
                                        $posted_time = get_post_time('U');
                                        $current_time = current_time('timestamp');
                                        $hours_diff = ($current_time - $posted_time) / 3600;

                                        if ( $hours_diff < 24 ) {
                                            echo '<span class="date">Às ' . get_the_time('H\h i') . '</span>';
                                        } else {
                                            echo '<span class="date">' . get_the_date('j \d\e F \d\e Y') . '</span>';
                                            if ( get_the_modified_time('U') != $posted_time ) {
                                                echo '<span class="datediff">Atualizado: ' . get_the_modified_date('j \d\e F \d\e Y') . '</span>';
                                            }
                                        }
                                    ?>
                                    </time>
                                </span>
                            </div>
                            <div class="reading-time">
                                <div class="icon">
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.20662 4.00016V7.72402L11.0114 9.52876L10.0686 10.4716L7.87329 8.27631V4.00016H9.20662Z" fill="#5B5B5B"/>
                                        <path d="M15.2066 8.00016C15.2066 11.6821 12.2219 14.6668 8.53996 14.6668C4.85806 14.6668 1.87329 11.6821 1.87329 8.00016C1.87329 4.31826 4.85806 1.3335 8.53996 1.3335C12.2219 1.3335 15.2066 4.31826 15.2066 8.00016ZM13.8733 8.00016C13.8733 5.05464 11.4855 2.66683 8.53996 2.66683C5.59444 2.66683 3.20662 5.05464 3.20662 8.00016C3.20662 10.9457 5.59444 13.3335 8.53996 13.3335C11.4855 13.3335 13.8733 10.9457 13.8733 8.00016Z" fill="#5B5B5B"/>
                                    </svg>
                                </div> 
                                <span><?php echo reading_time(); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <section id="post-content">
                <div class="inner-post-content">
                    <figure class="post-thumbnail">
                    <?php
                        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                            the_post_thumbnail('', array('class' => 'mvp-reg-img'));
                        }
                        
                        if (get_post_meta($post->ID, "mvp_photo_credit", true)) {
                            $photo_credit = wp_kses_post(get_post_meta($post->ID, "mvp_photo_credit", true));
                            echo '<figcaption class="photo-credit">' . $photo_credit . '</figcaption>';
                        }
                        else {
                            $photo_credit = get_the_post_thumbnail_caption();
                            echo '<figcaption class="photo-credit">' . $photo_credit . '</figcaption>';
                        }
                    ?>
                    </figure>

                    <?php the_content(); ?>

                </div>
            </section>
            <?php endif; ?>

            <section id="post-related">
                <div id="inner-post-related">
                    <h4 class="post-related-title">Você pode gostar</h4>
                    <?php ins_RelatedPostsGuias(); ?>
                </div>
            </section>

        </div>

        <div class="sidebar">
            <div class="widget-area widget-guias">
                <?php include get_template_directory() . '/components/on-code/newsletter/newsletter.php'; ?>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>