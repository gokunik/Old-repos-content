#include<iostream>
#include<stdlib.h>

using namespace std;

void insert(int * ,int * ,int);
void Delete(int *,int *);
void display(int [],int);
void primeNumber(int,int);
void pairs(int [],int);

int main()
{
    int size,counter=-1,choice,no,i;
   

    cout<<"Enter the size of stack -> ";
    cin>>size;

    int stack[size];
    while(1)
    {
    cout<<endl<<"***** Stack Using Array ******"<<endl;
          cout<<"* Press 1 For Push "<<endl
              <<"* press 2 for Pop "<<endl
              <<"* Press 3 For displaying "<<endl
              <<"* Press 4 For Finding Prime Number"<<endl
              <<"* Press 5 For Finding Pairs of Number"<<endl
              <<"* Press 6 to Exit The program"<<endl;
    cin>>choice;

    switch (choice)
    {
    case 1:
        insert(stack,&counter,size);
        break;

    case 2:
        Delete(stack,&counter);
        break;

    case 3:
        display(stack,counter);
        break;

    case 4:

        for (i = counter; i >= 0; i--) // Checking one by one from the top of the stack
        {
            no=stack[i];
            primeNumber(no,i);
        }
        
        
        break;
    
    case 5:
        pairs(stack,counter);
        break;

    case 6:
        exit(1);
        break;

    default:
    cout<<"Wrong input"<<endl;
        break;
    } 

    

    }
}

void insert(int *stack,int *count, int size)
    {
        int num,i;
        size=size-1;
        if(*count==size)
        {
            cout<<"Stack Full"<<endl;
        }
        else
        {
            cout<<"Size of the Array -> "<<size+1<<endl;
            cout<<"Enter the number of stack elements you want to add -> ";
            cin>>num; cout<<endl;

            if((num+(*count))>size||num<1)
            {   
                if((num+(*count))>size)
                {
                    cout<<" Can not add elements More then stack size !"<<endl;
                    cout<<" Current Size Available in stack -> "<<(size-(*count))<<endl;
                }

                else
                {
                    cout<<"Number must be greater then 0 !"<<endl;
                }
            }
            else
            {   num=num+(*count);
                cout<<"Enter the Data -> "<<endl;
                for(i=(*count)+1;i<=num;i++)
                {
                    cin>>stack[i];
                    (*count)++;   
                }
            }
        }   
    }

void Delete(int *stack,int *count)
    {
        if((*count)==-1)
        {
            cout<<"Stack over flow"<<endl;
        }
        else
        {
            cout<<"Element deleted from the stack "<<endl;
            cout<<"Deleted Elemented -> "<<stack[*count]<<endl;
            (*count)--;
            
        }
        
    }

void display(int stack[],int count)
    {
        int i;

        if(count==-1)
        {
            cout<<"Stack is empty"<<endl;
        }
        else
        {
            for(i=0;i<=count;i++)
            {
                cout<<"Element ["<<i<<"] -> "<<stack[i]<<endl;
            }
        }
        
    }


  void primeNumber(int no,int j)
  {

   int count=0,i;

        for(i=1;i<=no;i++)
        {
            if(no % i == 0)
             {
                 count++;
             }
        }

        if(count==2)
        {
            cout<<"Element ["<<j<<"] - "<<no<<" is Prime"<<endl;
        }
        
        
   
  }
 
void pairs(int stack[],int count)
{
    int i,j,total=0,choice,check[count];

    cout<<" Press 1 for only finding pairs Occuring togther"<<endl
        <<" Press 2 for finding all the matching pair of a number"<<endl;
        cin>>choice; 
        cout<<endl;

        switch (choice)
        {
        case 1:

        for(i=0;i<count;i++)
        {
        if(stack[i]==stack[i+1])
          {
           cout<<"Element ["<<i<<"] and ["<<i+1<<"] are pairs of "<<stack[i]<<" which are occuring toghter"<<endl;
           total++;
           i++;   
          }
        }
        cout<<"Total Pairs Found - "<<total<<endl;
            break;
        
        case 2:
        
        for(i = 0; i<count; i++)
        {
            check[i]    =   0;
        }
        for(i = 0; i<count; i++)
        {
            for(j = i+1; j<count; j++)
            {
                if(stack[i] == stack[j] && check[j] ==  0   &&  check[i]    ==  0)
                {
                    total++;
                    check[j]    =   1;
                    check[i]    =   1;
                    cout<<"Pair of "<<stack[i]<<" Found At ["<<i<<"] and ["<<j<<"] stack index"<<endl;
                    break;
                }
            }
        }
        cout<<"Total Pairs Found - "<<total<<endl;
 
         break;

        default:

        cout<<"Wrong Input"<<endl;
            break;
        }
}