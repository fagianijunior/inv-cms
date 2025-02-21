<?php /* Template Name: Calculadora de Price */ ?>
<?php get_header(); ?>

<main>
  <section class="pre_hero">
    <div class="container">
      <div class="content_prehero">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="description"><?php the_excerpt(); ?></div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="content-wrap">
      <section class="content-calculadora">
        <form id="calculatorForm" class="calculator-content">
          <div class="group-itens">
            <div class="input input-w-buttons">
              <label for="inputValor">
                Valor
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Montante total do imóvel, veículo ou outro bem adquirido, geralmente por financiamento.
                  </div>
                </div>
              </label>

              <div class="input-content">
                <input type="text" name="inputValor" id="inputValor" placeholder="R$ 0,00" value="R$ 0,00">
                <div class="button-group">
                  <button class="input-button remove" onclick="increment('inputValor',-100)">-</button>
                  <button class="input-button add" onclick="increment('inputValor', 100)">+</button>
                </div>
              </div>

            </div>



            <div class="input input-w-buttons">
              <label for="inputEntrada">
                Valor de entrada
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Parte do preço que você paga à vista. Valor deve ser de no mínimo 20% do total do bem.
                  </div>
                </div>
              </label>

              <div class="input-content">
                <input type="text" name="inputEntrada" id="inputEntrada" placeholder="R$ 0,00" value="R$ 0,00">
                <div class="button-group">
                  <button class="input-button remove" onclick="increment('inputEntrada',-100)">-</button>
                  <button class="input-button add" onclick="increment('inputEntrada', 100)">+</button>
                </div>
              </div>

            </div>
            <div class="input-select input-w-buttons">
              <label for="inputJuros">
                Taxa de Juros
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Valor em porcentagem que incidirá sobre o capital no período aplicado, que pode ser uma taxa mensal ou anual.
                  </div>
                </div>
              </label>
              <div class="input-content">
                <div class="content">
                  <input type="text" id="inputJuros" placeholder="0" value="0">
                  <span class="dropdown-el">
                    <input type="radio" name="TaxaDeJuros" value="Mensal" id="jurosMensal" checked="checked"><label for="jurosMensal">% Mensal</label>
                    <input type="radio" name="TaxaDeJuros" value="Anual" id="jurosAnual"><label for="jurosAnual">% Anual</label>
                  </span>
                </div>
                <div class="button-group">
                  <button class="input-button remove" onclick="incrementInterest('inputJuros', -1)">-</button>
                  <button class="input-button add" onclick="incrementInterest('inputJuros', 1)">+</button>
                </div>
              </div>
            </div>
            <div class="input-select input-w-buttons" for="inputPeriodo">
              <label for="inputPeriodo">
                Período
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Período de tempo do investimento ou dívida. Pode ser mensal ou anual.
                  </div>
                </div>
              </label>
              <div class="input-content">
                <div class="content">
                  <input type="decimal" id="inputPeriodo" placeholder="0" value="0">
                  <span class="dropdown-el">
                    <input type="radio" name="PeriodoEm" value="Mensal" id="periodoMensal" checked="checked"><label for="periodoMensal">Meses</label>
                    <input type="radio" name="PeriodoEm" value="Anual" id="periodoAnual"><label for="periodoAnual">Anos</label>
                  </span>
                </div>
                <div class="button-group">
                  <button class="input-button remove" onclick="incrementMonths('inputPeriodo',-1)">-</button>
                  <button class="input-button add" onclick="incrementMonths('inputPeriodo', 1)">+</button>
                </div>
              </div>
            </div>
          </div>
          <div class="line-group actions-buttons">
            <div class="inputs-and-buttons">
              <div class="group-itens group-buttons">
                <button type="submit" id="calcBtn" class="btn solid-btn disabled">Calcular</button>
                <button type="reset" id="clearInputsBtn" class="btn outline-btn disabled">Limpar</button>
              </div>
            </div>
          </div>
        </form>



        <!-- Tabela de price -->
        <div id="calc-result-area-clt" class="calculator-table-area">
          <div class="price-title">
            <h2>Resultado</h2>

            <div class="calc-result">
              <div class="calc-result-left">
                <p>Valor total pago: <span id="calc-total">R$ 63.355,01</span></p>
                <p>Pagamento mensal estimado: <span id="calc-mensal">R$ 2.477,30</span></p>
              </div>
              <div class="calc-result-right">
                <p>Valor total de juros: </p>
                <p><span id="calc-juros">R$ 3.899,73</span></p>
              </div>
            </div>

            <p>Compreenda o valor de cada parcela na tabela abaixo:</p>
          </div>
          <div class="table-holder">
            <table class="table-price-mobile">
            </table>
            <table class="table-price-desktop">
              <thead>
                <tr>
                  <th scope="col">Nº</th>
                  <th scope="col">Parcela</th>
                  <th scope="col">Juros</th>
                  <th scope="col">Amortização</th>
                  <th scope="col">Saldo Devedor</th>
                </tr>
              </thead>
              <tbody class="table-price-body">
              </tbody>
            </table>
          </div>
        </div>


        <?php if (get_field('mais_informacoes')) { ?>
          <div class="mais_informacoes">
            <?php echo get_field('mais_informacoes'); ?>
          </div>
        <?php } ?>

        <?php if (have_rows('ferramentas')) : ?>

          <div class="ferramentas-title">
            <h2>Aproveite e conheça um pouco mais das nossas ferramentas</h2>
          </div>

          <div class="ferramentas__wrapper">
            <?php while (have_rows('ferramentas')) : the_row(); ?>

              <a href="<?php the_sub_field('link_para_ferramenta'); ?>" title="<?php echo get_sub_field('titulo'); ?>" class="card__item" style="<?php if (get_sub_field('em_breve')) : echo 'pointer-events: none';
                                                                                                  endif; ?>">
                <?php if (get_sub_field('em_breve')) : ?>
                  <span class="card__tag">Em breve</span>
                <?php endif; ?>
                <div class="card__content">
                  <span class="card__type">
                    <?php the_sub_field('tipo'); ?>
                  </span>
                  <h3 class="card__title">
                    <?php the_sub_field('titulo'); ?>
                  </h3>
                </div>
              </a>
            <?php endwhile; ?>
          </div>

        <?php endif; ?>
        <!-- Ferramentas Dinamicamente -->
        <?php get_template_part('components/on-code/ferramentas/ferramentas', array('ferramenta' => 'Calculadoras')); ?>
        <!-- Ferramentas dinamicamente end -->
      </section>
      <!-- AD SIDEBAR -->
      <div class="sidebar">
        <?php get_template_part('components/on-code/recent-posts/recent-posts', null, ['side' => true, 'quantity' => 5]); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>