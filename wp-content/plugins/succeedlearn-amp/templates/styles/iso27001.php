<?php
/**
 * ISO 27001:2022 Staff Awareness Training — AMP page styles (layout / spacing only).
 *
 * Ported from theme assets/css/iso-27001-2022-staff-awareness-training/.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-iso27-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-iso27-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-iso27-page{--sl-fs-h2:48px}}
.sl-iso27-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-iso27-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-iso27-page h2:not(.sl-iso27-hero__subheading) > span,
.sl-iso27-page .sl-h2 > span,
.sl-iso27-page .sl-iso27-hero h1 > span{color:var(--sl-page-primary,#1472ba)}
.sl-iso27-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-iso27-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-iso27-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Alternating white / grey. */
.sl-iso27-hero,.sl-iso27-learn,.sl-iso27-behaviour,.sl-iso27-choose,.sl-iso27-audience,.sl-iso27-contact{background:var(--sl-page-white)}
.sl-iso27-why,.sl-iso27-relate,.sl-iso27-structure,.sl-iso27-customise,.sl-iso27-faq{background:var(--sl-page-bg)}

/* Shared section padding + type. */
.sl-iso27-why,.sl-iso27-learn,.sl-iso27-relate,.sl-iso27-behaviour,.sl-iso27-structure,.sl-iso27-choose,.sl-iso27-customise,.sl-iso27-audience,.sl-iso27-faq,.sl-iso27-contact{padding:48px 16px}
.sl-iso27-page .sl-iso27-why h2,.sl-iso27-page .sl-iso27-learn h2,.sl-iso27-page .sl-iso27-relate h2,.sl-iso27-page .sl-iso27-behaviour h2,.sl-iso27-page .sl-iso27-structure h2,.sl-iso27-page .sl-iso27-choose h2,.sl-iso27-page .sl-iso27-customise h2,.sl-iso27-page .sl-iso27-audience h2,.sl-iso27-page .sl-iso27-faq h2,.sl-iso27-page .sl-iso27-contact h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy)}
.sl-iso27-page .sl-iso27-why h2 > span,.sl-iso27-page .sl-iso27-learn h2 > span,.sl-iso27-page .sl-iso27-relate h2 > span,.sl-iso27-page .sl-iso27-behaviour h2 > span,.sl-iso27-page .sl-iso27-structure h2 > span,.sl-iso27-page .sl-iso27-choose h2 > span,.sl-iso27-page .sl-iso27-customise h2 > span,.sl-iso27-page .sl-iso27-audience h2 > span,.sl-iso27-page .sl-iso27-faq h2 > span,.sl-iso27-page .sl-iso27-contact h2 > span{color:var(--sl-page-primary)}

/* Hero */
.sl-iso27-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(37,99,235,.12),transparent 34%),var(--sl-page-white)}
.sl-iso27-hero__top{width:100%;margin-bottom:24px}
.sl-iso27-hero__eyebrow{display:inline-flex;align-items:center;margin-bottom:14px}
.sl-iso27-page .sl-iso27-hero h1{margin:0;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-iso27-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-iso27-hero__content{min-width:0}
.sl-iso27-page .sl-iso27-hero h2.sl-hero-h2,.sl-iso27-page .sl-iso27-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600;max-width:680px}
.sl-iso27-hero__description{max-width:680px;margin:0 0 14px}
.sl-iso27-hero__meta{display:flex;flex-wrap:wrap;gap:12px 20px;margin:8px 0 0}
.sl-iso27-hero__meta-item{display:inline-flex;flex-wrap:wrap;gap:6px;padding:10px 14px;border:1px solid rgba(22,35,78,.12);border-radius:10px;background:var(--sl-page-bg);color:var(--sl-page-navy);font-size:14px;line-height:1.4}
.sl-iso27-hero__actions{display:flex;flex-direction:column;flex-wrap:wrap;gap:12px;margin-top:20px}
.sl-iso27-hero__actions .sl-hero-btn{width:100%}
.sl-iso27-hero__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-iso27-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:18px}
.sl-iso27-hero__image amp-img{display:block;width:100%}
.sl-iso27-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-iso27-hero{padding:24px 16px 56px}.sl-iso27-hero__top{margin-bottom:32px}.sl-iso27-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:36px}.sl-iso27-hero__actions{flex-direction:row}.sl-iso27-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-iso27-hero__media{max-width:none;margin:0}.sl-iso27-hero__image{border-radius:24px}}
@media(min-width:1000px){.sl-iso27-hero__grid{grid-template-columns:minmax(0,.6fr) minmax(0,.4fr);gap:40px}}

/* Why */
.sl-iso27-why__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:start}
.sl-iso27-why__media{min-width:0}
.sl-iso27-why__image{overflow:hidden;width:100%;line-height:0;border-radius:12px;background:var(--sl-page-white)}
.sl-iso27-why__image amp-img{display:block;width:100%}
.sl-iso27-why__content{min-width:0}
.sl-iso27-page .sl-iso27-why__content h2{margin-bottom:18px}
.sl-iso27-why__copy{display:flex;flex-direction:column;gap:14px}
.sl-iso27-page .sl-iso27-why__copy p{margin:0}
@media(min-width:768px){.sl-iso27-why__image{border-radius:16px}}
@media(min-width:992px){.sl-iso27-why__grid{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:56px}}

/* Learn */
.sl-iso27-learn__intro{margin-bottom:24px}
.sl-iso27-learn__intro p{max-width:760px;margin:0}
.sl-iso27-learn__list{margin:0;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy);font-size:16px;font-weight:500;line-height:1.55}
.sl-iso27-learn__list li{margin:0;list-style:disc}
.sl-iso27-learn__list li + li{margin-top:10px}

/* Relate (no card box on panel) */
.sl-iso27-page .sl-iso27-relate__panel h2{margin:0 0 20px}
.sl-iso27-page .sl-iso27-relate__panel p{margin:0 0 16px}
.sl-iso27-page .sl-iso27-relate__panel p:last-child{margin-bottom:0}
.sl-iso27-relate__supports{margin-top:36px}
.sl-iso27-relate__supports h3{margin:0 0 20px;color:var(--sl-page-navy);font-size:clamp(1.25rem,2.2vw,1.75rem);font-weight:700;line-height:1.3}
.sl-iso27-relate__supports h3 > span{color:var(--sl-page-primary)}
@media(min-width:768px){.sl-iso27-relate__supports{margin-top:48px}.sl-iso27-relate__supports h3{margin-bottom:28px}}

/* Objectives table (2-col) */
.sl-iso27-objectives__caption,.screen-reader-text{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
.sl-iso27-objectives__table-wrap{width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-iso27-objectives__table{width:100%;min-width:560px;border-collapse:separate;border-spacing:0;table-layout:fixed}
.sl-iso27-objectives__table th,.sl-iso27-objectives__table td{padding:14px 16px;vertical-align:top;text-align:left}
.sl-iso27-objectives__table thead th{background:var(--sl-page-navy);color:var(--sl-page-white);font-size:13px;font-weight:700;line-height:1.35;letter-spacing:.01em}
.sl-iso27-objectives__table thead th:first-child{width:36%;border-radius:13px 0 0 0}
.sl-iso27-objectives__table thead th:last-child{width:64%;border-radius:0 13px 0 0;border-left:1px solid rgba(255,255,255,.14);background:var(--sl-page-primary)}
.sl-iso27-objectives__table tbody td{border-bottom:1px solid rgba(107,124,147,.14)}
.sl-iso27-objectives__table tbody td:first-child{background:rgba(245,243,239,.55);border-right:1px solid rgba(107,124,147,.14)}
.sl-iso27-objectives__table tbody tr:last-child td{border-bottom:0}
.sl-iso27-objectives__cell{display:block;color:var(--sl-page-text);font-size:14px;font-weight:500;line-height:1.55;text-align:left}
.sl-iso27-objectives__cell--strong{color:var(--sl-page-navy);font-weight:700}
@media(min-width:768px){.sl-iso27-objectives__table-wrap{border-radius:16px}.sl-iso27-objectives__table{min-width:720px}.sl-iso27-objectives__table th,.sl-iso27-objectives__table td{padding:18px 22px}.sl-iso27-objectives__table thead th{font-size:15px}.sl-iso27-objectives__table thead th:first-child{border-radius:15px 0 0 0}.sl-iso27-objectives__table thead th:last-child{border-radius:0 15px 0 0}.sl-iso27-objectives__cell{font-size:15px}}

/* Behaviour */
.sl-iso27-behaviour__heading{margin-bottom:20px}
.sl-iso27-behaviour__copy{display:flex;flex-direction:column;gap:14px}
.sl-iso27-page .sl-iso27-behaviour__copy p{margin:0}

/* Structure (designed-like cards) */
.sl-iso27-structure__heading{margin-bottom:20px}
.sl-iso27-page .sl-iso27-structure__subhead{margin:0 0 20px;font-size:20px;font-weight:700;line-height:1.35;color:var(--sl-page-navy)}
.sl-iso27-structure__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-iso27-structure__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-iso27-structure__card h3{margin:0 0 12px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.3}
.sl-iso27-page .sl-iso27-structure__card p{margin:0;color:var(--sl-page-text)}
.sl-iso27-structure__details{display:flex;flex-direction:column;gap:18px;margin-top:28px}
.sl-iso27-structure__detail h3{margin:0 0 8px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-iso27-page .sl-iso27-structure__detail p{max-width:900px;margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-iso27-structure__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-iso27-structure__card{padding:26px 24px}.sl-iso27-structure__details{gap:22px;margin-top:36px}}
@media(min-width:1000px){.sl-iso27-structure__grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-iso27-structure__card{padding:30px}}

/* Choose */
.sl-iso27-choose__heading{margin-bottom:28px}
.sl-iso27-choose__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-iso27-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-iso27-choose__card h3{margin:0 0 14px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.35}
.sl-iso27-page .sl-iso27-choose__card p{margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-iso27-choose__heading{margin-bottom:36px}.sl-iso27-choose__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-iso27-choose__card{padding:28px 26px}}
@media(min-width:1000px){.sl-iso27-choose__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-iso27-choose__card{padding:30px}}

/* Customise */
.sl-iso27-customise__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-iso27-customise__content{min-width:0}
.sl-iso27-customise__list{margin:0;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy);font-size:16px;font-weight:500;line-height:1.55}
.sl-iso27-customise__list li{margin:0 0 8px;list-style:disc}
.sl-iso27-customise__list li:last-child{margin-bottom:0}
.sl-iso27-customise__media{min-width:0;width:100%;max-width:420px;margin:0 auto}
.sl-iso27-customise__image{overflow:hidden;width:100%;line-height:0;border-radius:12px;background:var(--sl-page-white)}
.sl-iso27-customise__image amp-img{display:block;width:100%}
@media(min-width:768px){.sl-iso27-customise__image{border-radius:16px}}
@media(min-width:992px){.sl-iso27-customise__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:48px}.sl-iso27-customise__media{max-width:none;margin:0}}

/* Audience */
.sl-iso27-audience__heading{margin-bottom:28px}
.sl-iso27-audience__heading p{max-width:860px;margin:0}
.sl-iso27-audience__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-iso27-audience__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-iso27-audience__card h3{margin:0 0 12px;color:var(--sl-page-navy);font-size:18px;font-weight:700;line-height:1.35}
.sl-iso27-page .sl-iso27-audience__card p{margin:0;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
@media(min-width:700px){.sl-iso27-audience__heading{margin-bottom:36px}.sl-iso27-audience__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-iso27-audience__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-iso27-audience__card{padding:28px 24px}}
@media(min-width:1000px){.sl-iso27-audience__grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-iso27-audience__grid>:last-child:nth-child(odd){grid-column:2;justify-self:stretch;max-width:none}}

/* FAQ */
.sl-iso27-faq__heading{margin-bottom:8px}
.sl-iso27-faq__heading .sl-lead{max-width:none;margin:0 0 8px}
.sl-iso27-faq .sl-amp-faq{margin-top:20px}
.sl-iso27-faq__cta{margin-top:20px}
.sl-iso27-faq__cta .sl-btn{width:auto;max-width:100%}
@media(max-width:767px){.sl-iso27-faq__cta .sl-btn{width:100%}}

/* Contact */
.sl-iso27-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-iso27-contact__heading{max-width:760px;margin-bottom:20px}
.sl-iso27-page .sl-iso27-contact__lead{margin:0;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-iso27-contact__body{max-width:720px;margin-bottom:24px}
.sl-iso27-page .sl-iso27-contact__body p{margin:0;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-iso27-contact__details{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;max-width:100%}
.sl-iso27-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-iso27-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-iso27-contact__email-value{color:var(--sl-page-navy);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-iso27-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-iso27-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-iso27-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-iso27-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-iso27-contact__whatsapp-label,.sl-iso27-contact__whatsapp:visited,.sl-iso27-contact__whatsapp:visited .sl-iso27-contact__whatsapp-label{color:#fff!important}
.sl-iso27-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25}
.sl-iso27-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-iso27-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,.9fr);gap:50px;align-items:center}.sl-iso27-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-iso27-contact__details{gap:10px}.sl-iso27-contact__email,.sl-iso27-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center;width:100%}.sl-iso27-contact__email-value{font-size:14px}.sl-iso27-page .sl-h2,.sl-iso27-page .sl-iso27-why h2,.sl-iso27-page .sl-iso27-learn h2,.sl-iso27-page .sl-iso27-relate h2,.sl-iso27-page .sl-iso27-behaviour h2,.sl-iso27-page .sl-iso27-structure h2,.sl-iso27-page .sl-iso27-choose h2,.sl-iso27-page .sl-iso27-customise h2,.sl-iso27-page .sl-iso27-audience h2,.sl-iso27-page .sl-iso27-faq h2,.sl-iso27-page .sl-iso27-contact h2{font-size:28px}}
