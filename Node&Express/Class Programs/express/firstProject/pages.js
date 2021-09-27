var express = require("express");

var app = express();

var Exam1 = { course_code: 918, course_title: "Ionic", grade: "O" };

app.get("/", (request, response) => {
  response.send(Exam1);
});

app.get("/course", (request, response) => {
  response.send({ course_code: 919, course_title: "Node js", grade: "O" });
});

app.listen(3000);
{
  console.log("Server up and running 🏃‍♂️");
}
