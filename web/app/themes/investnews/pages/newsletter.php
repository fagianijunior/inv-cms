<?php 
	/* Template Name: Newsletter */
	get_header(); 

	function get_category_name($category) {
		$category_slug = $category[0]->slug;
		$category_name = $category[0]->cat_name;
		$slugs_to_convert = array("conta-melhores-momentos", "cafeina-melhores-momentos");
		return in_array($category_slug, $slugs_to_convert) ? 'vídeos': $category_name;
	}
?>

<div id="mvp-article-cont" class="container">
    <div class="mvp-main-box">
        <section class="news-conteudo">
            <div class="container-conteudo__busca">
                <h1>O melhor do InvestNews no seu e-mail.</h1>
                <p class="page_newsletter_subtitle">Uma curadoria especial do que você precisa saber antes de começar o dia.</p>

                <div class="form_holder_newsletter">
                    <form action="" class="page_newsletter notifyMe" id="newsletter-form" method="POST">
                        <input type="text" id="emailnews" required name="email_address_" onfocus="this.placeholder = &#39;&#39;" onblur="this.placeholder = &#39;Digite seu e-mail&#39;" class="carteiras__newsletter__email" placeholder="Digite seu e-mail"></input>
                        <input type="hidden" name="form_event" value="form_submit_newsletter">
                        <input type="hidden" name="form_position" value="page_newsletter">
                        <button aria-label="Entrar" id="saveContatoButton" class="button-letter-icon">
                            <span class="text">INSCREVA-SE</span>
                        </button>
                    </form>
                    <p class="disclaimer_newsletter">*Ao clicar em “Inscreva-se” você estará concordando com a <a href="<?php echo get_option('home'); ?>/politica-de-privacidade" aria-label="Entrar" title="Política de privacidade" target="_blank">Política de privacidade</a>.</p>
                </div>

                <div class="container-conteudo__busca__info">
                    <h2>Continue navegando pelos artigos:</h2>
                    <p>confira abaixo as matérias mais lidas no InvestNews</p>
                </div>
            </div>
        </section>
        <div class="news-page">
            <div class="mvp-feat1-list-head-wrap left relative">
                <ul class="mvp-feat1-list-buts left relative title_lidas">
                    <li class="mvp-feat-col-tab">
                        <a href="#mvp-feat-tab-col1" aria-label="Entrar">
                            <h2 class="title-h2">Mais lidas</h2>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="d-grid">
                <?php 
                $args = array(
                    'post_type' => array('post', 'guias'),
                    'posts_per_page' => '4',
                    'ignore_sticky_posts'=> 1
                );
                $recent = new WP_Query($args);
                while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; if (isset($do_not_duplicate)) { ?>
                    <a href="<?php the_permalink(); ?>" aria-label="Entrar" rel="bookmark">
                        <div class="mvp-widget-feat1-bot-story left relative">
                            <div class="mvp-widget-feat1-bot-img left relative">
                                <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                    <?php the_post_thumbnail('mvp-mid-thumb', array( 'class' => 'mvp-reg-img lazy' )); ?>
                                    <?php the_post_thumbnail('mvp-small-thumb', array( 'class' => 'mvp-mob-img lazy' )); ?>
                                <?php } ?>
                                <?php if ( has_post_format( 'video' )) { ?>
                                    <div class="mvp-vid-box-wrap mvp-vid-box-mid mvp-vid-marg">
                                        <i class="fa fa-2 fa-play" aria-hidden="true"></i>
                                    </div><!--mvp-vid-box-wrap-->
                                <?php } else if ( has_post_format( 'gallery' )) { ?>
                                    <div class="mvp-vid-box-wrap mvp-vid-box-mid">
                                        <i class="fa fa-2 fa-camera" aria-hidden="true"></i>
                                    </div><!--mvp-vid-box-wrap-->
                                <?php } ?>
                            </div><!--mvp-widget-feat1-bot-img-->
                            <div class="mvp-widget-feat1-bot-text left relative">
                                <div class="mvp-cat-date-wrap left relative">
                                    <span class="mvp-cd-cat left relative">
                                        <?php 
                                            if ($post_type === 'investflix') {
                                                echo 'INVESTFLIX';
                                            } elseif ($post_type === 'todosjuntos') {
                                                echo '#TodosJuntos';
                                            } elseif ($post_type === 'web-story') {
                                                echo 'Web Stories';
                                            } elseif ($post_type === 'guias') {
                                                echo 'Guias';
                                            } else {
                                                $category = get_the_category();
                                                echo esc_html(get_category_name($category));
                                            }
                                        ?>
                                    </span>
                                </div><!--mvp-cat-date-wrap-->
                                <h3><?php the_title(); ?></h3>
                            </div><!--mvp-widget-feat1-bot-text-->
                        </div>
                    </a>
                <?php } endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>