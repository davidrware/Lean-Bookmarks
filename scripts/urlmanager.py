import urllib
from BeautifulSoup import BeautifulSoup 
class URLManager(object):
    
    def __init__(self):
   #     self.url = url
        pass        

    def get_soup(self,url):
        r = urllib.urlopen(url).read()
        
        self.soup = BeautifulSoup(r)
    
    def get_title(self,url):
        self.get_soup(url)
        if self.soup.title.string is not None:
            return self.soup.title.string.strip()
        return url

    def get_domain(self,url):
        parts = url.split('//',1)
        return parts[0]+'//'+parts[1].split('/',1)[0]
