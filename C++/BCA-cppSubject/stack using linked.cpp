//program to create a stack using linked list
// functionalities of the program ->
// 1. create stack with given size entered by the user
// 2. push and pop elements int the stack
// 3. delete or display the stack elements
// 4. exit the program

#include<iostream>
#include<stdlib.h>

using namespace std;

// class created to hold data and link the to the next node
class node{
    public:
  int data ;
  node* next;

};

// Function for adding elements into the stack

void push(node** top,int *c, int s)
{
    //temporary pointer variable to store the data and the address of the next node
    node * new_node=NULL;
    int n,i;

    //checks whether the stack is over flow or not
    if( *c < s )
    {

            cout<<"Enter the Number of nodes you want to add in the stack "<<endl;
            cin>>n;

         // checks whether the size entered by user + the existing size
         // (Till where the stack is storing the elements ) is not exceeding the limit size of stack
         // means if the entered size by the user is greater than the size left int he stack
        if( (*c+n) <= s)
            
            {

            for(i=1;i<=n;i++)
                {
                    new_node= new node();

                    cout<<"Enter the Data -> ";
                    cin>>new_node->data;
                    new_node->next=NULL;
                    cout<<endl;

                    //if part execute if the entered element is the first element of the stack
                    if(*top==NULL)
                    {
                        *top=new_node;
                         new_node->next=NULL;
                         (*c)++;
                    }

                    //else part will execute if elements are already present in the stack
                    else
                    {

                    new_node->next=*top;
                    *top=new_node;

                    // *c is moved one position next as the new element is added to the stack
                    (*c)++;



                    }
                }

            }

     // else will execute if the entered size is greater than the available size in the stack
     else
            {
                    cout<<"Can not add nodes more then the stack size"<<endl;
                    return;

            }

    }

    //if counter is equals to stack size
    else
    {
        cout<<"Stack overflow"<<endl;
        return;
    }


}

// function displaying the elements of the stack
  void display(node** top,int * c)
  {
      //checking whether stack is empty
      if((*c)==0)
      {
          cout<<"Stack underflow "<<endl;
      }

      // if the stack is not empty
      else
      {

      node* temp=*top;
      int i=0;


      // loop continue until its not equals to null (till the last element of the stack)
      while(temp!=NULL)
      {
          i++;
          cout<<"Node ["<<i<<"] -> "<<temp->data<<endl;

          // shifting temp to the next position
          temp=temp->next;
      }
      }
  }

 //Function for deleting elements from the stack
  void pop(node**top,int *c)
  {
     node* temp=*top;

     //checking whether stack is empty
     if((*c)==0)
     {
         cout<<"Stack underflow "<<endl<<endl;
     }
     // if stack is not empty then else part will execute
     else
     {
         //shifting temp to next position
         *top=temp->next;

         cout<<"Element deleted -> "<<temp->data<<endl<<endl;
         (*c)--;

         // dis allocating the memory
         delete temp;
     }
  }

//Main Method
int main()
{
    node* top=NULL;
    int counter=0;
    int no,stacksize;

    cout<<"\t--------------------------"<<endl
    <<"\t|"<<" Stack with Linked list "<<"|"<<endl
    <<"\t--------------------------"<<endl<<endl;

        cout<<" Enter the size of the stack -> ";
        cin>>stacksize; 
        cout<<endl;

    do{

        cout<<"\t Enter your choice "<<endl<<"\t ------------------"<<endl;
        cout<<"\t1. Push \n\t2. Pop \n\t3. Display \n\t4. Exit"<<endl<<"\t ->  ";
        cin>>no;
        cout<<endl;


        switch(no)
        {

        case 1:

            push(&top,&counter,stacksize);
            break;

        case 2:
            pop(&top,&counter);
            break;

        case 3:
            display(&top,&counter);
            break;

        case 4:
            cout<<" Program Exited"<<endl;
            exit(1);

        default:
            cout<<"Wrong input Enter again \n"<<endl;
        }
    }while(1); // loop will always be true and program will only exit when 4 is selected in the switch case


}
