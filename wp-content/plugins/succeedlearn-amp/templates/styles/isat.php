<?php
/**
 * Information Security Awareness Training (ISA Standard) — AMP page styles.
 *
 * Ported from theme assets/css/information-security-awareness-training/.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-isat-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-isat-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-isat-page{--sl-fs-h2:48px}}
.sl-isat-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-isat-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-isat-page h2:not(.sl-isat-hero__subheading) > span,
.sl-isat-page .sl-h2 > span,
.sl-isat-page .sl-isat-hero h1 > span{color:var(--sl-page-primary,#1472ba)}
.sl-isat-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-isat-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-isat-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Alternating white / grey (match desktop). */
.sl-isat-hero,.sl-isat-modules,.sl-isat-designed,.sl-isat-choose,.sl-isat-culture,.sl-isat-faq{background:var(--sl-page-white)}
.sl-isat-why,.sl-isat-learn,.sl-isat-topics,.sl-isat-action,.sl-isat-audience,.sl-isat-contact{background:var(--sl-page-bg)}

/* Shared section padding + type. */
.sl-isat-why,.sl-isat-learn,.sl-isat-modules,.sl-isat-designed,.sl-isat-topics,.sl-isat-action,.sl-isat-choose,.sl-isat-audience,.sl-isat-culture,.sl-isat-faq,.sl-isat-contact{padding:48px 16px}
.sl-isat-page .sl-isat-why h2,.sl-isat-page .sl-isat-learn h2,.sl-isat-page .sl-isat-modules h2,.sl-isat-page .sl-isat-designed h2,.sl-isat-page .sl-isat-topics h2,.sl-isat-page .sl-isat-action h2,.sl-isat-page .sl-isat-choose h2,.sl-isat-page .sl-isat-audience h2,.sl-isat-page .sl-isat-culture h2,.sl-isat-page .sl-isat-faq h2,.sl-isat-page .sl-isat-contact h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy)}
.sl-isat-page .sl-isat-why h2 > span,.sl-isat-page .sl-isat-learn h2 > span,.sl-isat-page .sl-isat-modules h2 > span,.sl-isat-page .sl-isat-designed h2 > span,.sl-isat-page .sl-isat-topics h2 > span,.sl-isat-page .sl-isat-action h2 > span,.sl-isat-page .sl-isat-choose h2 > span,.sl-isat-page .sl-isat-audience h2 > span,.sl-isat-page .sl-isat-culture h2 > span,.sl-isat-page .sl-isat-faq h2 > span,.sl-isat-page .sl-isat-contact h2 > span{color:var(--sl-page-primary)}
.sl-isat-page .sl-isat-modules__subtitle,.sl-isat-page .sl-isat-action__subtitle{margin:12px 0 14px;font-size:20px;font-weight:600;line-height:1.4;letter-spacing:0;text-transform:none;color:var(--sl-page-primary)}

/* Hero */
.sl-isat-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(37,99,235,.12),transparent 34%),var(--sl-page-white)}
.sl-isat-hero__top{width:100%;margin-bottom:24px}
.sl-isat-hero__eyebrow{display:inline-flex;align-items:center;margin-bottom:14px}
.sl-isat-page .sl-isat-hero h1{margin:0;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-isat-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-isat-hero__content{min-width:0}
.sl-isat-page .sl-isat-hero h2.sl-hero-h2,.sl-isat-page .sl-isat-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600;max-width:680px}
.sl-isat-hero__description{max-width:680px;margin:0 0 14px}
.sl-isat-hero__meta{display:flex;flex-wrap:wrap;gap:12px 20px;margin:8px 0 0}
.sl-isat-hero__meta-item{display:inline-flex;flex-wrap:wrap;gap:6px;padding:10px 14px;border:1px solid rgba(22,35,78,.12);border-radius:10px;background:var(--sl-page-bg);color:var(--sl-page-navy);font-size:14px;line-height:1.4}
.sl-isat-hero__actions{display:flex;flex-direction:column;flex-wrap:wrap;gap:12px;margin-top:20px}
.sl-isat-hero__actions .sl-hero-btn{width:100%}
.sl-isat-hero__media{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-isat-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:18px}
.sl-isat-hero__image amp-img{display:block;width:100%}
.sl-isat-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-isat-hero{padding:24px 16px 56px}.sl-isat-hero__top{margin-bottom:32px}.sl-isat-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:36px}.sl-isat-hero__actions{flex-direction:row}.sl-isat-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-isat-hero__media{max-width:none;margin:0}.sl-isat-hero__image{border-radius:24px}}
@media(min-width:1000px){.sl-isat-hero__grid{grid-template-columns:minmax(0,.6fr) minmax(0,.4fr);gap:40px}}

/* Why */
.sl-isat-why__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:start}
.sl-isat-why__media{min-width:0}
.sl-isat-why__image{overflow:hidden;width:100%;line-height:0;border-radius:12px;background:var(--sl-page-white)}
.sl-isat-why__image amp-img{display:block;width:100%}
.sl-isat-why__content{min-width:0}
.sl-isat-page .sl-isat-why__content h2{margin-bottom:18px}
.sl-isat-why__copy{display:flex;flex-direction:column;gap:14px}
.sl-isat-page .sl-isat-why__copy p{margin:0}
@media(min-width:768px){.sl-isat-why__image{border-radius:16px}}
@media(min-width:992px){.sl-isat-why__grid{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:56px}.sl-isat-why__media{position:sticky;top:110px;align-self:start}}

/* Learn */
.sl-isat-learn__intro{margin-bottom:24px}
.sl-isat-learn__intro p{max-width:760px;margin:0}
.sl-isat-learn__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-isat-learn__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-isat-learn__card h3{margin:0 0 12px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.35}
.sl-isat-page .sl-isat-learn__card p{margin:0;color:var(--sl-page-text);font-size:15px;line-height:1.6}
@media(min-width:700px){.sl-isat-learn__intro{margin-bottom:28px}.sl-isat-learn__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-isat-learn__card{padding:26px 24px}}
@media(min-width:1000px){.sl-isat-learn__grid{grid-template-columns:repeat(4,minmax(0,1fr));gap:24px}.sl-isat-learn__card{padding:28px 24px}}

/* Modules */
.sl-isat-modules__heading{margin:0 0 28px}
.sl-isat-modules__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-isat-modules__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-isat-modules__content{display:flex;flex:1;flex-direction:column}
.sl-isat-modules__content .sl-panel-title{margin:0 0 8px;color:var(--sl-page-navy)}
.sl-isat-page .sl-isat-modules__tagline{margin:0 0 12px;color:var(--sl-page-primary);font-size:16px;font-weight:600;line-height:1.4}
.sl-isat-page .sl-isat-modules__text{margin:0 0 14px;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
.sl-isat-page .sl-isat-modules__topics{margin:auto 0 18px;padding-top:12px;border-top:1px solid rgba(107,124,147,.14);color:var(--sl-page-navy);font-size:14px;line-height:1.55}
.sl-isat-modules__topics strong{display:block;margin-bottom:4px;color:var(--sl-page-primary);font-weight:700}
.sl-isat-modules__link{display:inline-flex;align-items:center;align-self:flex-start;margin:0;padding:0;border:0;background:transparent;color:var(--sl-page-primary);font:inherit;font-size:15px;font-weight:700;line-height:1.4;text-align:left;cursor:pointer}
.sl-isat-modules__link:hover,.sl-isat-modules__link:focus{color:var(--sl-page-navy);text-decoration:underline}
@media(min-width:700px){.sl-isat-modules__heading{margin-bottom:36px}.sl-isat-modules__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-isat-modules__card{padding:28px 24px}}
@media(min-width:1000px){.sl-isat-modules__grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-isat-modules__grid>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}

/* Designed */
.sl-isat-designed__heading{margin-bottom:20px}
.sl-isat-page .sl-isat-designed__lead{margin:0 0 16px;max-width:760px;color:var(--sl-page-navy);font-size:16px;font-weight:600;line-height:1.5}
.sl-isat-page .sl-isat-designed__subhead{margin:0 0 12px;font-size:20px;font-weight:700;line-height:1.35;color:var(--sl-page-navy)}
.sl-isat-page .sl-isat-designed__intro{margin:0 0 24px;max-width:860px}
.sl-isat-designed__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-isat-designed__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-isat-designed__card h3{margin:0 0 12px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.3}
.sl-isat-page .sl-isat-designed__card p{margin:0;color:var(--sl-page-text)}
.sl-isat-designed__details{display:flex;flex-direction:column;gap:18px;margin-top:28px}
.sl-isat-designed__detail h3{margin:0 0 8px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-isat-page .sl-isat-designed__detail p{max-width:900px;margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-isat-designed__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-isat-designed__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-isat-designed__card{padding:26px 24px}.sl-isat-designed__details{gap:22px;margin-top:36px}}
@media(min-width:1000px){.sl-isat-designed__grid{display:grid;grid-template-columns:repeat(6,minmax(0,1fr));gap:24px}.sl-isat-designed__card{grid-column:span 2;max-width:none;justify-self:stretch}.sl-isat-designed__grid>:last-child:nth-child(odd){grid-column:4/6;justify-self:stretch;max-width:none}.sl-isat-designed__card:nth-child(4){grid-column:2/4}.sl-isat-designed__card:nth-child(5){grid-column:4/6}.sl-isat-designed__card{padding:30px}}

/* Topics */
.sl-isat-topics{border-top:1px solid rgba(107,124,147,.14)}
.sl-isat-topics__heading{margin-bottom:28px}
.sl-isat-topics__heading p{max-width:860px;margin:0}
.sl-isat-topics__list{display:flex;flex-wrap:wrap;gap:12px;margin:0;padding:0;list-style:none}
.sl-isat-topics__item{display:inline-flex;align-items:center;margin:0;padding:12px 20px;border:1px solid rgba(20,114,186,.22);border-radius:999px;background:var(--sl-page-white);box-shadow:0 6px 18px rgba(22,35,78,.04);color:var(--sl-page-navy);font-size:15px;font-weight:600;line-height:1.35;list-style:none}
@media(max-width:767px){.sl-isat-topics__list{gap:10px}.sl-isat-topics__item{padding:10px 16px;font-size:14px}}

/* Action (carousel) */
.sl-isat-action__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:32px;align-items:center}
.sl-isat-action__content{min-width:0}
.sl-isat-page .sl-isat-action__lead{margin:0 0 16px}
.sl-isat-action__content p{margin:0 0 16px}
.sl-isat-action__content .sl-content-btn{margin-top:8px}
.sl-isat-action__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-isat-action__viewport{overflow:hidden;width:100%;border-radius:18px;background:var(--sl-page-bg)}
.sl-isat-action__carousel{width:100%}
.sl-isat-action__slide{width:100%;line-height:0}
.sl-isat-action__slide amp-img{display:block;width:100%}
.sl-isat-action__slide amp-img img{object-fit:cover;object-position:center}
.sl-isat-action__controls{display:flex;align-items:center;justify-content:flex-end;gap:16px;margin-top:16px}
.sl-isat-action__arrow{display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;padding:0;border:1px solid var(--sl-page-navy);border-radius:50%;background:transparent;color:var(--sl-page-navy);font-size:18px;line-height:1;cursor:pointer}
.sl-isat-action__arrow:hover,.sl-isat-action__arrow:focus{background:var(--sl-page-primary);border-color:var(--sl-page-primary);color:#fff}
.sl-isat-action__counter{min-width:42px;text-align:center;color:var(--sl-page-navy);font-size:14px;font-weight:600}
@media(min-width:768px){.sl-isat-action__viewport{border-radius:24px}.sl-isat-action__arrow{width:40px;height:40px}.sl-isat-action__controls{margin-top:18px;gap:18px}}
@media(min-width:1000px){.sl-isat-action__grid{grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:60px}.sl-isat-action__media{max-width:none;margin:0}}

/* Choose */
.sl-isat-choose__heading{margin-bottom:28px}
.sl-isat-choose__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-isat-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-isat-choose__card h3{margin:0 0 14px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.35}
.sl-isat-page .sl-isat-choose__card p{margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-isat-choose__heading{margin-bottom:36px}.sl-isat-choose__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-isat-choose__card{padding:28px 26px}}
@media(min-width:1000px){.sl-isat-choose__grid{gap:24px}.sl-isat-choose__card{padding:30px}}

/* Audience */
.sl-isat-audience__heading{margin-bottom:28px}
.sl-isat-audience__heading p{max-width:860px;margin:0 0 12px}
.sl-isat-audience__heading p:last-child{margin-bottom:0}
.sl-isat-audience__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-isat-audience__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-isat-audience__card h3{margin:0 0 12px;color:var(--sl-page-navy);font-size:18px;font-weight:700;line-height:1.35}
.sl-isat-page .sl-isat-audience__card p{margin:0;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
@media(min-width:700px){.sl-isat-audience__heading{margin-bottom:36px}.sl-isat-audience__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-isat-audience__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-isat-audience__card{padding:28px 24px}}
@media(min-width:1000px){.sl-isat-audience__grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-isat-audience__grid>:last-child:nth-child(odd){grid-column:2;justify-self:stretch;max-width:none}}

/* Culture */
.sl-isat-culture{border-top:1px solid rgba(107,124,147,.14)}
.sl-isat-culture__inner{max-width:860px;margin:0 auto;text-align:center}
.sl-isat-culture__copy{display:flex;flex-direction:column;gap:14px;margin-bottom:24px}
.sl-isat-page .sl-isat-culture__copy p{margin:0}
.sl-isat-page .sl-isat-culture__highlight{margin:0 0 28px;color:var(--sl-page-navy);font-size:18px;line-height:1.6}
.sl-isat-culture__highlight strong{display:block;margin-top:4px;color:var(--sl-page-primary);font-weight:700}
.sl-isat-culture__actions{display:flex;justify-content:center}
@media(max-width:767px){.sl-isat-page .sl-isat-culture__highlight{font-size:16px}}

/* FAQ */
.sl-isat-faq__heading{margin-bottom:8px}
.sl-isat-faq__heading .sl-lead{max-width:none;margin:0 0 8px}
.sl-isat-faq .sl-amp-faq{margin-top:20px}
.sl-isat-faq__cta{margin-top:20px}
.sl-isat-faq__cta .sl-btn{width:auto;max-width:100%}
@media(max-width:767px){.sl-isat-faq__cta .sl-btn{width:100%}}

/* Contact */
.sl-isat-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-isat-contact__heading{max-width:760px;margin-bottom:20px}
.sl-isat-page .sl-isat-contact__lead{margin:0;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-isat-contact__body{max-width:720px;margin-bottom:24px}
.sl-isat-page .sl-isat-contact__body p{margin:0;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-isat-contact__details{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;max-width:100%}
.sl-isat-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-isat-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-isat-contact__email-value{color:var(--sl-page-navy);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-isat-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-isat-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-isat-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-isat-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-isat-contact__whatsapp-label,.sl-isat-contact__whatsapp:visited,.sl-isat-contact__whatsapp:visited .sl-isat-contact__whatsapp-label{color:#fff!important}
.sl-isat-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25}
.sl-isat-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-isat-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,.9fr);gap:50px;align-items:center}.sl-isat-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-isat-contact__details{gap:10px}.sl-isat-contact__email,.sl-isat-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center;width:100%}.sl-isat-contact__email-value{font-size:14px}.sl-isat-page .sl-h2,.sl-isat-page .sl-isat-why h2,.sl-isat-page .sl-isat-learn h2,.sl-isat-page .sl-isat-modules h2,.sl-isat-page .sl-isat-designed h2,.sl-isat-page .sl-isat-topics h2,.sl-isat-page .sl-isat-action h2,.sl-isat-page .sl-isat-choose h2,.sl-isat-page .sl-isat-audience h2,.sl-isat-page .sl-isat-culture h2,.sl-isat-page .sl-isat-faq h2,.sl-isat-page .sl-isat-contact h2{font-size:28px}}
