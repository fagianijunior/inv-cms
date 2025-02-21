<?php
/* Template Name: Comparador de Fundos Vérios */
get_header();
?>
<section class="pre_hero">
  <div class="container">
    <div class="content_prehero">
      <h1 class="title">Comparador de Fundos</h1>
      <div class="description">
        <p>Qual fundo vale mais a pena investir? Veja a comparação entre os fundos e comparativo com o Ibovespa e o CDI com o nosso Comparador de Fundos. Avalie a melhor opção para sua carteira comparando rentabilidade, histórico, volatilidade e patrimônio dentre mais de 40 mil Fundos.</p>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <section class="container comparador_fundos_verios">
    <iframe id="comparador-fundos-verios" src="https://cfundos.investnews.com.br/" width="100%" height="950px" frameborder="0"></iframe>
  </section>

  <?php
  $fundos_page_meta = get_post_meta($post->ID, 'fundos_page_meta', true);
  if ($fundos_page_meta != "") {
  ?>
    <section class="container left relative">
      <div class="special-text expanded">
        <?php echo $fundos_page_meta; ?>
      </div>
    </section>
  <?php } ?>

</div>
<?php get_footer(); ?>