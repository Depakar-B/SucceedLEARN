<?php
/**
 * S-Sync — AMP page styles (layout / spacing only).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-s-sync-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px;--sl-fs-h3:22px}
@media(min-width:900px){.sl-s-sync-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-s-sync-page{--sl-fs-h2:48px}}
.sl-s-sync-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-s-sync-page h2:not(.sl-s-sync-hero__subheading) > span,.sl-s-sync-page .sl-h2 > span{color:var(--sl-page-primary)}
.sl-s-sync-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-s-sync-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-sync-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-sync-page p:last-child{margin-bottom:0}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Hero */
.sl-s-sync-hero{padding:16px 16px 48px;background:var(--sl-page-white)}
.sl-s-sync-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-s-sync-hero__content{min-width:0}
.sl-s-sync-page .sl-s-sync-hero h1{margin:0 0 14px;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15}
.sl-s-sync-page .sl-s-sync-hero h2.sl-hero-h2,.sl-s-sync-page .sl-s-sync-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600}
.sl-s-sync-hero__actions{display:flex;flex-direction:column;gap:12px;margin-top:24px}
.sl-s-sync-hero__actions .sl-hero-btn{width:100%}
.sl-s-sync-hero__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-s-sync-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-s-sync-hero__image amp-img{display:block;width:100%}
.sl-s-sync-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-s-sync-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:36px}.sl-s-sync-hero__media{max-width:none;margin:0}.sl-s-sync-hero__actions{flex-direction:row;flex-wrap:wrap}.sl-s-sync-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-s-sync-hero__image{border-radius:16px}}

/* Alternating backgrounds (matches desktop) */
.sl-s-sync-why,.sl-s-sync-integrations,.sl-s-sync-choose,.sl-s-sync-faq{background:var(--sl-page-bg)}
.sl-s-sync-connect,.sl-s-sync-systems,.sl-s-sync-enterprise,.sl-s-sync-suite,.sl-s-sync-contact{background:var(--sl-page-white)}

/* Shared section padding */
.sl-s-sync-why,.sl-s-sync-connect,.sl-s-sync-integrations,.sl-s-sync-systems,.sl-s-sync-enterprise,.sl-s-sync-choose,.sl-s-sync-suite,.sl-s-sync-faq,.sl-s-sync-contact{padding:48px 16px}

/* Subtitles */
.sl-s-sync-integrations__subtitle,.sl-s-sync-enterprise__subtitle{margin:16px 0 14px;font-size:var(--sl-fs-h3);font-weight:600;line-height:1.4;color:var(--sl-page-primary)}

/* Intro blocks */
.sl-s-sync-integrations__intro,.sl-s-sync-systems__intro,.sl-s-sync-enterprise__intro,.sl-s-sync-choose__intro,.sl-s-sync-suite__intro{margin-bottom:28px}
.sl-s-sync-integrations__intro p,.sl-s-sync-systems__intro p{max-width:820px}
.sl-s-sync-integrations__intro h2,.sl-s-sync-systems__intro h2,.sl-s-sync-enterprise__intro h2,.sl-s-sync-choose__intro h2,.sl-s-sync-suite__intro h2{margin-bottom:0}

/* Why — media left */
.sl-s-sync-why__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-s-sync-why__content{min-width:0}
.sl-s-sync-why__copy{display:flex;flex-direction:column;gap:14px}
.sl-s-sync-why__copy p{margin:0}
.sl-s-sync-why__media{order:-1;min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-s-sync-why__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-s-sync-why__image amp-img{display:block;width:100%}
.sl-s-sync-why__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-s-sync-why__media{max-width:none;margin:0}.sl-s-sync-why__image{border-radius:16px}}
@media(min-width:900px){.sl-s-sync-why__grid{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:48px}.sl-s-sync-why__media{order:0}}

/* Connect — content left, media right */
.sl-s-sync-connect__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-s-sync-connect__content{min-width:0}
.sl-s-sync-connect__copy{display:flex;flex-direction:column;gap:14px}
.sl-s-sync-connect__copy p{margin:0}
.sl-s-sync-connect__list{margin:0;padding-left:1.35em;list-style:disc}
.sl-s-sync-connect__list li{list-style:disc;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-sync-connect__list li + li{margin-top:6px}
.sl-s-sync-connect__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-s-sync-connect__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-s-sync-connect__image amp-img{display:block;width:100%}
.sl-s-sync-connect__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-s-sync-connect__media{max-width:none;margin:0}.sl-s-sync-connect__image{border-radius:16px}}
@media(min-width:900px){.sl-s-sync-connect__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:48px}}

/* Integrations cards + logo groups (mirrors desktop consolidated section) */
.sl-s-sync-integrations__card,.sl-s-sync-enterprise__card,.sl-s-sync-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;box-sizing:border-box}
.sl-s-sync-integrations__card,.sl-s-sync-choose__card{background:var(--sl-page-white)}
.sl-s-sync-enterprise__card{background:var(--sl-page-bg)}
.sl-s-sync-integrations__card .sl-panel-title,.sl-s-sync-enterprise__card .sl-panel-title,.sl-s-sync-choose__card .sl-panel-title{margin:0 0 12px}
.sl-s-sync-integrations__card p,.sl-s-sync-enterprise__card p,.sl-s-sync-choose__card p{margin:0}
.sl-s-sync-integrations__lead{margin:0 0 10px;font-weight:600;color:var(--sl-page-primary)}
.sl-s-sync-integrations__supports{margin:12px 0 0;font-weight:600;color:var(--sl-page-navy)}
.sl-s-sync-integrations__card > p:not(.sl-s-sync-integrations__lead):not(.sl-s-sync-integrations__supports):not(.sl-s-sync-integrations__names){margin:0 0 12px}
.sl-s-sync-integrations__names{margin:0 0 12px;font-size:13px;line-height:1.5;color:var(--sl-page-muted);font-weight:600}
.sl-s-sync-integrations__logos{display:flex;flex-wrap:wrap;gap:10px;margin-top:auto}
.sl-s-sync-integrations__logo{display:flex;align-items:center;justify-content:center;min-width:108px;min-height:72px;padding:12px 14px;border:1px solid rgba(22,35,78,.10);border-radius:12px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-s-sync-integrations__logo amp-img{display:block;max-width:100%}
.sl-s-sync-integrations__logo amp-img img{object-fit:contain;object-position:center;max-height:40px}
@media(min-width:768px){.sl-s-sync-integrations__card,.sl-s-sync-enterprise__card,.sl-s-sync-choose__card{padding:28px 24px}.sl-s-sync-page .sl-s-sync-integrations__groups.sl-amp-card-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-s-sync-page .sl-s-sync-integrations__groups.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:1 / -1;max-width:calc(50% - 12px);justify-self:center}}
@media(max-width:767px){.sl-s-sync-integrations__logo{min-width:96px;min-height:64px}}

/* Enterprise */
@media(min-width:1000px){.sl-s-sync-page .sl-s-sync-enterprise__cards.sl-amp-card-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}}

/* Choose — 5 cards, last row centered */
@media(min-width:1000px){.sl-s-sync-page .sl-s-sync-choose__grid.sl-amp-card-grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:24px}.sl-s-sync-page .sl-s-sync-choose__grid.sl-amp-card-grid > .sl-s-sync-choose__card{grid-column:span 2;justify-self:stretch;max-width:none}.sl-s-sync-page .sl-s-sync-choose__grid.sl-amp-card-grid > .sl-s-sync-choose__card:nth-child(4):nth-last-child(2){grid-column:2 / 4}.sl-s-sync-page .sl-s-sync-choose__grid.sl-amp-card-grid > .sl-s-sync-choose__card:nth-child(5):last-child{grid-column:4 / 6}}

/* Suite — product cards */
.sl-s-sync-suite__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;min-height:180px;padding:24px 20px;border:1px solid rgba(22,35,78,.10);border-radius:14px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-s-sync-suite__number{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;margin-bottom:18px;border:1px solid rgba(20,114,186,.18);border-radius:8px;background:rgba(20,114,186,.08);color:var(--sl-page-primary);font-size:12px;font-weight:700;line-height:1}
.sl-s-sync-suite__card-heading{display:flex;align-items:center;flex-wrap:wrap;gap:8px 12px;margin:0 0 12px}
.sl-s-sync-suite__card-heading .sl-panel-title{margin:0}
.sl-s-sync-suite__role{display:inline-flex;align-items:center;padding:4px 10px;border-radius:999px;background:rgba(20,114,186,.08);color:var(--sl-page-primary);font-size:13px;font-weight:700;line-height:1.2}
.sl-s-sync-suite__card p{margin:0}
.sl-s-sync-suite__closing{margin-top:28px;max-width:820px}
.sl-s-sync-suite__closing p{margin:0;color:var(--sl-page-navy);font-size:17px;line-height:1.6}
@media(min-width:768px){.sl-s-sync-suite__card{padding:28px 26px;min-height:180px}.sl-s-sync-page .sl-s-sync-suite__cards.sl-amp-card-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-s-sync-page .sl-s-sync-suite__cards.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:1 / -1;max-width:calc(50% - 10px);justify-self:center}}
@media(min-width:1000px){.sl-s-sync-page .sl-s-sync-suite__cards.sl-amp-card-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:20px}.sl-s-sync-page .sl-s-sync-suite__cards.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:2;max-width:none;justify-self:stretch}}

/* FAQ */
.sl-s-sync-faq .sl-amp-faq{margin-top:20px}
.sl-s-sync-faq__cta{margin-top:24px}

/* Contact */
.sl-s-sync-contact__content{min-width:0}
.sl-s-sync-contact__copy{display:flex;flex-direction:column;gap:14px;margin-bottom:22px}
.sl-s-sync-contact__copy p{margin:0}
.sl-s-sync-contact__details{display:flex;flex-direction:column;gap:12px}
.sl-s-sync-contact__email{display:flex;flex-direction:column;justify-content:center;gap:2px;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.22);border-radius:10px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-s-sync-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-s-sync-contact__email-value{color:var(--sl-page-primary);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-s-sync-contact__whatsapp{display:flex;align-items:center;gap:12px;min-height:56px;padding:10px 18px;border-radius:10px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-s-sync-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff}
.sl-s-sync-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-s-sync-contact__whatsapp-text{display:flex;flex-direction:column;color:#fff}
.sl-s-sync-contact__whatsapp-label{color:#fff!important;font-size:15px;font-weight:700;line-height:1.25}
.sl-s-sync-page .sl-contact-layout{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:start}
.sl-s-sync-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:768px){.sl-s-sync-contact__details{flex-direction:row;flex-wrap:wrap;align-items:stretch}}
@media(min-width:900px){.sl-s-sync-page .sl-contact-layout{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:48px}.sl-s-sync-page .sl-contact-form-card{padding:32px;border-radius:24px}}
