<?php

/**
 * Pagina: /ferramentas/simulador
 * Template name: Ferramenta - Simulador
 */
?>
<?php get_header(); ?>

<main>
  <section class="pre_hero">
    <div class="container">
      <div class="content_prehero">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="description">
          Use as ferramentas do InvestNews para calcular quanto você vai gastar, quanto consegue acumular e quanto investir para alcançar seus objetivos
        </div>
      </div>
    </div>
  </section>
  <div class="container">
  <?php if (have_rows('simuladores', 'options')) { ?>
    <?php while (have_rows('simuladores', 'options')) {
      the_row(); ?>
      <section class="simuladores ferramentas">
        <div class="mvp-main-box">
          <div class="ferramentas__wrapper">
            <?php if (have_rows('simuladores_itens', 'options')) { ?>

              <?php while (have_rows('simuladores_itens', 'options')) {
                the_row(); ?>

                <?php
                $icon = get_sub_field('icone', 'options');
                $link = get_sub_field('link', 'options');
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>

                <a href="<?php echo $link_url ?>" title="<?php echo get_sub_field('tipo', 'options') . ": " . get_sub_field('titulo', 'options'); ?>" class="card__item" style="<?php if (get_sub_field('em_breve', 'options')) : echo 'pointer-events: none';
                                                                            endif; ?>" target="<?php echo esc_attr($link_target); ?>">
                  <?php if (get_sub_field('em_breve', 'options')) : ?>
                    <span class="card__tag">Em breve</span>
                  <?php endif; ?>
                  <div class="card__content">
                    <div class="card_icon">
                      <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
                    </div>
                    <div class="text-area">
                      <span class="card__type">
                        <?php the_sub_field('tipo', 'options'); ?>
                      </span>
                      <h3 class="card__title">
                        <?php the_sub_field('titulo', 'options'); ?>
                      </h3>
                    </div>
                  </div>
                </a>

              <?php } ?>

            <?php } ?>
          </div>

        </div>
      </section>
    <?php } ?>
  <?php } ?>

  <?php //echo get_template_part('components/on-code/newsletter/newsletter'); ?>

</div>
</main>
<?php get_footer(); ?>