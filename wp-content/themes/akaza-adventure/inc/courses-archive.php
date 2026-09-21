<?php
/**
 * Course archive helpers — custom catalog (no LearnPress UI).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the course archive.
 *
 * @return bool
 */
function akaza_is_courses_archive() {
	if ( is_post_type_archive( 'course' ) || is_post_type_archive( 'lp_course' ) ) {
		return true;
	}
	if ( is_tax( 'course_category' ) || is_tax( 'course_tag' ) ) {
		return true;
	}
	if ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() ) {
		return true;
	}
	return false;
}

/**
 * Course post type.
 *
 * @return string
 */
function akaza_course_post_type() {
	if ( post_type_exists( 'course' ) ) {
		return 'course';
	}
	return apply_filters( 'akaza_course_post_type', 'lp_course' );
}

/**
 * Course category taxonomy.
 *
 * @return string
 */
function akaza_course_taxonomy() {
	$post_type = akaza_course_post_type();

	if ( 'course' === $post_type && taxonomy_exists( 'course_category' ) ) {
		return 'course_category';
	}
	if ( taxonomy_exists( 'lp_course_category' ) ) {
		return 'lp_course_category';
	}
	if ( taxonomy_exists( 'course_category' ) ) {
		return 'course_category';
	}
	return 'course_category';
}

/**
 * Get all course categories with courses.
 *
 * @return WP_Term[]
 */
function akaza_get_course_categories() {
	$terms = get_terms(
		array(
			'taxonomy'   => akaza_course_taxonomy(),
			'hide_empty' => true,
			'orderby'    => 'name',
			'order'      => 'ASC',
		)
	);

	return is_array( $terms ) ? $terms : array();
}

/**
 * Orderby args for course queries.
 *
 * @param string $sort Sort key.
 * @return array
 */
function akaza_course_sort_args( $sort = 'newest' ) {
	switch ( $sort ) {
		case 'oldest':
			return array(
				'orderby' => 'date',
				'order'   => 'ASC',
			);
		case 'a-z':
			return array(
				'orderby' => 'title',
				'order'   => 'ASC',
			);
		case 'z-a':
			return array(
				'orderby' => 'title',
				'order'   => 'DESC',
			);
		case 'newest':
		default:
			return array(
				'orderby' => 'date',
				'order'   => 'DESC',
			);
	}
}

/**
 * Format course data for archive cards (CCBM meta).
 *
 * @param int $course_id Post ID.
 * @return array|null
 */
function akaza_format_course_card( $course_id ) {
	$course = get_post( $course_id );
	if ( ! $course || 'publish' !== $course->post_status ) {
		return null;
	}

	$thumbnail = get_the_post_thumbnail_url( $course_id, 'akaza-course-card' );
	if ( ! $thumbnail ) {
		$thumbnail = get_the_post_thumbnail_url( $course_id, 'medium' );
	}

	$course_title = trim( (string) get_post_meta( $course_id, 'course_title', true ) );
	$title        = $course_title !== '' ? $course_title : get_the_title( $course_id );

	$course_desc = get_post_meta( $course_id, 'course_description', true );
	if ( empty( $course_desc ) ) {
		$course_desc = $course->post_excerpt;
	}
	if ( empty( $course_desc ) ) {
		$course_desc = $course->post_content;
	}
	$description = wp_strip_all_tags( $course_desc );
	$excerpt     = wp_trim_words( $description, 30, '…' );

	$duration_title = trim( (string) get_post_meta( $course_id, 'duration_title', true ) );
	$duration_value = trim( wp_strip_all_tags( (string) get_post_meta( $course_id, 'duration_value', true ) ) );
	if ( $duration_value === '' || strcasecmp( $duration_value, 'N/A' ) === 0 ) {
		$duration_value = '';
	}
	if ( $duration_title === '' ) {
		$duration_title = __( 'Total Duration', 'akaza-adventure' );
	}

	$individual_price           = trim( (string) get_post_meta( $course_id, 'individual_price', true ) );
	$individual_currency_symbol = trim( (string) get_post_meta( $course_id, 'individual_currency_symbol', true ) );
	if ( $individual_currency_symbol === '' ) {
		$individual_currency_symbol = '$';
	}
	$individual_btn_text = trim( (string) get_post_meta( $course_id, 'individual_btn_text', true ) );

	$price = '';
	if ( $individual_price !== '' ) {
		if ( is_numeric( $individual_price ) ) {
			$price = $individual_currency_symbol . $individual_price;
		} else {
			$price = $individual_price;
		}
	}
	if ( $price === '' ) {
		$lp_price = get_post_meta( $course_id, '_lp_price', true );
		if ( $lp_price !== '' && $lp_price > 0 ) {
			$price = $individual_currency_symbol . $lp_price;
		}
	}
	if ( $price === '' ) {
		$price = __( 'Free', 'akaza-adventure' );
	}

	if ( $individual_btn_text === '' ) {
		$individual_btn_text = __( 'View Course', 'akaza-adventure' );
	}

	return array(
		'id'             => $course_id,
		'title'          => $title,
		'excerpt'        => $excerpt,
		'description'    => $description,
		'thumbnail'      => $thumbnail ? $thumbnail : '',
		'url'            => get_permalink( $course_id ),
		'duration'       => $duration_value,
		'duration_label' => $duration_title,
		'price'          => $price,
		'button_text'    => $individual_btn_text,
		'sort_date'      => (int) get_post_time( 'U', true, $course_id ),
	);
}

/**
 * Courses grouped by category for scroll layout.
 *
 * @param string $sort Sort key.
 * @return array<int, array{category: WP_Term, courses: array}>
 */
function akaza_get_courses_grouped_by_category( $sort = 'newest' ) {
	$categories = akaza_get_course_categories();
	$tax        = akaza_course_taxonomy();
	$orderby    = akaza_course_sort_args( $sort );
	$grouped    = array();

	foreach ( $categories as $category ) {
		$post_ids = get_posts(
			array_merge(
				array(
					'post_type'              => akaza_course_post_type(),
					'posts_per_page'         => -1,
					'post_status'            => 'publish',
					'fields'                 => 'ids',
					'no_found_rows'          => true,
					'update_post_meta_cache' => false,
					'update_post_term_cache' => false,
					'tax_query'              => array(
						array(
							'taxonomy' => $tax,
							'field'    => 'term_id',
							'terms'    => $category->term_id,
						),
					),
				),
				$orderby
			)
		);

		$courses = array();
		foreach ( $post_ids as $post_id ) {
			$card = akaza_format_course_card( $post_id );
			if ( $card ) {
				$courses[] = $card;
			}
		}

		if ( ! empty( $courses ) ) {
			$grouped[] = array(
				'category' => $category,
				'courses'  => $courses,
			);
		}
	}

	// Courses with no category still appear in the catalog.
	if ( empty( $grouped ) ) {
		$post_ids = get_posts(
			array_merge(
				array(
					'post_type'              => akaza_course_post_type(),
					'posts_per_page'         => -1,
					'post_status'            => 'publish',
					'fields'                 => 'ids',
					'no_found_rows'          => true,
					'update_post_meta_cache' => false,
					'update_post_term_cache' => false,
				),
				$orderby
			)
		);

		$courses = array();
		foreach ( $post_ids as $post_id ) {
			$card = akaza_format_course_card( $post_id );
			if ( $card ) {
				$courses[] = $card;
			}
		}

		if ( ! empty( $courses ) ) {
			$grouped[] = array(
				'category' => (object) array(
					'term_id' => 0,
					'name'    => __( 'All Courses', 'akaza-adventure' ),
					'slug'    => 'all',
					'count'   => count( $courses ),
				),
				'courses'  => $courses,
			);
		}
	}

	return $grouped;
}

/**
 * Bulk package data for a category (CCA term meta).
 *
 * @param int $term_id Term ID.
 * @return array|null
 */
function akaza_get_category_bulk_data( $term_id ) {
	if ( class_exists( 'CCA_Term_Meta' ) ) {
		return CCA_Term_Meta::get_bulk_data( $term_id );
	}

	$term_id = (int) $term_id;
	if ( ! $term_id ) {
		return null;
	}

	$term = get_term( $term_id );
	if ( ! $term || is_wp_error( $term ) ) {
		return null;
	}

	$cta_text = get_term_meta( $term_id, 'cca_bulk_cta_text', true );

	return array(
		'name'             => $term->name,
		'section_title'    => get_term_meta( $term_id, 'cca_bulk_section_title', true ),
		'section_intro'    => get_term_meta( $term_id, 'cca_bulk_section_intro', true ),
		'bulk_price'       => get_term_meta( $term_id, 'cca_bulk_price', true ),
		'bulk_description' => get_term_meta( $term_id, 'cca_bulk_description', true ),
		'bulk_cta_text'    => $cta_text ? $cta_text : __( 'Request a Demo', 'akaza-adventure' ),
		'bulk_cta_url'     => get_term_meta( $term_id, 'cca_bulk_cta_url', true ),
	);
}

/**
 * Enqueue course archive assets.
 */
function akaza_courses_archive_assets() {
	if ( ! akaza_is_courses_archive() ) {
		return;
	}

	$css = AKAZA_DIR . '/assets/css/courses-archive.css';
	$js  = AKAZA_DIR . '/assets/js/courses-archive.js';

	wp_enqueue_style(
		'akaza-courses-archive',
		AKAZA_URI . '/assets/css/courses-archive.css',
		array( 'akaza-main' ),
		file_exists( $css ) ? (string) filemtime( $css ) : AKAZA_VERSION
	);

	wp_enqueue_script(
		'akaza-courses-archive',
		AKAZA_URI . '/assets/js/courses-archive.js',
		array(),
		file_exists( $js ) ? (string) filemtime( $js ) : AKAZA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'akaza_courses_archive_assets', 25 );

/**
 * Dequeue LearnPress and old CCA assets on course archive.
 */
function akaza_courses_archive_dequeue_bloat() {
	if ( ! akaza_is_courses_archive() ) {
		return;
	}

	wp_dequeue_style( 'learnpress' );
	wp_dequeue_style( 'lp-font-awesome-5' );
	wp_dequeue_style( 'akaza-learnpress' );
	wp_dequeue_style( 'cca-style' );

	wp_dequeue_script( 'learnpress' );
	wp_dequeue_script( 'lp-course-filter' );
	wp_dequeue_script( 'cca-script' );
}
add_action( 'wp_enqueue_scripts', 'akaza_courses_archive_dequeue_bloat', 120 );

/**
 * Body class for course archive layout.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_courses_archive_body_class( $classes ) {
	if ( akaza_is_courses_archive() ) {
		$classes[] = 'slf-courses-archive-page';
	}
	return $classes;
}
add_filter( 'body_class', 'akaza_courses_archive_body_class' );
