<?php 

function custom_validate_jwt_token($result) {
    
    if (true === $result || is_wp_error($result)) {
        return $result;
    }

    if (defined('REST_REQUEST') && REST_REQUEST && !strpos($_SERVER['REQUEST_URI'], '/inv-api')) {
        return $result;
    }

    $request = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    if (strpos($request, '/inv-api') !== false && $method === 'GET') {
        $auth = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : false;

        if (!$auth) {
            return new WP_Error('rest_not_authenticated', 'JWT Token is missing.', array('status' => 403));
        }

        list($type, $token) = explode(' ', $auth);

        if ($type !== 'Bearer' || !$token) {
            return new WP_Error('rest_not_authenticated', 'JWT Token is missing or malformed.', array('status' => 403));
        }

        $user = apply_filters('jwt_auth_validate_token', $token);
        if (is_wp_error($user)) {
            return new WP_Error('rest_not_authenticated', 'JWT Token is invalid: ' . $user->get_error_message(), array('status' => 403));
        }

        // Token válido
        return $result;
    }

    return $result;
}

add_filter('rest_authentication_errors', 'custom_validate_jwt_token');

// Changing rote apis
add_filter('rest_url_prefix', function(){
	return 'inv-api';
});

// Rota que permite um usuário em especifico criar posts
add_action('rest_api_init', function(){
    register_rest_route('v1', '/cvm-bot', array(
        'methods' => 'POST',
        'callback' => function($request) {
            $user = wp_get_current_user();
            if (!$user->exists()) {
                return new WP_Error('rest_not_authenticated', 'O Código JWT é inválido.', array('status' => 403));
            }
    
            if ($user->user_login === 'cvm-bot') {
                $tags = [];
    
                if ($request->get_param('tags')) {
                    $tags = explode(',', $request->get_param('tags'));
                }
    
                $post = array(
                    'post_title'    => $request->get_param('title'),
                    'post_content'  => $request->get_param('content'),
                    'post_status'   => 'draft',
                    'post_author'   => 7,
                    'post_excerpt'  => $request->get_param('excerpt'),
                    'tags_input'    => ['Fatos Relevantes', ...$tags],
                    'post_category' => [],
                );
    
                $post_id = wp_insert_post($post);
    
                if (!is_wp_error($post_id)) {
                    $image_url = $request->get_param('image_url'); 
                    $thumbnail_url = '';
    
                    if (!empty($image_url)) {
                        global $wpdb;
    
                        $attachment_id = $wpdb->get_var($wpdb->prepare(
                            "SELECT ID FROM $wpdb->posts WHERE guid = %s AND post_type = 'attachment'",
                            $image_url
                        ));
    
                        if (!$attachment_id) {
                            $upload_dir = wp_upload_dir();
                            $baseurl = $upload_dir['baseurl'];
                            $relative_url = str_replace($baseurl . '/', '', $image_url);
    
                            $attachment_id = $wpdb->get_var($wpdb->prepare(
                                "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file' AND meta_value = %s",
                                $relative_url
                            ));
                        }
    
                        if ($attachment_id) {
                            set_post_thumbnail($post_id, $attachment_id);
    
                            // Pegando a URL da imagem destacada
                            $thumbnail_url = wp_get_attachment_url($attachment_id);
                        } else {
                            return new WP_Error('image_not_found', "Imagem não encontrada: $image_url", array('status' => 404));
                        }
                    }
    
                    // Retornar post com a URL da imagem destacada
                    return array_merge((array) get_post($post_id), ['thumbnail_url' => $thumbnail_url]);
                } else {
                    return new WP_Error('post_creation_failed', 'Falha ao criar o post.', array('status' => 500));
                }
            } else {
                return new WP_Error('rest_forbidden', 'Você não tem permissão para criar posts.', array('status' => 403));
            }
        },
        'permission_callback' => '__return_true'
    ));
    
});

