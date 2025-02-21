<?php
if (function_exists('acf_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Configurações Perfis',
        'menu_title' => 'Configurações Perfis',
        'menu_slug' => 'perfis-configuracoes',
        'capability' => 'edit_posts',
        'parent_slug' => 'edit.php?post_type=perfis',
        'position' => false,
        'icon_url' => 'dashicons-cloud-upload',
        'redirect' => false,
    ));
    // Ferramentas
    acf_add_options_page(array(
        'page_title' 	=> 'Ferramentas InvestNews',
        'menu_title' 	=> 'Ferramentas InvestNews',
        'menu_slug' 	=> 'ferramentas-investnews',
        'capability' 	=> 'edit_posts',
        'redirect'	=> false,
        'icon_url' 	=> 'dashicons-hammer',
    ));
}

/**
 * @Desc: Register ACF fields for CPT/Criptomoedas
 */
if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
        'key' => 'group_detalhes_criptomoedas',
        'title' => 'Detalhes da Criptomoeda',
        'fields' => array(
            array(
                'key' => 'field_id_criptomoeda',
                'label' => 'ID da Criptomoeda',
                'name' => 'id_criptomoeda',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_ticker_criptomoeda',
                'label' => 'Ticker da Criptomoeda',
                'name' => 'ticker_criptomoeda',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_tv_symbol_criptomoeda',
                'label' => 'Tradingview Symbol da Criptomoeda',
                'name' => 'tv_symbol_criptomoeda',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'criptomoedas',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    /**
     * @Desc: Register ACF fields for Social Media Embed Gutenberg block
     */
    acf_add_local_field_group(array(
        'key' => 'group_social_media_embed',
        'title' => 'Social Media Embed',
        'fields' => array(
            array(
                'key' => 'field_social_media_type',
                'label' => 'Selecionar rede social',
                'name' => 'social_media_type',
                'type' => 'select',
                'choices' => array(
                    'instagram' => 'Instagram',
                    'twitter' => 'X (Twitter)',
                    'facebook' => 'Facebook',
                    'tiktok' => 'TikTok',
                    'linkedin' => 'LinkedIn',
                ),
                'required' => 1,
            ),
            array(
                'key' => 'field_post_url',
                'label' => 'URL da postagem',
                'name' => 'post_url',
                'type' => 'url',
                'required' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/social-media-embed',
                ),
            ),
        ),
    ));
endif;
