import 'dart:io';

void main() {
  bool check=false;
  int number, choice, i;
  List<int> listOfNumbers = [];


 while(check==false)
 {
    try {
   enterDetail: print('Enter the Number of Integers you want to add');
  number = int.parse(
    stdin.readLineSync(),
  );

  for (i = 0; i < number; i++) {
    int value = int.parse(stdin.readLineSync());
    listOfNumbers.add(value);
  }
  } catch(e) {

    print('Not a valid Input! Please Enter Again');
    check=true;
    
  } finally
  {
    check==true?check=false:check=true;
  }
 }

  while (true) {
    print('\nPress 1 for finding Square ');
    print('Press 2 for finding Cubes ');
    print('Press 3 for exit the program');
    choice = int.parse(stdin.readLineSync());

    switch (choice) {
      case 1:
        var square = listOfNumbers.map((number) => number * number);

        for (i = 0; i < number; i++) {
          print('Square of ${listOfNumbers[i]} - ${square.elementAt(i)}');
        }
        break;

      case 2:
      var cube = listOfNumbers.map((number) => number * number * number);

      for (i = 0; i < number; i++) {
          print('Cube of ${listOfNumbers[i]} - ${cube.elementAt(i)}');
        }
        break;

      case 3:
      exit(1);
      break;

      default:
      print('Wrong Input');
      break;
    }
  }
}
