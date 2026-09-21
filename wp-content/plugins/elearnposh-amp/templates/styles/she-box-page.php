<?php
/**
 * SHe-Box Page — AMP styles (extends POSH Act layout).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.she-box-page .she-box-courses__title {
	margin-top: 0;
}

.she-box-page .pa-sidebar {
	top: calc(var(--pa-header-offset, 88px) + 1rem);
	align-self: start;
}

@media (min-width: 960px) {
	.she-box-page .pa-grid {
		align-items: start;
	}
}

.sb-feature {
	display: grid;
	grid-template-columns: 1fr;
	gap: 1.25rem;
	margin: 0.8rem 0 1rem;
	align-items: start;
}

.sb-feature__copy {
	min-width: 0;
}

.sb-feature-card {
	background: #fff;
	border: 1px solid var(--pa-line, #d9e6f6);
	border-radius: 12px;
	box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
	overflow: hidden;
}

.sb-feature-card__body {
	padding: 0.9rem 1rem 1rem;
}

.sb-feature-card__body h4 {
	margin: 0 0 0.5rem;
	font-size: 1.03rem;
	font-weight: 700;
	color: #1d334c;
	line-height: 1.35;
}

.sb-feature-card__body p {
	margin: 0 0 0.85rem;
	font-size: 0.92rem;
	line-height: 1.55;
	color: var(--pa-muted, #54708d);
}

.sb-feature-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	padding: 0.5rem 1rem;
	border-radius: 8px;
	background: #e8f2f5;
	color: #002a38;
	border: 1px solid rgba(0, 42, 56, 0.22);
	text-decoration: none;
	font-weight: 600;
	font-size: 0.9rem;
}

.sb-video-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 1.25rem;
	margin: 0.8rem 0 1.25rem;
}

.sb-video-card {
	background: #fff;
	border: 1px solid var(--pa-line, #d9e6f6);
	border-radius: 12px;
	overflow: hidden;
	box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
}

.sb-video-card__body {
	padding: 0.85rem 1rem 1rem;
}

.sb-state-list {
	display: grid;
	grid-template-columns: 1fr;
	gap: 0.85rem;
	margin: 1rem 0 1.25rem;
}

.sb-state-item {
	padding: 0.9rem 1rem;
	background: #f8fbff;
	border: 1px solid var(--pa-line, #d9e6f6);
	border-left: 4px solid var(--pa-blue, #0d73d4);
	border-radius: 0 10px 10px 0;
}

.sb-state-name {
	margin: 0 0 0.4rem;
	font-size: 1rem;
	font-weight: 700;
	line-height: 1.35;
	color: var(--pa-blue-dark, #0b4f93);
}

.sb-state-item .pa-p {
	margin: 0;
}

.she-box-course-grid {
	margin-top: 1rem;
	display: grid;
	grid-template-columns: repeat(1, minmax(0, 1fr));
	gap: 20px;
	align-items: start;
}

.she-box-course-grid .course-showcase__card {
	position: relative;
	display: flex;
	flex-direction: column;
	background: #fff;
	border: 1px solid #e2e8f0;
	border-radius: 16px;
	overflow: hidden;
	box-shadow: 0 10px 26px rgba(15, 23, 42, 0.1);
}

.she-box-course-grid .course-showcase__image {
	display: block;
	position: relative;
	background: linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
	aspect-ratio: 16 / 10;
	overflow: hidden;
}

.she-box-course-grid .course-showcase__image amp-img {
	width: 100%;
	height: 100%;
}

.she-box-course-grid .course-showcase__category {
	position: absolute;
	top: 12px;
	left: 12px;
	z-index: 2;
	display: inline-block;
	padding: 6px 12px;
	border-radius: 8px;
	font-size: 0.78rem;
	font-weight: 700;
	line-height: 1.2;
	box-shadow: 0 4px 14px rgba(15, 23, 42, 0.18);
	pointer-events: none;
}

.she-box-course-grid .course-showcase__category--posh {
	background: #ede9fe;
	color: #5b21b6;
}

.she-box-course-grid .course-showcase__body {
	display: flex;
	flex-direction: column;
	padding: 12px 16px 14px;
}

.she-box-course-grid .course-showcase__body h3 {
	font-size: 1.08rem;
	font-weight: 700;
	margin: 0 0 4px;
	line-height: 1.25;
	color: #0f172a;
}

.she-box-course-grid .course-showcase__desc {
	margin: 0 0 10px;
	font-size: 14px;
	line-height: 1.55;
	color: #475569;
}

.she-box-course-grid .course-showcase__cta {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	border-radius: 8px;
	background: #e8f2f5;
	color: #002a38;
	border: 1px solid rgba(0, 42, 56, 0.22);
	text-decoration: none;
	font-weight: 600;
	font-size: 14px;
	padding: 10px 14px;
}

@media (min-width: 641px) {
	.sb-video-grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}

	.sb-state-list {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}

	.she-box-course-grid {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
}

/* Tablet: intro copy inline with card, card centered beside text */
@media (min-width: 641px) and (max-width: 959px) {
	.sb-feature {
		grid-template-columns: minmax(0, 1fr) minmax(0, 300px);
		align-items: center;
		gap: 1.5rem;
		max-width: 860px;
		margin-inline: auto;
	}

	.sb-feature-card {
		justify-self: center;
		width: 100%;
		max-width: 300px;
	}
}

@media (min-width: 960px) {
	.sb-feature {
		grid-template-columns: 1.2fr 0.8fr;
		align-items: start;
	}
}

@media (min-width: 992px) {
	.she-box-course-grid {
		grid-template-columns: repeat(3, minmax(0, 1fr));
	}
}

@media (max-width: 640px) {
	.sb-video-grid {
		grid-template-columns: 1fr;
	}

	.sb-feature {
		grid-template-columns: 1fr;
		align-items: start;
	}

	.sb-feature-card {
		max-width: min(400px, 100%);
		margin-inline: auto;
	}
}
