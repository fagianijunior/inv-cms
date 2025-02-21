<?php
get_header();

$recent = new WP_Query(array(
  'post_type' => array('post'),
  'posts_per_page' => '4',
  'ignore_sticky_posts' => 1,
  'status' => 'publish'
));

function get_category_name($category)
{
  $category_slug = $category[0]->slug;
  $category_name = $category[0]->cat_name;
  $slugs_to_convert = array("conta-melhores-momentos", "cafeina-melhores-momentos");
  return in_array($category_slug, $slugs_to_convert) ? 'vídeos' : $category_name;
}
?>
<div id="mvp-article-wrap">
  <div id="mvp-article-cont" class="left relative">
    <div class="container" style="margin-bottom: 80px;">
      <section class="container-conteudo">
        <div class="container-conteudo__busca">
          <h1>Ops!<span class="display-br"><br></span> O conteúdo não foi encontrado.</h1>
          <p>Desculpe, o link que você seguiu pode estar quebrado ou a página pode ter sido removida. Gostaria de realizar uma busca?</p>
          <div class="container-conteudo__busca__input">
            <form method="get" id="searchform" action="<?php echo esc_url(home_url('')); ?>/">
              <button aria-label="Entrar" type="submit" class="button-search-input"><i class="fa fa-search"> </i></button>
              <input type="text" name="s" id="s" value="<?php esc_html_e('Buscar', 'invest-news'); ?>" onfocus='if (this.value == "<?php esc_html_e('Buscar', 'invest-news'); ?>") { this.value = ""; }' onblur='if (this.value == "") { this.value = "<?php esc_html_e('Buscar', 'invest-news'); ?>"; }' />
              <input type="hidden" id="searchsubmit" value="<?php esc_html_e('Buscar', 'invest-news'); ?>" />
            </form>
          </div>
          <div class="container-conteudo__busca__button">
            <a href="<?php echo get_permalink(); ?>" aria-label="Entrar"><button aria-label="Entrar">Ou voltar à página principal</button></a>
          </div>
        </div>
      </section><!--mvp-404-->

      <!-- Últimas Noticias -->

      <section class="recent-posts" class="container">
        <h3>
          Mais lidas
        </h3>
        <div class="recent-posts-wrapper">
          <div class="recent-posts-items">
            <?php
            while ($recent->have_posts()) : $recent->the_post(); ?>
              <a href="<?php the_permalink(); ?>" aria-label="Entrar" rel="bookmark" class="post-item">
                <div class="post-item-thumb">
                  <img
                    src="<?php echo get_the_post_thumbnail_url(); ?>"
                    alt="<?php the_title(); ?>"
                    width="308"
                    height="180">
                </div>
                <div class="post-item-content">
                  <div class="post-item-tag">
                    <span>
                      <?php
                      $category = get_the_category();
                      echo esc_html($category[0]->cat_name);
                      ?>
                    </span>
                  </div>
                  <h2>
                    <?php the_title(); ?>
                  </h2>
                  <p>
                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                  </p>
                </div>
              </a>
            <?php
            endwhile;
            wp_reset_postdata(); ?>
          </div>
        </div>
      </section>
      <div class="container-categorias">
        <div class="container-categorias__title">
          <h2 class="title-h2">Navegue por categorias</h2>
        </div>
        <div class="container-categorias__cat">
          <div class="container-categorias__cat-h3">
            <a href="<?php echo get_category_link(5); ?>" aria-label="Entrar">
              <h3>Economia</h3>
            </a>
          </div>
          <div class="container-categorias__cat-h3">
            <a href="<?php echo get_category_link(4); ?>" aria-label="Entrar">
              <h3>Finanças</h3>
            </a>
          </div>
          <div class="container-categorias__cat-h3">
            <a href="<?php echo get_category_link(6); ?>" aria-label="Entrar">
              <h3>Negócios</h3>
            </a>
          </div>
          <div class="container-categorias__cat-h3 guias">
            <a href="<?php echo get_permalink(263439); ?>" aria-label="Entrar">
              <h3>Guia Financeiro</h3>
            </a>
          </div>
          <div class="container-categorias__cat-h3">
            <a href="<?php echo get_category_link(1563); ?>" aria-label="Entrar">
              <h3>Análises</h3>
            </a>
          </div>
        </div>
      </div>
      <?php echo get_template_part('components/on-code/newsletter/newsletter'); ?>

    </div><!--mvp-article-cont-->
  </div><!--mvp-article-wrap-->
  <?php get_footer(); ?>