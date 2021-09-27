//Example of Named Function

void main() {
  namedFunction({'Name':'Nitesh','Registration':'11332244'},User2 : {'Name':'Deepak','Registration':'24524553'});
  namedFunction2('Nitesh', 11223344,rollNo: 1,age: 20);
  namedFunction2('Deepak', 24524553);  // rollNo and age Will be NULL As no value is passed 
  
}

void namedFunction(Map<String,String> User1,{Map<String,String> User2 } ){

    print('User 1 Is - $User1');
    print('User 2 Is - $User2\n');
    

}

void namedFunction2(String name, int regNo,{int age, int rollNo})
{
  
    print('Name    - $name');
    print('RegNo   - $regNo');
    print('Age     - $age');
    print('RollNo  - $rollNo\n\n');
}