import json
import os

har_path = r"f:\DOWNLOAD\ideas.edu.vn.har"
if not os.path.exists(har_path):
    print("HAR file not found")
    exit(1)

with open(har_path, "r", encoding="utf-8", errors="ignore") as f:
    data = json.load(f)

entries = data.get("log", {}).get("entries", [])
print(f"Total entries: {len(entries)}")

# Find the start time of the first request
start_times = []
for entry in entries:
    start_time_str = entry.get("startedDateTime", "")
    if start_time_str:
        start_times.append(start_time_str)

import datetime
def parse_date(date_str):
    # Parse format like '2026-06-13T06:15:15.123Z' or with offset
    # Remove Z or offset
    date_str_clean = date_str.split('+')[0].split('-')[0:3]
    # Simple conversion using datetime.strptime
    # Handle different date formats
    for fmt in ('%Y-%m-%dT%H:%M:%S.%fZ', '%Y-%m-%dT%H:%M:%SZ', '%Y-%m-%dT%H:%M:%S.%f', '%Y-%m-%dT%H:%M:%S'):
        try:
            return datetime.datetime.strptime(date_str.split('+')[0].split('Z')[0], fmt)
        except ValueError:
            pass
    return None

parsed_entries = []
for entry in entries:
    start_dt = parse_date(entry.get("startedDateTime", ""))
    if start_dt:
        parsed_entries.append((start_dt, entry))

parsed_entries.sort(key=lambda x: x[0])
first_time = parsed_entries[0][0] if parsed_entries else None

print("\n--- Chronological Timeline of Requests ---")
for i, (dt, entry) in enumerate(parsed_entries):
    offset = (dt - first_time).total_seconds() if first_time else 0
    req = entry.get("request", {})
    res = entry.get("response", {})
    url = req.get("url", "")
    time_ms = entry.get("time", 0)
    status = res.get("status", 0)
    timings = entry.get("timings", {})
    wait = timings.get("wait", 0)
    blocked = timings.get("blocked", 0)
    
    print(f"[{offset:6.2f}s] URL: {url[:100]}")
    print(f"          Duration: {time_ms:8.2f}ms | Wait (TTFB): {wait:8.2f}ms | Blocked: {blocked:8.2f}ms | Status: {status}")
