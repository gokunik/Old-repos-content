// command line arguments
// inbuilt moudle 'process' is used to cmd arguments
// process.argv[] is the array in which cmd argument are stored

var arg0 = process.argv[0];
var arg1 = process.argv[1];
var arg2 = process.argv[2];

console.log('Input 1 -> ', arg0);
console.log('Input 2 -> ', arg1);
console.log('Input 3 -> ', arg2);