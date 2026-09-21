<?php
/**
 * Privacy Policy — Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part(
	'template-parts/global/legal-hero',
	null,
	array(
		'id'      => 'privacy',
		'eyebrow' => __( 'Legal', 'akaza-adventure' ),
		'title'   => __( 'Privacy Policy', 'akaza-adventure' ),
		'lead'    => __( 'How SucceedLEARN collects, uses, and protects your personal information when you visit our website, purchase or subscribe to our courses, enrol in training programs, or interact with our platform.', 'akaza-adventure' ),
	)
);
