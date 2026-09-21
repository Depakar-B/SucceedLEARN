<?php
/**
 * DPDPA Compliance Training - AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

/* DPDPA hero */
.sl-dpdpa-page .sl-dpdpa-hero.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	background: var(--sl-page-white, #fff);
}

.sl-dpdpa-hero__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 32px;
}

.sl-dpdpa-hero__copy,
.sl-dpdpa-hero__media {
	min-width: 0;
	width: 100%;
}

.sl-dpdpa-hero__copy .sl-home-sub-heading {
	margin-bottom: 14px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-hero__copy h1 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
	font-size: var(--sl-fs-hero-h1);
	font-weight: 700;
	line-height: 1.14;
}

.sl-dpdpa-hero__lede {
	margin: 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 18px;
	line-height: 1.75;
}

/* Hero actions */
.sl-dpdpa-actions {
	display: flex;
	flex-direction: column;
	flex-wrap: nowrap;
	align-items: stretch;
	gap: 12px;
	margin-top: 26px;
}

.sl-dpdpa-actions .sl-hero-btn {
	display: inline-flex;
	flex: 0 0 auto;
	align-items: center;
	justify-content: center;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin: 0;
	text-align: center;
	white-space: normal;
	overflow-wrap: anywhere;
	box-sizing: border-box;
}

.sl-dpdpa-hero__fine {
	margin: 14px 0 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 14px;
	line-height: 1.5;
}

.sl-dpdpa-hero__trust {
	margin: 18px 0 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.5;
}

.sl-dpdpa-hero__trust strong {
	color: var(--sl-page-navy, #16234e);
	font-weight: 800;
}

/* Hero image placeholder */
.sl-dpdpa-hero__media {
	display: block;
}

.sl-dpdpa-hero__image-placeholder {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	width: 100%;
	min-height: 230px;
	padding: 24px;
	overflow: hidden;
	border: 1px dashed rgba(20, 114, 186, 0.28);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	text-align: center;
	box-sizing: border-box;
}

.sl-dpdpa-hero__placeholder-title {
	display: block;
	color: var(--sl-page-navy, #16234e);
	font-size: 16px;
	font-weight: 700;
	line-height: 1.4;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-hero__placeholder-size {
	display: block;
	margin-top: 7px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	line-height: 1.45;
	text-transform: none;
	letter-spacing: normal;
}

/* Mobile: full-width buttons */
@media (max-width: 767px) {
	.sl-dpdpa-page .sl-dpdpa-actions {
		flex-direction: column;
		align-items: stretch;
	}

	.sl-dpdpa-page .sl-dpdpa-actions .sl-hero-btn {
		width: 100%;
		max-width: 100%;
		white-space: normal;
	}

	.sl-dpdpa-hero__image-placeholder {
		min-height: 220px;
	}
}

/* Tablet: inline buttons, image below content */
@media (min-width: 768px) {
	.sl-dpdpa-page .sl-dpdpa-hero.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-dpdpa-page .sl-dpdpa-actions {
		flex-direction: row;
		flex-wrap: wrap;
		align-items: center;
		justify-content: flex-start;
		gap: 12px;
	}

	.sl-dpdpa-page .sl-dpdpa-actions .sl-hero-btn {
		flex: 0 0 auto;
		align-self: center;
		width: fit-content;
		max-width: none;
		white-space: nowrap;
	}

	.sl-dpdpa-hero__image-placeholder {
		min-height: 280px;
		padding: 30px;
	}
}

/* Desktop: content and image side by side */
@media (min-width: 900px) {
	.sl-dpdpa-page .sl-dpdpa-hero.sl-section {
		padding-top: 88px;
		padding-bottom: 88px;
	}

	.sl-dpdpa-hero__grid {
		grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
		align-items: center;
		gap: 40px;
	}

	.sl-dpdpa-hero__image-placeholder {
		min-height: 340px;
	}
}

@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-hero.sl-section {
		padding-top: 96px;
		padding-bottom: 90px;
	}

	.sl-dpdpa-hero__grid {
		gap: 48px;
	}

	.sl-dpdpa-hero__image-placeholder {
		min-height: 380px;
	}
}


/* Trusted organisations */
.sl-dpdpa-page .sl-dpdpa-trusted.sl-section {
	position: relative;
	z-index: 1;
	padding: 48px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

/* Heading */
.sl-dpdpa-trusted__heading {
	margin: 0 0 30px;
}

.sl-dpdpa-trusted__heading .sl-home-sub-heading {
	margin-bottom: 14px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-trusted__heading .sl-h2 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-trusted__heading .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-trusted__heading .sl-lead {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
}

/* Logo grid */
.sl-dpdpa-trusted__logos {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-dpdpa-trusted__logo-grid {
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 10px;
	width: 100%;
}

.sl-dpdpa-trusted__logo {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	min-width: 0;
	min-height: 92px;
	padding: 12px;
	overflow: hidden;
	border: 1px solid rgba(22, 35, 78, 0.1);
	border-radius: 8px;
	background: var(--sl-page-white, #fff);
	text-align: center;
	box-sizing: border-box;
}

.sl-dpdpa-trusted__logo-image {
	display: flex;
	align-items: center;
	justify-content: center;
	width: auto;
	max-width: 160px;
	margin: 0 auto;
}

.sl-dpdpa-trusted__logo-image amp-img {
	display: block;
	width: auto;
	max-width: 100%;
	max-height: 52px;
}

.sl-dpdpa-trusted__logo-image amp-img > img {
	object-fit: contain;
	object-position: center;
	max-height: 52px;
}

.sl-dpdpa-trusted__logo-placeholder {
	display: block;
	padding: 18px 4px;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.4;
	text-align: center;
}

/* Trust proof */
.sl-dpdpa-trusted__proof.sl-list {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	margin: 24px 0 0;
}

.sl-dpdpa-trusted__proof-item.sl-list-item {
	display: block;
	width: 100%;
	min-width: 0;
	min-height: 0;
	margin: 0;
	padding: 16px;
	box-sizing: border-box;
}

.sl-dpdpa-trusted__proof-number,
.sl-dpdpa-trusted__proof-icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-width: 42px;
	height: 38px;
	margin: 0 0 10px;
	padding: 0 8px;
	border-radius: 8px;
	background: rgba(20, 114, 186, 0.1);
	color: var(--sl-page-primary, #1472ba);
	box-sizing: border-box;
}

.sl-dpdpa-trusted__proof-number {
	font-size: 15px;
	font-weight: 800;
	line-height: 1;
}

.sl-dpdpa-trusted__proof-icon {
	width: 42px;
	padding: 0;
}

.sl-dpdpa-trusted__proof-icon svg {
	display: block;
	width: 22px;
	height: 22px;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.7;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-dpdpa-trusted__proof-content {
	display: block;
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	font-weight: 700;
	line-height: 1.45;
}

/* Tablet */
@media (min-width: 700px) {
	.sl-dpdpa-page .sl-dpdpa-trusted.sl-section {
		padding-top: 64px;
		padding-bottom: 64px;
	}

	.sl-dpdpa-trusted__heading {
		margin-bottom: 36px;
	}

	.sl-dpdpa-trusted__logo-grid {
		grid-template-columns: repeat(4, minmax(0, 1fr));
	}

	.sl-dpdpa-trusted__logo {
		min-height: 96px;
		padding: 12px 14px;
	}

	.sl-dpdpa-trusted__logo-image {
		max-width: 170px;
	}

	.sl-dpdpa-trusted__logo-image amp-img,
	.sl-dpdpa-trusted__logo-image amp-img > img {
		max-height: 56px;
	}
}

@media (min-width: 768px) {
	.sl-dpdpa-trusted__proof.sl-list {
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 12px;
	}

	.sl-dpdpa-trusted__proof-item.sl-list-item {
		height: 100%;
	}
}

/* Desktop */
@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-trusted.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-dpdpa-trusted__heading {
		margin-bottom: 42px;
	}

	.sl-dpdpa-trusted__logo {
		min-height: 100px;
		padding: 14px;
	}

	.sl-dpdpa-trusted__logo-image {
		max-width: 180px;
	}

	.sl-dpdpa-trusted__logo-image amp-img,
	.sl-dpdpa-trusted__logo-image amp-img > img {
		max-height: 60px;
	}

	.sl-dpdpa-trusted__proof.sl-list {
		margin-top: 28px;
	}
}


/* DPDPA breach scenario */
.sl-dpdpa-page .sl-dpdpa-breach-scenario.sl-section {
	padding: 56px 16px;
	background: var(--sl-page-white, #fff);
}

.sl-dpdpa-breach-scenario__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: center;
	gap: 32px;
}

/* Content */
.sl-dpdpa-breach-scenario__content {
	display: block;
	min-width: 0;
}

.sl-dpdpa-breach-scenario__content .sl-home-sub-heading {
	margin-bottom: 14px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-breach-scenario__content .sl-h2 {
	margin: 0 0 18px;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-breach-scenario__content .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-breach-scenario__body {
	display: block;
}

.sl-dpdpa-breach-scenario__body > p {
	margin: 0 0 18px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

.sl-dpdpa-breach-scenario__body .sl-highlight {
	margin: 0;
}

/* Image */
.sl-dpdpa-breach-scenario__media {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-dpdpa-breach-scenario__image {
	display: block;
	width: 100%;
	overflow: hidden;
	border: 1px solid rgba(22, 35, 78, 0.12);
	border-radius: 10px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
}

.sl-dpdpa-breach-scenario__image amp-img {
	display: block;
	width: 100%;
}

.sl-dpdpa-breach-scenario__image amp-img > img {
	object-fit: cover;
	object-position: center;
}

.sl-dpdpa-breach-scenario__image-placeholder {
	display: block;
	width: 100%;
	min-height: 230px;
	padding: 96px 20px;
	border: 1px dashed rgba(20, 114, 186, 0.28);
	border-radius: 10px;
	background: var(--sl-page-bg, #f5f5f5);
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.4;
	text-align: center;
	box-sizing: border-box;
}

.sl-dpdpa-breach-scenario__caption {
	margin: 10px 0 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 12px;
	font-style: italic;
	line-height: 1.5;
}

/* Tablet */
@media (min-width: 700px) {
	.sl-dpdpa-page .sl-dpdpa-breach-scenario.sl-section {
		padding-top: 68px;
		padding-bottom: 68px;
	}

	.sl-dpdpa-breach-scenario__grid {
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 36px;
	}
}

/* Desktop */
@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-breach-scenario.sl-section {
		padding-top: 80px;
		padding-bottom: 80px;
	}

	.sl-dpdpa-breach-scenario__grid {
		gap: 64px;
	}
}

/* DPDPA course coverage */
.sl-dpdpa-page .sl-dpdpa-course-coverage.sl-section {
	padding: 56px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

/* Heading */
.sl-dpdpa-course-coverage__heading {
	margin: 0 0 24px;
}

.sl-dpdpa-course-coverage__heading .sl-home-sub-heading {
	margin-bottom: 14px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-course-coverage__heading .sl-h2 {
	margin: 0 0 14px;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-course-coverage__heading .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-course-coverage__heading .sl-lead {
	margin: 0;
}

/* Coverage cards */
.sl-dpdpa-course-coverage__grid.sl-list {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
}

.sl-dpdpa-course-coverage__card.sl-list-item {
	display: block;
	width: 100%;
	min-width: 0;
	min-height: 0;
	margin: 0;
	padding: 18px;
	box-sizing: border-box;
}

.sl-dpdpa-course-coverage__number {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 36px;
	height: 36px;
	margin: 0 0 14px;
	border-radius: 9px;
	background: var(--sl-page-primary, #1472ba);
	color: var(--sl-page-white, #fff);
	font-weight: 700;
	line-height: 1;
}

.sl-dpdpa-course-coverage__card-content {
	display: block;
	min-width: 0;
}

.sl-dpdpa-course-coverage__card-content .sl-panel-title {
	margin: 0 0 6px;
	color: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-course-coverage__card-content p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.6;
}

/* Curriculum (always open on AMP) */
.sl-dpdpa-course-coverage__curriculum {
	margin-top: 24px;
}

.sl-dpdpa-course-coverage__panel-heading {
	margin: 0 0 16px;
}

.sl-dpdpa-course-coverage__panel-heading .sl-panel-title {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
}

/* Curriculum list */
.sl-dpdpa-course-coverage__curriculum-list.sl-list {
	display: block;
	margin: 0;
	counter-reset: none;
}

.sl-dpdpa-course-coverage__curriculum-item.sl-list-item {
	display: block;
	width: 100%;
	min-width: 0;
	min-height: 0;
	margin: 0 0 12px;
	padding: 16px;
	box-sizing: border-box;
}

.sl-dpdpa-course-coverage__curriculum-item.sl-list-item:last-child {
	margin-bottom: 0;
}

.sl-dpdpa-course-coverage__curriculum-number {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 34px;
	height: 34px;
	margin: 0 0 12px;
	border: 1px solid rgba(20, 114, 186, 0.18);
	border-radius: 8px;
	background: rgba(20, 114, 186, 0.08);
	color: var(--sl-page-primary, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 1;
}

.sl-dpdpa-course-coverage__curriculum-content {
	display: block;
	min-width: 0;
}

.sl-dpdpa-course-coverage__curriculum-content h4 {
	margin: 0 0 6px;
	color: var(--sl-page-navy, #16234e);
	font-size: 17px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-dpdpa-course-coverage__curriculum-content p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.6;
}

@media (min-width: 768px) {
	.sl-dpdpa-page .sl-dpdpa-course-coverage.sl-section {
		padding-top: 68px;
		padding-bottom: 68px;
	}

	.sl-dpdpa-course-coverage__heading {
		margin-bottom: 30px;
	}

	.sl-dpdpa-course-coverage__card.sl-list-item {
		padding: 20px 22px;
	}

	.sl-dpdpa-course-coverage__curriculum-item.sl-list-item {
		padding: 18px;
	}
}

@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-course-coverage.sl-section {
		padding-top: 80px;
		padding-bottom: 80px;
	}

	.sl-dpdpa-course-coverage__grid.sl-list {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 16px 20px;
	}
}

/* How the DPDPA course is taught */
.sl-dpdpa-page .sl-dpdpa-learning.sl-section {
	padding: 52px 16px 60px;
	background: var(--sl-page-white, #fff);
}

/* Section heading */
.sl-dpdpa-learning__heading {
	display: block;
	margin: 0 0 32px;
}

.sl-dpdpa-learning__heading .sl-home-sub-heading {
	margin-bottom: 14px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-learning__heading .sl-h2 {
	margin: 0 0 18px;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-learning__heading .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-learning__intro {
	display: block;
	margin: 0;
}

.sl-dpdpa-learning__intro .sl-lead {
	margin: 0;
}

/* Learning examples */
.sl-dpdpa-learning__row {
	display: block;
	margin: 0;
}

.sl-dpdpa-learning__content {
	display: block;
	min-width: 0;
	margin: 0 0 24px;
}

.sl-dpdpa-learning__label {
	display: block;
	margin: 0 0 10px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 1.3;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-learning__content .sl-panel-title {
	margin: 0 0 12px;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-learning__content p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

/* Image follows related content */
.sl-dpdpa-learning__media {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-dpdpa-learning__image-placeholder {
	display: block;
	width: 100%;
	min-height: 220px;
	padding: 96px 20px;
	overflow: hidden;
	border: 1px dashed rgba(20, 114, 186, 0.28);
	border-radius: 10px;
	background: var(--sl-page-bg, #f5f5f5);
	color: var(--sl-page-muted, #6b7c93);
	font-weight: 700;
	line-height: 1.4;
	text-align: center;
	box-sizing: border-box;
}

.sl-dpdpa-learning__image-placeholder span {
	display: block;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-learning__caption {
	display: block;
	margin: 8px 0 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 12px;
	font-style: italic;
	line-height: 1.5;
}

/* Divider */
.sl-dpdpa-learning__divider {
	display: block;
	width: 100%;
	height: 1px;
	margin: 28px 0;
	background: rgba(22, 35, 78, 0.12);
}

/* Tablet */
@media (min-width: 768px) {
	.sl-dpdpa-page .sl-dpdpa-learning.sl-section {
		padding-top: 64px;
		padding-bottom: 72px;
	}

	.sl-dpdpa-learning__heading {
		margin-bottom: 40px;
	}

	.sl-dpdpa-learning__content {
		margin-bottom: 28px;
	}

	.sl-dpdpa-learning__image-placeholder {
		min-height: 260px;
		padding: 116px 24px;
	}

	.sl-dpdpa-learning__divider {
		margin: 36px 0;
	}
}

/* Desktop */
@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-learning.sl-section {
		padding-top: 76px;
		padding-bottom: 88px;
	}

	.sl-dpdpa-learning__heading {
		margin-bottom: 48px;
	}

	.sl-dpdpa-learning__image-placeholder {
		min-height: 300px;
		padding: 136px 24px;
	}

	.sl-dpdpa-learning__divider {
		margin: 42px 0;
	}
}
/* DPDPA pricing */
.sl-dpdpa-page .sl-dpdpa-pricing.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

/* Heading */
.sl-dpdpa-pricing__heading {
	display: block;
	margin: 0 0 30px;
}

.sl-dpdpa-pricing__heading .sl-home-sub-heading {
	margin-bottom: 14px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-pricing__heading .sl-h2 {
	margin: 0 0 14px;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-pricing__heading .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-pricing__heading .sl-lead {
	margin: 0;
}

/* Main layout */
.sl-dpdpa-pricing__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	align-items: start;
	gap: 32px;
}

.sl-dpdpa-pricing__copy {
	display: block;
	min-width: 0;
}

/* Pricing explanation */
.sl-dpdpa-pricing__why {
	display: block;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 16px;
	background: rgba(109, 195, 235, 0.1);
	box-sizing: border-box;
}

.sl-dpdpa-pricing__why .sl-home-sub-heading {
	margin-bottom: 12px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-pricing__why .sl-panel-title {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-pricing__why > p {
	margin: 0;
	color: var(--sl-page-muted, #6b7c93);
	line-height: 1.7;
}

/* Pricing tiers */
.sl-dpdpa-pricing__tiers.sl-list {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 10px;
	margin: 20px 0 0;
}

.sl-dpdpa-pricing__tier.sl-list-item {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	justify-content: flex-start;
	gap: 6px;
	min-height: 0;
	margin: 0;
	padding: 14px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 12px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
}

.sl-dpdpa-pricing__tier.sl-list-item:last-child {
	padding-bottom: 14px;
}

.sl-dpdpa-pricing__tier-label {
	display: block;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	font-weight: 600;
	line-height: 1.4;
}

.sl-dpdpa-pricing__tier-rate {
	display: block;
	margin-top: 6px;
	color: var(--sl-page-navy, #16234e);
	font-size: 22px;
	font-weight: 800;
	line-height: 1.2;
}

.sl-dpdpa-pricing__tier-period {
	display: block;
	margin-top: 4px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 12px;
	line-height: 1.4;
}

.sl-dpdpa-pricing__note {
	margin-top: 20px;
}

.sl-dpdpa-pricing__note p {
	margin: 0;
}

/* Calculator */
.sl-dpdpa-pricing__calc {
	display: block;
	min-width: 0;
	padding: 22px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 18px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
}

.sl-dpdpa-pricing__label {
	display: block;
	margin: 0 0 10px;
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	font-weight: 700;
	line-height: 1.4;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-pricing__count {
	display: block;
	margin: 0 0 16px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 16px;
	font-weight: 700;
	line-height: 1.4;
}

/* Range control */
.sl-dpdpa-pricing__slider {
	--pct: 0;
	--thumb: 22px;
	position: relative;
	display: flex;
	align-items: center;
	width: 100%;
	height: var(--thumb);
	margin: 0 0 24px;
}

.sl-dpdpa-pricing__track {
	position: absolute;
	left: calc(var(--thumb) / 2);
	right: calc(var(--thumb) / 2);
	height: 8px;
	overflow: hidden;
	border-radius: 999px;
	background: rgba(107, 124, 147, 0.22);
	pointer-events: none;
}

.sl-dpdpa-pricing__fill {
	display: block;
	width: calc(var(--pct) * 1%);
	height: 100%;
	border-radius: 999px;
	background: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-pricing__range {
	position: relative;
	z-index: 1;
	width: 100%;
	height: var(--thumb);
	margin: 0;
	padding: 0;
	border: 0;
	background: transparent;
	cursor: pointer;
	appearance: none;
}

.sl-dpdpa-pricing__range::-webkit-slider-runnable-track {
	height: 8px;
	border: 0;
	border-radius: 999px;
	background: transparent;
}

.sl-dpdpa-pricing__range::-webkit-slider-thumb {
	width: var(--thumb);
	height: var(--thumb);
	margin-top: -7px;
	border: 2px solid var(--sl-page-primary, #1472ba);
	border-radius: 50%;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 2px 8px rgba(22, 35, 78, 0.14);
	appearance: none;
}

.sl-dpdpa-pricing__range::-moz-range-track {
	height: 8px;
	border: 0;
	border-radius: 999px;
	background: transparent;
}

.sl-dpdpa-pricing__range::-moz-range-progress {
	height: 8px;
	border: 0;
	border-radius: 999px;
	background: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-pricing__range::-moz-range-thumb {
	width: var(--thumb);
	height: var(--thumb);
	border: 2px solid var(--sl-page-primary, #1472ba);
	border-radius: 50%;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 2px 8px rgba(22, 35, 78, 0.14);
}

/* Calculated result */
.sl-dpdpa-pricing__total {
	display: block;
	padding: 20px;
	border: 1px solid rgba(20, 114, 186, 0.22);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
}

.sl-dpdpa-pricing__amount {
	display: block;
	color: var(--sl-page-navy, #16234e);
	font-size: clamp(2rem, 5vw, 2.6rem);
	font-weight: 700;
	line-height: 1.1;
	letter-spacing: -0.03em;
	overflow-wrap: anywhere;
}

.sl-dpdpa-pricing__period {
	display: block;
	margin-top: 8px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 15px;
	line-height: 1.5;
}

.sl-dpdpa-pricing__unit {
	display: block;
	margin-top: 10px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 14px;
	font-weight: 700;
	line-height: 1.5;
}

.sl-dpdpa-pricing__volume {
	margin: 16px 0 20px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 14px;
	line-height: 1.65;
}

/* CTA */
.sl-dpdpa-pricing__actions {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-dpdpa-pricing__actions .sl-content-btn {
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin: 0;
	white-space: normal;
	overflow-wrap: anywhere;
	text-align: center;
	box-sizing: border-box;
}

/* Tablet */
@media (min-width: 700px) {
	.sl-dpdpa-pricing__tiers.sl-list {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
}

@media (min-width: 768px) {
	.sl-dpdpa-page .sl-dpdpa-pricing.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-dpdpa-pricing__why,
	.sl-dpdpa-pricing__calc {
		padding: 28px;
	}
}

/* Desktop */
@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-pricing.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-dpdpa-pricing__grid {
		grid-template-columns: minmax(0, 1fr) minmax(0, 1.05fr);
		gap: 40px;
	}

	.sl-dpdpa-pricing__calc {
		padding: 32px;
	}
}

/* DPDPA scorecard CTA */
.sl-dpdpa-page .sl-dpdpa-scorecard-cta.sl-section {
	position: relative;
	z-index: 1;
	padding: 32px 16px 60px;
	background: var(--sl-page-white, #fff);
}

.sl-dpdpa-scorecard-cta__inner {
	display: block;
	position: relative;
	width: 100%;
	padding: 40px 22px;
	overflow: hidden;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 18px;
	background:
		radial-gradient(
			circle at top left,
			rgba(109, 195, 235, 0.18),
			transparent 42%
		),
		radial-gradient(
			circle at bottom right,
			rgba(20, 114, 186, 0.08),
			transparent 46%
		),
		var(--sl-page-bg, #f5f5f5);
	color: var(--sl-page-navy, #16234e);
	text-align: center;
	box-sizing: border-box;
}

.sl-dpdpa-scorecard-cta__eyebrow.sl-home-sub-heading {
	justify-content: center;
	margin: 0 0 14px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-scorecard-cta__inner .sl-h2 {
	margin: 0 0 16px;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-scorecard-cta__inner .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-dpdpa-scorecard-cta__description {
	margin: 0 0 28px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 16px;
	line-height: 1.7;
}

.sl-dpdpa-scorecard-cta__actions {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-dpdpa-scorecard-cta__button,
.sl-dpdpa-scorecard-cta__actions .sl-content-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 10px;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin: 0;
	white-space: normal;
	overflow-wrap: anywhere;
	text-align: center;
	box-sizing: border-box;
}

.sl-dpdpa-scorecard-cta__button svg {
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

@media (min-width: 768px) {
	.sl-dpdpa-page .sl-dpdpa-scorecard-cta.sl-section {
		padding-top: 36px;
		padding-bottom: 76px;
	}

	.sl-dpdpa-scorecard-cta__inner {
		padding: 48px 40px;
		border-radius: 22px;
	}

	.sl-dpdpa-scorecard-cta__button,
	.sl-dpdpa-scorecard-cta__actions .sl-content-btn {
		width: fit-content;
		max-width: none;
		white-space: nowrap;
	}
}

@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-scorecard-cta.sl-section {
		padding-top: 40px;
		padding-bottom: 90px;
	}

	.sl-dpdpa-scorecard-cta__inner {
		padding: 56px 48px;
		border-radius: 24px;
	}
}

/* DPDPA training records */
.sl-dpdpa-page .sl-dpdpa-training-records.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

/* Heading */
.sl-dpdpa-training-records__heading {
	display: block;
	margin: 0 0 30px;
}

.sl-dpdpa-training-records__heading .sl-home-sub-heading {
	margin-bottom: 14px;
	text-transform: none;
	letter-spacing: normal;
}

.sl-dpdpa-training-records__heading .sl-h2 {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-training-records__heading .sl-h2 span {
	color: var(--sl-page-primary, #1472ba);
}

/* Record cards */
.sl-dpdpa-training-records__cards.sl-list {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	margin: 0 0 32px;
}

.sl-dpdpa-training-records__card.sl-list-item {
	display: block;
	width: 100%;
	min-width: 0;
	min-height: 0;
	margin: 0;
	padding: 22px;
	border-top: 3px solid var(--sl-page-primary, #1472ba);
	border-radius: 14px;
	box-sizing: border-box;
}

.sl-dpdpa-training-records__card.sl-list-item:last-child {
	padding-bottom: 32px;
}

.sl-dpdpa-training-records__head {
	display: block;
	margin: 0 0 12px;
}

.sl-dpdpa-training-records__label {
	display: inline-block;
	margin: 0 0 10px;
	padding: 5px 10px;
	border-radius: 999px;
	background: var(--sl-page-primary-soft, rgba(109, 195, 235, 0.16));
	color: var(--sl-page-primary, #1472ba);
	font-size: 12px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: normal;
	text-transform: none;
}

.sl-dpdpa-training-records__head .sl-panel-title {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
}

.sl-dpdpa-training-records__card > p {
	margin: 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 15px;
	line-height: 1.7;
}

/* Screenshots follow the text cards */
.sl-dpdpa-training-records__screenshots {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 24px;
}

.sl-dpdpa-training-records__screenshot {
	display: block;
	min-width: 0;
	margin: 0;
}

.sl-dpdpa-training-records__image {
	display: block;
	width: 100%;
	overflow: hidden;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 12px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
}

.sl-dpdpa-training-records__image amp-img {
	display: block;
	width: 100%;
}

.sl-dpdpa-training-records__image amp-img > img {
	object-fit: cover;
	object-position: center;
}

.sl-dpdpa-training-records__screenshot figcaption {
	margin-top: 10px;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.5;
	text-align: center;
}

/* Tablet */
@media (min-width: 768px) {
	.sl-dpdpa-page .sl-dpdpa-training-records.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-dpdpa-training-records__heading {
		margin-bottom: 36px;
	}

	.sl-dpdpa-training-records__cards.sl-list {
		margin-bottom: 40px;
	}

	.sl-dpdpa-training-records__screenshots {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
}

/* Desktop */
@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-training-records.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-dpdpa-training-records__cards.sl-list {
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 20px;
	}

	.sl-dpdpa-training-records__card.sl-list-item {
		height: 100%;
		padding: 26px;
	}
}

/* Format and delivery */

.sl-dpdpa-page .sl-dpdpa-format-delivery.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-white, #fff);
}

.sl-dpdpa-format-delivery__heading {
	margin-bottom: 28px;
}

.sl-dpdpa-format-delivery__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-dpdpa-format-delivery__heading .sl-h2 {
	margin: 0;
}

/* Table wrapper */

.sl-dpdpa-format-delivery__table-wrap {
	width: 100%;
	overflow-x: auto;
	-webkit-overflow-scrolling: touch;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 8px 24px rgba(22, 35, 78, 0.04);
	box-sizing: border-box;
}

.sl-dpdpa-format-delivery__table {
	display: table;
	width: 100%;
	min-width: 560px;
	margin: 0;
	border: 0;
	border-collapse: collapse;
	table-layout: fixed;
}

.sl-dpdpa-format-delivery__table tbody {
	display: table-row-group;
}

.sl-dpdpa-format-delivery__table tr {
	display: table-row;
}

.sl-dpdpa-format-delivery__table th,
.sl-dpdpa-format-delivery__table td {
	display: table-cell;
	padding: 16px 12px;
	text-align: left;
	vertical-align: top;
	border-bottom: 1px solid rgba(107, 124, 147, 0.14);
	box-sizing: border-box;
}

.sl-dpdpa-format-delivery__table tr:last-child th,
.sl-dpdpa-format-delivery__table tr:last-child td {
	border-bottom: 0;
}

.sl-dpdpa-format-delivery__table th {
	width: 112px;
	max-width: 112px;
	padding-left: 16px;
	background: var(--sl-page-bg, #f5f5f5);
	color: var(--sl-page-muted, #6b7c93);
	font-size: 14px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: 0.02em;
	text-transform: uppercase;
	white-space: normal;
}

.sl-dpdpa-format-delivery__table td {
	padding-right: 18px;
	background: var(--sl-page-white, #fff);
	color: var(--sl-page-navy, #16234e);
	font-size: 16px;
	line-height: 1.6;
}

.sl-dpdpa-format-delivery__table td strong {
	font-weight: 700;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-dpdpa-page .sl-dpdpa-format-delivery.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-dpdpa-format-delivery__heading {
		margin-bottom: 34px;
	}

	.sl-dpdpa-format-delivery__table {
		min-width: 0;
	}

	.sl-dpdpa-format-delivery__table th,
	.sl-dpdpa-format-delivery__table td {
		padding: 18px 22px;
	}

	.sl-dpdpa-format-delivery__table th {
		width: 30%;
		max-width: none;
	}
}

/* Desktop */

@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-format-delivery.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-dpdpa-format-delivery__heading {
		margin-bottom: 40px;
	}

	.sl-dpdpa-format-delivery__table th,
	.sl-dpdpa-format-delivery__table td {
		padding: 19px 24px;
	}
}

/* Contact */

.sl-dpdpa-page .sl-dpdpa-contact.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-dpdpa-contact__grid {
	display: block;
	width: 100%;
}

.sl-dpdpa-contact__content {
	display: block;
	min-width: 0;
	margin-bottom: 32px;
}

.sl-dpdpa-contact__heading {
	display: block;
	margin-bottom: 26px;
}

.sl-dpdpa-contact__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-dpdpa-contact__heading .sl-h2 {
	margin: 0 0 18px;
}

.sl-dpdpa-contact__lead {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 18px;
	line-height: 1.65;
}

/* Benefit list */

.sl-dpdpa-contact__bullets {
	display: block;
	margin: 0 0 28px;
	padding: 0;
	list-style: none;
}

.sl-dpdpa-contact__bullets .sl-list-item {
	display: block;
	position: relative;
	margin: 0 0 12px;
	padding-left: 46px;
}

.sl-dpdpa-contact__bullets .sl-list-item:last-child {
	margin-bottom: 0;
	padding-bottom: 22px;
}

.sl-dpdpa-contact__bullets .sl-list-item > span:first-child {
	position: absolute;
	top: 50%;
	left: 16px;
	color: var(--sl-page-primary, #1472ba);
	font-weight: 700;
	line-height: 1;
	transform: translateY(-50%);
}

.sl-dpdpa-contact__bullets .sl-list-item > span:last-child {
	display: block;
	min-width: 0;
	overflow-wrap: anywhere;
}

/* Direct contact cards */

.sl-dpdpa-contact__details {
	display: block;
	width: 100%;
}

.sl-dpdpa-contact__detail {
	display: block;
	width: 100%;
	margin: 0 0 12px;
	padding: 18px;
	border: 1px solid rgba(107, 124, 147, 0.22);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	color: var(--sl-page-navy, #16234e);
	text-decoration: none;
	box-sizing: border-box;
	overflow-wrap: anywhere;
}

.sl-dpdpa-contact__detail:last-child {
	margin-bottom: 0;
}

.sl-dpdpa-contact__detail-label {
	display: block;
	margin-bottom: 7px;
	color: var(--sl-page-navy, #16234e);
	font-size: 16px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-dpdpa-contact__detail-value {
	display: block;
	color: var(--sl-page-primary, #1472ba);
	font-size: 16px;
	font-weight: 700;
	line-height: 1.45;
	overflow-wrap: anywhere;
}

/* Form card */

.sl-dpdpa-page .sl-dpdpa-contact__form-wrap {
	display: block;
	width: 100%;
	min-width: 0;
	margin: 0;
	padding: 22px 18px;
	border: 1px solid rgba(107, 124, 147, 0.22);
	border-radius: 18px;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 18px 44px rgba(22, 35, 78, 0.08);
	box-sizing: border-box;
}

.sl-dpdpa-contact__form-wrap .scf-form-wrap,
.sl-dpdpa-contact__form-wrap .scf-form-wrap.scf-form-wrap-course {
	display: block;
	width: 100%;
	max-width: none;
	margin: 0;
	box-sizing: border-box;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-dpdpa-page .sl-dpdpa-contact.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-dpdpa-contact__content {
		margin-bottom: 40px;
	}

	.sl-dpdpa-contact__lead {
		font-size: 20px;
	}

	.sl-dpdpa-contact__details {
		display: grid;
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 16px;
	}

	.sl-dpdpa-contact__detail {
		margin-bottom: 0;
		padding: 20px;
	}

	.sl-dpdpa-page .sl-dpdpa-contact__form-wrap {
		padding: 28px;
	}
}

/* Desktop */

@media (min-width: 900px) {
	.sl-dpdpa-contact__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 0.9fr);
		align-items: start;
		gap: 48px;
	}

	.sl-dpdpa-contact__content {
		margin-bottom: 0;
	}
}

@media (min-width: 1000px) {
	.sl-dpdpa-page .sl-dpdpa-contact.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-dpdpa-contact__grid {
		gap: 64px;
	}

	.sl-dpdpa-page .sl-dpdpa-contact__form-wrap {
		padding: 34px;
	}
}