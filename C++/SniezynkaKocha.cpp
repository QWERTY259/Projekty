#include <iostream>
#include <math.h>

using namespace std;

int main()
{
    float n, x=0;
    cin >> n;
    for(float i = 0; n > i ; i++)
    {
        if(i>=1)
        {
            x+=((pow((1/pow(3.0,i)),2.0)*pow(3.0, 1.0/2.0))/4)*(pow(4,i-1))*3;
            cout << x <<endl;
        }
        else
        {
            x+=((pow((1/pow(3.0,i)),2.0)*pow(3.0, 1.0/2.0))/4);
            cout << x <<endl;
        }
    }
}
