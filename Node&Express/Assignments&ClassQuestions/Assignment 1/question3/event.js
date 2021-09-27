const fs = require("fs");
let message = '';

function loadjson() {
    try {
        const data = fs.readFileSync('eventDetails.json');
        return JSON.parse(data);
    }
    catch (e) {
        return []
    }
}

function saveDetails(object) {
    fs.writeFileSync('eventDetails.json', JSON.stringify(object, null, 4))
}

function register(id, user, category, course, type) {

    var eventJson = loadjson();

    ++eventJson['eventDetail']['idcounter'];
    ++eventJson['eventDetail']['totalregistrations'];
    var idcounter = eventJson['eventDetail']['idcounter'];

    if (id === undefined) // if id is not defined by the user, one will be generated
    {
        id = (user.split(' ')[0]) + '-' + idcounter;
    }
    else { // if id already exists
        for (const key in eventJson['registrations']) {

            if (id === eventJson['registrations'][key]["id"]) {
                return `
                -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
                                                     
                  Can not register user with this id  
                  Id already exist  ❌               
                                                     
                -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
                `;
            }
        }
    }

    var user = {
        id: id,
        name: user,
        category: category,
        course: course,
        type: type
    }

    eventJson["registrations"][idcounter] = user
    saveDetails(eventJson)
    return `
    -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-

        User registered successfully ✅
    
    -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
    `;

}

function cancel(id) {

    var eventJson = loadjson();

    for (const key in eventJson['registrations']) {
        if (id === eventJson['registrations'][key]["id"]) {
            delete eventJson['registrations'][key];
            --eventJson['eventDetail']['totalregistrations'];
            saveDetails(eventJson)
            
            return `
            _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-

             Registeration canceled successfully ✅
            
            _-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
    `
        }
    }

    return `
    -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-

      User with id ${id} Not found ❌
    
    -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
    `;
}

function list(category) {
    var eventJson = loadjson();
    total = eventJson['eventDetail']['idcounter'];
    current = eventJson['eventDetail']['totalregistrations']
    console.log('\n         *** Hackathon Run ***        \n');
    console.log('Total registered users     -> ', total)
    console.log('Current total users        -> ', current);
    console.log('Total No of Deregistration -> ', total - current)
    console.log('\nHackathon categories');
    for (const key in eventJson['eventDetail']['categories']) {
        console.log(toNumber(key) + 1, eventJson['eventDetail']['categories'][key])
    }
    console.log(`\nType of hackathon category 
1. ${eventJson['eventDetail']['type'][0]}, 
2. ${eventJson['eventDetail']['type'][1]}`)

    console.log('\nParticipants details')
    if (category === undefined) {
        for (const key in eventJson['registrations']) {
            print(key, eventJson)
            
        }
    }
    else {
        for (const key in eventJson['registrations']) {
            if (category === eventJson['registrations'][key]['category']) {
                print(key, eventJson)

            }
        }
        console.log(`
    -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-

      No category found with name '${category}' ❌
    
    -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
    `);

    }

}

function print(key, object) {
    let obj = object['registrations'][key];
    console.log(`
Id       -> ${obj['id']}
Name     -> ${obj['name']}
Category -> ${obj['category']}
Course   -> ${obj['course']}
type     -> ${obj['type']}
`)
}


module.exports = {
    register,
    cancel,
    list
}