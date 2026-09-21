<?php
/**
 * Course taxonomies (reuse LearnPress names so term links stay valid).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_Courses_Taxonomies {

	/**
	 * Hook registration.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register' ) );
	}

	/**
	 * Register course_category and course_tag if not already registered.
	 */
	public static function register() {
		if ( ! taxonomy_exists( SL_COURSES_TAX_CATEGORY ) ) {
			register_taxonomy(
				SL_COURSES_TAX_CATEGORY,
				array( SL_COURSES_CPT ),
				array(
					'labels'            => array(
						'name'          => __( 'Course Categories', 'succeedlearn-courses' ),
						'singular_name' => __( 'Course Category', 'succeedlearn-courses' ),
						'search_items'  => __( 'Search Course Categories', 'succeedlearn-courses' ),
						'all_items'     => __( 'All Course Categories', 'succeedlearn-courses' ),
						'edit_item'     => __( 'Edit Course Category', 'succeedlearn-courses' ),
						'update_item'   => __( 'Update Course Category', 'succeedlearn-courses' ),
						'add_new_item'  => __( 'Add New Course Category', 'succeedlearn-courses' ),
						'new_item_name' => __( 'New Course Category Name', 'succeedlearn-courses' ),
						'menu_name'     => __( 'Categories', 'succeedlearn-courses' ),
					),
					'hierarchical'      => true,
					'public'            => true,
					'show_ui'           => true,
					'show_admin_column' => true,
					'show_in_rest'      => true,
					'rewrite'           => array(
						'slug'         => 'course-category',
						'with_front'   => false,
						'hierarchical' => true,
					),
				)
			);
		} else {
			register_taxonomy_for_object_type( SL_COURSES_TAX_CATEGORY, SL_COURSES_CPT );
		}

		if ( ! taxonomy_exists( SL_COURSES_TAX_TAG ) ) {
			register_taxonomy(
				SL_COURSES_TAX_TAG,
				array( SL_COURSES_CPT ),
				array(
					'labels'            => array(
						'name'          => __( 'Course Tags', 'succeedlearn-courses' ),
						'singular_name' => __( 'Course Tag', 'succeedlearn-courses' ),
						'search_items'  => __( 'Search Course Tags', 'succeedlearn-courses' ),
						'all_items'     => __( 'All Course Tags', 'succeedlearn-courses' ),
						'edit_item'     => __( 'Edit Course Tag', 'succeedlearn-courses' ),
						'update_item'   => __( 'Update Course Tag', 'succeedlearn-courses' ),
						'add_new_item'  => __( 'Add New Course Tag', 'succeedlearn-courses' ),
						'new_item_name' => __( 'New Course Tag Name', 'succeedlearn-courses' ),
						'menu_name'     => __( 'Tags', 'succeedlearn-courses' ),
					),
					'hierarchical'      => false,
					'public'            => true,
					'show_ui'           => true,
					'show_admin_column' => true,
					'show_in_rest'      => true,
					'rewrite'           => array(
						'slug'       => 'course-tag',
						'with_front' => false,
					),
				)
			);
		} else {
			register_taxonomy_for_object_type( SL_COURSES_TAX_TAG, SL_COURSES_CPT );
		}
	}
}
