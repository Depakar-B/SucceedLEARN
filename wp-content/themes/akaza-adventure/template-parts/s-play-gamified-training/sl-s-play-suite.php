<?php
/**
 * S-Play — Security Behaviour & Culture Suite.
 *
 * Thin wrapper around the global SBCS component.
 * Background: white (previous section `teams` uses soft grey).
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
		'id'         => 'security-behaviour-culture-suite',
		'media_side' => 'right',
		'background' => 'white',
		'image'      => 'https://succeedlearn.com/wp-content/uploads/2026/09/From-Awareness-to-Real-World-Readiness.webp',
		'image_alt'  => __( 'From Awareness to Real-World Readiness', 'akaza-adventure' ),
	)
);
