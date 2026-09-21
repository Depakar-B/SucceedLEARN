"""PageSpeed field CWV via OAuth (higher quota than anonymous)."""

from __future__ import annotations

import json
import time
from datetime import date, timedelta

from googleapiclient.discovery import build

from search_console import get_credentials

SITE = 'sc-domain:elearnposh.com'
TOP_N = 12


def top_pages(service, limit: int) -> list[str]:
    end = date.today() - timedelta(days=3)
    start = end - timedelta(days=28)
    body = {
        'startDate': start.isoformat(),
        'endDate': end.isoformat(),
        'dimensions': ['page'],
        'rowLimit': limit,
        'type': 'web',
    }
    resp = service.searchanalytics().query(siteUrl=SITE, body=body).execute()
    return [row['keys'][0] for row in resp.get('rows', [])]


def cwv_from_psi(service, url: str) -> dict:
    result = (
        service.pagespeedapi()
        .runpagespeed(
            url=url,
            category=['PERFORMANCE'],
            strategy='MOBILE',
        )
        .execute()
    )
    le = result.get('loadingExperience') or {}
    metrics = le.get('metrics') or {}
    out = {'overall': le.get('overall_category'), 'metrics': {}}
    for key, val in metrics.items():
        out['metrics'][key] = {
            'category': val.get('category'),
            'percentile': val.get('percentile'),
        }
    perf = result.get('lighthouseResult', {}).get('categories', {}).get('performance', {})
    out['lighthouse_performance'] = perf.get('score')
    return out


def poor_issues(cwv: dict) -> list[str]:
    bad = []
    if cwv.get('overall') == 'SLOW':
        bad.append('overall')
    for key, val in (cwv.get('metrics') or {}).items():
        if val.get('category') == 'SLOW':
            bad.append(key)
    return bad


def main() -> None:
    creds = get_credentials()
    gsc = build('searchconsole', 'v1', credentials=creds)
    psi = build('pagespeedonline', 'v5', credentials=creds, static_discovery=False)

    pages = top_pages(gsc, TOP_N)
    report = {'poor': [], 'ok': [], 'no_field_data': [], 'errors': []}

    for i, url in enumerate(pages, 1):
        print(f'[{i}/{len(pages)}] {url}')
        try:
            cwv = cwv_from_psi(psi, url)
            issues = poor_issues(cwv)
            row = {'url': url, 'cwv': cwv, 'issues': issues}
            if not cwv.get('overall') and not cwv.get('metrics'):
                report['no_field_data'].append(row)
                print('  no CrUX field data (low traffic URL)')
            elif issues:
                report['poor'].append(row)
                print(f'  POOR -> {issues}')
            else:
                report['ok'].append(row)
                print(f'  OK -> {cwv.get("overall")}')
        except Exception as exc:  # noqa: BLE001
            report['errors'].append({'url': url, 'error': str(exc)})
            print(f'  ERROR -> {exc}')
        if i < len(pages):
            time.sleep(3)

    with open('cwv_poor_urls_report.json', 'w', encoding='utf-8') as fh:
        json.dump(report, fh, indent=2)

    print(f"\nPoor: {len(report['poor'])} | OK: {len(report['ok'])} | No field data: {len(report['no_field_data'])} | Errors: {len(report['errors'])}")


if __name__ == '__main__':
    main()
