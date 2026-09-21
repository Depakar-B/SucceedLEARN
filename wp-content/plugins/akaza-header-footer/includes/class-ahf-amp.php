<?php
/**
 * AMP detection helper.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Unified AMP check for this plugin.
 */
class AHF_AMP {

	/**
	 * Whether the current request is an AMP page.
	 */
	public static function is_amp() {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return true;
		}
		if ( function_exists( 'amp_is_request' ) && amp_is_request() ) {
			return true;
		}
		if ( function_exists( 'genesis_is_amp' ) && genesis_is_amp() ) {
			return true;
		}
		return (bool) apply_filters( 'ahf_is_amp', false );
	}
}
