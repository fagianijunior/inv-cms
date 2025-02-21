<?php
/* 
Template Name: Cotação de Cambio
Template Post Type: acoes
*/
global $post;

get_header();

$recent = new WP_Query(array(
  'tag_slug__and' => 'dolar',
  'posts_per_page' => '4',
  'post__not_in' => [$post->ID],
  'ignore_sticky_posts' => 1,
  'fields' => 'ids',
  'no_found_rows' => true,
  'posts_status' => 'publish'
));
?>

<section class="pre_hero">
  <div class="container">
    <div class="content_prehero">
      <h1 class="title">Câmbio - Cotação de Moedas</h1>
      <div class="description">
        <p>Nesta página do InvestNews você compara a taxa de cotação em tempo real dos pares de moedas
          mais negociadas do mundo e sua relação com o real. Aqui você encontra também as atualizações
          mais recentes dos preços para compra e venda de moedas como o dólar americano (USD), euro,
          libra esterlina, iene, peso argentino, entre outras divisas do mercado. Também é possível
          consultar, em tempo real, qual é a variação percentual do câmbio e em valores correntes.
          Além disso, você encontra a menor e a maior cotação do dia em relação a determinada moeda. O
          dólar dos EUA é o índice monetário usado como referência no mundo para o valor global de
          outras moedas no mundo.</p>
      </div>
    </div>
  </div>
</section>

<article class="content">
  <div class="container">
    <div class="aside-wrapper">
      <div class="content-wrapper">
        <section class="trading-graph">
          <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a
                href="https://br.tradingview.com/markets/currencies/"
                aria-label="Entrar" rel="noopener" target="_blank"><span
                  class="blue-text">Forex</span></a> por TradingView
            </div>
            <script type="text/javascript"
              src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
              async>
              {
                "colorTheme": "light",
                "dateRange": "3M",
                "showChart": true,
                "locale": "br",
                "width": "100%",
                "height": "100%",
                "largeChartUrl": "",
                "isTransparent": false,
                "showSymbolLogo": true,
                "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                "gridLineColor": "rgba(240, 243, 250, 1)",
                "scaleFontColor": "rgba(120, 123, 134, 1)",
                "belowLineFillColorGrowing": "rgba(33, 150, 243, 0.12)",
                "belowLineFillColorFalling": "rgba(33, 150, 243, 0.12)",
                "symbolActiveColor": "rgba(33, 150, 243, 0.12)",
                "tabs": [{
                  "title": "Forex",
                  "symbols": [{
                      "s": "FX_IDC:USDBRL"
                    },
                    {
                      "s": "FX_IDC:EURBRL"
                    },
                    {
                      "s": "FX_IDC:GBPBRL"
                    },
                    {
                      "s": "FX_IDC:ARSBRL"
                    },
                    {
                      "s": "FX:EURUSD"
                    },
                    {
                      "s": "FX:GBPUSD"
                    },
                    {
                      "s": "FX_IDC:USDARS"
                    },
                    {
                      "s": "FX:USDJPY"
                    },
                    {
                      "s": "FX:USDCHF"
                    },
                    {
                      "s": "FX:AUDUSD"
                    },
                    {
                      "s": "FX:USDCAD"
                    },
                    {
                      "s": "FX:USDCNH"
                    }
                  ],
                  "originalTitle": "Forex"
                }]
              }
            </script>
          </div>
        </section>
        <section class="text-ibov">
          <div class="text-ibov-content">
            <?php echo get_the_content(); ?>
          </div>
        </section>
      </div>
      <div class="newsletter-element">
        <?php echo get_template_part('components/on-code/newsletter/newsletter'); ?>
      </div>
    </div>
  </div>
</article>

<section class="recent-posts" class="container">
  <div class="container">
    <h3>
      Últimas Notícias - Câmbio
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
  </div>
</section>
<?php get_footer(); ?>