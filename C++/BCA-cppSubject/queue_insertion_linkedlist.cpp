#include<iostream>
#include<stdlib.h>

using namespace std;

class queue
{
    int data;
    queue* next,*prev;
};

    void insert(queue** , queue**);
    void del(queue** , queue**);


int main()
{
    queue *front=NULL,*tail=NULL;
    int choice;

    cout<<"         *********** Menu **********"<<endl;
    cout<<"* Press 1 for inserting elements in the queue "<<endl
        <<"* Press 2 for deleting element from the queue "<<endl;
    cin>>choice;

    switch (choice)
    {
    case 1:
        insert(&front,&tail);
        break;

    case 2:
        del(&front,&tail);

    break;

    case 3:
    exit(1);
    break;
 
    default:
    cout<<"Wrong input"<<endl;
        break;
    }   

}

void insert(queue** head, queue** tail)
{
  
}