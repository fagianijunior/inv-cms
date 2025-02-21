<?php 
    $row_title = get_field('row_title') ;
    $row_title_tag_start = '<span class="content">';
    $row_title_tag_end = '</span>';
    $row_title_link = get_field('row_title_link');
    if($row_title_link) {
        $row_title_link_url = $row_title_link['url'];
        $row_title_link_title = $row_title_link['title'];
        $row_title_link_target = $row_title_link['target'] ? $row_title_link['target'] : '_self';
    }

    $bg_color = get_field('bg_color');
    $categ_color = get_field('categ_color');
?>
<?php if(have_rows('post_list')) { ?>
    <div class="simple-post-list <?php echo $bg_color == 'cinza' ? 'colored-bg' : null; ?> <?php echo $categ_color == 'indigo' ? 'categ_color' : null; ?>">
        <div class="container">
            <?php       
                if($row_title_link) {
                    $row_title_tag_start = '<a href="'.$row_title_link_url.'" class="content" aria-label="'.$row_title_link_title.'" title="'.$row_title_link_title.'" target="'.$row_title_link_target.'" >';
                    $row_title_tag_end = '</a>';
                }
                if($row_title) {
                    echo '<p class="section-title">';
                    echo $row_title_tag_start;
                    echo $row_title;
                    echo $row_title_tag_end;
                    echo '</p>';
                }

                if(have_rows('post_list')) { ?>
                    <div class="post-lists">
                        <?php while(have_rows('post_list')) { the_row();
                            $post_type = get_post_type( );?>
                            <?php 
                                $simple_post_item = get_sub_field('simple_post_item');
                                $alternative_title = get_sub_field('alternative_title');
                            ?>
                            <?php if($simple_post_item) { ?>
                                <?php
                                    $simple_post_item_id = $simple_post_item[0]->ID;
                                    $simple_post_item_type = get_post_type($simple_post_item_id);
                                    $post_format = get_post_format($simple_post_item_id);
                                ?>
                                <div class="post-item">
                                    <div class="item-image">
                                        <a href="<?php echo get_the_permalink($simple_post_item_id); ?>" title="<?php echo get_the_title($simple_post_item[0]->ID); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php if ( has_post_thumbnail($simple_post_item_id) ) { ?>
                                                <?php 
                                                    echo get_the_post_thumbnail($simple_post_item_id, array(300,197), array( 'class' => 'reg-img lazy' )); 
                                                    echo get_the_post_thumbnail($simple_post_item_id, array(86,86), array( 'class' => 'mob-img lazy' ));
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
                                        <?php if($simple_post_item_type == 'post') { ?>
                                            <?php $category = get_the_category($simple_post_item_id); ?>
                                            <span class="category"><a href="/<?php echo $category[0]->slug; ?>/" title="<?php echo esc_html( $category[0]->cat_name ); ?>"> <?php  if (isset($category)) { echo esc_html( $category[0]->cat_name ); } ?></a></span>
                                        <?php } ?>

                                        <?php if($simple_post_item_type == 'guias') { ?>
                                            <span class="category"><a href="/guias/" title="Guias">Guias</a></span>
                                        <?php } ?>

                                        <?php if($simple_post_item_type == 'patrocinados') { ?>
                                            <a href="<?php echo get_permalink(); ?>" title="Conteúdo de marca" class="category brand-flag">Conteúdo de marca</a>
                                        <?php } if($simple_post_item_type == 'infograficos') { ?>
                                            <span class="category"><a href="<?php echo home_url('/infograficos/');?>" title="Infográficos"><?php echo 'Infográficos'; ?></a></span>
                                        <?php } ?>


                                        <a href="<?php echo get_the_permalink($simple_post_item_id); ?>" title="<?php echo $alternative_title ? $alternative_title : get_the_title($simple_post_item_id); ?>" class="title" target="_blank" rel="noopener noreferrer">
                                            <?php if($alternative_title) { ?>
                                                <?php echo $alternative_title; ?> 
                                            <?php } else { ?>
                                                <?php echo get_the_title($simple_post_item_id); ?> 
                                            <?php } ?>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
        </div>
    </div>
<?php } ?>