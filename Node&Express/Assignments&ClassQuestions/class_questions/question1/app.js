const commands = require("./command")
const notes = require("./note")

const argv = commands.obj
var command = argv._[0]

console.log("command :",command);

if (command == "add") {
    message = notes.addNote(argv.id, argv.title, argv.body)
    console.log(message)
}

else if (command == "list") {
    message = notes.listNotes(argv.id)
}
else{
    console.log('command not recognized');
}

