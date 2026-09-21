<?php
/**
 * Plugin Name: SucceedLEARN Courses
 * Description: Lightweight Courses CPT to replace LearnPress. Migrates existing lp_course posts and ensures Rank Math sitemap inclusion.
 * Version: 1.0.0
 * Author: SucceedLEARN
 * Text Domain: succeedlearn-courses
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SL_COURSES_VERSION', '1.0.0' );
define( 'SL_COURSES_FILE', __FILE__ );
define( 'SL_COURSES_DIR', plugin_dir_path( __FILE__ ) );
define( 'SL_COURSES_URI', plugin_dir_url( __FILE__ ) );
define( 'SL_COURSES_CPT', 'course' );
define( 'SL_COURSES_TAX_CATEGORY', 'course_category' );
define( 'SL_COURSES_TAX_TAG', 'course_tag' );

require_once SL_COURSES_DIR . 'includes/class-post-type.php';
require_once SL_COURSES_DIR . 'includes/class-taxonomies.php';
require_once SL_COURSES_DIR . 'includes/class-migrator.php';
require_once SL_COURSES_DIR . 'includes/class-rank-math.php';
require_once SL_COURSES_DIR . 'includes/class-learnpress-compat.php';

/**
 * Bootstrap plugin.
 */
function sl_courses_init() {
	SL_Courses_Post_Type::init();
	SL_Courses_Taxonomies::init();
	SL_Courses_Migrator::init();
	SL_Courses_Rank_Math::init();
	SL_Courses_LearnPress_Compat::init();
}
add_action( 'plugins_loaded', 'sl_courses_init' );

/**
 * Activation: register CPT/tax, migrate LP courses, enable Rank Math, flush rewrites.
 */
function sl_courses_activate() {
	require_once SL_COURSES_DIR . 'includes/class-post-type.php';
	require_once SL_COURSES_DIR . 'includes/class-taxonomies.php';
	require_once SL_COURSES_DIR . 'includes/class-migrator.php';
	require_once SL_COURSES_DIR . 'includes/class-rank-math.php';

	SL_Courses_Post_Type::register();
	SL_Courses_Taxonomies::register();
	SL_Courses_Migrator::migrate();
	SL_Courses_Rank_Math::ensure_settings();

	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'sl_courses_activate' );

/**
 * Deactivation: flush rewrites only (courses stay in DB).
 */
function sl_courses_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'sl_courses_deactivate' );
