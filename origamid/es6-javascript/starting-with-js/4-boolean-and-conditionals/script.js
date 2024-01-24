// Boolean can be either true or false

let isBoolean = true;
let isString = false;

// Conditionals if, else, else if

let isTrue = true;

if (isTrue) {
    console.log('Is true.');
} else {
    console.log('Is false.');
}

// Truthy and Falsy
// Falsy: false, 0, '', "", ``, null, undefined, NaN
// Truthy: Everything else

let name = ''; // Empty string is falsy, so it returns 'Name is undefined.'
let name2 = '  '; // String with spaces is truthy, so it returns the spaces.
let object = {}; // Empty object is truthy, so it returns the object.

if(name) {
    console.log(name)
} else {
    console.log('Name is undefined.')
}

// Negation operator !
// !true // false
// !false // true

// Double negation !! - Usually used to check if the value is a truthy or falsy
// !!true // true
// !!false // false

// Comparison operators
// > Greater than
// >= Greater than or equal to
// < Less than
// <= Less than or equal to
// == Equal to
// === Equal to and of the same type
let x = '10'; 

console.log(x == 10); // True
console.log(x === 10); // False, as the type is different
console.log(x != 10); // False
console.log(x !== 10); // True, as the type is different

// != Different from (same logic as ==)
// !== Different from and of the same type (same logic as ===)

// Logical operators
// && And
// || Or
// ! Not

true && true; // True
true && false; // False
false && true; // False

'Cat' && 'Dog'; // Dog
5 - 5 && 5 + 5; // 0

'Cat' && false; // False
5 >= 5 && 3 < 6; // True