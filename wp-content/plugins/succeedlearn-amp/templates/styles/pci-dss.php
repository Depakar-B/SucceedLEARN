<?php
/**
 * PCI DSS Awareness Training — AMP page styles (layout / spacing only).
 *
 * Ported from theme assets/css/pci-dss/.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-pci-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px}
@media(min-width:900px){.sl-pci-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-pci-page{--sl-fs-h2:48px}}
.sl-pci-page .sl-h2{margin:8px 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-pci-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-pci-page .sl-h2 > span,.sl-pci-page .sl-pci-hero h1 > span{color:var(--sl-page-primary,#1472ba)}
.sl-pci-page .sl-lead{margin:0 0 18px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-pci-page .sl-btn--secondary{background:var(--sl-page-navy)}
.sl-pci-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-pci-page .sl-panel-title{margin:0 0 12px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}

/* Alternating white / grey (match desktop). */
.sl-pci-hero,.sl-pci-learn,.sl-pci-strengthen,.sl-pci-topics,.sl-pci-audience,.sl-pci-faq{background:var(--sl-page-white)}
.sl-pci-why,.sl-pci-laws,.sl-pci-structure,.sl-pci-screenshots,.sl-pci-choose,.sl-pci-contact{background:var(--sl-page-bg)}

/* Shared section padding. */
.sl-pci-why,.sl-pci-learn,.sl-pci-laws,.sl-pci-strengthen,.sl-pci-structure,.sl-pci-topics,.sl-pci-screenshots,.sl-pci-audience,.sl-pci-choose,.sl-pci-faq,.sl-pci-contact{padding:48px 16px}
.sl-pci-page .sl-pci-learn__subtitle,.sl-pci-page .sl-pci-screenshots__subtitle,.sl-pci-page .sl-pci-audience__subtitle{margin:12px 0 14px;font-size:20px;font-weight:600;line-height:1.4;letter-spacing:0;text-transform:none;color:var(--sl-page-primary)}

/* Hero */
.sl-pci-hero{padding:16px 16px 40px;background:radial-gradient(circle at 90% 20%,rgba(37,99,235,.12),transparent 34%),var(--sl-page-white)}
.sl-pci-hero__top{width:100%;margin-bottom:20px}
.sl-pci-hero__eyebrow{display:inline-flex;align-items:center;margin-bottom:14px}
.sl-pci-page .sl-pci-hero h1{margin:0 0 16px;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;width:100%;max-width:none}
.sl-pci-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:center}
.sl-pci-hero__content{min-width:0}
.sl-pci-page .sl-pci-hero h2.sl-hero-h2,.sl-pci-page .sl-pci-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600;max-width:680px}
.sl-pci-hero__description{max-width:680px;margin:0 0 14px}
.sl-pci-hero__meta{display:flex;flex-wrap:wrap;gap:12px 20px;margin-top:18px}
.sl-pci-hero__meta-item{display:inline-flex;flex-wrap:wrap;gap:6px;padding:10px 14px;border:1px solid rgba(22,35,78,.12);border-radius:10px;background:var(--sl-page-bg);color:var(--sl-page-navy);font-size:14px;line-height:1.4}
.sl-pci-hero__actions{display:flex;flex-direction:column;flex-wrap:wrap;gap:12px;margin-top:20px;justify-content:flex-start;align-items:flex-start}
.sl-pci-hero__actions .sl-hero-btn{width:fit-content;max-width:100%;flex:0 0 auto}
.sl-pci-hero__media{min-width:0;width:100%;max-width:420px;margin:0 auto}
.sl-pci-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:18px}
.sl-pci-hero__image amp-img{display:block;width:100%}
.sl-pci-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-pci-hero{padding:24px 16px 56px}.sl-pci-hero__top{margin-bottom:28px}.sl-pci-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:40px}.sl-pci-hero__actions{flex-direction:row;justify-content:flex-start;align-items:center}.sl-pci-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}.sl-pci-hero__media{max-width:none;margin:0}.sl-pci-hero__image{border-radius:24px}}

/* Why */
.sl-pci-why__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:start}
.sl-pci-why__content{min-width:0;width:100%;margin:0 0 8px}
.sl-pci-page .sl-pci-why__content h2{margin-bottom:18px}
.sl-pci-why__copy{display:flex;flex-direction:column;gap:14px}
.sl-pci-page .sl-pci-why__copy p{margin:0}
.sl-pci-why__media{min-width:0;width:100%;max-width:420px;margin:0 auto}
.sl-pci-why__image{overflow:hidden;width:100%;line-height:0;border-radius:12px;background:var(--sl-page-white)}
.sl-pci-why__image amp-img{display:block;width:100%}
@media(min-width:768px){.sl-pci-why__content{margin:0 0 12px}.sl-pci-why__media{max-width:320px}.sl-pci-why__image{border-radius:16px}}
@media(min-width:1000px){.sl-pci-why__media{max-width:400px}}

/* Learn */
.sl-pci-learn__intro{margin-bottom:28px}
.sl-pci-learn__intro h2{margin-bottom:16px}
.sl-pci-learn__intro p{max-width:900px;margin:0}
.sl-pci-learn__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-pci-learn__card{display:flex;flex-direction:column;min-width:0;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-pci-learn__card .sl-panel-title{margin:0 0 10px}
.sl-pci-page .sl-pci-learn__tagline{margin:0 0 14px;font-weight:600;color:var(--sl-page-navy)}
.sl-pci-learn__card p{margin:0 0 12px}
.sl-pci-learn__list{margin:0 0 16px;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy)}
.sl-pci-learn__list li{margin:0 0 6px;padding-left:.15em;font-size:15px;line-height:1.55;list-style:disc}
.sl-pci-learn__list li:last-child{margin-bottom:0}
.sl-pci-page .sl-pci-learn__meta{margin:0 0 6px;font-size:14px}
.sl-pci-page .sl-pci-learn__meta:last-child{margin-bottom:0}
@media(min-width:700px){.sl-pci-learn__intro{margin-bottom:36px}.sl-pci-learn__card{padding:28px 24px}}
@media(min-width:992px){.sl-pci-learn__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}}

/* Laws comparison table */
.sl-pci-laws__intro{margin:0 0 28px}
.sl-pci-laws__intro h2{margin:0}
.sl-pci-laws__table-wrap{width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-pci-laws__table{width:100%;min-width:720px;border-collapse:separate;border-spacing:0;table-layout:fixed}
.sl-pci-laws__table th,.sl-pci-laws__table td{padding:14px 16px;vertical-align:middle;text-align:left}
.sl-pci-laws__table thead th{background:var(--sl-page-navy);color:var(--sl-page-white);font-size:14px;font-weight:700;line-height:1.35}
.sl-pci-laws__table thead th:first-child{width:42%;border-radius:13px 0 0 0;border-right:1px solid rgba(255,255,255,.14)}
.sl-pci-laws__table thead th:nth-child(2){border-right:1px solid rgba(255,255,255,.14);background:var(--sl-page-primary)}
.sl-pci-laws__table thead th:last-child{border-radius:0 13px 0 0;background:var(--sl-page-primary)}
.sl-pci-laws__table tbody td{border-bottom:1px solid rgba(107,124,147,.14)}
.sl-pci-laws__table tbody td:first-child{background:rgba(245,243,239,.55);border-right:1px solid rgba(107,124,147,.14)}
.sl-pci-laws__table tbody td:nth-child(2),.sl-pci-laws__table tbody td:nth-child(3){text-align:center;border-right:1px solid rgba(107,124,147,.14)}
.sl-pci-laws__table tbody td:last-child{border-right:0}
.sl-pci-laws__table tbody tr:last-child td{border-bottom:0}
.sl-pci-laws__cell{display:block;color:var(--sl-page-text);font-size:14px;font-weight:500;line-height:1.55}
.sl-pci-laws__cell--highlight{color:var(--sl-page-navy);font-weight:700;text-align:left}
.sl-pci-laws__mark{font-size:18px;font-weight:700;color:var(--sl-page-muted)}
.sl-pci-laws__mark.is-yes{color:var(--sl-page-primary)}
@media(min-width:768px){.sl-pci-laws__intro{margin-bottom:36px}.sl-pci-laws__table-wrap{border-radius:16px}.sl-pci-laws__table th,.sl-pci-laws__table td{padding:18px 22px}.sl-pci-laws__table thead th{font-size:15px}.sl-pci-laws__table thead th:first-child{border-radius:15px 0 0 0}.sl-pci-laws__table thead th:last-child{border-radius:0 15px 0 0}.sl-pci-laws__cell{font-size:15px}}

/* Strengthen */
.sl-pci-strengthen__inner{max-width:860px}
.sl-pci-strengthen__inner h2{margin-bottom:18px}
.sl-pci-strengthen__copy{display:flex;flex-direction:column;gap:14px}
.sl-pci-page .sl-pci-strengthen__copy p{margin:0}

/* Structure */
.sl-pci-structure__heading{margin-bottom:20px}
.sl-pci-structure__heading h2{margin:0}
.sl-pci-page .sl-pci-structure__subhead{margin:0 0 20px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-pci-structure__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-pci-structure__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-pci-structure__card h3{margin:0 0 12px;color:var(--sl-page-primary);font-size:18px;font-weight:600;line-height:1.3}
.sl-pci-page .sl-pci-structure__card p{margin:0;color:var(--sl-page-text)}
.sl-pci-structure__details{display:flex;flex-direction:column;gap:18px;margin-top:28px}
.sl-pci-structure__detail h3{margin:0 0 8px;color:var(--sl-page-navy);font-size:20px;font-weight:700;line-height:1.35}
.sl-pci-page .sl-pci-structure__detail p{max-width:900px;margin:0;color:var(--sl-page-text)}
@media(min-width:768px){.sl-pci-page .sl-pci-structure__grid{display:grid!important;grid-template-columns:minmax(0,1fr) minmax(0,1fr)!important;gap:20px!important}.sl-pci-page .sl-pci-structure__card{grid-column:auto!important;width:100%;max-width:none;justify-self:stretch;padding:26px 24px}.sl-pci-page .sl-pci-structure__grid>:last-child:nth-child(odd){grid-column:1/-1!important;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}.sl-pci-structure__details{gap:22px;margin-top:36px}}
@media(min-width:1000px){.sl-pci-page .sl-pci-structure__grid{grid-template-columns:repeat(6,minmax(0,1fr))!important;gap:24px!important}.sl-pci-page .sl-pci-structure__card{grid-column:span 2!important;max-width:none;justify-self:stretch;padding:30px}.sl-pci-page .sl-pci-structure__grid>:last-child:nth-child(odd){grid-column:4/6!important;justify-self:stretch;max-width:none}.sl-pci-page .sl-pci-structure__card:nth-child(4){grid-column:2/4!important}.sl-pci-page .sl-pci-structure__card:nth-child(5){grid-column:4/6!important}}

/* Topics tables */
.sl-pci-topics__intro{margin:0 0 28px}
.sl-pci-topics__intro h2{margin:0}
.sl-pci-topics__blocks{display:flex;flex-direction:column;gap:28px}
.sl-pci-topics__block .sl-panel-title{margin:0 0 16px}
.sl-pci-topics__table-wrap{width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white);box-shadow:0 10px 30px rgba(22,35,78,.06)}
.sl-pci-topics__table{width:100%;min-width:560px;border-collapse:separate;border-spacing:0;table-layout:fixed}
.sl-pci-topics__table th,.sl-pci-topics__table td{padding:14px 16px;vertical-align:top;text-align:left}
.sl-pci-topics__table thead th{background:var(--sl-page-navy);color:var(--sl-page-white);font-size:14px;font-weight:700;line-height:1.35}
.sl-pci-topics__table thead th:first-child{width:38%;border-radius:13px 0 0 0;border-right:1px solid rgba(255,255,255,.14)}
.sl-pci-topics__table thead th:last-child{border-radius:0 13px 0 0;background:var(--sl-page-primary)}
.sl-pci-topics__table tbody td{border-bottom:1px solid rgba(107,124,147,.14)}
.sl-pci-topics__table tbody td:first-child{background:rgba(245,243,239,.55);border-right:1px solid rgba(107,124,147,.14)}
.sl-pci-topics__table tbody tr:last-child td{border-bottom:0}
.sl-pci-topics__cell{display:block;color:var(--sl-page-text);font-size:14px;line-height:1.5}
.sl-pci-topics__cell--title{color:var(--sl-page-navy);font-weight:700}
@media(min-width:768px){.sl-pci-topics__intro{margin-bottom:36px}.sl-pci-topics__blocks{gap:36px}.sl-pci-topics__table-wrap{border-radius:16px}.sl-pci-topics__table th,.sl-pci-topics__table td{padding:16px 22px}.sl-pci-topics__table thead th{font-size:15px}.sl-pci-topics__table thead th:first-child{border-radius:15px 0 0 0}.sl-pci-topics__table thead th:last-child{border-radius:0 15px 0 0}.sl-pci-topics__cell{font-size:15px}}

/* Screenshots tabs + carousel */
.sl-pci-screenshots__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:32px;align-items:center}
.sl-pci-screenshots__content{min-width:0}
.sl-pci-screenshots__content h2{margin-bottom:0}
.sl-pci-screenshots__copy{display:flex;flex-direction:column;gap:14px}
.sl-pci-page .sl-pci-screenshots__copy p{margin:0}
.sl-pci-screenshots__tabs{display:flex;flex-wrap:wrap;gap:12px;margin-top:24px}
.sl-pci-screenshots__tab{display:inline-flex;align-items:center;justify-content:center;min-height:44px;padding:10px 18px;border:1px solid rgba(22,35,78,.16);border-radius:999px;background:var(--sl-page-white);color:var(--sl-page-navy);font-weight:600;cursor:pointer}
.sl-pci-screenshots__tab.is-active,.sl-pci-screenshots__tab[class*="is-active"]{border-color:var(--sl-page-primary);background:var(--sl-page-primary);color:#fff}
.sl-pci-screenshots__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-pci-screenshots__panel[hidden]{display:none!important}
.sl-pci-screenshots__viewport{overflow:hidden;width:100%;border-radius:18px;background:var(--sl-page-white);border:1px solid rgba(22,35,78,.10)}
.sl-pci-screenshots__carousel{width:100%}
.sl-pci-screenshots__slide{width:100%;line-height:0}
.sl-pci-screenshots__slide amp-img{display:block;width:100%}
.sl-pci-screenshots__slide amp-img img{object-fit:cover;object-position:center}
.sl-pci-screenshots__controls{display:flex;align-items:center;justify-content:center;gap:16px;margin-top:16px}
.sl-pci-screenshots__btn{display:inline-flex;align-items:center;justify-content:center;width:42px;height:42px;padding:0;border:1px solid rgba(22,35,78,.14);border-radius:50%;background:#fff;color:var(--sl-page-navy);font-size:18px;line-height:1;cursor:pointer}
.sl-pci-screenshots__btn:hover,.sl-pci-screenshots__btn:focus{background:var(--sl-page-primary);border-color:var(--sl-page-primary);color:#fff}
.sl-pci-screenshots__counter{min-width:42px;text-align:center;color:var(--sl-page-navy);font-size:14px;font-weight:600}
@media(min-width:768px){.sl-pci-screenshots__viewport{border-radius:24px}.sl-pci-screenshots__controls{margin-top:20px}}
@media(min-width:1000px){.sl-pci-screenshots__grid{grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:60px}.sl-pci-screenshots__media{max-width:none;margin:0}}

/* Audience */
.sl-pci-audience__intro{margin-bottom:28px}
.sl-pci-audience__intro h2{margin-bottom:16px}
.sl-pci-audience__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;align-items:stretch}
.sl-pci-audience__card{min-width:0;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-bg);box-sizing:border-box}
.sl-pci-audience__card .sl-panel-title{margin:0 0 12px}
.sl-pci-audience__card p{margin:0 0 14px}
.sl-pci-audience__list{margin:0;padding:0 0 0 1.35em;list-style:disc;color:var(--sl-page-navy)}
.sl-pci-audience__list li{margin:0 0 6px;padding-left:.15em;font-size:15px;line-height:1.55;list-style:disc}
.sl-pci-audience__list li:last-child{margin-bottom:0}
@media(min-width:700px){.sl-pci-audience__intro{margin-bottom:36px}.sl-pci-audience__card{padding:28px 24px}}
@media(min-width:992px){.sl-pci-audience__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}}

/* Choose */
.sl-pci-choose__intro{margin-bottom:28px}
.sl-pci-choose__intro h2{margin:0}
.sl-pci-choose__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px}
.sl-pci-choose__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-pci-choose__card .sl-panel-title{margin:0 0 14px;color:var(--sl-page-primary);font-size:18px;font-weight:600}
.sl-pci-page .sl-pci-choose__card p{margin:0;color:var(--sl-page-text)}
@media(min-width:700px){.sl-pci-choose__intro{margin-bottom:36px}.sl-pci-choose__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px}.sl-pci-choose__card{padding:28px 24px}}
@media(min-width:1200px){.sl-pci-choose__grid{grid-template-columns:repeat(3,minmax(0,1fr))}}

/* FAQ */
.sl-pci-faq__heading{margin-bottom:8px}
.sl-pci-faq__heading .sl-lead{max-width:none;margin:0 0 8px}
.sl-pci-faq .sl-amp-faq{margin-top:20px}
.sl-pci-faq__cta{margin-top:20px}
.sl-pci-faq__cta .sl-btn{width:auto;max-width:100%}
@media(max-width:767px){.sl-pci-faq__cta .sl-btn{width:100%}}

/* Contact */
.sl-pci-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-pci-contact__heading{max-width:760px;margin-bottom:20px}
.sl-pci-contact__body{max-width:720px;margin-bottom:24px}
.sl-pci-page .sl-pci-contact__body p{margin:0 0 12px;font-size:16px;line-height:1.7;color:var(--sl-page-text)}
.sl-pci-page .sl-pci-contact__body p:last-child{margin-bottom:0}
.sl-pci-contact__details{display:flex;flex-wrap:wrap;align-items:stretch;gap:12px;max-width:100%}
.sl-pci-contact__email{display:inline-flex;flex-direction:column;justify-content:center;gap:2px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.28);border-radius:12px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-pci-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-pci-contact__email-value{color:var(--sl-page-navy);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-pci-contact__whatsapp{display:inline-flex;align-items:center;gap:12px;width:auto;max-width:100%;min-height:56px;padding:10px 18px;border:1px solid #25d366;border-radius:12px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-pci-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff!important}
.sl-pci-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-pci-contact__whatsapp-text{display:flex;flex-direction:column;justify-content:center;gap:2px;min-width:0;color:#fff!important}
.sl-pci-contact__whatsapp-label,.sl-pci-contact__whatsapp:visited,.sl-pci-contact__whatsapp:visited .sl-pci-contact__whatsapp-label{color:#fff!important}
.sl-pci-contact__whatsapp-label{font-size:16px;font-weight:700;line-height:1.25}
.sl-pci-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:900px){.sl-pci-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,.9fr);gap:50px;align-items:center}.sl-pci-page .sl-contact-form-card{padding:32px;border-radius:24px}}
@media(max-width:767px){.sl-pci-contact__details{gap:10px}.sl-pci-contact__email,.sl-pci-contact__whatsapp{flex:1 1 auto;min-width:0;justify-content:center;width:100%}.sl-pci-contact__email-value{font-size:14px}.sl-pci-page .sl-h2{font-size:28px}}
