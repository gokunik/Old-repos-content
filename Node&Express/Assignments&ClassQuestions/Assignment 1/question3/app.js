// Note App based Application:
// Q3. Create an application which adds registration details for an event, cancels the registration and list all
// the registrations for a given event. 

// Commands - 
// Add Registration( Register for the event ), 
// Cancel the registration of a user
// List all the registration

// Events -> hackaton
// categories -> 1. coding sprint, 2.datathon, 3. hackathon
// type -> 1. online, 2. offline 
// Register User ✅  -> node app.js add --id="" --user="" --category="" --course="" --type="" 
// --id is optional and can be skipped only in case of Register command

// Cancel registration ❌ -> node app.js cancel --id=""
// --id="" is mandotary here

// List 📄 -> node app.js list --category=""
// --category is optional. if provide all the registration from that category will be listed


const commands = require("./commands")
const eventapp = require("./event")

const object = commands.obj
var command = object._[0]

if (command == "add") {
    message = eventapp.register(object.id, object.user, object.category, object.course, object.type)
    console.log(message)
}
else if (command == "cancel") {
    message = eventapp.cancel(object.id,object.category)
    console.log(message)
}
else if(command == "list")
{
    message = eventapp.list(object.category)
}





