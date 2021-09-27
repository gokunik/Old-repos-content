#include <iostream>
using namespace std;
int main()
{
  int n, i,j,arr[100],k=0,p=0;
  bool isPrime = true;

  cout << "Enter Total number of inputs -> ";
  cin >> n;

  cout<<endl<<"Enter the numbers -> "<<endl;

  for(j=0;j<n;j++)
  {
   cin>>arr[j];
  }

  for(j=0;j<n;j++)
  {
   cout<<arr[j]<<" ";
  }


  for(j=0;j<n;j++)
  {
     p=0;
    for(i=1; i <=arr[j]; i++)
        {

        if(arr[j]%i==0)
        {
            p=p+1;
        }

        }

        for(i = 2; i <= p; i++)
  {

      if(p % i == 0)
      {
          k++;
      }
  }




    if(k<=2)
  {
      cout << "Yes" <<endl;
  }
  else
  {
      cout << "No"<<endl;
  }
    }
    return 0;

   }










