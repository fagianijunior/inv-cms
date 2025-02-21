        <footer>
            <div class="container">
                <?php
                    $term_footer_menu = get_term_by('name', 'Menu Footer', 'nav_menu');
                    $footer_menu_id = $term_footer_menu->term_id;
                ?>
                <div class="top">
                    <div class="side-links">
                        <a href="" class="logo-link" title="InvestNews">
                            <?php
                                $logo_footer = get_field('logo_footer', 'nav_menu_' . $footer_menu_id); 
                                if($logo_footer) {
                                    echo wp_get_attachment_image( $logo_footer['ID'], 'full', "", array( "class" => "logo" ) );
                                }
                            ?>
                        </a>
                        <?php 
                            if(have_rows('social_networks_footer', 'nav_menu_' . $footer_menu_id)) {
                                ?>
                                    <div class="social-networks">
                                        <?php
                                            while(have_rows('social_networks_footer', 'nav_menu_' . $footer_menu_id)) {
                                                the_row();
                                                $social_network_link = get_sub_field('social_network_link');
                                                
                                                $social_network_logo = get_sub_field('social_network_logo');
                                                $social_network_logo_title = $social_network_logo['title'];
                                                ?>
                                                    <a href="<?php echo $social_network_link; ?>" title="<?php echo $social_network_logo_title; ?>" class="item">
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
                    <?php
                        wp_nav_menu(array( 
                            'menu_class'     => 'footer-menu',
                            'theme_location' => 'footer-menu' ),
                        ); 
                    ?>
                </div>
                <div class="bottom">
                    <?php
                        $legal_text_footer = get_field('legal_text_footer', 'nav_menu_' . $footer_menu_id); 
                        if($legal_text_footer) {
                            ?>
                                <div class="text">
                                    <?php echo $legal_text_footer; ?>
                                </div>
                            <?php
                        }   
                    ?>
                    <p class="rights-text">© <?php echo date("Y"); ?> InvestNews. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>