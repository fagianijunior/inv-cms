<?php
get_header();
global $post;
$post_id = get_the_ID();

// Yahu
$yahu = new YahuFinanceApi();
$tickerSymbol = getTickerSymbol($post_id);
$relatedTickers = getRelatedTickers($post_id);
$data = $yahu->getTicker('BR', $tickerSymbol, $post_id);
$recent = $yahu->getTickerRecentPosts($tickerSymbol);

$ticker = $data;
?>

<?php if (!isset($ticker)): ?>
	<div class='warning-box'>
		<div class="container">
			<p>Estamos enfrentando problemas na leitura da API responsável por mostrar dados nesta página, o que pode afetar a exibição de informações atualizadas. Nossa equipe está trabalhando na resolução do problema. Enquanto isso, você pode continuar navegando normalmente.</p>
		</div>
	</div>
<?php endif; ?>

<article class="acoes-content">
	<div class="container">
		<section class="ticker-head">
			<div class="ticker-name">
				<div class="ticker-selection">
					<h1>
						<?php echo the_title(); ?>
					</h1>
					<?php if (isset($relatedTickers)): ?>
						<select name="#" id="tickers-options">
							<option disabled selected>
								<?php echo removeTickerSuffix($tickerSymbol); ?>
							</option>
							<?php foreach ($relatedTickers as $related): ?>
								<option value="<?php echo $related['permalink']; ?>" class="ticker-option">
									<?php echo removeTickerSuffix($related['ticker']); ?>
								</option>
							<?php endforeach; ?>
						</select>
					<?php endif; ?>
				</div>
				<?php if (isset($ticker)) : ?>
					<p>
						<?php echo $ticker['shortName']; ?>
					</p>
				<?php endif; ?>
			</div>
			<?php if (isset($ticker)) : ?>
				<div class="ticker-data">
					<div class="ticker-arrow">
						<?php if (checkPercentage(formatWithDecimal($ticker['regularMarketChangePercent'])) == 'up') : ?>
							<div class="arrow-up"></div>
						<?php else : ?>
							<div class="arrow-down"></div>
						<?php endif; ?>
					</div>
					<div class="ticker-value">
						<strong>
							<?php echo formatWithDecimal($ticker['regularMarketPrice']); ?>
						</strong>
						<p>Reais (BRL - R$)</p>
					</div>
					<div class="ticker-number">
						<strong class="ticker--<?php echo checkPercentage(formatWithDecimal($ticker['regularMarketChangePercent'])) ?>">
							<?php echo formatWithDecimal($ticker['regularMarketChangePercent']); ?>%
						</strong>
						<p>Variação (Dia)</p>
					</div>
					<div class="ticker-number">
						<span>
							<?php echo formatWithDecimal($ticker['regularMarketDayLow']); ?>
						</span>
						<p>Mínimo (Dia)</p>
					</div>
					<div class="ticker-number">
						<span>
							<?php echo formatWithDecimal($ticker['regularMarketDayHigh']); ?>
						</span>
						<p>Máximo (Dia)</p>
					</div>
				</div>

				<table class="ticker-table">
					<tbody>
						<tr>
							<td>Fechamento Anterior:</td>
							<td>
								<strong>
									<?php echo formatWithDecimal($ticker['regularMarketPreviousClose']); ?>
								</strong>
							</td>
						</tr>
						<tr>
							<td>Abertura:</td>
							<td>
								<strong>
									<?php echo formatWithDecimal($ticker['regularMarketOpen']); ?>
								</strong>
							</td>
						</tr>
					</tbody>
				</table>
			<?php endif; ?>
		</section>
		<div class="aside-wrapper">
			<div class="content-wrapper">
				<?php if (isset($ticker)) : ?>
					<section class="trading-items">
						<div class="tradingview-widget-container trad-graph">
							<div id="tradingview_4a903"></div>
							<div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/<?php echo removeTickerSuffix($tickerSymbol); ?>/" aria-label="Entrar" rel="nofollow" target="_blank"><span class="blue-text">Gráfico <?php echo removeTickerSuffix($tickerSymbol); ?></span></a> por TradingView</div>
							<script src="https://s3.tradingview.com/tv.js" async></script>
							<script>
								window.onload = function() {
									setTimeout(() => {
										new TradingView.widget({
											"customer": "easynvestcombr",
											"autosize": true,
											"symbol": "BMFBOVESPA:<?php echo removeTickerSuffix($tickerSymbol); ?>",
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
								};
							</script>
						</div>
						<div class="tradingview-widget-container trad-table">
							<div class="tradingview-widget-container__widget"></div>
							<div class="tradingview-widget-copyright"><a href="https://br.tradingview.com/symbols/<?php echo removeTickerSuffix($tickerSymbol); ?>/" aria-label="Entrar" rel="nofollow" target="_blank"><span class="blue-text"><?php echo removeTickerSuffix($tickerSymbol); ?> Dados Fundamentalistas</span></a> por TradingView</div>
							<script src="https://s3.tradingview.com/external-embedding/embed-widget-financials.js" async>
								window.onload = function() {
									setTimeout(() => {
										{
											"symbol": "BMFBOVESPA:<?php echo removeTickerSuffix($tickerSymbol); ?>",
											"colorTheme": "light",
											"isTransparent": false,
											"largeChartUrl": "",
											"displayMode": "regular",
											"width": "100%",
											"height": "100%",
											"locale": "br"
										}
									}, 3000);
								};
							</script>
						</div>
					</section>
				<?php endif; ?>
				<section class="acao-text">
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

<?php if ($recent->have_posts()) : ?>
	<section class="recent-posts" class="container">
		<div class="container">
			<h3>
				Últimas Notícias - <?php echo the_title(); ?>
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
								<h2>
									<?php the_title(); ?>
								</h2>
							</div>
						</a>
					<?php
					endwhile;
					wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php get_footer(); ?>