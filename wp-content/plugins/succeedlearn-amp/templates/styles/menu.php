<?php
/**
 * Menu / header AMP styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sl_amp_scroll_offset = function_exists( 'succeedlearn_amp_get_scroll_offset' )
	? succeedlearn_amp_get_scroll_offset()
	: 120;
?>
:root{--sl-navy:#16234d;--sl-navy-deep:#0f1a3a;--sl-accent:#135db7;--sl-cream:#f4f3ee;--sl-text:#1a1a1a;--sl-muted:#4a5568;--sl-side-pad:20px;--sl-amp-scroll-offset:<?php echo (int) $sl_amp_scroll_offset; ?>px}
html,body{background:#fff;color:var(--sl-text)}
html{scroll-padding-top:var(--sl-amp-scroll-offset)}
body{padding-top:80px;font-family:var(--slf-font-body,"Space Grotesk",system-ui,sans-serif);margin:0;line-height:1.5}
@media(min-width:1025px){body{padding-top:108px}}
.sl-post__body h2[id]::before,.sl-post__related h2[id]::before,section[id]::before{display:block;content:"";height:var(--sl-amp-scroll-offset);margin-top:calc(-1 * var(--sl-amp-scroll-offset));visibility:hidden;pointer-events:none}
#sl-page-top::before{display:none;height:0;margin:0}
#wpadminbar{display:none!important}

/* ── Site header ── */
.amp-site-header{position:fixed;top:0;left:0;right:0;z-index:1000;background:#fff;border-bottom:1px solid rgba(74, 74, 74, 0.35);height:68px;box-shadow:none}
.amp-site-header__inner{display:flex;align-items:center;justify-content:space-between;padding:0 16px;height:68px;max-width:1200px;margin:0 auto;gap:12px}
.amp-site-header__logo{display:flex;align-items:center;flex-shrink:0;line-height:0;max-width:calc(100% - 56px)}
.amp-site-header__logo amp-img,.amp-site-header__logo img{display:block;max-width:140px;max-height:48px}
.amp-site-header__toggle{background:transparent;border:0;width:44px;height:44px;display:flex;flex-direction:column;justify-content:center;align-items:center;gap:5px;cursor:pointer;padding:10px;margin:0;flex-shrink:0;border-radius:8px;-webkit-tap-highlight-color:transparent}
.amp-site-header__toggle span{display:block;width:20px;height:2px;background:var(--sl-navy);border-radius:1px}

/* ── Sidebar shell ── */
amp-sidebar.sl-amp-sidebar{background:#fff;color:var(--sl-navy);width:min(340px,88vw);max-width:340px;padding:0;max-height:100vh;overflow-x:hidden;overflow-y:auto;box-shadow:-8px 0 28px rgba(15,26,58,.18)}
.sl-amp-sidebar__top{display:flex;align-items:center;justify-content:space-between;gap:12px;min-height:68px;padding:14px var(--sl-side-pad);border-bottom:1px solid #eef0f5;background:#fff;box-sizing:border-box}
.sl-amp-sidebar__brand{display:flex;align-items:center;line-height:0;flex:1 1 auto;min-width:0}
.sl-amp-sidebar__brand amp-img,.sl-amp-sidebar__brand img{display:block;max-width:130px;max-height:44px}
.sl-amp-sidebar__close{width:40px;height:40px;border:0;border-radius:8px;background:#f4f5f8;color:var(--sl-navy);font-size:26px;line-height:1;display:inline-flex;align-items:center;justify-content:center;cursor:pointer;padding:0;margin:0;flex:0 0 40px;-webkit-tap-highlight-color:transparent}
.sl-amp-sidebar__close span{display:block;margin-top:-2px}

/* Hide AMP's built-in sidebar close control (we use our own). */
amp-sidebar.sl-amp-sidebar>button[on*="sidebar.close"]:not(.sl-amp-sidebar__close),
amp-sidebar.sl-amp-sidebar>button[aria-label="Close the sidebar"]{display:none!important}

/* ── Nav list ── */
.sl-amp-sidebar__nav{padding:8px 0 16px}
.sl-amp-sidebar__list{list-style:none;margin:0;padding:0}
.sl-amp-sidebar__item{margin:0;border-bottom:1px solid #eef0f5}
.sl-amp-sidebar__item:last-child{border-bottom:0}
.sl-amp-sidebar__link{display:block;box-sizing:border-box;padding:16px var(--sl-side-pad);color:var(--sl-navy);text-decoration:none;font-size:16px;font-weight:600;line-height:1.35;-webkit-tap-highlight-color:transparent}
.sl-amp-sidebar__link--top{padding:16px var(--sl-side-pad)}

/* ── Accordion parent ── */
.sl-amp-sidebar__accordion{width:100%;margin:0;padding:0}
.sl-amp-sidebar__accordion section{margin:0;border:0;background:transparent;width:100%}
.sl-amp-sidebar__accordion section:not([expanded])>:not(:first-child){display:none!important}
.sl-amp-sidebar__accordion section>:first-child{background:#fff!important;background-image:none!important;border:0!important;margin:0!important}
.sl-amp-sidebar__accordion section>:first-child::after{display:none!important;content:none!important;border:0!important;width:0!important;height:0!important}
.sl-amp-sidebar__parent-title{display:flex;align-items:center;justify-content:space-between;gap:12px;width:100%;margin:0;padding:16px var(--sl-side-pad);font-size:16px;font-weight:600;line-height:1.35;color:var(--sl-navy);background:#fff;border:0;cursor:pointer;box-sizing:border-box}
.sl-amp-sidebar__parent-label{flex:1 1 auto;min-width:0;text-align:left}
.sl-amp-sidebar__accordion section[expanded]>.sl-amp-sidebar__parent-title{color:var(--sl-accent)}
.sl-amp-sidebar__chevron{flex:0 0 auto;display:inline-flex;align-items:center;justify-content:center;width:24px;height:24px;margin-left:auto;color:#6b7a99;line-height:1}
.sl-amp-sidebar__chevron>span{display:block;font-size:28px;font-weight:400;line-height:1;font-family:Arial,"Helvetica Neue",sans-serif}
.sl-amp-sidebar__chevron>span:last-child{display:none;writing-mode:sideways-rl;text-orientation:sideways}
.sl-amp-sidebar__accordion section[expanded] .sl-amp-sidebar__chevron{color:var(--sl-accent)}
.sl-amp-sidebar__accordion section[expanded] .sl-amp-sidebar__chevron>span:first-child{display:none}
.sl-amp-sidebar__accordion section[expanded] .sl-amp-sidebar__chevron>span:last-child{display:block}

.sl-amp-sidebar__children{padding:4px 0 10px;background:#f7f8fb;border-top:1px solid #eef0f5;box-sizing:border-box}
.sl-amp-sidebar__link--child{display:block;box-sizing:border-box;margin:0;padding:12px var(--sl-side-pad) 12px 28px;color:#2a3d6b;font-size:14px;font-weight:500;line-height:1.4;text-decoration:none;background:transparent;border:0;border-radius:0;box-shadow:none;-webkit-tap-highlight-color:transparent}
.sl-amp-sidebar__link--child:active{color:var(--sl-accent);background:rgba(19,93,183,.08)}

/* ── Sidebar footer CTA ── */
.sl-amp-sidebar__footer{padding:18px var(--sl-side-pad) 28px;border-top:1px solid #eef0f5;background:#fff;margin-top:8px}
.sl-amp-btn{display:block;width:100%;box-sizing:border-box;text-align:center;background:var(--sl-btn-primary-fill,linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%));background-color:transparent;color:#fff!important;text-decoration:none;padding:14px 18px;border-radius:10px;border:1px solid transparent;font-weight:700;font-size:15px;line-height:1.2;box-shadow:0 6px 16px var(--sl-btn-primary-shadow,rgba(234,62,36,.28))}
.sl-amp-sidebar__email{display:block;margin-top:14px;text-align:center;color:#4a5568;font-size:14px;text-decoration:none;word-break:break-word}
