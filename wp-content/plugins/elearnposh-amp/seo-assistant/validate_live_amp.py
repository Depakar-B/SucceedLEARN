"""Fetch live elearnposh AMP pages and run AMP validator."""

import json
import re
import urllib.request

URLS = [
    'https://elearnposh.com/amp/',
    'https://elearnposh.com/about-us/amp/',
    'https://elearnposh.com/contact/amp/',
    'https://elearnposh.com/posh-act/amp/',
    'https://elearnposh.com/blog/posh-training-for-employees/amp/',
]


def fetch(url: str) -> str:
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    with urllib.request.urlopen(req, timeout=30) as resp:
        return resp.read().decode('utf-8', 'ignore')


def local_checks(html: str) -> list[str]:
    issues = []
    canonical_count = len(re.findall(r'<link\b[^>]*\brel\s*=\s*["\']?\s*canonical', html, re.I))
    if canonical_count > 1:
        issues.append(f'duplicate canonical ({canonical_count})')
    if re.search(r'<iframe\b', html, re.I) and not re.search(r'<amp-iframe\b', html, re.I):
        issues.append('raw iframe without amp-iframe')
    if re.search(r'<img\b', html, re.I):
        issues.append('raw img tag')
    if re.search(r'style=["\'][^"\']*!important', html, re.I):
        issues.append('inline style !important')
    if re.search(r'<style(?![^>]*amp-(?:custom|boilerplate))', html, re.I):
        issues.append('disallowed style tag')
    return issues


def validator_errors(html: str) -> list[dict]:
    data = json.dumps({'html': html}).encode()
    req = urllib.request.Request(
        'https://validator.ampproject.org/v1/validator',
        data=data,
        headers={'Content-Type': 'application/json'},
    )
    with urllib.request.urlopen(req, timeout=60) as resp:
        payload = json.loads(resp.read().decode())
    return [e for e in payload.get('errors', []) if e.get('severity') == 'ERROR']


def main() -> None:
    all_errors: dict[str, list[str]] = {}

    for url in URLS:
        print(f'=== {url} ===')
        try:
            html = fetch(url)
            checks = local_checks(html)
            errors = validator_errors(html)
            print('local:', checks or 'none')
            if errors:
                for err in errors[:8]:
                    msg = f"line {err.get('line')}: {err.get('message')}"
                    print('  VALIDATOR ERROR:', msg)
                    all_errors.setdefault(err.get('message', msg), []).append(url)
            else:
                print('  VALIDATOR: PASS')
        except Exception as exc:
            print('ERROR:', exc)
        print()

    if all_errors:
        print('=== Unique validator errors across pages ===')
        for msg, pages in all_errors.items():
            print(f'\n{msg}')
            for page in pages:
                print(f'  - {page}')


if __name__ == '__main__':
    main()
