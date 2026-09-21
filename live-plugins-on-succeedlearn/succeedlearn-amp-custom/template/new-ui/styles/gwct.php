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
.sl-gwct-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff}
.sl-gwct-page .sl-eyebrow,.sl-gwct-page .sl-home-sub-heading{display:inline-flex;align-items:center;gap:10px;margin:0 0 12px;font-size:15px;font-weight:500;line-height:1.3;color:var(--sl-page-primary)}
.sl-gwct-page .sl-eyebrow::before,.sl-gwct-page .sl-home-sub-heading::before{content:"";width:24px;height:1px;background:var(--sl-page-primary);flex-shrink:0}
.sl-gwct-page .sl-stat__value{color:var(--sl-page-primary)}
.sl-gwct-page .sl-clients__title span{color:var(--sl-page-primary)}
.sl-gwct-page h1,.sl-gwct-page h2{color:var(--sl-page-navy)}
.sl-gwct-page .sl-h2 span{color:var(--sl-page-primary,#1472ba)}
/* Hero — layout only; button look from global-ui.php */
.sl-gwct-page .sl-gwct-hero.sl-section{padding:24px 16px 32px;background:var(--sl-page-white)}
.sl-gwct-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-gwct-hero__content{min-width:0}
.sl-gwct-hero h1{margin:0 0 10px;font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;color:var(--sl-page-navy)}
.sl-gwct-page .sl-gwct-hero h2.sl-gwct-hero__tagline,
.sl-gwct-page .sl-gwct-hero__tagline{margin:0 0 14px;font-size:18px;line-height:1.35;color:var(--sl-page-primary,#1472ba);font-weight:600}
.sl-gwct-hero__description{margin:0;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-gwct-hero__actions{display:flex;flex-direction:column;flex-wrap:nowrap;align-items:stretch;gap:12px;margin-top:24px}
.sl-gwct-hero__cta,.sl-gwct-page .sl-gwct-hero__actions .sl-btn.sl-gwct-hero__cta{display:inline-flex;align-items:center;justify-content:center;gap:10px;width:100%;max-width:100%;margin:0;flex:0 0 auto;padding:13px 20px;text-align:center;box-sizing:border-box;white-space:normal}
.sl-gwct-hero__visual{display:block;min-width:0;width:100%;max-width:560px;margin:8px auto 0}
.sl-gwct-hero__image{display:block;overflow:hidden;width:100%;border-radius:12px;border:1px solid rgba(107,124,147,.18);line-height:0;background:var(--sl-page-bg)}
.sl-gwct-hero__image amp-img{display:block;width:100%;max-width:100%}
.sl-gwct-hero__image amp-img img{object-fit:cover;object-position:center}
@media(max-width:767px){.sl-gwct-page .sl-gwct-hero__actions{flex-direction:column;align-items:stretch}.sl-gwct-page .sl-gwct-hero__actions .sl-gwct-hero__cta,.sl-gwct-page .sl-gwct-hero__actions .sl-btn.sl-gwct-hero__cta{width:100%;max-width:100%;white-space:normal}}
@media(min-width:768px){.sl-gwct-page .sl-gwct-hero.sl-section{padding:24px 16px 40px}.sl-gwct-page .sl-gwct-hero__actions{flex-direction:row;flex-wrap:wrap;align-items:center;justify-content:flex-start;gap:12px}.sl-gwct-page .sl-gwct-hero__actions .sl-gwct-hero__cta,.sl-gwct-page .sl-gwct-hero__actions .sl-btn.sl-gwct-hero__cta{width:auto;max-width:none;flex:0 0 auto;align-self:center;white-space:nowrap}.sl-gwct-hero__visual{margin-top:16px}.sl-gwct-hero__tagline{font-size:20px}}
@media(min-width:1000px){.sl-gwct-hero__grid{grid-template-columns:minmax(0,1.1fr) minmax(280px,.9fr);gap:48px;align-items:center}.sl-gwct-hero__visual{max-width:none;margin:0}.sl-gwct-hero__tagline{font-size:22px}}
/* Lock secondary CTA to shared outline style (beats home-page .sl-btn--secondary) */
.sl-gwct-page .sl-btn--secondary,
.sl-gwct-page button.sl-btn--secondary,
.sl-gwct-page a.sl-btn--secondary{
	margin-left:0;
	background:linear-gradient(var(--sl-page-white,#fff),var(--sl-page-white,#fff)) padding-box,var(--sl-btn-primary-fill,linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%)) border-box!important;
	background-color:transparent!important;
	border:2px solid transparent!important;
	color:var(--sl-page-primary,#1472ba)!important;
	box-shadow:none;
}
.sl-gwct-dashboard-wrap{position:relative;width:100%;max-width:560px;margin:0 auto;padding-bottom:18px}
.sl-gwct-dashboard{overflow:hidden;border:1px solid rgba(107,124,147,.18);border-radius:22px;background:var(--sl-page-white);box-shadow:0 10px 28px rgba(22,35,78,.08)}
.sl-gwct-dashboard__top{display:flex;align-items:center;gap:7px;padding:12px 16px;background:linear-gradient(135deg,var(--sl-page-navy) 0%,var(--sl-page-primary-dark) 100%)}
.sl-gwct-dashboard__dot{width:9px;height:9px;border-radius:50%;flex-shrink:0;background:rgba(255,255,255,.45)}
.sl-gwct-dashboard__dot:first-child{background:var(--sl-page-cta,#ea3e24)}
.sl-gwct-dashboard__dot:nth-child(2){background:#fdb813}
.sl-gwct-dashboard__dot:nth-child(3){background:var(--sl-page-primary)}
.sl-gwct-dashboard__top-title{margin-left:8px;color:rgba(255,255,255,.9);font-size:13px;font-weight:600}
.sl-gwct-dashboard__body{padding:20px 16px 18px}
.sl-gwct-dashboard__head{display:flex;gap:14px;align-items:flex-start;margin-bottom:18px}
.sl-gwct-dashboard__icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:48px;height:48px;border-radius:14px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary)}
.sl-gwct-dashboard__icon svg{display:block;width:22px;height:22px}
.sl-gwct-dashboard__label{margin:0 0 4px;font-size:12px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--sl-page-primary)}
.sl-gwct-dashboard__title{margin:0 0 10px;font-size:20px;line-height:1.25;color:var(--sl-page-navy)}
.sl-gwct-dashboard__tags{display:flex;flex-wrap:wrap;gap:8px}
.sl-gwct-dashboard__tags span{display:inline-flex;align-items:center;padding:5px 10px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:12px;font-weight:600;line-height:1.2}
.sl-gwct-dashboard__progress{margin-bottom:16px;padding:16px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg)}
.sl-gwct-dashboard__meta{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:10px;font-size:14px;color:var(--sl-page-muted)}
.sl-gwct-dashboard__meta strong{color:var(--sl-page-primary);font-size:22px;line-height:1}
.sl-gwct-dashboard__bar{height:10px;border-radius:999px;background:rgba(109,195,235,.22);overflow:hidden}
.sl-gwct-dashboard__bar span{display:block;height:100%;border-radius:inherit;background:linear-gradient(90deg,var(--sl-page-primary) 0%,#6dc3eb 100%)}
.sl-gwct-dashboard__note{margin:10px 0 0;font-size:13px;line-height:1.5;color:var(--sl-page-muted)}
.sl-gwct-dashboard__note strong{color:var(--sl-page-navy);font-weight:700}
.sl-gwct-dashboard__items{display:grid;gap:10px}
.sl-gwct-dashboard__item{display:grid;grid-template-columns:auto minmax(0,1fr) auto;gap:12px;align-items:center;padding:12px 14px;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white)}
.sl-gwct-dashboard__item-icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:40px;height:40px;border-radius:12px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary)}
.sl-gwct-dashboard__item-icon svg{display:block}
.sl-gwct-dashboard__item-copy{min-width:0}
.sl-gwct-dashboard__item-copy strong{display:flex;flex-direction:column;gap:2px;font-size:14px;font-weight:600;line-height:1.35;color:var(--sl-page-navy)}
.sl-gwct-dashboard__item-highlight{color:var(--sl-page-primary)}
.sl-gwct-dashboard__item-copy small{display:block;margin-top:3px;font-size:12px;line-height:1.4;color:var(--sl-page-muted)}
.sl-gwct-dashboard__item-value{flex-shrink:0;min-width:42px;padding:4px 8px;border-radius:8px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:12px;font-weight:700;line-height:1.2;text-align:center}
.sl-gwct-dashboard__item.is-pending .sl-gwct-dashboard__item-value{background:#fff7e8;color:#f68c1e}
.sl-gwct-dashboard__float{display:flex;align-items:center;gap:12px;width:fit-content;max-width:100%;margin:14px 0 0;padding:14px 16px;border:2px solid var(--sl-page-primary);border-radius:18px;background:var(--sl-page-white);box-shadow:0 6px 18px rgba(20,114,186,.08);box-sizing:border-box}
.sl-gwct-dashboard__float-icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:40px;height:40px;border-radius:12px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary)}
.sl-gwct-dashboard__float-icon svg{display:block}
.sl-gwct-dashboard__float strong{display:block;font-size:14px;font-weight:700;color:var(--sl-page-navy)}
.sl-gwct-dashboard__float small{display:block;margin-top:2px;font-size:12px;font-weight:600;color:var(--sl-page-primary)}
@media(min-width:768px){.sl-gwct-dashboard-wrap{padding-bottom:56px}.sl-gwct-dashboard__body{padding:24px 24px 36px}.sl-gwct-dashboard__title{font-size:22px}.sl-gwct-dashboard__float{position:absolute;left:0;bottom:0;margin:0}}
.sl-gwct-points{margin:16px 0 0}
.sl-gwct-points__icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:34px;height:34px;border-radius:10px;background:var(--sl-page-white,#fff);color:var(--sl-page-primary,#1472ba);box-shadow:0 2px 8px rgba(20,114,186,.08)}
.sl-gwct-points__icon svg{display:block}
.sl-gwct-points .sl-list-item{gap:12px;background:rgba(20,114,186,.06);border-color:transparent}
.sl-gwct-points .sl-list-item__text strong{color:var(--sl-page-navy);font-weight:700}
.sl-gwct-points .sl-list-item:last-child{padding-bottom:22px}
.sl-gwct-split{display:grid;gap:24px;align-items:center}
@media(min-width:900px){.sl-gwct-split{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr)}.sl-gwct-split:not(.sl-gwct-split--reverse) .sl-gwct-split__visual{order:-1}.sl-gwct-split--reverse .sl-gwct-split__visual{order:2}}
.sl-gwct-media{border-radius:18px;overflow:hidden;border:1px solid rgba(107,124,147,.18);background:var(--sl-page-white)}
.sl-gwct-media amp-img{display:block}
.sl-gwct-cta-panel{text-align:center;padding:36px 24px;border-radius:18px;background:linear-gradient(180deg,var(--sl-page-bg) 0%,var(--sl-page-white) 100%);border:1px solid rgba(107,124,147,.18)}
.sl-gwct-cta-panel .sl-h2{color:var(--sl-page-navy)}
.sl-gwct-cta-panel .sl-btn--whatsapp{background:#25d366;color:#fff;border:0;text-decoration:none}
.sl-gwct-cta-panel .sl-btn--whatsapp:hover,.sl-gwct-cta-panel .sl-btn--whatsapp:focus{background:#1ebe57;color:#fff}
.sl-gwct-trust{text-align:center;padding:32px 24px;border-radius:18px;background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18)}
.sl-gwct-trust .sl-h2{margin-bottom:12px}
.sl-gwct-trust .sl-lead{margin:0 auto 20px;max-width:720px}
.sl-gwct-trust__badges{display:flex;flex-wrap:wrap;justify-content:center;gap:18px 28px;margin:0 0 18px;padding:0;list-style:none}
.sl-gwct-trust__badges li{margin:0}
.sl-gwct-trust__note{margin:0 auto 18px;max-width:640px;font-size:15px;line-height:1.6;color:var(--sl-page-text)}
.sl-gwct-trust .sl-btn{margin:0 auto}
.sl-gwct-solutions{display:grid;gap:18px}
.sl-gwct-solution{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-top:3px solid var(--sl-page-primary);border-radius:16px;padding:22px}
.sl-gwct-solution h3{margin:0 0 8px;font-size:20px;color:var(--sl-page-primary)}
.sl-gwct-solution__subtitle{margin:0 0 12px;font-size:15px;line-height:1.55;color:var(--sl-page-navy);font-weight:600}
.sl-gwct-solution p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-gwct-solution__meta{margin-top:16px}
.sl-gwct-solution__label{display:flex;align-items:center;gap:10px;margin:0 0 12px;padding-bottom:12px;border-bottom:1px solid rgba(107,124,147,.18);font-size:14px;font-weight:700;line-height:1.35;color:var(--sl-page-navy)}
.sl-gwct-solution__label-icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:32px;height:32px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary)}
.sl-gwct-solution__label-icon svg{display:block}
.sl-gwct-solution__meta .sl-list-item{gap:12px}
.sl-gwct-solution__meta .sl-list-item:last-child{padding-bottom:22px}
.sl-gwct-solution__meta .sl-list-item.sl-gwct-course--flag{padding-left:18px}
.sl-gwct-solution__chip-icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:36px;height:36px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);overflow:hidden;box-sizing:border-box}
.sl-gwct-solution__chip-icon svg{display:block}
.sl-gwct-solution__chip-icon--flag{margin-left:2px;background:var(--sl-page-white,#fff);border:1px solid rgba(107,124,147,.2);padding:4px}
.sl-gwct-solution__chip-icon--flag amp-img{display:block}
.sl-gwct-solution__media{display:flex;align-items:center;justify-content:center;min-height:220px;overflow:hidden;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:linear-gradient(180deg,var(--sl-page-white) 0%,var(--sl-page-primary-soft) 100%)}
.sl-gwct-solution__media amp-img{display:block;width:100%}
.sl-gwct-solution__image-placeholder{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;width:100%;min-height:220px;padding:24px;text-align:center;box-sizing:border-box; margin-bottom:12px;}
.sl-gwct-solution__image-placeholder span{color:var(--sl-page-navy);font-size:15px;font-weight:700}
.sl-gwct-solution__image-placeholder small{color:var(--sl-page-muted);font-size:13px}
.sl-gwct-solution__actions{margin:18px 0 0}
.sl-gwct-why-grid{display:grid;gap:14px;margin-top:8px}
@media(min-width:700px){.sl-gwct-why-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}}
@media(min-width:1000px){.sl-gwct-why-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}}
.sl-gwct-why-card{background:var(--sl-page-white);border:1px solid rgba(107,124,147,.18);border-radius:14px;padding:22px 18px;height:100%;box-sizing:border-box}
.sl-gwct-why-card h3{margin:0 0 10px;font-size:18px;line-height:1.3;color:var(--sl-page-primary)}
.sl-gwct-why-card p{margin:0;padding-bottom:4px;font-size:14px;line-height:1.65;color:var(--sl-page-text)}
@media(min-width:768px){.sl-gwct-why-card{padding:24px 22px}}
.sl-gwct-callout{margin-top:16px;padding:18px 20px;border-left:5px solid var(--sl-page-primary);border-radius:0 14px 14px 0;background:var(--sl-page-primary-soft)}
.sl-gwct-callout strong{color:var(--sl-page-navy)}
.sl-gwct-contact-note{margin:16px 0;padding:16px 18px;border-radius:12px;background:var(--sl-page-primary-soft);font-size:14px;line-height:1.6;color:var(--sl-page-text)}
.sl-gwct-contact-note strong{display:block;margin-bottom:4px;color:var(--sl-page-navy)}
.sl-gwct-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-gwct-page .sl-contact-intro{margin:0}
.sl-gwct-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
.sl-gwct-contact-direct{margin-top:16px;max-width:100%}
.sl-gwct-contact-direct__label{margin:0 0 12px;color:var(--sl-page-muted);font-size:14px;font-weight:500;line-height:1.5}
.sl-gwct-contact-direct__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;width:100%;max-width:100%;box-sizing:border-box}
.sl-gwct-contact-direct__item,.sl-gwct-contact__whatsapp{display:flex;align-items:center;gap:12px;width:100%;max-width:100%;min-width:0;min-height:64px;padding:14px 16px;border-radius:14px;text-decoration:none;box-sizing:border-box}
.sl-gwct-contact-direct__item{border:1px solid rgba(20,114,186,.16);background:var(--sl-page-white,#fff);color:inherit;box-shadow:0 6px 18px rgba(31,44,86,.04)}
.sl-gwct-contact-direct__icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:40px;height:40px;border-radius:12px;border:1px solid rgba(20,114,186,.12);background:#fff;color:var(--sl-page-primary,#1472ba)}
.sl-gwct-contact-direct__icon svg{display:block;width:18px;height:18px}
.sl-gwct-contact-direct__body,.sl-gwct-contact__whatsapp-text{display:flex;flex-direction:column;align-items:flex-start;gap:2px;min-width:0;text-align:left}
.sl-gwct-contact-direct__title{color:var(--sl-page-navy);font-size:12px;font-weight:600;line-height:1.35;text-transform:uppercase;letter-spacing:.04em}
.sl-gwct-contact-direct__value{color:var(--sl-page-primary,#1472ba);font-size:15px;font-weight:600;line-height:1.45;word-break:break-word}
.sl-gwct-contact__whatsapp{background:#25d366;border:0;color:#fff;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-gwct-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff}
.sl-gwct-contact__whatsapp-icon svg{display:block;width:22px;height:22px}
.sl-gwct-contact__whatsapp-label{font-size:12px;font-weight:600;line-height:1.2;opacity:.92;color:#fff}
.sl-gwct-contact__whatsapp-number{font-size:16px;font-weight:700;line-height:1.25;letter-spacing:.01em;color:#fff}
/* Tablet+: email + WhatsApp on one row */
@media(min-width:700px){.sl-gwct-page .sl-gwct-contact-direct__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.sl-gwct-page .sl-gwct-contact-direct__item,.sl-gwct-page .sl-gwct-contact__whatsapp{width:100%;max-width:100%;min-width:0}}
@media(min-width:992px){.sl-gwct-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}.sl-gwct-page .sl-contact-form-card{padding:32px;border-radius:24px}}
/* Mobile: stacked full-width buttons */
@media(max-width:699px){.sl-gwct-page .sl-gwct-contact-direct__grid{grid-template-columns:minmax(0,1fr)}.sl-gwct-page .sl-gwct-contact-direct__item,.sl-gwct-page .sl-gwct-contact__whatsapp{width:100%;max-width:100%}}
@media(max-width:767px){.sl-gwct-contact-direct__item,.sl-gwct-contact__whatsapp{min-height:56px;padding:13px 14px}.sl-gwct-contact-direct__icon{width:36px;height:36px}.sl-gwct-contact-direct__value,.sl-gwct-contact__whatsapp-number{font-size:14px}.sl-gwct-page .sl-contact-form-card{padding:22px 18px;border-radius:16px}}
.sl-gwct-page .sl-testimonials__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:20px;margin-top:8px}
.sl-gwct-page .sl-testimonials__card{display:flex;flex-direction:column;height:100%;margin:0;padding:24px;background:linear-gradient(180deg,var(--sl-page-white,#fff) 0%,var(--sl-page-primary-soft) 100%);border:1px solid rgba(107,124,147,.18);border-radius:16px;box-shadow:0 10px 28px rgba(20,114,186,.08);box-sizing:border-box}
.sl-gwct-page .sl-testimonials__card blockquote{margin:0 0 18px;flex:1 1 auto}
.sl-gwct-page .sl-testimonials__card blockquote p{margin:0;color:var(--sl-page-navy);font-size:15px;line-height:1.7}
.sl-gwct-page .sl-testimonials__note,
.sl-gwct-page .sl-gwct-testimonials-note{margin:0 0 18px;padding:12px 14px;background:var(--sl-page-white,#fff);border:1px solid rgba(107,124,147,.18);border-left:3px solid var(--sl-page-primary);border-radius:8px;color:var(--sl-page-navy);font-size:13px;line-height:1.55;font-style:normal}
.sl-gwct-page .sl-testimonials__card figcaption{margin-top:auto;padding-top:18px;border-top:1px solid rgba(107,124,147,.18)}
.sl-gwct-page .sl-testimonials__card figcaption strong{display:block;margin-bottom:4px;font-size:16px;font-weight:700;color:var(--sl-page-navy)}
.sl-gwct-page .sl-testimonials__card figcaption span{display:block;font-size:14px;line-height:1.45;color:var(--sl-page-muted)}
@media(min-width:768px){.sl-gwct-page .sl-testimonials__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:22px}.sl-gwct-page .sl-testimonials__grid > :last-child:nth-child(odd){grid-column:1 / -1;justify-self:center;width:100%;max-width:calc((100% - 22px) / 2)}.sl-gwct-page .sl-testimonials__card{padding:28px}.sl-gwct-page .sl-testimonials__card blockquote p{font-size:16px}}
@media(min-width:1000px){.sl-gwct-page .sl-testimonials__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-gwct-page .sl-testimonials__grid > :last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}

/* FAQ uses shared global accordion UI (reinforced after AMPforWP !important strip). */
.sl-gwct-page .sl-amp-faq{margin:16px 0 0}
