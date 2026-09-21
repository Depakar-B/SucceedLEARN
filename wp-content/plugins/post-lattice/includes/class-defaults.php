<?php
/**
 * Default option values.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default settings for Post Lattice.
 */
class Post_Lattice_Defaults {

	/**
	 * Full default option map.
	 *
	 * @return array
	 */
	public static function all() {
		return array(
			'post_type'              => 'post',
			'post_types'             => array( 'post' ),
			'include_categories'     => array(),
			'exclude_categories'     => array(),
			'include_tags'           => array(),
			'exclude_tags'           => array(),
			'years'                  => array(),
			'enabled_filters'        => array( 'category' ),
			'related_mode'           => 0,
			'filter_type'            => 'category',
			'card_badge'             => 'category',
			'default_view'           => 'grid',
			'columns_desktop'        => 3,
			'columns_tablet'         => 2,
			'columns_mobile'         => 1,
			'columns_4k'             => 4,
			'page_size'              => 12,
			'max_posts'              => 100,
			'excerpt_words'          => 28,
			'default_sort'           => 'newest',
			'show_hero'              => 1,
			'show_search'            => 1,
			'show_sort'              => 1,
			'show_reset'             => 1,
			'show_filters'           => 1,
			'show_view_toggle'       => 1,
			'show_thumbnail'         => 1,
			'show_date'              => 1,
			'show_read_time'         => 1,
			'show_excerpt'           => 1,
			'show_read_more'         => 1,
			'show_load_more'         => 1,
			'show_cta'               => 1,
			'show_hero_button'       => 1,
			'hero_title'             => __( 'Latest Articles', 'post-lattice' ),
			'hero_subtitle'          => __( 'Insights, updates, and stories from our team.', 'post-lattice' ),
			'hero_description'       => __( 'Browse articles by topic or search to find guidance for your audience.', 'post-lattice' ),
			'hero_button_text'       => __( 'Contact Us', 'post-lattice' ),
			'hero_button_url'        => '',
			'search_placeholder'     => __( 'Search articles…', 'post-lattice' ),
			'search_label'           => __( 'Search articles', 'post-lattice' ),
			'clear_search_label'     => __( 'Clear search', 'post-lattice' ),
			'sort_label'             => __( 'Sort articles', 'post-lattice' ),
			'sort_newest'            => __( 'New to Old', 'post-lattice' ),
			'sort_oldest'            => __( 'Old to New', 'post-lattice' ),
			'sort_az'                => __( 'Title A → Z', 'post-lattice' ),
			'sort_za'                => __( 'Title Z → A', 'post-lattice' ),
			'reset_text'             => __( 'Reset', 'post-lattice' ),
			'filter_all_text'        => __( 'All Posts', 'post-lattice' ),
			'filter_all_years_text'  => __( 'All years', 'post-lattice' ),
			'filter_aria_category'   => __( 'Filter by topic', 'post-lattice' ),
			'filter_aria_year'       => __( 'Filter by year', 'post-lattice' ),
			'read_more_text'         => __( 'Read More', 'post-lattice' ),
			'load_more_text'         => __( 'Load more articles', 'post-lattice' ),
			'showing_one'            => __( 'Showing 1 article', 'post-lattice' ),
			'showing_all'            => __( 'Showing all {total} articles', 'post-lattice' ),
			'showing_paged'          => __( 'Showing {visible} of {total} articles', 'post-lattice' ),
			'empty_posts'            => __( 'No articles published yet. Check back soon.', 'post-lattice' ),
			'empty_search'           => __( 'No results found for this search.', 'post-lattice' ),
			'cta_title'              => __( 'Need help getting started?', 'post-lattice' ),
			'cta_description'        => __( 'Talk to our team about a plan that fits your organisation.', 'post-lattice' ),
			'cta_button_text'        => __( 'Contact Us', 'post-lattice' ),
			'cta_button_url'         => '',
			'color_accent'           => '#ea3f23',
			'color_heading'          => '#16234d',
			'color_text'             => '#1a1a1a',
			'color_muted'            => '#4a5568',
			'color_background'       => '#f4f3ee',
			'color_card'             => '#ffffff',
			'color_cta_bg'           => '#16234d',
			'color_cta_text'         => '#ffffff',
			'color_button_bg'        => '#ea3f23',
			'color_button_text'      => '#ffffff',
			'radius'                 => 18,
		);
	}

	/**
	 * Keys stored as integers (checkboxes / counts).
	 *
	 * @return string[]
	 */
	public static function integer_keys() {
		return array(
			'columns_desktop',
			'columns_tablet',
			'columns_mobile',
			'columns_4k',
			'page_size',
			'max_posts',
			'excerpt_words',
			'show_hero',
			'show_search',
			'show_sort',
			'show_reset',
			'show_filters',
			'show_view_toggle',
			'show_thumbnail',
			'show_date',
			'show_read_time',
			'show_excerpt',
			'show_read_more',
			'show_load_more',
			'show_cta',
			'show_hero_button',
			'related_mode',
			'radius',
		);
	}

	/**
	 * Keys stored as ID arrays.
	 *
	 * @return string[]
	 */
	public static function array_keys() {
		return array(
			'include_categories',
			'exclude_categories',
			'include_tags',
			'exclude_tags',
			'years',
			'enabled_filters',
			'post_types',
		);
	}

	/**
	 * Keys stored as hex colors.
	 *
	 * @return string[]
	 */
	public static function color_keys() {
		return array(
			'color_accent',
			'color_heading',
			'color_text',
			'color_muted',
			'color_background',
			'color_card',
			'color_cta_bg',
			'color_cta_text',
			'color_button_bg',
			'color_button_text',
		);
	}

	/**
	 * Allowed sort keys.
	 *
	 * @return string[]
	 */
	public static function allowed_sorts() {
		return array( 'newest', 'oldest', 'a-z', 'z-a' );
	}

	/**
	 * Allowed filter types.
	 *
	 * @return string[]
	 */
	public static function allowed_filters() {
		return array( 'none', 'category', 'year', 'tag' );
	}

	/**
	 * Allowed card badge modes.
	 *
	 * @return string[]
	 */
	public static function allowed_badges() {
		return array( 'category', 'year', 'none' );
	}

	/**
	 * Allowed view modes.
	 *
	 * @return string[]
	 */
	public static function allowed_views() {
		return array( 'grid', 'list' );
	}
}
