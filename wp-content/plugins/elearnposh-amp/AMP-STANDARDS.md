# Google AMP coding standards (eLearnPOSH AMP plugin)

All templates and components in this plugin must follow the official AMP HTML specification.

**References:**
- [AMP HTML Specification](https://amp.dev/documentation/guides-and-tutorials/learn/spec/amphtml/)
- [AMP Actions and events](https://amp.dev/documentation/guides-and-tutorials/learn/interactivity-course/triggering_actions)
- [AMP Validator](https://validator.ampproject.org/)
- [Search Console AMP report](https://search.google.com/search-console/amp)

## Document structure

- Valid AMP HTML: `<html amp>` (or `⚡`), mandatory AMP runtime script, `amp-boilerplate`, and `<style amp-custom>` (max 75KB).
- Every AMP page must have **exactly one** `<link rel="canonical" href="...">` pointing to the non-AMP URL.
  - Templates that call `do_action( 'amp_post_template_head', $this )` must **not** add a manual canonical — AMPforWP injects it.
  - Standalone templates (e.g. `single-newsletter.php`) must include canonical themselves.
- Include viewport meta: `width=device-width,minimum-scale=1,initial-scale=1`.
- Load extended components only when needed via `<script async custom-element="..." src="https://cdn.ampproject.org/v0/...">`.

## Google Search Console — known critical issues (fix checklist)

| Search Console issue | Cause | Required fix |
|---|---|---|
| `tabindex` / `role` missing with `on` attribute | Interactive AMP actions on non-native elements | Add `role="button"` and `tabindex="0"` on any element with `on="tap:..."` that is not an exempt `amp-*` component. Native `<button>` / `<a>` must still include `tabindex="0"`. |
| Disallowed attribute or attribute value | Inline `style` with `!important`, invalid attrs on tags | Never use `!important` in inline `style=""`. Put styles in `templates/styles/*.php` inside `<style amp-custom>`. |
| Only `amp-boilerplate` and `amp-custom` in `<head>` | Extra `<style>` in body or head | All CSS in one `amp-custom` block in `<head>`. No raw `<style>` in body. |
| Referenced AMP URL is not an AMP | Broken AMP HTML on linked URLs | Validate every template before deploy (`#development=1` or validator.ampproject.org). |
| `iframe` must be `amp-iframe` | Raw embeds in post content | Convert to `<amp-iframe layout="fill" sandbox="allow-scripts allow-same-origin">` or use `amp-youtube`. |
| Duplicate `link rel=canonical` | Manual canonical + AMPforWP canonical | One canonical only — rely on `amp_post_template_head` when present. |

The plugin runs `elearnposh_amp_sanitize_amp_html()` on all AMP output as a safety net (see `includes/functions-performance.php`).

## Forbidden in AMP templates

- No author `<script>` (except `application/ld+json` and AMP component scripts).
- No `<img>` — use `<amp-img>`; no `<video>` — use `<amp-video>` or `<amp-youtube>`; no `<iframe>` — use `<amp-iframe>`.
- No inline `onclick` / `on*` HTML event attributes; use `on="tap:..."` AMP actions when interactivity is required.
- No `!important` in **inline** styles (allowed inside `<style amp-custom>` only).
- No `@import` in stylesheets.
- External stylesheets are disallowed except allowlisted font providers (e.g. Google Fonts).

## AMP actions (`on="..."`)

```html
<!-- Correct: native button with explicit focus -->
<button type="button" on="tap:my-lightbox.open" role="button" tabindex="0">Open</button>

<!-- Correct: non-interactive element made accessible -->
<div on="tap:my-lightbox.open" role="button" tabindex="0">Open</div>

<!-- Correct: amp-img lightbox (use helper) -->
<amp-img <?php echo elearnposh_amp_image_lightbox_attrs(); ?> ...></amp-img>
```

Exempt: `amp-position-observer`, `amp-bind` targets, and other AMP components that declare `on` in the spec.

## Images (`amp-img`)

- Always set `width`, `height`, and `layout` so the runtime can reserve space before load.
- Prefer `layout="responsive"` for full-width images with known aspect ratio.
- For avatars/thumbnails in fixed-size boxes: wrap in a `position: relative` container with explicit `width`/`height`, use `layout="fill"` on `amp-img`, and set `object-fit="cover"` or `object-fit="contain"`.
- Use `srcset` + `sizes` for art-directed responsive images when multiple assets exist.
- External links from `<a>` must use `target="_blank"` when `href` is set.

## Forms

- Use `<form>` only with the `amp-form` extension loaded.
- Submit via `action-xhr` to a CORS-enabled HTTPS endpoint; handle success/error with `<div submit-success>` / `<div submit-error>` and `amp-mustache` templates.
- Never use custom JavaScript for form handling.

## CSS

- All custom styles go in a single `<style amp-custom>` block (or project style partials inlined there).
- Only GPU-accelerated properties may be animated: `opacity`, `transform`.
- Do not style internal AMP classes (`i-amp-*`, `-amp-*`).
- Component markup (`templates/components/`) must use CSS classes — **no inline `style=""` attributes**.

## `amp-accordion`

- Direct children must be `<section>` elements only.
- First child of each `<section>` is the header (e.g. `<h4>`); remaining content is the panel.
- Do not nest disallowed tags as direct children of `<amp-accordion>` (only `<section>`).

## Components & performance

- Register only required AMP components per page via `elearnposh_amp_output_components()`.
- Prefer AMP components over HTML equivalents; validate with AMP Validator or `#development=1` before shipping.

## Plugin conventions

- Page templates: `templates/pages/`
- Shared shell: `templates/partials/amp-page-shell-start.php`
- Reusable UI: `templates/components/`
- Inline CSS partials: `templates/styles/`
- Route new pages in `includes/class-template-manager.php` and `includes/class-config.php`
- Match theme page content but adapt interactivity to AMP-safe patterns (e.g. `amp-youtube` instead of HTML5 `<video>`).

## Pre-deploy validation

1. Open any AMP URL with `#development=1` appended — fix all console validator errors.
2. Run [validator.ampproject.org](https://validator.ampproject.org/) on homepage, a course page, blog, and newsletter.
3. Re-check Google Search Console → Experience → AMP after deploy (allow 3–7 days for recrawl).
