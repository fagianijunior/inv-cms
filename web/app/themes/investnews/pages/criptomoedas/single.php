<?php
get_header();

$id_cripto = get_field('id_criptomoeda');
$ticker_cripto = get_field('ticker_criptomoeda');
$symbol_cripto = get_field('tv_symbol_criptomoeda');

$data_full = access_cripto_data();

if (isset($data_full) && count($data_full['data']) > 0) {
    $data = $data_full['data'];
    $current_cripto = $data[$ticker_cripto][0];

    // USD
    $cripto_usd = floatval($current_cripto['quote']['USD']['price']);
    $cripto_usd = number_format($cripto_usd, 2, ',', '.');

    $cripto_usd_signal = "+";
    $cripto_usd_24h_change = floatval($current_cripto['quote']['USD']['percent_change_24h']);
    $cripto_usd_24h_change = number_format($cripto_usd_24h_change, 2, ',', '.');
    $cripto_usd_signal_check = str_split($cripto_usd_24h_change);
    
    if ($cripto_usd_signal_check[0] === "-") {
        $cripto_usd_signal = "-";
    }

    $cripto_usd_24h_vol = floatval($current_cripto['quote']['USD']['volume_24h']);
    $cripto_usd_24h_vol = ins_nice_number($cripto_usd_24h_vol);

    $cripto_usd_market_cap = floatval($current_cripto['quote']['USD']['market_cap']);
    $cripto_usd_market_cap = ins_nice_number($cripto_usd_market_cap);

    // BRL
    $cripto_brl = floatval($current_cripto['quote']['BRL']['price']);
    $cripto_brl = number_format($cripto_brl, 2, ',', '.');

    $cripto_brl_signal = "+";
    $cripto_brl_24h_change = floatval($current_cripto['quote']['BRL']['percent_change_24h']);
    $cripto_brl_24h_change = number_format($cripto_brl_24h_change, 2, ',', '.');
    $cripto_brl_signal_check = str_split($cripto_brl_24h_change);
    if ($cripto_brl_signal_check[0] === "-") {
        $cripto_brl_signal = "-";
    }

    $cripto_brl_24h_vol = floatval($current_cripto['quote']['BRL']['volume_24h']);
    $cripto_brl_24h_vol = ins_nice_number($cripto_brl_24h_vol);

    $cripto_brl_market_cap = floatval($current_cripto['quote']['BRL']['market_cap']);
    $cripto_brl_market_cap = ins_nice_number($cripto_brl_market_cap);
} else { ?>
  <div class='warning-box grey'>
    <p>Estamos enfrentando problemas na leitura da API responsável por mostrar dados nesta página, 
    o que pode afetar a exibição de informações atualizadas. Nossa equipe está trabalhando na 
    resolução do problema. Enquanto isso, você pode continuar navegando normalmente.</p>
  </div>
<?php } ?>
<div class="container">

    <div class="post-head-criptonews">
        <div class="post-head-criptonews-inner">

            <div class="head-criptonews-title">
                <h1><?php the_title(); ?> (<?php echo $ticker_cripto; ?>)</h1>
                <select id="select-acao" class="select-acao">
                    <option selected value="usd">USD</option>
                    <option value="brl">BRL</option>
                </select>
            </div>

            <div class="main-acao-data main-acao-data-criptonews main-acao-data-usd <?php echo $ticker_cripto; ?>">
                <div class="box-acao-arrow">
                    <?php if ($cripto_usd_signal == "+") : ?>
                    <div class="arrow-up"></div>
                    <?php endif; ?>
                    <?php if ($cripto_usd_signal == "-") : ?>
                    <div class="arrow-down"></div>
                    <?php endif; ?>
                </div>
                <div class="box-acao-valor">
                    <span class="acao-valor">
                    <?php if ($cripto_usd_signal == "+") : ?>
                        <div class="arrow-up"></div>
                    <?php endif; ?>
                    <?php if ($cripto_usd_signal == "-") : ?>
                        <div class="arrow-down"></div>
                    <?php endif; ?>
                    <?php echo $cripto_usd; ?>
                    </span>
                    <span class="acao-valor-desc">Dólares (USD - U$)</span>
                </div>
                <?php if ($cripto_usd_signal == "+") : ?>
                    <div class="box-acao-diff">
                    <span class="acao-diff positive"><?php echo $cripto_usd_24h_change; ?>%</span>
                    <span class="acao-diff-desc">Variação (24h)</span>
                    </div>
                <?php endif; ?>
                <?php if ($cripto_usd_signal == "-") : ?>
                    <div class="box-acao-diff">
                    <span class="acao-diff negative"><?php echo $cripto_usd_24h_change; ?>%</span>
                    <span class="acao-diff-desc">Variação (24h)</span>
                    </div>
                <?php endif; ?>
                <div class="box-acao-min">
                    <span class="acao-min"><?php echo $cripto_usd_24h_vol; ?></span>
                    <span class="acao-min-desc">Volume (24h)</span>
                </div>
                <div class="box-acao-max">
                    <span class="acao-max"><?php echo $cripto_usd_market_cap; ?></span>
                    <span class="acao-max-desc">Market Cap</span>
                </div>
            </div>

            <div class="main-acao-data main-acao-data-criptonews main-acao-data-brl <?php echo $ticker_cripto; ?>" style="display: none">
                <div class="box-acao-arrow">
                    <?php if ($cripto_brl_signal == "+") : ?>
                    <div class="arrow-up"></div>
                    <?php endif; ?>
                    <?php if ($cripto_brl_signal == "-") : ?>
                    <div class="arrow-down"></div>
                    <?php endif; ?>
                </div>
                <div class="box-acao-valor">
                    <span class="acao-valor">
                    <?php if ($cripto_brl_signal == "+") : ?>
                        <div class="arrow-up"></div>
                    <?php endif; ?>
                    <?php if ($cripto_brl_signal == "-") : ?>
                        <div class="arrow-down"></div>
                    <?php endif; ?>
                    <?php echo $cripto_brl; ?>
                    </span>
                    <span class="acao-valor-desc">Reais (BRL - R$)</span>
                </div>
                <?php if ($cripto_brl_signal == "+") : ?>
                    <div class="box-acao-diff">
                    <span class="acao-diff positive"><?php echo $cripto_brl_24h_change; ?>%</span>
                    <span class="acao-diff-desc">Variação (24h)</span>
                    </div>
                <?php endif; ?>
                <?php if ($cripto_brl_24h_change == "-") : ?>
                    <div class="box-acao-diff">
                    <span class="acao-diff negative"><?php echo $cripto_brl_24h_change; ?>%</span>
                    <span class="acao-diff-desc">Variação (24h)</span>
                    </div>
                <?php endif; ?>
                <div class="box-acao-min">
                    <span class="acao-min"><?php echo $cripto_brl_24h_vol; ?></span>
                    <span class="acao-min-desc">Volume (24h)</span>
                </div>
                <div class="box-acao-max">
                    <span class="acao-max"><?php echo $cripto_brl_market_cap; ?></span>
                    <span class="acao-max-desc">Market Cap</span>
                </div>
            </div>

        </div>
    </div>
    
    <div class="post-content-criptonews">
        <div class="post-content-criptonews-inner">
            <div class="post-content-criptonews-main">
                <div class="content-criptonews-top">
                    <?php if (isset($data) && count($data) > 0) { ?>
                    <div class="tradingview-widget-container">
                        <div id="tradingview_4a903"></div>
                        <div class="tradingview-widget-copyright">
                            <a href="https://br.tradingview.com/symbols/<?php echo $symbol_cripto; ?>/" aria-label="Entrar" rel="nofollow" target="_blank"><span class="blue-text">Gráfico <?php echo $symbol_cripto; ?></span></a> por TradingView
                        </div>
                        <script src="https://s3.tradingview.com/tv.js" async></script>
                        <script>
                        window.onload = function() {
                            setTimeout(() => {
                            new TradingView.widget({
                                "customer": "easynvestcombr",
                                "autosize": true,
                                "symbol": "<?php echo $symbol_cripto; ?>",
                                "interval": "D",
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
                    <?php } ?>
                </div>
                <div class="content-criptonews-main">
                    <?php the_content(); ?>
                </div>
                <div class="content-criptonews-bottom">
                    <?php ins_RelatedPostsCriptomoedas($id_cripto); ?>
                </div>
            </div>
            <div class="post-content-criptonews-sidebar">
                &nbsp;
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>