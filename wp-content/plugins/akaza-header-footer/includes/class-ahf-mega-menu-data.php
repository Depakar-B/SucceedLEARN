<?php
/**
 * Cached course-category tree for the interactive Solutions mega menu.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Builds category → courses → preview payload for desktop nav JS.
 */
class AHF_Mega_Menu_Data {

	const TRANSIENT_KEY = 'ahf_mega_menu_data_v6';

	/**
	 * Clear cached mega menu and related footer groups.
	 */
	public static function flush_cache() {
		delete_transient( self::TRANSIENT_KEY );
		delete_transient( 'ahf_mega_menu_data' );
		delete_transient( 'ahf_mega_menu_data_v2' );
		delete_transient( 'ahf_mega_menu_data_v3' );
		delete_transient( 'ahf_mega_menu_data_v4' );
		delete_transient( 'ahf_mega_menu_data_v5' );

		if ( class_exists( 'AHF_Footer_Items' ) ) {
			delete_transient( 'ahf_footer_complete_solutions' );
			delete_transient( 'ahf_footer_complete_solutions_v2' );
		}
	}

	/**
	 * Explicit category-slug → page path overrides.
	 *
	 * @return array<string, string>
	 */
	private static function get_category_page_map() {
		$map = array();

		if ( class_exists( 'AHF_Menu_Items' ) ) {
			foreach ( AHF_Menu_Items::get_succeedlearn_solutions() as $solution ) {
				$label = (string) ( $solution['label'] ?? '' );
				$url   = (string) ( $solution['url'] ?? '' );
				if ( '' === $label || '' === $url ) {
					continue;
				}

				$map[ sanitize_title( $label ) ] = $url;
			}
		}

		/**
		 * Override/extend category slug → page path map for the mega menu.
		 *
		 * Example: array( 'security-awareness' => '/security-awareness/' )
		 *
		 * @param array<string, string> $map Slug => path or absolute URL.
		 */
		return apply_filters( 'ahf_mega_menu_category_page_map', $map );
	}

	/**
	 * @return array<int, array<string, mixed>>
	 */
	public static function get_mega_menu_tree() {
		$cached = get_transient( self::TRANSIENT_KEY );
		if ( false !== $cached && is_array( $cached ) ) {
			return apply_filters( 'ahf_mega_menu_data', $cached );
		}

		$tree = self::build_tree();
		set_transient( self::TRANSIENT_KEY, $tree, HOUR_IN_SECONDS );

		return apply_filters( 'ahf_mega_menu_data', $tree );
	}

	/**
	 * @return array<int, array<string, mixed>>
	 */
	private static function build_tree() {
		$post_types = self::detect_course_post_types();
		$taxonomy   = self::detect_course_taxonomy( $post_types );
		$groups     = array();

		if ( empty( $post_types ) || ! taxonomy_exists( $taxonomy ) ) {
			return self::fallback_solution_groups();
		}

		$terms = get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,
				'orderby'    => 'name',
				'order'      => 'ASC',
			)
		);

		if ( is_wp_error( $terms ) || empty( $terms ) ) {
			return self::fallback_solution_groups();
		}

		$courses_base = class_exists( 'AHF_Menu_Items' ) ? AHF_Menu_Items::get_courses_menu_path() : '/courses/';

		foreach ( $terms as $term ) {
			$posts = get_posts(
				array(
					'post_type'              => $post_types,
					'posts_per_page'         => -1,
					'post_status'            => 'publish',
					'orderby'                => 'title',
					'order'                  => 'ASC',
					'no_found_rows'          => true,
					'update_post_meta_cache' => true,
					'update_post_term_cache' => false,
					'tax_query'              => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
						array(
							'taxonomy' => $taxonomy,
							'field'    => 'term_id',
							'terms'    => (int) $term->term_id,
						),
					),
				)
			);

			$courses = array();
			foreach ( (array) $posts as $post ) {
				$course = self::format_course( $post );
				if ( ! empty( $course ) ) {
					$courses[] = $course;
				}
			}

			if ( empty( $courses ) ) {
				continue;
			}

			$groups[] = array(
				'id'      => (string) $term->slug,
				'label'   => wp_specialchars_decode( $term->name, ENT_QUOTES ),
				'url'     => self::resolve_category_page_url( $term, $courses_base ),
				'courses' => $courses,
			);
		}

		if ( empty( $groups ) ) {
			return self::fallback_solution_groups();
		}

		return $groups;
	}

	/**
	 * Curated solution pages when no course categories can be loaded.
	 *
	 * @return array<int, array<string, mixed>>
	 */
	private static function fallback_solution_groups() {
		$groups = array();

		if ( ! class_exists( 'AHF_Menu_Items' ) ) {
			return $groups;
		}

		foreach ( AHF_Menu_Items::get_succeedlearn_solutions() as $solution ) {
			$label = (string) ( $solution['label'] ?? '' );
			$url   = (string) ( $solution['url'] ?? '' );
			if ( '' === $label ) {
				continue;
			}

			$groups[] = array(
				'id'      => sanitize_title( $label ),
				'label'   => $label,
				'url'     => class_exists( 'AHF_Config' ) ? AHF_Config::menu_url( $url ) : $url,
				'courses' => array(),
			);
		}

		return $groups;
	}

	/**
	 * Detect course post types, preferring those with published content.
	 *
	 * This site stores catalog items as `course`. LearnPress may also
	 * register empty `lp_course`, which must not win the lookup.
	 *
	 * @return string[]
	 */
	public static function detect_course_post_types() {
		$candidates = array( 'course', 'lp_course' );
		$existing   = array();
		$with_posts = array();

		foreach ( $candidates as $candidate ) {
			if ( ! post_type_exists( $candidate ) ) {
				continue;
			}

			$existing[] = $candidate;
			$counts     = wp_count_posts( $candidate );
			$published  = ( $counts && isset( $counts->publish ) ) ? (int) $counts->publish : 0;
			if ( $published > 0 ) {
				$with_posts[] = $candidate;
			}
		}

		return ! empty( $with_posts ) ? $with_posts : $existing;
	}

	/**
	 * Detect the active course post type.
	 *
	 * @return string
	 */
	private static function detect_course_post_type() {
		$types = self::detect_course_post_types();
		return ! empty( $types ) ? (string) $types[0] : '';
	}

	/**
	 * Detect the best taxonomy for the selected post type(s).
	 *
	 * Prefers taxonomies actually attached to the course post type.
	 *
	 * @param string|string[] $post_type Course post type or list of types.
	 * @return string
	 */
	public static function detect_course_taxonomy( $post_type ) {
		$candidates = array( 'course_category', 'lp_course_category' );
		$post_types = is_array( $post_type ) ? $post_type : array( (string) $post_type );
		$post_types = array_filter( array_map( 'strval', $post_types ) );

		foreach ( $post_types as $type ) {
			if ( '' === $type ) {
				continue;
			}
			foreach ( $candidates as $candidate ) {
				if ( taxonomy_exists( $candidate ) && is_object_in_taxonomy( $type, $candidate ) ) {
					return $candidate;
				}
			}
		}

		foreach ( $candidates as $candidate ) {
			if ( taxonomy_exists( $candidate ) ) {
				return $candidate;
			}
		}

		return '';
	}

	/**
	 * Map a course category to an existing WP page (not the taxonomy archive).
	 *
	 * Prefers known SucceedLEARN solution pages, then page slug/title match.
	 *
	 * @param WP_Term $term         Course category term.
	 * @param string  $courses_base Courses archive path fallback.
	 * @return string Absolute or site-relative URL.
	 */
	private static function resolve_category_page_url( $term, $courses_base ) {
		$term_slug  = sanitize_title( (string) ( $term->slug ?? '' ) );
		$term_label = wp_specialchars_decode( (string) ( $term->name ?? '' ), ENT_QUOTES );
		$term_key   = self::normalize_label_key( $term_label );
		$page_map   = self::get_category_page_map();

		// 1) Explicit slug map (built from SucceedLEARN solution pages + filter).
		if ( '' !== $term_slug && ! empty( $page_map[ $term_slug ] ) ) {
			$path = (string) $page_map[ $term_slug ];
			return class_exists( 'AHF_Config' ) ? AHF_Config::menu_url( $path ) : home_url( $path );
		}

		$label_slug = sanitize_title( $term_label );
		if ( '' !== $label_slug && ! empty( $page_map[ $label_slug ] ) ) {
			$path = (string) $page_map[ $label_slug ];
			return class_exists( 'AHF_Config' ) ? AHF_Config::menu_url( $path ) : home_url( $path );
		}

		// 2) Match against the curated SucceedLEARN solutions page list by label.
		if ( class_exists( 'AHF_Menu_Items' ) ) {
			foreach ( AHF_Menu_Items::get_succeedlearn_solutions() as $solution ) {
				$solution_label = (string) ( $solution['label'] ?? '' );
				$solution_url   = (string) ( $solution['url'] ?? '' );
				if ( '' === $solution_url ) {
					continue;
				}

				$solution_key = self::normalize_label_key( $solution_label );
				if ( '' !== $term_key && $term_key === $solution_key ) {
					return class_exists( 'AHF_Config' )
						? AHF_Config::menu_url( $solution_url )
						: home_url( $solution_url );
				}
			}
		}

		// 3) Exact page by category slug / solutions/{slug}.
		if ( '' !== $term_slug ) {
			foreach ( array( $term_slug, 'solutions/' . $term_slug, 'solution/' . $term_slug ) as $path ) {
				$page = get_page_by_path( $path );
				if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
					$permalink = get_permalink( $page );
					if ( $permalink ) {
						return $permalink;
					}
				}
			}
		}

		// 4) Page titled the same as the category.
		if ( '' !== $term_label ) {
			$pages = get_posts(
				array(
					'post_type'              => 'page',
					'post_status'            => 'publish',
					'title'                  => $term_label,
					'posts_per_page'         => 1,
					'no_found_rows'          => true,
					'update_post_meta_cache' => false,
					'update_post_term_cache' => false,
				)
			);

			if ( ! empty( $pages[0] ) && $pages[0] instanceof WP_Post ) {
				$permalink = get_permalink( $pages[0] );
				if ( $permalink ) {
					return $permalink;
				}
			}
		}

		// 5) Safe fallback: courses archive anchor (never taxonomy archive).
		$fallback = $courses_base . '#cca-category-' . $term_slug;
		return class_exists( 'AHF_Config' )
			? AHF_Config::menu_url( $fallback )
			: home_url( $fallback );
	}

	/**
	 * Normalize labels for fuzzy matching.
	 *
	 * @param string $label Label text.
	 * @return string
	 */
	private static function normalize_label_key( $label ) {
		$label = strtolower( wp_strip_all_tags( (string) $label ) );
		$label = preg_replace( '/[^a-z0-9]+/', '', $label );
		return is_string( $label ) ? $label : '';
	}

	/**
	 * @param WP_Post $post Course post.
	 * @return array<string, mixed>|null
	 */
	private static function format_course( $post ) {
		if ( ! $post instanceof WP_Post ) {
			return null;
		}

		$permalink = get_permalink( $post );
		if ( ! $permalink ) {
			return null;
		}

		$meta_title = get_post_meta( $post->ID, 'course_title', true );
		$label      = is_string( $meta_title ) && '' !== trim( $meta_title )
			? wp_specialchars_decode( wp_strip_all_tags( $meta_title ), ENT_QUOTES )
			: wp_specialchars_decode( get_the_title( $post ), ENT_QUOTES );

		$raw_excerpt = $post->post_excerpt;
		if ( ! is_string( $raw_excerpt ) || '' === trim( $raw_excerpt ) ) {
			$raw_excerpt = $post->post_content;
		}
		$description = wp_trim_words( wp_strip_all_tags( (string) $raw_excerpt ), 22, '…' );

		$image_url    = '';
		$image_width  = 640;
		$image_height = 400;

		if ( has_post_thumbnail( $post ) ) {
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'akaza-course-card' );
			if ( ! $thumb ) {
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'medium_large' );
			}
			if ( is_array( $thumb ) && ! empty( $thumb[0] ) ) {
				$image_url    = (string) $thumb[0];
				$image_width  = ! empty( $thumb[1] ) ? (int) $thumb[1] : 640;
				$image_height = ! empty( $thumb[2] ) ? (int) $thumb[2] : 400;
			}
		}

		return array(
			'id'           => (int) $post->ID,
			'label'        => $label,
			'url'          => $permalink,
			'description'  => $description,
			'image'        => $image_url,
			'image_width'  => $image_width,
			'image_height' => $image_height,
		);
	}

	/**
	 * Whether any course in the mega tree matches the current request.
	 */
	public static function tree_has_active_page() {
		foreach ( self::get_mega_menu_tree() as $category ) {
			foreach ( (array) ( $category['courses'] ?? array() ) as $course ) {
				$path = self::permalink_to_menu_path( (string) ( $course['url'] ?? '' ) );
				if ( $path && class_exists( 'AHF_Config' ) && AHF_Config::is_menu_url_active( $path ) ) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * @param string $url Absolute URL.
	 * @return string
	 */
	private static function permalink_to_menu_path( $url ) {
		if ( '' === $url || ! class_exists( 'AHF_Menu_Items' ) ) {
			return '';
		}

		return AHF_Menu_Items::absolute_url_to_menu_path( $url );
	}
}
