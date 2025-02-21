<?php
/* Template Name: Cotações */

$yahu = new YahuFinanceApi();
$ibov = $yahu->getIbovespa();

get_header();
?>

<?php if ($ibov === false) : ?>
  <div class='warning-box'>
    <p>Estamos enfrentando problemas na leitura da API responsável por mostrar dados nesta página, o que pode afetar a
      exibição de informações atualizadas. Nossa equipe está trabalhando na resolução do problema. Enquanto isso, você
      pode continuar navegando normalmente.</p>
  </div>
<?php endif; ?>

<?php if ($ibov !== false) : ?>
  <section class="pre_hero">
    <div class="container">
      <div class="content_prehero">
        <h1><?php the_title(); ?></h1>
        <div class="description">
          <p>Acompanhe a cotação do dia dos principais ativos do mercado. Veja a cotação do Ibovespa hoje, ações, BDRs
            e fundos imobiliários (FIIs), cotações de moedas e cotações de criptomoedas em tempo real.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="ibov">
    <div class="container" style="height: auto !important;">
      <div class="indices-header">
        <div class="indices-ibov">
          <div class="indices-ibov-details">
            <p>Ibovespa</p>
            <?php if ($ibov['regularMarketChangePercent'] > 0) { ?>
              <div class="variation positive"><i class="fa fa-arrow-circle-up"></i> <?php echo $ibov['regularMarketChangePercent'] ?>%</div>
            <?php } else { ?>
              <div class="variation negative"><i class="fa fa-arrow-circle-down"></i> <?php echo $ibov['regularMarketChangePercent'] ?>%</div>
            <?php } ?>
            <div class="value"><?php echo $ibov['regularMarketPrice'] ?>pts</div>
          </div>
          <div class="indices-ibov-close-open">
            Fech. Ant: <span class="ibov-fech-ant">
              <?php echo $ibov['regularMarketPreviousClose'] ?>
            </span>
            &bull; Abertura:
            <span>
              <?php echo $ibov['regularMarketOpen'] ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="tradingGraph">
    <div class="container" style="height: auto !important;">
      <div class="indice">
        <div id="graph-cot" style="width: 100%; height: 400px;">
          <div class="tradingview-widget-container" style="height: 400px;">
            <div id="tradingview_4a903" style="height: 400px;"></div>
            <div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/IBOV/"
                aria-label="Entrar" rel="dofollow" target="_blank"><span class="blue-text">Gráfico
                  IBOV</span></a> por TradingView</div>
            <script src="https://s3.tradingview.com/tv.js" async></script>
            <script>
              window.onload = function() {
                setTimeout(() => {
                  new TradingView.widget({
                    "customer": "easynvestcombr",
                    "autosize": true,
                    "symbol": "BMFBOVESPA:IBOV",
                    "interval": "60",
                    "timezone": "America/Sao_Paulo",
                    "theme": "light",
                    "style": "1",
                    "locale": "br",
                    "toolbar_bg": "#F1F3F6",
                    "enable_publishing": false,
                    "allow_symbol_change": false,
                    "container_id": "tradingview_4a903"
                  });
                }, 3000);
              }
            </script>
          </div>
        </div>
        <div class="indices-delay-more">
          <div class="indices-delay"><i class="fa fa-clock-o"></i> Delay 15 min</div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<div class="text-ibov">
  <div class="container">
    <h2> Ibovespa (IBOV)</h2>
    <p>O Ibovespa, é o principal indicador que mede o desempenho de ações que são negociadas na bolsa de valores
      brasileira.<br>
      Criado no ano de 1968, ele reúne importantes empresas do mercado de ações brasileiro e acabou se
      consolidando como uma referência para investidores.<br>
      O índice, que passa por uma reavaliação a cada quatro meses, é resultado de uma carteira teórica de ativos.
      Ele é formado por ações e units de empresas que são listadas na B3 que atendem aos critérios previamente
      determinados para a sua composição, correspondendo a cerca de 80% do número de negócios e do volume
      financeiro do mercado de capitais brasileiro.<br>
      Nesta página, você consegue acompanhar como está o Ibovespa hoje.
    </p>
    <br>
    <h2>Como está a bolsa de valores hoje?</h2>
    <p>Nesta página, você consegue consultar o Ibovespa. Por meio do gráfico, é possível saber a cotação do
      Ibovespa, ou seja, como está o Ibovespa agora, o fechamento da véspera, a pontuação da abertura do dia, bem
      como a sua variação. A atualização acontece a cada 15 minutos.
      No gráfico, é possível acompanhar o índice Ibovespa há 1 hora, 30 minutos ou há 1 minuto.
      É por meio desta seção que você sabe onde consultar o valor das ações que compõe o Ibovespa, podendo também
      acompanhar as maiores altas, as maiores baixas e os papéis mais negociados que fazem parte do índice.
    </p>
    <br>
    <h2>Qual a diferença entre B3 e Ibovespa?</h2>
    <p>A B3 é a responsável pela bolsa de valores, ou seja, trata-se de uma empresa, que é de capital aberto, que
      faz registro, liquidação, negociação, compensação etc. Nela, é possível negociar diversos tipos de
      investimentos.
      Já o Ibovespa é o principal índice da B3. Ele é um indicador de desempenho de ações negociadas na bolsa de
      valores.
      O índice Ibovespa agrega importantes empresas do mercado de capitais brasileiro e serve de referência para
      os investidores.
    </p>
  </div>
</div>

<?php get_footer(); ?>