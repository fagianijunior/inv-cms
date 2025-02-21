<?php

// Filtrar apenas os posts dos ultimos 30 dias
function acf_relationship_filter_by_last_days_IN( $args, $field, $post_id ) {
    $args['orderby'] = 'date'; // Ordenar os posts por data de publicação
    $args['order'] = 'DESC'; // Ordenar os posts por data de publicação, do mais recente para o mais antigo
    $args['posts_per_page'] = 10; // Exibir inicialmente apenas 10 itens
	$args['post_status'] = 'publish'; // Exibir apenas os posts publicados
	$args['date_query'] = array( 
        'after' => '90 days ago',
        'inclusive' => true
    ); // Exibir apenas os posts dos ultimos 90 dias

    return $args;
}

// Filtros para a lista de posts do componente 'three-featured-columns'
add_filter('acf/fields/relationship/query/name=post_item', 'acf_relationship_filter_by_last_days_IN', 10, 3);
add_filter('acf/fields/relationship/query/name=posts_relacionados', 'acf_relationship_filter_by_last_days_IN', 10, 3);
add_filter('acf/fields/relationship/query/name=post_list_item', 'acf_relationship_filter_by_last_days_IN', 10, 3);

// Filtros para a lista de posts do componente 'simple-list'
add_filter('acf/fields/relationship/query/name=simple_post_item', 'acf_relationship_filter_by_last_days_IN', 10, 3);

// Filtros para a lista de posts do componente 'middle-page'
add_filter('acf/fields/relationship/query/name=current_post', 'acf_relationship_filter_by_last_days_IN', 10, 3);
## add_filter('acf/fields/relationship/query/name=post_item', 'acf_relationship_filter_by_last_days_IN', 10, 3); // Como utiliza o mesmo nome, o mesmo ja herda do filtro criado no componente de 'three-featured-columns'

// Filtros para a lista de posts do componente 'recirculation-list'
## add_filter('acf/fields/relationship/query/name=post_item', 'acf_relationship_filter_by_last_days_IN', 10, 3); // Como utiliza o mesmo nome, o mesmo ja herda do filtro criado no componente de 'three-featured-columns'


// Filtrar apenas os posts dos ultimos 90 dias - Reuters
function relationship_order_investnews_reuters( $args, $field, $post_id ) {
	
    
    $args['orderby'] = 'date'; // Ordenar os posts por data de publicação
    $args['order'] = 'DESC'; // Ordenar os posts por data de publicação, do mais recente para o mais antigo
    $args['posts_per_page'] = 10; // Exibir inicialmente apenas 10 itens
	$args['author__in'] = array(61); // Exibir apenas os posts do user de ID 61 (Reuters)
	$args['post_status'] = 'publish'; // Exibir apenas os posts publicados
	$args['date_query'] = array( 
        'after' => '90 days ago',
        'inclusive' => true
    ); // Exibir apenas os posts dos ultimos 90 dias
	
    // return
    return $args;
    
}