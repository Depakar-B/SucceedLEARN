<?php
/**
 * S-Sync — Hero section.
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
		'eyebrow' => __( 'Security Awareness', 'akaza-adventure' ),
		'title'   => __( 'S-Sync', 'akaza-adventure' ),
		'lead'    => __( 'Keep security awareness programmes aligned across your organisation.', 'akaza-adventure' ),
	)
);
