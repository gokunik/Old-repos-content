const fs =require('fs');
const { stringify } = require('querystring');
var addData = (d1,d2) => 
{
    var data = [];
    var data_item = {d1,d2};

    try
    {
        var dataString = fs.readFileSync('data.json');
        data = JSON.parse(dataString);

    } catch (e) {}

    var duplicatedata = data.filter((data_item) => data_item.d1 === d1);

    if(duplicatedata.length === 0 )
    {
        data.push(data_item);
        fs.writeFileSync('data.json',JSON.stringify(data));
    }
}
// *******************************
// code for reading the note 

var fetchNotes = () => {
    
  try {
    var notesString = fs.readFileSync('data.json');
    return JSON.parse(notesString);
  } catch (e) {
    return [];
  }
};

var saveNotes = (notes) => {
  fs.writeFileSync('data.json', JSON.stringify(notes));
};

var getNote = (d1) => {
  var notes = fetchNotes();
  var filteredNotes = notes.filter((notes) => notes.d1 === d1);
  return filteredNotes[0];
};

var logNote = (notes) => {
  console.log('--');
  console.log(`Title: ${notes.d1}`);
  console.log(`Body: ${notes.d2}`);
};


// ************************


module.exports =
{
    addData,
    fetchNotes,
    saveNotes,
    getNote,
    logNote

};