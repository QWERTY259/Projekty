import pygame
from random import random, randrange

window = pygame.display.set_mode((0, 0), pygame.FULLSCREEN)
width = window.get_width()
height = window.get_height()
player_size = 100
bg_width = 1200
bg_height = 800
#font = pygame.font.SysFont("bahnschrift", )

class Game():
    def __init__(self):
        pygame.init()
        self.clock = pygame.time.Clock()  
        self.color = (0,0,0) #kolor
        self.closing = False
        
    def processInput(self):
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                self.closing = True
            elif event.type == pygame.KEYDOWN:
                if event.key == pygame.K_RIGHT:
                    self.keysDown.append(event.key)
                if event.key == pygame.K_LEFT:
                    self.keysDown.append(event.key)
                if event.key == pygame.K_DOWN:
                        self.keysDown.append(event.key)
                if event.key == pygame.K_UP:
                    self.keysDown.append(event.key)
                if event.key == pygame.K_SPACE:
                    self.keysDown.append(event.key)
            elif event.type == pygame.KEYUP:
                if event.key in self.keysDown:
                    if event.key == pygame.K_RIGHT:
                        self.keysDown.remove(event.key)
                    if event.key == pygame.K_LEFT:
                        self.keysDown.remove(event.key)
                    if event.key == pygame.K_DOWN:
                        self.keysDown.remove(event.key)
                    if event.key == pygame.K_UP:
                        self.keysDown.remove(event.key) 
                    if event.key == pygame.K_SPACE:
                        self.keysDown.remove(event.key)           
    
    def update(self):
        self.gameboard.update(self.keysDown)
    
    def render(self):
        window.fill(self.color)
        self.gameboard.render()
        pygame.display.update()
    
    def finish(self):
        while self.closing:
            #Zakończenie gry - tło lub wiadomość
            pygame.display.update()
            for event in pygame.event.get():
                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_q:
                        self.running = False
                        self.closing = False
                    if event.key == pygame.K_c:
                        self.closing = False
                        self.run()
                        self.running = False
                    if event.key == pygame.K_p:
                        self.closing = False
                        
    
    def run(self):
        self.keysDown = []
        self.running = True
        self.gameboard = Gameboard()
        while self.running:
            self.processInput()
            self.update()
            self.render()
            self.clock.tick(60)
            self.finish()

class Gameboard():
    def __init__(self):
            self.levels = [
                    Level_1()
                    ]
            self.level_on = 0
            
    def render(self):
        self.levels[self.level_on].render()

    def update(self, keysDown):
        if self.levels[self.level_on].running:
            self.levels[self.level_on].update(keysDown)
        else:
            self.level_on += 1 
        
    def message(self, text):
        pass

class Level_1():
    def __init__(self):
        self.running = True
        self.speed = 4
        self.t_size = 2*90
        self.teeth = [
            self.Tooth(self.t_size),
            self.Tooth(self.t_size),
            self.Tooth(self.t_size),
            self.Tooth(self.t_size),
            self.Tooth(self.t_size),
            self.Tooth(self.t_size)
            ]
        self.player = self.Player(1.5*player_size, (height-bg_height)/2 + bg_height - player_size)
        self.edge = [
            self.Edge(0),
            self.Edge((height-bg_height)/2 + bg_height)
        ]
        self.bg = self.Background()
        self.collision = False
        self.delay = 0
        
    def render(self):
        self.bg.render()
        for t in self.teeth:
            t.render()
        for e in self.edge:
            e.render()
        self.player.render()    

    def update(self, keyDown):
        if self.collision != True:
            if self.delay == 0:
                for t in self.teeth:
                    if t.play == False:
                        t.go()
                        self.delay = randrange(30, 120)
                        break
            self.collide()
            self.bg.update(self.speed)
            for t in self.teeth:
                t.update(self.speed)
            self.player.update(self.speed)
            self.edges()
            for e in keyDown:
                if e == pygame.K_SPACE:
                    self.player.jumping = True
                if e == pygame.K_UP:
                    if self.player.up != True:
                        self.player.cross = True
                if e == pygame.K_DOWN:
                    if self.player.up:
                        self.player.cross = True
        else:
            #message 
            for e in keyDown:
                if e == pygame.K_c:
                    pass
                if e == pygame.K_q:
                    pass
                    
        
    def collide(self):
        for t in self.teeth:
            if self.player.x + player_size > t.x and t.x + self.t_size > self.player.x:
                if self.player.y + player_size > t.y and t.y + self.t_size > self.player.y:
                    self.collision = True
                
    def edges(self):
        if self.player.y < self.edge[0].y + (height-bg_height)/2:
            self.player.y = (height-bg_height)/2
        if self.player.y + player_size > self.edge[1].y:
            self.player.y = self.edge[1].y - player_size
            
    class Player():
        def __init__(self, x, y):
            self.jumping = False
            self.x = x
            self.y = y
            self.f = 5
            self.v = self.f
            self.player = pygame.transform.scale(pygame.image.load('AutostradaPokarmowa\postac_1.png'),(player_size, player_size))
            self.m = 1
            self.cross = False
            self.up = False
            
        def update(self, speed):
            self.move(speed)
        
        def move(self, speed):
            if self.cross:
                if self.up:
                    self.y += 30
                    if self.y >= (height-bg_height)/2 + bg_height - player_size:
                        self.up = False
                        self.f *= -1
                        self.cross = False
                else:
                    self.y -= 30
                    if self.y <= (height-bg_height)/2:
                        self.up = True
                        self.f *= -1
                        self.cross = False
                    
            elif self.jumping:
                F = self.m*(self.v**2)
                if self.f > 0:
                    self.y-= F
                    self.v -= speed**(1/2)/18
                    if self.v <= 0:
                        self.m= -1
                    
                if self.f < 0:
                    self.y+= F
                    self.v += speed**(1/2)/18
                    if self.v >= 0:
                        self.m= -1
                        
                if self.v <= -self.f - 1 and self.f > 0:
                    self.jumping = False
                    self.v = self.f
                    self.m= 1
                if self.v >= -self.f + 1 and self.f < 0:
                    self.jumping = False
                    self.v = self.f
                    self.m= 1
            
        def render(self):
            if self.y > height / 2:
                window.blit(self.player, (self.x,self.y))
            else:
                window.blit(pygame.transform.rotate(self.player, 180), (self.x,self.y))
        
    class Tooth():
        def __init__(self, size):
            self.x = 0
            self.y = 0
            self.tooth = pygame.transform.scale(pygame.image.load('AutostradaPokarmowa\zab.png'),(size,size))
            self.play = False
            self.size = size
            
        def update(self, speed):
            if self.play:
                self.move(speed)
                if self.x +  self.size < 0:
                    self.play = False
        
        def move(self, speed):
            self.x -= speed
        
        def render(self):
            if self.play:
                if self.y > height / 2:
                    window.blit(self.tooth, (self.x,self.y))
                else:
                    window.blit(pygame.transform.rotate(self.tooth, 180), (self.x,self.y))
        
        def go(self):
            self.x = width
            self.play = True
            if randrange(0,2) == 0:
                self.y = (height-bg_height)/2
            else:
                self.y = (height-bg_height)/2 + bg_height - self.size
                    
    class Background():
        def __init__(self):
            self.l = (height-bg_height) /2 + bg_height
            self.back = pygame.image.load('AutostradaPokarmowa\\tlo.png')
            self.back_cordinates = []
            for i in range(width//bg_width + 2):
                self.back_cordinates.append(i*bg_width)
            
            
        def render(self):
            for i in self.back_cordinates:
                window.blit(self.back, (i, self.l - bg_height)) 
            
        def update(self, speed):
            if(self.back_cordinates[0] < - bg_width):
                for i in range(len(self.back_cordinates)):
                    self.back_cordinates[i] = i * bg_width
            else:
                for i in range(len(self.back_cordinates)):
                    self.back_cordinates[i] -= speed
    
    class Edge():
        def __init__(self, y):
            self.y = y
            self.color = (255, 0, 0)
            
        def render(self):
            pygame.draw.rect(window, self.color, (0, self.y, width, (height-bg_height)/2))      

game = Game()

game.run()

pygame.quit()