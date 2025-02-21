jQuery(document).ready(function ($) {
  const defaultValues = {
    dependentes: 189.59,
  };
  /* Mascaras de inputs */

  const applyMaskMoney = () => {
    $(".input-money").maskMoney({
      prefix: "R$ ",
      allowNegative: true,
      thousands: ".",
      decimal: ",",
      affixesStay: false,
    });
  };

  applyMaskMoney();

  
  function formatNumberToReal(value) {
    // Verifica se o valor é um número
    if (typeof value !== "number") {
      console.log(typeof value);
      return "Valor inválido";
    }

    // Converte o número para string e separa a parte inteira da decimal
    const stringValue = value.toFixed(2);
    const [integerPart, decimalPart] = stringValue.split(".");

    // Formata a parte inteira com separadores de milhar manualmente
    let formattedIntegerPart = "";
    for (let i = integerPart.length - 1, count = 0; i >= 0; i--, count++) {
      if (count > 0 && count % 3 === 0) {
        formattedIntegerPart = "." + formattedIntegerPart;
      }
      formattedIntegerPart = integerPart[i] + formattedIntegerPart;
    }

    const formattedValue = `R$ ${formattedIntegerPart},${decimalPart}`;

    if (formattedValue === "R$ 0,00") {
      return "-";
    } else {
      return formattedValue;
    }
  }

  /* Função para exibir tabela de resultado (.calculator-table-area) usando o slideDown*/
  const showTable = (show) => {
    const tableArea = document.querySelector(".calculator-table-area");

    if (show) {
      $(tableArea).slideDown({
        start: function () {
          $(this).css({
            display: "block",
          });
        },
      });
    } else {
      $(tableArea).slideUp();
    }
  };

/* Calculo INSS */
function CalculoINSS(salarioBruto) {
  var faixasDaBase = [
    { limite: 1412.00, aliquota: 0.075, deducao: 0.00 },
    { limite: 2666.68, aliquota: 0.09, deducao: 21.18 },
    { limite: 4000.03, aliquota: 0.12, deducao: 101.18 },
    { limite: 7786.02, aliquota: 0.14, deducao: 181.18 }
  ];
  
  var total = 0;
  var aliquotaExibicao = "14%"; // Por padrão, assume a última faixa
  
  for (var i = 0; i < faixasDaBase.length; i++) {
    var faixa = faixasDaBase[i];

    if (salarioBruto <= faixa.limite) {
      var aliquotaINSS = faixa.aliquota;
      var deducaoINSS = faixa.deducao;
      
      total = salarioBruto * aliquotaINSS - deducaoINSS;
      aliquotaExibicao = aliquotaINSS.toLocaleString("en", {
        style: "percent",
        maximumFractionDigits: 2
      });
      
      return {
        aliquota: aliquotaINSS,
        aliquotaExibicao: aliquotaExibicao,
        deducao: deducaoINSS,
        total: total
      };
    }
  }

  // Caso o salário bruto ultrapasse o limite da última faixa
  total = 908.86;
  
  return {
    aliquota: aliquotaExibicao,
    aliquotaExibicao: aliquotaExibicao,
    deducao: 181.18,
    total: total
  };
}

/* Cálculo de IRRF - Atualizado para 2024 */
function CalculoIRRF(salarioBruto, dependentes = 0, pensaoAlimenticia = 0, deducoes = 0) {
  if (!salarioBruto) {
    return;
  }

  var valorINSS = CalculoINSS(salarioBruto).total;

  var deducaoDependentes = dependentes * defaultValues.dependentes;

  var totalDeducoes = valorINSS + deducaoDependentes + pensaoAlimenticia + deducoes;

  var baseParaCalculo = salarioBruto - totalDeducoes;

  var faixasIRRF = [
    { limite: 2259.20, aliquota: 0.00, deducao: 0.00 },
    { limite: 2826.65, aliquota: 0.075, deducao: 169.44 },
    { limite: 3751.05, aliquota: 0.15, deducao: 381.44 },
    { limite: 4664.68, aliquota: 0.225, deducao: 662.77 },
    { limite: Infinity, aliquota: 0.275, deducao: 896.00 }
  ];

  for (var i = 0; i < faixasIRRF.length; i++) {
    var faixa = faixasIRRF[i];

    if (baseParaCalculo <= faixa.limite) {
      return {
        valorINSS: valorINSS,
        aliquota: faixa.aliquota,
        deducao: faixa.deducao,
        total: baseParaCalculo * faixa.aliquota - faixa.deducao
      };
    }
  }
}

  // Remover classe disabled do calcBtn e do clearInputsBtn quando o inputSalarioBruto estiver preenchido e vice-versa
  $("#inputSalarioBruto").on('change input', function () {
    if (Number($(this).maskMoney("unmasked")[0])) {
      $("#calcBtn").removeClass("disabled");
      $("#clearInputsBtn").removeClass("disabled");
    } else {
      $("#calcBtn").addClass("disabled");
    }
  });

  /* Ao apertar em calcular, criar as tabelas com os valores correspondentes */
  $("#calcBtn").click(function (e) {
    e.preventDefault();

    const salarioBrutoValue = $("#inputSalarioBruto").maskMoney("unmasked")[0];
    const dependentesValue = $("#inputDependentes").val();
    const pensaoAlimenticiaValue = $("#inputPensaoAlimenticia").maskMoney(
      "unmasked"
    )[0];
    const deducoesValue = $("#inputDescontos").maskMoney("unmasked")[0];

    const valorIRRF = CalculoIRRF(
      salarioBrutoValue,
      dependentesValue,
      pensaoAlimenticiaValue,
      deducoesValue
    );

    // Calculo de todos os desconto (INSS + Dependentes + Pensão + Outras)
    const totalDescontos =
      valorIRRF.valorINSS +
      dependentesValue * defaultValues.dependentes +
      pensaoAlimenticiaValue +
      deducoesValue;

    // Exibe valor do imposto descontado
    $("#valor-do-desconto").text(formatNumberToReal(valorIRRF.total));
    $("#valor-resultado-faixa").text(formatNumberToReal(valorIRRF.total));

    // Exibe valor de rendimentos tributaveis (rendimentos-tributaveis-valor)
    $("#rendimentos-tributaveis-valor").text(
      formatNumberToReal(salarioBrutoValue)
    );

    // Exibe valor de deducoes dependentes (deducoes-dependentes)
    $("#deducoes-dependentes").text(
      formatNumberToReal(dependentesValue * defaultValues.dependentes)
    );

    // Exibe valor de deducoes pensao alimenticia (deducoes-pensao-alimenticia)
    $("#deducoes-pensao").text(formatNumberToReal(pensaoAlimenticiaValue));

    // Exibe valor de deducoes outros (deducoes-outros)
    $("#deducoes-outros").text(formatNumberToReal(deducoesValue));

    // Exite o valor da base de calculo (entrada - deducoes) campos base-valor
    $("#base-valor").text(
      formatNumberToReal(salarioBrutoValue - totalDescontos)
    );

    // Tabela de faixas da Base de Cálculo
    let valorBaseFaixas = salarioBrutoValue - totalDescontos;
    let faixasDaBase = [
      {
        valorInicial: 0,
        valorFinal: 2259.20,
       //valorFaixa: 2259.20,
        aliquota: 0,
        valorParcelaADeduzir: 0,
        valorDeduzido: 0,
      },
      {
        valorInicial: 2259.21,
        valorFinal: 2826.65,
        //valorFaixa: 714.64,
        aliquota: 0.075,
        valorParcelaADeduzir: 169.44,
        valorDeduzido: 0,
      },
      {
        valorInicial: 2826.66,
        valorFinal: 3751.05,
       //valorFaixa: 924.39,
        aliquota: 0.15,
        valorParcelaADeduzir: 381.44,
        valorDeduzido: 0,
      },
      {
        valorInicial: 3751.06,
        valorFinal: 4664.68,
        //valorFaixa: 913.63,
        aliquota: 0.225,
        valorParcelaADeduzir: 662.77,
        valorDeduzido: 0,
      },
      {
        valorInicial: 4664.69,
        valorFinal: Infinity,
        aliquota: 0.275,
        valorParcelaADeduzir: 896,
        valorDeduzido: 0,
      },
    ];

    function calcularImpostoDeduzido(baseCalculo) {
      const valoresImpostoDeduzidoEAliquotasPorFaixa = [];
      let totalImposto = 0;

      for (let i = 0; i < faixasDaBase.length; i++) {
        const faixa = faixasDaBase[i];
        let valorDeduzidoFaixa = 0;
        let impostoFaixa = 0;
        let faixaUtilizada = 0;

        if (baseCalculo >= faixa.valorInicial) {
          faixaUtilizada =
            Math.min(baseCalculo, faixa.valorFinal) - faixa.valorInicial;
          aliquotaFaixa = (faixa.aliquota * 100).toFixed(2); //
          valorDeduzidoFaixa =
            (aliquotaFaixa / 100) * faixaUtilizada.toFixed(2);
          impostoFaixa = 0;
        }

        totalImposto += impostoFaixa;

        valoresImpostoDeduzidoEAliquotasPorFaixa.push({
          faixa: i + 1,
          faixaUtilizada: faixaUtilizada,
          valorDeduzido: valorDeduzidoFaixa.toFixed(2),
        });

        if (baseCalculo <= faixa.valorInicial) {
          break;
        }
      }

      showTable(true);

      return {
        valoresImpostos: valoresImpostoDeduzidoEAliquotasPorFaixa,
        aliquotaEfetiva: (totalImposto / baseCalculo).toFixed(2),
      };
    }

    // Exibir faixa utilizada faixa-2, faixa-3, faixa-4, faixa-5
    const impostoDeduzido = calcularImpostoDeduzido(valorBaseFaixas);
    console.log("impostoDeduzido", impostoDeduzido);

    // Exibir valor deduzido faixa-2, faixa-3, faixa-4, faixa-5
    console.log(impostoDeduzido.valoresImpostos);

    // Limpar valores das faixas
    $(".faixa-aliquota").text("-");
    $(".faixa-valor").text("-");

    impostoDeduzido.valoresImpostos.forEach((faixa, index) => {
      if (index > 0) {
        $(`#faixa-${index + 1}-aliquota`).text(
          formatNumberToReal(Number(faixa.faixaUtilizada))
        );
        $(`#faixa-${index + 1}`).text(
          formatNumberToReal(Number(faixa.valorDeduzido))
        );
      }
    });
  });

  $("#clearInputsBtn").click(function (e) {
    $("#clearInputsBtn").addClass("disabled");
    $("#calcBtn").addClass("disabled");

    // Ocultar tabela de resultado
    showTable(false);
  });
});
