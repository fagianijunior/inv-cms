$( document ).ready(function() {

  $('.calculator-content input').on('input change keypress blur', function() {
      let inputCapitalInicial = $('#inputCapitalInicial').val();
      let inputJuros = $('#inputJuros').val();
      let inputPeriodo = $('#inputPeriodo').val();

      let clearInputsBtn = $('#clearInputsBtn');
      let calcBtn = $('#calcBtn');

      if( (inputCapitalInicial !== "") && (inputJuros !== "") && (inputPeriodo !== "") ) {
          clearInputsBtn.removeClass('disabled');
          calcBtn.removeClass('disabled');
      }
  });

  $("#inputCapitalInicial").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
  $('#inputJuros').on('blur change input', function () {
      $(this).val(function (i, input) {
          input = input.replace(/\D/g, '');
          return (input / 100).toFixed(2).replace(".",",");
      });
  }).trigger('blur');
  $('#inputPeriodo').on('blur change input', function () {
      $(this).val(function (i, input) {
          input = input.replace(/\D+/g, '');
          return input
      });
  }).trigger('blur');

  $('#clearInputsBtn').on('click', function(e){
      $('.calculator-content').find('input[type="text"]').val('');

      let clearInputsBtn = $('#clearInputsBtn');
      let calcBtn = $('#calcBtn');

      clearInputsBtn.addClass('disabled');
      calcBtn.addClass('disabled');

      $("#calc-result-area td[data-label='total-investido-valor']").text('');

      $("#calc-result-area td[data-label='total-juros-titulo'] span[data-title='juros-titulo']").text('');
      $("#calc-result-area td[data-label='total-juros-valor']").text('');
      $("#calc-result-area td[data-label='total-valor']").text('');

      $('#calc-result-area').slideUp();

  })

  $('#calculatorForm').on('submit', function(e){
      e.preventDefault();

      var capitalInicial = $('#inputCapitalInicial').maskMoney('unmasked')[0];
      var taxaJuros = $('#inputJuros').val().replace(",",".");
      var inputPeriodo = $('#inputPeriodo').val();
      var valoresSelect = $(this).find("input[type=radio]:checked");

      var jurosSelect = valoresSelect[0].value;
      var periodoSelect = valoresSelect[1].value;

      var juros = 0;
      var opcaoCalculo = '';
      if(jurosSelect == 'Anual' && periodoSelect == "Anual") {
          opcaoCalculo = 1;
          juros = (capitalInicial * (taxaJuros / 100) * inputPeriodo);
      }
      if(jurosSelect == 'Mensal' && periodoSelect == "Mensal") {
          opcaoCalculo = 2;
          juros = (capitalInicial * taxaJuros * inputPeriodo) / 100;
      }
      if((jurosSelect == 'Anual' && periodoSelect == "Mensal")) {
          opcaoCalculo = 3;
          taxaJuros = taxaJuros / 12;
          juros = (capitalInicial * taxaJuros * inputPeriodo) / 100;
      }
      if((jurosSelect == 'Mensal' && periodoSelect == "Anual")) {
          opcaoCalculo = 4;
          inputPeriodo = inputPeriodo * 12;
          juros = (capitalInicial * taxaJuros * inputPeriodo) / 100;
      }

      var total = capitalInicial + juros;

      $("#calc-result-area td[data-label='total-investido-valor']").text(capitalInicial.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

      $("#calc-result-area td[data-label='total-juros-titulo'] span[data-title='juros-titulo']").text(jurosSelect.toLowerCase());
      $("#calc-result-area td[data-label='total-juros-valor']").text(juros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      $("#calc-result-area td[data-label='total-valor']").text(total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

      $('#calc-result-area').slideDown();
  })
})