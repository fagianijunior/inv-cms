<?php

function get_token_authentication() {
    // Hit the url of the token, to receive an API access token
    $url = 'https://auth.thomsonreuters.com/oauth/token';

    $response = wp_remote_post($url, array(
        'body' => json_encode(array(
            'client_id' => 'rJS9pukVIRCFoaWXqcDH1aKSBFhBDECw',
            'client_secret' => '3SOVTL3gz1ESRC6RbJqilee3fPbPIFLyFoBCpBjbGeUptmDnv0EQap0u1zfweOQw',
            'grant_type' => 'client_credentials',
            'audience' => '7a14b6a2-73b8-4ab2-a610-80fb9f40f769',
            'scope' => 'https://api.thomsonreuters.com/auth/reutersconnect.contentapi.read https://api.thomsonreuters.com/auth/reutersconnect.contentapi.write',
        )),
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
    ));

    if (is_wp_error($response)) {
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Only stores the token, which comes from $data
    if (isset($data['access_token'])) {
        return $data['access_token'];
    } else {
        return false;
    }
}

function return_posts_id() {
    // Uses the token and checks if it exists
    $token = get_token_authentication();
    if (!$token) {
        return;
    }
	
    $url = 'https://api.reutersconnect.com/content/graphql';
    // Performs a query in the api to list the VersionedGuid of the posts
    $graphql_query = <<<GRAPHQL
    query MyQuery {
        search (
		limit: 10,
            filter: {channel: "Qzf566",  mediaTypes: TEXT}
            ) {
            items {
                headLine
                versionedGuid
                
            } 
        }   
    } 
GRAPHQL;

    $response = wp_remote_post($url, array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode(array('query' => $graphql_query)),
    ));
    if (is_wp_error($response)) {
        return;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
	
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	
    // Checks if the data items exist, executes a loop and stores the versionedGuid in an object
    if (isset($data['data']['search']['items']) && is_array($data['data']['search']['items'])) {
        foreach ($data['data']['search']['items'] as $post) {
            $versionedGuid[] = $post['versionedGuid'];
        }
    } else {
        echo 'Nenhum item encontrado.';
    }
    return $versionedGuid;
}

function return_posts() {
    // Uses and checks if there are posts coming from return_posts_id();
    $versionedGuidList = return_posts_id();

    if (empty($versionedGuidList)) {
        echo 'Nenhum versionedGuid encontrado.';
        return;
    }

    $token = get_token_authentication();

    if (!$token) {
        return;
    }

    $url = 'https://api.reutersconnect.com/content/graphql';
    // Uses a query to bring up the details of each post, based on versionedGuid
    foreach ($versionedGuidList as $versionedGuid) {
        $graphql_query = <<<GRAPHQL
        query MyQuery {
            item(
                id: "$versionedGuid"
                option: {previewMode: DIRECT}
            ) {
                headLine
                previewUrl
                versionedGuid
                dateLine
                bodyXhtml
            }
        }
GRAPHQL;

        $response = wp_remote_post($url, array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ),
            'body' => json_encode(array('query' => $graphql_query)),
        ));

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        // It stores all the data provided and passes it via a parameter to the create_post() function;
        $title = $data['data']['item']['headLine'];
        $bodyContent = $data['data']['item']['bodyXhtml'];
        
        $formatedContent = strip_tags($bodyContent, '<p>');
        
        create_post($title, $formatedContent);
       
    }
}

function post_by_content($content) {
    global $wpdb;

    $cleaned_content = strtolower(trim($content));

    $post_id = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = 'custom_content_key' AND LOWER(TRIM(meta_value)) LIKE %s",
            '%' . $cleaned_content . '%'
        )
    );

    if ($post_id !== null) {
        $post_title = get_the_title($post_id);
        echo 'Post encontrado! Título: ' . $post_title;
    } else {
        echo 'Post não encontrado.';
    }

    return $post_id !== null ? $post_id : false;
}

function create_post($title, $formatedContent) {
    $existing_post_id = post_by_content($formatedContent);

    $siteUrl = "https://$_SERVER[HTTP_HOST]";
    if (!$existing_post_id) {
        $post_data = array(
            'post_title'    => $title,
            'post_status'   => 'draft',
            'post_type'     => 'post',
            'post_author'   => 61,
            'post_content'  => $formatedContent
        );

        $post_id = wp_insert_post($post_data);
        if (!is_wp_error($post_id)) {
            update_post_meta($post_id, 'custom_content_key', $formatedContent);

            // Check image and acf ids "Veja Também"
            $imageId = '546811';
            $vejaTambem = '102288';
            if (strpos($siteUrl, 'hml') !== false) {
                $imageId = '523467';
                $vejaTambem = '13579';
            }

            update_field('veja_tambem_tag_list', $vejaTambem, $post_id);
            set_post_thumbnail($post_id, $imageId);
            wp_set_post_categories($post_id, array(5));
            wp_set_post_tags($post_id, 'Reuters', true);

            echo 'Post criado com sucesso: <br>';
            echo '<h3>' . get_the_title($post_id) . '</h3><br>';
            echo '<div>' . apply_filters('the_content', $formatedContent) . '</div><br>';
            echo '<br>';
            echo '<br><hr>';
        } else {
            echo 'Erro ao criar o post: ' . $post_id->get_error_message() . '<br>';
        }
    } else {
        echo '<br><br>Post já existe <br><br>';
        echo '<br><hr>';
    }
}



function schedule_custom_cron() {
    if (!wp_next_scheduled('cron_reuters')) {
        wp_schedule_event(time(), '7minutes', 'cron_reuters');
    }
}
add_action('wp', 'schedule_custom_cron');

function custom_cron_intervals($schedules) {
    $schedules['7minutes'] = array(
        'interval' => 420,
		'display'  => esc_html__('A cada 7 minutos'),
    );
    return $schedules;
}
add_filter('cron_schedules', 'custom_cron_intervals');

function run_cron_job() {
    // Executes the return_posts function only when cron is triggered
    return_posts();

    error_log('OK', 0);
}
add_action('cron_reuters', 'run_cron_job');
