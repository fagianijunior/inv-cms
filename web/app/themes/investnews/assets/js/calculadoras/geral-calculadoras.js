jQuery(document).ready(function ($) {
  $(".dropdown-el").click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).toggleClass("expanded");
    $('.group-itens.group-buttons').addClass("hide-z");
    $("#" + $(e.target).attr("for")).prop("checked", true);
  });
  $(document).click(function () {
    $(".dropdown-el").removeClass("expanded");
    $('.group-itens.group-buttons').removeClass("hide-z");
  });
});

var $ = jQuery;

// INPUTS ADD AND REMOVE - MONEY
function increment(input, value){
  let currentValue = $('#'+input).val()
  let formatedCurrentValue = currentValue.replace(/[^\d,]+/g, '').replace(',', '.');
  let calcResult = parseFloat(formatedCurrentValue) + parseFloat(value);
  if(calcResult < 0) {
    calcResult = 0;
  }
  $('#'+input).val(calcResult.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
  $('#'+input).blur();
}

// INPUTS ADD AND REMOVE - Months
function incrementMonths(input, value){
  let currentValue = $('#'+input).val()
  let calcResult = parseInt(currentValue) + parseFloat(value);
  if(calcResult <= 0) {
    $('#'+input).val(0);
  }
  else {
    $('#'+input).val(calcResult);
  }
  $('#'+input).blur();
}

// INPUTS ADD AND REMOVE - MONEY MASKED
function changeMaskedMoneyValue(input, value){
  let currentValue = $('#'+input).maskMoney('unmasked')[0];
  let formatedCurrentValue = currentValue;
  let calcResult = parseFloat(formatedCurrentValue) + parseFloat(value);
  if(calcResult < 0) {
    calcResult = 0;
  }
  $('#'+input).val(calcResult.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
  $('#'+input).blur();
}

// INPUTS ADD AND REMOVE - FLOAT MASKED VALUE
function changeMaskedFloatValue(input, value){
  let currentValue = $('#'+input).val();
  let formatedCurrentValue = currentValue.replace(/[^\d,]+/g, '').replace(',', '.');
  let calcResult = parseFloat(formatedCurrentValue) + parseFloat(value);
  if(calcResult < 0) {
    calcResult = 0;
  }
  
  $('#'+input).val(calcResult.toFixed(2).replace(".",","));
  $('#'+input).blur();
}

// INPUTS ADD AND REMOVE - INTEGER MASKED VALUE
function changeMaskedIntegerValue(input, value){
  let currentValue = $('#'+input).val();
  if(currentValue == "" || currentValue == " ") {
    currentValue = 0;
  }
  let calcResult = parseInt(currentValue) + parseInt(value);
  if(calcResult < 0) {
    calcResult = 0;
  }

  $('#'+input).val(calcResult);
  $('#'+input).blur();
}