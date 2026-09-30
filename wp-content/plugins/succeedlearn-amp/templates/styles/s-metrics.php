<?php
/**
 * S-Metrics — AMP page styles (layout / spacing only).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-s-metrics-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-s-metrics-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-s-metrics-page{--sl-fs-h2:48px}}
.sl-s-metrics-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-s-metrics-page .sl-eyebrow,.sl-s-metrics-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-s-metrics-page h2:not(.sl-s-metrics-hero__subheading) > span,
.sl-s-metrics-page .sl-h2 > span{color:var(--sl-page-primary,#1472ba)}
.sl-s-metrics-page .sl-btn--secondary{background:var(--sl-page-navy)}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Alternating white / grey section rhythm (matches desktop). */
.sl-s-metrics-hero,.sl-s-metrics-dashboard,.sl-s-metrics-insights,.sl-s-metrics-features,.sl-s-metrics-choose,.sl-s-metrics-faq{background:var(--sl-page-white)}
.sl-s-metrics-why,.sl-s-metrics-suite-reporting,.sl-s-metrics-measure,.sl-sbcs--bg-soft,.sl-s-metrics-comparison,.sl-s-metrics-contact{background:var(--sl-page-bg)}

/* Shared section padding + type. */
.sl-s-metrics-hero,.sl-s-metrics-why,.sl-s-metrics-dashboard,.sl-s-metrics-suite-reporting,.sl-s-metrics-insights,.sl-s-metrics-measure,.sl-s-metrics-features,.sl-sbcs,.sl-s-metrics-choose,.sl-s-metrics-comparison,.sl-s-metrics-faq,.sl-s-metrics-contact{padding:48px 16px}
.sl-s-metrics-why h2,.sl-s-metrics-dashboard h2,.sl-s-metrics-suite-reporting h2,.sl-s-metrics-insights h2,.sl-s-metrics-measure h2,.sl-s-metrics-features h2,.sl-sbcs__intro h2,.sl-s-metrics-choose h2,.sl-s-metrics-comparison h2,.sl-s-metrics-faq h2,.sl-s-metrics-contact h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy)}
.sl-s-metrics-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-metrics-page amp-img{display:block;width:100%}
.sl-s-metrics-why__image,.sl-s-metrics-dashboard__image,.sl-s-metrics-suite-reporting__image,.sl-s-metrics-insights__image,.sl-s-metrics-measure__image,.sl-s-metrics-hero__image,.sl-sbcs__image{overflow:hidden;border-radius:16px;line-height:0;width:100%}

/* Hero */
.sl-s-metrics-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(20,114,186,.12),transparent 34%),var(--sl-page-white)}
.sl-s-metrics-hero__top{width:100%;margin:0 0 24px}
.sl-s-metrics-page .sl-s-metrics-hero h1,.sl-s-metrics-hero__top h1{margin:0;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-s-metrics-hero__grid{display:grid;gap:28px;align-items:center}
.sl-s-metrics-page .sl-s-metrics-hero h2.sl-hero-h2,
.sl-s-metrics-page .sl-s-metrics-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600}
.sl-s-metrics-hero__content p{margin:0 0 14px}
.sl-s-metrics-hero__actions{display:flex;flex-direction:column;flex-wrap:wrap;gap:12px;margin-top:20px}
.sl-s-metrics-hero__actions .sl-hero-btn{width:100%}
@media(min-width:768px){.sl-s-metrics-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr)}.sl-s-metrics-hero__actions{flex-direction:row}.sl-s-metrics-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}}

/* Why — text first on stacked; image left from 900px */
.sl-s-metrics-why__grid{display:grid;gap:24px;align-items:start}
.sl-s-metrics-why__subtitle,.sl-s-metrics-suite-reporting__subtitle{margin:0 0 14px;font-size:20px;font-weight:600;line-height:1.4;color:var(--sl-page-primary)}
.sl-s-metrics-why__copy{display:flex;flex-direction:column;gap:14px}
.sl-s-metrics-why__copy p{margin:0}
.sl-s-metrics-why__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
@media(min-width:768px){.sl-s-metrics-why__media{max-width:none}}
@media(min-width:900px){.sl-s-metrics-why__grid{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr)}.sl-s-metrics-why__media{order:-1}}

/* Dashboard */
.sl-s-metrics-dashboard__grid{display:grid;gap:24px;align-items:start}
.sl-s-metrics-dashboard__copy{display:flex;flex-direction:column;gap:14px;margin-bottom:16px}
.sl-s-metrics-dashboard__copy p{margin:0}
.sl-s-metrics-dashboard__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-s-metrics-dashboard__content .sl-content-btn{width:100%}
@media(min-width:768px){.sl-s-metrics-dashboard__media{max-width:none}.sl-s-metrics-dashboard__content .sl-content-btn{width:fit-content;max-width:none;white-space:nowrap}}
@media(min-width:900px){.sl-s-metrics-dashboard__grid{grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr)}}

/* Suite reporting */
.sl-s-metrics-suite-reporting__intro{margin-bottom:22px}
.sl-s-metrics-suite-reporting__layout{display:grid;gap:24px;align-items:start}
.sl-s-metrics-suite-reporting__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-s-metrics-suite-reporting__card{display:flex;flex-direction:column;min-width:0;width:100%;margin:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-s-metrics-suite-reporting__card .sl-panel-title{margin:0 0 12px}
.sl-s-metrics-suite-reporting__card p{margin:0}
.sl-s-metrics-suite-reporting__card p + p,.sl-s-metrics-suite-reporting__card p + ul,.sl-s-metrics-suite-reporting__card ul + p{margin-top:12px}
.sl-s-metrics-suite-reporting__list{margin:0;padding-left:1.35em;list-style:disc}
.sl-s-metrics-suite-reporting__list li{list-style:disc}
.sl-s-metrics-suite-reporting__list li + li{margin-top:6px}
.sl-s-metrics-suite-reporting__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
@media(min-width:768px){.sl-s-metrics-page .sl-s-metrics-suite-reporting__grid.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-s-metrics-suite-reporting__media{max-width:none}}
@media(min-width:900px){.sl-s-metrics-suite-reporting__layout{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:36px}.sl-s-metrics-page .sl-s-metrics-suite-reporting__grid.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}.sl-s-metrics-page .sl-s-metrics-suite-reporting__grid.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}

/* Insights — text first on stacked; image left from 900px */
.sl-s-metrics-insights__grid{display:grid;gap:24px;align-items:start}
.sl-s-metrics-insights__copy{display:flex;flex-direction:column;gap:14px}
.sl-s-metrics-insights__copy p{margin:0}
.sl-s-metrics-insights__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
@media(min-width:768px){.sl-s-metrics-insights__media{max-width:none}}
@media(min-width:900px){.sl-s-metrics-insights__grid{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr)}.sl-s-metrics-insights__media{order:-1}}

/* Measure / audit */
.sl-s-metrics-measure__grid{display:grid;gap:24px;align-items:start}
.sl-s-metrics-measure__copy{display:flex;flex-direction:column;gap:14px}
.sl-s-metrics-measure__copy p{margin:0}
.sl-s-metrics-measure__list{margin:8px 0}
.sl-s-metrics-measure__list .sl-list-item:last-child{padding-bottom:22px}
.sl-s-metrics-measure__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
@media(min-width:768px){.sl-s-metrics-measure__media{max-width:none}}
@media(min-width:900px){.sl-s-metrics-measure__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr)}}

/* Features — 2-col tablet; odd last card centered */
.sl-s-metrics-features__intro{margin-bottom:22px}
.sl-s-metrics-features__lead{margin:12px 0 0;max-width:720px}
.sl-s-metrics-features__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-s-metrics-features__card{display:flex;flex-direction:column;align-items:flex-start;min-width:0;width:100%;margin:0;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-s-metrics-features__head,.sl-s-metrics-features__card-title{display:flex;align-items:center;gap:12px;margin-bottom:12px;width:100%;min-height:52px}
.sl-s-metrics-features__number{display:inline-flex;align-items:center;justify-content:center;flex:0 0 38px;width:38px;height:38px;border-radius:9px;background:rgba(109,195,235,.22);color:var(--sl-page-primary);font-size:14px;font-weight:700;line-height:1}
.sl-s-metrics-features__card-title .sl-panel-title{margin:0}
.sl-s-metrics-features__card > p{margin:0}
@media(min-width:768px){.sl-s-metrics-page .sl-s-metrics-features__grid.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-s-metrics-page .sl-s-metrics-features__grid.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:1 / -1;justify-self:center;width:100%;max-width:calc((100% - 20px) / 2)}}

/* SBCS suite */
.sl-sbcs{--sl-sbcs-navy:var(--sl-page-navy);--sl-sbcs-primary:var(--sl-page-primary);--sl-sbcs-text:var(--sl-page-text);--sl-sbcs-muted:var(--sl-page-muted)}
.sl-sbcs__intro{margin-bottom:28px;max-width:820px}
.sl-sbcs__layout{display:grid;gap:28px;align-items:start}
.sl-sbcs__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-sbcs__image{border:1px solid rgba(22,35,78,.1);box-shadow:0 12px 32px rgba(22,35,78,.08);background:var(--sl-page-white)}
.sl-sbcs__journey{position:relative;display:flex;flex-direction:column;min-width:0}
.sl-sbcs__journey-line{position:absolute;top:20px;bottom:20px;left:19px;width:2px;background:rgba(20,114,186,.18)}
.sl-sbcs__step{position:relative;display:grid;grid-template-columns:40px minmax(0,1fr);gap:16px;align-items:start}
.sl-sbcs__step-marker{position:relative;z-index:1;display:flex;align-items:center;justify-content:center;width:40px;height:40px;border:1px solid rgba(20,114,186,.22);border-radius:50%;background:var(--sl-page-white);box-shadow:0 2px 8px rgba(22,35,78,.06);color:var(--sl-sbcs-primary);font-size:12px;font-weight:700;line-height:1;box-sizing:border-box}
.sl-sbcs__step-content{min-width:0;padding:4px 0 20px;border-bottom:1px solid rgba(22,35,78,.1)}
.sl-sbcs__step:last-child .sl-sbcs__step-content{padding-bottom:0;border-bottom:0}
.sl-sbcs__step-heading{display:flex;align-items:center;flex-wrap:wrap;gap:8px 12px;margin:0 0 6px}
.sl-sbcs__step-heading .sl-panel-title{margin:0;font-size:20px}
.sl-sbcs__step-action{display:inline-flex;align-items:center;padding:4px 10px;border-radius:999px;background:rgba(20,114,186,.08);color:var(--sl-sbcs-primary);font-size:13px;font-weight:700;line-height:1.2}
.sl-sbcs__step-content p{margin:0;font-size:15px;line-height:1.6;color:var(--sl-sbcs-text)}
.sl-sbcs__closing{margin-top:28px;max-width:820px}
.sl-sbcs__closing p{margin:0;color:var(--sl-sbcs-navy);font-size:16px;line-height:1.6}
@media(min-width:768px){.sl-sbcs__media{max-width:none}}
@media(min-width:900px){.sl-sbcs__layout{grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:40px}}
@media(max-width:767px){.sl-sbcs__step{grid-template-columns:34px minmax(0,1fr);gap:14px}.sl-sbcs__step-marker{width:34px;height:34px}.sl-sbcs__journey-line{top:16px;left:16px;bottom:16px}.sl-sbcs__step-heading .sl-panel-title{font-size:18px}}

/* Choose — 2-col tablet, 3-col desktop */
.sl-s-metrics-choose__intro{margin-bottom:22px}
.sl-s-metrics-choose__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-s-metrics-choose__card{display:flex;flex-direction:column;min-width:0;width:100%;margin:0;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-s-metrics-choose__card .sl-panel-title{margin:0 0 12px}
.sl-s-metrics-choose__card p{margin:0}
@media(min-width:768px){.sl-s-metrics-page .sl-s-metrics-choose__grid.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-s-metrics-page .sl-s-metrics-choose__grid.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}
@media(min-width:1000px){.sl-s-metrics-page .sl-s-metrics-choose__grid.sl-amp-card-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}}

/* Comparison — keep table + horizontal scroll; left-align cells */
.sl-s-metrics-comparison__heading{margin-bottom:22px}
.sl-s-metrics-comparison__table-wrap{display:block;width:100%;max-width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;border:1px solid rgba(22,35,78,.12);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 28px rgba(22,35,78,.06)}
.sl-s-metrics-comparison__table{width:100%;min-width:560px;border-collapse:separate;border-spacing:0;background:var(--sl-page-white);table-layout:fixed}
.sl-s-metrics-comparison__table th,.sl-s-metrics-comparison__table td{width:50%;padding:14px 16px;border-bottom:1px solid rgba(107,124,147,.14);text-align:left;font-size:14px;line-height:1.5;vertical-align:top;box-sizing:border-box}
.sl-s-metrics-comparison__table th{background:var(--sl-page-navy);color:#fff;font-size:13px;font-weight:700}
.sl-s-metrics-comparison__table th:first-child{border-radius:13px 0 0 0}
.sl-s-metrics-comparison__table th:last-child{border-radius:0 13px 0 0}
.sl-s-metrics-comparison__smetrics-head{background:var(--sl-page-primary)!important}
.sl-s-metrics-comparison__table tbody tr:last-child td{border-bottom:0}
.sl-s-metrics-comparison__table tbody td:first-child{border-right:1px solid rgba(107,124,147,.14);background:rgba(245,243,239,.55)}
.sl-s-metrics-comparison__smetrics-cell{background:rgba(20,114,186,.045);color:var(--sl-page-navy);font-weight:600}
.sl-s-metrics-comparison__table tbody tr:nth-child(even) .sl-s-metrics-comparison__smetrics-cell{background:rgba(20,114,186,.075)}
@media(max-width:767px){.sl-s-metrics-comparison__table{min-width:520px}.sl-s-metrics-comparison__table th,.sl-s-metrics-comparison__table td{padding:12px 14px;font-size:13px}.sl-s-metrics-comparison__table th:first-child,.sl-s-metrics-comparison__table td:first-child{width:120px;min-width:110px;max-width:120px}}

/* FAQ */
.sl-s-metrics-faq .sl-lead{margin:0 0 8px;max-width:none}
.sl-s-metrics-faq .sl-amp-faq{margin-top:20px}
.sl-s-metrics-faq__cta{margin-top:20px}
.sl-s-metrics-faq__cta .sl-btn{width:auto;max-width:100%}
@media(max-width:767px){.sl-s-metrics-faq__cta .sl-btn{width:100%}}

/* Contact */
.sl-s-metrics-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-s-metrics-contact__copy{display:flex;flex-direction:column;gap:14px;margin-bottom:20px}
.sl-s-metrics-contact__copy p{margin:0}
.sl-s-metrics-contact__details{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;max-width:100%}
.sl-s-metrics-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-s-metrics-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-s-metrics-contact__email-value{color:var(--sl-page-navy);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-s-metrics-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-s-metrics-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-s-metrics-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-s-metrics-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-s-metrics-contact__whatsapp-label,.sl-s-metrics-contact__whatsapp:visited,.sl-s-metrics-contact__whatsapp:visited .sl-s-metrics-contact__whatsapp-label{color:#fff!important}
.sl-s-metrics-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25}
.sl-s-metrics-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-s-metrics-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}.sl-s-metrics-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-s-metrics-contact__details{gap:10px}.sl-s-metrics-contact__email,.sl-s-metrics-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center;width:100%}.sl-s-metrics-contact__email-value{font-size:14px}.sl-s-metrics-page .sl-h2,.sl-s-metrics-why h2,.sl-s-metrics-dashboard h2,.sl-s-metrics-suite-reporting h2,.sl-s-metrics-insights h2,.sl-s-metrics-measure h2,.sl-s-metrics-features h2,.sl-sbcs__intro h2,.sl-s-metrics-choose h2,.sl-s-metrics-comparison h2,.sl-s-metrics-faq h2,.sl-s-metrics-contact h2{font-size:28px}}
