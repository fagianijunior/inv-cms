function _mask(val) {
  return val.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
}
function screenWidth(){
  return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
}

$( document ).ready(function() {
  $('.calculator-content input').on('input change keypress blur', function() {
      let inputValor = $('#inputValor').val();
      let inputEntrada = $('#inputEntrada').val();
      let inputJuros = $('#inputJuros').val();
      let inputPeriodo = $('#inputPeriodo').val();

      if(!inputEntrada) {
          inputEntrada = 0;
      }

      let clearInputsBtn = $('#clearInputsBtn');
      let calcBtn = $('#calcBtn');

      if( 
        (inputValor !== "") && 
        (inputJuros !== "" && inputJuros != "0,00" && inputJuros != "0") && 
        (inputPeriodo !== "" && inputPeriodo !== "0") 
      ){
          calcBtn.removeClass('disabled');
      }
      if( (inputValor !== "") || (inputJuros !== "") || (inputPeriodo !== "") ) {
          clearInputsBtn.removeClass('disabled');
      }
  });

  $('#inputValor, #inputEntrada').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

  $('#inputPeriodo').on('blur change input', function () {
      $(this).val(function (i, input) {
          input = input.replace(/\D+/g, '');
          return input
      });
  }).trigger('blur');

  $('#inputJuros').on('input', function () {
      $(this).val(function (i, input) {
          input = input.replace(/\D/g, '');
          return (input / 100).toFixed(2).replace(".",",");
      });
  }).trigger('blur');

  $('#clearInputsBtn').on('click', function(e){
      $('.calculator-content').find('input[type="text"]').val('');

      $('#clearInputsBtn').addClass('disabled');
      $('#calcBtn').addClass('disabled');

      
      $('.table-price-desktop .table-price-body').html('');
      $('.table-price-mobile').html('');

      $('.calculator-table-area').slideUp();
  });

  $('#calcBtn').on('click', function(e){
      $('#calc-result-area-clt').slideDown();
  });

  $('#calculatorForm').on('submit', function(e){
      e.preventDefault();

      //limpa area de tabela
      $('.table-price-desktop .table-price-body').html('');
      $('.table-price-mobile').html('');

      let inputValor = parseFloat($('#inputValor').maskMoney('unmasked')[0]);
      let inputEntrada = parseFloat($('#inputEntrada').maskMoney('unmasked')[0]);
      let taxaJuros_periodo = $(this).find("input[name=TaxaDeJuros]:checked").val();
      let periodoEm = $(this).find("input[name=PeriodoEm]:checked").val();

      let taxaJuros = (taxaJuros_periodo == "Anual" ? (parseFloat($('#inputJuros').val().replace(",","."))/12).toFixed(2) : parseFloat($('#inputJuros').val().replace(",",".")))/100;

      let periodo = parseInt($('#inputPeriodo').val()) * (periodoEm == "Anual" ? 12 : 1);
      let valorTotal = inputValor - inputEntrada;

      let prestacao = (valorTotal * taxaJuros) / (1 - Math.pow((1+taxaJuros), -periodo));
      let tabela = [];
      let jurosTotal = 0;

      var valorRestante = valorTotal;
      $('.table-price-desktop .table-price-body').append('<tr><td>0</td><td>-</td><td>-</td><td>-</td><td>' + _mask(valorRestante) + '</td></tr>');

      //popula tabela
      for (var i = 1; i <= periodo; i++) {
          var jurosDesseMes = valorRestante * taxaJuros;
          jurosTotal += jurosDesseMes;
          var amortizacao = prestacao - jurosDesseMes;
          valorRestante -= amortizacao;
          if(valorRestante < 0) valorRestante = 0;
          tabela.push({juros: jurosDesseMes, amortizacao: amortizacao, valorRestante: valorRestante});

          $('.table-price-desktop .table-price-body').append(
              '<tr><td>' + i + '</td><td>' 
              + _mask(prestacao) + '</td><td>' 
              + _mask(jurosDesseMes) + '</td><td>' 
              + _mask(amortizacao) + '</td><td>' 
              + _mask(valorRestante) + '</td></tr>'
          );
          $('.table-price-mobile').append(
              '<thead><tr><th scope="col">Evento</th><th scope="col">Valor</th></tr></thead>'
              +'<tbody><tr style="background: #E0DFE0;"><td colspan="2" style="color: #000;">Nº ' + i + '</td></tr>'
              +'<tr><td>Parcela</td><td>' + _mask(prestacao) + '</td></tr>'
              +'<tr><td>Juros</td><td>' + _mask(jurosDesseMes) + '</td></tr>'
              +'<tr><td>Amortização</td><td>' + _mask(amortizacao) + '</td></tr>'
              +'<tr><td>Saldo Devedor</td><td>' + _mask(valorRestante) + '</td></tr></tbody>'
          );
      }

      //popula box de informacoes
      $('.calc-result #calc-total').html(_mask(valorTotal+jurosTotal))
      $('.calc-result #calc-mensal').html(_mask(prestacao))
      $('.calc-result #calc-juros').html(_mask(jurosTotal))

      //Cria botao e funcao de mostrar mais
      if(periodo > 6){
          var button = $('<div class="button-table-final shadow">Mostrar mais</div>');
          if(screenWidth() > 630){
              $('.table-holder').css('max-height','380px');
          }else{
              $('.table-holder').css('max-height','800px');
          }
          $('.table-holder').css('overflow','hidden');
          button.click(()=>{
              $(button).css('display', 'none');
              $('.table-holder').attr('style','');
              $('.table-holder').css('max-height','auto');
              $('.table-holder').css('overflow','auto');
          });
          $('.table-holder').append(button);
      }
  });
});

// INPUTS ADD AND REMOVE - Interest value
function incrementInterest(input, value){
  let currentValue = $('#'+input).val();
  let calcResult = parseInt(currentValue) + parseFloat(value);

  if(calcResult <= 0) {
      $('#'+input).val(0);
  }
  else {
      $('#'+input).val((calcResult).toFixed(2).replace(".",",") );
  }
  $('#'+input).blur();
}