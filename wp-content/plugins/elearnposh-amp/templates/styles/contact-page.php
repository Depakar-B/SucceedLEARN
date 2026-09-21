<?php
/**
 * Contact page layout (AMP) — matches desktop genesis-sample contact page.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.ep-contact-page {
	background: #fff;
}

.ep-contact-shell {
	width: min(1180px, calc(100% - 28px));
	margin: 0 auto;
	padding: 0 0 32px;
}

.ep-contact-hero {
	padding-top: 40px;
	padding-right: 0;
	padding-bottom: 24px;
	padding-left: 0;
	background:
		radial-gradient(900px 420px at 0% 0%, rgba(47, 144, 239, 0.12), transparent 72%),
		radial-gradient(900px 420px at 100% 0%, rgba(10, 154, 116, 0.08), transparent 72%),
		#fff;
	margin-bottom: 16px;
}

.ep-contact-hero__inner {
	width: min(1180px, calc(100% - 28px));
	margin: 0 auto;
}

.ep-contact-hero__copy {
	text-align: left;
	width: 100%;
}

.ep-contact-hero__kicker {
	display: inline-flex;
	padding: 6px 14px;
	border-radius: 999px;
	border: 1px solid #cde2f1;
	background: #f5fbff;
	color: #0f5f90;
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.04em;
	text-transform: uppercase;
}

.ep-contact-hero h1 {
	margin: 14px 0 10px;
	font-size: clamp(1.4rem, 1.2rem + 1.1vw, 2rem);
	line-height: 1.25;
	color: #002a38;
	font-weight: 700;
}

.ep-contact-hero__lead {
	margin: 0;
	color: #4a6070;
	font-size: 1.05rem;
	line-height: 1.7;
}

@media (max-width: 991.98px) {
	.ep-contact-hero {
		padding-top: 48px;
		padding-right: 20px;
		padding-bottom: 28px;
		padding-left: 20px;
	}

	.ep-contact-hero__inner {
		width: 100%;
	}
}

@media (max-width: 767.98px) {
	.ep-contact-hero {
		padding-top: 56px;
		padding-right: 16px;
		padding-bottom: 24px;
		padding-left: 16px;
	}
}

.ep-contact-conversion {
	margin-bottom: 28px;
}

.ep-contact-conversion__grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 18px;
	align-items: start;
}

.ep-contact-conversion__form {
	background: #fff;
	border: 1px solid #dbe8f3;
	border-radius: 16px;
	padding: 0;
	box-shadow: 0 10px 28px rgba(0, 42, 56, 0.08);
	overflow: hidden;
}

.ep-contact-conversion__form .epcf-wrap {
	margin: 0;
	padding: 0;
}

.ep-contact-conversion__form .epcf-wrap--compact {
	max-width: none;
	padding: 0;
}

.ep-contact-conversion__form .epcf-form,
.contact #demo .epcf-form,
.home-contact-form .epcf-form {
	padding: 20px;
}

.ep-contact-conversion__form:has(> .epcf-hero) .epcf-card,
.home-contact-form:has(.epcf-hero) .epcf-card {
	padding-top: 0;
}

.ep-contact-conversion__form .epcf-hero {
	margin: 0;
	padding: 14px 18px 16px;
	text-align: center;
	background: #123456;
	border-radius: 0;
}

.ep-contact-conversion__form .epcf-hero h1,
.ep-contact-conversion__form .epcf-hero h2,
.ep-contact-conversion__form .epcf-hero h3 {
	margin: 0;
	color: #ffffff;
	font-size: clamp(1.35rem, 1.15rem + 0.8vw, 1.75rem);
	font-weight: 700;
	line-height: 1.28;
}

.ep-contact-conversion__form .epcf-card {
	border: 0;
	box-shadow: none;
	padding: 0;
	background: transparent;
}

.ep-contact-conversion__form .epcf-wrap--compact .epcf-card {
	padding: 0;
	border-radius: 0;
}

.ep-contact-conversion__form:has(> .ep-amp-form-title) .epcf-wrap--compact .epcf-card {
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}

.ep-contact-conversion__form:has(> .ep-amp-form-title) .epcf-form {
	padding: 20px 18px 22px;
}

.ep-contact-conversion__form .erp-home-contact-form .epcf-form--compact {
	gap: 0.65rem;
}

.ep-contact-conversion__form .erp-home-contact-form .epcf-fields--compact {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 0.65rem;
	align-items: stretch;
	width: 100%;
}

.ep-contact-conversion__form .epcf-form--compact {
	gap: 14px;
}

.ep-contact-conversion__form .epcf-fields--compact {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 14px;
	align-items: stretch;
	width: 100%;
}

.ep-contact-conversion__form .epcf-fields--compact .epcf-field {
	grid-column: auto;
	grid-row: auto;
	margin: 0;
	width: 100%;
	min-width: 0;
	box-sizing: border-box;
}

.ep-contact-conversion__form .epcf-label {
	font-size: 13px;
	font-weight: 700;
	line-height: 1.35;
}

.ep-contact-conversion__form .epcf-input,
.ep-contact-conversion__form .epcf-textarea {
	min-height: 44px;
	padding: 10px 14px;
	font-size: 15px;
	border-radius: 10px;
}

.ep-contact-conversion__form .epcf-textarea {
	min-height: 110px;
}

.ep-contact-conversion__form .epcf-checks {
	gap: 10px;
}

.ep-contact-conversion__form .epcf-submit:not(.btnSubmit) {
	width: 100%;
	max-width: 220px;
	min-height: 44px;
}

.ep-contact-conversion__form .erp-home-contact-form .epcf-submit.btnSubmit {
	width: auto;
	max-width: 200px;
	min-height: auto;
}

@media (max-width: 991.98px) {
	.ep-contact-conversion__grid {
		gap: 22px;
	}

	.ep-contact-conversion__form .epcf-form,
	.contact #demo .epcf-form {
		padding: 16px 16px 20px;
	}

	.ep-contact-conversion__form .epcf-hero {
		padding: 12px 16px 14px;
	}
}

@media (max-width: 767.98px) {
	.ep-contact-page .ep-contact-conversion__form {
		width: 100%;
		margin-inline: auto;
	}
}

@media (min-width: 768px) and (max-width: 991.98px) {
	.ep-contact-page .ep-contact-conversion__form {
		width: min(78%, 680px);
		margin-inline: auto;
	}
}

@media (min-width: 992px) {
	.ep-contact-conversion__form .erp-home-contact-form .epcf-fields--compact {
		grid-template-columns: repeat(3, minmax(0, 1fr));
		align-items: stretch;
	}
}

.ep-contact-section-title {
	text-align: center;
	margin: 0 0 8px;
	font-size: clamp(1.25rem, 1.1rem + 0.7vw, 1.65rem);
	line-height: 1.28;
	font-weight: 700;
	color: #0f766e;
}

.ep-contact-enabling {
	padding: 28px 14px 48px;
	background: #fff;
	text-align: center;
}

.ep-contact-enabling__grid {
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 12px;
	width: min(1180px, calc(100% - 28px));
	margin: 0 auto;
}

.ep-contact-enabling__item {
	background: #fff;
	border: 1px solid #e2e8f0;
	border-radius: 10px;
	padding: 10px;
	min-height: 72px;
	display: flex;
	align-items: center;
	justify-content: center;
}

.ep-contact-page .clients-section,
.ep-contact-page #testimonials {
	background: #fff;
}

#demo {
	scroll-margin-top: 120px;
}

@media (min-width: 768px) and (max-width: 991.98px) {
	.ep-contact-enabling__grid {
		grid-template-columns: repeat(3, minmax(0, 1fr));
	}
}

@media (min-width: 992px) {
	.ep-contact-enabling__grid {
		grid-template-columns: repeat(6, minmax(0, 1fr));
	}
}
