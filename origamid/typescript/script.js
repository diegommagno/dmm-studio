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
body.style.background = 'red'; // This is correct, as body is an HTML element.

const button = document.querySelector('button'); // This can be an HTML element (in this case a button) or null if it doesn't exist.
button.click(); // This is then the same as null.click(), which does not exit and will return an error.
                // TypeScript can avoid these mistakes.