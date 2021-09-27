#include<iostream>
using namespace std;

int main()
{
    int arr[100],i,j,n,no,temp,temp1,temp2;

    cout<<"Enter the number of array elements you want-> "<<endl;
    cin>>n;
    cout<<endl;

    cout<<"Enter array elements -> "<<endl;

    for(i=0;i<n;i++)
    {
        cin>>arr[i];
    }

    for(i=0;i<n;i++)
    {
        for(j=i+1;j<n;j++)
        {
            if(arr[i]>arr[j])
            {
                temp=arr[j];
                arr[j]=arr[i];
                arr[i]=temp;
            }
        }
    }
    cout<<"Sorted array -> "<<endl;
    for(i=0;i<n;i++)
    {
        cout<<arr[i]<<" ";
    }

    cout<<endl<<"Enter the Element you want to insert -> ";
    cin>>no;

    cout<<endl;

    for(i=0;i<n;i++)
    {
        if(arr[i]==no)
        {
            cout<<endl<<"Number already present in the array at "<<i<<" index of the array "<<endl;
             cout<<"Sorted array -> "<<endl;
                for(i=0;i<n;i++)
                {
                    cout<<arr[i]<<" ";
                }


        }


    }


    if(no>arr[n-1])
    {
        arr[n]=no;
    }

        arr[n]=no;
       for(i=0;i<=n;i++)
    {
        for(j=i+1;j<=n;j++)
        {
            if(arr[i]>arr[j])
            {
                temp=arr[j];
                arr[j]=arr[i];
                arr[i]=temp;
            }
        }
    }

cout<<"Sorted array -> "<<endl;
    for(i=0;i<=n;i++)
    {
        cout<<arr[i]<<" ";
    }

    }





















