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

    $row_description = get_field('row_description') ;
?>
<?php if(have_rows('author_list')) { ?>
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
                if($row_description) {
                    echo '<div class="section-description">'.$row_description.'</div>';
                }
                echo '</div>';
            }


            if(have_rows('author_list')) { ?>
                <div class="list">
                    <?php while(have_rows('author_list')) { the_row(); ?>
                        <?php 
                            $author_item = get_sub_field('author_item');
                        ?>
                        <?php if($author_item) { ?>
                            <?php //var_dump($author_item); ?>
                            <?php
                                $author_display_name = $author_item['display_name'];
                                $author_id = $author_item['ID'];
                                $author_profile_link = get_author_posts_url($author_id);
                            ?>
                            <a href="<?php echo $author_profile_link; ?>" title="<?php echo $author_display_name; ?>" class="author">
                                <div class="image">
                                    <?php $profile_image = get_field('profile_image', 'user_'.$author_id); ?>
                                    <?php if($profile_image) { ?>
                                        <?php echo wp_get_attachment_image( $profile_image['ID'], array(600,394) ); ?>
                                    <?php } else { ?>
                                        <img src="<?php bloginfo('template_url'); ?>/gutenberg-template-parts/block/block-parts/simple-list/assets/images/investnews-logo.png" class="logo-img" alt="InvestNews" width="600" height="394">
                                    <?php } ?>
                                </div>
                                <?php if($author_display_name) { ?>
                                    <div class="name"><?php echo $author_display_name; ?></div>
                                <?php } ?>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>