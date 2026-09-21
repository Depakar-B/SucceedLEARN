<?php
/**
 * Home section-specific styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-hero{position:relative;min-height:78vh;display:flex;align-items:center;color:#fff;padding:16px;background-color:#16234d;background-position:center;background-size:cover;background-repeat:no-repeat}
.sl-hero__overlay{position:absolute;inset:0;background:rgba(29,38,58,.78)}
.sl-hero__content{position:relative;z-index:1;max-width:860px;margin:0 auto;text-align:center}
.sl-hero__title,.sl-hero h1.sl-hero__title{margin:0 0 16px;font-size:32px;line-height:1.2;color:#fff}
.sl-hero__desc{margin:0 0 24px;font-size:16px;line-height:1.6;color:#f5f7fa}
.sl-hero__actions{display:flex;flex-wrap:wrap;justify-content:center;gap:12px}
.sl-hero__actions .sl-btn{margin:0}
.sl-hero__features{display:grid;gap:12px;margin-top:28px;text-align:left}
.sl-hero__feature{display:flex;gap:10px;align-items:center;background:rgba(255,255,255,.08);border-radius:10px;padding:10px 12px;font-size:14px}
@media(max-width:699px){.sl-hero__actions{flex-direction:column;align-items:stretch}.sl-hero__actions .sl-btn{display:block;width:100%;max-width:100%;box-sizing:border-box;margin-left:0}}
@media(min-width:700px){.sl-hero__title,.sl-hero h1.sl-hero__title{font-size:42px;color:#fff}.sl-hero__features{grid-template-columns:1fr 1fr}}
.sl-stat{text-align:center;padding:12px}
.sl-stat__value{font-size:32px;font-weight:800;color:var(--sl-page-primary,#135db7);margin:0}
.sl-stat__label{font-size:13px;color:#4a5568;margin:6px 0 0}
.sl-stats{display:grid;gap:14px}
@media(max-width:699px){.sl-stats{grid-template-columns:1fr}}
@media(min-width:700px){
.sl-stats{grid-template-columns:repeat(4,minmax(0,1fr))}
.sl-stat{padding:8px 4px}
.sl-stat__value{font-size:26px}
.sl-stat__label{font-size:12px}
}
@media(min-width:1000px){
.sl-stat{padding:12px}
.sl-stat__value{font-size:32px}
.sl-stat__label{font-size:13px}
}
.sl-clients__grid{display:grid;gap:12px;align-items:stretch;justify-items:stretch;max-width:920px;margin:0 auto}
.sl-clients__cell{display:flex;align-items:center;justify-content:center;background:#fff;border:1px solid #e8eaf0;border-radius:10px;padding:14px 12px;min-height:72px;box-sizing:border-box}
.sl-clients__cell amp-img{opacity:.9;max-width:120px;width:100%}
.sl-clients__cta{margin-top:22px;text-align:center}
.sl-clients__page-cta{margin-top:28px}
@media(max-width:599px){.sl-clients__grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(min-width:600px){.sl-clients__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:14px}.sl-clients__cell{min-height:80px;padding:16px 10px}}
@media(min-width:768px){.sl-clients__grid{grid-template-columns:repeat(4,minmax(0,1fr))}}
@media(min-width:1000px){.sl-clients__grid{grid-template-columns:repeat(5,minmax(0,1fr))}}
	.sl-clients__title span{color:var(--sl-page-primary,#1472ba)}
.sl-challenge-card h3,.sl-solution-card h3,.sl-platform-card h3{margin:0 0 10px;font-size:18px;color:#1F2C56}
.sl-card-tag{display:block;color:var(--sl-page-primary,#135db7);font-size:15px;font-weight:500;text-transform:none;letter-spacing:normal;margin:0 0 10px}
.sl-outcome-card h3{margin:0 0 12px;font-size:18px;font-weight:700;color:#1472ba}
.sl-challenge-card ul,.sl-solution-card ul{margin:0 0 16px;padding-left:18px;color:#4a5568;font-size:14px;line-height:1.55}
.sl-outcome-box{background:#FAFAFA;border-radius:10px;padding:14px 16px;margin-top:4px}
.sl-solution-card .sl-outcome-box h4,.sl-outcome-box h4{margin:0 0 6px;font-size:16px;font-weight:700;color:var(--sl-page-primary,#135db7) !important}
.sl-outcome-box p{margin:0;font-size:14px;line-height:1.6;color:#4a5568}
.sl-outcome-card ul{margin:0;padding:0;list-style:none;color:#333;font-size:14px;line-height:1.7}
.sl-outcome-card ul li{position:relative;padding-left:22px;margin-bottom:12px}
.sl-outcome-card ul li:last-child{margin-bottom:0}
.sl-outcome-card ul li::before{content:"";position:absolute;left:0;top:11px;width:12px;height:1px;background:#bfc8d4}
.sl-outcome-tags{display:grid;gap:10px}
@media(max-width:699px){.sl-outcome-tags{grid-template-columns:repeat(1,minmax(0,1fr))}}
@media(min-width:700px){.sl-outcome-tags{grid-template-columns:repeat(2,minmax(0,1fr))}}
.sl-outcome-tag{display:flex;align-items:center;justify-content:center;text-align:center;background:#f3f3f3;color:#333;border-radius:12px;padding:10px 12px;font-size:13px;line-height:1.35;font-weight:500;min-height:44px;box-sizing:border-box}
.sl-outcome-footer{margin-top:24px;padding:24px 28px;text-align:left}
.sl-outcome-footer__title{margin:0 0 8px;font-size:24px;font-weight:700;line-height:1.3;color:#1F2C56}
.sl-outcome-footer__text{margin:0;color:#333;font-size:15px;line-height:1.8}
.sl-reality{margin-top:20px;background:#fff;border:1px solid #e8eaf0;border-radius:14px;padding:0;overflow:hidden}
.sl-reality__grid{display:flex;flex-direction:column;gap:0;align-items:stretch}
.sl-reality__media{position:relative;width:100%;overflow:hidden;background:#f5f5f5;flex:0 0 auto}
.sl-reality__media amp-img{display:block;width:100%;max-width:100%}
.sl-reality__content{min-width:0;padding:18px 20px;flex:1 1 auto}
.sl-reality__title{margin:0 0 10px;font-size:22px;font-weight:700;line-height:1.3;color:#1F2C56}
@media(min-width:700px){
.sl-reality__grid{flex-direction:row;align-items:stretch}
.sl-reality__media{flex:0 0 34%;max-width:34%;align-self:stretch}
.sl-reality__media amp-img{height:100%;min-height:100%}
.sl-reality__media amp-img img,.sl-reality__media .i-amphtml-fill-content{object-fit:cover}
.sl-reality__content{padding:24px 28px;display:flex;flex-direction:column;justify-content:center}
}
.sl-reality__q{font-weight:700;font-size:20px;color:#1F2C56;margin:0 0 8px}
.sl-platform-card{text-align:left}
.sl-platform-card amp-img{margin-bottom:14px}
.sl-platform-card h3{margin:0 0 10px;font-size:18px;color:#1F2C56}
.sl-platform-card p{font-size:14px;color:#444;margin:0;line-height:1.7}
.sl-platform-card--cta{display:flex;flex-direction:column;justify-content:center}
@media(min-width:700px){
.sl-platform-card--cta{align-items:center;text-align:center}
.sl-platform-card--cta .sl-btn{white-space:nowrap}
}
.sl-sbcs-tagline{margin:0 0 12px;font-size:18px;font-weight:700;line-height:1.35;color:#1472ba}
.sl-pills{display:grid;grid-template-columns:repeat(1,minmax(0,1fr));gap:10px;margin:16px 0}
@media(min-width:700px){.sl-pills{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media(min-width:1000px){.sl-pills{grid-template-columns:repeat(4,minmax(0,1fr))}}
.sl-pill{display:flex;align-items:center;gap:6px;background:#fff;border:1px solid #E7E7E7;border-radius:50px;padding:12px 16px;font-size:13px;line-height:1.35;color:#1F2C56;box-sizing:border-box}
.sl-metrics{display:grid;gap:10px;margin-top:18px}
@media(min-width:700px){.sl-metrics{grid-template-columns:1fr 1fr}.sl-metric--wide{grid-column:1 / -1}}
.sl-metric{background:#fff;border:1px solid #e8eaf0;border-radius:14px;padding:16px;font-size:13px;box-shadow:0 5px 20px rgba(0,0,0,.04)}
.sl-metric__label{display:block;font-size:15px;font-weight:600;color:#1F2C56;margin:0 0 10px}
.sl-metric__value{display:block;font-size:28px;font-weight:700;color:#1472ba;line-height:1.2}
.sl-metric__arrow{display:inline;margin-right:.15em}
.sl-tags{display:flex;flex-wrap:wrap;gap:8px}
.sl-tag{background:#eef8f1;color:#0BA44B;border-radius:6px;padding:6px 10px;font-size:12px;font-weight:600}
.sl-steps{counter-reset:slstep}
.sl-step{position:relative}
.sl-step amp-img{display:block;margin-bottom:10px}
.sl-step__label{display:block;color:var(--sl-page-primary,#135db7);font-size:16px;font-weight:500;margin:0 0 6px}
.sl-step h3{margin:0px;font-size:19px;color:#1F2C56}
.sl-step p{margin:0;font-size:13px;line-height:1.55;color:#4a5568}
.sl-cta-section{background:linear-gradient(180deg,#F8FAFC 0%,#F2F5F8 100%)}
.sl-cta-card{background:#fff;border-radius:20px;padding:36px 24px;text-align:center;box-shadow:0 15px 45px rgba(0,0,0,.06)}
@media(min-width:700px){.sl-cta-card{padding:48px 40px}}
.sl-cta-card .sl-h2{margin:12px 0 14px}
.sl-cta-card .sl-lead{max-width:640px;margin:0 auto 24px}
.sl-cta-buttons{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-bottom:8px}
.sl-cta-buttons .sl-btn{margin:0}
.sl-cta-contacts{display:flex;flex-wrap:wrap;gap:16px;justify-content:center;align-items:center;margin-top:28px}
.sl-cta-contact{display:flex;flex-direction:column;gap:4px;align-items:center;min-width:180px;padding:14px 20px;background:#fff;border:1px solid #e8eaf0;border-radius:12px;box-shadow:0 8px 24px rgba(31,44,86,.08);box-sizing:border-box}
.sl-cta-contact__label{font-size:13px;font-weight:600;color:#1F2C56}
.sl-cta-contact a{color:#1F2C56;font-size:14px;text-decoration:none}
.sl-cta-contact a:hover{color:var(--sl-page-primary,#135db7)}
@media(max-width:699px){
.sl-cta-contacts{width:100%}
.sl-cta-contact{width:100%;min-width:0}
}
@media(min-width:700px){
.sl-cta-contacts{gap:40px;flex-wrap:nowrap;margin-top:36px}
.sl-cta-contact{position:relative;flex-direction:row;align-items:center;justify-content:center;gap:10px;min-width:300px;width:auto;padding:18px 28px;white-space:nowrap}
.sl-cta-contact + .sl-cta-contact::before{content:"";position:absolute;left:-20px;top:50%;transform:translateY(-50%);width:1px;height:60%;background:#ddd}
.sl-cta-contact__label{font-size:16px;font-weight:600;white-space:nowrap}
.sl-cta-contact a{font-size:16px;white-space:nowrap}
}
.sl-contact-intro{min-width:0;margin:0 0 28px}
.sl-contact-intro amp-img{margin:8px auto 0;max-width:560px;width:100%;border-radius:12px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,.08)}
.sl-contact-form-card{max-width:720px;width:100%;margin:0 auto;padding:0;background:transparent;border:0;box-shadow:none}
/* Mobile default: 1/row. Tablet only: 2/row, odd last centered. */
.sl-testimonials__grid{display:grid;gap:20px}
.sl-testimonials__card{display:flex;flex-direction:column;margin:0;padding:22px;background:#fff;border:1px solid #e8eaf0;border-radius:15px;box-shadow:0 12px 36px rgba(31,44,86,.14)}
.sl-testimonials__card blockquote{margin:0 0 18px;flex:1 1 auto}
.sl-testimonials__card blockquote p{margin:0;color:#1F2C56;font-size:15px;line-height:1.65}
.sl-testimonials__note{margin:0 0 18px;padding:12px 14px;background:#fff;border:1px solid rgba(31,44,86,.12);border-left:3px solid var(--sl-page-primary,#1472ba);border-radius:8px;color:#1F2C56;font-size:13px;line-height:1.55}
.sl-testimonials__card figcaption{padding-top:16px;border-top:1px solid #e4e8ef}
.sl-testimonials__card figcaption strong{display:block;margin-bottom:4px;font-size:15px;font-weight:700;color:#1F2C56}
.sl-testimonials__card figcaption span{display:block;font-size:13px;color:#6b7280;line-height:1.45}
@media(min-width:768px){
.sl-testimonials__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:28px}
.sl-testimonials__grid > :last-child:nth-child(odd){grid-column:1 / -1;justify-self:center;width:100%;max-width:calc((100% - 28px) / 2)}
}
/* Hero outline CTA — always last so it wins over duplicate .sl-btn{border:0} from cached bundles */
.sl-hero a.sl-btn.sl-btn--ghost,.sl-hero .sl-btn.sl-btn--ghost{background:transparent;color:#fff;border:1px solid rgba(255,255,255,.55);margin-left:8px;box-sizing:border-box}
