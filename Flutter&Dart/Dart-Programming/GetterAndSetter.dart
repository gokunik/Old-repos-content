//program for finding square and cubes using getter and setter


import 'dart:io';

void main() {
  var number = math();
  int no; // reference variable of the class  
  print('Find The and Square cube of the entered number using getter and setter ');
  no = int.parse(stdin.readLineSync());

  number.square = no;
  print('\nSquare of the number is ${number.square}');
  number.cube=no;
  print('Cube of the number is ${number.cube}');

}

class math
{
  int _number;
  set square (int no)
  {
    _number=no*no;

  }

  int get square {
    
    return _number;
  }
  
  set cube (int no) => _number= no*no*no;

  int get cube => _number;
  
}