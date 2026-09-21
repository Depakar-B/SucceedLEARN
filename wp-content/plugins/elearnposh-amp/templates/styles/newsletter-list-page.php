<?php
/**
 * Newsletter list page styles (hero + listing).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

.nl-page {
	max-width: 1240px;
	margin: 0 auto;
	padding: 16px 16px 40px;
}

.nl-hero {
	background:
		radial-gradient(900px 460px at 0% 0%, rgba(47, 144, 239, 0.14), transparent 70%),
		radial-gradient(900px 460px at 100% 0%, rgba(10, 154, 116, 0.1), transparent 72%),
		#fff;
	color: #0d2238;
	border: 0;
	border-bottom: 1px solid #e2e8f0;
	border-radius: 0;
	padding: 22px 16px 26px;
	margin: 0 0 4px;
	box-shadow: none;
	box-sizing: border-box;
}

.nl-hero__inner {
	max-width: 1240px;
	margin: 0 auto;
}

.nl-hero .ep-breadcrumbs {
	margin: 0 0 14px;
	padding: 0 0 12px;
	border-bottom: 1px solid #e8eef5;
	color: #0d2238;
	font-size: 0.8125rem;
	line-height: 1.5;
	font-weight: 600;
	word-break: break-word;
}

.nl-hero .ep-breadcrumbs a {
	color: #0d2238;
	text-decoration: none;
	font-weight: 600;
}

.nl-hero .ep-breadcrumbs__current {
	color: #1472ba;
	font-weight: 600;
}

.nl-hero .ep-breadcrumbs__sep {
	color: #94a3b8;
}

.nl-hero-row {
	display: grid;
	grid-template-columns: minmax(0, 1fr) minmax(280px, 380px);
	gap: 28px 32px;
	align-items: center;
	margin-top: 4px;
}

.nl-hero-copy {
	width: 100%;
	max-width: 100%;
	min-width: 0;
}

.nl-hero-form {
	width: 100%;
	min-width: 0;
}

.nl-hero-form .ans-footer-subscription-wrapper {
	margin: 0;
	padding: 22px 22px 20px;
	background: #fff;
	border-radius: 14px;
	box-shadow: 0 8px 24px rgba(15, 42, 72, 0.08);
	border: 1px solid #e3edf7;
}

.nl-hero-form .ans-footer-form-title {
	margin: 0 0 14px;
	color: #0d2238;
	font-size: 17px;
	font-weight: 700;
	line-height: 1.25;
}

.nl-hero-form .ans-footer-form-row {
	display: flex;
	flex-direction: column;
	gap: 10px;
}

.nl-hero-form .ans-footer-email-input {
	width: 100%;
	padding: 12px 14px;
	border: 1px solid #d6e1ef;
	border-radius: 10px;
	font-size: 14px;
	background: #fff;
	color: #002a38;
	box-sizing: border-box;
	font-family: "Nunito Sans", sans-serif;
}

.nl-hero-form .ans-footer-email-input:focus {
	outline: none;
	border-color: #1472ba;
	box-shadow: 0 0 0 3px rgba(20, 114, 186, 0.15);
}

.nl-hero-form .ans-footer-consent-label {
	display: flex;
	align-items: flex-start;
	gap: 8px;
	font-size: 13px;
	color: #54708d;
	text-align: left;
	line-height: 1.45;
}

.nl-hero-form .ans-footer-submit-btn {
	background: #0f766e;
	color: #fff;
	border: 0;
	padding: 12px 22px;
	border-radius: 10px;
	font-weight: 700;
	font-size: 14px;
	width: 100%;
	min-height: 44px;
	font-family: "Nunito Sans", sans-serif;
}

.nl-hero-form .ans-footer-message {
	margin-top: 8px;
	font-size: 13px;
	font-weight: 600;
}

.nl-hero-actions {
	margin-top: 18px;
	display: flex;
	justify-content: flex-start;
}

.nl-hero-cta {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	min-height: 44px;
	padding: 10px 22px;
	border: 0;
	border-radius: 10px;
	background: #0f766e;
	color: #fff;
	font-weight: 700;
	font-size: 14px;
	box-shadow: 0 6px 16px rgba(15, 118, 110, 0.22);
}

.nl-hero h1 {
	margin: 0 0 10px;
	font-size: clamp(1.55rem, 1.1rem + 1.8vw, 2.25rem);
	font-weight: 800;
	line-height: 1.2;
	letter-spacing: -0.015em;
	color: #002a38;
}

.nl-hero-subtitle {
	margin: 0 0 12px;
	font-size: clamp(1.1rem, 0.95rem + 0.6vw, 1.45rem);
	line-height: 1.35;
	font-weight: 700;
	color: #0f766e;
	width: 100%;
	max-width: 100%;
}

.nl-hero-desc {
	margin: 0;
	color: #54708d;
	font-size: 15px;
	line-height: 1.7;
	width: 100%;
	max-width: none;
}

.nl-toolbar {
	background: #fff;
	border: 1px solid #e3edf7;
	border-radius: 14px;
	padding: 14px;
	box-shadow: 0 6px 18px rgba(15, 42, 72, 0.06);
	margin-bottom: 18px;
}

.nl-form {
	display: flex;
	flex-direction: column;
	gap: 10px;
}

.nl-row {
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
	align-items: stretch;
}

.nl-row--actions {
	flex-wrap: wrap;
	align-items: center;
	justify-content: flex-start;
}

.nl-row--actions .nl-btn {
	flex: 0 0 auto;
	width: auto !important;
	min-width: 140px;
}

.nl-row--searchbtn .nl-btn {
	width: 100%;
}

.nl-input,
.nl-select {
	flex: 1 1 220px;
	min-height: 44px;
	padding: 8px 14px;
	border: 1px solid #d6e1ef;
	border-radius: 10px;
	font-size: 14px;
	color: #0f172a;
	background: #fff;
	outline: none;
	-webkit-appearance: none;
	appearance: none;
	width: 100%;
}

.nl-select {
	background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'><path fill='%2354708d' d='M1 1l5 5 5-5'/></svg>");
	background-repeat: no-repeat;
	background-position: right 14px center;
	padding-right: 36px;
	flex: 0 1 200px;
}

.nl-input:focus,
.nl-select:focus {
	border-color: #1472ba;
	box-shadow: 0 0 0 3px rgba(20, 114, 186, 0.18);
}

.nl-btn {
	min-height: 44px;
	padding: 0 18px;
	border: 0;
	border-radius: 10px;
	background: #1472ba;
	color: #fff;
	font-weight: 700;
	font-size: 14px;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 6px;
}

.nl-btn:hover {
	background: #0f5a94;
}

.nl-btn-clear {
	background: #eef3f9;
	color: #0f5a94;
	border: 1px solid #d6e1ef;
}

.nl-btn-clear:hover {
	background: #dde7f3;
}

.nl-active-filters {
	display: flex;
	flex-wrap: wrap;
	gap: 8px;
	margin-top: 12px;
}

.nl-chip {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	padding: 5px 10px;
	font-size: 12px;
	font-weight: 700;
	color: #0f5a94;
	background: #e7f1fb;
	border: 1px solid #c4dcf3;
	border-radius: 999px;
}

.nl-result-meta {
	display: flex;
	justify-content: space-between;
	align-items: center;
	font-size: 13px;
	color: #54708d;
	margin: 0 4px 14px;
}

.nl-grid {
	display: grid;
	grid-template-columns: repeat(3, minmax(0, 1fr));
	gap: 24px;
}

.nl-card {
	background: #fff;
	border: 1px solid #e3edf7;
	border-radius: 14px;
	padding: 14px;
	display: flex;
	flex-direction: column;
	height: 100%;
	box-shadow: 0 6px 16px rgba(15, 42, 72, 0.05);
	transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.nl-card:hover {
	transform: translateY(-4px);
	box-shadow: 0 14px 30px rgba(15, 42, 72, 0.12);
}

.nl-thumb {
	position: relative;
	border-radius: 10px;
	overflow: hidden;
	background: #f8f8f8;
	margin-bottom: 14px;
}

.nl-thumb amp-img {
	width: 100%;
	height: 190px;
	object-fit: contain;
	border-radius: 10px;
	margin-bottom: 14px;
	background: #f8f8f8;
}

.nl-thumb-fallback {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	aspect-ratio: 3/2;
	color: #aab4be;
	font-size: 13px;
	font-weight: 600;
	letter-spacing: 0.04em;
	text-transform: uppercase;
}

.nl-card-footer {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 12px;
	margin-top: auto;
}

.nl-readtime {
	display: inline-flex;
	align-items: center;
	width: fit-content;
	flex-shrink: 0;
	font-size: 12px;
	font-weight: 600;
	letter-spacing: 0.01em;
	background: #1472ba;
	color: #fff;
	padding: 5px 12px;
	border-radius: 6px;
	line-height: 1.2;
}

.nl-meta {
	display: flex;
	align-items: center;
	gap: 8px;
	color: #6b809a;
	font-size: 12px;
	margin-bottom: 6px;
}

.nl-meta b {
	color: #0f5a94;
	font-weight: 700;
}

.nl-title {
	font-size: 17px;
	font-weight: 800;
	line-height: 1.3;
	color: #0f172a;
	margin: 0 0 6px;
	display: -webkit-box;
	-webkit-line-clamp: 2;
	line-clamp: 2;
	-webkit-box-orient: vertical;
	overflow: hidden;
	min-height: 44px;
}

.nl-title a {
	color: #0f172a;
	transition: color 0.2s ease;
}

.nl-card:hover .nl-title a {
	color: #1472ba;
}

.nl-desc {
	font-size: 13.5px;
	line-height: 1.6;
	color: #54708d;
	margin: 0 0 14px;
	display: -webkit-box;
	-webkit-line-clamp: 3;
	line-clamp: 3;
	-webkit-box-orient: vertical;
	overflow: hidden;
	min-height: 65px;
}

.nl-readmore {
	margin: 0 0 0 auto;
	display: inline-flex;
	align-items: center;
	gap: 6px;
	font-size: 13px;
	font-weight: 800;
	color: #1472ba;
	white-space: nowrap;
}

.nl-readmore::after {
	content: "\2192";
	transition: transform 0.2s ease;
}

.nl-card:hover .nl-readmore::after {
	transform: translateX(4px);
}

.nl-empty {
	background: #fff;
	border: 1px dashed #c4dcf3;
	border-radius: 14px;
	padding: 36px 20px;
	text-align: center;
	color: #54708d;
}

.nl-empty h3 {
	margin: 0 0 6px;
	color: #0f172a;
}

.nl-empty p {
	margin: 0 0 14px;
}

.nl-pagination {
	display: flex;
	justify-content: center;
	flex-wrap: wrap;
	gap: 6px;
	margin: 30px 0 10px;
}

.nl-pagination a,
.nl-pagination span {
	min-width: 38px;
	height: 38px;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	padding: 0 12px;
	border: 1px solid #d6e1ef;
	border-radius: 8px;
	background: #fff;
	font-size: 13px;
	font-weight: 700;
	color: #1472ba;
}

.nl-pagination .current {
	background: #1472ba;
	color: #fff;
	border-color: #1472ba;
	box-shadow: 0 4px 10px rgba(20, 114, 186, 0.25);
}

.nl-pagination .dots {
	border: 0;
	background: transparent;
	color: #54708d;
}

@media (max-width: 991px) {
	.nl-hero-row {
		grid-template-columns: 1fr;
		gap: 22px;
	}

	.nl-hero-form {
		max-width: 420px;
		margin-left: auto;
		margin-right: auto;
	}
}

@media (max-width: 640px) {
	.nl-page {
		padding: 12px 16px 32px;
	}

	.nl-hero {
		padding: 20px 16px 22px;
		margin: 0 0 4px;
	}

	.nl-row {
		flex-direction: column;
	}

	.nl-row--actions {
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: flex-start;
	}

	.nl-select,
	.nl-input {
		flex: 1 1 auto;
	}

	.nl-grid {
		grid-template-columns: 1fr;
		gap: 14px;
	}

	.nl-hero-cta {
		width: 100%;
		justify-content: center;
	}
}
