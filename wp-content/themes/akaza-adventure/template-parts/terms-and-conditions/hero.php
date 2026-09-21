<?php
/**
 * Terms and Conditions — Hero.
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
		'id'      => 'terms',
		'eyebrow' => __( 'Legal', 'akaza-adventure' ),
		'title'   => __( 'Terms and Conditions', 'akaza-adventure' ),
		'lead'    => __( 'These Terms and Conditions apply to purchases of learning services and subscriptions made through our online portal.', 'akaza-adventure' ),
	)
);
