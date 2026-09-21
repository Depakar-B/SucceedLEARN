"""Read GSC AMP xlsx export and audit live /amp/ URLs from the affected list."""

from __future__ import annotations

import csv
import json
import re
import urllib.error
import urllib.request
import zipfile
import xml.etree.ElementTree as ET
from pathlib import Path

XLSX = Path(r'c:\Users\SucceedTech\Downloads\elearnposh.com-AMP-Issue-2026-06-22.xlsx')
TABLE_CSV = Path(__file__).resolve().parent.parent / 'elearnposh.com-AMP-Issue-2026-06-22' / 'Table.csv'
OUT = Path('gsc_export_live_audit.json')

ON_ATTR = re.compile(
    r'<([a-z][a-z0-9-]*)\b((?:[^>"\']|"[^"]*"|\'[^\']*\')*)\bon\s*=\s*(["\'])(.*?)\3((?:[^>"\']|"[^"]*"|\'[^\']*\')*)>',
    re.I | re.S,
)


def read_xlsx_sheet_names(path: Path) -> list[str]:
    with zipfile.ZipFile(path) as zf:
        wb = ET.fromstring(zf.read('xl/workbook.xml'))
        ns = {'m': 'http://schemas.openxmlformats.org/spreadsheetml/2006/main'}
        return [s.attrib['name'] for s in wb.findall('.//m:sheets/m:sheet', ns)]


def read_xlsx_shared_strings(path: Path) -> list[str]:
    with zipfile.ZipFile(path) as zf:
        if 'xl/sharedStrings.xml' not in zf.namelist():
            return []
        root = ET.fromstring(zf.read('xl/sharedStrings.xml'))
        ns = {'m': 'http://schemas.openxmlformats.org/spreadsheetml/2006/main'}
        out = []
        for si in root.findall('m:si', ns):
            parts = [t.text or '' for t in si.findall('.//m:t', ns)]
            out.append(''.join(parts))
        return out


def read_xlsx_first_sheet_rows(path: Path) -> list[list[str]]:
    strings = read_xlsx_shared_strings(path)
    with zipfile.ZipFile(path) as zf:
        sheet_path = 'xl/worksheets/sheet1.xml'
        for name in zf.namelist():
            if name.startswith('xl/worksheets/sheet') and name.endswith('.xml'):
                sheet_path = name
                break
        root = ET.fromstring(zf.read(sheet_path))
    ns = {'m': 'http://schemas.openxmlformats.org/spreadsheetml/2006/main'}
    rows: list[list[str]] = []
    for row in root.findall('.//m:sheetData/m:row', ns):
        cells = []
        for c in row.findall('m:c', ns):
            ref = c.attrib.get('t')
            v = c.find('m:v', ns)
            if v is None or v.text is None:
                cells.append('')
            elif ref == 's':
                cells.append(strings[int(v.text)])
            else:
                cells.append(v.text)
        rows.append(cells)
    return rows


def load_urls() -> list[str]:
    if XLSX.exists():
        rows = read_xlsx_first_sheet_rows(XLSX)
        urls = []
        for row in rows[1:]:
            if row and row[0].startswith('http'):
                urls.append(row[0].strip())
        if urls:
            return urls
    urls = []
    with TABLE_CSV.open(encoding='utf-8') as fh:
        for row in csv.DictReader(fh):
            urls.append(row['URL'].strip())
    return urls


def amp_url(url: str) -> str:
    url = url.rstrip('/')
    if url.endswith('/amp'):
        return url + '/'
    return url + '/amp/'


def fetch(url: str) -> tuple[str | None, str | None]:
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (compatible; gsc-audit/1.0)'})
    try:
        with urllib.request.urlopen(req, timeout=40) as resp:
            return resp.read().decode('utf-8', 'ignore'), None
    except urllib.error.HTTPError as exc:
        return None, f'HTTP {exc.code}'
    except Exception as exc:  # noqa: BLE001
        return None, str(exc)


def audit_amp_html(html: str) -> list[str]:
    issues = []
    if not re.search(r'^\s*<!DOCTYPE\s+html\b', html, re.I):
        issues.append('missing_doctype')
    if not re.search(r'<html\b[^>]*\b(?:amp|⚡)\b', html, re.I):
        issues.append('missing_html_amp')
    if 'cdn.ampproject.org/v0.js' not in html:
        issues.append('missing_v0_js')
    if not re.search(r'<style\b[^>]*\bamp-boilerplate\b', html, re.I):
        issues.append('missing_boilerplate')
    if re.findall(r'<link\b[^>]*\brel\s*=\s*["\']?\s*canonical', html, re.I):
        if len(re.findall(r'<link\b[^>]*\brel\s*=\s*["\']?\s*canonical', html, re.I)) > 1:
            issues.append('duplicate_canonical')
    if re.search(r'<iframe\b', html, re.I):
        issues.append('raw_iframe')
    if re.search(r'<style(?![^>]*\bamp-(?:boilerplate|custom)\b)', html, re.I):
        issues.append('disallowed_style')
    for m in ON_ATTR.finditer(html):
        attrs = m.group(2) + ' ' + m.group(5)
        if not re.search(r'\btabindex\s*=', attrs, re.I):
            issues.append('on_missing_tabindex')
            break
        if not re.search(r'\brole\s*=', attrs, re.I):
            issues.append('on_missing_role')
            break
    return issues


def main() -> None:
    print('XLSX sheets:', read_xlsx_sheet_names(XLSX) if XLSX.exists() else 'missing')
    urls = load_urls()
    print(f'URLs in export: {len(urls)}')

    report = {
        'export_file': str(XLSX),
        'total_urls': len(urls),
        'still_failing': [],
        'not_amp': [],
        'fetch_errors': [],
        'passing': [],
        'issue_totals': {},
    }

    for url in urls:
        test_url = amp_url(url)
        html, err = fetch(test_url)
        if err or not html:
            # try original URL if amp 404
            html2, err2 = fetch(url)
            if html2 and re.search(r'<html\b[^>]*\b(?:amp|⚡)\b', html2, re.I):
                html, test_url = html2, url
            else:
                report['fetch_errors'].append({'url': url, 'amp_url': test_url, 'error': err or err2})
                continue

        if not re.search(r'<html\b[^>]*\b(?:amp|⚡)\b', html, re.I):
            report['not_amp'].append({'url': url, 'tested': test_url, 'len': len(html)})
            continue

        issues = audit_amp_html(html)
        if issues:
            report['still_failing'].append({'url': url, 'tested': test_url, 'issues': issues})
            for i in issues:
                report['issue_totals'][i] = report['issue_totals'].get(i, 0) + 1
        else:
            report['passing'].append({'url': url, 'tested': test_url})

    OUT.write_text(json.dumps(report, indent=2), encoding='utf-8')
    print(f'\nSaved {OUT}')
    print(f"PASSING: {len(report['passing'])}")
    print(f"STILL FAILING: {len(report['still_failing'])}")
    print(f"NOT AMP HTML: {len(report['not_amp'])}")
    print(f"FETCH ERRORS: {len(report['fetch_errors'])}")
    if report['issue_totals']:
        print('\nIssue totals on live /amp/ pages:')
        for k, v in sorted(report['issue_totals'].items(), key=lambda x: -x[1]):
            print(f'  {k}: {v}')
    if report['still_failing'][:8]:
        print('\nSample failures:')
        for row in report['still_failing'][:8]:
            print(f"  {row['url']} -> {row['issues']}")


if __name__ == '__main__':
    main()
