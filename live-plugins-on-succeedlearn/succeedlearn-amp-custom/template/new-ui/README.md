# New-UI AMP (Cyber US/UK + Infosec + SAP + Code of Conduct)

Canonical linked-pages checklist (desktop + AMP):  
`wp-content/plugins/succeedlearn-landing-bridge/LINKED-PAGES.md`

## Live slug → AMP wrapper

| Live slug | AMP template | New-UI page |
|---|---|---|
| `us-cyber-aware-october` | `template/us-cyber-aware-october.php` | `new-ui/pages/cybersecurity-awareness.php` |
| `uk-cyber-aware-october` | `template/uk-cyber-aware-october.php` | `new-ui/pages/cybersecurity-awareness.php` |
| `infosec-cybersecurity-awareness/us` (+ retired aliases / flat path) | `template/infosec-cybersecurity-awareness-us.php` | `new-ui/pages/infosec-2026-cyber.php` |
| `infosec-cybersecurity-awareness/uk` | `template/infosec-cybersecurity-awareness-uk.php` | `new-ui/pages/infosec-2026-cyber-uk.php` |
| `security-awareness` (+ `security-awareness-and-phishing`) | `template/security-awareness.php` | `new-ui/pages/security-awareness.php` |
| `code-of-conduct` (+ `code-of-conduct-elearning-training`, page ID 51624) | `template/code-of-conduct.php` | `new-ui/pages/code-of-conduct.php` |

Infosec live SEO URLs: `/infosec-cybersecurity-awareness/us/` and `/infosec-cybersecurity-awareness/uk/`

Retired Infosec aliases (301 → US SEO URL when the alias page is not published):

- `cybersecurity-awareness`
- `infosec-cybersecurity-awareness` (flat; 301 → `/us/` when US nested page is published)
- `infosec-cybersecurity-awareness-month-2026`
- `infosec-2026-cyber`
- `infosec-2026`

## Isolation from legacy AMP

- Legacy pages keep using `template/style.php`.
- New-UI CSS lives under `template/new-ui/styles/` and is included **only** by the wrappers above.
- Other AMP pages never load this folder.

## AMP headers

| Pages | Header |
|---|---|
| US Cyber, UK Cyber, Infosec | SEO landing header: logo + CTA button, **no menu** (`succeedlearn_amp_render_landing_header`) |
| SAP, Code of Conduct, and all other AMP pages | Normal AMP menu: logo + hamburger sidebar (`components/menu.php`) |

## Deploy / test

1. Upload/replace `succeedlearn-amp-custom` (v1.9.9+) and merge desktop CoC theme patch if needed.
2. Keep AMPforWP active.
3. Smoke test:
   - `/us-cyber-aware-october/?amp=1` (SEO header)
   - `/uk-cyber-aware-october/?amp=1` (SEO header)
   - `/infosec-cybersecurity-awareness/us/?amp=1` (SEO header)
   - `/infosec-cybersecurity-awareness/uk/?amp=1` (SEO header)
   - `/infosec-cybersecurity-awareness/?amp=1` (should 301 to `/us/` when nested page published)
   - `/cybersecurity-awareness/?amp=1` (should 301 to Infosec SEO URL)
   - `/security-awareness/?amp=1` (normal AMP menu)
   - `/code-of-conduct/?amp=1` (normal AMP menu)
   - Desktop of the same URLs
