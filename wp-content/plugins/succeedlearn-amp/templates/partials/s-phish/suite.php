<?php
/**
 * S-Phish AMP: Security Behaviour & Culture Suite.
 *
 * Thin wrapper around the global AMP SBCS section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

succeedlearn_amp_render_sbcs(
	array(
		'id'         => 'security-behaviour-culture-suite',
		'background' => 'soft',
	)
);
