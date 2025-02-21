// HTML ELEMENTS
const ROW_INITIAL_EXPENSES_EL = document.getElementById('row-initial-expenses')
const ROW_MONTHLY_EXPENSES_EL = document.getElementById('row-monthly-expenses')
const ROW_ANIMAL_SIZE_EL = document.getElementById('row-animal-size')
const SPAN_INITIAL_EXPENSES_TOTAL_VALUE_EL = document.getElementById('total-value-initial-expenses')
const SPAN_MONTHLY_EXPENSES_TOTAL_VALUE_EL = document.getElementById('total-value-monthly-expenses')
const SPAN_YEARLY_EXPENSES_TOTAL_VALUE_EL = document.getElementById('total-value-yearly-expenses')

// ESTIMATES
const ESTIMATES_MONTHLY_EXPENSES_PER_SIZE = {
  P: { LIFE_EXPECTANCY: 168 },
  M: { LIFE_EXPECTANCY: 144 },
  G: { LIFE_EXPECTANCY: 108 }
}

// CONSTANTS
const INTEREST = 0.005
const INPUT_TAG_NAME = 'INPUT'
const DIV_TAG_NAME = 'DIV'
const INITIAL_ANIMAL_SIZE = 'P'
const PREFIX_INITIAL_EXPENSES = 'initial-expenses'
const PREFIX_MONTHLY_EXPENSES = 'monthly-expenses'

const INITIAL_EXPENSES_INPUTS = [
  { label: 'Custo de aquisição' },
  { label: 'Cama/casinha' },
  { label: 'Comedor/bebedor' },
  { label: 'Vermifugação' },
  { label: 'Vacina' },
  { label: 'Coleira e guia' },
  { label: 'Castração'  },
  { label: 'Veterinário' },
  { label: 'Outros' }
]

const MONTHLY_EXPENSES_INPUTS = [
  { label: 'Ração', P: 9800, M: 14500, G: 20000 },
  { label: 'Banho', P: 6000, M: 7000, G: 12000 },
  { label: 'Anti pulgas/remédios', P: 2500, M: 2500, G: 2500 },
  { label: 'Veterinário', P: 6000, M: 6000, G: 6000 },
  { label: 'Outros' }
]

// STATE
let state = {
  animalSize: INITIAL_ANIMAL_SIZE,
  totalMonthlyValue: 0,
  totalInitialValue: 0,
}

// INIT
const init = () => {
  fillExpenses()
  addEventListeners()
}

// FILL HTML
const fillExpenses = () => {
  fillInitialExpenses()
  fillMonthlyExpenses()
}

const fillInitialExpenses = () => {
  injectHtmlInputs(INITIAL_EXPENSES_INPUTS, PREFIX_INITIAL_EXPENSES, ROW_INITIAL_EXPENSES_EL)
  calculateInitialExpensesTotal()
}

const fillMonthlyExpenses = () => {
  const animalSize = state.animalSize
  const elementWithSize = MONTHLY_EXPENSES_INPUTS.map(element => 
    ({...element, value: element[animalSize] })
  )
  injectHtmlInputs(elementWithSize, PREFIX_MONTHLY_EXPENSES, ROW_MONTHLY_EXPENSES_EL)
  calculateInitialMonthlyTotal()
}

// CALCULATE
const calculateInitialExpensesTotal = () => {
  const inputs = ROW_INITIAL_EXPENSES_EL.getElementsByTagName('input')
  const total = calculateInputValues(inputs)
  SPAN_INITIAL_EXPENSES_TOTAL_VALUE_EL.innerHTML = FormaterUtils.maskCurrency(total)
  state = { ...state, totalInitialValue: total }
  // calculateTotal()
}

const calculateInitialMonthlyTotal = () => {
  const inputs = ROW_MONTHLY_EXPENSES_EL.getElementsByTagName('input')
  const total = calculateInputValues(inputs)
  SPAN_MONTHLY_EXPENSES_TOTAL_VALUE_EL.innerHTML = FormaterUtils.maskCurrency(total)
  state = { ...state, totalMonthlyValue: total }
  calculateInitialYearlyTotal()
  // calculateTotal()
}

const calculateInitialYearlyTotal = () => {
  const inputs = ROW_MONTHLY_EXPENSES_EL.getElementsByTagName('input')
  const total = calculateInputValues(inputs)
  SPAN_YEARLY_EXPENSES_TOTAL_VALUE_EL.innerHTML = FormaterUtils.maskCurrency(total * 12)
}

const calculateTotal = () => {
  const initialValue = FormaterUtils.unmask(state.totalInitialValue)
  const monthlyValue = FormaterUtils.unmask(state.totalMonthlyValue)
  const months = ESTIMATES_MONTHLY_EXPENSES_PER_SIZE[state.animalSize].LIFE_EXPECTANCY
  SPAN_TOTAL_VALUE_EL.innerHTML = FormaterUtils.maskCurrency(CalculateUtils.futureValue(INTEREST, months, -monthlyValue, -initialValue ))
}

const calculateInputValues = inputs => {
  let total = 0
  for(input of inputs) {
    const newValue = `${input.value}`.replace(/[^0-9]/g,'')
    total += parseInt(newValue)
  }
  return total
}

// EVENT LISTENERS
const addEventListeners = () => {
  ROW_INITIAL_EXPENSES_EL.addEventListener('keydown', changeInputInitialExpenses)
  ROW_MONTHLY_EXPENSES_EL.addEventListener('keydown', changeInputMonthlyExpenses)
  ROW_ANIMAL_SIZE_EL.addEventListener('click', changeAnimalSize)
}

const changeInputInitialExpenses = event => {
  if (event.target.tagName !== INPUT_TAG_NAME) return
  setTimeout(() => {
    const value = `${event.target.value}`.replace(/[^0-9]/g,'')
    const formatedValue = FormaterUtils.maskCurrency(value)
    event.target.value = formatedValue
    calculateInitialExpensesTotal()
  })
}

const changeInputMonthlyExpenses = event => {
  if (event.target.tagName !== INPUT_TAG_NAME) return
  setTimeout(() => {
    const value = event.target.value
    const formatedValue = FormaterUtils.maskCurrency(value)
    event.target.value = formatedValue
    calculateInitialMonthlyTotal()
  })
}

const changeAnimalSize = event => {
  if (event.target.tagName !== DIV_TAG_NAME || !event.target.classList.contains('item')) return
  state = { ...state, animalSize: event.target.getAttribute('data-size') }
  activeSizeItem(event.target)
  fillMonthlyExpenses()
}

// UTILS
const injectHtmlInputs = (elements, idPrefix, container) => {
  try {
    const html = elements.map(element => createFormGruoup(element, idPrefix)).join('')
    container.innerHTML = html
  } catch(error) {
    console.error(error)
  }
}

const createFormGruoup = (element, idPrefix) => {
  const id = `${idPrefix}-${element.label}`.toLocaleLowerCase().replace(/ /g, '-')
  const value = FormaterUtils.maskCurrency(element.value ? element.value : 0)
  return ` 
    <div class="form-group">
      <label for="${id}">${element.label}</label>
      <input type="text" id="${id}" value="${value}" />
    </div>
  `
}

const activeSizeItem = element => {
  ROW_ANIMAL_SIZE_EL.querySelector('.active').classList.remove('active')
  element.classList.add('active')
}

init()