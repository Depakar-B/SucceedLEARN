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
#scrollToTopButton,.btt,#scrollTopBtn{display:none!important}#sl-scroll-top.sl-scroll-top-wrap{position:fixed;right:16px;bottom:20px;z-index:900;display:block}.sl-scroll-top{display:flex;align-items:center;justify-content:center;width:44px;height:44px;padding:0;margin:0;background:#1472ba;color:#fff;cursor:pointer;box-shadow:0 6px 18px rgba(20,114,186,.38);border-radius:8px;border:0;box-sizing:border-box;-webkit-appearance:none;appearance:none;text-decoration:none}.sl-scroll-top:focus{outline:none}.sl-scroll-top:focus-visible{outline:3px solid rgba(20,114,186,.45);outline-offset:3px}.sl-scroll-top__icon{display:block;width:14px;height:14px;border-left:3px solid #fff;border-top:3px solid #fff;transform:rotate(45deg) translate(1px,3px);pointer-events:none}@media (max-width:640px){.sl-scroll-top-wrap{right:14px}.sl-scroll-top{width:40px;height:40px}.sl-scroll-top__icon{width:12px;height:12px}}
