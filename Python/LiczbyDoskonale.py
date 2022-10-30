n = int(input())
sum = 0
if n % 2 == 0 and n > 2:
    sum += 1+2
    for i in range(3,n):
        if n % i == 0:
            sum += i
        if sum > n:
            print("Nie")
    if sum == n:
        print("Tak")
    else:
        print("Nie")
else:
    print("Nie")