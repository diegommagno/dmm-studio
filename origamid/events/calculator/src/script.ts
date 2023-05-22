// get id calculator
const calculatorElement = document.querySelector('#calculator') as HTMLInputElement;

// get id result
const resultElement = document.querySelector('#result') as HTMLInputElement;

function evaluate(expression: string): number | null {
  try {
    if(expression.match(/[a-zA-Z&#$<>{}!]/g)) throw new Error('Invalid expression'); // para a pessoa não poder digitar código dentro da calculadora.
    return new Function(`return(${expression})`)();
  } catch (e) {
    return null;
  }
}

// round to 3 decimal places
function round(value: number) {
  return Math.round(value * 1000) / 1000;
}

// isNumber type predicate
function isNumber(value: unknown): value is number {
  if(typeof value === 'number') {
    return !isNaN(value) && isFinite(value);
  } else {
    return false;
  }
}
function calculate() {
  // save calculator value to localStorage
  localStorage.setItem('calculator', calculatorElement.value);

  // slit lines from calculatorElement in array
  const lines = calculatorElement.value.split(/\r?\n/).map(evaluate);

  // put lines result in resultElement as innerHTML
  resultElement.innerHTML = `<div>${lines
    .map(eachLine => `<div>${isNumber(eachLine) ? round(eachLine) : '---'}</div>`)
    .join('')}</div>`; // join() junta os elementos de um array em uma string e retorna essa string.

  // calculate total from lines
  const total = lines.filter(isNumber).reduce((a, b) => a + b, 0); // Filtra para passar somente números para dentro do array.
  console.log(total);   
  
  // add total to resultElement
  resultElement.innerHTML += `<div id="total">${total}</div>`;

  // save total to clipboard on click
  document.querySelector('#total')?.addEventListener('click', () => {
    navigator.clipboard.writeText(total.toString());
  });
}

// load calculator value from localStorage
calculatorElement.value = localStorage.getItem('calculator') || '';

// addEventListener to calculator
calculatorElement.addEventListener('input', calculate);
calculate();