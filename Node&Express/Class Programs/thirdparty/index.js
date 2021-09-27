console.log('starting app')

const _ = require('lodash');

console.log(_.isString());
console.log(_.isString('man'));
var uniqArr = _.uniq(['A','B','C','D','E',]);
console.log(uniqArr);
