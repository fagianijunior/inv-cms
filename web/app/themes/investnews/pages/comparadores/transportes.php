<?php
/* Template Name: Calculadora Transporte */
?>
<?php get_header(); ?>
<main>
  <section class="pre_hero">
    <div class="container">
      <div class="content_prehero">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="description">
          <p> Compare quanto você gastaria se viajasse de carro, táxi, Uber, bicicleta, patinete, metrô ou ônibus usando nosso simulador de mobilidade urbana.</p>
        </div>
      </div>
    </div>
  </section>
  <div class="mvp-calc-km">
    <div class="container">
      <div class="box-km-calc">
        <div class="text-info-km">
          <i class="fa fa-exclamation-circle"></i>
          <p>Para começar, defina quantos km você percorre por dia ou mês. </p>
        </div>
        <div class="mvp-km-dia">
          <p>por dia:</p>
          <input type="number" id="inp-km-day" value="20" />
        </div>
        <div class="mvp-km-mes">
          <p>por mês:</p>
          <input type="number" id="inp-km-month" value="600" />
        </div>
      </div>
    </div>
  </div>
  <div class="container topo-cal-transporte">
    <div class="container">
      <div class="box-item">
        <div class="mvp-title-transport">
          <div class="mvp-transport-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/car.png" width="32" height="32" /> </div>
          <h3 class="mvp-transport-title-category">Carro</h3>
        </div>
        <div class="mvp-content-form-car">
          <div class="mvp-form-car">
            <div class="row" id="row-car"></div>
          </div>
        </div>
      </div>
      <!-- Táxi -->
      <div class="box-item">
        <div class="mvp-title-transport">
          <div class="mvp-transport-img taxi"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/taxi.png" width="32" height="32" /> </div>
          <h3 class="mvp-transport-title-category">Táxi</h3>
        </div>
        <div class="mvp-content-form-car">
          <div class="mvp-form-car">
            <div class="row" id="row-taxi"></div>
          </div>
        </div>
      </div>
      <!-- Uber -->
      <div class="box-item">
        <div class="mvp-title-transport">
          <div class="mvp-transport-img uber"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/uber.png" width="32" height="32" /> </div>
          <h3 class="mvp-transport-title-category">Uber</h3>
        </div>
        <div class="mvp-content-form-car">
          <div class="mvp-form-car">
            <div class="row" id="row-uber"></div>
          </div>
        </div>
      </div>
      <!-- Uber Black -->
      <div class="box-item">
        <div class="mvp-title-transport">
          <div class="mvp-transport-img uber-black"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/uber-black.png" width="32" height="32" /> </div>
          <h3 class="mvp-transport-title-category">Uber Black</h3>
        </div>
        <div class="mvp-content-form-car">
          <div class="mvp-form-car">
            <div class="row" id="row-uber-black"></div>
          </div>
        </div>
      </div>
      <!-- Patinete -->
      <div class="box-item">
        <div class="mvp-title-transport">
          <div class="mvp-transport-img patinete"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/patinete.png" width="32" height="32" /> </div>
          <h3 class="mvp-transport-title-category">Patinete</h3>
        </div>
        <div class="mvp-content-form-car">
          <div class="mvp-form-car">
            <div class="row" id="row-scooter"></div>
          </div>
        </div>
      </div>
      <!-- Bike Compartilhada -->
      <div class="box-item">
        <div class="mvp-title-transport">
          <div class="mvp-transport-img bike"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/bike.png" width="32" height="32" />
          </div>
          <h3 class="mvp-transport-title-category bike">Bike Compartilhada</h3>
        </div>
        <div class="mvp-content-form-car">
          <div class="mvp-form-car">
            <div class="row" id="row-bike"></div>
          </div>
        </div>
      </div>
      <!-- Metrô/onibus -->
      <div class="box-item">
        <div class="mvp-title-transport">
          <div class="mvp-transport-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/trem.png" width="32" height="32" />
          </div>
          <h3 class="mvp-transport-title-category">Metro/Onibus</h3>
        </div>
        <div class="mvp-content-form-car">
          <div class="mvp-form-car">
            <div class="row" id="row-bus"></div>
          </div>
        </div>
      </div>
      <!-- Metrô/onibus + Patinete/Bike -->
      <div class="box-item">
        <div class="mvp-title-transport">
          <div class="mvp-transport-img metro-bike"><img class="mvp-multi-transp" src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/metro-bike.png" width="32" height="32" />
          </div>
          <h3 class="mvp-transport-title-category metro-bike padding-title">Metrô/onibus + Patinete/Bike</h3>
        </div>
        <div class="mvp-content-form-car">
          <div class="mvp-form-car">
            <div class="row" id="row-bus-scooter"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container comparador">
      <div class="box-comparador">
        <p class="text-custo-anual">Custo Anual </p>
        <div class="mvp-comparador-transporte">
          <div class="div-comparador">
            <div class="mvp-transport-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/car.png" width="32" height="32" />
            </div>
            <div class="info-comparador">
              <p> <b id="total-car-value"></b></p>
            </div>
          </div>
          <div class="div-comparador">
            <div class="mvp-transport-img taxi"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/taxi.png" width="32" height="32" />
            </div>
            <div class="info-comparador">
              <p> <b id="total-tax-value"></b></p>
            </div>
          </div>
          <div class="div-comparador">
            <div class="mvp-transport-img uber"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/uber.png" width="32" height="32" />
            </div>
            <div class="info-comparador">
              <p> <b id="total-uber-value"></b></p>
            </div>
          </div>
          <div class="div-comparador">
            <div class="mvp-transport-img uber-black"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/uber-black.png" width="32" height="32" />
            </div>
            <div class="info-comparador">
              <p> <b id="total-uber-black-value"></b></p>
            </div>
          </div>
          <div class="div-comparador">
            <div class="mvp-transport-img patinete"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/patinete.png" width="32" height="32" />
            </div>
            <div class="info-comparador">
              <p> <b id="total-scooter-value"></b></p>
            </div>
          </div>
          <div class="div-comparador">
            <div class="mvp-transport-img bike"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/bike.png" width="32" height="32" />
            </div>
            <div class="info-comparador">
              <p> <b id="total-bike-value"></b></p>
            </div>
          </div>
          <div class="div-comparador">
            <div class="mvp-transport-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/trem.png" width="32" height="32" />
            </div>
            <div class="info-comparador">
              <p> <b id="total-trem-value"></b></p>
            </div>
          </div>
          <div class="div-comparador">
            <div class="mvp-transport-img uber"><img class="mvp-multi-transp" src="<?php echo get_template_directory_uri(); ?>/assets/images/comparador-transporte/metro-bike.png" width="32" height="32" />
            </div>
            <div class="info-comparador">
              <p> <b id="total-metro-bike-value"></b></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>