<?php
/**
 * S-Aware — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-s-aware-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-page-teal:#0e9f4a;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px;--sl-fs-h3:22px}
@media(min-width:900px){.sl-s-aware-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-s-aware-page{--sl-fs-h2:48px}}
.sl-s-aware-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-s-aware-page h2:not(.sl-saware-hero__subheading) > span,.sl-s-aware-page .sl-h2 > span{color:var(--sl-page-primary)}
.sl-s-aware-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-s-aware-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-aware-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-aware-page p:last-child{margin-bottom:0}
.sl-s-aware-page .sl-panel-title{margin:0 0 10px;font-size:18px;line-height:1.35;color:var(--sl-page-navy);font-weight:700}

/* Hero: always single column, image at end */
.sl-saware-hero{padding:16px 16px 48px;background:var(--sl-page-white)}
.sl-saware-hero__stack{display:flex;flex-direction:column;gap:28px}
.sl-saware-hero__content{min-width:0}
.sl-s-aware-page .sl-saware-hero h1{margin:0 0 14px;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15}
.sl-s-aware-page .sl-saware-hero h2.sl-hero-h2,.sl-s-aware-page .sl-saware-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-navy);font-weight:600}
.sl-s-aware-page .sl-saware-hero__subheading > span{color:var(--sl-page-primary)}
.sl-saware-hero__actions{display:flex;flex-direction:column;gap:12px;margin-top:24px}
.sl-saware-hero__actions .sl-hero-btn{width:100%}
.sl-saware-hero__media{min-width:0;width:100%;max-width:420px;margin:0 auto}
.sl-saware-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-saware-hero__image amp-img{display:block;width:100%}
@media(min-width:768px){.sl-saware-hero__actions{flex-direction:row;flex-wrap:wrap}.sl-saware-hero__actions .sl-hero-btn{width:fit-content;max-width:none;white-space:nowrap}.sl-saware-hero__media{max-width:480px}}

/* Section backgrounds + padding */
.sl-saware-awareness,.sl-saware-learning,.sl-saware-delivery,.sl-saware-workforce,.sl-saware-comparison{background:var(--sl-page-bg)}
.sl-saware-why,.sl-saware-library,.sl-saware-customisation,.sl-saware-progress,.sl-saware-security-teams,.sl-sbcs--bg-white,.sl-saware-faq,.sl-saware-contact{background:var(--sl-page-white)}
.sl-saware-awareness,.sl-saware-why,.sl-saware-learning,.sl-saware-library,.sl-saware-customisation,.sl-saware-delivery,.sl-saware-progress,.sl-saware-workforce,.sl-saware-security-teams,.sl-saware-comparison,.sl-saware-faq,.sl-saware-contact,.sl-sbcs{padding:48px 16px}

/* Stack sections: content then image */
.sl-saware-why__stack,.sl-saware-customisation__stack,.sl-saware-progress__stack,.sl-sbcs__layout--stack{display:flex;flex-direction:column;gap:24px}
.sl-saware-why__media,.sl-saware-customisation__media,.sl-saware-progress__media,.sl-sbcs__media{min-width:0;width:100%;max-width:420px;margin:0 auto}
.sl-saware-why__image,.sl-saware-customisation__image,.sl-saware-progress__image,.sl-sbcs__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-saware-why__image amp-img,.sl-saware-customisation__image amp-img,.sl-saware-progress__image amp-img,.sl-sbcs__image amp-img{display:block;width:100%}
.sl-saware-why__copy,.sl-saware-awareness__copy,.sl-saware-customisation__intro,.sl-saware-progress__intro,.sl-saware-progress__copy,.sl-saware-delivery__intro{display:flex;flex-direction:column;gap:14px}
.sl-saware-why__copy p,.sl-saware-awareness__copy p,.sl-saware-customisation__intro p,.sl-saware-progress__intro p,.sl-saware-progress__copy p,.sl-saware-delivery__intro p{margin:0}

/* Learning cards (no orbit) */
.sl-saware-learning__intro{margin-bottom:28px}
.sl-saware-learning__cards{display:grid;grid-template-columns:minmax(0,1fr);gap:14px}
.sl-saware-learning__card{margin:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-saware-learning__number{display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:28px;margin:0 0 12px;padding:0 10px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:700}
.sl-saware-learning__card p{margin:0}
@media(min-width:700px){.sl-saware-learning__cards{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}}

/* Library table scroll + explorer cards */
.sl-saware-library__intro{margin-bottom:24px}
.sl-saware-library__table-wrap,.sl-saware-comparison__table-wrap{width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-saware-library__table,.sl-saware-comparison__table{width:100%;min-width:640px;border-collapse:collapse;table-layout:fixed}
.sl-saware-library__table th,.sl-saware-library__table td,.sl-saware-comparison__table th,.sl-saware-comparison__table td{padding:14px 16px;border-bottom:1px solid rgba(107,124,147,.14);text-align:left;vertical-align:top;font-size:14px;line-height:1.55;color:var(--sl-page-text)}
.sl-saware-library__table thead th,.sl-saware-comparison__table thead th{background:var(--sl-page-navy);color:#fff;font-size:14px;font-weight:700}
.sl-saware-library__table tbody th{color:var(--sl-page-navy);font-weight:700;background:rgba(20,114,186,.06)}
.sl-saware-comparison__saware-head,.sl-saware-comparison__saware-cell{background:rgba(20,114,186,.08);color:var(--sl-page-navy);font-weight:600}
.sl-saware-library__explorer{margin-top:28px}
.sl-saware-library__explorer-note{margin:0 0 18px;color:var(--sl-page-muted)}
.sl-saware-library__cards{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-saware-library__card{display:flex;flex-direction:column;min-width:0;margin:0;overflow:hidden;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 24px rgba(22,35,78,.05)}
.sl-saware-library__cat-badge{display:inline-flex;align-items:center;gap:8px;align-self:flex-start;margin:14px 14px 0;padding:6px 12px 6px 8px;border-radius:999px;font-size:12px;font-weight:700;line-height:1.2;color:#fff}
.sl-saware-library__cat-dot{flex:0 0 10px;width:10px;height:10px;border-radius:50%;background:rgba(255,255,255,.95);box-shadow:0 0 0 3px rgba(255,255,255,.25)}
.sl-saware-library__cat-badge--frameworks{background:#1472ba}
.sl-saware-library__cat-badge--industry{background:#0e9f4a}
.sl-saware-library__cat-badge--core{background:#ea3e24}
.sl-saware-library__card-media{display:block;margin-top:12px;line-height:0}
.sl-saware-library__card-media amp-img{display:block;width:100%}
.sl-saware-library__card-body{display:flex;flex-direction:column;gap:10px;padding:16px 16px 18px;flex:1 1 auto}
.sl-saware-library__card-title{margin:0;font-size:17px;line-height:1.35;color:var(--sl-page-navy)}
.sl-saware-library__card-title a{color:inherit;text-decoration:none}
.sl-saware-library__card-excerpt{margin:0;font-size:14px;line-height:1.55;color:var(--sl-page-text)}
.sl-saware-library__card-link{margin-top:auto;color:var(--sl-page-primary);font-size:14px;font-weight:700;text-decoration:none}
@media(min-width:700px){.sl-saware-library__cards{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}}
@media(min-width:768px){.sl-saware-library__table,.sl-saware-comparison__table{min-width:0}.sl-saware-library__table-wrap,.sl-saware-comparison__table-wrap{border-radius:16px}}

/* Customisation / progress lists */
.sl-saware-customisation__list,.sl-saware-progress__list{margin:16px 0;padding:0;list-style:none;display:grid;gap:10px}
.sl-saware-customisation__list-item,.sl-saware-progress__list-item{position:relative;padding:12px 14px 12px 38px;border:1px solid rgba(107,124,147,.16);border-radius:12px;background:var(--sl-page-bg);color:var(--sl-page-navy);font-weight:600}
.sl-saware-customisation__list-item::before,.sl-saware-progress__list-item::before{content:"";position:absolute;left:14px;top:50%;width:10px;height:10px;border-radius:50%;background:var(--sl-page-primary);transform:translateY(-50%)}
.sl-saware-customisation__highlight{margin-top:8px;padding:16px 18px;border-radius:14px;background:var(--sl-page-primary-soft)}
.sl-saware-customisation__highlight p{margin:0;color:var(--sl-page-navy);font-weight:600}

/* Delivery options + summary cards */
.sl-saware-delivery__intro-block{margin-bottom:24px}
.sl-saware-delivery__options{display:grid;grid-template-columns:minmax(0,1fr);gap:14px;margin-bottom:28px}
.sl-saware-delivery__option{margin:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-saware-delivery__option-subtitle{margin:0 0 12px;color:var(--sl-page-primary);font-size:15px;font-weight:600}
.sl-saware-delivery__option-ideal{margin-top:10px!important}
.sl-saware-delivery__option-link{display:inline-flex;align-items:center;gap:6px;margin-top:10px;color:var(--sl-page-primary);font-weight:700;text-decoration:none}
.sl-saware-delivery__summary{padding:24px 20px;border-radius:18px;background:var(--sl-page-navy)}
.sl-saware-delivery__summary-title{margin:0 0 18px;color:#fff;font-size:20px;line-height:1.35}
.sl-saware-delivery__summary-list{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;margin:0;padding:0;list-style:none}
.sl-saware-delivery__summary-item{display:flex;align-items:flex-start;gap:12px;margin:0;padding:16px;border-radius:14px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12)}
.sl-saware-delivery__summary-icon{display:grid;place-items:center;flex:0 0 42px;width:42px;height:42px;border-radius:12px;background:rgba(32,188,237,.18);color:#20bced}
.sl-saware-delivery__summary-copy{display:flex;flex-direction:column;gap:4px;min-width:0}
.sl-saware-delivery__summary-label{color:#fff;font-size:15px}
.sl-saware-delivery__summary-note{color:rgba(255,255,255,.72);font-size:13px;line-height:1.45}
@media(min-width:700px){.sl-saware-delivery__options{grid-template-columns:repeat(2,minmax(0,1fr))}.sl-saware-delivery__summary-list{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(min-width:1000px){.sl-saware-delivery__summary-list{grid-template-columns:repeat(3,minmax(0,1fr))}}

/* Workforce / teams cards */
.sl-saware-workforce__heading,.sl-saware-security-teams__heading{margin-bottom:24px}
.sl-saware-workforce__intro,.sl-saware-security-teams__intro{display:flex;flex-direction:column;gap:12px;max-width:820px}
.sl-saware-workforce__intro p,.sl-saware-security-teams__intro p{margin:0}
.sl-saware-workforce__grid,.sl-saware-security-teams__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:14px}
.sl-saware-workforce__card,.sl-saware-security-teams__card{margin:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-saware-workforce__card-title,.sl-saware-security-teams__card-title{display:flex;align-items:flex-start;gap:12px;margin:0 0 12px}
.sl-saware-workforce__number,.sl-saware-security-teams__number{display:inline-flex;align-items:center;justify-content:center;flex:0 0 36px;min-width:36px;height:28px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:700}
.sl-saware-workforce__card p,.sl-saware-security-teams__card p{margin:0}
@media(min-width:700px){.sl-saware-workforce__grid,.sl-saware-security-teams__grid{grid-template-columns:repeat(2,minmax(0,1fr))}}

/* SBCS journey stack */
.sl-sbcs__intro{margin-bottom:24px}
.sl-sbcs__journey{position:relative;display:flex;flex-direction:column;gap:16px}
.sl-sbcs__step{display:flex;gap:14px;align-items:flex-start}
.sl-sbcs__step-marker{display:grid;place-items:center;flex:0 0 36px;width:36px;height:36px;border-radius:50%;background:var(--sl-page-primary);color:#fff;font-size:13px;font-weight:700}
.sl-sbcs__step-heading{display:flex;flex-wrap:wrap;gap:8px 12px;align-items:baseline;margin:0 0 6px}
.sl-sbcs__step-action{display:inline-block;padding:4px 10px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:12px;font-weight:700}
.sl-sbcs__closing{margin-top:24px}

/* FAQ CTA */
.sl-saware-faq__cta{margin-top:24px}
.sl-saware-faq__cta .sl-btn{width:100%}
@media(min-width:768px){.sl-saware-faq__cta .sl-btn{width:auto}}

/* Contact inherits shared contact layout */
.sl-saware-contact{padding-bottom:64px}
