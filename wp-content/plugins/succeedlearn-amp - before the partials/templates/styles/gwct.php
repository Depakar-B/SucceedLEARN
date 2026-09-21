<?php
/**
 * Global Workplace Compliance Training — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-gwct-page{--sl-page-navy:#16234e;--sl-page-primary:#0e9f4a;--sl-page-primary-dark:#0d723b;--sl-page-primary-soft:rgba(105,190,85,.16);--sl-page-cta:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#F5F3EF;--sl-page-white:#fff}
.sl-gwct-page .sl-eyebrow{color:var(--sl-page-primary)}
.sl-gwct-page .sl-btn--primary{background:var(--sl-page-primary)}
.sl-gwct-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-gwct-page .sl-stat__value{color:var(--sl-page-cta)}
.sl-gwct-page .sl-clients__title span{color:var(--sl-page-cta)}
.sl-gwct-hero{padding:88px 16px 40px;background:var(--sl-page-white)}
.sl-gwct-hero__grid{display:grid;gap:28px;align-items:center}
.sl-gwct-hero__eyebrow{display:inline-block;margin:0 0 12px;padding:8px 14px;border:1px solid rgba(107,124,147,.22);border-radius:999px;font-size:13px;font-weight:600;color:var(--sl-page-primary);background:var(--sl-page-white)}
.sl-gwct-hero__title{margin:0 0 10px;font-size:30px;line-height:1.2;color:var(--sl-page-navy)}
.sl-gwct-hero__subtitle{margin:0 0 14px;font-size:20px;line-height:1.35;color:var(--sl-page-primary)}
.sl-gwct-hero__desc{margin:0 0 20px;font-size:16px;line-height:1.65;color:var(--sl-page-text)}
.sl-gwct-hero__actions{display:flex;flex-wrap:wrap;gap:12px}
.sl-gwct-hero__media amp-img{border-radius:18px;overflow:hidden;border:1px solid rgba(107,124,147,.18)}
@media(min-width:900px){.sl-gwct-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr)}.sl-gwct-hero__title{font-size:38px}}
.sl-gwct-dashboard{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-radius:16px;padding:18px;box-shadow:0 12px 32px rgba(22,35,78,.08)}
.sl-gwct-dashboard__head{display:flex;gap:12px;align-items:flex-start;margin-bottom:14px}
.sl-gwct-dashboard__icon{width:42px;height:42px;border-radius:12px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:18px}
.sl-gwct-dashboard__label{margin:0 0 4px;font-size:12px;color:var(--sl-page-muted);text-transform:uppercase;letter-spacing:.04em}
.sl-gwct-dashboard__title{margin:0;font-size:18px;color:var(--sl-page-navy)}
.sl-gwct-dashboard__bar{height:8px;border-radius:999px;background:rgba(107,124,147,.16);overflow:hidden;margin:10px 0}
.sl-gwct-dashboard__bar span{display:block;height:100%;background:var(--sl-page-primary);border-radius:999px}
.sl-gwct-dashboard__meta{display:flex;justify-content:space-between;gap:12px;font-size:13px;color:var(--sl-page-muted)}
.sl-gwct-dashboard__meta strong{color:var(--sl-page-navy);font-size:16px}
.sl-gwct-dashboard__items{display:grid;gap:10px;margin-top:14px}
.sl-gwct-dashboard__item{display:grid;grid-template-columns:auto 1fr auto;gap:10px;align-items:center;padding:10px 12px;border-radius:12px;background:var(--sl-page-bg)}
.sl-gwct-dashboard__item strong{display:block;font-size:14px;color:var(--sl-page-navy)}
.sl-gwct-dashboard__item small{display:block;font-size:12px;color:var(--sl-page-muted)}
.sl-gwct-dashboard__item.is-pending{opacity:.85}
.sl-gwct-points{margin:16px 0 0;padding:0;list-style:none;display:grid;gap:12px}
.sl-gwct-points li{display:flex;gap:10px;align-items:flex-start;font-size:15px;line-height:1.55;color:var(--sl-page-text)}
.sl-gwct-points li::before{content:"";width:8px;height:8px;margin-top:8px;border-radius:50%;background:var(--sl-page-primary);flex:0 0 auto}
.sl-gwct-split{display:grid;gap:24px;align-items:center}
@media(min-width:900px){.sl-gwct-split{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr)}.sl-gwct-split--reverse .sl-gwct-split__visual{order:2}}
.sl-gwct-cta-panel{text-align:center;padding:36px 24px;border-radius:18px;background:linear-gradient(180deg,var(--sl-page-bg) 0%,var(--sl-page-white) 100%);border:1px solid rgba(107,124,147,.18)}
.sl-gwct-cta-panel .sl-h2{color:var(--sl-page-navy)}
.sl-gwct-solutions{display:grid;gap:18px}
.sl-gwct-solution{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-top:3px solid var(--sl-page-primary);border-radius:16px;padding:22px}
.sl-gwct-solution h3{margin:0 0 8px;font-size:20px;color:var(--sl-page-primary)}
.sl-gwct-solution__subtitle{margin:0 0 12px;font-size:15px;line-height:1.55;color:var(--sl-page-navy);font-weight:600}
.sl-gwct-solution p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-gwct-solution ul{margin:0;padding:0;list-style:none;display:grid;gap:8px}
.sl-gwct-solution li{position:relative;padding-left:18px;font-size:14px;line-height:1.55;color:var(--sl-page-text)}
.sl-gwct-solution li::before{content:"";position:absolute;left:0;top:9px;width:8px;height:8px;border-radius:50%;background:var(--sl-page-primary)}
.sl-gwct-solution__meta{margin-top:16px}
@media(min-width:768px){.sl-gwct-solution__meta{grid-template-columns:1fr 1fr}}
.sl-gwct-solution__block h4{margin:0 0 10px;font-size:14px;color:var(--sl-page-navy)}
.sl-gwct-why-grid{display:grid;gap:14px}
@media(min-width:700px){.sl-gwct-why-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(min-width:1000px){.sl-gwct-why-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
.sl-gwct-why-card{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-radius:14px;padding:18px;height:100%}
.sl-gwct-why-card h3{margin:0 0 8px;font-size:18px;color:var(--sl-page-primary)}
.sl-gwct-why-card p{margin:0;font-size:14px;line-height:1.6;color:var(--sl-page-text)}
.sl-gwct-callout{margin-top:16px;padding:18px 20px;border-left:5px solid var(--sl-page-primary);border-radius:0 14px 14px 0;background:var(--sl-page-primary-soft)}
.sl-gwct-callout strong{color:var(--sl-page-navy)}
.sl-gwct-faq amp-accordion section{border:1px solid rgba(107,124,147,.18);border-radius:12px;margin-bottom:10px;background:var(--sl-page-white);overflow:hidden}
.sl-gwct-faq amp-accordion h3{margin:0;padding:16px 18px;font-size:15px;line-height:1.45;color:var(--sl-page-navy);background:var(--sl-page-white);border:0}
.sl-gwct-faq amp-accordion div{padding:0 18px 16px;font-size:14px;line-height:1.65;color:var(--sl-page-text)}
.sl-gwct-contact-note{margin:16px 0;padding:16px 18px;border-radius:12px;background:var(--sl-page-primary-soft);font-size:14px;line-height:1.6;color:var(--sl-page-text)}
.sl-gwct-contact-note strong{display:block;margin-bottom:4px;color:var(--sl-page-navy)}
.sl-gwct-contact-direct{display:grid;gap:10px;margin-top:16px}
.sl-gwct-contact-direct a{display:flex;gap:12px;align-items:center;padding:14px 16px;border:1px solid rgba(107,124,147,.18);border-radius:12px;text-decoration:none;color:var(--sl-page-navy);background:var(--sl-page-white)}
.sl-gwct-contact-direct__title{display:block;font-size:13px;color:var(--sl-page-muted)}
.sl-gwct-contact-direct__value{display:block;font-size:15px;font-weight:600;color:var(--sl-page-navy)}
.sl-gwct-testimonials-note{margin:0 0 12px;font-size:13px;line-height:1.55;color:var(--sl-page-muted);font-style:italic}
