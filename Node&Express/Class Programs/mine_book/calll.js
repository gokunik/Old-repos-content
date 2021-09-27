const yargs = require("yargs");

const libr = require("./deff.js");

const titleOptions = {
  describe: "Title of Book",
  demand: false,
  alias: "t",
};
const authorOptions = {
  describe: "Author of Book",
  demand: true,
  alias: "a",
};
const yearOptions = {
  describe: "Year of publishing",
  demand: true,
  alias: "y",
};

const argv = yargs
  .command("add", "Add a new book", {
    title: titleOptions,
    author: authorOptions,
    year: yearOptions,
  })
  .command("list", "List all Books")

  .command("search", "Search a Book", {
    title: titleOptions,
  })
  .command("searchAuthor", "Search a Author", {
    author: authorOptions,
  })

  .command("remove", "Discard a Book", {
    title: titleOptions,
  })

  .help().argv;
var command = argv._[0];

if (command === "add") {
  var Book = libr.addBook(argv.title, argv.author, argv.year);
  if (Book) {
    console.log("Book Added");
    libr.logBook(Book);
  } else {
    console.log("Book title taken");
  }
} else if (command === "list") {
  var alll = libr.getAll();
  console.log(`Printing ${alll.length} Book(s).`);
  alll.forEach((Book) => libr.logBook(Book));
}
else if(command == "listAuthor")
{
  var authorNames = libr.getAll();
  var counter = 1;
  console.log(`Printing ${authorNames.length} Authors.`);
  authorNames.forEach((authorNames) =>
    console.log(`${counter++} Author name - ${authorNames.author}`)
  );
} 

else if (command === "search") {
  var Book = libr.getBook(argv.title);
  if (Book) {
    console.log("Book found");
    libr.logBook(Book);
  } else {
    console.log("Book not found");
  }
} else if (command === "searchAuthor") {
var author = libr.search(argv.author)

author ? console.log("Author Found \n", libr.logBook(author)) : "Not found";

} else if (command === "remove") {
  var BookRemoved = libr.removeBook(argv.title);
  var message = BookRemoved ? "Book was removed" : "Book not found";
  console.log(message);
} else {
  console.log("Command not recognized");
}
