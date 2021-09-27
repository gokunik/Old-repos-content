import 'dart:io';



void main() {

  List<String> name = [
    'Nitesh Khatri',
    'Deepak Khatri',
    'Mannu ',
    'Raman',
    'Ajit'
  ];
  int choice, number;

  while (true) {
    print('\nPress 1 for printing the existing list ');
    print('Press 2 for adding more values to the list');
    print('Press 3 for removing elements from the list');
    print('Press 4 for Finding the lenght of the  list');
    print('Press 5 for finding element in the list');
    print('Press 6 for Sorting Of the List ');
    print('Press 7 for exiting the program');
    choice = int.parse(stdin.readLineSync());
    print('');

    switch (choice) {
      case 1:
        name.forEach(print);
        break;

      case 2:
        print('Enter New Value');
        name.add(stdin.readLineSync());
        print('Value Added');
        break;

      case 3:
        print('Press 1 for Remove at the index ');
        print('Press 2 for deleting all the elements');
        choice = int.parse(stdin.readLineSync());

        switch (choice) {
          case 1:
            if (name.isNotEmpty == true) {
              print('Enter the index number');
              number = int.parse(stdin.readLineSync());
              name.removeAt(number);
              print('Element Deleted');
            } else {
              print('List is Empty Cannot Delete anything');
            }
            break;

          case 2:
            if (name.isNotEmpty == true) {
              name.clear();
              print('All Element deleted ');
            } else {
              print('List is already Empty');
            }
            break;

          default:
            print('Wrong Input Enter Again');
            break;
        }
        break;

      case 4:
        print('Lenght of the list is ${name.length}');
        break;

      case 5:
        String find;
        int indexNumber;
        print('Enter the String to find ');
        find = stdin.readLineSync();

        indexNumber = name.indexOf(find);

        if (indexNumber >= 0) {
          print('$find is available in the list at Index $indexNumber');
        } else {
          print('Element Not Present In the List');
        }
        break;

      case 6:
        name.sort();
        print('List is sorted');
        break;

      case 7:
        exit(1);
        break;

      default:
        print('Wrong Input Please Enter Again');
        break;
    }
  }
}
