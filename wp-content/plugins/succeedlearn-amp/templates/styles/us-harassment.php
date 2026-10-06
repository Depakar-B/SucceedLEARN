<?php
/**
 * US Sexual Harassment Prevention Training — AMP page styles (layout only).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-us-harassment-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;color:var(--sl-page-text);background:var(--sl-page-white)}
.sl-us-harassment-page h1,.sl-us-harassment-page h2,.sl-us-harassment-page .sl-h2{color:var(--sl-page-navy)}
.sl-us-harassment-page h1>span,.sl-us-harassment-page h2>span,.sl-us-harassment-page .sl-h2 span{color:var(--sl-page-primary,#1472ba)}
.sl-us-harassment-page .sl-home-sub-heading,.sl-us-harassment-page .sl-eyebrow{color:var(--sl-page-primary)}
.sl-us-harassment-page .sl-panel-title{color:var(--sl-page-primary)}
.sl-us-harassment-page p{color:var(--sl-page-text)}

/* Plain bullet lists */
.sl-us-harassment-page .sl-us-harassment-bullets{padding-left:22px;list-style:disc}
.sl-us-harassment-page .sl-us-harassment-bullets li{margin:0 0 8px;padding:0;color:var(--sl-page-text);font-size:16px;line-height:1.7;list-style:disc}
.sl-us-harassment-page .sl-us-harassment-bullets li:last-child{margin-bottom:0}
.sl-us-harassment-page .sl-us-harassment-bullets li::marker{color:var(--sl-page-primary)}

/* Shared image placeholder */
.sl-us-harassment-page [class*="__image-placeholder"]{display:flex;align-items:center;justify-content:center;width:100%;min-height:220px;aspect-ratio:4/3;padding:24px;box-sizing:border-box;border:1px solid rgba(107,124,147,.22);border-radius:16px;background:var(--sl-page-white);color:var(--sl-page-muted);text-align:center}
.sl-us-harassment-page [class*="__image-placeholder"] span{font-size:15px;font-weight:600;line-height:1.4}
.sl-us-harassment-page [class*="__image"]{overflow:hidden;border:1px solid rgba(107,124,147,.22);border-radius:16px;background:var(--sl-page-white)}
.sl-us-harassment-page [class*="__image"] amp-img,
.sl-us-harassment-page [class*="__media"] amp-img{display:block;width:100%}
.sl-us-harassment-page [class*="__image"] amp-img img,
.sl-us-harassment-page [class*="__media"] amp-img img{object-fit:cover;object-position:center}

/* Shared stacked section (text first, image below) */
.sl-us-harassment-coverage__stack,
.sl-us-harassment-requirements__stack,
.sl-us-harassment-learning-paths__path,
.sl-us-harassment-workplace__stack,
.sl-us-harassment-workforce__list-area{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;width:100%}
.sl-us-harassment-coverage__content,
.sl-us-harassment-requirements__content,
.sl-us-harassment-learning-paths__content,
.sl-us-harassment-workplace__content,
.sl-us-harassment-workforce__list{min-width:0}
.sl-us-harassment-coverage__media,
.sl-us-harassment-requirements__media,
.sl-us-harassment-learning-paths__media,
.sl-us-harassment-workplace__media,
.sl-us-harassment-workforce__media{width:100%;min-width:0}

/* Hero (AML-style: title, then wide image, then copy) */
.sl-us-harassment-hero h1{margin:0 0 16px}
.sl-us-harassment-hero__audience{display:block;margin-top:6px;color:var(--sl-page-navy);font-size:.62em;font-weight:600;line-height:1.25}
.sl-us-harassment-hero__media{width:100%;margin:8px 0 22px;min-width:0}
.sl-us-harassment-hero__image{width:100%;max-width:760px;margin:0 auto;overflow:hidden;border:1px solid rgba(22,35,78,.1);border-radius:14px;background:var(--sl-page-white);box-sizing:border-box}
.sl-us-harassment-hero__image amp-img{display:block;width:100%}
.sl-us-harassment-hero__image amp-img img{object-fit:cover;object-position:center}
.sl-us-harassment-hero__tagline{margin:0 0 18px;color:var(--sl-page-navy);font-size:22px;line-height:1.3}
.sl-us-harassment-hero__copy{display:flex;flex-direction:column;gap:12px;margin:0 0 22px}
.sl-us-harassment-hero__copy p{margin:0}
.sl-us-harassment-hero__actions{display:flex;flex-direction:column;align-items:stretch;gap:12px;margin:0}
.sl-us-harassment-page .sl-us-harassment-hero__actions .sl-hero-btn{width:100%;max-width:100%}

/* Coverage */
.sl-us-harassment-coverage__intro{display:flex;flex-direction:column;gap:12px;margin:0 0 24px}
.sl-us-harassment-coverage__intro p{margin:0}
.sl-us-harassment-coverage__checklist{margin:0}
.sl-us-harassment-coverage__list{margin:14px 0 0}

/* Requirements */
.sl-us-harassment-requirements__intro{display:flex;flex-direction:column;gap:12px;margin:0 0 24px}
.sl-us-harassment-requirements__intro p{margin:0}
.sl-us-harassment-requirements__cards{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:100%;margin:0 0 24px}
.sl-us-harassment-requirements__card{display:block;width:100%;min-width:0;margin:0;padding:20px 22px;box-sizing:border-box;border:1px solid rgba(107,124,147,.18);border-top:3px solid var(--sl-page-primary);border-radius:14px;background:var(--sl-page-white)}
.sl-us-harassment-requirements__card-content{display:flex;flex-direction:column;min-width:0;width:100%}
.sl-us-harassment-requirements__card .sl-panel-title{margin:0 0 10px}
.sl-us-harassment-requirements__card p{margin:0;color:var(--sl-page-text)}
.sl-us-harassment-requirements__closing{margin:0}
.sl-us-harassment-requirements__closing p{margin:0;color:var(--sl-page-muted)}

/* Learning paths */
.sl-us-harassment-learning-paths__heading{margin:0 0 32px}
.sl-us-harassment-learning-paths__path{margin:0 0 40px}
.sl-us-harassment-learning-paths__path-label{display:inline-flex;align-items:center;margin:0 0 10px;color:var(--sl-page-primary);font-size:13px;font-weight:700;line-height:1.3;letter-spacing:.04em;text-transform:uppercase}
.sl-us-harassment-learning-paths__content .sl-panel-title{margin:0 0 14px}
.sl-us-harassment-learning-paths__lead{margin:0 0 18px}
.sl-us-harassment-learning-paths__list{margin:0 0 18px}
.sl-us-harassment-learning-paths__best-suited{margin:0}
.sl-us-harassment-learning-paths__decision{max-width:920px;margin:8px auto 0;padding:22px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-us-harassment-learning-paths__decision-heading{margin:0 0 18px;text-align:center}
.sl-us-harassment-learning-paths__decision-heading .sl-us-harassment-learning-paths__path-label{justify-content:center}
.sl-us-harassment-learning-paths__table-wrap{display:block;width:100%;max-width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain}
.sl-us-harassment-learning-paths__table{width:100%;min-width:600px;border-collapse:separate;border-spacing:0;background:var(--sl-page-white)}
.sl-us-harassment-learning-paths__table th,
.sl-us-harassment-learning-paths__table td{padding:14px 16px;border-bottom:1px solid rgba(107,124,147,.16);text-align:left;vertical-align:top;color:var(--sl-page-text)}
.sl-us-harassment-learning-paths__table thead th{background:rgba(20,114,186,.08);color:var(--sl-page-navy);font-weight:700}
.sl-us-harassment-learning-paths__table tbody th{width:120px;min-width:110px;max-width:140px;color:var(--sl-page-navy);font-weight:700;background:rgba(245,245,245,.7)}
.sl-us-harassment-learning-paths__table tr:last-child th,
.sl-us-harassment-learning-paths__table tr:last-child td{border-bottom:0}

/* Workplace */
.sl-us-harassment-workplace__intro{display:flex;flex-direction:column;gap:12px;margin:0 0 20px}
.sl-us-harassment-workplace__intro p{margin:0}
.sl-us-harassment-page .sl-us-harassment-workplace__list-title{margin:0 0 12px}
.sl-us-harassment-workplace__list{margin:0}

/* Workforce */
.sl-us-harassment-workforce__intro{margin:0 0 22px}
.sl-us-harassment-workforce__intro .sl-h2{margin-bottom:14px}
.sl-us-harassment-workforce__intro p{margin:0 0 12px}
.sl-us-harassment-workforce__intro p:last-child{margin-bottom:0}
.sl-us-harassment-workforce__assignment{margin:0 0 16px}
.sl-us-harassment-workforce__assignment h3{margin:0;color:var(--sl-page-primary);font-size:20px;line-height:1.35}
.sl-us-harassment-workforce__configure{margin:0 0 28px}
.sl-us-harassment-workforce__list-content{min-width:0}
.sl-us-harassment-workforce__list-content h4{margin:0 0 14px;color:var(--sl-page-navy);font-size:22px;line-height:1.25}
.sl-us-harassment-workforce__configure-intro{margin:0 0 16px}
.sl-us-harassment-workforce__list-area{margin:0 0 16px}
.sl-us-harassment-workforce__list{margin:0}
.sl-us-harassment-workforce__configure-closing{margin:0}
.sl-us-harassment-workforce__delivery{padding:22px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white)}
.sl-us-harassment-workforce__delivery .sl-panel-title{margin:0 0 12px}
.sl-us-harassment-workforce__delivery p{margin:0 0 18px}
.sl-us-harassment-workforce__actions{display:flex;flex-direction:column;align-items:stretch;gap:12px;margin:0}
.sl-us-harassment-page .sl-us-harassment-workforce__actions .sl-content-btn{width:100%;max-width:100%}

/* FAQ / Contact spacing tweaks */
.sl-us-harassment-faq .sl-h2{margin-bottom:20px}
.sl-us-harassment-contact .sl-lead{margin-bottom:12px}

/* Contact (GWCT pattern, page-scoped) */
.sl-us-harassment-page .sl-contact-layout{display:grid;gap:28px;align-items:start}
.sl-us-harassment-page .sl-contact-intro{margin:0}
.sl-us-harassment-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
.sl-us-harassment-page .sl-gwct-contact-direct{margin-top:16px;max-width:100%}
.sl-us-harassment-page .sl-gwct-contact-direct__label{margin:0 0 12px;color:var(--sl-page-muted);font-size:14px;font-weight:500;line-height:1.5}
.sl-us-harassment-page .sl-gwct-contact-direct__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;width:100%;max-width:100%;box-sizing:border-box}
.sl-us-harassment-page .sl-gwct-contact-direct__item,
.sl-us-harassment-page .sl-gwct-contact__whatsapp{display:flex;align-items:center;gap:12px;width:100%;max-width:100%;min-width:0;min-height:64px;padding:14px 16px;border-radius:14px;text-decoration:none;box-sizing:border-box}
.sl-us-harassment-page .sl-gwct-contact-direct__item{border:1px solid rgba(20,114,186,.16);background:var(--sl-page-white);color:inherit;box-shadow:0 6px 18px rgba(31,44,86,.04)}
.sl-us-harassment-page .sl-gwct-contact-direct__icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:40px;height:40px;border-radius:12px;border:1px solid rgba(20,114,186,.12);background:#fff;color:var(--sl-page-primary)}
.sl-us-harassment-page .sl-gwct-contact-direct__icon svg{display:block;width:18px;height:18px}
.sl-us-harassment-page .sl-gwct-contact-direct__body,
.sl-us-harassment-page .sl-gwct-contact__whatsapp-text{display:flex;flex-direction:column;align-items:flex-start;gap:2px;min-width:0;text-align:left}
.sl-us-harassment-page .sl-gwct-contact-direct__title{color:var(--sl-page-navy);font-size:12px;font-weight:600;line-height:1.35;text-transform:uppercase;letter-spacing:.04em}
.sl-us-harassment-page .sl-gwct-contact-direct__value{color:var(--sl-page-primary);font-size:15px;font-weight:600;line-height:1.45;word-break:break-word}
.sl-us-harassment-page .sl-gwct-contact__whatsapp{background:#25d366;border:0;color:#fff;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-us-harassment-page .sl-gwct-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff}
.sl-us-harassment-page .sl-gwct-contact__whatsapp-icon svg{display:block;width:22px;height:22px}
.sl-us-harassment-page .sl-gwct-contact__whatsapp-label{font-size:16px;font-weight:600;line-height:1.2;opacity:.92;color:#fff}
.sl-us-harassment-page .sl-gwct-contact__whatsapp-number{font-size:16px;font-weight:700;line-height:1.25;letter-spacing:.01em;color:#fff}

@media(max-width:767px){
	.sl-us-harassment-page .sl-gwct-contact-direct__item,
	.sl-us-harassment-page .sl-gwct-contact__whatsapp{min-height:56px;padding:13px 14px}
	.sl-us-harassment-page .sl-gwct-contact-direct__icon{width:36px;height:36px}
	.sl-us-harassment-page .sl-gwct-contact-direct__value,
	.sl-us-harassment-page .sl-gwct-contact__whatsapp-number{font-size:14px}
	.sl-us-harassment-page .sl-contact-form-card{padding:22px 18px;border-radius:16px}
}

/* Tablet+ */
@media(min-width:768px){
	/* Centered square images (max 450x450) for section media; hero stays wide like AML */
	.sl-us-harassment-coverage__media,
	.sl-us-harassment-requirements__media,
	.sl-us-harassment-learning-paths__media,
	.sl-us-harassment-workplace__media,
	.sl-us-harassment-workforce__media{display:flex;justify-content:center;align-items:center;width:100%;margin-left:auto;margin-right:auto}
	.sl-us-harassment-page .sl-us-harassment-coverage__image,
	.sl-us-harassment-page .sl-us-harassment-coverage__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-requirements__image,
	.sl-us-harassment-page .sl-us-harassment-requirements__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-learning-paths__image,
	.sl-us-harassment-page .sl-us-harassment-learning-paths__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-workplace__image,
	.sl-us-harassment-page .sl-us-harassment-workplace__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-workforce__image,
	.sl-us-harassment-page .sl-us-harassment-workforce__image-placeholder{width:100%;max-width:450px;height:auto;min-height:0;max-height:450px;aspect-ratio:1/1;margin-left:auto;margin-right:auto;box-sizing:border-box}
	.sl-us-harassment-page .sl-us-harassment-coverage__image amp-img,
	.sl-us-harassment-page .sl-us-harassment-requirements__image amp-img,
	.sl-us-harassment-page .sl-us-harassment-learning-paths__image amp-img,
	.sl-us-harassment-page .sl-us-harassment-workplace__image amp-img,
	.sl-us-harassment-page .sl-us-harassment-workforce__image amp-img,
	.sl-us-harassment-page .sl-us-harassment-coverage__media amp-img,
	.sl-us-harassment-page .sl-us-harassment-requirements__media amp-img,
	.sl-us-harassment-page .sl-us-harassment-learning-paths__media amp-img,
	.sl-us-harassment-page .sl-us-harassment-workplace__media amp-img,
	.sl-us-harassment-page .sl-us-harassment-workforce__media amp-img{display:block;width:100%;max-width:450px;margin-left:auto;margin-right:auto}
	.sl-us-harassment-hero__image{max-width:760px}
	.sl-us-harassment-hero__tagline{font-size:24px}
	.sl-us-harassment-page .sl-us-harassment-hero__actions{flex-direction:row;flex-wrap:wrap;align-items:center;justify-content:flex-start}
	.sl-us-harassment-page .sl-us-harassment-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}
	.sl-us-harassment-requirements__cards{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}
	.sl-us-harassment-requirements__cards>.sl-us-harassment-requirements__card{min-width:0;margin:0;width:100%}
	.sl-us-harassment-requirements__cards>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}
	.sl-us-harassment-learning-paths__path{gap:28px;margin-bottom:48px}
	.sl-us-harassment-learning-paths__table tbody th{width:30%;max-width:none}
	.sl-us-harassment-learning-paths__table{min-width:0}
	.sl-us-harassment-page .sl-us-harassment-workforce__actions{flex-direction:row;flex-wrap:wrap;align-items:center}
	.sl-us-harassment-page .sl-us-harassment-workforce__actions .sl-content-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}
	.sl-us-harassment-workforce__list-area{gap:28px}
	.sl-us-harassment-page .sl-gwct-contact-direct__grid{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:12px}
}

/* Desktop: keep stacked (text then image), no sticky side-by-side; keep 450px square cap on section media */
@media(min-width:1000px){
	.sl-us-harassment-page .sl-us-harassment-coverage__image,
	.sl-us-harassment-page .sl-us-harassment-coverage__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-requirements__image,
	.sl-us-harassment-page .sl-us-harassment-requirements__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-learning-paths__image,
	.sl-us-harassment-page .sl-us-harassment-learning-paths__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-workplace__image,
	.sl-us-harassment-page .sl-us-harassment-workplace__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-workforce__image,
	.sl-us-harassment-page .sl-us-harassment-workforce__image-placeholder{max-width:450px;max-height:450px;aspect-ratio:1/1;min-height:0}
	.sl-us-harassment-hero__image{max-width:760px;max-height:none;aspect-ratio:auto}
	.sl-us-harassment-coverage__stack,
	.sl-us-harassment-requirements__stack,
	.sl-us-harassment-learning-paths__path,
	.sl-us-harassment-workplace__stack,
	.sl-us-harassment-workforce__list-area{gap:32px}
	.sl-us-harassment-requirements__cards{gap:22px}
	.sl-us-harassment-requirements__cards>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}
	.sl-us-harassment-page .sl-contact-layout{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}
	.sl-us-harassment-page .sl-contact-form-card{padding:32px;border-radius:24px}
	.sl-us-harassment-workforce__list-area{grid-template-columns:minmax(0,1.15fr) minmax(280px,.85fr);gap:48px;align-items:stretch}
	.sl-us-harassment-workforce__list-area .sl-us-harassment-workforce__media{display:flex;align-items:stretch}
	.sl-us-harassment-page .sl-us-harassment-workforce__list-area .sl-us-harassment-workforce__image-placeholder,
	.sl-us-harassment-page .sl-us-harassment-workforce__list-area .sl-us-harassment-workforce__image{max-width:none;max-height:none;height:100%;min-height:320px;aspect-ratio:auto;width:100%}
	.sl-us-harassment-page .sl-us-harassment-workforce__list-area .sl-us-harassment-workforce__image amp-img{max-width:none;height:100%;min-height:320px}
	.sl-us-harassment-workforce__list-content h4{font-size:24px;line-height:1.2}
}
