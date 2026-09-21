<?php
/**
 * GDPR Employee Awareness Training - AMP page styles.
 *
 * Shared typography, buttons, highlights and panel titles are provided
 * by the global AMP style stack.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

/* GDPR hero */

.sl-gdpr-page .sl-gdpr-hero.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	overflow: hidden;
	background: var(--sl-page-white, #fff);
}

.sl-gdpr-hero__grid {
	display: block;
	width: 100%;
}

.sl-gdpr-hero__content {
	display: block;
	min-width: 0;
}

.sl-gdpr-hero__heading {
	margin-bottom: 22px;
}

.sl-gdpr-hero__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-hero__heading h1 {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	font-size: var(--sl-fs-hero-h1);
	font-weight: 700;
	line-height: 1.14;
	letter-spacing: -0.025em;
}

.sl-gdpr-hero__heading h1 > span {
	color: var(--sl-page-primary, #1472ba);
}

.sl-gdpr-hero__lead {
	margin: 0 0 18px;
	color: var(--sl-page-navy, #16234e);
	font-size: 24px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-gdpr-hero__description {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

/* Hero actions */

.sl-gdpr-hero__actions {
	display: block;
	width: 100%;
	margin: 26px 0 24px;
}

.sl-gdpr-hero__actions .sl-hero-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin: 0 0 12px;
	box-sizing: border-box;
	white-space: normal;
	text-align: center;
	overflow-wrap: anywhere;
}

.sl-gdpr-hero__actions .sl-hero-btn:last-child {
	margin-bottom: 0;
}

.sl-gdpr-hero__actions .sl-hero-btn svg {
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

/* Information callout */

.sl-gdpr-hero__info-box {
	display: block;
	margin: 0;
}

.sl-gdpr-hero__info-icon {
	display: block;
	width: 38px;
	height: 38px;
	margin: 0 0 12px;
	color: var(--sl-page-primary, #1472ba);
}

.sl-gdpr-hero__info-icon svg {
	display: block;
	width: 100%;
	height: 100%;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.7;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-gdpr-hero__info-content {
	display: block;
	min-width: 0;
}

.sl-gdpr-hero__info-content strong {
	display: block;
	margin-bottom: 5px;
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-gdpr-hero__info-content p {
	margin: 0;
}

/* Static course preview */

.sl-gdpr-hero__visual {
	display: block;
	width: 100%;
	min-width: 0;
	margin-top: 34px;
}

.sl-gdpr-course-preview {
	display: block;
	width: 100%;
	overflow: hidden;
	border: 1px solid rgba(20, 114, 186, 0.16);
	border-radius: 16px;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 18px 44px rgba(22, 35, 78, 0.09);
	box-sizing: border-box;
}

.sl-gdpr-course-preview__header {
	display: block;
	padding: 18px;
	background: var(--sl-page-navy, #16234e);
	color: var(--sl-page-white, #fff);
}

.sl-gdpr-course-preview__course {
	display: block;
	margin-bottom: 16px;
}

.sl-gdpr-course-preview__course-label {
	display: block;
	margin-bottom: 4px;
	color: var(--sl-page-primary-soft, #6dc3eb);
	font-size: 12px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: normal;
	text-transform: none;
}

.sl-gdpr-course-preview__course strong {
	display: block;
	color: var(--sl-page-white, #fff);
	font-size: 15px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-gdpr-course-preview__progress {
	display: block;
	width: 100%;
}

.sl-gdpr-course-preview__progress > span {
	display: block;
	margin-bottom: 6px;
	color: rgba(255, 255, 255, 0.72);
	font-size: 12px;
	line-height: 1.4;
}

.sl-gdpr-course-preview__progress-track {
	display: block;
	width: 100%;
	height: 5px;
	overflow: hidden;
	border-radius: 999px;
	background: rgba(255, 255, 255, 0.18);
}

.sl-gdpr-course-preview__progress-track > span {
	display: block;
	width: 75%;
	height: 100%;
	border-radius: inherit;
	background: var(--sl-page-primary, #1472ba);
}

.sl-gdpr-course-preview__body {
	display: block;
	padding: 20px 18px;
}

.sl-gdpr-course-preview__eyebrow {
	display: block;
	margin-bottom: 10px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 12px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: normal;
	text-transform: none;
}

.sl-gdpr-course-preview__body .sl-panel-title {
	margin: 0 0 20px;
	color: var(--sl-page-navy, #16234e);
}

.sl-gdpr-course-preview__scenario {
	display: block;
	margin-bottom: 18px;
	padding: 16px;
	border: 1px solid rgba(20, 114, 186, 0.16);
	border-radius: 12px;
	background: rgba(20, 114, 186, 0.06);
}

.sl-gdpr-course-preview__scenario > span {
	display: block;
	margin-bottom: 7px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 12px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: normal;
	text-transform: none;
}

.sl-gdpr-course-preview__scenario p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 14px;
	line-height: 1.55;
}

.sl-gdpr-course-preview__answers {
	display: block;
	width: 100%;
}

.sl-gdpr-course-preview__answer {
	display: block;
	position: relative;
	min-height: 48px;
	margin: 0 0 8px;
	padding: 13px 14px 13px 48px;
	border: 1px solid rgba(107, 124, 147, 0.28);
	border-radius: 10px;
	background: var(--sl-page-white, #fff);
	color: var(--sl-page-text, #4a4a4a);
	font-size: 13px;
	line-height: 1.5;
	box-sizing: border-box;
}

.sl-gdpr-course-preview__answer:last-child {
	margin-bottom: 0;
}

.sl-gdpr-course-preview__answer--correct {
	border-color: rgba(20, 114, 186, 0.38);
	background: rgba(20, 114, 186, 0.07);
}

.sl-gdpr-course-preview__radio {
	display: block;
	position: absolute;
	top: 14px;
	left: 14px;
	width: 20px;
	height: 20px;
	border: 2px solid rgba(107, 124, 147, 0.35);
	border-radius: 50%;
	box-sizing: border-box;
}

.sl-gdpr-course-preview__answer--correct
.sl-gdpr-course-preview__radio {
	border-color: var(--sl-page-primary, #1472ba);
}

.sl-gdpr-course-preview__radio > span {
	display: block;
	width: 8px;
	height: 8px;
	margin: 4px;
	border-radius: 50%;
	background: var(--sl-page-primary, #1472ba);
}

.sl-gdpr-course-preview__footer {
	display: block;
	padding: 18px;
	border-top: 1px solid rgba(20, 114, 186, 0.12);
}

.sl-gdpr-course-preview__completion {
	display: block;
	margin-bottom: 12px;
}

.sl-gdpr-course-preview__completion-track {
	display: block;
	width: 100%;
	height: 6px;
	margin-bottom: 7px;
	overflow: hidden;
	border-radius: 999px;
	background: rgba(107, 124, 147, 0.2);
}

.sl-gdpr-course-preview__completion-track > span {
	display: block;
	width: 68%;
	height: 100%;
	border-radius: inherit;
	background: var(--sl-page-primary, #1472ba);
}

.sl-gdpr-course-preview__completion > span,
.sl-gdpr-course-preview__status {
	display: block;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 12px;
	line-height: 1.4;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-hero.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-hero__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		align-items: center;
		gap: 30px;
	}

	.sl-gdpr-hero__lead {
		font-size: 26px;
	}

	.sl-gdpr-hero__actions {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		align-items: center;
		justify-content: flex-start;
		gap: 12px;
	}

	.sl-gdpr-hero__actions .sl-hero-btn {
		width: fit-content;
		max-width: none;
		margin: 0;
		flex: 0 0 auto;
		white-space: nowrap;
	}

	.sl-gdpr-hero__visual {
		margin-top: 0;
	}

	.sl-gdpr-course-preview__header {
		padding: 20px;
	}

	.sl-gdpr-course-preview__body {
		padding: 22px 20px;
	}

	.sl-gdpr-course-preview__footer {
		padding: 20px;
	}
}

/* Desktop */

@media (min-width: 900px) {
	.sl-gdpr-page .sl-gdpr-hero.sl-section {
		padding-top: 88px;
		padding-bottom: 88px;
	}

	.sl-gdpr-hero__grid {
		grid-template-columns: minmax(0, 1.05fr) minmax(400px, 0.95fr);
		gap: 44px;
	}

	.sl-gdpr-course-preview__header {
		padding: 22px 24px;
	}

	.sl-gdpr-course-preview__body {
		padding: 26px 24px;
	}

	.sl-gdpr-course-preview__footer {
		padding: 20px 24px;
	}
}

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-hero.sl-section {
		padding-top: 96px;
		padding-bottom: 90px;
	}

	.sl-gdpr-hero__grid {
		grid-template-columns: minmax(0, 1fr) minmax(460px, 0.9fr);
		gap: 56px;
	}

	.sl-gdpr-hero__lead {
		font-size: 30px;
	}
}

/* GDPR trust */

.sl-gdpr-page .sl-gdpr-trust.sl-section {
	position: relative;
	z-index: 1;
	padding: 55px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-gdpr-trust__heading {
	margin-bottom: 30px;
}

.sl-gdpr-trust__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-trust__heading .sl-h2 {
	margin: 0;
}

.sl-gdpr-trust__layout {
	display: block;
	width: 100%;
}

.sl-gdpr-trust__clients,
.sl-gdpr-trust__standards {
	display: block;
	width: 100%;
	padding: 22px 18px;
	border: 1px solid rgba(20, 114, 186, 0.14);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
}

.sl-gdpr-trust__clients {
	margin-bottom: 20px;
}

/* Panel headers */

.sl-gdpr-trust__section-header {
	display: flex;
	align-items: flex-start;
	gap: 14px;
	margin-bottom: 24px;
}

.sl-gdpr-trust__section-icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 42px;
	width: 42px;
	height: 42px;
	border-radius: 8px;
	border: 1px solid rgba(20, 114, 186, 0.16);
	background: rgba(20, 114, 186, 0.08);
	color: var(--sl-page-primary, #1472ba);
	box-sizing: border-box;
}

.sl-gdpr-trust__section-icon svg {
	display: block;
	width: 22px;
	height: 22px;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.7;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-gdpr-trust__section-heading {
	display: block;
	min-width: 0;
}

.sl-gdpr-trust__section-heading .sl-panel-title {
	margin: 0 0 5px;
	color: var(--sl-page-navy, #16234e);
}

.sl-gdpr-trust__section-heading p {
	margin: 0;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	line-height: 1.5;
}

/* Client logos (match DPDPA trusted logo cards) */

.sl-gdpr-trust__client-grid {
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 10px;
	width: 100%;
}

.sl-gdpr-trust__client {
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

.sl-gdpr-trust__client-logo {
	display: flex;
	align-items: center;
	justify-content: center;
	width: auto;
	max-width: 160px;
	margin: 0 auto;
}

.sl-gdpr-trust__client-logo amp-img {
	display: block;
	width: auto;
	max-width: 100%;
	max-height: 52px;
}

.sl-gdpr-trust__client-logo amp-img > img {
	object-fit: contain;
	object-position: center;
	max-height: 52px;
}

.sl-gdpr-trust__client-placeholder {
	display: block;
	padding: 18px 4px;
	color: var(--sl-page-navy, #16234e);
	font-size: 14px;
	font-weight: 700;
	line-height: 1.4;
	text-align: center;
}

/* Standards */

.sl-gdpr-trust__standard-list {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-gdpr-trust__standard.sl-list-item {
	display: block;
	position: relative;
	margin: 0 0 12px;
	padding-left: 12px;
}

.sl-gdpr-trust__standard.sl-list-item:last-child {
	margin-bottom: 0;
	padding-bottom: 22px;
}

.sl-gdpr-trust__standard-check {
	display: block;
	position: absolute;
	top: 16px;
	left: 16px;
	width: 26px;
	height: 26px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 15px;
	font-weight: 700;
	line-height: 26px;
	text-align: center;
}

.sl-gdpr-trust__standard-title {
	display: block;
	margin-bottom: 4px;
	color: var(--sl-page-navy, #16234e);
	font-size: 15px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-gdpr-trust__standard-text {
	display: block;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	line-height: 1.5;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-trust.sl-section {
		padding-top: 68px;
		padding-bottom: 68px;
	}

	.sl-gdpr-trust__heading {
		margin-bottom: 36px;
	}

	.sl-gdpr-trust__clients,
	.sl-gdpr-trust__standards {
		padding: 26px;
	}

	.sl-gdpr-trust__client-grid {
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 10px;
	}

	.sl-gdpr-trust__client {
		min-height: 96px;
		padding: 12px 14px;
	}

	.sl-gdpr-trust__client-logo {
		max-width: 170px;
	}

	.sl-gdpr-trust__client-logo amp-img,
	.sl-gdpr-trust__client-logo amp-img > img {
		max-height: 56px;
	}

	.sl-gdpr-trust__standard-list {
		display: grid;
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 14px;
	}

	.sl-gdpr-trust__standard.sl-list-item {
		margin-bottom: 0;
	}
}

/* Desktop */

@media (min-width: 900px) {
	.sl-gdpr-trust__layout {
		display: grid;
		grid-template-columns: minmax(0, 1.15fr) minmax(340px, 0.85fr);
		align-items: start;
		gap: 24px;
	}

	.sl-gdpr-trust__clients {
		margin-bottom: 0;
	}

	.sl-gdpr-trust__standard-list {
		display: block;
	}

	.sl-gdpr-trust__standard.sl-list-item {
		margin-bottom: 12px;
	}

	.sl-gdpr-trust__standard.sl-list-item:last-child {
		margin-bottom: 0;
	}
}

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-trust.sl-section {
		padding-top: 80px;
		padding-bottom: 80px;
	}

	.sl-gdpr-trust__heading {
		margin-bottom: 42px;
	}

	.sl-gdpr-trust__clients,
	.sl-gdpr-trust__standards {
		padding: 30px;
	}

	.sl-gdpr-trust__client {
		min-height: 100px;
		padding: 14px;
	}

	.sl-gdpr-trust__client-logo {
		max-width: 180px;
	}

	.sl-gdpr-trust__client-logo amp-img,
	.sl-gdpr-trust__client-logo amp-img > img {
		max-height: 60px;
	}
}

/* GDPR everyday risk */

.sl-gdpr-page .sl-gdpr-risk.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	background: var(--sl-page-white, #fff);
}

.sl-gdpr-risk__heading {
	margin-bottom: 28px;
}

.sl-gdpr-risk__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-risk__heading .sl-h2 {
	margin: 0;
}

/* Risk cards: 1 col mobile, 2 col tablet, 4 col desktop */

.sl-gdpr-page .sl-gdpr-risk__cards {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

.sl-gdpr-risk__card {
	display: block;
	width: 100%;
	min-width: 0;
	padding: 20px;
	border: 1px solid rgba(20, 114, 186, 0.16);
	border-top: 3px solid var(--sl-page-primary, #1472ba);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 6px 20px rgba(22, 35, 78, 0.045);
	box-sizing: border-box;
}

.sl-gdpr-risk__card-top {
	display: block;
	margin-bottom: 18px;
}

.sl-gdpr-risk__number {
	display: block;
	width: 38px;
	height: 38px;
	margin-bottom: 14px;
	border-radius: 9px;
	background: rgba(20, 114, 186, 0.08);
	color: var(--sl-page-primary, #1472ba);
	font-size: 12px;
	font-weight: 700;
	line-height: 38px;
	text-align: center;
}

.sl-gdpr-risk__label.sl-panel-title {
	display: block;
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	letter-spacing: normal;
	text-transform: none;
}

.sl-gdpr-risk__card-text {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

/* Description after cards */

.sl-gdpr-risk__content-text {
	display: block;
	width: 100%;
	margin-top: 34px;
}

.sl-gdpr-risk__content-text > p {
	margin: 0 0 16px;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

.sl-gdpr-risk__content-text > p:last-of-type {
	margin-bottom: 0;
}

.sl-gdpr-risk__highlight {
	margin-top: 22px;
}

.sl-gdpr-risk__highlight p {
	margin: 0;
}

/* Tablet: two cards per row */

@media (min-width: 700px) {
	.sl-gdpr-page .sl-gdpr-risk.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-risk__heading {
		margin-bottom: 34px;
	}

	.sl-gdpr-page .sl-gdpr-risk__cards {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 20px;
	}

	.sl-gdpr-risk__card {
		padding: 22px;
	}

	.sl-gdpr-risk__content-text {
		margin-top: 40px;
	}
}

/* Desktop: four cards in one row */

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-risk.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-gdpr-risk__heading {
		margin-bottom: 40px;
	}

	.sl-gdpr-page .sl-gdpr-risk__cards {
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 22px;
	}

	.sl-gdpr-risk__card {
		padding: 24px;
	}

	.sl-gdpr-risk__content-text {
		margin-top: 46px;
	}
}

/* GDPR reasons */

.sl-gdpr-page .sl-gdpr-reasons.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-gdpr-reasons__heading {
	margin-bottom: 30px;
}

.sl-gdpr-reasons__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-reasons__heading .sl-h2 {
	margin: 0;
}

/* Card grid */

.sl-gdpr-page .sl-gdpr-reasons__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

/* Card content uses block layout */

.sl-gdpr-reasons__card {
	display: block;
	width: 100%;
	min-width: 0;
	padding: 22px 20px;
	border: 1px solid rgba(20, 114, 186, 0.16);
	border-top: 3px solid var(--sl-page-primary, #1472ba);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 6px 20px rgba(22, 35, 78, 0.045);
	box-sizing: border-box;
}

.sl-gdpr-reasons__card-top {
	display: block;
	margin-bottom: 12px;
}

.sl-gdpr-reasons__icon-wrap {
	display: block;
	width: 32px;
	height: 32px;
	margin: 0 0 14px;
	color: var(--sl-page-primary, #1472ba);
}

.sl-gdpr-reasons__icon {
	display: block;
	width: 100%;
	height: 100%;
	fill: none;
	stroke: currentColor;
	stroke-width: 1.7;
	stroke-linecap: round;
	stroke-linejoin: round;
}

.sl-gdpr-reasons__card-top .sl-panel-title {
	display: block;
	margin: 0;
	color: var(--sl-page-navy, #16234e);
	text-align: left;
}

.sl-gdpr-reasons__card-content {
	display: block;
	width: 100%;
}

.sl-gdpr-reasons__card-content p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
	text-align: left;
}

/* Closing highlight */

.sl-gdpr-reasons__closing {
	margin-top: 30px;
}

.sl-gdpr-reasons__closing p {
	margin: 0;
}

/* Tablet: two cards per row; odd leftover card centered */

@media (min-width: 700px) {
	.sl-gdpr-page .sl-gdpr-reasons.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-reasons__heading {
		margin-bottom: 38px;
	}

	.sl-gdpr-page .sl-gdpr-reasons__grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 20px;
	}

	.sl-gdpr-reasons__card {
		padding: 24px;
	}

	.sl-gdpr-page .sl-gdpr-reasons__grid > :last-child:nth-child(odd) {
		grid-column: 1 / -1;
		justify-self: center;
		width: 100%;
		max-width: calc((100% - 20px) / 2);
	}

	.sl-gdpr-reasons__closing {
		margin-top: 36px;
	}
}

/* Desktop: three cards in one row */

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-reasons.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-gdpr-reasons__heading {
		margin-bottom: 46px;
	}

	.sl-gdpr-page .sl-gdpr-reasons__grid {
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 22px;
	}

	.sl-gdpr-reasons__card {
		padding: 28px 26px 30px;
	}

	.sl-gdpr-page .sl-gdpr-reasons__grid > :last-child:nth-child(odd) {
		grid-column: auto;
		justify-self: stretch;
		max-width: none;
	}

	.sl-gdpr-reasons__closing {
		margin-top: 40px;
	}
}

/* GDPR course coverage */

.sl-gdpr-page .sl-gdpr-coverage.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	background: var(--sl-page-white, #fff);
}

.sl-gdpr-coverage__grid {
	display: block;
	width: 100%;
}

/* Text content appears first */

.sl-gdpr-coverage__content {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-gdpr-coverage__heading {
	margin: 0 0 24px;
}

.sl-gdpr-coverage__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-coverage__heading .sl-h2 {
	margin: 0 0 18px;
}

.sl-gdpr-coverage__heading p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

.sl-gdpr-coverage__highlight {
	margin-top: 24px;
}

.sl-gdpr-coverage__highlight p {
	margin: 0;
}

.sl-gdpr-coverage__highlight strong {
	color: var(--sl-page-navy, #16234e);
}

/* CTA */

.sl-gdpr-coverage__actions {
	display: block;
	width: 100%;
	margin-top: 24px;
}

.sl-gdpr-coverage__actions .sl-content-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin: 0;
	box-sizing: border-box;
	white-space: normal;
	text-align: center;
	overflow-wrap: anywhere;
}

/* Image appears after all text content */

.sl-gdpr-coverage__visual {
	display: block;
	width: 100%;
	min-width: 0;
	margin-top: 34px;
}

.sl-gdpr-coverage__image {
	display: block;
	width: 100%;
	overflow: hidden;
	border: 1px solid rgba(20, 114, 186, 0.18);
	border-radius: 14px;
	background: var(--sl-page-bg, #f5f5f5);
	box-sizing: border-box;
}

.sl-gdpr-coverage__image amp-img {
	display: block;
	width: 100%;
}

.sl-gdpr-coverage__image amp-img img {
	object-fit: cover;
	object-position: center;
}

.sl-gdpr-coverage__image-placeholder {
	display: block;
	width: 100%;
	min-height: 230px;
	padding: 78px 20px;
	background: rgba(20, 114, 186, 0.04);
	color: var(--sl-page-muted, #6b7c93);
	text-align: center;
	box-sizing: border-box;
}

.sl-gdpr-coverage__image-placeholder span {
	display: block;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.4;
}

.sl-gdpr-coverage__image-placeholder small {
	display: block;
	margin-top: 8px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	line-height: 1.4;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-coverage.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-coverage__heading {
		margin-bottom: 28px;
	}

	.sl-gdpr-coverage__actions .sl-content-btn {
		width: fit-content;
		max-width: none;
		white-space: nowrap;
	}

	.sl-gdpr-coverage__visual {
		margin-top: 40px;
	}

	.sl-gdpr-coverage__image-placeholder {
		min-height: 280px;
		padding: 102px 24px;
	}
}

/* Desktop */

@media (min-width: 900px) {
	.sl-gdpr-coverage__grid {
		display: grid;
		grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
		align-items: center;
		gap: 48px;
	}

	.sl-gdpr-coverage__visual {
		margin-top: 0;
	}
}

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-coverage.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-gdpr-coverage__grid {
		gap: 64px;
	}

	.sl-gdpr-coverage__image-placeholder {
		min-height: 340px;
		padding: 128px 28px;
	}
}

/* GDPR course modules */

.sl-gdpr-page .sl-gdpr-course-modules.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-gdpr-course-modules__heading {
	margin: 0 0 30px;
}

.sl-gdpr-course-modules__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-course-modules__heading .sl-h2 {
	margin: 0 0 16px;
}

.sl-gdpr-course-modules__heading p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

/* Parent card grid */

.sl-gdpr-course-modules__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
}

/* Card content remains block-based */

.sl-gdpr-course-modules__card {
	display: block;
	width: 100%;
	min-width: 0;
	padding: 22px 20px;
	border: 1px solid rgba(107, 124, 147, 0.2);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 6px 20px rgba(22, 35, 78, 0.04);
	box-sizing: border-box;
}

.sl-gdpr-course-modules__number {
	display: block;
	width: 38px;
	height: 38px;
	margin-bottom: 16px;
	border-radius: 9px;
	background: rgba(20, 114, 186, 0.08);
	color: var(--sl-page-primary, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 38px;
	text-align: center;
}

.sl-gdpr-course-modules__content {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-gdpr-course-modules__content .sl-panel-title {
	display: block;
	margin: 0 0 10px;
	color: var(--sl-page-navy, #16234e);
}

.sl-gdpr-course-modules__content p {
	margin: 0;
	color: var(--sl-page-muted, #6b7c93);
	line-height: 1.65;
}

/* Featured module */

.sl-gdpr-course-modules__card--featured {
	border-color: rgba(20, 114, 186, 0.38);
	border-top: 4px solid var(--sl-page-primary, #1472ba);
	background: rgba(20, 114, 186, 0.07);
	box-shadow: 0 10px 26px rgba(20, 114, 186, 0.1);
}

.sl-gdpr-course-modules__card--featured
.sl-gdpr-course-modules__number {
	background: var(--sl-page-primary, #1472ba);
	color: var(--sl-page-white, #fff);
}

.sl-gdpr-course-modules__label {
	display: block;
	margin-bottom: 8px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: normal;
	text-transform: none;
}

.sl-gdpr-course-modules__badge {
	display: inline-block;
	margin-top: 16px;
	padding: 6px 10px;
	border: 1px solid rgba(20, 114, 186, 0.2);
	border-radius: 6px;
	background: rgba(20, 114, 186, 0.12);
	color: var(--sl-page-primary-dark, #283384);
	font-size: 12px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: normal;
	text-transform: none;
}

/* Tablet: two cards per row */

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-course-modules.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-course-modules__heading {
		margin-bottom: 36px;
	}

	.sl-gdpr-course-modules__grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 20px;
	}

	.sl-gdpr-course-modules__card {
		padding: 24px 22px;
	}
}

/* Desktop: three cards per row */

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-course-modules.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-gdpr-course-modules__heading {
		margin-bottom: 40px;
	}

	.sl-gdpr-course-modules__grid {
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 22px;
	}

	.sl-gdpr-course-modules__card {
		padding: 26px 24px;
	}
}

/* GDPR sales and marketing module */

.sl-gdpr-page .sl-gdpr-sales-marketing.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	background: var(--sl-page-white, #fff);
}

.sl-gdpr-sales-marketing__grid {
	display: block;
	width: 100%;
}

.sl-gdpr-sales-marketing__content {
	display: block;
	width: 100%;
	min-width: 0;
}

.sl-gdpr-sales-marketing__heading {
	margin: 0 0 26px;
}

.sl-gdpr-sales-marketing__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-sales-marketing__heading .sl-h2 {
	margin: 0 0 18px;
}

.sl-gdpr-sales-marketing__heading p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

/* Feature list */

.sl-gdpr-sales-marketing__list {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-gdpr-sales-marketing__list .sl-list-item {
	display: block;
	margin: 0 0 12px;
}

.sl-gdpr-sales-marketing__list .sl-list-item:last-child {
	margin-bottom: 0;
	padding-bottom: 22px;
}

.sl-gdpr-sales-marketing__list .sl-list-item__label {
	display: block;
	margin-bottom: 5px;
	color: var(--sl-page-navy, #16234e);
	font-weight: 700;
	line-height: 1.45;
}

.sl-gdpr-sales-marketing__list .sl-list-item__text {
	display: block;
	color: var(--sl-page-muted, #6b7c93);
	line-height: 1.55;
}

/* Main CTA */

.sl-gdpr-sales-marketing__actions {
	display: block;
	width: 100%;
	margin-top: 26px;
}

.sl-gdpr-sales-marketing__actions .sl-content-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	margin: 0;
	box-sizing: border-box;
	white-space: normal;
	text-align: center;
	overflow-wrap: anywhere;
}

/* Country table panel */

.sl-gdpr-sales-marketing__panel {
	display: block;
	width: 100%;
	min-width: 0;
	margin-top: 36px;
	overflow: hidden;
	border: 1px solid rgba(107, 124, 147, 0.2);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 8px 24px rgba(22, 35, 78, 0.05);
	box-sizing: border-box;
}

.sl-gdpr-sales-marketing__panel-header {
	display: block;
	padding: 20px;
	border-bottom: 1px solid rgba(107, 124, 147, 0.16);
}

.sl-gdpr-sales-marketing__panel-eyebrow {
	display: block;
	margin-bottom: 7px;
	color: var(--sl-page-primary, #1472ba);
	font-size: 13px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: normal;
	text-transform: none;
}

.sl-gdpr-sales-marketing__panel-header .sl-panel-title {
	display: block;
	margin: 0;
	color: var(--sl-page-navy, #16234e);
}

.sl-gdpr-sales-marketing__legend {
	display: block;
	margin-top: 16px;
}

.sl-gdpr-sales-marketing__legend-item {
	display: inline-block;
	position: relative;
	margin: 0 8px 8px 0;
	padding: 6px 10px 6px 23px;
	border: 1px solid rgba(20, 114, 186, 0.18);
	border-radius: 999px;
	background: rgba(20, 114, 186, 0.05);
	color: var(--sl-page-primary-dark, #283384);
	font-size: 12px;
	font-weight: 600;
	line-height: 1.4;
}

.sl-gdpr-sales-marketing__legend-dot {
	display: block;
	position: absolute;
	top: 50%;
	left: 10px;
	width: 7px;
	height: 7px;
	border-radius: 50%;
	background: var(--sl-page-primary, #1472ba);
	transform: translateY(-50%);
}

.sl-gdpr-sales-marketing__legend-dot--consent {
	background: var(--sl-page-primary-dark, #283384);
}

/* Horizontally scrollable mobile table */

.sl-gdpr-sales-marketing__table-wrap {
	display: block;
	width: 100%;
	overflow-x: auto;
	overflow-y: hidden;
	-webkit-overflow-scrolling: touch;
}

.sl-gdpr-sales-marketing__table-wrap:focus {
	outline: 2px solid var(--sl-page-primary, #1472ba);
	outline-offset: -2px;
}

.sl-gdpr-sales-marketing__table {
	width: 100%;
	min-width: 600px;
	margin: 0;
	border-collapse: collapse;
	table-layout: fixed;
}

.sl-gdpr-sales-marketing__table th,
.sl-gdpr-sales-marketing__table td {
	padding: 18px;
	border-bottom: 1px solid rgba(107, 124, 147, 0.14);
	text-align: left;
	box-sizing: border-box;
}

.sl-gdpr-sales-marketing__table tr:last-child th,
.sl-gdpr-sales-marketing__table tr:last-child td {
	border-bottom: 0;
}

.sl-gdpr-sales-marketing__country-name {
	position: relative;
	width: 120px;
	padding-left: 18px;
	padding-right: 18px;
	background: var(--sl-page-bg, #f5f5f5);
	color: var(--sl-page-navy, #16234e);
	text-align: center;
	list-style: none;
}

.sl-gdpr-sales-marketing__country-name strong {
	display: block;
	color: var(--sl-page-primary, #1472ba);
	font-size: 14px;
	font-weight: 700;
	line-height: 1.45;
	text-align: left;
}

.sl-gdpr-sales-marketing__status-dot {
	display: none;
}

.sl-gdpr-sales-marketing__status-dot--consent {
	background: var(--sl-page-primary-dark, #283384);
}

.sl-gdpr-sales-marketing__country-detail {
	background: var(--sl-page-white, #fff);
}

.sl-gdpr-sales-marketing__tag {
	display: inline-block;
	margin-bottom: 7px;
	padding: 5px 9px;
	border: 1px solid rgba(20, 114, 186, 0.18);
	border-radius: 5px;
	background: rgba(20, 114, 186, 0.07);
	color: var(--sl-page-primary, #1472ba);
	font-size: 12px;
	font-weight: 700;
	line-height: 1.4;
	letter-spacing: normal;
	text-transform: none;
}

.sl-gdpr-sales-marketing__tag--consent {
	border-color: rgba(40, 51, 132, 0.18);
	background: rgba(40, 51, 132, 0.07);
	color: var(--sl-page-primary-dark, #283384);
}

.sl-gdpr-sales-marketing__country-detail p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 14px;
	line-height: 1.55;
}

/* Panel footer */

.sl-gdpr-sales-marketing__panel-footer {
	display: block;
	padding: 18px 20px;
	border-top: 1px solid rgba(107, 124, 147, 0.16);
	background: rgba(20, 114, 186, 0.03);
}

.sl-gdpr-sales-marketing__panel-footer > span {
	display: block;
	margin-bottom: 14px;
	color: var(--sl-page-muted, #6b7c93);
	font-size: 13px;
	line-height: 1.5;
}

.sl-gdpr-sales-marketing__panel-footer .sl-content-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	box-sizing: border-box;
	white-space: normal;
	text-align: center;
	overflow-wrap: anywhere;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-sales-marketing.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-sales-marketing__heading {
		margin-bottom: 30px;
	}

	.sl-gdpr-sales-marketing__actions .sl-content-btn,
	.sl-gdpr-sales-marketing__panel-footer .sl-content-btn {
		width: fit-content;
		max-width: none;
		white-space: nowrap;
	}

	.sl-gdpr-sales-marketing__panel {
		margin-top: 42px;
	}

	.sl-gdpr-sales-marketing__table {
		min-width: 0;
	}

	.sl-gdpr-sales-marketing__country-name {
		width: 30%;
	}

	.sl-gdpr-sales-marketing__panel-footer {
		padding: 20px 22px;
	}
}

/* Desktop */

@media (min-width: 900px) {
	.sl-gdpr-sales-marketing__grid {
		display: grid;
		grid-template-columns: minmax(0, 0.4fr) minmax(0, 0.6fr);
		align-items: start;
		gap: 48px;
	}

	.sl-gdpr-sales-marketing__panel {
		margin-top: 0;
	}
}

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-sales-marketing.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-gdpr-sales-marketing__grid {
		gap: 56px;
	}

	.sl-gdpr-sales-marketing__panel-header {
		padding: 22px;
	}

	.sl-gdpr-sales-marketing__table th,
	.sl-gdpr-sales-marketing__table td {
		padding: 20px 22px;
	}
}

/* GDPR completion and proof */

.sl-gdpr-page .sl-gdpr-completion-proof.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-gdpr-completion-proof__grid {
	display: block;
	width: 100%;
}

.sl-gdpr-completion-proof__content {
	display: block;
	width: 100%;
	min-width: 0;
	margin-bottom: 32px;
}

.sl-gdpr-completion-proof__heading {
	margin: 0;
}

.sl-gdpr-completion-proof__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-completion-proof__heading .sl-h2 {
	margin: 0 0 18px;
}

.sl-gdpr-completion-proof__heading p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.7;
}

/* Proof card */

.sl-gdpr-completion-proof__card {
	display: block;
	width: 100%;
	min-width: 0;
	padding: 22px 20px;
	border: 1px solid rgba(107, 124, 147, 0.2);
	border-top: 3px solid var(--sl-page-primary, #1472ba);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-shadow: 0 8px 24px rgba(22, 35, 78, 0.05);
	box-sizing: border-box;
}

.sl-gdpr-completion-proof__card-heading {
	display: block;
	margin-bottom: 20px;
}

.sl-gdpr-completion-proof__card-heading .sl-panel-title {
	display: block;
	margin: 0 0 8px;
	color: var(--sl-page-navy, #16234e);
}

.sl-gdpr-completion-proof__card-heading p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

/* Global bordered list rows */

.sl-gdpr-completion-proof__list {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-gdpr-completion-proof__list .sl-list-item {
	display: block;
	margin: 0 0 12px;
}

.sl-gdpr-completion-proof__list .sl-list-item:last-child {
	margin-bottom: 0;
	padding-bottom: 22px;
}

.sl-gdpr-completion-proof__list .sl-list-item__content {
	display: block;
	min-width: 0;
}

.sl-gdpr-completion-proof__list .sl-list-item__label {
	display: block;
	margin-bottom: 5px;
	color: var(--sl-page-primary, #1472ba);
	font-weight: 700;
	line-height: 1.45;
}

.sl-gdpr-completion-proof__list .sl-list-item__text {
	display: block;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.55;
}

/* Tablet */

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-completion-proof.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-completion-proof__content {
		margin-bottom: 38px;
	}

	.sl-gdpr-completion-proof__card {
		padding: 26px;
	}

	.sl-gdpr-completion-proof__card-heading {
		margin-bottom: 22px;
	}
}

/* Desktop */

@media (min-width: 900px) {
	.sl-gdpr-completion-proof__grid {
		display: grid;
		grid-template-columns: minmax(0, 0.48fr) minmax(0, 0.52fr);
		align-items: center;
		gap: 48px;
	}

	.sl-gdpr-completion-proof__content {
		margin-bottom: 0;
	}
}

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-completion-proof.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-gdpr-completion-proof__grid {
		gap: 56px;
	}

	.sl-gdpr-completion-proof__card {
		padding: 28px;
	}
}

/* FAQ */

.sl-gdpr-page .sl-gdpr-faq.sl-section {
	padding: 60px 16px;
	background: var(--sl-page-white, #fff);
}

.sl-gdpr-faq .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-faq .sl-h2 {
	margin: 0 0 16px;
}

.sl-gdpr-faq .sl-lead {
	margin: 0 0 8px;
	max-width: 62ch;
	color: var(--sl-page-text, #4a4a4a);
}

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-faq.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}
}

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-faq.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}
}

/* Request preview / contact */

.sl-gdpr-page .sl-gdpr-request-preview.sl-section {
	position: relative;
	z-index: 1;
	padding: 60px 16px;
	background: var(--sl-page-bg, #f5f5f5);
}

.sl-gdpr-request-preview__grid {
	display: block;
	width: 100%;
}

.sl-gdpr-request-preview__content {
	display: block;
	min-width: 0;
	margin-bottom: 32px;
}

.sl-gdpr-request-preview__heading {
	display: block;
	margin-bottom: 26px;
}

.sl-gdpr-request-preview__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-request-preview__heading .sl-h2 {
	margin: 0 0 18px;
}

.sl-gdpr-request-preview__lead {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	font-size: 18px;
	line-height: 1.65;
}

.sl-gdpr-request-preview__bullets {
	display: block;
	margin: 0 0 28px;
	padding: 0;
	list-style: none;
}

.sl-gdpr-request-preview__bullets .sl-list-item {
	display: block;
	position: relative;
	margin: 0 0 12px;
	padding-left: 46px;
}

.sl-gdpr-request-preview__bullets .sl-list-item:last-child {
	margin-bottom: 0;
	padding-bottom: 22px;
}

.sl-gdpr-request-preview__bullets .sl-list-item > span:first-child {
	position: absolute;
	top: 50%;
	left: 16px;
	color: var(--sl-page-primary, #1472ba);
	font-weight: 700;
	line-height: 1;
	transform: translateY(-50%);
}

.sl-gdpr-request-preview__bullets .sl-list-item > span:last-child {
	display: block;
	min-width: 0;
	overflow-wrap: anywhere;
}

.sl-gdpr-page .sl-gdpr-request-preview__details {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	width: 100%;
}

.sl-gdpr-request-preview__detail {
	display: block;
	width: 100%;
	min-width: 0;
	margin: 0;
	padding: 18px;
	border: 1px solid rgba(107, 124, 147, 0.22);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	color: var(--sl-page-navy, #16234e);
	text-decoration: none;
	box-sizing: border-box;
	overflow-wrap: anywhere;
}

.sl-gdpr-request-preview__detail-label {
	display: block;
	margin-bottom: 7px;
	color: var(--sl-page-navy, #16234e);
	font-size: 16px;
	font-weight: 700;
	line-height: 1.4;
}

.sl-gdpr-request-preview__detail-value {
	display: block;
	color: var(--sl-page-primary, #1472ba);
	font-size: 16px;
	font-weight: 700;
	line-height: 1.45;
	overflow-wrap: anywhere;
}

.sl-gdpr-page .sl-gdpr-request-preview__form-wrap {
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

.sl-gdpr-request-preview__form-wrap .scf-form-wrap,
.sl-gdpr-request-preview__form-wrap .scf-form-wrap.scf-form-wrap-course {
	display: block;
	width: 100%;
	max-width: none;
	margin: 0;
	box-sizing: border-box;
}

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-request-preview.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-request-preview__content {
		margin-bottom: 40px;
	}

	.sl-gdpr-request-preview__lead {
		font-size: 20px;
	}

	.sl-gdpr-page .sl-gdpr-request-preview__details {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 16px;
	}

	.sl-gdpr-request-preview__detail {
		padding: 20px;
	}

	.sl-gdpr-page .sl-gdpr-request-preview__form-wrap {
		padding: 28px;
	}
}

@media (min-width: 900px) {
	.sl-gdpr-request-preview__grid {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 0.9fr);
		align-items: start;
		gap: 48px;
	}

	.sl-gdpr-request-preview__content {
		margin-bottom: 0;
	}
}

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-request-preview.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-gdpr-request-preview__grid {
		gap: 64px;
	}

	.sl-gdpr-page .sl-gdpr-request-preview__form-wrap {
		padding: 34px;
	}
}


/* GDPR format and delivery */

.sl-gdpr-page .sl-gdpr-format-delivery.sl-section {
	position: relative;
	z-index: 1;
	padding: 56px 16px;
	background: var(--sl-page-white, #fff);
}

.sl-gdpr-format-delivery__heading {
	margin: 0 0 30px;
}

.sl-gdpr-format-delivery__heading .sl-home-sub-heading {
	margin-bottom: 14px;
}

.sl-gdpr-format-delivery__heading .sl-h2 {
	margin: 0;
}

/* Statistics */

.sl-gdpr-page .sl-gdpr-format-delivery__stats {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 16px;
	width: 100%;
	margin: 0;
}

.sl-gdpr-format-delivery__stat {
	display: block;
	width: 100%;
	min-width: 0;
	padding: 20px;
	border: 1px solid rgba(107, 124, 147, 0.18);
	border-top: 3px solid var(--sl-page-primary, #1472ba);
	border-radius: 14px;
	background: var(--sl-page-white, #fff);
	box-sizing: border-box;
}

.sl-gdpr-format-delivery__stat .sl-panel-title {
	display: block;
	margin: 0 0 10px;
	color: var(--sl-page-primary, #1472ba);
}

.sl-gdpr-format-delivery__stat p {
	margin: 0;
	color: var(--sl-page-text, #4a4a4a);
	line-height: 1.65;
}

/* Available formats */

.sl-gdpr-format-delivery__formats-heading {
	display: block;
	margin-top: 32px;
	padding-bottom: 18px;
}

.sl-gdpr-format-delivery__formats-heading .sl-panel-title {
	margin: 0;
	color: var(--sl-page-navy, #16234e);
}

.sl-gdpr-format-delivery__formats {
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	gap: 10px;
	width: 100%;
	margin: 0;
	padding: 0;
	list-style: none;
}

.sl-gdpr-format-delivery__chip {
	display: inline-block;
	min-height: 38px;
	margin: 0;
	padding: 8px 14px;
	border: 1px solid rgba(20, 114, 186, 0.2);
	border-radius: 999px;
	background: rgba(20, 114, 186, 0.06);
	color: var(--sl-page-primary-dark, #283384);
	font-size: 14px;
	font-weight: 600;
	line-height: 20px;
	letter-spacing: normal;
	text-transform: none;
	white-space: normal;
	box-sizing: border-box;
}

/* Tablet: two cards per row */

@media (min-width: 768px) {
	.sl-gdpr-page .sl-gdpr-format-delivery.sl-section {
		padding-top: 72px;
		padding-bottom: 72px;
	}

	.sl-gdpr-format-delivery__heading {
		margin-bottom: 38px;
	}

	.sl-gdpr-page .sl-gdpr-format-delivery__stats {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 20px;
	}

	.sl-gdpr-format-delivery__stat {
		padding: 22px;
	}

	.sl-gdpr-format-delivery__formats-heading {
		margin-top: 38px;
		padding-bottom: 20px;
	}

	.sl-gdpr-format-delivery__chip {
		white-space: nowrap;
	}
}

/* Desktop: four cards in one row */

@media (min-width: 1000px) {
	.sl-gdpr-page .sl-gdpr-format-delivery.sl-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}

	.sl-gdpr-format-delivery__heading {
		margin-bottom: 46px;
	}

	.sl-gdpr-page .sl-gdpr-format-delivery__stats {
		display: grid;
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 24px;
	}

	.sl-gdpr-format-delivery__stat {
		padding: 24px;
	}

	.sl-gdpr-format-delivery__formats-heading {
		margin-top: 42px;
		padding-bottom: 22px;
	}
}