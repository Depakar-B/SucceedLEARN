<?php
/**
 * Keep /courses/ owned by the `course` CPT while LearnPress remains installed.
 *
 * LearnPress registers `lp_course` with the same rewrite slug (`courses`), so
 * single URLs resolve as lp_course and 404 after migration.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_Courses_LearnPress_Compat {

	const REWRITE_FLAG = 'sl_courses_lp_rewrite_v1';

	/**
	 * Hook compatibility fixes.
	 */
	public static function init() {
		add_filter( 'register_post_type_args', array( __CLASS__, 'demote_lp_course_rewrite' ), 20, 2 );
		add_filter( 'request', array( __CLASS__, 'map_lp_course_request_to_course' ), 5 );
		add_action( 'init', array( __CLASS__, 'maybe_flush_rewrites' ), 99 );
	}

	/**
	 * Move LearnPress courses off /courses/ so migrated singles resolve.
	 *
	 * @param array  $args      Post type args.
	 * @param string $post_type Post type name.
	 * @return array
	 */
	public static function demote_lp_course_rewrite( $args, $post_type ) {
		if ( 'lp_course' !== $post_type || ! is_array( $args ) ) {
			return $args;
		}

		$args['rewrite'] = array(
			'slug'       => 'lp-courses',
			'with_front' => false,
		);
		$args['has_archive'] = false;

		return $args;
	}

	/**
	 * Safety net: if a request still arrives as lp_course, map it to course.
	 *
	 * @param array $query_vars Request query vars.
	 * @return array
	 */
	public static function map_lp_course_request_to_course( $query_vars ) {
		if ( empty( $query_vars['lp_course'] ) || ! is_string( $query_vars['lp_course'] ) ) {
			return $query_vars;
		}

		$slug = sanitize_title( $query_vars['lp_course'] );
		if ( '' === $slug ) {
			return $query_vars;
		}

		$existing = get_posts(
			array(
				'name'                   => $slug,
				'post_type'              => SL_COURSES_CPT,
				'post_status'            => 'publish',
				'numberposts'            => 1,
				'fields'                 => 'ids',
				'no_found_rows'          => true,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => false,
			)
		);

		if ( empty( $existing ) ) {
			return $query_vars;
		}

		unset( $query_vars['lp_course'] );
		$query_vars['course']    = $slug;
		$query_vars['post_type'] = SL_COURSES_CPT;
		$query_vars['name']      = $slug;

		return $query_vars;
	}

	/**
	 * Flush rewrite rules once after demoting LearnPress /courses/ rules.
	 */
	public static function maybe_flush_rewrites() {
		if ( get_option( self::REWRITE_FLAG ) ) {
			return;
		}

		flush_rewrite_rules( false );
		update_option( self::REWRITE_FLAG, 1, false );
	}
}
