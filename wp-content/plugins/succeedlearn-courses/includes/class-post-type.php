<?php
/**
 * Course custom post type.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_Courses_Post_Type {

	/**
	 * Hook registration.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register' ) );
	}

	/**
	 * Register the course CPT.
	 */
	public static function register() {
		$labels = array(
			'name'               => __( 'Courses', 'succeedlearn-courses' ),
			'singular_name'      => __( 'Course', 'succeedlearn-courses' ),
			'add_new'            => __( 'Add New', 'succeedlearn-courses' ),
			'add_new_item'       => __( 'Add New Course', 'succeedlearn-courses' ),
			'edit_item'          => __( 'Edit Course', 'succeedlearn-courses' ),
			'new_item'           => __( 'New Course', 'succeedlearn-courses' ),
			'view_item'          => __( 'View Course', 'succeedlearn-courses' ),
			'search_items'       => __( 'Search Courses', 'succeedlearn-courses' ),
			'not_found'          => __( 'No courses found', 'succeedlearn-courses' ),
			'not_found_in_trash' => __( 'No courses found in Trash', 'succeedlearn-courses' ),
			'all_items'          => __( 'All Courses', 'succeedlearn-courses' ),
			'menu_name'          => __( 'Courses', 'succeedlearn-courses' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'courses',
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => 'courses',
			'hierarchical'       => false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-welcome-learn-more',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'author' ),
		);

		register_post_type( SL_COURSES_CPT, $args );
	}
}
