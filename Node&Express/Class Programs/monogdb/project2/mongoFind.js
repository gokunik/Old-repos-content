const { MongoClient, ObjectID } = require('mongodb');

MongoClient.connect('mongodb://localhost:27017/test', (err, client) => {
    if (err) {
        return console.log('Unable to connect the mongoDB server');
    }
    
    var db = client.db('mydb');
    db.collection('mydb').find()
    .toArray()
    .then((docs) => {
        console.log(JSON.stringify(docs, undefined, 2));
    }), (err) => {
            console.log('Unable to fetch the data', err);
        }

    
})

// MongoClient.connect('mongodb://localhost', function (err, client) {
//     if (err) throw err;

//     var db = client.db('mydb');

//     db.collection('mydb').find({}, function (findErr, result) {
//         if (findErr) throw findErr;
//         console.log(result);
//         client.close();
//     });
// });