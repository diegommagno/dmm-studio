// Data types

let name = 'Diego'; // String
let age = 23; // Number
let isSubscribed = true; // Boolean
let food = null; // Null
let time; // Undefined
let symbol = Symbol() // Symbol
let person = { // Object
    name: 'Diego',
    age: 23,
    isSubscribed: true,
    food: null,
    symbol: Symbol()
};

/* ----------------------------------------- */

// Check data type

console.log(typeof person.name); // String
console.log(typeof time); // Undefined

/* ----------------------------------------- */

// Concatenation and interpolation
console.log('My name is ' + name + ' and I am ' + age + ' years old.'); // Concatenation
console.log(`My name is ${name} and I am ${age} years old.`); // Interpolation

/* ----------------------------------------- */

// "", '' and ``
// 'JavaScript is "super" easy';
// "JavaScript is 'super' easy";
// "JavaScript is \"super\" easy"; // \ indicates that the special function of the next character should not be used.
// `JavaScript is "super" easy"`;
// "JavaScript is "super" easy"; // Invalid

/* ----------------------------------------- */

// Tasks

// Declare a variable that has a string
let dayOfTheWeek = 'Monday';

// Declare a variable that has a number inside a string
let dayOfTheWeekNumber = '1';

// Declare a variable that has your age
let myAge = '23';

// Declare two variables, one with your name and another with your last name. Concatenate them.
let myName = 'Diego', myLastName = 'Magno';
console.log(myName + ' ' + myLastName);

// Put the phrase "It's time." inside a variable
let phrase = "It's time.";
console.log(phrase);

// Check the type of the variable that has your name
console.log(typeof myName); // String