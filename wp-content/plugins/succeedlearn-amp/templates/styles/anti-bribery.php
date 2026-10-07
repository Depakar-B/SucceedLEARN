<?php
/**
 * Anti-Bribery and Anti-Corruption AMP page styles.
 *
 * Structure mirrors gifts-and-entertainment.php (same sl-aml-* class names)
 * scoped to .sl-anti-bribery-page.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-anti-bribery-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-page-cta-soft:rgba(234,62,36,.1);--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#F5F3EF;--sl-page-white:#fff;color:var(--sl-page-text);background:var(--sl-page-white)}
.sl-anti-bribery-page .sl-section{padding:48px 16px}
.sl-anti-bribery-page .sl-section--alt{background:var(--sl-page-bg)}
.sl-anti-bribery-page h1,.sl-anti-bribery-page h2,.sl-anti-bribery-page .sl-h2{color:var(--sl-page-navy)}
.sl-anti-bribery-page h1>span,.sl-anti-bribery-page h2>span,.sl-anti-bribery-page .sl-h2 span{color:var(--sl-page-primary)}
.sl-anti-bribery-page .sl-h2{margin:0 0 14px}
.sl-anti-bribery-page .sl-panel-title{margin:0 0 10px;color:var(--sl-page-primary)}
.sl-anti-bribery-page p{color:var(--sl-page-text)}
.sl-aml-intro{margin:0 0 28px}
.sl-aml-intro>p{margin:0}
.sl-aml-copy p{margin:0 0 14px}
.sl-aml-copy p:last-child{margin-bottom:0}
.sl-anti-bribery-page .sl-aml-lead{color:var(--sl-page-navy);font-weight:700}
.sl-aml-after{margin-top:28px}
.sl-aml-media.sl-aml-after,.sl-aml-cards+.sl-aml-media{margin-top:36px}
.sl-anti-bribery-page .sl-highlight{margin-top:24px}
.sl-aml-number{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:34px;height:34px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:12px;font-weight:700;line-height:1}
.sl-aml-check{display:inline-flex;flex:0 0 auto;align-items:center;justify-content:center;width:22px;height:22px;border-radius:50%;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:700}
.sl-aml-check--warn{background:var(--sl-page-cta-soft);color:var(--sl-page-cta)}

/* Media */
.sl-aml-media{width:100%;margin:8px 0 28px}
.sl-aml-intro+.sl-aml-media{margin-top:-8px}
.sl-aml-media .sl-aml-image{max-width:640px;margin:0 auto}
.sl-aml-media .sl-aml-image--wide{max-width:760px}
.sl-aml-media .sl-aml-image--cpd{max-width:170px}
.sl-aml-image{width:100%;overflow:hidden;border:1px solid rgba(22,35,78,.1);border-radius:14px;background:var(--sl-page-white);box-sizing:border-box}
.sl-aml-image--cpd{border:0;background:transparent;border-radius:0}
.sl-aml-image amp-img{display:block}
.sl-aml-image--natural{border:0;background:transparent;max-width:560px}
.sl-aml-image--natural amp-img{max-width:100%;height:auto}
.sl-aml-image--natural amp-img img,.sl-aml-image--natural .i-amphtml-fill-content{object-fit:contain!important;object-position:center}

/* Hero */
.sl-aml-pe-vc-hero h1{margin:0 0 16px}
.sl-aml-tags{display:flex;flex-wrap:wrap;gap:8px;margin:18px 0 0;padding:0;list-style:none}
.sl-aml-tags li{display:inline-flex;align-items:center;padding:7px 12px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:700;line-height:1.2}
.sl-aml-hero__actions{display:flex;flex-direction:column;align-items:stretch;gap:12px;margin:22px 0 0}
.sl-aml-hero__cta-item{display:flex;flex-direction:column;align-items:flex-start;gap:8px;width:100%}
.sl-aml-hero__cta-label{color:#374151;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;line-height:1.2}
.sl-anti-bribery-page .sl-aml-hero__actions .sl-hero-btn{width:100%;max-width:100%}

/* Feature lists */
.sl-aml-feature-list{display:grid;grid-template-columns:minmax(0,1fr);gap:10px;margin:20px 0 0;padding:0;list-style:none}
.sl-aml-feature-list__item{display:flex;align-items:flex-start;gap:12px;padding:14px 16px;border:1px solid rgba(22,35,78,.09);border-radius:10px;background:var(--sl-page-white);box-sizing:border-box}
.sl-aml-feature-list__item strong{display:block;margin:0 0 4px;color:var(--sl-page-navy)}
.sl-aml-feature-list__item span{color:var(--sl-page-text);line-height:1.5}
.sl-anti-bribery-page .sl-aml-list .sl-list-item,.sl-anti-bribery-page .sl-aml-list .sl-list-item:last-child{min-height:0;padding-bottom:13px}
.sl-aml-disclaimer{margin:18px 0 0;color:var(--sl-page-muted);font-size:14px}

/* Outcomes (risk / learning outcomes / target audience) */
.sl-aml-outcome-list{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;margin:0;padding:0;list-style:none}
.sl-aml-outcome-list__item{display:flex;align-items:flex-start;gap:12px;padding:16px 18px;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box}
.sl-aml-outcome-list__item .sl-panel-title{margin:0 0 6px;font-size:18px;color:var(--sl-page-navy)}
.sl-aml-outcome-list__item p{margin:0}

/* Decision cards (consider / avoid) */
.sl-aml-cards{display:grid;grid-template-columns:minmax(0,1fr);gap:14px;width:100%}
.sl-aml-card{min-width:0;margin:0;padding:20px;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box}
.sl-aml-card .sl-panel-title{margin:0 0 10px;font-size:19px;color:var(--sl-page-primary)}
.sl-aml-card p{margin:0}
.sl-aml-card--warn .sl-panel-title{color:var(--sl-page-cta)}
.sl-aml-card--warn{border-color:rgba(234,62,36,.18)}
.sl-aml-cards--split{grid-template-columns:minmax(0,1fr);gap:14px}

/* Concepts (high-risk scenario cards / UK-US legal context cards) */
.sl-aml-concept-stack{display:grid;grid-template-columns:minmax(0,1fr);gap:20px}
.sl-aml-concept{padding:22px 18px;border:1px solid rgba(22,35,78,.1);border-radius:14px;background:var(--sl-page-white);box-shadow:0 6px 18px rgba(22,35,78,.04);box-sizing:border-box}
.sl-aml-concept .sl-aml-media{margin:0 0 18px}
.sl-aml-concept__code{display:inline-flex;align-items:center;justify-content:center;min-width:58px;margin:0 0 12px;padding:7px 12px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:700}
.sl-aml-concept .sl-panel-title{margin:0 0 6px;font-size:20px;color:var(--sl-page-navy)}
.sl-anti-bribery-page .sl-aml-concept__subtitle{margin:0 0 12px;color:var(--sl-page-primary);font-weight:700}
.sl-aml-concept p{margin:0 0 12px}
.sl-aml-concept>p:last-child,.sl-aml-concept .sl-aml-copy p:last-child{margin:0}
.sl-anti-bribery-page .sl-aml-caption{margin:10px 0 0;color:var(--sl-page-muted);font-size:14px;text-align:center}

/* Contact */
.sl-anti-bribery-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-anti-bribery-page .sl-contact-intro{margin:0}
.sl-anti-bribery-page .sl-contact-form-card{max-width:none;margin:0;padding:22px 18px;border:1px solid rgba(107,124,147,.22);border-radius:16px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}

@media(min-width:768px){
	.sl-anti-bribery-page .sl-section{padding:64px 24px}
	.sl-anti-bribery-page .sl-aml-hero__actions{flex-direction:row;flex-wrap:wrap;align-items:flex-start}
	.sl-anti-bribery-page .sl-aml-hero__cta-item{width:auto}
	.sl-anti-bribery-page .sl-aml-hero__actions .sl-hero-btn{width:auto;max-width:none;flex:0 0 auto;white-space:nowrap}
	.sl-aml-feature-list,.sl-aml-outcome-list{grid-template-columns:repeat(2,minmax(0,1fr))}
	.sl-anti-bribery-page .sl-aml-outcome-list>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 12px) / 2)}
	.sl-aml-cards--split{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
	.sl-aml-concept-stack--high-risk{grid-template-columns:repeat(2,minmax(0,1fr))}
	.sl-anti-bribery-page .sl-contact-form-card{padding:28px}
}

@media(min-width:1000px){
	.sl-anti-bribery-page .sl-section{padding:80px 24px}
	.sl-aml-intro{margin-bottom:40px}
	.sl-anti-bribery-page .sl-contact-form-card{padding:32px;border-radius:24px}
}
