<?php
/**
 * Shared AMP UI tokens — gradient primary CTAs, accent color, chrome.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
:root{
	--sl-heading-accent:#135db7;
	--sl-btn-primary-fill:linear-gradient(180deg,#ea3e24 0%,#ea3e24 100%);
	--sl-btn-primary-shadow:rgba(234,62,36,.28);
	--sl-btn-secondary-color:#ea3e24;
	--sl-chrome-fill:#1472ba;
	--sl-chrome-shadow-rgb:20,114,186;
	--sl-chrome-accent:#1472ba;
}
.sl-btn--primary,
a.sl-btn--primary,
button.sl-btn--primary,
.sl-amp-btn,
.sl-courses-card__cta,
a.sl-courses-card__cta,
.sl-courses-page .sl-courses-card__cta,
.sl-courses-page a.sl-courses-card__cta.sl-btn--primary,
.sl-about-page .sl-btn--primary,
.sl-contact-page .sl-btn--primary,
.sl-dd-page .sl-btn--primary,
.sl-sap-page .sl-btn--primary,
.sl-sap-page .sl-clients__cta .sl-btn,
.sl-sap-page .sl-clients__cta a,
.sl-gwct-page .sl-btn--primary,
.sl-csa-page .sl-btn--primary,
.sl-infosec-2026-cyber-page .sl-btn--primary,
.sl-whp-page .sl-btn--primary{
	background:var(--sl-btn-primary-fill)!important;
	background-color:transparent!important;
	border:1px solid transparent!important;
	color:#fff!important;
	box-shadow:0 6px 16px var(--sl-btn-primary-shadow);
}
/* Outline secondary CTAs: orange border + matching orange label */
.sl-btn--secondary,
a.sl-btn--secondary,
button.sl-btn--secondary,
.sl-hero-btn-secondary,
a.sl-hero-btn-secondary,
.sl-content-btn-secondary,
a.sl-content-btn-secondary,
.sl-csa-page .sl-btn--secondary,
.sl-whp-page .sl-btn--secondary,
.sl-gwct-page .sl-btn--secondary,
.sl-infosec-2026-cyber-page .sl-btn--secondary,
.sl-sap-page .sl-btn--secondary,
.sl-coc-page .sl-btn--secondary,
.sl-dd-page .sl-btn--secondary,
.sl-csa-page button.sl-btn--secondary,
.sl-whp-page button.sl-btn--secondary,
.sl-gwct-page button.sl-btn--secondary,
.sl-infosec-2026-cyber-page button.sl-btn--secondary,
.sl-sap-page button.sl-btn--secondary,
.sl-coc-page button.sl-btn--secondary,
.sl-dd-page button.sl-btn--secondary{
	margin-left:0;
	background:linear-gradient(var(--sl-btn-secondary-surface,var(--sl-page-white,#fff)),var(--sl-btn-secondary-surface,var(--sl-page-white,#fff))) padding-box,var(--sl-btn-primary-fill) border-box!important;
	background-color:transparent!important;
	border:2px solid transparent!important;
	color:var(--sl-btn-secondary-color,var(--sl-page-cta,#ea3e24))!important;
	box-shadow:none;
}
.scf-submit,
button.scf-submit{
	background:var(--sl-btn-primary-fill)!important;
	background-color:transparent!important;
	border:1px solid transparent!important;
	color:#fff!important;
	box-shadow:0 6px 16px var(--sl-btn-primary-shadow);
}
.scf-lightbox-button{
	background:var(--sl-btn-primary-fill)!important;
	background-color:transparent!important;
	border:1px solid transparent!important;
	color:#fff!important;
}

/* Shared numbered FAQ accordion (all AMP pages). Higher specificity beats amp-accordion defaults; !important is re-injected after AMPforWP strips it. */
.sl-amp-faq{margin:12px 0 0}
.sl-amp-faq__accordion{display:block}
.sl-amp-faq__item{border:1px solid rgba(107,124,147,.18);border-radius:12px;margin:0 0 10px;background:#fff;overflow:hidden}
.sl-amp-faq__item:last-child{margin-bottom:0}
amp-accordion.sl-amp-faq__accordion>section>.sl-amp-faq__summary,
.sl-amp-faq__summary{
	display:flex!important;
	align-items:center!important;
	justify-content:space-between!important;
	gap:12px!important;
	width:100%!important;
	margin:0!important;
	padding:16px 20px!important;
	box-sizing:border-box!important;
	font-size:15px!important;
	line-height:1.45!important;
	font-weight:700!important;
	color:#16234e!important;
	background:#fff!important;
	background-image:none!important;
	border:0!important;
	cursor:pointer
}
amp-accordion.sl-amp-faq__accordion>section>.sl-amp-faq__summary::after,
.sl-amp-faq__summary::after{
	content:"+";
	display:flex!important;
	align-items:center!important;
	justify-content:center!important;
	flex:0 0 1.5rem!important;
	width:1.5rem!important;
	height:1.5rem!important;
	margin:0 0 0 auto!important;
	padding:0!important;
	border:0!important;
	color:#1472ba!important;
	font-size:1.4rem!important;
	font-weight:400!important;
	line-height:1!important;
	text-align:center!important
}
.sl-amp-faq__num{display:inline-block!important;flex:0 0 auto!important;min-width:1.75rem;color:#000;font-size:14px;font-weight:700;font-variant-numeric:tabular-nums;line-height:1.45}
.sl-amp-faq__q{flex:1 1 auto!important;min-width:0;padding-right:12px;color:#16234e}
.sl-amp-faq__item[expanded] .sl-amp-faq__summary{color:#1472ba!important}
.sl-amp-faq__item[expanded] .sl-amp-faq__summary::after{content:"-"}
.sl-amp-faq__panel{padding:0 20px 16px;font-size:14px;line-height:1.65;color:#4A4A4A;background:#fff}
.sl-amp-faq__panel p{margin:0}
.sl-amp-faq__answer p{margin:0 0 12px}
.sl-amp-faq__answer p:last-child{margin-bottom:0}
.sl-amp-faq__answer ul{margin:0 0 12px;padding:0 0 0 1.15em}
.sl-amp-faq__answer li{margin:0 0 8px}
.sl-amp-faq__answer li:last-child{margin-bottom:0}
.sl-amp-faq__answer a{color:#1472ba;font-weight:600;text-decoration:underline}
@media(max-width:480px){amp-accordion.sl-amp-faq__accordion>section>.sl-amp-faq__summary,.sl-amp-faq__summary{padding:14px 16px!important}.sl-amp-faq__panel{padding:0 16px 14px}}

/* Global bordered list item (checklists, included features, integration rows) */
.sl-list,
.sl-csa-checklist,
.sl-csa-included__features,
.sl-cybersecurity-campaign-measure__metrics,
.sl-csa-integration__list{
	display:grid;
	grid-template-columns:minmax(0,1fr);
	gap:10px;
	margin:0;
	padding:0;
	list-style:none
}
.sl-list-item,
.sl-csa-checklist li,
.sl-csa-included__feature,
.sl-csa-integration__list>div,
.sl-cybersecurity-campaign-measure__metric{
	display:flex;
	align-items:center;
	gap:9px;
	min-height:58px;
	padding:13px 14px;
	border:1px solid rgba(22,35,78,.09);
	border-radius:8px;
	background:var(--sl-page-white,#fff);
	color:var(--sl-page-text,#4a4a4a);
	font-size:16px;
	line-height:1.45;
	box-sizing:border-box
}
.sl-list-item:last-child,
.sl-csa-checklist li:last-child,
.sl-csa-included__feature:last-child,
.sl-csa-integration__list>div:last-child,
.sl-cybersecurity-campaign-measure__metric:last-child{
	padding-bottom:22px
}
.sl-list-item__label,
.sl-csa-integration__list dt{
	flex:0 0 auto;
	min-width:110px;
	margin:0;
	color:var(--sl-page-primary,#1472ba);
	font-weight:700
}
.sl-list-item__text,
.sl-csa-integration__list dd{
	flex:1 1 auto;
	min-width:0;
	margin:0;
	color:var(--sl-page-text,#4a4a4a);
	line-height:1.45
}
.sl-csa-checklist li>span{
	display:inline-flex;
	flex:0 0 auto;
	align-items:center;
	justify-content:center;
	width:19px;
	height:19px;
	border-radius:50%;
	background:var(--sl-page-primary,#1472ba);
	color:#fff;
	font-size:12px;
	font-weight:700
}
.sl-csa-included__features{counter-reset:csa-included-feature}
.sl-csa-included__feature::before{
	content:counter(csa-included-feature) ".";
	counter-increment:csa-included-feature;
	flex:0 0 auto;
	min-width:1.5ch;
	color:var(--sl-page-primary,#1472ba);
	font-weight:800
}
.sl-csa-included__feature--highlight{
	border-color:#1472ba;
	background:rgba(20,114,186,.09);
	color:#16234e;
	font-weight:700
}
.sl-csa-included__feature--highlight::before{color:#1472ba}
@media(min-width:700px){
	.sl-list--2up,
	.sl-csa-included__features{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
}
/* Checklist: 1 col mobile, 2 col tablet+ */
.sl-csa-checklist{
	display:grid;
	grid-template-columns:minmax(0,1fr);
	gap:10px
}
@media(min-width:768px){
	.sl-csa-checklist{
		display:grid;
		grid-template-columns:minmax(0,1fr) minmax(0,1fr);
		column-gap:20px;
		row-gap:12px
	}
}

/* =========================================================
   Shared AMP card grids
   Default: 1 col mobile, 2 col tablet+
   Opt out: add .sl-amp-card-grid--1col to force 1 col always
   Page CSS may still set 3/4 col at desktop (min-width:1000px)
========================================================= */
.sl-amp-card-grid{
	display:grid;
	grid-template-columns:minmax(0,1fr);
	gap:16px;
	width:100%
}
.sl-amp-card-grid>*{
	min-width:0;
	width:100%;
	margin:0;
	box-sizing:border-box
}
@media(min-width:768px){
	.sl-amp-card-grid:not(.sl-amp-card-grid--1col){
		display:grid;
		grid-template-columns:minmax(0,1fr) minmax(0,1fr);
		gap:20px;
		width:100%
	}
	.sl-amp-card-grid:not(.sl-amp-card-grid--1col)>:last-child:nth-child(odd){
		grid-column:1/-1;
		justify-self:center;
		width:100%;
		max-width:calc((100% - 20px)/2)
	}
}
.sl-amp-card-grid--1col,
.sl-amp-card-grid.sl-amp-card-grid--1col{
	display:grid;
	grid-template-columns:minmax(0,1fr);
	gap:16px;
	width:100%
}
.sl-amp-card-grid--1col>:last-child:nth-child(odd){
	grid-column:auto;
	justify-self:stretch;
	max-width:none
}
