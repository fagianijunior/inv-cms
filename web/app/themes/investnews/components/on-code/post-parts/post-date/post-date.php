<div class="time-informations">
    <?php 
        global $post;
        $post_id = get_the_ID();
        $date_post = get_the_date('Y-m-d');
        $current_date = date('Y-m-d', time());
    ?>
    <time datetime="<?php echo get_the_date('j M\. Y \| H\hi'); ?>">
        <time datetime="<?php echo get_the_date('j M\. Y \| H\hi'); ?>" itemprop="datePublished" class="date-published">
            <?php echo get_the_date('j M\. Y'); ?>
            <div class="divider">|</div>
            <?php echo get_the_date('H\hi'); ?>
            <div class="divider">|</div>
            
        </time>
        <div class="reading-time">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Icon - Post - Tempo de leitura">
                    <g id="Icon">
                        <path d="M7.33333 3.00065V6.72451L9.13807 8.52925L8.19526 9.47206L6 7.27679V3.00065H7.33333Z" fill="#777777"/>
                        <path d="M13.3333 7.00065C13.3333 10.6825 10.3486 13.6673 6.66667 13.6673C2.98477 13.6673 0 10.6825 0 7.00065C0 3.31875 2.98477 0.333984 6.66667 0.333984C10.3486 0.333984 13.3333 3.31875 13.3333 7.00065ZM12 7.00065C12 4.05513 9.61219 1.66732 6.66667 1.66732C3.72115 1.66732 1.33333 4.05513 1.33333 7.00065C1.33333 9.94617 3.72115 12.334 6.66667 12.334C9.61219 12.334 12 9.94617 12 7.00065Z" fill="#777777"/>
                    </g>
                </g>
            </svg>
            <span><?php echo estimated_reading_time($post_id); ?></span>
        </div>
    </time>

    <!-- NOVAS VERIFICAÇÕES -->
    <?php if( get_the_modified_time( 'j M Y' ) == get_the_time( 'j M Y' ) ) { ?>
        <?php if( get_the_modified_time( 'j M Y H i' ) > get_the_time( 'j M Y H i' ) ) { ?>
            <time datetime="<?php echo get_post_modified_time('j M\. Y \| H\hi',false, null, true); ?>" itemprop="datePublished"><?php echo "Atualizado: " . get_post_modified_time('H\hi',false, null, true); ?></time>
        <?php } ?>
    <?php } else if( get_the_modified_time( 'j M Y' ) > get_the_time( 'j M Y' ) ) { ?>
        <time datetime="<?php echo get_post_modified_time('j M\. Y \| H\hi',false, null, true); ?>" itemprop="datePublished"><?php echo "Atualizado: " . get_post_modified_time('j M\. Y \| H\hi',false, null, true); ?></time>
    <?php } ?>
    <!-- FIM - NOVAS VERIFICAÇÕES -->
</div>