<?php
/**
 * Code of Conduct — AMP page styles (single file for all sections).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

/**
 * Code of Conduct — AMP hero.
 *
 * Mobile:
 * - Content first.
 * - Assessment second.
 * - Full-width CTA buttons.
 *
 * Tablet and desktop:
 * - Content in column one.
 * - Assessment in column two.
 * - CTA buttons displayed inline.
 */

.sl-coc-page .sl-code-of-conduct-hero.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	overflow: hidden;
	background: var(--sl-page-white, #ffffff);
}

/* =========================================================
   HERO GRID
   ========================================================= */

.sl-coc-page .sl-code-of-conduct-hero__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 32px;
	width: 100%;
}

/* =========================================================
   HERO CONTENT
   ========================================================= */

.sl-coc-page .sl-code-of-conduct-hero__content {
	min-width: 0;
	width: 100%;
}

.sl-coc-page .sl-code-of-conduct-hero__breadcrumb {
	margin: 0 0 24px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 14px;
	line-height: 1.5;
}

.sl-coc-page .sl-code-of-conduct-hero__content h1 {
	margin: 16px 0 22px;
	color: var(--sl-page-navy, #16234e);
	font-size: var(--sl-fs-hero-h1);
	font-weight: 700;
	line-height: 1.14;
	letter-spacing: -0.025em;
	overflow-wrap: anywhere;
}

.sl-coc-page .sl-code-of-conduct-hero__highlight {
	color: var(
		--sl-heading-accent,
		var(--sl-page-primary, #1472ba)
	);
}

.sl-coc-page .sl-code-of-conduct-hero__lead {
	margin: 0;
	color: var(--sl-page-text, #425b70);
	font-size: 18px;
	line-height: 1.7;
}

/* =========================================================
   CTA BUTTONS
   ========================================================= */

.sl-coc-page .sl-code-of-conduct-hero__actions {
	display: flex;
	flex-direction: column;
	flex-wrap: nowrap;
	align-items: stretch;
	gap: 12px;
	width: 100%;
	margin-top: 28px;
}

.sl-coc-page .sl-code-of-conduct-hero__actions .sl-hero-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 9px;
	flex: 0 0 auto;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin: 0;
	box-sizing: border-box;
	text-align: center;
	white-space: normal;
	overflow-wrap: anywhere;
}

.sl-coc-page .sl-code-of-conduct-hero__button-icon {
	display: block;
	flex: 0 0 auto;
	color: inherit;
}

/* =========================================================
   ASSESSMENT CARD
   ========================================================= */

.sl-coc-page .sl-code-of-conduct-hero__assessment {
	display: block;
	min-width: 0;
	width: 100%;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(20, 114, 186, 0.2);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-code-of-conduct-hero__assessment-top {
	display: block;
	margin: 0 0 18px;
}

.sl-coc-page .sl-code-of-conduct-hero__assessment-category {
	display: block;
	margin: 0 0 5px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 14px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-coc-page .sl-code-of-conduct-hero__assessment-label {
	display: block;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	font-weight: 600;
	line-height: 1.4;
}

.sl-coc-page .sl-code-of-conduct-hero__question {
	margin: 0 0 20px;
	color: var(--sl-page-navy, #16234e);
	font-size: 20px;
	font-weight: 700;
	line-height: 1.45;
}

/* =========================================================
   ASSESSMENT OPTIONS
   ========================================================= */

.sl-coc-page .sl-code-of-conduct-hero__options {
	display: block;
	width: 100%;
	margin: 0;
}

.sl-coc-page .sl-code-of-conduct-hero__option {
	display: block;
	position: relative;
	width: 100%;
	min-height: 50px;
	margin: 0 0 10px;
	padding: 14px 16px 14px 48px;
	border: 1px solid rgba(107, 124, 147, 0.3);
	border-radius: 10px;
	background: var(--sl-page-white, #ffffff);
	color: var(--sl-page-text, #425b70);
	font-family: inherit;
	font-size: 15px;
	font-weight: 500;
	line-height: 1.5;
	text-align: left;
	cursor: pointer;
	box-sizing: border-box;
	overflow-wrap: anywhere;
}

.sl-coc-page .sl-code-of-conduct-hero__option:last-child {
	margin-bottom: 0;
}

.sl-coc-page .sl-code-of-conduct-hero__option-marker {
	position: absolute;
	top: 50%;
	left: 16px;
	display: block;
	width: 18px;
	height: 18px;
	border: 2px solid rgba(107, 124, 147, 0.5);
	border-radius: 50%;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
	transform: translateY(-50%);
}

.sl-coc-page .sl-code-of-conduct-hero__option-marker::after {
	content: "";
	position: absolute;
	top: 50%;
	left: 50%;
	display: block;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: transparent;
	transform: translate(-50%, -50%);
}

.sl-coc-page .sl-code-of-conduct-hero__option-text {
	display: block;
	min-width: 0;
}

/* Selected correct answer */

.sl-coc-page .sl-code-of-conduct-hero__option.is-correct {
	border-color: var(--sl-page-primary, #1472ba);
	background: rgba(20, 114, 186, 0.09);
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page
	.sl-code-of-conduct-hero__option.is-correct
	.sl-code-of-conduct-hero__option-marker {
	border-color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page
	.sl-code-of-conduct-hero__option.is-correct
	.sl-code-of-conduct-hero__option-marker::after {
	background: var(--sl-page-primary, #1472ba);
}

/* Selected incorrect answer */

.sl-coc-page .sl-code-of-conduct-hero__option.is-incorrect {
	border-color: rgba(40, 51, 132, 0.42);
	background: rgba(40, 51, 132, 0.06);
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page
	.sl-code-of-conduct-hero__option.is-incorrect
	.sl-code-of-conduct-hero__option-marker {
	border-color: var(--sl-page-primary-dark, #283384);
}

.sl-coc-page
	.sl-code-of-conduct-hero__option.is-incorrect
	.sl-code-of-conduct-hero__option-marker::after {
	background: var(--sl-page-primary-dark, #283384);
}

.sl-coc-page .sl-code-of-conduct-hero__option:focus-visible {
	outline: 3px solid rgba(20, 114, 186, 0.25);
	outline-offset: 2px;
}

/* =========================================================
   FEEDBACK
   ========================================================= */

.sl-coc-page .sl-code-of-conduct-hero__feedback {
	display: block;
	margin: 16px 0 0;
	padding: 14px 16px;
	border-radius: 10px;
	color: var(--sl-page-text, #425b70);
	font-size: 14px;
	line-height: 1.6;
	box-sizing: border-box;
}

.sl-coc-page .sl-code-of-conduct-hero__feedback[hidden] {
	display: none;
}

.sl-coc-page .sl-code-of-conduct-hero__feedback strong {
	color: var(--sl-page-navy, #16234e);
	font-weight: 800;
}

.sl-coc-page .sl-code-of-conduct-hero__feedback--success {
	border: 1px solid rgba(20, 114, 186, 0.22);
	background: rgba(20, 114, 186, 0.09);
}

.sl-coc-page .sl-code-of-conduct-hero__feedback--retry {
	border: 1px solid rgba(40, 51, 132, 0.18);
	background: rgba(40, 51, 132, 0.06);
}

/* =========================================================
   TABLET
   Keep hero stacked (col 1 then col 2). Inline CTA buttons.
   ========================================================= */

@media (min-width: 768px) {
	.sl-coc-page .sl-code-of-conduct-hero.sl-section {
		padding-top: 76px;
		padding-bottom: 76px;
	}

	.sl-coc-page .sl-code-of-conduct-hero__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr);
		align-items: start;
		gap: 32px;
		width: 100%;
	}

	.sl-coc-page .sl-code-of-conduct-hero__actions {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		align-items: center;
		justify-content: flex-start;
		gap: 12px;
	}

	.sl-coc-page .sl-code-of-conduct-hero__actions .sl-hero-btn {
		width: fit-content;
		max-width: none;
		flex: 0 0 auto;
		align-self: center;
		white-space: nowrap;
	}

	.sl-coc-page .sl-code-of-conduct-hero__assessment {
		padding: 26px;
	}
}

/* =========================================================
   DESKTOP
   ========================================================= */

@media (min-width: 1000px) {
	.sl-coc-page .sl-code-of-conduct-hero.sl-section {
		padding-top: 96px;
		padding-bottom: 96px;
	}

	.sl-coc-page .sl-code-of-conduct-hero__grid {
		display: grid;
		grid-template-columns:
			minmax(0, 1.06fr)
			minmax(0, 0.94fr);
		align-items: center;
		gap: 56px;
		width: 100%;
	}

	.sl-coc-page .sl-code-of-conduct-hero__assessment {
		padding: 30px;
	}
}

/* =========================================================
   CODE OF CONDUCT HERO — COLUMN 2 ASSESSMENT
   Add this after the existing hero CSS.
   ========================================================= */

.sl-coc-page .sl-code-of-conduct-hero__assessment {
	display: block;
	align-self: center;
	min-width: 0;
	width: 100%;
	max-width: 560px;
	margin: 0 auto;
	padding: 24px;
	border: 1px solid rgba(20, 114, 186, 0.22);
	border-radius: 16px;
	background: var(--sl-page-bg, #f5f5f5);
	box-shadow: 0 18px 45px rgba(22, 35, 78, 0.1);
	box-sizing: border-box;
}

/* Assessment header */

.sl-coc-page .sl-code-of-conduct-hero__assessment-top {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	gap: 4px;
	width: 100%;
	margin: 0 0 18px;
}

.sl-coc-page .sl-code-of-conduct-hero__assessment-category {
	display: block;
	margin: 0;
	color: var(--sl-page-primary, #1472ba);
	font-size: 14px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: 0.02em;
	text-transform: uppercase;
}

.sl-coc-page .sl-code-of-conduct-hero__assessment-label {
	display: block;
	margin: 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	font-weight: 600;
	line-height: 1.4;
}

/* Assessment question */

.sl-coc-page .sl-code-of-conduct-hero__question,
.sl-coc-page h2.sl-code-of-conduct-hero__question {
	display: block;
	margin: 0 0 20px;
	color: var(--sl-page-navy, #16234e);
	font-size: 20px;
	font-weight: 700;
	line-height: 1.45;
	letter-spacing: -0.01em;
	overflow-wrap: anywhere;
}

/* Answer options */

.sl-coc-page .sl-code-of-conduct-hero__options {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 10px;
	width: 100%;
	margin: 0;
}

.sl-coc-page .sl-code-of-conduct-hero__option {
	position: relative;
	display: block;
	min-width: 0;
	width: 100%;
	min-height: 52px;
	margin: 0;
	padding: 14px 16px 14px 48px;
	border: 1px solid rgba(107, 124, 147, 0.32);
	border-radius: 10px;
	background: var(--sl-page-white, #ffffff);
	color: var(--sl-page-text, #4a4a4a);
	font-family: inherit;
	font-size: 15px;
	font-weight: 500;
	line-height: 1.5;
	text-align: left;
	cursor: pointer;
	box-sizing: border-box;
	overflow-wrap: anywhere;
}

.sl-coc-page .sl-code-of-conduct-hero__option-marker {
	position: absolute;
	top: 50%;
	left: 16px;
	display: block;
	width: 18px;
	height: 18px;
	border: 2px solid rgba(107, 124, 147, 0.55);
	border-radius: 50%;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
	transform: translateY(-50%);
}

.sl-coc-page .sl-code-of-conduct-hero__option-marker::after {
	content: "";
	position: absolute;
	top: 50%;
	left: 50%;
	display: block;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: transparent;
	transform: translate(-50%, -50%);
}

.sl-coc-page .sl-code-of-conduct-hero__option-text {
	display: block;
	min-width: 0;
}

/* Correct answer */

.sl-coc-page .sl-code-of-conduct-hero__option.is-correct {
	border-color: var(--sl-page-primary, #1472ba);
	background: rgba(20, 114, 186, 0.1);
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page
	.sl-code-of-conduct-hero__option.is-correct
	.sl-code-of-conduct-hero__option-marker {
	border-color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page
	.sl-code-of-conduct-hero__option.is-correct
	.sl-code-of-conduct-hero__option-marker::after {
	background: var(--sl-page-primary, #1472ba);
}

/* Incorrect answer */

.sl-coc-page .sl-code-of-conduct-hero__option.is-incorrect {
	border-color: var(--sl-page-primary-dark, #283384);
	background: rgba(40, 51, 132, 0.07);
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page
	.sl-code-of-conduct-hero__option.is-incorrect
	.sl-code-of-conduct-hero__option-marker {
	border-color: var(--sl-page-primary-dark, #283384);
}

.sl-coc-page
	.sl-code-of-conduct-hero__option.is-incorrect
	.sl-code-of-conduct-hero__option-marker::after {
	background: var(--sl-page-primary-dark, #283384);
}

.sl-coc-page .sl-code-of-conduct-hero__option:focus-visible {
	outline: 3px solid rgba(20, 114, 186, 0.25);
	outline-offset: 2px;
}

/* Feedback messages */

.sl-coc-page .sl-code-of-conduct-hero__feedback {
	display: block;
	width: 100%;
	margin: 16px 0 0;
	padding: 14px 16px;
	border-radius: 10px;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 14px;
	line-height: 1.6;
	box-sizing: border-box;
}

.sl-coc-page .sl-code-of-conduct-hero__feedback[hidden] {
	display: none;
}

.sl-coc-page .sl-code-of-conduct-hero__feedback strong {
	color: var(--sl-page-navy, #16234e);
	font-weight: 800;
}

.sl-coc-page .sl-code-of-conduct-hero__feedback--success {
	border: 1px solid rgba(20, 114, 186, 0.24);
	background: rgba(20, 114, 186, 0.09);
}

.sl-coc-page .sl-code-of-conduct-hero__feedback--retry {
	border: 1px solid rgba(40, 51, 132, 0.2);
	background: rgba(40, 51, 132, 0.06);
}

/* Tablet: keep assessment under content (stacked) */

@media (min-width: 768px) {
	.sl-coc-page .sl-code-of-conduct-hero__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr);
		align-items: start;
		gap: 32px;
	}

	.sl-coc-page .sl-code-of-conduct-hero__assessment {
		grid-column: auto;
		align-self: stretch;
		width: 100%;
		max-width: 560px;
		margin: 0 auto;
		padding: 26px;
	}
}

/* Desktop */

@media (min-width: 1000px) {
	.sl-coc-page .sl-code-of-conduct-hero__grid {
		display: grid;
		grid-template-columns: minmax(0, 1.06fr) minmax(0, 0.94fr);
		align-items: center;
		gap: 56px;
	}

	.sl-coc-page .sl-code-of-conduct-hero__assessment {
		grid-column: 2;
		padding: 30px;
	}
}

/* Forced-colours accessibility */

@media (forced-colors: active) {
	.sl-coc-page .sl-code-of-conduct-hero__assessment,
	.sl-coc-page .sl-code-of-conduct-hero__option,
	.sl-coc-page .sl-code-of-conduct-hero__feedback {
		border-color: CanvasText;
	}

	.sl-coc-page .sl-code-of-conduct-hero__assessment-category,
	.sl-coc-page .sl-code-of-conduct-hero__option-marker {
		color: LinkText;
		border-color: LinkText;
	}
}

/* Desktop — correct answer green, incorrect answer red */
@media (min-width: 1000px) {

	/* Correct answer */
	.sl-coc-page .sl-code-of-conduct-hero__option.is-correct {
		color: #14532d;
		background-color: #dcfce7;
		border-color: #16a34a;
	}

	.sl-coc-page
		.sl-code-of-conduct-hero__option.is-correct
		.sl-code-of-conduct-hero__option-marker {
		background-color: #ffffff;
		border-color: #16a34a;
	}

	.sl-coc-page
		.sl-code-of-conduct-hero__option.is-correct
		.sl-code-of-conduct-hero__option-marker::after {
		background-color: #16a34a;
	}

	/* Incorrect answer */
	.sl-coc-page .sl-code-of-conduct-hero__option.is-incorrect {
		color: #7f1d1d;
		background-color: #fee2e2;
		border-color: #dc2626;
	}

	.sl-coc-page
		.sl-code-of-conduct-hero__option.is-incorrect
		.sl-code-of-conduct-hero__option-marker {
		background-color: #ffffff;
		border-color: #dc2626;
	}

	.sl-coc-page
		.sl-code-of-conduct-hero__option.is-incorrect
		.sl-code-of-conduct-hero__option-marker::after {
		background-color: #dc2626;
	}

	/* Correct feedback */
	.sl-coc-page .sl-code-of-conduct-hero__feedback--success {
		color: #14532d;
		background-color: #dcfce7;
		border-color: #16a34a;
	}

	.sl-coc-page .sl-code-of-conduct-hero__feedback--success strong {
		color: #14532d;
	}

	/* Incorrect feedback */
	.sl-coc-page .sl-code-of-conduct-hero__feedback--retry {
		color: #7f1d1d;
		background-color: #fee2e2;
		border-color: #dc2626;
	}

	.sl-coc-page .sl-code-of-conduct-hero__feedback--retry strong {
		color: #7f1d1d;
	}
}

/* SucceedLEARN — Code of Conduct AMP Features */

.sl-coc-page .sl-code-conduct-features.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

/* Heading */

.sl-coc-page .sl-code-conduct-features__heading {
	width: 100%;
	margin: 0 0 34px;
	text-align: left;
}

.sl-coc-page .sl-code-conduct-features__heading h2 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page .sl-code-conduct-features__heading h2 > span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-code-conduct-features__heading p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	font-size: var(--sl-fs-body, 16px);
	line-height: 1.7;
}

/* Mobile: one card per row */

.sl-coc-page .sl-code-conduct-features__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

/* Icon and text remain inline */

.sl-coc-page .sl-code-conduct-features__card {
	display: flex;
	align-items: center;
	gap: 14px;
	min-width: 0;
	width: 100%;
	min-height: 82px;
	margin: 0;
	padding: 18px 20px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

/* Smaller icon */

.sl-coc-page .sl-code-conduct-features__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 30px;
	width: 30px;
	height: 30px;
	margin: 0;
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-code-conduct-features__icon svg {
	display: block;
	width: 26px;
	height: 26px;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.8;
	stroke-linecap: round;
	stroke-linejoin: round;
}

/* Text */

.sl-coc-page .sl-code-conduct-features__label {
	display: block;
	flex: 1 1 auto;
	min-width: 0;
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: var(--sl-fs-body, 16px);
	font-weight: 700;
	line-height: 1.4;
	overflow-wrap: anywhere;
}

/* Tablet: exactly two cards per row */

@media (min-width: 768px) {
	.sl-coc-page .sl-code-conduct-features.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-code-conduct-features__heading {
		margin-bottom: 38px;
	}

	.sl-coc-page .sl-code-conduct-features__grid {
		display: grid;
		grid-template-columns:
			minmax(0, 1fr)
			minmax(0, 1fr);
		gap: 20px;
		width: 100%;
	}

	.sl-coc-page .sl-code-conduct-features__card {
		display: flex;
		align-items: center;
		gap: 16px;
		min-width: 0;
		width: 100%;
		min-height: 94px;
		margin: 0;
		padding: 20px 24px;
		box-sizing: border-box;
	}

	.sl-coc-page
		.sl-code-conduct-features__grid
		> :last-child:nth-child(odd) {
		grid-column: 1 / -1;
		justify-self: center;
		width: 100%;
		max-width: calc((100% - 20px) / 2);
	}
}

/* Desktop: four cards per row */

@media (min-width: 1000px) {
	.sl-coc-page .sl-code-conduct-features.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-code-conduct-features__heading {
		margin-bottom: 42px;
	}

	.sl-coc-page .sl-code-conduct-features__grid {
		display: grid;
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 24px;
		width: 100%;
	}

	.sl-coc-page .sl-code-conduct-features__card {
		display: flex;
		align-items: center;
		gap: 14px;
		min-width: 0;
		width: 100%;
		min-height: 104px;
		margin: 0;
		padding: 22px 24px;
		box-sizing: border-box;
	}

	.sl-coc-page
		.sl-code-conduct-features__grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		max-width: none;
	}
}

/* SucceedLEARN — Code of Conduct AMP Definition */

.sl-coc-page .sl-code-conduct-definition.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

/* Heading */

.sl-coc-page .sl-code-conduct-definition__heading {
	width: 100%;
	margin: 0 0 34px;
}

.sl-coc-page .sl-code-conduct-definition__heading h2 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page .sl-code-conduct-definition__heading h2 > span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-code-conduct-definition__lead {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 18px;
	line-height: 1.7;
}

.sl-coc-page .sl-code-conduct-definition__accent {
	color: var(--sl-page-primary, #1472ba);
	font-weight: 700;
}

/* Mobile and tablet layout */

.sl-coc-page .sl-code-conduct-definition__layout {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 32px;
	width: 100%;
}

.sl-coc-page .sl-code-conduct-definition__panels {
	display: block;
	min-width: 0;
	width: 100%;
}

/* Panels */

.sl-coc-page .sl-code-conduct-definition__panel {
	display: block;
	min-width: 0;
	width: 100%;
	margin: 0 0 20px;
	padding: 24px 22px;
	border-radius: 14px;
	box-sizing: border-box;
}

.sl-coc-page .sl-code-conduct-definition__panel:last-child {
	margin-bottom: 0;
}

.sl-coc-page .sl-code-conduct-definition__panel h3 {
	margin: 0 0 12px;
}

.sl-coc-page .sl-code-conduct-definition__panel p {
	margin: 0;
}

/* Introduction panel */

.sl-coc-page .sl-code-conduct-definition__panel--navy {
	background: var(--sl-page-navy, #16234e);
	color: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-code-conduct-definition__panel--navy h3 {
	color: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-code-conduct-definition__panel--navy p {
	color: rgba(255, 255, 255, 0.9);
}

/* Flow panel */

.sl-coc-page .sl-code-conduct-definition__panel--flow {
	padding: 18px;
	background: rgba(20, 114, 186, 0.07);
}

.sl-coc-page .sl-code-conduct-definition__flow {
	display: block;
	width: 100%;
	margin: 0;
}

.sl-coc-page .sl-code-conduct-definition__step {
	display: block;
	min-width: 0;
	width: 100%;
	margin: 0;
	padding: 18px 20px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 12px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-code-conduct-definition__step strong {
	display: block;
	margin: 0 0 6px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 17px;
	font-weight: 700;
	line-height: 1.35;
}

.sl-coc-page .sl-code-conduct-definition__step span {
	display: block;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 15px;
	line-height: 1.6;
}

.sl-coc-page .sl-code-conduct-definition__flow-arrow {
	display: block;
	width: 24px;
	height: 24px;
	margin: 8px auto;
	color: var(--sl-page-primary, #1472ba);
	text-align: center;
}

.sl-coc-page .sl-code-conduct-definition__flow-arrow svg {
	display: block;
	width: 24px;
	height: 24px;
}

/* Scenario topics */

.sl-coc-page .sl-code-conduct-definition__panel--approach {
	border: 1px solid rgba(107, 124, 147, 0.2);
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-code-conduct-definition__topics-intro {
	margin: 0 0 18px;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.6;
}

.sl-coc-page .sl-code-conduct-definition__tags {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 10px;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-coc-page .sl-code-conduct-definition__tags li {
	min-width: 0;
	width: 100%;
	margin: 0;
	padding: 11px 14px;
	border: 1px solid rgba(20, 114, 186, 0.15);
	border-radius: 10px;
	background: var(--sl-page-bg, #f5f5f5);
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.4;
	box-sizing: border-box;
}

/* AMP image */

.sl-coc-page .sl-code-conduct-definition__media {
	display: block;
	min-width: 0;
	width: 100%;
	margin: 0;
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	overflow: hidden;
	box-sizing: border-box;
}

.sl-coc-page .sl-code-conduct-definition__media amp-img {
	display: block;
	width: 100%;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-code-conduct-definition__media amp-img img {
	object-fit: cover;
	object-position: center;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-coc-page .sl-code-conduct-definition.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-code-conduct-definition__heading {
		margin-bottom: 40px;
	}

	.sl-coc-page .sl-code-conduct-definition__layout {
		display: grid;
		grid-template-columns: minmax(0, 1fr);
		align-items: start;
		gap: 36px;
		width: 100%;
	}

	.sl-coc-page .sl-code-conduct-definition__panel {
		padding: 28px;
		margin-bottom: 24px;
	}

	.sl-coc-page .sl-code-conduct-definition__panel--flow {
		padding: 22px;
	}

	.sl-coc-page .sl-code-conduct-definition__step {
		padding: 20px 22px;
	}

	.sl-coc-page .sl-code-conduct-definition__tags {
		display: grid;
		grid-template-columns:
			minmax(0, 1fr)
			minmax(0, 1fr);
		gap: 12px;
		width: 100%;
	}
}

/* Desktop: sticky image left and panels right */

@media (min-width: 1000px) {
	.sl-coc-page .sl-code-conduct-definition.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-code-conduct-definition__heading {
		margin-bottom: 48px;
	}

	.sl-coc-page .sl-code-conduct-definition__layout {
		display: grid;
		grid-template-columns:
			minmax(0, 0.92fr)
			minmax(0, 1.08fr);
		align-items: start;
		gap: 48px;
		width: 100%;
	}

	.sl-coc-page .sl-code-conduct-definition__media {
		position: sticky;
		top: calc(var(--slf-header-clearance, 76px) + 24px);
		grid-column: 1;
		grid-row: 1;
	}

	.sl-coc-page .sl-code-conduct-definition__panels {
		grid-column: 2;
		grid-row: 1;
	}

	.sl-coc-page .sl-code-conduct-definition__panel {
		padding: 32px;
		margin-bottom: 28px;
	}

	.sl-coc-page .sl-code-conduct-definition__panel--flow {
		padding: 26px;
	}

	.sl-coc-page .sl-code-conduct-definition__step {
		padding: 22px 24px;
	}

	.sl-coc-page .sl-code-conduct-definition__tags {
		display: grid;
		grid-template-columns:
			minmax(0, 1fr)
			minmax(0, 1fr);
		gap: 12px;
		width: 100%;
	}
}

/* SucceedLEARN — Code of Conduct AMP — Why It Matters */

.sl-coc-page .sl-code-conduct-matters.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

/* Introduction */

.sl-coc-page .sl-code-conduct-matters__heading {
	width: 100%;
	margin: 0 0 34px;
}

.sl-coc-page .sl-code-conduct-matters__heading h2 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page .sl-code-conduct-matters__heading h2 > span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-code-conduct-matters__lead {
	width: 100%;
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 18px;
	font-weight: 600;
	line-height: 1.7;
}

/* Mobile layout */

.sl-coc-page .sl-code-conduct-matters__layout {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 28px;
	width: 100%;
}

/* Image */

.sl-coc-page .sl-code-conduct-matters__media {
	display: block;
	min-width: 0;
	width: 100%;
	margin: 0;
	overflow: hidden;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-code-conduct-matters__media amp-img {
	display: block;
	width: 100%;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-coc-page .sl-code-conduct-matters__media amp-img img {
	object-fit: cover;
	object-position: center;
}

/* List content */

.sl-coc-page .sl-code-conduct-matters__content {
	min-width: 0;
	width: 100%;
}

.sl-coc-page .sl-code-conduct-matters__intro {
	margin: 0 0 18px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 16px;
	font-weight: 700;
	line-height: 1.6;
}

.sl-coc-page .sl-code-conduct-matters__list {
	display: block;
	width: 100%;
	margin: 0;
	padding: 6px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	list-style: none;
	box-sizing: border-box;
}

.sl-coc-page .sl-code-conduct-matters__list-item {
	display: grid;
	grid-template-columns: 34px minmax(0, 1fr);
	align-items: start;
	gap: 12px;
	width: 100%;
	min-width: 0;
	margin: 0;
	padding: 15px 14px;
	border: 0;
	border-radius: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-coc-page
	.sl-code-conduct-matters__list-item
	+ .sl-code-conduct-matters__list-item {
	border-top: 1px solid rgba(107, 124, 147, 0.14);
}

.sl-coc-page .sl-code-conduct-matters__list-item:last-child {
	padding-bottom: 22px;
}

.sl-coc-page .sl-code-conduct-matters__list-index {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 34px;
	height: 34px;
	margin: 0;
	border-radius: 9px;
	background: rgba(20, 114, 186, 0.1);
	color: var(--sl-page-primary, #1472ba);
	font-size: 11px;
	font-weight: 800;
	line-height: 1;
	box-sizing: border-box;
}

.sl-coc-page .sl-code-conduct-matters__question {
	min-width: 0;
	margin: 5px 0 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	font-weight: 600;
	line-height: 1.5;
	overflow-wrap: anywhere;
}

/* Highlighted message */

.sl-coc-page .sl-code-conduct-matters__gap.sl-highlight {
	display: block;
	width: 100%;
	margin: 32px 0 0;
	padding: 24px 22px;
	border-color: var(--sl-page-primary, #1472ba);
	border-radius: 0 14px 14px 0;
	background: rgba(109, 195, 235, 0.14);
	box-sizing: border-box;
}

.sl-coc-page .sl-code-conduct-matters__gap-eyebrow {
	display: block;
	margin-bottom: 12px;
}

.sl-coc-page .sl-code-conduct-matters__gap-title {
	margin: 0 0 12px;
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page .sl-code-conduct-matters__gap-text {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

.sl-coc-page .sl-code-conduct-matters__gap-lead {
	margin: 16px 0 0;
	padding-top: 16px;
	border-top: 1px solid rgba(20, 114, 186, 0.18);
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	line-height: 1.6;
}

.sl-coc-page .sl-code-conduct-matters__gap-lead strong {
	color: var(--sl-page-navy, #16234e);
	font-weight: 800;
}

/* Tablet: stacked image and list */

@media (min-width: 768px) {
	.sl-coc-page .sl-code-conduct-matters.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-code-conduct-matters__heading {
		margin-bottom: 40px;
	}

	.sl-coc-page .sl-code-conduct-matters__layout {
		display: grid;
		grid-template-columns: minmax(0, 1fr);
		align-items: start;
		gap: 32px;
		width: 100%;
	}

	.sl-coc-page .sl-code-conduct-matters__list {
		padding: 8px;
	}

	.sl-coc-page .sl-code-conduct-matters__list-item {
		display: grid;
		grid-template-columns: 38px minmax(0, 1fr);
		align-items: center;
		gap: 14px;
		padding: 17px 18px;
	}

	.sl-coc-page .sl-code-conduct-matters__list-item:last-child {
		padding-bottom: 22px;
	}

	.sl-coc-page .sl-code-conduct-matters__list-index {
		width: 38px;
		height: 38px;
	}

	.sl-coc-page .sl-code-conduct-matters__question {
		margin-top: 0;
	}

	.sl-coc-page .sl-code-conduct-matters__gap.sl-highlight {
		margin-top: 36px;
		padding: 28px;
	}
}

/* Desktop: image left, list right */

@media (min-width: 1000px) {
	.sl-coc-page .sl-code-conduct-matters.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-code-conduct-matters__heading {
		margin-bottom: 42px;
	}

	.sl-coc-page .sl-code-conduct-matters__layout {
		display: grid;
		grid-template-columns:
			minmax(0, 0.45fr)
			minmax(0, 0.55fr);
		align-items: start;
		gap: 40px;
		width: 100%;
	}

	.sl-coc-page .sl-code-conduct-matters__media {
		position: sticky;
		top: calc(var(--slf-header-clearance, 76px) + 24px);
	}

	.sl-coc-page .sl-code-conduct-matters__gap.sl-highlight {
		margin-top: 40px;
		padding: 30px;
	}
}

/* SucceedLEARN — Code of Conduct AMP Business Problem */

.sl-coc-page .sl-coc-problem.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

/* Heading */

.sl-coc-page .sl-coc-problem__heading {
	width: 100%;
	margin: 0 0 32px;
}

.sl-coc-page .sl-coc-problem__heading h2 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page .sl-coc-problem__heading h2 > span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-coc-problem__heading p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

/* Mobile: one card per row */

.sl-coc-page .sl-coc-problem__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

/* Card */

.sl-coc-page .sl-coc-problem__card {
	display: block;
	min-width: 0;
	width: 100%;
	margin: 0;
	padding: 24px 22px;
	border: 1px solid rgba(107, 124, 147, 0.2);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

/* Number, title and description each remain on separate lines */

.sl-coc-page .sl-coc-problem__number {
	display: block;
	margin: 0 0 14px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 25px;
	font-weight: 800;
	line-height: 1;
	letter-spacing: -0.02em;
}

.sl-coc-page .sl-coc-problem__card-title {
	display: block;
	width: 100%;
	margin: 0 0 10px;
	color: var(--sl-page-navy, #16234e);
	font-size: 19px;
	font-weight: 700;
	line-height: 1.35;
	overflow-wrap: anywhere;
}

.sl-coc-page .sl-coc-problem__card-text {
	display: block;
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 15px;
	line-height: 1.65;
	overflow-wrap: anywhere;
}

/* Highlighted closing box */

.sl-coc-page .sl-coc-problem__close.sl-highlight {
	display: block;
	width: 100%;
	margin: 28px 0 0;
	padding: 24px 22px;
	border-color: var(--sl-page-primary, #1472ba);
	border-radius: 0 14px 14px 0;
	background: rgba(109, 195, 235, 0.14);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-problem__close-text {
	display: block;
	width: 100%;
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 16px;
	font-weight: 600;
	line-height: 1.65;
}

.sl-coc-page .sl-coc-problem__close-actions {
	display: block;
	width: 100%;
	margin-top: 20px;
}

.sl-coc-page .sl-coc-problem__close-actions .sl-content-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 8px;
	width: 100%;
	max-width: 100%;
	margin: 0;
	box-sizing: border-box;
	text-align: center;
	white-space: normal;
}

/* Tablet: exactly two cards per row */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-problem.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-problem__heading {
		margin-bottom: 40px;
	}

	.sl-coc-page .sl-coc-problem__grid {
		display: grid;
		grid-template-columns:
			minmax(0, 1fr)
			minmax(0, 1fr);
		gap: 20px;
		width: 100%;
	}

	.sl-coc-page .sl-coc-problem__card {
		display: block;
		min-width: 0;
		width: 100%;
		margin: 0;
		padding: 26px 24px;
		box-sizing: border-box;
	}

	/* Center the fifth card at half width */

	.sl-coc-page
		.sl-coc-problem__grid
		> :last-child:nth-child(odd) {
		grid-column: 1 / -1;
		justify-self: center;
		width: 100%;
		max-width: calc((100% - 20px) / 2);
	}

	.sl-coc-page .sl-coc-problem__close.sl-highlight {
		margin-top: 34px;
		padding: 28px;
	}

	.sl-coc-page .sl-coc-problem__close-actions {
		margin-top: 22px;
	}

	.sl-coc-page .sl-coc-problem__close-actions .sl-content-btn {
		width: fit-content;
		max-width: none;
		white-space: nowrap;
	}
}

/* Desktop: three cards per row */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-problem.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-problem__heading {
		margin-bottom: 44px;
	}

	.sl-coc-page .sl-coc-problem__grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 24px;
		width: 100%;
	}

	.sl-coc-page .sl-coc-problem__card {
		display: block;
		min-width: 0;
		width: 100%;
		margin: 0;
		padding: 28px 26px;
		box-sizing: border-box;
	}

	.sl-coc-page .sl-coc-problem__grid > :last-child:nth-child(odd),
	.sl-coc-page .sl-amp-card-grid.sl-coc-problem__grid > :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}

	.sl-coc-page .sl-coc-problem__close.sl-highlight {
		margin-top: 40px;
		padding: 30px;
	}
}

/* SucceedLEARN — Code of Conduct AMP Course Coverage */

.sl-coc-page .sl-coc-coverage.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

/* Heading */

.sl-coc-page .sl-coc-coverage__heading {
	width: 100%;
	margin: 0 0 30px;
}

.sl-coc-page .sl-coc-coverage__heading h2 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page .sl-coc-coverage__heading h2 > span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-coc-coverage__heading p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

/*
 * Mobile and tablet column behaviour is supplied by:
 * .sl-amp-card-grid
 *
 * Mobile: one card per row.
 * Tablet: two cards per row.
 */

.sl-coc-page .sl-coc-coverage__grid {
	width: 100%;
	gap: 16px;
}

/* Cards */

.sl-coc-page .sl-coc-coverage__card {
	display: block;
	min-width: 0;
	width: 100%;
	min-height: 0;
	height: 100%;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-coverage__card-title {
	display: block;
	width: 100%;
	margin: 0 0 12px;
	overflow-wrap: anywhere;
}

.sl-coc-page .sl-coc-coverage__card-text {
	display: block;
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 15px;
	line-height: 1.65;
	overflow-wrap: anywhere;
}

/* Tablet: global grid supplies exactly two cards per row */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-coverage.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-coverage__heading {
		margin-bottom: 36px;
	}

	.sl-coc-page .sl-coc-coverage__grid {
		gap: 20px;
	}

	.sl-coc-page .sl-coc-coverage__card {
		display: block;
		min-width: 0;
		width: 100%;
		min-height: 200px;
		height: 100%;
		margin: 0;
		padding: 24px;
		box-sizing: border-box;
	}
}

/* Desktop: three cards per row */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-coverage.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-coverage__heading {
		margin-bottom: 40px;
	}

	.sl-coc-page .sl-coc-coverage__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 24px;
		width: 100%;
	}

	.sl-coc-page .sl-coc-coverage__card {
		display: block;
		min-width: 0;
		width: 100%;
		min-height: 220px;
		height: 100%;
		margin: 0;
		padding: 26px;
		box-sizing: border-box;
	}

	/*
	 * Reset the global odd-tablet rule.
	 * Fifteen cards divide evenly into the desktop three-column grid.
	 */

	.sl-coc-page
		.sl-coc-coverage__grid.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}
}

/* SucceedLEARN — Code of Conduct AMP Emerging Ethical Risks */

.sl-coc-page .sl-coc-emerging-risks.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

/* Heading */

.sl-coc-page .sl-coc-emerging-risks__heading {
	width: 100%;
	margin: 0 0 30px;
}

.sl-coc-page .sl-coc-emerging-risks__heading h2 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page .sl-coc-emerging-risks__heading h2 > span {
	color: var(--sl-page-primary, #1472ba);
}

/*
 * Color comes from the global .sl-panel-title rule.
 * No local navy color override is added.
 */

.sl-coc-page .sl-coc-emerging-risks__lead.sl-panel-title {
	display: block;
	width: 100%;
	margin: 0 0 12px;
	font-size: 19px;
	font-weight: 700;
	line-height: 1.45;
}

.sl-coc-page .sl-coc-emerging-risks__intro {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

/* Mobile layout */

.sl-coc-page .sl-coc-emerging-risks__main {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 20px;
	width: 100%;
}

/* Image */

.sl-coc-page .sl-coc-emerging-risks__image {
	display: block;
	min-width: 0;
	width: 100%;
	margin: 0;
	overflow: hidden;
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-emerging-risks__image amp-img {
	display: block;
	width: 100%;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-coc-emerging-risks__image amp-img img {
	object-fit: cover;
	object-position: center;
}

/* Topics panel */

.sl-coc-page .sl-coc-emerging-risks__topics {
	display: block;
	min-width: 0;
	width: 100%;
	margin: 0;
	padding: 6px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-emerging-risks__list {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-coc-page .sl-coc-emerging-risks__list-item {
	display: grid;
	grid-template-columns: 34px minmax(0, 1fr);
	align-items: start;
	gap: 12px;
	min-width: 0;
	width: 100%;
	margin: 0;
	padding: 14px;
	border: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-coc-page
	.sl-coc-emerging-risks__list-item
	+ .sl-coc-emerging-risks__list-item {
	border-top: 1px solid rgba(107, 124, 147, 0.14);
}

.sl-coc-page .sl-coc-emerging-risks__list-item:last-child {
	padding-bottom: 22px;
}

.sl-coc-page .sl-coc-emerging-risks__list-index {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 34px;
	height: 34px;
	margin: 0;
	border-radius: 9px;
	background: rgba(20, 114, 186, 0.1);
	color: var(--sl-page-primary, #1472ba);
	font-size: 11px;
	font-weight: 800;
	line-height: 1;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-emerging-risks__list-label {
	display: block;
	min-width: 0;
	margin: 5px 0 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	font-weight: 600;
	line-height: 1.5;
	overflow-wrap: anywhere;
}

/* Highlighted closing message */

.sl-coc-page .sl-coc-emerging-risks__close.sl-highlight {
	display: block;
	width: 100%;
	margin: 28px 0 0;
	padding: 24px 22px;
	border-color: var(--sl-page-primary, #1472ba);
	border-radius: 0 14px 14px 0;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-emerging-risks__close-example {
	display: block;
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

.sl-coc-page .sl-coc-emerging-risks__close-example strong {
	color: var(--sl-page-primary, #1472ba);
	font-weight: 800;
}

.sl-coc-page .sl-coc-emerging-risks__close-message {
	display: block;
	width: 100%;
	margin: 16px 0 0;
	padding-top: 16px;
	border-top: 1px solid rgba(20, 114, 186, 0.16);
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.65;
}

/* Tablet: image and list in two columns */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-emerging-risks.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-emerging-risks__heading {
		margin-bottom: 36px;
	}

	.sl-coc-page .sl-coc-emerging-risks__main {
		display: grid;
		grid-template-columns:
			minmax(0, 1fr)
			minmax(0, 1fr);
		align-items: start;
		gap: 24px;
		width: 100%;
	}

	.sl-coc-page .sl-coc-emerging-risks__topics {
		padding: 8px;
	}

	.sl-coc-page .sl-coc-emerging-risks__list-item {
		display: grid;
		grid-template-columns: 36px minmax(0, 1fr);
		align-items: center;
		gap: 13px;
		padding: 14px 16px;
	}

	.sl-coc-page .sl-coc-emerging-risks__list-item:last-child {
		padding-bottom: 22px;
	}

	.sl-coc-page .sl-coc-emerging-risks__list-index {
		width: 36px;
		height: 36px;
	}

	.sl-coc-page .sl-coc-emerging-risks__list-label {
		margin-top: 0;
	}

	.sl-coc-page .sl-coc-emerging-risks__close.sl-highlight {
		margin-top: 34px;
		padding: 28px;
	}
}

/* Desktop */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-emerging-risks.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-emerging-risks__heading {
		margin-bottom: 40px;
	}

	.sl-coc-page .sl-coc-emerging-risks__main {
		display: grid;
		grid-template-columns:
			minmax(0, 1fr)
			minmax(0, 0.92fr);
		align-items: stretch;
		gap: 32px;
		width: 100%;
	}

	.sl-coc-page .sl-coc-emerging-risks__close.sl-highlight {
		margin-top: 40px;
		padding: 30px;
	}
}

/* =========================================================
   Code of Conduct — Decision-Based Scenario Cards
   ========================================================= */

.sl-coc-page .sl-coc-decision.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-coc-decision__heading {
	width: 100%;
	margin: 0 0 30px;
}

.sl-coc-page .sl-coc-decision__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-coc-page .sl-coc-decision__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-decision__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

/* Mobile: one card per row. */

.sl-coc-page .sl-coc-decision__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

.sl-coc-page .sl-coc-decision__card {
	display: flex;
	flex-direction: column;
	min-width: 0;
	width: 100%;
	height: 100%;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-decision__card-top {
	display: block;
	margin: 0 0 14px;
}

.sl-coc-page .sl-coc-decision__number {
	display: block;
	margin: 0 0 5px;
	color: var(--sl-heading-accent, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-coc-page .sl-coc-decision__description {
	display: block;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 14px;
	line-height: 1.5;
}

.sl-coc-page .sl-coc-decision__card-title {
	margin: 0 0 18px;
}

/* The global sl-panel-title colour remains in control. */

.sl-coc-page .sl-coc-decision__section {
	display: block;
	margin: 0;
	padding: 16px 0;
	border-top: 1px solid rgba(107, 124, 147, 0.15);
}

.sl-coc-page .sl-coc-decision__section-label {
	display: block;
	margin: 0 0 7px;
	color: var(--sl-heading-accent, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-coc-page .sl-coc-decision__section-text,
.sl-coc-page .sl-coc-decision__question,
.sl-coc-page .sl-coc-decision__feedback-text {
	margin: 0;
	color: var(--sl-page-text, #425b70);
	font-size: 15px;
	line-height: 1.65;
}

.sl-coc-page .sl-coc-decision__question {
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
}

.sl-coc-page .sl-coc-decision__feedback {
	display: block;
	margin-top: auto;
	padding: 16px;
	border-radius: 10px;
	background: rgba(20, 114, 186, 0.08);
}

.sl-coc-page .sl-coc-decision__feedback-text {
	color: var(--sl-page-navy, #16234e);
}

.sl-coc-page .sl-coc-decision__close {
	width: 100%;
	margin: 28px 0 0;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-decision__close-text {
	margin: 0;
	color: var(--sl-page-text, #425b70);
}

.sl-coc-page .sl-coc-decision__close-text strong {
	color: var(--sl-page-navy, #16234e);
}

/* Tablet: exactly two cards per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-decision.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-decision__heading {
		margin-bottom: 38px;
	}

	.sl-coc-page .sl-coc-decision__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-coc-page .sl-coc-decision__card {
		padding: 24px;
	}

	.sl-coc-page .sl-coc-decision__grid > :last-child:nth-child(odd) {
		grid-column: 1 / -1;
		justify-self: center;
		width: 100%;
		max-width: calc((100% - 20px) / 2);
	}

	.sl-coc-page .sl-coc-decision__close {
		margin-top: 34px;
	}
}

/* Desktop: three cards per row. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-decision.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-decision__heading {
		margin-bottom: 42px;
	}

	.sl-coc-page .sl-coc-decision__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 24px;
	}

	.sl-coc-page .sl-coc-decision__card {
		padding: 26px;
	}

	.sl-coc-page
		.sl-coc-decision__grid.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}

	.sl-coc-page .sl-coc-decision__close {
		margin-top: 40px;
	}
}

/* =========================================================
   Code of Conduct — Learning Experience
   ========================================================= */

.sl-coc-page .sl-coc-learning.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-coc-page .sl-coc-learning__heading {
	width: 100%;
	margin: 0 0 30px;
}

.sl-coc-page .sl-coc-learning__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-coc-page .sl-coc-learning__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-learning__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

/* Mobile: one card per row. */

.sl-coc-page .sl-coc-learning__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

.sl-coc-page .sl-coc-learning__card {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	min-width: 0;
	width: 100%;
	height: 100%;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 12px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-learning__icon {
	display: flex;
	align-items: center;
	justify-content: flex-start;
	width: 28px;
	height: 28px;
	margin: 0 0 12px;
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-learning__icon svg {
	display: block;
	width: 25px;
	height: 25px;
	fill: none;
	stroke: var(--sl-heading-accent, #1472ba);
	stroke-width: 1.5;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-coc-page .sl-coc-learning__card-title {
	display: block;
	width: 100%;
	margin: 0 0 8px;
	line-height: 1.35;
}

.sl-coc-page .sl-coc-learning__card > p {
	margin: 0;
	color: var(--sl-page-text, #425b70);
	font-size: 15px;
	line-height: 1.6;
}

/* Tablet: exactly two cards per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-learning.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-learning__heading {
		margin-bottom: 38px;
	}

	.sl-coc-page .sl-coc-learning__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-coc-page .sl-coc-learning__card {
		padding: 24px;
	}
}

/* Desktop: three cards per row. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-learning.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-learning__heading {
		margin-bottom: 42px;
	}

	.sl-coc-page .sl-coc-learning__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 24px;
	}

	.sl-coc-page
		.sl-coc-learning__grid.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}
}

/* =========================================================
   Code of Conduct — Customization
   ========================================================= */

.sl-coc-page .sl-coc-customization.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-coc-customization__heading {
	width: 100%;
	margin: 0 0 26px;
}

.sl-coc-page .sl-coc-customization__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-coc-page .sl-coc-customization__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-customization__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

.sl-coc-page .sl-coc-customization__list-title {
	width: 100%;
	margin: 0 0 24px;
}

/* Mobile: list first and image second. */

.sl-coc-page .sl-coc-customization__layout {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 24px;
	width: 100%;
	align-items: start;
}

.sl-coc-page .sl-coc-customization__list-box {
	min-width: 0;
	width: 100%;
	height: auto;
	margin: 0;
	padding: 6px;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-customization__list {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-coc-page .sl-coc-customization__list-item {
	display: flex;
	align-items: center;
	gap: 12px;
	min-width: 0;
	width: 100%;
	min-height: 58px;
	margin: 0;
	padding: 12px 14px;
	border: 0;
	border-radius: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-coc-page
	.sl-coc-customization__list-item
	+ .sl-coc-customization__list-item {
	border-top: 1px solid rgba(107, 124, 147, 0.13);
}

.sl-coc-page .sl-coc-customization__list-index {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 34px;
	width: 34px;
	height: 34px;
	border-radius: 9px;
	background: rgba(109, 195, 235, 0.2);
	color: var(--sl-page-primary, #1472ba);
	font-size: 11px;
	font-weight: 700;
	line-height: 1;
}

.sl-coc-page .sl-coc-customization__list-label {
	min-width: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.5;
}

.sl-coc-page .sl-coc-customization__media {
	min-width: 0;
	width: 100%;
	margin: 0;
	padding: 0;
	overflow: visible;
	border: 0;
	border-radius: 14px;
	background: transparent;
	box-sizing: border-box;
	line-height: 0;
}

.sl-coc-page .sl-coc-customization__media amp-img {
	display: block;
	width: 100%;
}

.sl-coc-page .sl-coc-customization__media amp-img img {
	object-fit: initial;
	object-position: top center;
	border-radius: 14px;
}

.sl-coc-page .sl-coc-customization__close {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 20px;
	width: 100%;
	margin: 28px 0 0;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-customization__close-text {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-weight: 600;
	line-height: 1.65;
}

.sl-coc-page .sl-coc-customization__actions {
	display: flex;
	align-items: center;
	width: 100%;
}

.sl-coc-page .sl-coc-customization__actions .sl-content-btn {
	width: 100%;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-customization.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-customization__heading {
		margin-bottom: 28px;
	}

	.sl-coc-page .sl-coc-customization__layout {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 28px;
		align-items: start;
	}

	.sl-coc-page .sl-coc-customization__list-box {
		height: max-content;
	}

	.sl-coc-page .sl-coc-customization__list-item {
		min-height: 58px;
		padding: 12px 14px;
	}

	.sl-coc-page .sl-coc-customization__media {
		position: sticky;
		top: calc(var(--slf-header-clearance, 76px) + 24px);
		align-self: start;
		height: auto;
		min-height: 0;
		max-height: min(560px, calc(100vh - var(--slf-header-clearance, 76px) - 48px));
		overflow: hidden;
		background: transparent;
	}

	.sl-coc-page .sl-coc-customization__media amp-img {
		height: auto;
		max-height: min(560px, calc(100vh - var(--slf-header-clearance, 76px) - 48px));
	}

	.sl-coc-page .sl-coc-customization__media amp-img img {
		object-fit: cover;
		object-position: top center;
	}

	.sl-coc-page .sl-coc-customization__close {
		display: grid;
		grid-template-columns: minmax(0, 1fr) auto;
		align-items: center;
		gap: 24px;
		margin-top: 34px;
	}

	.sl-coc-page .sl-coc-customization__actions {
		width: auto;
	}

	.sl-coc-page .sl-coc-customization__actions .sl-content-btn {
		width: auto;
	}
}

/* Desktop */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-customization.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-customization__layout {
		display: grid;
		grid-template-columns: minmax(0, 0.45fr) minmax(0, 0.55fr);
		gap: 40px;
	}

	.sl-coc-page .sl-coc-customization__list-box {
		padding: 8px;
	}

	.sl-coc-page .sl-coc-customization__media {
		position: sticky;
		top: calc(var(--slf-header-clearance, 76px) + 24px);
	}

	.sl-coc-page .sl-coc-customization__list-item {
		min-height: 59px;
		padding: 13px 16px;
	}

	.sl-coc-page .sl-coc-customization__list-index {
		flex-basis: 38px;
		width: 38px;
		height: 38px;
		font-size: 12px;
	}

	.sl-coc-page .sl-coc-customization__list-label {
		font-size: 15px;
	}

	.sl-coc-page .sl-coc-customization__close {
		margin-top: 40px;
	}
}

@media (hover: hover) {
	.sl-coc-page .sl-coc-customization__list-item:hover {
		background: rgba(109, 195, 235, 0.08);
	}
}

/* =========================================================
   Code of Conduct — Deployment
   ========================================================= */

.sl-coc-page .sl-coc-deployment.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-coc-page .sl-coc-deployment__heading {
	width: 100%;
	margin: 0 0 30px;
}

.sl-coc-page .sl-coc-deployment__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-coc-page .sl-coc-deployment__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-deployment__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

/* Mobile: one card per row. */

.sl-coc-page .sl-coc-deployment__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

.sl-coc-page .sl-coc-deployment__card {
	display: flex;
	flex-direction: column;
	min-width: 0;
	width: 100%;
	height: 100%;
	margin: 0;
	padding: 22px 20px;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-deployment__eyebrow {
	display: inline-flex;
	align-items: center;
	align-self: flex-start;
	margin: 0 0 14px;
	padding: 6px 11px;
	border-radius: 999px;
	background: rgba(109, 195, 235, 0.18);
	color: var(--sl-page-primary, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-coc-page .sl-coc-deployment__card-title {
	margin: 0 0 20px;
	line-height: 1.4;
}

.sl-coc-page .sl-coc-deployment__features {
	display: block;
	width: 100%;
	margin: auto 0 0;
	padding: 5px;
	border: 1px solid rgba(107, 124, 147, 0.13);
	border-radius: 12px;
	background: var(--sl-page-white, #ffffff);
	list-style: none;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-deployment__feature {
	display: flex;
	align-items: center;
	gap: 12px;
	min-width: 0;
	width: 100%;
	min-height: 54px;
	margin: 0;
	padding: 12px 13px;
	border: 0;
	border-radius: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-coc-page
	.sl-coc-deployment__feature
	+ .sl-coc-deployment__feature {
	border-top: 1px solid rgba(107, 124, 147, 0.12);
}

.sl-coc-page .sl-coc-deployment__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 28px;
	width: 28px;
	height: 28px;
	border-radius: 50%;
	background: rgba(109, 195, 235, 0.2);
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-coc-deployment__icon svg {
	display: block;
	width: 16px;
	height: 16px;
	fill: none;
	stroke: currentColor;
	stroke-width: 2;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-coc-page .sl-coc-deployment__feature-label {
	min-width: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.5;
}

/* Tablet: exactly two cards per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-deployment.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-deployment__heading {
		margin-bottom: 38px;
	}

	.sl-coc-page .sl-coc-deployment__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-coc-page .sl-coc-deployment__card {
		padding: 24px;
	}
}

/* Desktop: retain two cards per row. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-deployment.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-deployment__heading {
		margin-bottom: 42px;
	}

	.sl-coc-page .sl-coc-deployment__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 28px;
	}

	.sl-coc-page .sl-coc-deployment__card {
		padding: 28px;
	}

	.sl-coc-page .sl-coc-deployment__feature {
		min-height: 58px;
		padding: 14px 16px;
	}

	.sl-coc-page .sl-coc-deployment__feature-label {
		font-size: 15px;
	}
}

@media (hover: hover) {
	.sl-coc-page .sl-coc-deployment__feature:hover {
		background: rgba(109, 195, 235, 0.08);
	}
}

/* =========================================================
   Code of Conduct — Accessibility
   ========================================================= */

.sl-coc-page .sl-coc-accessibility.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-coc-accessibility__heading {
	width: 100%;
	margin: 0 0 28px;
}

.sl-coc-page .sl-coc-accessibility__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-coc-page .sl-coc-accessibility__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-accessibility__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

.sl-coc-page .sl-coc-accessibility__content {
	width: 100%;
	text-align: left;
}

.sl-coc-page .sl-coc-accessibility__list-title {
	width: 100%;
	margin: 0 0 22px;
}

/* Mobile: one feature per row. */

.sl-coc-page .sl-coc-accessibility__features {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	width: 100%;
}

.sl-coc-page .sl-coc-accessibility__feature {
	display: flex;
	align-items: center;
	gap: 12px;
	min-width: 0;
	width: 100%;
	min-height: 58px;
	margin: 0;
	padding: 13px 16px;
	border: 1px solid rgba(107, 124, 147, 0.15);
	border-radius: 12px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-accessibility__feature-icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 28px;
	width: 28px;
	height: 28px;
	border-radius: 50%;
	background: rgba(109, 195, 235, 0.2);
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-coc-accessibility__feature-icon svg {
	display: block;
	width: 16px;
	height: 16px;
	fill: none;
	stroke: currentColor;
	stroke-width: 2;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-coc-page .sl-coc-accessibility__feature-label {
	min-width: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.5;
}

.sl-coc-page .sl-coc-accessibility__close {
	width: 100%;
	margin: 28px 0 0;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-accessibility__close-text {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-weight: 600;
	line-height: 1.65;
}

/* Tablet: exactly two features per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-accessibility.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-accessibility__heading {
		margin-bottom: 32px;
	}

	.sl-coc-page .sl-coc-accessibility__features {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 16px 20px;
	}

	.sl-coc-page
		.sl-coc-accessibility__features
		> :last-child:nth-child(odd) {
		grid-column: 1 / -1;
		justify-self: center;
		width: 100%;
		max-width: calc((100% - 20px) / 2);
	}

	.sl-coc-page .sl-coc-accessibility__feature {
		padding: 14px 18px;
	}

	.sl-coc-page .sl-coc-accessibility__close {
		margin-top: 34px;
	}
}

/* Desktop: three features per row. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-accessibility.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-accessibility__features.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 20px;
	}

	.sl-coc-page
		.sl-coc-accessibility__features.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}

	.sl-coc-page .sl-coc-accessibility__feature {
		min-height: 64px;
		padding: 15px 18px;
	}

	.sl-coc-page .sl-coc-accessibility__feature-label {
		font-size: 15px;
	}

	.sl-coc-page .sl-coc-accessibility__close {
		margin-top: 40px;
	}
}

/* =========================================================
   Code of Conduct — Reporting
   Order: intro, list, image, highlighted box
   ========================================================= */

.sl-coc-page .sl-coc-reporting.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-coc-page .sl-coc-reporting__heading {
	width: 100%;
	margin: 0 0 28px;
	text-align: left;
}

.sl-coc-page .sl-coc-reporting__heading .sl-h2 {
	margin: 0 0 18px;
}

.sl-coc-page .sl-coc-reporting__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-reporting__lead {
	width: 100%;
	margin: 0 0 12px;
}

.sl-coc-page .sl-coc-reporting__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

/* Mobile: list first, image second. */

.sl-coc-page .sl-coc-reporting__layout {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 20px;
	width: 100%;
	align-items: stretch;
}

.sl-coc-page .sl-coc-reporting__card {
	min-width: 0;
	width: 100%;
	height: 100%;
	margin: 0;
	padding: 6px;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-reporting__list {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-coc-page .sl-coc-reporting__list-item {
	display: flex;
	align-items: center;
	gap: 12px;
	min-width: 0;
	width: 100%;
	min-height: 58px;
	margin: 0;
	padding: 12px 14px;
	border: 0;
	border-radius: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-coc-page
	.sl-coc-reporting__list-item
	+ .sl-coc-reporting__list-item {
	border-top: 1px solid rgba(107, 124, 147, 0.12);
}

.sl-coc-page .sl-coc-reporting__list-index {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 34px;
	width: 34px;
	height: 34px;
	border-radius: 9px;
	background: rgba(109, 195, 235, 0.2);
	color: var(--sl-page-primary, #1472ba);
	font-size: 11px;
	font-weight: 700;
	line-height: 1;
}

.sl-coc-page .sl-coc-reporting__list-label {
	min-width: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.5;
}

.sl-coc-page .sl-coc-reporting__media {
	position: relative;
	min-width: 0;
	width: 100%;
	aspect-ratio: 730 / 560;
	margin: 0;
	overflow: hidden;
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-reporting__media amp-img {
	display: block;
}

.sl-coc-page .sl-coc-reporting__media amp-img img {
	object-fit: cover;
	object-position: center;
}

.sl-coc-page .sl-coc-reporting__close {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 20px;
	width: 100%;
	margin: 28px 0 0;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-reporting__close-text {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-weight: 600;
	line-height: 1.65;
}

.sl-coc-page .sl-coc-reporting__actions {
	display: flex;
	align-items: center;
	width: 100%;
}

.sl-coc-page .sl-coc-reporting__actions .sl-content-btn {
	width: 100%;
}

/* Tablet: list and image in two columns. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-reporting.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-reporting__heading {
		margin-bottom: 34px;
	}

	.sl-coc-page .sl-coc-reporting__layout {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 28px;
	}

	.sl-coc-page .sl-coc-reporting__media {
		height: 100%;
		min-height: 420px;
		aspect-ratio: auto;
	}

	.sl-coc-page .sl-coc-reporting__close {
		display: grid;
		grid-template-columns: minmax(0, 1fr) auto;
		align-items: center;
		gap: 24px;
		margin-top: 34px;
	}

	.sl-coc-page .sl-coc-reporting__actions {
		width: auto;
	}

	.sl-coc-page .sl-coc-reporting__actions .sl-content-btn {
		width: auto;
	}
}

/* Desktop */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-reporting.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-reporting__heading {
		margin-bottom: 38px;
	}

	.sl-coc-page .sl-coc-reporting__layout {
		display: grid;
		grid-template-columns: minmax(0, 0.45fr) minmax(0, 0.55fr);
		gap: 40px;
	}

	.sl-coc-page .sl-coc-reporting__card {
		padding: 8px;
	}

	.sl-coc-page .sl-coc-reporting__list-item {
		min-height: 62px;
		padding: 14px 16px;
	}

	.sl-coc-page .sl-coc-reporting__list-index {
		flex-basis: 38px;
		width: 38px;
		height: 38px;
		font-size: 12px;
	}

	.sl-coc-page .sl-coc-reporting__list-label {
		font-size: 15px;
	}

	.sl-coc-page .sl-coc-reporting__close {
		margin-top: 40px;
	}
}

@media (hover: hover) {
	.sl-coc-page .sl-coc-reporting__list-item:hover {
		background: rgba(109, 195, 235, 0.08);
	}
}

.sl-content-btn,
.sl-content-btn-primary {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 8px;
	max-width: 100%;
	min-width: 0;
	height: auto;
	white-space: normal;
	overflow-wrap: anywhere;
	word-break: normal;
	text-align: center;
	line-height: 1.4;
	box-sizing: border-box;
}

.sl-content-btn > span:not([aria-hidden="true"]) {
	min-width: 0;
	white-space: normal;
	overflow-wrap: anywhere;
}

.sl-content-btn > span[aria-hidden="true"] {
	flex: 0 0 auto;
}

/* =========================================================
   Code of Conduct — Audience
   ========================================================= */

.sl-coc-page .sl-coc-audience.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-coc-audience__heading {
	width: 100%;
	margin: 0 0 28px;
	text-align: left;
}

.sl-coc-page .sl-coc-audience__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-coc-page .sl-coc-audience__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-audience__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

.sl-coc-page .sl-coc-audience__content {
	width: 100%;
	text-align: left;
}

.sl-coc-page .sl-coc-audience__list-title {
	width: 100%;
	margin: 0 0 22px;
}

/* Mobile: one card per row. */

.sl-coc-page .sl-coc-audience__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

.sl-coc-page .sl-coc-audience__card {
	display: flex;
	flex-direction: column;
	min-width: 0;
	width: 100%;
	height: 100%;
	min-height: 0;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 12px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-audience__card-title {
	margin: 0 0 10px;
	line-height: 1.35;
}

.sl-coc-page .sl-coc-audience__card > p {
	margin: 0;
	color: var(--sl-page-text, #425b70);
	font-size: 15px;
	line-height: 1.6;
}

/* Tablet: exactly two cards per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-audience.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-audience__heading {
		margin-bottom: 32px;
	}

	.sl-coc-page .sl-coc-audience__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-coc-page .sl-coc-audience__card {
		min-height: 140px;
		padding: 24px;
	}
}

/* Desktop: three cards per row. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-audience.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-audience__heading {
		margin-bottom: 36px;
	}

	.sl-coc-page .sl-coc-audience__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 24px;
	}

	.sl-coc-page .sl-coc-audience__card {
		min-height: 150px;
		padding: 26px;
	}

	.sl-coc-page
		.sl-coc-audience__grid.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}
}

/* =========================================================
   Code of Conduct — One Programme Card Grid
   ========================================================= */

.sl-coc-page .sl-coc-one-programme.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-coc-one-programme__heading {
	width: 100%;
	margin: 0 0 30px;
	text-align: left;
}

.sl-coc-page .sl-coc-one-programme__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-coc-page .sl-coc-one-programme__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-one-programme__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

/* Mobile: one card per row. */

.sl-coc-page .sl-coc-one-programme__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

.sl-coc-page .sl-coc-one-programme__card {
	display: flex;
	flex-direction: column;
	min-width: 0;
	width: 100%;
	height: 100%;
	min-height: 0;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-one-programme__card--featured {
	border-color: rgba(20, 114, 186, 0.32);
	background: rgba(20, 114, 186, 0.07);
}

.sl-coc-page .sl-coc-one-programme__card-heading {
	display: flex;
	align-items: center;
	gap: 12px;
	width: 100%;
	margin: 0 0 12px;
}

.sl-coc-page .sl-coc-one-programme__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 34px;
	width: 34px;
	height: 34px;
	border-radius: 10px;
	background: rgba(109, 195, 235, 0.2);
	color: var(--sl-page-primary, #1472ba);
}

.sl-coc-page .sl-coc-one-programme__icon svg {
	display: block;
	width: 20px;
	height: 20px;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.7;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-coc-page .sl-coc-one-programme__card-title {
	flex: 1;
	min-width: 0;
	margin: 0;
	line-height: 1.35;
}

.sl-coc-page .sl-coc-one-programme__card > p {
	margin: 0;
	color: var(--sl-page-text, #425b70);
	font-size: 15px;
	line-height: 1.6;
}

/* Tablet: exactly two cards per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-one-programme.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-one-programme__heading {
		margin-bottom: 38px;
	}

	.sl-coc-page .sl-coc-one-programme__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-coc-page .sl-coc-one-programme__card {
		min-height: 170px;
		padding: 24px;
	}
}

/* Desktop: three cards per row. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-one-programme.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-one-programme__heading {
		margin-bottom: 42px;
	}

	.sl-coc-page .sl-coc-one-programme__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 24px;
	}

	.sl-coc-page .sl-coc-one-programme__card {
		min-height: 180px;
		padding: 26px;
	}

	.sl-coc-page
		.sl-coc-one-programme__grid.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}
}
/* =========================================================
   Code of Conduct — Industries
   Order: intro, industry list, image, highlighted text
   ========================================================= */

.sl-coc-page .sl-coc-industries.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-coc-industries__heading {
	width: 100%;
	margin: 0 0 26px;
	text-align: left;
}

.sl-coc-page .sl-coc-industries__heading .sl-h2 {
	margin: 0 0 16px;
	text-align: left;
}

.sl-coc-page .sl-coc-industries__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-industries__lead {
	width: 100%;
	margin: 0;
	text-align: left;
}

/* Mobile: list first, image second. */

.sl-coc-page .sl-coc-industries__main {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 24px;
	width: 100%;
	align-items: stretch;
}

.sl-coc-page .sl-coc-industries__content {
	min-width: 0;
	width: 100%;
	text-align: left;
}

.sl-coc-page .sl-coc-industries__intro {
	width: 100%;
	margin: 0 0 20px;
	color: var(--sl-page-primary, #1472ba);
	font-weight: 600;
	line-height: 1.65;
	text-align: left;
}

/* Mobile: one industry per row. */

.sl-coc-page .sl-coc-industries__list {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-coc-page .sl-coc-industries__item {
	display: flex;
	align-items: center;
	gap: 12px;
	min-width: 0;
	width: 100%;
	min-height: 58px;
	margin: 0;
	padding: 12px 14px;
	border: 1px solid rgba(107, 124, 147, 0.15);
	border-radius: 12px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-industries__item-index {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 34px;
	width: 34px;
	height: 34px;
	border-radius: 9px;
	background: rgba(109, 195, 235, 0.2);
	color: var(--sl-page-primary, #1472ba);
	font-size: 11px;
	font-weight: 700;
	line-height: 1;
}

.sl-coc-page .sl-coc-industries__item-label {
	min-width: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.5;
}

.sl-coc-page .sl-coc-industries__image {
	min-width: 0;
	width: 100%;
	margin: 0;
	overflow: hidden;
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-industries__image amp-img {
	display: block;
	width: 100%;
}

.sl-coc-page .sl-coc-industries__image amp-img img {
	object-fit: cover;
	object-position: center;
}

.sl-coc-page .sl-coc-industries__image-placeholder {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 100%;
	aspect-ratio: 560 / 640;
	min-height: 320px;
	margin: 0;
	padding: 24px;
	border: 1px dashed rgba(20, 114, 186, 0.4);
	border-radius: 14px;
	background: rgba(20, 114, 186, 0.05);
	color: var(--sl-page-muted, #6b7c93);
	text-align: center;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-industries__image-placeholder span {
	color: var(--sl-page-primary, #1472ba);
	font-weight: 700;
	line-height: 1.4;
}

.sl-coc-page .sl-coc-industries__image-placeholder small {
	display: block;
	margin-top: 8px;
	color: var(--sl-page-muted, #6b7c93);
	line-height: 1.4;
}

.sl-coc-page .sl-coc-industries__statement {
	width: 100%;
	margin: 28px 0 0;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-industries__statement p {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.65;
}

/* Tablet: exactly two industry items per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-industries.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-industries__heading {
		margin-bottom: 30px;
	}

	.sl-coc-page .sl-coc-industries__main {
		display: grid;
		grid-template-columns: minmax(0, 1fr);
		gap: 28px;
	}

	.sl-coc-page .sl-coc-industries__list {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 16px 20px;
	}

	.sl-coc-page .sl-coc-industries__image {
		max-width: 620px;
	}

	.sl-coc-page .sl-coc-industries__image-placeholder {
		aspect-ratio: 760 / 500;
		min-height: 320px;
	}

	.sl-coc-page .sl-coc-industries__statement {
		margin-top: 34px;
	}
}

/* Desktop: content on the left and image on the right. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-industries.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-industries__heading {
		margin-bottom: 34px;
	}

	.sl-coc-page .sl-coc-industries__main {
		display: grid;
		grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
		gap: 40px;
	}

	.sl-coc-page .sl-coc-industries__list.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 14px;
	}

	.sl-coc-page .sl-coc-industries__item {
		min-height: 62px;
		padding: 13px 16px;
	}

	.sl-coc-page .sl-coc-industries__item-index {
		flex-basis: 38px;
		width: 38px;
		height: 38px;
		font-size: 12px;
	}

	.sl-coc-page .sl-coc-industries__item-label {
		font-size: 15px;
	}

	.sl-coc-page .sl-coc-industries__image {
		position: sticky;
		top: calc(var(--slf-header-clearance, 76px) + 24px);
		max-width: none;
	}

	.sl-coc-page .sl-coc-industries__image-placeholder {
		aspect-ratio: 560 / 640;
		height: 100%;
		min-height: 100%;
	}

	.sl-coc-page .sl-coc-industries__statement {
		margin-top: 40px;
		text-align: left;
	}

	.sl-coc-page
		.sl-coc-industries__list.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}
}

/* =========================================================
   Code of Conduct — Differentiation
   ========================================================= */

.sl-coc-page .sl-coc-differentiation.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-coc-page .sl-coc-differentiation__heading {
	width: 100%;
	margin: 0 0 30px;
}

.sl-coc-page .sl-coc-differentiation__heading .sl-h2 {
	margin: 0;
}

.sl-coc-page .sl-coc-differentiation__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

/* Mobile: one comparison card per row. */

.sl-coc-page .sl-coc-differentiation__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 18px;
	width: 100%;
}

.sl-coc-page .sl-coc-differentiation__card {
	display: flex;
	flex-direction: column;
	min-width: 0;
	width: 100%;
	height: 100%;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-differentiation__card--featured {
	border-color: rgba(20, 114, 186, 0.32);
	background: rgba(20, 114, 186, 0.05);
}

.sl-coc-page .sl-coc-differentiation__card-head {
	display: flex;
	align-items: center;
	width: 100%;
	min-height: 54px;
	margin: 0 0 16px;
	padding-bottom: 16px;
	border-bottom: 1px solid rgba(107, 124, 147, 0.14);
}

.sl-coc-page .sl-coc-differentiation__card-title {
	width: 100%;
	margin: 0;
	line-height: 1.4;
}

.sl-coc-page .sl-coc-differentiation__list {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-coc-page .sl-coc-differentiation__list-item {
	display: flex;
	align-items: center;
	gap: 12px;
	min-width: 0;
	width: 100%;
	min-height: 52px;
	margin: 0;
	padding: 11px 0;
	border: 0;
	background: transparent;
	box-sizing: border-box;
}

.sl-coc-page
	.sl-coc-differentiation__list-item
	+ .sl-coc-differentiation__list-item {
	border-top: 1px solid rgba(107, 124, 147, 0.12);
}

.sl-coc-page .sl-coc-differentiation__list-index {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 32px;
	width: 32px;
	height: 32px;
	border-radius: 9px;
	background: rgba(109, 195, 235, 0.2);
	color: var(--sl-page-primary, #1472ba);
	font-size: 11px;
	font-weight: 700;
	line-height: 1;
}

.sl-coc-page .sl-coc-differentiation__list-label {
	min-width: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.5;
}

.sl-coc-page .sl-coc-differentiation__close {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 20px;
	width: 100%;
	margin: 28px 0 0;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-differentiation__close-text {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-weight: 600;
	line-height: 1.65;
}

.sl-coc-page .sl-coc-differentiation__actions {
	display: flex;
	align-items: center;
	width: 100%;
}

.sl-coc-page .sl-coc-differentiation__actions .sl-content-btn {
	width: 100%;
	max-width: 100%;
	min-width: 0;
	height: auto;
	white-space: normal;
	text-align: center;
	line-height: 1.4;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-differentiation__button-text {
	min-width: 0;
	white-space: normal;
	overflow-wrap: anywhere;
}

/* Tablet: exactly two cards per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-differentiation.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-differentiation__heading {
		margin-bottom: 36px;
	}

	.sl-coc-page .sl-coc-differentiation__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-coc-page .sl-coc-differentiation__card {
		padding: 24px;
	}

	.sl-coc-page .sl-coc-differentiation__close {
		display: grid;
		grid-template-columns: minmax(0, 1fr) auto;
		align-items: center;
		gap: 24px;
		margin-top: 34px;
	}

	.sl-coc-page .sl-coc-differentiation__actions {
		width: auto;
		max-width: 310px;
	}

	.sl-coc-page .sl-coc-differentiation__actions .sl-content-btn {
		width: auto;
		max-width: 100%;
	}
}

/* Desktop: retain two comparison cards. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-differentiation.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-differentiation__heading {
		margin-bottom: 40px;
	}

	.sl-coc-page .sl-coc-differentiation__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 28px;
	}

	.sl-coc-page .sl-coc-differentiation__card {
		padding: 28px 30px;
	}

	.sl-coc-page .sl-coc-differentiation__list-item {
		min-height: 56px;
		padding: 12px 0;
	}

	.sl-coc-page .sl-coc-differentiation__list-index {
		flex-basis: 36px;
		width: 36px;
		height: 36px;
		font-size: 12px;
	}

	.sl-coc-page .sl-coc-differentiation__list-label {
		font-size: 15px;
	}

	.sl-coc-page .sl-coc-differentiation__close {
		margin-top: 40px;
	}
}


/* =========================================================
   Code of Conduct — Static Social Proof Statistics
   ========================================================= */

.sl-coc-page .sl-coc-stats.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #ffffff);
}

.sl-coc-page .sl-coc-stats__heading {
	width: 100%;
	margin: 0 0 30px;
	text-align: left;
}

.sl-coc-page .sl-coc-stats__heading .sl-h2 {
	margin: 0;
}

.sl-coc-page .sl-coc-stats__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

/* Mobile: one statistic per row. */

.sl-coc-page .sl-coc-stats__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

.sl-coc-page .sl-coc-stats__item {
	display: flex;
	flex-direction: column;
	justify-content: center;
	min-width: 0;
	width: 100%;
	min-height: 130px;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.15);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	text-align: left;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-stats__value {
	display: block;
	margin: 0;
	color: var(--sl-page-primary, #1472ba);
	font-size: clamp(2.25rem, 9vw, 3rem);
	font-weight: 700;
	line-height: 1;
	letter-spacing: -0.03em;
	font-variant-numeric: tabular-nums;
}

.sl-coc-page .sl-coc-stats__label {
	margin: 12px 0 0;
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	font-weight: 600;
	line-height: 1.45;
}

/* Tablet: exactly two statistics per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-stats.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-stats__heading {
		margin-bottom: 38px;
	}

	.sl-coc-page .sl-coc-stats__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-coc-page .sl-coc-stats__item {
		min-height: 150px;
		padding: 26px;
	}

	.sl-coc-page .sl-coc-stats__label {
		font-size: 16px;
	}
}

/* Desktop: four statistics per row. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-stats.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-stats__heading {
		margin-bottom: 44px;
	}

	.sl-coc-page .sl-coc-stats__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 24px;
	}

	.sl-coc-page .sl-coc-stats__item {
		min-height: 165px;
		padding: 28px;
	}

	.sl-coc-page
		.sl-coc-stats__grid.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}
}

/* =========================================================
   Code of Conduct — Customer Story Cards
   ========================================================= */

.sl-coc-page .sl-coc-customer-story.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-coc-page .sl-coc-customer-story__heading {
	width: 100%;
	margin: 0 0 26px;
}

.sl-coc-page .sl-coc-customer-story__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-coc-page .sl-coc-customer-story__heading .sl-h2 > span {
	color: var(--sl-heading-accent, #1472ba);
}

.sl-coc-page .sl-coc-customer-story__heading > p {
	width: 100%;
	margin: 0;
	color: var(--sl-page-text, #425b70);
	line-height: 1.7;
}

.sl-coc-page .sl-coc-customer-story__statement {
	width: 100%;
	margin: 0 0 28px;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-customer-story__statement p {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.6;
}

/* Mobile: one card per row. */

.sl-coc-page .sl-coc-customer-story__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

.sl-coc-page .sl-coc-customer-story__card {
	display: flex;
	flex-direction: column;
	min-width: 0;
	width: 100%;
	height: 100%;
	min-height: 0;
	margin: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.16);
	border-radius: 14px;
	background: var(--sl-page-white, #ffffff);
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-customer-story__card--featured {
	border-color: rgba(20, 114, 186, 0.32);
	background: rgba(20, 114, 186, 0.07);
}

.sl-coc-page .sl-coc-customer-story__number {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 36px;
	height: 36px;
	margin: 0 0 16px;
	border-radius: 10px;
	background: rgba(109, 195, 235, 0.2);
	color: var(--sl-page-primary, #1472ba);
	font-size: 12px;
	font-weight: 700;
	line-height: 1;
}

.sl-coc-page .sl-coc-customer-story__card-title {
	margin: 0 0 10px;
	line-height: 1.35;
}

.sl-coc-page .sl-coc-customer-story__card > p {
	margin: 0;
	color: var(--sl-page-text, #425b70);
	font-size: 15px;
	line-height: 1.65;
}

.sl-coc-page .sl-coc-customer-story__action {
	display: flex;
	justify-content: flex-start;
	width: 100%;
	margin-top: 28px;
}

.sl-coc-page .sl-coc-customer-story__action .sl-content-btn {
	width: 100%;
	max-width: 100%;
	min-width: 0;
	height: auto;
	white-space: normal;
	text-align: center;
	line-height: 1.4;
	box-sizing: border-box;
}

.sl-coc-page .sl-coc-customer-story__button-text {
	min-width: 0;
	white-space: normal;
	overflow-wrap: anywhere;
}

/* Tablet: exactly two cards per row. */

@media (min-width: 768px) {
	.sl-coc-page .sl-coc-customer-story.sl-section {
		padding-top: 75px;
		padding-bottom: 75px;
	}

	.sl-coc-page .sl-coc-customer-story__heading {
		margin-bottom: 30px;
	}

	.sl-coc-page .sl-coc-customer-story__statement {
		margin-bottom: 34px;
	}

	.sl-coc-page .sl-coc-customer-story__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-coc-page
		.sl-coc-customer-story__grid
		> :last-child:nth-child(odd) {
		grid-column: 1 / -1;
		justify-self: center;
		width: 100%;
		max-width: calc((100% - 20px) / 2);
	}

	.sl-coc-page .sl-coc-customer-story__card {
		min-height: 220px;
		padding: 24px;
	}

	.sl-coc-page .sl-coc-customer-story__action {
		margin-top: 34px;
	}

	.sl-coc-page .sl-coc-customer-story__action .sl-content-btn {
		width: auto;
		max-width: 320px;
	}
}

/* Desktop: three cards per row. */

@media (min-width: 1000px) {
	.sl-coc-page .sl-coc-customer-story.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-coc-page .sl-coc-customer-story__heading {
		margin-bottom: 34px;
	}

	.sl-coc-page .sl-coc-customer-story__grid.sl-amp-card-grid {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 24px;
	}

	.sl-coc-page .sl-coc-customer-story__card {
		min-height: 240px;
		padding: 28px;
	}

	.sl-coc-page
		.sl-coc-customer-story__grid.sl-amp-card-grid
		> :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		width: 100%;
		max-width: none;
	}

	.sl-coc-page .sl-coc-customer-story__action {
		margin-top: 40px;
	}
}

/* =========================================================
   Section rhythm � bg, white, bg, white (hero starts bg)
========================================================= */
.sl-coc-page > section:nth-of-type(odd) {
	background: var(--sl-page-bg, #f5f5f5) !important;
	background-color: var(--sl-page-bg, #f5f5f5) !important;
}
.sl-coc-page > section:nth-of-type(even) {
	background: var(--sl-page-white, #ffffff) !important;
	background-color: var(--sl-page-white, #ffffff) !important;
}
.sl-coc-page > section.sl-faq-section,
.sl-coc-page > section.sl-section.sl-coc-faq {
	--sl-faq-bg: inherit;
}
