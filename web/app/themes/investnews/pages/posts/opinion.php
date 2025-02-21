<?php get_header(); ?>

<?php
    global $post;
    $post_id = get_the_ID();
?>
<section class="singular-post opinion-post-template">

    <?php // top area of the post ?>
        <?php echo get_template_part('components/on-code/post-parts/top-area-opinion/top-area-opinion')?>
    </div>

    <?php // Featured image ?>

    <?php // Post content ?>
    <div class="post-content">
        <?php the_content(); ?>
        <?php
        // Get the categories of the current post
        $categories = get_the_category();
        
        if (!empty($categories)) {
            foreach ($categories as $category) {
                if ($category->name === 'The Wall Street Journal') {  ?>
                    <p class="translate-in">Traduzido do inglês por <b>InvestNews</b></p>
                    <p class="presented-nyse">
                        Presented by    
                        <svg xmlns="http://www.w3.org/2000/svg" width="81" height="32" viewBox="0 0 81 32" fill="none">
                            <path d="M11.207 26.0301L3.0531 14.6533H0V31.5856H3.26088V20.1998L11.4148 31.5856H14.469V14.6533H11.207V26.0301Z" fill="#010202"/>
                            <path d="M33.3676 14.6533H29.4118L25.1176 21.6499L20.7016 14.6533H16.5381L23.1302 24.7175V31.5856H26.6704V24.7622L33.3676 14.6533Z" fill="#010202"/>
                            <path d="M42.6409 21.6736L40.6602 21.2211C38.3366 20.7006 37.844 20.2828 37.844 19.274C37.844 18.2652 38.8505 17.3961 40.763 17.3961C42.4566 17.3715 44.1021 17.9647 45.389 19.0662L47.4412 16.3527C45.5287 14.7887 43.0933 14.2324 40.9026 14.2324C36.938 14.2324 34.1563 16.5627 34.1563 19.6572C34.1563 22.0903 35.7929 23.6554 39.1298 24.3156L41.0791 24.6988C43.3391 25.1512 44.1713 25.9834 44.1713 26.9587C44.1713 28.3149 43.0252 28.9416 41.1127 28.9762C39.2683 29.0109 37.4954 28.3506 35.8957 26.7163L33.7754 29.2868C35.4097 31.1647 38.2964 32.0003 41.0076 32.0003C45.1455 32.0003 47.7193 29.9827 47.7193 26.714C47.7193 23.9011 45.9453 22.441 42.6409 21.6736Z" fill="#010202"/>
                            <path d="M53.4479 24.6129C53.9964 27.161 55.9558 28.8445 58.5341 28.8445C60.4087 28.8445 61.9012 27.9777 62.9758 26.4885L65.4391 28.572C63.8338 30.7716 61.2566 32.0507 58.5341 31.9982C53.1563 31.9982 49.6865 28.143 49.6865 23.1148C49.6865 18.0866 53.1284 14.2314 58.056 14.2314C61.7459 14.2314 66.7942 16.8019 65.9585 24.6084L53.4479 24.6129ZM62.6116 21.8715C62.2352 18.4039 59.992 17.3594 58.4671 17.3594C55.8732 17.3594 53.9953 18.9893 53.3931 21.8715H62.6116Z" fill="#010202"/>
                            <path d="M64.1709 5.10749H75.7342V16.6708H80.844V0H64.1709V5.10749Z" fill="#71C5E8"/>
                        </svg>
                    </p>
              <?php  }
            }
        }
        ?>
    </div>
    <?php // Newsletter ?>
    <div class="news-post">
        <?php echo get_template_part('components/on-code/newsletter/newsletter')?>
    </div>

    <?php // Post Tags ?>
    <?php echo get_template_part('components/on-code/post-parts/post-tags/post-tags')?>

    <?php // Post author list ?>
    <?php echo get_template_part('components/on-code/post-parts/post-author-list/post-author-list')?>
    
</section>

<?php echo get_template_part('components/on-code/post-parts/author-related-posts/author-related-posts')?>

<?php get_footer(); ?>