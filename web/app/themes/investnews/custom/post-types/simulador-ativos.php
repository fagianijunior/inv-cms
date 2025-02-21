<?php

/**
 * Cria o tipo de post Simulador Ativos
 */
function post_type_simulador_ativos() {
    $labels = array(
        'name'                  => _x( 'Simulador Ativos', 'Post Type General Name', 'invest-news' ),
        'singular_name'         => _x( 'Simulador Ativo', 'Post Type Singular Name', 'invest-news' ),
        'menu_name'             => __( 'Simulador Ativos', 'invest-news' ),
        'name_admin_bar'        => __( 'Simulador Ativos', 'invest-news' ),
        'archives'              => __( 'Arquivo', 'invest-news' ),
        'attributes'            => __( 'Atributos', 'invest-news' ),
        'parent_item_colon'     => __( 'Item Parente:', 'invest-news' ),
        'all_items'             => __( 'Todas as Ativos', 'invest-news' ),
        'add_new_item'          => __( 'Adicionar nova ativo', 'invest-news' ),
        'add_new'               => __( 'Adicionar ativo', 'invest-news' ),
        'new_item'              => __( 'Nova ativo', 'invest-news' ),
        'edit_item'             => __( 'Editar ativo', 'invest-news' ),
        'update_item'           => __( 'Atualizar ativo', 'invest-news' ),
        'view_item'             => __( 'Visualizar ativo', 'invest-news' ),
        'view_items'            => __( 'Visualizar Ativos', 'invest-news' ),
        'search_items'          => __( 'Pesquisar ativo', 'invest-news' ),
        'not_found'             => __( 'Não encontrado', 'invest-news' ),
        'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'invest-news' ),
        'featured_image'        => __( 'Imagem destacada', 'invest-news' ),
        'set_featured_image'    => __( 'Definir imagem destacada', 'invest-news' ),
        'remove_featured_image' => __( 'Remover imagem destacada', 'invest-news' ),
        'use_featured_image'    => __( 'Usar como imagem destacada', 'invest-news' ),
        'insert_into_item'      => __( 'Inserir na ativo', 'invest-news' ),
        'uploaded_to_this_item' => __( 'Anexado a esta ativo', 'invest-news' ),
        'items_list'            => __( 'Lista de ativos', 'invest-news' ),
        'items_list_navigation' => __( 'Navegação pela lista de ativos', 'invest-news' ),
        'filter_items_list'     => __( 'Filtrar lista de ativos', 'invest-news' ),
    );
    $args = array(
        'label'                 => __( 'Simulador - Ativos', 'invest-news' ),
        'description'           => __( 'Perfil das Ativos brasileiras', 'invest-news' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-editor-table',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'query_var'				=> true,
    );
    register_post_type( 'simulador_ativos', $args );
}
add_action( 'init', 'post_type_simulador_ativos', 0 );