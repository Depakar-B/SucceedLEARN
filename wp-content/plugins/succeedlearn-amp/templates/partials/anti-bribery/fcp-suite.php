<?php
/**
 * Anti-Bribery AMP: FCP Suite (global component).
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
			'title_html' => __( 'Explore Our eLearning <span>Compliance Courses</span>', 'succeedlearn-amp' ),
			'intro'      => __( 'Build employee awareness across financial crime, ethical conduct and emerging compliance risks with practical, role-relevant eLearning.', 'succeedlearn-amp' ),
			'background' => 'soft',
		)
	);
}
