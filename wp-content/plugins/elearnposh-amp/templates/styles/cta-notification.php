<?php
/**
 * CTA Notification Styles (included in amp-custom)
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* CTA Notification Styles */
.ep-cta-notification {
	position: fixed;
	bottom: 0;
	left: 0;
	right: 0;
	z-index: 10000;
	background: linear-gradient(135deg, #0089cf 0%, #1472ba 100%);
	box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.3);
	padding: 0;
	margin: 0;
	width: 100%;
	display: none;
	animation: slideUp 0.3s ease-out;
}

/* Show only on mobile and tablet */
@media (max-width: 1024px) {
	.ep-cta-notification {
		display: block;
	}
}

/* Hide on desktop */
@media (min-width: 1025px) {
	.ep-cta-notification {
		display: none !important;
	}
}

.ep-cta-notification-link {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 12px;
	padding: 16px 20px;
	text-decoration: none;
	color: #ffffff;
	font-weight: 700;
	font-size: 16px;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	width: 100%;
	box-sizing: border-box;
	transition: background 0.3s ease;
	background: linear-gradient(135deg, #0089cf 0%, #1472ba 100%);
}

.ep-cta-notification-link:active {
	background: linear-gradient(135deg, #006ba3 0%, #0f5a8a 100%);
	opacity: 0.9;
}

.ep-cta-notification-icon {
	font-size: 20px;
	line-height: 1;
	animation: pulse 2s ease-in-out infinite;
}

.ep-cta-notification-text {
	flex: 1;
	text-align: center;
	font-size: 16px;
	font-weight: 700;
	letter-spacing: 0.5px;
}

.ep-cta-notification-arrow {
	font-size: 20px;
	line-height: 1;
	transition: transform 0.3s ease;
}

.ep-cta-notification-link:active .ep-cta-notification-arrow {
	transform: translateX(4px);
}

/* Animation for slide up */
@keyframes slideUp {
	from {
		transform: translateY(100%);
		opacity: 0;
	}
	to {
		transform: translateY(0);
		opacity: 1;
	}
}

/* Pulse animation for icon */
@keyframes pulse {
	0%, 100% {
		transform: scale(1);
	}
	50% {
		transform: scale(1.1);
	}
}

/* Adjust spacing if webinar banner is active */
body:has(#ep-webinar-banner) .ep-cta-notification {
	bottom: 72px;
}

/* Mobile specific adjustments */
@media (max-width: 600px) {
	.ep-cta-notification-link {
		padding: 14px 16px;
		font-size: 15px;
	}
	
	.ep-cta-notification-text {
		font-size: 15px;
	}
	
	.ep-cta-notification-icon {
		font-size: 18px;
	}
	
	.ep-cta-notification-arrow {
		font-size: 18px;
	}
}

/* Tablet specific adjustments */
@media (min-width: 601px) and (max-width: 1024px) {
	.ep-cta-notification-link {
		padding: 16px 24px;
		font-size: 17px;
	}
	
	.ep-cta-notification-text {
		font-size: 17px;
	}
}
