jQuery( document ).ready(function($) {

  function ExibirCalculadora(tipo) {
      $('*[calculator-type="' + tipo + '"]').slideDown({
          start: function () {
              $(this).css({
                  display: "flex"
              })
          }
      });
  }
  function EsconderCalculadora(tipo) {
      $('*[calculator-type="'+tipo+'"]').slideUp();
  }

  function CalcularSalarioLiquidoPJ(tipo) {

      var tipoLowerCase = tipo.toLowerCase();
      var tipoUpperCase = tipo.toUpperCase();

      var inputFaturamento = $('#inputFaturamento'+tipoUpperCase).maskMoney('unmasked')[0];
      var inputDescontos = $('#inputDescontos'+tipoUpperCase).maskMoney('unmasked')[0];
      var inputAliquota = $('#inputAliquota'+tipoUpperCase).val().replace(",",".");


      /* Calculo salário líquido */
      var valorTotalImposto = (inputFaturamento * inputAliquota) / 100 
      var salarioLiquido = (inputFaturamento - inputDescontos - valorTotalImposto);
      var valorSalarioLiquido = salarioLiquido.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

      $("#calc-result-area-"+tipoLowerCase+" td[data-label='proventos-faturamento']").text(inputFaturamento.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='descontos-outros']").text(inputDescontos.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='aliquota-imposto']").text(inputAliquota.replace(".",",") + '%');
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='imposto-calculado']").text(valorTotalImposto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='valor-salario-liquido']").text(valorSalarioLiquido);

      $('.calculator-table-area').slideUp();
      $("#calc-result-area-"+tipoLowerCase).slideDown();
  }
  function VerificaBotoesPJ(tipo) {
      var tipoUpperCase = tipo.toUpperCase();
      let inputFaturamentoPJ = $('#inputFaturamento'+tipoUpperCase).val();
      let inputDescontosPJ = $('#inputDescontos'+tipoUpperCase).val();
      let inputAliquotaPJ = $('#inputAliquota'+tipoUpperCase).val();

      if(!inputDescontosPJ) {
          inputDescontosPJ = 0;
      }

      let clearInputsBtnPJ = $('#clearInputsBtn'+tipoUpperCase);
      let calcBtnPJ = $('#calcBtn'+tipoUpperCase);

      if( (inputFaturamentoPJ !== "") && (inputAliquotaPJ !== "") ) {
          clearInputsBtnPJ.removeClass('disabled');
          calcBtnPJ.removeClass('disabled');
      }
  }

  function CalcularSalarioLiquidoMEI(tipo) {

      var tipoLowerCase = tipo.toLowerCase();
      var tipoUpperCase = tipo.toUpperCase();

      var inputReceitaAnualMEI = $('#inputReceitaAnual'+tipoUpperCase).maskMoney('unmasked')[0];
      var inputDespesaMEI = $('#inputDespesa'+tipoUpperCase).maskMoney('unmasked')[0];
      var selectTipoDeAtividadeTexto = $('#selectTipoDeAtividade'+tipoUpperCase).text();
      var selectTipoDeAtividade = $('#selectTipoDeAtividade'+tipoUpperCase).val();
      var valorINSS = 66;
      var valorICMS_ISS = 1;
      var valorTotalDASMEI = valorINSS + valorICMS_ISS;

      if(!inputDespesaMEI) {
          inputDespesaMEI = 0;
      }
      if(selectTipoDeAtividade == "8") {
          valorINSS = 66;
          valorICMS_ISS = 1;
          valorTotalDASMEI = valorINSS + valorICMS_ISS;
      }
      if(selectTipoDeAtividade == "16") {
          valorINSS = 66;
          valorICMS_ISS = 5;
          valorTotalDASMEI = valorINSS + valorICMS_ISS;
      }
      if(selectTipoDeAtividade == "32") {
          valorINSS = 66;
          valorICMS_ISS = 6;
          valorTotalDASMEI = valorINSS + valorICMS_ISS;
      }

      /* Calculo salário líquido */
      var valorLucroEvidenciado = inputReceitaAnualMEI - inputDespesaMEI;
      var percentualDaAtividade = selectTipoDeAtividade / 100;
      var valorParcelaIsenta = inputReceitaAnualMEI * percentualDaAtividade;
      var valorParcelaTributavelDoLucro = valorLucroEvidenciado - valorParcelaIsenta;

      $("#calc-result-area-"+tipoLowerCase+" td[data-label='receita-bruta-anual-valor']").text(inputReceitaAnualMEI.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='despesas-comprovadas-valor']").text(inputDespesaMEI.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='lucro-evidenciado-valor']").text(valorLucroEvidenciado.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='parcela-isenta-texto'] span[data-label='parcela-isenta-porcentagem-valor']").text(selectTipoDeAtividade + '%');
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='parcela-isenta-texto'] span[data-label='parcela-isenta-receita-bruta-valor']").text(inputReceitaAnualMEI.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='parcela-isenta-valor']").text(valorParcelaIsenta.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='das-mei-lucro-valor']").text(valorTotalDASMEI.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area-"+tipoLowerCase+" td[data-label='parcela-tributavel-do-lucro-valor']").text(valorParcelaTributavelDoLucro.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

      $('.calculator-table-area').slideUp();
      $("#calc-result-area-"+tipoLowerCase).slideDown();
  }
  function VerificaBotoesMEI(tipo) {
      var tipoUpperCase = tipo.toUpperCase();

      let inputReceitaAnualMEI = $('#inputReceitaAnual'+tipoUpperCase).maskMoney('unmasked')[0];
      let inputDespesaMEI = $('#inputDespesa'+tipoUpperCase).maskMoney('unmasked')[0];
      let selectTipoDeAtividadeTexto = $('#selectTipoDeAtividade'+tipoUpperCase).text();
      let selectTipoDeAtividade = $('#selectTipoDeAtividade'+tipoUpperCase).val();

      if(!inputDespesaMEI) {
          inputDespesaMEI = 0;
      }

      let clearInputsBtnMEI = $('#clearInputsBtn'+tipoUpperCase);
      let calcBtnMEI = $('#calcBtn'+tipoUpperCase);

      if( (inputReceitaAnualMEI !== "") && (inputDespesaMEI !== "") ) {
          clearInputsBtnMEI.removeClass('disabled');
          calcBtnMEI.removeClass('disabled');
      }
  }

  /* Mascaras de inputs */
  $('.input-money').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

  $('.input-integer').on('blur change input', function () {
      $(this).val(function (i, input) {
          input = input.replace(/\D+/g, '');
          return input
      });
  }).trigger('blur');

  $('.input-decimal').on('blur change input', function () {
      $(this).val(function (i, input) {
          input = input.replace(/\D/g, '');
          return (input / 100).toFixed(2).replace(".",",");
      });
  }).trigger('blur');

  /* Escolhendo o tipo de calculadora */
  $('#selectTipoDeCalculadora').on('change', function() {
      let tipoDeCalculadora = $(this).val();
      console.log("Tipo de calculadora: "+tipoDeCalculadora);

      $('.calculator-table-area').slideUp();

      if(tipoDeCalculadora == "CLT") {
          ExibirCalculadora("CLT");
          EsconderCalculadora("PJ");
          EsconderCalculadora("MEI");
      }
      if(tipoDeCalculadora == "PJ") {
          ExibirCalculadora("PJ");
          EsconderCalculadora("CLT");
          EsconderCalculadora("MEI");
      }
      if(tipoDeCalculadora == "MEI") {
          ExibirCalculadora("MEI");
          EsconderCalculadora("CLT");
          EsconderCalculadora("PJ");
      }
  })

  /* ==== CLT ==== */
      /* Verificação para habilitar botões - CLT */
          $('#calculatorFormCLT input').on('input change keypress', function() {
          let inputSalarioBruto = $('#inputSalarioBruto').val();

          let clearInputsBtn = $('#clearInputsBtn');
          let calcBtn = $('#calcBtn');

          if( (inputSalarioBruto !== "")) {
              clearInputsBtn.removeClass('disabled');
              calcBtn.removeClass('disabled');
          }
      });

      /* Limpeza de inputs ao clicar no botão "Limpar" - CLT */
      $('#clearInputsBtn').on('click', function(e){
          $('.calculator-content').find('input[type="text"]').val('');

          let clearInputsBtn = $('#clearInputsBtn');
          let calcBtn = $('#calcBtn');

          clearInputsBtn.addClass('disabled');
          calcBtn.addClass('disabled');

          $("#calc-result-area-clt td[data-label='total-investido-valor']").text('');

          $("#calc-result-area-clt td[data-label='total-juros-titulo'] span[data-title='juros-titulo']").text('');
          $("#calc-result-area-clt td[data-label='total-juros-valor']").text('');
          $("#calc-result-area-clt td[data-label='total-valor']").text('');

          $('#calc-result-area-clt').slideUp();
      })

      /* Calculo INSS */
      function CalculoINSS(salarioBruto) {
          var aliquotaINSS = 0.075; /* 7.5% */
          var aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
          var deducaoINSS = 0;
          if(salarioBruto <= 1302) {
              /* 'Valor menor ou igual a R$ 1.302,00'; */
              return {
                  'aliquota': aliquotaINSS,
                  'aliquotaExibicao': aliquotaINSSFormatada,
                  'deducao': deducaoINSS,
                  'total': (salarioBruto * aliquotaINSS) - deducaoINSS
              };
          }
          if((salarioBruto > 1302) && (salarioBruto <= 2571.29)) {
              /* 'Valor Menor ou igual a R$ 2.571,29'; */
              aliquotaINSS = 0.09; /* 9% */
              aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
              deducaoINSS = 19.80;
              return {
                  'aliquota': aliquotaINSS,
                  'aliquotaExibicao': aliquotaINSSFormatada,
                  'deducao': deducaoINSS,
                  'total': (salarioBruto * aliquotaINSS) - deducaoINSS
              };
          }
          if((salarioBruto > 2571.29) && (salarioBruto <= 3856.94)) {
              /* 'Valor Menor ou igual a R$ 3.856,94'; */
              aliquotaINSS = 0.12; /* 12% */
              aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
              deducaoINSS = 96.94;
              return {
                  'aliquota': aliquotaINSS,
                  'aliquotaExibicao': aliquotaINSSFormatada,
                  'deducao': deducaoINSS,
                  'total': (salarioBruto * aliquotaINSS) - deducaoINSS
              };
          }
          if((salarioBruto > 3856.94)) {
              /* 'Valor maior que 3.856,94'; */
              aliquotaINSS = 0.14; /* 14% */
              aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
              deducaoINSS = 174.08;
              total = (salarioBruto * aliquotaINSS) - deducaoINSS;
              if(total > 876.97) {
                  total = 876.97;
                  aliquotaINSSFormatada = "Teto";
              } 
              return {
                  'aliquota': aliquotaINSSFormatada,
                  'aliquotaExibicao': aliquotaINSSFormatada,
                  'deducao': deducaoINSS,
                  'total': total
              };
          }
      }

      /* Calculo IRRF */
      function CalculoIRRF(salarioBruto, dependentes, valorINSS) {
          var deducaoDependentes = dependentes * 189.59;
          var totalDeducoes = valorINSS + deducaoDependentes;
          var baseParaCalculo = salarioBruto - totalDeducoes;

          var aliquotaIRRF = 0; /* Isento */
          var valorParcelaADeduzir = 0;
          if(baseParaCalculo <= 2112) {
              /* 'Valor menor ou igual a R$ 2.112,00'; */

              // console.log('== TESTE IRRF ==');
              // console.log('valor INSS: '+valorINSS);
              // console.log('aliquota: '+aliquotaIRRF);
              // console.log('deducao: '+valorParcelaADeduzir);
              // console.log('baseParaCalculo: '+baseParaCalculo);
              // console.log('aliquotaIRRF: '+aliquotaIRRF);
              // console.log('valorParcelaADeduzir: '+valorParcelaADeduzir);

              return {
                  'aliquota': aliquotaIRRF,
                  'deducao': valorParcelaADeduzir,
                  'total': (baseParaCalculo * aliquotaIRRF) - valorParcelaADeduzir
              };
          }
          if((baseParaCalculo > 2112) && (baseParaCalculo <= 2826.65)) {
              /* 'Valor menor ou igual a R$ 2.826,65'; */
              aliquotaIRRF = 0.075; /* 7,5% */
              valorParcelaADeduzir = 158.40;

              return {
                  'aliquota': aliquotaIRRF,
                  'deducao': valorParcelaADeduzir,
                  'total': (baseParaCalculo * aliquotaIRRF) - valorParcelaADeduzir
              };
          }
          if((baseParaCalculo > 2826.65) && (baseParaCalculo <= 3751.05)) {
              /* 'Valor menor ou igual a R$ 3.751,05'; */
              aliquotaIRRF = 0.15; /* 15% */
              valorParcelaADeduzir = 370.40;

              return {
                  'aliquota': aliquotaIRRF,
                  'deducao': valorParcelaADeduzir,
                  'total': (baseParaCalculo * aliquotaIRRF) - valorParcelaADeduzir
              };
          }
          if((baseParaCalculo > 3751.05) && (baseParaCalculo <= 4664.68)) {
              /* 'Valor menor ou igual a R$ 4.664,68'; */
              aliquotaIRRF = 0.225; /* 22,5% */
              valorParcelaADeduzir = 651.73;

              return {
                  'aliquota': aliquotaIRRF,
                  'deducao': valorParcelaADeduzir,
                  'total': (baseParaCalculo * aliquotaIRRF) - valorParcelaADeduzir
              };
          }
          if((baseParaCalculo > 4664.68)) {
              /* 'Valor maior que R$ 4.664,68'; */
              aliquotaIRRF = 0.275; /* 27,5% */
              valorParcelaADeduzir = 884.96;

              return {
                  'aliquota': aliquotaIRRF,
                  'deducao': valorParcelaADeduzir,
                  'total': (baseParaCalculo * aliquotaIRRF) - valorParcelaADeduzir
              };
          }
      }

      /* Calculo do salário líquido */
      function CalculoSalarioLiquido(salarioBruto, INSS, IRRF, descontos) {
          return {
              'INSS': INSS,
              'IRRF': IRRF,
              'descontos': descontos,
              'total': salarioBruto - INSS - IRRF - descontos
          };
      }


      /* Calcular o salário líquido - CLT */
      $('#calculatorFormCLT').on('submit', function(e){
          e.preventDefault();

          var inputSalarioBruto = $('#inputSalarioBruto').maskMoney('unmasked')[0];
          var inputDescontos = $('#inputDescontos').maskMoney('unmasked')[0];
          var inputDependentes = $('#inputDependentes').val();

          if(!inputDescontos) {
              inputDescontos = 0;
          }
          if(!inputDependentes) {
              inputDependentes = 0;
          }

          /* Calculo INSS */
          var INSS = CalculoINSS(inputSalarioBruto);
          var aliquotaINSS = INSS.aliquota;
          var aliquotaINSSExibicao = INSS.aliquotaExibicao;
          var deducaoINSS = INSS.deducao.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
          var valorINSS = INSS.total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

          /* Calculo IRRF */
          var IRRF = CalculoIRRF(inputSalarioBruto, inputDependentes, INSS.total);
          var aliquotaIRRF = IRRF.aliquota.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
          var deducaoIRRF = IRRF.deducao.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
          var valorIRRF = IRRF.total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

          /* Descontos totais */
          var descontosTotais = INSS.total + IRRF.total + inputDescontos;

          /* Calculo salário líquido */
          var salarioLiquido = CalculoSalarioLiquido(inputSalarioBruto, INSS.total, IRRF.total, inputDescontos);
          var valorSalarioLiquido = salarioLiquido.total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

          $("#calc-result-area-clt td[data-label='proventos-salario-bruto']").text(inputSalarioBruto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
          $("#calc-result-area-clt td[data-label='descontos-outros']").text(inputDescontos.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
          $("#calc-result-area-clt td[data-label='aliquota-inss']").text(aliquotaINSSExibicao);
          $("#calc-result-area-clt td[data-label='descontos-inss']").text(valorINSS);
          $("#calc-result-area-clt td[data-label='aliquota-irpf']").text(aliquotaIRRF);
          $("#calc-result-area-clt td[data-label='descontos-irpf']").text(valorIRRF);
          $("#calc-result-area-clt td[data-label='proventos-consolidado']").text(inputSalarioBruto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
          $("#calc-result-area-clt td[data-label='descontos-consolidado']").text(descontosTotais.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
          $("#calc-result-area-clt td[data-label='valor-salario-liquido']").text(valorSalarioLiquido);


          $('#calc-result-area-clt').slideDown();
      });

  /* ==== PJ ==== */
      /* Verificação para habilitar botões - PJ */
      $('#calculatorFormPJ input').on('input change keypress', function() {
          VerificaBotoesPJ('PJ');
      });

      /* Limpeza de inputs ao clicar no botão "Limpar" - PJ */
      $('#clearInputsBtnPJ').on('click', function(e){
          $('.calculator-content').find('input[type="text"]').val('');

          let clearInputsBtnPJ = $('#clearInputsBtnPJ');
          let calcBtnPJ = $('#calcBtnPJ');

          clearInputsBtnPJ.addClass('disabled');
          calcBtnPJ.addClass('disabled');

          $("#calc-result-area-pj td[data-label='total-investido-valor']").text('');

          $("#calc-result-area-pj td[data-label='total-juros-titulo'] span[data-title='juros-titulo']").text('');
          $("#calc-result-area-pj td[data-label='total-juros-valor']").text('');
          $("#calc-result-area-pj td[data-label='total-valor']").text('');

          $('#calc-result-area-pj').slideUp();
      });

      /* Calcular o salário líquido - PJ */
      $('#calculatorFormPJ').on('submit', function(e){
          e.preventDefault();
          CalcularSalarioLiquidoPJ('PJ');
      });

  /* ==== MEI ==== */
      /* Verificação para habilitar botões - MEI */
      $('#calculatorFormMEI input').on('input change keypress', function() {
          VerificaBotoesMEI('MEI');
      });

      /* Limpeza de inputs ao clicar no botão "Limpar" - PJ */
      $('#clearInputsBtnMEI').on('click', function(e){
          $('.calculator-content').find('input[type="text"]').val('');

          let clearInputsBtnMEI = $('#clearInputsBtnMEI');
          let calcBtnMEI = $('#calcBtnMEI');

          clearInputsBtnMEI.addClass('disabled');
          calcBtnMEI.addClass('disabled');

          $("#calc-result-area-mei td[data-label='receita-bruta-anual-valor']").text('');
          $("#calc-result-area-mei td[data-label='despesas-comprovadas-valor']").text('');
          $("#calc-result-area-mei td[data-label='lucro-evidenciado-valor']").text('');
          $("#calc-result-area-mei td[data-label='parcela-isenta-texto'] span[data-label='parcela-isenta-porcentagem-valor']").text('');
          $("#calc-result-area-mei td[data-label='parcela-isenta-texto'] span[data-label='parcela-isenta-receita-bruta-valor']").text('');
          $("#calc-result-area-mei td[data-label='parcela-isenta-valor']").text('');
          
          $("#calc-result-area-mei td[data-label='das-mei-lucro-valor']").text('');
          $("#calc-result-area-mei td[data-label='parcela-tributavel-do-lucro-valor']").text('');

          $('#calc-result-area-mei').slideUp();
      });

      /* Calcular o salário líquido - MEI */
      $('#calculatorFormMEI').on('submit', function(e){
          e.preventDefault();
          CalcularSalarioLiquidoMEI('MEI');
      });
})