<?php
/**
 * AMP global hero / content button UI (shape + fills).
 *
 * Mirrors desktop sl-global-ui-buttons.css.
 * Prefer these over inventing per-page button chrome.
 *
 * Hero:    .sl-hero-actions > .sl-hero-btn.sl-hero-btn-primary|secondary
 * Content: .sl-content-actions > .sl-content-btn.sl-content-btn-primary|secondary
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
:root{
	--sl-ui-btn-min-height:48px;
	--sl-ui-btn-padding:13px 20px;
	--sl-ui-btn-radius:8px;
	--sl-ui-btn-gap:10px;
	--sl-ui-btn-font-size:15px;
	--sl-ui-btn-font-weight:700;
	--sl-ui-btn-arrow-size:18px
}
.sl-hero-actions,.sl-content-actions{
	display:flex;
	flex-wrap:wrap;
	align-items:center;
	gap:14px;
	margin-top:28px
}
.sl-hero-btn,.sl-content-btn{
	display:inline-flex;
	align-items:center;
	justify-content:center;
	gap:var(--sl-ui-btn-gap);
	width:fit-content;
	max-width:100%;
	min-width:0;
	min-height:var(--sl-ui-btn-min-height);
	margin:0;
	padding:var(--sl-ui-btn-padding);
	border-radius:var(--sl-ui-btn-radius);
	box-sizing:border-box;
	font-family:inherit;
	font-size:var(--sl-ui-btn-font-size);
	font-weight:var(--sl-ui-btn-font-weight);
	line-height:1.3;
	text-align:center;
	text-decoration:none;
	white-space:nowrap;
	cursor:pointer
}
.sl-hero-btn span,.sl-content-btn span{
	font-size:var(--sl-ui-btn-arrow-size);
	line-height:1
}
a.sl-hero-btn-primary,a.sl-content-btn-primary,
button.sl-hero-btn-primary,button.sl-content-btn-primary,
a.sl-hero-btn-primary:visited,a.sl-content-btn-primary:visited{
	background:var(--sl-btn-primary-fill,linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%))!important;
	background-color:transparent!important;
	border:1px solid transparent!important;
	color:#fff!important;
	box-shadow:0 6px 16px var(--sl-btn-primary-shadow,rgba(234,62,36,.28))
}
a.sl-hero-btn-secondary,a.sl-content-btn-secondary,
button.sl-hero-btn-secondary,button.sl-content-btn-secondary,
a.sl-hero-btn-secondary:visited,a.sl-content-btn-secondary:visited{
	background:linear-gradient(var(--sl-btn-secondary-surface,var(--sl-page-white,#fff)),var(--sl-btn-secondary-surface,var(--sl-page-white,#fff))) padding-box,var(--sl-btn-primary-fill,linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%)) border-box!important;
	background-color:transparent!important;
	border:2px solid transparent!important;
	color:var(--sl-btn-secondary-color,var(--sl-page-cta,#ea3e24))!important;
	box-shadow:none
}
.sl-csa-page .sl-hero-btn-secondary,
.sl-csa-page .sl-content-btn-secondary,
.sl-whp-page .sl-hero-btn-secondary,
.sl-whp-page .sl-content-btn-secondary,
.sl-gwct-page .sl-hero-btn-secondary,
.sl-gwct-page .sl-content-btn-secondary,
.sl-infosec-2026-cyber-page .sl-hero-btn-secondary,
.sl-infosec-2026-cyber-page .sl-content-btn-secondary,
.sl-dpdpa-page .sl-hero-btn-secondary,
.sl-dpdpa-page .sl-content-btn-secondary{
	--sl-btn-secondary-surface:var(--sl-page-bg,#f5f5f5)
}
@media(max-width:767px){
	.sl-hero-actions,.sl-content-actions{flex-direction:column;align-items:stretch}
	.sl-hero-btn,.sl-content-btn{width:100%;white-space:normal}
}
