<?php
/**
 * Sitemap — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => __( 'SucceedLEARN', 'akaza-adventure' ),
		'title'   => __( 'Sitemap', 'akaza-adventure' ),
		'lead'    => __( 'Browse all pages and sections on the SucceedLEARN website.', 'akaza-adventure' ),
	)
);
