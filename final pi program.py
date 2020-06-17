import RPi.GPIO as g
import datetime, threading
from time import sleep
from contextlib import closing
from urllib import urlencode
from urllib2 import urlopen
url = 'http://smartmeter.000webhostapp.com/phpInsertUsage.php'

g.setmode(g.BCM)
g.setup(2, g.IN)

global pulseCount
global lastSavedCount
lastSavedCount=0
with open('/home/pi/store.txt', 'r') as file:
        pulseCount = int(file.read())
        print pulseCount

def periodicUpload():
        threading.Timer(5,periodicUpload).start()
        global lastSavedCount
        if(lastSavedCount!=pulseCount):
                data = urlencode({"id" : "10", "count" : pulseCount}).$
                with closing(urlopen(url, data)) as response:
                        print (response.read().decode())
                        print "Uploaded to server : ",
                        print pulseCount
                        lastSavedCount=pulseCount


def periodicSave():
        threading.Timer(5, periodicSave).start()
        with open('/home/pi/store.txt', 'w') as file:
                file.write(str(pulseCount))
        print "Saved to file : ",
        print pulseCount
        
        
def increasePulse(channel):
        global pulseCount
        pulseCount += 1
        print "Pulse detected! Total count : "+str(pulseCount)

g.add_event_detect(2, g.RISING, callback=increasePulse,bouncetime=500)
periodicUpload()
periodicSave()



