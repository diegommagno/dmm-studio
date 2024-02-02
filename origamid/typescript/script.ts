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