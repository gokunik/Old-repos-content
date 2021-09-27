// creating options for commands

const yargs = require('yargs')
const obj = yargs.argv

const Category = {
    describe: "Categories of competition",
    demand: true,
    type: "string",
    alias: "ctg"
}
const Course = {
    describe: "Course in which student is studying",
    demand: true,
    type: "string",
    alias: "crs"
}
const Userid = {
    describe: "Id of the registered user",
    demand: true,
    type: "string",
    alias: "id"
}
const User = {
    describe: "Name of the registered user",
    demand: true,
    type: "string",
    alias: "u"
}

const Type = {
    describe: "Online or offline",
    demand: true,
    type: "string",
    alias: "t"
}

yargs.command(
    {
        command:"add",
        id: {
            describe: "Register a new id",
            demand: false,
            type: "string",
        },
        user: User,
        category: Category,
        course: Course,
        type: Type
    }
    
)

yargs.command(
    {
        command: "cancel",
        builder: {
            userId: Userid,
        }
    }
)

yargs.command(
    {
        command: "list",
        builder: {
            category: {
                describe: "Categories of competition",
                demand: false,
                type: "string",
            }
        }
    }
)

.help().argv


module.exports =
{
    yargs,
    obj
}