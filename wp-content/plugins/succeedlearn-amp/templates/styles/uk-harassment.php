<?php
/**
 * UK Sexual Harassment Prevention Training — AMP page styles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* Page tokens */
.sl-uk-harassment-page {
	--sl-page-navy: #16234e;
	--sl-page-primary: #1472ba;
	--sl-page-primary-dark: #283384;
	--sl-page-primary-soft: rgba(109, 195, 235, 0.16);
	--sl-page-cta: #ea3e24;
	--sl-page-text: #4A4A4A;
	--sl-page-muted: #6B7C93;
	--sl-page-bg: #f5f5f5;
	--sl-page-white: #fff;
	--sl-heading-accent: #1472ba;
	color: var(--sl-page-text);
	background: var(--sl-page-white);
}

.sl-uk-harassment-page h1,
.sl-uk-harassment-page h2 {
	color: var(--sl-page-navy);
}

.sl-uk-harassment-page h1 span,
.sl-uk-harassment-page .sl-h2 span,
.sl-uk-harassment-page h2 > span {
	color: var(--sl-page-primary);
}

.sl-uk-harassment-page .sl-home-sub-heading,
.sl-uk-harassment-page .sl-eyebrow {
	color: var(--sl-page-primary);
}

.sl-uk-harassment-page .sl-lead,
.sl-uk-harassment-page p {
	color: var(--sl-page-text);
	line-height: 1.7;
}

.sl-uk-harassment-page .sl-section {
	padding: 56px 16px;
}

.sl-uk-harassment-page .sl-section--alt {
	background: var(--sl-page-bg);
}

/* Shared media placeholder */
.sl-uk-harassment-page .sl-uk-harassment-media-placeholder,
.sl-uk-harassment-page .sl-uk-harassment-hero__image-placeholder {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	min-height: 220px;
	padding: 24px;
	overflow: hidden;
	border: 1px dashed rgba(20, 114, 186, 0.28);
	border-radius: 14px;
	background: var(--sl-page-bg);
	color: var(--sl-page-muted);
	text-align: center;
	box-sizing: border-box;
}

.sl-uk-harassment-page [class*="__image"] {
	overflow: hidden;
	border-radius: 14px;
	background: var(--sl-page-bg);
}

.sl-uk-harassment-page [class*="__image"] amp-img,
.sl-uk-harassment-page [class*="__media"] amp-img {
	display: block;
	width: 100%;
}

.sl-uk-harassment-page [class*="__image"] amp-img img,
.sl-uk-harassment-page [class*="__media"] amp-img img {
	object-fit: cover;
	object-position: center;
}

/* Shared numbered list (soft blue chips) */
.sl-uk-harassment-page .sl-uk-harassment-numbered-list {
	display: flex;
	flex-direction: column;
	gap: 12px;
	margin: 24px 0;
	padding: 0;
	list-style: none;
}

.sl-uk-harassment-page .sl-uk-harassment-numbered-list__item {
	display: block;
	margin: 0;
	padding: 16px 18px;
	border: 1px solid rgba(22, 35, 78, 0.10);
	border-radius: 10px;
	background: var(--sl-page-bg);
	box-sizing: border-box;
}

.sl-uk-harassment-page .sl-section--alt .sl-uk-harassment-numbered-list__item,
.sl-uk-harassment-page .sl-uk-harassment-prevention .sl-uk-harassment-numbered-list__item {
	background: var(--sl-page-white);
}

.sl-uk-harassment-page .sl-uk-harassment-numbered-list__text {
	display: block;
	color: var(--sl-page-text);
	line-height: 1.55;
}

.sl-uk-harassment-page .sl-uk-harassment-numbered-list__text strong {
	color: var(--sl-page-navy);
}

/* Plain bullet lists */
.sl-uk-harassment-page .sl-uk-harassment-bullets {
	margin: 20px 0;
	padding-left: 22px;
	list-style: disc;
}

.sl-uk-harassment-page .sl-uk-harassment-bullets li {
	margin: 0 0 8px;
	padding: 0;
	color: var(--sl-page-text);
	font-size: 16px;
	line-height: 1.7;
	list-style: disc;
}

.sl-uk-harassment-page .sl-uk-harassment-bullets li:last-child {
	margin-bottom: 0;
}

.sl-uk-harassment-page .sl-uk-harassment-bullets li::marker {
	color: var(--sl-page-primary);
}

/* Customisation list: two per row on wider screens */
@media (min-width: 600px) {
	.sl-uk-harassment-page .sl-uk-harassment-customisation .sl-list--2up {
		display: grid;
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 12px;
	}

	.sl-uk-harassment-page .sl-uk-harassment-customisation .sl-list--2up .sl-list-item {
		margin: 0;
	}
}

/* Intro accent spans */
.sl-uk-harassment-page .sl-uk-harassment-action__intro,
.sl-uk-harassment-page .sl-uk-harassment-prevention__intro-span,
.sl-uk-harassment-page .sl-uk-harassment-learning__intro,
.sl-uk-harassment-page .sl-uk-harassment-coverage__intro,
.sl-uk-harassment-page .sl-uk-harassment-customisation__intro {
	display: block;
	margin: 0 0 14px;
	color: var(--sl-page-primary);
	font-weight: 600;
	line-height: 1.5;
}

/* Stacked section grids: text first, image below */
.sl-uk-harassment-page .sl-uk-harassment-hero__grid,
.sl-uk-harassment-page .sl-uk-harassment-action__grid,
.sl-uk-harassment-page .sl-uk-harassment-prevention__grid,
.sl-uk-harassment-page .sl-uk-harassment-learning__grid,
.sl-uk-harassment-page .sl-uk-harassment-coverage__grid,
.sl-uk-harassment-page .sl-uk-harassment-settings__grid,
.sl-uk-harassment-page .sl-uk-harassment-customisation__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 28px;
	align-items: start;
}

.sl-uk-harassment-page .sl-uk-harassment-hero__content,
.sl-uk-harassment-page .sl-uk-harassment-hero__media,
.sl-uk-harassment-page .sl-uk-harassment-action__content,
.sl-uk-harassment-page .sl-uk-harassment-action__media,
.sl-uk-harassment-page .sl-uk-harassment-prevention__content,
.sl-uk-harassment-page .sl-uk-harassment-prevention__media,
.sl-uk-harassment-page .sl-uk-harassment-learning__content,
.sl-uk-harassment-page .sl-uk-harassment-learning__media,
.sl-uk-harassment-page .sl-uk-harassment-coverage__content,
.sl-uk-harassment-page .sl-uk-harassment-coverage__media,
.sl-uk-harassment-page .sl-uk-harassment-settings__content,
.sl-uk-harassment-page .sl-uk-harassment-settings__media,
.sl-uk-harassment-page .sl-uk-harassment-customisation__content,
.sl-uk-harassment-page .sl-uk-harassment-customisation__media {
	min-width: 0;
	width: 100%;
}

/* Hero */
.sl-uk-harassment-page .sl-uk-harassment-hero.sl-section {
	padding-top: 56px;
	padding-bottom: 56px;
	background: var(--sl-page-white);
}

.sl-uk-harassment-page .sl-uk-harassment-hero h1 {
	margin: 0 0 14px;
	font-size: var(--sl-fs-hero-h1, clamp(32px, 6vw, 48px));
	font-weight: 700;
	line-height: 1.14;
}

.sl-uk-harassment-page .sl-uk-harassment-hero__tagline {
	margin: 0 0 18px;
	font-size: var(--sl-fs-hero-h2, 32px);
	font-weight: 700;
	line-height: 1.25;
	color: var(--sl-page-navy);
}

.sl-uk-harassment-page .sl-uk-harassment-hero__copy p {
	margin: 0 0 14px;
}

.sl-uk-harassment-page .sl-uk-harassment-hero__copy p:last-child {
	margin-bottom: 0;
}

.sl-uk-harassment-page .sl-uk-harassment-hero .sl-hero-actions {
	display: flex;
	flex-direction: column;
	align-items: stretch;
	gap: 12px;
	margin-top: 26px;
}

.sl-uk-harassment-page .sl-uk-harassment-hero .sl-hero-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 10px;
	width: 100%;
	max-width: 100%;
	box-sizing: border-box;
}

/* Wide hero media (US / AML stacked pattern) */
.sl-uk-harassment-page .sl-uk-harassment-hero__media {
	width: 100%;
	margin: 28px 0 0;
	min-width: 0;
}

.sl-uk-harassment-page .sl-uk-harassment-hero__image,
.sl-uk-harassment-page .sl-uk-harassment-hero__image--wide {
	width: 100%;
	max-width: 100%;
	height: auto;
	min-height: 0;
	max-height: none;
	aspect-ratio: auto;
	margin: 0;
	overflow: hidden;
	border: 1px solid rgba(22, 35, 78, 0.1);
	border-radius: 14px;
	background: var(--sl-page-white);
	box-sizing: border-box;
}

.sl-uk-harassment-page .sl-uk-harassment-hero__image amp-img {
	display: block;
	width: 100%;
	max-width: none;
	height: auto;
}

.sl-uk-harassment-page .sl-uk-harassment-hero__image amp-img img {
	object-fit: cover;
	object-position: center;
}

/* Section body CTAs */
.sl-uk-harassment-page .sl-hero-actions,
.sl-uk-harassment-page .sl-content-actions {
	display: flex;
	flex-direction: column;
	align-items: stretch;
	gap: 12px;
	margin-top: 24px;
}

.sl-uk-harassment-page .sl-hero-btn,
.sl-uk-harassment-page .sl-content-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 10px;
	width: 100%;
	max-width: 100%;
	box-sizing: border-box;
}

/* Prevention intro block */
.sl-uk-harassment-page .sl-uk-harassment-prevention__intro {
	margin-bottom: 28px;
}

.sl-uk-harassment-page .sl-uk-harassment-prevention__intro p,
.sl-uk-harassment-page .sl-uk-harassment-prevention__content > p,
.sl-uk-harassment-page .sl-uk-harassment-action__content > p,
.sl-uk-harassment-page .sl-uk-harassment-learning__content > p,
.sl-uk-harassment-page .sl-uk-harassment-coverage__content > p,
.sl-uk-harassment-page .sl-uk-harassment-settings__content > p,
.sl-uk-harassment-page .sl-uk-harassment-customisation__content > p {
	margin: 0 0 16px;
}

.sl-uk-harassment-page .sl-panel-title {
	margin: 8px 0 0;
	color: var(--sl-page-navy);
}

.sl-uk-harassment-page .sl-uk-harassment-coverage__closing,
.sl-uk-harassment-page .sl-uk-harassment-settings__closing {
	margin-top: 8px;
}

/* Customisation list spacing */
.sl-uk-harassment-page .sl-uk-harassment-customisation .sl-list {
	margin: 20px 0;
}

/* FAQ */
.sl-uk-harassment-page .sl-uk-harassment-faq .sl-lead {
	margin: 0 0 28px;
	max-width: 62ch;
}

/* Contact (GWCT pattern, page-scoped) */
.sl-uk-harassment-page .sl-contact-layout {
	display: grid;
	gap: 28px;
	align-items: start;
}

.sl-uk-harassment-page .sl-contact-intro {
	margin: 0;
}

.sl-uk-harassment-page .sl-uk-harassment-contact__copy p {
	margin: 0 0 14px;
}

.sl-uk-harassment-page .sl-contact-form-card {
	max-width: none;
	margin: 0;
	padding: 26px 22px;
	border: 1px solid rgba(107, 124, 147, 0.22);
	border-radius: 18px;
	background: var(--sl-page-white);
	box-shadow: 0 22px 55px rgba(22, 35, 78, 0.08);
	box-sizing: border-box;
}

.sl-uk-harassment-page .sl-gwct-contact-direct {
	margin-top: 16px;
	max-width: 100%;
}

.sl-uk-harassment-page .sl-gwct-contact-direct__label {
	margin: 0 0 12px;
	color: var(--sl-page-muted);
	font-size: 14px;
	font-weight: 500;
	line-height: 1.5;
}

.sl-uk-harassment-page .sl-gwct-contact-direct__grid {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 12px;
	width: 100%;
	max-width: 100%;
	box-sizing: border-box;
}

.sl-uk-harassment-page .sl-gwct-contact-direct__item,
.sl-uk-harassment-page .sl-gwct-contact__whatsapp {
	display: flex;
	align-items: center;
	gap: 12px;
	width: 100%;
	max-width: 100%;
	min-width: 0;
	min-height: 64px;
	padding: 14px 16px;
	border-radius: 14px;
	text-decoration: none;
	box-sizing: border-box;
}

.sl-uk-harassment-page .sl-gwct-contact-direct__item {
	border: 1px solid rgba(20, 114, 186, 0.16);
	background: var(--sl-page-white);
	color: inherit;
	box-shadow: 0 6px 18px rgba(31, 44, 86, 0.04);
}

.sl-uk-harassment-page .sl-gwct-contact-direct__icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 auto;
	width: 40px;
	height: 40px;
	border-radius: 12px;
	border: 1px solid rgba(20, 114, 186, 0.12);
	background: #fff;
	color: var(--sl-page-primary);
}

.sl-uk-harassment-page .sl-gwct-contact-direct__icon svg {
	display: block;
	width: 18px;
	height: 18px;
}

.sl-uk-harassment-page .sl-gwct-contact-direct__body,
.sl-uk-harassment-page .sl-gwct-contact__whatsapp-text {
	display: flex;
	flex-direction: column;
	align-items: flex-start;
	gap: 2px;
	min-width: 0;
	text-align: left;
}

.sl-uk-harassment-page .sl-gwct-contact-direct__title {
	color: var(--sl-page-navy);
	font-size: 12px;
	font-weight: 600;
	line-height: 1.35;
	text-transform: uppercase;
	letter-spacing: 0.04em;
}

.sl-uk-harassment-page .sl-gwct-contact-direct__value {
	color: var(--sl-page-primary);
	font-size: 15px;
	font-weight: 600;
	line-height: 1.45;
	word-break: break-word;
}

.sl-uk-harassment-page .sl-gwct-contact__whatsapp {
	background: #25d366;
	border: 0;
	color: #fff;
	box-shadow: 0 12px 28px rgba(37, 211, 102, 0.28);
}

.sl-uk-harassment-page .sl-gwct-contact__whatsapp-icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex: 0 0 auto;
	width: 28px;
	height: 28px;
	color: #fff;
}

.sl-uk-harassment-page .sl-gwct-contact__whatsapp-icon svg {
	display: block;
	width: 22px;
	height: 22px;
}

.sl-uk-harassment-page .sl-gwct-contact__whatsapp-label {
	font-size: 16px;
	font-weight: 600;
	line-height: 1.2;
	opacity: 0.92;
	color: #fff;
}

.sl-uk-harassment-page .sl-gwct-contact__whatsapp-number {
	font-size: 16px;
	font-weight: 700;
	line-height: 1.25;
	letter-spacing: 0.01em;
	color: #fff;
}

/* Mobile: hero CTA full width only */
@media (max-width: 767px) {
	.sl-uk-harassment-page .sl-uk-harassment-hero .sl-hero-btn,
	.sl-uk-harassment-page .sl-hero-btn,
	.sl-uk-harassment-page .sl-content-btn {
		width: 100%;
		max-width: 100%;
		white-space: normal;
	}

	.sl-uk-harassment-page .sl-gwct-contact-direct__item,
	.sl-uk-harassment-page .sl-gwct-contact__whatsapp {
		min-height: 56px;
		padding: 13px 14px;
	}

	.sl-uk-harassment-page .sl-gwct-contact-direct__icon {
		width: 36px;
		height: 36px;
	}

	.sl-uk-harassment-page .sl-gwct-contact-direct__value,
	.sl-uk-harassment-page .sl-gwct-contact__whatsapp-number {
		font-size: 14px;
	}

	.sl-uk-harassment-page .sl-contact-form-card {
		padding: 22px 18px;
		border-radius: 16px;
	}
}

/* Tablet+ */
@media (min-width: 768px) {
	.sl-uk-harassment-page .sl-section {
		padding: 72px 24px;
	}

	/* Centered square images (max 450x450) so media does not span full tablet width */
	.sl-uk-harassment-page .sl-uk-harassment-hero__media,
	.sl-uk-harassment-page .sl-uk-harassment-action__media,
	.sl-uk-harassment-page .sl-uk-harassment-prevention__media,
	.sl-uk-harassment-page .sl-uk-harassment-learning__media,
	.sl-uk-harassment-page .sl-uk-harassment-coverage__media,
	.sl-uk-harassment-page .sl-uk-harassment-settings__media,
	.sl-uk-harassment-page .sl-uk-harassment-customisation__media {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		margin-left: auto;
		margin-right: auto;
	}

	.sl-uk-harassment-page .sl-uk-harassment-media-placeholder,
	.sl-uk-harassment-page .sl-uk-harassment-hero__image-placeholder,
	.sl-uk-harassment-page [class*="__image"] {
		width: 100%;
		max-width: 450px;
		height: auto;
		min-height: 0;
		max-height: 450px;
		aspect-ratio: 1 / 1;
		margin-left: auto;
		margin-right: auto;
		box-sizing: border-box;
	}

	.sl-uk-harassment-page [class*="__media"] amp-img,
	.sl-uk-harassment-page [class*="__image"] amp-img {
		display: block;
		width: 100%;
		max-width: 450px;
		margin-left: auto;
		margin-right: auto;
	}

	.sl-uk-harassment-page [class*="__media"] amp-img img,
	.sl-uk-harassment-page [class*="__image"] amp-img img {
		object-fit: cover;
		object-position: center;
	}

	/* Hero stays full section width (not the 450px section-media cap) */
	.sl-uk-harassment-page .sl-uk-harassment-hero__media {
		display: block;
		justify-content: initial;
		align-items: initial;
		width: 100%;
		margin: 8px 0 22px;
	}

	.sl-uk-harassment-page .sl-uk-harassment-hero__image,
	.sl-uk-harassment-page .sl-uk-harassment-hero__image--wide {
		max-width: 100%;
		max-height: none;
		aspect-ratio: auto;
		margin: 0;
	}

	.sl-uk-harassment-page .sl-uk-harassment-hero__image amp-img {
		max-width: none;
	}

	.sl-uk-harassment-page .sl-uk-harassment-hero .sl-hero-actions,
	.sl-uk-harassment-page .sl-hero-actions,
	.sl-uk-harassment-page .sl-content-actions {
		flex-direction: row;
		flex-wrap: wrap;
		align-items: center;
		justify-content: flex-start;
	}

	.sl-uk-harassment-page .sl-uk-harassment-hero .sl-hero-btn,
	.sl-uk-harassment-page .sl-hero-btn,
	.sl-uk-harassment-page .sl-content-btn {
		flex: 0 0 auto;
		width: fit-content;
		max-width: none;
		white-space: nowrap;
	}

	.sl-uk-harassment-page .sl-gwct-contact-direct__grid {
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
		gap: 12px;
	}
}

@media (min-width: 992px) {
	.sl-uk-harassment-page .sl-section {
		padding: 88px 16px;
	}

	/* Keep 450px square cap on desktop too (hero excluded) */
	.sl-uk-harassment-page .sl-uk-harassment-media-placeholder,
	.sl-uk-harassment-page .sl-uk-harassment-hero__image-placeholder,
	.sl-uk-harassment-page [class*="__image"] {
		max-width: 450px;
		max-height: 450px;
		aspect-ratio: 1 / 1;
		min-height: 0;
	}

	.sl-uk-harassment-page .sl-uk-harassment-hero__image,
	.sl-uk-harassment-page .sl-uk-harassment-hero__image--wide {
		max-width: 100%;
		max-height: none;
		aspect-ratio: auto;
	}

	.sl-uk-harassment-page .sl-contact-layout {
		grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
	}

	.sl-uk-harassment-page .sl-contact-form-card {
		padding: 32px;
		border-radius: 24px;
	}
}
