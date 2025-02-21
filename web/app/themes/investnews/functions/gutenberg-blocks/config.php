<?php

// Creation of the group for the components 
add_filter( 'block_categories_all', 'investnews_block_category' );

function investnews_block_category( $blocks ) {

    // create a new array element with anything as its index
	$new = array(
		'literallyanything' => array(
			'slug' => 'investnews-blocks',
		    'title' => 'Componentes InvestNews'
		)
	);

	// just decide here at what position your custom category should appear
	$position = 0; //first item

	$blocks = array_slice( $blocks, 0, $position, true ) + $new + array_slice( $blocks, $position, null, true );

	// reset array indexes
	$blocks = array_values( $blocks );

	return $blocks;
	
}


add_action('acf/init', 'investnews_acf_init');
function investnews_acf_init() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register block - three-featured-columns
        acf_register_block(array(
            'name'              => 'three-featured-columns',
            'title'             => __('Colunas em destaque'),
            'description'       => __('Componente de colunas em destaque'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts' ),
            'example'  => array(
	            'attributes' => array(
	                'mode' => 'preview',
	                'data' => array(
	                	'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/author-list/preview.png',
	                )
	            )
            ),
        ));

     

        // register block - simple-list
        acf_register_block(array(
            'name'              => 'simple-list',
            'title'             => __('Lista simples'),
            'description'       => __('Componente de lista simples para até 4 itens'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'list', 'simple' ),
            'example'  => array(
	            'attributes' => array(
	                'mode' => 'preview',
	                'data' => array(
	                	'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/author-list/preview.png',
	                )
	            )
            ),
        ));


        // register block - middle-page
        acf_register_block(array(
            'name'              => 'middle-page',
            'title'             => __('Meia Página'),
            'description'       => __('Componente de meia página, com duas colunas para itens'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'list', 'half', 'half-page', 'middle-page' ),
        
            'example'  => array(
	            'attributes' => array(
	                'mode' => 'preview',
	                'data' => array(
	                	'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/middle-page/preview.png',
	                )
	            )
            ),
        ));

        // register block - gallery
        acf_register_block(array(
            'name'              => 'gallery',
            'title'             => __('Galeria de imagens'),
            'description'       => __('Componente de slider para galeria de imagens'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'images', 'list', 'gallery' ),
            'enqueue_assets' => function(){
                wp_enqueue_script( 'gallery-script', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/gallery/assets/js/gallery.js', array('jquery', 'swiper-script'), microtime(), true );
                wp_enqueue_script( 'swiper-script', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.js', array('jquery'), '8.2.4', true );
            },
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/gallery')) {
                wp_enqueue_style( 'gallery-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/gallery/assets/css/gallery.css', array('swiper-style') );
                wp_enqueue_style( 'swiper-style', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.css', array(), '8.2.4', 'all');
            }
        });
        

        // register block - author-list
        acf_register_block(array(
            'name'              => 'author-list',
            'title'             => __('Lista de autores'),
            'description'       => __('Componente de lista simples de autores'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'list', 'simple', 'authors' ),
            'example'  => array(
	            'attributes' => array(
	                'mode' => 'preview',
	                'data' => array(
	                	'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/author-list/preview.png',
	                )
	            )
            ),
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/author-list')) {
                wp_enqueue_style( 'author-list-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/author-list/assets/css/author-list.css', array(), THEME_VERSION );     
            }
        });

        // register block - opinion-list
        acf_register_block(array(
            'name'              => 'opinion-list',
            'title'             => __('Opinião'),
            'description'       => __('Componente de lista simples para até 4 itens de opinião'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'list', 'simple', 'authors', 'opinion', 'columnists' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/opinion-list/preview.png',
                    )
                )
            ),
        ));
        // register block - off-grid-image
        acf_register_block(array(
            'name'              => 'off-grid-image',
            'title'             => __('Imagem fora do grid'),
            'description'       => __('Componente de imagem simples com largura superior ao grid do conteúdo de post'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'image', 'simple'  ),
            'enqueue_assets' => function(){
                wp_enqueue_style( 'off-grid-image-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/off-grid-image/assets/css/off-grid-image.css', array(), THEME_VERSION);
            },
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/off-grid-image/preview.png',
                    )
                )
            ),
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/off-grid-image')) {
                wp_enqueue_style( 'off-grid-image-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/off-grid-image/assets/css/off-grid-image.css', array(), THEME_VERSION);
            }
        });

        // register block - Recirculation list
        acf_register_block(array(
            'name'              => 'recirculation-list',
            'title'             => __('Área de recirculação'),
            'description'       => __('Componente de lista de posts para recirculação'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'posts', 'post', 'recirculation', 'list' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/recirculation-list/preview.png',
                    )
                )
            ),
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/recirculation-list')) {
                wp_enqueue_style( 'recirculation-list-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/recirculation-list/assets/css/recirculation-list.css', array(), THEME_VERSION);
            }
        });

        // register block - Quote
        acf_register_block(array(
            'name'              => 'quote',
            'title'             => __('Citação'),
            'description'       => __('Componente para citação com legenda'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'posts', 'post', 'quote', 'mention', 'source', 'text' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/quote/preview.png',
                    )
                )
            ),
        ));


        add_action('enqueue_block_assets', function () {
            if (has_block('acf/quote')) {
                wp_enqueue_style( 'quote-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/quote/assets/css/quote.css', array(), THEME_VERSION);
            }
        });

        // register block - social media embed
        acf_register_block_type(array(
            'name'              => 'social-media-embed',
            'title'             => __('Embed Redes Sociais'),
            'description'       => __('Um bloco personalizado para incorporar postagens de mídia social.'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'category'          => 'investnews-blocks',
            'icon'              => 'share',
            'keywords'          => array( 'social', 'media', 'embed', 'instagram', 'twitter', 'facebook', 'tiktok' ),
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/social-media-embed')) {
                wp_enqueue_script( 'social-media-embed-js', get_template_directory_uri() . '/assets/js/posts/social-media-embed.js', array(), '1.0.0', true );
                wp_enqueue_style( 'social-media-embed-css', get_template_directory_uri() . '/assets/css/posts/social-media-embed.css', array(), '1.0.0' );
            }
        });


        // register block - top video (using in brasil em wall street)
        acf_register_block(array(
            'name'              => 'top-video',
            'title'             => __('Destaque de vídeo'),
            'description'       => __('Compoente com um seletor de episódios e 2 posts'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'image', 'simple'  ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/top-video/preview.png',
                    )
                )
            ),
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/top-video')) {
                wp_enqueue_style( 'top-video-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/top-video/top-video.css', array(), THEME_VERSION);
            }
        });

        // register block - episodes (using in brasil em wall street)
        acf_register_block(array(
            'name'              => 'episodes',
            'title'             => __('Lista de episódios'),
            'description'       => __('Compoente com um seletor de episódios Brasil em Wall Street'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'image', 'simple'  ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/episodes/preview.png',
                    )
                )
            ),
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/episodes')) {
                wp_enqueue_script('swiper-js', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.js', array('jquery'), THEME_VERSION, true);
                wp_enqueue_style('swiper-css', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.css', array(), THEME_VERSION);
                wp_enqueue_style( 'eps-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/episodes/assets/episodes.css', array(), microtime(), 'all' );
                wp_enqueue_script( 'eps-js', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/episodes/assets/episodes.js', array(), '1.0.0', true );
            }
        });

        // register block - list guest (using in brasil em wall street)
        acf_register_block(array(
            'name'              => 'list-interviewees',
            'title'             => __('Lista de entrevistados'),
            'description'       => __('Compoente com um repetidor para cadastrar os entrevitados'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'image', 'simple'  ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/list-interviewees/preview.png',
                    )
                )
            ),
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/list-interviewees')) {
                wp_enqueue_script('swiper-js', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.js', array('jquery'), THEME_VERSION, true);
                wp_enqueue_style('swiper-css', get_template_directory_uri() . '/lib/swiper/swiper-bundle.min.css', array(), THEME_VERSION);
                wp_enqueue_style( 'interviewees-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/list-interviewees/assets/interviewees.css', array(), microtime(), 'all' );
                wp_enqueue_script( 'interviewees-js', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/list-interviewees/assets/interviewees.js', array(), '1.1.0', true );
            }
        });

        // register block - Episodes List Brasil em Wall Street
        acf_register_block(array(
            'name'              => 'episodes-br',
            'title'             => __('Lista de Episódios Recirculação'),
            'description'       => __('Compoente que exibe automaticamente os episódios do programa'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'image', 'simple'  ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/episodes-br/preview.png',
                    )
                )
            ),
        ));

        add_action('enqueue_block_assets', function () {
            if (has_block('acf/episodes-br')) {
                wp_enqueue_style( 'episodes-br-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/episodes-br/eps.css', array(), microtime(), 'all' );
            }
        });

        // register block - tools home
        acf_register_block(array(
            'name'              => 'tools',
            'title'             => __('Lista de Ferramentas'),
            'description'       => __('Compoente que permite adicionar até 4 ferramentas em destaque'),
            'render_callback'   => 'investnews_acf_block_render_callback',
            'mode'              => 'edit',
            'category'          => 'investnews-blocks',
            'icon'              => '<svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#4b22f5" d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z"></path> <path fill="#4b22f5" d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z"></path> <path fill="#4b22f5" d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z"></path> <path fill="#4b22f5" d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z"></path> <path fill="#4b22f5" d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z"></path> <path fill="#4b22f5" d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z"></path> <path fill="#4b22f5" d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z"></path> <circle fill="#4b22f5" cx="204.913" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="364.694" cy="171.616" r="50.635"></circle> <circle fill="#4b22f5" cx="524.474" cy="171.616" r="50.635"></circle> </g> </g></svg>',
            'keywords'          => array( 'featured', 'posts', 'image', 'simple'  ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'investnews_block_preview_image_help' =>  get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/tools/preview.png',
                    )
                )
            ),
        ));

        // add_action('enqueue_block_assets', function () {
        //     if (has_block('acf/tools')) {
        //         wp_enqueue_style( 'tools-style', get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/tools/tools.css', array(), microtime(), 'all' );
        //     }
        // });


        // add_action('enqueue_block_assets', function () {
        //     $styles = [];
        
        //     if (has_block('acf/three-featured-columns')) {
        //         $styles['three-featured-columns-style'] = get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/three-featured-columns/three-featured-columns.css';
        //     }
        
        //     if (has_block('acf/simple-list')) {
        //         $styles['simple-list-style'] = get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/simple-list/simple-list.css';
        //     }
        
        //     if (has_block('acf/middle-page')) {
        //         $styles['middle-page-style'] = get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/middle-page/middle-page.css';
        //     }
        
        //     if (has_block('acf/opinion-list')) {
        //         $styles['opinion-list-style'] = get_template_directory_uri() . '/gutenberg-template-parts/block/block-parts/opinion-list/assets/css/opinion-list.css';
        //     }
        
        //     foreach ($styles as $handle => $url) {
        //         wp_enqueue_style($handle, $url, array(), THEME_VERSION);
        //     }
        
        //     if (!empty($styles)) {
        //         add_action('wp_head', function () use ($styles) {
        //             foreach ($styles as $url) {
        //                 echo '<link rel="preload" href="' . esc_url($url) . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        //                 echo '<link rel="prefetch" href="' . esc_url($url) . '">';
        //             }
                    
        //         });
        //     }
        // });
        
    }
}

function investnews_acf_block_render_callback( $block ) {
    
    // convert name ("acf/ITEM_NAME") into path friendly slug ("ITEM_NAME")
    $slug = str_replace('acf/', '', $block['name']);
    
    // include a template part from within the "gutenberg-template-parts/block" folder
    if( file_exists( get_theme_file_path("/gutenberg-template-parts/block/content-{$slug}.php") ) ) {
        include( get_theme_file_path("/gutenberg-template-parts/block/content-{$slug}.php") );
    }
}
