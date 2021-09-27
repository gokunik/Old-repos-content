
// indexOf Array
// reverse
// sortedIndexOf
// sortedUniq
// pad String
// replace

// Question 1 indexOf
const _ = require("lodash")

const students = ['aman','hanish','ajit','harman','raman','hanish','ajit']

console.log('String \'raman\' is present in the ',_.indexOf(students,'raman'),' index of array')

//-------------------------------------------------------------------------------------------//

// Question 2 reverse
console.log('Actuall array -> ', students)
console.log('Reversed array -> ',_.reverse(students))

//------------------------------------------------------------------------------------------//

// Question 3 sortedIndexOf
// This method is like _.indexOf except that it performs a binary search on a sorted array.

console.log('Using fucnction sortedIndexof -> ',_.sortedIndexOf(students,'raman'));

//------------------------------------------------------------------------------------------//

// Question 4
// This method is like _.uniq except that it's designed and optimized for sorted arrays.
console.log('Function sortedUniq ->')
console.log(_.sortedUniq(students))

// Question 5 
console.log('Function pad')
console.log(_.pad('Nitesh', 16,' #'))

// Queestion 6 Replace
console.log('Replace Function ')
console.log(_.replace(students,'raman','Raman singh'))

// Question 7 Trim
console.log('Trim Function ')
console.log(_.trim('   Nitesh Khatri  '));