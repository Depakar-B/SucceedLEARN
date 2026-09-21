<?php
/**
 * Shared FAQ amp-accordion styles with smooth open/close transitions.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
#pfe-faq amp-accordion section,#ic-faq amp-accordion section,#posh-audit-faq amp-accordion section{border:1px solid rgba(20,114,186,.18);border-radius:10px;margin-bottom:12px;overflow:hidden;background:#fff;transition:box-shadow .5s cubic-bezier(.4,0,.2,1),border-color .5s cubic-bezier(.4,0,.2,1)}
#pfe-faq amp-accordion section[expanded],#ic-faq amp-accordion section[expanded],#posh-audit-faq amp-accordion section[expanded]{box-shadow:0 4px 16px rgba(0,0,0,.08);border-color:rgba(20,114,186,.35)}
.faq-q{margin:0;padding:16px 64px 16px 16px;font-size:17px;font-weight:700;background:#fff;display:block;color:#1a1a1a;position:relative;transition:background-color .5s cubic-bezier(.4,0,.2,1),color .5s cubic-bezier(.4,0,.2,1);outline:none;-webkit-tap-highlight-color:transparent}
.faq-q:focus,.faq-q:focus-visible{outline:none;box-shadow:none}
#pfe-faq amp-accordion section:focus,#ic-faq amp-accordion section:focus,#posh-audit-faq amp-accordion section:focus,
#pfe-faq amp-accordion section > :first-child:focus,#ic-faq amp-accordion section > :first-child:focus,#posh-audit-faq amp-accordion section > :first-child:focus{outline:none}
#pfe-faq amp-accordion section[expanded]>.faq-q,#ic-faq amp-accordion section[expanded]>.faq-q,#posh-audit-faq amp-accordion section[expanded]>.faq-q{background:linear-gradient(180deg,#f8fbff 0%,#fff 100%);color:#1472ba}
.faq-q::before{content:"+";position:absolute;right:16px;top:50%;width:36px;height:36px;border-radius:8px;background:#1472ba;color:#fff;font-size:24px;font-weight:700;line-height:36px;text-align:center;transform:translateY(-50%);transition:background-color .35s ease}
.faq-q::after{content:none}
#pfe-faq amp-accordion section[expanded]>.faq-q::before,#ic-faq amp-accordion section[expanded]>.faq-q::before,#posh-audit-faq amp-accordion section[expanded]>.faq-q::before{content:"\2212";background:#0f5a95}
.faq-a{padding:0 16px 16px}
.faq-a p,.faq-a li{font-size:15px;line-height:1.7;color:#2c2c2c}
.faq-a ul{margin:8px 0 0;padding:0;list-style:none}
