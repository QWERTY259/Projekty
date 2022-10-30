#include <iostream>
#include <vector>

using namespace std;

struct TreeElement
{
    vector <TreeElement*> kids;
    int data;
};

void DFS(TreeElement* e)
{
    cout << e->data << endl;
    for(int i = 0; i < e->kids.size(); i++)
        DFS(e->kids[i]);
}

int DFS_height(TreeElement* e)
{
    if(e->kids.size() == 0)
    {
        return 1;
    }
    else
    {
        int mx = 0;
        for(int i = 0; i < e->kids.size(); i++)
        {
            int x = DFS_height(e->kids[i]);
            if(x > mx)
                mx = x;
        }
        return mx+1;
    }

}

int main()
{
    TreeElement* l1 = new TreeElement;
    l1->data = 1;
    TreeElement* l2 = new TreeElement;
    l2->data = 2;
    TreeElement* l3 = new TreeElement;
    l3->data = 3;
    TreeElement* l4 = new TreeElement;
    l4->data = 4;
    TreeElement* l5 = new TreeElement;
    l5->data = 5;
    TreeElement* l6 = new TreeElement;
    l6->data = 6;
    TreeElement* l7 = new TreeElement;
    l7->data = 7;
    TreeElement* l8 = new TreeElement;
    l8->data = 8;

    l1->kids.push_back(l2);
    l1->kids.push_back(l5);
    l1->kids.push_back(l8);
    l2->kids.push_back(l3);
    l2->kids.push_back(l4);
    l5->kids.push_back(l6);
    l6->kids.push_back(l7);

    DFS(l1);
    cout << DFS_height(l1);

}
