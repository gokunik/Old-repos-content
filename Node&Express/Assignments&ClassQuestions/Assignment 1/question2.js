// Q2.Demonstrate the use of require statement with a third party module. Use any 5 inbuilt string
// related operations which have not been used in class.

// A. Demonstrate the use of require statement with a third party module
// Third party module used - lodash

var lodash = require("lodash");

var fullName = "Nitesh khatri";
var regNo = '11813971';

console.log("\n\nDemonstration of using utility functions available in lodash")

// 1. words(); splits the sentence into array words from the string 
var words = lodash.words(fullName)
console.log("\n1. Words present in variable fullName -> ",words)

// 2. snakeCase(); change the strings into snake case format
var snakecase = lodash.snakeCase(fullName)
console.log('\n2. Snake case of the variable fullName -> ', snakecase)

// 3. parseInt(); - this method can change string into integer
console.log("\n3. Example of praseInt")
console.log('Value of regNo ->', regNo)
console.log("Typeof(regNo) before parseInt -> ",typeof(regNo))
var regNo = lodash.parseInt(regNo)
console.log("Typeof(regNo) after parseInt -> ", typeof (regNo))

// 4. startWith(); - returns true if a string starts with the passed string
console.log('\n4. Example of startwith()')
console.log('Variable fullName -> ', fullName)
var startbool = lodash.startsWith(fullName,"N")
console.log("lodash.startsWith(fullName,'N') -> ",startbool)

// 5. repeat(); -> String will get repeated the numbers of times according to the value passed 
console.log('\n5. Example of repeat()')
var repeated = lodash.repeat(fullName,3)
console.log('Exampel of repeat -> ',repeated)



// B. 5 inbuilt string function operations available in node js


console.log("\n\n****  Use of 5 inbuilt functions  ****")
// 1. split(); - Split a string using a separator
var firstName = fullName.split(" ")[0];
var lastName = fullName.split(" ")[1];
console.log('\n1. split()')
console.log('Full Name -> ', fullName)
console.log("First Name -> ", firstName);
console.log("Last Name  -> ", lastName);

// 2. indexof(); - Finds the index of sub string from a string
console.log('\n2. indexof()')
console.log('fullName.indexOf("khatri")')
var position = fullName.indexOf("khatri");
console.log('Position -> ', position);

// 3. replace(); - Replace a string with another string
console.log('\n3. replace()')
console.log("String ->",fullName)
var newName = fullName.replace("Nitesh", "Nik");
console.log("New name -> ", newName);

// 4. match(); - return a matched string using regex. return null if not matched
console.log('\n4. match()')
console.log('Main String->',fullName,'\nString to match -> "tesh"')
var stringMatch = fullName.match(/tesh/g);
console.log('Matched string -> ', stringMatch);

// 5. toString(); - will convert Number to string type
console.log('\n5. toSting()')
console.log("Type of ",regNo," before toString() -> ",typeof(regNo))
var reg = regNo.toString();
console.log('Type after toString -> ', typeof (reg));
