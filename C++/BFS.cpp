#include <iostream>
#include <set>
#include <vector>
#include <queue>

using namespace std;

int main()
{
    int n, m, a, b;
    cin >> n >> m;

    vector<set<int>> tab(n);

    for(int i = 0; i < m; i++)
    {
        cin >> a >> b;
        tab[a-1].insert(b);
        tab[b-1].insert(a);
    }

    int odw[n];

    for(int i  = 0; i < n; i++)
    {
        odw[i] = 0;
    }

    queue<int> kolejka;
    kolejka.push(1);
    odw[0] = 1;
    int x;


    // BFS
    while(!kolejka.empty())
    {
        x = kolejka.front();

        kolejka.pop();
        cout << x << "\n";

        for(auto i:tab[x-1])
        {
            if(odw[i-1] == 0)
            {
                kolejka.push(i);
                odw[i-1] = 1;
            }

        }
    }
}
