<?php
/**
 * Menu Styles (included in amp-custom)
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* Menu Styles */
* {
	box-sizing: border-box;
	font-family: Arial, sans-serif;
}

/* Never show WP admin bar or theme mobile header on plugin AMP pages */
#wpadminbar,
#wpadminbar * {
	display: none !important;
	visibility: hidden !important;
	height: 0 !important;
	min-height: 0 !important;
	max-height: 0 !important;
	overflow: hidden !important;
	pointer-events: none !important;
}

/* Logged-in editor shortcuts (WP admin bar is not AMP-compatible) */
.elearnposh-amp-admin-toolbar {
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	z-index: 100001;
	display: flex;
	align-items: center;
	gap: 12px;
	padding: 6px 12px;
	background: #1d2327;
	color: #f0f0f1;
	font-size: 13px;
	line-height: 1.4;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
}

.elearnposh-amp-admin-toolbar__link {
	color: #f0f0f1;
	text-decoration: none;
	font-weight: 600;
}

.elearnposh-amp-admin-toolbar__link:hover,
.elearnposh-amp-admin-toolbar__link:focus {
	color: #72aee6;
	text-decoration: underline;
}

body:has(.elearnposh-amp-admin-toolbar) .amp-site-header {
	top: 34px !important;
}

body:has(.elearnposh-amp-admin-toolbar) {
	padding-top: 114px !important;
}

@media (max-width: 1024px) {
	body:has(.elearnposh-amp-admin-toolbar) {
		padding-top: 114px !important;
	}
}

.mobile-only,
#custom-mobile-header,
#mobile-menu,
#mobile-menu-overlay {
	display: none !important;
}

amp-sidebar ul,
amp-sidebar li,
amp-sidebar .amp-mobile-nav-list,
amp-sidebar .amp-mobile-nav-list li {
	list-style: none !important;
	list-style-type: none !important;
	margin: 0 !important;
	padding: 0 !important;
}

amp-sidebar .amp-mobile-nav-list li::marker {
	content: none;
}

.amp-site-header {
	position: fixed !important;
	top: 0 !important;
	left: 0 !important;
	right: 0 !important;
	z-index: 9998 !important;
	padding: 0 !important;
	margin: 0 !important;
	background: #ffffff !important;
	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15) !important;
	width: 100% !important;
}

.menu-bar {
	display: flex;
	justify-content: space-between;
	align-items: center;
	background: #ffffff;
	padding: 12px 20px;
	width: 100%;
	min-height: 74px;
	box-sizing: border-box;
}

/* Global body padding for all AMP pages - prevents content hiding under fixed header */
body {
	margin: 0;
	padding-left: 0;
	padding-right: 0;
	padding-bottom: 0;
	padding-top: 0 !important;
	margin-top: 0 !important;
}

/* Content wrapper container */
.amp-content-wrapper {
	margin-top: 0;
	padding-top: 0;
	width: 100%;
}

/* Force top margin for first content element - Mobile and Tablet */
@media (max-width: 1024px) {
	body {
		padding-top: 74px !important;
		margin-top: 0 !important;
	}
	
	/* Ensure all first-level content elements have proper spacing */
	body > div:first-of-type,
	body > .showcase:first-of-type,
	body > section:first-of-type,
	body > main:first-of-type,
	body > article:first-of-type {
		margin-top: 0 !important;
		padding-top: 0 !important;
	}
}

/* Desktop spacing */
@media (min-width: 1025px) {
	body {
		padding-top: 74px !important;
	}
	
	body > div:first-of-type,
	body > .showcase:first-of-type,
	body > section:first-of-type,
	body > main:first-of-type,
	body > article:first-of-type {
		margin-top: 0 !important;
		padding-top: 0 !important;
	}
}

.logo {
	width: 120px;
	flex-shrink: 0;
}

.logo a {
	display: block;
	line-height: 0;
}

.amp-logo {
	width: 120px;
	height: 50px;
}

#sidebar-menu-btn {
	font-size: 28px;
	font-weight: 600;
	background: none;
	border: none;
	color: #0089cf;
	cursor: pointer;
	outline: none;
	padding: 0;
	margin: 0;
	width: auto;
	height: auto;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

#sidebar-menu-btn:focus:not([tabindex="-1"]) {
	outline: 2px solid #0089cf;
	outline-offset: 2px;
}

amp-sidebar {
	width: 300px;
	background: #ffffff;
	color: #000;
}

#sidebar {
	width: 300px;
	max-width: 90vw;
	background-color: #ffffff;
	padding-top: 3rem;
	padding-bottom: 0;
	padding-left: 0;
	padding-right: 0;
	color: #002a38;
	box-shadow: -2px 0 12px rgba(0, 0, 0, 0.2);
	overflow-y: auto;
	font-family: Arial, sans-serif;
}

.close-btn {
	position: absolute;
	top: 10px;
	right: 10px;
	font-size: 28px;
	background: none !important;
	border: none !important;
	color: #000 !important;
	cursor: pointer;
	padding: 0;
	margin: 0;
	min-width: 44px;
	min-height: 44px;
	display: flex;
	align-items: center;
	justify-content: center;
	line-height: 1;
	box-shadow: none !important;
	outline: none !important;
	-webkit-tap-highlight-color: transparent;
}

/* Flush menu blocks — rows stack with dividers only (no extra gaps between sections) */
#sidebar .amp-mobile-menu > amp-accordion,
#sidebar .amp-mobile-menu > .amp-mobile-nav-list {
	margin: 0 !important;
	padding: 0 !important;
}

/* Collapsed accordion panels must not reserve height below the header row */
#sidebar amp-accordion section:not([expanded]) > :not(:first-child) {
	display: none !important;
	height: 0 !important;
	max-height: 0 !important;
	overflow: hidden !important;
	margin: 0 !important;
	padding: 0 !important;
}

#sidebar amp-accordion section:not([expanded]) {
	min-height: 0 !important;
}

/* Kill AMP accordion default header row (gray bar + built-in caret) */
#sidebar amp-accordion section > :first-child {
	background-color: #ffffff !important;
	background-image: none !important;
	padding: 14px 20px !important;
	margin: 0 !important;
}

#sidebar amp-accordion section > :first-child::after {
	display: none !important;
	content: "" !important;
	width: 0 !important;
	height: 0 !important;
	border: none !important;
	margin: 0 !important;
	padding: 0 !important;
	background: none !important;
}

/* All sidebar links — simple, reliable selectors */
#sidebar a.amp-menu-link {
	display: flex !important;
	align-items: center !important;
	width: 100% !important;
	margin: 0 !important;
	padding: 14px 20px !important;
	text-decoration: none !important;
	font-family: Arial, sans-serif !important;
	line-height: 1.4 !important;
	color: #002a38 !important;
	background: #ffffff !important;
	box-sizing: border-box !important;
	-webkit-text-size-adjust: 100%;
}

#sidebar a.amp-menu-link:not(.amp-menu-link--indent) {
	font-weight: 500 !important;
	font-size: 15px !important;
	border: none !important;
	border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
}

#sidebar a.amp-menu-link--indent {
	padding: 14px 20px 14px 40px !important;
	font-weight: 400 !important;
	font-size: 14px !important;
	border-bottom: none !important;
}

#sidebar a.amp-menu-link:hover,
#sidebar a.amp-menu-link:focus {
	color: #002a38 !important;
	background: #ffffff !important;
	text-decoration: none !important;
}

#sidebar a.amp-menu-link.is-active {
	color: #1472ba !important;
	font-weight: 700 !important;
}

#sidebar amp-accordion,
amp-sidebar amp-accordion {
	margin: 0;
}

#sidebar amp-accordion > section,
amp-sidebar amp-accordion > section {
	margin: 0;
}

/* Accordion header rows — match EPSH mobile submenu toggles */
#sidebar .menu-title {
	margin: 0 !important;
	padding: 14px 20px !important;
	font-size: 15px !important;
	font-weight: 500 !important;
	line-height: 1.4 !important;
	background: #ffffff !important;
	color: #002a38 !important;
	cursor: pointer;
	width: 100%;
	box-sizing: border-box;
	border: none !important;
	border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
	display: flex !important;
	justify-content: space-between !important;
	align-items: center !important;
}

#sidebar .menu-title .menu-label {
	flex: 1;
	font-size: inherit;
	font-weight: inherit;
	line-height: inherit;
}

/* CSS chevron — replaces AMP default caret and unicode triangles */
#sidebar .arrow-icon {
	display: inline-block !important;
	flex: 0 0 auto;
	width: 7px !important;
	height: 7px !important;
	margin-left: 12px !important;
	border: solid currentColor !important;
	border-width: 0 2px 2px 0 !important;
	font-size: 0 !important;
	line-height: 0 !important;
	color: #002a38 !important;
	transition: transform 0.2s ease;
	transform: rotate(-45deg);
	transform-origin: center;
}

/* Expanded accordion headers — brand blue like desktop/mobile */
#sidebar amp-accordion section[expanded] > .menu-title,
#sidebar amp-accordion section[expanded] > :first-child.menu-title {
	color: #1472ba !important;
}

#sidebar amp-accordion section[expanded] > :first-child .arrow-icon {
	transform: rotate(45deg);
	color: #1472ba !important;
}

/* Divider under Solutions (collapsed header or full expanded panel) before POSH Act */
#sidebar .amp-mobile-menu > #solutions-accordion {
	border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
}

/* When collapsed, accordion border is enough — avoid double line on the header row */
#sidebar #solutions-accordion > section:not([expanded]) > .menu-title {
	border-bottom: none !important;
}

#sidebar .amp-mobile-menu > .amp-mobile-nav-list[data-depth="0"] {
	margin: 0 !important;
}

/* Nested group row inside Solutions (Global Courses, Important Resources) */
#sidebar amp-accordion .has-submenu > amp-accordion {
	margin: 0;
}

#sidebar amp-accordion .has-submenu > amp-accordion section > :first-child {
	padding: 14px 20px !important;
}

.sidebar-contact {
	margin-top: 20px !important;
	padding: 20px !important;
	border-top: none !important;
	text-align: center !important;
}

.sidebar-contact a {
	display: block !important;
	margin: 10px 0 !important;
	padding: 12px !important;
	border-radius: 6px !important;
	text-decoration: none !important;
	font-weight: 500 !important;
	text-align: center !important;
}

.sidebar-contact .sidebar-email {
	background: transparent !important;
	color: #002a38 !important;
	font-size: 16px !important;
	font-weight: 500 !important;
}

.sidebar-contact .sidebar-phone {
	display: block;
	margin: 10px 0 !important;
	padding: 0 !important;
	color: #002a38 !important;
	font-size: 16px !important;
	font-weight: 500 !important;
	line-height: 1.4 !important;
	text-align: center;
}

.sidebar-contact .sidebar-phone .spn-dynamic,
.sidebar-contact .sidebar-phone .spn-number-text {
	margin: 0;
	padding: 0;
	line-height: 1.4;
}

.sidebar-contact .sidebar-cta {
	background: #002a38 !important;
	color: #fff !important;
	font-weight: bold !important;
}


