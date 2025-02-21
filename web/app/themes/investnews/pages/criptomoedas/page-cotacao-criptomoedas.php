<?php
/* 
  Template Name: Página de criptomoedas
  */
get_header();

// All criptomoedas data
$data_full = access_cripto_data();

// Selected criptos
$listagem_de_criptomoedas = get_field('listagem_de_criptomoedas');

// Get selected cripto IDs
if ($listagem_de_criptomoedas) {
  foreach ($listagem_de_criptomoedas as $criptomoeda) {
      $ids_criptomoeda[] = get_field('id_criptomoeda', $criptomoeda);
  }
} else {
  $ids_criptomoeda = []; // ou manipule de outra forma
}

//transform data format to adequate
if (!empty($data_full['data'])) {
  foreach ($data_full['data'] as $data__c) {
    if (isset($data__c[0])) {
      $data_child = $data__c[0];
      foreach ($ids_criptomoeda as $key => $criptomoeda_wp) {
        if ($criptomoeda_wp == strtolower($data_child['name'])) {
          $data_temp = array();
          $data_temp['name']              = $data_child['name'];
          $data_temp['id']                = $listagem_de_criptomoedas[$key];
          $data_temp['brl']               = $data_child['quote']['BRL']['price'];
          $data_temp['usd']               = $data_child['quote']['USD']['price'];
          $data_temp['brl_market_cap']    = $data_child['quote']['USD']['market_cap'];
          $data_temp['brl_24h_vol']       = $data_child['quote']['USD']['volume_24h'];
          $data_temp['brl_24h_change']    = $data_child['quote']['USD']['percent_change_24h'];
          $selected_criptos[$criptomoeda_wp] = $data_temp;
        }
      }
    } else {
      continue; // Pule se `$data__c[0]` não existir
    }
  }
} else {
  // Defina como vazio ou retorne um aviso
  $data_full['data'] = [];
}

$maiores_baixas = $selected_criptos;
array_sort_by_column($maiores_baixas, 'brl_24h_change');

$maiores_altas = $selected_criptos;
array_sort_by_column($maiores_altas, 'brl_24h_change', SORT_DESC);

?>

<div class="container">
  <?php
  if (!isset($selected_criptos) || count($selected_criptos) <= 0) {
  ?>
    <div class='warning-box grey'>
      <p>Estamos enfrentando problemas na leitura da API responsável por mostrar dados nesta página, o que pode afetar a exibição de informações atualizadas. Nossa equipe está trabalhando na resolução do problema. Enquanto isso, você pode continuar navegando normalmente.</p>
    </div>
  <?php
  }
  ?>
  <div class="post-head-criptomoedas">
    <div class="post-head-criptomoedas-inner">
      <div class="head-criptomoedas-title">
          <h1><?php the_title(); ?></h1>
          <div class="description">
            <p>Acompanhe a cotação do bitcoin, do ethereum e de diversas outras criptomoedas em tempo real.</p>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
        
    <div class="post-content-wrap-criptomoedas">

      <div class="post-body-criptomoedas">
        <div class="tabs-cripto">

          <ul id="tabs-cripto-nav">
            <li><a href="#tab1" aria-label="Entrar">Visão Geral</a></li>
            <li><a href="#tab2" aria-label="Entrar">Maiores Altas</a></li>
            <li><a href="#tab3" aria-label="Entrar">Maiores Baixas</a></li>
          </ul>

          <div id="tabs-cripto-content">
            <div id="tab1" class="tab-content">
              <?php create_TabelaResponsiva_CotacaoCripto($selected_criptos) ?>
            </div>
            <div id="tab2" class="tab-content" style="display: none;">
              <?php create_TabelaResponsiva_CotacaoCripto($maiores_baixas) ?>
            </div>
            <div id="tab3" class="tab-content" style="display: none;">
              <?php create_TabelaResponsiva_CotacaoCripto($maiores_altas) ?>
            </div>
          </div>

        </div>
        <script>
        // Cripto tabs-cripto
        window.onload = function() {
          // Show the first tab and hide the rest
          jQuery('#tabs-cripto-nav li:first-child').addClass('active');
          jQuery('.tab-content').hide();
          jQuery('.tab-content:first').show();
          // Click function
          jQuery('#tabs-cripto-nav li').click(function() {
            jQuery('#tabs-cripto-nav li').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('.tab-content').hide();
            var activeTab = jQuery(this).find('a').attr('href');
            jQuery(activeTab).fadeIn();
            return false;
          });
        }
        </script>
        <section class="container--special-text">
          <div>
            <?php if (have_rows('conteudo_de_cotacao_criptomoedas')) : ?>
              <?php while (have_rows('conteudo_de_cotacao_criptomoedas')) : the_row(); ?>
                <div class="item_tab">

                  <button aria-label="Entrar" class="accordion accordion_sua_selecao">
                    <h2><?php the_sub_field('titulo') ?></h2>
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/plus.svg" class="icon plus" alt="Expandir">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/minus.svg" class="icon minus desactive" alt="Expandir">
                  </button>
                  <div class="panel">
                    <?php the_sub_field('conteudo') ?>
                  </div>
                </div>

              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </section>
      </div>

      <!-- sidebar -->
      <div class="post-sidebar-criptomoedas">
        &nbsp;
      </div>
      <!-- end sidebar -->

    </div><!--content-wrap-->

</div><!--container-->

<div class="container">
  <section class="post-related-news">
    <h3 class="post-related-news-title">Últimas Notícias - Criptomoedas</h3>
    <div class="post-related-news-inner">
      <?php global $do_not_duplicate;
      global $post;
      $recent = new WP_Query(array('tag_slug__and' => 'criptomoedas', 'posts_per_page' => '4', 'post__not_in' => $do_not_duplicate, 'ignore_sticky_posts' => 1));
      while ($recent->have_posts()) : $recent->the_post();
        $do_not_duplicate[] = $post->ID;
        if (isset($do_not_duplicate)) { ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <div class="related-news-item">
              <div class="related-news-img">
                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                  <?php the_post_thumbnail('mid-thumb', array('class' => 'reg-img lazy')); ?>
                <?php } ?>
              </div>
              <div class="related-news-text">
                <div class="related-news-cat-date">
                  <span class="related-news-cat"><?php $category = get_the_category(); echo esc_html($category[0]->cat_name); ?></span> / <span class="related-news-date"><?php printf(esc_html__('%s atrás', 'invest-news'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></span>
                </div>
                <h2 class="related-news-title"><?php the_title(); ?></h2>
                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
              </div>
            </div>
          </a>
      <?php }
      endwhile;
      wp_reset_postdata(); ?>
    </div>
  </section>
</div>
<?php get_footer(); ?>