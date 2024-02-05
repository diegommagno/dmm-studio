// It's a way to inform that a data (variable, functions, etc) can be of one OR another value. 

let total02: string | number = 200;
total02 = '200';

function isNumber(value: string | number) {
    if(typeof value === 'number') {
        return true;
    } else {
        return false; // Add return false, otherwise it will return undefined
    }
}

console.log(isNumber('200')); // undefined

// DOM
// Um local que se usa muito o Union types é no DOM, porque o JS não consegue analisar o HTML quando estamos fazendo a seleção.

const button = document.createElement('button');

if (button) {
    button.click(); // If button exists, do button.click()
}

// Jeito mais limpo

button?.click(); // If button exists (not null or undefined), do button.click()

// Tasks
// 1. Create a function named toNumber
function toNumber(value: string | number) {
    if(typeof value === 'number') {
        return value
    } else if (typeof value === 'string') {
        return Number(value)
    } else {
        throw "Value needs to be either a number or a string"
    }
}

console.log(toNumber("200")); // 200 (number)

// 2. This function should receive a parameter named value that can be a string or a number

// 3. If the value is a number, the function should return it

// 4. If the value is a string, it should convert it to number and return it

// 5. If the value is neither a number nor a string, the function should return an error. (throw "Value needs to be either a number or a string").

