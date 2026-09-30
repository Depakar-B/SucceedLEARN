<?php
/**
 * SOC 2 Security Awareness — AMP page styles (layout / spacing only).
 *
 * Ported from theme assets/css/information-security-awareness-training-for-soc-2-compliance/.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-soc2-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-soc2-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-soc2-page{--sl-fs-h2:48px}}
.sl-soc2-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-soc2-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-soc2-page h2:not(.sl-soc2-hero__subheading) > span,
.sl-soc2-page .sl-h2 > span,
.sl-soc2-page .sl-soc2-hero h1 > span{color:var(--sl-page-primary,#1472ba)}
.sl-soc2-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-soc2-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-soc2-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Alternating white / grey (match desktop). */
.sl-soc2-hero,.sl-soc2-modules,.sl-soc2-relate,.sl-soc2-designed,.sl-soc2-choose,.sl-soc2-faq{background:var(--sl-page-white)}
.sl-soc2-learn,.sl-soc2-emerging,.sl-soc2-objectives,.sl-soc2-action,.sl-soc2-audience,.sl-soc2-contact{background:var(--sl-page-bg)}

/* Shared section padding + type. */
.sl-soc2-learn,.sl-soc2-modules,.sl-soc2-emerging,.sl-soc2-relate,.sl-soc2-objectives,.sl-soc2-designed,.sl-soc2-action,.sl-soc2-choose,.sl-soc2-audience,.sl-soc2-faq,.sl-soc2-contact{padding:48px 16px}
.sl-soc2-page .sl-soc2-learn h2,.sl-soc2-page .sl-soc2-modules h2,.sl-soc2-page .sl-soc2-emerging h2,.sl-soc2-page .sl-soc2-relate h2,.sl-soc2-page .sl-soc2-objectives h2,.sl-soc2-page .sl-soc2-designed h2,.sl-soc2-page .sl-soc2-action h2,.sl-soc2-page .sl-soc2-choose h2,.sl-soc2-page .sl-soc2-audience h2,.sl-soc2-page .sl-soc2-faq h2,.sl-soc2-page .sl-soc2-contact h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy)}
.sl-soc2-page .sl-soc2-learn h2 > span,.sl-soc2-page .sl-soc2-modules h2 > span,.sl-soc2-page .sl-soc2-emerging h2 > span,.sl-soc2-page .sl-soc2-relate h2 > span,.sl-soc2-page .sl-soc2-objectives h2 > span,.sl-soc2-page .sl-soc2-designed h2 > span,.sl-soc2-page .sl-soc2-action h2 > span,.sl-soc2-page .sl-soc2-choose h2 > span,.sl-soc2-page .sl-soc2-audience h2 > span,.sl-soc2-page .sl-soc2-faq h2 > span,.sl-soc2-page .sl-soc2-contact h2 > span{color:var(--sl-page-primary)}
.sl-soc2-page .sl-soc2-modules__subtitle,.sl-soc2-page .sl-soc2-action__subtitle{margin:12px 0 14px;font-size:20px;font-weight:600;line-height:1.4;letter-spacing:0;text-transform:none;color:var(--sl-page-primary)}

/* Hero */
.sl-soc2-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(37,99,235,.12),transparent 34%),var(--sl-page-white)}
.sl-soc2-hero__top{width:100%;margin-bottom:24px}
.sl-soc2-hero__eyebrow{display:inline-flex;align-items:center;margin-bottom:14px}
.sl-soc2-page .sl-soc2-hero h1{margin:0;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-soc2-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-soc2-hero__content{min-width:0}
.sl-soc2-page .sl-soc2-hero h2.sl-hero-h2,.sl-soc2-page .sl-soc2-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600;max-width:680px}
.sl-soc2-hero__description{max-width:680px;margin:0 0 14px}
.sl-soc2-hero__actions{display:flex;flex-direction:column;flex-wrap:wrap;gap:12px;margin-top:20px}
.sl-soc2-hero__actions .sl-hero-btn{width:100%}
.sl-soc2-hero__visual{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-soc2-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:18px}
.sl-soc2-hero__image amp-img{display:block;width:100%}
.sl-soc2-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-soc2-hero{padding:24px 16px 56px}.sl-soc2-hero__top{margin-bottom:32px}.sl-soc2-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:36px}.sl-soc2-hero__actions{flex-direction:row}.sl-soc2-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-soc2-hero__visual{max-width:none;margin:0}.sl-soc2-hero__image{border-radius:24px}}
@media(min-width:1000px){.sl-soc2-hero__grid{grid-template-columns:minmax(0,.6fr) minmax(0,.4fr);gap:40px}}

/* Learn */
.sl-soc2-learn__intro{margin-bottom:24px}
.sl-soc2-learn__intro p{max-width:760px;margin:0}
.sl-soc2-learn__list{margin:0;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy);font-size:16px;font-weight:500;line-height:1.55}
.sl-soc2-learn__list li{margin:0;list-style:disc}
.sl-soc2-learn__list li + li{margin-top:10px}
.sl-soc2-page .sl-soc2-learn__note{margin:24px 0 0;color:var(--sl-page-navy)}

/* Modules */
.sl-soc2-modules__heading{margin:0 0 28px}
.sl-soc2-modules__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-soc2-modules__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-soc2-modules__content{display:flex;flex:1;flex-direction:column}
.sl-soc2-modules__content .sl-panel-title{margin:0 0 8px;color:var(--sl-page-navy)}
.sl-soc2-page .sl-soc2-modules__tagline{margin:0 0 12px;color:var(--sl-page-primary);font-size:16px;font-weight:600;line-height:1.4}
.sl-soc2-page .sl-soc2-modules__text{margin:0 0 14px;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
.sl-soc2-page .sl-soc2-modules__topics{margin:auto 0 18px;padding-top:12px;border-top:1px solid rgba(107,124,147,.14);color:var(--sl-page-navy);font-size:14px;line-height:1.55}
.sl-soc2-modules__topics strong{display:block;margin-bottom:4px;color:var(--sl-page-primary);font-weight:700}
.sl-soc2-modules__link{display:inline-flex;align-items:center;align-self:flex-start;margin:0;padding:0;border:0;background:transparent;color:var(--sl-page-primary);font:inherit;font-size:15px;font-weight:700;line-height:1.4;text-align:left;cursor:pointer}
.sl-soc2-modules__link:hover,.sl-soc2-modules__link:focus{color:var(--sl-page-navy);text-decoration:underline}
@media(min-width:700px){.sl-soc2-modules__heading{margin-bottom:36px}.sl-soc2-modules__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-soc2-modules__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-soc2-modules__card{padding:28px 24px}}
@media(min-width:1000px){.sl-soc2-modules__grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-soc2-modules__grid>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}

/* Emerging */
.sl-soc2-emerging__heading{margin:0 0 20px}
.sl-soc2-emerging__body{max-width:820px}
.sl-soc2-page .sl-soc2-emerging__label{margin:0 0 8px;color:var(--sl-page-primary);font-size:14px;font-weight:700}
.sl-soc2-emerging__body .sl-panel-title{margin:0 0 14px;color:var(--sl-page-navy)}
.sl-soc2-page .sl-soc2-emerging__body > p{margin:0 0 14px;color:var(--sl-page-text)}
.sl-soc2-emerging__body .sl-content-btn{margin-top:8px}

/* Relate */
.sl-soc2-relate__panel{max-width:960px;padding:28px 20px;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-bg);box-shadow:0 10px 30px rgba(22,35,78,.05);box-sizing:border-box}
.sl-soc2-page .sl-soc2-relate__panel h2{margin:0 0 20px}
.sl-soc2-page .sl-soc2-relate__panel p{max-width:860px;margin:0 0 16px}
.sl-soc2-page .sl-soc2-relate__panel p:last-child{margin-bottom:0}
@media(min-width:768px){.sl-soc2-relate__panel{padding:40px 36px;border-radius:18px}}

/* Objectives table (same layout on mobile; scroll sideways) */
.sl-soc2-objectives__heading{margin:0 0 28px}
.sl-soc2-objectives__caption{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
.sl-soc2-objectives__table-wrap{width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-soc2-objectives__table{width:100%;min-width:640px;border-collapse:separate;border-spacing:0;table-layout:fixed}
.sl-soc2-objectives__table th,.sl-soc2-objectives__table td{padding:14px 16px;vertical-align:top;text-align:left}
.sl-soc2-objectives__table thead th{background:var(--sl-page-navy);color:var(--sl-page-white);font-size:13px;font-weight:700;line-height:1.35;letter-spacing:.01em}
.sl-soc2-objectives__table thead th:first-child{width:120px;border-radius:13px 0 0 0}
.sl-soc2-objectives__table thead th:nth-child(2){width:190px;border-left:1px solid rgba(255,255,255,.14);border-right:1px solid rgba(255,255,255,.14);background:#1c2d63}
.sl-soc2-objectives__table thead th:last-child{border-radius:0 13px 0 0;background:var(--sl-page-primary)}
.sl-soc2-objectives__table tbody td{border-bottom:1px solid rgba(107,124,147,.14)}
.sl-soc2-objectives__table tbody td:first-child{background:rgba(245,243,239,.55);border-right:1px solid rgba(107,124,147,.14)}
.sl-soc2-objectives__table tbody td:nth-child(2){border-right:1px solid rgba(107,124,147,.14)}
.sl-soc2-objectives__table tbody tr:last-child td{border-bottom:0}
.sl-soc2-objectives__cell{display:block;color:var(--sl-page-text);font-size:14px;font-weight:500;line-height:1.55;text-align:left}
.sl-soc2-objectives__cell--strong{color:var(--sl-page-navy);font-weight:700}
@media(min-width:768px){.sl-soc2-objectives__heading{margin-bottom:36px}.sl-soc2-objectives__table-wrap{border-radius:16px}.sl-soc2-objectives__table{min-width:720px}.sl-soc2-objectives__table th,.sl-soc2-objectives__table td{padding:18px 22px}.sl-soc2-objectives__table thead th{font-size:15px}.sl-soc2-objectives__table thead th:first-child{width:28%;border-radius:15px 0 0 0}.sl-soc2-objectives__table thead th:nth-child(2){width:28%}.sl-soc2-objectives__table thead th:last-child{width:44%;border-radius:0 15px 0 0}.sl-soc2-objectives__cell{font-size:15px}}

/* Designed */
.sl-soc2-designed__heading{margin-bottom:20px}
.sl-soc2-page .sl-soc2-designed__subhead{margin:0 0 20px;font-size:20px;font-weight:700;line-height:1.35;color:var(--sl-page-navy)}
.sl-soc2-designed__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-soc2-designed__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-soc2-designed__card h3{margin:0 0 12px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.3}
.sl-soc2-page .sl-soc2-designed__card p{margin:0;color:var(--sl-page-text)}
.sl-soc2-designed__details{display:flex;flex-direction:column;gap:18px;margin-top:28px}
.sl-soc2-designed__detail h3{margin:0 0 8px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-soc2-page .sl-soc2-designed__detail p{max-width:900px;margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-soc2-designed__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-soc2-designed__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-soc2-designed__card{padding:26px 24px}.sl-soc2-designed__details{gap:22px;margin-top:36px}}
@media(min-width:1000px){.sl-soc2-designed__grid{display:grid;grid-template-columns:repeat(6,minmax(0,1fr));gap:24px}.sl-soc2-designed__card{grid-column:span 2;max-width:none;justify-self:stretch}.sl-soc2-designed__grid>:last-child:nth-child(odd){grid-column:4/6;justify-self:stretch;max-width:none}.sl-soc2-designed__card:nth-child(4){grid-column:2/4}.sl-soc2-designed__card:nth-child(5){grid-column:4/6}.sl-soc2-designed__card{padding:30px}}

/* Action (carousel) */
.sl-soc2-action__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:32px;align-items:center}
.sl-soc2-action__content{min-width:0}
.sl-soc2-page .sl-soc2-action__lead{margin:0 0 16px}
.sl-soc2-action__content p{margin:0 0 16px}
.sl-soc2-action__content .sl-content-btn{margin-top:8px}
.sl-soc2-action__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-soc2-action__viewport{overflow:hidden;width:100%;border-radius:18px;background:var(--sl-page-bg)}
.sl-soc2-action__carousel{width:100%}
.sl-soc2-action__slide{width:100%;line-height:0}
.sl-soc2-action__slide amp-img{display:block;width:100%}
.sl-soc2-action__slide amp-img img{object-fit:cover;object-position:center}
.sl-soc2-action__controls{display:flex;align-items:center;justify-content:flex-end;gap:16px;margin-top:16px}
.sl-soc2-action__arrow{display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;padding:0;border:1px solid var(--sl-page-navy);border-radius:50%;background:transparent;color:var(--sl-page-navy);font-size:18px;line-height:1;cursor:pointer}
.sl-soc2-action__arrow:hover,.sl-soc2-action__arrow:focus{background:var(--sl-page-primary);border-color:var(--sl-page-primary);color:#fff}
.sl-soc2-action__counter{min-width:42px;text-align:center;color:var(--sl-page-navy);font-size:14px;font-weight:600}
@media(min-width:768px){.sl-soc2-action__viewport{border-radius:24px}.sl-soc2-action__arrow{width:40px;height:40px}.sl-soc2-action__controls{margin-top:18px;gap:18px}}
@media(min-width:1000px){.sl-soc2-action__grid{grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:60px}.sl-soc2-action__media{max-width:none;margin:0}}

/* Choose */
.sl-soc2-choose__heading{margin-bottom:28px}
.sl-soc2-choose__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-soc2-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-soc2-choose__card h3{margin:0 0 14px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.35}
.sl-soc2-page .sl-soc2-choose__card p{margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-soc2-choose__heading{margin-bottom:36px}.sl-soc2-choose__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-soc2-choose__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-soc2-choose__card{padding:28px 26px}}
@media(min-width:1000px){.sl-soc2-choose__grid{gap:24px}.sl-soc2-choose__grid>:last-child:nth-child(odd){max-width:calc((100% - 24px)/2)}.sl-soc2-choose__card{padding:30px}}

/* Audience */
.sl-soc2-audience__heading{margin-bottom:28px}
.sl-soc2-audience__heading p{max-width:860px;margin:0}
.sl-soc2-audience__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-soc2-audience__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-soc2-audience__card h3{margin:0 0 12px;color:var(--sl-page-navy);font-size:18px;font-weight:700;line-height:1.35}
.sl-soc2-page .sl-soc2-audience__card p{margin:0;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
@media(min-width:700px){.sl-soc2-audience__heading{margin-bottom:36px}.sl-soc2-audience__grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-soc2-audience__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-soc2-audience__card{padding:28px 24px}}
@media(min-width:1000px){.sl-soc2-audience__grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-soc2-audience__grid>:last-child:nth-child(odd){grid-column:2;justify-self:stretch;max-width:none}}

/* FAQ */
.sl-soc2-faq__heading{margin-bottom:8px}
.sl-soc2-faq__heading .sl-lead{max-width:none;margin:0 0 8px}
.sl-soc2-faq .sl-amp-faq{margin-top:20px}
.sl-soc2-faq__cta{margin-top:20px}
.sl-soc2-faq__cta .sl-btn{width:auto;max-width:100%}
@media(max-width:767px){.sl-soc2-faq__cta .sl-btn{width:100%}}

/* Contact */
.sl-soc2-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-soc2-contact__heading{max-width:760px;margin-bottom:20px}
.sl-soc2-page .sl-soc2-contact__lead{margin:0;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-soc2-contact__body{max-width:720px;margin-bottom:24px}
.sl-soc2-page .sl-soc2-contact__body p{margin:0;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-soc2-contact__details{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;max-width:100%}
.sl-soc2-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-soc2-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-soc2-contact__email-value{color:var(--sl-page-navy);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-soc2-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-soc2-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-soc2-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-soc2-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-soc2-contact__whatsapp-label,.sl-soc2-contact__whatsapp:visited,.sl-soc2-contact__whatsapp:visited .sl-soc2-contact__whatsapp-label{color:#fff!important}
.sl-soc2-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25}
.sl-soc2-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-soc2-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,.9fr);gap:50px;align-items:center}.sl-soc2-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-soc2-contact__details{gap:10px}.sl-soc2-contact__email,.sl-soc2-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center;width:100%}.sl-soc2-contact__email-value{font-size:14px}.sl-soc2-page .sl-h2,.sl-soc2-page .sl-soc2-learn h2,.sl-soc2-page .sl-soc2-modules h2,.sl-soc2-page .sl-soc2-emerging h2,.sl-soc2-page .sl-soc2-relate h2,.sl-soc2-page .sl-soc2-objectives h2,.sl-soc2-page .sl-soc2-designed h2,.sl-soc2-page .sl-soc2-action h2,.sl-soc2-page .sl-soc2-choose h2,.sl-soc2-page .sl-soc2-audience h2,.sl-soc2-page .sl-soc2-faq h2,.sl-soc2-page .sl-soc2-contact h2{font-size:28px}}
