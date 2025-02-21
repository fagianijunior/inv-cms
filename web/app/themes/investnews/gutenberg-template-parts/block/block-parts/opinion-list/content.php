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
?>
<?php if(have_rows('opinion_list')) { ?>
    <div class="container">
        <div class="content">
        <?php       
            if($row_title_link) {
                $row_title_tag_start = '<a href="'.$row_title_link_url.'" class="content" aria-label="'.$row_title_link_title.'" title="'.$row_title_link_title.'" target="'.$row_title_link_target.'" >';
                $row_title_tag_end = '</a>';
            }

            if($row_title || $row_description) {
                echo '<div class="section-header">';
                if($row_title) {
                    echo '<p class="section-title">';
                    echo $row_title_tag_start;
                    echo $row_title;
                    echo $row_title_tag_end;
                    echo '</p>';
                }
                if(have_rows('see_more')) {
                    while(have_rows('see_more')) { the_row();
                        $show_see_all = get_sub_field('show_see_all');
                        if($show_see_all) {
                            $see_all_link = get_sub_field('see_all_link');
                            if($see_all_link) {
                                $see_all_link_url = $see_all_link['url'];
                                $see_all_link_title = $see_all_link['title'];
                                $see_all_link_target = $see_all_link['target'] ? $see_all_link['target'] : '_self';

                                $see_all_text = get_sub_field('see_all_text');
                                ?>
                                    <a href="<?php echo $see_all_link_url; ?>" class="see-all" aria-label="<?php echo $see_all_link_title; ?>" title="<?php $see_all_link_title ?>" target="<?php $see_all_link_target ?>">
                                        <span class="text"><?php echo $see_all_text; ?></span>
                                        <span class="icon">
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.0015 1.48891C1.0015 1.32803 1.08044 1.17091 1.22553 1.07769C1.45256 0.931849 1.75476 0.997257 1.9006 1.22429C3.29435 3.38934 5.09932 5.19429 7.26362 6.5888C7.40419 6.67975 7.49062 6.83387 7.49062 7.00151C7.49062 7.16991 7.40419 7.32477 7.26287 7.41572C5.10459 8.80497 3.30562 10.6024 1.91488 12.7592C1.76979 12.9847 1.47059 13.0719 1.24056 12.9336C1.003 12.7908 0.931596 12.481 1.08044 12.2495C2.28175 10.3814 3.77322 8.76813 5.52556 7.43827C5.81498 7.21876 5.81498 6.7835 5.52556 6.56399C3.77472 5.23489 2.28174 3.62088 1.07819 1.75202C1.02556 1.67008 1 1.57836 1 1.48815L1.0015 1.48891Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                                            </svg>
                                        </span>
                                    </a>                
                                <?php
                            }
                        }
                    }
                }
                echo '</div>';
            }


            if(have_rows('opinion_list')) { ?>
                <div class="list">
                    <?php while(have_rows('opinion_list')) { the_row(); ?>
                        <?php
                            $item_image = get_sub_field('item_image');
                            $item_tag = get_sub_field('item_tag');
                            $item_title = get_sub_field('item_title');
                            $item_link = get_sub_field('item_link');
                            if($item_link) {
                                $item_link_url = $item_link['url'];
                                $item_link_title = $item_link['title'];
                                $item_link_target = $item_link['target'] ? $item_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo $item_link_url; ?>" class="item" aria-label="<?php echo $item_link_title; ?>" title="<?php echo $item_link_title ?>" target="<?php echo $item_link_target ?>">
                                        <div class="image">
                                            <?php if($item_image) { ?>
                                                <?php echo wp_get_attachment_image( $item_image['ID'], array(82, 82), "", array( "class" => "item-image" ) ); ?>
                                            <?php } else { ?>
                                                <img src="<?php bloginfo('template_url'); ?>/gutenberg-template-parts/block/block-parts/opinion-list/assets/images/cover.png" alt="InvestNews" class="item-image investnews-image" width="82" height="82">
                                            <?php } ?>
                                        </div>
                                        <div class="content">
                                            <?php if($item_tag) { ?>
                                                <div class="tag"><?php echo $item_tag ?></div>
                                            <?php } ?>
                                            <?php if($item_title) { ?>
                                                <div class="title"><?php echo $item_title ?></div>
                                            <?php } ?>
                                        </div>
                                    </a>
                                <?php
                            }
                        ?>
                        
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>