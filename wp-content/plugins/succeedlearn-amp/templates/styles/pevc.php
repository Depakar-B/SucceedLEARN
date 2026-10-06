<?php
/**
 * Private Equity and Venture Capital Suite — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-pevc-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px;color:var(--sl-page-text);background:var(--sl-page-white)}
@media(min-width:900px){.sl-pevc-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-pevc-page{--sl-fs-h2:48px}}
.sl-pevc-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-pevc-page h1>span,.sl-pevc-page h2>span,.sl-pevc-page .sl-h2>span{color:var(--sl-page-primary)}
.sl-pevc-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-pevc-page amp-img{display:block;width:100%}
.sl-pevc-page .sl-panel-title{margin:0 0 10px;color:var(--sl-page-navy)}
.sl-pevc-hero,.sl-pevc-decision,.sl-pevc-programme,.sl-pevc-faq{background:var(--sl-page-white)}
.sl-pevc-pricing,.sl-pevc-suite,.sl-pevc-why,.sl-pevc-image,.sl-pevc-audience,.sl-pevc-delivery,.sl-pevc-contact{background:var(--sl-page-bg)}
.sl-pevc-hero,.sl-pevc-pricing,.sl-pevc-suite,.sl-pevc-why,.sl-pevc-decision,.sl-pevc-image,.sl-pevc-audience,.sl-pevc-programme,.sl-pevc-delivery,.sl-pevc-faq,.sl-pevc-contact{padding:48px 16px}

/* Hero — single column only */
.sl-pevc-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(20,114,186,.12),transparent 34%),var(--sl-page-white)}
.sl-pevc-page .sl-pevc-hero h1{margin:0 0 18px;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;max-width:none}
.sl-pevc-hero__media{margin:24px 0 0}
.sl-pevc-hero__content{margin:0 0 8px}
.sl-pevc-hero__lead{color:var(--sl-page-navy);font-weight:600}
.sl-pevc-hero__actions{display:flex;flex-direction:column;align-items:stretch;gap:12px;margin-top:20px}
.sl-pevc-hero__actions .sl-hero-btn{width:100%;max-width:100%}
.sl-pevc-hero__highlights{display:grid;grid-template-columns:minmax(0,1fr);gap:0;margin:28px 0 0;padding:0;list-style:none;border-top:1px solid rgba(22,35,78,.12)}
.sl-pevc-hero__highlight{margin:0;padding:16px 0}
.sl-pevc-hero__highlight:first-child{padding-top:18px}
.sl-pevc-hero__highlight+.sl-pevc-hero__highlight{border-top:1px solid rgba(22,35,78,.12)}
.sl-pevc-hero__highlight-title{display:flex;align-items:center;gap:12px;color:var(--sl-page-primary);font-size:16px;font-weight:700;line-height:1.4}
.sl-pevc-hero__highlight-title::before{content:"";flex:0 0 auto;width:10px;height:10px;border-radius:50%;background:var(--sl-page-primary);box-shadow:0 0 0 6px var(--sl-page-primary-soft)}
.sl-pevc-hero__image{overflow:hidden;border-radius:16px;line-height:0;width:100%;max-width:760px;margin:0 auto}

/* Pricing — single column */
.sl-pevc-pricing__banner{display:flex;flex-direction:column;gap:24px;padding:28px 22px;border:1px solid rgba(107,124,147,.18);border-radius:18px;background:var(--sl-page-white);box-shadow:0 10px 28px rgba(22,35,78,.05);box-sizing:border-box}
.sl-pevc-pricing__badge{display:inline-flex;align-items:center;margin:0 0 12px;padding:7px 12px;border-radius:999px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:12px;font-weight:700;line-height:1.2}
.sl-pevc-pricing__price{margin:0 0 12px;color:var(--sl-page-navy);font-size:28px;font-weight:700;line-height:1.2}
.sl-pevc-pricing__lead{margin:0 0 18px}
.sl-pevc-pricing__actions{display:flex;flex-direction:column;align-items:stretch;gap:12px;margin-top:8px}
.sl-pevc-pricing__actions .sl-hero-btn{width:100%;max-width:100%}
.sl-pevc-pricing__list{margin:0;padding:0;list-style:none}
.sl-pevc-pricing__list .sl-list-item:last-child{padding-bottom:22px}

/* Tablet+: hero + pricing CTAs inline; single hero btn stays content-width */
@media(min-width:768px){
	.sl-pevc-page .sl-pevc-hero__actions,
	.sl-pevc-page .sl-pevc-pricing__actions,
	.sl-pevc-page .sl-hero-actions.sl-pevc-pricing__actions{
		flex-direction:row;
		flex-wrap:wrap;
		align-items:flex-start
	}
	.sl-pevc-page .sl-pevc-hero__actions .sl-hero-btn,
	.sl-pevc-page .sl-pevc-pricing__actions .sl-hero-btn,
	.sl-pevc-page .sl-hero-actions.sl-pevc-pricing__actions .sl-hero-btn{
		width:fit-content;
		max-width:none;
		flex:0 0 auto;
		white-space:nowrap
	}
}

/* Suite — match desktop card UI */
.sl-pevc-suite__intro{margin:0 0 28px}
.sl-pevc-suite__lead{margin:0 0 18px}
.sl-pevc-suite__offer{display:flex;flex-direction:column;align-items:flex-start;gap:12px;margin:0 0 8px;padding:24px;border:1px solid #dfe3ea;border-radius:16px;background:var(--sl-page-white);box-shadow:0 10px 28px rgba(22,35,78,.09);box-sizing:border-box}
.sl-pevc-suite__offer-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;letter-spacing:.08em;text-transform:uppercase}
.sl-pevc-suite__offer-price{color:var(--sl-page-cta);font-size:24px;font-weight:700;line-height:1.15}
.sl-pevc-suite__offer-price span{display:block;margin-top:5px;color:var(--sl-page-navy);font-size:14px;font-weight:500}
.sl-pevc-suite__offer .sl-content-btn{width:100%}
.sl-pevc-suite__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:100%}
.sl-pevc-suite__card{display:flex;flex-direction:column;min-width:0;width:100%;min-height:0;margin:0;padding:24px 20px;border:1px solid #dfe3ea;border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-pevc-suite__number{display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;margin:0 0 18px;border-radius:13px;background:#eef5fd;color:var(--sl-page-primary);font-size:15px;font-weight:700}
.sl-pevc-suite__card .sl-panel-title{margin:0 0 10px;min-height:0;color:var(--sl-page-navy);font-size:19px;line-height:1.28}
.sl-pevc-suite__card p{margin:0 0 18px;flex:1 1 auto;font-size:14px;line-height:1.55;color:var(--sl-page-text)}
.sl-pevc-suite__explore{display:inline-flex;align-items:center;gap:7px;margin-top:auto;color:var(--sl-page-primary);font-size:14px;font-weight:600;text-decoration:none}
.sl-pevc-suite__explore::after{content:"→";font-size:15px}
.sl-pevc-suite__card--fcp{background:var(--sl-page-white);grid-column:auto}
@media(min-width:700px){
	.sl-pevc-suite__offer .sl-content-btn{width:fit-content;max-width:none;white-space:nowrap}
	.sl-pevc-page .sl-pevc-suite__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
	.sl-pevc-page .sl-pevc-suite__card--fcp{grid-column:1/-1}
}
@media(min-width:1000px){
	.sl-pevc-page .sl-pevc-suite__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
	.sl-pevc-page .sl-pevc-suite__card--fcp{grid-column:1/-1}
}

/* Why */
.sl-pevc-why__lead{color:var(--sl-page-navy);font-weight:600}
.sl-pevc-why__panel{margin-top:24px;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-pevc-why__list{margin:0;padding-left:1.25em}
.sl-pevc-why__list li+li{margin-top:8px}

/* Decision */
.sl-pevc-decision__lead{margin:0 0 22px}
.sl-pevc-decision__step{display:flex;flex-direction:column;min-width:0;width:100%;margin:0;padding:20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-pevc-decision__icon{display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;margin:0 0 12px;border-radius:50%;background:var(--sl-page-primary);color:#fff;font-size:16px;font-weight:700}
.sl-pevc-decision__step p{margin:0}
@media(min-width:768px){.sl-pevc-page .sl-pevc-decision__grid.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-pevc-page .sl-pevc-decision__grid.sl-amp-card-grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}}
@media(min-width:1000px){.sl-pevc-page .sl-pevc-decision__grid.sl-amp-card-grid{grid-template-columns:repeat(5,minmax(0,1fr));gap:16px}.sl-pevc-page .sl-pevc-decision__grid.sl-amp-card-grid>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}

/* Image */
.sl-pevc-image__figure{margin:0;overflow:hidden;border-radius:16px;line-height:0}

/* Audience */
.sl-pevc-audience__lead{margin:0 0 22px}
.sl-pevc-audience__item{display:flex;align-items:center;gap:14px;min-width:0;width:100%;margin:0;padding:18px 16px;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-sizing:border-box}
.sl-pevc-audience__icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:40px;height:40px;border-radius:10px;background:var(--sl-page-primary-soft);color:var(--sl-page-primary);font-size:13px;font-weight:700}
.sl-pevc-audience__item strong{color:var(--sl-page-navy);font-size:15px;line-height:1.35}
@media(min-width:768px){.sl-pevc-page .sl-pevc-audience__grid.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:16px}}
@media(min-width:1000px){.sl-pevc-page .sl-pevc-audience__grid.sl-amp-card-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:20px}}

/* Programme */
.sl-pevc-programme__lead{margin:0 0 22px}
.sl-pevc-programme__card{display:flex;flex-direction:column;min-width:0;width:100%;margin:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-pevc-programme__num{display:inline-flex;align-items:center;justify-content:center;width:34px;height:34px;margin:0 0 12px;border-radius:10px;background:var(--sl-page-primary);color:#fff;font-size:14px;font-weight:700}
.sl-pevc-programme__card p{margin:0}
@media(min-width:768px){.sl-pevc-page .sl-pevc-programme__grid.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}}
@media(min-width:1000px){.sl-pevc-page .sl-pevc-programme__grid.sl-amp-card-grid{grid-template-columns:repeat(4,minmax(0,1fr));gap:20px}}

/* Delivery */
.sl-pevc-delivery__lead{margin:0 0 22px}
.sl-pevc-delivery__card{display:flex;flex-direction:column;min-width:0;width:100%;margin:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-pevc-delivery__card p{margin:0}
@media(min-width:768px){.sl-pevc-page .sl-pevc-delivery__grid.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-pevc-page .sl-pevc-delivery__grid.sl-amp-card-grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}}
@media(min-width:1000px){.sl-pevc-page .sl-pevc-delivery__grid.sl-amp-card-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-pevc-page .sl-pevc-delivery__grid.sl-amp-card-grid>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}

/* Contact */
.sl-pevc-contact__lead{margin:0 0 18px}
.sl-pevc-contact__benefits{margin:0;padding:0;list-style:none}
.sl-pevc-contact__benefits .sl-list-item:last-child{padding-bottom:22px}
