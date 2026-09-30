<?php
/**
 * S-Play — AMP page styles (layout / spacing only).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-s-play-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px;--sl-fs-h3:22px}
@media(min-width:900px){.sl-s-play-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-s-play-page{--sl-fs-h2:48px}}
.sl-s-play-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-s-play-page h2:not(.sl-s-play-hero__subheading) > span,.sl-s-play-page .sl-h2 > span{color:var(--sl-page-primary)}
.sl-s-play-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-s-play-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-play-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-play-page p:last-child{margin-bottom:0}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Hero */
.sl-s-play-hero{padding:16px 16px 48px;background:var(--sl-page-white)}
.sl-s-play-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-s-play-hero__content{min-width:0}
.sl-s-play-page .sl-s-play-hero h1{margin:0 0 14px;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15}
.sl-s-play-page .sl-s-play-hero h2.sl-hero-h2,.sl-s-play-page .sl-s-play-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600}
.sl-s-play-hero__actions{display:flex;flex-direction:column;gap:12px;margin-top:24px}
.sl-s-play-hero__actions .sl-hero-btn{width:100%}
.sl-s-play-hero__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-s-play-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-s-play-hero__image amp-img{display:block;width:100%}
.sl-s-play-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-s-play-hero__grid{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:36px}.sl-s-play-hero__media{max-width:none;margin:0}.sl-s-play-hero__actions{flex-direction:row;flex-wrap:wrap}.sl-s-play-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-s-play-hero__image{border-radius:16px}}

/* Alternating backgrounds */
.sl-s-play-why,.sl-s-play-works,.sl-s-play-benefits,.sl-s-play-employees,.sl-s-play-comparison{background:var(--sl-page-bg)}
.sl-s-play-complements,.sl-s-play-games,.sl-s-play-delivery,.sl-s-play-teams,.sl-sbcs--bg-white,.sl-s-play-choose,.sl-s-play-faq,.sl-s-play-contact{background:var(--sl-page-white)}

/* Shared section padding */
.sl-s-play-why,.sl-s-play-complements,.sl-s-play-works,.sl-s-play-games,.sl-s-play-benefits,.sl-s-play-delivery,.sl-s-play-employees,.sl-s-play-teams,.sl-s-play-choose,.sl-s-play-comparison,.sl-s-play-faq,.sl-s-play-contact,.sl-sbcs{padding:48px 16px}

/* Subtitles */
.sl-s-play-why__subtitle,.sl-s-play-games__subtitle,.sl-s-play-benefits__subtitle,.sl-s-play-delivery__subtitle{margin:16px 0 14px;font-size:var(--sl-fs-h3);font-weight:600;line-height:1.4;color:var(--sl-page-primary)}

/* Why */
.sl-s-play-why__copy{display:flex;flex-direction:column;gap:14px}
.sl-s-play-why__copy p{margin:0}
.sl-s-play-why__list{margin:0;padding:0}
.sl-s-play-why__list .sl-list-item:last-child{padding-bottom:22px}

/* Complements / Delivery split */
.sl-s-play-complements__grid,.sl-s-play-delivery__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-s-play-complements__content,.sl-s-play-delivery__content{min-width:0}
.sl-s-play-complements__copy,.sl-s-play-delivery__copy{display:flex;flex-direction:column;gap:14px}
.sl-s-play-complements__copy p,.sl-s-play-delivery__copy p{margin:0}
.sl-s-play-complements__media,.sl-s-play-delivery__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-s-play-complements__image,.sl-s-play-delivery__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-s-play-complements__image amp-img,.sl-s-play-delivery__image amp-img{display:block;width:100%}
.sl-s-play-complements__image amp-img img,.sl-s-play-delivery__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-s-play-complements__media,.sl-s-play-delivery__media{max-width:none;margin:0}.sl-s-play-complements__image,.sl-s-play-delivery__image{border-radius:16px}}
@media(min-width:900px){.sl-s-play-complements__grid,.sl-s-play-delivery__grid{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:48px}}

/* Works — content first, media left from 900px */
.sl-s-play-works__intro{margin-bottom:28px}
.sl-s-play-works__intro p{max-width:820px}
.sl-s-play-works__layout{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:start}
.sl-s-play-works__cards{display:flex;flex-direction:column;gap:16px;min-width:0}
.sl-s-play-works__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-s-play-works__card .sl-panel-title{margin:0 0 12px}
.sl-s-play-works__card p{margin:0}
.sl-s-play-works__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-s-play-works__image{overflow:hidden;width:100%;line-height:0;border-radius:12px;background:var(--sl-page-white)}
.sl-s-play-works__image amp-img{display:block;width:100%}
@media(min-width:768px){.sl-s-play-works__media{max-width:none;margin:0}.sl-s-play-works__image{border-radius:16px}.sl-s-play-works__cards{gap:20px}.sl-s-play-works__card{padding:28px 24px}}
@media(min-width:900px){.sl-s-play-works__layout{display:grid;grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:48px}.sl-s-play-works__media{order:-1}}

/* Games cards */
.sl-s-play-games__intro{margin-bottom:28px}
.sl-s-play-games__intro p{max-width:820px}
.sl-s-play-games__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-s-play-games__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;overflow:hidden;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-s-play-games__media{overflow:hidden;width:100%;line-height:0;background:var(--sl-page-bg)}
.sl-s-play-games__media amp-img{display:block;width:100%}
.sl-s-play-games__media amp-img img{object-fit:cover;object-position:center}
.sl-s-play-games__body{padding:20px;display:flex;flex-direction:column;flex:1 1 auto}
.sl-s-play-games__card .sl-panel-title{margin:0 0 8px}
.sl-s-play-games__tagline{margin:0 0 12px;font-weight:600;color:var(--sl-page-primary)}
.sl-s-play-games__copy p{margin:0 0 12px}
.sl-s-play-games__copy p:last-child{margin-bottom:0}
.sl-s-play-games__meta{margin:12px 0 0;font-size:14px}
.sl-s-play-games__meta + .sl-s-play-games__meta{margin-top:8px}
@media(min-width:768px){.sl-s-play-games__grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-s-play-games__grid > :last-child:nth-child(odd){grid-column:1 / -1;justify-self:center;width:100%;max-width:calc((100% - 20px) / 2)}.sl-s-play-games__body{padding:22px 24px 24px}}
@media(min-width:1000px){.sl-s-play-games__grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}.sl-s-play-games__grid > :last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}

/* Benefits */
.sl-s-play-benefits__intro{margin-bottom:28px}
.sl-s-play-benefits__intro p{max-width:820px}
.sl-s-play-benefits__cards{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-s-play-benefits__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-s-play-benefits__number{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;margin-bottom:18px;border:1px solid rgba(20,114,186,.18);border-radius:8px;background:rgba(20,114,186,.08);color:var(--sl-page-primary);font-weight:700;line-height:1}
.sl-s-play-benefits__card .sl-panel-title{margin:0 0 12px}
.sl-s-play-benefits__card p{margin:0}
@media(min-width:768px){.sl-s-play-benefits__cards{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-s-play-benefits__card{padding:28px 24px}}
@media(min-width:1000px){.sl-s-play-benefits__cards{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}}

/* Employees */
.sl-s-play-employees__intro{margin-bottom:28px}
.sl-s-play-employees__intro p{max-width:820px}
.sl-s-play-employees__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-s-play-employees__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-s-play-employees__card .sl-panel-title{margin:0 0 12px}
.sl-s-play-employees__card p{margin:0}
@media(min-width:768px){.sl-s-play-employees__grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-s-play-employees__card{padding:28px 24px}}

/* Teams */
.sl-s-play-teams__intro{margin-bottom:28px}
.sl-s-play-teams__intro p{max-width:820px}
.sl-s-play-teams__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-s-play-teams__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:18px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-s-play-teams__card-title{display:flex;align-items:center;gap:12px;margin-bottom:14px;width:100%}
.sl-s-play-teams__number{display:inline-flex;align-items:center;justify-content:center;flex:0 0 38px;width:38px;height:38px;border-radius:9px;background:rgba(109,195,235,.22);color:var(--sl-page-primary);font-size:14px;font-weight:700;line-height:1}
.sl-s-play-teams__card-title .sl-panel-title{margin:0}
.sl-s-play-teams__card > p{margin:0}
@media(min-width:768px){.sl-s-play-teams__grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-s-play-teams__grid > :last-child:nth-child(odd){grid-column:1 / -1;justify-self:center;width:100%;max-width:calc((100% - 20px) / 2)}.sl-s-play-teams__card{padding:28px 24px}}

/* Suite / SBCS */
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
@media(min-width:900px){.sl-sbcs__layout{display:grid;grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:48px}.sl-sbcs__intro{margin-bottom:40px}.sl-sbcs__closing{margin-top:40px}}

/* Choose */
.sl-s-play-choose__intro{margin-bottom:28px}
.sl-s-play-choose__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-s-play-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-s-play-choose__card .sl-panel-title{margin:0 0 12px}
.sl-s-play-choose__card p{margin:0}
@media(min-width:768px){.sl-s-play-choose__grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}.sl-s-play-choose__card{padding:28px 24px}}
@media(min-width:1000px){.sl-s-play-choose__grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}}

/* Comparison table — keep table + horizontal scroll */
.sl-s-play-comparison__heading{margin:0 0 28px;text-align:left}
.sl-s-play-comparison__table-wrap{width:100%;max-width:1050px;margin-left:auto;margin-right:auto;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-s-play-comparison__table{width:560px;min-width:560px;border-collapse:separate;border-spacing:0;table-layout:auto}
.sl-s-play-comparison__table th,.sl-s-play-comparison__table td{padding:16px 18px;vertical-align:middle;text-align:left}
.sl-s-play-comparison__table thead th{background:var(--sl-page-navy);color:var(--sl-page-white);font-size:14px;font-weight:700;line-height:1.35}
.sl-s-play-comparison__table thead th:first-child{width:110px;border-radius:13px 0 0 0;border-right:1px solid rgba(255,255,255,.14)}
.sl-s-play-comparison__table thead th:last-child{border-radius:0 13px 0 0;background:var(--sl-page-primary)}
.sl-s-play-comparison__table tbody td{border-bottom:1px solid rgba(107,124,147,.14)}
.sl-s-play-comparison__table tbody td:first-child{border-right:1px solid rgba(107,124,147,.14);background:rgba(245,243,239,.55)}
.sl-s-play-comparison__table tbody tr:last-child td{border-bottom:0}
.sl-s-play-comparison__cell{display:block;color:var(--sl-page-text);font-size:15px;font-weight:500;line-height:1.55;text-align:left}
.sl-s-play-comparison__cell--highlight{color:var(--sl-page-navy);font-weight:700}
@media(min-width:768px){.sl-s-play-comparison__heading{margin-bottom:40px}.sl-s-play-comparison__table-wrap{border-radius:16px}.sl-s-play-comparison__table{width:100%;min-width:0;table-layout:fixed}.sl-s-play-comparison__table th,.sl-s-play-comparison__table td{width:50%;padding:20px 28px}.sl-s-play-comparison__table thead th{font-size:16px}.sl-s-play-comparison__table thead th:first-child{width:auto;border-radius:15px 0 0 0}.sl-s-play-comparison__table thead th:last-child{border-radius:0 15px 0 0}.sl-s-play-comparison__cell{font-size:16px}}

/* FAQ */
.sl-s-play-faq__cta{margin-top:24px}

/* Contact */
.sl-s-play-contact__details{display:flex;flex-direction:column;gap:14px;margin-top:22px}
.sl-s-play-contact__email,.sl-s-play-contact__whatsapp{display:flex;flex-direction:column;gap:4px;padding:14px 16px;border:1px solid rgba(107,124,147,.18);border-radius:14px;text-decoration:none;color:inherit;background:var(--sl-page-bg)}
.sl-s-play-contact__email-label,.sl-s-play-contact__whatsapp-label{font-size:12px;font-weight:700;color:var(--sl-page-primary);letter-spacing:.02em}
.sl-s-play-contact__email-value{font-size:15px;font-weight:600;color:var(--sl-page-navy)}
.sl-s-play-contact__whatsapp{flex-direction:row;align-items:center;gap:12px}
.sl-s-play-contact__whatsapp-icon{display:inline-flex;color:#25d366;flex:0 0 auto}
.sl-s-play-contact__whatsapp-text{display:flex;flex-direction:column}
@media(min-width:900px){.sl-s-play-contact .sl-contact-layout{display:grid;grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:48px;align-items:start}}
