<?php
/**
 * Scroll-to-top styles (shared look with non-AMP theme).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
#scrollToTopButton,.btt,#scrollTopBtn{display:none!important}#sl-scroll-top.sl-scroll-top-wrap{position:fixed;right:16px;bottom:20px;z-index:900;display:block}.sl-scroll-top{display:flex;align-items:center;justify-content:center;width:44px;height:44px;padding:0;margin:0;background:var(--sl-chrome-fill,linear-gradient(180deg,#4d7ed6 0%,#1a3b87 100%));background-color:transparent;color:#fff;cursor:pointer;box-shadow:0 6px 18px rgba(26,59,135,.38);border-radius:8px;border:1px solid transparent;box-sizing:border-box;-webkit-appearance:none;appearance:none;text-decoration:none}.sl-scroll-top:focus{outline:none}.sl-scroll-top:focus-visible{outline:3px solid rgba(19,93,183,.45);outline-offset:3px}.sl-scroll-top__icon{display:block;width:14px;height:14px;border-left:3px solid #fff;border-top:3px solid #fff;transform:rotate(45deg) translate(1px,3px);pointer-events:none}@media (max-width:640px){.sl-scroll-top-wrap{right:14px}.sl-scroll-top{width:40px;height:40px}.sl-scroll-top__icon{width:12px;height:12px}}
