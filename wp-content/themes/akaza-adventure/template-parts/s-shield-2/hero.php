<?php
/**
 * S-Shield — Hero section.
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
		'title'   => __( 'S-Shield', 'akaza-adventure' ),
		'lead'    => __( 'Layered security awareness protection for your organisation.', 'akaza-adventure' ),
	)
);
