<?php
/**
 * Footer Styles (included in amp-custom) — matches elearnposh-site-header footer.css
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
html,
body {
	scroll-behavior: smooth;
}

.ep-page-top {
	position: absolute;
	top: 0;
	left: 0;
	width: 0;
	height: 0;
	overflow: hidden;
}

/* AMP site footer — parity with elearnposh-site-header */
.epsh-site-footer {
	--epsh-footer-text: #002a38;
	--epsh-footer-accent: #1472ba;
	--epsh-footer-accent-dark: #0f5a8f;
	--epsh-footer-muted: #3d4f5c;
	--epsh-footer-card: #ffffff;

	background: #ffffff;
	color: var(--epsh-footer-text);
	font-family: "Nunito Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
	width: 100%;
	box-sizing: border-box;
	clear: both;
	position: relative;
	z-index: 1;
	padding: 36px 20px 16px;
	border-top: 1px solid #e8eef2;
	text-align: left;
}

.epsh-footer-center {
	max-width: 1140px;
	margin: 0 auto;
	padding: 0 20px;
	box-sizing: border-box;
}

.epsh-footer-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 32px;
	align-items: start;
}

.epsh-footer-item h2 {
	font-size: 15px;
	font-weight: 800;
	letter-spacing: 0.04em;
	text-transform: uppercase;
	margin: 0 0 16px;
	padding-bottom: 10px;
	color: var(--epsh-footer-text);
	text-align: left;
	border-bottom: 2px solid rgba(20, 114, 186, 0.2);
	position: relative;
}

.epsh-footer-item h2::after {
	content: "";
	position: absolute;
	left: 0;
	bottom: -2px;
	width: 36px;
	height: 2px;
	background: var(--epsh-footer-accent);
	border-radius: 1px;
}

.epsh-footer-item ul {
	margin: 0;
	padding: 0;
	list-style: none;
}

.epsh-footer-item ul li {
	margin: 0 0 7px;
	padding: 0;
	font-size: 13.5px;
	line-height: 1.5;
}

.epsh-footer-course-group-title {
	margin: 12px 0 6px;
	font-size: 12.5px;
	font-weight: 800;
	letter-spacing: 0.03em;
	text-transform: uppercase;
	color: var(--epsh-footer-accent-dark);
}

.epsh-footer-col-courses .epsh-footer-item ul li:first-child {
	margin-top: 0;
}

.epsh-site-footer a {
	text-decoration: none;
	color: var(--epsh-footer-text);
	transition: color 0.2s ease;
}

.epsh-footer-col-courses .epsh-footer-item ul li a {
	display: inline-block;
	padding: 2px 0;
	border-radius: 4px;
}

.epsh-footer-col-courses .epsh-footer-item ul li a:hover {
	color: var(--epsh-footer-accent);
	text-decoration: none;
}

.epsh-footer-contact-stack ul li a {
	display: inline-flex;
	align-items: center;
	gap: 10px;
	font-size: 13.5px;
}

.epsh-footer-contact-stack ul li a:hover {
	color: var(--epsh-footer-accent);
	text-decoration: none;
}

.epsh-footer-contact-icon {
	flex-shrink: 0;
	width: 28px;
	height: 28px;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	font-size: 13px;
	line-height: 1;
	background: var(--epsh-footer-card);
	border-radius: 50%;
	box-shadow: 0 1px 4px rgba(0, 42, 56, 0.08);
}

.epsh-footer-cert-badges {
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	gap: 14px;
	margin-top: 20px;
}

.epsh-footer-cert-badges amp-img {
	flex-shrink: 0;
	display: block;
	border-radius: 50%;
	box-shadow: 0 2px 8px rgba(0, 42, 56, 0.1);
}

.epsh-footer-aside-card {
	background: transparent;
	border: 0;
	box-shadow: none;
	border-radius: 0;
	padding: 0;
	display: flex;
	flex-direction: column;
	gap: 18px;
}

.epsh-footer-aside-card .epsh-footer-social h2 {
	text-align: left;
	border-bottom: 2px solid rgba(20, 114, 186, 0.2);
	padding-bottom: 10px;
	margin-bottom: 16px;
}

.epsh-footer-aside-card .epsh-footer-social h2::after {
	left: 0;
	transform: none;
}

.epsh-social-icons {
	display: flex;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
	gap: 8px;
	margin: 0;
}

.epsh-icon-container a {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	line-height: 0;
}

.epsh-icon-container amp-img {
	display: block;
	border-radius: 4px;
}

.epsh-social-icon {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	color: #fff;
	transition: transform 0.2s ease, box-shadow 0.2s ease;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
}

.epsh-social-icon svg {
	width: 17px;
	height: 17px;
	display: block;
}

.epsh-social-icons a:hover .epsh-social-icon {
	transform: translateY(-3px);
	box-shadow: 0 6px 14px rgba(0, 0, 0, 0.18);
}

.epsh-social-icon.facebook { background: #1877f2; }
.epsh-social-icon.linkedin { background: #0a66c2; }
.epsh-social-icon.twitter { background: #000; }
.epsh-social-icon.instagram {
	background: linear-gradient(45deg, #f09433, #dc2743, #bc1888);
}
.epsh-social-icon.youtube { background: #f00; }

.epsh-footer-newsletter-form {
	width: 100%;
}

.epsh-site-footer .ans-footer-subscription-wrapper {
	max-width: 100%;
	margin: 0;
	padding: 16px;
	background: linear-gradient(135deg, #e8f4fc 0%, #f4f9fd 55%, #ffffff 100%);
	border-radius: 10px;
	box-shadow: 0 2px 14px rgba(20, 114, 186, 0.1);
	border: 1px solid rgba(20, 114, 186, 0.18);
	border-left: 4px solid var(--epsh-footer-accent);
	box-sizing: border-box;
	position: relative;
	overflow: hidden;
}

.epsh-site-footer .ans-footer-subscription-wrapper::before {
	content: "";
	position: absolute;
	top: 0;
	right: 0;
	width: 140px;
	height: 140px;
	background: radial-gradient(circle, rgba(20, 114, 186, 0.08) 0%, transparent 70%);
	border-radius: 50%;
	transform: translate(35%, -35%);
	pointer-events: none;
}

.epsh-site-footer .ans-footer-form-title,
.epsh-site-footer .ans-footer-subscription-form {
	position: relative;
	z-index: 1;
}

.epsh-site-footer .ans-footer-form-title {
	font-size: 15px;
	font-weight: 700;
	color: var(--epsh-footer-text);
	text-align: center;
	margin: 0 0 12px;
}

.epsh-site-footer .ans-footer-subscription-wrapper input[type="email"],
.epsh-site-footer .ans-footer-subscription-wrapper input[type="text"] {
	width: 100%;
	min-height: 42px;
	padding: 10px 12px;
	font-size: 14px;
	line-height: 1.35;
	box-sizing: border-box;
}

.epsh-site-footer .ans-footer-email-input {
	background: #fff;
	border: 1px solid rgba(20, 114, 186, 0.25);
	border-radius: 8px;
}

.epsh-site-footer .ans-footer-email-input:focus {
	border-color: var(--epsh-footer-accent);
	box-shadow: 0 0 0 3px rgba(20, 114, 186, 0.15);
}

.epsh-site-footer .ans-footer-consent-text {
	color: var(--epsh-footer-text);
	font-size: 13px;
}

.epsh-site-footer .ans-footer-subscription-wrapper label {
	display: inline-flex;
	align-items: flex-start;
	gap: 8px;
	font-size: 13px;
	line-height: 1.35;
}

.epsh-site-footer .ans-footer-subscription-wrapper input[type="checkbox"] {
	margin-top: 2px;
	flex-shrink: 0;
}

.epsh-site-footer .ans-footer-subscription-wrapper .ans-footer-submit-wrap,
.epsh-site-footer .ans-footer-subscription-wrapper p {
	margin: 0;
}

.epsh-site-footer .ans-footer-submit-btn {
	background: linear-gradient(135deg, var(--epsh-footer-accent) 0%, var(--epsh-footer-accent-dark) 100%);
	box-shadow: 0 4px 14px rgba(20, 114, 186, 0.35);
	border-radius: 8px;
	font-weight: 700;
	color: #fff;
	min-height: 40px;
	padding: 10px 18px;
	font-size: 14px;
	line-height: 1.2;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: auto;
	border: 0;
	cursor: pointer;
}

.epsh-footer-hr {
	border: 0;
	height: 1px;
	margin: 24px 0 12px;
	background: #e8eef2;
}

.epsh-footer-meta {
	display: flex;
	flex-direction: column;
	align-items: center;
	gap: 8px;
	padding-bottom: 0;
}

.epsh-footer-meta p {
	margin: 0;
	font-size: 13px;
	color: var(--epsh-footer-muted);
}

.epsh-footer-bottom-links {
	list-style: none;
	margin: 0;
	padding: 0;
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	gap: 4px 0;
}

.epsh-footer-bottom-links li {
	font-size: 13px;
	display: inline-flex;
	align-items: center;
}

.epsh-footer-bottom-links li + li::before {
	content: "|";
	color: #7a8d9a;
	margin: 0 12px;
	font-weight: 300;
}

.epsh-footer-bottom-links li a {
	color: var(--epsh-footer-text);
	font-weight: 500;
}

.epsh-footer-bottom-links li a:hover {
	color: var(--epsh-footer-accent);
	text-decoration: none;
}

/* Desktop: 3-column row */
@media (min-width: 992px) {
	.epsh-footer-grid {
		grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr) minmax(0, 1.1fr);
		column-gap: 36px;
		row-gap: 0;
		align-items: start;
	}

	.epsh-footer-col-courses .epsh-footer-item ul {
		display: grid;
		grid-template-columns: 1fr;
		gap: 2px 0;
	}

	.epsh-footer-meta {
		flex-direction: row;
		justify-content: space-between;
		align-items: center;
		gap: 20px;
	}

	.epsh-footer-copyright {
		text-align: center;
		flex: 1 1 auto;
	}

	.epsh-footer-bottom-links {
		justify-content: flex-end;
		flex: 0 1 auto;
	}
}

@media (min-width: 1200px) {
	.epsh-footer-col-courses .epsh-footer-item ul {
		column-count: 2;
		column-gap: 28px;
	}
}

/* Tablet */
@media (min-width: 768px) and (max-width: 991px) {
	.epsh-footer-center {
		padding: 0;
	}

	.epsh-site-footer .ans-footer-subscription-wrapper .ans-footer-submit-wrap {
		text-align: left;
	}

	.epsh-site-footer .ans-footer-submit-btn {
		width: auto;
		display: inline-flex;
	}

	.epsh-footer-grid {
		grid-template-columns: 1fr 1fr;
		column-gap: 28px;
		row-gap: 28px;
	}

	.epsh-footer-col-aside {
		grid-column: 1 / -1;
		max-width: 440px;
		justify-self: center;
		width: 100%;
	}

	.epsh-footer-bottom-links {
		flex-wrap: nowrap;
		white-space: nowrap;
	}
}

/* Mobile */
@media (max-width: 767px) {
	.epsh-site-footer {
		padding: 28px 16px 0;
	}

	.epsh-footer-center {
		padding: 0;
	}

	.epsh-footer-bottom-links {
		display: grid;
		grid-template-columns: 1fr 1fr;
		width: 100%;
		max-width: 340px;
		gap: 8px 0;
		justify-items: center;
	}

	.epsh-footer-bottom-links li {
		justify-content: center;
	}

	.epsh-footer-bottom-links li + li::before {
		display: none;
	}

	.epsh-footer-bottom-links li:nth-child(even)::before {
		content: "|";
		display: inline;
		color: #7a8d9a;
		margin: 0 10px;
		font-weight: 300;
	}

	.epsh-footer-item h2 {
		text-align: center;
	}

	.epsh-footer-item h2::after {
		left: 50%;
		transform: translateX(-50%);
	}

	.epsh-footer-col-contact .epsh-footer-contact-stack {
		max-width: 300px;
		margin: 0 auto;
	}

	.epsh-footer-col-courses .epsh-footer-item ul {
		text-align: center;
		max-width: 280px;
		margin: 0 auto;
	}

	.epsh-footer-cert-badges {
		justify-content: center;
	}

	.epsh-footer-aside-card .epsh-footer-social h2 {
		text-align: center;
	}

	.epsh-footer-aside-card .epsh-footer-social h2::after {
		left: 50%;
		transform: translateX(-50%);
	}

	.epsh-site-footer .ans-footer-subscription-wrapper .ans-footer-submit-wrap {
		width: 100%;
		text-align: center;
	}

	.epsh-site-footer .ans-footer-submit-btn {
		width: 100%;
		display: flex;
		justify-content: center;
	}
}

/* WhatsApp CTA Notification Styles */
#ep-cta-notification {
	display: none;
	position: fixed;
	right: 0;
	bottom: 0;
	z-index: 10001;
}

#ep-cta-notification .ep-cta-notification__link {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 56px;
	height: 56px;
	text-decoration: none;
	color: #ffffff;
	box-sizing: border-box;
	background: #25d366;
	box-shadow: -2px -2px 12px rgba(0, 0, 0, 0.25);
	border-radius: 50% 0 0 0;
	border: 2px solid rgba(255, 255, 255, 0.3);
}

#ep-cta-notification .ep-cta-notification__icon {
	display: block;
}

@media (max-width: 1024px) {
	#ep-cta-notification {
		display: block;
		animation: slideInUp 0.4s ease-out;
	}
}

@media (min-width: 1025px) {
	#ep-cta-notification {
		display: none;
	}
}

@keyframes slideInUp {
	from {
		transform: translateY(100%);
		opacity: 0;
	}
	to {
		transform: translateY(0);
		opacity: 1;
	}
}

#ep-cta-notification.ep-cta-with-webinar {
	bottom: 72px;
}

@media (max-width: 600px) {
	#ep-cta-notification .ep-cta-notification__link {
		width: 50px;
		height: 50px;
	}

	#ep-cta-notification .ep-cta-notification__icon {
		width: 24px;
		height: 24px;
	}

	#ep-cta-notification.ep-cta-with-webinar {
		bottom: 72px;
	}
}

@media (min-width: 601px) and (max-width: 1024px) {
	#ep-cta-notification .ep-cta-notification__link {
		width: 56px;
		height: 56px;
	}

	#ep-cta-notification .ep-cta-notification__icon {
		width: 28px;
		height: 28px;
	}
}
