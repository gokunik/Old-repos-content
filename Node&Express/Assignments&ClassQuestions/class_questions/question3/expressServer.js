// importing express and hbs module
const express = require("express");
const hbs = require('hbs')

// creating the express application
const app = express();

// Setting the default template engine as hbs
// This is important because express support many template engines so
// we must define which one we are using
app.set("view engine", "hbs");

// for using partial first we need to tell the hbs and express that we are using parital
// and need to specify the partial path
hbs.registerPartials('./partials');


// defining the route for our application
// '/' represent the root route when user will make any request to root domain the
// following code will execute 
app.get('/', (req, res) => {
    res.render('index', {
        title: "Home page",
        message: "Express application with hbs"
    })
})

// we use res.render to render html page available in our directory
app.get('/about', (req, res) => {
    res.render('about', {
        title: "About page",
        message: "Welcome to the about page"
    })
})

// we can also use res.send to send data to a specific route
app.get('/blog', (req, res) => {
    res.send('<h2>Welcome this is blog page </h2> <br> <a href="/">Return to home</a>')
})

// To handle all the other request which doesn't exist in our app
// 404 handle
// thing to remember here is that is should always present at the end after all routes
app.get("*", (req, res) => {
    res.send("Page Does Not Exists <a href='/'>Return To Home</a>")
});

// defining the port number on which our application will run
app.listen(3000, () => console.log(`App listening on port 3000!`));