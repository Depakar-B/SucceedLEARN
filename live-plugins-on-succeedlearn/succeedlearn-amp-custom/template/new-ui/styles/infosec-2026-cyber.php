<?php
/**
 * Infosec 2026 Cyber - AMP page styles.
 *
 * Shared chrome (tokens defaults, headings, eyebrows, panel titles, highlight,
 * button fills/shapes, lists) comes from:
 * global-foundation.php, global-ui.php, global-ui-buttons.php,
 * global-panel-title.php, global-highlight.php.
 * This file is layout / section spacing only (plus page token overrides).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

.sl-infosec-2026-cyber-page {
	--sl-page-navy: #16234e;
	--sl-page-primary: #1472ba;
	--sl-page-primary-dark: #283384;
	--sl-page-primary-soft: rgba(109, 195, 235, 0.16);
	--sl-heading-accent: var(--sl-page-primary);
	--sl-page-cta: #ea3e24;
	--sl-btn-primary-fill: linear-gradient(180deg, #ea3e24 0%, #ea3e24 100%);
	--sl-btn-primary-shadow: rgba(234, 62, 36, 0.28);
	--sl-btn-secondary-color: #ea3e24;
	--sl-page-text: #4a4a4a;
	--sl-page-muted: #6b7c93;
	--sl-page-bg: #f5f5f5;
	--sl-page-white: #ffffff;
}

.sl-infosec-2026-cyber-hero__image,
.sl-infosec-2026-how-it-works__image,
.sl-infosec-2026-understand__image,
.sl-infosec-2026-cyber-testing__image {
	overflow: hidden;
	width: 100%;
	line-height: 0;
	border-radius: 16px;
}
.sl-infosec-2026-cyber-hero__image amp-img,
.sl-infosec-2026-how-it-works__image amp-img,
.sl-infosec-2026-understand__image amp-img,
.sl-infosec-2026-cyber-testing__image amp-img {
	display: block;
	width: 100%;
}
.sl-infosec-2026-cyber-testing__image {
	width: min(100%, 600px);
}


/* SEO page: no eyebrow accent line before .sl-home-sub-heading */
.sl-infosec-2026-cyber-page .sl-home-sub-heading::before,
.sl-infosec-2026-cyber-page .sl-faq-section .sl-home-sub-heading::before {
	content: none;
	display: none;
	width: 0;
	height: 0;
	margin: 0;
}


/* =========================================
   HERO
========================================= */

.sl-infosec-2026-cyber-page .sl-infosec-2026-cyber-hero.sl-section {
	position: relative;
	overflow: visible;
	padding: 32px 16px 64px;
	background:
		radial-gradient(
			circle at 88% 18%,
			rgba(109, 195, 235, 0.22) 0%,
			transparent 42%
		),
		radial-gradient(
			circle at 8% 78%,
			rgba(20, 114, 186, 0.1) 0%,
			transparent 46%
		),
		linear-gradient(
			180deg,
			var(--sl-page-white) 0%,
			#f7fbfe 100%
		);
}

.sl-infosec-2026-cyber-hero__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 28px;
}

.sl-infosec-2026-cyber-hero__head {
	width: 100%;
	max-width: none;
	margin: 0 0 24px;
}

.sl-infosec-2026-cyber-hero__head .sl-home-sub-heading {
	display: inline-flex;
	margin: 0 0 14px;
}

.sl-infosec-2026-cyber-hero__head h1 {
	margin: 0;
	width: 100%;
	max-width: none;
	color: var(--sl-page-navy);
	font-size: var(--sl-fs-hero-h1);
	font-weight: 700;
	letter-spacing: -0.025em;
	line-height: 1.14;
}

.sl-infosec-2026-cyber-hero__head h1 > span {
	color: var(--sl-page-primary);
}

.sl-infosec-2026-cyber-hero__content {
	min-width: 0;
	width: 100%;
	max-width: none;
}

.sl-infosec-2026-cyber-hero__tagline {
	display: block;
	width: 100%;
	margin: 0 0 18px;
	color: var(--sl-page-navy);
	font-size: 22px;
	font-weight: 700;
	line-height: 1.38;
}

.sl-infosec-2026-cyber-hero__intro {
	width: 100%;
	max-width: none;
	margin: 0 0 18px;
}

.sl-infosec-2026-cyber-hero__intro p {
	width: 100%;
	margin: 0 0 14px;
	color: var(--sl-page-text);
	line-height: 1.7;
}

.sl-infosec-2026-cyber-hero__intro p:last-child {
	margin-bottom: 0;
}

.sl-infosec-2026-cyber-hero__hook {
	width: 100%;
	margin: 0 0 16px;
	padding: 0;
	border: 0;
	background: transparent;
	color: var(--sl-page-navy);
	font-size: 18px;
	font-weight: 700;
	line-height: 1.45;
}

.sl-infosec-2026-cyber-hero__hook strong {
	color: var(--sl-page-primary);
	font-weight: 700;
}

.sl-infosec-2026-cyber-hero__closing {
	width: 100%;
	max-width: none;
	margin: 0;
	color: var(--sl-page-text);
	line-height: 1.7;
}


/* =========================================
   HERO ACTIONS
   Default = tablet+ inline (CSA pattern).
   Mobile full-width only in max-width:767.
========================================= */

.sl-infosec-2026-cyber-hero__actions {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	align-items: center;
	justify-content: flex-start;
	gap: 12px;
	width: 100%;
	margin-top: 28px;
}

.sl-infosec-2026-cyber-hero__cta,
.sl-infosec-2026-cyber-page
	.sl-infosec-2026-cyber-hero__actions
	.sl-btn.sl-infosec-2026-cyber-hero__cta {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 10px;
	width: auto;
	max-width: 100%;
	flex: 0 1 auto;
	margin: 0;
	padding: 13px 20px;
	box-sizing: border-box;
	text-align: center;
	white-space: normal;
	line-height: 1.35;
}

.sl-infosec-2026-cyber-hero__cta svg {
	display: block;
	flex: 0 0 auto;
	width: 18px;
	height: 18px;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.8;
	stroke-linecap: round;
	stroke-linejoin: round;
}

@media (max-width: 767px) {
	.sl-infosec-2026-cyber-hero__actions {
		flex-direction: column;
		flex-wrap: nowrap;
		align-items: stretch;
	}

	.sl-infosec-2026-cyber-hero__cta,
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-cyber-hero__actions
		.sl-btn.sl-infosec-2026-cyber-hero__cta {
		width: 100%;
		max-width: 100%;
		white-space: normal;
	}
}


/* =========================================
   HERO VISUAL
========================================= */

.sl-infosec-2026-cyber-hero__media {
	position: static;
	align-self: start;
	width: 100%;
	min-width: 0;
}

.sl-infosec-2026-cyber-hero__visual {
	position: relative;
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	min-height: 280px;
	padding: 36px 24px;
	overflow: hidden;
	border-radius: 16px;
	background:
		linear-gradient(
			145deg,
			rgba(20, 114, 186, 0.12) 0%,
			rgba(109, 195, 235, 0.18) 48%,
			rgba(22, 35, 78, 0.08) 100%
		);
	box-sizing: border-box;
}

.sl-infosec-2026-cyber-hero__orb {
	position: absolute;
	z-index: 0;
	border-radius: 50%;
	pointer-events: none;
}

.sl-infosec-2026-cyber-hero__orb--a {
	top: 12%;
	right: 14%;
	width: 140px;
	height: 140px;
	background: rgba(255, 255, 255, 0.55);
}

.sl-infosec-2026-cyber-hero__orb--b {
	bottom: 10%;
	left: 12%;
	width: 90px;
	height: 90px;
	background: rgba(20, 114, 186, 0.18);
}

.sl-infosec-2026-cyber-hero__stage {
	position: relative;
	z-index: 1;
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	gap: 10px;
	width: 100%;
}

.sl-infosec-2026-cyber-hero__stage-kicker {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	color: var(--sl-page-primary);
	font-size: 13px;
	font-weight: 700;
	letter-spacing: 0.06em;
	text-transform: uppercase;
}

.sl-infosec-2026-cyber-hero__stage-kicker::before {
	width: 22px;
	height: 2px;
	background: currentColor;
	content: "";
}

.sl-infosec-2026-cyber-hero__stage-title {
	color: var(--sl-page-navy);
	font-size: clamp(28px, 4vw, 40px);
	font-weight: 800;
	line-height: 1.15;
}

.sl-infosec-2026-cyber-hero__stage-note {
	color: var(--sl-page-muted);
	font-size: 14px;
	line-height: 1.4;
}


/* =========================================
   HERO RESPONSIVE
========================================= */

@media (min-width: 768px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-cyber-hero.sl-section {
		padding-top: 72px;
		padding-bottom: 80px;
	}

	.sl-infosec-2026-cyber-hero__grid {
		gap: 48px;
	}

	.sl-infosec-2026-cyber-hero__head h1 {
		font-size: 48px;
	}

	.sl-infosec-2026-cyber-hero__tagline {
		font-size: 26px;
	}

	.sl-infosec-2026-cyber-hero__hook {
		font-size: 20px;
	}

	.sl-infosec-2026-cyber-hero__visual {
		min-height: 420px;
		padding: 56px 40px;
	}
}

@media (min-width: 901px) {
	.sl-infosec-2026-cyber-hero__grid {
		grid-template-columns:
			minmax(0, 1.05fr)
			minmax(320px, 0.95fr);
		gap: 48px;
	}

	.sl-infosec-2026-cyber-hero__media {
		position: sticky;
		top: calc(var(--slf-header-clearance, 110px) + 24px);
	}
}

@media (min-width: 1000px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-cyber-hero.sl-section {
		padding-top: 72px;
		padding-bottom: 88px;
	}

	.sl-infosec-2026-cyber-hero__grid {
		gap: 56px;
	}

	.sl-infosec-2026-cyber-hero__head h1 {
		font-size: 52px;
	}

	.sl-infosec-2026-cyber-hero__visual {
		min-height: 480px;
	}
}


/* =========================================
   CAMPAIGN
========================================= */

.sl-infosec-2026-cyber-page
	.sl-infosec-2026-cyber-campaign.sl-section {
	padding: 55px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-infosec-2026-cyber-campaign__card {
	position: relative;
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: center;
	gap: 18px;
	width: 100%;
	padding: 28px 22px;
	border: 1px solid rgba(20, 114, 186, 0.18);
	border-radius: 14px;
	background:
		linear-gradient(
			135deg,
			#f4f8fd 0%,
			#eef5fc 100%
		);
	box-sizing: border-box;
}

.sl-infosec-2026-cyber-campaign__content {
	width: 100%;
	min-width: 0;
}

.sl-infosec-2026-cyber-campaign__content .sl-home-sub-heading {
	display: inline-flex;
	margin-bottom: 12px;
}

.sl-infosec-2026-cyber-campaign__content .sl-h2 {
	width: 100%;
	margin: 0 0 14px;
	font-size: 26px;
	line-height: 1.25;
}

.sl-infosec-2026-cyber-campaign__content .sl-h2 span {
	display: block;
	color: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-cyber-campaign__lead {
	width: 100%;
	margin: 0;
}


/* =========================================
   CAMPAIGN OFFER
========================================= */

.sl-infosec-2026-cyber-campaign__offer {
	display: flex;
	flex-direction: column;
	align-items: stretch;
	justify-content: center;
	width: 100%;
	min-width: 0;
	padding: 20px 18px;
	border: 1px solid rgba(20, 114, 186, 0.16);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
	align-items: center;
}

.sl-infosec-2026-cyber-campaign__offer-label {
	margin-bottom: 8px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 12px;
	font-weight: 700;
	letter-spacing: normal;
	line-height: 1.3;
	text-transform: none;
}

.sl-infosec-2026-cyber-campaign__price {
	display: flex;
	flex-wrap: wrap;
	align-items: baseline;
	gap: 4px;
	margin-bottom: 18px;
	color: var(--sl-page-navy, #16234e);
	font-size: 16px;
	font-weight: 600;
	line-height: 1.3;
}

.sl-infosec-2026-cyber-campaign__currency,
.sl-infosec-2026-cyber-campaign__unit {
	margin: 0;
	color: inherit;
	font-size: inherit;
	font-weight: inherit;
	letter-spacing: normal;
	line-height: inherit;
}

.sl-infosec-2026-cyber-campaign__amount {
	margin: 0;
	color: var(--sl-page-primary, #1472ba);
	font-size: 20px;
	font-weight: 700;
	letter-spacing: normal;
	line-height: 1.3;
}


/* =========================================
   CAMPAIGN CTA
   Default = tablet+ auto width. Mobile full width.
========================================= */

.sl-infosec-2026-cyber-campaign__actions {
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: center;
	width: 100%;
	margin: 0;
	text-align: center;
}

.sl-infosec-2026-cyber-campaign__cta,
.sl-infosec-2026-cyber-page
	.sl-infosec-2026-cyber-campaign__actions
	.sl-btn.sl-infosec-2026-cyber-campaign__cta {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 10px;
	width: auto;
	max-width: 100%;
	margin: 0;
	padding: 13px 20px;
	box-sizing: border-box;
	text-align: center;
	white-space: nowrap;
}

.sl-infosec-2026-cyber-campaign__cta svg {
	display: block;
	flex: 0 0 auto;
	width: 18px;
	height: 18px;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.8;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-infosec-2026-cyber-campaign__terms {
	width: 100%;
	margin: 12px 0 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	line-height: 1.45;
}

@media (max-width: 767px) {
	.sl-infosec-2026-cyber-campaign__cta,
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-cyber-campaign__actions
		.sl-btn.sl-infosec-2026-cyber-campaign__cta {
		width: 100%;
		max-width: 100%;
		white-space: normal;
	}
}


/* =========================================
   CAMPAIGN RESPONSIVE
========================================= */

@media (min-width: 768px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-cyber-campaign.sl-section {
		padding-top: 70px;
		padding-bottom: 70px;
	}

	.sl-infosec-2026-cyber-campaign__card {
		grid-template-columns:
			minmax(0, 1.1fr)
			minmax(300px, 0.9fr);
		gap: 20px;
		padding: 40px 42px;
	}

	.sl-infosec-2026-cyber-campaign__offer {
		padding: 24px;
	}

	.sl-infosec-2026-cyber-campaign__content .sl-h2 {
		font-size: 34px;
	}
}

@media (min-width: 1000px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-cyber-campaign.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-infosec-2026-cyber-campaign__card {
		grid-template-columns:
			minmax(0, 1fr)
			minmax(340px, 0.9fr);
		gap: 24px;
		padding: 44px 48px;
	}

	.sl-infosec-2026-cyber-campaign__content .sl-h2 {
		font-size: 42px;
	}
}


/* =========================================
   TESTING
========================================= */

.sl-infosec-2026-cyber-page
	.sl-infosec-2026-cyber-testing.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-infosec-2026-cyber-testing__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 36px;
}

.sl-infosec-2026-cyber-testing__content {
	width: 100%;
	min-width: 0;
}

.sl-infosec-2026-cyber-testing__content .sl-h2 {
	width: 100%;
	margin: 0 0 22px;
}

.sl-infosec-2026-cyber-testing__content .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-cyber-testing__content p {
	width: 100%;
	margin: 0 0 16px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}


/* =========================================
   TESTING QUESTIONS
   Row UI comes from global-ui.php
========================================= */

.sl-infosec-2026-cyber-testing__questions {
	width: 100%;
	margin: 22px 0;
}

.sl-infosec-2026-cyber-testing__questions .sl-list-item {
	align-items: flex-start;
}

.sl-infosec-2026-cyber-testing__question-mark {
	display: inline-block;
	flex: 0 0 8px;
	width: 8px;
	height: 8px;
	margin-top: 0.5em;
	border-radius: 50%;
	background: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-cyber-testing__questions .sl-list-item__text {
	color: var(--sl-page-text, #4a4a4a);
}


/* =========================================
   EMPHASIS
========================================= */

.sl-infosec-2026-cyber-testing__emphasis {
	width: 100%;
	margin: 22px 0 0;
	padding: 0;
	border: 0;
	background: transparent;
	color: var(--sl-page-navy, #16234e);
	font-style: italic;
	font-weight: 600;
	line-height: 1.55;
}


/* =========================================
   TESTING VISUAL
========================================= */

.sl-infosec-2026-cyber-testing__visual {
	position: static;
	display: flex;
	align-self: start;
	align-items: flex-start;
	justify-content: center;
	width: 100%;
	min-width: 0;
}

.sl-infosec-2026-cyber-testing__image-placeholder-unused {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 100%;
	aspect-ratio: 1 / 1;
	border: 1px dashed rgba(20, 114, 186, 0.28);
	border-radius: 16px;
	background: var(--sl-page-primary-soft);
	text-align: center;
	box-sizing: border-box;
}

.sl-infosec-2026-cyber-testing__image-placeholder span {
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
}

.sl-infosec-2026-cyber-testing__image-placeholder small {
	margin-top: 8px;
	color: var(--sl-page-muted, #6b7c93);
}


/* =========================================
   TESTING RESPONSIVE
========================================= */

@media (min-width: 768px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-cyber-testing.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-infosec-2026-cyber-testing__grid {
		gap: 48px;
	}

	.sl-infosec-2026-cyber-testing__questions {
		margin-top: 26px;
		margin-bottom: 26px;
	}
}

@media (min-width: 1000px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-cyber-testing.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-infosec-2026-cyber-testing__grid {
		grid-template-columns:
			minmax(420px, 0.85fr)
			minmax(0, 1fr);
		gap: 70px;
	}

	.sl-infosec-2026-cyber-testing__visual {
		order: -1;
		position: sticky;
		top: calc(var(--slf-header-clearance, 110px) + 24px);
		padding-left: 0;
		padding-right: 10px;
	}
}

/* =========================================
   CHALLENGE
========================================= */

.sl-infosec-2026-cyber-page
	.sl-infosec-challenge.sl-section {
	position: relative;
	padding: 52px 16px;
	overflow: hidden;
	background: var(--sl-page-white, #ffffff);
}


/* =========================================
   CHALLENGE INTRO
========================================= */

.sl-infosec-challenge__intro {
	width: 100%;
	margin-bottom: 30px;
}

.sl-infosec-challenge__eyebrow {
	display: inline-flex;
	align-items: center;
	gap: 12px;
}

.sl-infosec-challenge__heading {
	width: 100%;
	margin: 0 0 14px;
}

.sl-infosec-challenge__intro-text {
	width: 100%;
	margin: 0 0 10px;
}

.sl-infosec-challenge__intro-highlight {
	width: 100%;
	margin: 0 0 22px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

.sl-infosec-challenge__intro-highlight strong {
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
}

.sl-infosec-challenge__intro-criteria-lead {
	width: 100%;
	margin: 0 0 20px;
	color: var(--sl-page-navy, #16234e);
}


/* =========================================
   QUALIFICATION CRITERIA
   Mobile: Card 1 / OR / Card 2 stacked
   Tablet+: Card 1 | OR | Card 2 aligned
========================================= */

.sl-infosec-challenge__criteria {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: stretch;
	gap: 10px;
	width: 100%;
	margin: 0;
}

.sl-infosec-challenge__criteria-item {
	display: flex;
	align-items: center;
	gap: 12px;
	width: 100%;
	min-width: 0;
	height: 100%;
	padding: 14px;
	border: 1px solid rgba(20, 114, 186, 0.18);
	border-radius: 9px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-infosec-challenge__number {
	display: inline-flex;
	flex: 0 0 34px;
	align-items: center;
	justify-content: center;
	width: 34px;
	height: 34px;
	border-radius: 50%;
	background: var(--sl-page-primary, #1472ba);
	color: var(--sl-page-white, #ffffff);
	font-weight: 700;
	font-variant-numeric: tabular-nums;
}

.sl-infosec-challenge__criteria-copy {
	display: flex;
	flex: 1 1 auto;
	flex-direction: column;
	gap: 2px;
	min-width: 0;
	color: var(--sl-page-text, #4a4a4a);
}

.sl-infosec-challenge__criteria-copy strong {
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
}

.sl-infosec-challenge__criteria-divider {
	display: flex;
	align-items: center;
	justify-content: center;
	align-self: center;
	width: 100%;
	min-height: 20px;
	color: var(--sl-page-muted, #6b7c93);
}

.sl-infosec-challenge__criteria-divider::before,
.sl-infosec-challenge__criteria-divider::after {
	flex: 1 1 auto;
	height: 1px;
	background: rgba(107, 124, 147, 0.28);
	content: "";
}

.sl-infosec-challenge__criteria-divider span {
	padding: 0 10px;
	font-size: 13px;
	font-weight: 700;
}


/* =========================================
   RESULT PATHS
========================================= */

.sl-infosec-challenge__paths {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: stretch;
	gap: 24px;
	width: 100%;
}

.sl-infosec-challenge__card {
	display: flex;
	flex-direction: column;
	height: 100%;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.22);
	border-top: 3px solid var(--sl-page-primary, #1472ba);
	border-radius: 12px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-infosec-challenge__card--awareness {
	border-top-color: var(--sl-page-primary-dark, #283384);
}


/* =========================================
   RESULT CARD HEADER
========================================= */

.sl-infosec-challenge__card-header {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	margin-bottom: 20px;
}

.sl-infosec-challenge__icon {
	display: inline-flex;
	flex: 0 0 40px;
	align-items: center;
	justify-content: center;
	width: 40px;
	height: 40px;
	border-radius: 10px;
	background: var(--sl-page-primary-soft);
	color: var(--sl-page-primary, #1472ba);
}

.sl-infosec-challenge__card--awareness
	.sl-infosec-challenge__icon {
	color: var(--sl-page-primary-dark, #283384);
}

.sl-infosec-challenge__icon svg,
.sl-infosec-challenge__mini-icon svg,
.sl-infosec-challenge__benefit-icon svg {
	display: block;
	width: 100%;
	height: 100%;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.7;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-infosec-challenge__icon svg {
	width: 23px;
	height: 23px;
}

.sl-infosec-challenge__card-heading {
	flex: 1 1 auto;
	min-width: 0;
}

.sl-infosec-challenge__card-label {
	display: block;
	margin-bottom: 6px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 13px;
	font-weight: 700;
	letter-spacing: 0.04em;
	text-transform: uppercase;
}

.sl-infosec-challenge__card--awareness
	.sl-infosec-challenge__card-label {
	color: var(--sl-page-primary-dark, #283384);
}

.sl-infosec-challenge__card-title {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 20px;
	font-weight: 700;
	line-height: 1.4;
}


/* =========================================
   AWARENESS INTRO
========================================= */

.sl-infosec-challenge__awareness-intro {
	width: 100%;
	margin-bottom: 26px;
}

.sl-infosec-challenge__awareness-intro p {
	margin: 0 0 10px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

.sl-infosec-challenge__awareness-intro p:last-child {
	margin-bottom: 0;
}

.sl-infosec-challenge__awareness-intro strong {
	color: var(--sl-page-primary, #1472ba);
}


/* =========================================
   BENEFIT HEADING
========================================= */

.sl-infosec-challenge__subheading {
	display: flex;
	align-items: center;
	gap: 9px;
	width: 100%;
	margin-bottom: 14px;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
}

.sl-infosec-challenge__mini-icon {
	display: inline-flex;
	flex: 0 0 20px;
	width: 20px;
	height: 20px;
	color: var(--sl-page-primary, #1472ba);
}


/* =========================================
   BENEFIT LIST
   Row chrome comes from global-ui.php
========================================= */

/* =========================================
   BENEFITS
   Mobile: 1 card / Tablet+: 2 cards per row
   Row chrome comes from global-ui.php
========================================= */

.sl-infosec-challenge__benefits,
.sl-infosec-challenge__benefits.sl-list {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-infosec-challenge__benefit {
	display: block;
	width: 100%;
	min-width: 0;
	min-height: 0;
	margin: 0;
	padding: 16px;
	box-sizing: border-box;
}

.sl-infosec-challenge__benefit-icon {
	display: inline-block;
	width: 34px;
	height: 34px;
	margin: 0 0 10px;
	border-radius: 50%;
	background: var(--sl-page-primary-soft);
	color: var(--sl-page-primary, #1472ba);
	line-height: 34px;
	text-align: center;
	vertical-align: top;
}

.sl-infosec-challenge__benefit-icon svg {
	display: inline-block;
	width: 18px;
	height: 18px;
	margin-top: 8px;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.7;
	stroke-linecap: round;
	stroke-linejoin: round;
	vertical-align: top;
}

.sl-infosec-challenge__benefit-copy {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-infosec-challenge__benefit-title {
	display: block;
	width: 100%;
	margin: 0 0 5px;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.45;
}

.sl-infosec-challenge__complimentary {
	display: block;
	width: 100%;
	margin: 0 0 5px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-infosec-challenge__benefit-text {
	display: block;
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.6;
}


/* =========================================
   BENEFIT LIST RESPONSIVE
========================================= */

@media (max-width: 767px) {
	.sl-infosec-challenge__benefit {
		padding: 16px 14px;
	}

	.sl-infosec-challenge__benefit-icon {
		margin-bottom: 10px;
	}
}

/* =========================================
   RESULT MESSAGE
========================================= */

.sl-infosec-challenge__message {
	width: 100%;
	margin-top: auto;
	padding-top: 22px;
}

.sl-infosec-challenge__message p {
	margin: 0 0 10px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

.sl-infosec-challenge__message p:last-child {
	margin-bottom: 0;
}

.sl-infosec-challenge__message-lead {
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
}


/* =========================================
   ELIGIBILITY NOTE
========================================= */

.sl-infosec-challenge__terms {
	/* Chrome from global-highlight.php (.sl-highlight) */
	width: 100%;
	margin-top: 28px;
}

.sl-infosec-challenge__terms p {
	margin: 0;
}


/* =========================================
   CHALLENGE RESPONSIVE
========================================= */

@media (min-width: 768px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-challenge.sl-section {
		padding-top: 64px;
		padding-bottom: 64px;
	}

	.sl-infosec-challenge__intro {
		margin-bottom: 36px;
	}

	.sl-infosec-challenge__criteria {
		grid-template-columns:
			minmax(0, 1fr)
			auto
			minmax(0, 1fr);
		align-items: stretch;
		gap: 14px;
	}

	.sl-infosec-challenge__criteria-divider {
		width: auto;
		min-height: 0;
	}

	.sl-infosec-challenge__criteria-divider::before,
	.sl-infosec-challenge__criteria-divider::after {
		display: none;
	}

	.sl-infosec-challenge__criteria-divider span {
		padding: 0;
	}

	.sl-infosec-challenge__benefits,
	.sl-infosec-challenge__benefits.sl-list {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 12px;
	}

	.sl-infosec-challenge__card {
		padding: 30px;
	}

	.sl-infosec-challenge__card-header {
		gap: 16px;
	}

	.sl-infosec-challenge__icon {
		flex-basis: 44px;
		width: 44px;
		height: 44px;
	}
}

@media (min-width: 901px) {
	.sl-infosec-challenge__paths {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
}

@media (min-width: 1000px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-challenge.sl-section {
		padding-top: 80px;
		padding-bottom: 80px;
	}

	.sl-infosec-challenge__intro {
		margin-bottom: 42px;
	}
}


/* =========================================
   CAMPAIGN WORKS
========================================= */

.sl-infosec-2026-cyber-page
	.sl-infosec-2026-how-it-works.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}


/* =========================================
   CAMPAIGN WORKS INTRO
========================================= */

.sl-infosec-2026-how-it-works__intro {
	width: 100%;
	margin: 0;
	min-width: 0;
}

.sl-infosec-2026-how-it-works__intro .sl-home-sub-heading {
	display: inline-flex;
	margin-bottom: 14px;
}

.sl-infosec-2026-how-it-works__intro .sl-h2 {
	width: 100%;
	margin: 0;
}

.sl-infosec-2026-how-it-works__intro .sl-h2 > span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-how-it-works__media {
	width: 100%;
	min-width: 0;
	margin-top: 20px;
}

.sl-infosec-2026-how-it-works__image-placeholder-unused {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 100%;
	min-height: 220px;
	padding: 24px;
	border: 1px dashed rgba(22, 35, 78, 0.2);
	border-radius: 16px;
	background: var(--sl-page-white, #fff);
	text-align: center;
	box-sizing: border-box;
}

.sl-infosec-2026-how-it-works__image-placeholder span {
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
}

.sl-infosec-2026-how-it-works__image-placeholder small {
	margin-top: 8px;
	color: var(--sl-page-muted, #6b7c93);
}


/* =========================================
   CAMPAIGN WORKS LAYOUT
========================================= */

.sl-infosec-2026-how-it-works__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 22px;
	width: 100%;
}

.sl-infosec-2026-how-it-works__cards {
	min-width: 0;
}

.sl-infosec-2026-how-it-works__steps {
	display: flex;
	flex-direction: column;
	gap: 16px;
	width: 100%;
	min-width: 0;
}


/* =========================================
   CAMPAIGN STEP
========================================= */

.sl-infosec-2026-how-it-works__step {
	display: block;
	width: 100%;
	min-width: 0;
	padding: 18px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-infosec-2026-how-it-works__step--final {
	border-top: 3px solid var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-how-it-works__number {
	display: inline-block;
	width: 40px;
	height: 40px;
	margin: 0 0 12px;
	border-radius: 10px;
	background: var(--sl-page-primary-soft);
	color: var(--sl-page-primary, #1472ba);
	font-size: 14px;
	font-weight: 700;
	font-variant-numeric: tabular-nums;
	line-height: 40px;
	text-align: center;
}

.sl-infosec-2026-how-it-works__content {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-infosec-2026-how-it-works__content .sl-panel-title {
	width: 100%;
	margin: 0 0 10px;
	color: var(--sl-page-navy, #16234e);
}

.sl-infosec-2026-how-it-works__content p {
	width: 100%;
	margin: 0 0 12px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

.sl-infosec-2026-how-it-works__content p:last-child {
	margin-bottom: 0;
}

.sl-infosec-2026-how-it-works__note {
	margin-top: 4px;
	color: var(--sl-page-navy, #16234e);
}

.sl-infosec-2026-how-it-works__note strong {
	color: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-how-it-works__closing {
	margin-top: 4px;
}


/* =========================================
   CAMPAIGN GAP LIST
========================================= */

.sl-infosec-2026-how-it-works__list {
	display: block;
	width: 100%;
	margin: 14px 0 16px;
	padding: 0;
	list-style: none;
}

.sl-infosec-2026-how-it-works__list.sl-list--2up {
	display: block;
	grid-template-columns: none;
}

.sl-infosec-2026-how-it-works__list .sl-list-item {
	width: 100%;
	min-width: 0;
	margin-bottom: 12px;
}

.sl-infosec-2026-how-it-works__check {
	display: inline-flex;
	flex: 0 0 20px;
	align-items: center;
	justify-content: center;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: var(--sl-page-primary, #1472ba);
	color: var(--sl-page-white, #ffffff);
	font-size: 12px;
	font-weight: 700;
}


/* =========================================
   CAMPAIGN OUTCOMES
========================================= */

.sl-infosec-2026-how-it-works__outcomes {
	display: block;
	width: 100%;
	margin: 16px 0 18px;
}

.sl-infosec-2026-how-it-works__outcome {
	width: 100%;
	margin: 0 0 14px;
	padding: 18px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 12px;
	background: transparent;
	box-sizing: border-box;
}

.sl-infosec-2026-how-it-works__outcome:last-child {
	margin-bottom: 0;
}

.sl-infosec-2026-how-it-works__outcome h4 {
	width: 100%;
	margin: 0 0 8px;
	color: var(--sl-page-navy, #16234e);
	font-size: 18px;
	font-weight: 700;
	line-height: 1.3;
}

.sl-infosec-2026-how-it-works__outcome p {
	margin: 0;
}

.sl-infosec-2026-how-it-works__continue {
	margin: 0 0 20px;
	color: var(--sl-page-primary, #1472ba);
	font-style: italic;
	font-weight: 700;
	text-align: center;
}


/* =========================================
   CAMPAIGN CTA
========================================= */

.sl-infosec-2026-how-it-works__actions {
	display: flex;
	flex-direction: column;
	flex-wrap: wrap;
	align-items: stretch;
	justify-content: flex-start;
	gap: 12px;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin-top: 20px;
	box-sizing: border-box;
}

.sl-infosec-2026-how-it-works__cta,
.sl-infosec-2026-cyber-page
	.sl-infosec-2026-how-it-works__actions
	.sl-btn.sl-infosec-2026-how-it-works__cta {
	display: inline-flex;
	flex: 1 1 auto;
	flex-wrap: wrap;
	align-items: center;
	justify-content: center;
	gap: 10px;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin: 0;
	padding: 13px 16px;
	box-sizing: border-box;
	text-align: center;
	white-space: normal;
	overflow-wrap: anywhere;
	word-break: break-word;
	line-height: 1.35;
}

.sl-infosec-2026-how-it-works__cta svg {
	display: block;
	flex: 0 0 auto;
	width: 18px;
	height: 18px;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.8;
	stroke-linecap: round;
	stroke-linejoin: round;
}


/* =========================================
   CAMPAIGN WORKS RESPONSIVE
========================================= */

@media (max-width: 767px) {
	.sl-infosec-2026-how-it-works__cta,
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-how-it-works__actions
		.sl-btn.sl-infosec-2026-how-it-works__cta {
		width: 100%;
		max-width: 100%;
		white-space: normal;
	}
}

@media (min-width: 768px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-how-it-works.sl-section {
		padding-top: 70px;
		padding-bottom: 70px;
	}

	.sl-infosec-2026-how-it-works__grid {
		grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
		gap: 28px;
		align-items: start;
	}

	.sl-infosec-2026-how-it-works__cards {
		order: -1;
	}

	.sl-infosec-2026-how-it-works__intro {
		position: sticky;
		top: 16px;
	}

	.sl-infosec-2026-how-it-works__media {
		margin-top: 24px;
	}

	.sl-infosec-2026-how-it-works__image-placeholder-unused {
		min-height: 300px;
	}

	.sl-infosec-2026-how-it-works__step {
		padding: 24px;
	}

	.sl-infosec-2026-how-it-works__number {
		width: 48px;
		height: 48px;
		margin-bottom: 14px;
		border-radius: 12px;
		font-size: 15px;
		line-height: 48px;
	}
}

@media (min-width: 1000px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-how-it-works.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-infosec-2026-how-it-works__grid {
		gap: 40px;
	}
}


/* =========================================
   UNDERSTAND
========================================= */

.sl-infosec-2026-cyber-page
	.sl-infosec-2026-understand.sl-section {
	padding: 60px 16px;
	overflow: visible;
	background: var(--sl-page-white, #ffffff);
}


/* =========================================
   UNDERSTAND LAYOUT
========================================= */

.sl-infosec-2026-understand__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 40px;
	width: 100%;
}


/* =========================================
   UNDERSTAND IMAGE
========================================= */

.sl-infosec-2026-understand__media {
	position: static;
	align-self: start;
	width: 100%;
	min-width: 0;
}

.sl-infosec-2026-understand__image-placeholder-unused {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 100%;
	min-height: 300px;
	padding: 30px;
	border: 1px dashed rgba(22, 35, 78, 0.2);
	border-radius: 16px;
	background: var(--sl-page-white, #ffffff);
	text-align: center;
	box-sizing: border-box;
}

.sl-infosec-2026-understand__image-placeholder span {
	display: block;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
}

.sl-infosec-2026-understand__image-placeholder small {
	display: block;
	margin-top: 8px;
	color: var(--sl-page-muted, #6b7c93);
}


/* =========================================
   UNDERSTAND CONTENT
========================================= */

.sl-infosec-2026-understand__content {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-infosec-2026-understand__content .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-infosec-2026-understand__content .sl-h2 {
	width: 100%;
	margin: 0 0 28px;
}

.sl-infosec-2026-understand__content .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}


/* =========================================
   UNDERSTAND LIST
   Mobile: 1 card / Tablet+: 2 cards per row
========================================= */

.sl-infosec-2026-understand__list,
.sl-infosec-2026-understand__list.sl-list {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-infosec-2026-understand__item,
.sl-infosec-2026-understand__list
	.sl-list-item.sl-infosec-2026-understand__item {
	display: block;
	width: 100%;
	min-width: 0;
	min-height: 0;
	margin: 0;
	padding: 18px;
	border: 1px solid rgba(22, 35, 78, 0.09);
	border-radius: 10px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
}

.sl-infosec-2026-understand__item:last-child,
.sl-infosec-2026-understand__list
	.sl-list-item.sl-infosec-2026-understand__item:last-child {
	padding-bottom: 18px;
}


/* =========================================
   UNDERSTAND ITEM CONTENT
========================================= */

.sl-infosec-2026-understand__item-content {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-infosec-2026-understand__item-content .sl-panel-title {
	display: block;
	width: 100%;
	margin: 0 0 6px;
	color: var(--sl-page-navy, #16234e);
}

.sl-infosec-2026-understand__item-content p,
.sl-infosec-2026-understand__item-content .sl-list-item__text {
	display: block;
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}


/* =========================================
   UNDERSTAND RESPONSIVE
========================================= */

@media (min-width: 768px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-understand.sl-section {
		padding-top: 70px;
		padding-bottom: 70px;
	}

	.sl-infosec-2026-understand__content .sl-h2 {
		margin-bottom: 34px;
	}

	.sl-infosec-2026-understand__list,
	.sl-infosec-2026-understand__list.sl-list {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 14px;
	}

	.sl-infosec-2026-understand__item,
	.sl-infosec-2026-understand__list
		.sl-list-item.sl-infosec-2026-understand__item {
		padding: 20px;
	}
}

@media (min-width: 901px) {
	.sl-infosec-2026-understand__grid {
		grid-template-columns:
			minmax(0, 0.9fr)
			minmax(0, 1.1fr);
		gap: 45px;
	}

	.sl-infosec-2026-understand__media {
		position: sticky;
		top: calc(var(--slf-header-clearance, 110px) + 24px);
		order: -1;
	}

	.sl-infosec-2026-understand__image-placeholder-unused {
		min-height: 460px;
	}
}

@media (min-width: 1000px) {
	.sl-infosec-2026-cyber-page
		.sl-infosec-2026-understand.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-infosec-2026-understand__grid {
		gap: 70px;
	}

	.sl-infosec-2026-understand__image-placeholder-unused {
		min-height: 520px;
	}
}

/* Terms and Conditions */
.sl-infosec-2026-cyber-page .sl-infosec-2026-terms.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-infosec-2026-terms__intro {
	margin: 0 0 32px;
	padding-bottom: 0;
	border-bottom: 0;
}

.sl-infosec-2026-terms__intro .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-infosec-2026-terms__intro .sl-h2 {
	margin: 0 0 16px;
}

.sl-infosec-2026-terms__intro p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

.sl-infosec-2026-terms__content {
	display: flex;
	flex-direction: column;
	gap: 12px;
	margin: 0;
	border: 0;
}

.sl-infosec-2026-terms__accordion {
	display: flex;
	flex-direction: column;
	gap: 12px;
	margin: 0;
	padding: 0;
	border: 0;
	background: transparent;
}

.sl-infosec-2026-terms__item {
	display: block;
	margin: 0;
	padding: 0;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-shadow: 0 8px 22px rgba(22, 35, 78, 0.04);
	box-sizing: border-box;
	overflow: hidden;
}

amp-accordion.sl-infosec-2026-terms__accordion > section[expanded],
.sl-infosec-2026-terms__item[expanded] {
	border-color: rgba(20, 114, 186, 0.35);
	box-shadow: 0 12px 28px rgba(22, 35, 78, 0.08);
}

amp-accordion.sl-infosec-2026-terms__accordion > section > .sl-infosec-2026-terms__summary,
.sl-infosec-2026-terms__summary {
	display: flex !important;
	align-items: center;
	justify-content: space-between;
	gap: 16px;
	margin: 0;
	padding: 16px 16px 16px 18px;
	border: 0;
	border-left: 3px solid transparent;
	background: transparent;
	color: var(--sl-page-navy, #16234e);
	font-size: 17px;
	font-weight: 700;
	line-height: 1.4;
	cursor: pointer;
	box-sizing: border-box;
}

amp-accordion.sl-infosec-2026-terms__accordion > section > .sl-infosec-2026-terms__summary::after,
.sl-infosec-2026-terms__summary::after {
	content: "";
	flex: 0 0 34px;
	width: 34px;
	height: 34px;
	margin: 0 0 0 auto;
	border-radius: 10px;
	background-color: rgba(20, 114, 186, 0.1);
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M6 9l6 6 6-6' stroke='%231472ba' stroke-width='2.25' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
	background-repeat: no-repeat;
	background-position: center;
	background-size: 16px 16px;
	transition: transform 0.25s ease, background-color 0.25s ease;
}

amp-accordion.sl-infosec-2026-terms__accordion > section[expanded] > .sl-infosec-2026-terms__summary,
.sl-infosec-2026-terms__item[expanded] > .sl-infosec-2026-terms__summary {
	color: var(--sl-page-primary, #1472ba);
	border-left-color: var(--sl-page-primary, #1472ba);
	background: rgba(20, 114, 186, 0.04);
}

amp-accordion.sl-infosec-2026-terms__accordion > section[expanded] > .sl-infosec-2026-terms__summary::after,
.sl-infosec-2026-terms__item[expanded] > .sl-infosec-2026-terms__summary::after {
	content: "";
	transform: rotate(180deg);
	background-color: rgba(20, 114, 186, 0.16);
}

.sl-infosec-2026-terms__panel {
	padding: 4px 18px 18px 21px;
	border-top: 1px solid rgba(107, 124, 147, 0.12);
}

.sl-infosec-2026-terms__panel > p {
	margin: 0 0 14px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

.sl-infosec-2026-terms__panel > p:last-child {
	margin-bottom: 0;
}

/* Challenge criteria */
.sl-infosec-2026-terms__criteria {
	display: block;
	margin: 20px 0 22px;
}

.sl-infosec-2026-terms__criterion {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	margin: 0 0 12px;
	padding: 0;
	border: 0;
	border-radius: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-infosec-2026-terms__criterion:last-child {
	margin-bottom: 0;
}

.sl-infosec-2026-terms__criterion::before {
	content: "";
	flex: 0 0 7px;
	width: 7px;
	height: 7px;
	margin-top: calc((1em * 1.65 - 7px) / 2);
	border-radius: 50%;
	background: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-terms__number {
	display: none;
}

.sl-infosec-2026-terms__criterion p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

.sl-infosec-2026-terms__or {
	display: block;
	position: relative;
	margin: 12px 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 12px;
	font-weight: 700;
	line-height: 1;
	text-align: center;
}

.sl-infosec-2026-terms__or::before {
	content: "";
	position: absolute;
	top: 50%;
	right: 0;
	left: 0;
	height: 1px;
	background: rgba(107, 124, 147, 0.22);
}

.sl-infosec-2026-terms__or span {
	position: relative;
	z-index: 1;
	display: inline-block;
	padding: 0 12px;
	background: var(--sl-page-white, #fff);
}

/* Benefit rows */
.sl-infosec-2026-terms__benefits {
	display: block;
	margin: 20px 0 22px;
}

.sl-infosec-2026-terms__benefit {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	margin: 0 0 12px;
	padding: 0;
	border: 0;
	border-radius: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-infosec-2026-terms__benefit:last-child {
	margin-bottom: 0;
}

.sl-infosec-2026-terms__benefit::before {
	content: "";
	flex: 0 0 7px;
	width: 7px;
	height: 7px;
	margin-top: calc((1em * 1.65 - 7px) / 2);
	border-radius: 50%;
	background: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-terms__benefit-label {
	display: none;
}

.sl-infosec-2026-terms__benefit p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

/* Complimentary benefit list */
.sl-infosec-2026-terms__list {
	display: block;
	margin: 20px 0 0;
	padding: 0;
	list-style: none;
}

.sl-infosec-2026-terms__list-item {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	margin: 0 0 12px;
	padding: 0;
	border: 0;
	border-radius: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-infosec-2026-terms__list-item:last-child {
	margin-bottom: 0;
}

.sl-infosec-2026-terms__list-item::before {
	content: "";
	flex: 0 0 7px;
	width: 7px;
	height: 7px;
	margin-top: calc((1em * 1.65 - 7px) / 2);
	border-radius: 50%;
	background: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-terms__list-marker {
	display: none;
}

.sl-infosec-2026-terms__list-item p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

@media (min-width: 768px) {
	.sl-infosec-2026-cyber-page .sl-infosec-2026-terms.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-infosec-2026-terms__intro {
		margin-bottom: 38px;
		padding-bottom: 0;
	}

	amp-accordion.sl-infosec-2026-terms__accordion > section > .sl-infosec-2026-terms__summary,
	.sl-infosec-2026-terms__summary {
		padding: 18px 18px 18px 20px;
		font-size: 18px;
	}

	.sl-infosec-2026-terms__panel {
		padding: 4px 20px 20px 23px;
	}
}

@media (min-width: 1000px) {
	.sl-infosec-2026-cyber-page .sl-infosec-2026-terms.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-infosec-2026-terms__intro {
		margin-bottom: 42px;
	}

	amp-accordion.sl-infosec-2026-terms__accordion > section > .sl-infosec-2026-terms__summary,
	.sl-infosec-2026-terms__summary {
		font-size: 19px;
	}
}

/* Contact */
.sl-infosec-2026-cyber-page .sl-infosec-2026-contact.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-infosec-2026-contact__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 32px;
}

.sl-infosec-2026-contact__content,
.sl-infosec-2026-contact__form-wrap {
	min-width: 0;
	width: 100%;
}

.sl-infosec-2026-contact__content .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-infosec-2026-contact__content .sl-h2 {
	margin: 0 0 18px;
}

.sl-infosec-2026-contact__content .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-infosec-2026-contact__lead {
	margin: 0 0 20px;
	color: var(--sl-page-navy, #16234e);
}

.sl-infosec-2026-contact__price {
	display: inline-flex;
	flex-direction: row;
	flex-wrap: wrap;
	align-items: baseline;
	gap: 8px;
	width: auto;
	max-width: 100%;
	margin: 0 0 20px;
	padding: 16px 20px;
	border: 1px solid rgba(20, 114, 186, 0.18);
	border-left: 4px solid var(--sl-page-primary, #1472ba);
	border-radius: 0 10px 10px 0;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
	white-space: normal;
}

.sl-infosec-2026-contact__price-amount {
	display: inline;
	color: var(--sl-page-primary, #1472ba);
	font-size: 30px;
	font-weight: 700;
	line-height: 1;
}

.sl-infosec-2026-contact__price-label {
	display: inline;
	margin-top: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	font-weight: 600;
	line-height: 1.4;
}

.sl-infosec-2026-contact__description {
	margin: 0 0 20px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

.sl-infosec-2026-contact__whatsapp {
	display: inline-flex;
	align-items: center;
	gap: 12px;
	width: auto;
	max-width: 100%;
	min-height: 56px;
	padding: 10px 18px;
	border: 1px solid #25d366;
	border-radius: 12px;
	background: #25d366;
	color: #fff;
	text-decoration: none;
	box-sizing: border-box;
	box-shadow: 0 12px 28px rgba(37, 211, 102, 0.28);
}

.sl-infosec-2026-contact__whatsapp-icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 auto;
	width: 28px;
	height: 28px;
	color: #fff;
}

.sl-infosec-2026-contact__whatsapp-icon svg {
	display: block;
	width: 22px;
	height: 22px;
}

.sl-infosec-2026-contact__whatsapp-text {
	display: flex;
	flex-direction: column;
	justify-content: center;
	gap: 2px;
	min-width: 0;
}

.sl-infosec-2026-contact__whatsapp-label {
	font-size: 16px;
	font-weight: 700;
	line-height: 1.25;
}

.sl-infosec-2026-contact__whatsapp-number {
	font-size: 14px;
	font-weight: 700;
	line-height: 1.25;
}

.sl-infosec-2026-contact__form-wrap {
	margin: 0;
	padding: 20px;
	border: 1px solid rgba(20, 114, 186, 0.2);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
	min-width: 0;
	max-width: 100%;
	width: 100%;
	overflow-x: hidden;
}

.sl-infosec-2026-contact__form-wrap .ssf-form-wrap {
	max-width: 100%;
	min-width: 0;
	width: 100%;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

.sl-infosec-2026-contact__form-wrap .ssf-form-card {
	padding: 0;
	border: none;
	box-shadow: none;
	background: transparent;
	border-radius: 0;
	min-width: 0;
	max-width: 100%;
	width: 100%;
	box-sizing: border-box;
}

.sl-infosec-2026-contact__form-wrap .ssf-form-header {
	margin-bottom: 1rem;
	text-align: left;
}

.sl-infosec-2026-contact__form-wrap .ssf-form-title {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 20px;
	font-weight: 700;
	line-height: 1.3;
}

.sl-infosec-2026-contact__form-wrap .ssf-form-row {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 0;
	min-width: 0;
	max-width: 100%;
}

.sl-infosec-2026-contact__form-wrap .ssf-field {
	display: flex;
	flex-direction: column;
	margin-bottom: 14px;
	min-width: 0;
	max-width: 100%;
}

.sl-infosec-2026-contact__form-wrap .ssf-field label {
	margin-bottom: 6px;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
}

.sl-infosec-2026-contact__form-wrap .ssf-required {
	color: #dc2626;
}

.sl-infosec-2026-contact__form-wrap .ssf-field input:not([type="checkbox"]),
.sl-infosec-2026-contact__form-wrap .ssf-field textarea {
	width: 100%;
	max-width: 100%;
	box-sizing: border-box;
	padding: 12px 14px;
	border: 1.5px solid #e2e8f0;
	border-radius: 8px;
	background: #f8fafc;
	color: #0f172a;
	font: inherit;
}

.sl-infosec-2026-contact__form-wrap .ssf-field input:focus,
.sl-infosec-2026-contact__form-wrap .ssf-field textarea:focus {
	outline: none;
	border-color: #1472ba;
	background: #fff;
	box-shadow: 0 0 0 3px rgba(20, 114, 186, 0.15);
}

.sl-infosec-2026-contact__form-wrap .ssf-checkbox {
	flex-direction: row;
	align-items: flex-start;
	gap: 8px;
}

.sl-infosec-2026-contact__form-wrap .ssf-checkbox input[type="checkbox"] {
	flex-shrink: 0;
	margin-top: 3px;
}

.sl-infosec-2026-contact__form-wrap .ssf-checkbox label {
	margin: 0;
	color: #475569;
	font-size: 12px;
	font-weight: 400;
	line-height: 1.45;
	overflow-wrap: anywhere;
	word-break: break-word;
}

.sl-infosec-2026-contact__form-wrap .ssf-checkbox label a {
	color: #1472ba;
	font-weight: 600;
	text-decoration: none;
}

.sl-infosec-2026-contact__form-wrap .ssf-submit {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	margin-top: 8px;
	padding: 13px 16px;
	border: none;
	border-radius: 8px;
	background: #ea3e24;
	color: #fff;
	font-size: 16px;
	font-weight: 700;
}

.sl-infosec-2026-contact__form-wrap .ssf-submit[disabled] {
	opacity: 0.7;
}

.sl-infosec-2026-contact__form-wrap .ssf-error-message {
	display: none;
	margin-top: 6px;
	color: #dc2626;
	font-size: 12px;
	line-height: 1.4;
}

.sl-infosec-2026-contact__form-wrap .ssf-error-message.amp-visible {
	display: block;
}

.sl-infosec-2026-contact__form-wrap .ssf-honeypot {
	position: absolute;
	left: -9999px;
	width: 1px;
	height: 1px;
	overflow: hidden;
	opacity: 0;
}

.ssf-lightbox-overlay {
	position: fixed;
	inset: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 16px;
	background: rgba(15, 23, 42, 0.58);
}

.ssf-lightbox-content {
	width: 100%;
	max-width: 420px;
	padding: 22px 18px;
	border-radius: 14px;
	background: #fff;
	text-align: center;
	box-shadow: 0 14px 40px rgba(15, 23, 42, 0.22);
}

.ssf-lightbox-title {
	margin: 0 0 8px;
	color: var(--sl-page-navy, #16234e);
	font-size: 20px;
	font-weight: 700;
}

.ssf-lightbox-message {
	margin: 0 0 16px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.5;
}

.ssf-lightbox-button {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-width: 120px;
	padding: 12px 16px;
	border: none;
	border-radius: 8px;
	background: #ea3e24;
	color: #fff;
	font-weight: 700;
}

@media (min-width: 768px) {
	.sl-infosec-2026-contact__form-wrap .ssf-form-row {
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 0 14px;
	}
}

@media (min-width: 768px) {
	.sl-infosec-2026-cyber-page .sl-infosec-2026-contact.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-infosec-2026-contact__grid {
		gap: 40px;
	}

	.sl-infosec-2026-contact__content .sl-h2 {
		margin-bottom: 20px;
	}

	.sl-infosec-2026-contact__lead {
		margin-bottom: 24px;
	}

	.sl-infosec-2026-contact__price {
		margin-bottom: 24px;
		padding: 18px 24px;
	}

	.sl-infosec-2026-contact__price-amount {
		font-size: 32px;
	}

	.sl-infosec-2026-contact__form-wrap {
		padding: 30px;
	}
}

@media (min-width: 901px) {
	.sl-infosec-2026-contact__grid {
		grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
		gap: 48px;
	}

	.sl-infosec-2026-contact__content {
		padding-top: 12px;
	}
}

@media (min-width: 1000px) {
	.sl-infosec-2026-cyber-page .sl-infosec-2026-contact.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}
}