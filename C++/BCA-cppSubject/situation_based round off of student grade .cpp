#include<iostream>

using namespace std;

int main()
{
    int arr[10],no,i,n,temp;

    cout<<"Enter the Number Of Students -> ";
    cin>>no;
    cout<<endl;

    cout<<"Enter the marks of student ->"<<endl;

    for(i=0;i<no;i++)
    {
        cin>>arr[i];
    }

    cout<<"--Marks Entered into the array --"<<endl;
    for(i=0;i<no;i++)
    {
        cout<<arr[i]<<endl;
    }


    cout<<endl<<"Marks Of Student After rounding off --> "<<endl;
    for(i=0;i<no;i++)
    {
        temp=arr[i];

        if(temp>37)
        {
        n=temp%5;
        n=5-n;
        if(n<3)
        {
            arr[i]=arr[i]+n;
        }
        cout<<endl<<"Student Have Cleared The Exam -> "<<arr[i]<<endl;
        }

        else
        {
            cout<<endl<<"Student Have Failed The Exam -->"<<arr[i];
        }


    }



}
