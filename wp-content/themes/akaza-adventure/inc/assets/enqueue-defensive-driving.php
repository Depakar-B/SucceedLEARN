<?php
/**
 * Defensive driving course marketing assets.
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function akaza_enqueue_defensive_driving_assets() {
	akaza_enqueue_course_marketing_styles( 'defensive-driving' );
}
