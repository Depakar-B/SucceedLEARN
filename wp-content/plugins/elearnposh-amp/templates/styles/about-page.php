<?php
/**
 * About Us page layout (AMP) — matches desktop genesis-sample about page.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.ep-about-page {
	background: #fff;
	color: #0d2238;
	font-family: "Nunito Sans", Arial, sans-serif;
	padding-bottom: 8px;
}

.ep-about-shell {
	width: min(1180px, calc(100% - 28px));
	margin: 0 auto;
	padding: 0 0 32px;
}

.ep-about-hero {
	padding: clamp(40px, 2.5vw + 20px, 56px) 0 24px;
	background:
		radial-gradient(900px 420px at 0% 0%, rgba(47, 144, 239, 0.12), transparent 72%),
		radial-gradient(900px 420px at 100% 0%, rgba(10, 154, 116, 0.08), transparent 72%),
		#fff;
	margin-bottom: 14px;
}

.ep-about-hero__inner {
	width: min(1180px, calc(100% - 28px));
	margin: 0 auto;
}

.ep-about-hero__copy {
	text-align: left;
	width: 100%;
}

.ep-about-hero__kicker {
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
	margin-bottom: 12px;
}

.ep-about-hero h1 {
	margin: 0 0 12px;
	font-size: clamp(1.6rem, 1.25rem + 1.2vw, 2.2rem);
	line-height: 1.25;
	color: #002a38;
	font-weight: 700;
}

.ep-about-hero__lead {
	margin: 0;
	font-size: 1.05rem;
	line-height: 1.7;
	color: #4a6070;
}

.ep-about-hero__body {
	display: grid;
	gap: 14px;
}

.ep-about-section {
	padding: 8px 0 20px;
}

.ep-about-section-title {
	margin: 0 0 18px;
	text-align: center;
	font-size: clamp(1.25rem, 1.1rem + 0.7vw, 1.65rem);
	line-height: 1.28;
	font-weight: 700;
	color: #0f766e;
}

.ep-about-card {
	background: #fff;
	border: 1px solid rgba(20, 114, 186, 0.12);
	border-radius: 14px;
	box-shadow: 0 8px 24px rgba(11, 35, 58, 0.08);
	padding: 22px 18px;
}

.ep-about-card + .ep-about-card {
	margin-top: 18px;
}

.ep-about-grid .ep-about-card + .ep-about-card {
	margin-top: 0;
}

.ep-about-card h2,
.ep-about-card h3 {
	margin: 0 0 12px;
	font-size: clamp(1.15rem, 1rem + 0.5vw, 1.45rem);
	line-height: 1.3;
	color: #002a38;
}

.ep-about-card p {
	margin: 0 0 14px;
	font-size: 15px;
	line-height: 1.75;
	color: #2f4358;
}

.ep-about-card p:last-of-type {
	margin-bottom: 0;
}

.ep-about-card-logo {
	margin: 0 0 16px;
	text-align: center;
}

.ep-about-card-logo amp-img {
	display: block;
	margin: 0 auto;
	max-width: 260px;
}

.ep-about-card-actions {
	margin-top: 18px;
}

.ep-about-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 18px;
	align-items: stretch;
}

#about-other-offerings .ep-about-card {
	display: flex;
	flex-direction: column;
	height: 100%;
}

#about-other-offerings .ep-about-card p {
	flex: 1 1 auto;
}

#about-other-offerings .ep-about-card-logo {
	flex: 0 0 120px;
	height: 120px;
	margin: 0 0 16px;
	display: flex;
	align-items: center;
	justify-content: center;
}

#about-other-offerings .ep-about-card-logo amp-img {
	width: 100%;
	max-width: 260px;
	max-height: 120px;
}

#about-other-offerings .ep-about-card-actions {
	margin-top: auto;
}

.ep-about-stats {
	padding: 8px 0 28px;
}

.ep-about-stats__heading {
	margin: 0 0 12px;
	font-size: clamp(1.2rem, 1.05rem + 0.8vw, 1.65rem);
	line-height: 1.3;
	font-weight: 700;
	color: #002a38;
	text-align: center;
}

.ep-about-stats__subtitle {
	margin: 0 auto 22px;
	max-width: 42rem;
	text-align: center;
	color: #4a6070;
	font-size: 1rem;
	line-height: 1.65;
}

.ep-about-stats .ep-stats-cards {
	max-width: 720px;
	margin: 0 auto;
}

.ep-stats-cards {
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 16px;
}

.ep-stats-card {
	background: #fff;
	border: 1px solid #dbe8ef;
	border-radius: 14px;
	padding: 22px 16px;
	text-align: center;
	box-shadow: 0 8px 22px rgba(0, 42, 56, 0.06);
	min-width: 0;
}

.ep-stats-card__value {
	margin: 0 0 10px;
	font-size: clamp(1.35rem, 1.05rem + 0.75vw, 1.85rem);
	font-weight: 800;
	line-height: 1.1;
	color: #002a38;
}

.ep-stats-card__label {
	display: block;
	font-size: 0.92rem;
	line-height: 1.35;
	font-weight: 600;
	color: #4a6075;
}

.ep-about-security {
	padding: 12px 0 28px;
}

.ep-about-security__shell {
	width: min(1180px, calc(100% - 28px));
	margin: 0 auto;
}

.ep-about-security__card {
	background: #fff;
	border: 1px solid rgba(13, 148, 136, 0.16);
	border-radius: 18px;
	box-shadow: 0 10px 28px rgba(15, 23, 42, 0.09);
	padding: 24px 22px;
}

.ep-about-security__title {
	margin: 0 0 16px;
	padding: 0 0 14px;
	border-bottom: 2px solid rgba(15, 118, 110, 0.14);
	color: #0f766e;
	font-size: clamp(1.15rem, 1rem + 0.5vw, 1.45rem);
	font-weight: 700;
	line-height: 1.35;
}

.ep-about-security__badges {
	display: flex;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
	gap: 16px;
	margin-bottom: 18px;
}

.ep-about-security__copy {
	margin: 0 0 16px;
	font-size: 15px;
	line-height: 1.7;
	color: #334155;
}

.ep-about-security__trust {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	gap: 12px;
}

.ep-about-security__trust p {
	margin: 0;
	font-size: 15px;
	color: #334155;
}

.ep-about-security__trust-btn {
	display: inline-block;
	padding: 10px 24px;
	background: #0f766e;
	color: #fff;
	text-decoration: none;
	border-radius: 8px;
	font-size: 14px;
	font-weight: 600;
}

.ep-about-cta {
	padding: 8px 0 40px;
}

.ep-about-cta__shell {
	width: min(1180px, calc(100% - 28px));
	margin: 0 auto;
}

.ep-about-cta__content {
	background: linear-gradient(135deg, #002a38 0%, #01465d 55%, #0f766e 100%);
	border-radius: 18px;
	padding: 28px 22px;
	text-align: center;
	box-shadow: 0 16px 40px rgba(0, 42, 56, 0.18);
}

.ep-about-cta__kicker {
	display: inline-flex;
	margin-bottom: 12px;
	padding: 6px 14px;
	border-radius: 999px;
	border: 1px solid rgba(255, 255, 255, 0.22);
	background: rgba(255, 255, 255, 0.08);
	color: #dff7ff;
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.04em;
	text-transform: uppercase;
}

.ep-about-cta h2 {
	margin: 0 0 12px;
	font-size: clamp(1.25rem, 1.1rem + 0.9vw, 1.75rem);
	line-height: 1.25;
	color: #fff;
	font-weight: 700;
}

.ep-about-cta p {
	margin: 0 auto 22px;
	max-width: 46rem;
	color: rgba(255, 255, 255, 0.9);
	font-size: 1rem;
	line-height: 1.7;
}

.ep-about-cta__actions {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	gap: 14px;
}

.ep-about-btn {
	display: inline-block;
	background: #01465d;
	color: #fff;
	padding: 10px 18px;
	border-radius: 8px;
	font-weight: 700;
	text-decoration: none;
}

.ep-about-btn.ep-about-cta__primary {
	background: #fff;
	color: #002a38;
	padding: 12px 22px;
	font-size: 15px;
}

.ep-about-cta__secondary {
	color: #fff;
	text-decoration: none;
	font-weight: 600;
	font-size: 15px;
	border-bottom: 1px solid rgba(255, 255, 255, 0.45);
}

.ep-about-page .clients-section,
.ep-about-page #testimonials {
	background: #fff;
}

@media (min-width: 641px) {
	.ep-about-card {
		padding: 28px 24px;
	}

	.ep-about-grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}

	.ep-about-security__trust {
		flex-direction: row;
		align-items: center;
		flex-wrap: wrap;
		gap: 16px;
	}
}

@media (min-width: 992px) {
	.ep-about-grid {
		grid-template-columns: repeat(3, minmax(0, 1fr));
	}
}

@media (max-width: 575.98px) {
	.ep-stats-cards {
		grid-template-columns: 1fr;
	}
}
