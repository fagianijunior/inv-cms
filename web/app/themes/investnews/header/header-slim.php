<header id="header-investnews" class="slim">
    <?php
        $header_menu = get_term_by('name', 'Menu Header', 'nav_menu');
        if($header_menu) {
            $header_menu_id = $header_menu->term_id;
            $logo_header = get_field('logo_header', 'nav_menu_' . $header_menu_id);
            $logo_header_title = $logo_header["title"];

            $btn_header = get_field('btn_header', 'nav_menu_' . $header_menu_id);
            $btn_header_mobile_img = get_field('btn_header_mobile_img', 'nav_menu_' . $header_menu_id);
        }
    ?>
    <div class="container">
        <div class="top">
            <div class="side-menu-button short">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <?php if(is_singular('patrocinados') || is_archive('patrocinados')){ ?>
                <?php if( $logo_header ) { ?>
                    <a href="<?php echo get_home_url(); ?>" title="<?php echo $logo_header_title; ?>" class="logo">
                        <?php echo wp_get_attachment_image( $logo_header['ID'], array('316', '56'), "", array( "class" => "logo-img" ) ); ?>
                    </a>
                    <span class="brand-content-top">
                    Conteúdo de marca
                    </span>
                <?php } ?>
            <?php } else { ?>
                <?php if( $logo_header ) { ?>
                    <?php if(is_front_page()) { ?>
                        <h1 class="home-h1">
                            <a href="<?php echo get_home_url(); ?>" title="<?php echo $logo_header_title; ?>" class="logo">
                                <?php echo wp_get_attachment_image( $logo_header['ID'], array('316', '56'), "", array( "class" => "logo-img home-logo-img" ) ); ?>
                            </a>
                        </h1>
                    <?php } else { ?>
                        <a href="<?php echo get_home_url(); ?>" title="<?php echo $logo_header_title; ?>" class="logo">
                            <?php echo wp_get_attachment_image( $logo_header['ID'], array('316', '56'), "", array( "class" => "logo-img" ) ); ?>
                        </a>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <?php if( $btn_header ) { ?>
            <?php
                $btn_header_url = $btn_header['url'];
                $btn_header_title = $btn_header['title'];
                $btn_header_target = $btn_header['target'] ? $btn_header['target'] : '_self';
            ?>
                <a class="logo-button" href="<?php echo esc_url( $btn_header_url ); ?>" title="<?php echo $btn_header_title; ?>" target="<?php echo esc_attr( $btn_header_target ); ?>">
                    <span class="button-text">
                        <?php echo esc_html( $btn_header_title ); ?>
                    </span>
                    <?php if($btn_header_mobile_img) { ?>
                        <?php echo wp_get_attachment_image( $btn_header_mobile_img['ID'], array('22', '22'), "", array( "class" => "btn-mobile-img" ) ); ?>
                    <?php } ?>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="side-menu-area">
        <div class="container">
            <div class="side-menu">
                <div class="container side-menu-container">
                    <div class="side-menu-side">
                        <div class="search">
                            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" id="search-form" class="search-form">
                                <div class="content">
                                    <label class="screen-reader-text" for="s">Busca</label>
                                    <input type="text" id="search-input" placeholder="Busca"  value="<?php echo get_search_query(); ?>" name="s" id="s" />
                                    <input type="hidden" name="post_type[]" value="post" />
                                    <input type="hidden" name="post_type[]" value="patrocinados" />
                                    <input type="hidden" name="post_type[]" value="guias" />
                                    <button type="submit" id="search-submit" value="Search">
                                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.9417 19.8486L11.919 12.7746C11.6333 12.4403 11.6476 11.946 11.9447 11.6203C13.059 10.3975 13.7018 8.7404 13.5847 6.93474C13.3761 3.69485 10.7019 1.11207 7.45918 1.00351C3.72216 0.880652 0.670827 4.00341 0.905105 7.76043C1.1051 10.9318 3.66502 13.4917 6.83634 13.6917C7.84774 13.7545 8.81342 13.5802 9.67911 13.2174C10.022 13.0745 10.4191 13.1774 10.6619 13.4602L16.8732 20.7543C17.0132 20.9171 17.2074 21 17.4074 21C17.5674 21 17.7303 20.9457 17.8617 20.8343C18.156 20.5829 18.1903 20.1429 17.9417 19.8486ZM2.29363 7.35473C2.29363 4.62339 4.51642 2.40346 7.2449 2.40346C9.97338 2.40346 12.1962 4.62625 12.1962 7.35473C12.1962 10.0832 9.97338 12.306 7.2449 12.306C4.51642 12.306 2.29363 10.0832 2.29363 7.35473Z" fill="#777777" stroke="#777777"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <?php 
                            $header_side_menu = get_term_by('name', 'Menu Lateral', 'nav_menu');
                            $header_side_menu_id = $header_side_menu->term_id;
                        ?>
                        <?php if( have_rows('menu_secundario', 'nav_menu_' . $header_side_menu_id)) { ?> 
                            <ul class="side-menu-side-list">
                                <?php while(have_rows('menu_secundario', 'nav_menu_' . $header_side_menu_id)) { the_row(); ?>
                                    <?php $menu_item = get_sub_field('menu_item'); ?>
                                    <?php
                                        if( $menu_item ) {
                                            $menu_item_url = $menu_item['url'];
                                            $menu_item_title = $menu_item['title'];
                                            $menu_item_target = $menu_item['target'] ? $menu_item['target'] : '_self';
                                            ?>
                                            <li class="item">
                                                <a class="item-link" href="<?php echo esc_url( $menu_item_url ); ?>" title="<?php echo $menu_item_title; ?>" target="<?php echo esc_attr( $menu_item_target ); ?>"><?php echo esc_html( $menu_item_title ); ?></a>
                                            </li>
                                        <?php } ?>								
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                    <div class="menu-content">
                        <?php
                            if ( has_nav_menu( 'side-menu-header' ) ) {
                                wp_nav_menu(array( 
                                    'container_class' => 'side-menu-header-container',
                                    'menu_id'         => 'side-menu-header',
                                    'menu_class'      => 'side-menu-header',
                                    // 'walker'          => new inv_sub_menu_container,
                                    'theme_location'  => 'side-menu-header' ),
                                ); 
                            }
                        ?>
                    </div>
                </div>
                <div class="container side-menu-mobile-container">
                    <div class="side-menu-side">
                        <div class="search">
                            <form role="search" method="get" id="search-form-mobile" class="search-form">
                                <div class="content">
                                    <label class="screen-reader-text" for="s">Busca</label>
                                    <input type="text" id="search-input-mobile" placeholder="Busca" value="" name="s" id="s" />
                                    
                                    <button type="submit" id="search-submit-mobile" value="Search">
                                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.9417 19.8486L11.919 12.7746C11.6333 12.4403 11.6476 11.946 11.9447 11.6203C13.059 10.3975 13.7018 8.7404 13.5847 6.93474C13.3761 3.69485 10.7019 1.11207 7.45918 1.00351C3.72216 0.880652 0.670827 4.00341 0.905105 7.76043C1.1051 10.9318 3.66502 13.4917 6.83634 13.6917C7.84774 13.7545 8.81342 13.5802 9.67911 13.2174C10.022 13.0745 10.4191 13.1774 10.6619 13.4602L16.8732 20.7543C17.0132 20.9171 17.2074 21 17.4074 21C17.5674 21 17.7303 20.9457 17.8617 20.8343C18.156 20.5829 18.1903 20.1429 17.9417 19.8486ZM2.29363 7.35473C2.29363 4.62339 4.51642 2.40346 7.2449 2.40346C9.97338 2.40346 12.1962 4.62625 12.1962 7.35473C12.1962 10.0832 9.97338 12.306 7.2449 12.306C4.51642 12.306 2.29363 10.0832 2.29363 7.35473Z" fill="#777777" stroke="#777777"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="menu-content">
                        <?php
                            if ( has_nav_menu( 'side-menu-header-mobile' ) ) {
                                wp_nav_menu(array( 
                                    'container_class' => 'side-menu-header-mobile-container',
                                    'menu_id'         => 'side-menu-header-mobile',
                                    'menu_class'      => 'side-menu-header-mobile',
                                    // 'walker'          => new inv_sub_menu_container,
                                    'theme_location'  => 'side-menu-header-mobile' ),
                                ); 
                            }
                        ?>
                    </div>
                    <?php
                        $header_side_menu_mobile = get_term_by('name', 'Menu Lateral Mobile', 'nav_menu');
                        $header_side_menu_mobile_id = $header_side_menu_mobile->term_id;
                    ?>
                    <?php if( have_rows('menu_secundario', 'nav_menu_' . $header_side_menu_mobile_id)) { ?> 
                        <ul class="side-menu-side-list">
                            <?php while(have_rows('menu_secundario', 'nav_menu_' . $header_side_menu_mobile_id)) { the_row(); ?>
                                <?php $menu_item = get_sub_field('menu_item'); ?>
                                <?php
                                    if( $menu_item ) {
                                        $menu_item_url = $menu_item['url'];
                                        $menu_item_title = $menu_item['title'];
                                        $menu_item_target = $menu_item['target'] ? $menu_item['target'] : '_self';
                                        ?>
                                        <li class="item">
                                            <a class="item-link" href="<?php echo esc_url( $menu_item_url ); ?>" title="<?php echo $menu_item_title; ?>" target="<?php echo esc_attr( $menu_item_target ); ?>"><?php echo esc_html( $menu_item_title ); ?></a>
                                        </li>
                                    <?php } ?>								
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <?php 
                        if(have_rows('social_networks_sidebar', 'nav_menu_' . $header_side_menu_mobile_id)) {
                            ?>
                                <div class="social-networks">
                                    <?php
                                        while(have_rows('social_networks_sidebar', 'nav_menu_' . $header_side_menu_mobile_id)) {
                                            the_row();
                                                $social_network_link = get_sub_field('social_network_link');
                                                $social_network_link_url = $social_network_link['url'];
                                                $social_network_link_title = $social_network_link['title'];
                                                $social_network_link_target = $social_network_link['target'] ? $social_network_link['target'] : '_self';

                                                $social_network_logo = get_sub_field('social_network_logo');
                                            ?>
                                                <a class="item-link" href="<?php echo esc_url( $social_network_link_url ); ?>" title="<?php echo $social_network_link_title; ?>" target="<?php echo esc_attr( $social_network_link_target ); ?>">
                                                    <?php echo wp_get_attachment_image( $social_network_logo['ID'], 'full' ); ?>
                                                </a>
                                            <?php
                                        }
                                    ?>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>