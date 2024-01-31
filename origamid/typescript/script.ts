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

function sum(a: number, b: number) {
    return a + b;
}

console.log(sum(10, 10));

// Annotation and Inference 01

// With typescript we can indicate which type of value a variable will receive. 

const product: string = 'Book';

let price: number = 200;

const car: {
    brand: string;
    year: number;
} = {
    brand: 'Jeep',
    year: 2014,
};