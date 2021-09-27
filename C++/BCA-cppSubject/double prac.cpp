#include <iostream>

using namespace std;

class node
{
public:
    int data;
    node *next, *prev;
};

void create(node **);
void display(node *);

int main()
{
    node *head = NULL;
    int no;
    char ch;

    do
    {
        cout << "Press 1 For insert " << endl;
        cout << "Press 2 for display" << endl;
        cin >> no;

        switch (no)
        {
        case 1:
            create(&head);

            break;
        case 2:
            display(head);
            break;

        default:
            cout << "Wrong input" << endl;
            break;
        }

        cout << "Do You Want To Continue ? Press y/Y " << endl;
        cin >> ch;
    } while (ch == 'y' || ch == 'Y');
}

void create(node **head)
{
    node *new_node = NULL;
    node *temp = NULL;
    int no, i;

    cout << "Enter the number of nodes-> ";
    cin >> no;
    cout << endl;

    for (i = 0; i < no; i++)
    {
        new_node = new node();

        cout << "Enter the node data " << endl;
        cin >> new_node->data;

        if (*head == NULL)
        {
            *head = new_node;

            new_node->next = NULL;
            new_node->prev = NULL;
        }
        else
        {
            temp = *head;
            while (temp->next != NULL)
            {

                temp = temp->next;
            }

            new_node->prev = temp;
            temp->next = new_node;
            new_node->next = NULL;
        }
    }
}

void display(node *head)
{
    int i = 1;
    node *temp = head;
    cout << "Address of head -> " << &head << endl;
    cout << "temp -> " << temp << endl
         << "Temp->next"
         << temp->next << endl;

    cout << endl
         << "********** While Block Start ************" << endl;
    while (temp != NULL)
    {
        cout << "Element [" << i << "] -> " << temp->data << endl;
        i++;
        cout << "temp -> " << temp << endl;
        temp = temp->next;
        cout << "temp after temp->next -> " << temp << endl;
        cout << "temp->next => " << temp->next << endl;

        cout << endl
             << "***********************" << endl;
    }
}
