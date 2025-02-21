$( document ).ready(function() {

    /* Verificação para habilitar botões */
    $('.calculator-content input, .calculator-content select').on('input change keypress blur', function() {
        let inputSalarioBruto = $('#inputSalarioBruto').val();
        let inputNumeroDeDependentes = $('#inputNumeroDeDependentes').val();
        let inputHorasExtrasMensais = $('#inputHorasExtrasMensais').val();
        let inputMesesTrabalhados = $('#inputMesesTrabalhados').val();
        let selectTipoDePagamento = $('#selectTipoDePagamento').val();
        let selectObjetivoDecimoTerceiro = $('#selectObjetivoDecimoTerceiro').val();

        if(!inputNumeroDeDependentes) {
            inputNumeroDeDependentes = 0;
        }
        if(!inputHorasExtrasMensais) {
            inputHorasExtrasMensais = 0;
        }

        let clearInputsBtn = $('#clearInputsBtn');
        let calcBtn = $('#calcBtn');

        if( (inputSalarioBruto !== "" && $('#inputSalarioBruto').maskMoney('unmasked')[0] > 0) && (inputMesesTrabalhados !== "" && inputMesesTrabalhados > 0) ) {
            clearInputsBtn.removeClass('disabled');
            calcBtn.removeClass('disabled');
        }
    });

    /* Mascaras de inputs */
    $('#inputSalarioBruto, #inputHorasExtrasMensais').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    $('#inputNumeroDeDependentes, #inputMesesTrabalhados').on('blur change input', function () {
        $(this).val(function (i, input) {
            input = input.replace(/\D+/g, '');
            return input
        });
    }).trigger('blur');

    /* Limpeza de inputs ao clicar no botão "Limpar" */
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

    /* Calculo INSS */
    function CalculoINSS(salarioBruto) {
        var aliquotaINSS = 0.075; /* 7.5% */
        var aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
        var deducaoINSS = 0;
        var total = (salarioBruto * aliquotaINSS) - deducaoINSS;
        // Mudança para cáculo 2024
        if((salarioBruto > 1412.00) && (salarioBruto <= 2666.68)) {
                /* 'Valor entre 1.412,01 e 2.666,68'; */
            aliquotaINSS = 0.09; /* 9% */
            aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
            // deducaoINSS = 19.80;
            deducaoINSS = 21.18;
            total = (salarioBruto * aliquotaINSS) - deducaoINSS
        };
        if((salarioBruto > 2666.68) && (salarioBruto <= 4000.03)) {
            /* 'Valor entre 2.666,69 e 4.000,03'; */
            aliquotaINSS = 0.12; /* 12% */
            aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
            deducaoINSS = 101.18;
            total = (salarioBruto * aliquotaINSS) - deducaoINSS;
        };
        if((salarioBruto > 4000.03) && (salarioBruto <= 7786.02)) {
            /* 'Valor entre 4.000,04 e 7.786,02'; */
            aliquotaINSS = 0.14; /* 14% */
            aliquotaINSSFormatada = aliquotaINSS.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
            deducaoINSS = 181.18;
            total = (salarioBruto * aliquotaINSS) - deducaoINSS;
        }
        if(salarioBruto > 7786.02) {
                aliquotaINSS = 0;
                deducaoINSS = 0;
                total = 908.86;
                aliquotaINSSFormatada = "Teto";
        }
        return {
            'aliquota': aliquotaINSS,
            'aliquotaExibicao': aliquotaINSSFormatada,
            'deducao': deducaoINSS,
            'total': total
        }
    }

    /* Calculo IRRF */
    function CalculoIRRF(salarioBruto, dependentes, valorINSS) {
        var descontoSimplificado = 564.80;
        var deducaoDependentes = dependentes * 189.59;
        var totalDeducoes = valorINSS + deducaoDependentes;

       // Verifica melhor condição para desconto
       if (descontoSimplificado > totalDeducoes) {
            totalDeducoes = descontoSimplificado;
       }

        var baseParaCalculo = salarioBruto - totalDeducoes;
        var aliquotaIRRF = 0; /* Isento */
        var valorParcelaADeduzir = 0;
 
        // Até R$ 2.259,20 para o valor da base de cálculo, haverá isenção.
        if((baseParaCalculo > 2259.20) && (baseParaCalculo <= 2826.65)) {
            /* 'Valor menor ou igual a R$ 2.826,65'; */
            aliquotaIRRF = 0.075; /* 7,5% */
            valorParcelaADeduzir = 169.44;

        }
        if((baseParaCalculo > 2826.65) && (baseParaCalculo <= 3751.05)) {
            /* 'Valor menor ou igual a R$ 3.751,05'; */
            aliquotaIRRF = 0.15; /* 15% */
            valorParcelaADeduzir = 381.44;

        }
        if((baseParaCalculo > 3751.05) && (baseParaCalculo <= 4664.68)) {
            /* 'Valor menor ou igual a R$ 4.664,68'; */
            aliquotaIRRF = 0.225; /* 22,5% */
            valorParcelaADeduzir = 662.77;

        }
        if((baseParaCalculo > 4664.68)) {
            /* 'Valor maior que R$ 4.664,68'; */
            aliquotaIRRF = 0.275; /* 27,5% */
            valorParcelaADeduzir = 896.00;

        }
        return {
            'aliquota': aliquotaIRRF,
            'deducao': valorParcelaADeduzir,
            'total': (baseParaCalculo * aliquotaIRRF) - valorParcelaADeduzir
        };
    }

    function CalculoDecimoTerceiro(salarioBruto, numeroDependentes, horasExtras, MesesTrabalhados, opcaoDeCalculo) {

        
        if(opcaoDeCalculo == "1") { // Parcela única
            var totalHorasExtras = (horasExtras / 12) * MesesTrabalhados ;
            var totalSalario = (salarioBruto / 12) * MesesTrabalhados;
            var somaDePagamentos = totalSalario + totalHorasExtras
            
            var INSS = CalculoINSS(somaDePagamentos);
            var IRRF = CalculoIRRF(somaDePagamentos, numeroDependentes, INSS.total);

            var totalDescontos = (INSS.total + IRRF.total);
            
            var totalGeral = somaDePagamentos - totalDescontos;

            return {
                'INSS': INSS.total,
                'aliquotaINSS': INSS.aliquota,
                'aliquotaINSSExibicao': INSS.aliquotaExibicao,
                'deducaoINSS': INSS.deducao,
                'IRRF': IRRF.total,
                'aliquotaIRRF': IRRF.aliquota,
                'deducaoIRRF': IRRF.deducao,
                'salario': totalSalario,
                'horasExtras': totalHorasExtras,
                'somaProventos': totalSalario + totalHorasExtras,
                'total': totalGeral
            };
        }
        if(opcaoDeCalculo == "2") { // Primeira parcela
            var totalSalario = (salarioBruto / 12) * MesesTrabalhados;
            var totalHorasExtras = (horasExtras / 12) * MesesTrabalhados;
            var somaDePagamentos = totalSalario + totalHorasExtras
            
            var totalGeral = somaDePagamentos / 2;

            return {
                'INSS': '',
                'aliquotaINSS': '',
                'aliquotaINSSExibicao': '',
                'deducaoINSS': '',
                'IRRF': '',
                'aliquotaIRRF': '',
                'deducaoIRRF': '',
                'salario': totalSalario / 2,
                'horasExtras': totalHorasExtras / 2,
                'somaProventos': (totalSalario / 2) + (totalHorasExtras / 2),
                'total': totalGeral
            };
        }
        if(opcaoDeCalculo == "3") { // Segunda parcela
            var totalHorasExtras = (horasExtras / 12) * MesesTrabalhados;
            var totalSalario = (salarioBruto / 12) * MesesTrabalhados;
            var somaDePagamentos = totalSalario + totalHorasExtras
            
            var INSS = CalculoINSS(somaDePagamentos);
            var IRRF = CalculoIRRF(somaDePagamentos, numeroDependentes, INSS.total);

            var totalDescontos = (INSS.total + IRRF.total);

            var salarioComDesconto = totalSalario - totalDescontos;
            
            var totalGeral = ((somaDePagamentos / 2)) - totalDescontos;

            return {
                'INSS': INSS.total,
                'aliquotaINSS': INSS.aliquota,
                'aliquotaINSSExibicao': INSS.aliquotaExibicao,
                'deducaoINSS': INSS.deducao,
                'IRRF': IRRF.total,
                'aliquotaIRRF': IRRF.aliquota,
                'deducaoIRRF': IRRF.deducao,
                'salario': salarioComDesconto / 2,
                'horasExtras': totalHorasExtras / 2,
                'somaProventos': (salarioComDesconto / 2) + (totalHorasExtras / 2),
                'total': totalGeral
            };
        }
        
    }

    /* Calculo de salário líquido */
    $('#calculatorForm').on('submit', function(e){
        e.preventDefault();

        let inputSalarioBruto = $('#inputSalarioBruto').maskMoney('unmasked')[0];
        let inputHorasExtrasMensais = $('#inputHorasExtrasMensais').maskMoney('unmasked')[0];
        let inputNumeroDeDependentes = $('#inputNumeroDeDependentes').val();
        let inputMesesTrabalhados = $('#inputMesesTrabalhados').val();
        let selectTipoDePagamento = $('#selectTipoDePagamento').val();
        let selectObjetivoDecimoTerceiro = $('#selectObjetivoDecimoTerceiro').val();

        var decimoTerceiro = CalculoDecimoTerceiro(
            inputSalarioBruto, 
            inputNumeroDeDependentes, 
            inputHorasExtrasMensais, 
            inputMesesTrabalhados,
            selectTipoDePagamento
        )

        /* Calculo INSS */
        var valorINSS = decimoTerceiro.INSS.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        var aliquotaINSS = decimoTerceiro.aliquotaINSS;
        var aliquotaINSSExibicao = decimoTerceiro.aliquotaINSSExibicao;
        var deducaoINSS = decimoTerceiro.deducaoINSS.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

        /* Calculo IRRF */
        var valorIRRF = decimoTerceiro.IRRF.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        var aliquotaIRRF = decimoTerceiro.aliquotaIRRF.toLocaleString("en", {style: "percent", maximumFractionDigits: 2,});
        var deducaoIRRF = decimoTerceiro.deducaoIRRF.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

        var somaDeDescontos = decimoTerceiro.INSS + decimoTerceiro.IRRF;

        var valorHorasExtras = decimoTerceiro.horasExtras.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        var valorSalario = decimoTerceiro.salario.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        var valorSomaProventos = decimoTerceiro.somaProventos.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        var valorTotal = decimoTerceiro.total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

        $("#calc-result-area td[data-label='proventos-salario-bruto']").text(valorSalario);
        $("#calc-result-area td[data-label='proventos-horas-extras']").text(valorHorasExtras);
        $("#calc-result-area td[data-label='aliquota-inss']").text(aliquotaINSSExibicao);
        $("#calc-result-area td[data-label='descontos-inss']").text(valorINSS);
        $("#calc-result-area td[data-label='aliquota-irpf']").text(aliquotaIRRF);
        $("#calc-result-area td[data-label='descontos-irpf']").text(valorIRRF);
        $("#calc-result-area td[data-label='proventos-consolidado']").text(valorSomaProventos);
        $("#calc-result-area td[data-label='descontos-consolidado']").text(somaDeDescontos.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
        $("#calc-result-area td[data-label='valor-decimo-terceiro']").text(valorTotal);


        $('#calc-result-area').slideDown();
    })
})