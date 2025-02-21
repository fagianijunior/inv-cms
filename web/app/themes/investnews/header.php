<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="google-site-verification" content="yT1rKoWz89EuYh7TjpIXGguK4cWeXAEpf1qFl8kP0Bc" />
	<meta name="viewport" id="viewport" content="width=device-width" />
	<meta name="google-site-verification" content="roTpQQ5Qcv4KfDN_kZ5F06wCdETOwNUh2dpd6_7volM" />
	<meta name="Googlebot-News" content="index, follow" />
	<?php if (!function_exists('has_site_icon') || !has_site_icon()) {
		if (get_option('mvp_favicon')) { ?>
			<link rel="shortcut icon" href="<?php echo esc_url(get_option('mvp_favicon')); ?>" />
	<?php }
	} ?>
	<?php wp_head(); ?>
	<?php if (is_paged()) { ?>
		<meta name="robots" content="noindex,follow" />
	<?php } ?>
	<link href='<https://www.facebook.com>' rel='preconnect' />
	<link href='<https://www.google-analytics.com>' rel='preconnect' />
	<link href='<https://www.ajax.googleapis.com>' rel='preconnect' />
	<link href='<https://www.googleapis.com>' rel='preconnect' />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
	<script>
	window.dataLayer = window.dataLayer || [];
	</script>
	<?php if(is_single()){ 
		global $post;
		$post_id = get_the_ID();
		$post_tags = get_the_tags($post_id);
		if ( $post_tags ) { 
			foreach( $post_tags as $tag ) { 
				$tag_id = $tag->term_id;
				$tag_link = get_tag_link($tag_id);
				$tag_name = $tag->name;
			}
		}
		$category = 	get_the_category(); 
		if($category) {
			$first_category_name = $category[0]->cat_name;
		}
		$coauthors = get_coauthors(); 
		foreach ($coauthors as $coauthor) {
            $author_name = get_the_author_meta('display_name');
		}
	?>
	<script>
		window.dataLayer.push({
			post_title: '<?php the_title();?>',
			autor: '<?php echo $author_name ?>',
			categoria: '<?php echo $first_category_name ?>',
			topico_principal: '<?php if($tag_name){ echo $tag_name; }  ?>',
		});
	</script>
	<?php } ?>
	<!-- Google Tag Manager -->
	<script>

	function loadGTM() {
		var my_GTM_id = 'GTM-WGWPT6C';
		(function (w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(), event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s), dl = l !== 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', my_GTM_id);
	}

	setTimeout(() => {
		if (typeof jQuery !== "undefined") {
			jQuery(loadGTM);
		} else {
			loadGTM();
		}
	}, 3000);
	</script>

	<!-- End Google Tag Manager -->
	 
	<!-- FigPii Asynchronous Tracking Code -->
	<!-- <script>!function(){var n=document.createElement('script');n.crossOrigin='anonymous',n.async='async',n.src='https://tracking-cdn.figpii.com/1738b15aa03cd959b2d170c2b8fcf411.js',document.head.append(n),window._fpEvent=window._fpEvent||[]}();</script> -->
	<!-- End FigPii Asynchronous Tracking Code -->
	<?php if (is_front_page() || is_page_template('pages/ultimas.php')): ?>
    	<meta http-equiv="refresh" content="300">
	<?php endif; ?>
</head>

<body <?php body_class(''); ?>>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WGWPT6C" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

	<?php if(is_singular('post') || is_singular('infograficos') || is_singular('patrocinados') || is_post_type_archive('patrocinados')){ ?>
		<?php include_once('header/header-slim.php'); ?>
	<?php } else { ?>
		<?php include_once('header/header-default.php'); ?>
	<?php } ?>