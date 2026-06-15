import json

har_path = r"f:\DOWNLOAD\ideas.edu.vn.har"
with open(har_path, "r", encoding="utf-8", errors="ignore") as f:
    data = json.load(f)

entries = data.get("log", {}).get("entries", [])
ips = {}
for entry in entries:
    req = entry.get("request", {})
    url = req.get("url", "")
    ip = entry.get("serverIPAddress", "")
    if ip:
        domain = url.split("//")[1].split("/")[0]
        ips[domain] = ip

print("Server IPs found in HAR:")
for domain, ip in ips.items():
    print(f"{domain} -> {ip}")
