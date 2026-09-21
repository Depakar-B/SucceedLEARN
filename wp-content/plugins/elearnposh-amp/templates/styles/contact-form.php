<?php
/**
 * AMP Contact Form styles.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

.epcf-wrap {
	max-width: 640px;
	margin: 0 auto;
	padding: 0 20px 32px;
	font-family: "Nunito Sans", Arial, sans-serif;
}

.epcf-card {
	background: #fff;
	border: 1px solid #e4edf6;
	border-radius: 16px;
	padding: 28px 24px;
	box-shadow: 0 8px 28px rgba(0, 137, 207, 0.08);
}

.epcf-hero {
	text-align: center;
	margin-bottom: 24px;
}

.epcf-hero h1,
.epcf-hero h2,
.epcf-hero h3 {
	color: #0089cf;
	font-size: 1.65rem;
	font-weight: 700;
	line-height: 1.3;
	margin: 0 0 10px;
}

.epcf-hero p {
	color: #4b4b4b;
	font-size: 15px;
	line-height: 1.65;
	margin: 0;
}

.epcf-form {
	display: flex;
	flex-direction: column;
	gap: 16px;
	text-align: left;
}

.epcf-field {
	display: flex;
	flex-direction: column;
	gap: 6px;
	margin: 0 0 8px;
	text-align: left;
}

.epcf-label {
	font-size: 13px;
	font-weight: 700;
	color: #2d3748;
	letter-spacing: 0.02em;
	text-align: left;
}

.epcf-label .epcf-req {
	color: #e53e3e;
}

.epcf-label .epcf-optional {
	font-weight: 400;
	color: #718096;
}

.epcf-input,
.epcf-textarea {
	width: 100%;
	min-height: 46px;
	padding: 10px 14px;
	border: 1.5px solid #dce8f2;
	border-radius: 10px;
	font-size: 15px;
	color: #2d3748;
	background: #f8fbfd;
	box-sizing: border-box;
	transition: border-color 0.15s ease;
}

.epcf-textarea {
	min-height: 110px;
	resize: vertical;
	line-height: 1.5;
}

.epcf-input:focus,
.epcf-textarea:focus {
	outline: none;
	border-color: #0089cf;
	background: #fff;
}

.epcf-checks {
	display: flex;
	flex-direction: column;
	gap: 12px;
	margin-top: 4px;
	text-align: left;
}

.epcf-check {
	display: flex;
	align-items: flex-start;
	gap: 10px;
	font-size: 13px;
	line-height: 1.5;
	color: #4a5568;
}

.epcf-check input[type="checkbox"] {
	width: 18px;
	height: 18px;
	margin-top: 2px;
	flex-shrink: 0;
	accent-color: #0089cf;
}

.epcf-check a {
	color: #0089cf;
	text-decoration: underline;
}

.epcf-honeypot {
	position: absolute;
	left: -9999px;
	width: 1px;
	height: 1px;
	overflow: hidden;
	opacity: 0;
	pointer-events: none;
}

.epcf-submit-wrap {
	text-align: left;
	margin-top: 8px;
}

.epcf-submit {
	display: inline-block;
	min-width: 180px;
	padding: 13px 28px;
	background: linear-gradient(135deg, #0089cf 0%, #006daa 100%);
	color: #fff;
	font-size: 15px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 0.04em;
	border: none;
	border-radius: 8px;
	cursor: pointer;
	box-shadow: 0 4px 14px rgba(0, 137, 207, 0.35);
	transition: background 0.2s ease, box-shadow 0.2s ease;
}

.epcf-submit:hover {
	background: linear-gradient(135deg, #0077b8 0%, #005f94 100%);
	box-shadow: 0 4px 14px rgba(0, 137, 207, 0.45);
	border-radius: 8px;
}

.epcf-submit:focus,
.epcf-submit:active {
	border-radius: 8px;
	outline: none;
}

.epcf-submit[disabled],
.epcf-submit[disabled]:hover {
	opacity: 0.7;
	cursor: not-allowed;
	border-radius: 8px;
	box-shadow: none;
}

.epcf-message {
	padding: 14px 16px;
	border-radius: 10px;
	font-size: 14px;
	line-height: 1.5;
	margin-top: 4px;
}

.epcf-message.is-success {
	background: #d8ffc0;
	color: #2e6800;
	border: 1px solid #a3d977;
	border-left: 3px solid #2e6800;
	font-weight: 600;
}

.epcf-message.is-error {
	background: #fdecea;
	color: #9b2c2c;
	border: 1px solid #f5b8b1;
}

.epcf-message.is-loading {
	background: #eef6fc;
	color: #006daa;
	border: 1px solid #b8d9f0;
	text-align: center;
}

.epcf-invalid {
	color: #e53e3e;
	font-size: 12px;
	margin-top: 4px;
}

.epcf-label--visually-hidden {
	position: absolute;
	width: 1px;
	height: 1px;
	padding: 0;
	margin: -1px;
	overflow: hidden;
	clip: rect(0, 0, 0, 0);
	white-space: nowrap;
	border: 0;
}

/* Legacy desktop form UI (erp-Homepage / erp-contact-us) */
.erp-home-contact-form.epcf-wrap {
	font-family: "Nunito Sans", Arial, sans-serif;
}

.erp-home-contact-form .epcf-form.erp-contact-form {
	display: flex;
	flex-direction: column;
	gap: 0.65rem;
}

/* Flatten field group so name/email/phone get the same gap as desktop */
.erp-home-contact-form .epcf-form.erp-contact-form > .epcf-fields:not(.epcf-fields--compact) {
	display: contents;
}

.erp-home-contact-form .epcf-fields--compact {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 0.65rem;
	align-items: stretch;
	width: 100%;
}

@media (min-width: 992px) {
	.erp-home-contact-form .epcf-fields--compact {
		grid-template-columns: repeat(3, minmax(0, 1fr));
	}
}

.erp-home-contact-form .epcf-field,
.erp-home-contact-form .erp-contact-field {
	margin: 0;
	padding: 0;
	gap: 0;
	width: 100%;
	min-width: 0;
	box-sizing: border-box;
}

.erp-home-contact-form .form-control,
.erp-home-contact-form .epcf-input,
.erp-home-contact-form .epcf-textarea {
	font-family: "Nunito Sans", Arial, sans-serif;
	font-size: 0.92rem;
	font-weight: 400;
	color: #1e293b;
	background: #fff;
	border: 1px solid #d1d5db;
	border-radius: 8px;
	padding: 0.55rem 0.75rem;
	width: 100%;
	min-height: auto;
	line-height: 1.4;
	box-shadow: none;
}

.erp-home-contact-form .form-control::placeholder,
.erp-home-contact-form .epcf-input::placeholder,
.erp-home-contact-form .epcf-textarea::placeholder {
	color: #9ca3af;
	opacity: 1;
}

.erp-home-contact-form .form-control:focus,
.erp-home-contact-form .epcf-input:focus,
.erp-home-contact-form .epcf-textarea:focus {
	border-color: #0d9488;
	box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.15);
	outline: none;
	background: #fff;
}

.erp-home-contact-form .epcf-textarea {
	min-height: 72px;
	max-height: 120px;
	resize: vertical;
}

.erp-home-contact-form .erp-contact-checks {
	gap: 0.35rem;
	margin-top: 0;
}

.erp-home-contact-form .erp-contact-check {
	display: flex;
	align-items: flex-start;
	gap: 0.5rem;
	margin: 0;
}

.erp-home-contact-form .checkbox {
	width: 1rem;
	height: 1rem;
	margin: 0.15rem 0 0;
	flex: 0 0 auto;
}

.erp-home-contact-form .form-check-label {
	font-size: 0.88rem;
	line-height: 1.45;
	color: #334155;
	font-weight: 400;
	margin: 0;
}

.erp-home-contact-form .form-check-label a {
	color: #0d9488;
	font-weight: 600;
	text-decoration: underline;
}

.erp-home-contact-form .erp-contact-submit {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	margin: 0;
	padding: 0;
}

.erp-home-contact-form button.epcf-submit.btnSubmit,
.erp-home-contact-form .epcf-submit.btnSubmit {
	width: auto;
	min-width: 120px;
	max-width: 200px;
	margin-top: 0.5rem;
	padding: 0.65rem 1rem;
	font-size: 0.92rem;
	font-weight: 600;
	letter-spacing: 0.02em;
	text-transform: none;
	text-align: center;
	color: #fff;
	background-color: #002a38;
	background-image: none;
	border: none;
	border-radius: 8px;
	box-shadow: none;
	font-family: "Nunito Sans", Arial, sans-serif;
	cursor: pointer;
	-webkit-appearance: none;
	appearance: none;
}

.erp-home-contact-form button.epcf-submit.btnSubmit:hover,
.erp-home-contact-form button.epcf-submit.btnSubmit:focus,
.erp-home-contact-form button.epcf-submit.btnSubmit:active,
.erp-home-contact-form .epcf-submit.btnSubmit:hover,
.erp-home-contact-form .epcf-submit.btnSubmit:focus,
.erp-home-contact-form .epcf-submit.btnSubmit:active {
	background-color: #123456;
	background-image: none;
	border: none;
	box-shadow: none;
	outline: none;
}

.erp-home-contact-form button.epcf-submit.btnSubmit[disabled],
.erp-home-contact-form button.epcf-submit.btnSubmit[disabled]:hover,
.erp-home-contact-form .epcf-submit.btnSubmit[disabled],
.erp-home-contact-form .epcf-submit.btnSubmit[disabled]:hover {
	opacity: 0.7;
	background-color: #002a38;
	background-image: none;
	border: none;
	box-shadow: none;
}

/* Desktop title bars above AMP forms */
.home-contact-form > .ep-amp-form-title,
.ep-contact-conversion__form > .ep-amp-form-title {
	margin: 0;
	padding: 10px 18px;
	text-align: center;
	color: #fff;
	background: #123456;
	border-radius: 0;
	font-size: clamp(1.35rem, 1.1rem + 1vw, 1.75rem);
	font-weight: 700;
	line-height: 1.28;
}

/* Hero CTA section anchor: leave space under sticky header (desktop home match). */
.home-contact-form#schedule-a-demo,
.home-contact-cta#schedule-a-demo {
	scroll-margin-top: 200px;
}

/* Shared form card shell (desktop .contact #demo parity). */
.ep-contact-conversion__form {
	background: #fff;
	border: 1px solid #dbe8f3;
	border-radius: 16px;
	padding: 0;
	box-shadow: 0 10px 28px rgba(0, 42, 56, 0.08);
	overflow: hidden;
	box-sizing: border-box;
}

/*
 * Home form sits in a flex row with flex:1 1 0.
 * overflow:hidden there collapses min-height to 0 and hides the form.
 * Keep the same 16px radius; clip via title corners instead.
 */
.home-contact-form.ep-contact-conversion__form {
	overflow: visible;
	flex: 1 1 auto;
	align-self: flex-start;
	min-height: auto;
}

.home-contact-form.ep-contact-conversion__form > .ep-amp-form-title {
	border-radius: 16px 16px 0 0;
}

/* Home: border lives on .home-contact-form; inner card is flush */
.home-contact-form:has(> .ep-amp-form-title) .epcf-card {
	border: 0;
	border-radius: 0;
	box-shadow: none;
	padding: 0;
	background: transparent;
}

.home-contact-form:has(> .ep-amp-form-title) .epcf-wrap {
	padding: 0;
}

.home-contact-form:has(> .ep-amp-form-title) .epcf-form {
	padding: 16px 16px 20px;
}

.ep-contact-conversion__form:has(> .ep-amp-form-title) .epcf-wrap--compact {
	padding-top: 0;
}

/* Compact variant (contact page + embedded forms).
 * AMP CSS forbids @container / container-type — use media queries only. */
.epcf-wrap--compact {
	max-width: 720px;
	padding: 8px 16px 24px;
}

.epcf-wrap--compact .epcf-card {
	padding: 20px 18px;
	border-radius: 12px;
}

.epcf-wrap--compact .epcf-hero {
	margin-bottom: 16px;
}

.epcf-wrap--compact .epcf-hero h1,
.epcf-wrap--compact .epcf-hero h2,
.epcf-wrap--compact .epcf-hero h3 {
	font-size: 1.35rem;
	color: #002a38;
}

.epcf-form--compact {
	gap: 12px;
}

.epcf-fields--compact {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	align-items: stretch;
	width: 100%;
}

.epcf-fields--compact .epcf-field {
	min-width: 0;
	width: 100%;
	margin: 0;
	box-sizing: border-box;
}

/* Name | Email | Phone in one row on wide screens; stacked full-width below. */
@media (min-width: 992px) {
	.epcf-fields--compact {
		grid-template-columns: repeat(3, minmax(0, 1fr));
		align-items: stretch;
	}
}

.epcf-wrap--compact .epcf-input {
	min-height: 42px;
	padding: 8px 12px;
	font-size: 14px;
}

.epcf-wrap--compact .epcf-label {
	font-size: 12px;
	line-height: 1.35;
}

.epcf-wrap--compact .epcf-checks {
	margin-top: 0;
}

.epcf-wrap--compact.erp-home-contact-form .epcf-submit.btnSubmit {
	min-width: 120px;
	padding: 0.65rem 1rem;
	font-size: 0.92rem;
	font-weight: 600;
	background-color: #002a38;
	background-image: none;
	border: none;
	border-radius: 8px;
	box-shadow: none;
	text-transform: none;
	letter-spacing: 0.02em;
}

.epcf-wrap--compact.erp-home-contact-form .epcf-submit.btnSubmit:hover,
.epcf-wrap--compact.erp-home-contact-form .epcf-submit.btnSubmit:focus,
.epcf-wrap--compact.erp-home-contact-form .epcf-submit.btnSubmit:active {
	background-color: #123456;
	background-image: none;
	border: none;
	box-shadow: none;
}

.epcf-wrap--compact.erp-home-contact-form .epcf-submit.btnSubmit[disabled],
.epcf-wrap--compact.erp-home-contact-form .epcf-submit.btnSubmit[disabled]:hover {
	background-color: #002a38;
	background-image: none;
	border: none;
	box-shadow: none;
	opacity: 0.7;
}

.epcf-wrap--compact .epcf-submit:not(.btnSubmit) {
	min-width: 160px;
	padding: 11px 24px;
	font-size: 14px;
	background: #002a38;
	box-shadow: none;
	border-radius: 8px;
	text-transform: none;
	letter-spacing: 0;
}

.epcf-wrap--compact .epcf-submit:hover {
	background: #123456;
	border-radius: 8px;
}

.epcf-wrap--compact .epcf-submit[disabled],
.epcf-wrap--compact .epcf-submit[disabled]:hover {
	background: #002a38;
	border-radius: 8px;
}

@media (max-width: 640px) {
	.epcf-wrap {
		padding: 0 14px 24px;
	}

	.epcf-card {
		padding: 20px 16px;
	}

	.epcf-hero h1,
	.epcf-hero h2,
	.epcf-hero h3 {
		font-size: 1.35rem;
	}

	.epcf-highlights ul {
		padding: 0 8px;
	}
}
