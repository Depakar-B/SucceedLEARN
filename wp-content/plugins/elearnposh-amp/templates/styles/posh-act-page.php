<?php
/**
 * POSH Act Page — AMP styles (responsive design system).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* ── Design tokens ── */
.posh-act-page {
	--pa-blue: #0d73d4;
	--pa-blue-dark: #0b4f93;
	--pa-blue-soft: #eef5ff;
	--pa-blue-mid: #c9e1fb;
	--pa-ink: #0d2238;
	--pa-ink-soft: #1d334c;
	--pa-muted: #54708d;
	--pa-line: #d9e6f6;
	--pa-surface: #ffffff;
	--pa-bg: #f6f9fd;
	--pa-radius: 12px;
	--pa-radius-sm: 8px;
	--pa-shadow: 0 8px 24px rgba(11, 35, 58, 0.07);
	--pa-header: var(--pa-header-offset, 88px);
	--pa-scroll-offset: calc(var(--pa-header-offset, 88px) + 1rem);
	--pa-space-xs: 0.5rem;
	--pa-space-sm: 0.75rem;
	--pa-space-md: 1rem;
	--pa-space-lg: 1.5rem;
	--pa-space-xl: 2rem;
	--pa-space-2xl: 2.5rem;
	--pa-wrap: min(1180px, 100% - 2rem);
	font-family: "Nunito Sans", "Segoe UI", Roboto, Arial, sans-serif;
	color: var(--pa-ink);
	background: var(--pa-bg);
	padding: 32px 0 var(--pa-space-2xl);
}

.posh-act-page *,
.posh-act-page *::before,
.posh-act-page *::after {
	box-sizing: border-box;
}

/* ── Shell / layout ── */
.pa-wrap {
	width: var(--pa-wrap);
	max-width: 100%;
	margin: 0 auto;
	padding: 0;
}

.pa-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: var(--pa-space-lg);
	align-items: start;
}

.pa-main {
	min-width: 0;
}

.pa-sidebar {
	display: none;
}

.pa-mobile-nav,
.posh-act-page .posh-act-mobile-nav {
	margin-bottom: var(--pa-space-lg);
}

/* ── Hero ── */
.pa-hero {
	position: static;
	background: var(--pa-surface);
	border: 1px solid var(--pa-line);
	border-radius: var(--pa-radius);
	padding: clamp(1.1rem, 3vw, 1.75rem);
	margin: 0 0 var(--pa-space-lg);
	box-shadow: var(--pa-shadow);
}

.pa-hero__kicker {
	display: inline-block;
	margin: 0 0 var(--pa-space-sm);
	padding: 0.3rem 0.7rem;
	font-size: 0.78rem;
	font-weight: 700;
	color: var(--pa-blue);
	background: var(--pa-blue-soft);
	border: 1px solid var(--pa-blue-mid);
	border-radius: 999px;
	line-height: 1.3;
}

.pa-hero__title {
	margin: 0;
	color: var(--pa-ink-soft);
	font-size: clamp(1.35rem, 4vw, 2rem);
	font-weight: 800;
	line-height: 1.25;
	letter-spacing: -0.02em;
}

.pa-hero__sub {
	margin: var(--pa-space-sm) 0 0;
	color: var(--pa-muted);
	font-size: clamp(0.92rem, 2.2vw, 1.05rem);
	line-height: 1.6;
}

.pa-hero__sub + .pa-hero__sub {
	margin-top: 0.5rem;
}

.pa-hero__cta {
	margin-top: var(--pa-space-md);
	padding-top: var(--pa-space-md);
	border-top: 1px solid var(--pa-line);
}

.pa-hero__cta-text {
	margin: 0 0 var(--pa-space-sm);
	font-size: 0.95rem;
	font-weight: 600;
	color: var(--pa-ink-soft);
}

.pa-hero__actions {
	display: flex;
	flex-wrap: wrap;
	gap: var(--pa-space-sm);
}

.pa-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	padding: 0.65rem 1.25rem;
	border-radius: 999px;
	font-size: 0.92rem;
	font-weight: 700;
	text-decoration: none;
	line-height: 1.2;
	white-space: nowrap;
}

.pa-btn--primary {
	background: linear-gradient(135deg, var(--pa-blue) 0%, #2f90ef 100%);
	color: #fff;
	border: 1px solid #1e81df;
	box-shadow: 0 4px 14px rgba(13, 115, 212, 0.22);
}

.pa-btn--secondary {
	background: #111;
	color: #fff;
	border: 1px solid #111;
}

/* ── Article card ── */
.pa-article {
	background: var(--pa-surface);
	border: 1px solid var(--pa-line);
	border-radius: var(--pa-radius);
	padding: clamp(1rem, 2.5vw, 1.5rem);
	box-shadow: var(--pa-shadow);
}

.pa-section + .pa-section {
	margin-top: var(--pa-space-xl);
	padding-top: var(--pa-space-xl);
	border-top: 1px solid var(--pa-line);
}

/* ── Typography ── */
.pa-h2,
.posh-act-page h2.main-title-text {
	margin: var(--pa-space-xl) 0 var(--pa-space-md);
	padding: var(--pa-space-sm) var(--pa-space-md);
	background: linear-gradient(90deg, var(--pa-blue-soft) 0%, transparent 100%);
	border-left: 4px solid var(--pa-blue);
	border-radius: 0 var(--pa-radius-sm) var(--pa-radius-sm) 0;
	color: var(--pa-blue-dark);
	font-size: clamp(1.15rem, 2.8vw, 1.45rem);
	font-weight: 800;
	line-height: 1.35;
	scroll-margin-top: var(--pa-scroll-offset);
}

.pa-h2:first-child,
.posh-act-page .pa-section > .pa-h2:first-child,
.posh-act-page .pa-section > h2:first-child {
	margin-top: 0;
}

.pa-h3,
.posh-act-page h3.sublevel-title-text {
	margin: var(--pa-space-lg) 0 var(--pa-space-sm);
	color: var(--pa-blue);
	font-size: clamp(1.02rem, 2.4vw, 1.2rem);
	font-weight: 700;
	line-height: 1.4;
	scroll-margin-top: var(--pa-scroll-offset);
}

.pa-h4,
.posh-act-page h4.deeplevel-title-text {
	margin: var(--pa-space-md) 0 var(--pa-space-sm);
	color: var(--pa-ink-soft);
	font-size: clamp(0.98rem, 2.2vw, 1.08rem);
	font-weight: 700;
	line-height: 1.4;
	scroll-margin-top: calc(var(--pa-header) + 16px);
}

.pa-p,
.posh-act-page p.content-property {
	margin: 0 0 var(--pa-space-md);
	font-size: 1rem;
	line-height: 1.7;
	color: var(--pa-ink);
}

.pa-lead,
.posh-act-page p.less-priority-title {
	margin: 0 0 var(--pa-space-sm);
	font-size: 0.98rem;
	font-weight: 600;
	line-height: 1.6;
	color: var(--pa-muted);
}

.posh-act-page b.pa-emphasis,
.posh-act-page .pa-emphasis {
	color: var(--pa-blue-dark);
	font-weight: 700;
}

/* ── Lists (no extra left padding) ── */
.pa-list,
.posh-act-page ul.list,
.posh-act-page ul.pa-list {
	list-style: none;
	margin: 0 0 var(--pa-space-md);
	padding: 0;
}

.pa-list > li,
.posh-act-page ul.list > li,
.posh-act-page ul.pa-list > li,
.posh-act-page li.pa-list-item {
	display: flex;
	align-items: flex-start;
	gap: 0.55rem;
	margin: 0;
	padding: 0.35rem 0;
	font-size: 1rem;
	line-height: 1.65;
	color: var(--pa-ink);
}

.pa-list > li::before,
.posh-act-page ul.list > li::before,
.posh-act-page ul.pa-list > li::before,
.posh-act-page li.pa-list-item::before {
	content: "";
	flex: 0 0 6px;
	width: 6px;
	height: 6px;
	margin-top: 0.55em;
	border-radius: 50%;
	background: var(--pa-blue);
}

.pa-state-entry {
	display: flex;
	flex-direction: column;
	gap: 0.2rem;
	flex: 1;
	min-width: 0;
}

.posh-act-page .pa-bullet,
.posh-act-page span.pa-bullet {
	display: none;
}

/* ── Dividers & callouts ── */
.pa-divider,
.posh-act-page hr.horizontal-line {
	border: 0;
	height: 1px;
	margin: var(--pa-space-lg) 0;
	background: var(--pa-line);
}

.pa-section > .pa-divider:last-child,
.posh-act-page .pa-section > hr.horizontal-line:last-child {
	display: none;
}

.pa-section > .pa-divider + .pa-divider,
.posh-act-page .pa-section > hr.horizontal-line + hr.horizontal-line {
	display: none;
}

/* ── In-section FAQ accordion (Complaining Procedure) ── */
#poshact-complaint-faq-accordion.pa-faq-accordion {
	display: block;
	margin: var(--pa-space-md) 0;
	border: none;
	counter-reset: pa-faq-sno;
}

#poshact-complaint-faq-accordion.pa-faq-accordion > section {
	counter-increment: pa-faq-sno;
	border: 1px solid #d9e6f6;
	border-radius: var(--pa-radius-sm);
	margin-bottom: 0.7rem;
	overflow: hidden;
	background: #f8fbff;
	transition: box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1),
		border-color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

#poshact-complaint-faq-accordion.pa-faq-accordion > section:last-child {
	margin-bottom: 0;
}

#poshact-complaint-faq-accordion.pa-faq-accordion > section[expanded] {
	border-color: #b8d4f5;
	box-shadow: 0 4px 14px rgba(13, 115, 212, 0.1);
}

#poshact-complaint-faq-accordion.pa-faq-accordion > section > :first-child {
	background: transparent !important;
	border: none !important;
	text-align: left !important;
}

#poshact-complaint-faq-accordion .pa-faq-q {
	margin: 0;
	padding: 0.8rem 2.4rem 0.8rem 0.9rem;
	font-size: 0.95rem;
	font-weight: 500;
	line-height: 1.5;
	color: #1d334c;
	background: transparent;
	border: none;
	position: relative;
	scroll-margin-top: var(--pa-scroll-offset);
	display: flex;
	align-items: flex-start;
	gap: 0.65rem;
	text-align: left;
	transition: background-color 0.5s cubic-bezier(0.4, 0, 0.2, 1),
		color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

#poshact-complaint-faq-accordion .pa-faq-q-text {
	flex: 1;
	min-width: 0;
	font-size: inherit;
	font-weight: inherit;
	line-height: inherit;
	color: inherit;
	text-align: left;
}

#poshact-complaint-faq-accordion.pa-faq-accordion > section[expanded] .pa-faq-q::before {
	background: var(--pa-blue);
	color: #fff;
	transition: background-color 0.5s cubic-bezier(0.4, 0, 0.2, 1),
		color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

#poshact-complaint-faq-accordion .pa-faq-q::before {
	content: counter(pa-faq-sno, decimal-leading-zero);
	flex: 0 0 1.75rem;
	width: 1.75rem;
	height: 1.75rem;
	border-radius: 50%;
	background: var(--pa-blue-soft);
	color: var(--pa-blue);
	font-size: 0.72rem;
	font-weight: 800;
	line-height: 1;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	margin-top: 0.05rem;
	transition: background-color 0.5s cubic-bezier(0.4, 0, 0.2, 1),
		color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

#poshact-complaint-faq-accordion .pa-faq-q-arrow {
	flex: 0 0 auto;
	margin-left: auto;
	align-self: center;
	font-size: 1.1rem;
	font-weight: 700;
	line-height: 1;
	color: var(--pa-blue);
	transform: rotate(0deg);
	transform-origin: center;
	transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1),
		color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
	will-change: transform;
}

#poshact-complaint-faq-accordion .pa-faq-q::after {
	display: none;
	content: none;
}

#poshact-complaint-faq-accordion.pa-faq-accordion > section[expanded] .pa-faq-q {
	color: var(--pa-blue-dark);
	background: linear-gradient(180deg, #eaf4ff 0%, #f8fbff 100%);
}

#poshact-complaint-faq-accordion.pa-faq-accordion > section[expanded] .pa-faq-q-arrow {
	transform: rotate(180deg);
}

#poshact-complaint-faq-accordion .pa-faq-a {
	padding: 0 1rem 1rem;
	border-top: 1px solid #e3edf9;
	background: #fff;
}

#poshact-complaint-faq-accordion .pa-faq-a .pa-p {
	margin: 0.75rem 0 0;
	font-size: 0.95rem;
	line-height: 1.65;
	color: var(--pa-ink);
}

.pa-callout,
.posh-act-page .highlighter-box {
	margin: var(--pa-space-md) 0;
	padding: var(--pa-space-md);
	background: linear-gradient(135deg, var(--pa-blue-dark) 0%, #1472ba 100%);
	border-radius: var(--pa-radius-sm);
	color: #fff;
}

.posh-act-page .pa-callout .text-white,
.posh-act-page .highlighter-box .text-white {
	color: #fff;
}

.pa-callout p,
.posh-act-page .highlighter-box p,
.posh-act-page .pa-callout p.content-property,
.posh-act-page .pa-callout p.text-white,
.posh-act-page .highlighter-box p.content-property {
	margin: 0 0 var(--pa-space-sm);
	color: #fff;
	line-height: 1.6;
}

.pa-callout p:last-child,
.posh-act-page .highlighter-box p:last-child {
	margin-bottom: 0;
}

.pa-callout .h4,
.posh-act-page .highlighter-box .h4 {
	margin: 0 0 var(--pa-space-sm);
	font-size: 1.05rem;
	font-weight: 700;
	color: #fff;
}

.pa-callout .pa-list,
.posh-act-page .highlighter-box .pa-list {
	margin-bottom: 0;
}

.pa-callout .pa-list > li,
.posh-act-page .pa-callout ul.pa-list > li,
.posh-act-page .highlighter-box .pa-list > li,
.posh-act-page .highlighter-box ul.pa-list > li,
.pa-callout .pa-list > li strong,
.posh-act-page .highlighter-box .pa-list > li strong {
	color: #fff;
}

.pa-callout .pa-list > li::before,
.posh-act-page .highlighter-box .pa-list > li::before {
	background: #fff;
}

/* ── SHe-Box guide promo card ── */
.pa-shebox-promo {
	display: flex;
	flex-direction: column;
	gap: var(--pa-space-md);
	margin: var(--pa-space-lg) 0;
	padding: var(--pa-space-md) var(--pa-space-lg);
	background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 55%, #f8fbff 100%);
	border: 1px solid var(--pa-blue-mid);
	border-left: 4px solid var(--pa-blue);
	border-radius: var(--pa-radius);
	box-shadow: 0 6px 20px rgba(13, 115, 212, 0.08);
}

.pa-shebox-promo__content {
	min-width: 0;
}

.pa-shebox-promo__eyebrow {
	margin: 0 0 var(--pa-space-sm);
	font-size: 0.72rem;
	font-weight: 800;
	letter-spacing: 0.08em;
	text-transform: uppercase;
	color: var(--pa-blue);
}

.pa-shebox-promo__text {
	margin: 0 0 var(--pa-space-sm);
	font-size: 0.98rem;
	line-height: 1.65;
	color: var(--pa-ink-soft);
}

.pa-shebox-promo__topics {
	display: flex;
	flex-wrap: wrap;
	gap: 0.4rem;
	list-style: none;
	margin: 0;
	padding: 0;
}

.pa-shebox-promo__topics li {
	display: inline-flex;
	align-items: center;
	padding: 0.28rem 0.62rem;
	border-radius: 999px;
	border: 1px solid var(--pa-blue-mid);
	background: var(--pa-surface);
	color: var(--pa-muted);
	font-size: 0.76rem;
	font-weight: 600;
	line-height: 1.3;
}

.pa-shebox-promo__cta {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	align-self: flex-start;
	margin-top: var(--pa-space-md);
	padding: 0.65rem 1.2rem;
	border-radius: 999px;
	background: linear-gradient(135deg, var(--pa-blue) 0%, #2f90ef 100%);
	color: #fff;
	border: 1px solid #1e81df;
	box-shadow: 0 4px 14px rgba(13, 115, 212, 0.22);
	font-size: 0.9rem;
	font-weight: 700;
	line-height: 1.2;
	text-decoration: none;
	white-space: nowrap;
}

@media (max-width: 479px) {
	.pa-shebox-promo {
		padding: var(--pa-space-md);
	}

	.pa-shebox-promo__cta {
		width: 100%;
		white-space: normal;
		text-align: center;
	}
}

/* ── Compact numbered process steps (Inquiry Process) ── */
.pa-process-steps {
	display: flex;
	flex-direction: column;
	gap: 0.55rem;
	margin: 0.45rem 0 var(--pa-space-md);
}

.pa-process-step__card {
	display: flex;
	align-items: flex-start;
	gap: 0.7rem;
	padding: 0.72rem 0.85rem;
	background: #f8fbff;
	border: 1px solid var(--pa-line);
	border-radius: 10px;
	box-shadow: 0 2px 8px rgba(11, 35, 58, 0.05);
}

.pa-process-step__num {
	flex: 0 0 1.85rem;
	width: 1.85rem;
	height: 1.85rem;
	border-radius: 50%;
	background: linear-gradient(135deg, var(--pa-blue) 0%, #0b5fb8 100%);
	color: #fff;
	font-size: 0.82rem;
	font-weight: 700;
	line-height: 1;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	box-shadow: 0 2px 8px rgba(11, 95, 184, 0.18);
	margin-top: 0.05rem;
}

.pa-process-step__text {
	flex: 1;
	min-width: 0;
	margin: 0;
	font-size: 0.95rem;
	line-height: 1.6;
}

@media (max-width: 479px) {
	.pa-process-steps {
		gap: 0.45rem;
	}

	.pa-process-step__card {
		padding: 0.65rem 0.75rem;
	}

	.pa-process-step__num {
		flex-basis: 1.7rem;
		width: 1.7rem;
		height: 1.7rem;
		font-size: 0.78rem;
	}
}

/* ── Definition cards (Employer types) ── */
.pa-def-cards {
	display: flex;
	flex-direction: column;
	gap: 0.65rem;
	margin: 0.75rem 0 var(--pa-space-md);
}

.pa-def-card {
	padding: 0.85rem 1rem;
	background: #f8fbff;
	border: 1px solid var(--pa-line);
	border-left: 3px solid var(--pa-blue);
	border-radius: 10px;
	box-shadow: 0 2px 8px rgba(11, 35, 58, 0.05);
}

.pa-def-card__title {
	margin: 0 0 0.45rem;
	font-size: 0.92rem;
	font-weight: 700;
	line-height: 1.35;
	color: var(--pa-blue-dark);
}

.pa-def-card__text {
	margin: 0;
	font-size: 0.95rem;
	line-height: 1.65;
	color: var(--pa-ink-soft);
}

.pa-def-card__quote {
	font-style: italic;
	font-weight: 600;
	color: #2a4a67;
}

@media (max-width: 479px) {
	.pa-def-card {
		padding: 0.75rem 0.85rem;
	}

	.pa-def-card__title {
		font-size: 0.9rem;
	}

	.pa-def-card__text {
		font-size: 0.92rem;
	}
}

/* ── Subtle name-change note (LC / IC historical names) ── */
.pa-name-change-note {
	margin: 0.75rem 0 1rem;
	padding: 0.75rem 0.95rem;
	background: #f8fbff;
	border: 1px solid var(--pa-line);
	border-left: 3px solid var(--pa-blue);
	border-radius: 8px;
}

.pa-name-change-note__text {
	margin: 0;
	font-size: 0.95rem;
	font-weight: 400;
	line-height: 1.65;
	color: var(--pa-muted);
}

@media (max-width: 479px) {
	.pa-name-change-note {
		padding: 0.7rem 0.85rem;
	}

	.pa-name-change-note__text {
		font-size: 0.92rem;
	}
}

/* ── Media rows (video + text) ── */
.pa-media-row,
.posh-act-page .video-content-row {
	display: grid;
	grid-template-columns: 1fr;
	gap: var(--pa-space-md);
	margin: var(--pa-space-md) 0 var(--pa-space-lg);
}

.pa-media-row__video,
.posh-act-page .video-box {
	border-radius: var(--pa-radius-sm);
	overflow: hidden;
	width: 100%;
	max-width: 100%;
}

.pa-media-row__video amp-youtube,
.posh-act-page .video-box amp-youtube {
	border-radius: var(--pa-radius-sm);
	overflow: hidden;
	display: block;
	max-width: 100%;
}

/* ── Tables ── */
.pa-table-wrap {
	width: 100%;
	overflow-x: auto;
	margin: var(--pa-space-md) 0 var(--pa-space-lg);
	-webkit-overflow-scrolling: touch;
}

.pa-table,
.posh-act-page table,
.posh-act-page .table {
	width: 100%;
	min-width: 280px;
	border-collapse: separate;
	border-spacing: 0;
	border-radius: var(--pa-radius-sm);
	overflow: hidden;
	border: 1px solid var(--pa-line);
	margin: 0;
	font-size: 0.92rem;
	background: var(--pa-surface);
}

.pa-table th,
.pa-table td,
.posh-act-page table th,
.posh-act-page table td {
	padding: 0.75rem 1rem;
	border-bottom: 1px solid var(--pa-line);
	vertical-align: top;
	text-align: left;
	line-height: 1.5;
}

.pa-table th,
.posh-act-page table tr:first-child th,
.posh-act-page table thead th {
	background: var(--pa-blue);
	color: #fff;
	font-weight: 700;
	font-size: 0.88rem;
	letter-spacing: 0.02em;
	border: none;
	white-space: nowrap;
}

.pa-table td:first-child,
.posh-act-page table td:first-child {
	font-weight: 600;
	color: var(--pa-ink-soft);
	width: 28%;
	min-width: 7.5rem;
	white-space: normal;
}

.pa-table td:last-child,
.posh-act-page table td:last-child {
	color: var(--pa-ink);
	width: 72%;
}

.pa-table tr:last-child td,
.posh-act-page table tr:last-child td {
	border-bottom: none;
}

.pa-table tbody tr:nth-child(even) td,
.posh-act-page table tbody tr:nth-child(even) td {
	background: #f8fbff;
}

@media (max-width: 479px) {
	.pa-table th,
	.pa-table td,
	.posh-act-page table th,
	.posh-act-page table td {
		padding: 0.6rem 0.75rem;
		font-size: 0.85rem;
	}

	.pa-table td:first-child,
	.posh-act-page table td:first-child {
		min-width: 6.5rem;
		width: 32%;
	}
}

/* ── Blog feature cards (matches desktop poshact.php) ── */
.posh-blog-feature {
	display: grid;
	grid-template-columns: 1fr;
	align-items: stretch;
	gap: var(--pa-space-md);
	margin: 0.8rem 0 1rem;
}

.posh-blog-feature-copy {
	min-width: 0;
	display: flex;
	flex-direction: column;
	justify-content: center;
}

.posh-blog-feature-card {
	width: 100%;
	max-width: 400px;
	margin: 0 auto;
	background: var(--pa-surface);
	border: 1px solid var(--pa-line);
	border-radius: var(--pa-radius);
	box-shadow: var(--pa-shadow);
	overflow: hidden;
	display: flex;
	flex-direction: column;
}

.posh-blog-feature .posh-blog-feature-card {
	justify-self: center;
}

.posh-blog-feature-card amp-img {
	display: block;
}

.posh-blog-feature-body {
	padding: 0.9rem 1rem 1rem;
	flex: 1;
	display: flex;
	flex-direction: column;
	min-height: 0;
}

.posh-blog-feature-body h4 {
	margin: 0 0 0.5rem;
	font-size: 1.03rem;
	font-weight: 700;
	color: var(--pa-ink-soft);
	line-height: 1.35;
}

.posh-blog-feature-body p {
	margin: 0 0 0.85rem;
	font-size: 0.92rem;
	line-height: 1.55;
	color: var(--pa-muted);
	flex: 1;
}

.posh-blog-feature-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	align-self: flex-start;
	margin-top: auto;
	padding: 0.5rem 1rem;
	border-radius: 8px;
	background: #e8f2f5;
	color: #002a38;
	border: 1px solid rgba(0, 42, 56, 0.22);
	font-size: 0.88rem;
	font-weight: 600;
	text-decoration: none;
}

.posh-blog-cards {
	margin: 0.8rem 0 1rem;
}

.posh-blog-cards-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: var(--pa-space-md);
	justify-content: center;
	justify-items: center;
	width: 100%;
}

.posh-blog-cards-grid .posh-blog-feature-card {
	max-width: 400px;
	width: 100%;
}

.posh-act-page .highlighter-box {
	margin: var(--pa-space-md) 0;
	padding: var(--pa-space-md);
	background: linear-gradient(135deg, var(--pa-blue-dark) 0%, #1472ba 100%);
	border-radius: var(--pa-radius-sm);
	color: #fff;
}

.posh-act-page .highlighter-box p {
	margin: 0;
	color: #fff;
	line-height: 1.6;
}

/* ── Course cards / images ── */
.posh-act-page .course-card-row,
.posh-act-page .image-content-row {
	display: grid;
	grid-template-columns: 1fr;
	gap: var(--pa-space-md);
	margin: var(--pa-space-md) 0;
}

.posh-act-page .course-card,
.posh-act-page .image-card {
	border: 1px solid var(--pa-line);
	border-radius: var(--pa-radius-sm);
	overflow: hidden;
	background: var(--pa-surface);
}

.posh-act-page .course-card amp-img,
.posh-act-page .image-card amp-img {
	display: block;
}

/* ── Sidebar navigation ── */
.pa-sidebar__card {
	background: var(--pa-surface);
	border: 1px solid var(--pa-line);
	border-radius: var(--pa-radius-sm);
	box-shadow: var(--pa-shadow);
	overflow: hidden;
}

.pa-sidebar__title {
	margin: 0;
	padding: var(--pa-space-sm) var(--pa-space-md);
	background: linear-gradient(180deg, #f5f9ff 0%, #ebf2fc 100%);
	border-bottom: 1px solid var(--pa-line);
	color: var(--pa-ink-soft);
	font-size: 0.8rem;
	font-weight: 800;
	letter-spacing: 0.06em;
	text-transform: uppercase;
}

.pa-sidebar__scroll {
	max-height: min(62vh, 560px);
	overflow-y: auto;
	scrollbar-width: thin;
	scrollbar-color: var(--pa-blue) #edf3fb;
}

.posh-act-nav-list {
	list-style: none;
	margin: 0;
	padding: 0.5rem;
}

.posh-act-nav-item {
	border-bottom: 1px solid #e9eff8;
}

.posh-act-nav-item:last-child {
	border-bottom: none;
}

.posh-act-nav-link {
	display: flex;
	align-items: flex-start;
	gap: var(--pa-space-sm);
	padding: 0.72rem 0.85rem;
	color: var(--pa-ink-soft);
	text-decoration: none;
	border-radius: 4px;
	transition: color 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
}

.posh-act-nav-link:hover,
.posh-act-nav-link:focus {
	background: #f8fbff;
	color: var(--pa-blue);
	box-shadow: inset 3px 0 0 var(--pa-blue);
}

.posh-act-nav-num {
	flex: 0 0 1.4rem;
	width: 1.4rem;
	height: 1.4rem;
	border-radius: 50%;
	background: var(--pa-blue-soft);
	color: var(--pa-blue);
	font-size: 0.7rem;
	font-weight: 800;
	display: inline-flex;
	align-items: center;
	justify-content: center;
}

.posh-act-nav-text {
	display: flex;
	flex-direction: column;
	gap: 0.1rem;
	min-width: 0;
}

.posh-act-nav-text strong {
	font-size: 0.9rem;
	font-weight: 700;
	line-height: 1.35;
}

.posh-act-nav-text small {
	color: var(--pa-muted);
	font-size: 0.72rem;
}

.posh-act-nav-list--h2-only {
	padding: 0.35rem 0.5rem 0.5rem;
}

.posh-act-nav-list--h2-only .posh-act-nav-item {
	border: none;
	border-bottom: 1px solid #e9eff8;
	border-radius: 0;
	background: transparent;
}

.posh-act-nav-list--h2-only .posh-act-nav-item:last-child {
	border-bottom: none;
}

.posh-act-nav-list--h2-only .posh-act-nav-link {
	padding: 0.58rem 0.65rem;
}

.posh-act-nav-subs,
.posh-act-nav-deep {
	list-style: none;
	margin: 0;
	padding: 0.35rem 0.5rem 0.55rem;
	background: #fafcff;
	border-top: 1px solid #edf2f8;
	display: flex;
	flex-direction: column;
	gap: 0.12rem;
}

.posh-act-nav-sub-link {
	display: block;
	padding: 0.52rem 0.65rem 0.52rem 0.75rem;
	color: #3d5570;
	font-size: 0.84rem;
	font-weight: 500;
	line-height: 1.45;
	text-decoration: none;
	border-radius: 4px;
	transition: color 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
}

.posh-act-nav-sub-link:hover,
.posh-act-nav-sub-link:focus {
	color: var(--pa-blue);
	background: #eef5ff;
	box-shadow: inset 3px 0 0 var(--pa-blue);
}

.posh-act-nav-deep a {
	display: block;
	padding: 0.28rem 0.4rem;
	color: var(--pa-muted);
	font-size: 0.8rem;
	line-height: 1.35;
	text-decoration: none;
	border-radius: 4px;
}

.posh-act-nav-deep a:hover {
	color: var(--pa-blue);
	background: #f3f8ff;
}

.posh-act-nav-deep {
	margin-left: 0.65rem;
	padding-left: 0.45rem;
	border-left: 2px solid #e3edf9;
}

.pa-sidebar__contact {
	padding: var(--pa-space-sm) var(--pa-space-md);
	border-top: 1px solid var(--pa-line);
	background: linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
}

.pa-sidebar__contact p {
	margin: 0 0 0.65rem;
	font-size: 0.82rem;
	line-height: 1.45;
	color: var(--pa-muted);
}

.pa-sidebar__contact a {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	padding: 0.5rem 0.85rem;
	background: var(--pa-blue);
	color: #fff;
	border-radius: 999px;
	font-weight: 600;
	font-size: 0.9rem;
	text-decoration: none;
}

.pa-sidebar__contact a:hover {
	background: var(--pa-blue-dark);
	color: #fff;
}

.pa-sidebar__form {
	padding: 0;
}

.pa-guide-form-card {
	border: 1px solid var(--pa-line);
	border-radius: 8px;
	background: #fff;
	overflow: hidden;
	box-shadow: 0 6px 18px rgba(15, 40, 72, 0.07);
}

.pa-guide-form-body {
	padding: 0.75rem;
}

.posh-act-form-title.ep-amp-form-title {
	margin: 0;
	padding: 0.75rem 0.95rem 0.65rem;
	background: #f8fbff;
	border-bottom: 1px solid var(--pa-line);
	text-align: center;
	display: flex;
	flex-direction: column;
	gap: 0.15rem;
}

.posh-act-form-title__lead {
	font-size: clamp(0.95rem, 0.88rem + 0.25vw, 1.05rem);
	font-weight: 600;
	line-height: 1.35;
	color: #0d2238;
}

.posh-act-form-title__sub {
	font-size: clamp(0.88rem, 0.84rem + 0.15vw, 0.98rem);
	font-weight: 600;
	line-height: 1.35;
	color: #0f766e;
}

.she-box-form-title.ep-amp-form-title {
	margin: 0;
	padding: 0.85rem 0.95rem;
	font-size: 1rem;
	font-weight: 700;
	line-height: 1.4;
	color: #1d334c;
	background: #f8fbff;
	border-bottom: 1px solid var(--pa-line);
	text-align: center;
}

.pa-guide-form-card .epcf-wrap--compact,
.pa-guide-form-card .epcf-card {
	padding: 0;
	margin: 0;
	border: 0;
	box-shadow: none;
	background: transparent;
	border-radius: 0;
}

.pa-guide-contact-mobile .pa-guide-form-card {
	max-width: 640px;
	margin: 0 auto;
}

.pa-sidebar__form .epcf-form {
	gap: 0.65rem;
}

.pa-sidebar__form .epcf-fields--compact {
	display: grid;
	grid-template-columns: minmax(0, 1fr);
	gap: 0.65rem;
	align-items: stretch;
	width: 100%;
}

.pa-guide-form-card .epcf-fields--compact,
.pa-sidebar__form .epcf-fields--compact {
	grid-template-columns: minmax(0, 1fr);
}

@media (min-width: 992px) {
	.pa-guide-form-card .epcf-fields--compact,
	.pa-sidebar__form .epcf-fields--compact,
	.pa-guide-form-card .erp-home-contact-form .epcf-fields--compact,
	.pa-sidebar__form .erp-home-contact-form .epcf-fields--compact {
		grid-template-columns: minmax(0, 1fr);
	}
}

.pa-sidebar__form .epcf-field {
	margin-bottom: 0;
	width: 100%;
	min-width: 0;
	box-sizing: border-box;
}

.pa-sidebar__form .epcf-input,
.pa-sidebar__form .epcf-textarea {
	min-height: 40px;
	font-size: 14px;
	padding: 8px 10px;
}

.pa-sidebar__form .epcf-textarea {
	min-height: 72px;
}

.pa-sidebar__form .epcf-label {
	font-size: 12px;
}

.pa-sidebar__form .epcf-check span {
	font-size: 12px;
	line-height: 1.4;
}

.pa-sidebar__form .epcf-submit {
	width: 100%;
	padding: 0.55rem 1rem;
	font-size: 14px;
}

.pa-guide-contact-mobile {
	display: block;
	margin: 1.5rem 0 0;
	padding: 0;
}

.pa-guide-contact-mobile .epcf-wrap--compact {
	max-width: 640px;
	margin: 0 auto;
	padding: 0;
}

@media (min-width: 960px) {
	.pa-guide-contact-mobile {
		display: none;
	}
}

/* ── Mobile TOC (reuses desktop sidebar accordion styles) ── */
.pa-mobile-nav__card {
	background: var(--pa-surface);
	border: 1px solid var(--pa-line);
	border-radius: var(--pa-radius);
	box-shadow: var(--pa-shadow);
	padding: var(--pa-space-md);
}

.pa-mobile-nav__title {
	margin: 0 0 var(--pa-space-sm);
	font-size: 0.78rem;
	font-weight: 800;
	letter-spacing: 0.06em;
	text-transform: uppercase;
	color: var(--pa-ink-soft);
}

.posh-act-chips {
	display: flex;
	flex-wrap: wrap;
	gap: var(--pa-space-xs);
	margin: 0 0 var(--pa-space-md);
	padding-bottom: var(--pa-space-md);
	border-bottom: 1px solid var(--pa-line);
}

.posh-act-chip {
	display: inline-flex;
	align-items: center;
	gap: 0.3rem;
	padding: 0.35rem 0.65rem;
	border-radius: 999px;
	border: 1px solid var(--pa-blue-mid);
	background: var(--pa-blue-soft);
	color: var(--pa-blue);
	font-size: 0.78rem;
	font-weight: 600;
	text-decoration: none;
}

.posh-act-chip-num {
	font-weight: 800;
	opacity: 0.65;
}

/* ── Mobile TOC accordion (SHe-Box pattern) ── */
.posh-act-toc-accordion {
	display: block;
	border: none;
	margin: 0;
	background: transparent;
}

.posh-act-toc-accordion > section {
	border-bottom: 1px solid var(--pa-line);
	overflow: hidden;
}

.posh-act-toc-accordion > section:last-child {
	border-bottom: none;
}

.posh-act-toc-accordion > section > :first-child {
	display: flex !important;
	flex-direction: row;
	flex-wrap: nowrap;
	align-items: center;
	justify-content: space-between;
	gap: 0.5rem;
	width: 100%;
	box-sizing: border-box;
	background: transparent;
	border: none;
}

.posh-act-page .posh-act-toc-accordion section > h4::after,
.posh-act-page #posh-act-toc-accordion section > :first-child::after,
.posh-act-page #she-box-toc-accordion section > :first-child::after {
	display: none !important;
	content: none !important;
}

.posh-act-acc-trigger {
	position: relative;
	display: flex !important;
	flex-direction: row;
	flex-wrap: nowrap;
	align-items: center;
	justify-content: space-between;
	gap: 0.5rem;
	width: 100%;
	margin: 0;
	padding: 0.75rem 0.85rem;
	color: var(--pa-ink-soft);
	font-size: 0.9rem;
	font-weight: 700;
	line-height: 1.35;
	text-align: left;
	background: transparent;
	border: none;
	cursor: pointer;
	box-sizing: border-box;
}

.posh-act-acc-label {
	flex: 1 1 auto;
	min-width: 0;
	padding-right: 0.35rem;
}

.posh-act-acc-chevron {
	flex: 0 0 auto;
	display: block;
	width: 0.5rem;
	height: 0.5rem;
	margin-top: 0;
	margin-left: auto;
	align-self: center;
	border-right: 2px solid var(--pa-blue);
	border-bottom: 2px solid var(--pa-blue);
	transform: rotate(45deg);
	transform-origin: center;
	transition: transform 0.25s ease, border-color 0.25s ease;
}

.posh-act-toc-accordion > section[expanded] > .posh-act-acc-trigger .posh-act-acc-chevron {
	transform: rotate(-135deg);
	margin-top: 0;
	border-color: var(--pa-blue-dark);
}

.posh-act-toc-accordion > section[expanded] > .posh-act-acc-trigger {
	color: var(--pa-blue);
	background: var(--pa-blue-soft);
}

.posh-act-acc-body {
	padding: 0.35rem 0 0.65rem;
	background: #fafcff;
	border-top: 1px solid #edf2f8;
}

.posh-act-acc-links {
	list-style: none;
	margin: 0;
	padding: 0;
	display: flex;
	flex-direction: column;
}

.posh-act-acc-links__item {
	margin: 0;
}

.posh-act-acc-links__item--section {
	padding: 0.35rem 0.85rem 0.45rem;
	border-bottom: 1px solid #e3edf9;
}

.posh-act-acc-link--section {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 0.5rem;
	padding: 0;
	background: transparent;
	border: none;
	border-radius: 0;
	color: var(--pa-blue);
	font-size: 0.76rem;
	font-weight: 700;
	line-height: 1.3;
	letter-spacing: 0.05em;
	text-decoration: none;
	text-align: left;
	text-transform: uppercase;
}

.posh-act-acc-link--section::after {
	content: "→";
	flex-shrink: 0;
	font-size: 0.95rem;
	line-height: 1;
	opacity: 0.75;
}

.posh-act-acc-link--section:hover,
.posh-act-acc-link--section:focus {
	color: var(--pa-blue-dark);
}

.posh-act-acc-link {
	display: block;
	padding: 0.62rem 0.85rem;
	color: #2a4060;
	font-size: 0.875rem;
	font-weight: 500;
	line-height: 1.45;
	text-decoration: none;
	border-bottom: 1px solid #edf2f8;
	background: transparent;
	transition: color 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
}

.posh-act-acc-links__item:last-child .posh-act-acc-link {
	border-bottom: none;
}

.posh-act-acc-link:hover,
.posh-act-acc-link:focus {
	color: var(--pa-blue);
	background: #eef5ff;
	box-shadow: inset 3px 0 0 var(--pa-blue);
}

/* ── Back to top ── */
.pa-top {
	position: fixed;
	bottom: 1.25rem;
	left: 1.25rem;
	z-index: 50;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 2.75rem;
	height: 2.75rem;
	border-radius: var(--pa-radius-sm);
	background: var(--pa-blue);
	color: #fff;
	font-size: 1.1rem;
	font-weight: 700;
	text-decoration: none;
	box-shadow: 0 8px 20px rgba(11, 35, 58, 0.2);
}

/* ── Legacy alias cleanup (content may still use old wrappers) ── */
.posh-act-page .posh-act-container,
.posh-act-page .pa-wrap {
	width: var(--pa-wrap);
	max-width: 100%;
	margin: 0 auto;
	padding: 0;
}

.posh-act-page .posh-act-layout,
.posh-act-page .pa-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: var(--pa-space-lg);
}

.posh-act-page .posh-act-content,
.posh-act-page .pa-main {
	min-width: 0;
	padding: 0;
}

.posh-act-page .posh-act-article {
	background: var(--pa-surface);
	border: 1px solid var(--pa-line);
	border-radius: var(--pa-radius);
	padding: clamp(1rem, 2.5vw, 1.5rem);
	box-shadow: var(--pa-shadow);
}

.posh-act-page .pa-article {
	background: none;
	border: none;
	padding: 0;
	box-shadow: none;
}

.posh-act-page .posh-act-hero,
.posh-act-page .pa-hero {
	position: static;
}

/* ── Responsive ── */
@media (min-width: 768px) {
	.pa-wrap,
	.posh-act-page .posh-act-container {
		padding: 0;
	}

	.posh-act-page .course-card-row,
	.posh-act-page .image-content-row {
		grid-template-columns: repeat(3, 1fr);
	}

	.posh-blog-feature {
		grid-template-columns: 3fr 2fr;
		align-items: center;
		gap: 1.75rem;
	}

	.posh-blog-feature .posh-blog-feature-card {
		justify-self: start;
		margin: 0;
	}

	.posh-blog-cards-grid {
		grid-template-columns: repeat(3, minmax(260px, 400px));
		gap: 20px;
	}

	.posh-blog-cards-grid--two {
		grid-template-columns: repeat(2, minmax(260px, 400px));
	}
}

@media (min-width: 960px) {
	.pa-grid,
	.posh-act-page .posh-act-layout {
		grid-template-columns: 280px minmax(0, 1fr);
		gap: var(--pa-space-xl);
		align-items: start;
	}

	.pa-sidebar,
	.posh-act-page .posh-act-toc,
	.posh-act-page .pa-sidebar {
		display: block;
		position: sticky;
		top: var(--pa-scroll-offset);
	}

	.pa-sidebar__card {
		border-color: #d9e4f2;
		border-radius: 8px;
		box-shadow: 0 6px 18px rgba(15, 40, 72, 0.07);
	}

	.pa-sidebar__title {
		padding: 0.72rem 0.95rem;
		font-size: 0.72rem;
		letter-spacing: 0.08em;
	}

	.pa-sidebar__scroll {
		max-height: min(560px, calc(100vh - var(--pa-scroll-offset, 120px) - 80px));
		padding-right: 0.15rem;
	}

	.posh-act-nav-list {
		padding: 0.5rem;
		display: flex;
		flex-direction: column;
		gap: 0.45rem;
	}

	.posh-act-nav-list:not(.posh-act-nav-list--h2-only) .posh-act-nav-item {
		border: 1px solid #e8eef6;
		border-radius: 6px;
		overflow: hidden;
		background: #fff;
	}

	.posh-act-nav-list:not(.posh-act-nav-list--h2-only) .posh-act-nav-item:last-child {
		border-bottom: 1px solid #e8eef6;
	}

	.posh-act-nav-list--h2-only {
		padding: 0.35rem 0.5rem 0.5rem;
		gap: 0;
	}

	.posh-act-nav-list--h2-only .posh-act-nav-item {
		border: none;
		border-bottom: 1px solid #e9eff8;
		border-radius: 0;
	}

	.posh-act-nav-list--h2-only .posh-act-nav-item:last-child {
		border-bottom: none;
	}

	.posh-act-nav-subs {
		padding: 0.3rem 0.45rem 0.55rem;
		gap: 0.08rem;
	}

	.posh-act-nav-sub-link {
		padding: 0.54rem 0.6rem 0.54rem 0.7rem;
		font-size: 0.82rem;
		line-height: 1.48;
	}

	.posh-act-nav-deep a {
		padding: 0.45rem 0.55rem 0.45rem 0.7rem;
		font-size: 0.8rem;
		line-height: 1.42;
	}

	.pa-mobile-nav,
	.posh-act-page .posh-act-mobile-nav {
		display: none;
	}
}

@media (max-width: 959px) {
	.pa-sidebar,
	.posh-act-page .posh-act-toc {
		display: none;
	}

	.pa-mobile-nav,
	.posh-act-page .posh-act-mobile-nav {
		display: block;
	}

	.pa-mobile-nav__card {
		padding: 1rem 1rem 0.85rem;
	}

	.posh-act-toc-accordion > section {
		border-bottom-color: #dfe8f5;
	}

	.posh-act-acc-body {
		padding-bottom: 0.75rem;
	}

	.pa-article,
	.posh-act-page .posh-act-article {
		padding: var(--pa-space-md);
	}

	.pa-h2,
	.posh-act-page h2.main-title-text {
		padding: var(--pa-space-sm);
		font-size: 1.12rem;
	}

	/* Tablet + mobile: text on top, video below (never side-by-side) */
	.pa-media-row,
	.posh-act-page .video-content-row {
		grid-template-columns: 1fr;
		gap: var(--pa-space-md);
	}

	.pa-media-row__video,
	.posh-act-page .video-box {
		max-width: min(520px, 100%);
		margin: var(--pa-space-sm) auto 0;
	}
}

/* Tablet only: fixed comfortable video width, centered */
@media (min-width: 768px) and (max-width: 959px) {
	.pa-media-row__video,
	.posh-act-page .video-box {
		max-width: 480px;
	}
}

@media (max-width: 480px) {
	.pa-wrap,
	.posh-act-page .posh-act-container {
		padding: 0;
	}

	.pa-hero__actions {
		flex-direction: column;
	}

	.pa-btn {
		width: 100%;
		justify-content: center;
	}
}

<?php elearnposh_amp_include_style_partial( 'connect-fab' ); ?>
