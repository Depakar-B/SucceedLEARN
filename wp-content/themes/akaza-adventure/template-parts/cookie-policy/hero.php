<?php
/**
 * Cookie Policy — Hero section.
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
		'eyebrow' => __( 'Legal', 'akaza-adventure' ),
		'title'   => __( 'Cookie Policy', 'akaza-adventure' ),
		'lead'    => __( 'How SucceedLEARN uses cookies and similar technologies on this website.', 'akaza-adventure' ),
	)
);
