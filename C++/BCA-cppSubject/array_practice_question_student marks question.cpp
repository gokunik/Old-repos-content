#include<iostream>
 using namespace std;

 class stu
 {

     int rol,ca,mt,et,temp1,temp2,total;

 public:

    void getdata()
    {
        cout<<"---------Enter the student detais For Calculating his marks--------"<<endl<<endl;

        cout<<"Enter the Roll NO -> ";
        cin>>rol;
        cout<<endl;

        cout<<"Enter the marks of ca 1 and ca 2 respectively "<<endl;
        cout<<"Ca 1 -> ";
        cin>>temp1;
        cout<<endl;

        cout<<"Ca 2 -> ";
        cin>>temp2;
        cout<<endl;

        ca=temp1+temp2;

        cout<<"Enter the marks of midterm out of 40 ->";
        cin>>mt;
        cout<<endl;

        cout<<"Enter the marks of endterm out of 70 ->";
        cin>>et;
        cout<<endl;

    }

    void cal()
    {

        temp1=(30*100)/60;
        ca=(ca*temp1)/100;



        temp2=(20*100)/40;
        mt=(temp2*mt)/100;

        temp1=0;

        temp1=(50*100)/70;
        et=(temp1*et)/100;


        total=ca+mt+et;
    }

    void display()
    {
        cout<<"Total marks of the student out of 100  -> "<<total<<endl;
        if(total>=40)
        {
            cout<<"Student have cleared the exam"<<endl;
        }
        else
        {
            cout<<"Student have failed the exam"<<endl;
        }

    }
 };

 int main()
 {
     stu det[100];

     int no,i;

     cout<<"Enter the number of student -> "<<endl;
     cin>>no;

     for(i=0;i<no;i++)
     {
         det[i].getdata();
         det[i].cal();
         det[i].display();

         cout<<endl;
     }
 }
