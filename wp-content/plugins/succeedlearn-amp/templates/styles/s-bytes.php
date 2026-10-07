<?php
/**
 * S-Bytes — AMP page styles (layout / spacing only).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-s-bytes-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff;--sl-fs-h2:32px;--sl-fs-h3:22px}
@media(min-width:900px){.sl-s-bytes-page{--sl-fs-h2:40px}}
@media(min-width:1200px){.sl-s-bytes-page{--sl-fs-h2:48px}}
.sl-s-bytes-page .sl-h2{margin:0 0 14px;font-size:var(--sl-fs-h2);line-height:1.25;color:var(--sl-page-navy);font-weight:700;max-width:none}
.sl-s-bytes-page .sl-h2 > span,.sl-s-bytes-page .sl-sbytes-hero h1 > span{color:var(--sl-page-primary)}
.sl-s-bytes-page .sl-home-sub-heading{display:inline-block;margin:0 0 10px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-s-bytes-page p{margin:0 0 12px;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-s-bytes-page p:last-child{margin-bottom:0}
.slf-breadcrumbs,.slf-breadcrumbs--inline{position:relative;z-index:2;margin:0 0 14px;padding:0;background:transparent;border:0}
.slf-breadcrumbs__list{display:flex;flex-wrap:wrap;align-items:center;gap:0;margin:0;padding:0;list-style:none;font-size:12px;line-height:1.4;color:#6B7C93}
.slf-breadcrumbs__item{display:inline-flex;align-items:center;max-width:100%;margin:0;padding:0;list-style:none}
.slf-breadcrumbs__sep{display:inline-block;margin:0 .4rem;color:rgba(22,35,78,.32);font-weight:400}
.slf-breadcrumbs__link{color:#16234e;text-decoration:none;font-weight:600;white-space:nowrap}
.slf-breadcrumbs__link:hover,.slf-breadcrumbs__link:focus{color:#1472ba;text-decoration:none}
.slf-breadcrumbs__current{display:inline-block;max-width:min(100%,18rem);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#6B7C93;font-weight:500}
@media(max-width:767px){.slf-breadcrumbs--inline{margin-bottom:10px}.slf-breadcrumbs__list{font-size:11px}.slf-breadcrumbs__current{max-width:min(100%,14rem)}}

/* Backgrounds (alternating, matches desktop) */
.sl-sbytes-hero,.sl-sbytes-meet,.sl-sbytes-consume,.sl-sbytes-works,.sl-sbytes-visibility,.sl-sbytes-employees,.sl-sbytes-contact,.sl-sbcs--bg-white{background:var(--sl-page-white)}
.sl-sbytes-why,.sl-sbytes-fatigue,.sl-sbytes-library,.sl-sbytes-delivered,.sl-sbytes-funfosec,.sl-sbytes-teams,.sl-sbytes-faq{background:var(--sl-page-bg)}

/* Section padding */
.sl-sbytes-why,.sl-sbytes-meet,.sl-sbytes-fatigue,.sl-sbytes-consume,.sl-sbytes-library,.sl-sbytes-works,.sl-sbytes-delivered,.sl-sbytes-visibility,.sl-sbytes-funfosec,.sl-sbytes-employees,.sl-sbytes-teams,.sl-sbytes-faq,.sl-sbytes-contact,.sl-sbcs{padding:48px 16px}

/* Hero */
.sl-sbytes-hero{padding:16px 16px 48px}
.sl-sbytes-hero__top{margin-bottom:18px}
.sl-s-bytes-page .sl-sbytes-hero h1{margin:0;color:var(--sl-page-navy);font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15}
.sl-sbytes-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-sbytes-hero__content{min-width:0}
.sl-s-bytes-page .sl-sbytes-hero h2.sl-hero-h2,.sl-s-bytes-page .sl-sbytes-hero__subheading{margin:0 0 14px;font-size:var(--sl-fs-hero-h2,28px);line-height:1.35;color:var(--sl-page-primary);font-weight:600}
.sl-s-bytes-page .sl-sbytes-hero__tagline,.sl-s-bytes-page .sl-sbytes-tagline{color:var(--sl-page-navy);font-weight:700}
.sl-sbytes-hero__actions{display:flex;flex-direction:column;gap:12px;margin-top:24px}
.sl-sbytes-hero__actions .sl-hero-btn{width:100%}
.sl-sbytes-hero__media{min-width:0;width:100%;max-width:560px;margin:0 auto}
.sl-sbytes-hero__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-sbytes-hero__image amp-img{display:block;width:100%}
.sl-sbytes-hero__image amp-img img{object-fit:cover;object-position:center}
@media(min-width:768px){.sl-sbytes-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:36px}.sl-sbytes-hero__media{max-width:none;margin:0}.sl-sbytes-hero__image{border-radius:16px}.sl-sbytes-hero__actions{flex-direction:row;flex-wrap:wrap}.sl-sbytes-hero__actions .sl-hero-btn{width:fit-content;max-width:none;flex:0 0 auto;white-space:nowrap}}

/* Subtitles / intros */
.sl-sbytes-meet .sl-panel-title,.sl-sbytes-library .sl-panel-title,.sl-sbytes-works .sl-panel-title,.sl-sbytes-delivered .sl-panel-title{margin:0 0 14px}
.sl-sbytes-meet .sl-sbytes-meet__intro .sl-panel-title,.sl-sbytes-library__intro .sl-panel-title,.sl-sbytes-works__intro .sl-panel-title{margin:16px 0 14px;font-size:var(--sl-fs-h3);font-weight:600;line-height:1.4;color:var(--sl-page-primary)}
.sl-sbytes-delivered__content .sl-panel-title{margin:16px 0 14px;font-size:var(--sl-fs-h3);font-weight:600;line-height:1.4;color:var(--sl-page-primary)}
.sl-sbytes-consume__intro,.sl-sbytes-works__intro,.sl-sbytes-employees__intro,.sl-sbytes-teams__intro,.sl-sbytes-library__intro,.sl-sbytes-meet__intro{margin-bottom:28px}
.sl-sbytes-consume__intro p,.sl-sbytes-works__intro p,.sl-sbytes-employees__intro p,.sl-sbytes-teams__intro p,.sl-sbytes-library__intro p{max-width:820px}

/* Media + copy splits */
.sl-sbytes-why__layout,.sl-sbytes-fatigue__layout,.sl-sbytes-delivered__layout,.sl-sbytes-visibility__layout,.sl-sbytes-works__layout,.sl-sbytes-meet__grid,.sl-sbytes-funfosec__layout{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-sbytes-why__content,.sl-sbytes-fatigue__content,.sl-sbytes-delivered__content,.sl-sbytes-visibility__content,.sl-sbytes-meet__content,.sl-sbytes-funfosec__intro{min-width:0}
.sl-sbytes-why__body,.sl-sbytes-fatigue__body,.sl-sbytes-delivered__body,.sl-sbytes-visibility__body{display:flex;flex-direction:column;gap:14px}
.sl-sbytes-why__body p,.sl-sbytes-fatigue__body p,.sl-sbytes-delivered__body p,.sl-sbytes-visibility__body p{margin:0}
.sl-sbytes-why__media,.sl-sbytes-fatigue__media,.sl-sbytes-delivered__media,.sl-sbytes-visibility__media,.sl-sbytes-works__media,.sl-sbytes-meet__media{min-width:0;width:100%;max-width:520px;margin:0 auto}
.sl-sbytes-why__image,.sl-sbytes-fatigue__image,.sl-sbytes-delivered__image,.sl-sbytes-visibility__image,.sl-sbytes-works__image{overflow:hidden;width:100%;line-height:0;border-radius:12px}
.sl-sbytes-why__image amp-img,.sl-sbytes-fatigue__image amp-img,.sl-sbytes-delivered__image amp-img,.sl-sbytes-visibility__image amp-img,.sl-sbytes-works__image amp-img{display:block;width:100%}
.sl-sbytes-why__image amp-img img,.sl-sbytes-fatigue__image amp-img img,.sl-sbytes-delivered__image amp-img img,.sl-sbytes-visibility__image amp-img img,.sl-sbytes-works__image amp-img img{object-fit:cover;object-position:center}
.sl-sbytes-fatigue__list{margin:18px 0}
.sl-sbytes-fatigue__list .sl-list-item:last-child{padding-bottom:13px}
.sl-sbytes-fatigue__list .sl-list-item > span{color:var(--sl-page-primary);font-weight:700}
.sl-sbytes-fatigue__closing{margin:0 0 4px}
.sl-sbytes-meet__video{overflow:hidden;width:100%;border-radius:12px;background:#000}
@media(min-width:768px){.sl-sbytes-why__media,.sl-sbytes-fatigue__media,.sl-sbytes-delivered__media,.sl-sbytes-visibility__media,.sl-sbytes-works__media,.sl-sbytes-meet__media{max-width:none;margin:0}.sl-sbytes-why__image,.sl-sbytes-fatigue__image,.sl-sbytes-delivered__image,.sl-sbytes-visibility__image,.sl-sbytes-works__image,.sl-sbytes-meet__video{border-radius:16px}}
@media(min-width:900px){.sl-sbytes-why__layout,.sl-sbytes-fatigue__layout,.sl-sbytes-visibility__layout{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:48px}.sl-sbytes-delivered__layout{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:48px}.sl-sbytes-meet__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:48px}.sl-sbytes-works__layout{grid-template-columns:minmax(0,.8fr) minmax(0,1.2fr);gap:48px;align-items:start}.sl-sbytes-funfosec__layout{grid-template-columns:minmax(0,.8fr) minmax(0,1.2fr);gap:48px;align-items:start}}

/* Card grids */
.sl-sbytes-consume__card,.sl-sbytes-employees__card,.sl-sbytes-teams__card,.sl-sbytes-funfosec__card,.sl-sbytes-works__card{display:flex;flex-direction:column;min-width:0;margin:0;width:100%;height:100%;padding:22px 20px;border:1px solid rgba(107,124,147,.18);border-radius:16px;box-sizing:border-box}
.sl-sbytes-consume__card,.sl-sbytes-teams__card,.sl-sbytes-works__card{background:var(--sl-page-bg)}
.sl-sbytes-employees__card,.sl-sbytes-funfosec__card{background:var(--sl-page-white)}
.sl-sbytes-teams__card{background:var(--sl-page-white)}
.sl-sbytes-works__card{background:var(--sl-page-bg)}
.sl-sbytes-consume__card .sl-panel-title,.sl-sbytes-employees__card .sl-panel-title,.sl-sbytes-teams__card .sl-panel-title,.sl-sbytes-funfosec__card .sl-panel-title,.sl-sbytes-works__card .sl-panel-title{margin:0 0 12px}
.sl-sbytes-consume__card p,.sl-sbytes-employees__card p,.sl-sbytes-teams__card p,.sl-sbytes-funfosec__card p{margin:0}
.sl-sbytes-funfosec__grid,.sl-sbytes-works__steps{display:flex;flex-direction:column;gap:16px}
.sl-sbytes-works__card{counter-increment:sbytes-step}
.sl-sbytes-works__steps{counter-reset:sbytes-step}
.sl-sbytes-works__card .sl-panel-title::before{content:"0" counter(sbytes-step);display:inline-block;margin-right:10px;color:var(--sl-page-primary);font-weight:700}
.sl-sbytes-works__card p{margin:0 0 10px}
.sl-sbytes-works__card p:last-child{margin-bottom:0}
.sl-sbytes-works__media{align-self:start}
.sl-sbytes-funfosec__actions{margin-top:22px}
@media(min-width:768px){.sl-sbytes-consume__card,.sl-sbytes-employees__card,.sl-sbytes-teams__card,.sl-sbytes-funfosec__card,.sl-sbytes-works__card{padding:28px 24px}.sl-sbytes-funfosec__grid,.sl-sbytes-works__steps{gap:20px}}
@media(min-width:1000px){.sl-s-bytes-page .sl-sbytes-consume__grid.sl-amp-card-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-s-bytes-page .sl-sbytes-consume__grid.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:auto;max-width:none;justify-self:stretch}.sl-s-bytes-page .sl-sbytes-employees__grid.sl-amp-card-grid,.sl-s-bytes-page .sl-sbytes-teams__grid.sl-amp-card-grid{grid-template-columns:repeat(6,minmax(0,1fr));gap:24px}.sl-s-bytes-page .sl-sbytes-employees__grid.sl-amp-card-grid > .sl-sbytes-employees__card,.sl-s-bytes-page .sl-sbytes-teams__grid.sl-amp-card-grid > .sl-sbytes-teams__card{grid-column:span 2;justify-self:stretch;max-width:none}.sl-s-bytes-page .sl-sbytes-employees__grid.sl-amp-card-grid > .sl-sbytes-employees__card:nth-child(4):nth-last-child(2),.sl-s-bytes-page .sl-sbytes-teams__grid.sl-amp-card-grid > .sl-sbytes-teams__card:nth-child(4):nth-last-child(2){grid-column:2 / 4}.sl-s-bytes-page .sl-sbytes-employees__grid.sl-amp-card-grid > .sl-sbytes-employees__card:nth-child(5):last-child,.sl-s-bytes-page .sl-sbytes-teams__grid.sl-amp-card-grid > .sl-sbytes-teams__card:nth-child(5):last-child{grid-column:4 / 6}}

/* Library accordion */
.sl-sbytes-library__actions{display:flex;margin-top:22px}
.sl-sbytes-library__catalog{margin-top:8px;border:1px solid rgba(22,35,78,.12);border-radius:16px;background:var(--sl-page-white);box-shadow:0 8px 28px rgba(22,35,78,.06);overflow:hidden}
.sl-sbytes-library__topic{border-bottom:1px solid rgba(22,35,78,.1)}
.sl-sbytes-library__topic:last-child{border-bottom:0}
.sl-s-bytes-page .sl-sbytes-library__topic-title{position:relative;margin:0;padding:16px 52px 16px 20px;border:0;background:var(--sl-page-white);color:var(--sl-page-navy);font-size:16px;font-weight:700;line-height:1.4;cursor:pointer}
.sl-sbytes-library__topic-title::after{content:"+";position:absolute;top:50%;right:20px;margin-top:-12px;color:var(--sl-page-primary);font-size:22px;font-weight:700;line-height:24px}
.sl-sbytes-library__topic[expanded] > .sl-sbytes-library__topic-title::after{content:"\2212"}
.sl-sbytes-library__topic[expanded] > .sl-sbytes-library__topic-title{background:#f8fafc}
.sl-sbytes-library__count{display:inline-block;margin-left:8px;padding:2px 9px;border-radius:999px;background:rgba(20,114,186,.1);color:var(--sl-page-primary);font-size:12px;font-weight:700;line-height:1.4;vertical-align:middle}
.sl-sbytes-library__panel{padding:4px 16px 20px;background:#f8fafc}
.sl-sbytes-library__card{display:flex;flex-direction:column;min-width:0;height:100%;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white);overflow:hidden;box-sizing:border-box}
.sl-sbytes-library__card-media{width:100%;line-height:0;background:#e9eef3}
.sl-sbytes-library__card-media amp-img{display:block;width:100%}
.sl-sbytes-library__card-media amp-img img{object-fit:cover;object-position:center}
.sl-sbytes-library__card-body{padding:14px 16px 18px}
.sl-s-bytes-page .sl-sbytes-library__card-title{margin:0 0 8px;color:var(--sl-page-navy);font-size:16px;font-weight:700;line-height:1.35}
.sl-s-bytes-page .sl-sbytes-library__card-desc{margin:0;font-size:14px;line-height:1.55}
@media(min-width:768px){.sl-sbytes-library__panel{padding:8px 24px 28px}.sl-s-bytes-page .sl-sbytes-library__topic-title{padding:18px 56px 18px 28px;font-size:17px}.sl-sbytes-library__topic-title::after{right:28px}}
@media(min-width:1000px){.sl-s-bytes-page .sl-sbytes-library__row.sl-amp-card-grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:20px}.sl-s-bytes-page .sl-sbytes-library__row.sl-amp-card-grid > :last-child:nth-child(odd){grid-column:auto;max-width:none;justify-self:stretch}}

/* Suite / SBCS - media left from 900px */
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

/* FAQ */
.sl-sbytes-faq .sl-amp-faq{margin-top:20px}

/* Contact */
.sl-sbytes-contact__content{min-width:0}
.sl-sbytes-contact__points{display:flex;flex-direction:column;gap:12px;margin:0 0 22px;padding:0;list-style:none}
.sl-sbytes-contact__points li{margin:0;color:var(--sl-page-text);font-size:15px;line-height:1.65}
.sl-sbytes-contact__points strong{color:var(--sl-page-navy);font-weight:700}
.sl-sbytes-contact__details{display:flex;flex-direction:column;gap:12px}
.sl-sbytes-contact__email{display:flex;flex-direction:column;justify-content:center;gap:2px;min-height:56px;padding:10px 18px;border:1px solid rgba(107,124,147,.22);border-radius:10px;background:var(--sl-page-white);text-decoration:none;box-sizing:border-box}
.sl-sbytes-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600;line-height:1.2}
.sl-sbytes-contact__email-value{color:var(--sl-page-primary);font-size:15px;font-weight:700;line-height:1.25;word-break:break-word}
.sl-sbytes-contact__whatsapp{display:flex;align-items:center;gap:12px;min-height:56px;padding:10px 18px;border-radius:10px;background:#25d366;color:#fff!important;text-decoration:none;box-sizing:border-box;box-shadow:0 12px 28px rgba(37,211,102,.28)}
.sl-sbytes-contact__whatsapp-icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;width:28px;height:28px;color:#fff}
.sl-sbytes-contact__whatsapp-icon svg{display:block;width:22px;height:22px;fill:currentColor}
.sl-sbytes-contact__whatsapp-text{display:flex;flex-direction:column;color:#fff}
.sl-sbytes-contact__whatsapp-label{color:#fff!important;font-size:15px;font-weight:700;line-height:1.25}
.sl-s-bytes-page .sl-contact-layout{display:grid;grid-template-columns:minmax(0,1fr);gap:28px;align-items:start}
.sl-s-bytes-page .sl-contact-form-card{max-width:none;margin:0;padding:26px 22px;border:1px solid rgba(107,124,147,.22);border-radius:18px;background:var(--sl-page-white);box-shadow:0 22px 55px rgba(22,35,78,.08);box-sizing:border-box}
@media(min-width:768px){.sl-sbytes-contact__details{flex-direction:row;flex-wrap:wrap;align-items:stretch}}
@media(min-width:900px){.sl-s-bytes-page .sl-contact-layout{grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:48px}.sl-s-bytes-page .sl-contact-form-card{padding:32px;border-radius:24px}}
