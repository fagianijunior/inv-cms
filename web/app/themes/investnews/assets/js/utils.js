//CONSTANTS
const CURRENCY_FORMATER = new Intl.NumberFormat('pt-BR', {
  style: 'currency',
  currency: 'BRL',
  minimumFractionDigits: 2,
});

// FORMATER
class FormaterUtils {
  
  static maskCurrency(value) {
    if (!value) return CURRENCY_FORMATER.format(0)
    const unmaskedNumber = this.unmask(value)
    return unmaskedNumber === 'NaN' ? CURRENCY_FORMATER.format(0) : CURRENCY_FORMATER.format(unmaskedNumber)
  }

  static unmask(value) {
    const newValue = `${value}`.replace(/[^0-9]/g,'')
    return (parseFloat(`${newValue}`)/100).toFixed(2)
  }

  static maskPercent(value) {
    return `${parseFloat(value).toFixed(2)}%`.replace('.', ',')
  }

  static maskDecimal(value) {
    if (value === 'NaN') return '0,00'
    return `${value}`.replace('.', ',')
  }
}

// CALCULATE
class CalculateUtils {
  
  static futureValue(rate, nper, pmt, pv = 0, type = 0) {
    const pow = Math.pow(1 + rate, nper)
    const fv = (pmt*(1+rate*type)*(1-pow)/rate)-pv*pow;
    return fv.toFixed(2);
  }

  static rate(periods, payment, present, future = 0, type = 0, guess = 0.01) {
    const epsMax = 1e-10
    const iterMax = 10
    let y, y0, y1, x0, x1 = 0
    let f = 0, i = 0
    let rate = guess
    
    if (Math.abs(rate) < epsMax) {
      y = present * (1 + periods * rate) + payment * (1 + rate * type) * periods + future
    } else {
      f = Math.exp(periods * Math.log(1 + rate))
      y = present * f + payment * (1 / rate + type) * (f - 1) + future
    }
    y0 = present + payment * periods + future
    y1 = present * f + payment * (1 / rate + type) * (f - 1) + future
    i = x0 = 0
    x1 = rate
    while ((Math.abs(y0 - y1) > epsMax) && (i < iterMax)) {
      rate = (y1 * x0 - y0 * x1) / (y1 - y0)
      x0 = x1
      x1 = rate
        if (Math.abs(rate) < epsMax) {
          y = present * (1 + periods * rate) + payment * (1 + rate * type) * periods + future
        } else {
          f = Math.exp(periods * Math.log(1 + rate))
          y = present * f + payment * (1 / rate + type) * (f - 1) + future
        }
      y0 = y1
      y1 = y
      ++i
    }
    return rate;
  }

  static rateAnnual(monthlyRate) {
    let annutalRate = parseFloat((1 + monthlyRate))
    annutalRate = ((annutalRate**12)-1) * 100
    return annutalRate
  }
}