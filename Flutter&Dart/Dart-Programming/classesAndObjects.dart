void main()
{
  var student1 = student('Nitesh Khatri', regNo: 15246789); 
  //object can be declared as ( var student ) as well as using class name - student student1

  print('Name of Student one - ${student1.name}'
  'Regisration - ${student1.regNo}\n');

  var student2 = student.myConstructor('Deepak', 14235645);

  print('Name of Student one - ${student2.name}'
  'Regisration - ${student2.regNo}\n');
}

class student
{
  String name;
  int regNo;

  student(String name,{int regNo}) 
  {
    this.name = name;
    this.regNo =regNo;
  }

  student.myConstructor(this.name,this.regNo);  // Named Constructor


}