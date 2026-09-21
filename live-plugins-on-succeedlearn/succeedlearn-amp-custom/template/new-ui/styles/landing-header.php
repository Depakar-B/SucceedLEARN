<?php
/**
 * Compact AMP landing header styles (logo + CTA, no menu).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-amp-landing-header{position:fixed;top:0;left:0;right:0;z-index:1000;background:rgba(255,255,255,.96);border-bottom:1px solid rgba(107,124,147,.18);height:68px;box-shadow:none}
.sl-amp-landing-header__inner{display:flex;align-items:center;justify-content:space-between;gap:12px;height:68px;max-width:1200px;margin:0 auto;padding:0 16px;box-sizing:border-box}
.sl-amp-landing-header__logo{display:flex;align-items:center;flex:0 1 auto;min-width:0;line-height:0;text-decoration:none}
.sl-amp-landing-header__logo amp-img,.sl-amp-landing-header__logo img{display:block;max-width:min(140px,42vw);max-height:40px}
.sl-amp-landing-header__cta,.sl-csa-page .sl-amp-landing-header__cta,.sl-infosec-2026-cyber-page .sl-amp-landing-header__cta{display:inline-flex;align-items:center;justify-content:center;gap:8px;flex:0 0 auto;width:auto;max-width:calc(100% - 150px);margin:0;padding:10px 14px;box-sizing:border-box;text-align:center;white-space:nowrap;font-size:13px;line-height:1.25}
.sl-amp-landing-header__cta svg{display:block;flex:0 0 auto;width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.sl-amp-landing-header__cta .sl-csa-oct-tag{color:inherit}
@media(max-width:480px){.sl-amp-landing-header__cta,.sl-csa-page .sl-amp-landing-header__cta,.sl-infosec-2026-cyber-page .sl-amp-landing-header__cta{padding:9px 12px;font-size:12px;white-space:normal}.sl-amp-landing-header__cta svg{display:none}}
@media(min-width:768px){.sl-amp-landing-header__cta,.sl-csa-page .sl-amp-landing-header__cta,.sl-infosec-2026-cyber-page .sl-amp-landing-header__cta{padding:11px 18px;font-size:14px}}
