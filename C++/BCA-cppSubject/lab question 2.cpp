#include <iostream>
#include<stdlib.h>
#include<string.h>
using namespace std;

int binarySearch(int,int,int);


class student
{
public:
    long int regNo;
    string name;
    string branch;
    float cgpa;

    void operator=(student data)
    {
        regNo=data.regNo;
        name=data.name;
        branch=data.branch;
        cgpa=data.cgpa;
    }

    void enter(long int Regno,string Name,string Branch,float Cgpa)
    {
        regNo=Regno;
        name=Name;
        branch=Branch;
        cgpa=Cgpa;
    }

    void display()
    {
        cout<<endl<<"Registeration number: \t "<<regNo<<endl;
        cout<<"Name:\t\t\t "<<name<<endl;
        cout<<"Branch:\t\t\t "<<branch<<endl;
        cout<<"CGPA:\t\t\t "<<cgpa<<endl<<endl;
    }


}; 

student group1[20];

int main()
{
    
    long int regNos[20]= {11223301,11223303,11223311,11223312,11223310,
    11223320,11223307,11223316,11223302,11223304,11223308,11223313,11223309,
    11223317,11223319,11223306,11223315,11223318,11223305,11223314};
    
    string Names[20]= {"Sankadi Muni","Varha","Narad","Nar Narayan","kapil Muni",
    "Datatraye","Yagya","Rishab Dev","Adhirat prathu","Matshya","kurm","Dhanvantri",
    "Mohini","Narsingh","Vaman","Hayagreev","Sri hari","Parsuram","Ved vyash","Krishan"};
    
    string Branchs[20]= {"BBA","BTECH-Civil","MBA","Fashion","BSC-IT","BBA","BTECH-CSE",
    "MCA","MBA-IT","BSC","BALLB","BTECH-CSE","MBA","MBA-IT","BSC","LLB","BBA","BTECH-CSE","MBA","MCA"};
    
    float Cgpas[20]= {9.4,9.6,9.5,9.2,9.0,9.7,9.5,9.9,9.8,9.3,9.4,9.4,9.1,10.0,9.8,9.3,9.9,9.8,9.9,9.1};
    

    int choose=0,found=-1,search,number,i,j;
    student temp;
    
    cout<<"Fetching data from database "<<endl;
        for(i=0; i<20; i++)
        {
            group1[i].enter(regNos[i],Names[i],Branchs[i],Cgpas[i]);
        }
    cout<<"Fetching done";
    
    



    while(1)
    {
        cout<<endl<<endl;
        cout<<"Press 1 to search seatils using Registeration Number."<<endl
            <<"Press 2 for Sort Records Of Students using Bubble Sort "<<endl
            <<"Press 3 for do binary search"<<endl
            <<"Press 4 for arranging data based on CGPA "<<endl
            <<"Press 5 for displaying records "<<endl
            <<"Press 6 for Exiting "<<endl<<endl;
        cin>>choose;

        switch(choose)
        {
        case 1:
            
            cout<<"Enter the Registration Number : ";
            cin>>search; 
            cout<<endl;
            for(i=0; i<20; i++)
            {
                if(search==group1[i].regNo)
                {
                    found=i;
                    break;
                }
            }

            if(found>=0)
            {
                cout<<"Record Found at position "<<found<<endl;
                group1[found].display();
            }
            else
            {
                cout<<"No Record Found With Entered Registration Number"<<endl;
            }
            break;
       
        case 2:
            
            for(i=0; i<20; i++)
            {
                for(j=0; j<19-i; j++)
                {
                    if(group1[j].regNo>group1[j+1].regNo)
                    {
                        temp=group1[j];
                        group1[j]=group1[j+1];
                        group1[j+1]=temp;
                    }
                }
                cout<<"Records Sorted"<<endl<<endl;
                break;
                
            case 3:
                
                cout<<"Enter Registeration Number to Search :";
                cin>>number;
                cout<<endl;
                binarySearch(number,0,19);
                break;
            
            case 4:    
                for(i=1; i<20; i++)
                {
                    for(j=0; j<i; j++)
                    {
                        if(group1[i].cgpa > group1[j].cgpa)
                        {
                            temp=group1[i];
                            for(int k=i; k>j; k--)
                            {
                                group1[k]=group1[k-1];
                            }
                            group1[j]=temp;
                        }
                    }
                }
                cout<<"Records Sorted"<<endl;
                break;
            case 5:
                for(i=0; i<20; i++)
                {
                    cout<<"Record Index: "<<i;
                    group1[i].display();
                }
                break;
                case 6:
                    exit(1);
                break;
            default:
                cout<<"invalid input. Try Again."<<endl;
                break;
            }

        }
    }

}

   int binarySearch(int number ,int li ,int mi){
        int middle=((li+mi)/2);

        if(group1[li].regNo==number){
            cout<<"Record Found";
            group1[li].display();
            return 0;

        }

        if(group1[mi].regNo==number){
            cout<<"Record Found";
            group1[mi].display();
            return 0;
        }
        if(middle==li || middle==mi){
            cout<<"Record Not Found"<<endl;

        }
        else{

        if(group1[middle].regNo>number){
                binarySearch(number ,li ,middle-1 );
        }
        if(group1[middle].regNo<number){
                binarySearch(number ,middle+1 ,mi );
        }
        if(group1[middle].regNo==number){
            cout<<"Record Found";
            group1[middle].display();
            return 0;
        }
        }
    }


