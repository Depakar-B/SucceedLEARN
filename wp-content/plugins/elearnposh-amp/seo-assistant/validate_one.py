import json
import re
import urllib.request

url = 'https://elearnposh.com/posh-compliance-updates-2026-india/amp/'
html = urllib.request.urlopen(
    urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'}),
    timeout=30,
).read().decode('utf-8', 'ignore')

checks = []
if re.search(r'style=["\'][^"\']*!important', html, re.I):
    checks.append('inline_important')
if re.search(r'<iframe\b', html, re.I):
    checks.append('iframe')
print('pattern issues:', checks or 'none')

data = json.dumps({'html': html}).encode()
req = urllib.request.Request(
    'https://validator.ampproject.org/v1/validator',
    data=data,
    headers={'Content-Type': 'application/json'},
)
try:
    payload = json.loads(urllib.request.urlopen(req, timeout=90).read().decode())
    errs = [e for e in payload.get('errors', []) if e.get('severity') == 'ERROR']
    print('validator errors:', len(errs))
    for e in errs[:10]:
        print(' ', e.get('line'), e.get('message'))
except Exception as exc:
    print('validator failed', exc)
