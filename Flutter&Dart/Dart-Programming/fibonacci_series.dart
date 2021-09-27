import 'dart:io';



void main() {
  int number;

  print('Enter the number to find the nth term in fibonacci');
  number =int.parse(stdin.readLineSync());

  print('$number nth term in fibonacci series is - ${fib(number)}');
 
  }
  

int fib(int n)
{
  if(n<=1)
  {
    return n;
  }
  else {
    return fib(n-1) + fib(n-2);
  }
}
