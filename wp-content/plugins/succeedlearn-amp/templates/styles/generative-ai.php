<?php
/**
 * Generative AI Training — AMP page styles (layout / spacing only).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-gai-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-gai-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-gai-page{--sl-fs-h2:48px}}
.sl-gai-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-gai-page .sl-eyebrow,.sl-gai-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-gai-page h2:not(.sl-gai-hero__subheading) > span,
.sl-gai-page .sl-h2 > span{color:var(--sl-page-primary,#1472ba)}
.sl-gai-page .sl-btn--secondary{background:var(--sl-page-navy)}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Alternating white / grey (match desktop). */
.sl-gai-hero,.sl-gai-what,.sl-gai-principles,.sl-gai-outcomes,.sl-gai-policy,.sl-gai-cta{background:var(--sl-page-white)}
.sl-gai-why,.sl-gai-topics,.sl-gai-risk,.sl-gai-audience,.sl-gai-faq,.sl-gai-contact{background:var(--sl-page-bg)}

/* Shared section padding + type. */
.sl-gai-hero,.sl-gai-why,.sl-gai-what,.sl-gai-topics,.sl-gai-principles,.sl-gai-risk,.sl-gai-outcomes,.sl-gai-audience,.sl-gai-policy,.sl-gai-faq,.sl-gai-cta,.sl-gai-contact{padding:48px 16px}
.sl-gai-why h2,.sl-gai-what h2,.sl-gai-topics h2,.sl-gai-principles h2,.sl-gai-risk h2,.sl-gai-outcomes h2,.sl-gai-audience h2,.sl-gai-policy h2,.sl-gai-faq h2,.sl-gai-cta h2,.sl-gai-contact h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy)}
.sl-gai-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}

/* Hero */
.sl-gai-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(20,114,186,.12),transparent 34%),var(--sl-page-white)}
.sl-gai-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:start}
.sl-gai-page .sl-gai-hero h1{margin:0 0 14px;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-gai-page .sl-gai-hero h2.sl-hero-h2,
.sl-gai-page .sl-gai-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600}
.sl-gai-hero__content p{margin:0 0 14px}
.sl-gai-hero__accent{color:var(--sl-page-primary)}
.sl-gai-page .sl-gai-hero__actions{display:flex;flex-direction:row;flex-wrap:wrap;align-items:center;gap:12px;margin-top:20px}
.sl-gai-page .sl-gai-hero__actions .sl-hero-btn{width:fit-content;max-width:100%;flex:0 0 auto;white-space:nowrap}
@media(max-width:767px){.sl-gai-page .sl-gai-hero__actions{flex-direction:column;align-items:stretch}.sl-gai-page .sl-gai-hero__actions .sl-hero-btn{width:100%;max-width:100%;white-space:normal}}
.sl-gai-hero__media{min-width:0;width:100%;max-width:none;margin:0}
.sl-gai-hero__image-placeholder{display:flex;align-items:center;justify-content:center;width:100%;min-height:240px;padding:28px;border:1px dashed rgba(22,35,78,.20);border-radius:12px;background:var(--sl-page-bg);box-sizing:border-box;color:var(--sl-page-muted);text-align:center;font-size:15px;font-weight:600}

/* Editorial copy sections */
.sl-gai-why__copy,.sl-gai-what__copy,.sl-gai-risk__copy,.sl-gai-audience__copy,.sl-gai-policy__copy,.sl-gai-cta__copy{display:flex;flex-direction:column;gap:14px}
.sl-gai-why__copy p,.sl-gai-what__copy p,.sl-gai-risk__copy p,.sl-gai-audience__copy p,.sl-gai-policy__copy p,.sl-gai-cta__copy p{margin:0}

/* Topics — text-only bordered list, no bullets */
.sl-gai-topics__heading{margin-bottom:22px}
.sl-gai-topics__heading p{margin:0}
.sl-gai-topics__list{display:grid;grid-template-columns:minmax(0,1fr);gap:0;margin:0;padding:0;list-style:none}
.sl-gai-topics__item{margin:0;padding:10px 0;color:var(--sl-page-navy);font-size:15px;font-weight:500;line-height:1.5;list-style:none;border-bottom:1px solid rgba(107,124,147,.14)}
@media(min-width:768px){.sl-gai-topics__list{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:0 40px}}

/* Principles — numbered rows */
.sl-gai-principles__heading{margin-bottom:22px}
.sl-gai-principles__list{display:flex;flex-direction:column;gap:16px;margin:0;padding:0;list-style:none}
.sl-gai-principles__item{display:grid;grid-template-columns:36px minmax(0,1fr);gap:14px;align-items:start;margin:0;padding:20px;list-style:none;border:1px solid rgba(107,124,147,.16);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-gai-principles__number{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:10px;background:rgba(20,114,186,.1);color:var(--sl-page-primary);font-size:13px;font-weight:700;line-height:1}
.sl-gai-principles__body h3,.sl-gai-principles__body .sl-panel-title{margin:0 0 8px;color:var(--sl-page-navy);font-size:18px;font-weight:700;line-height:1.35}
.sl-gai-principles__body p{margin:0;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
@media(min-width:768px){.sl-gai-principles__item{grid-template-columns:48px minmax(0,1fr);gap:20px;padding:24px 28px}.sl-gai-principles__number{width:42px;height:42px;font-size:15px}}

/* Outcomes — bordered cards, no bullets */
.sl-gai-outcomes__heading{margin-bottom:22px}
.sl-gai-outcomes__heading p{margin:0}
.sl-gai-outcomes__list{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;margin:0;padding:0;list-style:none}
.sl-gai-outcomes__item{margin:0;padding:18px 20px;border:1px solid rgba(107,124,147,.16);border-radius:14px;background:var(--sl-page-bg);color:var(--sl-page-navy);font-size:15px;font-weight:500;line-height:1.5;list-style:none;box-sizing:border-box}
@media(min-width:1000px){.sl-gai-outcomes__list{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:16px 28px}}

/* Policy questions */
.sl-gai-policy__copy{margin-bottom:20px}
.sl-gai-policy__questions{display:flex;flex-direction:column;gap:12px;margin:8px 0 0;padding:0;list-style:none}
.sl-gai-policy__question{margin:0;padding:14px 18px;border-left:3px solid var(--sl-page-primary);border-radius:0 10px 10px 0;background:var(--sl-page-bg);color:var(--sl-page-navy);font-size:15px;line-height:1.5;list-style:none}
.sl-gai-policy__question strong{font-weight:700;color:var(--sl-page-navy)}
.sl-gai-policy__actions{display:flex;flex-direction:column;gap:12px;margin-top:8px}
.sl-gai-policy__actions .sl-hero-btn{width:100%}
@media(min-width:768px){.sl-gai-policy__actions{flex-direction:row}.sl-gai-policy__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-gai-policy__question{font-size:16px}}

/* FAQ */
.sl-gai-faq .sl-lead{margin:0 0 8px;max-width:none}
.sl-gai-faq .sl-amp-faq{margin-top:20px}
.sl-gai-faq__cta{margin-top:20px}
.sl-gai-faq__cta .sl-btn{width:auto;max-width:100%}
@media(max-width:767px){.sl-gai-faq__cta .sl-btn{width:100%}}

/* CTA */
.sl-gai-cta__inner{text-align:center;max-width:none;width:100%;margin:0}
.sl-gai-cta__copy{margin-bottom:20px}
.sl-gai-cta__actions{display:flex;flex-direction:column;align-items:stretch;gap:12px}
.sl-gai-cta__actions .sl-hero-btn{width:100%}
@media(min-width:768px){.sl-gai-cta__actions{flex-direction:row;justify-content:center}.sl-gai-cta__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}}

/* Contact */
.sl-gai-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-gai-contact__lead{margin:0 0 14px;font-size:16px;line-height:1.65;color:var(--sl-page-text)}
.sl-gai-contact__copy{display:flex;flex-direction:column;gap:14px;margin-bottom:20px}
.sl-gai-contact__copy p{margin:0}
.sl-gai-contact__details{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;max-width:100%}
.sl-gai-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-gai-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-gai-contact__email-value{color:var(--sl-page-navy);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-gai-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-gai-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-gai-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-gai-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-gai-contact__whatsapp-label,.sl-gai-contact__whatsapp:visited,.sl-gai-contact__whatsapp:visited .sl-gai-contact__whatsapp-label{color:#fff!important}
.sl-gai-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25}
.sl-gai-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-gai-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}.sl-gai-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-gai-contact__details{gap:10px}.sl-gai-contact__email,.sl-gai-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center;width:100%}.sl-gai-contact__email-value{font-size:14px}.sl-gai-page .sl-h2,.sl-gai-why h2,.sl-gai-what h2,.sl-gai-topics h2,.sl-gai-principles h2,.sl-gai-risk h2,.sl-gai-outcomes h2,.sl-gai-audience h2,.sl-gai-policy h2,.sl-gai-faq h2,.sl-gai-cta h2,.sl-gai-contact h2{font-size:28px}}
