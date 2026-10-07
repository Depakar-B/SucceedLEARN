<?php
/**
 * Bordered pill eyebrow (.sl-home-sub-heading) for PE/VC course AMP pages.
 *
 * Mirrors theme: assets/css/sl-global-sub-heading.css
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-aml-pe-vc-page .sl-home-sub-heading,
.sl-aml-pe-vc-page .sl-eyebrow,
.sl-smcr-pe-vc-page .sl-home-sub-heading,
.sl-smcr-pe-vc-page .sl-eyebrow,
.sl-gifts-and-entertainment-page .sl-home-sub-heading,
.sl-gifts-and-entertainment-page .sl-eyebrow,
.sl-whistleblowing-pe-vc-page .sl-home-sub-heading,
.sl-whistleblowing-pe-vc-page .sl-eyebrow,
.sl-political-donations-pe-vc-page .sl-home-sub-heading,
.sl-political-donations-pe-vc-page .sl-eyebrow,
.sl-anti-bribery-page .sl-home-sub-heading,
.sl-anti-bribery-page .sl-eyebrow,
.sl-pevc-page .sl-home-sub-heading,
.sl-pevc-page .sl-eyebrow{
	display:inline-flex;
	align-items:center;
	width:fit-content;
	max-width:100%;
	margin:0 0 12px;
	padding:8px 16px;
	border:1px solid rgba(20,114,186,.28);
	border-radius:50px;
	background:var(--sl-page-white,#fff);
	box-shadow:0 8px 20px rgba(22,35,78,.04);
	box-sizing:border-box;
	font-size:14px;
	font-weight:600;
	line-height:1.4;
	letter-spacing:normal;
	text-transform:none;
	color:var(--sl-page-primary,#1472ba)
}
.sl-aml-pe-vc-page .sl-home-sub-heading::before,
.sl-aml-pe-vc-page .sl-eyebrow::before,
.sl-smcr-pe-vc-page .sl-home-sub-heading::before,
.sl-smcr-pe-vc-page .sl-eyebrow::before,
.sl-gifts-and-entertainment-page .sl-home-sub-heading::before,
.sl-gifts-and-entertainment-page .sl-eyebrow::before,
.sl-whistleblowing-pe-vc-page .sl-home-sub-heading::before,
.sl-whistleblowing-pe-vc-page .sl-eyebrow::before,
.sl-political-donations-pe-vc-page .sl-home-sub-heading::before,
.sl-political-donations-pe-vc-page .sl-eyebrow::before,
.sl-anti-bribery-page .sl-home-sub-heading::before,
.sl-anti-bribery-page .sl-eyebrow::before,
.sl-pevc-page .sl-home-sub-heading::before,
.sl-pevc-page .sl-eyebrow::before{
	content:none;
	display:none;
	width:0;
	height:0;
	margin:0
}
