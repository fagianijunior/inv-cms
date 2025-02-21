<?php

$theme = wp_get_theme();
// define('THEME_VERSION', $theme->Version);
define('THEME_VERSION', microtime());

/*
 * Register CSS
 * Registers the CSS files in the theme.
 */

function register_styles() {
    // wp_enqueue_style('font-crimson-pro', get_template_directory_uri() . '/assets/fonts/CrimsonPro/stylesheet.css', array(), THEME_VERSION);
    // wp_enqueue_style('font-crimson-text', get_template_directory_uri() . '/assets/fonts/CrimsonText/stylesheet.css', array(), THEME_VERSION);

    $styles = [];
    
    $styles['reset'] = get_template_directory_uri() . '/assets/css/reset.css';
    $styles['global-style'] = get_template_directory_uri() . '/assets/css/global.css';
    $styles['newsletter-style'] = get_template_directory_uri() . '/assets/css/newsletter.css';
      

    foreach ($styles as $handle => $url) {
        wp_enqueue_style($handle, $url, array(), THEME_VERSION);
    }

    if (!empty($styles)) {
        add_action('wp_head', function () use ($styles) {
            foreach ($styles as $url) {
                echo '<link rel="preload" href="' . esc_url($url) . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
                echo '<link rel="prefetch" href="' . esc_url($url) . '">';
            }
        });
    }
    

    
    if (is_page('home')) {
        wp_enqueue_style('page-gine', get_template_directory_uri() . '/assets/css/home.css', array(), THEME_VERSION);
    }
    if (is_post_type_archive('perfis')) {
        wp_enqueue_style('swiper-css', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.css', array(), THEME_VERSION);
        wp_enqueue_style('perfis-style', get_template_directory_uri() . '/assets/css/perfis/archive.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
    }

    if (is_singular('perfis')) {
        wp_enqueue_style('perfis-single-style', get_template_directory_uri() . '/assets/css/perfis/single.css', array(), THEME_VERSION);
    }

    if(is_category()){
        wp_enqueue_style('category-style', get_template_directory_uri() . '/assets/css/category.css', array(), THEME_VERSION);
    }

    if(is_category('the-wall-street-journal')){
        wp_enqueue_style('category-wsj-style', get_template_directory_uri() . '/assets/css/category-the-wall-street-journal.css', array(), THEME_VERSION);
    }

    if(in_category('opiniao')){
        wp_enqueue_style('category-opinion-style', get_template_directory_uri() . '/assets/css/posts/opinion.css', array(), THEME_VERSION);
    }

    if(is_page_template('post-template-special.php')){
        wp_enqueue_style('post-special-style', get_template_directory_uri() . '/assets/css/posts/special.css', array(), THEME_VERSION);
    }

    if(is_tag()){
        wp_enqueue_style('tag-style', get_template_directory_uri() . '/assets/css/tag.css', array(), THEME_VERSION);
    }

    if(is_search()){
        wp_enqueue_style('tag-style', get_template_directory_uri() . '/assets/css/tag.css', array(), THEME_VERSION);
    }
  
    if (is_singular('criptomoedas')) {
        wp_enqueue_style('single-criptomoedas-css', get_template_directory_uri() . '/assets/css/posts/criptomoedas.css', array(), THEME_VERSION);
    }

    if (is_page_template('pages/criptomoedas/page-cotacao-criptomoedas.php')) {
        wp_enqueue_style('cotacao-criptomoedas-css', get_template_directory_uri() . '/assets/css/pages/cotacao-criptomoedas.css', array(), THEME_VERSION);
    }

    if (is_page_template('pages/infograficos/page-infograficos.php')) {
        wp_enqueue_style('page-infograficos', get_template_directory_uri() . '/assets/css/page-infograficos.css', array(), THEME_VERSION);
    }

    if(is_singular('infograficos')) {
        wp_enqueue_style('default-post-css', get_template_directory_uri() . '/assets/css/posts/infograficos.css', array(), THEME_VERSION);
    }

    if (is_page_template('pages/cotacoes.php')) {
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('cotacoes-css', get_template_directory_uri() . '/assets/css/pages/cotacoes.css', array(), THEME_VERSION);
    }

    if (is_page_template('pages/cambio.php')) {
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('cambio-css', get_template_directory_uri() . '/assets/css/pages/cambio.css', array(), THEME_VERSION);
    }

    if (is_singular('acoes') && !is_page_template('pages/cambio.php')) {
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('acoes-css', get_template_directory_uri() . '/assets/css/pages/acoes.css', array(), THEME_VERSION);
    }
    
    if (is_page_template('pages/guias/page-guias.php')) {
        wp_enqueue_style('page-guias-css', get_template_directory_uri() . '/assets/css/pages/guias.css', array(), THEME_VERSION);
    }

    if (is_singular('guias')) {
        wp_enqueue_style('page-guias-css', get_template_directory_uri() . '/assets/css/pages/guias.css', array(), THEME_VERSION);
    }

    // Singular post page
    if(is_singular( 'post' )) {
        wp_enqueue_style('default-post-css', get_template_directory_uri() . '/assets/css/posts/default.css', array(), THEME_VERSION);

        // Get Categories
        $categories = get_the_category();
        if (!empty($categories)) {
            foreach ($categories as $category) {
                if ($category->name === 'The Wall Street Journal') {
                    wp_enqueue_style('single-wsj-style', get_template_directory_uri() . '/assets/css/category-the-wall-street-journal.css', array(), THEME_VERSION);
                    break;
                }
            }
        }

        $tags = get_the_tags( get_the_ID()); 
        if ( $tags ) {
            foreach ( $tags as $tag ) {   
                $term = $tag->term_id;
                $editorial_sponsored_by = get_field('editorial_sponsored_by', 'post_tag_'.$term);
                if($editorial_sponsored_by) {
                    wp_enqueue_style('editorial-sponsored-by-style', get_stylesheet_directory_uri() . '/assets/css/posts/editorial-sponsored-by.css', array());
                }
            }        
        }
    
    }

    if (is_author()) {
        wp_enqueue_style('default-post-css', get_template_directory_uri() . '/assets/css/author/single.css', array(), THEME_VERSION);
    }

    if (is_post_type_archive('patrocinados')) {      
        wp_enqueue_style('patrocinados-style', get_template_directory_uri() . '/assets/css/patrocinados/archive.css', array(), THEME_VERSION);
    }
    if (is_singular('patrocinados')) {      
        wp_enqueue_style('patrocinados-single-style', get_template_directory_uri() . '/assets/css/patrocinados/single.css', array(), THEME_VERSION);
    }
    if (is_post_type_archive('web-story')) {
        wp_enqueue_style('web-story-style', get_template_directory_uri() . '/assets/css/web-story.css', array(), THEME_VERSION);
    }

    /**
     * Enqueue CSS for Calculators and Tools
     */
    if(is_page_template('pages/calculadoras/juros-compostos.php')) {
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('juros-compostos-css', get_template_directory_uri() . '/assets/css/calculadoras/juros-composto.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/calculadoras/juros-simples.php')) {
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('juros-simples-css', get_template_directory_uri() . '/assets/css/calculadoras/juros-simples.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/calculadoras/salario-liquido.php')) {
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('salario-liquido-css', get_template_directory_uri() . '/assets/css/calculadoras/salario-liquido.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/calculadoras/gastos-com-pet.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('gastos-com-pet-css', get_template_directory_uri() . '/assets/css/calculadoras/gastos-com-pet.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/calculadoras/inss.php')) {
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('inss-css', get_template_directory_uri() . '/assets/css/calculadoras/inss.css', array(), THEME_VERSION);
    }
    
    if(is_page_template('pages/calculadoras/irrf.php')) {
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('irrf-css', get_template_directory_uri() . '/assets/css/calculadoras/irrf.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/calculadoras/price.php')) {
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('price-css', get_template_directory_uri() . '/assets/css/calculadoras/price.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/calculadoras/decimo-terceiro.php')) {
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('decimo-terceiro-css', get_template_directory_uri() . '/assets/css/calculadoras/decimo-terceiro.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/comparadores/transportes.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
        wp_enqueue_style('comparadores-css', get_template_directory_uri() . '/assets/css/comparadores/comparadores.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/comparadores/fundos.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
        wp_enqueue_style('fundos', get_template_directory_uri() . '/assets/css/comparadores/fundos.css', array(), THEME_VERSION);
        wp_enqueue_style('comparadores-css', get_template_directory_uri() . '/assets/css/comparadores/comparadores.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/simuladores/aposentadoria.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('aposentadoria-css', get_template_directory_uri() . '/assets/css/simuladores/aposentadoria.css', array(), THEME_VERSION);
    }

    if(is_page_template('pages/simuladores/investimento.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('geral-calculadoras-css', get_template_directory_uri() . '/assets/css/calculadoras/geral-calculadoras.css', array(), THEME_VERSION);
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('investimento-css', get_template_directory_uri() . '/assets/css/simuladores/investimento.css', array(), THEME_VERSION);
    }
    if(is_page_template('pages/calculadoras/calculadoras.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('ferramentas-css', get_template_directory_uri() . '/assets/css/ferramentas.css', array(), THEME_VERSION);
    }
    if(is_page_template('pages/comparadores/comparadores.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('ferramentas-css', get_template_directory_uri() . '/assets/css/ferramentas.css', array(), THEME_VERSION);
    }
    if(is_page_template('pages/simuladores/simuladores.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('ferramentas-css', get_template_directory_uri() . '/assets/css/ferramentas.css', array(), THEME_VERSION);
    }
    if(is_page_template('pages/ferramentas.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('ferramentas-css', get_template_directory_uri() . '/assets/css/ferramentas.css', array(), THEME_VERSION);
    }
    if(is_page_template('pages/simuladores/copa.php')) {
        wp_enqueue_style('pre_hero', get_template_directory_uri() . '/assets/css/pre_hero.css', array(), THEME_VERSION);
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), THEME_VERSION);
        wp_enqueue_style('copa-calculadoras-css', get_template_directory_uri() . '/assets/css/simuladores/copa.css', array(), THEME_VERSION);
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
    }
    
    if(is_page_template('pages/ultimas.php')) {
        wp_enqueue_style('ultimas', get_template_directory_uri() . '/assets/css/pages/ultimas.css', array(), THEME_VERSION);
    }
    
    if(is_page_template('pages/newsletter.php')) {
        wp_enqueue_style('newsletter', get_template_directory_uri() . '/assets/css/pages/newsletter.css', array(), THEME_VERSION);
     }

    if(is_404()) {
        wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), THEME_VERSION);
        wp_enqueue_style('recent-posts-css', get_template_directory_uri() . '/assets/css/recent-posts.css', array(), THEME_VERSION);
        wp_enqueue_style('404', get_template_directory_uri() . '/assets/css/pages/404.css', array(), THEME_VERSION);  
    }
}

add_action('wp_enqueue_scripts', 'register_styles', 10);


/*
 * Register JS
 * Registers the JS files in the theme.
 */
function register_scripts() {
    
    wp_enqueue_script('global-script', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script('newsletter-script', get_template_directory_uri() . '/assets/js/newsletter.js', array('jquery'), THEME_VERSION, true);

    if (is_page_template('pages/calculadoras/decimo-terceiro.php')) {
        wp_enqueue_script('lity-js', get_template_directory_uri() . '/assets/js/calculadoras/decimo-terceiro.js', array('jquery'), '1', true);
    }

    if (is_post_type_archive('perfis')) {
        wp_enqueue_script('swiper-js', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.js', array('jquery'), THEME_VERSION, true);
        // wp_enqueue_script('perfis-js', get_template_directory_uri() . '/assets/js/perfis/archive.js', array('jquery'), THEME_VERSION, true);
    }

    if (is_singular('criptomoedas')) {
        wp_enqueue_script('single-criptomoedas-js', get_template_directory_uri() . '/assets/js/posts/criptomoedas.js', array(), THEME_VERSION, true);
    }

    if (is_singular('post') || is_singular('patrocinados')) {
        wp_enqueue_script('default-script', get_template_directory_uri() . '/assets/js/posts/default.js', array(), THEME_VERSION, true);
    }
    

    if (is_singular('infograficos')) {
        wp_enqueue_script('default-script', get_template_directory_uri() . '/assets/js/posts/default.js', array(), THEME_VERSION, true);
    }

    if (is_page_template('pages/criptomoedas/page-cotacao-criptomoedas.php')) {
        wp_enqueue_script('page-cotacao-criptomoedas-js', get_template_directory_uri() . '/assets/js/pages/cotacao-criptomoedas.js', array(), THEME_VERSION, true);
    }

    if (is_page_template('pages/guias/page-guias.php') || is_singular('guias')) {
        wp_enqueue_script('page-guias-js', get_template_directory_uri() . '/assets/js/pages/guias.js', array(), THEME_VERSION, true);
    }

    if (is_singular('acoes') && !is_page_template('pages/cambio.php')) {
        wp_enqueue_script('acoes-js', get_template_directory_uri() . '/assets/js/pages/acoes.js', array(), THEME_VERSION, true);
    }

    
    if (is_page_template('pages/brasil-em-wall-street.php')) {
        wp_enqueue_style('brasil-em-wall-street-css', get_template_directory_uri() . '/assets/css/pages/brasil-em-wall-street.css', array(), THEME_VERSION);
    }

    /**
     * Enqueue JS for Calculators and Tools
     */
    if(is_page_template('pages/calculadoras/juros-compostos.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/calculadoras/geral-calculadoras.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('juros-compostos-js', get_template_directory_uri() . '/assets/js/calculadoras/juros-composto.js', array('jquery', 'maskmoney-script', 'geral-calculadoras-js'), THEME_VERSION, true);
    }

    if(is_page_template('pages/calculadoras/juros-simples.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/calculadoras/geral-calculadoras.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('juros-simples-js', get_template_directory_uri() . '/assets/js/calculadoras/juros-simples.js', array('jquery', 'maskmoney-script', 'geral-calculadoras-js'), THEME_VERSION, true);
    }

    if(is_page_template('pages/calculadoras/salario-liquido.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/calculadoras/geral-calculadoras.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('salario-liquido-js', get_template_directory_uri() . '/assets/js/calculadoras/salario-liquido.js', array('jquery', 'maskmoney-script', 'geral-calculadoras-js'), THEME_VERSION, true);
    }

    if(is_page_template('pages/calculadoras/gastos-com-pet.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('utils-calc', get_template_directory_uri() . '/assets/js/calculadoras/utils-calc.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('gastos-com-pet', get_template_directory_uri() . '/assets/js/calculadoras/gastos-com-pet.js', array('jquery', 'maskmoney-script', 'utils'), THEME_VERSION, true);
    }

    if(is_page_template('pages/calculadoras/inss.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/calculadoras/geral-calculadoras.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('inss-js', get_template_directory_uri() . '/assets/js/calculadoras/inss.js', array('jquery', 'maskmoney-script', 'geral-calculadoras-js'), THEME_VERSION, true);
    }

    if(is_page_template('pages/calculadoras/irrf.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/calculadoras/geral-calculadoras.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('irrf-js', get_template_directory_uri() . '/assets/js/calculadoras/irrf.js', array('jquery', 'maskmoney-script', 'geral-calculadoras-js'), THEME_VERSION, true);
    }

    if(is_page_template('pages/calculadoras/price.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/calculadoras/geral-calculadoras.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('price-js', get_template_directory_uri() . '/assets/js/calculadoras/price.js', array('jquery', 'maskmoney-script', 'geral-calculadoras-js'), THEME_VERSION, true);
    }

    if(is_page_template('pages/calculadoras/decimo-terceiro.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/calculadoras/geral-calculadoras.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('decimo-terceiro-js', get_template_directory_uri() . '/assets/js/calculadoras/decimo-terceiro.js', array('jquery', 'maskmoney-script', 'geral-calculadoras-js'), THEME_VERSION, true);
    }

    if(is_page_template('pages/comparadores/transportes.php')) {
        wp_enqueue_script('utils-js', get_template_directory_uri() . '/assets/js/utils.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('transporte-input-js', get_template_directory_uri() . '/assets/js/comparadores/transporte/input.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('transporte-calc-js', get_template_directory_uri() . '/assets/js/comparadores/transporte/calc.js', array('jquery', 'utils-js', 'transporte-input-js'), THEME_VERSION, true);
    }

    if(is_page_template('pages/simuladores/investimento.php')) {
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/calculadoras/geral-calculadoras.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('maskmoney-script', get_template_directory_uri() . '/assets/js/jquery.maskMoney.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('utils-js', get_template_directory_uri() . '/assets/js/utils.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('investimento-js', get_template_directory_uri() . '/assets/js/simuladores/investimento.js', array('jquery', 'utils-js'), THEME_VERSION, true);
    }
    if(is_page_template('pages/simuladores/copa.php')) {
        wp_enqueue_script('cookie-js', get_template_directory_uri() . '/assets/js/js.cookie.min.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('accordion-script', get_template_directory_uri() . '/assets/js/accordion.js', array('jquery'), THEME_VERSION, true);
        wp_enqueue_script('copa-calculadoras-js', get_template_directory_uri() . '/assets/js/simuladores/copa.js', array('jquery'), THEME_VERSION, true);
    }

    if(is_page_template('pages/newsletter.php')) {
        wp_enqueue_script('geral-calculadoras-js', get_template_directory_uri() . '/assets/js/pages/newsletter.js', array('jquery'), THEME_VERSION, true);
    }
}

add_action('wp_enqueue_scripts', 'register_scripts', 10);

/**
 * AJAX URL
 */
function investnews_action_wp_head_0()
{
    print('<script>
var ajaxurl = "' . admin_url('admin-ajax.php') . '";
var siteurl = "' . site_url() . '";
var homeurl = "' . home_url() . '";
var themeurl = "' . get_template_directory_uri() . '";
var themedir = themeurl;
</script>'
    );
}

add_action('wp_head', 'investnews_action_wp_head_0', 0);