//@ts-check
// This will indicate possible errors in the code. It's best to create a typescript file.

const phrase = 'Front End';
const total = 100.05;
const companies = ['Apple', 'Microsoft'];

phrase.toUpperCase(); // FRONT END
total.toLowerCase(); // An error should be indicated here. It will only happen after the code is executed (runtime).
                     // TypeScript would indicate the error here.

const t = total.toFixed();
console.log(t); // Returns 100

console.log(t + 10); // Returns 10010 as .toFixed() turns string, 100+10 as as a string = 10010.
                     // TypeScript can avoid these mistakes.

companies.map((company) => company.toLowerCase()); // This is correct, as the array is an array of strings.

const body = document.body;
body.style.backgrounds = 'red'; // This is correct, as body is an HTML element, but backgrounds does not exist and typescript will indicate that.

const button = document.querySelector('button'); // This can be an HTML element (in this case a button) or null if it doesn't exist.
button.click(); // This is then the same as null.click(), which does not exit and will return an error.
                // TypeScript can avoid these mistakes.

const operation = 100 + true;
console.log(operation); // Returns 101, as true is converted to 1.
const operation2 = 100 + false;
console.log(operation2); // Returns 100, as false is converted to 0.
const operation3 = 100 + {};
console.log(operation3); // Returns 100[object Object], as {} is converted to [object Object].
                         // TypeScript can avoid these mistakes.