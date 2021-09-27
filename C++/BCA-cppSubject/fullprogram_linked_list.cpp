
#include<iostream>
#include<stdlib.h>

using namespace std;

class node{

    public :

    int data;
    node *next;

};
//******************************************************************************************************************************//
//************************* All the Function in the below Section is realted to Node Insertion *********************************//
//******************************************************************************************************************************//

//Function for Displaying the linked list
    void display(node* head,int size)
    {
        node* temp=NULL; // Temporary variable to store head address
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

        cout<<endl<<"Current Size -> "<<size<<endl<<endl;//display the current size of the linked list

    }//end of the function

//function to add node in the front of the linked list
    void front(node** head, node** tail, int *size)
     {
        node *new_node=NULL;
        int no,i;
        char ch;

    cout<<"Enter the number of nodes you want to add in the front -> ";
    cin>>no;
    cout<<endl;

    //Loop will continue till the number of node entered by the user 
    for(i=0;i<no;i++)
    {
        new_node= new node(); //memeory allocation
        cout<<"Enter Node Data -> ";
        cin>>new_node->data;
        new_node->next=NULL;
        cout<<endl;

        //if enterd node is the first node of the linked list 
        if(*head==NULL)
        {
            *head=new_node;
            *tail=new_node;
            (*size)++; //current size of the linked list will be increased by 1
        }

        //if linked list already have some node available
        else
        {
            new_node->next=*head;
            *head=new_node;
            (*size)++;
        }
    }

    cout<<no<<" Nodes Added to the linked list"<<endl<<endl;
    cout<<"Do You Want To Display The List ? Press y or Y -> ";
    cin>>ch;
    cout<<endl;

    if(ch=='y'||ch=='Y')
    {
        
        display(*head,*size);
        return;
    }
    else
    {   
        //return to main function
        return;
    }

} //End of the function

//******************************************************************************************************************************//
//Function for inserting Node at the end of the linked list
    void last(node** head , node** tail, int *size)
    {
        node * new_node=NULL;
        int no,i;
        char ch;

        cout<<"Enter the number of nodes you want to add in the End of list -> ";
        cin>>no;
        cout<<endl;

         for(i=0;i<no;i++)
        {
            new_node= new node();
            cout<<"Enter Node Data -> ";
            cin>>new_node->data;
            new_node->next=NULL;
            cout<<endl;

            // if the entered node is the first node of the list
            if(*head==NULL)
            {
                *head=new_node;
                *tail=new_node;
                (*size)++;
            }
            //if list already have some nodes
            else
            {
                (**tail).next=new_node;
                *tail=new_node;
                (*size)++;
            }

        }

        cout<<no<<" Nodes Added to the linked list"<<endl<<endl;
        cout<<"Do You Want To Display The List ? Press y or Y -> ";
        cin>>ch;
        cout<<endl;

        if(ch=='y'||ch=='Y')
        {
        display(*head,*size); 
            return;
        }
        else
        {
            return;
        }

    }//end of the function

//******************************************************************************************************************************//
//function for inserting values in the linked list at given nth position
    void nth(node** head, node** tail,int * size)
    {
        node* new_node=NULL,
        *temp=*head,
        *prev=NULL; 

        int location,i;
        char ch;

        cout<<"Enter the Location to insert the Node -> ";
        cin>>location;
        cout<<endl;
        
        //Cheching whether the enterd location is present in the linked or its out of linked list range
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

            cout<<endl;
            
            //if the entered location is 1, then head pointer need to be updated and should point new node
            if(location==1)
            {
                new_node->next=*head;
                *head=new_node;
                (*size)++;
            }

            else
            {
                //loop for reaching to the entered location in the linked list
                for ( i = 0; i < location-1; i++)
                   {
                    prev=temp;//it will store the node previous to the entered location
                    temp=temp->next;
                 }

                //If Entered loation is the last position of the linked list
                //*tail pointer need to point the new node
                if(temp==(*tail))
                 {
                     temp->next=new_node;
                     *tail=new_node;
                     (*size)++;

                 }
                 else
                 {
                     prev->next=new_node;
                     new_node->next=temp;
                     (*size)++;
                 }
            }
        }

        cout<<"Do You Want To Display The List ? Press y or Y -> ";
        cin>>ch;
        cout<<endl;

        if(ch=='y'||ch=='Y')
        {
        display(*head,*size); 
            return;
        }
        else
        {
            return;
        }
    }//End of the function
//******************************************************************************************************************************//
//******************************************** End Of the Insertion Section ****************************************************//
//******************************************************************************************************************************//


//******************************************************************************************************************************//
//************************* All the Function in the below Section is realted to Node Deletion **********************************//
//******************************************************************************************************************************//

//Function for deleting Element from the front of the linked list
    void del_front(node** head, node** tail,int *size)
    {
        node* temp=NULL;
        int no,i;
        char ch;

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
            {   //checking Whether the node is last node
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
                    (*size)--;

                    cout<<"Node Deleted From the Linked list "<<endl
                    <<"Deleted Node -> "<<temp->data<<endl<<endl;

                    delete temp;

                    
                }    
            }
    }//End of for loop

    cout<<"Do You Want To Display The List ? Press y or Y -> ";
                    cin>>ch;
                    cout<<endl;

                    if(ch=='y'||ch=='Y')
                    {
                        display(*head,*size);
                        return;
                    }
                    else
                    {
                        return;
                    }
 }
        

        
}//End of the Function

//**********************************************************************************************************************************//
//Function for Deleting node from the last 
    void del_last(node** head, node** tail,int *size)
    {
        node* temp=*head,*prev=NULL;
        int i;

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
                for(i=0;i<(*size)-1;i++)
                {
                    prev=temp;
                    temp=temp->next;
                }
                prev->next=NULL;
                *tail=prev;

                   cout<<"Node Deleted From the Linked list "<<endl
                    <<"Deleted Node -> "<<temp->data<<endl<<endl;

                (*size)--;
                delete temp;
                
            }
            
        }
        
    }//end of the function 
//**********************************************************************************************************************************//
//function for deleting node from the nth position
    void del_nth(node** head, node** tail,int *size)
    {
        node* prev=NULL,*temp=*head;
        int loc,i;
        
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
                        prev=temp;
                        temp=temp->next;
                        }

                        prev->next=temp->next;
                        (*size)--;

                        cout<<"Nth Node Deleted From the Linked list "<<endl
                        <<"Deleted Node -> "<<temp->data<<endl<<endl;
                        delete temp;


               }
                   
            }
            
        }//end of else
    }//end of the function

//******************************************************************************************************************************//
//********************************************* End Of the Deletion Section ****************************************************//
//******************************************************************************************************************************//


//******************************************************************************************************************************//
//****************************************** Function for Searching in the list ***********************************************//
//******************************************************************************************************************************//


//function for searching element in the linked list 
    void find(node *head,int size)
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
                }
                else
                {
                    temp=temp->next;

                }   
            }   
        }//end of while loop
        }
        

        
    }//End of the Function

//********************************************* End Of the Section ************************************************************//

//******************************************************************************************************************************//
//************************************************** Main Function *************************************************************//
//******************************************************************************************************************************//
int main()
{
 node *head=NULL,*tail=NULL;//pionters for storing the first and last node address
 int choice,no;
 int size=0;
 char ch,cm;

    do
    {

     cout<<"********** Menu **********"<<endl
     <<"* Press 1 For Inserting node"<<endl
     <<"* Press 2 For Deleting the Node"<<endl
     <<"* press 3 For Search or Display of Node"<<endl
     <<"* Press 4 For Exit "<<endl;
     cin>>choice; cout<<endl;



     switch (choice)
     {
//**************************************************** Case 1 for Inserion ****************************************************//
        case 1:

                do
                {
                cout<<"********** Insert Menu  **********"<<endl
                <<"* Press 1 For Inserting at the front"<<endl
                <<"* Press 2 For Inserting at the End"<<endl
                <<"* Press 3 For Inserting at the nth Position"<<endl
                <<"* Press 4 For Previous Menu"<<endl;
                cin>>no; cout<<endl;

                switch (no)
                {

                case 1:

                front(&head,&tail,&size);

                    break;

                case 2:
                    last(&head,&tail,&size);

                    break;

                case 3:
                    nth(&head,&tail,&size);

                    break;

                case 4:
                    // program will go out of the switch;
                    cm='n';
                break;

                default:
                    cout<<"Wrong Input"<<endl;
                    cm='y';
                    break;
                }

                if(cm!='n')
                {
                    cm='y';
                }
                    
                } while (cm=='y'||cm=='Y');

                ch='y';

                break;

//***************************************************Case 2 for Deletion**************************************************************//
        case 2:
            do
            {
                cout<<"********* Deletion Menu  *********"<<endl
                <<"* Press 1 For Deleting From the front"<<endl
                <<"* Press 2 For Deleting From the Last "<<endl
                <<"* Press 3 For Deleting From the nth Position"<<endl
                <<"* Press 4 For Previous Menu"<<endl;
                cin>>no; cout<<endl; 

                switch (no)
                {
                case 1:
                    del_front(&head,&tail,&size);

                break;

                case 2:
                  del_last(&head,&tail,&size);
                break;

                case 3:
                  del_nth(&head,&tail,&size);
                break;

                case 4:
                    // program will go out of the switch;
                    cm='n';
                break;

                default:
                    cout<<"Wrong Input"<<endl;
                    cm='y';
                    break;
                }

                 if(cm!='n')
                {
                    cm='y';
                }
                

            } while (cm=='y'||cm=='Y');  

            ch='y';

        break;

//******************************************* case 3 For Searching and displaying *********************************************//

        case 3:

        cout<<"* Press 1 for Displaying the list "<<endl
        <<"* Press 2 for Searching value in the list"<<endl;
        cin>>no;

        switch (no)
        {
        case 1:
            display(head,size);
            break;

        case 2:
            
            find(head,size);
        break;
        
        default:
            cout<<"Wrong Input"<<endl;
            break;
        }
            ch='y';

        break;
//****************************** ****************** case 4 to exit the program ****************************************************//
        case 4:
            exit(1);
        break;


     default:
        cout<<"Wrong input Entered"<<endl;
        ch='y';
         break;
     }

    } while (ch=='y'||ch=='y');

}

