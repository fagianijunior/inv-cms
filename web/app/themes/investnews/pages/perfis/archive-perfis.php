<?php wp_head(); ?>
<?php
get_header();
?>
<style>
  .left {
    text-align: left !important;
  }

/* Create a container 1190px */
.container {
  max-width: 1190px;
  margin: 0 auto;
  padding: 0 15px;
}

</style>

<section class="pre_hero">
  <div class="container">
    <div class="content_prehero">
      <h1 class="title">
        <?php the_field('titulo_perfis', 'options'); ?>
      </h1>
      <div class="description">
        <?php the_field('descricao_perfis', 'options'); ?>
      </div>
    </div>
  </div>
</section>
<section class="perfis__destaque">
  <div class="container">
    <div class="perfis__title__wrapper">
      <h2 class="perfis__title">Perfis em <span>Destaque</span></h2>
      <hr>
    </div>

    <?php
    $perfis__destaque = get_field('destaques_perfis', 'option');
    ?>

    <?php if ($perfis__destaque) : ?>
      <div class="perfis__destaques__fixo">
        <?php foreach ($perfis__destaque as $destaque) :  ?>
          <?php setup_postdata($destaque); ?>
          <a href="<?= get_permalink($destaque->ID); ?>" class="perfil__slide__item">
            <div class="background__image">
              <img src="<?= get_field('foto_destaque', $destaque->ID) ?>" alt="Background">
            </div>
            <div class="perfil__item__content">
              <div class="perfil__item__tag">
                <span>
                  <?php
                  $terms = get_the_terms($destaque->ID, 'perfis_classificacao');

                  echo $terms[0]->name;
                  ?>
                </span>
              </div>

              <div class="perfil__item__nome">
                <h3><?php echo get_the_title($destaque->ID); ?></h3>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>

    <?php endif; ?>
    <?php if ($perfis__destaque) : ?>
      <div class="perfis__slider swiperPerfis">
        <div class="swiper-wrapper">
          <?php foreach ($perfis__destaque as $destaque) :  ?>
            <?php setup_postdata($destaque); ?>
            <div class="swiper-slide">
              <a href="<?= get_permalink($destaque->ID); ?>" class="perfil__slide__item" style="background-image: url('<?= get_field('foto_destaque', $destaque->ID) ?>')">
                <div class="perfil__item__content">
                  <div class="perfil__item__tag">
                    <span>
                      <?php
                      $terms = get_the_terms($destaque->ID, 'perfis_classificacao');

                      echo $terms[0]->name;
                      ?>
                    </span>
                  </div>

                  <div class="perfil__item__nome">
                    <h3><?php echo get_the_title($destaque->ID); ?></h3>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    <?php endif; ?>
  </div>

</section>

<section class="perfis__wrapper">
  <div class="container">
    <div class="perfis__title__wrapper">
      <h2 class="perfis__title">Todos os <span>Perfis</span></h2>
      <hr>
    </div>

    <div class="perfis__grid">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php
          $foto_array = get_field('foto_perfil');
          ?>
          <a href="<?php echo get_post_permalink() ?>" class="perfil__item">
            <div class="perfil__image">
              <img src="<?php echo  $foto_array['url'] ?>" alt="{{PHOTO_ALT}}">
            </div>
            <div class="perfil__info">
              <h3><?php the_title(); ?></h3>
              <p><?php the_field('descricao_perfil'); ?></p>
            </div>
          </a>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

    <div class="perfis__pagination">
      <div class="nu-nav-links">
        <?php if (function_exists("pagination")) {
          pagination($wp_query->max_num_pages);
        } ?>
      </div>
    </div>
  </div>
</section>

<seciton class="newsletter">
  <?php do_shortcode('[newsletter]'); ?>
</seciton>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper(".swiperPerfis", {
      slidesPerView: "auto",
      spaceBetween: 15,
      centeredSlides: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        992: {
          slidesPerView: 4,
          spaceBetween: 30,
          centeredSlides: false,
          navigation: {
            enabled: false
          }
        }
      },

    });
  });
</script>
<?php
get_footer();
?>
<?php wp_footer(); ?>