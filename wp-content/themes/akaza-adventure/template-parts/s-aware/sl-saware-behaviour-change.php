<?php
/**
 * S-Aware — Security Behaviour & Culture Suite.
 *
 * Thin wrapper around the global SBCS component.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/global/security-behaviour-culture-suite',
	null,
	array(
		'id'         => 'from-awareness-to-behaviour-change',
		'media_side' => 'left',
		'background' => 'white',
		'image'      => 'https://succeedlearn.com/wp-content/uploads/2026/09/From-Awareness-to-Real-World-Readiness.webp',
		'image_alt'  => __( 'From Awareness to Real-World Readiness', 'akaza-adventure' ),
	)
);
