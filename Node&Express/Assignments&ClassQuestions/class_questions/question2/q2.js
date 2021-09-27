// introduction to the express 

var express = require("express");

var app = express();

app.get("/", (request, response) => {
    response.send("<h1> Express Running and working fine! 🤍 </h1> <br> <h1>Changes made </h1>");
    console.log("Changes made");

});

app.listen(3000)
{
    console.log('Server up and running 🏃‍♂️ ');
}