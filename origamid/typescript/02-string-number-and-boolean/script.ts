// string, number and boolean - basic (primitives)
const phrase: string = 'Front-end';
const price02: number = 500;
const condition: boolean = true;

// typeof operator
console.log(typeof phrase); // string
console.log(typeof price02); // number
console.log(typeof condition); // boolean

// Can be used as a type guard, to only to something if the type is correct
if (typeof phrase === 'string') {
    phrase.toLowerCase();
}