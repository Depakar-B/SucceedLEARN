<?php
/**
 * Workplace Harassment Prevention Training — AMP page styles (single file for all sections).
 *
 * CTA fills come from global-ui.php (.sl-btn--primary / .sl-btn--secondary).
 * Page CSS only handles CTA layout (size, gap, width).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-whp-page{--sl-page-navy:#16234e;--sl-page-primary:#1472ba;--sl-page-primary-dark:#283384;--sl-page-primary-soft:rgba(109,195,235,.16);--sl-page-cta:#ea3e24;--sl-page-text:#4A4A4A;--sl-page-muted:#6B7C93;--sl-page-bg:#f5f5f5;--sl-page-white:#fff}
.sl-whp-page .sl-eyebrow,.sl-whp-page .sl-home-sub-heading{display:inline-block;margin:0 0 12px;font-size:13px;font-weight:600;letter-spacing:.02em;color:var(--sl-page-primary)}
.sl-whp-page .sl-home-sub-heading::before{content:"";display:inline-block;width:28px;height:2px;margin-right:10px;vertical-align:middle;background:var(--sl-page-primary);border-radius:999px}
.sl-whp-page h1,.sl-whp-page h2{color:var(--sl-page-navy)}
.sl-whp-page h2>span,.sl-whp-page h1>span,.sl-whp-page .sl-h2 span{color:var(--sl-page-primary)}

/* Hero — layout only; button look from global-ui */
.sl-whp-page .sl-harassment-hero.sl-section{padding:40px 16px;background:var(--sl-page-bg)}
.sl-harassment-hero__grid{display:grid;grid-template-columns:minmax(0,1fr);align-items:center;gap:32px}
.sl-harassment-hero__content{min-width:0}
.sl-harassment-hero__heading{margin-bottom:22px}
.sl-harassment-hero__heading h1{margin:0 0 14px;font-size:var(--sl-fs-hero-h1);font-weight:700;line-height:1.15;color:var(--sl-page-navy)}
.sl-harassment-hero__heading h2{margin:0;font-size:18px;font-weight:700;line-height:1.35;color:var(--sl-page-primary)}
.sl-harassment-hero__intro{max-width:760px}
.sl-harassment-hero__intro p{margin:0 0 14px;font-size:15px;line-height:1.7;color:var(--sl-page-text)}
.sl-harassment-hero__intro p:last-child{margin-bottom:0}
.sl-harassment-hero__actions{display:flex;flex-direction:column;flex-wrap:nowrap;align-items:stretch;gap:12px;margin-top:28px}
.sl-harassment-hero__cta,.sl-whp-page .sl-harassment-hero__actions .sl-btn.sl-harassment-hero__cta{display:inline-flex;align-items:center;justify-content:center;gap:10px;width:100%;max-width:100%;margin:0;flex:0 0 auto;padding:13px 20px;text-align:center;box-sizing:border-box;white-space:normal}
.sl-harassment-hero__cta svg{width:18px;height:18px;flex:0 0 auto;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.sl-harassment-hero__visual{width:100%;min-width:0;max-width:560px;margin:8px auto 0}
.sl-harassment-hero__image-placeholder{display:flex;align-items:center;justify-content:center;width:100%;min-height:280px;aspect-ratio:4/3;border:1px dashed rgba(20,114,186,.28);border-radius:18px;background:var(--sl-page-white);color:var(--sl-page-primary)}
.sl-harassment-hero__placeholder-content{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px;padding:24px;text-align:center}
.sl-harassment-hero__placeholder-icon{display:inline-flex;align-items:center;justify-content:center;width:68px;height:68px;border-radius:16px;background:rgba(20,114,186,.08)}
.sl-harassment-hero__placeholder-icon svg{display:block;width:34px;height:34px;fill:none;stroke:currentColor;stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round}
.sl-harassment-hero__placeholder-title{font-size:15px;font-weight:700;color:var(--sl-page-navy)}
.sl-harassment-hero__placeholder-size{font-size:13px;color:var(--sl-page-muted)}
@media(max-width:767px){.sl-whp-page .sl-harassment-hero__actions{flex-direction:column;align-items:stretch}.sl-whp-page .sl-harassment-hero__actions .sl-harassment-hero__cta,.sl-whp-page .sl-harassment-hero__actions .sl-btn.sl-harassment-hero__cta{width:100%;max-width:100%;white-space:normal}}
@media(min-width:768px){.sl-whp-page .sl-harassment-hero.sl-section{padding:56px 16px}.sl-harassment-hero__heading h2{font-size:20px}.sl-whp-page .sl-harassment-hero__actions{flex-direction:row;flex-wrap:wrap;align-items:center;justify-content:flex-start;gap:12px}.sl-whp-page .sl-harassment-hero__actions .sl-harassment-hero__cta,.sl-whp-page .sl-harassment-hero__actions .sl-btn.sl-harassment-hero__cta{width:auto;max-width:none;flex:0 0 auto;align-self:center;white-space:nowrap}.sl-harassment-hero__visual{margin-top:16px}.sl-harassment-hero__image-placeholder{min-height:420px;aspect-ratio:720/760}}
@media(min-width:1000px){.sl-whp-page .sl-harassment-hero.sl-section{padding:72px 16px}.sl-harassment-hero__grid{grid-template-columns:minmax(0,1.08fr) minmax(320px,.82fr);gap:48px}.sl-harassment-hero__heading h2{font-size:22px}.sl-harassment-hero__visual{max-width:none;margin:0}.sl-harassment-hero__image-placeholder{min-height:520px}}

/* Training by region */
.sl-whp-page .sl-harassment-regions.sl-section{padding:48px 16px;background:var(--sl-page-white)}
.sl-harassment-regions__heading{margin:0 0 28px;max-width:760px}
.sl-harassment-regions__heading .sl-h2{margin:0}
.sl-harassment-regions__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:14px}
.sl-harassment-regions__card{display:flex;flex-direction:column;align-items:flex-start;min-width:0;padding:22px 20px;border:1px solid rgba(20,114,186,.16);border-radius:16px;background:var(--sl-page-white);box-sizing:border-box}
.sl-harassment-regions__number{display:inline-flex;align-items:center;justify-content:center;width:42px;height:42px;margin:0 0 20px;border-radius:8px;background:rgba(20,114,186,.08);color:var(--sl-page-primary);font-size:14px;font-weight:700}
.sl-harassment-regions__text{margin:0;font-size:15px;line-height:1.55;color:var(--sl-page-text)}
.sl-harassment-regions__footer{display:flex;flex-direction:column;align-items:stretch;gap:20px;margin-top:28px}
.sl-harassment-regions__message{padding:20px;border:1px solid rgba(14,159,74,.18);border-radius:12px;background:rgba(14,159,74,.06)}
.sl-harassment-regions__message p{margin:0;font-size:15px;line-height:1.6;color:var(--sl-page-text)}
.sl-harassment-regions__cta,.sl-whp-page .sl-harassment-regions__cta.sl-btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;width:100%;max-width:100%;margin:0;padding:13px 20px;box-sizing:border-box}
.sl-harassment-regions__cta svg{width:18px;height:18px;flex:0 0 auto;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
@media(min-width:700px){.sl-harassment-regions__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}.sl-harassment-regions__card{min-height:160px;padding:26px 24px}.sl-harassment-regions__number{margin-bottom:24px}.sl-harassment-regions__footer{flex-direction:row;align-items:center;gap:24px;margin-top:36px}.sl-harassment-regions__message{flex:1;min-width:0;padding:24px 28px}.sl-harassment-regions__cta,.sl-whp-page .sl-harassment-regions__cta.sl-btn{width:auto;max-width:none;flex:0 0 auto;white-space:nowrap}}
@media(min-width:1000px){.sl-whp-page .sl-harassment-regions.sl-section{padding:64px 16px}.sl-harassment-regions__grid{grid-template-columns:repeat(4,minmax(0,1fr));gap:20px}.sl-harassment-regions__card{min-height:190px}}
