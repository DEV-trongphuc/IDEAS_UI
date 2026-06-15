import json
import os

har_path = r"f:\DOWNLOAD\ideas.edu.vn.har"
if not os.path.exists(har_path):
    print("HAR file not found")
    exit(1)

print("Reading HAR file...")
with open(har_path, "r", encoding="utf-8", errors="ignore") as f:
    try:
        data = json.load(f)
    except Exception as e:
        print(f"Error parsing JSON: {e}")
        exit(1)

entries = data.get("log", {}).get("entries", [])
print(f"Total entries: {len(entries)}")

# Sort by time (duration in ms) descending
sorted_entries = sorted(entries, key=lambda x: x.get("time", 0), reverse=True)

print("\n--- Top 20 Slowest Requests ---")
for i, entry in enumerate(sorted_entries[:20]):
    req = entry.get("request", {})
    res = entry.get("response", {})
    url = req.get("url", "")
    time_ms = entry.get("time", 0)
    status = res.get("status", 0)
    mime = res.get("content", {}).get("mimeType", "")
    size = res.get("content", {}).get("size", 0)
    print(f"{i+1}. URL: {url[:120]}")
    print(f"   Time: {time_ms:.2f} ms | Status: {status} | MIME: {mime} | Size: {size} bytes")
    
print("\n--- Timing Details for Slowest ---")
for i, entry in enumerate(sorted_entries[:20]):
    req = entry.get("request", {})
    url = req.get("url", "")
    timings = entry.get("timings", {})
    wait = timings.get("wait", -1)
    blocked = timings.get("blocked", -1)
    dns = timings.get("dns", -1)
    connect = timings.get("connect", -1)
    ssl = timings.get("ssl", -1)
    print(f"{i+1}. URL: {url[:120]}")
    print(f"   Blocked: {blocked:.2f}ms | DNS: {dns:.2f}ms | Connect: {connect:.2f}ms | SSL: {ssl:.2f}ms | Wait (TTFB): {wait:.2f}ms")
