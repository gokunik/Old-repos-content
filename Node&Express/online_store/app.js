// imports
const express = require('express');
const path = require("path");
const hbs = require('hbs');


const app = express()
const port = process.env.PORT || 3000;

// common to all users
let announcements = ["Monday is holiday on the occasion of holi",
                    "All the Managers are required to submit last month report before sunday",
                    "Next sunday we are organizing Event On product management. All are required to show their presence."];

app.use(express.static('public'));

// Global data, can be accessed in all files
app.use(function(req,res,next)
{
    res.locals.announ = announcements;
    next()
})

const views = path.join(__dirname, "./app/rootComponent")
const partials = path.join(__dirname, "./app/components");


app.set("view engine", "hbs");
app.set("views", views);
hbs.registerPartials(partials);

// Home Page
app.get("/", (req, res) => {
    res.render("home", {
        title: "Homepage",
        page: "Admin Panel",
        admin: "GokuNik",
        users: {
            sales: {
                Managed: "Nitesh khatri",
                about: "Sales of each month"
            },
            bill: {
                Managed: "Deepak khatri",
                about: "Customer billing"
            },
            delivery: {
                Managed: "Monmohan Singh",
                about: "Product Delivery"
            },
            return: {
                Managed: "Raman singh",
                about: "Product return Info"
            }
        }
    })

});

// sales page
app.get("/sales", (req, res) => {
    res.render("sales", {
        title: "Sales",
        page: "Sales Panel",
        Managed: "Nitesh Khatri",
        task: "Check all stocks of all the products. If any product is out of stock put an order for it.",
        weekly:{
            completed:4,
            pending:0,
            overtime:["Monday","Thursday"]
        }
        
    })

});

// bill page
app.get("/bill", (req, res) => {
    res.render("bill", {
        title: "Bill",
        page: "Billing Panel",
        Managed: "Deepak Khatri",
        task: "Check all the pending billings from dealers and message them asking for the date of payment",
        weekly: {
            completed: 4,
            pending: 1,
            overtime: ["Tuesday"]
        }
    })

});

// delivery page
app.get("/delivery", (req, res) => {
    res.render("delivery", {
        title: "Delivery",
        page: "Delivery Panel",
        Managed: "Monmohan singh",
        task: "Chech the past delivery data, analyse it and send the report to the admin within tomorrow.",
        weekly: {
            completed: 2,
            pending: 3,
            overtime: ["No overtime"]
        }
    })

});

// return page
app.get("/return", (req, res) => {
    res.render("return", {
        title: "Return",
        page: "Return Panel",
        Managed: "Raman singh",
        task:"Make weekly report of all the product returned by the customer with their reason and submit to admin.",
        weekly: {
            completed: 1,
            pending: 3,
            overtime: ["No overtime"]
        }
    })

});

// To handle all the other request which doesn't exist in our app
// 404 handle
app.get("*", (req, res) => {
    res.send("Page Does Not Exists <a href='/'>Return To Home</a>")
});


app.listen(port, () => {
    console.log(`Server is up on port ${port}`);
});