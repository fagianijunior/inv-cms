function percentYearToMonth(e) {
  return 100 * (Math.pow(e / 100 + 1, 1 / 12) - 1)
}

jQuery( document ).ready(function($) {
  $('.calculator-content input').on('input change keypress', function() {
      let inputCapitalInicial = $('#inputCapitalInicial').val();
      let inputCapitalMensal = $('#inputCapitalMensal').val();
      let inputJuros = $('#inputJuros').val();
      let inputPeriodo = $('#inputPeriodo').val();

      if(!inputCapitalMensal) {
          inputCapitalMensal = 0
      }

      let clearInputsBtn = $('#clearInputsBtn');
      let calcBtn = $('#calcBtn');

      if( (inputCapitalInicial !== "") && (inputJuros !== "") && (inputPeriodo !== "") ) {
          calcBtn.removeClass('disabled');
      }
      if( (inputCapitalInicial !== "") || (inputJuros !== "") || (inputPeriodo !== "") ) {
          clearInputsBtn.removeClass('disabled');
      }
  });

  $('#inputCapitalInicial, #inputCapitalMensal').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

  $('#inputPeriodo').on('blur change input', function () {
      $(this).val(function (i, input) {
          input = input.replace(/\D+/g, '');
          return input
      });
  }).trigger('blur');

  $('#inputJuros').on('blur change input', function () {
      $(this).val(function (i, input) {
          input = input.replace(/\D/g, '');
          return (input / 100).toFixed(2).replace(".",",");
      });
  }).trigger('blur');

  $('#clearInputsBtn').on('click', function(e){
      $('.calculator-content').find('input[type="text"]').val('');

      $('#clearInputsBtn').addClass('disabled');
      $('#calcBtn').addClass('disabled');

      
      $("#calc-result-area td[data-label='total-investido-valor']").text('');

      $("#calc-result-area td[data-label='total-juros-titulo'] span[data-title='juros-titulo']").text('');
      $("#calc-result-area td[data-label='total-juros-valor']").text('');
      $("#calc-result-area td[data-label='total-valor']").text('');

      $('#calc-result-area').slideUp();
  });

  $('#calculatorForm').on('submit', function(e){
      e.preventDefault();

      let valorInicial = parseFloat($('#inputCapitalInicial').maskMoney('unmasked')[0]);
      let valorMensal = parseFloat($('#inputCapitalMensal').maskMoney('unmasked')[0]);
      let taxaJuros_periodo = $(this).find("input[name=TaxaDeJuros]:checked").val();
      let periodoEm = $(this).find("input[name=PeriodoEm]:checked").val();

      let periodo = parseInt($('#inputPeriodo').val()) * (periodoEm == "Anual" ? 12 : 1);
      let taxaJuros = (taxaJuros_periodo == "Anual" ? percentYearToMonth(parseFloat($('#inputJuros').val().replace(",","."))) : parseFloat($('#inputJuros').val().replace(",",".")))/100;

      let acumulado = valorInicial;
      let investido = valorInicial;
      let total = 0;

      for (let i = 1; i <= periodo; i++) {
          total = Math.floor((acumulado * taxaJuros) * 10000) / 10000;
          acumulado = Math.floor((acumulado + total + valorMensal) * 10000) / 10000;
          investido += valorMensal;
      }

      let juros = acumulado - investido;

      $("#calc-result-area td[data-label='total-investido-valor']").text(investido.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

      $("#calc-result-area td[data-label='total-juros-titulo'] span[data-title='juros-titulo']").text((taxaJuros_periodo).toLowerCase());
      $("#calc-result-area td[data-label='total-juros-valor']").text(juros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area td[data-label='total-valor']").text(acumulado.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

      $('#calc-result-area').slideDown();
  });
})