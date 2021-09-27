/* All Possible operation on linked list 
1) Node insertion  i) beginning 
                   ii) at nth position 
                   iii) last

2) Node Deletion   i) beginning 
                   ii) by location or search and delete 
                   iii) last

3) searching

4) display     
                  
*/

#include<iostream>
#include<stdlib.h>
using namespace std;

class node
{
    public:
    int data;
    node *next,*prev;

};

void insertion(node** head,node** tail, int *size)
{
  node *temp=NULL,*new_node=NULL;
  int choice,no,i;
  
  cout<<endl;
  cout<<" Press 1 for Inserting at the beginning of the list "<<endl
      <<" press 2 for Inserting at the nth position "<<endl
      <<" press 3 for Inserting at the end of the list"<<endl;
      cin>>choice;
      cout<<endl;

      switch (choice)
      {
      case 1:
      cout<<"Enter the Number Of Nodes You Want to Add"<<endl;
      cin>>no;

      for(i=0;i<no;i++)
      {
          new_node=new node();

          cout<<"Enter Node Data - ";
          cin>>new_node->data;
          new_node->next=NULL;
          new_node->prev=NULL;
        
        if(*head==NULL)
        {
            *head=new_node;
            *tail=new_node;
            (*size)++;
        }
        else
        {
            new_node->next=*head;
            (**head).prev=new_node;
            *head=new_node;
            (*size)++;
        }
        

      }
          break;

      case 2:
          
           temp=(*head);
           int location,i;
        

        cout<<"Enter the Location to insert the Node -> ";
        cin>>location;
        cout<<endl;
        
       
        if((location)>(*size)||(location<1))
        {
            if(location<1)
            cout<<"Location Should be Greater then 0"<<endl;

            else
            cout<<"Entered Location Out of linked list range"<<endl;
        }

        
        else
        {
            new_node=new node();

            cout<<"Enter the node data -> ";
            cin>>new_node->data;
            new_node->next=NULL;
            new_node->prev=NULL;

            cout<<endl;
            
            
            if(location==1)
            {
                new_node->next=*head;
                (**head).prev=new_node;
                *head=new_node;
                (*size)++;
            }

            else
            {
                
                for ( i = 1; i < location-1; i++)
                   {
                    temp=temp->next;
                   }

                
                if(temp==(*tail))
                 {
                     temp->next=new_node;
                     new_node->prev=(*tail);
                     *tail=new_node;
                     (*size)++;

                 }
                 else
                 {
                     new_node->next=temp->next;
                     new_node->prev=temp;
                     temp->next=new_node;
                     (*size)++;
                 }
            }
        }

        cout<<"Node Inserted "<<endl;
      break;

      case 3:
           
        cout<<"Enter the number of nodes you want to add in the End of list -> ";
        cin>>no;
        cout<<endl;

         for(i=0;i<no;i++)
        {
            new_node= new node();
            cout<<"Enter Node Data -> ";
            cin>>new_node->data;
            new_node->next=NULL;
            new_node->prev=NULL;
            cout<<endl;

            
            if(*head==NULL)
            {
                *head=new_node;
                *tail=new_node;
                (*size)++;
            }
            
            else
            {
                (**tail).next=new_node;
                new_node->prev=(*tail);
                *tail=new_node;
                (*size)++;
            }

        }
      break;

      default:
        cout<<" Wrong Input"<<endl;
      break;
      
      }


}

void deletion(node** head,node** tail, int *size)
{
    node *temp=NULL;
    int choice,no,i;
  
  cout<<endl;
  cout<<" Press 1 for deleting from the beginning"<<endl
      <<" press 2 for deleting from the nth position "<<endl
      <<" press 3 for deleting from the end of the list"<<endl;
      cin>>choice;
      cout<<endl;

      switch (choice)
      {
          case 1:
                  cout<<"Enter the number of nodes you want to delete -> ";
        cin>>no;
        cout<<endl;

        if(no>(*size)||(no<1)) 
        {
            if(no<1)
            cout<<"Number Should be Greater then 0"<<endl;

            else
            cout<<"Entered Number Out of linked list range "<<endl
            <<"Current Size Of the List -> "<<*size<<endl;   
        }

        else
        {
            for (i = 0; i < no; i++)
        {
            temp=*head;
            if(*head==NULL)
            {
                cout<<"Linked list Empty "<<endl;
                return;
            }

            else
            {   
                if((**head).next==NULL)
                {
                    *tail=*head=NULL;//reseting tail and head
                    (*size)--;

                    cout<<"Last Node Deleted From the Linked list "<<endl
                    <<"Deleted Node -> "<<temp->data<<endl
                    <<"No More Nodes Available In the Linked list"<<endl<<endl;

                    delete temp;
                    return;
                }

                else
                {    
                    *head=(**head).next;
                    (**head).prev=NULL;
                    (*size)--;

                    cout<<"Node Deleted From the Linked list "<<endl
                    <<"Deleted Node -> "<<temp->data<<endl<<endl;

                    delete temp;

                    
                }    
            }
    }
 }
          break;


          case 2:
        
         int loc,i;
        temp=*head;
        cout<<"Enter the Position where From Where You Want To Delete The Node"<<endl;
        cin>>loc;
        
        if(loc>(*size)||loc<1)
        {
            if(loc<1)
            cout<<"Number Should be Greater then 0"<<endl;

            else
            cout<<"Entered Number Out of linked list range"<<endl; 
        }
        else
        {
            if(*head==NULL)
            {
                cout<<"Linked list Empty"<<endl;
            }
            else
            {
                    if(loc==1)
                {
                    *tail=*head=NULL;//reseting tail and head
                    (*size)--;

                    cout<<"Last Node Deleted From the Linked list "<<endl
                    <<"Deleted Node -> "<<temp->data<<endl
                    <<"No More Nodes Available In the Linked list"<<endl<<endl;

                    delete temp;
                    return;
                }
                else
                {
                      for(i=0;i<loc-1;i++)
                        {
                        
                        temp=temp->next;
                        }

                        temp->prev->next=temp->next;
                        temp->next->prev=temp->prev;
                        (*size)--;

                        cout<<"Nth Node Deleted From the Linked list "<<endl
                        <<"Deleted Node -> "<<temp->data<<endl<<endl;
                        delete temp;


               }
                   
            }
            
        }
          break;

          case 3:
         
          temp=*tail;
          
          if(*head==NULL)
           {
            cout<<"Linked List Empty"<<endl;
           }
         else
           {
             if((**head).next==NULL)
            {
                *tail=*head=NULL;//reseting tail and head
                (*size)--;

                cout<<"Last Node Deleted From the Linked list "<<endl
                <<"Deleted Node -> "<<temp->data<<endl
                <<"No More Nodes Available In the Linked list"<<endl<<endl;

                delete temp;
                return;
            }

            else
            {
                *tail=(**tail).prev;
                (**tail).next=NULL;

                   cout<<"Node Deleted From the Linked list "<<endl
                    <<"Deleted Node -> "<<temp->data<<endl<<endl;

                (*size)--;
                delete temp;
                
            }
            
        }
          break;


          default:
            cout<<"Wrong Input"<<endl;
          break;

      }
}

void search(node* head ,int size)
{
       node* temp=head;    
       int val,i=0,flag=1;

        cout<<"Enter the Value To search -> ";
        cin>>val;
        cout<<endl;

        if(head==NULL)
        {
            cout<<"Linked list is empty "<<endl;
        }
        else
        {
            while (flag)
        {
            ++i;
            if(temp->data==val)
            {
            
                cout<<"Value Is found at ["<<i<<"] Position "<<endl;
                flag=0;
                
            }
            else
            {
                
                if(i>=size)
                {
                    cout<<"value Not Found In the linked list"<<endl;
                    break;
                }
                else
                {
                    temp=temp->next;

                }   
            }   
        }
        }
}


void display(node* head, int size)
{
        node* temp=NULL;
        temp=head; 
        int i=0;//counter to count the number of nodes

        // Loop for traversing the linked list untill its not equals not null 
        while (temp!=NULL)
        {
            ++i;
            cout<<"Node ["<<i<<"] -> "<<temp->data<<endl;
            //After the node is printed , temp is shifted to the next node;
            temp=temp->next;

        }

        cout<<endl<<"Current Size -> "<<size<<endl<<endl;
}
int main()
{
    node *head=NULL,*tail=NULL;
    int choice,size=0;

    while (1)
    {
  cout<<endl<<"-- Program For Doubly Linked List"<<endl;
        cout<<" Press 1 for Insertion "<<endl
            <<" Press 2 for Deletion  "<<endl
            <<" press 3 for Searching "<<endl
            <<" Press 4 for displaying"<<endl
            <<" Press 5 for exiting   "<<endl;
       cin>>choice;

       switch (choice)
       {
       case 1:
           insertion(&head,&tail,&size);
           break;

        case 2:
          deletion(&head,&tail,&size);
           break;

        case 3:
           search(head,size);
           break;

        case 4:
           display(head,size);
           break;

        case 5:
           exit(1);
           break;
       
       default:
       cout<<"Invalid Number try Again "<<endl;
           break;
       }

    } 
}

   



