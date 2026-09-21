<?php
/**
 * Feature gating for free vs pro.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Runtime feature gates.
 */
class Post_Lattice_Features {

	/**
	 * Feature slug constants.
	 */
	const MULTI_FILTERS   = 'multi_filters';
	const TAG_FILTERS     = 'tag_filters';
	const PROFILE_MANAGER = 'profile_manager';
	const RELATED_CONTEXT = 'related_context';
	const MULTI_POST_TYPES = 'multi_post_types';
	const EXTRA_SHORTCODES = 'extra_shortcodes';
	const YEAR_FILTERS    = 'year_filters';

	/**
	 * Whether Pro mode is enabled.
	 *
	 * @return bool
	 */
	public static function is_pro() {
		/**
		 * Filter plugin mode.
		 *
		 * Integrators can enable pro mode by returning true.
		 *
		 * @param bool $is_pro Pro state.
		 */
		return (bool) apply_filters( 'post_lattice_is_pro', false );
	}

	/**
	 * Check if a feature is available.
	 *
	 * @param string $feature Feature slug.
	 * @return bool
	 */
	public static function can_use( $feature ) {
		if ( self::is_pro() ) {
			return true;
		}

		$free = array();

		return in_array( $feature, $free, true );
	}
}

