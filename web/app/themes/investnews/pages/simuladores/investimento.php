<?php /* Template Name: Calculadora Investimentos */ ?>

<?php get_header(); ?>

<main>
  <section class="pre_hero">
    <div class="container">
      <div class="content_prehero">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="description">
          Comece a simular sua aposentadoria com a calculadora abaixo e descubra quanto dinheiro é possível acumular e qual renda você consegue ter para se aposentar. Comece a planejar sua própria previdência, sem depender exclusivamente do INSS. Neste gráfico, você consegue ver a curva de construção do seu patrimônio financeiro.
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="content-wrap">
      <section id="mvp-post-content" class="left relative">
        <div class="mvp-options-investments">
          <div class="mvp-main-box depositos">
            <section class="form-section narrow" id="inp-section">
              <div class="form-depositos-investments">
                <div class="input-depositos">
                  <label for="inp-num-installments">Qual valor você gostaria de investir?</label>
                  <div class="input-content">
                    <input type="text" id="inp-initial" value="R$ 5.250,00" />
                    <div class="button-group">
                      <button id="removeInvestVal" class="input-button remove" onclick="increment('inp-initial', -100)">-</button>
                      <button id="addInvestVal" class="input-button add" onclick="increment('inp-initial', 100)">+</button>
                    </div>
                  </div>
                </div>
                <div class="input-depositos mensal">
                  <label for="inp-num-installments">Quanto gostaria de depositar por mês?</label>
                  <div class="input-content">
                    <input type="text" id="inp-monthly" value="R$ 300,00" />
                    <div class="button-group">
                      <button id="removeDepositVal" class="input-button remove" onclick="increment('inp-monthly',-100)">-</button>
                      <button id="addDepositVal" class="input-button add" onclick="increment('inp-monthly', 100)">+</button>
                    </div>
                  </div>
                </div>
                <div class="input-depositos mensal">
                  <label for="inp-num-installments">Por quanto tempo deixaria seu dinheiro investido?</label>
                  <div class="input-content">
                    <input type="text" id="investiment-time" value="24 meses" readonly />
                    <div class="button-group">
                      <button id="removeMonthVal" class="input-button remove" onclick="incrementMonths('inp-investiment-time',-1)">-</button>
                      <button id="addMonthVal" class="input-button add" onclick="incrementMonths('inp-investiment-time', 1)">+</button>
                    </div>
                  </div>
                  <div id="period-range-area" class="options-periodo desktop" style="display:none; bottom: unset">
                    <div class="form-group block custom-input">

                      <div class="range-slider">
                        <input class="range-slider__range" type="range" id="inp-investiment-time" min="0" max="10" value="5" step="1" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- <div class="options-periodo desktop">
                                <div class="form-group block custom-input">
                                    <label for="inp-num-installments">Período: <span id="span-investiment-time">24 meses</span></label>
                                    <div class="range-slider">
                                        <input class="range-slider__range" type="range" id="inp-investiment-time" min="0" max="7" value="5" step="1" />
                                    </div>
                                </div>
                            </div> -->

            <div id="confira-taxas-btn" class="outline-btn">Confira as taxas</div>

            <section id="taxes-infos" class="resume taxes-infos">
              <p>Confira, e se necessário, altere as taxas mais atuais do mercado</p>
              <form>
                <div class="input-item">
                  <label for="inp-num-installments">Tesouro Prefixado (% a.a)</label>
                  <div class="input-button">
                    <input type="text" id="inp-tesouro-prefixado" value="<?php echo get_option('calculadora_taxas_tesouro_prefixado2022'); ?>" />
                  </div>
                </div>

                <div class="input-item">
                  <label for="inp-num-installments">Tesouro Selic (% a.a)</label>
                  <div class="input-button">
                    <div class="input-button">
                      <input type="text" id="inp-tesouro-selic" value="<?php echo get_option('calculadora_taxas_tesouro_selic'); ?>" />
                    </div>
                  </div>
                </div>

                <div class="input-item">
                  <label for="inp-num-installments">Tesouro IPCA+ (% a.a)</label>
                  <div class="input-button">
                    <input type="text" id="inp-tesouro-ipca" value="<?php echo get_option('calculadora_taxas_tesouro_ipcamais2024'); ?>" />
                  </div>
                </div>

                <div class="input-item">
                  <label for="inp-num-installments">CDB e LC (% do CDI)</label>
                  <div class="input-button">
                    <input type="number" id="inp-cdb-lc" value="<?php echo get_option('calculadora_taxas_cdb_lc'); ?>" min="0" />
                  </div>
                </div>

                <div class="input-item">
                  <label for="inp-num-installments">LCI e LCA (% do CDI)</label>
                  <div class="input-button">
                    <input type="number" id="inp-lci-lca" value="<?php echo get_option('calculadora_taxas_lci_lca'); ?>" min="0" />
                  </div>
                </div>

                <div class="input-item">
                  <label for="inp-num-installments">Rentabilidade da Poupança: (% a.m)</label>
                  <div class="input-button">
                    <input type="text" id="inp-poupanca" value="<?php echo get_option('calculadora_taxas_rentabilidade_poupanca'); ?>" />
                  </div>
                </div>
              </form>
            </section>

            <p class="disclaimer-text">Confira os valores utilizados no simulador de investimentos referentes à data de última atualização - esses valores podem sofrer alterações de acordo com o mercado.</p>

            <div class="total-investido">
              <p class="desktop label">Total investido: <span class="desktop value" id="total-investment"></span> </p>

              <div class="return-info">
                <p>Em <span id="return-period" class="months">24 meses</span> seu retorno pode ser de até:</p>
                <p><span id="return-value" class="return-value">R$ 0,00</span> </p>
              </div>

              <p class="disclaimer">Se selecionado o investimento com maior rentabilidade descontando IR.</p>
            </div>
          </div>
        </div>

        <div class="mvp-main-box">
          <div class="calculator investments">
            <section id="resume-graphics" class="resume wide">
              <div class="graphic-section">
                <div class="graphic total">
                  <div class="graphic-legend-name">
                    <span class="legend-name">Total investido </span>
                    <div class="tooltip top">
                      <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"></path>
                        <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"></rect>
                      </svg>
                      <div class="tooltiptext">
                        Valor total do investimento
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <div class="graphic-container">
                      <div class="over" class="total-invest" id="total-invest-percent-graphic"></div>
                      <div class="infos-area">
                        <p class="value-money"> <span id="total-investment-value"></span> </p>
                        <!-- <p class="percent-area"> <span class="percent-description">Ganho adicional</span> <span id="total-invest-percent-value" class="percent-value"></span> </p> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="graphic savings">
                  <div class="graphic-legend-name">
                    <span class="legend-name">Poupança</span>
                    <div class="tooltip top">
                      <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"></path>
                        <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"></rect>
                      </svg>
                      <div class="tooltiptext">
                        Aplicação de renda fixa disponível em bancos e isenta de IR. Renda 70% da Selic quando ela está acima de 8,5%.
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <div class="graphic-container">
                      <div class="over" class="savings" id="rentability-diff-savings-percent-graphic"></div>
                      <div class="infos-area">
                        <p class="value-money"> R$ <span id="rentability-diff-savings-rentability-value" class="rentability-value"></span> </p>
                        <p class="percent-area"> <span class="percent-description">Ganho adicional</span> <span id="rentability-diff-savings-percent-value" class="percent-value"></span> </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="graphic">
                  <div class="graphic-legend-name">
                    <span class="legend-name">Tesouro Prefixado</span>
                    <div class="tooltip top">
                      <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"></path>
                        <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"></rect>
                      </svg>
                      <div class="tooltiptext">
                        Título público atrelado a uma taxa fixada no momento da compra do papel (alíquota de IR progressiva, de 15% a 27,5%).
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <div class="graphic-container">
                      <div class="over" class="rentability-diff" id="rentability-diff-tesouro-pre-percent-graphic"></div>
                      <div class="infos-area">
                        <p class="value-money"> R$ <span id="rentability-diff-tesouro-pre-rentability-value" class="rentability-value"></span> </p>
                        <!-- <p id="rentability-diff-tesouro-pre-total-value"></p> -->
                        <p class="percent-area"> <span class="percent-description">Ganho adicional</span> <span id="rentability-diff-tesouro-pre-percent-value" class="percent-value"></span> </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="graphic">
                  <div class="graphic-legend-name">
                    <span class="legend-name">Tesouro Selic</span>
                    <div class="tooltip top">
                      <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"></path>
                        <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"></rect>
                      </svg>
                      <div class="tooltiptext">
                        Título público pós-fixado que acompanha a variação da taxa Selic (alíquota de IR progressiva, de 15% a 27,5%).
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <div class="graphic-container">
                      <div class="over" class="rentability-diff" id="rentability-diff-tesouro-selic-percent-graphic"></div>
                      <div class="infos-area">
                        <p class="value-money"> R$ <span id="rentability-diff-tesouro-selic-rentability-value" class="rentability-value"></span> </p>
                        <!-- <p id="rentability-diff-tesouro-selic-total-value"></p> -->
                        <p class="percent-area"> <span class="percent-description">Ganho adicional</span> <span id="rentability-diff-tesouro-selic-percent-value" class="percent-value"></span> </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="graphic">
                  <div class="graphic-legend-name">
                    <span class="legend-name">Tesouro IPCA</span>
                    <div class="tooltip top">
                      <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"></path>
                        <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"></rect>
                      </svg>
                      <div class="tooltiptext">
                        Título público híbrico atrelado à inflação mais uma taxa de juros fixa alíquota de IR progressiva, de 15% a 27,5%).
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <div class="graphic-container">
                      <div class="over" class="rentability-diff" id="rentability-diff-tesouro-ipca-percent-graphic"></div>
                      <div class="infos-area">
                        <p class="value-money"> R$ <span id="rentability-diff-tesouro-ipca-rentability-value" class="rentability-value"></span> </p>
                        <!-- <p id="rentability-diff-tesouro-ipca-total-value"></p> -->
                        <p class="percent-area"> <span class="percent-description">Ganho adicional</span> <span id="rentability-diff-tesouro-ipca-percent-value" class="percent-value"></span> </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="graphic">
                  <div class="graphic-legend-name">
                    <span class="legend-name">CDB e LC</span>
                    <div class="tooltip top">
                      <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"></path>
                        <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"></rect>
                      </svg>
                      <div class="tooltiptext">
                        Títulos de dívida bancária, podem ser pré ou pós-fixados atrelados a indexadores como o CDI ou IPCA (alíquota de IR progressiva, de 15% a 27,5%).
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <div class="graphic-container">
                      <div class="over" class="rentability-diff" id="rentability-diff-cdb-percent-graphic"></div>
                      <div class="infos-area">
                        <p class="value-money"> R$ <span id="rentability-diff-cdb-rentability-value" class="rentability-value"></span> </p>
                        <!-- <p id="rentability-diff-cdb-total-value"></p> -->
                        <p class="percent-area"> <span class="percent-description">Ganho adicional</span> <span id="rentability-diff-cdb-percent-value" class="percent-value"></span> </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="graphic lci-lca">
                  <div class="graphic-legend-name">
                    <span class="legend-name">LCI e LCA</span>
                    <div class="tooltip top">
                      <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"></path>
                        <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"></rect>
                      </svg>
                      <div class="tooltiptext">
                        Letras de Crédito Imobiliário e do Agronegócio. São isentas de IR.
                      </div>
                    </div>
                  </div>
                  <div class="content">
                    <div class="graphic-container">
                      <div class="over" class="rentability-diff" id="rentability-diff-lci-percent-graphic"></div>
                      <div class="infos-area">
                        <p class="value-money"> R$ <span id="rentability-diff-lci-rentability-value" class="rentability-value"></span> </p>
                        <!-- <p id="rentability-diff-lci-total-value"></p> -->
                        <p class="percent-area"> <span class="percent-description">Ganho adicional</span> <span id="rentability-diff-lci-percent-value" class="percent-value"></span> </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <?php if (get_field('mais_informacoes')) { ?>
          <div class="mais_informacoes">
            <?php echo get_field('mais_informacoes'); ?>
          </div>
        <?php } ?>

        <?php if (have_rows('faq_calculadora')) { ?>
          <div class="faq">
            <?php while (have_rows('faq_calculadora')) {
              the_row(); ?>
              <div class="item_tab">
                <button aria-label="Entrar" class="accordion">
                  <h2><?php the_sub_field('titulo'); ?></h2>
                  <i class="fa fa-plus"></i>
                  <i class="fa fa-minus desactive"></i>
                </button>
                <div class="panel">
                  <?php the_sub_field('descricao'); ?>
                </div>
              </div>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if (have_rows('ferramentas')) : ?>
          <div class="ferramentas">
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
          </div>
        <?php endif; ?>

      </section>
      <div class="sidebar">
        <?php get_template_part('components/on-code/recent-posts/recent-posts', null, ['side' => true, 'quantity' => 5]); ?>
      </div>
    </div>
  </div>

</main>

<?php get_footer(); ?>
<script>
  jQuery('.openmodale').click(function(e) {
    e.preventDefault();
    jQuery('.modale').addClass('opened');
  });
  jQuery('.closemodale').click(function(e) {
    e.preventDefault();
    jQuery('.modale').removeClass('opened');
  });
</script>
<script>
  const POUPANCA_RENTABILITY = <?php echo get_option('calculadora_taxas_rentabilidade_poupanca'); ?>;
  const INFLATION_IPCA = <?php echo get_option('calculadora_taxas_inflacao'); ?>;
  const RATE_SELIC = <?php echo get_option('calculadora_taxas_tesouro_selic'); ?>;
  const RATE_TESOURO_PREFIXADO = <?php echo get_option('calculadora_taxas_tesouro_prefixado2022'); ?>;
  const RATE_TESOURO_IPCA = <?php echo get_option('calculadora_taxas_tesouro_ipcamais2024'); ?>;
  const RATE_CDB_LC = <?php echo get_option('calculadora_taxas_cdb_lc'); ?>;
  const RATE_LCA_LCI = <?php echo get_option('calculadora_taxas_lci_lca'); ?>;
  const RATE_CDI = <?php echo get_option('calculadora_taxas_cdi'); ?>;
  const DATE_BOLETIM_FOCUS = '<?php echo get_option('calculadora_taxas_date_focus'); ?>';
</script>
<!-- <script src="<?php // echo get_template_directory_uri(); 
                  ?>/admin/js/calc-investimentos.js?v=<?php // echo microtime(); 
                                                      ?>"></script> -->