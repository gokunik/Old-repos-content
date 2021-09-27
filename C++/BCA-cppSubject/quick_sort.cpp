#include<iostream>

using namespace std;

void quick(int [],int ,int);
int par(int [],int ,int );

int main()
{
    int arr[100],high,i;

    cout<<"Enter the no of array elements"<<endl;
    cin>>high;

    for(i=0;i<high;i++)
    {
        cin>>arr[i];
    }

    quick(arr,0,high-1);

    cout<<"Sorted array"<<endl;
     for(i=0;i<high;i++)
    {
        cout<<arr[i]<<endl;
    }
}

 void quick(int arr[],int low,int high)
{
    int j;
    if(low<high)
    {
        j=par(arr,low,high);
        quick(arr,low,j-1);
        quick(arr,j+1,high);

    }
}

int par(int arr[], int low ,int high)
{
    int pivot,i,j,temp;
    pivot=arr[low];
    i=low;
    j=high+1;

    do
    {
        do
        {
            i++;
        } while (arr[i]<=pivot);
        
        do
        {
            j--;
        } while (arr[j]>pivot);

    if(i<j)
    {
        temp=arr[i];
        arr[i]=arr[j];
        arr[j]=temp;
    }
        
    } while (i<j);

    arr[low]=arr[j];
    arr[j]=pivot;


     for(i=0;i<high;i++)
    {
        cout<<arr[i]<<" ";
    }
    cout<<endl;

    return (j);
    
}
