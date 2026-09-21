<?php
/**
 * AMP global foundation — brand tokens, headings, eyebrows, title accents.
 *
 * Mirrors desktop sl-page-foundation.css + title-accent + main heading scales.
 * Page CSS should set layout only; reuse these classes/tokens.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
:root{
	--sl-page-navy:#16234e;
	--sl-page-primary:#1472ba;
	--sl-page-primary-dark:#283384;
	--sl-page-primary-soft:#6dc3eb;
	--sl-heading-accent:var(--sl-page-primary,#1472ba);
	--sl-page-cta:#ea3e24;
	--sl-page-text:#4a4a4a;
	--sl-page-muted:#6b7c93;
	--sl-page-bg:#f5f5f5;
	--sl-page-white:#ffffff;
	--slf-font-display:"Space Grotesk",system-ui,sans-serif;
	--slf-font-body:"Space Grotesk",system-ui,sans-serif;
	--sl-fs-h1:clamp(32px,6.2vw,56px);
	--sl-fs-h2:clamp(28px,2.7vw,48px);
	--sl-fs-h3:clamp(22px,2vw,30px);
	--sl-fs-hero-h1:clamp(42px,6.8vw,52px);
	--sl-fs-hero-h2:28px;
	--sl-panel-title-size:24px;
	--sl-panel-title-weight:700;
	--sl-panel-title-line:1.3
}
body{
	font-family:var(--slf-font-body,"Space Grotesk",system-ui,sans-serif)
}
h1,h2,h3{
	margin:0 0 .75rem;
	color:var(--sl-page-navy,#16234e);
	font-family:var(--slf-font-display,"Space Grotesk",system-ui,sans-serif);
	font-weight:700;
	line-height:1.2
}
h1{
	font-size:var(--sl-fs-h1);
	font-weight:700;
	line-height:1.15
}
h2{
	font-size:var(--sl-fs-h2);
	line-height:1.2
}
h3{
	font-size:var(--sl-fs-h3);
	line-height:1.25;
	color:var(--sl-heading-accent,#1472ba)
}
/* Hero titles: larger on mobile/tablet, weight 700 (not 800) */
section[class*="-hero"] h1,
section[class*="_hero"] h1,
.sl-sa-hero h1,
.sl-cyber-awareness-hero h1,
.sl-gwct-hero h1,
.sl-harassment-hero h1,
.sl-harassment-hero__heading h1,
.sl-infosec-2026-cyber-hero__content h1,
.sl-infosec-2026-cyber-hero__head h1{
	font-size:var(--sl-fs-hero-h1);
	font-weight:700;
	line-height:1.15
}
section[class*="-hero"] h2,
section[class*="_hero"] h2,
.sl-home-hero h2,
.sl-hero-h2{
	font-size:var(--sl-fs-hero-h2,28px);
	font-weight:600;
	line-height:1.35;
	color:var(--sl-heading-accent,#1472ba)
}
section[class*="-hero"] h2>span,
section[class*="_hero"] h2>span,
.sl-home-hero h2>span,
.sl-hero-h2>span{color:var(--sl-heading-accent,#1472ba)}
.sl-h2{
	margin:0 0 14px;
	color:var(--sl-page-navy,#16234e);
	font-size:var(--sl-fs-h2);
	font-weight:700;
	line-height:1.25
}
h1>span,h2>span,h3>span,
h1 [class$="__highlight"],h2 [class$="__highlight"],h3 [class$="__highlight"],
[class$="__title-highlight"],
.sl-h2 span,
.sl-home-sub-heading,
.sl-home-card-tag,
.sl-home-step-label{
	color:var(--sl-heading-accent,var(--sl-page-primary,#1472ba))
}
[class$="__title-highlight"]{
	background:none;
	-webkit-background-clip:unset;
	background-clip:unset;
	-webkit-text-fill-color:currentColor
}
.sl-home-sub-heading{
	display:inline-flex;
	align-items:center;
	gap:10px;
	margin:0 0 16px;
	font-size:15px;
	font-weight:500;
	line-height:1.3
}
.sl-home-sub-heading::before{
	flex-shrink:0;
	width:24px;
	height:1px;
	background:var(--sl-heading-accent,var(--sl-page-primary,#1472ba));
	content:""
}
@media(min-width:768px){
	:root{--sl-fs-hero-h1:clamp(44px,4.8vw,54px)}
}
@media(min-width:700px){
	.sl-h2{font-size:34px}
}
@media(min-width:1000px){
	:root{--sl-fs-hero-h1:clamp(46px,3.6vw,56px)}
}
