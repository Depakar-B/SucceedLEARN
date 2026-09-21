<?php
/**
 * FAQs — Hero section.
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
		'eyebrow' => __( 'Support', 'akaza-adventure' ),
		'title'   => __( 'Frequently Asked Questions', 'akaza-adventure' ),
		'lead'    => __( 'Answers to common questions about SucceedLEARN programmes and platform.', 'akaza-adventure' ),
	)
);
