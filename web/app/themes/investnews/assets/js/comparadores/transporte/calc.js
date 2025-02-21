// ELEMENTS
const INP_KM_PER_DAY_EL = document.getElementById('inp-num-km-day')
const ROW_CAR_EL = document.getElementById('row-car')
const ROW_TAXI_EL = document.getElementById('row-taxi')
const ROW_UBER_EL = document.getElementById('row-uber')
const ROW_UBER_BLACK_EL = document.getElementById('row-uber-black')
const ROW_ZAZ_CAR_EL = document.getElementById('row-zar-car')
const ROW_SCOOTER_EL = document.getElementById('row-scooter')
const ROW_BIKE_EL = document.getElementById('row-bike')
const ROW_BUS_EL = document.getElementById('row-bus')
const ROW_BUS_SCOOTER_EL = document.getElementById('row-bus-scooter')

const INP_KM_DAY = document.getElementById('inp-km-day')
const INP_KM_MONTH = document.getElementById('inp-km-month')

const TOTAL_CAR_VALUE = document.getElementById('total-car-value')
const TOTAL_TAX_VALUE = document.getElementById('total-tax-value')
const TOTAL_UBER_VALUE = document.getElementById('total-uber-value')
const TOTAL_UBER_BLACK_VALUE = document.getElementById('total-uber-black-value')
const TOTAL_SCOOTER_VALUE = document.getElementById('total-scooter-value')
const TOTAL_BIKE_VALUE = document.getElementById('total-bike-value')
const TOTAL_TREM_VALUE = document.getElementById('total-trem-value')
const TOTAL_METRO_BIKE_VALUE = document.getElementById('total-metro-bike-value')

// INIT
const init = () => {
  createElements()
  addKmListners()
}

// CONSTANTS
const SELIC = 0.00287089
const INPUT_TAG_NAME = 'INPUT'

// ELEMENTS
const createElements = () => {
  createInputsHtml(CAR_INPUTS, 'car', ROW_CAR_EL, calculateTotalCar)
  createInputsHtml(TAX_INPUTS, 'tax', ROW_TAXI_EL, calculateTotalTaxi)
  createInputsHtml(UBER_INPUTS, 'uber', ROW_UBER_EL, calculateTotalUber)
  createInputsHtml(UBER_BLACK_INPUTS, 'uber-black', ROW_UBER_BLACK_EL, () => calculateTotalUber(true))
  createInputsHtml(SCOOTER_INPUTS, 'scooter', ROW_SCOOTER_EL, calculateTotalScooter)
  createInputsHtml(BIKE_INPUTS, 'bike', ROW_BIKE_EL, calculateTotalBike)
  createInputsHtml(BUS_INPUTS, 'bus', ROW_BUS_EL, calculateTotalBus)
  createInputsHtml(BUS_SCOOTER_INPUTS, 'bus-scooter', ROW_BUS_SCOOTER_EL, calculateTotalBusScooter)
}

const createInputsHtml = (inputsEl, prefix, containerEl, calculateFunction) => {
  createFormGroupHtml(inputsEl, prefix, containerEl)
  typeof calculateFunction === 'function' && calculateFunction()
  containerEl.addEventListener('input', event => changeInput(event, calculateFunction))
}

// LISTENERS
const addKmListners = () => {
  INP_KM_DAY.addEventListener('input', event => changeKmDay(event))
  INP_KM_MONTH.addEventListener('input', event => changeKmMonth(event))
}

const changeKmDay = event => {
  setTimeout(() => {
    const value = event.target.value
    event.target.value = value
    INP_KM_MONTH.value = String(parseInt(value) * 30)
    calculateAll();
  })
}

const changeKmMonth = event => {
  setTimeout(() => {
    const value = event.target.value
    event.target.value = value
    INP_KM_DAY.value = String(parseInt(value / 30))
    calculateAll();
  })
}

const changeInput = (event, calculateFunction) => {
  if (event.target.tagName !== INPUT_TAG_NAME) return
  setTimeout(() => {
    const value = event.target.value
    if (event.target.type === 'text') {
      const formatedValue = FormaterUtils.maskCurrency(value)
      event.target.value = formatedValue
    }
    typeof calculateFunction === 'function' && calculateFunction()
  })
}

// CALCULATES
const calculateTotalCar = () => {
  const IPVA_PERCENT = 0.04
  const DEPRECATION_PERCENT = 0.10
  const SELIC_PERCENT = 0.00287
  const container = ROW_CAR_EL
  const carPrice = parseInt(`${container.querySelector('input[data-type="0"]').value}`.replace(/[^0-9]/g,''))
  const secure = parseInt(`${container.querySelector('input[data-type="1"]').value}`.replace(/[^0-9]/g,''))
  const parking = parseInt(`${container.querySelector('input[data-type="3"]').value}`.replace(/[^0-9]/g,''))
  const maintenance = parseInt(`${container.querySelector('input[data-type="4"]').value}`.replace(/[^0-9]/g,''))
  const consumption = parseInt(`${container.querySelector('input[data-type="5"]').value}`.replace(/[^0-9]/g,''))
  const gas = parseInt(`${container.querySelector('input[data-type="6"]').value}`.replace(/[^0-9]/g,''))
  const license = parseInt(`${container.querySelector('input[data-type="10"]').value}`.replace(/[^0-9]/g,''))

  const gasTotalEl = container.querySelector('input[data-type="7"]')
  const ipvaEl = container.querySelector('input[data-type="2"]')
  const deprecationEl = container.querySelector('input[data-type="8"]')
  const oportunityEl = container.querySelector('input[data-type="9"]')

  const kmByMonthValue = parseInt(`${INP_KM_MONTH.value}`.replace(/[^0-9]/g,''))
  const kmByMonth = parseFloat(parseFloat(kmByMonthValue).toFixed(2))
  
  const gasTotalPrice = parseFloat(parseFloat(((kmByMonth * gas)/consumption)).toFixed(2))
  const ipvaPrice = parseFloat(parseFloat((carPrice * IPVA_PERCENT)).toFixed(2))
  const deprecationPrice = parseFloat(parseFloat((carPrice * DEPRECATION_PERCENT)).toFixed(2))
  const oportunityPrice = parseFloat(parseFloat((carPrice * SELIC_PERCENT)).toFixed(2))

  gasTotalEl.value = FormaterUtils.maskCurrency(gasTotalPrice)
  ipvaEl.value = FormaterUtils.maskCurrency(ipvaPrice)
  deprecationEl.value = FormaterUtils.maskCurrency(deprecationPrice)
  oportunityEl.value = FormaterUtils.maskCurrency(oportunityPrice)

  const annualExpense = (((secure + ipvaPrice + deprecationPrice + license) * (1 + SELIC_PERCENT)**12)/100).toFixed(2)
  const monthlyExpense = (CalculateUtils.futureValue(SELIC_PERCENT, 12, -(parking + maintenance + gasTotalPrice + oportunityPrice)/100))
  const yearlyCost = parseFloat(parseFloat(annualExpense) + parseFloat(monthlyExpense)).toFixed(2)

  TOTAL_CAR_VALUE.innerHTML = FormaterUtils.maskCurrency(yearlyCost)
}

const calculateTotalTaxi = () => {
  const container = ROW_TAXI_EL
  const value1 = parseInt(`${container.querySelector('input[data-type="0"]').value}`.replace(/[^0-9]/g,''))
  const value2 = parseInt(`${container.querySelector('input[data-type="1"]').value}`.replace(/[^0-9]/g,''))
  const value3 = parseInt(`${container.querySelector('input[data-type="2"]').value}`.replace(/[^0-9]/g,''))
  const value4 = parseInt(`${container.querySelector('input[data-type="3"]').value}`.replace(/[^0-9]/g,''))
  const value5 = parseInt(`${container.querySelector('input[data-type="4"]').value}`.replace(/[^0-9]/g,''))
  
  const kmByMonthValue = parseInt(`${INP_KM_MONTH.value}`.replace(/[^0-9]/g,''))
  const kmByMonth = parseFloat((kmByMonthValue)/value1).toFixed(2)

  const averagePrice = ((kmByMonth * value3) + value2 + (value5/60) * value4)
  const monthlyCost = averagePrice * value1
  const yearlyCost = CalculateUtils.futureValue(SELIC, 12, -(monthlyCost/100))

  TOTAL_TAX_VALUE.innerHTML = FormaterUtils.maskCurrency(yearlyCost)
}

const calculateTotalUber = (isBlack = false) => {
  const container = isBlack ? ROW_UBER_BLACK_EL : ROW_UBER_EL
  const value1 = parseInt(`${container.querySelector('input[data-type="0"]').value}`.replace(/[^0-9]/g,''))
  const value2 = parseInt(`${container.querySelector('input[data-type="1"]').value}`.replace(/[^0-9]/g,''))
  const value3 = parseInt(`${container.querySelector('input[data-type="2"]').value}`.replace(/[^0-9]/g,''))
  const value4 = parseInt(`${container.querySelector('input[data-type="3"]').value}`.replace(/[^0-9]/g,''))
  const value5 = parseInt(`${container.querySelector('input[data-type="4"]').value}`.replace(/[^0-9]/g,''))
  
  const kmByMonthValue = parseInt(`${INP_KM_MONTH.value}`.replace(/[^0-9]/g,''))
  const kmByMonth = parseFloat((kmByMonthValue)/value1).toFixed(2)

  const averagePrice = parseFloat(parseFloat(((kmByMonth) * value3/100) + value2/100 + (value5 * value4/100)).toFixed(2))
  const monthlyCost = parseFloat((averagePrice) * value1).toFixed(2)
  const yearlyCost = CalculateUtils.futureValue(SELIC, 12, -(monthlyCost))

  const totalEL =  isBlack ? TOTAL_UBER_BLACK_VALUE : TOTAL_UBER_VALUE

  totalEL.innerHTML = FormaterUtils.maskCurrency(yearlyCost)
}

const calculateTotalZazCar = () => {
  const container = ROW_ZAZ_CAR_EL
  const value1 = parseInt(`${container.querySelector('input[data-type="0"]').value}`.replace(/[^0-9]/g,''))
  const value2 = parseInt(`${container.querySelector('input[data-type="1"]').value}`.replace(/[^0-9]/g,''))
  const value3 = parseInt(`${container.querySelector('input[data-type="2"]').value}`.replace(/[^0-9]/g,''))
  const value4 = parseInt(`${container.querySelector('input[data-type="3"]').value}`.replace(/[^0-9]/g,''))
  const value5 = parseInt(`${container.querySelector('input[data-type="4"]').value}`.replace(/[^0-9]/g,''))
  
  const kmByMonthValue = parseInt(`${INP_KM_MONTH.value}`.replace(/[^0-9]/g,''))
  const kmByMonth = parseFloat((kmByMonthValue)/value1).toFixed(2)

  const averagePrice = (value5 * value4 / 60) + (kmByMonth * value3)
  const monthlyCost = averagePrice * value1 + value2
  const yearlyCost = CalculateUtils.futureValue(SELIC, 12, -(monthlyCost/100))

}

const calculateTotalScooter = () => {
  const container = ROW_SCOOTER_EL
  const value1 = parseInt(`${container.querySelector('input[data-type="0"]').value}`.replace(/[^0-9]/g,''))
  const value2 = parseInt(`${container.querySelector('input[data-type="1"]').value}`.replace(/[^0-9]/g,''))
  const value3 = parseInt(`${container.querySelector('input[data-type="2"]').value}`.replace(/[^0-9]/g,''))
  const value4 = parseInt(`${container.querySelector('input[data-type="3"]').value}`.replace(/[^0-9]/g,''))
  
  const averagePrice = value2 + (value4 * value3)
  const monthlyCost = averagePrice * value1
  const yearlyCost = CalculateUtils.futureValue(SELIC, 12, -(monthlyCost/100))

  TOTAL_SCOOTER_VALUE.innerHTML = FormaterUtils.maskCurrency(yearlyCost)

}

const calculateTotalBike = () => {
  const container = ROW_BIKE_EL
  const value1 = parseInt(`${container.querySelector('input[data-type="0"]').value}`.replace(/[^0-9]/g,''))
  const value2 = parseInt(`${container.querySelector('input[data-type="1"]').value}`.replace(/[^0-9]/g,''))
  const value3 = parseInt(`${container.querySelector('input[data-type="2"]').value}`.replace(/[^0-9]/g,''))
  
  const averagePrice = parseFloat((value3/15) * value2)
  const monthlyCost = parseFloat(averagePrice * value1)
  const yearlyCost = CalculateUtils.futureValue(SELIC, 12, -(monthlyCost/100))

  TOTAL_BIKE_VALUE.innerHTML = FormaterUtils.maskCurrency(yearlyCost)

}

const calculateTotalBus = () => {
  const container = ROW_BUS_EL
  const value1 = parseInt(`${container.querySelector('input[data-type="0"]').value}`.replace(/[^0-9]/g,''))
  const value2 = parseInt(`${container.querySelector('input[data-type="1"]').value}`.replace(/[^0-9]/g,''))
  
  const monthlyCost = (value1 * value2)
  const yearlyCost = CalculateUtils.futureValue(SELIC, 12, -(monthlyCost/100))

  TOTAL_TREM_VALUE.innerHTML = FormaterUtils.maskCurrency(yearlyCost)
}

const calculateTotalBusScooter = () => {
  const container = ROW_BUS_SCOOTER_EL
  const value1 = parseInt(`${container.querySelector('input[data-type="0"]').value}`.replace(/[^0-9]/g,''))
  const value2 = parseInt(`${container.querySelector('input[data-type="1"]').value}`.replace(/[^0-9]/g,''))
  const value3 = parseInt(`${container.querySelector('input[data-type="2"]').value}`.replace(/[^0-9]/g,''))
  const value4 = parseInt(`${container.querySelector('input[data-type="3"]').value}`.replace(/[^0-9]/g,''))
  const value5 = parseInt(`${container.querySelector('input[data-type="4"]').value}`.replace(/[^0-9]/g,''))
  const value6 = parseInt(`${container.querySelector('input[data-type="5"]').value}`.replace(/[^0-9]/g,''))
  const value7 = parseInt(`${container.querySelector('input[data-type="6"]').value}`.replace(/[^0-9]/g,''))
  const value8 = parseInt(`${container.querySelector('input[data-type="7"]').value}`.replace(/[^0-9]/g,''))
  const value9 = parseInt(`${container.querySelector('input[data-type="8"]').value}`.replace(/[^0-9]/g,''))
  
  const monthlyCost = parseFloat((value1 * value2) + (value3 * (value4 + value5 * value6)) + (((value8/15) * value9) * value7))
  const yearlyCost = CalculateUtils.futureValue(SELIC, 12, -(monthlyCost/100))

  TOTAL_METRO_BIKE_VALUE.innerHTML = FormaterUtils.maskCurrency(yearlyCost)
}

const calculateAll = () => {
  calculateTotalCar();
  calculateTotalTaxi();
  calculateTotalUber();
  calculateTotalUber(true);
  calculateTotalScooter();
  calculateTotalBike();
  calculateTotalBus();
  calculateTotalBusScooter();
}

// UTILS
const createFormGroupHtml = (inputsElements, idPrefix, container) => {
  try {
    const inputsHtml = inputsElements.map(element => createFormGruoup(element, idPrefix)).join('')
    container.innerHTML = `<div class="mvp-car-forms">${inputsHtml}</div>`
  } catch(error) {
    console.error(error)
  }
}

const createFormGruoup = (element = {}, idPrefix) => {
  const id = `${idPrefix}-${element.label}`.toLocaleLowerCase().replace(/ /g, '-')
  let value = element.value
  if (!element.type || element.type === 'text') {
    value = FormaterUtils.maskCurrency(element.value ? element.value : 0)
  }
  const { label, dataType, type = 'text', disabled } = element
  
  return ` 
    <div class="form-group">
      <label for="${id}">${label}</label>
      <input min="1" type="${type}" data-type="${dataType}" id="${id}" value="${value}" ${disabled ? 'disabled' : '' } />
    </div>
  `
}

init()