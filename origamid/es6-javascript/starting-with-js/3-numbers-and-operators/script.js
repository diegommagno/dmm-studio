// Operators

let sum = 100 + 50; // 150
let subtract = 100 - 50; // 50
let multiplication = 100 * 2; // 200
let division = 100 / 2; // 50
let exponent = 2 ** 4; // 16
let remainder = 14 % 5; // 4 - let modulo in PT/BR - Restante da divisão.

// Operators (Strings)

let sum2 = '100' +  50; // 10050 - This is a string.
let subtraction2 = '100' - 50; // 50 - This is a number. Colocar o +'100' antes da string transforma ela em número.
let multiplication2 = '100' * '2'; // 200 - This is a number.
let division2 = 'Comprei 10' / 2; // NaN (Not a Number)
let division3 = '100' / 2; // 50 - This is a number.

// Order of operations
// The order of operations is the same as in mathematics.

let total = 20 + 5 * 2; // 30
let total2 = (20 + 5) * 2; // 50
let total3 = 20 / 2 * 5; // 50
let total4 = 10 + 10 * 2 + 20 / 2; // 40

// Unary operations
// Unary operations are operations that occur with only one value.

let increment = 5;
console.log(increment++); // 5 - The increment is done after the operation.
console.log(increment); // 6

let increment2 = 5;
console.log(++increment2); // 6 - The increment is done before the operation.

let decrement = 5;
console.log(decrement--); // 5 - The decrement is done after the operation.

let decrement2 = 5;
console.log(--decrement2); // 4 - The decrement is done before the operation.

// Lembrando que se a operação x++ for feita antes do console.log, basta dar console.log(variável) que será mostrado o valor correto, visto a operação já ter sido realizada.

