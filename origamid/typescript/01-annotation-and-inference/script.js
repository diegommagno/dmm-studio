"use strict";
/*
Global install: npm install -g typescript
tsc script.ts to create script.js as the script.ts can not be executed in the browser.
tsc --init to create the tsconfig.json file
tsc -w to watch for changes in the script.ts file and compile it to script.js instead of needing to type tsc to compile.
 
After making changes in script.ts, use commando tsc to compile.
On the tsconfig.json file it's possible to choose the JavaScript version it will be compiled to.

"strict": true means that it will not let any "any" errors be thrown unless we say the value should be any.
In this example, if we remove "number" from a and b, they could be "any" value instead of an int, which is an error.
To indicate it could be any: a: any, b: any

*/
const total = 100;
function sum(a, b) {
    return a + b;
}
console.log(sum(10, 10));
// Annotation and Inference 01
// With typescript we can indicate which type of value a variable will receive. 
const product = 'Book';
let price = 200;
const car = {
    brand: 'Jeep',
    year: 2014,
};
// Inference is when the type is not specified but the TS assumes the type, such as a string in product = 'Book'.
// It's a good practice to not specify the type when it's not necessary, such as when the TS already defined it.
/*

const car = {
    brand: 'Jeep',
    year: 2014,
};

car.brand = 3; // Throws an error because TS already defined the type as string.
*/
// It's necessary to specify the type when using functions. 
// TS does not execute the functions, so it won't know the type of values.
function multiply(a, b) {
    return a * b;
}
multiply(5, 5);
const nintendo = {
    name: "Nintendo",
    price: "2000",
};
function transformPrice(product) {
    product.price = 'R$ ' + product.price;
    return product;
}
const newProduct = transformPrice(nintendo);
console.log(newProduct);
// Tasks
// 1 - Fix the function with TypeScript
function fixText(text) {
    return text.trim().toLowerCase();
}
console.log(fixText('   Hello World !  '));
// 2 - Fix the functions with TypeScript
const input = document.querySelector('input');
const totalProfit = localStorage.getItem('total');
if (input && totalProfit) {
    input.value = totalProfit;
    calculateProfit(Number(input.value));
}
function calculateProfit(value) {
    const p = document.querySelector('p');
    if (p) {
        p.innerText = `Ganho total é: ${value + 100 - value * 0.2}`;
    }
}
function totalUpdated() {
    if (input) {
        localStorage.setItem('total', input.value);
        calculateProfit(Number(input.value));
    }
}
if (input) {
    input.addEventListener('keyup', totalUpdated);
}
