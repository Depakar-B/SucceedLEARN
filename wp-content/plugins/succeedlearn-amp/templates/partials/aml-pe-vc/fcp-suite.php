<?php
/**
 * AML PE/VC AMP: FCP Suite (global component).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'succeedlearn_amp_render_course_suite' ) ) {
	succeedlearn_amp_render_course_suite(
		array(
			'suite'      => 'fcp',
			'id'         => 'fcp-suite',
			'title_html' => __( 'AML Is Part of a Comprehensive <span>Financial Crime Prevention Suite</span>', 'succeedlearn-amp' ),
			'intro'      => __( 'Extend AML awareness across a wider financial crime learning programme with complementary compliance courses.', 'succeedlearn-amp' ),
			'background' => 'soft',
		)
	);
}
