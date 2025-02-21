<?php /* Template Name: Calculadora de IRRF */ ?>
<?php get_header(); ?>

<section class="pre_hero">
  <div class="container">
    <div class="content_prehero">
      <h1 class="title"><?php the_title(); ?></h1>
      <div class="description"><?php the_excerpt(); ?></div>
    </div>
  </div>
</section>

<div class="mvp-main-box">
  <div id="mvp-post-main" class="left relative">

    <div class="container">
      <div class="content-wrap">
        <section class="content-calculadora">

          <form action="" class="calculator-content">
            <div class="group-itens">
              <div class="input input-w-buttons">
                <label for="inputSalarioBruto">
                  Qual sua renda mensal bruta?
                  <div class="tooltip top">
                    <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                      <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                    </svg>
                    <div class="tooltiptext">
                      Salário registrado na carteira de trabalho, remuneração que um trabalhador recebe por mês, sem considerar os descontos oficiais obrigatórios.
                    </div>
                  </div>
                </label>

                <div class="input-content">
                  <input type="text" name="inputSalarioBruto" id="inputSalarioBruto" class="input-money" placeholder="R$ 0,00" value="R$ 0,00">
                  <div class="button-group">
                    <button type="button" class="input-button remove" onclick="increment('inputSalarioBruto',-100)">-</button>
                    <button type="button" class="input-button add" onclick="increment('inputSalarioBruto', 100)">+</button>
                  </div>
                </div>
              </div>

              <div class="input input-w-buttons">
                <label for="inputDependentes">
                  Quantos dependentes você tem?
                  <div class="tooltip top">
                    <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                      <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                    </svg>
                    <div class="tooltiptext">
                      Esta pergunta se refere ao número de pessoas que dependem financeiramente de você, como filhos, cônjuges ou outros familiares. Pode ser importante para determinar benefícios fiscais ou planos de seguro, por exemplo.
                    </div>
                  </div>
                </label>
                <div class="input-content">
                  <input type="number" name="inputDependentes" id="inputDependentes" class="input-integer" placeholder="0" value="0">
                  <div class="button-group">
                    <button type="button" class="input-button remove" onclick="incrementMonths('inputDependentes',-1)">-</button>
                    <button type="button" class="input-button add" onclick="incrementMonths('inputDependentes', 1)">+</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="group-itens">
              <div class="input input-w-buttons">
                <label for="inputPensaoAlimenticia">
                  Gasto com pensão alimentícia
                  <div class="tooltip top">
                    <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                      <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                    </svg>
                    <div class="tooltiptext">
                      Refere-se aos pagamentos regulares feitos para sustentar financeiramente um filho ou ex-cônjuge, de acordo com uma ordem judicial ou um acordo estabelecido. Este valor geralmente é utilizado para garantir o bem-estar e as necessidades básicas do beneficiário.
                    </div>
                  </div>
                </label>
                <div class="input-content">
                  <input type="text" name="inputPensaoAlimenticia" id="inputPensaoAlimenticia" class="input-money" placeholder="R$ 0,00" value="R$ 0,00">
                  <div class="button-group">
                    <button type="button" class="input-button remove" onclick="increment('inputPensaoAlimenticia',-100)">-</button>
                    <button type="button" class="input-button add" onclick="increment('inputPensaoAlimenticia', 100)">+</button>
                  </div>
                </div>
              </div>

              <div class="input input-w-buttons">
                <label for="inputDescontos">
                  Outras deduções
                  <div class="tooltip top">
                    <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                      <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                    </svg>
                    <div class="tooltiptext">
                      Categoria genérica para despesas não incluídas nas categorias padrão de deduções fiscais, como gastos médicos e educacionais. Consulte as regras específicas para detalhes.
                    </div>
                  </div>
                </label>
                <div class="input-content">
                  <input type="text" name="inputDescontos" id="inputDescontos" class="input-money" placeholder="R$ 0,00" value="R$ 0,00">
                  <div class="button-group">
                    <button type="button" class="input-button remove" onclick="increment('inputDescontos',-100)">-</button>
                    <button type="button" class="input-button add" onclick="increment('inputDescontos', 100)">+</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="line-group actions-buttons">
              <div class="inputs-and-buttons">
                <div class="group-itens group-buttons">
                  <button type="submit" id="calcBtn" class="btn solid-btn disabled ">Calcular</button>
                  <button type="reset" id="clearInputsBtn" class="btn outline-btn disabled">Limpar</button>
                </div>
              </div>
            </div>
          </form>

          <!-- Tabela de IRRF -->
          <div id="calc-result-area-irrf" class="calculator-table-area">
            <div class="valor-descontado">
              <h2>Quanto de imposto terei descontado?</h2>
            </div>

            <div class="calculator-table-values">
              <table id="tabela-desconto">
                <tbody>
                  <tr>
                    <td>Valor desconto</td>
                    <td id="valor-do-desconto">R$ 00,00</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <hr>

            <p>Veja abaixo como funcionou o calculo do seu IRRF:</p>

            <div class="calculator-table-values">
              <table id="calculo-irrf-entrada">
                <thead>
                  <tr>
                    <th>Entrada</th>
                    <th>Valores</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Rendimentos tributáveis</td>
                    <td id="rendimentos-tributaveis-valor">-</td>
                  </tr>
              </table>
            </div>

            <div class="calculator-table-values">
              <table id="calculo-irrf-deducoes">
                <thead>
                  <tr>
                    <th>Deduções</th>
                    <th>Valores</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Dependentes</td>
                    <td id="deducoes-dependentes">-</td>
                  </tr>
                  <tr>
                    <td>Pensão alimentícia</td>
                    <td id="deducoes-pensao">-</td>
                  </tr>
                  <tr>
                    <td>Outras deduções</td>
                    <td id="deducoes-outros">-</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="calculator-table-values">
              <table id="calculo-irrf-base">
                <tbody>
                  <tr>
                    <td>Base de cálculo (entrada - deduções)</td>
                    <td id="base-valor">-</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <?php if (wp_is_mobile()) { ?>
              <div class="calculator-table-values">
                <table id="calculo-irrf-faixas">
                  <thead>
                    <tr>
                      <th>Eventos</th>
                      <th>Valores</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td class="td-mobile-title" colspan="2">1º faixa</td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                      <td>R$ 2.112,00</td>
                    </tr>
                    <tr>
                      <td>Alíquota</td>
                      <td>-</td>
                    </tr>
                    <tr>
                      <td>Imposto</td>
                      <td>-</td>
                    </tr>
                    <tr>
                      <td class="td-mobile-title" colspan="2">2º faixa</td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                      <td class="faixa-aliquota" id="faixa-2-aliquota">-</td>
                    </tr>
                    <tr>
                      <td>Alíquota</td>
                      <td>7,5%</td>
                    </tr>
                    <tr>
                      <td>Imposto</td>
                      <td class="faixa-valor" id="faixa-2">-</td>
                    </tr>
                    <tr>
                      <td class="td-mobile-title" colspan="2">3º faixa</td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                      <td class="faixa-aliquota" id="faixa-3-aliquota">-</td>
                    </tr>
                    <tr>
                      <td>Alíquota</td>
                      <td>15%</td>
                    </tr>
                    <tr>
                      <td>Imposto</td>
                      <td class="faixa-valor" id="faixa-3">-</td>
                    </tr>
                    <tr>
                      <td class="td-mobile-title" colspan="2">4º faixa</td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                      <td class="faixa-aliquota" id="faixa-4-aliquota">-</td>
                    </tr>

                    <tr>
                      <td>Alíquota</td>
                      <td>22,5%</td>
                    </tr>
                    <tr>
                      <td>Imposto</td>
                      <td class="faixa-valor" id="faixa-4">-</td>
                    </tr>
                    <tr>
                      <td class="td-mobile-title" colspan="2">5º faixa</td>
                    </tr>
                    <tr>
                      <td>Valor</td>
                      <td class="faixa-aliquota" id="faixa-5-aliquota">-</td>
                    </tr>
                    <tr>
                      <td>Alíquota</td>
                      <td>27,5%</td>
                    </tr>
                    <tr class="result">
                      <td>Valor total do Imposto</td>
                      <td id="valor-resultado-faixa">-</td>
                    </tr>
                  </tbody>

                </table>
              </div>
            <?php } else { ?>
              <div class="calculator-table-values">
                <table id="calculo-irrf-faixas">
                  <thead>
                    <tr>
                      <th colspan="2">Faixa de Desconto</th>
                      <th>Alíquota</th>
                      <th>Valor do Imposto</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>1º faixa</td>
                      <td>R$ 2.259,20 </td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
                    <tr>
                      <td>2º faixa</td>
                      <td class="faixa-aliquota" id="faixa-2-aliquota">-</td>
                      <td>7,5%</td>
                      <td class="faixa-valor" id="faixa-2">-</td>
                    </tr>
                    <tr>
                      <td>3º faixa</td>
                      <td class="faixa-aliquota" id="faixa-3-aliquota">-</td>
                      <td>15%</td>
                      <td class="faixa-valor" id="faixa-3">-</td>
                    </tr>
                    <tr>
                      <td>4º faixa</td>
                      <td class="faixa-aliquota" id="faixa-4-aliquota">-</td>
                      <td>22,5%</td>
                      <td class="faixa-valor" id="faixa-4">-</td>
                    </tr>
                    <tr>
                      <td>5º faixa</td>
                      <td class="faixa-aliquota" id="faixa-5-aliquota">-</td>
                      <td>27,5%</td>
                      <td class="faixa-valor" id="faixa-5">-</td>
                    </tr>
                    <tr class="result">
                      <td colspan="2">Valor total do Imposto</td>
                      <td colspan="2" id="valor-resultado-faixa">-</td>
                    </tr>
                  </tbody>

                </table>
              </div>
            <?php } ?>
          </div>

          <?php if (get_field('mais_informacoes')) { ?>
            <div class="mais_informacoes">
              <?php echo get_field('mais_informacoes'); ?>
            </div>
          <?php } ?>

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
  </div>
</div>

<?php get_footer(); ?>