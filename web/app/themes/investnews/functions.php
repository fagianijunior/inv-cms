<?php
/**
 * Theme Name: Investnews
 * Description: Investnews Theme
 * Author: Investnews
 * Author URI: https://investnews.com.br
 * Version: 1.0.0
 *
 * 1. Custom Templates
 *  - add_custom_templates
 *  - load_custom_template
 *  - load_archive_template
 *  - load_single_template
 * 2. ACF (Options)
 * 3. Enqueue (CSS/JS)
 * 4. Helpers (Menus, Theme-Support)
 * 5. Post-Types (Acoes, Criptomoedas, Simulador Ativos, Perfis)
 */


// Custom templates route
include_once('functions/page-routes.php');

// ACF
include_once('functions/acf.php');

// Enqueue
include_once('functions/enqueue.php');

// Admin
include_once('functions/admin.php');

// Helpers
include_once('functions/helpers/menus.php');
include_once('functions/helpers/theme-support.php');
include_once('functions/helpers/pagination.php');
include_once('functions/helpers/shortcodes.php');
include_once('functions/helpers/acf-filters.php');
include_once('functions/helpers/posts.php');
include_once('functions/helpers/quotations.php');
include_once('functions/helpers/yahu.php');
include_once('functions/helpers/redirect-tags.php');
include_once('functions/helpers/elements-counter-on-admin.php');
include_once('functions/helpers/rankmath-filters.php');
include_once('functions/helpers/delete-block-comments.php');
include_once('functions/helpers/api-investnews.php');
include_once('functions/helpers/tax-autores-wsj.php');
include_once('functions/helpers/newsletter-csv.php');

// Post-Types
include_once('custom/post-types/acoes.php');
include_once('custom/post-types/criptomoedas.php');
include_once('custom/post-types/simulador-ativos.php');
include_once('custom/post-types/perfis.php');
include_once('custom/post-types/guias.php');
include_once('custom/post-types/infograficos.php');
include_once('custom/post-types/patrocinados.php');
include_once('custom/post-types/contato-news.php');

// Gutenberg Blocks
include_once('functions/gutenberg-blocks/config.php');

// Integrations
include_once('functions/integrations/coinmarketcap.php');
include_once('functions/integrations/active-campaign.php');
include_once('functions/integrations/yahu/api.php');
include_once('functions/integrations/simulador-bot.php');


// Integrations Reuters
include_once('functions/integrations/reuters/integrations-reuters.php');

// User profiles configurations
include_once('functions/user-profiles.php');

// Remove Guest User option of Co Author Plus plugin 
include_once('functions/co-authors-plus.php');

// Related-posts component
include_once('components/on-code/related-posts/related-posts.php');

