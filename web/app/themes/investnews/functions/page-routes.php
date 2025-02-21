<?php 

/**
 * Register custom templates
 * @param array $templates
 * @return array
 * @version 1.0.0
 */
function add_custom_templates($templates)
{
    $templates['pages/page-new-gn.php'] = 'GoogleNews XML';
    $templates['pages/infograficos/page-infograficos.php'] = 'Infográficos';
    $templates['pages/criptomoedas/page-cotacao-criptomoedas.php'] = 'Criptomoedas';
    $templates['pages/guias/page-guias.php'] = 'Guias';
    $templates['pages/calculadoras/juros-compostos.php'] = 'Juros Compostos';
    $templates['pages/calculadoras/juros-simples.php'] = 'Juros Simples';
    $templates['pages/calculadoras/salario-liquido.php'] = 'Salario Liquido';
    $templates['pages/calculadoras/gastos-com-pet.php'] = 'Calculadora Pet';
    $templates['pages/calculadoras/inss.php'] = 'Calculadora INSS';
    $templates['pages/calculadoras/irrf.php'] = 'Calculadora IRRF';
    $templates['pages/calculadoras/price.php'] = 'Calculadora PRICE';
    $templates['pages/calculadoras/decimo-terceiro.php'] = 'Calculadora Decimo Terceiro';
    $templates['pages/comparadores/transportes.php'] = 'Comparador Transporte';
    $templates['pages/comparadores/fundos.php'] = 'Comparador Fundos';
    $templates['pages/simuladores/aposentadoria.php'] = 'Simulador Aposentadoria';
    $templates['pages/simuladores/investimento.php'] = 'Simulador de Investimentos';
    $templates['pages/simuladores/copa.php'] = 'Simulador Carteira de Ações';
    $templates['pages/calculadoras/calculadoras.php'] = 'Calculadoras';
    $templates['pages/comparadores/comparadores.php'] = 'Comparadores';
    $templates['pages/simuladores/simuladores.php'] = 'Simuladores';
    $templates['pages/ferramentas.php'] = 'Ferramentas';
    $templates['pages/newsletter.php'] = 'Newsletter';



    return $templates;
}
add_filter('theme_page_templates', 'add_custom_templates');

/**
 * Load custom template
 * @param string $template
 * @return string
 * @version 1.0.0
 */

function load_custom_template($template)
{
    global $post; 

    if ($post) {
        if ($template && 'pages/page-new-gn.php' === $template) {
            $template = locate_template('pages/page-new-gn.php');
        }
        if ($template && 'pages/criptomoedas/page-cotacao-criptomoedas.php' === $template) {
            $template = locate_template('pages/criptomoedas/page-cotacao-criptomoedas.php');
        }
        if ($template && 'pages/guias/page-guias.php' === $template) {
            $template = locate_template('pages/guias/page-guias.php');
        }
        if ($template && 'pages/cotacoes.php' === $template) {
            $template = locate_template('cambio.php', true);
        }
        if ($template && 'pages/calculadoras/juros-compostos.php' === $template) {
            $template = locate_template('pages/calculadoras/juros-compostos.php');
        }
        if ($template && 'pages/calculadoras/juros-simples.php' === $template) {
            $template = locate_template('pages/calculadoras/juros-simples.php');
        }
        if ($template && 'pages/calculadoras/salario-liquido.php' === $template) {
            $template = locate_template('pages/calculadoras/salario-liquido.php');
        }
        if ($template && 'pages/calculadoras/gastos-com-pet.php' === $template) {
            $template = locate_template('pages/calculadoras/gastos-com-pet.php');
        }
        if ($template && 'pages/calculadoras/inss.php' === $template) {
            $template = locate_template('pages/calculadoras/inss.php');
        }     
        if ($template && 'pages/calculadoras/irrf.php' === $template) {
            $template = locate_template('pages/calculadoras/irrf.php');
        }
        if ($template && 'pages/calculadoras/price.php' === $template) {
            $template = locate_template('pages/calculadoras/price.php');
        }
        if ($template && 'pages/calculadoras/decimo-terceiro.php' === $template) {
            $template = locate_template('pages/calculadoras/decimo-terceiro.php');
        }  
        if ($template && 'pages/comparadores/transportes.php' === $template) {
            $template = locate_template('pages/comparadores/transportes.php');
        }
        if ($template && 'pages/comparadores/fundos.php' === $template) {
            $template = locate_template('pages/comparadores/fundos.php');
        } 
        if ($template && 'pages/simuladores/aposentadoria.php' === $template) {
            $template = locate_template('pages/simuladores/aposentadoria.php');
        }
        if ($template && 'pages/simuladores/investimento.php' === $template) {
            $template = locate_template('pages/simuladores/investimento.php');
        } 
        if ($template && 'pages/simuladores/copa.php' === $template) {
            $template = locate_template('pages/simuladores/copa.php');
        } 
        if ($template && 'pages/calculadoras/calculadoras.php' === $template) {
            $template = locate_template('pages/calculadoras/calculadoras.php');
        }
        if ($template && 'pages/comparadores/comparadores.php' === $template) {
            $template = locate_template('pages/comparadores/comparadores.php');
        }
        if ($template && 'pages/simuladores/simuladores.php' === $template) {
            $template = locate_template('pages/simuladores/simuladores.php');
        }
        if ($template && 'pages/ferramentas.php' === $template) {
            $template = locate_template('pages/ferramentas.php');
        } 
        if ($template && 'pages/newsletter.php' === $template) {
            $template = locate_template('pages/newsletter.php');
        } 
    }
    return $template;
}
add_filter('template_include', 'load_custom_template');

/**
 * Load custom template for archive
 * @param string $template
 * @return string
 * @version 1.0.0
 */
function load_archive_template($template)
{
    if (is_post_type_archive('perfis')) {
        $new_template = locate_template('pages/perfis/archive-perfis.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    if (is_post_type_archive('patrocinados')) {
        $new_template = locate_template('pages/branded-content/archive-patrocinados.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}

add_filter('template_include', 'load_archive_template');

/**
 * Load custom template for single
 * @param string $template
 * @return string
 * @version 1.0.0
 */

function load_single_template($template)
{
    $templateSlug = get_page_template_slug();
    
    if (is_singular('perfis')) {
        $new_template = locate_template('pages/perfis/single.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    if (is_singular('perfis')) {
        $new_template = locate_template('pages/branded-content/single.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    if(is_singular('acoes') && $templateSlug !== 'pages/cambio.php') {
        $new_template = locate_template('pages/acoes.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    if (is_singular('post')) {
        $new_template = locate_template('pages/posts/single.php');

        if(in_category('opiniao')) {
            $new_template = locate_template('pages/posts/opinion.php');
        }

        if(is_page_template('post-template-special.php')){
            $new_template = locate_template('pages/posts/special.php');
        }

        $categories = get_the_category( get_the_ID()); 
        if ( $categories ) {
            foreach ( $categories as $category ) { 
                $term = $category->term_id;  
                $editorial_sponsored_by = get_field('editorial_sponsored_by', 'category_'.$term, false);
                if($editorial_sponsored_by) {
                    $new_template = locate_template('pages/posts/sponsored-by.php');
                }
            }        
        }
        $tags = get_the_tags( get_the_ID()); 
        if ( $tags ) {
            foreach ( $tags as $tag ) {   
                $term = $tag->term_id;
                $editorial_sponsored_by = get_field('editorial_sponsored_by', 'post_tag_'.$term);
                if($editorial_sponsored_by) {
                    $new_template = locate_template('pages/posts/sponsored-by.php');
                }
            }        
        }

        if (!empty($new_template)) {
            return $new_template;
        }
    }
    if (is_singular('infograficos')) {
        $new_template = locate_template('pages/infograficos/single.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    if (is_singular('criptomoedas')) {
        $new_template = locate_template('pages/criptomoedas/single.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    if (is_singular('guias')) {
        $new_template = locate_template('pages/guias/single.php');
        if (!empty($new_template)) {
            return $new_template;
        }
    }

    if (is_author()) {
        $new_template = locate_template('pages/author/single.php');

        if (!empty($new_template)) {
            return $new_template;
        }
    }
    
    return $template;
}

add_filter('template_include', 'load_single_template');