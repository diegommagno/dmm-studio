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

// Returns the first false value or the last value if all are true
true && true; // True
true && false; // False
false && true; // False

'Cat' && 'Dog'; // Dog - True as it's a string with content. Returns the value instead of 'true'
5 - 5 && 5 + 5; // 0 - Returns 0 as it will return the first false value.

'Cat' && false; // False - Cat is true, then there's a false, returns false as it's a true && false.
5 >= 5 && 3 < 6; // True - True as both statements are true, resulting in true. This returns true instead of a value as we are comparing not getting a value.

// || Or
// Returns the first true value

true || true; // True
true || false; // True
false || true; // True
'Cat' || 'Dog'; // Cat - True as it's a string with content. Returns the value instead of 'true'
5 - 5 || 5 + 5; // 10 - Returns 10 as it will return the first true value.
'Cat' || false ; // Cat - Returns the first true value
5 >= 5 || 3 < 6; // True

// ! Not

// Switch

let favoriteColor = 'Blue';

switch (favoriteColor) {
    case 'Blue':
        console.log('Look at the sky...');
        break;
    case 'Green':
        console.log('Look at the grass...');
        break;
    case 'Yellow':
        console.log('Look at the sun...');
        break;
    default:
        console.log('Close your eyes.');
}

// Tasks

// Check if your age is higher than the one of a family member.
// Depending on the result, log "He is older than me." or "She is younger than me." or "They are the same age as me."


// What is the returned value from the following expression?
let expression = (5 - 2) && (5 - ' ') && (5 - 2);

// Check if the variables are truthy or falsy
let firstName = 'Andre';
let age = 28;
let familyMember = false;
let futureJob;
let moneySaved = 0;


// Compare the total population of Brazil with the total population of China (in millions)
let brazil = 207;
let china = 1340;

// What will be shown in the console?
if(('Cat' === 'cat') && (5 > 2)) {
    console.log('True');
} else {
    console.log('False');
}