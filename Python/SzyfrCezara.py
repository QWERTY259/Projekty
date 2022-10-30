tab = [0]*26
zero = 0
wyraz = input("Podaj wyraz: ")
wyraz2 = input("Podaj kolejny wyraz: ")

if(len(wyraz) != len(wyraz2)):

    print("Twoje wyrazy nie są anagramami")
    
else:

    for i in range(len(wyraz)):

        tab[ord(wyraz[i]) - ord('a')] += 1
        if(tab[ord(wyraz[i]) - ord('a')] -1 == 0):
            zero += 1
        if(tab[ord(wyraz[i]) - ord('a')] == 0):
            zero -= 1
        tab[ord(wyraz2[i]) - ord('a')] -= 1
        if(tab[ord(wyraz2[i]) - ord('a')] + 1 == 0):
            zero += 1
        if(tab[ord(wyraz2[i]) - ord('a')] == 0):
            zero -= 1

    if(zero == 0):
        print("Ten wyraz to anagram.")
    else:
        print("Ten wyraz to nie anagram.")