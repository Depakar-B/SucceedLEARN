<?php
/**
 * AMP global highlight callout.
 *
 * Mirrors desktop sl-global-highlight.css.
 *
 * Markup:
 *   <div class="sl-highlight"><p>…</p></div>
 *   <p class="sl-highlight">…</p>
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-highlight{
	margin-top:24px;
	padding:18px 20px;
	border:1px solid #d8e2eb;
	border-left:4px solid var(--sl-page-primary,#1472ba);
	border-radius:10px;
	background:var(--sl-page-white,#fff);
	box-sizing:border-box;
	color:var(--sl-page-navy,#16234e);
	font-weight:700;
	line-height:1.6
}
.sl-highlight,.sl-highlight p{margin-bottom:0}
.sl-highlight p{margin-top:0;color:var(--sl-page-navy,#16234e);font-weight:700;line-height:1.6}
.sl-highlight p+p{margin-top:10px}
@media(max-width:767px){
	.sl-highlight{margin-top:18px;padding:16px}
}
