<?php
/* Template Name: Simulador de aposentadoria */
get_header();

global $post;
$recent = new WP_Query(array(
  'post_type' => array('post'),
  'posts_per_page' => '4',
  'ignore_sticky_posts' => 1,
  "orderby" =>  "post_date",
  "order"   =>  "DESC",
  'tax_query' => array(
    array(
      'taxonomy' => 'post_tag',
      'field' => 'slug',
      'terms' => 'aposentadoria'
    )
  )
));
function get_category_name($category)
{
  $category_slug = $category[0]->slug;
  $category_name = $category[0]->cat_name;
  $slugs_to_convert = array("conta-melhores-momentos", "cafeina-melhores-momentos");
  return in_array($category_slug, $slugs_to_convert) ? 'vídeos' : $category_name;
}
?>
<main>
  <section class="pre_hero">
    <div class="container">
      <div class="content_prehero">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="description">
          Comece a simular sua aposentadoria com a calculadora abaixo e descubra quanto dinheiro é possível acumular e qual renda você consegue ter para se aposentar. Comece a planejar sua própria previdência, sem depender exclusivamente do INSS. Neste gráfico, você consegue ver a curva de construção do seu patrimônio financeiro.
        </div>
      </div>
    </div>
  </section>

  <section class="container simulador-aposentadoria-container">
    <iframe id="simulador-aposentadoria" src="https://aposentadoria.investnews.com.br/" width="100%" height="700px" frameborder="0"></iframe>
  </section>

  <section class="container simulador-aposentadoria-content">
    <?php echo get_the_content(); ?>
  </section>

  <section class="recent-posts" class="container">
    <div class="container">
      <h3>
        Últimas Notícias
      </h3>
      <div class="recent-posts-wrapper">
        <div class="recent-posts-items">
          <?php
          while ($recent->have_posts()) : $recent->the_post(); ?>
            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" aria-label="Entrar" rel="bookmark" class="post-item">
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
    </div>
  </section>
</main>

<?php get_footer(); ?>