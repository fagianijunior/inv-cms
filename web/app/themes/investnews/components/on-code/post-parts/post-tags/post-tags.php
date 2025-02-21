<?php
    global $post;
    $post_id = get_the_ID();
?>
<?php $post_tags = get_the_tags($post_id); ?>
<?php if ( $post_tags ) { ?>
    <div class="related-tags">
        <p class="title">Tópicos relacionados</p>
        <div class="tag-list">
            <?php foreach( $post_tags as $tag ) {
                $tag_id = $tag->term_id;
                $tag_link = get_tag_link($tag_id);
                $tag_name = $tag->name;
                $tag_page = get_field('tag_page', 'post_tag_' . $tag_id);
                if($tag_page){
                ?>
                    <a href="<?php echo $tag_link ?>" title="<?php echo $tag_name ?>" class="tag-item">
                        <?php echo $tag_name ?>
                    </a>
                <?php }else{ ?>
                    <span title="<?php echo $tag_name ?>" class="tag-item">
                        <?php echo $tag_name ?>
                    </span>
            <?php }} ?>
        </div>
    </div>
<?php } ?>