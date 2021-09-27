const express = require("express");
const hbs = require("hbs")
const path = require("path")

const app = express()
const port = process.env.PORT || 3000;

const views = path.join(__dirname, "/app/view")        // path for view
const partials = path.join(__dirname, "/app/partial"); // path for partials

app.set("view engine", "hbs");
app.set("views", views);
hbs.registerPartials(partials);
app.use(express.static('public'));

let userLogin = false // as of now it is static
let email = "niteshkhatri545@gmail.com"

app.use(function (req, res, next) {
    res.locals.isLogged = userLogin;
    next()
})

app.get("/", (req, res) => {
    res.render("home",
    {
        title:"Home",
        email:email
    })
});

app.get("/contact", (req, res) => {
    res.render("contact",
        {
            title: "Contact",
            email:email
        })
});

app.get("/about", (req, res) => {
    res.render("about",
        {
            title: "About Us",
            email:email,
            name:"Nitesh Khatri",
            aboutMe: `
            My name is Nitesh Khatri. I am 20 Years old passionate youngter 
            who is ready to make and break stuff. My main field of interest 
            is Web development and i love to explore this field more and more.`
        })
});

app.get("/account", (req, res) => {
    res.render("account",
        {
            title: "Profile",
            email:email
        })
});

app.get("*", (req, res) => {
    res.render("404",
    {
        title:"Page Not Found",
        email:email
    })
});

app.listen(port, () => {
    console.log(`Server is up on port ${port}`);
    console.log()

});
