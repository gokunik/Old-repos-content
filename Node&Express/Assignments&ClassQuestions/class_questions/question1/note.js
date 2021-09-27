const fs = require('fs');

var fetchNotes = () =>
{
    var dataString = fs.readFileSync('note.json');
    return JSON.parse(dataString);
} 

var addNote = (id, title, body) => {

    notes = [];
    notes_item = { id, title, body };

    notes = fetchNotes()

    var duplicatedata = notes.filter((notes_item) => notes_item.id === id);

    if (duplicatedata.length === 0) {
        notes.push(notes_item);
        fs.writeFileSync('note.json', JSON.stringify(notes));
        return "Note added";
    }
    else {
        return "Id already exists";
    }
}

var listNotes = (id) =>
{
    notes = fetchNotes();


    if(id === undefined)
    {
        console.log("Notes Details\n");

        notes.forEach((note,index) => {
            console.log(`Note: ${index+1}\n`);
            console.log(`Id    : ${note.id}`);
            console.log(`Title : ${note.title}`);
            console.log(`Note  : ${note.body}\n\n`);
        });
    }
    else
    {
        notes.forEach((note) =>
        {
            if(note.id === id)
            {
                console.log(`Id    : ${note.id}`);
                console.log(`Title : ${note.title}`);
                console.log(`Note  : ${note.body}`);
            }
        })
    }
}

module.exports = {
    addNote,
    listNotes
}