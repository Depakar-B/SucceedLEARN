<?php
/**
 * Shared .pfe course page styles (matches posh-training-for-employees AMP UI).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.pfe{--bg:#fff;--text:#0d2238;--muted:#54708d;--line:#d9e6f6;--container:min(1290px,100%);background:var(--bg);color:var(--text);font-family:"Inter","Segoe UI",Arial,sans-serif;overflow-x:hidden;padding:0 0 22px}
.pfe *{box-sizing:border-box}.pfe a{text-decoration:none}.pfe-wrap{width:var(--container);margin:0 auto}
.pfe-hero,.pfe-section,.pfe-section-sm{padding:18px 16px}
.pfe-title{margin:0 0 12px;font-size:clamp(1.5rem,1.1rem + 1.3vw,2.1rem);line-height:1.2;color:var(--text)}
.pfe-sub{margin:0;color:var(--muted);line-height:1.75;font-size:16px}
.btn-primary{display:inline-block;background:var(--posh-demo-btn-bg,#01465d);color:#fff;padding:10px 18px;border-radius:8px;font-weight:700}
.pfe-hero{background:radial-gradient(900px 460px at 0% 0%,rgba(47,144,239,.14),transparent 70%),radial-gradient(900px 460px at 100% 0%,rgba(10,154,116,.1),transparent 72%),#fff}
.pfe-hero-grid,.pfe-grid-2{display:grid;grid-template-columns:1fr;gap:16px}
.pfe-hero-grid > *{min-width:0}
.pfe-hero-gallery{display:grid;grid-template-columns:1fr;gap:12px;width:100%;min-width:0;margin-top:8px}
.pfe-hero-gallery .pfe-image-card{border:1px solid var(--line);border-radius:12px}
.pfe-why-gallery{display:grid;grid-template-columns:1fr;gap:16px;width:100%;min-width:0;margin-top:8px}
.pfe-kicker{display:inline-flex;align-items:center;flex-wrap:wrap;gap:4px 6px;max-width:100%;padding:5px 11px;margin:0 0 10px;border-radius:999px;background:rgba(234,244,255,.9);border:1px solid #d4e8fb;color:#0c5fae;font-size:11px;font-weight:600;line-height:1.4;text-transform:uppercase;letter-spacing:.02em}
.pfe-kicker span{font-size:inherit;font-weight:inherit}
.pfe .ep-breadcrumbs{margin-bottom:10px;color:#000;font-weight:600}
.pfe .ep-breadcrumbs a{color:#000;text-decoration:none;font-weight:600}
.pfe .ep-breadcrumbs a:hover,.pfe .ep-breadcrumbs a:focus-visible{color:#1472ba;text-decoration:underline}
.pfe .ep-breadcrumbs__current{color:#1472ba;font-weight:600}
.pfe .ep-breadcrumbs__sep{color:#000}
.pfe-inline-highlight{font-weight:800;color:#0d73d4;white-space:nowrap;text-transform:uppercase}
.pfe-hero h1{margin:0 0 14px;font-size:clamp(1.85rem,1.2rem + 2.2vw,3rem);line-height:1.12}
.pfe-hero p{margin:0 0 14px;color:var(--muted);font-size:16px;line-height:1.8}
.pfe-hero p:last-of-type{margin-bottom:0}
.pfe-hero-actions{margin-top:22px;display:flex;flex-wrap:wrap;gap:10px;align-items:center}
.pfe-carousel{background:#fff;border:1px solid var(--line);border-radius:18px;box-shadow:0 8px 24px rgba(11,35,58,.08);overflow:hidden;position:relative;width:100%;min-width:0;margin-top:8px;aspect-ratio:16/10}
.pfe-carousel__track,.pfe-carousel amp-carousel{display:block;width:100%;height:100%}
.pfe-carousel__slide{display:flex;align-items:center;justify-content:center;padding:12px;background:#fff;min-height:100%}
.pfe-carousel__slide amp-img{display:block;width:100%;border-radius:12px}
.pfe-card,.pfe-info-panel{background:#fff;border:0;border-radius:14px;padding:22px;box-shadow:0 8px 24px rgba(11,35,58,.08)}
.ep-cta-shell--white{background:#fff;border:1px solid #d7e8fb;box-shadow:0 10px 28px rgba(11,35,58,.08)}
.pfe-card h3,.pfe-info-panel h3{margin:0 0 12px;font-size:1.04rem;line-height:1.35;color:#10273f}
.pfe-list{list-style:none;margin:0;padding:0}
.pfe-list li{position:relative;padding-left:22px;margin:0 0 8px;line-height:1.75;color:#2f4358}
.pfe-list li::before{content:"✓";position:absolute;left:0;top:0;color:#123456;font-weight:700}
.pfe-image-card{overflow:hidden;box-shadow:0 8px 24px rgba(11,35,58,.08);margin:0;background:#fff;border:0;border-radius:14px}
.pfe-image-card > amp-img{display:block;width:100%;max-width:100%}
.pfe-video{margin-top:18px;border-radius:14px;overflow:hidden;box-shadow:0 8px 24px rgba(11,35,58,.08)}
.pfe-demo-cta{padding:20px;background:linear-gradient(125deg,#f7fbff 0%,#eff7ff 50%,#f4fffa 100%);box-shadow:0 16px 34px rgba(12,42,72,.12);border-radius:14px;text-align:center}
@media (min-width:481px){.pfe-hero-gallery{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}}
@media (min-width:641px){.pfe-hero,.pfe-section,.pfe-section-sm{padding:24px 20px}.pfe-why-gallery{grid-template-columns:repeat(2,minmax(0,1fr))}.pfe-hero-gallery{gap:16px}.pfe-grid-2{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media (min-width:641px) and (max-width:1024px){.pfe-hero-grid > .pfe-why-gallery{grid-column:1/-1;width:100%;max-width:none;margin:0}.pfe-hero-grid > .pfe-hero-gallery{grid-column:1/-1;width:100%;max-width:none;margin:0;gap:20px}.pfe-hero-grid{gap:24px}}
@media (min-width:1025px){.pfe-hero-grid{grid-template-columns:1.1fr .9fr}.pfe-hero-grid > .pfe-why-gallery,.pfe-hero-grid > .pfe-hero-gallery{grid-column:auto;width:100%;max-width:none;margin-top:8px}}
@media (max-width:640px){.pfe-wrap{width:min(1290px,100%)}.pfe-hero-actions a,.btn-primary{width:100%;text-align:center}.pfe-card{padding:16px}.pfe-card.pocso-outcomes-card{padding:0;background:transparent;border:0;border-radius:0;box-shadow:none}.pfe-info-panel{padding:0;background:transparent;border:0;border-radius:0;box-shadow:none}}
<?php elearnposh_amp_output_top_courses_styles(); ?>
