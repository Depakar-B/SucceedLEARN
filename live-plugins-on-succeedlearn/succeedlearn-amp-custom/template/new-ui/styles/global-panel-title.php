<?php
/**
 * AMP global panel / card title (h3.sl-panel-title).
 *
 * Mirrors desktop sl-global-panel-title.css — 24px card titles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.sl-panel-title,
h3.sl-panel-title,
body.slf-body h3.sl-panel-title,
body.slf-body main h3.sl-panel-title,
body.slf-body #main-content h3.sl-panel-title,
body.slf-body main.sl-coc-page h3.sl-panel-title,
body.slf-body #main-content.sl-coc-page h3.sl-panel-title{
	margin:0;
	font-family:inherit;
	font-size:var(--sl-panel-title-size,24px);
	font-weight:var(--sl-panel-title-weight,700);
	line-height:var(--sl-panel-title-line,1.3);
	letter-spacing:normal;
	color:var(--sl-panel-title-color,var(--sl-heading-accent,var(--sl-page-primary,#1472ba)))
}
.sl-panel-title>span,
h3.sl-panel-title>span,
body.slf-body h3.sl-panel-title>span{
	color:var(--sl-panel-title-color,var(--sl-heading-accent,var(--sl-page-primary,#1472ba)))
}
