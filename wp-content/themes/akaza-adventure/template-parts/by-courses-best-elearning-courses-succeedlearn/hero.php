<?php
/**
 * By Courses — Hero section.
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
		'eyebrow' => __( 'Courses', 'akaza-adventure' ),
		'title'   => __( 'By Courses', 'akaza-adventure' ),
		'lead'    => __( 'Explore SucceedLEARN eLearning courses across compliance and security topics.', 'akaza-adventure' ),
	)
);
