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
.sl-gwct-page .sl-eyebrow::before,.sl-gwct-page .sl-home-sub-heading::before{content:none;display:none;width:0;height:0;margin:0}
.sl-gwct-page .sl-stat__value{color:var(--sl-page-primary)}
.sl-gwct-page .sl-clients__title span{color:var(--sl-page-primary)}
.sl-gwct-page h1,.sl-gwct-page h2{color:var(--sl-page-navy)}
.sl-gwct-page .sl-h2 span{color:var(--sl-page-primary,#1472ba)}
/* Hero — right-bleed image with soft left fade (desktop); stacked on mobile */
.sl-gwct-page .sl-gwct-hero.sl-section{position:relative;isolation:isolate;overflow:hidden;padding:24px 16px 32px;background:var(--sl-page-white);min-height:0}
.sl-gwct-hero__wrap{position:relative;z-index:1}
.sl-gwct-hero__content{position:relative;z-index:1;min-width:0;max-width:640px}
.sl-gwct-hero h1{margin:0 0 10px;font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;color:var(--sl-page-navy)}
.sl-gwct-page .sl-gwct-hero h2.sl-gwct-hero__tagline,
.sl-gwct-page .sl-gwct-hero__tagline{margin:0 0 14px;font-size:18px;line-height:1.35;color:var(--sl-page-primary,#1472ba);font-weight:600}
.sl-gwct-hero__description{margin:0;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-gwct-hero__actions{display:flex;flex-direction:column;flex-wrap:nowrap;align-items:stretch;gap:12px;margin-top:24px}
.sl-gwct-hero__cta,.sl-gwct-page .sl-gwct-hero__actions .sl-btn.sl-gwct-hero__cta{display:inline-flex;align-items:center;justify-content:center;gap:10px;width:100%;max-width:100%;margin:0;flex:0 0 auto;padding:13px 20px;text-align:center;box-sizing:border-box;white-space:normal}
.sl-gwct-hero__visual{position:relative;z-index:0;width:100%;max-width:560px;margin:24px auto 0;pointer-events:none}
.sl-gwct-hero__image{position:relative;display:block;overflow:hidden;width:100%;aspect-ratio:16/9;border-radius:12px;border:1px solid rgba(107,124,147,.18);line-height:0;background:var(--sl-page-bg)}
.sl-gwct-hero__image amp-img{display:block}
.sl-gwct-hero__image amp-img img{object-fit:cover;object-position:72% center}
/* Mobile: stacked buttons */
@media(max-width:767px){
	.sl-gwct-page .sl-gwct-hero__actions{display:flex;flex-direction:column;flex-wrap:nowrap;align-items:stretch;gap:12px}
	.sl-gwct-page .sl-gwct-hero__actions .sl-gwct-hero__cta,
	.sl-gwct-page .sl-gwct-hero__actions .sl-btn.sl-gwct-hero__cta{width:100%;max-width:100%;flex:0 0 auto;white-space:normal}
}
/* Tablet+: two buttons on one line; still stacked image */
@media(min-width:768px){
	.sl-gwct-page .sl-gwct-hero.sl-section{padding:24px 16px 40px}
	.sl-gwct-page .sl-gwct-hero__actions{display:flex;flex-direction:row;flex-wrap:nowrap;align-items:center;justify-content:flex-start;gap:12px}
	.sl-gwct-page .sl-gwct-hero__actions .sl-gwct-hero__cta,
	.sl-gwct-page .sl-gwct-hero__actions .sl-btn.sl-gwct-hero__cta{width:auto;max-width:none;flex:1 1 0;min-width:0;align-self:stretch;white-space:normal}
	.sl-gwct-hero__tagline{font-size:20px}
	.sl-gwct-hero__content{max-width:720px}
}
/* Desktop: absolute right-bleed with soft left fade into copy */
@media(min-width:1000px){
	.sl-gwct-page .sl-gwct-hero.sl-section{display:flex;flex-direction:column;justify-content:center;min-height:520px;padding:48px 16px 56px}
	.sl-gwct-hero__wrap{width:100%}
	.sl-gwct-hero__content{max-width:560px}
	.sl-gwct-hero__tagline{font-size:22px}
	.sl-gwct-hero__visual{position:absolute;top:0;right:0;bottom:0;left:auto;z-index:0;width:56%;max-width:none;margin:0;pointer-events:none;-webkit-mask-image:linear-gradient(to right,transparent 0%,rgba(0,0,0,.2) 14%,rgba(0,0,0,.7) 34%,#000 52%,#000 100%);mask-image:linear-gradient(to right,transparent 0%,rgba(0,0,0,.2) 14%,rgba(0,0,0,.7) 34%,#000 52%,#000 100%)}
	.sl-gwct-hero__image{position:absolute;inset:0;aspect-ratio:auto;height:100%;border:0;border-radius:0;background:transparent}
}
@media(min-width:1200px){
	.sl-gwct-page .sl-gwct-hero.sl-section{min-height:580px}
	.sl-gwct-hero__content{max-width:600px}
	.sl-gwct-hero__visual{width:58%}
}
/* Lock secondary CTA to shared outline style (beats home-page .sl-btn--secondary) */
.sl-gwct-page .sl-btn--secondary,
.sl-gwct-page button.sl-btn--secondary,
.sl-gwct-page a.sl-btn--secondary{
	margin-left:0;
	background:linear-gradient(var(--sl-page-white,#fff),var(--sl-page-white,#fff)) padding-box,var(--sl-btn-primary-fill,linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%)) border-box!important;
	background-color:transparent!important;
	border:2px solid transparent!important;
	color:var(--sl-btn-secondary-color,var(--sl-page-cta,#ea3e24))!important;
	box-shadow:none;
}
.sl-gwct-page .sl-whpt-insights{overflow:hidden;border:1px solid rgba(107,124,147,.16);border-radius:16px;background:var(--sl-page-white);box-shadow:0 12px 32px rgba(22,35,78,.08)}
.sl-gwct-page .sl-whpt-insights__chrome{display:flex;align-items:center;gap:7px;padding:12px 14px;background:linear-gradient(135deg,#16234e 0%,#283384 100%)}
.sl-gwct-page .sl-whpt-insights__dot{width:9px;height:9px;border-radius:50%;flex-shrink:0;background:rgba(255,255,255,.45)}
.sl-gwct-page .sl-whpt-insights__dot:first-child{background:#ea3e24}
.sl-gwct-page .sl-whpt-insights__dot:nth-child(2){background:#fdb813}
.sl-gwct-page .sl-whpt-insights__dot:nth-child(3){background:#1472ba}
.sl-gwct-page .sl-whpt-insights__chrome-title{margin-left:8px;color:rgba(255,255,255,.92);font-size:13px;font-weight:600}
.sl-gwct-page .sl-whpt-insights__body{padding:18px 14px 14px}
.sl-gwct-page .sl-whpt-insights__head{display:flex;gap:12px;align-items:flex-start;margin-bottom:14px}
.sl-gwct-page .sl-whpt-insights__head-icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:44px;height:44px;border-radius:12px;background:rgba(109,195,235,.22);color:var(--sl-page-primary)}
.sl-gwct-page .sl-whpt-insights__eyebrow{margin:0 0 4px;color:var(--sl-page-primary);font-size:12px;font-weight:700;letter-spacing:.04em;text-transform:uppercase}
.sl-gwct-page .sl-whpt-insights__title{margin:0 0 10px;color:var(--sl-page-navy);font-size:18px;font-weight:700;line-height:1.25}
.sl-gwct-page .sl-whpt-insights__tags{display:flex;flex-wrap:wrap;gap:8px}
.sl-gwct-page .sl-whpt-insights__tags span{display:inline-flex;align-items:center;padding:5px 10px;border-radius:999px;background:rgba(109,195,235,.18);color:var(--sl-page-primary);font-size:12px;font-weight:600;line-height:1.2}
.sl-gwct-page .sl-whpt-insights__hero{display:grid;grid-template-columns:minmax(0,1fr);gap:14px;margin-bottom:12px;padding:16px 14px;border-radius:14px;background:linear-gradient(135deg,rgba(109,195,235,.22) 0%,rgba(20,114,186,.1) 100%);border:1px solid rgba(20,114,186,.12)}
.sl-gwct-page .sl-whpt-insights__hero-lead{margin:0 0 4px;color:var(--sl-page-navy);font-size:14px;font-weight:600}
.sl-gwct-page .sl-whpt-insights__hero-stat{margin:0 0 8px;color:var(--sl-page-primary);font-size:36px;font-weight:800;line-height:1.05}
.sl-gwct-page .sl-whpt-insights__hero-text{margin:0;color:var(--sl-page-text);font-size:13px;line-height:1.5}
.sl-gwct-page .sl-whpt-insights__people{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:6px;justify-items:center;max-width:220px}
.sl-gwct-page .sl-whpt-insights__person{display:inline-flex;align-items:center;justify-content:center;color:rgba(107,124,147,.35)}
.sl-gwct-page .sl-whpt-insights__person.is-active{color:var(--sl-page-primary)}
.sl-gwct-page .sl-whpt-insights__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:10px}
.sl-gwct-page .sl-whpt-insights__card{min-width:0;padding:14px;border:1px solid rgba(107,124,147,.14);border-radius:14px;background:var(--sl-page-white);box-sizing:border-box}
.sl-gwct-page .sl-whpt-insights__card-icon{display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;margin-bottom:8px;border-radius:10px}
.sl-gwct-page .sl-whpt-insights__card--women .sl-whpt-insights__card-icon{background:rgba(234,62,36,.12);color:#ea3e24}
.sl-gwct-page .sl-whpt-insights__card--men .sl-whpt-insights__card-icon{background:rgba(20,114,186,.12);color:#1472ba}
.sl-gwct-page .sl-whpt-insights__card--people .sl-whpt-insights__card-icon{background:rgba(14,159,74,.12);color:#0e9f4a}
.sl-gwct-page .sl-whpt-insights__card--disclose .sl-whpt-insights__card-icon{background:rgba(253,184,19,.18);color:#c48a00}
.sl-gwct-page .sl-whpt-insights__card-value{margin:0 0 6px;color:var(--sl-page-primary);font-size:22px;font-weight:800;line-height:1.15}
.sl-gwct-page .sl-whpt-insights__card-text{margin:0;color:var(--sl-page-text);font-size:12px;line-height:1.45}
@media(min-width:768px){.sl-gwct-page .sl-whpt-insights__hero{grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);align-items:center}.sl-gwct-page .sl-whpt-insights__people{max-width:none}.sl-gwct-page .sl-whpt-insights__grid{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}.sl-gwct-page .sl-whpt-insights__title{font-size:20px}}
.sl-gwct-points{margin:16px 0 0}
.sl-gwct-points__icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:34px;height:34px;border-radius:10px;background:var(--sl-page-white,#fff);color:var(--sl-page-primary,#1472ba);box-shadow:0 2px 8px rgba(20,114,186,.08)}
.sl-gwct-points__icon svg{display:block}
.sl-gwct-points .sl-list-item{gap:12px;background:rgba(20,114,186,.06);border-color:transparent}
.sl-gwct-points .sl-list-item__text strong{color:var(--sl-page-navy);font-weight:700}
.sl-gwct-points .sl-list-item:last-child{padding-bottom:22px}
.sl-gwct-behaviour-keyline{margin:16px 0 12px;color:var(--sl-page-navy)}
.sl-gwct-behaviour-keyline strong{font-weight:700}
.sl-gwct-behaviour__layout{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:start}
.sl-gwct-behaviour__content{min-width:0}
.sl-gwct-behaviour__aside{display:flex;flex-direction:column;gap:16px;min-width:0;width:100%}
.sl-gwct-behaviour-know-more{display:inline-flex;align-items:center;justify-content:center;gap:8px;width:fit-content;max-width:100%;margin:0}
.sl-gwct-behaviour-know-more[hidden]{display:none!important}
.sl-gwct-behaviour-assessment{width:100%;padding:22px 18px 20px;border:1px solid rgba(107,124,147,.16);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box;box-shadow:0 12px 32px rgba(22,35,78,.08)}
.sl-gwct-behaviour-assessment__top{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:14px}
.sl-gwct-behaviour-assessment__category{color:var(--sl-page-primary);font-size:13px;font-weight:700;letter-spacing:.02em;text-transform:uppercase}
.sl-gwct-behaviour-assessment__label{color:var(--sl-page-muted);font-size:12px;font-weight:500}
.sl-gwct-behaviour-assessment__question{margin:0 0 10px;color:var(--sl-page-primary,#1472ba);font-size:20px;font-weight:700;line-height:1.3}
.sl-gwct-behaviour-assessment__prompt{margin:0 0 12px;color:var(--sl-page-text);font-size:15px;line-height:1.55}
.sl-gwct-behaviour-assessment__choose{margin:0 0 12px;color:var(--sl-page-navy);font-size:14px;font-weight:600;line-height:1.4}
.sl-gwct-behaviour-assessment__options{display:grid;gap:10px}
.sl-gwct-behaviour-assessment__option{display:flex;align-items:flex-start;gap:12px;width:100%;padding:14px;text-align:left;cursor:pointer;color:var(--sl-page-text);font-size:15px;line-height:1.45;background:var(--sl-page-white);border:1px solid rgba(107,124,147,.28);border-radius:10px;box-sizing:border-box}
.sl-gwct-behaviour-assessment__radio{flex:0 0 18px;width:18px;height:18px;margin-top:2px;border:2px solid rgba(107,124,147,.45);border-radius:50%;box-sizing:border-box;background:#fff}
.sl-gwct-behaviour-assessment__option.is-selected .sl-gwct-behaviour-assessment__radio{border-color:var(--sl-page-primary);box-shadow:inset 0 0 0 4px var(--sl-page-primary)}
.sl-gwct-behaviour-assessment__option-text{flex:1 1 auto;min-width:0}
.sl-gwct-behaviour-assessment__option.is-correct{background:rgba(14,159,74,.12);border-color:#0d723b}
.sl-gwct-behaviour-assessment__option.is-incorrect{background:rgba(234,62,36,.12);border-color:#c9341e}
.sl-gwct-behaviour-assessment__feedback{display:block;margin-top:14px;padding:16px;border-radius:12px;border:1px solid transparent;font-size:15px;line-height:1.55;box-sizing:border-box}
.sl-gwct-behaviour-assessment__feedback[hidden]{display:none!important}
.sl-gwct-page .sl-gwct-behaviour-assessment__feedback.is-success{color:#0d723b;background:#e8f7ee;border-color:#0e9f4a}
.sl-gwct-page .sl-gwct-behaviour-assessment__feedback.is-error{color:#c9341e;background:#fde8e4;border-color:#ea3e24}
.sl-gwct-behaviour-assessment__reveal-lead{margin:0 0 12px;font-weight:800;line-height:1.35}
.sl-gwct-page .sl-gwct-behaviour-assessment__feedback.is-success .sl-gwct-behaviour-assessment__reveal-lead{color:#0d723b}
.sl-gwct-page .sl-gwct-behaviour-assessment__feedback.is-error .sl-gwct-behaviour-assessment__reveal-lead{color:#c9341e}
.sl-gwct-behaviour-assessment__paths{display:grid;gap:8px}
.sl-gwct-behaviour-assessment__path{display:grid;gap:4px;margin:0;padding:12px 14px;border-radius:10px;background:rgba(255,255,255,.85);border:1px solid rgba(255,255,255,.95);box-sizing:border-box}
.sl-gwct-behaviour-assessment__path strong{display:block;font-size:13px;font-weight:800;letter-spacing:.01em;text-transform:uppercase;color:inherit}
.sl-gwct-behaviour-assessment__path span{display:block;font-size:14px;font-weight:600;line-height:1.45;color:var(--sl-page-navy,#16234e)}
.sl-gwct-behaviour-assessment__path--before{border-left:3px solid #ea3e24}
.sl-gwct-behaviour-assessment__path--after{border-left:3px solid #0e9f4a}
@media(min-width:1000px){.sl-gwct-behaviour__layout{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:40px}.sl-gwct-behaviour-assessment{padding:28px 26px 24px}.sl-gwct-behaviour-assessment__question{font-size:22px}.sl-gwct-behaviour-know-more{width:fit-content}}
@media(max-width:699px){.sl-gwct-behaviour-know-more:not([hidden]){width:100%}}
.sl-gwct-impact-points{display:flex;flex-direction:column;gap:14px;margin:16px 0 20px;padding:0;list-style:none}
.sl-gwct-impact-point{margin:0;padding:0}
.sl-gwct-impact-point__body{display:flex;align-items:center;gap:12px;min-width:0;padding:12px 16px;border:1px solid rgba(107,124,147,.16);border-radius:14px;background:var(--sl-page-white,#fff);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box}
.sl-gwct-impact-point__icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:34px;height:34px;border-radius:10px;background:rgba(109,195,235,.16);color:var(--sl-page-primary,#1472ba)}
.sl-gwct-impact-point__icon svg{display:block}
.sl-gwct-impact-point__text{flex:1;display:block;margin:0;min-width:0;color:var(--sl-page-muted,#6b7c93);font-size:15px;font-weight:500;line-height:1.45}
.sl-gwct-impact-point__highlight{color:var(--sl-page-navy);font-size:16px;font-weight:700;line-height:1.45}
.sl-gwct-impact-point__rest{color:var(--sl-page-muted,#6b7c93);font-size:16px;font-weight:500;line-height:1.45}
.sl-gwct-impact-emphasis{margin-top:8px;color:var(--sl-page-navy)}
.sl-gwct-why-card__icon{display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;margin:0 0 12px;border-radius:12px;background:rgba(109,195,235,.16);color:var(--sl-page-primary,#1472ba)}
.sl-gwct-why-card__icon svg{display:block}
/* Soft section bg matches desktop page rhythm (#f5f5f5). */
.sl-gwct-page .sl-section--alt{background:var(--sl-page-bg,#f5f5f5)}
/* Page section rhythm: white / soft after clients (same as desktop). */
.sl-gwct-page #main-content > section:nth-of-type(odd){background:var(--sl-page-white,#fff)}
.sl-gwct-page #main-content > section:nth-of-type(even){background:var(--sl-page-bg,#f5f5f5)}
.sl-gwct-split{display:grid;gap:24px;align-items:center}
@media(min-width:900px){.sl-gwct-split{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr)}.sl-gwct-split:not(.sl-gwct-split--reverse) .sl-gwct-split__visual{order:-1}.sl-gwct-split--reverse .sl-gwct-split__visual{order:2}}
.sl-gwct-media{border-radius:18px;overflow:hidden;border:1px solid rgba(107,124,147,.18);background:var(--sl-page-white)}
.sl-gwct-media amp-img{display:block}
.sl-gwct-cta-panel{text-align:center;padding:36px 24px;border-radius:18px;background:linear-gradient(180deg,var(--sl-page-bg) 0%,var(--sl-page-white) 100%);border:1px solid rgba(107,124,147,.18)}
.sl-gwct-cta-panel .sl-h2{color:var(--sl-page-navy)}
.sl-gwct-cta-panel .sl-btn--whatsapp{display:inline-flex;align-items:center;justify-content:center;gap:10px;background:#25d366;color:#fff;border:0;text-decoration:none}
.sl-gwct-cta-panel .sl-btn--whatsapp:hover,.sl-gwct-cta-panel .sl-btn--whatsapp:focus{background:#1ebe57;color:#fff}
.sl-gwct-cta-panel .sl-btn--whatsapp__icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:22px;height:22px;color:#fff}
.sl-gwct-cta-panel .sl-btn--whatsapp__icon svg{display:block;width:22px;height:22px}
.sl-gwct-cta-panel .sl-btn--whatsapp__label{line-height:1.2}
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
.sl-gwct-solution__label{display:flex;align-items:center;gap:10px;margin:16px 0px;padding-bottom:12px;border-bottom:1px solid rgba(107,124,147,.18);font-size:14px;font-weight:700;line-height:1.35;color:var(--sl-page-navy)}
.sl-gwct-solution__label-icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:32px;height:32px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary)}
.sl-gwct-solution__label-icon svg{display:block}
.sl-gwct-solution__meta .sl-list-item{gap:12px}
.sl-gwct-solution__meta .sl-list-item:last-child{padding-bottom:22px}
.sl-gwct-solution__meta .sl-list-item.sl-gwct-course--flag{padding-left:18px}
.sl-gwct-solution__chip-icon{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:36px;height:36px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);overflow:hidden;box-sizing:border-box}
.sl-gwct-solution__chip-icon svg{display:block}
.sl-gwct-solution__chip-icon--flag{margin-left:2px;background:var(--sl-page-white,#fff);border:1px solid rgba(107,124,147,.2);padding:4px}
.sl-gwct-solution__chip-icon--flag amp-img{display:block}
.sl-gwct-solution__media{margin-top:16px;display:block;overflow:hidden;aspect-ratio:3/2;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:linear-gradient(180deg,var(--sl-page-white) 0%,var(--sl-page-primary-soft) 100%)}
.sl-gwct-solution__media amp-img{display:block;width:100%}
.sl-gwct-solution__media amp-img img{object-fit:cover;object-position:center}
.sl-gwct-solution__image-placeholder{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;width:100%;height:100%;min-height:100%;aspect-ratio:3/2;padding:24px;text-align:center;box-sizing:border-box}
.sl-gwct-solution__image-placeholder span{color:var(--sl-page-navy);font-size:15px;font-weight:700}
.sl-gwct-solution__image-placeholder small{color:var(--sl-page-muted);font-size:13px}
.sl-gwct-solution p.sl-gwct-solution__actions{margin:18px 0 0}
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
.sl-gwct-contact__whatsapp-label{font-size:16px;font-weight:600;line-height:1.2;opacity:.92;color:#fff}
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
