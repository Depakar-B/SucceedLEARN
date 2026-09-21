<?php
/**
 * Shortcode registration.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * [post_lattice] shortcode.
 */
class Post_Lattice_Shortcode {

	/**
	 * Register shortcode.
	 */
	public static function register() {
		add_shortcode( 'post_lattice', array( __CLASS__, 'render' ) );
	}

	/**
	 * Render shortcode.
	 *
	 * @param array|string $atts Shortcode attributes.
	 * @return string
	 */
	public static function render( $atts ) {
		$atts = shortcode_atts(
			array(
				'id'                  => '',
				'profile'             => '',
				'post_type'           => '',
				'post_types'          => '',
				'include_categories'  => '',
				'exclude_categories'  => '',
				'include_tags'        => '',
				'exclude_tags'        => '',
				'years'               => '',
				'enabled_filters'     => '',
				'related_mode'        => '',
				'filter'              => '',
				'filter_type'         => '',
				'card_badge'          => '',
				'columns'             => '',
				'columns_desktop'     => '',
				'page_size'           => '',
				'max_posts'           => '',
				'sort'                => '',
				'default_sort'        => '',
				'title'               => '',
				'subtitle'            => '',
				'description'         => '',
				'show_hero'           => '',
				'show_search'         => '',
				'show_sort'           => '',
				'show_reset'          => '',
				'show_filters'        => '',
				'show_cta'            => '',
			),
			$atts,
			'post_lattice'
		);

		$profile_overrides = self::resolve_profile_overrides( $atts );
		$overrides         = self::normalize( $atts, $profile_overrides );

		return Post_Lattice_Renderer::render( $overrides );
	}

	/**
	 * Map friendly shortcode attrs onto option keys.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return array
	 */
	private static function normalize( $atts, $base = array() ) {
		$out = is_array( $base ) ? $base : array();

		$map = array(
			'post_type'          => 'post_type',
			'card_badge'         => 'card_badge',
			'columns_desktop'    => 'columns_desktop',
			'page_size'          => 'page_size',
			'max_posts'          => 'max_posts',
			'show_hero'          => 'show_hero',
			'show_search'        => 'show_search',
			'show_sort'          => 'show_sort',
			'show_reset'         => 'show_reset',
			'show_filters'       => 'show_filters',
			'show_cta'           => 'show_cta',
			'related_mode'       => 'related_mode',
		);

		foreach ( $map as $attr => $option ) {
			if ( '' !== $atts[ $attr ] ) {
				$out[ $option ] = $atts[ $attr ];
			}
		}

		if ( '' !== $atts['filter'] ) {
			$out['filter_type'] = $atts['filter'];
		} elseif ( '' !== $atts['filter_type'] ) {
			$out['filter_type'] = $atts['filter_type'];
		}

		if ( '' !== $atts['sort'] ) {
			$out['default_sort'] = $atts['sort'];
		} elseif ( '' !== $atts['default_sort'] ) {
			$out['default_sort'] = $atts['default_sort'];
		}

		if ( '' !== $atts['columns'] ) {
			$out['columns_desktop'] = $atts['columns'];
		}

		if ( '' !== $atts['title'] ) {
			$out['hero_title'] = $atts['title'];
		}

		if ( '' !== $atts['subtitle'] ) {
			$out['hero_subtitle'] = $atts['subtitle'];
		}

		if ( '' !== $atts['description'] ) {
			$out['hero_description'] = $atts['description'];
		}

		if ( '' !== $atts['include_categories'] ) {
			$out['include_categories'] = self::terms_to_ids( $atts['include_categories'], $atts['post_type'] );
		}

		if ( '' !== $atts['post_types'] ) {
			$out['post_types'] = array_values(
				array_filter(
					array_map( 'sanitize_key', array_map( 'trim', explode( ',', (string) $atts['post_types'] ) ) ),
					'post_type_exists'
				)
			);
			if ( ! empty( $out['post_types'] ) ) {
				$out['post_type'] = $out['post_types'][0];
			}
		} elseif ( '' !== $atts['post_type'] ) {
			$out['post_types'] = array( sanitize_key( (string) $atts['post_type'] ) );
		}

		if ( '' !== $atts['exclude_categories'] ) {
			$out['exclude_categories'] = self::terms_to_ids( $atts['exclude_categories'], $atts['post_type'] );
		}

		if ( '' !== $atts['include_tags'] ) {
			$out['include_tags'] = self::tags_to_ids( $atts['include_tags'] );
		}

		if ( '' !== $atts['exclude_tags'] ) {
			$out['exclude_tags'] = self::tags_to_ids( $atts['exclude_tags'] );
		}

		if ( '' !== $atts['years'] ) {
			$out['years'] = array_values(
				array_filter(
					array_map( 'absint', array_map( 'trim', explode( ',', (string) $atts['years'] ) ) )
				)
			);
		}

		if ( '' !== $atts['enabled_filters'] ) {
			$out['enabled_filters'] = array_values(
				array_filter(
					array_map( 'sanitize_key', array_map( 'trim', explode( ',', (string) $atts['enabled_filters'] ) ) )
				)
			);
		}

		foreach ( array( 'show_hero', 'show_search', 'show_sort', 'show_reset', 'show_filters', 'show_cta' ) as $flag ) {
			if ( isset( $out[ $flag ] ) ) {
				$out[ $flag ] = self::to_bool_int( $out[ $flag ] );
			}
		}

		foreach ( array( 'columns_desktop', 'page_size', 'max_posts' ) as $num ) {
			if ( isset( $out[ $num ] ) ) {
				$out[ $num ] = absint( $out[ $num ] );
			}
		}

		return $out;
	}

	/**
	 * Resolve profile config map.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return array
	 */
	private static function resolve_profile_overrides( $atts ) {
		$slug = isset( $atts['id'] ) ? sanitize_title( (string) $atts['id'] ) : '';
		if ( '' === $slug ) {
			$slug = isset( $atts['profile'] ) ? sanitize_title( (string) $atts['profile'] ) : '';
		}
		if ( '' === $slug ) {
			$slug = 'default';
		}

		if ( '' === $slug ) {
			return array();
		}

		$profile = Post_Lattice_Profiles::get_profile( $slug );

		if ( ! $profile ) {
			return array();
		}

		$config = $profile;
		unset( $config['name'], $config['slug'] );
		return $config;
	}

	/**
	 * Convert comma-separated slugs or IDs to term IDs.
	 *
	 * @param string $raw       Attribute value.
	 * @param string $post_type Post type (may be empty).
	 * @return int[]
	 */
	private static function terms_to_ids( $raw, $post_type ) {
		$parts    = array_filter( array_map( 'trim', explode( ',', (string) $raw ) ) );
		$taxonomy = Post_Lattice_Query::taxonomy_for_type( $post_type ? $post_type : Post_Lattice_Options::get_value( 'post_type', 'post' ) );
		$ids      = array();

		foreach ( $parts as $part ) {
			if ( ctype_digit( $part ) ) {
				$ids[] = absint( $part );
				continue;
			}

			$term = get_term_by( 'slug', $part, $taxonomy );

			if ( $term && ! is_wp_error( $term ) ) {
				$ids[] = (int) $term->term_id;
			}
		}

		return array_values( array_unique( $ids ) );
	}

	/**
	 * Convert comma-separated tag slugs or IDs to term IDs.
	 *
	 * @param string $raw Attribute value.
	 * @return int[]
	 */
	private static function tags_to_ids( $raw ) {
		$parts = array_filter( array_map( 'trim', explode( ',', (string) $raw ) ) );
		$ids   = array();

		foreach ( $parts as $part ) {
			if ( ctype_digit( $part ) ) {
				$ids[] = absint( $part );
				continue;
			}

			$term = get_term_by( 'slug', $part, 'post_tag' );
			if ( $term && ! is_wp_error( $term ) ) {
				$ids[] = (int) $term->term_id;
			}
		}

		return array_values( array_unique( $ids ) );
	}

	/**
	 * Cast yes/no/1/0 strings to 1 or 0.
	 *
	 * @param mixed $value Incoming value.
	 * @return int
	 */
	private static function to_bool_int( $value ) {
		if ( is_bool( $value ) ) {
			return $value ? 1 : 0;
		}

		$value = strtolower( trim( (string) $value ) );

		if ( in_array( $value, array( '0', 'false', 'no', 'off' ), true ) ) {
			return 0;
		}

		return 1;
	}
}
