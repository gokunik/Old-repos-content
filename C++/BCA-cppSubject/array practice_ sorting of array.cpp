#include<iostream>
using namespace std;

int main()
{
    int arr[100],i,n,j,temp;

cout<<"Enter the Size of aray"<<endl;
cin>>n;
    cout<<"Enter the array elements "<<endl;
    for(i=0;i<n;i++)
    {
        cin>>arr[i];
    }

    for(i=0;i<n;i++)
    {
        for(j=i+1;j<n;j++)
        {
            if(arr[i]>=arr[j])
            {
            temp=arr[i];
            arr[i]=arr[j];
            arr[j]=temp;
            }
        }
    }

    cout<<"Sorted Array "<<endl;

    for(i=0;i<n;i++)
    {
        cout<<arr[i]<<" ";
    }

}
