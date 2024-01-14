var name = 'Diego';
let age = 28;
const hasHobbies = true;

console.log(name, age, hasHobbies);

/* ----------------------------------------- */

let price = 10;
let amountBought = 5;
let totalPrice = amountBought * price;

console.log(totalPrice)

/* ----------------------------------------- */

let notDefined;
console.log(notDefined); // undefined, but declared.
// console.log(defined); // wasn't declared, so it will throw an error.

/* ----------------------------------------- */

// Hoisting 
// First it's necessary to declare the variable to then use it as JS will read the code from top to bottom.

console.log(sett); // undefined, does not throw an error.
var sett = 'Diego';
console.log(name); // Diego

/* ----------------------------------------- */

// var, let and const
// var is global and local, let and const are local.
// var and let can be updated after declaration, const can't.

// let does not allow you to declare two variables with the same name, it throws an error.
// let name = 'Diego';
// let name = 'Levy';

// var allows you to declare two variables with the same name, it does not throw an error.

/* ----------------------------------------- */

// Task
// Declare a variable with your name
let myName = 'Diego';

// Declare a variable with your age
let myAge = 28;

// Declare a variable with your favorite food and do not assign any value
let myFavoriteFood;

// Assign value to your favorite food variable
myFavoriteFood = 'Burger';

// Declare five different variables without values
let a, b, c, d, e, f;