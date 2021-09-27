import 'dart:io';
import 'dart:core';

void main(){

  String string1;
string1 = """
 My name is'
 Nitesh Khatri
 Demo text
  """;
  
  //example of multiple line string
  print('The result is ${string1} ' );
  
  var demo1 = 'demo text';
  var demo2 = 123;
  var demo3 = 23.5;

  //Printing the type of the variable
  print('Type is  -  ${demo1.runtimeType}');
  print('Type is - ${demo2.runtimeType}');
  print(demo3.runtimeType);

  //example of dynamic variable type 
  dynamic demoVariable = 'Demo text ';
  var type = demoVariable.runtimeType;

  print(demoVariable + 'Type of the varible is - $type');

  demoVariable = 1234;
  type = demoVariable.runtimeType;
  print('result is  $demoVariable Type is  $type');

 // example of final and const keywords
 const int number  = 123; // can assigned value only onces 
 final String name = stdin.readLineSync(); // can take user value only onces

 
 print(number);
 print(name);

 int no1 = 10;
 int no2 = 7;

 print(no1/no2);
 print(no1~/no2);

// check the type of the variable 

var testVariable ;
testVariable = stdin.readLineSync();
  
print('interger ? ' + testVariable is int);


}
