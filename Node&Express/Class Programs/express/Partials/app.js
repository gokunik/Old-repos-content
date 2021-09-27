const path = require("path");
var expr = require("express");
const hbs = require("hbs");

var app = expr();

//const pubpath = path.join(__dirname, "./template");
const path1 = path.join(__dirname, "./template/views");
const path2 = path.join(__dirname, "./template/partials");


app.set("view engine", "hbs");
app.set("views", path1);

hbs.registerPartials(path2);

//app.use(expr.static(pubpath));

app.get("", (req, res) => {
  res.render("index", {
    welcomeMessage:'Welcome! You are at home page.',
    footerMessage: 'home page Footer',
    author: 'GokuNik',
    body:'Marks anaylsis',
    data:{
      sem1:{
        sem:'Semester 1',
        tgpa:10
      },
      sem2: {
        sem: 'Semester 2',
        tgpa: 10
      },
      sem3: {
        sem: 'Semester 3',
        tgpa: 10
      },
      sem4: {
        sem: 'Semester 4',
        tgpa: 10
      },
      sem5: {
        sem: 'Semester 5',
        tgpa: 10
      }
    }
  });
});

app.get("/about", (req, res) => {
  res.render("about", {
    welcomeMessage: 'Welcome! You are at About page.',
    footerMessage:'About page Footer',
    author:'Nik',
    body: 'Know more about us'
  });
});

app.get("/help", (req, res) => {
  res.render("help", {
    welcomeMessage: 'Welcome! You are at help page.',
    footerMessage: 'help page Footer',
    author: 'vegita',
    body: 'Need any assistance?',
  });
});

app.get('*',(req,res) => 
{
 res.send('No such page')
})

app.listen(3000);
{
  console.log("Server running succesfully at localhost:3000");
}
