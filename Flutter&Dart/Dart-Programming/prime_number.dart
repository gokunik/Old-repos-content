import 'dart:io';

void main()
{
  int number, i,count=0;
  
  print('Enter the  number to check whether it is prime or not');
  number = int.parse(stdin.readLineSync()); // converting string numerial into int 

  for(i=1;i<=number;i++)
  {
    if(number%i==0)
    {
      count ++;

    }
  }

  if(count==2)
  {
    print('$number is prime number');
  }
  else
  {
    print('$number is not a prime number');
  }
}