<?php
/**
 * Defensive Driving course — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-dd-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff}
.sl-dd-page .sl-eyebrow{color:var(--sl-page-primary)}
.sl-dd-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-dd-hero{position:relative;padding:16px;background:var(--sl-page-navy);color:var(--sl-page-white);overflow:hidden}
.sl-dd-hero__bg{position:absolute;inset:0;z-index:0;opacity:.35}
.sl-dd-hero__overlay{position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(22,35,78,.98) 0%,rgba(22,35,78,.88) 45%,rgba(22,35,78,.55) 100%)}
.sl-dd-hero__grid{position:relative;z-index:2;display:grid;gap:28px;align-items:start}
.sl-dd-hero__eyebrow{display:inline-flex;align-items:center;gap:10px;margin:0 0 14px;font-size:13px;font-weight:600;color:#6dc3eb;text-transform:uppercase;letter-spacing:.04em}
.sl-dd-hero__eyebrow::before{content:"";width:28px;height:2px;background:#6dc3eb;border-radius:999px}
.sl-dd-hero__title{margin:0 0 14px;font-size:30px;line-height:1.15;color:var(--sl-page-white)}
.sl-dd-hero__title span{display:block;color:#6dc3eb}
.sl-dd-hero__desc{margin:0 0 20px;font-size:16px;line-height:1.65;color:rgba(255,255,255,.88);max-width:640px}
.sl-dd-hero__meta{display:flex;flex-wrap:wrap;gap:10px;margin:0 0 22px;padding:0;list-style:none}
.sl-dd-hero__meta li{padding:8px 12px;border:1px solid rgba(255,255,255,.18);border-radius:999px;font-size:13px;color:rgba(255,255,255,.82)}
.sl-dd-hero__actions{display:flex;flex-wrap:wrap;gap:12px}
.sl-dd-hero__cta-group{display:grid;gap:8px}
.sl-dd-hero__cta-label{font-size:12px;font-weight:600;color:rgba(255,255,255,.68);text-transform:uppercase;letter-spacing:.04em}
.sl-dd-course-card{background:var(--sl-page-white);border-radius:16px;padding:20px;color:var(--sl-page-navy);box-shadow:0 16px 40px rgba(8,13,48,.24)}
.sl-dd-course-card__badge{display:inline-block;margin:0 0 10px;padding:6px 12px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:12px;font-weight:600}
.sl-dd-course-card__title{margin:0 0 8px;font-size:20px;color:var(--sl-page-navy)}
.sl-dd-course-card__desc{margin:0 0 16px;font-size:14px;line-height:1.55;color:var(--sl-page-muted)}
.sl-dd-course-card__stats{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin:0 0 16px;padding:0;list-style:none}
.sl-dd-course-card__stats li{padding:12px;border-radius:12px;background:var(--sl-page-bg)}
.sl-dd-course-card__stats strong{display:block;font-size:16px;color:var(--sl-page-navy)}
.sl-dd-course-card__stats span{display:block;margin-top:4px;font-size:12px;color:var(--sl-page-muted)}
.sl-dd-course-card__features{display:flex;flex-wrap:wrap;gap:8px;margin:0;padding:0;list-style:none}
.sl-dd-course-card__features li{padding:6px 10px;border-radius:999px;background:rgba(20,114,186,.1);color:var(--sl-page-primary);font-size:12px;font-weight:600}
@media(min-width:900px){.sl-dd-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.85fr);align-items:center}.sl-dd-hero__title{font-size:38px}}
.sl-dd-highlights{display:grid;gap:14px}
@media(min-width:700px){.sl-dd-highlights{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(min-width:1000px){.sl-dd-highlights{grid-template-columns:repeat(4,minmax(0,1fr))}}
.sl-dd-highlight{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-top:3px solid var(--sl-page-primary);border-radius:14px;padding:18px;height:100%;display:flex;flex-direction:column}
.sl-dd-highlight__num{font-size:13px;font-weight:700;color:var(--sl-page-primary);margin-bottom:10px}
.sl-dd-highlight h3{margin:0 0 8px;font-size:18px;color:var(--sl-page-navy)}
.sl-dd-highlight p{margin:0;font-size:14px;line-height:1.6;color:var(--sl-page-text)}
.sl-dd-risk-intro{margin-bottom:22px}
.sl-dd-risk-intro__eyebrow{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;color:var(--sl-page-primary)}
.sl-dd-risk-intro h2{margin:0 0 12px;font-size:28px;line-height:1.2;color:var(--sl-page-navy)}
.sl-dd-risk-intro h2 span{display:block;color:var(--sl-page-primary)}
.sl-dd-risk-intro p{margin:0;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-dd-risk-grid{display:grid;gap:14px}
@media(min-width:700px){.sl-dd-risk-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(min-width:1000px){.sl-dd-risk-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
.sl-dd-risk-card{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-radius:14px;padding:18px;height:100%}
.sl-dd-risk-card__icon{width:36px;height:36px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);display:flex;align-items:center;justify-content:center;font-size:16px;margin-bottom:10px}
.sl-dd-risk-card h3{margin:0 0 8px;font-size:18px;color:var(--sl-page-primary)}
.sl-dd-risk-card p{margin:0;font-size:14px;line-height:1.6;color:var(--sl-page-text)}
.sl-dd-section-head{margin-bottom:22px}
.sl-dd-section-head__eyebrow{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;color:var(--sl-page-primary)}
.sl-dd-section-head h2{margin:0 0 10px;font-size:28px;line-height:1.2;color:var(--sl-page-navy)}
.sl-dd-section-head h2 span{color:var(--sl-page-primary)}
.sl-dd-section-head p{margin:0;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-dd-modules{display:grid;gap:12px}
@media(min-width:768px){.sl-dd-modules{grid-template-columns:repeat(2,minmax(0,1fr))}}
.sl-dd-module{display:grid;grid-template-columns:auto 1fr;gap:14px;padding:16px 18px;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white)}
.sl-dd-module__num{width:36px;height:36px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700}
.sl-dd-module h3{margin:0 0 4px;font-size:16px;color:var(--sl-page-navy)}
.sl-dd-module p{margin:0;font-size:14px;line-height:1.55;color:var(--sl-page-muted)}
.sl-dd-split{display:grid;gap:24px;align-items:center}
@media(min-width:900px){.sl-dd-split{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr)}.sl-dd-split--reverse .sl-dd-split__media{order:2}}
.sl-dd-split amp-img{border-radius:18px;overflow:hidden;border:1px solid rgba(107,124,147,.18)}
.sl-dd-points{margin:16px 0 0;padding:0;list-style:none;display:grid;gap:12px}
.sl-dd-points li{display:flex;gap:10px;align-items:flex-start;font-size:15px;line-height:1.55;color:var(--sl-page-text)}
.sl-dd-points li::before{content:"";width:8px;height:8px;margin-top:8px;border-radius:50%;background:var(--sl-page-primary);flex:0 0 auto}
.sl-dd-regions{display:grid;gap:12px}
@media(min-width:700px){.sl-dd-regions{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(min-width:1000px){.sl-dd-regions{grid-template-columns:repeat(3,minmax(0,1fr))}}
.sl-dd-region{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-radius:14px;padding:16px;height:100%}
.sl-dd-region__code{display:inline-block;margin:0 0 8px;padding:4px 10px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:12px;font-weight:700}
.sl-dd-region h3{margin:0 0 6px;font-size:16px;color:var(--sl-page-navy)}
.sl-dd-region p{margin:0;font-size:14px;line-height:1.55;color:var(--sl-page-text)}
.sl-dd-callout{margin-top:18px;padding:18px 20px;border-left:5px solid var(--sl-page-primary);border-radius:0 14px 14px 0;background:var(--sl-page-primary-soft)}
.sl-dd-callout h3{margin:0 0 8px;font-size:16px;color:var(--sl-page-navy)}
.sl-dd-callout p{margin:0;font-size:14px;line-height:1.6;color:var(--sl-page-text)}
.sl-dd-note{margin-top:16px;font-size:13px;line-height:1.6;color:var(--sl-page-muted);font-style:italic}
.sl-dd-audience-badge{display:inline-block;margin:0 0 16px;padding:12px 16px;border-radius:12px;background:var(--sl-page-primary-soft);color:var(--sl-page-navy);font-size:14px;line-height:1.5}
.sl-dd-audience-badge strong{display:block;font-size:18px;color:var(--sl-page-primary)}
.sl-dd-delivery-grid{display:grid;gap:14px}
@media(min-width:700px){.sl-dd-delivery-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
.sl-dd-delivery-card{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-radius:14px;padding:18px;height:100%}
.sl-dd-delivery-card__icon{width:36px;height:36px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);display:flex;align-items:center;justify-content:center;font-size:16px;margin-bottom:10px}
.sl-dd-delivery-card h3{margin:0 0 8px;font-size:18px;color:var(--sl-page-primary)}
.sl-dd-delivery-card p{margin:0;font-size:14px;line-height:1.6;color:var(--sl-page-text)}
.sl-dd-faq{margin-top:8px}
.sl-dd-cta-panel{text-align:center;padding:36px 24px;border-radius:18px;background:linear-gradient(180deg,var(--sl-page-bg) 0%,var(--sl-page-white) 100%);border:1px solid rgba(107,124,147,.18)}
.sl-dd-cta-panel .sl-h2{color:var(--sl-page-navy)}
.sl-dd-cta-points{display:flex;flex-wrap:wrap;justify-content:center;gap:10px;margin:16px 0 0;padding:0;list-style:none}
.sl-dd-cta-points li{padding:8px 14px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:600}
.sl-dd-page .sl-gwct-contact-direct{display:grid;gap:10px;margin-top:16px}
.sl-dd-page .sl-gwct-contact-direct a{display:flex;gap:12px;align-items:center;padding:14px 16px;border:1px solid rgba(107,124,147,.18);border-radius:12px;text-decoration:none;color:var(--sl-page-navy);background:var(--sl-page-white)}
.sl-dd-page .sl-gwct-contact-direct__title{display:block;font-size:13px;color:var(--sl-page-muted)}
.sl-dd-page .sl-gwct-contact-direct__value{display:block;font-size:15px;font-weight:600;color:var(--sl-page-navy)}
