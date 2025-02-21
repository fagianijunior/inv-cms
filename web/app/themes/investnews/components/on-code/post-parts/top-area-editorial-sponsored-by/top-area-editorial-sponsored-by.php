<div class="top">
    <?php
        $editorial_sponsored_by_status = false;

        $tags = get_the_tags( get_the_ID()); 
        if ( $tags ) {
            foreach ( $tags as $tag ) {   
                $term = $tag->term_id;
                $editorial_sponsored_by = get_field('editorial_sponsored_by', 'post_tag_'.$term);
                if($editorial_sponsored_by) {
                    $editorial_sponsored_by_status = $editorial_sponsored_by;
                    $text_above_company_block = get_field('text_above_company_block', 'post_tag_'.$term);
                    $company_url = get_field('company_url', 'post_tag_'.$term);
                    $company_logo = get_field('company_logo', 'post_tag_'.$term);
                    $company_name = get_field('company_name', 'post_tag_'.$term);
                }
            }        
        }

        $categories = get_categories(get_the_ID());
        foreach($categories as $category) {
            $term = $category->term_id;
            $editorial_sponsored_by = get_field('editorial_sponsored_by', 'category_'.$term, false);
            if($editorial_sponsored_by) {
                $editorial_sponsored_by_status = $editorial_sponsored_by;
                $text_above_company_block = get_field('text_above_company_block', 'category_'.$term);
                $company_url = get_field('company_url', 'category_'.$term);
                $company_logo = get_field('company_logo', 'category_'.$term);
                $company_name = get_field('company_name', 'category_'.$term);
            }
        }
    ?>

    <div class="sponsor-area">
        <div class="container">
            <?php if($text_above_company_block) { ?>
                <span class="above-text"><?php echo $text_above_company_block; ?></span>
            <?php } ?>
            <?php if($company_logo) { ?>
                <div class="company">
                    <a <?php echo $company_url ? 'href="'.$company_url.'"' : false ?> class="link" >
                        <div class="logo">
                            <?php echo wp_get_attachment_image( $company_logo['ID'], 'custom-sponsor' ); ?>
                        </div>
                        <?php if($company_name) { ?>
                            <div class="name">
                                <?php echo $company_name; ?>
                            </div>
                        <?php } ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
    // Get the categories of the current post
    $categories = get_the_category();
    if (!empty($categories)) {
        foreach ($categories as $category) {
            if ($category->name === 'The Wall Street Journal') {  ?>
                <section class="category-title">
                        <div class="container">
                            <div class="navigation">
                                <div class="featured">
                                    <span class="featured-text">Featuring content from</span>
                                    <svg width="317" height="28" viewBox="0 0 317 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M315.29 23.9478C314.34 23.9478 313.581 24.7092 313.581 25.7877C313.581 26.8028 314.34 27.5642 315.29 27.5642C316.24 27.5642 317 26.8028 317 25.7877C317 24.7092 316.24 23.9478 315.29 23.9478ZM254.186 27.4373H261.912V26.7394L261.088 26.5491C260.329 26.3587 259.949 25.9146 259.949 24.836V14.3676H261.785C262.925 14.3676 263.495 14.6214 263.558 16.9689L263.748 21.9176C263.874 26.3587 265.141 27.5642 267.294 27.5642C269.51 27.5642 270.08 26.0415 270.08 23.9478V23.0596H269.257V23.694C269.257 25.0898 269.067 26.1049 268.497 26.1049C267.99 26.1049 267.99 25.7243 267.864 23.9478L267.61 20.5852C267.294 16.0807 266.724 14.4945 263.368 13.8601C266.534 13.0353 268.497 10.6878 268.497 7.32525C268.497 3.011 265.078 0.917326 261.848 0.917326H248.741V1.61521L249.501 1.7421C250.894 2.05933 250.894 2.75722 250.894 5.86602V21.1562C250.894 24.5823 249.944 26.2318 247.728 26.2318C245.765 26.2318 244.688 25.2802 244.688 21.5369V3.32822C244.688 2.24966 245.005 1.93244 245.892 1.7421L246.905 1.48833V0.790429H238.863V1.48833L239.686 1.7421C240.446 1.99588 240.699 2.24966 240.699 3.32822V21.2197C240.699 25.2802 243.042 27.5007 246.588 27.5007C250.134 27.5007 251.907 25.2802 251.907 21.0928V4.4068C251.907 2.31311 252.35 1.61521 253.997 1.61521C255.326 1.61521 255.896 2.05933 255.896 3.32822V24.7092C255.896 25.7877 255.58 26.1684 254.756 26.3587L253.933 26.6125L254.186 27.4373ZM305.729 3.45512C305.729 2.37656 306.046 2.05933 306.869 1.869L307.882 1.61521V0.917326H299.904V1.61521L300.727 1.869C301.487 2.12278 301.866 2.37656 301.866 3.45512V24.9629C301.866 25.9781 301.423 26.5491 300.283 26.5491C298.89 26.5491 298.7 26.1049 298.194 23.8209L293.255 0.790429H291.735L287.05 23.123C286.48 25.5974 286.226 26.1684 285.213 26.4856L284.58 26.6759V27.3738H290.089V26.6759L289.266 26.5491C288.126 26.2953 287.809 25.7243 288.379 22.8058L291.165 8.53071L294.205 23.6306C294.648 25.8512 294.648 26.2318 293.002 26.5491L292.178 26.6759V27.3738H312.504V18.6184H311.744C311.364 22.6789 310.541 26.4856 307.312 26.4856H305.792L305.729 3.45512ZM293.761 20.268V19.2529H288.569L288.443 20.268H293.761ZM272.296 3.89923V22.2983C272.296 25.0898 272.296 26.3587 270.903 26.6125L270.206 26.7394V27.4373H275.842V26.7394C273.372 26.4222 273.372 25.5339 273.372 22.552V5.10468L272.423 4.2799L281.857 27.5007H283.44V6.1198C283.44 2.94756 283.44 2.24967 284.96 1.869L285.467 1.7421V1.04421H279.641V1.7421L280.274 1.869C282.237 2.18622 282.237 3.011 282.237 5.92947V19.3163L282.617 19.1894L275.462 1.04421H269.953V1.7421L270.46 1.869C271.346 1.99589 271.663 2.63034 272.296 3.89923ZM260.012 1.869H261.532C263.051 1.869 264.508 2.88412 264.508 7.89626C264.508 13.0353 263.431 13.4794 261.278 13.4794H260.012V1.869ZM234.431 13.9235C234.431 25.0264 233.481 26.6125 231.518 26.6125C229.492 26.6125 228.669 25.0264 228.669 13.987C228.669 3.32823 229.618 1.7421 231.518 1.7421C233.544 1.80555 234.431 3.32823 234.431 13.9235ZM238.61 14.1773C238.61 6.8177 236.267 0.72699 231.518 0.72699C226.706 0.72699 224.426 6.8177 224.426 14.1773C224.426 21.5369 226.769 27.6276 231.518 27.6276C236.394 27.6276 238.61 21.5369 238.61 14.1773ZM222.21 3.45512C222.21 2.37656 222.463 2.05933 223.223 1.869L224.046 1.61521V0.917326H216.131V1.61521L217.081 1.869C217.841 2.05933 218.284 2.31311 218.284 3.45512V21.9176C218.284 24.5188 218.031 26.5491 216.131 26.5491C214.928 26.5491 213.978 25.5974 214.042 24.8995C214.168 23.694 216.131 23.7575 216.321 21.8541C216.448 20.4584 215.561 19.8873 214.738 19.7605C213.535 19.6336 212.079 20.5852 212.079 22.6155C212.015 25.2167 213.725 27.5642 216.638 27.5642C219.804 27.5642 222.273 25.407 222.273 21.2831V3.45512H222.21ZM93.9869 3.45512C93.9869 2.37656 94.3035 2.05933 95.1266 1.869L96.1397 1.61521V0.917326H88.1614V1.61521L88.9846 1.869C89.7444 2.12278 90.1243 2.37656 90.1243 3.45512V24.9629C90.1243 25.9781 89.6811 26.5491 88.5413 26.5491C87.1483 26.5491 86.9583 26.1049 86.4518 23.8209L81.5128 0.790429H79.9931L75.3075 23.123C74.8009 25.5974 74.4843 26.1684 73.4712 26.4856L72.838 26.6759V27.3738H78.3468V26.6759L77.5237 26.5491C76.3839 26.2953 76.0673 25.7243 76.6372 22.8058L79.4233 8.46726L82.4626 23.6306C82.9059 25.8512 82.9059 26.2318 81.2595 26.5491L80.4364 26.6759V27.3738H100.825V18.6184H100.066C99.6857 22.6789 98.8625 26.4856 95.6332 26.4856H94.1135V3.45512H93.9869ZM200.871 1.869H201.694C204.1 1.869 204.86 5.67569 205.177 9.73616H205.937V0.980765H192.006V9.73616H192.766C193.019 5.67569 193.842 1.869 196.249 1.869H197.072V24.836C197.072 25.9146 196.755 26.2953 195.932 26.4856L194.919 26.7394V27.4373H203.214V26.7394L202.011 26.4856C201.251 26.2953 200.871 26.0415 200.871 24.8995V1.869ZM183.331 14.1139L184.534 14.1773C186.244 14.2407 186.751 14.8752 187.131 19.0626H187.89V8.34038H187.131C186.687 11.703 186.244 13.0987 184.598 13.1622L183.395 13.2256V1.869H186.054C189.03 1.869 189.663 5.61224 190.107 9.73616H190.866V0.980765H177.633V1.67866L178.456 1.93244C179.342 2.18622 179.596 2.69378 179.596 3.58201V24.8995C179.596 25.978 179.279 26.3587 178.456 26.5491L177.633 26.8028V27.5007H191.246V18.7453H190.36C189.917 22.7424 189.41 26.6125 185.928 26.6125H183.268V14.1139H183.331ZM168.831 14.1139L170.034 14.1773C171.744 14.2407 172.25 14.8752 172.63 19.0626H173.39V8.34038H172.63C172.187 11.703 171.744 13.0987 170.098 13.1622L168.894 13.2256V1.869H171.554C174.53 1.869 175.163 5.67569 175.606 9.73616H176.366V0.980765H162.752V1.67866L163.955 1.93244C164.842 2.18622 165.095 2.69378 165.095 3.58201V24.8995C165.095 25.978 164.779 26.3587 163.955 26.5491L163.132 26.8028V27.5007H176.746V18.7453H175.986C175.543 22.7424 175.036 26.6125 171.554 26.6125H168.831V14.1139ZM153.064 1.869H154.204C155.724 1.869 157.18 2.88412 157.18 7.89626C157.18 12.9084 156.104 13.4794 153.951 13.4794H153.064V1.869ZM147.302 27.4373H155.027V26.7394L154.204 26.5491C153.444 26.3587 153.064 25.9146 153.064 24.836V14.3676H154.457C155.597 14.3676 156.167 14.8117 156.23 16.9689L156.42 21.9176C156.547 26.3587 157.813 27.5642 159.966 27.5642C162.183 27.5642 162.752 26.0415 162.752 23.9478V23.0596H161.929V23.694C161.929 25.0898 161.739 26.1049 161.169 26.1049C160.663 26.1049 160.663 25.7243 160.536 23.9478L160.283 20.5852C159.966 15.9538 159.333 14.4945 156.04 13.8601C159.206 13.0353 161.169 10.6878 161.169 7.32525C161.169 3.011 157.75 0.917326 154.521 0.917326H147.302V1.61521L148.125 1.869C148.885 2.12278 149.265 2.37656 149.265 3.45512V24.836C149.265 25.9146 148.949 26.2953 148.125 26.4856L147.302 26.7394V27.4373ZM141.414 1.869H142.237C144.643 1.869 145.403 5.67569 145.719 9.73616H146.479V0.980765H132.549V9.73616H133.309C133.562 5.67569 134.385 1.869 136.791 1.869H137.614V24.836C137.614 25.9146 137.298 26.2953 136.475 26.4856L135.461 26.7394V27.4373H143.503V26.7394L142.49 26.4856C141.477 26.2318 141.35 25.4705 141.35 24.836V1.869H141.414ZM132.549 20.5218C132.549 12.6546 123.937 10.5609 123.937 4.85091C123.937 3.64545 124.38 1.80555 126.343 1.80555C129.129 1.80555 130.143 5.35846 130.586 9.73616H131.346V0.980765H130.839C130.649 1.80555 130.333 2.18622 129.826 2.18622C128.94 2.18622 128.496 0.790429 126.343 0.790429C123.051 0.790429 120.835 3.51857 120.835 7.07148C120.835 13.5429 129.446 16.271 129.446 22.2983C129.446 25.0264 128.18 26.5491 126.47 26.5491C123.874 26.5491 122.228 23.5037 121.721 18.6184H120.961V27.3738H121.404C121.784 26.1049 122.291 25.9781 122.734 25.9781C123.494 25.9781 124.254 27.5007 126.47 27.5007C129.953 27.5642 132.549 24.6457 132.549 20.5218ZM107.411 3.45512C107.411 2.37656 107.727 2.05933 108.55 1.869L109.564 1.61521V0.917326H101.585V1.61521L102.408 1.869C103.168 2.12278 103.548 2.37656 103.548 3.45512V24.836C103.548 25.9146 103.232 26.2953 102.408 26.4856L101.585 26.7394V27.4373H114.123V18.6819H113.363C112.983 22.7424 112.16 26.5491 108.93 26.5491H107.411V3.45512ZM82.0194 20.268V19.2529H76.8271L76.7005 20.268H82.0194ZM59.7941 27.5007H61.3771L64.923 8.59415H64.4164L68.3423 27.5007H69.7353L74.421 5.16813C74.9275 2.82067 75.1808 1.99589 76.1306 1.80555L76.8905 1.61521V0.917326H71.5083V1.61521L72.3314 1.7421C73.4712 1.99588 73.7245 2.69378 73.2179 5.48536L70.0519 20.5218H70.4951L67.4558 4.72402C67.1392 3.20134 66.9492 1.99588 68.2156 1.7421L69.0388 1.61521V0.917326H61.6303V1.61521L62.1369 1.7421C62.8967 1.93244 63.0234 2.37655 63.34 3.83579L64.5431 9.54583L64.2898 6.05636L61.6303 20.0777H61.9469L58.8443 4.72402C58.5277 3.1379 58.401 1.93244 59.6041 1.7421L60.174 1.61521V0.917326H52.6389V1.61521L53.3987 1.80555C54.0953 1.99589 54.4752 2.31311 54.9184 4.47023L59.7941 27.5007ZM39.3417 14.1139L40.5448 14.1773C42.2544 14.2407 42.761 14.8752 43.1409 19.0626H43.9007V8.34038H43.1409C42.6977 11.703 42.2544 13.0987 40.6081 13.1622L39.405 13.2256V1.869H42.0645C45.0405 1.869 45.6737 5.67569 46.1169 9.73616H46.8768V0.980765H33.4529V1.67866L34.2761 1.93244C35.1626 2.18622 35.4159 2.69378 35.4159 3.58201V24.8995C35.4159 25.978 35.0993 26.3587 34.2761 26.5491L33.4529 26.8028V27.5007H47.0667V18.7453H46.3069C45.8637 22.7424 45.3571 26.6125 41.8745 26.6125H39.2151L39.3417 14.1139ZM15.1535 27.4373H23.0051V26.7394L22.1187 26.5491C21.4221 26.4222 20.9789 25.9146 20.9789 24.836V14.3676H26.8043V24.836C26.8043 25.9146 26.3611 26.3587 25.6646 26.5491L24.7781 26.7394V27.4373H32.6298V26.7394L31.8066 26.4856C31.0468 26.2953 30.6669 25.8512 30.6669 24.7726V3.45512C30.6669 2.37656 30.9835 2.05933 31.8066 1.869L32.6298 1.61521V0.917326H24.7781V1.61521L25.6646 1.869C26.2978 2.05933 26.8043 2.31311 26.8043 3.45512V13.3525H20.9789V3.45512C20.9789 2.37656 21.4221 2.05933 22.1187 1.869L23.0051 1.61521V0.917326H15.1535V1.61521L15.9766 1.869C16.7365 2.12278 17.1164 2.37656 17.1164 3.45512V24.836C17.1164 25.9146 16.7998 26.2953 15.9766 26.4856L15.1535 26.7394V27.4373ZM9.32802 1.869H10.1512C12.5573 1.869 13.3172 5.67569 13.6338 9.73616H14.3303V0.980765H0.399902V9.73616H1.15974C1.41302 5.67569 2.23618 1.869 4.64234 1.869H5.4655V24.836C5.4655 25.9146 5.1489 26.2953 4.32574 26.4856L3.31262 26.7394V27.4373H11.6075V26.7394L10.4045 26.4856C9.64462 26.2953 9.2647 26.0415 9.2647 24.8995V1.869H9.32802Z" fill="#1C1C21"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </section>
            
        <?php  }
        }
    }
    ?>
    <div class="container">
        <?php 
            global $post;
            $post_id = get_the_ID();
            $category = get_the_category(); 
            if($category) {
                $first_category_name = $category[0]->cat_name;
                $category_link = get_category_link($category[0]->term_id);
                ?>
                <a href="<?php echo $category_link; ?>" title="<?php echo $first_category_name; ?>" class="tag"><?php echo $first_category_name; ?></a>
                <?php
            }
        ?>
        <h1 class="title"><?php echo get_the_title(); ?></h1>
        <?php
            $excerpt = '';
            if (has_excerpt()) {
                $excerpt = wp_strip_all_tags(get_the_excerpt());
                ?>
                    <div class="excerpt"><?php echo $excerpt; ?></div>
                <?php
            }
        ?>
        <div class="share">
            <div class="share-button">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                        <path d="M0.800145 15.9953C0.684966 15.9953 0.572346 15.9744 0.464846 15.9279C0.139784 15.7906 -0.0445024 15.4788 0.00924793 15.1577L0.0271647 15.06C0.249845 13.7455 0.835979 10.2554 2.57647 8.27312C6.04208 4.31777 11.348 3.85709 13.6004 3.85709V0.727711C13.6004 0.439203 13.7847 0.178615 14.0765 0.0622816C14.3657 -0.0540521 14.7036 -0.00519191 14.939 0.190249L23.7387 7.46111C23.9102 7.60303 24.0049 7.80545 23.9998 8.01718C23.9947 8.22891 23.8872 8.42668 23.708 8.56162L14.9083 15.1066C14.6677 15.2857 14.3375 15.3206 14.0586 15.202C13.7796 15.081 13.6004 14.825 13.6004 14.5458V10.9604C11.7729 10.879 9.97609 11.0954 8.2484 11.6026C4.92612 12.5775 2.69676 14.3946 1.40932 15.7487C1.25318 15.9116 1.0305 16 0.802705 16L0.800145 15.9953ZM13.6849 5.31359C11.842 5.31359 6.9072 5.66259 3.82552 9.18052C2.9348 10.1973 2.38706 11.7701 2.04408 13.1266C3.45951 12.0284 5.34589 10.9255 7.75441 10.2182C9.91978 9.58303 12.1824 9.362 14.4758 9.55744C14.8853 9.59234 15.2001 9.90644 15.2001 10.281V13.0102L21.9752 7.97065L15.2001 2.37267V4.60628C15.2001 4.8087 15.108 4.99948 14.9467 5.13676C14.7855 5.27403 14.573 5.34383 14.3478 5.3322C14.2428 5.32522 14.015 5.31591 13.69 5.31591L13.6849 5.31359Z" fill="#777777"/>
                    </svg>
                </div>
                <div class="text">Compartilhar</div>
                <div class="close">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.37824 9.27059L9.37725 9.26947C9.23982 9.11385 9.23982 8.88484 9.37726 8.72922L9.37824 8.7281L15.166 2.09466C15.166 2.09466 15.166 2.09465 15.166 2.09465C15.4625 1.75485 15.42 1.24323 15.0796 0.947874L15.0797 0.947833L15.0756 0.944476C14.7328 0.659402 14.2188 0.698365 13.918 1.02876L13.9179 1.02872L13.9144 1.03282L8.05884 7.75191L2.20332 1.03282L2.20321 1.0327C1.9113 0.69818 1.39431 0.649977 1.04175 0.944719C0.697668 1.23112 0.645398 1.74553 0.951883 2.09493C0.951974 2.09503 0.952065 2.09513 0.952156 2.09524L6.73939 8.7281L6.73939 8.7281L6.74038 8.72922C6.87781 8.88484 6.87781 9.11385 6.74037 9.26947L6.73939 9.27059L0.951651 15.904C0.951648 15.904 0.951645 15.904 0.951641 15.904C0.655113 16.2439 0.697694 16.7555 1.03804 17.0508L1.03796 17.0509L1.04412 17.0559C1.18944 17.1741 1.37654 17.25 1.57303 17.25C1.80018 17.25 2.03729 17.1529 2.2018 16.9676L2.2018 16.9676L2.20332 16.9659L8.05884 10.2468L13.9144 16.9659L13.9143 16.9659L13.9159 16.9676C14.0791 17.1514 14.3067 17.25 14.5446 17.25C14.7301 17.25 14.9227 17.1897 15.0791 17.0513C15.4203 16.7645 15.4713 16.2523 15.1659 15.904C15.1658 15.9038 15.1656 15.9036 15.1655 15.9035L9.37824 9.27059Z" fill="#777777" stroke="#777777" stroke-width="0.5"/>
                    </svg>
                </div>
            </div>
            <div class="share-options">
                <div class="option-list">
                    <!-- Copiar link -->
                    <a href="<?php echo get_the_permalink() ?>" title="Copiar link" id="copy-link-button" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                <path d="M7.99002 13.7426L5.74563 15.9869C4.84788 16.8847 3.41147 16.8847 2.51371 15.9869C2.06484 15.6278 1.79551 14.9994 1.79551 14.371C1.79551 13.7426 2.06484 13.2039 2.42394 12.755L6.19451 8.98445C7.09227 8.0867 8.52867 8.0867 9.42643 8.98445C9.78553 9.34355 10.3242 9.34355 10.6833 8.98445C11.0424 8.62535 11.0424 8.0867 10.6833 7.72759C9.06733 6.11164 6.46384 6.11164 4.93765 7.72759L1.16708 11.4982C0.359102 12.3061 0 13.2937 0 14.371C0 15.4483 0.448878 16.5256 1.16708 17.2438C1.97506 18.1416 3.05237 18.5007 4.12967 18.5007C5.20698 18.5007 6.19451 18.1416 7.00249 17.3336L9.24688 15.0892C9.60598 14.7301 9.60598 14.1914 9.24688 13.8323C8.88778 13.4732 8.34912 13.3835 7.99002 13.7426Z" fill="#777777"/>
                                <path d="M16.7885 1.71197C15.1725 0.0960101 12.569 0.0960101 11.0428 1.71197L8.79844 3.95636C8.43934 4.31546 8.43934 4.85411 8.79844 5.21321C9.15754 5.57232 9.69619 5.57232 10.0553 5.21321L12.2997 2.96883C13.1974 2.07107 14.6338 2.07107 15.5316 2.96883C15.8907 3.4177 16.16 4.04613 16.16 4.67456C16.16 5.30299 15.8907 5.84164 15.5316 6.29052L11.761 10.0611C10.8633 10.9588 9.42687 10.9588 8.52911 10.0611C8.17001 9.70199 7.63136 9.70199 7.27226 10.0611C6.91315 10.4202 6.91315 10.9588 7.27226 11.318C8.08024 12.1259 9.15754 12.485 10.1451 12.485C11.2224 12.485 12.2099 12.1259 13.0179 11.318L16.7885 7.54738C17.5964 6.7394 17.9555 5.75187 17.9555 4.67456C17.9555 3.50748 17.5067 2.51995 16.7885 1.71197Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">Copiar link</div>
                    </a>
                    <!-- E-mail -->
                    <a href="mailto:?subject=<?php the_title(); ?>;body=<?php echo get_the_permalink() ?>" title="E-mail" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="19" viewBox="0 0 22 19" fill="none">
                                <path d="M0 0.987389V18.0085C0 18.3085 0.224949 18.5334 0.524881 18.4959H0.899796C7.01091 18.196 16.0464 18.196 21.0702 18.4959H21.4451C21.7451 18.4959 21.97 18.3085 21.97 18.0085V0.987389C21.97 0.724949 21.7451 0.5 21.4826 0.5H0.487389C0.224949 0.5 0 0.724949 0 0.987389ZM15.259 8.8606L19.3831 4.4741C19.683 4.13667 20.2454 4.36162 20.2454 4.81152V13.9969C20.2454 14.4468 19.683 14.6718 19.3831 14.3344L15.259 9.53545C15.1091 9.34799 15.1091 9.04806 15.259 8.8606ZM6.74847 9.49796L2.6244 14.2969C2.32447 14.6343 1.7621 14.4468 1.7621 13.9594V4.81152C1.7621 4.36162 2.32447 4.13667 2.6244 4.4741L6.74847 8.8606C6.93592 9.04806 6.93592 9.34799 6.74847 9.53545V9.49796ZM4.01159 2.22461H17.9584C18.4083 2.22461 18.6333 2.74949 18.3333 3.04942L12.8221 8.89809C12.3347 9.42297 11.6599 9.7229 10.985 9.7229C10.3102 9.7229 9.63531 9.42297 9.14792 8.89809L3.63667 3.04942C3.33674 2.712 3.56169 2.22461 4.01159 2.22461ZM3.5242 15.8715C4.76142 14.4093 7.23586 11.5975 7.98569 10.6977C8.73551 9.79789 8.32311 10.5102 8.47307 10.6227C9.18541 11.1476 10.0477 11.4475 10.9475 11.4475C11.8473 11.4475 12.6346 11.1851 13.347 10.6977C14.0593 10.2103 13.8344 10.5852 14.0218 10.7727L18.4083 15.834C18.7082 16.1714 18.4458 16.6588 18.0334 16.6588C13.8718 16.5464 8.47307 16.5464 3.93661 16.6588C3.48671 16.6588 3.26176 16.1714 3.56169 15.834L3.5242 15.8715Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">E-mail</div>
                    </a>
                    <!-- Imprimir -->
                    <div onClick="window.print()" id="print-button" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                <path d="M16.1825 20.5H4.35366C3.9224 20.5 3.57329 20.1509 3.57329 19.7196V17.0089H0.780373C0.349114 17.0089 0 16.6597 0 16.2285V4.78986C0 4.35861 0.349114 4.00949 0.780373 4.00949H3.55275V1.27819C3.55275 0.846928 3.84026 0.5 4.29205 0.5H16.1414C16.5727 0.5 16.9834 0.846928 16.9834 1.27819V3.98896H19.7558C20.187 3.98896 20.5361 4.33807 20.5361 4.76933V16.1874C20.5361 16.6187 20.187 16.9678 19.7558 16.9678H16.9834V19.6786C16.9834 20.1509 16.6137 20.5 16.1825 20.5ZM5.13403 18.9393H15.4021V12.8811H5.13403V18.9393ZM16.9834 15.4276H18.9548V5.59077H16.2441C16.2235 5.59077 16.203 5.59077 16.1825 5.59077H4.35366C4.33312 5.59077 4.31259 5.59077 4.29205 5.59077H1.58128V15.4276H3.55275V12.1007C3.55275 11.6695 3.90186 11.3204 4.33312 11.3204H16.1619C16.5932 11.3204 16.9423 11.6695 16.9423 12.1007L16.9834 15.4276ZM5.13403 4.00949H15.4021V2.0791H5.13403V4.00949ZM16.1825 9.06138H14.478C14.0467 9.06138 13.6976 8.71226 13.6976 8.28101C13.6976 7.84975 14.0467 7.50063 14.478 7.50063H16.1825C16.6137 7.50063 16.9628 7.84975 16.9628 8.28101C16.9628 8.71226 16.6343 9.06138 16.1825 9.06138Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">Imprimir</div>
                    </div>
                    <!-- Whatsapp -->
                    <a href="https://wa.me/?text=<?php the_title(); ?> <?php echo str_replace('%postname%', get_post_field('post_name', $post_id), get_the_permalink()); ?>" aria-label="Compartilhar este post no WhatsApp" data-action="share/whatsapp/share" target="_blank" title="Compartilhar este post no WhatsApp" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" viewBox="0 0 24 19" fill="none">
                                <path d="M12.3314 0.5H12.3267C7.18292 0.5 3 4.5365 3 9.5C3 11.4688 3.6577 13.2935 4.77602 14.7751L3.61339 18.1186L7.19925 17.0128C8.67441 17.9555 10.4341 18.5 12.3314 18.5C17.4752 18.5 21.6581 14.4624 21.6581 9.5C21.6581 4.53763 17.4752 0.5 12.3314 0.5ZM17.7598 13.2091C17.5347 13.8223 16.6414 14.3307 15.9289 14.4792C15.4415 14.5794 14.8048 14.6593 12.6614 13.802C9.91984 12.7063 8.15431 10.0186 8.01671 9.84425C7.88494 9.66988 6.90888 8.42112 6.90888 7.12963C6.90888 5.83813 7.58874 5.20925 7.86278 4.93925C8.08784 4.71763 8.45984 4.61637 8.81668 4.61637C8.93212 4.61637 9.03591 4.622 9.1292 4.6265C9.40324 4.63775 9.54085 4.6535 9.7216 5.07088C9.94666 5.594 10.4947 6.8855 10.56 7.01825C10.6265 7.151 10.693 7.331 10.5997 7.50538C10.5122 7.68538 10.4353 7.76525 10.2977 7.91825C10.1601 8.07125 10.0295 8.18825 9.89185 8.3525C9.76591 8.49538 9.62364 8.64838 9.78224 8.91275C9.94083 9.1715 10.4889 10.0344 11.2959 10.7274C12.3372 11.6217 13.1815 11.9075 13.4835 12.029C13.7086 12.119 13.9768 12.0976 14.1412 11.9289C14.35 11.7118 14.6077 11.3518 14.8701 10.9974C15.0567 10.7431 15.2922 10.7116 15.5394 10.8016C15.7913 10.886 17.1242 11.5216 17.3983 11.6532C17.6723 11.786 17.853 11.849 17.9195 11.9604C17.9848 12.0718 17.9848 12.5949 17.7598 13.2091Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">Whatsapp</div>
                    </a>
                    <!-- Telegram -->
                    <div onclick="window.open('https://t.me/share/url?url=<?php echo str_replace('%postname%', get_post_field('post_name', $post->ID), get_the_permalink()); ?>', 'telegramShare', 'width=626,height=436'); return false;" title="Compartilhar este post no Telegram" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" viewBox="0 0 24 19" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9872 18.3013C18.2847 18.5065 18.6682 18.5578 19.0101 18.4318C19.352 18.3049 19.6033 18.0205 19.6791 17.6758C20.482 14.0001 22.4298 4.69684 23.1607 1.35333C23.2161 1.10133 23.1237 0.839434 22.9205 0.671134C22.7172 0.502833 22.4354 0.454233 22.184 0.545133C18.3097 1.94194 6.37806 6.30244 1.50118 8.06014C1.19164 8.17174 0.990204 8.46154 1.00037 8.77924C1.01146 9.09784 1.23137 9.37414 1.5483 9.46684C3.73541 10.104 6.60628 10.9905 6.60628 10.9905C6.60628 10.9905 7.94793 14.9371 8.6474 16.9441C8.73518 17.1961 8.93754 17.3941 9.20457 17.4625C9.47069 17.53 9.75528 17.4589 9.95394 17.2762C11.0775 16.243 12.8146 14.6454 12.8146 14.6454C12.8146 14.6454 16.1152 17.0026 17.9872 18.3013ZM7.81395 10.4919L9.36535 15.4762L9.71 12.3198C9.71 12.3198 15.704 7.05394 19.121 4.05244C19.2207 3.96424 19.2346 3.81664 19.1514 3.71314C19.0692 3.60964 18.9177 3.58534 18.804 3.65554C14.8438 6.11884 7.81395 10.4919 7.81395 10.4919Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">Telegram</div>
                    </div>
                    <!-- LinkedIn -->
                    <div onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo str_replace('%postname%', get_post_field('post_name', $post->ID), get_the_permalink()); ?>&title=<?php the_title(); ?>', 'linkedinShare', 'width=626,height=436'); return false;" title="Compartilhar este post no LinkedIn" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" viewBox="0 0 24 19" fill="none">
                                <path d="M3.29777 6.47015H7.03474V18.5H3.29777V6.47015ZM5.15881 0.5C6.34988 0.5 7.31762 1.47015 7.31762 2.66418C7.31762 3.85821 6.34988 4.82836 5.15881 4.82836C3.96774 4.82836 3 3.85821 3 2.66418C3 1.47015 3.96774 0.5 5.15881 0.5Z" fill="#777777"/>
                                <path d="M9.37207 6.47038H12.9453V8.11217H12.9899C13.4961 7.17187 14.7021 6.17188 16.5185 6.17188C20.3001 6.17188 20.985 8.66441 20.985 11.9032V18.5002H17.2629V12.6495C17.2629 11.2465 17.2331 9.45546 15.3274 9.45546C13.4217 9.45546 13.0942 10.9778 13.0942 12.545V18.5002H9.37207V6.47038Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">LinkedIn</div>
                    </div>
                    <!-- Facebook -->
                    <div onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo str_replace('%postname%', get_post_field('post_name', $post->ID), get_the_permalink()); ?>&t=<?php the_title_attribute(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="Compartilhar este post no Facebook" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" viewBox="0 0 24 19" fill="none">
                                <path d="M16.7077 0.503745L14.2881 0.5C11.5699 0.5 9.81319 2.23871 9.81319 4.92982V6.97227H7.38045C7.17023 6.97227 7 7.13668 7 7.33949V10.2988C7 10.5016 7.17043 10.6658 7.38045 10.6658H9.81319V18.133C9.81319 18.3358 9.98342 18.5 10.1936 18.5H13.3677C13.5779 18.5 13.7481 18.3356 13.7481 18.133V10.6658H16.5926C16.8028 10.6658 16.973 10.5016 16.973 10.2988L16.9742 7.33949C16.9742 7.24211 16.934 7.14886 16.8628 7.07994C16.7915 7.01103 16.6945 6.97227 16.5935 6.97227H13.7481V5.24086C13.7481 4.40868 13.9537 3.98622 15.0774 3.98622L16.7073 3.98566C16.9173 3.98566 17.0875 3.82124 17.0875 3.61863V0.870775C17.0875 0.668347 16.9175 0.50412 16.7077 0.503745Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">Facebook</div>
                    </div>
                    <!-- X -->
                    <div onclick="window.open('https://x.com/share?text=<?php the_title_attribute(); ?> <?php echo str_replace('%postname%', get_post_field('post_name', $post->ID), get_the_permalink()); ?>', 'xShare', 'width=626,height=436'); return false;" title="Compartilhar este post no X" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" viewBox="0 0 24 19" fill="none">
                                <path d="M13.4784 8.12066L20.0398 0.5H18.4852L12.7925 7.11473L8.24301 0.5H3L9.87384 10.5059L3 18.5H4.55461L10.5673 11.5119L15.3683 18.5H20.6113L13.4784 8.12066ZM11.3522 10.5974L10.6588 9.59907L5.11092 1.66596H7.49619L11.9695 8.06732L12.663 9.06562L18.4776 17.3798H16.0923L11.3446 10.5898L11.3522 10.5974Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">X</div>
                    </div>
                    <!-- Threads -->
                    <div onclick="window.open('https://www.threads.net/intent/post?url=<?php echo urlencode(get_the_permalink()); ?>&text=<?php echo urlencode(get_the_permalink()); ?>', 'threadsShare', 'width=626,height=436'); return false;" title="Compartilhar este post no Threads" class="option-item">
                        <div class="option-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" viewBox="0 0 24 19" fill="none">
                                <path d="M15.8053 8.73551C15.8906 8.76832 15.9628 8.80769 16.0416 8.8405C17.1374 9.37204 17.938 10.1595 18.358 11.1438C18.9486 12.5153 19.0011 14.7333 17.2227 16.5117C15.8644 17.87 14.2107 18.4803 11.8746 18.5H11.8615C9.23004 18.4803 7.2089 17.5944 5.85053 15.8686C4.64309 14.3265 4.01969 12.1872 4 9.50984V9.49672C4.01969 6.80623 4.64309 4.66697 5.85053 3.13143C7.21546 1.40558 9.2366 0.519686 11.868 0.5H11.8812C14.5191 0.519686 16.5665 1.39902 17.9643 3.1183C18.6533 3.97138 19.1651 4.99508 19.4867 6.18283L17.9708 6.58968C17.7018 5.62505 17.3015 4.79821 16.7634 4.13544C15.6675 2.79019 14.027 2.10117 11.868 2.08804C9.72876 2.10773 8.11447 2.79019 7.06453 4.12887C6.0802 5.37568 5.57492 7.18684 5.55523 9.49672C5.57492 11.8066 6.08677 13.6178 7.06453 14.8711C8.11447 16.2032 9.73533 16.8923 11.868 16.912C13.7973 16.8988 15.0704 16.4395 16.1334 15.3764C17.3474 14.169 17.3212 12.6859 16.934 11.7803C16.7043 11.2488 16.2909 10.8026 15.7397 10.4745C15.6019 11.4851 15.3 12.2856 14.8144 12.9025C14.1713 13.7227 13.2592 14.1624 12.0911 14.228C11.2052 14.274 10.3587 14.064 9.69595 13.6309C8.91506 13.1125 8.45571 12.325 8.40977 11.4063C8.3179 9.59515 9.74845 8.29584 11.9796 8.1646C12.7736 8.11867 13.5151 8.15148 14.1976 8.2696C14.1057 7.71181 13.922 7.27215 13.6529 6.9506C13.2789 6.51094 12.6949 6.28782 11.9205 6.28126H11.8943C11.2709 6.28126 10.4309 6.45188 9.89938 7.26558L8.60663 6.37969C9.32847 5.29038 10.49 4.68666 11.9008 4.68666H11.9336C14.2829 4.69978 15.6806 6.1697 15.8184 8.72238H15.8119V8.72895L15.8053 8.73551ZM9.95844 11.3144C10.0044 12.2528 11.0215 12.6925 12.0058 12.64C12.9639 12.5875 14.0532 12.2135 14.237 9.89701C13.7448 9.78545 13.1936 9.73296 12.6096 9.73296C12.4324 9.73296 12.2486 9.73296 12.0715 9.74608C10.4637 9.83795 9.92563 10.6188 9.965 11.3144H9.95844Z" fill="#777777"/>
                            </svg>
                        </div>
                        <div class="option-name">Threads</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>