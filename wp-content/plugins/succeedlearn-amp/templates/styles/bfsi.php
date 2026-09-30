<?php
/**
 * BFSI & PE/VC Cybersecurity Awareness — AMP page styles (layout / spacing only).
 *
 * Ported from theme assets/css/security-awareness-training-bfsi-pe-vc/.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-bfsi-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-bfsi-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-bfsi-page{--sl-fs-h2:48px}}
.sl-bfsi-page .sl-h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-bfsi-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-bfsi-page .sl-h2 > span,
.sl-bfsi-page .sl-bfsi-hero h1 > span{color:var(--sl-page-primary,#1472ba)}
.sl-bfsi-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-bfsi-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-bfsi-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-bfsi-page .sl-panel-title{margin:0 0 12px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}

/* Alternating white / grey (match desktop). */
.sl-bfsi-hero,.sl-bfsi-learn,.sl-bfsi-scenarios,.sl-bfsi-structure,.sl-bfsi-action,.sl-bfsi-choose,.sl-bfsi-more,.sl-bfsi-contact{background:var(--sl-page-white)}
.sl-bfsi-why,.sl-bfsi-risks,.sl-bfsi-laws,.sl-bfsi-outline,.sl-bfsi-cases,.sl-bfsi-audience,.sl-bfsi-faq{background:var(--sl-page-bg)}

/* Shared section padding. */
.sl-bfsi-why,.sl-bfsi-learn,.sl-bfsi-risks,.sl-bfsi-scenarios,.sl-bfsi-laws,.sl-bfsi-structure,.sl-bfsi-outline,.sl-bfsi-action,.sl-bfsi-cases,.sl-bfsi-choose,.sl-bfsi-audience,.sl-bfsi-more,.sl-bfsi-faq,.sl-bfsi-contact{padding:48px 16px}
.sl-bfsi-page .sl-bfsi-action__subtitle,.sl-bfsi-page .sl-bfsi-more__subtitle{margin:12px 0 14px;font-size:20px;font-weight:600;line-height:1.4;letter-spacing:0;text-transform:none;color:var(--sl-page-primary)}

/* Hero */
.sl-bfsi-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(37,99,235,.12),transparent 34%),var(--sl-page-white)}
.sl-bfsi-hero__top{width:100%;margin-bottom:20px}
.sl-bfsi-hero__eyebrow{display:inline-flex;align-items:center;margin-bottom:14px}
.sl-bfsi-page .sl-bfsi-hero h1{margin:0 0 16px;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-bfsi-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-bfsi-hero__content{min-width:0}
.sl-bfsi-page .sl-bfsi-hero h2.sl-hero-h2,.sl-bfsi-page .sl-bfsi-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600;max-width:680px}
.sl-bfsi-hero__description{max-width:680px;margin:0 0 14px}
.sl-bfsi-hero__actions{display:flex;flex-direction:column;flex-wrap:wrap;gap:12px;margin-top:20px}
.sl-bfsi-hero__actions .sl-hero-btn{width:100%}
.sl-bfsi-hero__media{min-width:0;width:100%;max-width:420px;margin:0 auto}
.sl-bfsi-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:18px}
.sl-bfsi-hero__image amp-img{display:block;width:100%}
.sl-bfsi-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-bfsi-hero{padding:24px 16px 56px}.sl-bfsi-hero__top{margin-bottom:28px}.sl-bfsi-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:40px}.sl-bfsi-hero__actions{flex-direction:row}.sl-bfsi-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-bfsi-hero__media{max-width:none;margin:0}.sl-bfsi-hero__image{border-radius:24px}}

/* Why */
.sl-bfsi-why__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:start}
.sl-bfsi-why__media{min-width:0}
.sl-bfsi-why__image{overflow:hidden;width:100%;line-height:0;border-radius:12px;background:var(--sl-page-white)}
.sl-bfsi-why__image amp-img{display:block;width:100%}
.sl-bfsi-why__content{min-width:0}
.sl-bfsi-page .sl-bfsi-why__content h2{margin-bottom:18px}
.sl-bfsi-why__copy{display:flex;flex-direction:column;gap:14px}
.sl-bfsi-page .sl-bfsi-why__copy p{margin:0}
@media(min-width:768px){.sl-bfsi-why__image{border-radius:16px}}
@media(min-width:992px){.sl-bfsi-why__grid{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:56px}.sl-bfsi-why__media{position:sticky;top:110px;align-self:start}}

/* Learn */
.sl-bfsi-learn__intro{margin-bottom:0}
.sl-bfsi-learn__intro h2{margin-bottom:16px}
.sl-bfsi-page .sl-bfsi-learn__lead{margin:0 0 14px;color:var(--sl-page-navy);font-weight:600}
.sl-bfsi-learn__list{margin:0 0 8px;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy);font-size:16px;font-weight:500;line-height:1.55}
.sl-bfsi-learn__list li{margin:0 0 8px;padding-left:.15em;list-style:disc}
.sl-bfsi-learn__list li:last-child{margin-bottom:0}

/* Risks */
.sl-bfsi-risks__heading{margin:0 0 28px}
.sl-bfsi-risks__heading h2{margin:0}
.sl-bfsi-risks__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-bfsi-risks__card{display:flex;flex-direction:column;min-width:0;overflow:hidden;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white)}
.sl-bfsi-risks__media{overflow:hidden;width:100%;line-height:0;background:var(--sl-page-bg)}
.sl-bfsi-risks__media amp-img{display:block;width:100%}
.sl-bfsi-risks__content{display:flex;flex:1;flex-direction:column;padding:22px 20px}
.sl-bfsi-risks__content .sl-panel-title{margin:0 0 12px}
.sl-bfsi-page .sl-bfsi-risks__content > p{margin:0 0 12px;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
.sl-bfsi-page .sl-bfsi-risks__topics{margin:auto 0 0;padding-top:12px;border-top:1px solid rgba(107,124,147,.14);color:var(--sl-page-navy);font-size:14px;line-height:1.55}
.sl-bfsi-risks__topics strong{display:block;margin-bottom:4px;color:var(--sl-page-primary);font-weight:700}
@media(min-width:700px){.sl-bfsi-risks__heading{margin-bottom:36px}.sl-bfsi-risks__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-bfsi-risks__content{padding:24px}}
@media(min-width:1200px){.sl-bfsi-risks__grid{grid-template-columns:repeat(3,minmax(0,1fr))}}

/* Scenarios */
.sl-bfsi-scenarios__intro h2{margin-bottom:16px}
.sl-bfsi-scenarios__intro p{max-width:none;margin:0 0 16px}
.sl-bfsi-page .sl-bfsi-scenarios__lead{margin:0 0 14px;color:var(--sl-page-navy);font-weight:600}
.sl-bfsi-scenarios__list{margin:0 0 24px;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy)}
.sl-bfsi-scenarios__list li{margin:0 0 8px;padding-left:.15em;font-size:16px;font-weight:500;line-height:1.55;list-style:disc}
.sl-bfsi-scenarios__list li:last-child{margin-bottom:0}
.sl-bfsi-page .sl-bfsi-scenarios__close{margin:0;max-width:920px;color:var(--sl-page-text)}

/* Laws table (same layout on mobile; scroll sideways) */
.sl-bfsi-laws__heading{margin:0 0 28px}
.sl-bfsi-laws__heading h2{margin:0}
.sl-bfsi-laws__caption{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
.sl-bfsi-laws__table-wrap{width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-bfsi-laws__table{width:100%;min-width:640px;border-collapse:separate;border-spacing:0;table-layout:fixed}
.sl-bfsi-laws__table th,.sl-bfsi-laws__table td{padding:14px 16px;vertical-align:top;text-align:left}
.sl-bfsi-laws__table thead th{background:var(--sl-page-navy);color:var(--sl-page-white);font-size:14px;font-weight:700;line-height:1.35}
.sl-bfsi-laws__table thead th:first-child{width:32%;border-radius:13px 0 0 0}
.sl-bfsi-laws__table thead th:last-child{width:68%;border-radius:0 13px 0 0;background:var(--sl-page-primary)}
.sl-bfsi-laws__table tbody td{border-bottom:1px solid rgba(107,124,147,.14)}
.sl-bfsi-laws__table tbody td:first-child{background:rgba(245,243,239,.55);border-right:1px solid rgba(107,124,147,.14)}
.sl-bfsi-laws__table tbody tr:last-child td{border-bottom:0}
.sl-bfsi-laws__cell{display:block;color:var(--sl-page-text);font-size:14px;font-weight:500;line-height:1.55;text-align:left}
.sl-bfsi-laws__cell--strong{color:var(--sl-page-navy);font-weight:700}
@media(min-width:768px){.sl-bfsi-laws__heading{margin-bottom:36px}.sl-bfsi-laws__table-wrap{border-radius:16px}.sl-bfsi-laws__table{min-width:720px}.sl-bfsi-laws__table th,.sl-bfsi-laws__table td{padding:18px 22px}.sl-bfsi-laws__table thead th{font-size:15px;border-radius:0}.sl-bfsi-laws__table thead th:first-child{border-radius:15px 0 0 0}.sl-bfsi-laws__table thead th:last-child{border-radius:0 15px 0 0}.sl-bfsi-laws__cell{font-size:15px}}

/* Structure */
.sl-bfsi-structure__heading{margin-bottom:20px}
.sl-bfsi-structure__heading h2{margin:0}
.sl-bfsi-page .sl-bfsi-structure__subhead{margin:0 0 20px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-bfsi-structure__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-bfsi-structure__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-bfsi-structure__card h3{margin:0 0 12px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.3}
.sl-bfsi-page .sl-bfsi-structure__card p{margin:0;color:var(--sl-page-text)}
.sl-bfsi-structure__details{display:flex;flex-direction:column;gap:18px;margin-top:28px}
.sl-bfsi-structure__detail h3{margin:0 0 8px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-bfsi-page .sl-bfsi-structure__detail p{max-width:900px;margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-bfsi-structure__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-bfsi-structure__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-bfsi-structure__card{padding:26px 24px}.sl-bfsi-structure__details{gap:22px;margin-top:36px}}
@media(min-width:1000px){.sl-bfsi-structure__grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:24px}.sl-bfsi-structure__card{grid-column:span 2;max-width:none;justify-self:stretch;padding:30px}.sl-bfsi-structure__grid>:last-child:nth-child(odd){grid-column:4/6;justify-self:stretch;max-width:none}.sl-bfsi-structure__card:nth-child(4){grid-column:2/4}.sl-bfsi-structure__card:nth-child(5){grid-column:4/6}}

/* Outline */
.sl-bfsi-outline__intro{margin-bottom:28px}
.sl-bfsi-outline__intro h2{margin:0}
.sl-bfsi-outline__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-bfsi-outline__card{min-width:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-bfsi-outline__card .sl-panel-title{margin:0 0 16px}
.sl-bfsi-outline__card ul{margin:0;padding:0 0 0 1.35em;list-style:disc}
.sl-bfsi-outline__card li{margin:0 0 8px;color:var(--sl-page-text);font-size:15px;line-height:1.5;list-style:disc}
.sl-bfsi-outline__card li:last-child{margin-bottom:0}
@media(min-width:700px){.sl-bfsi-outline__intro{margin-bottom:36px}.sl-bfsi-outline__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-bfsi-outline__card{padding:28px 24px}}
@media(min-width:1200px){.sl-bfsi-outline__grid{grid-template-columns:repeat(3,minmax(0,1fr))}}

/* Action (carousel) */
.sl-bfsi-action__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:32px;align-items:center}
.sl-bfsi-action__content{min-width:0}
.sl-bfsi-action__content h2{margin-bottom:0}
.sl-bfsi-page .sl-bfsi-action__lead{margin:0 0 16px}
.sl-bfsi-action__content p{margin:0 0 16px}
.sl-bfsi-action__content .sl-content-btn{margin-top:8px}
.sl-bfsi-action__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-bfsi-action__viewport{overflow:hidden;width:100%;border-radius:18px;background:var(--sl-page-bg)}
.sl-bfsi-action__carousel{width:100%}
.sl-bfsi-action__slide{width:100%;line-height:0}
.sl-bfsi-action__slide amp-img{display:block;width:100%}
.sl-bfsi-action__slide amp-img img{object-fit:cover;object-position:center}
.sl-bfsi-action__controls{display:flex;align-items:center;justify-content:flex-end;gap:16px;margin-top:16px}
.sl-bfsi-action__arrow{display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;padding:0;border:1px solid var(--sl-page-navy);border-radius:50%;background:transparent;color:var(--sl-page-navy);font-size:18px;line-height:1;cursor:pointer}
.sl-bfsi-action__arrow:hover,.sl-bfsi-action__arrow:focus{background:var(--sl-page-primary);border-color:var(--sl-page-primary);color:#fff}
.sl-bfsi-action__counter{min-width:42px;text-align:center;color:var(--sl-page-navy);font-size:14px;font-weight:600}
@media(min-width:768px){.sl-bfsi-action__viewport{border-radius:24px}.sl-bfsi-action__arrow{width:40px;height:40px}.sl-bfsi-action__controls{margin-top:18px;gap:18px}}
@media(min-width:1000px){.sl-bfsi-action__grid{grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:60px}.sl-bfsi-action__media{max-width:none;margin:0}}

/* Cases */
.sl-bfsi-cases__layout{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:start}
.sl-bfsi-cases__intro{min-width:0}
.sl-bfsi-cases__intro .sl-home-sub-heading{display:block;margin-bottom:14px}
.sl-bfsi-cases__intro h2{margin-bottom:16px}
.sl-bfsi-cases__copy{display:flex;flex-direction:column;gap:14px}
.sl-bfsi-page .sl-bfsi-cases__copy p{margin:0}
.sl-bfsi-cases__cards{display:flex;flex-direction:column;gap:16px;min-width:0}
.sl-bfsi-cases__card{padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-bfsi-cases__number{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;margin-bottom:16px;border:1px solid rgba(20,114,186,.18);border-radius:8px;background:rgba(20,114,186,.08);color:var(--sl-page-primary);font-weight:700}
.sl-bfsi-cases__card .sl-panel-title{margin:0 0 12px}
.sl-bfsi-page .sl-bfsi-cases__card p{margin:0}
@media(min-width:768px){.sl-bfsi-cases__cards{gap:20px}.sl-bfsi-cases__card{padding:28px 24px}}
@media(min-width:992px){.sl-bfsi-cases__layout{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:48px}.sl-bfsi-cases__intro{position:sticky;top:110px;align-self:start}}

/* Choose */
.sl-bfsi-choose__intro{margin-bottom:28px}
.sl-bfsi-choose__intro h2{margin:0}
.sl-bfsi-choose__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-bfsi-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-bfsi-choose__card .sl-panel-title{margin:0 0 14px;color:var(--sl-page-primary);font-size:18px;font-weight:600}
.sl-bfsi-page .sl-bfsi-choose__card p{margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-bfsi-choose__intro{margin-bottom:36px}.sl-bfsi-choose__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-bfsi-choose__card{padding:30px}}
@media(min-width:1200px){.sl-bfsi-choose__grid{grid-template-columns:repeat(3,minmax(0,1fr))}}

/* Audience */
.sl-bfsi-audience__intro{margin-bottom:0}
.sl-bfsi-audience__intro h2{margin-bottom:16px}
.sl-bfsi-audience__intro p{max-width:none;margin:0 0 16px}
.sl-bfsi-page .sl-bfsi-audience__lead{margin:0 0 14px;color:var(--sl-page-navy);font-weight:600}
.sl-bfsi-audience__list{margin:0;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy)}
.sl-bfsi-audience__list li{margin:0 0 8px;padding-left:.15em;font-size:16px;font-weight:500;line-height:1.55;list-style:disc}
.sl-bfsi-audience__list li:last-child{margin-bottom:0}

/* More */
.sl-bfsi-more__heading{margin:0 0 28px}
.sl-bfsi-more__heading h2{margin:0 0 16px}
.sl-bfsi-more__heading p{max-width:none;margin:0 0 16px}
.sl-bfsi-more__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-bfsi-more__card{display:flex;align-items:center;min-width:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);text-decoration:none;box-sizing:border-box}
.sl-bfsi-more__card:hover,.sl-bfsi-more__card:focus{border-color:var(--sl-page-primary);background:#fff}
.sl-bfsi-more__card h3{margin:0;color:var(--sl-page-navy);font-size:18px;font-weight:700;line-height:1.35}
.sl-bfsi-more__cta{margin-top:28px}
@media(min-width:700px){.sl-bfsi-more__heading{margin-bottom:36px}.sl-bfsi-more__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-bfsi-more__card{padding:28px 24px}.sl-bfsi-more__cta{margin-top:36px}}
@media(min-width:1200px){.sl-bfsi-more__grid{grid-template-columns:repeat(4,minmax(0,1fr))}}

/* FAQ */
.sl-bfsi-faq__heading{margin-bottom:8px}
.sl-bfsi-faq__heading .sl-lead{max-width:none;margin:0 0 8px}
.sl-bfsi-faq .sl-amp-faq{margin-top:20px}
.sl-bfsi-faq__cta{margin-top:20px}
.sl-bfsi-faq__cta .sl-btn{width:auto;max-width:100%}
@media(max-width:767px){.sl-bfsi-faq__cta .sl-btn{width:100%}}

/* Contact */
.sl-bfsi-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-bfsi-contact__heading{max-width:760px;margin-bottom:20px}
.sl-bfsi-page .sl-bfsi-contact__lead{margin:0;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-bfsi-contact__body{max-width:720px;margin-bottom:24px}
.sl-bfsi-page .sl-bfsi-contact__body p{margin:0 0 12px;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-bfsi-page .sl-bfsi-contact__body p:last-child{margin-bottom:0}
.sl-bfsi-contact__details{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;max-width:100%}
.sl-bfsi-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-bfsi-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-bfsi-contact__email-value{color:var(--sl-page-navy);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-bfsi-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-bfsi-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-bfsi-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-bfsi-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-bfsi-contact__whatsapp-label,.sl-bfsi-contact__whatsapp:visited,.sl-bfsi-contact__whatsapp:visited .sl-bfsi-contact__whatsapp-label{color:#fff!important}
.sl-bfsi-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25}
.sl-bfsi-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-bfsi-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,.9fr);gap:50px;align-items:center}.sl-bfsi-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-bfsi-contact__details{gap:10px}.sl-bfsi-contact__email,.sl-bfsi-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center;width:100%}.sl-bfsi-contact__email-value{font-size:14px}.sl-bfsi-page .sl-h2{font-size:28px}}
