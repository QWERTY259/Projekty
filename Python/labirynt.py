import os
import time
import msvcrt

f = open("labirynt_rolka.txt","r", encoding="utf8")
f = f.readlines()

def drawMove(i, x, y):
    os.system('cls')
    for j in range(i, i+6):
        if j%(len(f)) == y:
            print(f[y][:x]+ "O"+f[y][x+1:],end="")
            continue
        print(f[j%(len(f))],end="")
        
i = 0
gameOn = True
x = 25
y = 0
speed = 2
while gameOn:
    drawMove(i, x, y)
    start = time.time()
    while time.time() - start < speed:
        m = msvcrt.getch()
        if m == b'w' and y > 0 and f[y-1][x] == " ":
            y -= 1
        elif m == b's' and y < i+6 and f[y+1][x] == " ":
            y += 1
        elif m == b'a' and f[y][x-1] == " ":
            x -= 1
        elif m == b'd' and f[y][x+1] == " ":
            x += 1
        elif m == b'e':
            exit()
            
        if y == -1:
            exit    
        drawMove(i,x,y)
    
    i += 1;
    if i == len(f):
        i = 0
        speed /= 1.5