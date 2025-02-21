jQuery(document).ready(function ($) {
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
  if (typeof value !== 'number') {
    return 'Valor inválido';
  }

  // Converte o número para string e separa a parte inteira da decimal
  const stringValue = value.toFixed(2);
  const [integerPart, decimalPart] = stringValue.split('.');

  // Formata a parte inteira com separadores de milhar manualmente
  let formattedIntegerPart = '';
  for (let i = integerPart.length - 1, count = 0; i >= 0; i--, count++) {
    if (count > 0 && count % 3 === 0) {
      formattedIntegerPart = '.' + formattedIntegerPart;
    }
    formattedIntegerPart = integerPart[i] + formattedIntegerPart;
  }

  return `R$ ${formattedIntegerPart},${decimalPart}`;
  }

  /* Função para exibir tabela de resultado (.calculator-table-area) */
  const showTable = (show) => {
    const tableArea = document.querySelector(".calculator-table-area");

    if (show) {
      tableArea.style.display = "block";
    } else {
      tableArea.style.display = "none";
    }
  };

  /* Calculo INSS */
  function CalculoINSS(salarioBruto) {
    var aliquotaINSS = 0.075; /* 7.5% */
    var aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {
      style: "percent",
      maximumFractionDigits: 2,
    });
    var deducaoINSS = 0;
    if (salarioBruto <= 1302) {
      /* 'Valor menor ou igual a R$ 1.302,00'; */
      return {
        aliquota: aliquotaINSS,
        aliquotaExibicao: aliquotaINSSFormatada,
        deducao: deducaoINSS,
        total: salarioBruto * aliquotaINSS - deducaoINSS,
      };
    }
    if (salarioBruto > 1302 && salarioBruto <= 2571.29) {
      /* 'Valor Menor ou igual a R$ 2.571,29'; */
      aliquotaINSS = 0.09; /* 9% */
      aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {
        style: "percent",
        maximumFractionDigits: 2,
      });
      deducaoINSS = 19.8;
      return {
        aliquota: aliquotaINSS,
        aliquotaExibicao: aliquotaINSSFormatada,
        deducao: deducaoINSS,
        total: salarioBruto * aliquotaINSS - deducaoINSS,
      };
    }
    if (salarioBruto > 2571.29 && salarioBruto <= 3856.94) {
      /* 'Valor Menor ou igual a R$ 3.856,94'; */
      aliquotaINSS = 0.12; /* 12% */
      aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {
        style: "percent",
        maximumFractionDigits: 2,
      });
      deducaoINSS = 96.94;
      return {
        aliquota: aliquotaINSS,
        aliquotaExibicao: aliquotaINSSFormatada,
        deducao: deducaoINSS,
        total: salarioBruto * aliquotaINSS - deducaoINSS,
      };
    }
    if (salarioBruto > 3856.94) {
      /* 'Valor maior que 3.856,94'; */
      aliquotaINSS = 0.14; /* 14% */
      aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {
        style: "percent",
        maximumFractionDigits: 2,
      });
      deducaoINSS = 174.08;
      total = salarioBruto * aliquotaINSS - deducaoINSS;
      if (total > 876.97) {
        total = 876.97;
        aliquotaINSSFormatada = "14%";
      }
      return {
        aliquota: aliquotaINSSFormatada,
        aliquotaExibicao: aliquotaINSSFormatada,
        deducao: deducaoINSS,
        total: total,
      };
    }
  }

  // Contador para adicionar os valor únicos aos inputs que serão criados
  var counterButton = 2;

  // Bind de inputs
  $('body').on('blur change', 'input.input-salario-bruto', function(){
    enableCalcButtonOnDynamicInputs();
  })

  // Bind para permitir o botão adicionar 100 ao valor dos inputs criados de forma dinâmica
  $('body').on('click', 'button.dyn-btn.add', function(){
    let input = $(this).parent().parent().find('.input-salario-bruto');
    let inputID = input.attr('id');
    changeMaskedMoneyValue(inputID, 100)
    input.blur();
  })

  // Bind para permitir o botão remover 100 ao valor dos inputs criados de forma dinâmica
  $('body').on('click', 'button.dyn-btn.remove', function(){
    let input = $(this).parent().parent().find('.input-salario-bruto');
    let inputID = input.attr('id');
    changeMaskedMoneyValue(inputID, -100)
    input.blur();
  })

  // Criação de input (com botões de adicionar e remover valores) ao clicar no botão de "adicionar mais um colaborador"
  $('#btn-add-colaborador').on('click', function(e){
    e.preventDefault();
    $('.calculator-content .form-group').append(''+
    '<div class="line-group">'+
      '<div class="input input-w-buttons">'+
        '<div class="input-content">'+
          '<input type="text" class="input-salario-bruto input-money" id="inputSalarioBruto-'+counterButton+'" name="inputSalarioBruto-'+counterButton+'" placeholder="Sálario bruto mensal do seu colaborador">'+
          '<div class="button-group">'+
            '<button type="button" class="input-button dyn-btn remove">-</button>'+
            '<button type="button" class="input-button dyn-btn add">+</button>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>')
    counterButton++;

    applyMaskMoney();
    enableCalcButton();
    enableCalcButtonOnDynamicInputs()
  });

  /* Adicionar novo input de colaborador (salario bruto) com id e name unicos */
  // document
  //   .getElementById("btn-add-colaborador")
  //   .addEventListener("click", function (event) {
  //     event.preventDefault();

  //     const salarioInputs = document.querySelectorAll(".input-salario-bruto");
  //     const idSalario = salarioInputs.length + 1;

  //     const div = document.createElement("div");
  //     div.className = "form-group";

  //     const input = document.createElement("input");
  //     input.type = "text";
  //     input.className = "input-salario-bruto input-money";
  //     input.id = `inputSalarioBruto-${idSalario}`;
  //     input.name = `inputSalarioBruto-${idSalario}`;
  //     input.placeholder =
  //       "Seu salário bruto mensal / Sálario bruto mensal do seu colaborador";

  //     div.appendChild(input);

  //     const lastSalarioInput = salarioInputs[salarioInputs.length - 1];
  //     lastSalarioInput.parentNode.insertBefore(
  //       div,
  //       lastSalarioInput.nextSibling
  //     );

  //     applyMaskMoney();
  //     enableCalcButton();
  //   });

  function validateInput() {
    var isValid = true;
    $('.input-salario-bruto').each(function() {
      if ( $(this).val() === '' )
          isValid = false;
    });
    return isValid;
  }

  function enableCalcButtonOnDynamicInputs() {
    if(validateInput()) {
      $("#calcBtn").removeClass("disabled");
      $("#clearInputsBtn").removeClass("disabled");
    }
    else {
      $("#calcBtn").addClass("disabled");
      $("#clearInputsBtn").addClass("disabled");
    }
  }

  /* Se todos os .input-salario-bruto estiverem preenchidos, tirar disabled do button de calcular e limpar */
  const enableCalcButton = () => {
    const inputSalariosBrutos = document.querySelectorAll(
      ".input-salario-bruto"
    );
    const calcBtn = document.querySelector("#calcBtn");

    inputSalariosBrutos.forEach((input) => {
      input.removeEventListener("keyup", handleInputChange);
      input.addEventListener("keyup", handleInputChange);
      input.removeEventListener("blur", handleInputChange);
      input.addEventListener("blur", handleInputChange);
    });

    function handleInputChange() {
      const todosPreenchidos = Array.from(inputSalariosBrutos).every(
        (input) => input.value !== ""
      );

      if (todosPreenchidos) {
        calcBtn.classList.remove("disabled");
        clearInputsBtn.classList.remove("disabled");
      } else {
        calcBtn.classList.add("disabled");
        clearInputsBtn.classList.add("disabled");
      }
    }
  };

  enableCalcButton();

  /* Preencher a Tabela quando clicar no botão de calcular, tabela com a classe .table-inss-desktop */
  const buttonElement = document.querySelector("#calcBtn");
  buttonElement.addEventListener("click", function (event) {
    event.preventDefault();

    const inputSalariosBrutos = document.querySelectorAll(
      ".input-salario-bruto"
    );
    const tableBody = document.querySelector(".table-inss-body");
    if (tableBody) {
      tableBody.innerHTML = "";

      inputSalariosBrutos.forEach((input, index) => {
        const salarioBruto = input.value
          .replace("R$ ", "")
          .replace("R$", "")
          .replace(".", "")
          .replace(",", ".")
          .replace(/\s+/g, '');
        const calculoINSS = CalculoINSS(salarioBruto);


        const tr = document.createElement("tr");

        const tdColaborador = document.createElement("td");
        tdColaborador.innerHTML = `Colaborador ${index + 1}`;

        const tdSalarioBruto = document.createElement("td");
        tdSalarioBruto.innerHTML = formatNumberToReal(Number(salarioBruto));

        const tdPorcentagem = document.createElement("td");
        tdPorcentagem.innerHTML = calculoINSS.aliquotaExibicao;

        const tdValorINSS = document.createElement("td");
        tdValorINSS.innerHTML = formatNumberToReal(Number(calculoINSS.total));

        tr.appendChild(tdColaborador);
        tr.appendChild(tdSalarioBruto);
        tr.appendChild(tdPorcentagem);
        tr.appendChild(tdValorINSS);

        tableBody.appendChild(tr);

        showTable(true);
      });
    }
  });

  /* Preencher a Tabela quando clicar no botão de calcular, tabela com a classe .table-mobile
   */
  const buttonElementMobile = document.querySelector("#calcBtn");
  buttonElementMobile.addEventListener("click", function (event) {
    event.preventDefault();

    const inputSalariosBrutos = document.querySelectorAll(
      ".input-salario-bruto"
    );
    const tableBody = document.querySelector(".table-inss-mobile-body");
    if (tableBody) {
      tableBody.innerHTML = "";

      inputSalariosBrutos.forEach((input, index) => {
        const salarioBruto = input.value
          .replace("R$ ", "")
          .replace("R$", "")
          .replace(".", "")
          .replace(",", ".")
          .replace(/\s+/g, '');
        const calculoINSS = CalculoINSS(salarioBruto);

        const tr = document.createElement("tr");

        const tdColaborador = document.createElement("td");
        tdColaborador.setAttribute("data-type", "group-label");
        tdColaborador.setAttribute("data-label", "colaborador");
        tdColaborador.setAttribute("colspan", "2");
        tdColaborador.innerHTML = `Colaborador ${index + 1}`;

        const trSalarioBruto = document.createElement("tr");

        const tdSalarioBruto = document.createElement("td");
        tdSalarioBruto.setAttribute("data-label", "salario-bruto");
        tdSalarioBruto.innerHTML = "Salário Bruto";

        const tdValorSalarioBruto = document.createElement("td");
        tdValorSalarioBruto.setAttribute("data-label", "valor-salario-bruto");
        tdValorSalarioBruto.innerHTML = formatNumberToReal(Number(salarioBruto));

        trSalarioBruto.appendChild(tdSalarioBruto);
        trSalarioBruto.appendChild(tdValorSalarioBruto);

        const trPorcentagem = document.createElement("tr");

        const tdPorcentagem = document.createElement("td");
        tdPorcentagem.setAttribute("data-label", "porcentagem");
        tdPorcentagem.innerHTML = "Porcentagem";

        const tdValorPorcentagem = document.createElement("td");
        tdValorPorcentagem.setAttribute("data-label", "valor-porcentagem");
        tdValorPorcentagem.innerHTML = calculoINSS.aliquotaExibicao;

        trPorcentagem.appendChild(tdPorcentagem);
        trPorcentagem.appendChild(tdValorPorcentagem);

        const trINSS = document.createElement("tr");

        const tdINSS = document.createElement("td");
        tdINSS.setAttribute("data-label", "inss");
        tdINSS.innerHTML = "Pagará de INSS";

        const tdValorINSS = document.createElement("td");
        tdValorINSS.setAttribute("data-label", "valor-inss");
        tdValorINSS.innerHTML = formatNumberToReal(Number(calculoINSS.total));

        trINSS.appendChild(tdINSS);
        trINSS.appendChild(tdValorINSS);

        tr.appendChild(tdColaborador);
        tableBody.appendChild(tr);
        tableBody.appendChild(trSalarioBruto);
        tableBody.appendChild(trPorcentagem);
        tableBody.appendChild(trINSS);

        showTable(true);
      });
    }
  });

  /* Limpar todos os campos quando apertar em limpar e remove os colaboradores extras (clearInputsBtn) */
  const clearInputsBtn = document.querySelector("#clearInputsBtn");
  clearInputsBtn.addEventListener("click", function (event) {
    event.preventDefault();

    const inputSalariosBrutos = document.querySelectorAll(
      ".input-salario-bruto"
    );
    const tableBody = document.querySelector(".table-inss-body");
    tableBody.innerHTML = "";

    inputSalariosBrutos.forEach((input) => {
      input.value = "";
    });

    const divs = document.querySelectorAll(".input-salario-bruto");
    for (let i = 1; i < divs.length; i++) {
      divs[i].remove();
    }

    showTable(false);
    calcBtn.classList.add("disabled");
    clearInputsBtn.classList.add("disabled");
  });
});
