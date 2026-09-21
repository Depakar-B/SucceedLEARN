<?php
/**
 * Security Awareness AMP — Stats section.
 *
 * Reloads stats here because sa_partial() includes run in function scope.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $stats ) || ! is_array( $stats ) ) {
	$stats = succeedlearn_amp_get_sa_stats();
}

include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/shared/stats.php';
