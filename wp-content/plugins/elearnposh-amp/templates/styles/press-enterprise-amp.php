<?php
/**
 * Shared AMP layout for press-media and enterprise-features pages.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

elearnposh_amp_include_style_partial( 'page-hero-subtitle' );
?>

.pfe {
	--bg: #f8fafc;
	--text: #0f172a;
	--muted: #475569;
	--line: #e2e8f0;
	--container: min(1180px, calc(100% - 40px));
	background: var(--bg);
	color: var(--text);
	font-family: "Nunito Sans", Arial, sans-serif;
	overflow-x: hidden;
	padding: 0 0 40px;
}

.pfe * {
	box-sizing: border-box;
}

.pfe-wrap {
	width: var(--container);
	margin: 0 auto;
}

.pfe-section {
	padding: 24px 16px;
}

/* --- Press / media page (matches theme press-media.css) --- */
.ep-press-page {
	background: #f8fafc;
	color: #0f172a;
	font-family: "Nunito Sans", Arial, sans-serif;
	padding: 0 0 40px;
	--ep-press-scroll-offset: 200px;
	scroll-padding-top: var(--ep-press-scroll-offset);
}

.ep-press-page * {
	box-sizing: border-box;
}

.ep-press-page .ep-press-hero,
.ep-press-page .ep-press-media,
.ep-press-page #press-media-coverage,
.ep-press-page #press-queries,
.ep-press-page .ep-press-card {
	scroll-margin-top: var(--ep-press-scroll-offset);
}

.ep-press-shell {
	width: min(1180px, calc(100vw - 40px));
	margin: 0 auto;
}

.ep-press-hero {
	padding: 34px 0 24px;
	background:
		radial-gradient(860px 400px at 0% 0%, rgba(47, 144, 239, 0.12), transparent 72%),
		radial-gradient(860px 420px at 100% 0%, rgba(10, 154, 116, 0.1), transparent 72%),
		#fff;
	border-bottom: 1px solid #e2e8f0;
}

.ep-press-hero__inner {
	width: min(1180px, calc(100vw - 40px));
	margin: 0 auto;
}

.ep-press-hero__content {
	max-width: 52rem;
}

.ep-press-hero h1 {
	margin: 0 0 10px;
	font-size: clamp(1.75rem, 1.2rem + 1.8vw, 2.65rem);
	line-height: 1.18;
	color: #002a38;
	font-weight: 800;
}

.ep-press-media {
	padding: 30px 0 18px;
}

.ep-press-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 18px;
}

.ep-press-card {
	background: #fff;
	border: 1px solid rgba(20, 114, 186, 0.1);
	border-radius: 16px;
	overflow: hidden;
	box-shadow: 0 10px 28px rgba(11, 35, 58, 0.08);
	display: flex;
	flex-direction: column;
	height: 100%;
}

.ep-press-card__image {
	padding: 20px 24px;
	border-bottom: 1px solid #dbe7f3;
	background: #fff;
}

.ep-press-card__image-frame {
	position: relative;
	width: 100%;
	height: 92px;
}

.ep-press-card__image-frame amp-img {
	object-fit: contain;
}

.ep-press-card__body {
	padding: 18px 20px 20px;
	display: flex;
	flex-direction: column;
	height: 100%;
}

.ep-press-outlet {
	display: inline-block;
	align-self: flex-start;
	margin: 0 0 10px;
	padding: 5px 10px;
	border-radius: 999px;
	background: rgba(20, 114, 186, 0.1);
	color: #1472ba;
	font-size: 11px;
	font-weight: 700;
	letter-spacing: 0.05em;
	text-transform: uppercase;
}

.ep-press-card__body h3 {
	margin: 0 0 10px;
	font-size: 1.04rem;
	line-height: 1.4;
	color: #0d2238;
	font-weight: 700;
}

.ep-press-card__body h3 a {
	color: inherit;
	text-decoration: none;
}

.ep-press-card__body p {
	margin: 0;
	color: #4a6070;
	font-size: 14px;
	line-height: 1.68;
	flex: 1;
}

.ep-press-read {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	margin-top: 14px;
	padding-top: 14px;
	border-top: 1px solid #dbe7f3;
	color: #1472ba;
	font-size: 14px;
	font-weight: 700;
	text-decoration: none;
}

.ep-press-read::after {
	content: "\2192";
	line-height: 1;
}

.ep-press-queries {
	padding: 12px 0 56px;
}

.ep-press-queries__inner {
	background: #fff;
	border: 1px solid #dbe7f3;
	border-radius: 18px;
	box-shadow: 0 10px 28px rgba(11, 35, 58, 0.08);
	padding: 26px 22px;
}

.ep-press-queries__inner h2 {
	margin: 0 0 10px;
	font-size: clamp(1.35rem, 1.1rem + 0.9vw, 1.9rem);
	line-height: 1.25;
	color: #0d2238;
	text-align: center;
	font-weight: 700;
}

.ep-press-queries__inner p {
	margin: 0 auto;
	max-width: 40rem;
	text-align: center;
	color: #4a6070;
	font-size: 15px;
	line-height: 1.65;
}

.ep-press-contacts {
	margin-top: 20px;
	display: grid;
	grid-template-columns: 1fr;
	gap: 12px;
}

.ep-press-contact {
	display: flex;
	flex-direction: column;
	gap: 4px;
	padding: 16px 18px;
	border-radius: 12px;
	border: 1px solid #dbe7f3;
	background: #f8fafc;
	text-decoration: none;
	color: inherit;
}

.ep-press-contact__label {
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.04em;
	text-transform: uppercase;
	color: #64748b;
}

.ep-press-contact__value {
	font-size: 15px;
	font-weight: 700;
	color: #1472ba;
}

/* --- Enterprise page --- */
.ep-enterprise-page .clients-section,
.ep-enterprise-page #testimonials-v2,
.ep-enterprise-page .eposh-tst-v2 {
	background: #fff !important;
}

.ep-enterprise-page .clients-section {
	padding-top: 8px;
}

.ep-enterprise-page .eposh-tst-v2 {
	padding-bottom: 12px;
}

.ep-enterprise-hero {
	padding: 32px 16px 28px;
	background:
		radial-gradient(900px 420px at 0% 0%, rgba(47, 144, 239, 0.12), transparent 72%),
		radial-gradient(900px 420px at 100% 0%, rgba(10, 154, 116, 0.08), transparent 72%),
		#fff;
	border-bottom: 1px solid var(--line);
}

.ep-enterprise-hero__inner {
	width: var(--container);
	margin: 0 auto;
}

.ep-enterprise-hero__grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 24px;
	align-items: center;
	margin-top: 8px;
}

.ep-enterprise-hero__copy {
	max-width: 52rem;
}

.ep-enterprise-hero__title {
	margin: 0 0 10px;
	font-size: clamp(1.6rem, 1.1rem + 1.8vw, 2.35rem);
	line-height: 1.2;
	font-weight: 800;
	color: #002a38;
}

.ep-enterprise-hero__lead {
	margin: 0;
	font-size: clamp(0.98rem, 0.92rem + 0.25vw, 1.08rem);
	line-height: 1.68;
	color: var(--muted);
}

.ep-enterprise-hero__media {
	display: flex;
	align-items: center;
	justify-content: center;
}

.ep-enterprise-hero__media-frame {
	position: relative;
	width: 100%;
	max-width: 560px;
	height: 290px;
	margin: 0 auto;
}

.ep-enterprise-shell {
	width: var(--container);
	margin: 0 auto;
	padding: 0 0 56px;
}

.ep-enterprise-features {
	padding: 32px 0 12px;
}

.ep-enterprise-features__heading {
	margin: 0 0 24px;
	font-size: clamp(1.35rem, 1.05rem + 0.9vw, 1.85rem);
	line-height: 1.3;
	font-weight: 700;
	color: #1472ba;
	text-align: center;
}

.ep-enterprise-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 20px;
	align-items: stretch;
}

.ep-enterprise-card {
	display: flex;
	flex-direction: column;
	height: 100%;
	background: #fff;
	border: 1px solid rgba(20, 114, 186, 0.1);
	border-radius: 16px;
	overflow: hidden;
	box-shadow: 0 8px 24px rgba(11, 35, 58, 0.08);
}

.ep-enterprise-card__media {
	padding: 20px 20px 12px;
	background: #fff;
	border-bottom: 1px solid #e8eef5;
}

.ep-enterprise-card__media-frame {
	position: relative;
	width: 100%;
	height: 200px;
}

.ep-enterprise-card__body {
	padding: 18px 20px 22px;
	display: flex;
	flex-direction: column;
	flex: 1;
}

.ep-enterprise-card__body h3 {
	margin: 0 0 10px;
	font-size: clamp(1.05rem, 0.95rem + 0.35vw, 1.22rem);
	line-height: 1.35;
	color: #002a38;
	font-weight: 700;
}

.ep-enterprise-card__body p {
	margin: 0;
	font-size: 14px;
	line-height: 1.68;
	color: #334155;
	flex: 1;
}

.ep-enterprise-cta {
	padding: 20px 0 8px;
}

.ep-enterprise-cta__inner {
	background: linear-gradient(135deg, #002a38 0%, #01465d 55%, #0f766e 100%);
	border-radius: 18px;
	padding: clamp(28px, 4vw, 40px) clamp(22px, 4vw, 36px);
	text-align: center;
	box-shadow: 0 16px 40px rgba(0, 42, 56, 0.18);
}

.ep-enterprise-cta__inner h2 {
	margin: 0 0 12px;
	font-size: clamp(1.35rem, 1.1rem + 0.9vw, 2rem);
	line-height: 1.25;
	color: #fff;
	font-weight: 700;
}

.ep-enterprise-cta__inner p {
	margin: 0 auto 22px;
	max-width: 42rem;
	color: rgba(255, 255, 255, 0.9);
	font-size: 1rem;
	line-height: 1.7;
}

.ep-enterprise-btn {
	display: inline-block;
	padding: 12px 24px;
	border-radius: 8px;
	background: #fff;
	color: #002a38 !important;
	font-weight: 700;
	text-decoration: none;
	font-size: 15px;
}

@media (min-width: 641px) {
	.pfe-section {
		padding: 32px 24px;
	}

	.ep-enterprise-hero {
		padding: 32px 24px 28px;
	}

	.ep-enterprise-grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 22px;
	}

	.ep-enterprise-card__media {
		padding: 22px 22px 14px;
	}

	.ep-enterprise-card__media-frame {
		height: 220px;
	}

	.ep-enterprise-card__body {
		padding: 20px 22px 24px;
	}
}

@media (min-width: 768px) {
	.ep-press-grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
		gap: 20px;
	}

	.ep-press-contacts {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
}

@media (min-width: 992px) {
	.ep-enterprise-hero__grid {
		grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
		gap: 32px 40px;
	}

	.ep-enterprise-hero__copy {
		max-width: none;
	}

	.ep-enterprise-hero__media {
		justify-content: flex-end;
	}
}

@media (min-width: 1025px) {
	.ep-enterprise-grid {
		gap: 24px;
	}

	.ep-enterprise-card__media {
		padding: 24px 24px 16px;
	}

	.ep-enterprise-card__media-frame {
		height: 220px;
	}
}

@media (min-width: 1200px) {
	.ep-press-grid {
		grid-template-columns: repeat(3, minmax(0, 1fr));
		gap: 22px;
	}
}
