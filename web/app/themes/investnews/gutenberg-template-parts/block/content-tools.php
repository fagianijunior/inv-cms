<?php 
    if( isset( $block['data']['investnews_block_preview_image_help'] )  ) {    
    /* rendering in inserter preview  */
    echo '<img src="'. $block['data']['investnews_block_preview_image_help'] .'" style="width:100%; height:auto;">';
    } else {
?>
   <section class="tools">
       <div class="container">
           <div class="tools-head">
            <h2><?php the_field('seciton_title');?></h2>
            <?php 
            $link = get_field('page_link');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="see-all" aria-label="" title="" target="<?php echo esc_attr( $link_target ); ?>">
                <span class="text">Ver tudo</span>
                <span class="icon">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.0015 1.48891C1.0015 1.32803 1.08044 1.17091 1.22553 1.07769C1.45256 0.931849 1.75476 0.997257 1.9006 1.22429C3.29435 3.38934 5.09932 5.19429 7.26362 6.5888C7.40419 6.67975 7.49062 6.83387 7.49062 7.00151C7.49062 7.16991 7.40419 7.32477 7.26287 7.41572C5.10459 8.80497 3.30562 10.6024 1.91488 12.7592C1.76979 12.9847 1.47059 13.0719 1.24056 12.9336C1.003 12.7908 0.931596 12.481 1.08044 12.2495C2.28175 10.3814 3.77322 8.76813 5.52556 7.43827C5.81498 7.21876 5.81498 6.7835 5.52556 6.56399C3.77472 5.23489 2.28174 3.62088 1.07819 1.75202C1.02556 1.67008 1 1.57836 1 1.48815L1.0015 1.48891Z" fill="#777777" stroke="#777777" stroke-width="0.5"></path>
                    </svg>
                </span>
                </a>
            <?php endif; ?>
           </div>
            <div class="grid">
                <?php include('block-parts/tools/content.php') ?>
            </div>
        </div>
    </section>
<?php } ?>