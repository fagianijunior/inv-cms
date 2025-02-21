<?php

/**
 * Registra o CPT "Contato Newsletter"
 */
function register_contato_newsletter_cpt() {
    $labels = array(
        'name'               => _x('Contatos Newsletter', 'post type general name', 'textdomain'),
        'singular_name'      => _x('Contato Newsletter', 'post type singular name', 'textdomain'),
        'menu_name'          => _x('Contatos Newsletter', 'admin menu', 'textdomain'),
        'name_admin_bar'     => _x('Contato Newsletter', 'add new on admin bar', 'textdomain'),
        'add_new'            => _x('Adicionar Novo', 'contato newsletter', 'textdomain'),
        'add_new_item'       => __('Adicionar Novo Contato', 'textdomain'),
        'new_item'           => __('Novo Contato', 'textdomain'),
        'edit_item'          => __('Editar Contato', 'textdomain'),
        'view_item'          => __('Ver Contato', 'textdomain'),
        'all_items'          => __('Todos os Contatos', 'textdomain'),
        'search_items'       => __('Procurar Contatos', 'textdomain'),
        'parent_item_colon'  => __('Contatos Pai:', 'textdomain'),
        'not_found'          => __('Nenhum contato encontrado.', 'textdomain'),
        'not_found_in_trash' => __('Nenhum contato encontrado na lixeira.', 'textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-email',
        'supports'           => array('title', 'custom-fields')
    );

    register_post_type('contato_newsletter', $args);
}
add_action('init', 'register_contato_newsletter_cpt');

// Hook do WordPress para manipular a requisição AJAX
add_action('wp_ajax_save_contato', 'ajax_save_contato');
add_action('wp_ajax_nopriv_save_contato', 'ajax_save_contato'); // Para usuários não logados
function ajax_save_contato() {
    // Recebe os dados do AJAX
    $email = sanitize_email($_POST['email']);

    // Validação dos dados
    if (empty($email)) {
        wp_send_json_error('Todos os campos são obrigatórios.');
        wp_die();
    }

    // Verifica se o e-mail já está cadastrado
    $existing_posts = get_posts([
        'post_type'  => 'contato_newsletter',
        'numberposts' => -1,
        'meta_query' => [
            [
                'key'   => 'email_newsletter', // Campo ACF 'email'
                'value' => $email, // Valor do e-mail recebido
                'compare' => '='
            ]
        ]
    ]);

    if (!empty($existing_posts)) {
        wp_send_json_error('Este e-mail já está cadastrado em nosso sistema.');
        wp_die();
    }

    $apiUrl = 'https://api.beehiiv.com/v2/publications/';
    $apiPath = '/subscriptions'; 
    $publicationID = 'pub_d89d1c03-66e9-4f92-a7b9-ee725d1c992b';
    $apiKey = '1PcXWK28IE7tsafESiONoar6h2ykuAxUuXrcylhW1zDQ7cXNK3r6BHqA8E5K2cTs';

    $data = [
        'email' => $email,
    ];

    $response = wp_remote_post($apiUrl . $publicationID . $apiPath, [
        'body' => json_encode($data),
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $apiKey
        ]
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error('Falha ao cadastrar o contato.');
    }
    

    // Insere o novo contato
    $post_id = wp_insert_post([
        'post_type'   => 'contato_newsletter', 
        'post_title'  => $email,
        'post_status' => 'publish',
    ]);

    if ($post_id) {
        // Atualiza o campo personalizado com o e-mail
        update_field('email_newsletter', $email, $post_id);
        wp_send_json_success('Contato salvo com sucesso!');
    } else {
        wp_send_json_error('Falha ao salvar o contato.');
    }

    wp_die();
}
