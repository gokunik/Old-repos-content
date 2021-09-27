// Taking command line arguments using yargs which a third party module


const myyargs = require('yargs');

const arg = myyargs.argv;

console.log('Yargs',arg);

for(var i = 0 ; i < arg._.length; i++)
{
    console.log('Argument ',i,' -> ',arg._[i])
}


