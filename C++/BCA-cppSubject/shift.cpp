#include<iostream>

using namespace std;

int main()
{
    int n,d,temp=0,m=0,i;
    cin>>n>>d;
    int arr[n];

    for(i=0;1<n;i++)
    {
        cin>>arr[i]; cout<<" ";
    }

    while(m<d)
    {
        temp=arr[0];

        for(i=0;1<n;i++)
    {
        arr[i]=arr[i+1];
    }

        arr[n-1]=temp;

    }

    for(i=0;1<n;i++)
    {
        cout<<arr[i]<<" ";
    }


    
}

