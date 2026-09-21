<?php
/**
 * S-Bytes — Hero section.
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
		'title'   => __( 'S-Bytes', 'akaza-adventure' ),
		'lead'    => __( 'Bite-sized security awareness content for busy teams.', 'akaza-adventure' ),
	)
);
