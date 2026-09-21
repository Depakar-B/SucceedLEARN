<?php
/**
 * Our Webinars page + [wmpro_all_amp] shortcode styles.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

.ow-page {
	max-width: 1240px;
	margin: 0 auto;
	padding: 0;
}

.ow-page .ep-breadcrumbs {
	margin: 0 0 16px;
	padding: 0 0 14px;
	border-bottom: 1px solid #d9e6f6;
	color: #0d2238;
	font-weight: 600;
}

.ow-page .ep-breadcrumbs a {
	color: #0d2238;
	text-decoration: none;
	font-weight: 600;
}

.ow-page .ep-breadcrumbs__current {
	color: #1472ba;
	font-weight: 600;
}

.ow-page .ep-breadcrumbs__sep {
	color: #0d2238;
}

.ow-hero {
	background:
		radial-gradient(900px 460px at 0% 0%, rgba(47, 144, 239, 0.14), transparent 70%),
		radial-gradient(900px 460px at 100% 0%, rgba(10, 154, 116, 0.1), transparent 72%),
		#fff;
	color: #0d2238;
	border: 1px solid #d9e6f6;
	border-radius: 18px;
	padding: 32px 24px 28px;
	margin: 10px 0 22px;
	box-shadow: 0 8px 24px rgba(11, 35, 58, 0.08);
}

.ow-hero-row {
	display: block;
	margin-top: 4px;
}

.ow-hero-copy {
	width: 100%;
	max-width: 100%;
}

.ow-hero-actions {
	margin-top: 18px;
	display: flex;
	justify-content: flex-start;
}

.ow-hero h1 {
	margin: 0 0 10px;
	font-size: clamp(1.5rem, 1.1rem + 1.3vw, 2.1rem);
	line-height: 1.2;
	letter-spacing: -0.01em;
	color: #0d2238;
}

.ow-hero-subtitle {
	margin: 0 0 12px;
	font-size: clamp(1.1rem, 0.95rem + 0.6vw, 1.45rem);
	line-height: 1.35;
	font-weight: 700;
	color: #0f766e;
	width: 100%;
	max-width: 100%;
}

.ow-hero-desc {
	margin: 0;
	color: #54708d;
	font-size: 15px;
	line-height: 1.7;
	width: 100%;
	max-width: 100%;
}

.ow-hero p {
	margin: 0;
	color: #54708d;
	font-size: 15px;
	line-height: 1.7;
}

.ow-hero-library-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-height: 44px;
	padding: 10px 20px;
	border: 0;
	border-radius: 8px;
	background: #0f766e;
	color: #fff;
	font-weight: 700;
	font-size: 14px;
	box-shadow: 0 6px 16px rgba(15, 118, 110, 0.22);
}

.ow-page .wmpro-amp {
	max-width: none;
	margin: 0;
	padding: 0;
}

@media (max-width: 1024px) {
	.ow-page .wmpro-amp {
		padding-top: 16px;
		padding-bottom: 40px;
	}
}

@media (max-width: 768px) {
	.ow-page .wmpro-amp {
		padding-top: 14px;
		padding-bottom: 36px;
	}
}

@media (max-width: 640px) {
	.ow-page .wmpro-amp {
		padding-top: 12px;
		padding-bottom: 32px;
	}
}

.ow-empty {
	background: #fff;
	border: 1px dashed #c4dcf3;
	border-radius: 14px;
	padding: 36px 20px;
	text-align: center;
	color: #54708d;
	margin: 18px 0;
}

/* Tablet + mobile: outer inset for hero only; listing cards stay full width */
@media (max-width: 1024px) {
	.ow-hero {
		margin-left: 22px;
		margin-right: 22px;
	}

	.wmpro-amp-card {
		padding: 20px 18px;
	}

	.wmpro-amp-card-date {
		margin-bottom: 14px;
	}

	.wmpro-amp-topic-title {
		margin: 14px 0 12px;
		line-height: 1.45;
	}

	.wmpro-amp-speaker-prof {
		margin-top: 0;
		line-height: 1.5;
	}

	.wmpro-amp-speaker-desc {
		margin: 12px 0 14px;
	}

	.wmpro-amp-more {
		margin-top: 14px;
	}
}

@media (max-width: 768px) {
	.ow-hero {
		margin-left: 20px;
		margin-right: 20px;
	}

	.wmpro-amp-card {
		padding: 18px;
	}

	.wmpro-amp-section-title {
		padding-left: 0;
		padding-right: 0;
	}
}

@media (max-width: 640px) {
	.ow-hero {
		padding: 24px 18px 22px;
		margin: 8px 18px 18px;
	}

	.wmpro-amp-card {
		padding: 18px 16px;
	}

	.wmpro-amp-toolbar {
		padding: 16px 14px;
	}
}

/* --- [wmpro_all_amp] shortcode listing --- */
.wmpro-amp {
	max-width: 1240px;
	margin: 0 auto;
	padding: 16px 16px 40px;
	font-family: "Nunito Sans", Arial, sans-serif;
	color: #2d3748;
	box-sizing: border-box;
}

.wmpro-amp *,
.wmpro-amp *::before,
.wmpro-amp *::after {
	box-sizing: border-box;
}

.wmpro-amp-toolbar {
	background: #fff;
	border: 1px solid #e4edf6;
	border-radius: 14px;
	padding: 16px;
	margin-bottom: 20px;
	box-shadow: 0 4px 16px rgba(20, 114, 186, 0.08);
}

.wmpro-amp-page-title {
	font-size: 1.35rem;
	font-weight: 700;
	color: #1472ba;
	margin: 0 0 16px;
}

.wmpro-amp-toolbar h3 {
	margin: 0 0 12px;
	font-size: 15px;
	font-weight: 700;
	color: #1472ba;
}

.wmpro-amp-label {
	display: block;
	font-size: 12px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 0.6px;
	color: #6b809a;
	margin-bottom: 8px;
}

.wmpro-amp-filter-block {
	margin-bottom: 4px;
}

/* Visibility is controlled by amp-form (form.amp-form-submitting / .amp-form-submit-error). */
.wmpro-amp-loading {
	margin: 14px 0 4px;
	padding: 10px 12px;
	border-radius: 8px;
	background: #eef4fb;
	color: #0f5a94;
	font-size: 14px;
	font-weight: 600;
	text-align: center;
}

.wmpro-amp-filter-error {
	margin: 12px 0 0;
	padding: 10px 12px;
	border-radius: 8px;
	background: #fff1f0;
	border: 1px solid #f5c2c0;
	color: #9b1c1c;
	font-size: 13px;
	line-height: 1.5;
}

.wmpro-amp-results {
	margin-top: 18px;
}

.wmpro-amp-results--filtered {
	margin-top: 18px;
}

.wmpro-amp-toolbar .wmpro-amp-form {
	display: flex;
	flex-direction: column;
	gap: 12px;
}

.wmpro-amp-row {
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
	align-items: stretch;
}

.wmpro-amp-input,
.wmpro-amp-select {
	flex: 1 1 100%;
	min-height: 44px;
	padding: 8px 14px;
	border: 1.5px solid #dce8f2;
	border-radius: 8px;
	font-size: 14px;
	color: #2d3748;
	background: #f8fbfd;
	width: 100%;
}

.wmpro-amp-checks {
	display: flex;
	flex-direction: column;
	gap: 6px;
}

.wmpro-amp-check {
	display: flex;
	align-items: flex-start;
	gap: 10px;
	font-size: 13px;
	line-height: 1.45;
	color: #4a5568;
	padding: 6px 0;
	border-bottom: 1px solid #f2f4f7;
}

.wmpro-amp-check:last-child {
	border-bottom: none;
}

.wmpro-amp-check input {
	width: 18px;
	height: 18px;
	margin: 2px 0 0;
	flex-shrink: 0;
}

.wmpro-amp-year-grid {
	display: flex;
	flex-wrap: wrap;
	gap: 8px;
}

.wmpro-amp-year-pill,
.wmpro-amp-year-grid label {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	padding: 6px 12px;
	border: 1px solid #dce8f2;
	border-radius: 999px;
	font-size: 13px;
	background: #f8fbfd;
}

.wmpro-amp-year-pill input,
.wmpro-amp-year-grid label input {
	margin: 0;
}

.wmpro-amp-year-pill.wmpro-amp-year-on,
.wmpro-amp-year-grid label.wmpro-amp-year-on {
	background: #1472ba;
	border-color: #1472ba;
	color: #fff;
}

.wmpro-amp-btn {
	min-height: 44px;
	padding: 0 18px;
	border: 0;
	border-radius: 8px;
	background: #1472ba;
	color: #fff;
	font-weight: 700;
	font-size: 14px;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	text-decoration: none;
}

.wmpro-amp-btn--secondary {
	background: #eef3f9;
	color: #0f5a94;
	border: 1px solid #d6e1ef;
}

.wmpro-amp-actions {
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
}

.wmpro-amp-section {
	margin-bottom: 28px;
}

.wmpro-amp-section-title {
	font-size: 1.25rem;
	font-weight: 700;
	color: #1472ba;
	margin: 0 0 16px;
	padding-bottom: 8px;
	border-bottom: 2px solid #e4edf6;
}

.wmpro-amp-section-title--completed {
	color: #0f5a94;
}

.wmpro-amp-section-subtitle {
	font-size: 13px;
	color: #6b809a;
	margin: -8px 0 14px;
}

.wmpro-amp-divider {
	height: 1px;
	background: #e4edf6;
	margin: 24px 0;
}

.wmpro-amp-card {
	background: #fff;
	border: 1px solid #e4edf6;
	border-radius: 12px;
	padding: 16px;
	margin-bottom: 16px;
	box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
}

.wmpro-amp-card-cat {
	font-size: 11px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 0.6px;
	color: #1472ba;
	margin-bottom: 6px;
}

.wmpro-amp-card-date {
	font-size: 13px;
	color: #6b809a;
	margin-bottom: 12px;
}

.wmpro-amp-card-title {
	font-size: 1.1rem;
	font-weight: 700;
	color: #1a202c;
	margin: 0 0 8px;
}

.wmpro-amp-topic-title {
	font-size: 14px;
	font-weight: 700;
	color: #1472ba;
	margin: 12px 0 8px;
}

.wmpro-amp-speaker-row {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	gap: 10px;
	margin: 12px 0 16px;
}

.wmpro-amp-speaker-row > div:not(.wmpro-amp-avatar) {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	align-self: stretch;
	width: 100%;
	max-width: 100%;
	text-align: left;
	gap: 6px;
}

.wmpro-amp-speaker-row > .wmpro-amp-avatar {
	flex: 0 0 auto;
	align-self: flex-start;
}

.wmpro-amp-avatar {
	flex-shrink: 0;
	align-self: flex-start;
	line-height: 0;
}

.wmpro-amp-avatar.wmpro-amp-avatar--img {
	width: 56px;
	height: 56px;
	flex: 0 0 56px;
	overflow: hidden;
	border-radius: 50%;
}

.wmpro-amp-avatar.wmpro-amp-avatar--lg.wmpro-amp-avatar--img {
	width: 72px;
	height: 72px;
	flex: 0 0 72px;
}

.wmpro-amp-avatar amp-img {
	border-radius: 50%;
	display: block;
}

.wmpro-amp-avatar-fallback {
	width: 56px;
	height: 56px;
	border-radius: 50%;
	background: #e4edf6;
	flex-shrink: 0;
}

.wmpro-amp-avatar--lg amp-img,
.wmpro-amp-avatar-fallback.wmpro-amp-avatar--lg {
	width: 72px;
	height: 72px;
}

.wmpro-amp-speaker-name {
	font-weight: 700;
	font-size: 15px;
	color: #1a202c;
}

.wmpro-amp-speaker-prof {
	font-size: 13px;
	color: #555;
	margin-top: 2px;
}

.wmpro-amp-speaker-desc {
	font-size: 14px;
	line-height: 1.6;
	color: #4a5568;
	margin: 8px 0;
}

.wmpro-amp-speaker-divider {
	height: 1px;
	background: #eee;
	margin: 14px 0;
}

.wmpro-amp-more {
	margin-top: 12px;
	border: 0;
	border-radius: 0;
	overflow: visible;
	background: transparent;
}

.wmpro-amp-more summary {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 5px;
	width: auto;
	max-width: 100%;
	padding: 7px 16px;
	font-size: 12.5px;
	font-weight: 600;
	color: #fff;
	background: #1472ba;
	border: 0;
	border-radius: 6px;
	list-style: none;
	cursor: pointer;
	letter-spacing: 0.3px;
}

.wmpro-amp-more summary::-webkit-details-marker {
	display: none;
}

.wmpro-amp-more[open] summary {
	margin-bottom: 10px;
}

.wmpro-amp-more-content {
	padding: 12px 14px;
	font-size: 14px;
	line-height: 1.6;
	color: #333;
	background: #fff;
	border: 1px solid #dce8f2;
	border-radius: 8px;
}

.wmpro-amp-more-content ul,
.wmpro-amp-more-content ol {
	margin: 8px 0 8px 20px;
	padding-left: 0;
}

.wmpro-amp-more-content li {
	margin-bottom: 6px;
}

.wmpro-amp-register {
	margin-top: 14px;
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
	align-items: center;
	justify-content: center;
}

.wmpro-amp-register a,
.wmpro-amp-btn-library {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-height: 40px;
	padding: 9px 18px;
	font-weight: 700;
	font-size: 13px;
	border-radius: 7px;
	text-decoration: none;
	border: 0;
}

.wmpro-amp-register a {
	background: #ffc200;
	color: #1a1a1a;
}

.wmpro-amp-btn-library {
	background: #0f766e;
	color: #fff;
}

.wmpro-amp-access-text {
	margin: 0 0 16px;
	font-size: 15px;
	line-height: 1.65;
	color: #2d3748;
}

.wmpro-amp-access-link {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-height: 44px;
	padding: 10px 20px;
	background: #1472ba;
	color: #fff;
	font-weight: 700;
	font-size: 14px;
	border-radius: 8px;
	text-decoration: none;
}

.wmpro-amp-placeholder-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 14px;
}

.wmpro-amp-placeholder-card {
	background: #f8f9fa;
	border: 2px dashed #ddd;
	border-radius: 10px;
	padding: 22px 16px;
	text-align: center;
	color: #666;
}

.wmpro-amp-placeholder-cat {
	font-weight: 700;
	color: #1472ba;
	margin-bottom: 8px;
	font-size: 13px;
}

.wmpro-amp-placeholder-msg {
	font-size: 13px;
	margin-top: 8px;
}

.wmpro-amp-no-results {
	text-align: center;
	color: #6b809a;
	padding: 24px 16px;
	font-size: 14px;
}

.wmpro-amp-active-filters {
	display: flex;
	flex-wrap: wrap;
	gap: 8px;
	margin-top: 10px;
}

.wmpro-amp-chip {
	display: inline-flex;
	align-items: center;
	padding: 4px 10px;
	font-size: 12px;
	font-weight: 600;
	color: #0f5a94;
	background: #e7f1fb;
	border: 1px solid #c4dcf3;
	border-radius: 999px;
}

.wmpro-amp-sidebar-contact {
	margin-top: 14px;
	padding-top: 14px;
	border-top: 1px solid #e4edf6;
}

.wmpro-amp-sidebar-contact-text {
	margin: 0 0 10px;
	font-size: 13px;
	line-height: 1.5;
	color: #5b6a7a;
}

.wmpro-amp-contact-btn {
	display: block;
	width: 100%;
	min-height: 44px;
	padding: 10px 16px;
	border: 0;
	border-radius: 999px;
	background: #1472ba;
	color: #fff;
	font-size: 14px;
	font-weight: 700;
}

.wmpro-amp-lightbox-shell {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
	padding: 20px 16px;
	box-sizing: border-box;
	background: rgba(15, 23, 42, 0.55);
	overflow-y: auto;
}

.wmpro-amp-lightbox-card {
	position: relative;
	width: min(560px, 100%);
	margin: 0;
	padding: 20px 18px 22px;
	background: #fff;
	border-radius: 14px;
	box-shadow: 0 14px 40px rgba(0, 0, 0, 0.22);
	text-align: center;
}

.wmpro-amp-lightbox-title {
	margin: 0 0 12px;
	padding: 0 36px;
	font-size: 1.05rem;
	color: #1472ba;
	text-align: center;
}

#wmall-contact-lightbox .wmpro-amp-lightbox-title {
	padding: 0;
	font-size: clamp(0.95rem, 0.88rem + 0.3vw, 1.1rem);
	line-height: 1.35;
	font-weight: 600;
	color: #0f766e;
	text-align: left;
}

.wmpro-amp-lightbox-card .epcf-label {
	font-size: 12px;
	font-weight: 600;
	color: #0f766e;
	letter-spacing: 0.01em;
	line-height: 1.35;
}

.wmpro-amp-lightbox-card .epcf-label .epcf-optional {
	color: #54708d;
	font-weight: 500;
}

.wmpro-amp-lightbox-close {
	position: absolute;
	top: 10px;
	right: 10px;
	width: 36px;
	height: 36px;
	border: 0;
	border-radius: 999px;
	background: #eef4fb;
	color: #5b6a7a;
	font-size: 22px;
	line-height: 1;
}

.wmpro-amp-lightbox-card .epcf-wrap,
.wmpro-amp-lightbox-card .epcf-card {
	box-shadow: none;
	border: 0;
	padding: 0;
	margin: 0;
}

.wmpro-amp-lightbox-card .epcf-hero {
	display: none;
}

@media (min-width: 600px) {
	.wmpro-amp-placeholder-grid {
		grid-template-columns: repeat(2, 1fr);
	}
}

/* Tablet/desktop: inline speaker row */
@media (min-width: 768px) {
	.wmpro-amp-speaker-row {
		flex-direction: row;
		align-items: center;
		gap: 14px;
		margin: 12px 0 14px;
	}

	.wmpro-amp-speaker-row > div:not(.wmpro-amp-avatar) {
		flex: 1;
		min-width: 0;
		justify-content: center;
		align-self: center;
		width: auto;
		max-width: none;
		gap: 3px;
	}

	.wmpro-amp-speaker-row > .wmpro-amp-avatar,
	.wmpro-amp-avatar {
		align-self: center;
	}
}
