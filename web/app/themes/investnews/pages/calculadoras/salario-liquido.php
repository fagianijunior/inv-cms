<?php /* Template Name: Calculadora de salário líquido */ ?>
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
      <div class="content-calculadora">
        <div class="line-group">
          <div class="select-item">
            <label for="selectTipoDeCalculadora">
              Tipo de calculadora
              <!-- <div class="tooltip top">
                          <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"/>
                              <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"/>
                          </svg>
                          <div class="tooltiptext">
                              Selecione como receberá seu décimo terceiro, se em parcela única ou dividido em duas parcelas.
                          </div>
                      </div> -->
            </label>
            <div class="select-area">
              <select name="selectTipoDeCalculadora" id="selectTipoDeCalculadora">
                <option value="CLT" selected>CLT</option>
                <option value="PJ">PJ</option>
                <option value="MEI">MEI</option>
              </select>
            </div>
          </div>
        </div>

        <!-- CLT -->
        <form id="calculatorFormCLT" class="calculator-content" calculator-type="CLT">
          <div class="group-itens">
            <div class="input input-w-buttons">
              <label for="inputSalarioBruto">
                Salário Bruto
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
                  <button type="button" class="input-button remove" onclick="changeMaskedMoneyValue('inputSalarioBruto',-100)">-</button>
                  <button type="button" class="input-button add" onclick="changeMaskedMoneyValue('inputSalarioBruto', 100)">+</button>
                </div>
              </div>
            </div>

            <div class="input input-w-buttons">
              <label for="inputDescontos">
                Descontos
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Descontos não oficiais e obrigatórios. Descontos alternativos acordados com a sua empresa ou determinação jurídica específca como pensão alimentícia.
                  </div>
                </div>
              </label>
              <div class="input-content">
                <input type="text" name="inputDescontos" id="inputDescontos" class="input-money" placeholder="R$ 0,00" value="R$ 0,00">
                <div class="button-group">
                  <button type="button" class="input-button remove" onclick="changeMaskedMoneyValue('inputDescontos',-100)">-</button>
                  <button type="button" class="input-button add" onclick="changeMaskedMoneyValue('inputDescontos', 100)">+</button>
                </div>
              </div>
            </div>
          </div>

          <div class="group-itens inputs-and-buttons">
            <div class="input input-w-buttons">
              <label for="inputDependentes">
                Número de dependentes
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Pessoa da qual o trabalhador seja tutor ou curador. Pessoa que pode ser incluída no Imposto de Renda do trabalhador como dependente.
                  </div>
                </div>
              </label>
              <div class="input-content">
                <input type="number" name="inputDependentes" id="inputDependentes" class="input-integer" placeholder="0" value="0">
                <div class="button-group">
                  <button type="button" class="input-button remove" onclick="changeMaskedIntegerValue('inputDependentes',-1)">-</button>
                  <button type="button" class="input-button add" onclick="changeMaskedIntegerValue('inputDependentes', 1)">+</button>
                </div>
              </div>
            </div>

            <div class="group-itens group-buttons">
              <button type="submit" id="calcBtn" class="btn solid-btn disabled">Calcular</button>
              <button type="reset" id="clearInputsBtn" class="btn outline-btn disabled">Limpar</button>
            </div>
          </div>
        </form>

        <!-- PJ -->
        <form id="calculatorFormPJ" class="calculator-content" calculator-type="PJ">
          <div class="group-itens">
            <div class="input">
              <label for="inputFaturamentoPJ">
                Faturamento
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Estimativa de faturamento mensal.
                  </div>
                </div>
              </label>
              <input type="text" name="inputFaturamentoPJ" id="inputFaturamentoPJ" class="input-money" placeholder="R$ 0,00" value="R$ 0,00">
            </div>

            <div class="input">
              <label for="inputDescontosPJ">
                Descontos
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Descontos não oficiais e obrigatórios. Descontos alternativos acordados com a sua empresa ou determinação jurídica específca como pensão alimentícia.
                  </div>
                </div>
              </label>
              <input type="text" name="inputDescontosPJ" id="inputDescontosPJ" class="input-money" placeholder="R$ 0,00" value="R$ 0,00">
            </div>
          </div>

          <div class="group-itens inputs-and-buttons">
            <div class="input">
              <label for="inputAliquotaPJ">
                Alíquota (Imposto)
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Taxa a ser paga de imposto via PJ. Este valor é importante para fazer os ajustes e equivalências entre CLT e PJ.
                  </div>
                </div>
              </label>
              <input type="text" name="inputAliquotaPJ" id="inputAliquotaPJ" class="input-decimal" placeholder="0,00" value="0,00">
            </div>

            <div class="group-itens group-buttons">
              <button type="reset" id="clearInputsBtnPJ" class="btn outline-btn disabled">Limpar</button>
              <button type="submit" id="calcBtnPJ" class="btn solid-btn disabled">Calcular</button>
            </div>
          </div>
        </form>

        <!-- MEI -->
        <form id="calculatorFormMEI" class="calculator-content" calculator-type="MEI">
          <div class="group-itens">
            <div class="input">
              <label for="inputReceitaAnualMEI">
                Total de receita anual
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    É a soma de todos os valores recebidos ao longo do ano.
                  </div>
                </div>
              </label>
              <input type="text" name="inputReceitaAnualMEI" id="inputReceitaAnualMEI" class="input-money" placeholder="R$ 0,00" value="R$ 0,00">
            </div>

            <div class="input">
              <label for="inputDespesaMEI">
                Total de despesa anual.
                <div class="tooltip top">
                  <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802" />
                    <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7" />
                  </svg>
                  <div class="tooltiptext">
                    Só é possível descontar as despesas que estiverem no CNPJ da empresa comprovados com nota fiscal e/ou recibo.
                    As duas despesas mais comuns são o Pró-labore e o DAS, pago mensalmente por todo dono de uma MEI
                  </div>
                </div>
              </label>
              <input type="text" name="inputDespesaMEI" id="inputDespesaMEI" class="input-money" placeholder="R$ 0,00" value="R$ 0,00">
            </div>
          </div>

          <div class="group-itens inputs-and-buttons">
            <div class="select-item">
              <label for="selectTipoDeAtividadeMEI">
                Categoria de Atividade
                <!-- <div class="tooltip top">
                              <svg class="info-btn" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.09954 8.8284H7.02714H6.17207H6.09967V8.756V7.21184V7.14953L6.16129 7.14025C6.66045 7.06509 7.04217 6.97345 7.30932 6.86667L7.30989 6.86644L7.30989 6.86644C7.58446 6.75937 7.76483 6.62935 7.86318 6.48194L7.86432 6.48024L7.86434 6.48025C7.97087 6.32996 8.02614 6.14287 8.02614 5.91475C8.02614 5.68588 7.97391 5.4941 7.87274 5.33614L7.87161 5.33438L7.87164 5.33436C7.77773 5.17796 7.63279 5.05689 7.43184 4.97268C7.23072 4.8884 6.96981 4.84448 6.64596 4.84448C6.20695 4.84448 5.85412 4.96705 5.58119 5.20731L5.5811 5.20739C5.31494 5.44093 5.15348 5.76337 5.10038 6.18124L5.08666 6.28923L4.99237 6.23482L4.26093 5.81275L4.21521 5.78637L4.22635 5.73477C4.30415 5.3743 4.45311 5.05828 4.67372 4.78806L4.67385 4.7879C4.90116 4.51107 5.18525 4.29836 5.52496 4.14984L5.52545 4.14962L5.52545 4.14963C5.87248 4.00101 6.26705 3.9276 6.70778 3.9276C7.16859 3.9276 7.57359 4.00085 7.921 4.14963C8.26823 4.29833 8.54051 4.51216 8.73461 4.7921C8.9366 5.07347 9.0363 5.40766 9.0363 5.79122C9.0363 6.20009 8.94452 6.54773 8.75638 6.82981M7.09954 8.8284L8.75628 6.82996C8.75631 6.82991 8.75635 6.82986 8.75638 6.82981M7.09954 8.8284V8.756V7.71848C7.43828 7.67353 7.74742 7.58504 8.02633 7.45237M7.09954 8.8284L8.02633 7.45237M8.75638 6.82981C8.57703 7.10212 8.33307 7.30974 8.02633 7.45237M8.75638 6.82981C8.75643 6.82973 8.75647 6.82966 8.75652 6.82959L8.02633 7.45237M7.11952 9.79599C6.98039 9.65696 6.7996 9.58951 6.58415 9.58951C6.3687 9.58951 6.18791 9.65696 6.04878 9.79599C5.90965 9.93502 5.84212 10.1157 5.84212 10.331C5.84212 10.5464 5.90965 10.7271 6.04878 10.8661C6.18791 11.0051 6.3687 11.0726 6.58415 11.0726C6.7996 11.0726 6.98039 11.0051 7.11952 10.8661C7.25866 10.7271 7.32618 10.5464 7.32618 10.331C7.32618 10.1157 7.25866 9.93502 7.11952 9.79599Z" fill="#636363" stroke="#636363" stroke-width="0.144802"/>
                                  <rect x="0.35" y="1.1271" width="12.5611" height="12.7459" rx="6.28055" stroke="#636363" stroke-width="0.7"/>
                              </svg>
                              <div class="tooltiptext">
                                  Selecione como receberá seu décimo terceiro, se em parcela única ou dividido em duas parcelas.
                              </div>
                          </div> -->
              </label>
              <div class="select-area">
                <select name="selectTipoDeAtividadeMEI" id="selectTipoDeAtividadeMEI">
                  <option value="8" selected>Comercio, indústria e transporte de Carga</option>
                  <option value="16">Transporte de Passageiros</option>
                  <option value="32">Serviços em Geral</option>
                </select>
              </div>
            </div>

            <div class="group-itens group-buttons">
              <button type="reset" id="clearInputsBtnMEI" class="btn outline-btn disabled">Limpar</button>
              <button type="submit" id="calcBtnMEI" class="btn solid-btn disabled">Calcular</button>
            </div>
          </div>
        </form>

        <!-- Tabela de CLT -->
        <div id="calc-result-area-clt" class="calculator-table-area">
          <h3 class="title">Quanto vou receber de sálario líquido?</h3>
          <?php if (wp_is_mobile()) { ?>
            <table class="table-mobile">
              <thead>
                <tr>
                  <th scope="col">Eventos</th>
                  <th scope="col">Valores</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-type="group-label" data-label="evento-salario-bruto" colspan="2">Salário Bruto</td>
                </tr>
                <tr>
                  <td data-label="aliquota-real-salario-bruto">Alíquota Real</td>
                  <td data-label="aliquota-salario-bruto">-</td>
                </tr>
                <tr>
                  <td data-label="proventos-salario-bruto-titulo">Proventos</td>
                  <td data-label="proventos-salario-bruto"></td>
                </tr>
                <tr>
                  <td data-label="descontos-salario-bruto-titulo">Descontos</td>
                  <td data-label="descontos-salario-bruto">-</td>
                </tr>

                <tr>
                  <td data-type="group-label" data-label="evento-outros" colspan="2">Outros</td>
                </tr>
                <tr>
                  <td data-label="evento-outros">Alíquota Real</td>
                  <td data-label="aliquota-outros">-</td>

                </tr>
                <tr>
                  <td data-label="evento-outros">Proventos</td>
                  <td data-label="proventos-outros">-</td>
                </tr>
                <tr>
                  <td data-label="evento-outros">Descontos</td>
                  <td data-label="descontos-outros"></td>
                </tr>

                <tr>
                  <td data-type="group-label" data-label="evento-inss" colspan="2">INSS</td>
                </tr>
                <tr>
                  <td data-label="evento-inss">Alíquota Real</td>
                  <td data-label="aliquota-inss"></td>
                </tr>
                <tr>
                  <td data-label="evento-inss">Proventos</td>
                  <td data-label="proventos-inss">-</td>
                </tr>
                <tr>
                  <td data-label="evento-inss">Descontos</td>
                  <td data-label="descontos-inss"></td>
                </tr>

                <tr>
                  <td data-type="group-label" data-label="evento-irpf" colspan="2">IRPF</td>
                </tr>
                <tr>
                  <td data-label="evento-irpf">Alíquota Real</td>
                  <td data-label="aliquota-irpf"></td>
                </tr>
                <tr>
                  <td data-label="evento-irpf">Proventos</td>
                  <td data-label="proventos-irpf">-</td>
                </tr>
                <tr>
                  <td data-label="evento-irpf">Descontos</td>
                  <td data-label="descontos-irpf"></td>
                </tr>

                <tr>
                  <td data-type="group-label" colspan="2">Totais</td>
                </tr>
                <tr>
                  <td>Proventos</td>
                  <td data-label="proventos-consolidado"></td>
                </tr>
                <tr>
                  <td>Descontos</td>
                  <td data-label="descontos-consolidado"></td>
                </tr>
                <tr row-label="total">
                  <td>Valor salário líquido</td>
                  <td data-label="valor-salario-liquido"></td>
                </tr>
              </tbody>
            </table>
          <?php } else { ?>
            <table>
              <thead>
                <tr>
                  <th scope="col">Eventos</th>
                  <th scope="col">Alíquota Real</th>
                  <th scope="col">Proventos</th>
                  <th scope="col">Descontos</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="evento-salario-bruto">Salário Bruto</td>
                  <td data-label="aliquota-salario-bruto">-</td>
                  <td data-label="proventos-salario-bruto">R$ 10.000,00</td>
                  <td data-label="descontos-salario-bruto"></td>
                </tr>
                <tr>
                  <td data-label="evento-outros">Outros</td>
                  <td data-label="aliquota-outros">-</td>
                  <td data-label="proventos-outros"></td>
                  <td data-label="descontos-outros"></td>
                </tr>
                <tr>
                  <td data-label="evento-inss">INSS</td>
                  <td data-label="aliquota-inss"></td>
                  <td data-label="proventos-inss"></td>
                  <td data-label="descontos-inss"></td>
                </tr>
                <tr>
                  <td data-label="evento-irpf">IRPF</td>
                  <td data-label="aliquota-irpf"></td>
                  <td data-label="proventos-irpf"></td>
                  <td data-label="descontos-irpf"></td>
                </tr>
                <tr>
                  <td data-label="" colspan="2">Totais</td>
                  <td data-label="proventos-consolidado"></td>
                  <td data-label="descontos-consolidado"></td>
                </tr>
                <tr row-label="total">
                  <td data-label="evento-salario-liquido" colspan="2">Valor salário líquido</td>
                  <td data-label="valor-salario-liquido" colspan="2"></td>
                </tr>
              </tbody>
            </table>
          <?php } ?>
        </div>

        <!-- Tabela de PJ -->
        <div id="calc-result-area-pj" class="calculator-table-area">
          <h3 class="title">Quanto vou receber de sálario líquido?</h3>
          <?php if (wp_is_mobile()) { ?>
            <table class="table-mobile">
              <thead>
                <tr>
                  <th scope="col">Eventos</th>
                  <th scope="col">Valores</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-type="group-label" data-label="evento-faturamento" colspan="2">Faturamento</td>
                </tr>
                <tr>
                  <td data-label="aliquota-real-faturamento">Alíquota Real</td>
                  <td data-label="aliquota-faturamento">-</td>
                </tr>
                <tr>
                  <td data-label="proventos-faturamento-titulo">Proventos</td>
                  <td data-label="proventos-faturamento"></td>
                </tr>
                <tr>
                  <td data-label="descontos-faturamento-titulo">Descontos</td>
                  <td data-label="descontos-faturamento">-</td>
                </tr>

                <tr>
                  <td data-type="group-label" data-label="evento-outros" colspan="2">Outros</td>
                </tr>
                <tr>
                  <td data-label="evento-outros">Alíquota Real</td>
                  <td data-label="aliquota-outros">-</td>

                </tr>
                <tr>
                  <td data-label="evento-outros">Proventos</td>
                  <td data-label="proventos-outros">-</td>
                </tr>
                <tr>
                  <td data-label="evento-outros">Descontos</td>
                  <td data-label="descontos-outros"></td>
                </tr>

                <tr>
                  <td data-type="group-label" colspan="2">Imposto calculado</td>
                </tr>
                <tr>
                  <td>Alíquota Real</td>
                  <td data-label="aliquota-imposto"></td>
                </tr>
                <tr>
                  <td>Proventos</td>
                  <td data-label="proventos-imposto">-</td>
                </tr>
                <tr>
                  <td>Descontos</td>
                  <td data-label="imposto-calculado"></td>
                </tr>
                <tr row-label="total">
                  <td>Valor líquido</td>
                  <td data-label="valor-salario-liquido"></td>
                </tr>
              </tbody>
            </table>
          <?php } else { ?>
            <table>
              <thead>
                <tr>
                  <th scope="col">Eventos</th>
                  <th scope="col">Alíquota Real</th>
                  <th scope="col">Proventos</th>
                  <th scope="col">Descontos</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="evento-faturamento">Faturamento</td>
                  <td data-label="aliquota-faturamento">-</td>
                  <td data-label="proventos-faturamento">R$ 10.000,00</td>
                  <td data-label="descontos-faturamento"></td>
                </tr>
                <tr>
                  <td data-label="evento-outros">Outros</td>
                  <td data-label="aliquota-outros">-</td>
                  <td data-label="proventos-outros">-</td>
                  <td data-label="descontos-outros"></td>
                </tr>
                <tr>
                  <td data-label="">Imposto calculado</td>
                  <td data-label="aliquota-imposto"></td>
                  <td data-label="proventos-imposto">-</td>
                  <td data-label="imposto-calculado"></td>
                </tr>
                <tr row-label="total">
                  <td data-label="evento-salario-liquido" colspan="2">Valor líquido</td>
                  <td data-label="valor-salario-liquido" colspan="2"></td>
                </tr>
              </tbody>
            </table>
          <?php } ?>
        </div>

        <!-- Tabela de MEI -->
        <div id="calc-result-area-mei" class="calculator-table-area">
          <h3 class="title">Resultado de faturamento (MEI)</h3>
          <table>
            <thead>
              <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-label="receita-bruta-anual-texto">Receita bruta anual</td>
                <td data-label="receita-bruta-anual-valor">-</td>
              </tr>
              <tr>
                <td data-label="despesas-comprovadas-texto">Despesas comprovadas do MEI <br> (água, luz, telefone, aluguel)</td>
                <td data-label="despesas-comprovadas-valor">-</td>
              </tr>
              <tr>
                <td data-label="lucro-evidenciado-texto">Lucro evidenciado <br> (Receita bruta menos despesas comprovadas)</td>
                <td data-label="lucro-evidenciado-valor">-</td>
              </tr>
              <tr>
                <td data-label="parcela-isenta-texto">Parcela isenta <br> (<span data-label="parcela-isenta-porcentagem-valor">32%</span> da receita bruta anual de <span data-label="parcela-isenta-receita-bruta-valor">R$60.000</span>)</td>
                <td data-label="parcela-isenta-valor">-</td>
              </tr>
              <tr row-label="total">
                <td data-label="parcela-tributavel-do-lucro-texto">Parcela tributável do lucro <br> (Lucro evidenciado menos parcela isenta)</td>
                <td data-label="parcela-tributavel-do-lucro-valor">-</td>
              </tr>
              <tr>
                <td data-label="das-mei-lucro-texto">DAS MEI (valor referente a atividade)</td>
                <td data-label="das-mei-lucro-valor">-</td>
              </tr>
            </tbody>
          </table>
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
        <!-- Ferramentas Dinamicamente -->
        <?php get_template_part('components/on-code/ferramentas/ferramentas', array('ferramenta' => 'Calculadoras')); ?>
        <!-- Ferramentas dinamicamente end -->
      </div>
      <!-- AD SIDEBAR -->
      <div class="sidebar">
        <?php get_template_part('components/on-code/recent-posts/recent-posts', null, ['side' => true, 'quantity' => 5]); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>