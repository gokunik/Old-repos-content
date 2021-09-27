#include<iostream>
#include<stdlib.h>

using namespace std;

void insert(int * ,int * ,int);
void Delete(int *,int *);
void display(int [],int);
void sendData(int [],int);
bool primeNumber(int);
void pair(int [],int);

int main()
{
    int size,counter=-1,choice;
   

    cout<<"Enter the size of stack -> ";
    cin>>size;

    int stack[size];
    do
    {
    cout<<endl<<"***** Stack Using Array ******"<<endl;
          cout<<"* Press 1 For push "<<endl
              <<"* press 2 for pop "<<endl
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
        sendData(stack,counter);
        break;
    
    case 5:

        break;

    case 6:
        exit(1);
        break;

    default:
    cout<<"Wrong input"<<endl;
        break;
    } 
    }while(1);
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

    void sendData(int stack[],int count)
    {
        int number=0,i;
        bool result;

        for(i=0;i<count;i++)
        {
            number=stack[i];
            result=primeNumber(number);
            if(result==true)
            {
                cout << "Element Number ["<< i <<"] - "<<stack[i]<<" is a Prime."<<endl;
            }
            

        }
    }

    bool primeNumber(int no)
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
            return true;
        }

            
    }