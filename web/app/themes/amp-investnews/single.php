<?php get_header(); ?>
    <div class="amp-post">
        <div class="head">
            <div class="container">
                <h1 class="title"><?php echo get_the_title(); ?></h1>
                <?php
                    $excerpt = '';
                    if (has_excerpt()) {
                        $excerpt = wp_strip_all_tags(get_the_excerpt());
                        ?>
                            <p class="excerpt"><?php echo $excerpt; ?></p>
                        <?php
                    }
                ?>

                
                <?php
                    global $post;
                    $post_id = get_the_ID();

                    $author_id = get_post_field ('post_author', $post_id);
                    $author_url = get_author_posts_url($author_id);
                    $author_display_name = get_the_author_meta( 'display_name' , $author_id ); 
                    ?>
                        <div class="author">
                            <span class="by-text">Por</span>
                            <span class="author-list">
                                <?php
                                $author = get_post_meta($post->ID, 'mvp_post_author', true);
                                if ($author) {
                                    $author = trim($author);
                                    echo "<strong>" . $author . "</strong>";
                                } if (function_exists('coauthors_posts_links')) {
                                    coauthors_posts_links(', ', ' e ');
                                } else {
                                    ?>
                                        <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo $author_display_name; ?></a>    
                                    <?php
                                }
                                ?>
                            </span>
                                                        

                        </div>
                    <?php
                ?>
                <div class="time-informations">
                    <?php 
                        $date_post = get_the_date('Y-m-d');
                        $current_date = date('Y-m-d', time());
                    ?>
                    <?php if($date_post == $current_date) { ?>
                        <time datetime="<?php echo get_the_date('H I'); ?>" itemprop="datePublished" class="date-published">Às <?php echo get_the_date('H\hi'); ?></time>
                    <?php } else { ?>
                        <time datetime="<?php echo get_the_date('d M\. Y G\hi'); ?>" itemprop="datePublished" class="date-published"><?php echo get_the_date('d M\. Y'); ?> <time datetime="<?php echo get_the_date('h\hi'); ?>"><?php echo get_the_date('G\hi'); ?></time></time>
                    <?php } ?>
                    <?php if ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) { ?>
                        <time datetime="<?php echo get_post_modified_time('d M\. Y G\hi', true, null, true); ?>" itemprop="datePublished">Atualizado:  <?php echo get_post_modified_time('d M\. Y', true, null, true); ?> <time datetime="<?php echo get_post_modified_time('G\hi', true, null, true); ?>"><?php echo get_post_modified_time('G\hi', true, null, true); ?></time> </time>
                    <?php } ?>
                </div>


            </div>
        </div>
    
        <div class="content">
            <div class="container">
                <?php echo get_the_content(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>