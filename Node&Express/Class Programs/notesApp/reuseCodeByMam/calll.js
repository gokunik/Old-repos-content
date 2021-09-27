const fs = require("fs");
const _ = require("lodash");
const yargs = require("yargs");

const notes = require("./def.js");

const titleOptions = {
  describe: "Title of note",
  demand: false,
  alias: "t",
};
const bodyOptions = {
  describe: "Body of note",
  demand: true,
  alias: "b",
};
const argv = yargs
  .command("add", "Add a new note", {
    title: titleOptions,
    body: bodyOptions,
  })
  .help().argv;
var command = argv._[0];

if (command === "add") {
  var note = notes.addNote(argv.title, argv.body);
  if (note) {
    console.log("Note created");
    notes.logNote(note);
  } else {
    console.log("Note title taken");
  }
} else {
  console.log("Command not recognized");
}
