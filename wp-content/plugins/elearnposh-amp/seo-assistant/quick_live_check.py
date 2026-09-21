import re
import urllib.request

URLS = [
    'https://elearnposh.com/amp/',
    'https://elearnposh.com/posh-compliance-updates-2026-india/amp/',
    'https://elearnposh.com/solutions/posh-training-for-employees/amp/',
    'https://elearnposh.com/posh-courses/posh-for-employees/',
]

for u in URLS:
    req = urllib.request.Request(u, headers={'User-Agent': 'Mozilla/5.0'})
    try:
        with urllib.request.urlopen(req, timeout=30) as resp:
            html = resp.read().decode('utf-8', 'ignore')
            code = resp.status
        amp = bool(re.search(r'<html[^>]*(?:amp|\u26a1)', html, re.I))
        doctype = bool(re.search(r'^\s*<!DOCTYPE', html, re.I))
        canon = len(re.findall(r'rel=["\']canonical', html, re.I))
        print(f'{u} -> HTTP {code} amp={amp} doctype={doctype} canonicals={canon} len={len(html)}')
    except Exception as exc:
        print(f'{u} -> ERROR {exc}')
