// creating options for commands

const yargs = require('yargs')
const obj = yargs.argv

const title = {
    describe: "Note Title",
    demand: true,
    type: "string",
    alias: "t"
}
const body = {
    describe: "Note body",
    demand: true,
    type: "string",
    alias: "b"
}
const id = {
    describe: "Id for notes",
    demand: true,
    type: "string",
}

yargs.command(
    {
        command: "add",
        describe: "Add notes",
        builder:{
            id: id,
            title: title,
            body: body
        }
    }
)
 
yargs.command(
    {
        command:"list",
        describe:"List all notes",
        builder: {
            id: id,
        }
    }
)

.help().argv


module.exports =
{
    yargs,
    obj
}