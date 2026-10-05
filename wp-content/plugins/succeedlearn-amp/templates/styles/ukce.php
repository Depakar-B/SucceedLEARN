<?php
/**
 * UK Cyber Essentials Security Awareness — AMP page styles (layout / spacing only).
 *
 * Ported from theme assets/css/information-security-awareness-training-for-uk-cyber-essentials/.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-ukce-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-ukce-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-ukce-page{--sl-fs-h2:48px}}
.sl-ukce-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-ukce-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-ukce-page h2:not(.sl-ukce-hero__subheading) > span,
.sl-ukce-page .sl-h2 > span,
.sl-ukce-page .sl-ukce-hero h1 > span{color:var(--sl-page-primary,#1472ba)}
.sl-ukce-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-ukce-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-ukce-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}

/* Alternating white / grey (match desktop). */
.sl-ukce-hero,.sl-ukce-learn,.sl-ukce-supporting,.sl-ukce-requires,.sl-ukce-action,.sl-ukce-audience,.sl-ukce-contact{background:var(--sl-page-white)}
.sl-ukce-why,.sl-ukce-modules,.sl-ukce-controls,.sl-ukce-designed,.sl-ukce-choose,.sl-ukce-faq{background:var(--sl-page-bg)}

/* Shared section padding + type. */
.sl-ukce-why,.sl-ukce-learn,.sl-ukce-modules,.sl-ukce-supporting,.sl-ukce-controls,.sl-ukce-requires,.sl-ukce-designed,.sl-ukce-action,.sl-ukce-choose,.sl-ukce-audience,.sl-ukce-faq,.sl-ukce-contact{padding:48px 16px}
.sl-ukce-page .sl-ukce-why h2,.sl-ukce-page .sl-ukce-learn h2,.sl-ukce-page .sl-ukce-modules h2,.sl-ukce-page .sl-ukce-supporting h2,.sl-ukce-page .sl-ukce-controls h2,.sl-ukce-page .sl-ukce-requires h2,.sl-ukce-page .sl-ukce-designed h2,.sl-ukce-page .sl-ukce-action h2,.sl-ukce-page .sl-ukce-choose h2,.sl-ukce-page .sl-ukce-audience h2,.sl-ukce-page .sl-ukce-faq h2,.sl-ukce-page .sl-ukce-contact h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy)}
.sl-ukce-page .sl-ukce-why h2 > span,.sl-ukce-page .sl-ukce-learn h2 > span,.sl-ukce-page .sl-ukce-modules h2 > span,.sl-ukce-page .sl-ukce-supporting h2 > span,.sl-ukce-page .sl-ukce-controls h2 > span,.sl-ukce-page .sl-ukce-requires h2 > span,.sl-ukce-page .sl-ukce-designed h2 > span,.sl-ukce-page .sl-ukce-action h2 > span,.sl-ukce-page .sl-ukce-choose h2 > span,.sl-ukce-page .sl-ukce-audience h2 > span,.sl-ukce-page .sl-ukce-faq h2 > span,.sl-ukce-page .sl-ukce-contact h2 > span{color:var(--sl-page-primary)}
.sl-ukce-page .sl-ukce-modules__subtitle,.sl-ukce-page .sl-ukce-action__subtitle{margin:12px 0 14px;font-size:20px;font-weight:600;line-height:1.4;letter-spacing:0;text-transform:none;color:var(--sl-page-primary)}

/* Hero */
.sl-ukce-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(37,99,235,.12),transparent 34%),var(--sl-page-white)}
.sl-ukce-hero__top{width:100%;margin-bottom:24px}
.sl-ukce-hero__eyebrow{display:inline-flex;align-items:center;margin-bottom:14px}
.sl-ukce-page .sl-ukce-hero h1{margin:0;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-ukce-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-ukce-hero__content{min-width:0}
.sl-ukce-page .sl-ukce-hero h2.sl-hero-h2,.sl-ukce-page .sl-ukce-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600;max-width:680px}
.sl-ukce-hero__description{max-width:680px;margin:0 0 14px}
.sl-ukce-hero__actions{display:flex;flex-direction:column;flex-wrap:wrap;gap:12px;margin-top:20px}
.sl-ukce-hero__actions .sl-hero-btn{width:100%}
.sl-ukce-hero__visual{min-width:0;width:100%;max-width:360px;margin:0 auto}
.sl-ukce-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:18px}
.sl-ukce-hero__image amp-img{display:block;width:100%}
.sl-ukce-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-ukce-hero{padding:24px 16px 56px}.sl-ukce-hero__top{margin-bottom:32px}.sl-ukce-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:36px}.sl-ukce-hero__actions{flex-direction:row}.sl-ukce-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-ukce-hero__visual{max-width:none;margin:0}.sl-ukce-hero__image{border-radius:24px}}
@media(min-width:1000px){.sl-ukce-hero__grid{grid-template-columns:minmax(0,.6fr) minmax(0,.4fr);gap:40px}}

/* Why */
.sl-ukce-why__intro{margin-bottom:28px}
.sl-ukce-why__intro h2{margin-bottom:16px}
.sl-ukce-why__intro p{max-width:900px;margin:0 0 16px}
.sl-ukce-why__intro p:last-child{margin-bottom:0}
.sl-ukce-why__layout{display:grid;grid-template-columns:minmax(0,1fr);gap:20px;align-items:stretch}
.sl-ukce-why__points{display:grid;grid-template-columns:minmax(0,1fr);gap:10px;align-content:start}
.sl-ukce-why__card{display:flex;align-items:center;min-width:0;padding:16px 18px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-ukce-page .sl-ukce-why__card p{margin:0;color:var(--sl-page-navy);font-size:16px;font-weight:600;line-height:1.4}
.sl-ukce-why__conclusion{margin:0;min-width:0}
.sl-ukce-page .sl-ukce-why__conclusion p{margin:0 0 16px;color:var(--sl-page-text)}
.sl-ukce-page .sl-ukce-why__conclusion p:last-child{margin-bottom:0}
.sl-ukce-why__list{margin:0 0 16px;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy);font-size:15px;line-height:1.6}
.sl-ukce-why__list li{margin:0 0 6px;list-style:disc}
.sl-ukce-why__list li:last-child{margin-bottom:0}
@media(min-width:768px){.sl-ukce-why__intro{margin-bottom:36px}.sl-ukce-why__points{gap:12px}.sl-ukce-why__card{padding:18px 22px}}
@media(min-width:992px){.sl-ukce-why__layout{grid-template-columns:minmax(0,.42fr) minmax(0,.58fr);gap:28px}}

/* Learn */
.sl-ukce-learn__intro{margin-bottom:0}
.sl-ukce-learn__intro h2{margin-bottom:16px}
.sl-ukce-learn__intro p{max-width:none;margin:0 0 16px}
.sl-ukce-page .sl-ukce-learn__lead{margin:0 0 14px;color:var(--sl-page-navy);font-weight:600}
.sl-ukce-learn__list{margin:0 0 8px;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy);font-size:16px;font-weight:500;line-height:1.55}
.sl-ukce-learn__list li{margin:0 0 8px;padding-left:.15em;list-style:disc}
.sl-ukce-learn__list li:last-child{margin-bottom:0}
.sl-ukce-learn__note{margin-top:24px}
.sl-ukce-page .sl-ukce-learn__note p{margin:0;color:var(--sl-page-text)}

/* Modules */
.sl-ukce-modules__heading{margin:0 0 28px}
.sl-ukce-modules__heading h2{margin:0}
.sl-ukce-modules__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-ukce-modules__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-ukce-modules__content{display:flex;flex:1;flex-direction:column}
.sl-ukce-modules__content .sl-panel-title{margin:0 0 8px;color:var(--sl-page-navy)}
.sl-ukce-page .sl-ukce-modules__tagline{margin:0 0 12px;color:var(--sl-page-primary);font-size:16px;font-weight:600;line-height:1.4}
.sl-ukce-page .sl-ukce-modules__lead{margin:0 0 12px;color:var(--sl-page-navy);font-size:15px;font-weight:600;line-height:1.55}
.sl-ukce-page .sl-ukce-modules__text{margin:0 0 14px;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
.sl-ukce-page .sl-ukce-modules__topics{margin:4px 0 14px;padding-top:12px;border-top:1px solid rgba(107,124,147,.14);color:var(--sl-page-navy);font-size:14px;line-height:1.55}
.sl-ukce-modules__topics strong{display:block;margin-bottom:4px;color:var(--sl-page-primary);font-weight:700}
.sl-ukce-page .sl-ukce-modules__note{margin:0 0 18px;color:var(--sl-page-navy);font-size:14px;font-weight:700;line-height:1.55}
.sl-ukce-modules__link{display:inline-flex;align-items:center;align-self:flex-start;margin:auto 0 0;padding:0;border:0;background:transparent;color:var(--sl-page-primary);font:inherit;font-size:15px;font-weight:700;line-height:1.4;text-align:left;cursor:pointer}
.sl-ukce-modules__link:hover,.sl-ukce-modules__link:focus{color:var(--sl-page-navy);text-decoration:underline}
@media(min-width:700px){.sl-ukce-modules__heading{margin-bottom:36px}.sl-ukce-modules__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-ukce-modules__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-ukce-modules__card{padding:28px 24px}}
@media(min-width:1200px){.sl-ukce-modules__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-ukce-modules__grid>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}

/* Supporting */
.sl-ukce-supporting__heading{margin:0 0 28px}
.sl-ukce-supporting__heading h2{margin:0}
.sl-ukce-supporting__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-ukce-supporting__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-ukce-supporting__card h3{margin:0 0 12px;color:var(--sl-page-navy);font-size:18px;font-weight:700;line-height:1.35}
.sl-ukce-page .sl-ukce-supporting__card p{margin:0;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
@media(min-width:700px){.sl-ukce-supporting__heading{margin-bottom:36px}.sl-ukce-supporting__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-ukce-supporting__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 24px)/2)}.sl-ukce-supporting__card{padding:28px 24px}}
@media(min-width:1200px){.sl-ukce-supporting__grid{grid-template-columns:repeat(3,minmax(0,1fr))}.sl-ukce-supporting__grid>:last-child:nth-child(odd){grid-column:2;justify-self:stretch;max-width:none}}

/* Controls table (same layout on mobile; scroll sideways) */
.sl-ukce-controls__heading{margin:0 0 28px}
.sl-ukce-controls__heading h2{margin:0}
.sl-ukce-controls__caption{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
.sl-ukce-controls__table-wrap{width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-ukce-controls__table{width:100%;min-width:640px;border-collapse:separate;border-spacing:0;table-layout:fixed}
.sl-ukce-controls__table th,.sl-ukce-controls__table td{padding:14px 16px;vertical-align:top;text-align:left}
.sl-ukce-controls__table thead th{background:var(--sl-page-navy);color:var(--sl-page-white);font-size:13px;font-weight:700;line-height:1.35;letter-spacing:.01em}
.sl-ukce-controls__table thead th:first-child{width:120px;border-radius:13px 0 0 0}
.sl-ukce-controls__table thead th:nth-child(2){width:190px;border-left:1px solid rgba(255,255,255,.14);border-right:1px solid rgba(255,255,255,.14);background:#1c2d63}
.sl-ukce-controls__table thead th:last-child{border-radius:0 13px 0 0;background:var(--sl-page-primary)}
.sl-ukce-controls__table tbody td{border-bottom:1px solid rgba(107,124,147,.14)}
.sl-ukce-controls__table tbody td:first-child{background:rgba(245,243,239,.55);border-right:1px solid rgba(107,124,147,.14)}
.sl-ukce-controls__table tbody td:nth-child(2){border-right:1px solid rgba(107,124,147,.14)}
.sl-ukce-controls__table tbody tr:last-child td{border-bottom:0}
.sl-ukce-controls__cell{display:block;color:var(--sl-page-text);font-size:14px;font-weight:500;line-height:1.55;text-align:left}
.sl-ukce-controls__cell--strong{color:var(--sl-page-navy);font-weight:700}
.sl-ukce-controls__note{margin-top:24px;padding:0;border:0;background:none}
.sl-ukce-controls__note strong{display:block;margin-bottom:10px;color:var(--sl-page-navy);font-size:16px}
.sl-ukce-page .sl-ukce-controls__note p{margin:0 0 12px;color:var(--sl-page-text)}
.sl-ukce-page .sl-ukce-controls__note p:last-child{margin-bottom:0}
@media(min-width:768px){.sl-ukce-controls__heading{margin-bottom:36px}.sl-ukce-controls__table-wrap{border-radius:16px}.sl-ukce-controls__table{min-width:720px}.sl-ukce-controls__table th,.sl-ukce-controls__table td{padding:18px 22px}.sl-ukce-controls__table thead th{font-size:15px}.sl-ukce-controls__table thead th:first-child{width:28%;border-radius:15px 0 0 0}.sl-ukce-controls__table thead th:nth-child(2){width:28%}.sl-ukce-controls__table thead th:last-child{width:44%;border-radius:0 15px 0 0}.sl-ukce-controls__cell{font-size:15px}.sl-ukce-controls__note{margin-top:30px}}

/* Requires */
.sl-ukce-requires__panel{max-width:960px;margin:0 auto;padding:28px 20px;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-bg);box-shadow:0 10px 30px rgba(22,35,78,.05);box-sizing:border-box;text-align:center}
.sl-ukce-page .sl-ukce-requires__panel h2{margin:0 0 20px}
.sl-ukce-page .sl-ukce-requires__panel p{max-width:860px;margin:0 auto 16px;color:var(--sl-page-text)}
.sl-ukce-page .sl-ukce-requires__panel p:last-child{margin-bottom:0}
.sl-ukce-requires__compare{display:grid;grid-template-columns:minmax(0,1fr);gap:14px;max-width:720px;margin:8px auto 20px;text-align:center}
.sl-ukce-requires__compare-card{padding:22px 20px;border:1px solid rgba(20,114,186,.2);border-radius:14px;background:rgba(20,114,186,.06)}
.sl-ukce-requires__compare-card h3{margin:0 0 10px;color:var(--sl-page-primary);font-size:17px;font-weight:700;line-height:1.35}
.sl-ukce-page .sl-ukce-requires__compare-card p{margin:0;color:var(--sl-page-navy);font-weight:500}
@media(min-width:768px){.sl-ukce-requires__panel{padding:40px 36px;border-radius:18px}.sl-ukce-requires__compare{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}}

/* Designed */
.sl-ukce-designed__heading{margin-bottom:20px}
.sl-ukce-designed__heading h2{margin:0}
.sl-ukce-designed__detail--label{margin:0 0 20px}
.sl-ukce-designed__detail--label h3{margin:0;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-ukce-designed__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-ukce-designed__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-ukce-designed__card h3{margin:0 0 12px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.3}
.sl-ukce-page .sl-ukce-designed__card p{margin:0;color:var(--sl-page-text)}
.sl-ukce-designed__details{display:flex;flex-direction:column;gap:18px;margin-top:28px}
.sl-ukce-designed__detail h3{margin:0 0 8px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-ukce-page .sl-ukce-designed__detail p{max-width:900px;margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-ukce-designed__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-ukce-designed__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-ukce-designed__card{padding:26px 24px}.sl-ukce-designed__details{gap:22px;margin-top:36px}}
@media(min-width:1000px){.sl-ukce-designed__grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:24px}.sl-ukce-designed__card{grid-column:span 2;max-width:none;justify-self:stretch;padding:30px}.sl-ukce-designed__grid>:last-child:nth-child(odd){grid-column:4/6;justify-self:stretch;max-width:none}.sl-ukce-designed__card:nth-child(4){grid-column:2/4}.sl-ukce-designed__card:nth-child(5){grid-column:4/6}}

/* Action (carousel) */
.sl-ukce-action__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:32px;align-items:center}
.sl-ukce-action__content{min-width:0}
.sl-ukce-action__content h2{margin-bottom:0}
.sl-ukce-page .sl-ukce-action__lead{margin:0 0 16px}
.sl-ukce-action__content p{margin:0 0 16px}
.sl-ukce-action__content .sl-content-btn{margin-top:8px}
.sl-ukce-action__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-ukce-action__viewport{overflow:hidden;width:100%;border-radius:18px;background:var(--sl-page-bg)}
.sl-ukce-action__carousel{width:100%}
.sl-ukce-action__slide{width:100%;line-height:0}
.sl-ukce-action__slide amp-img{display:block;width:100%}
.sl-ukce-action__slide amp-img img{object-fit:cover;object-position:center}
.sl-ukce-action__controls{display:flex;align-items:center;justify-content:flex-end;gap:16px;margin-top:16px}
.sl-ukce-action__arrow{display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;padding:0;border:1px solid var(--sl-page-navy);border-radius:50%;background:transparent;color:var(--sl-page-navy);font-size:18px;line-height:1;cursor:pointer}
.sl-ukce-action__arrow:hover,.sl-ukce-action__arrow:focus{background:var(--sl-page-primary);border-color:var(--sl-page-primary);color:#fff}
.sl-ukce-action__counter{min-width:42px;text-align:center;color:var(--sl-page-navy);font-size:14px;font-weight:600}
@media(min-width:768px){.sl-ukce-action__viewport{border-radius:24px}.sl-ukce-action__arrow{width:40px;height:40px}.sl-ukce-action__controls{margin-top:18px;gap:18px}}
@media(min-width:1000px){.sl-ukce-action__grid{grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:60px}.sl-ukce-action__media{max-width:none;margin:0}}

/* Choose */
.sl-ukce-choose__heading{margin-bottom:28px}
.sl-ukce-choose__heading h2{margin:0}
.sl-ukce-choose__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-ukce-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-ukce-choose__card h3{margin:0 0 14px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.35}
.sl-ukce-page .sl-ukce-choose__card p{margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-ukce-choose__heading{margin-bottom:36px}.sl-ukce-choose__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-ukce-choose__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 24px)/2)}.sl-ukce-choose__card{padding:30px}}

/* Audience */
.sl-ukce-audience__heading{margin-bottom:28px}
.sl-ukce-audience__heading h2{margin-bottom:16px}
.sl-ukce-audience__heading p{max-width:860px;margin:0}
.sl-ukce-audience__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-ukce-audience__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-shadow:0 8px 24px rgba(22,35,78,.04);box-sizing:border-box}
.sl-ukce-audience__card h3{margin:0 0 12px;color:var(--sl-page-navy);font-size:18px;font-weight:700;line-height:1.35}
.sl-ukce-page .sl-ukce-audience__card p{margin:0;color:var(--sl-page-muted);font-size:15px;line-height:1.6}
@media(min-width:700px){.sl-ukce-audience__heading{margin-bottom:36px}.sl-ukce-audience__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-ukce-audience__card{padding:28px 24px}}
@media(min-width:1200px){.sl-ukce-audience__grid{grid-template-columns:repeat(3,minmax(0,1fr))}}

/* FAQ */
.sl-ukce-faq__heading{margin-bottom:8px}
.sl-ukce-faq__heading .sl-lead{max-width:none;margin:0 0 8px}
.sl-ukce-faq .sl-amp-faq{margin-top:20px}
.sl-ukce-faq__cta{margin-top:20px}
.sl-ukce-faq__cta .sl-btn{width:auto;max-width:100%}
@media(max-width:767px){.sl-ukce-faq__cta .sl-btn{width:100%}}

/* Contact */
.sl-ukce-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-ukce-contact__heading{max-width:760px;margin-bottom:20px}
.sl-ukce-page .sl-ukce-contact__lead{margin:0;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-ukce-contact__body{max-width:720px;margin-bottom:24px}
.sl-ukce-page .sl-ukce-contact__body p{margin:0 0 12px;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-ukce-page .sl-ukce-contact__body p:last-child{margin-bottom:0}
.sl-ukce-contact__details{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;max-width:100%}
.sl-ukce-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-ukce-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-ukce-contact__email-value{color:var(--sl-page-navy);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-ukce-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-ukce-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-ukce-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-ukce-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-ukce-contact__whatsapp-label,.sl-ukce-contact__whatsapp:visited,.sl-ukce-contact__whatsapp:visited .sl-ukce-contact__whatsapp-label{color:#fff!important}
.sl-ukce-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25}
.sl-ukce-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-ukce-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,.9fr);gap:50px;align-items:center}.sl-ukce-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-ukce-contact__details{gap:10px}.sl-ukce-contact__email,.sl-ukce-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center;width:100%}.sl-ukce-contact__email-value{font-size:14px}.sl-ukce-page .sl-h2,.sl-ukce-page .sl-ukce-why h2,.sl-ukce-page .sl-ukce-learn h2,.sl-ukce-page .sl-ukce-modules h2,.sl-ukce-page .sl-ukce-supporting h2,.sl-ukce-page .sl-ukce-controls h2,.sl-ukce-page .sl-ukce-requires h2,.sl-ukce-page .sl-ukce-designed h2,.sl-ukce-page .sl-ukce-action h2,.sl-ukce-page .sl-ukce-choose h2,.sl-ukce-page .sl-ukce-audience h2,.sl-ukce-page .sl-ukce-faq h2,.sl-ukce-page .sl-ukce-contact h2{font-size:28px}}
