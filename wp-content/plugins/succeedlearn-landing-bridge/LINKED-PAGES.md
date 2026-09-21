# SucceedLearn linked pages (test UI → live desktop + AMP)

Working set of pages built in the test theme (`akaza-adventure`) and wired for live via:

- **Desktop:** `succeedlearn-landing-bridge` (Eduma stays active; allowlisted slugs switch to akaza)
- **AMP (live):** `succeedlearn-amp-custom` new-UI wrappers under `template/new-ui/`
- **AMP (staging):** `succeedlearn-amp` config + templates

Update this file whenever a page is added to the live allowlist.

## Primary pages

| Page | Live slug(s) | Desktop bridge template | Desktop enqueue | Live AMP wrapper | AMP new-UI page | Status |
|---|---|---|---|---|---|---|
| Cyber Awareness (US) | `us-cyber-aware-october` | `page-templates/cybersecurity-awareness.php` | `akaza_enqueue_csa_assets` | `template/us-cyber-aware-october.php` | `new-ui/pages/cybersecurity-awareness.php` | OK |
| Cyber Awareness (UK) | `uk-cyber-aware-october` | `page-templates/cybersecurity-awareness-uk.php` | `akaza_enqueue_csa_assets` | `template/uk-cyber-aware-october.php` | `new-ui/pages/cybersecurity-awareness.php` (UK) | OK |
| Infosec 2026 Cyber (US) | `infosec-cybersecurity-awareness-us` | `page-templates/infosec-2026-cyber.php` | `akaza_enqueue_infosec_2026_cyber_assets` | `template/infosec-cybersecurity-awareness-us.php` | `new-ui/pages/infosec-2026-cyber.php` | OK |
| Infosec 2026 Cyber (UK) | `infosec-cybersecurity-awareness-uk` | `page-templates/infosec-2026-cyber-uk.php` | `akaza_enqueue_infosec_2026_cyber_assets` | `template/infosec-cybersecurity-awareness-uk.php` | `new-ui/pages/infosec-2026-cyber-uk.php` | OK |
| Security Awareness / SAP | `security-awareness` | `page-templates/security-awareness-and-phishing.php` | `akaza_enqueue_sap_assets` + `sl-sa-typography.css` | `template/security-awareness.php` | `new-ui/pages/security-awareness.php` | OK |

## Alias slugs

| Alias slug | Resolves to | Desktop bridge | Live AMP map | Force mobile AMP | Status |
|---|---|---|---|---|---|
| `infosec-cybersecurity-awareness-us` | Infosec US (SEO) | Yes | `infosec-cybersecurity-awareness-us.php` | Yes | OK |
| `infosec-cybersecurity-awareness-uk` | Infosec UK (SEO) | Yes | `infosec-cybersecurity-awareness-uk.php` | Yes | OK |
| `infosec-cybersecurity-awareness/us` | Infosec US (nested alias → flat `-us`) | Yes | Yes (301 → flat US) | Yes | OK |
| `infosec-cybersecurity-awareness/uk` | Infosec UK (nested alias → flat `-uk`) | Yes | Yes (301 → flat UK) | Yes | OK |
| `infosec-cybersecurity-awareness` | Infosec (flat; 301 → `-us` when US published) | Yes | Yes | Yes | OK |
| `cybersecurity-awareness` | Infosec | Yes | Yes (301 → SEO if unpublished) | Yes | OK |
| `infosec-cybersecurity-awareness-month-2026` | Infosec | Yes | Yes (301 → SEO if unpublished) | Yes | OK |
| `infosec-2026-cyber` | Infosec | Yes | Yes (301 → SEO if unpublished) | Yes | OK |
| `infosec-2026` | Infosec | Yes | Yes (301 → SEO if unpublished) | Yes | OK |
| `security-awareness-and-phishing` | SAP | Yes | Yes (→ SAP AMP) | Yes | OK |

## Checks (keep green)

- [x] Theme page templates exist for all 4 primary pages
- [x] Bridge allowlist includes all primary + alias slugs
- [x] Bridge editor templates list all 4 primary templates
- [x] Live AMP slug router maps all primary + Infosec/SAP aliases to new-UI
- [x] Live AMP force-AMP slug list matches the working set
- [x] SAP AMP section order matches desktop (no old `definition` section)
- [x] Infosec AMP images wired (hero / campaign works / understand / testing)
- [x] Bridge v1.0.14: live Infosec SEO slugs are flat `infosec-cybersecurity-awareness-us|uk` (nested `/us|/uk` kept as aliases)
- [x] Live AMP v1.9.13: flat Infosec US/UK slug detection + force-AMP + nested→flat redirects
- [x] Bridge v1.0.13: `sl_landing_bridge_linked_pages()` maps live SEO paths → desktop template + live AMP entry/page files (Infosec US/UK explicit)
- [x] Live AMP v1.9.11: Infosec US entry `infosec-cybersecurity-awareness-us.php`; UK entry `infosec-cybersecurity-awareness-uk.php`
- [x] Bridge v1.0.9: Cyber/Infosec dequeue Elementor kit CSS; **secondary global header + footer** pages use akaza chrome (no Eduma footer)
- [x] SAP desktop loads `sl-sa-typography.css` last so SucceedLearn heading scale wins inside `.sl-sap-page`

## SAP child Elementor pages (do not bridge)

These live under `/security-awareness/` and must stay on **Eduma + Elementor** (normal site header/footer):

- `s-phish-phishing-simulation`
- `s-aware`
- `s-bytes`
- `s-shield-2`
- `s-play-gamified-training`
- `s-metrics-tracking-reporting`
- `s-signs-security-awareness`
- `s-sync-security-awareness`
- `s-phish-report` (if published as child)

Do **not** assign akaza `S-*` page templates to them on live. Keep Elementor Header & Footer / Default.

Deploy fix:
1. Upload `succeedlearn-landing-bridge` **v1.0.10**
2. Upload `akaza-adventure` **1.2.21** (secondary-header leaf-slug guard)
3. Hard-refresh `/security-awareness/s-phish-phishing-simulation/` and confirm `wp-theme-eduma` + Elementor edit works again
4. Confirm `/security-awareness/` still uses akaza SAP landing + secondary chrome

## Live deploy notes (Cyber / Infosec typography)

If CSA/Infosec headings look like Eduma/Elementor sizes:

1. Re-upload `wp-content/themes/akaza-adventure/`
2. Re-upload/replace `wp-content/plugins/succeedlearn-landing-bridge/` (v1.0.6+)
3. Hard-refresh those landings and confirm Elementor kit CSS is not loading on Cyber/Infosec only

## Not in this live working set

Course pages (gifts, tax evasion, SMCR, whistleblowing, etc.) stay on the test site / full akaza theme. Do **not** add them to the bridge until intentionally approved.

## How to add a page later

1. Build desktop in `akaza-adventure` (template + enqueue + parts).
2. Build AMP in `succeedlearn-amp` (and sync into `succeedlearn-amp-custom/template/new-ui/`).
3. Add slug(s) to bridge allowlist + template label.
4. Add slug map + force-AMP entry in `succeedlearn-amp-custom.php`.
5. Update this list.
