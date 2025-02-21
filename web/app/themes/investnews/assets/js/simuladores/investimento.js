document.addEventListener("DOMContentLoaded", function () {
  // CUSTOM RANGE SLIDER
  const customSliderSettings = {
    initFill: "#91067C",
    endFill: "#e6258b",
    background: "#d7dcdf",
  };

  const customSliders = document.querySelectorAll(".range-slider");
  Array.prototype.forEach.call(customSliders, (slider) => {
    slider.querySelector("input").addEventListener("input", (event) => {
      applyFill(event.target);
    });
    applyFill(slider.querySelector("input"));
  });
  function applyFill(slider) {
    const percentage =
      (100 * (slider.value - slider.min)) / (slider.max - slider.min);
    const bg = `linear-gradient(111.28deg, ${
      customSliderSettings.initFill
    } 0%, ${customSliderSettings.endFill} ${percentage}%, ${
      customSliderSettings.background
    } ${percentage + 0.001}%)`;
    slider.style.background = bg;
  }

  // ELEMENTS
  const INPUT_INVESTIMENT_TIME_EL = jQuery("#inp-investiment-time");
  const INPUT_INITIAL_EL = jQuery("#inp-initial");
  const INPUT_MONTHLY_EL = jQuery("#inp-monthly");
  const INVESTIMENT_TIME_TEXT_EL = jQuery("#investiment-time");
  const RETURN_TIME_TEXT_EL = jQuery("#return-period");
  const SPAN_POUPANCA_RENTABILITY_EL = jQuery("#poupanca-rentability");
  const SPAN_TYPE_RENTABILITY_DETAILS_EL = jQuery("#type-rentability-detail");
  const SPAN_RENTABILITY_DIFF_EL = jQuery("#rentability-diff");
  const SPAN_RENTABILITY_DIFF_PERCENT_EL = jQuery("#rentability-diff-percent");
  const TD_TOTAL_INVESTIMENT_EL = jQuery("#total-investment");
  const TOTAL_INVESTIMENT_VALUE_TEXT_EL = jQuery("#total-investment-value");
  const TD_TOTAL_INVESTIMENT_FUTURE_EL = jQuery("#total-investment-future");
  const TD_MONTHLY_INVESTIMENT_TEXT_EL = jQuery("#monthly-investment-text");
  const TD_MONTHLY_INVESTIMENT_EL = jQuery("#monthly-investment");
  const TD_MONTHLY_POUPANCA_EL = jQuery("#monthly-poupanca");
  const SECTION_INPUTS_EL = jQuery("#inp-section");
  const INP_TESOURO_PREFIXADO = jQuery("#inp-tesouro-prefixado");
  const INP_TESOURO_SELIC = jQuery("#inp-tesouro-selic");
  const INP_TESOURO_IPCA = jQuery("#inp-tesouro-ipca");
  const INP_CDB_LC = jQuery("#inp-cdb-lc");
  const INP_LCI_LCA = jQuery("#inp-lci-lca");
  const INP_POUPANCA = jQuery("#inp-poupanca");

  //GRAPHIC
  const GRAPHIC_SAVINGS_TOTAL_VALUE = jQuery(
    "#rentability-diff-savings-total-value"
  );
  const GRAPHIC_SAVINGS_RENTABILITY_VALUE = jQuery(
    "#rentability-diff-savings-rentability-value"
  );
  const GRAPHIC_SAVINGS_PERCENT_VALUE = jQuery(
    "#rentability-diff-savings-percent-value"
  );
  const GRAPHIC_SAVINGS_PERCENT_GRAPHIC = jQuery(
    "#rentability-diff-savings-percent-graphic"
  );

  const GRAPHIC_TESOURO_PRE_TOTAL_VALUE = jQuery(
    "#rentability-diff-tesouro-pre-total-value"
  );
  const GRAPHIC_TESOURO_PRE_RENTABILITY_VALUE = jQuery(
    "#rentability-diff-tesouro-pre-rentability-value"
  );
  const GRAPHIC_TESOURO_PRE_PERCENT_VALUE = jQuery(
    "#rentability-diff-tesouro-pre-percent-value"
  );
  const GRAPHIC_TESOURO_PRE_PERCENT_GRAPHIC = jQuery(
    "#rentability-diff-tesouro-pre-percent-graphic"
  );

  const GRAPHIC_TESOURO_SELIC_TOTAL_VALUE = jQuery(
    "#rentability-diff-tesouro-selic-total-value"
  );
  const GRAPHIC_TESOURO_SELIC_RENTABILITY_VALUE = jQuery(
    "#rentability-diff-tesouro-selic-rentability-value"
  );
  const GRAPHIC_TESOURO_SELIC_PERCENT_VALUE = jQuery(
    "#rentability-diff-tesouro-selic-percent-value"
  );
  const GRAPHIC_TESOURO_SELIC_PERCENT_GRAPHIC = jQuery(
    "#rentability-diff-tesouro-selic-percent-graphic"
  );

  const GRAPHIC_TESOURO_IPCA_TOTAL_VALUE = jQuery(
    "#rentability-diff-tesouro-ipca-total-value"
  );
  const GRAPHIC_TESOURO_IPCA_RENTABILITY_VALUE = jQuery(
    "#rentability-diff-tesouro-ipca-rentability-value"
  );
  const GRAPHIC_TESOURO_IPCA_PERCENT_VALUE = jQuery(
    "#rentability-diff-tesouro-ipca-percent-value"
  );
  const GRAPHIC_TESOURO_IPCA_PERCENT_GRAPHIC = jQuery(
    "#rentability-diff-tesouro-ipca-percent-graphic"
  );

  const GRAPHIC_CDB_TOTAL_VALUE = jQuery("#rentability-diff-cdb-total-value");
  const GRAPHIC_CDB_RENTABILITY_VALUE = jQuery(
    "#rentability-diff-cdb-rentability-value"
  );
  const GRAPHIC_CDB_PERCENT_VALUE = jQuery(
    "#rentability-diff-cdb-percent-value"
  );
  const GRAPHIC_CDB_PERCENT_GRAPHIC = jQuery(
    "#rentability-diff-cdb-percent-graphic"
  );

  const GRAPHIC_LCI_TOTAL_VALUE = jQuery("#rentability-diff-lci-total-value");
  const GRAPHIC_LCI_RENTABILITY_VALUE = jQuery(
    "#rentability-diff-lci-rentability-value"
  );
  const GRAPHIC_LCI_PERCENT_VALUE = jQuery(
    "#rentability-diff-lci-percent-value"
  );
  const GRAPHIC_LCI_PERCENT_GRAPHIC = jQuery(
    "#rentability-diff-lci-percent-graphic"
  );

  // CONSTANTS
  const TYPE_TESOURO_PREFIXADO = 1;
  const TYPE_TESOURO_SELIC = 2;
  const TYPE_TESOURO_IPCA = 3;
  const TYPE_CDB_LC = 4;
  const TYPE_LCA_LCI = 5;
  const BOLSA_FEE = 0.003 / 100;
  const MONTHS_VALUES = [1, 2, 3, 6, 12, 24, 48, 60, 120, 240, 360];
  const CURRENT_YEAR = new Date().getFullYear();
  const CDI_FEE = RATE_CDI / 100;

  // STATE
  let state = {
    type: TYPE_TESOURO_SELIC,
    initiaValue: 5250,
    monthlyValue: 300,
    investimentTime: 5,
  };

  // INIT
  const init = () => {
    addEventListeners();
    fillInputsWithDefaultValues();
    updateDetails();
  };

  // EVENT LISTENERS
  const addEventListeners = () => {
    INPUT_INVESTIMENT_TIME_EL.on(
      "input blur paste click",
      changeInputInvestimentTime
    );
    INPUT_INITIAL_EL.on("input blur paste click", changeInputInitial);
    INPUT_MONTHLY_EL.on("input blur paste click", changeInputMonthly);
    INP_TESOURO_PREFIXADO.on("input blur paste click", changeRatePercentInput);
    INP_TESOURO_SELIC.on("input blur paste click", changeRatePercentInput);
    INP_TESOURO_IPCA.on("input blur paste click", changeRatePercentInput);
    INP_CDB_LC.on("input blur paste click", changeRateIntegerInput);
    INP_LCI_LCA.on("input blur paste click", changeRateIntegerInput);
    INP_POUPANCA.on("input blur paste click", changeRatePercentInput);
  };

  const changeRatePercentInput = (event) => {
    setTimeout(() => {
      const targetValue = event.target.value === "" ? "0" : event.target.value;
      event.target.value = maskPercent(targetValue);
      updateDetails();
    });
  };

  const changeRateIntegerInput = (event) => {
    setTimeout(() => {
      const targetValue = event.target.value;
      event.target.value = targetValue;
      updateDetails();
    });
  };

  const changeInputType = (event) => {
    const value = event.target.value;
    const investmentType = parseInt(value, 10);
    state = { ...state, type: investmentType };
    SECTION_INPUTS_EL.dataset.type = investmentType;
    updateDetails();
  };

  const changeInputInvestimentTime = (event) => {
    const value = event.target.value.replace(/\D/g, "");
    const suffix = MONTHS_VALUES[value] === 1 ? " Mês" : " Meses";
    const el = INVESTIMENT_TIME_TEXT_EL;
    const investmentValueInfo = RETURN_TIME_TEXT_EL;
    el.val(`${MONTHS_VALUES[value]} ${suffix}`);
    investmentValueInfo.text(`${MONTHS_VALUES[value]} ${suffix.toLowerCase()}`);
    state = { ...state, investimentTime: parseInt(value, 10) };
    updateDetails();
  };

  const changeInputInitial = (event) => {
    if (event.target.tagName !== "INPUT") return;
    setTimeout(() => {
      const targetValue = event.target.value === "" ? "0" : event.target.value;
      const value = parseInt(FormaterUtils.unmask(targetValue));
      event.target.value = FormaterUtils.maskCurrency(targetValue);
      state = { ...state, initiaValue: value };
      updateDetails();
    });
  };

  const changeInputMonthly = (event) => {
    if (event.target.tagName !== "INPUT") return;
    setTimeout(() => {
      const targetValue = event.target.value === "" ? "0" : event.target.value;
      const value = parseInt(FormaterUtils.unmask(targetValue));
      event.target.value = FormaterUtils.maskCurrency(targetValue);
      state = { ...state, monthlyValue: value };
      updateDetails();
    });
  };

  // FILL INPUTS
  const fillInputsWithDefaultValues = () => {
    INP_TESOURO_SELIC.value = RATE_SELIC;
    INP_TESOURO_PREFIXADO.value = RATE_TESOURO_PREFIXADO;
    INP_TESOURO_IPCA.value = RATE_TESOURO_IPCA;
    INP_CDB_LC.value = RATE_CDB_LC;
    INP_LCI_LCA.value = RATE_LCA_LCI;
    INP_POUPANCA.value = POUPANCA_RENTABILITY;
  };

  // CALCULATE
  const getTaxFee = (time) => {
    if (time >= 24) {
      return 0.15;
    }
    if (time >= 12 && time < 24) {
      return 0.175;
    }
    if (time >= 6 && time < 12) {
      return 0.2;
    }
    if (time <= 5) {
      return 0.225;
    }
  };

  const getEasynvestTax = (incomeTax, value, allValue, bolsaValue) => {
    const finalCapital =
      parseFloat(allValue) - parseFloat(value) - parseFloat(bolsaValue * 100);
    const DeductedIR = incomeTax * finalCapital;
    return DeductedIR;
  };

  const getFinalValue = (allValue, bolsaValue, easynvestTax) => {
    const finalValue =
      parseFloat(allValue) - parseFloat(bolsaValue) - parseFloat(easynvestTax);
    return finalValue;
  };

  const getInvesmtentRateByType = (type) => {
    switch (type) {
      case TYPE_TESOURO_IPCA:
        return parseFloat(INP_TESOURO_IPCA.val());
      case TYPE_TESOURO_PREFIXADO:
        return parseFloat(INP_TESOURO_PREFIXADO.val());
      case TYPE_TESOURO_SELIC:
        return parseFloat(INP_TESOURO_SELIC.val());
      case TYPE_CDB_LC:
        const cdbValue = INP_CDB_LC.val();
        return parseFloat(parseFloat(cdbValue / 100).toFixed(2));
      case TYPE_LCA_LCI:
        const lcaValue = INP_LCI_LCA.val();
        return parseFloat(parseFloat(lcaValue / 100).toFixed(2));
    }
  };

  // SAVINGS - START
  const getPoupancaTax = () => {
    const value = INP_POUPANCA.val();
    return value ? value / 100 : 0;
  };

  const getFixSavings = (initialValue, investimentTime) => {
    return initialValue * Math.pow(1 + getPoupancaTax(), investimentTime);
  };

  const getMonthlySavings = (monthlyValue, investimentTime) => {
    let finalValue = 0;
    let time = investimentTime;
    for (let i = time; i > 0; i--) {
      i == investimentTime
        ? (finalValue = monthlyValue)
        : (finalValue =
            finalValue + monthlyValue * (1 + getPoupancaTax()) ** time);
      time -= 1;
    }
    return finalValue;
  };

  const calculateSavings = () => {
    const { investimentTime, type, initiaValue, monthlyValue } = state;
    const time = MONTHS_VALUES[investimentTime];

    const savingFixed = getFixSavings(initiaValue, time);
    const savingMonthly = getMonthlySavings(monthlyValue, time);
    const totalInvestment = monthlyValue * time + initiaValue;
    const absoluteSaving = savingFixed + savingMonthly - totalInvestment;

    let percent = (absoluteSaving * 100) / initiaValue;

    if (!isNaN(percent)) {
      const value = percent.toFixed(2);
      const customValue = value / 2;
      // if (GRAPHIC_SAVINGS_PERCENT_GRAPHIC) GRAPHIC_SAVINGS_PERCENT_GRAPHIC.css({"width": `${customValue > 190 ? 190 : customValue}px`})
      if (GRAPHIC_SAVINGS_PERCENT_VALUE)
        GRAPHIC_SAVINGS_PERCENT_VALUE.html(
          "+ " + parseDotToComma(percent.toFixed(2)) + "%"
        );
    }

    if (GRAPHIC_SAVINGS_RENTABILITY_VALUE)
      GRAPHIC_SAVINGS_RENTABILITY_VALUE.html(parseToString(absoluteSaving));
  };

  // SAVINGS - END

  // CDB AND LC START
  const calculateCDBFixed = (investimentTime, initiaValue) => {
    const incomeTax = getTaxFee(investimentTime);
    const titleRate = getInvesmtentRateByType(TYPE_CDB_LC);
    const allValue =
      initiaValue *
      (((1 + CDI_FEE) ** (1 / 252) - 1) * titleRate + 1) **
        (investimentTime * 21);
    const easynvestTax = getEasynvestTax(incomeTax, initiaValue, allValue, 0);
    return getFinalValue(allValue, 0, easynvestTax);
  };

  const getCDBMonthly = (month, investimentTime) => {
    let finalValue = 0;
    for (let i = investimentTime; i > 0; i--) {
      finalValue += calculateCDBFixed(i, month);
      investimentTime -= 1;
    }
    return finalValue;
  };

  const calculateCdbAndLC = () => {
    const { investimentTime, type, initiaValue, monthlyValue } = state;
    const time = MONTHS_VALUES[investimentTime];
    const calculatedFixedValue = calculateCDBFixed(time, initiaValue);
    const calculatedMonthlyValue = getCDBMonthly(monthlyValue, time);

    calculateGeneralValuesAndPrint({
      totalValueEl: GRAPHIC_CDB_TOTAL_VALUE,
      rentabilityValueEl: GRAPHIC_CDB_RENTABILITY_VALUE,
      rentabilityPercentValueEl: GRAPHIC_CDB_PERCENT_VALUE,
      rentabilityPercentGraphicEl: GRAPHIC_CDB_PERCENT_GRAPHIC,
      investimentTime,
      type,
      initiaValue,
      monthlyValue,
      calculatedFixedValue,
      calculatedMonthlyValue,
      time,
    });
  };
  // CDB AND LC END

  // LCI AND LCA START
  const calculateLciAndLcaFixed = (investimentTime, initiaValue) => {
    const time = investimentTime;
    const titleRate = getInvesmtentRateByType(TYPE_LCA_LCI);
    return (
      initiaValue *
      (((1 + CDI_FEE) ** (1 / 252) - 1) * titleRate + 1) ** (time * 21)
    );
  };

  const getLciAndLcaMonthly = (month, investimentTime) => {
    let finalValue = 0;
    for (let i = investimentTime; i > 0; i--) {
      finalValue += calculateLciAndLcaFixed(i, month);
      investimentTime -= 1;
    }
    return finalValue;
  };

  const calculateLciAndLca = () => {
    const { investimentTime, type, initiaValue, monthlyValue } = state;
    const time = MONTHS_VALUES[investimentTime];
    const calculatedFixedValue = calculateLciAndLcaFixed(time, initiaValue);
    const calculatedMonthlyValue = getLciAndLcaMonthly(monthlyValue, time);

    calculateGeneralValuesAndPrint({
      totalValueEl: GRAPHIC_LCI_TOTAL_VALUE,
      rentabilityValueEl: GRAPHIC_LCI_RENTABILITY_VALUE,
      rentabilityPercentValueEl: GRAPHIC_LCI_PERCENT_VALUE,
      rentabilityPercentGraphicEl: GRAPHIC_LCI_PERCENT_GRAPHIC,
      investimentTime,
      type,
      initiaValue,
      monthlyValue,
      calculatedFixedValue,
      calculatedMonthlyValue,
      time,
    });
  };
  // LCI AND LCA END

  // GENERAL START
  const getGeneralValue = ({ utilDays, value, titleRate, type, time }) => {
    let allValue;
    if (type == TYPE_TESOURO_IPCA) {
      allValue =
        value *
        Math.pow((1 + titleRate) * (1 + INFLATION_IPCA / 100), utilDays / 252);
      return allValue;
    } else if (type == TYPE_TESOURO_PREFIXADO) {
      return value * (1 + titleRate) ** (time / 12);
    } else {
      allValue = value * Math.pow(1 + titleRate, utilDays / 252);
      return allValue;
    }
  };

  const getBolsaValue = ({ value, allValue, time }) => {
    const first = (parseInt(time) - 1) / 365;
    const second = (parseInt(value) + parseInt(allValue)) / 2;
    return BOLSA_FEE * (first * second);
  };

  const calculateGeneralFixed = (investimentTime, initiaValue, type) => {
    const time = investimentTime;
    const value = initiaValue;
    const utilDays = time * 21;
    const totalDays = time * 30.42;
    const titleRate = getInvesmtentRateByType(type) / 100;
    const incomeTax = getTaxFee(time);
    const allValue = getGeneralValue({
      utilDays,
      value,
      titleRate,
      type,
      time,
    });
    const bolsaValue = getBolsaValue({ value, allValue, time: totalDays });
    const easynvestTax = getEasynvestTax(
      incomeTax,
      value,
      allValue,
      bolsaValue
    );
    return getFinalValue(allValue, bolsaValue * 100, easynvestTax);
  };

  const getGeneralMonthly = (month, value, type) => {
    const titleRate = getInvesmtentRateByType(type) / 100;
    let time = month;
    let utilDays = time * 21;
    let totalDays = time * 30.42;
    let incomeTax = 0;
    let allValue = 0;
    let bolsaValue = 0;
    let easynvestTax = 0;
    let finalValue = 0;

    for (let i = time; i > 0; i--) {
      utilDays = time * 21;
      totalDays = time * 30.42;
      incomeTax = getTaxFee(time);
      allValue = getGeneralValue({ utilDays, value, titleRate, type, time });
      bolsaValue = getBolsaValue({ value, allValue, time: totalDays });
      easynvestTax = getEasynvestTax(incomeTax, value, allValue, bolsaValue);

      finalValue =
        finalValue + getFinalValue(allValue, bolsaValue, easynvestTax);
      time -= 1;
    }

    return finalValue;
  };

  const calculateGeneral = (type) => {
    const { investimentTime, initiaValue, monthlyValue } = state;
    const time = MONTHS_VALUES[investimentTime];
    const calculatedFixedValue = calculateGeneralFixed(time, initiaValue, type);
    const calculatedMonthlyValue = getGeneralMonthly(time, monthlyValue, type);
    let totalValueEl;
    let rentabilityValueEl;
    let rentabilityPercentValueEl;
    let rentabilityPercentGraphicEl;

    if (type === TYPE_TESOURO_PREFIXADO) {
      totalValueEl = GRAPHIC_TESOURO_PRE_TOTAL_VALUE;
      rentabilityValueEl = GRAPHIC_TESOURO_PRE_RENTABILITY_VALUE;
      rentabilityPercentValueEl = GRAPHIC_TESOURO_PRE_PERCENT_VALUE;
      rentabilityPercentGraphicEl = GRAPHIC_TESOURO_PRE_PERCENT_GRAPHIC;
    } else if (type === TYPE_TESOURO_SELIC) {
      totalValueEl = GRAPHIC_TESOURO_SELIC_TOTAL_VALUE;
      rentabilityValueEl = GRAPHIC_TESOURO_SELIC_RENTABILITY_VALUE;
      rentabilityPercentValueEl = GRAPHIC_TESOURO_SELIC_PERCENT_VALUE;
      rentabilityPercentGraphicEl = GRAPHIC_TESOURO_SELIC_PERCENT_GRAPHIC;
    } else if (type === TYPE_TESOURO_IPCA) {
      totalValueEl = GRAPHIC_TESOURO_IPCA_TOTAL_VALUE;
      rentabilityValueEl = GRAPHIC_TESOURO_IPCA_RENTABILITY_VALUE;
      rentabilityPercentValueEl = GRAPHIC_TESOURO_IPCA_PERCENT_VALUE;
      rentabilityPercentGraphicEl = GRAPHIC_TESOURO_IPCA_PERCENT_GRAPHIC;
    }

    calculateGeneralValuesAndPrint({
      totalValueEl,
      rentabilityValueEl,
      rentabilityPercentValueEl,
      rentabilityPercentGraphicEl,
      investimentTime,
      type,
      initiaValue,
      monthlyValue,
      calculatedFixedValue,
      calculatedMonthlyValue,
      time,
    });
  };
  // GENERAL END

  // UTILS
  const getInvestmentFinalYear = (time) => {
    const timeParsed = parseInt(time);
    const actualYearParsed = parseInt(CURRENT_YEAR);

    if (timeParsed >= 6) {
      if (timeParsed / 12 === 0.5) {
        return actualYearParsed + 1;
      } else {
        return timeParsed / 12 + actualYearParsed;
      }
    } else {
      return CURRENT_YEAR;
    }
  };

  const calculateGeneralValuesAndPrint = ({
    calculatedFixedValue,
    calculatedMonthlyValue,
    time,
    initiaValue,
    monthlyValue,
    totalValueEl,
    rentabilityValueEl,
    rentabilityPercentValueEl,
    rentabilityPercentGraphicEl,
  }) => {
    const totalValue = calculatedFixedValue + calculatedMonthlyValue;
    const totalInvestment = monthlyValue * time + initiaValue;
    const absoluteValue = totalValue - totalInvestment;

    let percent = (absoluteValue * 100) / initiaValue;
    if (percent === Infinity || percent < 0) percent = 0;

    printPercent({
      percent,
      rentabilityPercentValueEl,
      rentabilityPercentGraphicEl,
    });

    printValues({
      totalValueEl,
      rentabilityValueEl,
      totalValue,
      totalInvestment,
      absoluteValue,
    });
  };

  const printPercent = ({
    percent,
    rentabilityPercentValueEl,
    rentabilityPercentGraphicEl,
  }) => {
    if (!isNaN(percent)) {
      const value = percent.toFixed(2);
      const customValue = value;
      // if (rentabilityPercentGraphicEl) rentabilityPercentGraphicEl.css({"width": `${customValue > 190 ? 190 : customValue}px`})
      if (rentabilityPercentValueEl)
        rentabilityPercentValueEl.html(
          "+ " + parseDotToComma(percent.toFixed(2)) + "%"
        );
    }
  };

  function setBarInvestment(bestValue, secondValue) {
    var fullValue = parseFloat(bestValue);
    var partialValue = parseFloat(secondValue);
    var totalPercentage = 100;
    var partialPercentage = (totalPercentage * partialValue) / fullValue;

    var width = jQuery(window).width();
    if (width <= 480) {
      return partialPercentage.toFixed(2);
    } else {
      return partialPercentage.toFixed(2) * 2;
    }
  }

  const getBestInvestment = () => {
    const returnValue = jQuery("#return-value");

    let savingsInvestment = jQuery(
      "#rentability-diff-savings-rentability-value"
    )
      .text()
      .replace(".", "")
      .replace(",", ".")
      .replace(/[.](?!\d*$)/g, "");
    let savingsGraphBar = jQuery("#rentability-diff-savings-percent-graphic");

    let tesouroPrefixadoInvestment = jQuery(
      "#rentability-diff-tesouro-pre-rentability-value"
    )
      .text()
      .replace(".", "")
      .replace(",", ".")
      .replace(/[.](?!\d*$)/g, "");
    let tesouroPrefixadoGraphBar = jQuery(
      "#rentability-diff-tesouro-pre-percent-graphic"
    );

    let tesouroSelicInvestment = jQuery(
      "#rentability-diff-tesouro-selic-rentability-value"
    )
      .text()
      .replace(".", "")
      .replace(",", ".")
      .replace(/[.](?!\d*$)/g, "");
    let tesouroSelicGraphBar = jQuery(
      "#rentability-diff-tesouro-selic-percent-graphic"
    );

    let tesouroIPCAInvestment = jQuery(
      "#rentability-diff-tesouro-ipca-rentability-value"
    )
      .text()
      .replace(".", "")
      .replace(",", ".")
      .replace(/[.](?!\d*$)/g, "");
    let tesouroIPCAIGraphBar = jQuery(
      "#rentability-diff-tesouro-ipca-percent-graphic"
    );

    let tesouroCDBInvestment = jQuery("#rentability-diff-cdb-rentability-value")
      .text()
      .replace(".", "")
      .replace(",", ".")
      .replace(/[.](?!\d*$)/g, "");
    let tesouroCDBIGraphBar = jQuery("#rentability-diff-cdb-percent-graphic");

    let tesouroLCInvestment = jQuery("#rentability-diff-lci-rentability-value")
      .text()
      .replace(".", "")
      .replace(",", ".")
      .replace(/[.](?!\d*$)/g, "");
    let tesouroLCIGraphBar = jQuery("#rentability-diff-lci-percent-graphic");

    let bestInvestment = Math.max(
      savingsInvestment,
      tesouroPrefixadoInvestment,
      tesouroSelicInvestment,
      tesouroIPCAInvestment,
      tesouroCDBInvestment,
      tesouroLCInvestment
    );
    let bestInvestmentFormatted = parseToString(bestInvestment);

    returnValue.html(`R$ ${bestInvestmentFormatted}`);

    if (savingsInvestment !== bestInvestment) {
      savingsGraphBar.css(
        "width",
        setBarInvestment(bestInvestment, savingsInvestment)
      );
    }
    if (tesouroPrefixadoInvestment !== bestInvestment) {
      tesouroPrefixadoGraphBar.css(
        "width",
        setBarInvestment(bestInvestment, tesouroPrefixadoInvestment)
      );
    }
    if (tesouroSelicInvestment !== bestInvestment) {
      tesouroSelicGraphBar.css(
        "width",
        setBarInvestment(bestInvestment, tesouroSelicInvestment)
      );
    }
    if (tesouroIPCAInvestment !== bestInvestment) {
      tesouroIPCAIGraphBar.css(
        "width",
        setBarInvestment(bestInvestment, tesouroIPCAInvestment)
      );
    }
    if (tesouroCDBInvestment !== bestInvestment) {
      tesouroCDBIGraphBar.css(
        "width",
        setBarInvestment(bestInvestment, tesouroCDBInvestment)
      );
    }
    if (tesouroLCInvestment !== bestInvestment) {
      tesouroLCIGraphBar.css(
        "width",
        setBarInvestment(bestInvestment, tesouroLCInvestment)
      );
    }

    jQuery(".over").removeClass("best");
    let bestInvestmentItem = jQuery(
      ".rentability-value:contains(" +
        bestInvestment.toLocaleString("pt-BR") +
        ")"
    );
    let bestInvestmentItemGraph = bestInvestmentItem
      .parents()
      .eq(2)
      .find(".over");
    bestInvestmentItemGraph.addClass("best");
  };

  const printValues = ({
    totalValueEl,
    rentabilityValueEl,
    totalValue,
    totalInvestment,
    absoluteValue,
  }) => {
    const totalTextEl = TD_TOTAL_INVESTIMENT_EL;
    const totalInvGrapTextEl = TOTAL_INVESTIMENT_VALUE_TEXT_EL;

    totalTextEl.html(`R$ ${parseToString(totalInvestment)}`);
    totalInvGrapTextEl.html(`R$ ${parseToString(totalInvestment)}`);

    if (totalValueEl) totalValueEl.html(parseToString(totalValue));
    if (rentabilityValueEl)
      rentabilityValueEl.html(parseToString(absoluteValue));
  };

  const updateDetails = () => {
    calculateSavings();
    calculateCdbAndLC();
    calculateLciAndLca();
    calculateGeneral(TYPE_TESOURO_IPCA);
    calculateGeneral(TYPE_TESOURO_PREFIXADO);
    calculateGeneral(TYPE_TESOURO_SELIC);
    getBestInvestment();
  };

  const parseToString = (value) =>
    `${value
      .toFixed(2)
      .replace(".", ",")
      .replace(/(\d)(?=(\d{3})+\,)/g, "$1.")}`;
  const parseDotToComma = (value) => value.toString().replace(/\./g, ",");

  const clearActive = (event) => {
    const optionsMenu = document.querySelectorAll(".form-group-radio");
    optionsMenu.forEach((opt) => {
      opt.classList.remove("active");
    });
    event.classList.add("active");
  };

  // UTILS
  const maskPercent = (value) => {
    const PERCENT_FORMATER = new Intl.NumberFormat("en-US", {
      style: "decimal",
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });

    if (!value) return PERCENT_FORMATER.format(0);
    const unmaskedNumber = FormaterUtils.unmask(value);
    const formatedValue =
      unmaskedNumber === "NaN"
        ? PERCENT_FORMATER.format(0)
        : PERCENT_FORMATER.format(unmaskedNumber);
    return formatedValue.replace(/,/g, "");
  };

  init();

  jQuery(window).resize(function () {
    getBestInvestment();
  });

  jQuery("#confira-taxas-btn").on("click", function () {
    jQuery("#taxes-infos").slideToggle();
    var $this = jQuery(this);
    $this.toggleClass("aberto");
    if ($this.hasClass("aberto")) {
      $this.text("Ocultar as taxas");
    } else {
      $this.text("Confira as taxas");
    }
  });
});

 // INPUTS ADD AND REMOVE - MONEY
 function increment(input, value) {
  let currentValue = jQuery("#" + input).val();
  let formatedCurrentValue = currentValue
    .replace(/[^\d,]+/g, "")
    .replace(",", ".");
  let calcResult = parseFloat(formatedCurrentValue) + parseFloat(value);
  if (calcResult < 0) {
    calcResult = 0;
  }
  jQuery("#" + input).val(
    calcResult.toLocaleString("pt-br", { style: "currency", currency: "BRL" })
  );
  jQuery("#" + input).blur();
}

// INPUTS ADD AND REMOVE - Months
function incrementMonths(input, value) {
  let currentValue = jQuery("#" + input).val();
  let calcResult = parseInt(currentValue) + parseFloat(value);
  if (calcResult <= 0) {
    jQuery("#" + input).val(0);
  } else {
    jQuery("#" + input).val(calcResult);
  }
  jQuery("#" + input).blur();
}
