const fs = require('fs');
const _ = require('lodash');
const data = require('./data.js');
const yargs = require("yargs");

const argv = yargs.argv;
var command = argv._[0];
console.log('Command',command);
console.log('yargs',argv);

if(command === 'add')
{
    data.addData(argv.d1, argv.d2);
}
else if (command == 'read')
{
    var note = data.getNote(argv.d1);
    if(note)
    {
        console.log('Note Found ');
        data.logNote(note);
    }
    else{
        console.log('Note not found');

    }
}
else
{
    console.log('Command not recognized ');
    
}


