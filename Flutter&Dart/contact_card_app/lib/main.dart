import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: SafeArea(
        child: Scaffold(
          backgroundColor: Colors.teal,
          body: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              CircleAvatar(
                radius: 60,
                backgroundImage: AssetImage('images/nitesh1.jpg'),
              ),
              Text(
                'Nitesh Khatri',
                style: TextStyle(
                  color: Colors.white,
                  fontSize: 40.0,
                  fontFamily: 'Pacifico',
                  fontWeight: FontWeight.bold,
                ),
              ),
              Text(
                'Flutter Developer',
                style: TextStyle(
                  color: Colors.white,
                  fontSize: 20.0,
                  letterSpacing: 6,
                  fontWeight: FontWeight.bold,
                ),
              ),
              SizedBox(
                height: 20,
                width: 150,
                child:
                Divider(
                  color: Colors.white,
                  thickness: 2,

                )
              ),
              Card(
                margin: EdgeInsets.symmetric(horizontal: 20, vertical: 20),
                child: ListTile(
                    leading: Icon(
                      Icons.phone,
                      color: Colors.teal[800],
                      size: 30,
                    ),
                    title: Text(
                      '+91 29 39 495 989',
                      style: TextStyle(
                        color: Colors.teal[900],
                        fontSize: 18,
                        fontWeight: FontWeight.bold,
                      ),
                    )),
              ),
              Card(
                margin: EdgeInsets.symmetric(horizontal: 20),
                child: ListTile(
                    leading: Icon(
                      Icons.email,
                      color: Colors.teal[800],
                      size: 30,
                    ),
                    title: Text(
                      'niteshkhatri@gmail.com',
                      style: TextStyle(
                        color: Colors.teal[900],
                        fontSize: 18,
                        fontWeight: FontWeight.bold,
                      ),
                    )),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
