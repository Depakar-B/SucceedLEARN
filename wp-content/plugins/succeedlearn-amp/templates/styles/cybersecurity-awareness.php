<?php
/**
 * Cybersecurity Awareness — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-csa-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);--sl-btn-primary-shadow:rgba(234,62,36,.28);--sl-btn-secondary-color:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff}
.sl-csa-page .sl-eyebrow,.sl-csa-page .sl-home-sub-heading{display:inline-block;margin:0 0 12px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-csa-page .sl-home-sub-heading::before,.sl-csa-page .sl-faq-section .sl-home-sub-heading::before{content:none;display:none;width:0;height:0;margin:0}
.sl-csa-page h2 span,.sl-csa-page h1>span{color:var(--sl-page-primary)}
.sl-csa-page .sl-cyber-awareness-hero.sl-section{padding:30px 16px 80px 16px}
.sl-cyber-awareness-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-csa-page .sl-cyber-awareness-hero h1{margin:0 0 10px;font-size:clamp(36px,8vw,52px);font-weight:700;line-height:1.15;color:var(--sl-page-navy)}
.sl-csa-page .sl-cyber-awareness-hero h2.sl-cyber-awareness-hero__tagline,.sl-cyber-awareness-hero__tagline{margin:0 0 14px;font-size:18px;line-height:1.35;color:var(--sl-page-navy);font-weight:700}
.sl-cyber-awareness-hero__description{margin:0;font-size:15px;line-height:1.65;color:var(--sl-page-text)}
.sl-cyber-awareness-hero__actions{display:flex;flex-direction:column;flex-wrap:nowrap;align-items:stretch;gap:12px;margin-top:24px}
.sl-cyber-awareness-hero__cta,.sl-csa-page .sl-cyber-awareness-hero__actions .sl-btn.sl-cyber-awareness-hero__cta{display:inline-flex;align-items:center;justify-content:center;gap:10px;width:100%;max-width:100%;margin:0;flex:0 0 auto;padding:13px 20px;text-align:center;box-sizing:border-box;white-space:normal}
.sl-cyber-awareness-hero__cta svg{width:18px;height:18px;flex:0 0 auto;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.sl-cyber-awareness-hero__visual{display:block;min-width:0;width:100%;max-width:560px;margin:8px auto 0}
.sl-cyber-awareness-hero__image{display:block;overflow:hidden;width:100%;line-height:0}
.sl-cyber-awareness-hero__image amp-img{display:block;width:100%;max-width:100%;border-radius:12px}
.sl-cyber-awareness-hero__image amp-img img{object-fit:cover;object-position:center;border-radius:12px}
@media(max-width:767px){.sl-csa-page .sl-cyber-awareness-hero__actions{flex-direction:column;align-items:stretch}.sl-csa-page .sl-cyber-awareness-hero__actions .sl-cyber-awareness-hero__cta,.sl-csa-page .sl-cyber-awareness-hero__actions .sl-btn.sl-cyber-awareness-hero__cta{width:100%;max-width:100%;white-space:normal}}
@media(min-width:768px){.sl-csa-page .sl-cyber-awareness-hero.sl-section{padding:72px 16px 40px}.sl-csa-page .sl-cyber-awareness-hero h1{font-size:clamp(42px,5vw,56px)}.sl-csa-page .sl-cyber-awareness-hero__actions{flex-direction:row;flex-wrap:wrap;align-items:center;justify-content:flex-start;gap:12px}.sl-csa-page .sl-cyber-awareness-hero__actions .sl-cyber-awareness-hero__cta,.sl-csa-page .sl-cyber-awareness-hero__actions .sl-btn.sl-cyber-awareness-hero__cta{width:auto;max-width:none;flex:0 0 auto;align-self:center;white-space:nowrap}.sl-cyber-awareness-hero__visual{margin-top:16px}.sl-csa-page .sl-cyber-awareness-hero h2.sl-cyber-awareness-hero__tagline,.sl-cyber-awareness-hero__tagline{font-size:20px}}
@media(min-width:1000px){.sl-cyber-awareness-hero__grid{grid-template-columns:minmax(0,1fr);gap:32px;align-items:center}.sl-cyber-awareness-hero__visual{max-width:560px;margin:16px auto 0}.sl-csa-page .sl-cyber-awareness-hero h1{font-size:56px}.sl-csa-page .sl-cyber-awareness-hero h2.sl-cyber-awareness-hero__tagline,.sl-cyber-awareness-hero__tagline{font-size:22px}}
@media(min-width:1024px){.sl-cyber-awareness-hero__grid{grid-template-columns:minmax(0,1.1fr) minmax(280px,.9fr);gap:48px;align-items:center}.sl-cyber-awareness-hero__visual{max-width:none;margin:0}}

/* Offer highlights strip */
.sl-csa-offer-strip{padding:8px 16px 32px;border-top:1px solid rgba(107,124,147,.18)}
.sl-csa-offer-strip__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px; padding:20px;}
.sl-csa-offer-strip__item{display:flex;flex-direction:column;gap:6px;min-width:0;padding:16px 0;text-align:center;border-bottom:1px solid rgba(107,124,147,.18)}
.sl-csa-offer-strip__item:last-child{padding-bottom:0;border-bottom:0}
.sl-csa-offer-strip__item strong{font-size:16px;font-weight:700;line-height:1.4;color:var(--sl-page-navy)}
.sl-csa-offer-strip__item span{font-size:15px;line-height:1.5;color:var(--sl-page-muted)}
@media(min-width:768px){.sl-csa-offer-strip{padding:24px 16px 36px}.sl-csa-offer-strip__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:20px}.sl-csa-offer-strip__item,.sl-csa-offer-strip__item:last-child{padding:0 12px;text-align:left;border-bottom:0;border-right:1px solid rgba(107,124,147,.18)}.sl-csa-offer-strip__item:first-child{padding-left:0}.sl-csa-offer-strip__item:last-child{padding-right:0;border-right:0}}

/* CTA October highlight */
.sl-csa-oct-tag{display:inline-block;margin:0 1px;padding:1px 8px;border-radius:5px;background:rgba(255,255,255,.28);color:inherit;font-weight:800;line-height:1.35;letter-spacing:.01em}

/* One month one price offer */
.sl-csa-page .sl-cyber-awareness-offer.sl-section{padding:40px 16px}
.sl-cyber-awareness-offer__panel{padding:28px 20px;border:1px solid rgba(20,114,186,.18);border-radius:16px;background:#eef6ff;max-width:100%;min-width:0;box-sizing:border-box;overflow-x:hidden}
.sl-cyber-awareness-offer__heading{margin:0 0 24px}
.sl-cyber-awareness-offer__title-row{display:flex;align-items:flex-start;justify-content:space-between;gap:12px 16px;margin:0 0 10px}
.sl-cyber-awareness-offer__heading .sl-h2{flex:1 1 auto;min-width:0;margin:0}
.sl-cyber-awareness-offer__heading .sl-panel-title{margin:0;font-size:24px;font-weight:700;line-height:1.3;color:var(--sl-page-primary)}
.sl-cyber-awareness-offer__availability{
    display:inline-flex;
    align-items:center;
    flex:0 0 auto;
    margin:2px 0 0;
    padding:8px 14px;
    border:1px solid rgba(20,114,186,.21); /* lighter 1472ba border */
    border-radius:999px;
    background:rgba(20,114,186,.09); /* very light 1472ba background */
    color:#1472ba; /* main blue colour */
    font-size:13px;
    font-weight:700;
    line-height:1.35;
    white-space:nowrap
}
.sl-cyber-awareness-offer__offer{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;width:100%;max-width:100%;min-width:0;box-sizing:border-box}
.sl-cyber-awareness-offer__item{position:relative;padding:18px 16px 18px 18px;border:1px solid rgba(20,114,186,.28);border-left:4px solid var(--sl-page-primary);border-radius:12px;background:linear-gradient(135deg,#fff 0%,#f3f9ff 100%);box-shadow:0 8px 22px rgba(22,35,78,.08);width:100%;max-width:100%;min-width:0;box-sizing:border-box;overflow:hidden}
.sl-cyber-awareness-offer__item-label{display:inline-flex;align-items:center;margin:0 0 8px;padding:4px 9px;border-radius:6px;background:rgba(14,159,74,.12);font-size:13px;font-weight:800;letter-spacing:.03em;line-height:1.3;text-transform:uppercase;text-align:left;color:#0e9f4a}
.sl-cyber-awareness-offer__item p{margin:0;color:var(--sl-page-navy);font-size:17px;line-height:1.4;font-weight:700;text-align:left;max-width:100%;overflow-wrap:anywhere;word-break:break-word}
.sl-cyber-awareness-offer__operator{display:flex;align-items:center;justify-content:center;min-height:24px;color:var(--sl-page-primary);font-size:24px;font-weight:800}
.sl-cyber-awareness-offer__price{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;padding:20px 16px;border:1px solid rgba(20,114,186,.22);border-radius:12px;background:#fff;text-align:center;box-sizing:border-box}
.sl-cyber-awareness-offer__price-label{font-size:12px;font-weight:700;color:var(--sl-page-primary)}
.sl-cyber-awareness-offer__price-value{display:inline-flex;align-items:flex-start;gap:2px;color:var(--sl-page-navy)}
.sl-cyber-awareness-offer__currency{font-size:48px;font-weight:800;line-height:1;transform:translateY(2px)}
.sl-cyber-awareness-offer__amount{font-size:48px;font-weight:800;line-height:.95;letter-spacing:-.04em}
.sl-cyber-awareness-offer__price-note{font-size:13px;font-weight:500;color:var(--sl-page-muted)}
.sl-cyber-awareness-offer__footnote{display:flex;flex-direction:column;align-items:stretch;gap:12px;margin-top:18px;padding-top:16px;border-top:1px solid rgba(20,114,186,.16)}
.sl-cyber-awareness-offer__footnote-text{margin:0;color:var(--sl-page-muted);font-size:12px;font-weight:500;line-height:1.4}
.sl-cyber-awareness-offer__footnote .sl-btn{display:inline-flex;align-items:center;justify-content:center;width:100%;box-sizing:border-box;padding:10px 16px;font-size:13px;white-space:nowrap;text-align:center}
@media(max-width:767px){.sl-cyber-awareness-offer__title-row{flex-direction:column;align-items:flex-start}.sl-cyber-awareness-offer__availability{white-space:normal}}
@media(min-width:768px) and (max-width:1023px){
.sl-csa-page .sl-cyber-awareness-offer.sl-section{padding:48px 16px}
.sl-cyber-awareness-offer__panel{padding:36px 28px}
.sl-cyber-awareness-offer__title-row{flex-direction:column;align-items:flex-start;gap:12px}
.sl-cyber-awareness-offer__availability{white-space:normal}
.sl-cyber-awareness-offer__offer{display:flex;flex-direction:column;align-items:stretch;gap:14px;width:100%;max-width:100%;min-width:0}
.sl-cyber-awareness-offer__item{width:100%;max-width:100%;min-width:0;min-height:130px;box-sizing:border-box;overflow:hidden}
.sl-cyber-awareness-offer__operator{display:flex;align-items:center;justify-content:center;width:100%;max-width:100%;min-height:28px;flex:0 0 auto}
.sl-cyber-awareness-offer__price{width:50%;max-width:280px;min-height:140px;margin-left:auto;margin-right:auto;align-self:center;box-sizing:border-box}
.sl-cyber-awareness-offer__footnote{flex-direction:row;flex-wrap:wrap;align-items:center;justify-content:flex-start;gap:8px 12px;margin-top:18px;padding-top:16px}
.sl-cyber-awareness-offer__footnote-text{flex:0 1 auto;min-width:0;max-width:none;font-size:13px;white-space:normal;overflow-wrap:anywhere;word-break:break-word}
.sl-csa-page .sl-cyber-awareness-offer__footnote .sl-btn,
.sl-csa-page .sl-cyber-awareness-offer__footnote a.sl-btn.sl-btn--primary{display:inline-flex;width:auto;max-width:max-content;flex:0 0 auto;align-self:center;padding:10px 18px;font-size:14px;white-space:nowrap}
}
@media(min-width:1024px){.sl-csa-page .sl-cyber-awareness-offer.sl-section{padding:48px 16px}.sl-cyber-awareness-offer__panel{padding:36px 28px}.sl-cyber-awareness-offer__offer{grid-template-columns:minmax(0,1fr) auto minmax(0,1fr) auto 200px;align-items:stretch;gap:14px}.sl-cyber-awareness-offer__operator{min-height:auto}.sl-cyber-awareness-offer__footnote{flex-direction:row;flex-wrap:wrap;align-items:center;justify-content:center;gap:8px 12px;margin-top:22px;padding-top:20px}.sl-cyber-awareness-offer__footnote-text{flex:0 1 auto;min-width:0;max-width:none;font-size:13px;white-space:normal;overflow-wrap:anywhere;word-break:break-word}.sl-csa-page .sl-cyber-awareness-offer__footnote .sl-btn,.sl-csa-page .sl-cyber-awareness-offer__footnote a.sl-btn.sl-btn--primary{display:inline-flex;width:auto;max-width:max-content;flex:0 0 auto;padding:10px 18px;font-size:14px;white-space:nowrap}}

/* Readiness */
.sl-csa-page .sl-cyber-awareness-readiness.sl-section{padding:24px 16px}
.sl-cyber-awareness-readiness__heading{margin:0 0 28px}
.sl-cyber-awareness-readiness__heading .sl-h2{margin-bottom:16px}
.sl-cyber-awareness-readiness__heading p{margin:0 0 10px;color:var(--sl-page-muted)}
.sl-cyber-awareness-readiness__heading p:last-child{margin-bottom:0}
.sl-cyber-awareness-readiness__heading strong{color:var(--sl-page-navy)}
.sl-cyber-awareness-readiness__grid{display:grid;align-items:stretch;gap:18px}
.sl-cyber-awareness-readiness__card{position:relative;display:flex;flex-direction:column;height:auto;min-height:0;padding:24px;overflow:hidden;border:1px solid rgba(20,114,186,.18);border-radius:12px;background:var(--sl-page-white);box-shadow:0 8px 28px rgba(22,35,78,.04);box-sizing:border-box}
.sl-cyber-awareness-readiness__number{position:absolute;top:16px;right:18px;color:rgba(51,51,51,.2);font-size:40px;font-weight:800;line-height:1;pointer-events:none;z-index:0}
.sl-cyber-awareness-readiness__icon{position:relative;z-index:1;display:flex;align-items:center;justify-content:center;width:48px;height:48px;margin-bottom:20px;border-radius:10px;background:rgba(20,114,186,.08)}
.sl-cyber-awareness-readiness__icon svg{display:block;width:25px;height:25px;fill:none;stroke:var(--sl-page-primary);stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.sl-cyber-awareness-readiness__content{position:relative;z-index:1}
.sl-cyber-awareness-readiness__content h3{margin:0 0 10px;font-size:22px;font-weight:700;line-height:1.3;color:var(--sl-page-navy)}
.sl-cyber-awareness-readiness__content p{margin:0;color:var(--sl-page-muted)}
.sl-cyber-awareness-readiness__footer{display:flex;align-items:center;gap:8px;margin-top:auto;padding-top:20px;color:var(--sl-page-primary);font-weight:700}
.sl-cyber-awareness-readiness__footer::before{width:24px;height:1px;background:var(--sl-page-primary);content:""}
@media(min-width:768px){.sl-csa-page .sl-cyber-awareness-readiness.sl-section{padding:56px 16px}.sl-cyber-awareness-readiness__heading{margin-bottom:32px}.sl-cyber-awareness-readiness__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:24px;align-items:stretch}.sl-cyber-awareness-readiness__card{padding:26px;height:auto}.sl-cyber-awareness-readiness__card:last-child{grid-column:1/-1;width:100%;max-width:calc((100% - 24px)/2);justify-self:center}}
@media(min-width:1000px){.sl-csa-page .sl-cyber-awareness-readiness.sl-section{padding:64px 16px}.sl-cyber-awareness-readiness__heading{margin-bottom:40px}.sl-cyber-awareness-readiness__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-cyber-awareness-readiness__card{padding:30px;min-height:235px}.sl-cyber-awareness-readiness__card:last-child{grid-column:auto;max-width:none;justify-self:stretch}.sl-cyber-awareness-readiness__content h3{font-size:24px}.sl-cyber-awareness-readiness__number{font-size:48px}}

/* Cybersecurity Awareness campaign sections. */
.sl-csa-page .sl-csa-section-heading{max-width:760px;margin:0 0 28px}.sl-csa-page .sl-csa-section-heading .sl-h2,.sl-csa-page .sl-csa-two-col .sl-h2{margin:0 0 14px}.sl-csa-two-col{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:center}
.sl-csa-two-col>*{width:100%;max-width:100%;min-width:0;grid-column:1/-1}.sl-csa-campaign__row{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;margin:0 0 28px;padding:24px;border:1px solid rgba(107,124,147,.18);border-radius:16px;background:var(--sl-page-white)}
.sl-csa-campaign__row--reverse{grid-template-columns:minmax(0,1fr)}
.sl-csa-campaign__row>.sl-csa-campaign__content,
.sl-csa-campaign__row>.sl-csa-campaign__image,
.sl-csa-campaign__row>.sl-csa-placeholder{width:100%;max-width:100%;min-width:0;grid-column:1/-1}
.sl-csa-campaign__row--reverse>.sl-csa-campaign__content,
.sl-csa-campaign__row--reverse>.sl-csa-campaign__image,
.sl-csa-campaign__row--reverse>.sl-csa-placeholder{order:initial}
.sl-csa-campaign__row:last-child{margin-bottom:0}.sl-csa-campaign__content{position:relative}.sl-csa-campaign__number{display:block;margin:0 0 8px;font-size:13px;font-weight:700;color:var(--sl-page-primary)}.sl-csa-campaign__content h3,.sl-csa-contact__form h3{margin:0 0 12px;font-size:21px;line-height:1.3;color:var(--sl-page-navy)}.sl-csa-campaign__content p{margin:0 0 16px;color:var(--sl-page-text);line-height:1.65}/* Checklist / included / integration list chrome: global-ui.php (.sl-list-item) */
.sl-csa-placeholder{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px;min-height:220px;padding:24px;border:1px solid rgba(20,114,186,.2);border-radius:14px;background:var(--sl-page-primary-soft);color:var(--sl-page-navy);text-align:center}.sl-csa-placeholder>span{font-size:42px;color:var(--sl-page-primary)}.sl-csa-pricing__grid{display:grid;gap:16px}.sl-csa-pricing__card{display:flex;flex-direction:column;min-height:0;padding:22px;border:1px solid rgba(20,114,186,.2);border-top:3px solid var(--sl-page-primary);border-radius:14px;background:var(--sl-page-white)}.sl-csa-pricing__head{display:flex;gap:10px;align-items:center;min-height:54px;margin-bottom:14px}.sl-csa-pricing__head>span{font-size:26px;color:var(--sl-page-primary)}.sl-csa-pricing__head h3{margin:0;font-size:18px;line-height:1.3;color:var(--sl-page-navy)}.sl-csa-pricing__price{font-size:30px;line-height:1;color:var(--sl-page-primary)}.sl-csa-pricing__card p{margin:9px 0 18px;color:var(--sl-page-muted)}.sl-csa-pricing__card .sl-btn{width:100%;margin-top:auto}.sl-csa-included{margin-top:22px;padding:28px 24px;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white);box-shadow:0 5px 18px rgba(22,35,78,.05)}.sl-csa-included__heading{margin:0 0 20px}.sl-csa-included__heading h3{margin:0 0 8px;font-size:24px;line-height:1.3;color:var(--sl-page-navy)}.sl-csa-included__heading p{margin:0;color:var(--sl-page-text);line-height:1.6}.sl-csa-disclaimer{margin:18px 0 0;color:var(--sl-page-muted);font-size:13px;line-height:1.5}.sl-csa-pricing__why{margin-top:22px;padding:22px 18px;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:var(--sl-page-white);box-shadow:0 5px 18px rgba(22,35,78,.05)}.sl-csa-pricing__why-heading{margin:0 0 16px}.sl-csa-pricing__why-heading h3{margin:0 0 8px;font-size:20px;line-height:1.3;color:var(--sl-page-navy)}.sl-csa-pricing__why-heading p{margin:0;color:var(--sl-page-muted);line-height:1.6}.sl-csa-pricing__why-scroll{margin:0 0 16px;overflow-x:auto;-webkit-overflow-scrolling:touch;border:1px solid rgba(107,124,147,.2);border-radius:12px;background:var(--sl-page-white)}.sl-csa-pricing__why-table{width:100%;min-width:560px;margin:0;border-collapse:collapse;background:var(--sl-page-white)}.sl-csa-pricing__why-table th,.sl-csa-pricing__why-table td{padding:14px 12px;border-bottom:1px solid rgba(107,124,147,.18);vertical-align:top;text-align:left}.sl-csa-pricing__why-table tr:last-child th,.sl-csa-pricing__why-table tr:last-child td{border-bottom:0}.sl-csa-pricing__why-table th{width:36%;min-width:180px;background:rgba(20,114,186,.06);color:var(--sl-page-navy);font-size:14px;font-weight:700;line-height:1.4}.sl-csa-pricing__why-table td{min-width:280px;color:var(--sl-page-text);font-size:14px;line-height:1.6}.sl-csa-pricing__why-close{margin:0;padding:14px 14px;border:1px solid #1472ba;border-radius:8px;background:rgba(20,114,186,.09);color:#16234e;font-size:15px;font-weight:700;line-height:1.45}.sl-csa-journey__grid{display:grid;gap:16px}.sl-csa-journey__card{min-height:0;padding:22px;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:var(--sl-page-white)}.sl-csa-journey__card>span{display:block;margin-bottom:14px;font-weight:700;color:var(--sl-page-primary)}.sl-csa-journey__card h3{margin:0 0 8px;font-size:20px;color:var(--sl-page-navy)}.sl-csa-journey__card p{margin:0;color:var(--sl-page-text);line-height:1.55}.sl-csa-faq__cta{margin-top:16px}
.sl-csa-faq__cta .sl-btn{width:auto;max-width:100%}
.sl-csa-contact__email{display:inline-flex;flex-direction:column;gap:2px;margin-top:14px;padding:10px 18px;border:1px solid rgba(107,124,147,.22);border-radius:10px;background:var(--sl-page-white);text-decoration:none}
.sl-csa-contact__email-label{color:var(--sl-page-muted);font-size:12px;font-weight:600}
.sl-csa-contact__email-value{color:var(--sl-page-primary);font-size:15px;font-weight:700}
.sl-csa-contact,.sl-csa-contact .sl-wrap,.sl-csa-contact .sl-csa-two-col{min-width:0;max-width:100%;box-sizing:border-box}
.sl-csa-contact__form{padding:20px;border:1px solid rgba(20,114,186,.2);border-radius:14px;background:var(--sl-page-white);min-width:0;max-width:100%;width:100%;box-sizing:border-box;overflow-x:hidden}
.sl-csa-contact__form .ssf-form-wrap,.sl-csa-contact__form .ssf-form-card,.sl-csa-contact__form form{max-width:100%;min-width:0;width:100%;margin:0;padding:0;box-sizing:border-box}
.sl-csa-contact__form .ssf-form-card{border:none;box-shadow:none;background:transparent;border-radius:0}
.sl-csa-contact__form .ssf-form-header{margin-bottom:1rem;text-align:left}
.sl-csa-contact__form .ssf-form-title{margin:0;font-size:20px;font-weight:700;line-height:1.3;color:var(--sl-page-navy)}
.sl-csa-contact__form .ssf-form-row{display:grid;grid-template-columns:minmax(0,1fr);gap:0;margin:0;min-width:0;max-width:100%}
.sl-csa-contact__form .ssf-field{margin-bottom:14px;display:flex;flex-direction:column;min-width:0;max-width:100%}
.sl-csa-contact__form .ssf-field label{font-weight:600;color:var(--sl-page-navy);margin-bottom:6px;font-size:14px}
.sl-csa-contact__form .ssf-required{color:#dc2626}
.sl-csa-contact__form .ssf-field input:not([type=checkbox]),.sl-csa-contact__form .ssf-field textarea{width:100%;max-width:100%;box-sizing:border-box;border:1.5px solid #e2e8f0;border-radius:8px;padding:12px 14px;font:inherit;background:#f8fafc;color:#0f172a}
.sl-csa-contact__form .ssf-field input:focus,.sl-csa-contact__form .ssf-field textarea:focus{outline:none;border-color:#1472ba;background:#fff;box-shadow:0 0 0 3px rgba(20,114,186,.15)}
.sl-csa-contact__form .ssf-checkbox{flex-direction:row;align-items:flex-start;gap:8px}
.sl-csa-contact__form .ssf-checkbox input[type=checkbox]{margin-top:3px;flex-shrink:0}
.sl-csa-contact__form .ssf-checkbox label{margin:0;font-size:12px;line-height:1.45;font-weight:400;color:#475569;overflow-wrap:anywhere;word-break:break-word}
.sl-csa-contact__form .ssf-checkbox label a{color:#1472ba;font-weight:600;text-decoration:none}
.sl-csa-contact__form .ssf-submit{width:100%;max-width:100%;display:inline-flex;align-items:center;justify-content:center;border:none;border-radius:8px;padding:13px 16px;margin-top:8px;font-size:16px;font-weight:700;background:#ea3e24;color:#fff;box-sizing:border-box}
.sl-csa-contact__form .ssf-submit[disabled]{opacity:.7}
.sl-csa-contact__form .ssf-error-message{display:none;color:#dc2626;font-size:12px;line-height:1.4;margin-top:6px}
.sl-csa-contact__form .ssf-error-message.amp-visible{display:block}
.sl-csa-contact__form .ssf-honeypot{position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden;opacity:0}
.ssf-lightbox-overlay{position:fixed;inset:0;display:flex;align-items:center;justify-content:center;padding:16px;background:rgba(15,23,42,.58)}
.ssf-lightbox-content{width:100%;max-width:420px;background:#fff;border-radius:14px;padding:22px 18px;text-align:center;box-shadow:0 14px 40px rgba(15,23,42,.22)}
.ssf-lightbox-title{margin:0 0 8px;font-size:20px;font-weight:700;color:var(--sl-page-navy)}
.ssf-lightbox-message{margin:0 0 16px;color:var(--sl-page-text);line-height:1.5}
.ssf-lightbox-button{display:inline-flex;align-items:center;justify-content:center;min-width:120px;padding:12px 16px;border:none;border-radius:8px;background:#ea3e24;color:#fff;font-weight:700}
@media(min-width:700px){.sl-csa-pricing__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}.sl-csa-journey__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}}
.sl-csa-page .sl-csa-checklist{display:grid;grid-template-columns:minmax(0,1fr);gap:10px}
@media(min-width:768px){.sl-csa-two-col{grid-template-columns:minmax(0,1fr);gap:24px}.sl-csa-two-col>*{width:100%;max-width:100%;min-width:0;grid-column:1/-1}.sl-csa-campaign__row,.sl-csa-campaign__row--reverse{grid-template-columns:minmax(0,1fr);gap:24px;padding:30px}.sl-csa-campaign__row>.sl-csa-campaign__content,.sl-csa-campaign__row>.sl-csa-campaign__image,.sl-csa-campaign__row>.sl-csa-placeholder,.sl-csa-campaign__row--reverse>.sl-csa-campaign__content,.sl-csa-campaign__row--reverse>.sl-csa-campaign__image,.sl-csa-campaign__row--reverse>.sl-csa-placeholder{width:100%;max-width:100%;grid-column:1/-1;order:initial}.sl-csa-placeholder{min-height:290px}.sl-csa-pricing__card .sl-btn{width:auto}.sl-csa-included,.sl-csa-pricing__why{padding:28px 30px}.sl-csa-contact__form{padding:24px}.sl-csa-contact__form .ssf-form-row{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:0 14px}.sl-csa-page .sl-csa-checklist{display:grid;grid-template-columns:minmax(0,1fr);gap:10px}}
@media(min-width:1000px){.sl-csa-pricing__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:24px}.sl-csa-journey__grid{grid-template-columns:repeat(4,minmax(0,1fr));gap:24px}}
@media(min-width:1024px){.sl-csa-two-col{grid-template-columns:repeat(2,minmax(0,1fr));gap:32px;align-items:center}.sl-csa-two-col>*{width:auto;max-width:none;min-width:0;grid-column:auto}.sl-csa-campaign__row,.sl-csa-campaign__row--reverse{grid-template-columns:repeat(2,minmax(0,1fr));gap:48px;padding:36px;align-items:center}.sl-csa-campaign__row>.sl-csa-campaign__content,.sl-csa-campaign__row>.sl-csa-campaign__image,.sl-csa-campaign__row>.sl-csa-placeholder,.sl-csa-campaign__row--reverse>.sl-csa-campaign__content,.sl-csa-campaign__row--reverse>.sl-csa-campaign__image,.sl-csa-campaign__row--reverse>.sl-csa-placeholder{width:auto;max-width:none;grid-column:auto}.sl-csa-campaign__row--reverse>.sl-csa-campaign__image,.sl-csa-campaign__row--reverse>.sl-csa-placeholder{order:1}.sl-csa-campaign__row--reverse>.sl-csa-campaign__content{order:2}.sl-csa-page .sl-csa-checklist{grid-template-columns:minmax(0,1fr) minmax(0,1fr);column-gap:20px;row-gap:12px}.sl-csa-contact .sl-csa-two-col>*,.sl-csa-contact__form{min-width:0;max-width:100%}}
.sl-csa-phishcue__cta{margin-top:22px}.sl-csa-integration__list{margin:22px 0 0}.sl-csa-pricing__card--featured{position:relative;border-color:var(--sl-page-primary);box-shadow:0 10px 28px rgba(20,114,186,.12)}.sl-csa-pricing__badge{position:absolute;top:-12px;left:18px;padding:4px 10px;border-radius:999px;background:var(--sl-page-primary);color:#fff;font-size:12px;font-weight:700}

/* Measure */
.sl-csa-page .sl-cybersecurity-campaign-measure.sl-section{padding:24px 16px}
.sl-cybersecurity-campaign-measure__content{display:grid;grid-template-columns:minmax(0,1fr);gap:24px;align-items:start}
.sl-cybersecurity-campaign-measure__heading{margin:0 0 24px}
.sl-cybersecurity-campaign-measure__heading .sl-h2{margin:0 0 12px}
.sl-cybersecurity-campaign-measure__heading .sl-lead{margin:0}
.sl-cybersecurity-campaign-measure__icon{display:inline-flex;flex:0 0 16px;align-items:center;justify-content:center;width:16px;height:16px;margin-top:0;color:var(--sl-page-primary)}
.sl-cybersecurity-campaign-measure__icon svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:1.7;stroke-linecap:round;stroke-linejoin:round}
.sl-cybersecurity-campaign-measure__label{color:var(--sl-page-text);line-height:1.55}
.sl-cybersecurity-campaign-measure__visual{min-width:0}
.sl-cybersecurity-campaign-measure__image{overflow:hidden;width:100%;height:auto;line-height:0}
.sl-cybersecurity-campaign-measure__image amp-img{display:block;width:100%;max-width:100%;height:auto;border-radius:12px}
.sl-cybersecurity-campaign-measure__image amp-img img{object-fit:cover;object-position:center;border-radius:12px}
@media(min-width:700px){.sl-csa-page .sl-cybersecurity-campaign-measure.sl-section{padding:24px 16px}.sl-cybersecurity-campaign-measure__content{gap:32px;align-items:start}.sl-cybersecurity-campaign-measure__metrics{grid-template-columns:repeat(2,minmax(0,1fr));gap:14px 24px}}
@media(min-width:1000px){.sl-csa-page .sl-cybersecurity-campaign-measure.sl-section{padding:24px 16px}.sl-cybersecurity-campaign-measure__content{gap:48px;align-items:start}}

/* Integration image */
.sl-csa-integration__visual{min-width:0}
.sl-csa-integration__image{overflow:hidden;width:100%;line-height:0}
.sl-csa-integration__image amp-img{display:block;width:100%;border-radius:14px}
.sl-csa-integration__image amp-img img{object-fit:cover;object-position:center;border-radius:14px}
.sl-csa-integration .sl-csa-two-col{grid-template-columns:minmax(0,1fr);gap:24px}
.sl-csa-integration .sl-csa-two-col>*{width:100%;max-width:100%;min-width:0;grid-column:1/-1}
.sl-csa-phishcue .sl-csa-two-col,
.sl-csa-contact .sl-csa-two-col{grid-template-columns:minmax(0,1fr);gap:24px}
.sl-csa-phishcue .sl-csa-two-col>*,
.sl-csa-contact .sl-csa-two-col>*{width:100%;max-width:100%;min-width:0;grid-column:1/-1}
@media(min-width:1024px){
.sl-csa-integration .sl-csa-two-col,
.sl-csa-phishcue .sl-csa-two-col,
.sl-csa-contact .sl-csa-two-col{grid-template-columns:repeat(2,minmax(0,1fr));gap:32px;align-items:center}
.sl-csa-integration .sl-csa-two-col>*,
.sl-csa-phishcue .sl-csa-two-col>*,
.sl-csa-contact .sl-csa-two-col>*{width:auto;max-width:none;grid-column:auto}
}

/* PhishCue image */
.sl-csa-phishcue__visual{min-width:0}
.sl-csa-phishcue__image{overflow:hidden;width:100%;line-height:0}
.sl-csa-phishcue__image amp-img{display:block;width:100%;border-radius:14px}
.sl-csa-phishcue__image amp-img img{object-fit:cover;object-position:center;border-radius:14px}

/* Campaign images */
.sl-csa-campaign__image{overflow:hidden;width:100%;line-height:0}
.sl-csa-campaign__image amp-img{display:block;width:100%;border-radius:14px}
.sl-csa-campaign__image amp-img img{object-position:center;border-radius:14px}
/* Mobile AMP: keep the two content cards only; images crowd the section */
@media(max-width:767px){
.sl-csa-campaign__image,.sl-csa-campaign__row>.sl-csa-placeholder{display:none}
}

/* Integration list: stacked card on mobile + tablet */
@media(max-width:1023px){
.sl-csa-integration__list{gap:12px}
.sl-csa-integration__list>div{display:flex;flex-direction:column;align-items:flex-start;justify-content:flex-start;gap:6px;min-height:0;padding:14px 16px}
.sl-csa-integration__list dt{flex:0 0 auto;min-width:0;width:100%;margin:0;color:var(--sl-page-primary,#1472ba);font-size:15px;font-weight:700;line-height:1.3}
.sl-csa-integration__list dd{flex:0 0 auto;min-width:0;width:100%;margin:0;color:var(--sl-page-text,#4a4a4a);font-size:14px;line-height:1.5}
}

/* Section backgrounds: white / #f5f5f5 only, starting with white. */
.sl-csa-page .sl-section--alt{background:transparent}
body.sl-csa-page main>section:nth-of-type(odd),
body.sl-csa-page main>section.sl-section:nth-of-type(odd){background-color:var(--sl-page-white,#fff)}
body.sl-csa-page main>section:nth-of-type(even),
body.sl-csa-page main>section.sl-section:nth-of-type(even){background-color:var(--sl-page-bg,#f5f5f5)}

/* Campaign footer */
.sl-csa-footer{background:var(--sl-page-navy,#16234e);color:rgba(255,255,255,.88);padding:40px 16px 44px;font-size:14px;line-height:1.5}
.sl-csa-footer__meta{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;padding:0 0 20px;margin:0 0 18px;border-bottom:1px solid rgba(107,124,147,.28)}
.sl-csa-footer__tagline,.sl-csa-footer__email,.sl-csa-footer__copyright{margin:0;color:rgba(255,255,255,.88);font-size:13px;line-height:1.55}
.sl-csa-footer__email a{color:#fff;text-decoration:none}
.sl-csa-footer__conditions{border:0;margin:0;padding:0}
.sl-csa-footer__conditions-toggle{cursor:pointer;display:inline-flex;align-items:center;gap:10px;list-style:none;color:rgba(107,124,147,.95);font-size:13px;font-weight:500;line-height:1.4}
.sl-csa-footer__conditions-toggle::-webkit-details-marker{display:none}
.sl-csa-footer__conditions-toggle::before{content:"";width:0;height:0;border-top:5px solid transparent;border-bottom:5px solid transparent;border-left:7px solid rgba(107,124,147,.95);flex-shrink:0}
.sl-csa-footer__conditions[open] .sl-csa-footer__conditions-toggle{color:rgba(255,255,255,.88)}
.sl-csa-footer__conditions[open] .sl-csa-footer__conditions-toggle::before{border-left-color:rgba(255,255,255,.88)}
.sl-csa-footer__conditions-panel{max-width:72rem;margin-top:12px}
.sl-csa-footer__conditions-panel p{margin:0;color:rgba(107,124,147,.95);font-size:12px;line-height:1.65}
@media(min-width:768px){.sl-csa-footer{padding:48px 16px 52px}.sl-csa-footer__meta{grid-template-columns:minmax(0,1fr) auto minmax(0,1fr);align-items:center;gap:24px 40px;padding-bottom:24px;margin-bottom:20px}.sl-csa-footer__tagline,.sl-csa-footer__email,.sl-csa-footer__copyright{font-size:14px}.sl-csa-footer__tagline{justify-self:start;max-width:34rem}.sl-csa-footer__email{justify-self:center;text-align:center}.sl-csa-footer__copyright{justify-self:end;text-align:right;max-width:22rem}.sl-csa-footer__conditions-panel p{font-size:13px;line-height:1.7}}

