"use strict";
// It's a way to inform that a data (variable, functions, etc) can be of one OR another value. 
let total02 = 200;
total02 = '200';
function isNumber(value) {
    if (typeof value === 'number') {
        return true;
    }
}
console.log(isNumber('200')); // undefined
