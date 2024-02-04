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