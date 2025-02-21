        <?php
            global $post;
            $post_id = get_the_ID();
        ?>
        <footer class="investnews-amp-footer">
            <div class="container">
                <?php
                    $term_footer_menu = get_term_by('name', 'Menu Footer', 'nav_menu');
                    $footer_menu_id = $term_footer_menu->term_id;
                ?>

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
        
        <amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-WGWPT6C;TagManager.url=<?php echo get_the_permalink($post_id) ?>" data-credentials="include">
        <script type="application/json ">
            {
                "vars": {
                    "account": "GTM-WGWPT6C"
                },
                "triggers": {
                    "default pageview": {
                    "on": "visible",
                    "request": "pageview",
                    "vars": {
                        "title": "<?php echo get_the_title($post_id) ?>"
                        }
                    }
                }
            }
        </script>
        </amp-analytics>

        <?php wp_footer(); ?>
    </body>
</html>