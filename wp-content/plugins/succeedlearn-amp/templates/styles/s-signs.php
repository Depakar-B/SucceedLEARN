<?php
/**
 * S-Signs — AMP page styles (layout / spacing only).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-s-signs-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px;--sl-fs-h3:22px}
@media(min-width:900px){.sl-s-signs-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-s-signs-page{--sl-fs-h2:48px}}
.sl-s-signs-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-s-signs-page h2:not(.sl-s-signs-hero__subheading) > span,.sl-s-signs-page .sl-h2 > span{color:var(--sl-page-primary)}
.sl-s-signs-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-s-signs-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-signs-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-signs-page p:last-child{margin-bottom:0}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Hero */
.sl-s-signs-hero{padding:16px 16px 48px;background:var(--sl-page-white)}
.sl-s-signs-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-s-signs-hero__content{min-width:0}
.sl-s-signs-page .sl-s-signs-hero h1{margin:0 0 14px;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15}
.sl-s-signs-page .sl-s-signs-hero h2.sl-hero-h2,.sl-s-signs-page .sl-s-signs-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600}
.sl-s-signs-hero__actions{display:flex;flex-direction:column;gap:12px;margin-top:24px}
.sl-s-signs-hero__actions .sl-hero-btn{width:100%}
.sl-s-signs-hero__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-s-signs-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-s-signs-hero__image amp-img{display:block;width:100%}
.sl-s-signs-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-s-signs-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:36px}.sl-s-signs-hero__media{max-width:none;margin:0}.sl-s-signs-hero__actions{flex-direction:row;flex-wrap:wrap}.sl-s-signs-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-s-signs-hero__image{border-radius:16px}}

/* Alternating backgrounds (matches desktop) */
.sl-s-signs-why,.sl-s-signs-library,.sl-s-signs-distribution,.sl-s-signs-teams,.sl-s-signs-choose,.sl-s-signs-contact{background:var(--sl-page-bg)}
.sl-s-signs-filtering,.sl-s-signs-nudges,.sl-s-signs-employees,.sl-sbcs--bg-white,.sl-s-signs-comparison,.sl-s-signs-faq{background:var(--sl-page-white)}

/* Shared section padding */
.sl-s-signs-why,.sl-s-signs-filtering,.sl-s-signs-library,.sl-s-signs-nudges,.sl-s-signs-distribution,.sl-s-signs-employees,.sl-s-signs-teams,.sl-s-signs-choose,.sl-s-signs-comparison,.sl-s-signs-faq,.sl-s-signs-contact,.sl-sbcs{padding:48px 16px}

/* Subtitles (h3 under section h2) */
.sl-s-signs-library__subtitle,.sl-s-signs-nudges__subtitle{margin:16px 0 14px;font-size:var(--sl-fs-h3);font-weight:600;line-height:1.4;color:var(--sl-page-primary)}

/* Intro blocks */
.sl-s-signs-nudges__intro,.sl-s-signs-distribution__intro,.sl-s-signs-employees__intro,.sl-s-signs-teams__intro,.sl-s-signs-choose__intro{margin-bottom:28px}
.sl-s-signs-nudges__intro p,.sl-s-signs-distribution__intro p,.sl-s-signs-employees__intro p,.sl-s-signs-teams__intro p{max-width:820px}
.sl-s-signs-nudges__intro h2,.sl-s-signs-choose__intro h2{margin-bottom:0}
.sl-s-signs-nudges__intro .sl-s-signs-nudges__subtitle{margin-bottom:14px}

/* Why */
.sl-s-signs-why__content{min-width:0}
.sl-s-signs-why__copy,.sl-s-signs-filtering__copy,.sl-s-signs-library__copy{display:flex;flex-direction:column;gap:14px}
.sl-s-signs-why__copy p,.sl-s-signs-filtering__copy p,.sl-s-signs-library__copy p{margin:0}

/* Filtering / Library split */
.sl-s-signs-filtering__grid,.sl-s-signs-library__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-s-signs-filtering__content,.sl-s-signs-library__content{min-width:0}
.sl-s-signs-filtering__media,.sl-s-signs-library__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-s-signs-library__media{order:-1}
.sl-s-signs-filtering__image,.sl-s-signs-library__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-s-signs-filtering__image amp-img,.sl-s-signs-library__image amp-img{display:block;width:100%}
.sl-s-signs-filtering__image amp-img img,.sl-s-signs-library__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-s-signs-filtering__media,.sl-s-signs-library__media{max-width:none;margin:0}.sl-s-signs-filtering__image,.sl-s-signs-library__image{border-radius:16px}}
@media(min-width:900px){.sl-s-signs-filtering__grid,.sl-s-signs-library__grid{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:48px}.sl-s-signs-library__media{order:0}}

/* Nudges — media first when stacked, right column from 900px */
.sl-s-signs-nudges__layout{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:start}
.sl-s-signs-nudges__content{min-width:0}
.sl-s-signs-nudges__grid{display:flex;flex-direction:column;gap:16px}
.sl-s-signs-nudges__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-s-signs-nudges__card .sl-panel-title{margin:0 0 12px}
.sl-s-signs-nudges__card p{margin:0 0 12px}
.sl-s-signs-nudges__card p:last-child{margin-bottom:0}
.sl-s-signs-nudges__closing{margin:24px 0 0}
.sl-s-signs-nudges__media{order:-1;min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-s-signs-nudges__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-s-signs-nudges__image amp-img{display:block;width:100%}
.sl-s-signs-nudges__image amp-img img{object-fit:contain;object-position:center}
@media(min-width:768px){.sl-s-signs-nudges__grid{gap:20px}.sl-s-signs-nudges__card{padding:28px 24px}.sl-s-signs-nudges__image{border-radius:16px}}
@media(min-width:900px){.sl-s-signs-nudges__layout{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:48px}.sl-s-signs-nudges__media{order:0;max-width:none;margin:0}}

/* Distribution — 1 / 2 / 3 col, 7th card centered */
.sl-s-signs-distribution__card,.sl-s-signs-employees__card,.sl-s-signs-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;box-sizing:border-box}
.sl-s-signs-distribution__card{background:var(--sl-page-white)}
.sl-s-signs-employees__card{background:var(--sl-page-bg)}
.sl-s-signs-choose__card{background:var(--sl-page-white)}
.sl-s-signs-distribution__card .sl-panel-title,.sl-s-signs-employees__card .sl-panel-title,.sl-s-signs-choose__card .sl-panel-title{margin:0 0 12px}
.sl-s-signs-distribution__card p,.sl-s-signs-employees__card p,.sl-s-signs-choose__card p{margin:0}
@media(min-width:768px){.sl-s-signs-distribution__card,.sl-s-signs-employees__card,.sl-s-signs-choose__card{padding:28px 24px}}
@media(min-width:1000px){.sl-s-signs-page .sl-s-signs-distribution__cards.sl-amp-card-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-s-signs-page .sl-s-signs-distribution__cards.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:2;justify-self:stretch;max-width:none}}

/* Teams */
.sl-s-signs-teams__card{display:flex;flex-direction:column;align-items:flex-start;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:18px;background:var(--sl-page-white);box-sizing:border-box}
.sl-s-signs-teams__card-title{display:flex;align-items:center;gap:12px;margin-bottom:14px;width:100%}
.sl-s-signs-teams__number{display:inline-flex;align-items:center;justify-content:center;flex:0 0 38px;width:38px;height:38px;border-radius:9px;background:rgba(109,195,235,.22);color:var(--sl-page-primary);font-size:14px;font-weight:700;line-height:1}
.sl-s-signs-teams__card-title .sl-panel-title{margin:0}
.sl-s-signs-teams__card > p{margin:0}
@media(min-width:768px){.sl-s-signs-teams__card{padding:28px 24px}}

/* Suite / SBCS — media left from 900px */
.sl-sbcs{--sl-sbcs-bg:var(--sl-page-white);--sl-sbcs-navy:var(--sl-page-navy);--sl-sbcs-primary:var(--sl-page-primary);--sl-sbcs-text:var(--sl-page-text);--sl-sbcs-muted:var(--sl-page-muted);background:var(--sl-sbcs-bg)}
.sl-sbcs__intro{margin-bottom:28px;max-width:820px}
.sl-sbcs__intro p{margin:0;max-width:720px}
.sl-sbcs__layout{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:start}
.sl-sbcs__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-sbcs__image{overflow:hidden;width:100%;line-height:0;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white);box-shadow:0 12px 32px rgba(22,35,78,.08);box-sizing:border-box}
.sl-sbcs__image amp-img{display:block;width:100%}
.sl-sbcs__image amp-img img{object-fit:cover;object-position:center}
.sl-sbcs__journey{position:relative;display:flex;flex-direction:column;min-width:0}
.sl-sbcs__journey-line{position:absolute;top:20px;bottom:20px;left:19px;width:2px;background:rgba(20,114,186,.18)}
.sl-sbcs__step{position:relative;display:grid;grid-template-columns:40px minmax(0,1fr);gap:18px;align-items:start}
.sl-sbcs__step-marker{position:relative;z-index:1;display:flex;align-items:center;justify-content:center;width:40px;height:40px;box-sizing:border-box;border:1px solid rgba(20,114,186,.22);border-radius:50%;background:var(--sl-page-white);box-shadow:0 2px 8px rgba(22,35,78,.06);color:var(--sl-sbcs-primary);font-size:12px;font-weight:700;line-height:1}
.sl-sbcs__step-content{min-width:0;padding:4px 0 22px;border-bottom:1px solid rgba(22,35,78,.1)}
.sl-sbcs__step:last-child .sl-sbcs__step-content{padding-bottom:0;border-bottom:0}
.sl-sbcs__step-heading{display:flex;align-items:center;flex-wrap:wrap;gap:8px 12px;margin:0 0 6px}
.sl-sbcs__step-heading .sl-panel-title{margin:0;color:var(--sl-sbcs-primary)}
.sl-sbcs__step-action{display:inline-flex;align-items:center;padding:4px 10px;border-radius:999px;background:rgba(20,114,186,.08);color:var(--sl-sbcs-primary);font-size:13px;font-weight:700;line-height:1.2}
.sl-sbcs__step-content p{margin:0}
.sl-sbcs__closing{margin-top:28px;max-width:820px}
.sl-sbcs__closing p{margin:0;color:var(--sl-sbcs-navy);font-size:17px;line-height:1.6}
@media(min-width:768px){.sl-sbcs__media{max-width:none;margin:0}.sl-sbcs__image{border-radius:16px}}
@media(min-width:900px){.sl-sbcs__layout{display:grid;grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:48px}.sl-sbcs--media-left .sl-sbcs__layout{grid-template-columns:minmax(0,.9fr) minmax(0,1.1fr)}.sl-sbcs--media-left .sl-sbcs__media{order:-1}.sl-sbcs__intro{margin-bottom:40px}.sl-sbcs__closing{margin-top:40px}}

/* Choose — 1 / 2 col, 3 col from 1000px with last two centered (6-col track) */
@media(min-width:1000px){.sl-s-signs-page .sl-s-signs-choose__grid.sl-amp-card-grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:24px}.sl-s-signs-page .sl-s-signs-choose__grid.sl-amp-card-grid > .sl-s-signs-choose__card{grid-column:span 2;justify-self:stretch;max-width:none}.sl-s-signs-page .sl-s-signs-choose__grid.sl-amp-card-grid > .sl-s-signs-choose__card:nth-child(4):nth-last-child(2){grid-column:2 / 4}.sl-s-signs-page .sl-s-signs-choose__grid.sl-amp-card-grid > .sl-s-signs-choose__card:nth-child(5):last-child{grid-column:4 / 6}}

/* Comparison table — keep table + horizontal scroll, centred cells like desktop */
.sl-s-signs-comparison__heading{margin:0 0 28px;text-align:left}
.sl-s-signs-comparison__table-wrap{width:100%;max-width:1100px;margin-left:auto;margin-right:auto;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;border:1px solid rgba(22,35,78,.12);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-s-signs-comparison__table{width:100%;min-width:560px;border-collapse:separate;border-spacing:0;table-layout:fixed}
.sl-s-signs-comparison__table thead th{padding:16px 18px;background:var(--sl-page-navy);color:#fff;text-align:center;font-size:14px;font-weight:700;line-height:1.3}
.sl-s-signs-comparison__table thead th:first-child{border-radius:13px 0 0 0}
.sl-s-signs-comparison__table thead th:last-child{border-radius:0 13px 0 0}
.sl-s-signs-comparison__table thead th.sl-s-signs-comparison__ssigns-head{background:var(--sl-page-primary)}
.sl-s-signs-comparison__table tbody td{padding:14px 18px;border-top:1px solid rgba(22,35,78,.1);text-align:center;vertical-align:middle;font-size:14px;line-height:1.5;color:var(--sl-page-text)}
.sl-s-signs-comparison__table tbody td + td{border-left:1px solid rgba(22,35,78,.1)}
.sl-s-signs-comparison__table tbody tr:nth-child(even) td{background:rgba(22,35,78,.025)}
.sl-s-signs-comparison__table tbody td.sl-s-signs-comparison__ssigns-cell{background:rgba(20,114,186,.045);color:var(--sl-page-navy);font-weight:600}
.sl-s-signs-comparison__table tbody tr:nth-child(even) td.sl-s-signs-comparison__ssigns-cell{background:rgba(20,114,186,.075)}
@media(min-width:768px){.sl-s-signs-comparison__heading{margin-bottom:40px}.sl-s-signs-comparison__table-wrap{border-radius:16px}.sl-s-signs-comparison__table{min-width:0}.sl-s-signs-comparison__table thead th{padding:22px 28px;font-size:18px}.sl-s-signs-comparison__table thead th:first-child{border-radius:15px 0 0 0}.sl-s-signs-comparison__table thead th:last-child{border-radius:0 15px 0 0}.sl-s-signs-comparison__table tbody td{padding:20px 28px;font-size:16px}}

/* FAQ */
.sl-s-signs-faq .sl-amp-faq{margin-top:20px}
.sl-s-signs-faq__cta{margin-top:24px}

/* Contact */
.sl-s-signs-contact__content{min-width:0}
.sl-s-signs-contact__copy{display:flex;flex-direction:column;gap:14px;margin-bottom:22px}
.sl-s-signs-contact__copy p{margin:0}
.sl-s-signs-contact__details{display:flex;flex-direction:column;gap:12px}
.sl-s-signs-contact__email{display:flex;flex-direction:column;justify-content:center;gap:2px;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.22);border-radius:10px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-s-signs-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-s-signs-contact__email-value{color:var(--sl-page-primary);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-s-signs-contact__whatsapp{display:flex;align-items:center;gap:12px;min-height:56px;padding:10px 18px;border-radius:10px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-s-signs-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff}
.sl-s-signs-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-s-signs-contact__whatsapp-text{display:flex;flex-direction:column;color:#fff}
.sl-s-signs-contact__whatsapp-label{color:#fff!important;font-size:15px;font-weight:700;line-height:1.25}
.sl-s-signs-page .sl-contact-layout{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:start}
.sl-s-signs-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:768px){.sl-s-signs-contact__details{flex-direction:row;flex-wrap:wrap;align-items:stretch}}
@media(min-width:900px){.sl-s-signs-page .sl-contact-layout{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:48px}.sl-s-signs-page .sl-contact-form-card{padding:32px;border-radius:24px}}
