<?php

/**
 * Cria o tipo de post Criptomoedas
 */
function post_type_criptomoedas()
{
    $labels = array(
        'name'                  => _x('Criptomoedas', 'Post Type General Name', 'invest-news'),
        'singular_name'         => _x('Criptomoeda', 'Post Type Singular Name', 'invest-news'),
        'menu_name'             => __('Criptomoedas', 'invest-news'),
        'name_admin_bar'        => __('Criptomoedas', 'invest-news'),
        'archives'              => __('Arquivo', 'invest-news'),
        'attributes'            => __('Atributos', 'invest-news'),
        'parent_item_colon'     => __('Item Parente:', 'invest-news'),
        'all_items'             => __('Todas as Criptomoedas', 'invest-news'),
        'add_new_item'          => __('Adicionar nova Criptomoeda', 'invest-news'),
        'add_new'               => __('Adicionar Criptomoeda', 'invest-news'),
        'new_item'              => __('Nova Criptomoeda', 'invest-news'),
        'edit_item'             => __('Editar Criptomoeda', 'invest-news'),
        'update_item'           => __('Atualizar Criptomoeda', 'invest-news'),
        'view_item'             => __('Visualizar Criptomoeda', 'invest-news'),
        'view_items'            => __('Visualizar Criptomoedas', 'invest-news'),
        'search_items'          => __('Pesquisar Criptomoeda', 'invest-news'),
        'not_found'             => __('Não encontrado', 'invest-news'),
        'not_found_in_trash'    => __('Não encontrado na lixeira', 'invest-news'),
        'featured_image'        => __('Imagem destacada', 'invest-news'),
        'set_featured_image'    => __('Definir imagem destacada', 'invest-news'),
        'remove_featured_image' => __('Remover imagem destacada', 'invest-news'),
        'use_featured_image'    => __('Usar como imagem destacada', 'invest-news'),
        'insert_into_item'      => __('Inserir na Criptomoeda', 'invest-news'),
        'uploaded_to_this_item' => __('Anexado a esta Criptomoeda', 'invest-news'),
        'items_list'            => __('Lista de Criptomoedas', 'invest-news'),
        'items_list_navigation' => __('NavegCriptomoeda pela lista de Criptomoedas', 'invest-news'),
        'filter_items_list'     => __('Filtrar lista de Criptomoedas', 'invest-news'),
    );
    $args = array(
        'label'                 => __('Criptomoedas', 'invest-news'),
        'description'           => __('Perfil das Criptomoedas', 'invest-news'),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-money',
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
            "slug" => "cotacao-criptomoeda",
            "with_front" => true
        )
    );
    register_post_type('criptomoedas', $args);
}
add_action('init', 'post_type_criptomoedas', 0);


/**
 * Customiza a tag "title" com os dados da criptomoeda
 */
add_filter('rank_math/frontend/title', function ($title) {
    global $post;
    if (isset($post->post_type) && $post->post_type == "criptomoedas") :
        $post_title = get_the_title();
        $ticker_cripto = get_field('ticker_criptomoeda');
        $title = "$post_title ($ticker_cripto) hoje: cotação da criptomoeda, histórico e mais | InvestNews";
    endif;
    
    return $title;
});


/**
 * Customiza a meta tag "description" com os dados da criptomoeda
 */
add_filter('rank_math/frontend/description', function ($description) {
    global $post;
    if (isset($post->post_type) && $post->post_type == "criptomoedas") :
        $title = get_the_title();
        $ticker_cripto = get_field('ticker_criptomoeda');
        $description = "Acompanhe a cotação da criptomoeda $title ($ticker_cripto). Acesse as notícias relacionadas sobre a cripto, análises e o preço de preço da moeda digital.";
    endif;
    
    return $description;
});


/**
 * Obtém os posts relacionados em criptomoedas
 */
function ins_RelatedPostsCriptomoedas($ticker)
{
    global $post;
    $orig_post = $post;

    $tag = get_term_by('name', $ticker, 'post_tag');
    $tag = object_to_array($tag);
    $tag = $tag['term_id'];
    $tag_in = array($tag);
    
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
            <div class="related-posts-section">
                <div class="related-posts-inner">
                    <h3 class="related-posts-title">Últimas Notícias<?php echo (get_the_title() != "Ação") ? " - " . get_the_title() : ""; ?></h3>
                    <div class="related-posts-container">
                        <?php while ($my_query->have_posts()) { $my_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" rel="bookmark" class="related-post-item">
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                            <div class="related-post-image">
                                <?php the_post_thumbnail('ins-mid-thumb', array( 'class' => 'ins-reg-img', 'alt' => get_the_title() )); ?>
                                <div class="overlay"></div>
                            </div>
                            <?php } ?>
                            <h3 class="related-post-item-title"><?php the_title(); ?></h3>
                        </a>
                        <?php }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
    $post = $orig_post;
    wp_reset_query();
}
