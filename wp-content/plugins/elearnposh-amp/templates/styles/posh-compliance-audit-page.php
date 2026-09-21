<?php
/**
 * POSH Compliance Audit AMP page chrome styles (matches desktop page template).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* After menu.css — keep content clear of the fixed AMP header */
body{padding-top:110px !important}
@media (max-width:640px){body{padding-top:100px !important}}
.ep-posh-audit-page{width:100%;background:#fff;min-height:60vh;padding:0;margin:0 0 40px}
.ep-posh-audit-hero{padding:36px 0 20px;background:transparent;border-bottom:0}
.ep-posh-audit-hero__inner{width:min(1160px,calc(100vw - 32px));margin:0 auto}
.ep-posh-audit-hero__grid{display:grid;grid-template-columns:1fr;gap:24px;align-items:center;margin-top:8px}
.ep-posh-audit-hero__content{max-width:52rem;min-width:0}
.ep-posh-audit-hero__media{margin:0;min-width:0;width:100%;display:flex;align-items:center;justify-content:center}
.ep-posh-audit-hero__media amp-img{width:100%;max-width:560px}
.ep-posh-audit-hero h1{margin:12px 0 10px;font-size:clamp(1.3rem,.98rem + 1vw,1.85rem);line-height:1.25;font-weight:700;color:#002a38;letter-spacing:-.01em}
.ep-posh-audit-hero__subtitle{margin:0 0 14px}
.ep-posh-audit-hero__desc{margin:0;color:#54708d;font-size:15px;line-height:1.7}
.ep-posh-audit-hero__desc p{margin:0 0 10px}
.ep-posh-audit-hero__desc p:last-child{margin-bottom:0}
.ep-posh-audit-hero__points{margin-top:24px}
.ep-posh-audit-hero__points-title{margin:0 0 14px;font-size:clamp(1.05rem,.98rem + .4vw,1.25rem);line-height:1.35;font-weight:700;color:#002a38;letter-spacing:-.01em}
.ep-posh-audit-hero__checks{list-style:none;list-style-type:none;margin:0;padding:0;display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px 16px}
.ep-posh-audit-hero__checks>li{display:flex;align-items:flex-start;gap:12px;margin:0;padding:14px 16px;list-style:none;list-style-type:none;border:1px solid #d9e4f0;border-radius:14px;background:#fff;color:#2f4358;font-size:14px;font-weight:600;line-height:1.5;box-shadow:0 4px 12px rgba(12,42,72,.04)}
.ep-posh-audit-hero__checks>li::before,.ep-posh-audit-hero__checks>li::marker{content:none;display:none}
.ep-posh-audit-hero__tick{flex:0 0 22px;width:22px;height:22px;margin-top:1px;border-radius:50%;background:#088BA9;display:inline-flex;align-items:center;justify-content:center;position:relative}
.ep-posh-audit-hero__tick::after{content:"";width:6px;height:10px;border:solid #fff;border-width:0 2px 2px 0;transform:rotate(45deg);margin-top:-2px}
.ep-posh-audit-page__inner{width:min(1160px,calc(100% - 32px));margin:0 auto;padding:24px 0 40px;border-top:0}
.ep-posh-audit-page .epa-topbar{display:none}
.ep-posh-audit-about{width:100%;margin:0;padding:0;background:#fff;border-top:0}
.ep-posh-audit-about__inner{width:min(1160px,calc(100% - 32px));margin:0 auto}
.ep-posh-audit-about__grid{display:grid;grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:clamp(20px,4vw,40px);align-items:center;box-sizing:border-box;border:1px solid #d5e6fa;background:#fff;border-radius:18px;padding:clamp(18px,3vw,28px);box-shadow:0 12px 28px rgba(17,58,94,.08)}
.ep-posh-audit-about__copy{min-width:0}
.ep-posh-audit-about h2{margin:0 0 14px;font-size:clamp(1.3rem,1.05rem + .8vw,1.65rem);line-height:1.25;font-weight:600;color:#002a38;letter-spacing:-.01em}
.ep-posh-audit-about p{margin:0 0 12px;color:#54708d;font-size:15px;line-height:1.7}
.ep-posh-audit-about p:last-child{margin-bottom:0}
.ep-posh-audit-about__media{margin:0;min-width:0;width:100%}
.ep-posh-audit-about__media amp-img{width:100%;max-width:100%;border-radius:12px}
.ep-posh-audit-faq{width:100%;margin:0;padding:clamp(32px,5vw,56px) 0;background:#fff;border-top:0}
.ep-posh-audit-faq .pfe-section{padding:0}
.ep-posh-audit-faq .pfe-wrap{width:min(1160px,calc(100% - 32px));margin:0 auto;box-sizing:border-box}
.ep-posh-audit-faq .pfe-title{margin:0 0 18px;font-size:clamp(1.35rem,1.1rem + .8vw,1.85rem);line-height:1.28;font-weight:700;color:#002a38;letter-spacing:-.02em}
.ep-posh-audit-faq .faq-a ul{list-style:none;margin:4px 0 0;padding:0}
.ep-posh-audit-faq .faq-a ul>li{position:relative;margin:0 0 8px;padding-left:30px;list-style:none}
.ep-posh-audit-faq .faq-a ul>li:last-child{margin-bottom:0}
.ep-posh-audit-faq .faq-a ul>li::before{content:"";position:absolute;left:0;top:4px;width:18px;height:18px;border-radius:50%;background:#088BA9}
.ep-posh-audit-faq .faq-a ul>li::after{content:"";position:absolute;left:6px;top:7px;width:5px;height:9px;border:solid #fff;border-width:0 2px 2px 0;transform:rotate(45deg)}
.epa-amp-fallback{background:#fff;border:1px solid #e7e9ee;border-radius:14px;padding:24px;text-align:center;color:#667085}
#posh-audit-faq .faq-q:focus,#posh-audit-faq .faq-q:focus-visible,#posh-audit-faq amp-accordion section:focus{outline:none;box-shadow:none}
@media (min-width:992px){.ep-posh-audit-hero__grid{grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);gap:32px 40px}.ep-posh-audit-hero__content{max-width:none}.ep-posh-audit-hero__media{justify-content:flex-end}}
@media (max-width:1200px){.ep-posh-audit-hero h1{font-size:clamp(1.25rem,1rem + .65vw,1.65rem)}}
@media (max-width:900px){.ep-posh-audit-about__grid{grid-template-columns:1fr}.ep-posh-audit-about__media{max-width:520px;margin:0 auto}}
@media (max-width:720px){.ep-posh-audit-hero__checks{grid-template-columns:1fr}.ep-posh-audit-hero h1{font-size:1.2rem;line-height:1.3}}
@media (max-width:640px){.ep-posh-audit-hero__inner,.ep-posh-audit-about__inner,.ep-posh-audit-faq .pfe-wrap{width:min(1160px,calc(100vw - 24px))}.ep-posh-audit-hero h1{font-size:1.15rem}}
