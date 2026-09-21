<?php
/**
 * Security Awareness — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-sap-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-sap-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-sap-page{--sl-fs-h2:48px}}
.sl-sap-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}
.sl-sap-page .sl-eyebrow,.sl-sap-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-sap-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-sap-page .sl-section--alt{background:var(--sl-page-bg,#f5f5f5)}
.sl-sap-page .sl-stat__value{color:var(--sl-page-primary,#1472ba)!important}
.sl-sap-page .sl-clients__title span{color:var(--sl-page-primary,#1472ba)!important}
.sl-sap-page .sl-clients__cta{margin-top:24px}
.sl-sap-page .sl-clients__grid{max-width:960px}
.sl-sap-page .sl-clients__cell amp-img{max-width:130px}
.sl-sap-page h2:not(.sl-sa-hero__subheading) > span,
.sl-sap-page .sl-h2 > span{color:var(--sl-page-primary,#1472ba)}
.sl-sa-hero{padding:16px 16px 40px 16px;background:radial-gradient(circle at 90% 20%,rgba(20,114,186,.12),transparent 34%),var(--sl-page-white)}
.sl-sa-hero__grid{display:grid;gap:28px;}
.sl-sa-hero__top{width:100%;max-width:none;margin:0 0 24px}
.sl-sap-page .sl-sa-hero h1,.sl-sa-hero__top h1{margin:0;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-sa-hero__top h1 > span,.sl-sap-page .sl-sa-hero h1 > span{color:var(--sl-heading-accent,var(--sl-page-primary,#1472ba))}
.sl-sa-hero__eyebrow{display:inline-block;margin:0 0 12px}
.sl-sap-page .sl-sa-hero h2.sl-hero-h2,
.sl-sap-page .sl-sa-hero h2.sl-sa-hero__subheading,
.sl-sap-page .sl-sa-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600}
.sl-sa-hero__description{margin:0 0 16px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-sa-hero__actions{display:flex;flex-wrap:wrap;gap:12px}
.sl-sa-hero .sl-btn--secondary{background:var(--sl-page-white);color:var(--sl-page-navy);border:1px solid rgba(22,35,78,.18)}
.sl-sa-hero__visual{min-width:0;width:100%}
.sl-sa-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:20px}
.sl-sa-hero__image amp-img{display:block;width:100%}
@media(min-width:900px){.sl-sa-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr)}}
.sl-sa-platform,.sl-sa-definition,.sl-sa-lifecycle,.sl-suite-section,.sl-sa-behaviour,.sl-sa-achieve,.sl-sa-leadership,.sl-sa-annual-training,.sl-sa-process,.sl-sa-comparison{padding:48px 16px}
/* Soft (#f5f5f5) / white alternate after hero (matches desktop; definition is AMP-only). */
.sl-sa-platform,.sl-sa-behaviour,.sl-sa-achieve,.sl-sa-annual-training,.sl-sa-comparison,.sl-sap-page #contact{background:var(--sl-page-bg)}
.sl-sa-definition,.sl-suite-section,.sl-sa-lifecycle,.sl-sa-leadership,.sl-sa-process,.sl-sap-faq{background:var(--sl-page-white)}
.sl-sa-platform__grid,.sl-sa-definition__layout,.sl-sa-lifecycle__layout{display:grid;gap:24px;align-items:center}
@media(min-width:900px){.sl-sa-platform__grid,.sl-sa-definition__layout,.sl-sa-lifecycle__layout{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}}
.sl-sa-platform__image,.sl-sa-definition__media,.sl-sa-lifecycle__image{overflow:hidden;border-radius:18px}
.sl-sa-platform amp-img,.sl-sa-definition amp-img,.sl-sa-lifecycle amp-img{display:block;width:100%;border-radius:18px;overflow:hidden}
.sl-sa-platform h2,.sl-sa-definition h2,.sl-sa-lifecycle h2,.sl-sa-achieve h2,.sl-sa-leadership h2,.sl-sa-annual-training h2,.sl-sa-process h2,.sl-sa-comparison h2,.sl-suite-intro h2,.sl-sa-behaviour h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy)}
.sl-sa-platform p,.sl-sa-definition p,.sl-sa-lifecycle p,.sl-suite-intro p,.sl-sa-behaviour__header p,.sl-sa-achieve__intro p,.sl-sa-annual-training__heading p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-sa-behaviour__connected{color:var(--sl-page-text,#4A4A4A)}
.sl-sa-behaviour__connected-label{margin-right:.35em;color:var(--sl-page-navy,#16234e);font-weight:700}
.sl-sa-platform__lead,.sl-sa-definition__lead{font-size:16px}
.sl-sa-platform__actions{margin:16px 0 0}
.sl-sa-definition__callout{margin:16px 0;padding:18px 20px;border-left:5px solid var(--sl-page-primary);border-radius:0 14px 14px 0;background:var(--sl-page-primary-soft)}
.sl-sa-definition__callout h3{margin:0 0 8px;font-size:16px;color:var(--sl-page-navy)}
.sl-sa-definition__image-placeholder{min-height:220px;border:1px dashed rgba(20,114,186,.45);border-radius:16px;background:rgba(20,114,186,.05);display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;padding:24px;text-align:center;aspect-ratio:640/720}
.sl-sa-platform__image,.sl-sa-lifecycle__image{width:100%;line-height:0}
.sl-sa-definition__image-size{color:var(--sl-page-primary);font-size:13px;font-weight:700}
.sl-sa-definition__image-note{color:var(--sl-page-navy);font-size:14px;font-weight:600;line-height:1.45}
.sl-suite-intro{margin-bottom:22px}
.sl-suite-grid{display:grid;grid-template-columns:1fr;gap:16px}
@media(min-width:900px){.sl-suite-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}}
.sl-suite-card{display:flex;flex-direction:column;min-width:0;padding:18px;border:1px solid rgba(107,124,147,.18);border-radius:18px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06);box-sizing:border-box}
.sl-suite-card__header{margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid rgba(107,124,147,.14)}
.sl-suite-card__header-main{min-width:0}
.sl-suite-product-label{display:inline-block;margin-bottom:6px;color:var(--sl-page-primary);font-size:12px;font-weight:800;letter-spacing:.02em}
.sl-suite-card__title{margin:0 0 8px;font-size:20px;line-height:1.3;color:var(--sl-page-navy);font-weight:700}
.sl-suite-card__subtitle{margin:0;font-size:14px;line-height:1.45;color:var(--sl-page-muted);font-weight:600}
.sl-suite-card__body{flex:1 1 auto}
.sl-suite-card__text{margin:0 0 12px;font-size:14px;line-height:1.65;color:var(--sl-page-text)}
.sl-suite-card__text:last-of-type{margin-bottom:0}
.sl-suite-highlight{display:block;margin-top:14px;padding:12px 14px;border-left:4px solid var(--sl-page-primary);border-radius:0 12px 12px 0;background:var(--sl-page-primary-soft);color:var(--sl-page-navy);font-size:13px;line-height:1.5;font-weight:700}
.sl-suite-card__actions{margin:16px 0 0}
.sl-suite-panel-cta{display:inline-flex}
@media(max-width:767px){.sl-suite-card{padding:16px}.sl-suite-card__title{font-size:18px}}
.sl-sa-behaviour__header{margin-bottom:22px}
.sl-sa-behaviour__header h3{margin:0 0 12px;font-size:18px;color:var(--sl-page-navy)}
.sl-sa-behaviour__steps{display:grid;grid-template-columns:1fr;gap:12px}
@media(min-width:600px){.sl-sa-behaviour__steps{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(min-width:900px){.sl-sa-behaviour__steps{grid-template-columns:repeat(5,minmax(0,1fr));gap:14px}.sl-sa-behaviour__line{display:block}}
.sl-sa-behaviour__card{position:relative;min-width:0;padding:20px 16px 22px;border:1px solid rgba(107,124,147,.2);border-radius:16px;background:var(--sl-page-white);box-shadow:0 12px 35px rgba(22,35,78,.06);box-sizing:border-box}
.sl-sa-behaviour__card-top{display:flex;align-items:center;margin-bottom:16px}
.sl-sa-behaviour__number{position:relative;z-index:2;display:inline-flex;align-items:center;justify-content:center;width:42px;height:42px;flex:0 0 42px;border-radius:12px;background:var(--sl-page-primary);color:#fff;font-size:13px;font-weight:700;line-height:1}
.sl-sa-behaviour__line{display:none;width:100%;height:1px;margin-left:10px;background:rgba(20,114,186,.28)}
.sl-sa-behaviour__card-body h3{margin:0 0 8px;font-size:16px;line-height:1.3;color:var(--sl-page-navy)}
.sl-sa-behaviour__card-body p{margin:0;font-size:14px;line-height:1.55;color:var(--sl-page-text)}
.sl-sa-behaviour__closing{display:grid;gap:8px;margin-top:20px;padding:18px 20px;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white)}
.sl-sa-behaviour__closing-label{display:block;font-size:12px;font-weight:700;color:var(--sl-page-primary);letter-spacing:.04em}
.sl-sa-behaviour__closing p{margin:0;font-size:14px;line-height:1.6;color:var(--sl-page-text)}
.sl-sa-achieve__grid,.sl-sa-annual-training__grid{display:grid;grid-template-columns:1fr;gap:14px;align-items:stretch}
@media(min-width:600px){.sl-sa-achieve__grid,.sl-sa-annual-training__grid{grid-template-columns:repeat(2,minmax(0,1fr))}.sl-sa-annual-training__grid > .sl-sa-annual-training__card:last-child:nth-child(odd){grid-column:1 / -1;width:100%;max-width:calc((100% - 14px) / 2);justify-self:center}}
@media(min-width:900px){.sl-sa-achieve__grid{grid-template-columns:repeat(3,minmax(0,1fr))}.sl-sa-annual-training__grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
.sl-sa-annual-training__heading{margin-bottom:22px}
.sl-sa-annual-training__heading h3{margin:0 0 12px;font-size:17px;line-height:1.4;color:var(--sl-page-primary);font-weight:600}
.sl-sa-annual-training__card,.sl-sa-achieve__card{display:flex;flex-direction:column;justify-content:flex-start;align-items:flex-start;height:100%;padding:20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box;box-shadow:0 8px 24px rgba(22,35,78,.04)}
.sl-sa-annual-training__title-row{display:flex;align-items:center;gap:12px;margin-bottom:12px}
.sl-sa-annual-training__number{display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;flex:0 0 38px;border-radius:9px;background:rgba(109,195,235,.22);color:var(--sl-page-primary);font-size:13px;font-weight:700;line-height:1}
.sl-sa-annual-training__card h3,.sl-sa-annual-training__title-row h3{margin:0;color:var(--sl-page-primary);font-size:16px;font-weight:600;line-height:1.3}
.sl-sa-annual-training__card>h3{margin:0 0 12px}
.sl-sa-annual-training__card p{margin:0;font-size:14px;line-height:1.55;color:var(--sl-page-text)}
.sl-sa-process__layout{display:grid;grid-template-columns:minmax(0,1fr);gap:22px;align-items:start}
.sl-sa-process__intro{margin-bottom:0}
.sl-sa-process__cards{min-width:0}
.sl-sa-process__grid{display:flex;flex-direction:column;gap:12px}
.sl-sa-process__grid > .sl-sa-annual-training__card{height:auto}
@media(min-width:768px){.sl-sa-process__layout{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:28px}.sl-sa-process__intro{position:sticky;top:16px}}
.sl-sa-achieve__icon{display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;margin:0 0 14px;border-radius:12px;background:rgba(109,195,235,.22);color:var(--sl-page-primary)}
.sl-sa-achieve__icon svg{display:block;width:22px;height:22px}
.sl-sa-achieve__text{margin:0;color:var(--sl-page-navy);font-size:15px;font-weight:500;line-height:1.55}
.sl-sa-comparison__heading{margin-bottom:22px}
.sl-sa-comparison__table-wrap{display:block;width:100%;max-width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 28px rgba(22,35,78,.06)}
.sl-sa-comparison__table{width:100%;min-width:560px;border-collapse:separate;border-spacing:0;background:var(--sl-page-white)}
.sl-sa-comparison__table th,.sl-sa-comparison__table td{width:50%;padding:14px 16px;border-bottom:1px solid rgba(107,124,147,.14);text-align:left;font-size:14px;line-height:1.5;vertical-align:top;box-sizing:border-box}
.sl-sa-comparison__table th{background:var(--sl-page-navy);color:#fff;font-size:13px;font-weight:700}
.sl-sa-comparison__table th:last-child{background:var(--sl-page-primary)}
.sl-sa-comparison__table tbody tr:last-child td{border-bottom:0}
.sl-sa-comparison__table tbody td:first-child{border-right:1px solid rgba(107,124,147,.14);background:rgba(245,243,239,.55)}
.sl-sa-comparison__cell{display:block;text-align:left}
.sl-sa-comparison__cell--highlight{color:var(--sl-page-navy);font-weight:700}
@media(max-width:767px){.sl-sa-comparison__table{min-width:520px}.sl-sa-comparison__table th,.sl-sa-comparison__table td{padding:12px 14px;font-size:13px}}
.sl-sa-dashboard__activity-bars{display:flex;align-items:flex-end;gap:4px;height:120px}
.sl-sa-dashboard__activity-column{flex:1;min-width:0;display:flex;flex-direction:column;align-items:center;height:100%}
.sl-sa-dashboard__activity-bar-track{flex:1;width:100%;display:flex;align-items:flex-end;justify-content:center}
.sl-sa-dashboard__activity-bar{display:block;width:100%;max-width:14px;border-radius:4px 4px 2px 2px;background:var(--sl-page-primary)}
.sl-sa-dashboard__activity-label{margin-top:4px;font-size:8px;color:var(--sl-page-muted);font-weight:600}
.sl-sa-contact-direct{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;margin-top:20px;max-width:100%}
.sl-sa-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:transparent;text-decoration:none;box-sizing:border-box}
.sl-sa-contact__email-label{color:var(--sl-page-muted,#6B7C93);font-size:12px;font-weight:600;line-height:1.2}
.sl-sa-contact__email-value{color:var(--sl-page-navy,#16234e);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-sa-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-sa-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-sa-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-sa-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-sa-contact__whatsapp-label,.sl-sa-contact__whatsapp-number,.sl-sa-contact__whatsapp:visited,.sl-sa-contact__whatsapp:visited .sl-sa-contact__whatsapp-label,.sl-sa-contact__whatsapp:visited .sl-sa-contact__whatsapp-number,.sl-sa-contact__whatsapp:hover .sl-sa-contact__whatsapp-label,.sl-sa-contact__whatsapp:hover .sl-sa-contact__whatsapp-number,.sl-sa-contact__whatsapp:focus .sl-sa-contact__whatsapp-label,.sl-sa-contact__whatsapp:focus .sl-sa-contact__whatsapp-number{color:#fff!important}
.sl-sa-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25;opacity:1}
.sl-sa-contact__whatsapp-number{font-size:14px;font-weight:700;line-height:1.25;letter-spacing:.01em;opacity:.95}
.sl-sap-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
@media(min-width:900px){.sl-sap-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}}
.sl-sap-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-sap-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-sa-contact-direct{gap:10px}.sl-sa-contact__email,.sl-sa-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center}.sl-sa-contact__email-value{font-size:14px}}
@media(max-width:767px){.sl-sa-platform h2,.sl-sa-definition h2,.sl-suite-intro h2,.sl-sa-behaviour h2,.sl-sa-lifecycle h2,.sl-sa-achieve h2,.sl-sa-leadership h2,.sl-sa-annual-training h2,.sl-sa-process h2,.sl-sa-comparison h2,.sl-sap-page .sl-h2{font-size:28px}}
.sl-sap-faq__cta{margin-top:20px}
.sl-sap-faq__cta .sl-btn{width:auto;max-width:100%}
.sl-sap-faq .sl-lead{margin:0 0 8px;max-width:none}
.sl-sap-faq .sl-amp-faq{margin-top:20px}
@media(max-width:767px){.sl-sap-faq__cta .sl-btn{width:100%}}
