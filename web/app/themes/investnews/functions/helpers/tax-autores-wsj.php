<?php
function custom_taxonomy_autorWsj()
{
    $labels = array(
        'name'              => _x('Autores WSJ', 'taxonomy general name'),
        'singular_name'     => _x('Autor WSJ', 'taxonomy singular name'),
        'search_items'      => __('Buscar Autores'),
        'all_items'         => __('Todos os Autores'),
        'parent_item'       => __('Autor Pai'),
        'parent_item_colon' => __('Autor Pai:'),
        'edit_item'         => __('Editar Autor'),
        'update_item'       => __('Atualizar Autor'),
        'add_new_item'      => __('Adicionar Novo Autor'),
        'new_item_name'     => __('Novo Nome do Autor'),
        'menu_name'         => __('Autores WSJ'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'autor-wsj'),
    );

    // Registrar a taxonomia para os CPTs 'wsj' e 'post'
    register_taxonomy('autor-wsj', array('wsj', 'post'), $args);
}
add_action('init', 'custom_taxonomy_autorWsj');
