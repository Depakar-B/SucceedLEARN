<?php
/**
 * Ensure Rank Math includes the course CPT in sitemaps / SEO metabox.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_Courses_Rank_Math {

	const OPTION_DONE = 'sl_courses_rank_math_configured';

	/**
	 * Hooks.
	 */
	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'maybe_ensure_settings' ) );
	}

	/**
	 * Run once after Rank Math is available.
	 */
	public static function maybe_ensure_settings() {
		if ( get_option( self::OPTION_DONE ) ) {
			return;
		}

		if ( ! defined( 'RANK_MATH_VERSION' ) ) {
			return;
		}

		self::ensure_settings();
	}

	/**
	 * Turn on sitemap + metabox for course CPT in Rank Math options.
	 */
	public static function ensure_settings() {
		if ( ! defined( 'RANK_MATH_VERSION' ) && ! class_exists( 'RankMath' ) ) {
			// Still mark attempted so we retry via admin_init when Rank Math loads later.
			return;
		}

		$sitemap = get_option( 'rank-math-options-sitemap', array() );
		if ( ! is_array( $sitemap ) ) {
			$sitemap = array();
		}

		$titles = get_option( 'rank-math-options-titles', array() );
		if ( ! is_array( $titles ) ) {
			$titles = array();
		}

		$sitemap[ 'pt_' . SL_COURSES_CPT . '_sitemap' ] = 'on';
		$titles[ 'pt_' . SL_COURSES_CPT . '_add_meta_box' ] = 'on';

		// Sensible title defaults if Rank Math has none yet.
		if ( empty( $titles[ 'pt_' . SL_COURSES_CPT . '_title' ] ) ) {
			$titles[ 'pt_' . SL_COURSES_CPT . '_title' ] = '%title% %sep% %sitename%';
		}

		update_option( 'rank-math-options-sitemap', $sitemap, false );
		update_option( 'rank-math-options-titles', $titles, false );
		update_option( self::OPTION_DONE, 1, false );
	}
}
