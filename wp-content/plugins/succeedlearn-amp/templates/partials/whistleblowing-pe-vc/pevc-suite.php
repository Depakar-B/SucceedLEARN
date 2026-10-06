<?php
/**
 * Whistleblowing PE/VC AMP: PE/VC Compliance Suite (global component).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'succeedlearn_amp_render_course_suite' ) ) {
	succeedlearn_amp_render_course_suite(
		array(
			'suite'      => 'pevc',
			'id'         => 'pevc-suite',
			'title_html' => __( 'Whistleblowing Is Part of a Comprehensive <span>PE/VC Compliance Suite</span>', 'succeedlearn-amp' ),
			'intro'      => __( 'Extend whistleblowing awareness into a broader compliance programme covering cyber security, code of conduct, financial crime and regulated-firm responsibilities.', 'succeedlearn-amp' ),
			'background' => 'soft',
		)
	);
}
