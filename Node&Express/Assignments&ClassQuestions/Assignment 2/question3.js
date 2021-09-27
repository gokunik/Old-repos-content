// Program to read and write in node js
// Reading the data from the data.json and adding new data to the file

let fs = require("fs")

let rawData = fs.readFileSync('data.json'); // reading data from the file
let data =  JSON.parse(rawData); // converting rawdata to object format

console.log("Data -> ", data)

// adding new data 
data['age'] = 22;
data['subject'] = 'CAP919';
data['date'] = process.argv[2] // also taking data from the command line 

fs.writeFileSync('data.json', JSON.stringify(data, null, 2)) // Writing data back to the file

console.log('Data added successfully please check data in the file')



