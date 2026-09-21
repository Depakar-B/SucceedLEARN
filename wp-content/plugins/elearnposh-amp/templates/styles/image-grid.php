<?php
/**
 * Shared image grid styles (included in amp-custom).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.pfe-why-gallery {
	display: grid;
	grid-template-columns: 1fr;
	gap: 16px;
	width: 100%;
	min-width: 0;
}

.pfe-image-card {
	overflow: hidden;
	box-shadow: 0 8px 24px rgba(11, 35, 58, 0.08);
	margin: 0;
	background: #fff;
	border: 0;
	border-radius: 14px;
}

.pfe-image-card amp-img {
	display: block;
	width: 100%;
	max-width: 100%;
}

@media (min-width: 641px) {
	.pfe-why-gallery {
		grid-template-columns: repeat(2, minmax(0, 1fr));
	}
}

@media (min-width: 1025px) {
	.pfe-why-gallery {
		grid-template-columns: repeat(3, minmax(0, 1fr));
	}
}
