<?php
/**
 * Sticky side "Let's Connect" tab - mobile/tablet AMP only.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
/* Sticky side "Let's Connect" tab - mobile/tablet AMP only */
.pa-connect-fab {
	position: fixed;
	right: 0;
	top: 50%;
	transform: translateY(-50%);
	z-index: 600;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	padding: 0.85rem 0.55rem;
	background: var(--pa-blue, #0d73d4);
	color: #fff;
	font-size: 0.82rem;
	font-weight: 700;
	line-height: 1.2;
	text-decoration: none;
	writing-mode: vertical-rl;
	text-orientation: mixed;
	border-radius: 10px 0 0 10px;
	box-shadow: -4px 0 18px rgba(13, 115, 212, 0.28);
	letter-spacing: 0.02em;
}

.pa-connect-fab:hover,
.pa-connect-fab:focus {
	background: var(--pa-blue-dark, #0b63b5);
	color: #fff;
}

@media (min-width: 960px) {
	.pa-connect-fab {
		display: none;
	}
}
