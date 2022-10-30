#include <iostream>

using namespace std;

struct ListElement
{
    int dane;
    ListElement* next = 0;
};


struct Queue
{
    ListElement* first = 0;
    ListElement* last = 0;

    void push(int dane)
    {
        ListElement* nowy = new ListElement;
        nowy->dane = dane;

        if (this->first == 0)
        {
            this->first = nowy;
        }
        else if(this->last == 0)
        {
            this->first->next = nowy;
            this->last = nowy;
        }
        else
        {
            this->last->next = nowy;
            this->last = nowy;
        }
    }

    void pop()
    {
        if (first == 0)
        {
            std::cout<<"Lista jest pusta.\n";
        }
        else
        {
            cout << this->first->dane << "\n";
            this->first = this->first->next;
        }
    }
};


int main()
{
    Queue kolejka;
    kolejka.push(1);
    kolejka.push(2);
    kolejka.push(3);
    kolejka.pop();
    kolejka.pop();
    kolejka.pop();
    kolejka.pop();
    kolejka.push(3);
    kolejka.pop();
}
