import urllib.request
import re

url = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/solid/house.svg"
try:
    with urllib.request.urlopen(url) as response:
        html = response.read().decode('utf-8')
    print("Download successful!")
    print(html[:200] + "...")
except Exception as e:
    print(f"Error: {e}")
