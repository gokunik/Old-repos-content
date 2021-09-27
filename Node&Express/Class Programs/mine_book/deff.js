const fs = require('fs');

var fetchBooks = () => {
  try {
    var BooksString = fs.readFileSync('Books-data.json');
    return JSON.parse(BooksString);
  } catch (e) {
    return [];
  }
};

var saveBooks = (Books) => {
  fs.writeFileSync('Books-data.json', JSON.stringify(Books,null,2));
};

var addBook = (title, author, year) => {
  var Books = fetchBooks();
  var Book = {
    title,
    author,
	year
  };
  var duplicateBooks = Books.filter((Book) => Book.title === title);

  if (duplicateBooks.length === 0) {
    Books.push(Book);
    saveBooks(Books);
    return Book;
  }
};

var getAll = () => {
  return fetchBooks();
};

var getBook = (title) => {
  var Books = fetchBooks();
  var filteredBooks = Books.filter((Book) => Book.title === title);
  return filteredBooks[0];
};

var removeBook = (title) => {
  var Books = fetchBooks();
  var filteredBooks = Books.filter((Book) => Book.title !== title);
  saveBooks(filteredBooks);

  return Books.length !== filteredBooks.length;
};

var search = (author) =>
{
  var Books = fetchBooks()
  var filteredAuthor = Books.filter((Book) => Book.author === author);
  return filteredAuthor[0];

}

var logBook = (Book) => {
  console.log('--');
  console.log(`Title: ${Book.title}`);
  console.log(`Author: ${Book.author}`);
  console.log(`Year: ${Book.year}`);
};

module.exports = {
  addBook,
  getAll,
  getBook,
  removeBook,
  logBook,
  search
};