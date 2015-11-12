from BeautifulSoup import BeautifulSoup
import urllib
from urlmanager import URLManager

url = 'http://www.aflcio.org/Legislation-and-Politics/Legislative-Alerts'

umgr = URLManager()

print umgr.get_title(url)
print umgr.get_domain(url)

