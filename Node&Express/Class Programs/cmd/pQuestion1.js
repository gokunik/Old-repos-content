
const myyargs = require('yargs');

const arg = myyargs.argv;
var default_input = 'Nitesh';
var input = arg._[0];

if(input === default_input)
{
    
    console.log('Welcome owner -> ',default_input)
}
else
{
    console.log('Welcome New user -> ',input)
}
