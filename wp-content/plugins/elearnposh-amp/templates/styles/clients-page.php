<?php
/**
 * Clients List Page Styles
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* Clients list page */
body {
	font-family: "Nunito Sans", Arial, sans-serif;
	margin: 0;
	padding: 0;
	padding-top: 100px !important;
	background: #f8fafc;
	color: #0f172a;
}

a {
	text-decoration: none;
	color: inherit;
}

.clients-page-container {
	max-width: 1180px;
	margin: 0 auto;
	padding: 22px 16px 32px;
}

.clients-page-hero {
	margin-bottom: 4px;
}

.clients-page-title {
	margin: 0 0 8px;
	text-align: left;
	font-weight: 800;
	font-size: clamp(1.35rem, 1.05rem + 1.4vw, 2rem);
	color: #002a38;
	line-height: 1.25;
}

.clients-page-subtitle {
	margin: 0;
	text-align: left;
	max-width: 46rem;
	font-size: 15px;
	line-height: 1.6;
}

.ep-clients-nav {
	display: flex;
	flex-wrap: wrap;
	gap: 8px;
	margin: 0;
	padding: 18px 0;
	position: sticky;
	top: 74px;
	z-index: 40;
	background: #f8fafc;
	border-bottom: 1px solid #e2e8f0;
}

.ep-clients-nav__chip {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	padding: 8px 14px;
	border-radius: 999px;
	background: #fff;
	border: 1px solid #cadff5;
	color: #0f5a94;
	font-size: 13px;
	font-weight: 700;
}

.ep-clients-category {
	padding: 24px 0 8px;
	scroll-margin-top: calc(74px + 72px);
}

.ep-clients-category__head {
	margin-bottom: 14px;
}

.ep-clients-category__title {
	margin: 0 0 6px;
	font-size: clamp(1.1rem, 0.95rem + 0.7vw, 1.45rem);
	line-height: 1.3;
	color: #0d2238;
	font-weight: 600;
}

.ep-clients-category__desc {
	margin: 0;
	max-width: 42rem;
	font-size: 14px;
	line-height: 1.6;
	color: #64748b;
}

.ep-clients-category__empty {
	margin: 0;
	padding: 18px 16px;
	background: #fff;
	border: 1px dashed #c8dbee;
	border-radius: 12px;
	text-align: center;
	color: #54708d;
}

.ep-clients-grid {
	display: grid !important;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 14px;
}

.ep-clients-logo {
	display: flex !important;
	align-items: center;
	justify-content: center;
	background: #fff;
	border-radius: 12px;
	box-shadow: 0 2px 10px rgba(15, 23, 42, 0.07);
	padding: 12px;
	min-height: 96px;
	border: 1px solid rgba(226, 232, 240, 0.9);
}

.ep-clients-logo amp-img {
	width: 150px;
	height: 72px;
}

.ep-clients-logo amp-img img {
	object-fit: contain;
}

/* CL_Shapoorji Pallonji.webp has heavy canvas padding; boost visible mark. */
.ep-clients-logo amp-img[alt="Shapoorji Pallonji"] img {
	transform: scale(1.65);
}

@media (min-width: 641px) and (max-width: 1024px) {
	.ep-clients-grid {
		grid-template-columns: repeat(4, minmax(0, 1fr));
		gap: 16px;
	}

	.ep-clients-logo amp-img {
		width: 140px;
		height: 68px;
	}
}

@media (min-width: 1025px) {
	.ep-clients-grid {
		grid-template-columns: repeat(6, minmax(0, 1fr));
		gap: 18px;
	}
}

@media (max-width: 640px) {
	.ep-clients-nav {
		top: 64px;
		padding: 14px 0;
	}

	.ep-clients-category {
		scroll-margin-top: calc(64px + 64px);
	}
}
