// use of modules in node js
// In node js we can use moduel in mainly three ways
// 1. Using inbuilt module
// 2. Using user created module
// 3. Using third party module

let fs = require('fs') // example of inbuilt module in node js
let lodash = require('lodash') // example of third party module
let Mymodule = require('./exportModule') // example of user created module

data = Mymodule.data // user created module is used

// changing reg type to int as it should be stored as a number
data.reg = lodash.parseInt(data.reg) // third party module is used

// writing the data to json file
// Before writing it is converted to the suitable json format using stringfy function
fs.writeFileSync('data.json', JSON.stringify(data, null, 2)) // inbuilt module is used
