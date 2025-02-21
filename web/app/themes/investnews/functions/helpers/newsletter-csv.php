<?php 
function export_contatos_newsletter() {
    if (!current_user_can('manage_options')) {
        wp_die('Acesso negado!');
    }

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=contatos_newsletter.csv');

    $output = fopen('php://output', 'w');

    fputcsv($output, ['E-mail', 'Data de Cadastro']);

    $args = [
        'post_type'      => 'contato_newsletter',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_query'     => [
            [
                'key'     => 'exportado',
                'compare' => 'NOT EXISTS', 
            ]
        ]
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $email = get_the_title(); 
            $data_cadastro = get_the_date('Y-m-d');

            fputcsv($output, [$email, $data_cadastro]);

            update_post_meta($post_id, 'exportado', '1');
        }
    }

    fclose($output);
    exit;
}
add_action('admin_post_export_contatos_newsletter', 'export_contatos_newsletter');

function add_export_contatos_newsletter_button() {
    ?>
    <div class="wrap">
        <h2>Exportar Contatos Newsletter</h2>
        <a href="<?php echo admin_url('admin-post.php?action=export_contatos_newsletter'); ?>" class="button button-primary">Baixar CSV</a>
    </div>
    <?php
}

function add_export_contatos_newsletter_menu() {
    add_submenu_page(
        'edit.php?post_type=contato_newsletter',
        'Exportar Contatos',
        'Exportar Contatos',
        'manage_options',
        'export-contatos-newsletter',
        'add_export_contatos_newsletter_button'
    );
}
add_action('admin_menu', 'add_export_contatos_newsletter_menu');
