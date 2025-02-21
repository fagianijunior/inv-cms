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
<?php if(have_rows('gallery')) { ?>
    <div id="gallery-<?php echo(rand(1,100)); ?>" class="gallery-slider swiper">
        <div class="header">
            <div class="title-area">
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
                ?>
            </div>
            <div class="slider-count"></div>
        </div>
        <div class="swiper-wrapper">
            <?php while(have_rows('gallery')) { the_row(); ?>
                <?php 
                    $gallery_item = get_sub_field('gallery_item');
                    $gallery_item_caption = $gallery_item['caption'];
                ?>
                <?php if($gallery_item) { ?>
                    <div class="gallery-item swiper-slide">
                        <?php echo wp_get_attachment_image( $gallery_item['ID'], array('1256', '692'), "", array( "class" => "img-desk" ) ); ?>
                        <?php echo wp_get_attachment_image( $gallery_item['ID'], array('628', '346'), "", array( "class" => "img-mobile" ) ); ?>
                        <?php if($gallery_item_caption) { ?>
                            <figcaption class="item-caption"><?php echo $gallery_item_caption; ?></figcaption>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="slider-prev">
            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
                <rect y="0.5" width="40" height="40" rx="20" fill="#EEEEEE"/>
                <path d="M17.0015 14.9889C17.0015 14.828 17.0804 14.6709 17.2255 14.5777C17.4526 14.4318 17.7548 14.4973 17.9006 14.7243C19.2944 16.8893 21.0993 18.6943 23.2636 20.0888C23.4042 20.1798 23.4906 20.3339 23.4906 20.5015C23.4906 20.6699 23.4042 20.8248 23.2629 20.9157C21.1046 22.305 19.3056 24.1024 17.9149 26.2592C17.7698 26.4847 17.4706 26.5719 17.2406 26.4336C17.003 26.2908 16.9316 25.981 17.0804 25.7495C18.2817 23.8814 19.7732 22.2681 21.5256 20.9383C21.815 20.7188 21.815 20.2835 21.5256 20.064C19.7747 18.7349 18.2817 17.1209 17.0782 15.252C17.0256 15.1701 17 15.0784 17 14.9882L17.0015 14.9889Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
            </svg>
        </div>
        <div class="slider-next">
            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.5" width="40" height="40" rx="20" fill="#EEEEEE"/>
                <path d="M17.0015 14.9889C17.0015 14.828 17.0804 14.6709 17.2255 14.5777C17.4526 14.4318 17.7548 14.4973 17.9006 14.7243C19.2944 16.8893 21.0993 18.6943 23.2636 20.0888C23.4042 20.1798 23.4906 20.3339 23.4906 20.5015C23.4906 20.6699 23.4042 20.8248 23.2629 20.9157C21.1046 22.305 19.3056 24.1024 17.9149 26.2592C17.7698 26.4847 17.4706 26.5719 17.2406 26.4336C17.003 26.2908 16.9316 25.981 17.0804 25.7495C18.2817 23.8814 19.7732 22.2681 21.5256 20.9383C21.815 20.7188 21.815 20.2835 21.5256 20.064C19.7747 18.7349 18.2817 17.1209 17.0782 15.252C17.0256 15.1701 17 15.0784 17 14.9882L17.0015 14.9889Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
            </svg>
        </div>
    </div>
<?php } ?>