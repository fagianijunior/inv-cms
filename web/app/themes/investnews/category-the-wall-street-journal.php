<?php get_header();
// Get category auto posts and selected posts
$auto_posts = get_field('category_auto_posts', 'category_' . get_query_var('cat'));
$select_posts_items = get_field('category_posts', 'category_' . get_query_var('cat'));

// Get posts from category 
$query_args = array(
  'cat' => get_query_var('cat'),
  'posts_per_page' => 3,
  'orderby' => 'date',
  'order' => 'DESC',
);
$posts_query = new WP_Query($query_args);
$posts = $posts_query->posts;

// Variable to store featured posts
$featured_posts = array();

// Set featured posts 
$source_posts = $auto_posts ? $posts : $select_posts_items;
if(is_array($source_posts)) {
    $featured_posts = array_slice($source_posts, 0, 3);
}

// Pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$featured_posts_ids = array_map(function ($post) {
  return $post->ID;
}, $featured_posts);

// Get rest of posts to show
$rest_query_args = array(
  'cat' => get_query_var('cat'),
  'posts_per_page' => 12,
  'paged' => $paged,
  'orderby' => 'date',
  'order' => 'DESC',
  'post__not_in' => $featured_posts_ids
);
$rest_posts_query = new WP_Query($rest_query_args);
$rest_posts = $rest_posts_query->posts;

?>
<section class="category-title">
  <div class="container">
    <div class="navigation">
      <div class="empty"></div>
        <div class="featured">
            <span class="featured-text">Featuring content from</span>
            <svg width="317" height="28" viewBox="0 0 317 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M315.29 23.9478C314.34 23.9478 313.581 24.7092 313.581 25.7877C313.581 26.8028 314.34 27.5642 315.29 27.5642C316.24 27.5642 317 26.8028 317 25.7877C317 24.7092 316.24 23.9478 315.29 23.9478ZM254.186 27.4373H261.912V26.7394L261.088 26.5491C260.329 26.3587 259.949 25.9146 259.949 24.836V14.3676H261.785C262.925 14.3676 263.495 14.6214 263.558 16.9689L263.748 21.9176C263.874 26.3587 265.141 27.5642 267.294 27.5642C269.51 27.5642 270.08 26.0415 270.08 23.9478V23.0596H269.257V23.694C269.257 25.0898 269.067 26.1049 268.497 26.1049C267.99 26.1049 267.99 25.7243 267.864 23.9478L267.61 20.5852C267.294 16.0807 266.724 14.4945 263.368 13.8601C266.534 13.0353 268.497 10.6878 268.497 7.32525C268.497 3.011 265.078 0.917326 261.848 0.917326H248.741V1.61521L249.501 1.7421C250.894 2.05933 250.894 2.75722 250.894 5.86602V21.1562C250.894 24.5823 249.944 26.2318 247.728 26.2318C245.765 26.2318 244.688 25.2802 244.688 21.5369V3.32822C244.688 2.24966 245.005 1.93244 245.892 1.7421L246.905 1.48833V0.790429H238.863V1.48833L239.686 1.7421C240.446 1.99588 240.699 2.24966 240.699 3.32822V21.2197C240.699 25.2802 243.042 27.5007 246.588 27.5007C250.134 27.5007 251.907 25.2802 251.907 21.0928V4.4068C251.907 2.31311 252.35 1.61521 253.997 1.61521C255.326 1.61521 255.896 2.05933 255.896 3.32822V24.7092C255.896 25.7877 255.58 26.1684 254.756 26.3587L253.933 26.6125L254.186 27.4373ZM305.729 3.45512C305.729 2.37656 306.046 2.05933 306.869 1.869L307.882 1.61521V0.917326H299.904V1.61521L300.727 1.869C301.487 2.12278 301.866 2.37656 301.866 3.45512V24.9629C301.866 25.9781 301.423 26.5491 300.283 26.5491C298.89 26.5491 298.7 26.1049 298.194 23.8209L293.255 0.790429H291.735L287.05 23.123C286.48 25.5974 286.226 26.1684 285.213 26.4856L284.58 26.6759V27.3738H290.089V26.6759L289.266 26.5491C288.126 26.2953 287.809 25.7243 288.379 22.8058L291.165 8.53071L294.205 23.6306C294.648 25.8512 294.648 26.2318 293.002 26.5491L292.178 26.6759V27.3738H312.504V18.6184H311.744C311.364 22.6789 310.541 26.4856 307.312 26.4856H305.792L305.729 3.45512ZM293.761 20.268V19.2529H288.569L288.443 20.268H293.761ZM272.296 3.89923V22.2983C272.296 25.0898 272.296 26.3587 270.903 26.6125L270.206 26.7394V27.4373H275.842V26.7394C273.372 26.4222 273.372 25.5339 273.372 22.552V5.10468L272.423 4.2799L281.857 27.5007H283.44V6.1198C283.44 2.94756 283.44 2.24967 284.96 1.869L285.467 1.7421V1.04421H279.641V1.7421L280.274 1.869C282.237 2.18622 282.237 3.011 282.237 5.92947V19.3163L282.617 19.1894L275.462 1.04421H269.953V1.7421L270.46 1.869C271.346 1.99589 271.663 2.63034 272.296 3.89923ZM260.012 1.869H261.532C263.051 1.869 264.508 2.88412 264.508 7.89626C264.508 13.0353 263.431 13.4794 261.278 13.4794H260.012V1.869ZM234.431 13.9235C234.431 25.0264 233.481 26.6125 231.518 26.6125C229.492 26.6125 228.669 25.0264 228.669 13.987C228.669 3.32823 229.618 1.7421 231.518 1.7421C233.544 1.80555 234.431 3.32823 234.431 13.9235ZM238.61 14.1773C238.61 6.8177 236.267 0.72699 231.518 0.72699C226.706 0.72699 224.426 6.8177 224.426 14.1773C224.426 21.5369 226.769 27.6276 231.518 27.6276C236.394 27.6276 238.61 21.5369 238.61 14.1773ZM222.21 3.45512C222.21 2.37656 222.463 2.05933 223.223 1.869L224.046 1.61521V0.917326H216.131V1.61521L217.081 1.869C217.841 2.05933 218.284 2.31311 218.284 3.45512V21.9176C218.284 24.5188 218.031 26.5491 216.131 26.5491C214.928 26.5491 213.978 25.5974 214.042 24.8995C214.168 23.694 216.131 23.7575 216.321 21.8541C216.448 20.4584 215.561 19.8873 214.738 19.7605C213.535 19.6336 212.079 20.5852 212.079 22.6155C212.015 25.2167 213.725 27.5642 216.638 27.5642C219.804 27.5642 222.273 25.407 222.273 21.2831V3.45512H222.21ZM93.9869 3.45512C93.9869 2.37656 94.3035 2.05933 95.1266 1.869L96.1397 1.61521V0.917326H88.1614V1.61521L88.9846 1.869C89.7444 2.12278 90.1243 2.37656 90.1243 3.45512V24.9629C90.1243 25.9781 89.6811 26.5491 88.5413 26.5491C87.1483 26.5491 86.9583 26.1049 86.4518 23.8209L81.5128 0.790429H79.9931L75.3075 23.123C74.8009 25.5974 74.4843 26.1684 73.4712 26.4856L72.838 26.6759V27.3738H78.3468V26.6759L77.5237 26.5491C76.3839 26.2953 76.0673 25.7243 76.6372 22.8058L79.4233 8.46726L82.4626 23.6306C82.9059 25.8512 82.9059 26.2318 81.2595 26.5491L80.4364 26.6759V27.3738H100.825V18.6184H100.066C99.6857 22.6789 98.8625 26.4856 95.6332 26.4856H94.1135V3.45512H93.9869ZM200.871 1.869H201.694C204.1 1.869 204.86 5.67569 205.177 9.73616H205.937V0.980765H192.006V9.73616H192.766C193.019 5.67569 193.842 1.869 196.249 1.869H197.072V24.836C197.072 25.9146 196.755 26.2953 195.932 26.4856L194.919 26.7394V27.4373H203.214V26.7394L202.011 26.4856C201.251 26.2953 200.871 26.0415 200.871 24.8995V1.869ZM183.331 14.1139L184.534 14.1773C186.244 14.2407 186.751 14.8752 187.131 19.0626H187.89V8.34038H187.131C186.687 11.703 186.244 13.0987 184.598 13.1622L183.395 13.2256V1.869H186.054C189.03 1.869 189.663 5.61224 190.107 9.73616H190.866V0.980765H177.633V1.67866L178.456 1.93244C179.342 2.18622 179.596 2.69378 179.596 3.58201V24.8995C179.596 25.978 179.279 26.3587 178.456 26.5491L177.633 26.8028V27.5007H191.246V18.7453H190.36C189.917 22.7424 189.41 26.6125 185.928 26.6125H183.268V14.1139H183.331ZM168.831 14.1139L170.034 14.1773C171.744 14.2407 172.25 14.8752 172.63 19.0626H173.39V8.34038H172.63C172.187 11.703 171.744 13.0987 170.098 13.1622L168.894 13.2256V1.869H171.554C174.53 1.869 175.163 5.67569 175.606 9.73616H176.366V0.980765H162.752V1.67866L163.955 1.93244C164.842 2.18622 165.095 2.69378 165.095 3.58201V24.8995C165.095 25.978 164.779 26.3587 163.955 26.5491L163.132 26.8028V27.5007H176.746V18.7453H175.986C175.543 22.7424 175.036 26.6125 171.554 26.6125H168.831V14.1139ZM153.064 1.869H154.204C155.724 1.869 157.18 2.88412 157.18 7.89626C157.18 12.9084 156.104 13.4794 153.951 13.4794H153.064V1.869ZM147.302 27.4373H155.027V26.7394L154.204 26.5491C153.444 26.3587 153.064 25.9146 153.064 24.836V14.3676H154.457C155.597 14.3676 156.167 14.8117 156.23 16.9689L156.42 21.9176C156.547 26.3587 157.813 27.5642 159.966 27.5642C162.183 27.5642 162.752 26.0415 162.752 23.9478V23.0596H161.929V23.694C161.929 25.0898 161.739 26.1049 161.169 26.1049C160.663 26.1049 160.663 25.7243 160.536 23.9478L160.283 20.5852C159.966 15.9538 159.333 14.4945 156.04 13.8601C159.206 13.0353 161.169 10.6878 161.169 7.32525C161.169 3.011 157.75 0.917326 154.521 0.917326H147.302V1.61521L148.125 1.869C148.885 2.12278 149.265 2.37656 149.265 3.45512V24.836C149.265 25.9146 148.949 26.2953 148.125 26.4856L147.302 26.7394V27.4373ZM141.414 1.869H142.237C144.643 1.869 145.403 5.67569 145.719 9.73616H146.479V0.980765H132.549V9.73616H133.309C133.562 5.67569 134.385 1.869 136.791 1.869H137.614V24.836C137.614 25.9146 137.298 26.2953 136.475 26.4856L135.461 26.7394V27.4373H143.503V26.7394L142.49 26.4856C141.477 26.2318 141.35 25.4705 141.35 24.836V1.869H141.414ZM132.549 20.5218C132.549 12.6546 123.937 10.5609 123.937 4.85091C123.937 3.64545 124.38 1.80555 126.343 1.80555C129.129 1.80555 130.143 5.35846 130.586 9.73616H131.346V0.980765H130.839C130.649 1.80555 130.333 2.18622 129.826 2.18622C128.94 2.18622 128.496 0.790429 126.343 0.790429C123.051 0.790429 120.835 3.51857 120.835 7.07148C120.835 13.5429 129.446 16.271 129.446 22.2983C129.446 25.0264 128.18 26.5491 126.47 26.5491C123.874 26.5491 122.228 23.5037 121.721 18.6184H120.961V27.3738H121.404C121.784 26.1049 122.291 25.9781 122.734 25.9781C123.494 25.9781 124.254 27.5007 126.47 27.5007C129.953 27.5642 132.549 24.6457 132.549 20.5218ZM107.411 3.45512C107.411 2.37656 107.727 2.05933 108.55 1.869L109.564 1.61521V0.917326H101.585V1.61521L102.408 1.869C103.168 2.12278 103.548 2.37656 103.548 3.45512V24.836C103.548 25.9146 103.232 26.2953 102.408 26.4856L101.585 26.7394V27.4373H114.123V18.6819H113.363C112.983 22.7424 112.16 26.5491 108.93 26.5491H107.411V3.45512ZM82.0194 20.268V19.2529H76.8271L76.7005 20.268H82.0194ZM59.7941 27.5007H61.3771L64.923 8.59415H64.4164L68.3423 27.5007H69.7353L74.421 5.16813C74.9275 2.82067 75.1808 1.99589 76.1306 1.80555L76.8905 1.61521V0.917326H71.5083V1.61521L72.3314 1.7421C73.4712 1.99588 73.7245 2.69378 73.2179 5.48536L70.0519 20.5218H70.4951L67.4558 4.72402C67.1392 3.20134 66.9492 1.99588 68.2156 1.7421L69.0388 1.61521V0.917326H61.6303V1.61521L62.1369 1.7421C62.8967 1.93244 63.0234 2.37655 63.34 3.83579L64.5431 9.54583L64.2898 6.05636L61.6303 20.0777H61.9469L58.8443 4.72402C58.5277 3.1379 58.401 1.93244 59.6041 1.7421L60.174 1.61521V0.917326H52.6389V1.61521L53.3987 1.80555C54.0953 1.99589 54.4752 2.31311 54.9184 4.47023L59.7941 27.5007ZM39.3417 14.1139L40.5448 14.1773C42.2544 14.2407 42.761 14.8752 43.1409 19.0626H43.9007V8.34038H43.1409C42.6977 11.703 42.2544 13.0987 40.6081 13.1622L39.405 13.2256V1.869H42.0645C45.0405 1.869 45.6737 5.67569 46.1169 9.73616H46.8768V0.980765H33.4529V1.67866L34.2761 1.93244C35.1626 2.18622 35.4159 2.69378 35.4159 3.58201V24.8995C35.4159 25.978 35.0993 26.3587 34.2761 26.5491L33.4529 26.8028V27.5007H47.0667V18.7453H46.3069C45.8637 22.7424 45.3571 26.6125 41.8745 26.6125H39.2151L39.3417 14.1139ZM15.1535 27.4373H23.0051V26.7394L22.1187 26.5491C21.4221 26.4222 20.9789 25.9146 20.9789 24.836V14.3676H26.8043V24.836C26.8043 25.9146 26.3611 26.3587 25.6646 26.5491L24.7781 26.7394V27.4373H32.6298V26.7394L31.8066 26.4856C31.0468 26.2953 30.6669 25.8512 30.6669 24.7726V3.45512C30.6669 2.37656 30.9835 2.05933 31.8066 1.869L32.6298 1.61521V0.917326H24.7781V1.61521L25.6646 1.869C26.2978 2.05933 26.8043 2.31311 26.8043 3.45512V13.3525H20.9789V3.45512C20.9789 2.37656 21.4221 2.05933 22.1187 1.869L23.0051 1.61521V0.917326H15.1535V1.61521L15.9766 1.869C16.7365 2.12278 17.1164 2.37656 17.1164 3.45512V24.836C17.1164 25.9146 16.7998 26.2953 15.9766 26.4856L15.1535 26.7394V27.4373ZM9.32802 1.869H10.1512C12.5573 1.869 13.3172 5.67569 13.6338 9.73616H14.3303V0.980765H0.399902V9.73616H1.15974C1.41302 5.67569 2.23618 1.869 4.64234 1.869H5.4655V24.836C5.4655 25.9146 5.1489 26.2953 4.32574 26.4856L3.31262 26.7394V27.4373H11.6075V26.7394L10.4045 26.4856C9.64462 26.2953 9.2647 26.0415 9.2647 24.8995V1.869H9.32802Z" fill="#1C1C21"></path>
            </svg>
          </div>
        <div class="empty"></div>
    </div>
  </div>
</section>

<section class="category-featured">
  <div class="container">
    <div class="category-featured-content">
      <a href="<?php echo get_permalink($featured_posts[0]->ID); ?>" class="featured-post highlight">
        <div class="featured-post-image">
          <img src="<?php echo get_the_post_thumbnail_url($featured_posts[0]->ID); ?>" alt="">
        </div>
        <div class="featured-post-content">
          <span>
            <?php single_cat_title(); ?>
          </span>
          <h2>
            <?php echo $featured_posts[0]->post_title; ?>
          </h2>
          <p>
            <?php echo $featured_posts[0]->post_excerpt; ?>
          </p>
        </div>
      </a>

      <div class="featured-post-list">
        <a href="<?php echo get_permalink($featured_posts[1]->ID); ?>" class="featured-post">
          <div class="featured-post-content">
            <span>
              <?php single_cat_title(); ?>
            </span>
            <h2>
              <?php echo $featured_posts[1]->post_title; ?>
            </h2>
            <p>
              <?php echo $featured_posts[1]->post_excerpt; ?>
            </p>
          </div>
        </a>

        <a href="<?php echo get_permalink($featured_posts[2]->ID); ?>" class="featured-post">
          <div class="featured-post-content">
            <span>
              <?php single_cat_title(); ?>
            </span>
            <h2>
              <?php echo $featured_posts[2]->post_title; ?>
            </h2>
            <p>
              <?php echo $featured_posts[2]->post_excerpt; ?>
            </p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
<section class="category-second">
  <div class="container">
    <div class="category-second-content">
      <div class="category-posts">
        <div class="category-posts-content">
          <!-- Posts with pagination -->
          <?php
          if ($rest_posts) :
            foreach ($rest_posts as $post) :
              setup_postdata($post);
          ?>
              <a href="<?php echo get_permalink($post->ID); ?>" class="category-post">
                <div class="category-post-image">
                  <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="">
                </div>
                <div class="category-post-content">
                  <span>
                    <?php single_cat_title(); ?>
                  </span>
                  <h2>
                    <?php echo $post->post_title; ?>
                  </h2>
                  <p>
                    <?php echo get_the_date('j \d\e F \d\e Y', $post->ID); ?>
                  </p>
                </div>
              </a>
              <hr>
          <?php
            endforeach;
            wp_reset_postdata();
          endif;
          ?>
        </div>
        <div class="pagination">
          <div class="nu-nav-links">
            <?php if (function_exists("pagination")) {
              pagination($wp_query->max_num_pages);
            } ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
