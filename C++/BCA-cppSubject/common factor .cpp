#include<iostream>

using namespace std;


int main()
{
    unsigned long long int no1,no2,i,c=0;
    cin>>no1>>no2;


    for(i=1;i<=no1;i++)
    {
         if(no2%i==0)
        {
            if(no1%i==0)
            {
                c++;
            }
        }
    }

    cout<<endl<<"No. 1 "<<no1;
    cout<<endl<<"No. 2 "<<no2;
    cout<<endl<<"Number of Common factors =>  "<<c<<endl;
}
