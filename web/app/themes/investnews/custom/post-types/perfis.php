<?php

/**
 * Criação do Post Type
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @version 1.0
 * @since 1.0
 */
function post_type_perfis()
{
  $args = array(
    'labels' => array(
      'name' => __('Perfis relevantes', 'textdomain'),
      'singular_name' => __('Perfil relevante', 'textdomain')
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes'),
    'publicly_queryable' => true,
    'capability_type' => 'post',
  );

  register_post_type('perfis', $args);
}

add_action('init', 'post_type_perfis');

/**
 * Criação da Taxonomia
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @version 1.0
 * @since 1.0
 */
function perfis_taxonomy()
{
  $args = array(
    'hierarchical' => true,
    'label' => 'Classificação',
    'rewrite' => array('slug' => 'perfis-classificacao')
  );

  register_taxonomy('perfis_classificacao', 'perfis', $args);
}

add_action('init', 'perfis_taxonomy');

/**
 * Alteração da quantidade de posts por página
 * @link https://developer.wordpress.org/reference/hooks/pre_get_posts/
 * @version 1.0
 * @since 1.0
 */
function perfis_posts_per_page($query)
{
  if ($query->is_post_type_archive('perfis') && $query->is_main_query()) {
    $query->set('posts_per_page', 9);
  }
}

add_action('pre_get_posts', 'perfis_posts_per_page');

/**
 * Criação do endpoint para a requisição dos posts pelo wp_ajax
 * @version 1.0
 * @since 1.0
 */
function perfis_posts()
{
  $query = new WP_Query([
    'post_type' => 'perfis',
    'posts_per_page' => 9,
  ]);

  $postsItems = [
    'havePosts' => false,
    'posts' => []
  ];

  if ($query->have_posts()) {
    $postsItems['havePosts'] = true;

    while ($query->have_posts()) {
      $query->the_post();

      $foto_perfil_array = get_field('foto_perfil', get_the_ID());
      $terms = get_the_terms(get_the_ID(), 'perfis_classificacao');

      $post_customizado = array(
        'url' => get_permalink(),
        'titulo' => get_the_title(),
        'descricao_curta' => get_field('descricao_perfil', get_the_ID()),
        'foto_perfil_url' => $foto_perfil_array['url'],
        'foto_destaque' => get_field('foto_destaque', get_the_ID()),
        'classificacao' => $terms[0]->name
      );

      $postsItems['posts'][] = $post_customizado;
    }
  } else {
    $postsItems = [
      'havePosts' => false,
      'posts' => []
    ];
  }

  $response = array(
    'posts' => $postsItems,
    'success' => true
  );

  wp_send_json($response);
}

add_action('wp_ajax_perfis_posts', 'perfis_posts');
add_action('wp_ajax_nopriv_perfis_posts', 'perfis_posts');

