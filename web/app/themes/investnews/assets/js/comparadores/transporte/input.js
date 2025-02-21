const CAR_INPUTS = [
  { label: 'Valor do Automóvel', value: 5000000, dataType: 0 },
  { label: 'Seguro', value: 350000, dataType: 1 },
  { label: 'IPVA', value: 20000, dataType: 2, disabled: true },
  { label: 'Estacionamento', value: 50000, dataType: 3 },
  { label: 'Manutenção', value: 8333, dataType: 4 },
  { label: 'Consumo por litro', value: 10, type: 'number', dataType: 5 },
  { label: 'Preço do litro', value: 312, dataType: 6 },
  { label: 'Combustível', value: 18720, dataType: 7, disabled: true },
  { label: 'Depreciação', value: 500000, dataType: 8, disabled: true },
  { label: 'Custo de oportunidade', value: 312, dataType: 9, disabled: true },
  { label: 'Licenciamento e Seguro obrigatório', value: 17200, dataType: 10 },
]
const TAX_INPUTS = [
  { label: 'Corridas de taxi em um mês', value: 60, type: 'number', dataType: 0 },
  { label: 'Preço por bandeirada', value: 450, dataType: 1 },
  { label: 'Preço por km percorrido', value: 275, dataType: 2 },
  { label: 'Preço da hora parada', value: 3300, dataType: 3 },
  { label: 'Tempo parado por corrida (min)', value: 0, type: 'number', dataType: 4 },
]
const UBER_INPUTS = [
  { label: 'Corridas no mês', value: 60, type: 'number', dataType: 0 },
  { label: 'Preço por bandeirada', value: 300, dataType: 1 },
  { label: 'Preço por km percorrido', value: 143, dataType: 2 },
  { label: 'Preço minuto', value: 35, dataType: 3 },
  { label: 'Tempo da corrida em minutos', value: 30, type: 'number', dataType: 4 },
]
const UBER_BLACK_INPUTS = [
  { label: 'Corridas no mês', value: 60, type: 'number', dataType: 0 },
  { label: 'Preço por bandeirada', value: 500, dataType: 1 },
  { label: 'Preço por km percorrido', value: 242, dataType: 2 },
  { label: 'Preço minuto', value: 40, dataType: 3 },
  { label: 'Tempo da corrida em minutos', value: 50, type: 'number', dataType: 4 },
]
const SCOOTER_INPUTS = [
  { label: 'Corridas no mês', value: 60, type: 'number', dataType: 0 },
  { label: 'Preço por bandeirada', value: 300, dataType: 1 },
  { label: 'Preço minuto', value: 50, dataType: 2 },
  { label: 'Tempo da corrida em minutos', value: 5, type: 'number', dataType: 3 },
]

const BIKE_INPUTS = [
  { label: 'Corridas no mês', value: 60, type: 'number', dataType: 0 },
  { label: 'Preço por 15 minutos', value: 100, dataType: 1 },
  { label: 'Tempo da corrida em minutos', type: 'number', value: 30, dataType: 2 },
]

const BUS_INPUTS = [
  { label: 'Bilhetes no mês', value: 60, type: 'number', dataType: 0 },
  { label: 'Preço bilhete', value: 430, dataType: 1 },
]

const BUS_SCOOTER_INPUTS = [
  { label: 'Bilhetes metrô/onibus', value: 60, type: 'number', dataType: 0 },
  { label: 'Preço bilhete', value: 430, dataType: 1 },
  { label: 'Corridas de Patinete', value: 60, type: 'number', dataType: 2 },
  { label: 'Bandeirada Patinete', value: 300, dataType: 3 },
  { label: 'Preço minuto Patinete', value: 50, dataType: 4 },
  { label: 'Tempo da corrida Patinete em minutos', value: 5, type: 'number', dataType: 5 },
  { label: 'Corridas de Bike', value: 60,  type: 'number', dataType: 6 },
  { label: 'Tempo da corrida Bike em minutos', value: 30,  type: 'number', dataType: 7 },
  { label: 'Preço por 15 minutos', value: 100, dataType: 8 },
]
