# SucceedLearn AMP Section Rules — ChatGPT Prompt

**How to use:** Copy everything from `--- START PROMPT ---` through `--- END PROMPT ---` and paste it at the **start** of your ChatGPT conversation (or into a Custom GPT / project instructions). Then paste your desktop section code or describe the section you want ported.

Also see Cursor rule: `.cursor/rules/succeedlearn-global-ui.mdc` (desktop + AMP global stack).

---

--- START PROMPT ---

You are building SucceedLearn AMP page sections for WordPress. All code goes in the plugin:

`wp-content/plugins/succeedlearn-amp/`

**Do not** use legacy `_incoming/live-amp/` templates. **Do not** use Bootstrap. **Do not** invent a parallel class system.

Match the desktop theme (`wp-content/themes/akaza-adventure/template-parts/…`) in section order, copy, BEM class names, and visual intent.

**Canonical examples to follow:**
- `templates/pages/home.php`
- `templates/pages/security-awareness.php` (SAP AMP reference)
- `templates/styles/home-page.php` (shared primitives)
- `templates/styles/home-sections.php` (section CSS style)
- `templates/partials/security-awareness/suite.php` (static card grid instead of accordion)
- `templates/styles/global-foundation.php` / `global-ui.php` / `global-ui-buttons.php` / `global-panel-title.php` / `global-highlight.php`

---

## 1. Golden rule — mirror desktop first

Every AMP section must match its desktop counterpart in:

- **Section order** (same as theme wrapper)
- **Copy** (headings, bullets, CTAs)
- **BEM class names** (`sl-sa-hero`, `sl-suite-card`, `sl-reality__grid`, `sl-testimonials__card`, etc.)
- **Dual-colour h2** — navy base text + accent words in a direct child `<span>` (always)

When desktop uses JS AMP cannot run (accordion, carousel, sticky scroll), use the **closest static AMP equivalent** (e.g. suite accordion → expanded card grid, all cards visible).

---

## 2. File layout

| Purpose | Path |
|---|---|
| Full AMP page | `templates/pages/{page}.php` |
| Section partial | `templates/partials/{page}/{section}.php` |
| Data + loader | `templates/data/{page}.php` → `succeedlearn_amp_*_partial( 'hero' )` |
| Inlined CSS | `templates/styles/{name}.php` or `.css` |

New pages must register in `includes/class-config.php` → `get_amp_page_map()`.

---

## 3. Page shell pattern

```php
<!doctype html>
<html amp lang="...">
<head>
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <link rel="canonical" href="..." />
  <style amp-custom>
  <?php succeedlearn_amp_output_page_styles( 'page_type', array( 'home-page' ), array( 'home-sections', 'page-specific' ) ); ?>
  </style>
  <?php succeedlearn_amp_output_components( 'page_type', array( 'amp-form', 'amp-sidebar', ... ) ); ?>
</head>
<body class="sl-home sl-*-page">
  <?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
  <main id="main-content">
    <?php succeedlearn_amp_*_partial( 'hero' ); ?>
  </main>
  <?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
```

Fonts (**Space Grotesk**) are injected globally via `amp_post_template_head` in `includes/class-plugin.php` (`add_preconnect_hints`). Do not skip or replace with a different family.

---

## 4. Global CSS stack (required — reuse, do not reinvent)

These are **auto-loaded on every AMP page** via `$shared` in `functions-performance.php` / `class-template-manager.php`. Page CSS = **layout + spacing only**.

| File | Use for | Do not re-copy |
|------|---------|----------------|
| `global-foundation.php` | Brand tokens, `--slf-font-*`, `h1`/`h2`/`h3`, `--sl-fs-hero-h1`, `.sl-h2`, `.sl-home-sub-heading`, dual-colour `h2 > span` | Heading scales, title accent colour, body font |
| `global-ui.php` | `.sl-btn--primary|--secondary` fills, `.sl-list` / `.sl-list-item`, FAQ (`.sl-amp-faq*`) | Button fills, list chrome, FAQ accordion look |
| `global-ui-buttons.php` | `.sl-hero-btn*` / `.sl-content-btn*` shape + fills | Per-page button gradients |
| `global-panel-title.php` | `h3.sl-panel-title` (**24px**) | Local `font-size: 24px` on card h3 |
| `global-highlight.php` | `.sl-highlight` callout | Local `__highlight` chrome clones |
| `menu.php` | Header / sidebar shell + body font fallback | — |
| `footer.php` / `scroll-to-top.php` / `breadcrumbs.php` | Shared chrome | — |

**From `home-page.php` (still pass when needed):**
- Section wrapper: `<section class="sl-section sl-section--alt">` + `<div class="sl-wrap">`
- Lead: `.sl-lead`
- Cards shell: `.sl-card` inside `.sl-grid-2` / `.sl-grid-3` / `.sl-grid-4`

### Markup to prefer

```html
<span class="sl-home-sub-heading">Eyebrow</span>
<h2 class="sl-h2">Navy phrase <span>accent phrase</span></h2>
<h3 class="sl-panel-title">Card title</h3>
<div class="sl-highlight"><p>Important closing line.</p></div>
<ul class="sl-list sl-list--2up">
  <li class="sl-list-item"><span aria-hidden="true">✓</span> Feature</li>
</ul>
<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">Request a Demo</a>
<a class="sl-content-btn sl-content-btn-primary" href="#contact">Take the challenge <span aria-hidden="true">→</span></a>
```

Legacy `.sl-btn .sl-btn--primary` still OK where already used.

Do **not** create parallel systems (`banner`, Bootstrap rows, page-only button fills, local FAQ accordions, local highlight boxes).

---

## 5. Layout — CSS Grid only

- **Never Bootstrap** (`row`, `col-md-*`, etc.)
- CSS Grid / Flexbox only
- `minmax(0, 1fr)` on grid columns
- **AMP breakpoints:** 700px, 768px, 900px, 1000px (not desktop 991/1199)
- Write **mobile-first**. Default to 1 column, then add `min-width` queries
- Section padding: `48px 16px` (mobile-first). If the section also has `.sl-section`, do not stack a second large padding (90px)
- Content width: `.sl-wrap { max-width: 1100px }`
- Common grids: 4-up → 2-col @ tablet → 1-col mobile; hero content+image: 1-col mobile, **2-col from 768px**
- **Card / item gap (required):** `gap` on the grid (`16px` mobile, `20px` tablet, `22–24px` desktop)
- **Hero/content CTAs (important):** full-width **only** ≤767px (column, `width: 100%`). From **768px (tablet+)**, row + wrap with compact buttons: `width: fit-content` (or `auto`), `max-width: none`, `flex: 0 0 auto`, `white-space: nowrap`. Do not leave a base `width: 100%` rule that still stretches CTAs on tablet (match CSA / WHP / GWCT / Infosec).
- **Spec / comparison tables (important):** keep the same table layout on mobile as tablet. Do **not** convert rows to stacked `display: block` cards. Use `__table-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; }` and give the table a `min-width` (~560–640px) so users can scroll sideways. On mobile, keep column 1 narrow (~110–120px) so part of column 2 stays visible as a scroll hint.
- **Last `.sl-list-item` padding (important):** global last-child uses `padding-bottom: 22px`. If page CSS overrides item padding (shorthand or section-specific rules for contact/CTA bullets, training cards, curriculum, pricing tiers), re-declare `:last-child { padding-bottom: 22px; }` (or `32px` on larger cards) so the last row is not clipped.
- **TABLET TWO CARDS PER ROW (HARD RULE — paste this when ChatGPT keeps shipping 1-col tablet):**
  - Prefer class `sl-amp-card-grid` on the grid (global AMP UI + reinforce). Default = 1 col mobile, **2 col tablet+**. Force 1 col with `sl-amp-card-grid--1col`.
  - Mobile default: **1** column
  - Tablet `@media (min-width: 768px)`: **exactly 2** columns
  - Desktop `@media (min-width: 1000px)`: 3 or 4 only if design asks
  - Re-declare `display: grid` inside every media query
  - Prefer tablet syntax: `grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);`
  - Cards: `min-width: 0; margin: 0; width: 100%; box-sizing: border-box;`
  - If AMP still shows 1-col after hard refresh, reinforce via `succeedlearn_amp_reinforce_card_grid_css()` in `includes/functions-performance.php`
  - Cursor rule: `.cursor/rules/succeedlearn-amp-tablet-two-card-grid.mdc`

- **Odd leftover card on 2-col tablet grids (important):** when a card grid is **2 columns on tablet** and the item count is odd (e.g. 3 reasons cards), do **not** stretch the last card full width. Center it as a half-width card:

```css
/* Mobile */
.sl-*-page .sl-*-__grid {
  display: grid;
  grid-template-columns: minmax(0, 1fr);
  gap: 16px;
}

/* Tablet: 2 per row; odd last card centered */
@media (min-width: 700px) {
  .sl-*-page .sl-*-__grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
  }
  .sl-*-page .sl-*-__grid > :last-child:nth-child(odd) {
    grid-column: 1 / -1;
    justify-self: center;
    width: 100%;
    max-width: calc((100% - 20px) / 2);
  }
}

/* Desktop 3-up (or more): reset the odd-card centering */
@media (min-width: 1000px) {
  .sl-*-page .sl-*-__grid {
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
  }
  .sl-*-page .sl-*-__grid > :last-child:nth-child(odd) {
    grid-column: auto;
    justify-self: stretch;
    max-width: none;
  }
}
```

Do **not** use only `:last-child { grid-column: 1 / -1; }` on tablet (that makes a full-bleed wide card). Match GWCT testimonials / GDPR reasons.

### Image + text split sections (critical)

On **stacked AMP / mobile**, order is always:

1. Text content first  
2. Image / media **below** the text  

In markup: put `__content` before `__media` / `__visual`.  
Do **not** use `order: -1` on media for mobile (that puts the image on top).  
If desktop needs image on the left, use `order: -1` only inside `@media (min-width: 900px)` (or equivalent desktop breakpoint).

### Hero / section images

- `amp-img` with explicit width/height + `layout="responsive"`
- Wrapper: `overflow: hidden; border-radius: 12px`
- `amp-img img { object-fit: cover; object-position: center; }`
- On stacked mobile, cap visual `max-width: 360px; margin: 0 auto` when needed; from 768px `max-width: none`

### Card equal-height alignment

1. Wrap icon/number + title in `__head`
2. Shared `min-height` on `__head` for tallest title
3. Identical card padding
4. CTA: `margin-top: auto` on flex column cards

---

## 6. Brand colours (required — use only these)

Working set per page: navy + primary blue + optional CTA orange + neutrals.

```css
.sl-*-page {
  --sl-page-navy: #16234e;
  --sl-page-primary: #1472ba;
  --sl-page-primary-dark: #283384;
  --sl-page-primary-soft: rgba(109, 195, 235, 0.16);
  --sl-page-cta: #ea3e24;
  --sl-page-text: #4A4A4A;
  --sl-page-muted: #6B7C93;
  --sl-page-bg: #f5f5f5;
  --sl-page-white: #fff;
}
```

- Prefer `var(--sl-page-primary)` over raw hex
- Normalize near-misses: `#18233b` → `#16234e`, `#135db7` → `#1472ba`, `#F04E23` → `#ea3e24`
- Do **not** use pinks, purples, lavenders unless design explicitly requires them
- Do **not** use broken `--sl-sa-*` aliases — use `--sl-page-*`

---

## 7. Typography & fonts

### Font family

- Brand font: **Space Grotesk** (weights 400–800)
- Tokens: `--slf-font-body` / `--slf-font-display` in `global-foundation.php`
- Loaded globally in AMP head (Google Fonts). Fallback: `system-ui, sans-serif`
- Do **not** use Arial as the primary stack; do **not** invent another display font

### Hero h1

- Use `--sl-fs-hero-h1` from `global-foundation.php` (larger on mobile/tablet than old 24–28px overrides)
- Approx: mobile ~32px+, tablet ~36–48px, desktop up to ~56px
- **Weight 700** (not 800)
- Do **not** shrink hero `h1` to 24px in page CSS media queries

### Section h2 — dual colour (always)

Every section `h2` / `.sl-h2` must use dual colour like desktop:

```php
<h2 id="…-title" class="sl-h2">
  <?php esc_html_e( 'Navy phrase', 'succeedlearn-amp' ); ?>
  <span><?php esc_html_e( 'accent phrase', 'succeedlearn-amp' ); ?></span>
</h2>
```

- Accent colour: `h2:not(.sl-*-hero__subheading) > span` → `var(--sl-page-primary)` (foundation + page override)
- Hero supporting `h2` (tagline) may stay single-colour primary (exclude with `:not(.…-hero__subheading)`)
- Match desktop span split exactly (e.g. lifecycle: `…Around the` + `<span>Employee Lifecycle</span>`)

### Other type

- Eyebrow: `<span class="sl-home-sub-heading">`
- Card / panel titles: prefer `h3.sl-panel-title` (24px)
- Product labels (suite cards): **normal casing** as written (`S-Aware`, not `S-AWARE`). Do **not** use `text-transform: uppercase` on `.sl-suite-product-label`
- Suite cards: match desktop panel header only (product label + title + subtitle). Do **not** show nav taglines (`Enterprise Integrations`, etc.) above the h3
- Copy: **no em dashes** (`—`) or AI-style en-dash asides; use commas, colons, parentheses, or a second sentence

---

## 8. FAQ (global AMP accordion)

Use `succeedlearn_amp_render_faq_accordion( $items )` from `includes/functions-faq.php`.

Rules:

- Markup / styles from **global** FAQ only (`.sl-amp-faq*`) — no page-local accordion chrome
- **First item open by default** (`expanded` on first section)
- Accordion must include `disable-session-states` so a previously closed first item does not stay closed on reload
- Use `expand-single-section` (one open at a time)
- Toggle `+` / `−` must sit at the **right end of the question row**, with right padding — not immediately after the question text (`justify-content: space-between` + `::after` with `margin-left: auto`)
- Desktop FAQ: `template-parts/global/faq.php` with `open_first => true` and `data-faq-open-first`

---

## 9. Tables / comparison cells

- Cell content: **`text-align: left`** on all viewports (not center)
- Headers may stay bold/coloured; body cells left-aligned
- Example: `.sl-sa-comparison__cell`, `.sl-sa-comparison__table th, td`

---

## 10. AMP-only constraints (critical)

| Desktop | AMP |
|---|---|
| `<img>` | `<amp-img width="" height="" layout="responsive" or layout="fixed">` |
| `<a href="#contact">` scroll | `<button type="button" class="sl-btn" <?php echo succeedlearn_amp_scroll_tap_attr('contact'); ?>>` |
| Custom JS / onclick | **Forbidden** — AMP actions (`on="tap:..."`) or allowed components only |
| CSS enqueue | Inlined in `<style amp-custom>` via `succeedlearn_amp_output_page_styles()` |
| `akaza_upload_url()` | `succeedlearn_amp_upload_url( '2026/08/file.webp' )` |
| Text domain `akaza-adventure` | **`succeedlearn-amp`** |
| Hardcoded content | Prefer shared data helpers in `templates/data/` |

- No inline `onclick`, custom `<script>`, or `<video>` on sections
- CTA tracking: add `data-cta="hero-trial"` on buttons/links
- Images: always explicit `width` + `height`; decorative icons `alt=""`

---

## 11. CSS authoring

- Put CSS in `templates/styles/*.php` — minified single-line blocks OK (see `home-sections.php`)
- Shared auto-loaded: listed in §4
- Page-specific styles: pass in `$always_inline` array to `succeedlearn_amp_output_page_styles()`
- **New class selectors** must be added to `includes/class-plugin.php` → `whitelist_home_css_for_tree_shaking()` or production CSS may be stripped
- Keep CSS lean — `amp-custom` has ~75KB limit
- Hero background URLs: append after `succeedlearn_amp_output_page_styles()` in page template
- Prefer CSS variables (`--sl-page-*`, `--sl-fs-hero-h1`, `--slf-font-body`) over one-off hex/size sprawl

---

## 12. Card chrome, callouts, icons

- Card border: `1px solid rgba(107, 124, 147, 0.18)`; radius ~14–18px
- Optional top accent: `border-top: 3px solid var(--sl-page-primary)`
- Important callouts: `.sl-highlight` (do not invent local highlight chrome)
- Callout block alternative (left bar) only when desktop uses it:

```css
.example__callout {
  padding: 22px 26px;
  border-left: 5px solid var(--sl-page-primary, #1472ba);
  border-radius: 0 14px 14px 0;
  background: rgba(109, 195, 235, 0.16);
}
```

- Icons: plain, no circle/bg by default; consistent size (e.g. 32×32 `layout="fixed"`)

---

## 13. Forms & contact

- `do_shortcode( '[contact_form]' )` or `succeedlearn_amp_render_contact_form()`
- Layout: `.sl-contact-layout` + `.sl-contact-intro` + `.sl-contact-form-card`
- Contact section: `id="contact"`; scroll CTAs use `succeedlearn_amp_scroll_tap_attr( 'contact' )`
- Declare `amp-form`, `amp-mustache`, `amp-lightbox` in `succeedlearn_amp_output_components()` when form is present

---

## 14. PHP partial template

```php
<?php
/**
 * Page AMP — Section name.
 * Expected vars: $foo
 * @package SucceedLEARN\AMP
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-*-section" aria-labelledby="section-title-id">
  <div class="sl-wrap">
    <span class="sl-home-sub-heading"><?php esc_html_e( 'Eyebrow', 'succeedlearn-amp' ); ?></span>
    <h2 id="section-title-id" class="sl-h2">
      <?php esc_html_e( 'Main words', 'succeedlearn-amp' ); ?>
      <span><?php esc_html_e( 'accent words', 'succeedlearn-amp' ); ?></span>
    </h2>
  </div>
</section>
```

- Escape: `esc_html`, `esc_url`, `esc_attr`, `esc_html_e`, `wp_kses_post`
- Reuse data from `templates/data/{page}.php` — don't duplicate content
- Decorative icons: `alt=""` + `aria-hidden="true"`

---

## 15. What NOT to do

- No Bootstrap grid
- No `<img>`, custom JS, inline event handlers
- No off-brand colours
- No accordion/carousel unless AMP component is explicitly loaded
- No copying from `_incoming/live-amp/` legacy templates
- No separate CSS file enqueues
- No re-declaring global button fills, panel-title size, highlight chrome, list chrome, or FAQ toggle styles in page CSS
- No hero `h1` shrunk to 24–28px; no `font-weight: 800` on hero titles
- No `text-transform: uppercase` on product labels meant to read as normal words
- No image-above-text on stacked AMP sections
- No centered comparison body cells (left-align)
- No dashboard clutter in heroes unless desktop has it (Security Awareness dashboard mock is the exception)

---

## 16. Output format

When I ask you to build or port a section, return:

1. **PHP partial** — full file for `templates/partials/{page}/{section}.php`
2. **CSS block** — minified rules to add to the correct `templates/styles/` file (layout only)
3. **Data changes** — if arrays/helpers needed in `templates/data/{page}.php`
4. **Whitelist additions** — any new CSS selectors for `class-plugin.php`
5. **Page wiring** — if the partial must be included in `templates/pages/{page}.php`

---

## 17. Checklist (verify before finishing)

- [ ] Section order + copy matches desktop theme partial
- [ ] Uses `sl-section` / `sl-wrap` / shared grid classes
- [ ] Dual-colour `h2` with direct-child `<span>` where accent words exist
- [ ] Hero `h1` uses `--sl-fs-hero-h1`, weight 700
- [ ] Text-then-image on stacked mobile; no mobile `order: -1` on media
- [ ] Reuses global UI (panel-title, highlight, list, buttons, FAQ helper) — no local clones
- [ ] Font is Space Grotesk via global tokens (no Arial-primary stack)
- [ ] FAQ: first item expanded + `disable-session-states`; toggle at end of row
- [ ] Comparison / table cells left-aligned
- [ ] Product labels normal case (no forced uppercase); suite cards match desktop headers
- [ ] All images are `amp-img` with width/height
- [ ] Scroll CTAs use `succeedlearn_amp_scroll_tap_attr()`
- [ ] CSS in correct `templates/styles/` partial; new selectors whitelisted
- [ ] Brand tokens only; card `__head` min-heights for equal alignment
- [ ] No em dashes in copy

--- END PROMPT ---

---

## Example follow-up message (paste after the prompt)

```
Port this desktop section to AMP. Return the PHP partial, CSS, and any wiring changes.

[Paste desktop template-parts code here]

Target page: security-awareness
Section name: achieve
```

### Infosec 2026 Cyber follow-up (use this for that page)

```
Port this desktop Infosec section to AMP.

Target page folder: infosec-2026-cyber
Body class: sl-infosec-2026-cyber-page
Partial loader: succeedlearn_amp_infosec_partial( '{section}' )
Partial path: templates/partials/infosec-2026-cyber/{section}.php
Styles file: templates/styles/infosec-2026-cyber.php
Data file: templates/data/infosec-2026-cyber.php (only add helpers if arrays/image URLs are needed; otherwise keep copy inline in the partial)
Text domain: succeedlearn-amp
Replace desktop .container with .sl-wrap
Keep desktop BEM classes (sl-infosec-2026-cyber-*, sl-infosec-challenge*, etc.)
Do not invent a shorter page class like .sl-infosec-cyber-page

Section name: campaign
[Paste desktop PHP from template-parts/infosec-2026-cyber/sl-infosec-2026-cyber-campaign.php]
[Paste desktop CSS from assets/css/infosec-2026-cyber/sl-infosec-2026-cyber-campaign.css]
```

### SAP (Security Awareness) follow-up

```
Port / update this SAP AMP section.

Target page: security-awareness
Body class: sl-sap-page
Partial loader: succeedlearn_amp_sa_partial( '{section}' )
Partial path: templates/partials/security-awareness/{section}.php
Styles file: templates/styles/security-awareness.php
Data file: templates/data/security-awareness.php
Text domain: succeedlearn-amp
Reuse globals; page CSS = layout only
```
