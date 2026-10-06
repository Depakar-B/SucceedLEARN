<?php
/**
 * Workplace Harassment Prevention Training: AMP page styles.
 *
 * Buttons, lists, highlights, panel titles and FAQ come from the shared global styles.
 * Every section is single column: headings, then image, then copy.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-whp-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#F5F3EF;--sl-page-white:#fff;color:var(--sl-page-text);background:var(--sl-page-white)}
.sl-whp-page .sl-section{padding:48px 16px}
.sl-whp-page .sl-section--alt{background:var(--sl-page-bg)}
.sl-whp-page h1,.sl-whp-page h2,.sl-whp-page .sl-h2{color:var(--sl-page-navy)}
.sl-whp-page h1>span,.sl-whp-page h2>span,.sl-whp-page .sl-h2 span{color:var(--sl-page-primary)}
.sl-whp-page .sl-home-sub-heading,.sl-whp-page .sl-eyebrow{display:block;margin:0 0 12px;color:var(--sl-page-primary)}
.sl-whp-page .sl-h2{margin:0 0 14px}
.sl-whp-page .sl-panel-title{margin:0 0 14px;color:var(--sl-page-primary)}
.sl-whp-page p{color:var(--sl-page-text)}

/* Shared blocks */
.sl-whp-intro{margin:0 0 28px}
.sl-whp-intro>p{margin:0}
.sl-whp-copy p{margin:0 0 14px}
.sl-whp-copy p:last-child{margin-bottom:0}
.sl-whp-page .sl-whp-lead{color:var(--sl-page-navy);font-weight:700}
.sl-whp-after{margin-top:24px}
.sl-whp-page .sl-highlight{margin-top:24px}
.sl-whp-number{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:34px;height:34px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:12px;font-weight:700;line-height:1}

/* Single-column media block: sits after the section headings on every breakpoint */
.sl-whp-media{width:100%;margin:8px 0 28px}
.sl-whp-intro+.sl-whp-media{margin-top:-8px}
.sl-whp-media .sl-whp-image{max-width:640px;margin:0 auto}
.sl-whp-media .sl-whp-image--wide{max-width:760px}
.sl-whp-image{width:100%;overflow:hidden;border:1px solid rgba(22,35,78,.1);border-radius:14px;background:var(--sl-page-white);box-sizing:border-box}
.sl-whp-image amp-img{display:block}

/* Hero */
.sl-whp-hero h1{margin:0 0 12px}
.sl-whp-hero__tagline{margin:0 0 18px;color:var(--sl-page-primary);font-size:20px;line-height:1.35}
.sl-whp-hero__actions{display:flex;flex-direction:column;align-items:stretch;gap:12px;margin:22px 0 0}
.sl-whp-page .sl-whp-hero__actions .sl-hero-btn{width:100%;max-width:100%}

/* Region-specific examples */
.sl-whp-page .sl-whp-region-specific__label{margin:24px 0 12px;color:var(--sl-page-navy);font-weight:700}
.sl-whp-regions{display:grid;grid-template-columns:minmax(0,1fr);gap:10px;margin:0;padding:0;list-style:none}
.sl-whp-regions__item{display:flex;align-items:flex-start;gap:14px;padding:14px 16px;border:1px solid rgba(22,35,78,.09);border-radius:10px;background:var(--sl-page-white);box-sizing:border-box}
.sl-whp-regions__item p{margin:0;line-height:1.55}
.sl-whp-regions__flag{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:36px;height:24px;margin-top:2px;overflow:hidden;border-radius:4px;box-shadow:0 0 0 1px rgba(22,35,78,.12)}
.sl-whp-regions__flag svg{display:block;width:100%;height:100%}
.sl-whp-regions__flag--global{height:28px;margin-top:0;border-radius:0;box-shadow:none;color:var(--sl-page-primary)}
.sl-whp-regions__flag--global svg{width:28px;height:28px}

/* Practical questions */
.sl-whp-questions{display:grid;grid-template-columns:minmax(0,1fr);gap:10px;margin:0;padding:0;list-style:none}
.sl-whp-questions__item{display:flex;align-items:center;gap:12px;padding:12px 14px;border:1px solid rgba(22,35,78,.09);border-radius:10px;background:var(--sl-page-white);box-sizing:border-box}
.sl-whp-page .sl-whp-questions__item p{margin:0;color:var(--sl-page-navy);font-weight:600;line-height:1.45}

/* Regional training */
.sl-whp-regional__list{display:grid;grid-template-columns:minmax(0,1fr);gap:20px}
.sl-whp-regional__item{padding:24px 20px;border:1px solid rgba(22,35,78,.1);border-top:4px solid var(--sl-page-primary);border-radius:14px;background:var(--sl-page-white);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box}
.sl-whp-regional__item .sl-panel-title{margin:0 0 8px;font-size:20px;line-height:1.3}
.sl-whp-page .sl-whp-regional__subtitle{margin:0 0 14px;color:var(--sl-page-navy);font-weight:700}
.sl-whp-regional__roles{display:grid;gap:10px;margin:18px 0 0}
.sl-whp-regional__role{padding:14px 16px;border-left:3px solid var(--sl-page-primary);border-radius:0 10px 10px 0;background:var(--sl-page-bg)}
.sl-whp-regional__role strong{display:block;margin:0 0 6px;color:var(--sl-page-navy)}
.sl-whp-regional__role p{margin:0;line-height:1.55}
.sl-whp-regional__best{margin:18px 0 0;padding:14px 16px;border-radius:10px;background:var(--sl-page-primary-soft)}
.sl-whp-regional__best strong{display:block;margin:0 0 4px;color:var(--sl-page-primary)}
.sl-whp-regional__best p{margin:0;line-height:1.55}
.sl-whp-regional__item .sl-content-actions{margin-top:20px}
.sl-whp-page .sl-whp-regional__item .sl-content-btn{white-space:normal}

/* Course selection table */
.sl-whp-course__table{overflow:hidden;border:1px solid rgba(22,35,78,.12);border-radius:12px;background:var(--sl-page-white)}
.sl-whp-course__header{display:none}
.sl-whp-course__row{display:grid;grid-template-columns:minmax(0,1fr);gap:10px;padding:16px 18px}
.sl-whp-course__row+.sl-whp-course__row{border-top:1px solid rgba(22,35,78,.1)}
.sl-whp-course__label{display:block;margin:0 0 4px;color:var(--sl-page-muted);font-size:12px;font-weight:700;letter-spacing:.04em;text-transform:uppercase}
.sl-whp-course__cell p{margin:0;line-height:1.5}
.sl-whp-page .sl-whp-course__cell--training p{color:var(--sl-page-navy);font-weight:700}
.sl-whp-course__note .sl-panel-title{margin:0 0 8px}

/* Recognition path */
.sl-whp-path{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px;margin:24px 0 0;padding:0;list-style:none}
.sl-whp-path__step{display:flex;align-items:center;gap:10px;padding:12px 14px;border:1px solid rgba(22,35,78,.09);border-radius:10px;background:var(--sl-page-white);box-sizing:border-box}
.sl-whp-path__label{color:var(--sl-page-navy);font-weight:700}

/* Cards */
.sl-whp-cards{display:grid;grid-template-columns:minmax(0,1fr);gap:14px;width:100%}
.sl-whp-card{min-width:0;margin:0;padding:20px;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box}
.sl-whp-card .sl-whp-number{margin:0 0 12px}
.sl-whp-card .sl-panel-title{margin:0 0 10px;font-size:19px}
.sl-whp-card p{margin:0}

/* Checklists */
.sl-whp-check{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:22px;height:22px;border-radius:50%;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:700}
.sl-whp-page .sl-whp-list .sl-list-item,.sl-whp-page .sl-whp-list .sl-list-item:last-child{min-height:0;padding-bottom:13px}
.sl-whp-contact__moments{margin:0 0 24px}
.sl-whp-page .sl-whp-contact__direct-label{margin:24px 0 0;color:var(--sl-page-navy);font-weight:700}
.sl-whp-page .sl-whp-contact__direct-label+.sl-contact-actions{margin-top:12px}

/* Contact */
.sl-whp-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-whp-page .sl-contact-intro{margin:0}
.sl-whp-page .sl-contact-form-card{max-width:none;margin:0;padding:22px 18px;border:1px solid rgba(107,124,147,.22);border-radius:16px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}

/* Tablet */
@media(min-width:768px){
	.sl-whp-page .sl-section{padding:64px 24px}
	.sl-whp-hero__tagline{font-size:22px}
	.sl-whp-page .sl-whp-hero__actions{flex-direction:row;flex-wrap:wrap;align-items:center}
	.sl-whp-page .sl-whp-hero__actions .sl-hero-btn{width:auto;max-width:none;flex:0 0 auto;white-space:nowrap}
	.sl-whp-questions,.sl-whp-regions,.sl-whp-list--2up{grid-template-columns:repeat(2,minmax(0,1fr))}
	.sl-whp-path{grid-template-columns:repeat(4,minmax(0,1fr))}
	.sl-whp-regional__item{padding:28px}
	.sl-whp-course__header{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:24px;padding:16px 24px;background:var(--sl-page-navy);color:#fff;font-size:16px;font-weight:700}
	.sl-whp-course__row{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:24px;padding:16px 24px}
	.sl-whp-course__row:nth-child(odd){background:rgba(22,35,78,.025)}
	.sl-whp-course__label{display:none}
	.sl-whp-cards--grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
	.sl-whp-cards--grid>.sl-whp-card:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:calc(50% - 9px)}
	.sl-whp-page .sl-contact-form-card{padding:28px}
}

/* Desktop */
@media(min-width:1000px){
	.sl-whp-page .sl-section{padding:80px 24px}
	.sl-whp-intro{margin-bottom:40px}
	.sl-whp-cards--grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:20px}
	.sl-whp-cards--grid>.sl-whp-card,.sl-whp-cards--grid>.sl-whp-card:last-child:nth-child(odd){grid-column:span 2;justify-self:stretch;width:auto}
	.sl-whp-cards--grid>.sl-whp-card:nth-last-child(2):nth-child(3n+1){grid-column:2/span 2}
	.sl-whp-cards--grid>.sl-whp-card:last-child:nth-child(3n+1){grid-column:3/span 2}
	.sl-whp-page .sl-contact-form-card{padding:32px;border-radius:24px}
}
