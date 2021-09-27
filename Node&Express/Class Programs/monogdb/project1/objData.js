const { MongoClient, ObjectID } = require('mongodb');

var user = { name: 'Nitesh', year: 2020 };
var { name } = user;
var { year } = user;

console.log(name);
console.log(year);


var obj = new ObjectID();
console.log(obj);

