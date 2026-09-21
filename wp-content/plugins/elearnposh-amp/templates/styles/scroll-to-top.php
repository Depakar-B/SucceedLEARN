<?php
/**
 * Scroll-to-top button styles (included in amp-custom when listed explicitly).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.ep-scroll-marker{display:none}#ep-scroll-to-top.ep-scroll-to-top-wrap{position:fixed;right:22px;bottom:20px;z-index:99999;opacity:1 !important;visibility:visible !important;pointer-events:auto !important;display:block !important}.ep-scroll-to-top{display:flex;align-items:center;justify-content:center;width:44px;height:44px;padding:0;margin:0;background:#1472ba;color:#ffffff;cursor:pointer;box-shadow:0 6px 18px rgba(20,114,186,0.38);border-radius:6px;border:0;box-sizing:border-box;-webkit-appearance:none;appearance:none;text-decoration:none}.ep-scroll-to-top:hover{background:#0f5a95}.ep-scroll-to-top:focus{outline:none}.ep-scroll-to-top:focus-visible{outline:3px solid rgba(20,114,186,0.45);outline-offset:3px}.ep-scroll-to-top__icon{display:block;width:14px;height:14px;border-left:3px solid #ffffff;border-top:3px solid #ffffff;transform:rotate(45deg) translate(1px,3px);pointer-events:none}body:has(#ep-bottom-bar) .ep-scroll-to-top-wrap{bottom:76px}body:has(#ep-bottom-bar.ep-bottom-bar--webinar) .ep-scroll-to-top-wrap{bottom:84px}body:has(#ep-bottom-bar.ep-bottom-bar--whatsapp-only) .ep-scroll-to-top-wrap{bottom:68px}@media (max-width:640px){body:has(#ep-bottom-bar) .ep-scroll-to-top-wrap{bottom:100px}body:has(#ep-bottom-bar.ep-bottom-bar--webinar) .ep-scroll-to-top-wrap{bottom:108px}body:has(#ep-bottom-bar.ep-bottom-bar--whatsapp-only) .ep-scroll-to-top-wrap{bottom:64px}.ep-scroll-to-top-wrap{right:14px}.ep-scroll-to-top{width:40px;height:40px}.ep-scroll-to-top__icon{width:12px;height:12px}}