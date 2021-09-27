#include<iostream>
#include<stdlib.h>

using namespace std;

class node
{
    public:
    int data;
    node* next,*prev;
};

void insert(node** head, node** tail)
{
    node* new_node=NULL;
    int i,no;

    cout<<"Enter the number of nodes "<<endl;
    cin>>no;
    for(i=0;i<no;i++)
    {
        new_node=new node();

        cout<<"Enter the node data -> "<<endl;
        cin>>new_node->data;
        new_node->next=NULL;
        new_node->prev=NULL;

        if(*head==NULL)
        {
            *head=new_node;
            *tail=new_node;
        }
        else
        {
            (**tail).next=new_node;
            new_node->prev=*tail;
            *tail=new_node;
        }
        
    }
}
void end(node** head ,node** tail)
{
    node* temp=NULL;

    if(*head==NULL)
    {
        cout<<"List empty"<<endl;
    }
    else
    {
        if((**head).next==NULL)
        {
            temp=*tail;
            *tail=*head=NULL;

            cout<<"Node Deleted."<<temp->data<<" No more Nodes Avaiable in list "<<endl;
            
            delete temp;
        }

        else
        {
            temp=(**tail).prev;
            temp->next=NULL;
            cout<<"Node Deleted -> "<<(**tail).data<<endl;
            delete (**tail).next;
            *tail=temp;



        }
        






        
    }
    
}

void display(node* head)
{
    node* temp=NULL; 
        temp=head; 
        int i=0;

        if(head==NULL)
        {
            cout<<"List Empty"<<endl;
        }
        else
        {
            while (temp!=NULL)
        {
            ++i;
            cout<<"Node ["<<i<<"] -> "<<temp->data<<endl;
           
            temp=temp->next;

        }

        }
        

}

int main()
{
    node* head=NULL,*tail=NULL;
    int choice;

  while (1)
  {
      cout<<endl<<"******** Doubly Linked List***********"<<endl;
    cout<<"* Press 1 for Inserting at the Node "<<endl
        <<"* Press 2 For Deleting the node "<<endl
        <<"* Press 3 for Display the list"<<endl
        <<"*Press 4 For Exit"<<endl;
    cin>>choice;

    switch (choice)
    {
    case 1:
    insert(&head,&tail);
        break;
    case 2:
    end(&head,&tail);
    break;

    case 3:
    display(head);
    break;

    case 4:
    exit(1);
    break;
    default:

    cout<<"Wrong Input "<<endl;
        break;
    }
}
  
    
    
}
