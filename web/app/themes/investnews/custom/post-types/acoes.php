<?php

/**
 * Cria o tipo de post Ações
 */
function post_type_acoes()
{
    $labels = array(
        'name'                  => _x('Ações', 'Post Type General Name', 'invest-news'),
        'singular_name'         => _x('Ação', 'Post Type Singular Name', 'invest-news'),
        'menu_name'             => __('Ações', 'invest-news'),
        'name_admin_bar'        => __('Ações', 'invest-news'),
        'archives'              => __('Arquivo', 'invest-news'),
        'attributes'            => __('Atributos', 'invest-news'),
        'parent_item_colon'     => __('Item Parente:', 'invest-news'),
        'all_items'             => __('Todas as ações', 'invest-news'),
        'add_new_item'          => __('Adicionar nova ação', 'invest-news'),
        'add_new'               => __('Adicionar ação', 'invest-news'),
        'new_item'              => __('Nova ação', 'invest-news'),
        'edit_item'             => __('Editar ação', 'invest-news'),
        'update_item'           => __('Atualizar ação', 'invest-news'),
        'view_item'             => __('Visualizar ação', 'invest-news'),
        'view_items'            => __('Visualizar ações', 'invest-news'),
        'search_items'          => __('Pesquisar ação', 'invest-news'),
        'not_found'             => __('Não encontrado', 'invest-news'),
        'not_found_in_trash'    => __('Não encontrado na lixeira', 'invest-news'),
        'featured_image'        => __('Imagem destacada', 'invest-news'),
        'set_featured_image'    => __('Definir imagem destacada', 'invest-news'),
        'remove_featured_image' => __('Remover imagem destacada', 'invest-news'),
        'use_featured_image'    => __('Usar como imagem destacada', 'invest-news'),
        'insert_into_item'      => __('Inserir na ação', 'invest-news'),
        'uploaded_to_this_item' => __('Anexado a esta ação', 'invest-news'),
        'items_list'            => __('Lista de ações', 'invest-news'),
        'items_list_navigation' => __('Navegação pela lista de ações', 'invest-news'),
        'filter_items_list'     => __('Filtrar lista de ações', 'invest-news'),
    );
    $args = array(
        'label'                 => __('Ações', 'invest-news'),
        'description'           => __('Perfil das ações brasileiras', 'invest-news'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-chart-area',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'query_var'             => true,
        "rewrite"               => array(
            "slug" => "cotacao",
            "with_front" => true
        )
    );
    register_post_type('acoes', $args);
}

add_action('init', 'post_type_acoes', 0);


/**
 * Cria os campos customizados
 */
function ins_tickers_meta_boxes_setup()
{
    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action('add_meta_boxes', 'ins_add_tickers_meta_boxes');
    /* Save post meta on the 'save_post' hook. */
    add_action('save_post', 'ins_save_tickers_meta', 10, 2);
}
add_action('load-post.php', 'ins_tickers_meta_boxes_setup');
add_action('load-post-new.php', 'ins_tickers_meta_boxes_setup');

function ins_add_tickers_meta_boxes()
{
    add_meta_box(
        'ins-tickers',
        esc_html__('Tickers da ação', 'invest-news'),
        'ins_tickers_meta_box',
        array('acoes'),
        'side',
        'high'
    );
}


/**
 * Exibe os campos customizados no admin
 */
function tickers_metabox_defaults()
{
    return array(
        'ticker_on' => '',
        'ticker_pn' => '',
    );
}

function ins_tickers_meta_box($object, $box)
{
    global $post;
    $tickers = get_post_meta($post->ID, 'ins_tickers', true);
    $defaults = tickers_metabox_defaults();
    $tickers_data = wp_parse_args($tickers, $defaults);
    ?>
    <p>
        <label for="ins-ticker-on"><?php esc_html_e("Adicione o ticker da ação ordinária (final 3)", 'invest-news'); ?></label>
        <br />
        <input
            type="text"
            name="ins_tickers[ticker_on]"
            id="ins_tickers_ticker_on"
            value="<?php echo $tickers_data['ticker_on']; ?>"
            style="width:100%;"
        >
    </p>
    <br />
    <p>
        <label for="ins-ticker-pn"><?php esc_html_e("Adicione o ticker da ação preferencial (final 4, 5 ou 6)", 'invest-news'); ?></label>
        <br />
        <input
            type="text"
            name="ins_tickers[ticker_pn]"
            id="ins_tickers_ticker_pn"
            value="<?php echo $tickers_data['ticker_pn']; ?>"
            style="width:100%;"
        >
    </p>
    <br />
    <p>
        <label for="ins-ticker-pn"><?php esc_html_e("Adicione o ticker extra", 'invest-news'); ?></label>
        <br />
        <input
            type="text"
            name="ins_tickers[ticker_pn2]"
            id="ins_tickers_ticker_pn2"
            value="<?php echo $tickers_data['ticker_pn2']; ?>"
            style="width:100%;"
        >
    </p>
    <br />
    <p>
        <label for="ins-ticker-pn"><?php esc_html_e("Adicione o ticker extra", 'invest-news'); ?></label>
        <br />
        <input
            type="text"
            name="ins_tickers[ticker_pn3]"
            id="ins_tickers_ticker_pn3"
            value="<?php echo $tickers_data['ticker_pn3']; ?>"
            style="width:100%;"
        >
    </p>
    <?php
    wp_nonce_field('ins_save_tickers_meta', 'ins_tickers_nonce');
}


/**
 * Salva os dados dos campos customizados
 */
function ins_save_tickers_meta($post_id, $post)
{
    /* Verify the nonce before proceeding. */
    if (!isset($_POST['ins_tickers_nonce']) || !wp_verify_nonce($_POST['ins_tickers_nonce'], 'ins_save_tickers_meta')) {
        return $post_id;
    }

    /* Get the post type object. */
    $post_type = get_post_type_object($post->post_type);

    /* Check if the current user has permission to edit the post. */
    if (!current_user_can($post_type->cap->edit_post, $post_id)) {
        return $post_id;
    }

    // Set up an empty array
    $new_meta_value = array();

    // Loop through each of our fields
    foreach ($_POST['ins_tickers'] as $key => $detail) {
        $new_meta_value[$key] = wp_filter_post_kses($detail);
    }

    /* Get the meta key. */
    $meta_key = 'ins_tickers';

    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta($post_id, $meta_key, true);

    /* If a new meta value was added and there was no previous value, add it. */
    if ($new_meta_value && '' == $meta_value) {
        add_post_meta($post_id, $meta_key, $new_meta_value, true);
    /* If the new meta value does not match the old value, update it. */
    } elseif ($new_meta_value && $new_meta_value != $meta_value) {
        update_post_meta($post_id, $meta_key, $new_meta_value);
    /* If there is no new meta value but an old value exists, delete it. */
    } elseif ('' == $new_meta_value && $meta_value) {
        delete_post_meta($post_id, $meta_key, $meta_value);
    }
}


/**
 * Customiza a meta tag "description" com os dados da ação
 */
add_filter('rank_math/frontend/description', function ($description) {
    global $post;
    
    if (isset($post->post_type) && $post->post_type == "acoes") :
        $acao_tipo = get_post_meta($post->ID, '_acao_tipo', true);
        if ($acao_tipo == 'acao' || $acao_tipo == "") {
            $tipo_singular = "Ação";
            $tipo_plural = "Ações";
        } elseif ($acao_tipo == 'bdr') {
            $tipo_singular = "BDR";
            $tipo_plural = "BDRs";
        } elseif ($acao_tipo == 'etf') {
            $tipo_singular = "ETF";
            $tipo_plural = "ETFs";
        } elseif ($acao_tipo == 'fii') {
            $tipo_singular = "FII";
            $tipo_plural = "FIIs";
        } elseif ($acao_tipo == 'cripto') {
            $tipo_singular = "Criptomoeda";
            $tipo_plural = "Criptomoedas";
        }
        
        $custom_seo = get_post_meta($post->ID, '_acao_custom_title_description', true);

        if ($custom_seo == '1') {
            return $description;
        }

        $title = get_the_title();
        $tickers = get_post_meta($post->ID, 'ins_tickers', true);
        $ticker_acf = get_field('ticker', $post->ID);
        $ticker_cripto = get_post_meta($post->ID, '_ticker_cripto', true);
        
        if (! empty($tickers['ticker_on'])) :
            $on = $tickers['ticker_on'];
        endif;
    
        if (! empty($tickers['ticker_pn'])) :
            $pn = $tickers['ticker_pn'];
        endif;

        if (! empty($on) && ! empty($pn)) :
            $description = "Veja a cotação da $tipo_singular $on e $pn - $tipo_plural $title hoje. Confira quanto custa uma $tipo_singular da empresa $title e as últimas notícias sobre a empresa.";
        else :
            if (! empty($on)) :
                $description = "Veja a cotação da $tipo_singular $on - $tipo_plural $title hoje. Confira quanto custa uma $tipo_singular da empresa $title e as últimas notícias sobre a empresa.";
            else :
                if (! empty($pn)) :
                    $description = "Veja a cotação da $tipo_singular $pn - $tipo_plural $title hoje. Confira quanto custa uma $tipo_singular da empresa $title e as últimas notícias sobre a empresa.";
                else :
                    if (! empty($ticker_acf)) :
                        $description = "Veja a cotação da $tipo_singular $ticker_acf - $tipo_plural $title hoje. Confira quanto custa uma $tipo_singular da empresa $title e as últimas notícias sobre a empresa.";
                    else :
                        if (! empty($ticker_cripto)) :
                            $description = "Veja a cotação da $tipo_singular $ticker_cripto - $tipo_plural $title hoje. Confira quanto custa uma $tipo_singular da empresa $title e as últimas notícias sobre a empresa.";
                        endif;
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    return $description;
});


/**
 * Customiza a tag "title" com os dados da ação
 */
add_filter('rank_math/frontend/title', function ($title) {
    
    global $post;
   
    if (isset($post->post_type) && $post->post_type == "acoes") :
        $custom_seo = get_post_meta($post->ID, '_acao_custom_title_description', true);
        if ($custom_seo == '1') {
            return $title;
        }
        
        $title = get_the_title();
        $acao_tipo = get_post_meta($post->ID, '_acao_tipo', true);
        $tickers = get_post_meta($post->ID, 'ins_tickers', true);
        $ticker_acf = get_field('ticker');
        $ticker_cripto = get_post_meta($post->ID, '_ticker_cripto', true);

        if ($acao_tipo == 'acao' || $acao_tipo == "") {
            $tipo_singular = "Ação";
            $tipo_plural = "Ações";
        } elseif ($acao_tipo == 'bdr') {
            $tipo_singular = "BDR";
            $tipo_plural = "BDRs";
        } elseif ($acao_tipo == 'etf') {
            $tipo_singular = "ETF";
            $tipo_plural = "ETFs";
        } elseif ($acao_tipo == 'fii') {
            $tipo_singular = "FII";
            $tipo_plural = "FIIs";
        } elseif ($acao_tipo == 'cripto') {
            $tipo_singular = "Criptomoeda";
            $tipo_plural = "Criptomoedas";
        }


        if (! empty($tickers['ticker_on'])) :
            $on = $tickers['ticker_on'];
        endif;
    
        if (! empty($tickers['ticker_pn'])) :
            $pn = $tickers['ticker_pn'];
        endif;


        if (! empty($on) && ! empty($pn)) :
            $title = "$tipo_singular $on - $pn - $tipo_plural $title - Cotação | Investnews";
        else :
            if (! empty($on)) :
                $title = "$tipo_singular $on - $tipo_plural $title - Cotação | Investnews";
            else :
                if (! empty($pn)) :
                    $title = "$tipo_singular $pn - $tipo_plural $title - Cotação | Investnews";
                else :
                    if (! empty($ticker_acf)) :
                        $title = "$tipo_singular $ticker_acf - $tipo_plural $title - Cotação | Investnews";
                    else :
                        if (! empty($ticker_cripto)) :
                            $title = "$tipo_singular $ticker_cripto - $tipo_plural $title - Cotação | Investnews";
                        endif;
                    endif;
                endif;
            endif;
        endif;
    endif;
    
    return $title;
});


/**
 * Obtém os posts relacionados em ações
 */
function mvp_RelatedPostsAcoes($tickers)
{
    global $post;
    $orig_post = $post;

    if (! empty($tickers['ticker_on'])) :
        $on = $tickers['ticker_on'];
    endif;

    if (! empty($tickers['ticker_pn'])) :
        $pn = $tickers['ticker_pn'];
    endif;

    if (isset($on) && isset($pn)) :
        $tag1 = get_term_by('name', $tickers['ticker_on'], 'post_tag');
        $tag2 = get_term_by('name', $tickers['ticker_pn'], 'post_tag');
        $tag1 = object_to_array($tag1);
        $termid1 = $tag1['term_id'];
        $tag2 = object_to_array($tag2);
        $termid2 = $tag2['term_id'];
        $tag_in = array($termid1, $termid2);
    else :
        if (isset($on)) :
            $tag1 = get_term_by('name', $tickers['ticker_on'], 'post_tag');
            $tag1 = object_to_array($tag1);
            $termid1 = $tag1['term_id'];
            $tag_in = array($termid1);
        else :
            if (isset($pn)) :
                $tag2 = get_term_by('name', $tickers['ticker_pn'], 'post_tag');
                $tag2 = object_to_array($tag2);
                $termid2 = $tag2['term_id'];
                $tag_in = array($termid2);
            else :
                $tag = get_term_by('name', $tickers, 'post_tag');
                $tag = object_to_array($tag);
                $tag = $tag['term_id'];
                $tag_in = array($tag);
            endif;
        endif;
    endif;
    
    if (! empty($tag_in)) {
        $args = array(
            'tag__in' => $tag_in,
            'order' => 'DESC',
            'orderby' => 'date',
            'post__not_in' => array($post->ID),
            'posts_per_page'=> 6,
            'ignore_sticky_posts'=> 1
        );

        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) { ?>
            <div class="mvp-cont-read-wrap">
                <div id="mvp-related-posts" class="left relative">
                    <h3 class="mvp-widget-home-title">
                        <span class="mvp-widget-home-title">
                            <?php
                                esc_html_e('Latest News', 'invest-news');
                                echo (get_the_title() != "Ação") ? " - " . get_the_title() : "";
                            ?>
                        </span>
                    </h3>
                    <ul class="mvp-related-posts-list left related">
                        <?php while ($my_query->have_posts()) {
                            $my_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" aria-label="Entrar" rel="bookmark">
                            <li>
                                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                    <div class="mvp-related-img left relative">
                                        <?php the_post_thumbnail('ins-mid-thumb', array( 'class' => 'ins-reg-img', 'alt' => get_the_title() )); ?>
                                        <?php the_post_thumbnail('ins-small-thumb', array( 'class' => 'ins-mob-img', 'alt' => get_the_title() )); ?>
                                        <?php if (has_post_format('video')) { ?>
                                            <div class="mvp-vid-box-wrap mvp-vid-box-mid mvp-vid-marg">
                                                <i class="fa fa-2 fa-play" aria-hidden="true"></i>
                                            </div><!--mvp-vid-box-wrap-->
                                        <?php } elseif (has_post_format('gallery')) { ?>
                                            <div class="mvp-vid-box-wrap mvp-vid-box-mid">
                                                <i class="fa fa-2 fa-camera" aria-hidden="true"></i>
                                            </div><!--mvp-vid-box-wrap-->
                                        <?php } ?>
                                    </div><!--mvp-related-img-->
                                <?php } ?>
                                <div class="mvp-related-text left relative">
                                    <p><?php the_title(); ?></p>
                                </div><!--mvp-related-text-->
                            </li>
                        </a>
                        <?php }
                        echo '</ul>';
                        echo '</div><!--mvp-related-posts-->';
                        echo '</div><!--mvp-cont-read-wrap-->';
        }
    }
    $post = $orig_post;
    wp_reset_query();
}

/**
 * Show ação ticker on ACF relationship field
 */
add_filter('acf/fields/relationship/result', 'my_acf_fields_relationship_result', 10, 4);
function my_acf_fields_relationship_result($text, $post, $field, $post_id)
{
    $ticker = get_field('ticker', $post->ID);
    $post_type = get_post_type($post->ID);
    if ($ticker && $post_type == 'acoes') {
        $text .= ' ' . sprintf('(%s)', $ticker);
    }
    return $text;
}