<?php
/**
 * Global Security Behaviour & Culture Suite (SBCS): AMP styles.
 *
 * Mirrors theme assets/css/sl-global-sbcs.css at tablet/mobile widths.
 * Rendered by succeedlearn_amp_render_sbcs().
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-sbcs{--sl-sbcs-navy:var(--sl-page-navy,#16234e);--sl-sbcs-primary:var(--sl-page-primary,#1472ba);--sl-sbcs-text:var(--sl-page-text,#4A4A4A);padding:52px 16px 60px;background:#fff}
.sl-sbcs.sl-sbcs--bg-soft{background:var(--sl-page-bg,#F5F3EF)}
.sl-sbcs__intro{width:100%;margin:0 0 32px}
.sl-sbcs__intro .sl-home-sub-heading{display:block;margin:0 0 14px;color:var(--sl-sbcs-primary)}
.sl-sbcs__intro h2{margin:0 0 18px;color:var(--sl-sbcs-navy)}
.sl-sbcs__intro h2>span{color:var(--sl-sbcs-primary)}
.sl-sbcs__intro p{margin:0;max-width:none;color:var(--sl-sbcs-text);font-size:16px;line-height:1.65}
.sl-sbcs__media{width:100%;max-width:520px;margin:0 auto 28px}
.sl-sbcs__image{width:100%;overflow:hidden;border:1px solid rgba(22,35,78,.1);border-radius:12px;background:#fff;box-shadow:0 12px 32px rgba(22,35,78,.08);box-sizing:border-box}
.sl-sbcs__image amp-img{display:block}
.sl-sbcs__journey{position:relative;display:flex;flex-direction:column;gap:18px;min-width:0}
.sl-sbcs__journey::before{content:"";position:absolute;top:16px;bottom:16px;left:16px;width:2px;background:rgba(20,114,186,.18)}
.sl-sbcs__step{position:relative;display:grid;grid-template-columns:34px minmax(0,1fr);gap:14px;align-items:start}
.sl-sbcs__step-marker{position:relative;z-index:1;display:flex;align-items:center;justify-content:center;width:34px;height:34px;box-sizing:border-box;border:1px solid rgba(20,114,186,.22);border-radius:50%;background:#fff;box-shadow:0 2px 8px rgba(22,35,78,.06);color:var(--sl-sbcs-primary);font-size:12px;font-weight:700;line-height:1}
.sl-sbcs__step-content{min-width:0;padding:2px 0 18px;border-bottom:1px solid rgba(22,35,78,.1)}
.sl-sbcs__step:last-child .sl-sbcs__step-content{padding-bottom:0;border-bottom:0}
.sl-sbcs__step-heading{display:flex;align-items:center;flex-wrap:wrap;gap:6px 10px;margin:0 0 6px}
.sl-sbcs .sl-sbcs__step-heading .sl-panel-title{margin:0;color:var(--sl-sbcs-primary);font-size:18px;font-weight:700;line-height:1.3}
.sl-sbcs__step-action{display:inline-flex;align-items:center;padding:4px 8px;border-radius:999px;background:rgba(20,114,186,.08);color:var(--sl-sbcs-primary);font-size:12px;font-weight:700;line-height:1.2}
.sl-sbcs .sl-sbcs__step-content p{margin:0;color:var(--sl-sbcs-text);font-size:15px;line-height:1.6}
.sl-sbcs__closing{max-width:820px;margin:28px 0 0}
.sl-sbcs .sl-sbcs__closing p{margin:0;color:var(--sl-sbcs-navy);font-size:16px;line-height:1.6}
.sl-sbcs__closing strong{font-weight:700}

@media(min-width:768px){
	.sl-sbcs{padding:64px 24px 72px}
	.sl-sbcs__intro{margin-bottom:40px}
	.sl-sbcs__media{margin-bottom:36px}
	.sl-sbcs__image{border-radius:16px}
	.sl-sbcs__journey{gap:24px}
	.sl-sbcs__journey::before{top:20px;bottom:20px;left:19px}
	.sl-sbcs__step{grid-template-columns:40px minmax(0,1fr);gap:18px}
	.sl-sbcs__step-marker{width:40px;height:40px}
	.sl-sbcs__step-content{padding:4px 0 22px}
	.sl-sbcs__step-heading{gap:8px 12px}
	.sl-sbcs .sl-sbcs__step-heading .sl-panel-title{font-size:20px}
	.sl-sbcs__step-action{padding:4px 10px;font-size:13px}
	.sl-sbcs__closing{margin-top:40px}
	.sl-sbcs .sl-sbcs__closing p{font-size:17px}
}
