#include<iostream>

using namespace std ;

class node{
public:

    int data;
    node* next;

};
// Function for adding elements in the beginning of the linked list
void begg(node** head,node** tail)
{
    int no,i;
     cout<<"Enter the number of nodes you want to add at the beginning => ";
    cin>>no;
    cout<<endl<<endl;

    cout<<"Enter the data into the nodes "<<endl;
    for(i=0;i<no;i++)
    {
    node* new_node=new node;

        cout<<"Enter node -> ";
        cin>>new_node->data;
        cout<<endl;
        new_node->next=NULL;

        if(*head==NULL)
        {
             *head=new_node;
             *tail=new_node;

        }
        else
        {
            new_node->next=*head;
            *head=new_node;
        }
    }

}

//function for adding elements in the end of the linked list
void last(node **tail,node** head, int no)
{

    int i;

      for(i=0;i<no;i++)
      {
          node* new_node=new node();

         cout<<"Enter data -> ";
         cin>>new_node->data;

         new_node->next=NULL;

         if(*tail==NULL)
         {
             *head=new_node;
             *tail=new_node;
         }


         (**tail).next=new_node;

         *tail=new_node;

      }




    }

//function for adding elements in the list at the giving location

void locc(node **head,int loc)
 {
    node* temp=*head,
    *prev=NULL,*new_node=NULL;


    if(loc==1)
    {
       new_node->next=*head;
       *head=new_node; 
    }

    else
    {
    for(int i = 0;i<loc-1;i++)
    {
        prev=temp;
        temp=temp->next;
    }
    }

    cout<<"Enter the data into the nodes "<<endl;


        new_node=new node(); 


        cout<<"Enter data -> ";
        cin>>new_node->data;

        prev->next=new_node;

        new_node->next = temp;



}                                                                                                                                            



// function for displaying the linked list
void print(node* head)
   {
       int i=1;
       node* temp=head;

       cout<<"---Data in the linked list--- "<<endl;

       while(temp->next!= NULL)
       {
           cout<<"Node ["<<i<<"] -> "<<temp->data<<endl;
           temp=temp->next;
           i++;
       }
   }


//searching function
    void sea(node** head, int no)
    {
        node* temp=NULL;
        temp=*head;
        int flag=1,i=0;

        while(flag)
        {
            if(temp->data==no)
            {
                i++;
               cout<<"Elememt is present at the "<<i<<"Position"<<endl;
            
               flag=0;
            }
            i++;
            temp=temp->next;
        }
    }

    void delete_start(node** head)
    {
        node *temp=NULL;
        temp=*head;

         temp=temp->next;
        *head=temp->next;
         temp=temp->next;
         delete temp;
    }

int main()
{
   node* head=NULL,*tail=NULL;
   int no,n,i,loc;
   char ch;


   do
   {
   cout<<"---program to create linked list---"<<endl;
   cout<<"Enter 1 for Inserting node at the first "<<
   endl<<"Enter 2 for Inserting node at the end "<<
   endl<<"Enter 3 for inserting node at the desired location "<<
   endl<<"Enter 4 for searching element "<<
   endl<<"Enter 5 For deleting an element from start"<<
   endl<<" => ";
   cin>>n;
   cout<<endl;

   switch(n)
   {
   // Switch case for adding elements in the beginning of the linked list
   case 1:
   begg(&head,&tail);
   print(head);

   cout<<endl<<"Do you want to continue ? press y/Y => ";
   cin>>ch;

   cout<<endl;
   break;

   // Switch case for adding elements in the end of the linked list
   case 2:

   cout<<"Enter the number of nodes you want add at the end of the linked list "<<endl;
   cin>>no;


       last(&tail,&head,no);
       print(head);

   cout<<endl<<"Do you want to continue ? press y/Y => ";
   cin>>ch;

   cout<<endl;
   break;

   case 3:
       cout<<"Enter the location where you want to add the element ->  ";
       cin>>loc;



       locc(&head,loc);
       print(head);

    break;

    case 4:

    cout<<"Enter the element to search"<<endl;
    cin>>no;

     sea(&head,no);
     break;


    case 5:

    delete_start(&head);
    print(head);

    break;
    default :
    cout<<" Wrong input choose again  "<<endl<<endl;
    ch='y';


   }
}while(ch=='y'||ch=='Y');
}
