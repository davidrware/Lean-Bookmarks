from peewee import *
from urlmanager import URLManager
from time import sleep

urlman = URLManager()

db = MySQLDatabase("dev_bookmarks",user="root",passwd="hkGVUX26w8ivEP")

class Bookmarks(Model):
    id = IntegerField()
    url = CharField()
    domain = CharField()
    title = CharField()

    class Meta:
        database = db

for bk in Bookmarks.select():
    updated = False
    if bk.domain == None:
        bk.domain = urlman.get_domain(bk.url)
        updated = True
    if bk.title == None or "CloudFlare" in bk.title or bk.title == "Too Many Requests":
        bk.title = urlman.get_title(bk.url)
        updated = True
    if updated:    
        print "Updating " + bk.url + "..."
        bk.save()
        sleep(3)
