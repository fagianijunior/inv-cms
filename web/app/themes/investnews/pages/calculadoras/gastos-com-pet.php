<?php
/* Template Name: Calculadora Pet */
?>
<?php get_header(); ?>

<section class="pre_hero">
      <div class="container">
          <div class="content_prehero">
              <h1 class="title"><?php the_title(); ?></h1>
              <div class="description">
                <p>Quanto você precisa desembolsar para cuidar do seu animal.</p>
              </div>
          </div>
      </div>
  </section>
<div class="container">
  <section class="form-section">
    <form>
      <fieldset>
        <div class="row pet-container-porte">
           <div class="animal-sizes" id="row-animal-size">
            <div class="item active" data-size="P">Porte pequeno</div>
            <div class="item" data-size="M">Porte médio</div>
            <div class="item" data-size="G">Porte grande</div>
          </div>
        </div>
      </fieldset>
    </form>
  </section>
  <div class="mvp-container-gastos-pet">
    <section class="margin">
      <form>
        <fieldset>
          <legend class="title-pet-container-subtitle">Gastos Inicias</legend>
          <div class="row" id="row-initial-expenses"></div>
          <legend class="title-pet-container-subtitle margin">Gastos Mensais</legend>
          <div class="row" id="row-monthly-expenses"></div>
        </fieldset>
      </form>
    </section>
  
    <section class="form-section total-pet">
      <form>
        <fieldset>
          
          <div class="row">
            <div class="total-value">
              <span class="title">
                Gastos inicias:
              </span>
              <span class="value" id="total-value-initial-expenses"></span>
            </div>
          </div>
          <div class="row">
            <div class="total-value">
              <span class="title">
                Gastos mensais:
              </span>
              <span class="value gastos-mensais" id="total-value-monthly-expenses"></span>
            </div>
          </div>
          <div class="resume">
            <span class="title">
              Gastos no ano:
            </span>
            <span class="value" id="total-value-yearly-expenses"></span></br>
          </div> 

        </fieldset>
      </form>
    </section>
  </div>
</div>

<?php get_footer(); ?>


