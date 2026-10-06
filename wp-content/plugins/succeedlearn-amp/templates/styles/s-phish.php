<?php
/**
 * S-Phish Phishing Simulation: AMP page styles.
 *
 * Buttons, lists, highlights, panel titles and FAQ come from the shared global styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-s-phish-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#F5F3EF;--sl-page-white:#fff;color:var(--sl-page-text);background:var(--sl-page-white)}
.sl-s-phish-page .sl-section{padding:48px 16px}
.sl-s-phish-page .sl-section--alt{background:var(--sl-page-bg)}
.sl-s-phish-page h1,.sl-s-phish-page h2,.sl-s-phish-page .sl-h2{color:var(--sl-page-navy)}
.sl-s-phish-page h1>span,.sl-s-phish-page h2>span,.sl-s-phish-page .sl-h2 span{color:var(--sl-page-primary)}
.sl-s-phish-page .sl-home-sub-heading,.sl-s-phish-page .sl-eyebrow{display:block;margin:0 0 12px;color:var(--sl-page-primary)}
.sl-s-phish-page .sl-h2{margin:0 0 14px}
.sl-s-phish-page .sl-panel-title{margin:0 0 14px;color:var(--sl-page-primary)}
.sl-s-phish-page p{color:var(--sl-page-text)}

/* Shared blocks */
.sl-s-phish-intro{margin:0 0 28px}
.sl-s-phish-intro>p{margin:0}
.sl-s-phish-copy p{margin:0 0 14px}
.sl-s-phish-copy p:last-child{margin-bottom:0}
.sl-s-phish-flow{margin:0 0 14px;color:var(--sl-page-navy);font-weight:700;line-height:1.6}

/* Single-column media block: sits after the section headings on every breakpoint */
.sl-s-phish-media{width:100%;margin:8px 0 28px}
.sl-s-phish-intro+.sl-s-phish-media{margin-top:-8px}
.sl-s-phish-media .sl-s-phish-image{max-width:640px;margin:0 auto}
.sl-s-phish-media .sl-s-phish-image--square{max-width:480px}
.sl-s-phish-hero .sl-s-phish-media .sl-s-phish-image,.sl-s-phish-media .sl-s-phish-meet__video{max-width:760px;margin:0 auto}
.sl-s-phish-image{width:100%;overflow:hidden;border:1px solid rgba(22,35,78,.1);border-radius:14px;background:var(--sl-page-white);box-sizing:border-box}
.sl-s-phish-image amp-img{display:block}

/* Hero */
.sl-s-phish-hero h1{margin:0 0 12px}
.sl-s-phish-hero__tagline{margin:0 0 18px;color:var(--sl-page-navy);font-size:20px;line-height:1.35}
.sl-s-phish-hero__pillars{color:var(--sl-page-navy);font-weight:700}
.sl-s-phish-hero__actions{display:flex;flex-direction:column;align-items:stretch;gap:12px;margin:22px 0 0}
.sl-s-phish-page .sl-s-phish-hero__actions .sl-hero-btn{width:100%;max-width:100%}

/* Meet (video) */
.sl-s-phish-meet__video{width:100%;overflow:hidden;border:1px solid rgba(22,35,78,.1);border-radius:14px;background:#16234e;box-shadow:0 8px 20px rgba(22,35,78,.08)}
.sl-s-phish-meet__closing{margin:28px 0 0;color:var(--sl-page-navy);font-weight:700}

/* Cards */
.sl-s-phish-cards{display:grid;grid-template-columns:minmax(0,1fr);gap:14px;width:100%}
.sl-s-phish-card{min-width:0;margin:0;padding:20px 20px;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box}
.sl-s-phish-card .sl-panel-title{margin:0 0 10px;font-size:19px}
.sl-s-phish-card p{margin:0 0 10px}
.sl-s-phish-card p:last-child{margin-bottom:0}

/* Lists */
.sl-s-phish-list{margin:20px 0 0}
.sl-s-phish-check{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:22px;height:22px;border-radius:50%;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:700}
.sl-s-phish-page .sl-s-phish-list .sl-list-item,.sl-s-phish-page .sl-s-phish-list .sl-list-item:last-child{padding-bottom:13px}
.sl-s-phish-reporting__after{margin-top:24px}

/* PhishCue */
.sl-s-phish-phishcue__response{margin:28px 0 24px}
.sl-s-phish-phishcue__response .sl-s-phish-flow{margin:8px 0 0}
.sl-s-phish-features .sl-list-item,.sl-s-phish-features .sl-list-item:last-child{flex-direction:column;align-items:flex-start;gap:6px;padding-bottom:13px}
.sl-s-phish-page .sl-s-phish-features .sl-list-item__label{min-width:0;color:var(--sl-page-navy);line-height:1.35}

/* Comparison table */
.sl-s-phish-comparison__table-wrap{width:100%;max-width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;border:1px solid rgba(22,35,78,.12);border-radius:12px;background:var(--sl-page-white)}
.sl-s-phish-comparison__table{width:100%;min-width:520px;border-collapse:separate;border-spacing:0;table-layout:fixed}
.sl-s-phish-comparison__table thead th{padding:16px 18px;background:var(--sl-page-navy);color:#fff;font-size:16px;font-weight:700;line-height:1.3;text-align:center}
.sl-s-phish-comparison__table thead th.sl-s-phish-comparison__sphish-heading{background:var(--sl-page-primary)}
.sl-s-phish-comparison__table tbody td{padding:15px 18px;border-top:1px solid rgba(22,35,78,.1);color:var(--sl-page-text);line-height:1.5;text-align:left;vertical-align:top}
.sl-s-phish-comparison__table tbody td+td{border-left:1px solid rgba(22,35,78,.1)}
.sl-s-phish-comparison__table tbody tr:nth-child(even) td{background:rgba(22,35,78,.025)}
.sl-s-phish-comparison__table tbody td.sl-s-phish-comparison__sphish-cell{background:rgba(20,114,186,.05);color:var(--sl-page-navy);font-weight:600}
.sl-s-phish-comparison__table tbody tr:nth-child(even) td.sl-s-phish-comparison__sphish-cell{background:rgba(20,114,186,.08)}

/* Contact */
.sl-s-phish-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-s-phish-page .sl-contact-intro{margin:0}
.sl-s-phish-page .sl-contact-form-card{max-width:none;margin:0;padding:22px 18px;border:1px solid rgba(107,124,147,.22);border-radius:16px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}

/* Tablet */
@media(min-width:768px){
	.sl-s-phish-page .sl-section{padding:64px 24px}
	.sl-s-phish-hero__tagline{font-size:22px}
	.sl-s-phish-page .sl-s-phish-hero__actions{flex-direction:row;flex-wrap:wrap;align-items:center}
	.sl-s-phish-page .sl-s-phish-hero__actions .sl-hero-btn{width:auto;max-width:none;flex:0 0 auto;white-space:nowrap}
	.sl-s-phish-cards--grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
	.sl-s-phish-cards--grid>.sl-s-phish-card:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:calc(50% - 9px)}
	.sl-s-phish-list--3up{grid-template-columns:repeat(2,minmax(0,1fr))}
	.sl-s-phish-features{grid-template-columns:repeat(2,minmax(0,1fr))}
	.sl-s-phish-comparison__table{min-width:0}
	.sl-s-phish-comparison__table thead th{padding:20px 24px;font-size:17px}
	.sl-s-phish-comparison__table tbody td{padding:18px 24px}
	.sl-s-phish-page .sl-contact-form-card{padding:28px}
}

/* Desktop */
@media(min-width:1000px){
	.sl-s-phish-page .sl-section{padding:80px 24px}
	.sl-s-phish-intro{margin-bottom:40px}
	.sl-s-phish-cards--grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:20px}
	.sl-s-phish-cards--grid>.sl-s-phish-card,.sl-s-phish-cards--grid>.sl-s-phish-card:last-child:nth-child(odd){grid-column:span 2;justify-self:stretch;width:auto}
	.sl-s-phish-cards--grid>.sl-s-phish-card:nth-last-child(2):nth-child(3n+1){grid-column:2/span 2}
	.sl-s-phish-cards--grid>.sl-s-phish-card:last-child:nth-child(3n+1){grid-column:3/span 2}
	.sl-s-phish-list--3up{grid-template-columns:repeat(3,minmax(0,1fr))}
	.sl-s-phish-page .sl-contact-form-card{padding:32px;border-radius:24px}
}
