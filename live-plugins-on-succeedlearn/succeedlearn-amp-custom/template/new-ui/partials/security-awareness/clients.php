<?php
/**
 * Security Awareness AMP — Clients section.
 *
 * Reloads logo context here because sa_partial() includes run in function
 * scope and cannot see page-level extract() vars.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $client_logos ) || ! is_array( $client_logos ) ) {
	$sa_clients = succeedlearn_amp_prepare_sa_clients_context();
	$client_logos     = $sa_clients['client_logos'];
	$uploads_base     = $sa_clients['uploads_base'];
	$show_view_all    = $sa_clients['show_view_all'];
	$clients_page_url = $sa_clients['clients_page_url'];
} else {
	// Page may have logos but not the CTA flag when included via function scope.
	$show_view_all    = true;
	$clients_page_url = ! empty( $clients_page_url ) ? $clients_page_url : home_url( '/clients/' );
	$uploads_base     = ! empty( $uploads_base ) ? $uploads_base : content_url( '/uploads/2026/03' );
}

include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/shared/clients.php';
