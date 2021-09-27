// Q1 - What are the various ways of providing user input have you practiced?
// What are the differences between those methods?

// Mainly their are two ways of taking user input in node js which are following
// 1. Passing the user input from the input field in html page to node js file
// 2. Taking input from the command prompt using command line arguments

// Command line arguments using inbuilt method
// Inbuilt module 'process' is used to capture cmd line arguments in a array
// argv[] is the array in which cmd argument are stored

// Demonstration of command line arguments using inbuilt node module
console.log('\nInbuilt command line arguments using process.argv')
var arguments = process.argv;

for (i = 0; i < arguments.length; i++) {
  console.log(`Argument[${i}] -> ${arguments[i]}`);
}

// output
// E:\Sem 6\Cap 919 Node js\ca material\assignment 1>node question1.js "Nitesh khatri"  11813971
// Argument[0] -> C:\Program Files\nodejs\node.exe
// Argument[1] -> E:\Sem 6\Cap 919 Node js\ca material\assignment 1\question1.js
// Argument[2] -> Nitesh khatri
// Argument[3] -> 11813971

// argv[0] and argv[1] will always be present in the argv array even if no arguments is passed
// These two are passed by default where [0] argument is the node.exe location and [1] is the path of the file

// -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_ //

// Command line arguments using third party module yargs
// yargs is little advance method to take user input through command line
// It stores the arguments in a object which contain first key:value pair as _:[] a array of arguments
// second key:value pair is '$0':'Name of the executed file'
// Yargs also provide us the option to create or define our own commands(flags)
// we can also pass arguments like - node question1.js "Normal argument" --user="Nitesh khatri" --reg="11813971"
// output -> 
// {
// _: ['Normal argument'],
//   user: 'Nitesh khatri',
//   reg: 11813971,
//   '$0': 'question1.js'
// }

// Demonstration
console.log('\nCommands line arguments using Yargs module')
const Yargs = require("yargs");

const yargsArguments = Yargs.argv;

console.log("Argument array -> _:", yargsArguments._);

for (var i = 0; i < yargsArguments._.length; i++) {
  console.log(`Argument[${i}]  ->  ${yargsArguments._[i]}`);
}

console.log(`Name of the file -> ${yargsArguments.$0}`);

console.log(yargsArguments)
// Output
// Commands line arguments using Yargs module
// Argument array -> _: [ 'Nitesh khatri', 11813971 ]
// Argument[0]  ->  Nitesh khatri
// Argument[1]  ->  11813971
// Name of the file -> question1.js

// Difference between default and yargs method is their functionality and their way of storing the arguments
// in default method arguments are stored in a array with 2 default arguments and in yargs also it is stored 
// in a array but that array is present inside a object and array only contain arguments passed by the user. 
// Another difference is that yargs provide additional features like defining our own commands which is not 
// available in default method