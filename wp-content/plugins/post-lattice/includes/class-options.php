<?php
/**
 * Saved options helper.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Read, merge, and sanitize plugin options.
 */
class Post_Lattice_Options {

	const OPTION_KEY = 'plt_options';

	/**
	 * Get merged options (saved over defaults).
	 *
	 * @return array
	 */
	public static function get() {
		$saved = get_option( self::OPTION_KEY, array() );

		if ( ! is_array( $saved ) ) {
			$saved = array();
		}

		return wp_parse_args( $saved, Post_Lattice_Defaults::all() );
	}

	/**
	 * Get one option.
	 *
	 * @param string $key     Option key.
	 * @param mixed  $default Fallback.
	 * @return mixed
	 */
	public static function get_value( $key, $default = null ) {
		$options = self::get();

		if ( array_key_exists( $key, $options ) ) {
			return $options[ $key ];
		}

		return $default;
	}

	/**
	 * Merge instance overrides (shortcode / block) onto saved options.
	 *
	 * @param array $overrides Attribute map.
	 * @return array
	 */
	public static function merge( $overrides = array() ) {
		$options = self::get();

		if ( empty( $overrides ) || ! is_array( $overrides ) ) {
			return $options;
		}

		foreach ( $overrides as $key => $value ) {
			if ( '' === $value || null === $value ) {
				continue;
			}

			if ( ! array_key_exists( $key, $options ) ) {
				continue;
			}

			$options[ $key ] = $value;
		}

		return self::sanitize( $options, false );
	}

	/**
	 * Sanitize a full option array.
	 *
	 * @param mixed $input        Incoming values.
	 * @param bool  $from_request Treat missing checkboxes as 0.
	 * @return array
	 */
	public static function sanitize( $input, $from_request = true ) {
		$defaults = Post_Lattice_Defaults::all();
		$input    = is_array( $input ) ? $input : array();
		$output   = array();

		foreach ( $defaults as $key => $default ) {
			if ( in_array( $key, Post_Lattice_Defaults::array_keys(), true ) ) {
				if ( 'years' === $key && isset( $input[ $key ] ) && is_string( $input[ $key ] ) ) {
					$raw = array_map( 'trim', explode( ',', $input[ $key ] ) );
				} else {
					$raw = isset( $input[ $key ] ) ? (array) $input[ $key ] : array();
				}

				if ( 'post_types' === $key ) {
					$output[ $key ] = array_values(
						array_filter(
							array_map( 'sanitize_key', $raw ),
							'post_type_exists'
						)
					);
				} elseif ( 'enabled_filters' === $key ) {
					$output[ $key ] = array_values(
						array_filter(
							array_map( 'sanitize_key', $raw ),
							function ( $item ) {
								return in_array( $item, array( 'category', 'year', 'tag', 'sort' ), true );
							}
						)
					);
				} else {
					$output[ $key ] = array_values( array_filter( array_map( 'absint', $raw ) ) );
				}
				continue;
			}

			if ( in_array( $key, Post_Lattice_Defaults::integer_keys(), true ) ) {
				if ( 0 === strpos( $key, 'show_' ) ) {
					if ( $from_request ) {
						$output[ $key ] = empty( $input[ $key ] ) ? 0 : 1;
					} else {
						$output[ $key ] = isset( $input[ $key ] ) ? (int) (bool) $input[ $key ] : (int) $default;
					}
					continue;
				}

				$value = isset( $input[ $key ] ) ? (int) $input[ $key ] : (int) $default;
				$output[ $key ] = self::clamp_int( $key, $value );
				continue;
			}

			if ( in_array( $key, Post_Lattice_Defaults::color_keys(), true ) ) {
				$raw            = isset( $input[ $key ] ) ? (string) $input[ $key ] : (string) $default;
				$color          = sanitize_hex_color( $raw );
				$output[ $key ] = $color ? $color : $default;
				continue;
			}

			$raw = isset( $input[ $key ] ) ? $input[ $key ] : $default;

			if ( 'hero_description' === $key || 'cta_description' === $key ) {
				$output[ $key ] = sanitize_textarea_field( $raw );
				continue;
			}

			if ( in_array( $key, array( 'hero_button_url', 'cta_button_url' ), true ) ) {
				$output[ $key ] = esc_url_raw( (string) $raw );
				continue;
			}

			$output[ $key ] = sanitize_text_field( (string) $raw );
		}

		$post_type = post_type_exists( $output['post_type'] ) ? $output['post_type'] : 'post';
		$output['post_type'] = $post_type;
		if ( empty( $output['post_types'] ) ) {
			$output['post_types'] = array( $post_type );
		}
		$output['post_types'] = array_values(
			array_filter(
				array_map( 'sanitize_key', (array) $output['post_types'] ),
				'post_type_exists'
			)
		);
		if ( empty( $output['post_types'] ) ) {
			$output['post_types'] = array( 'post' );
		}

		if ( ! in_array( $output['filter_type'], Post_Lattice_Defaults::allowed_filters(), true ) ) {
			$output['filter_type'] = 'category';
		}

		if ( empty( $output['enabled_filters'] ) ) {
			$output['enabled_filters'] = array( 'category' );
		}

		if ( ! Post_Lattice_Features::can_use( Post_Lattice_Features::MULTI_FILTERS ) && count( $output['enabled_filters'] ) > 1 ) {
			$output['enabled_filters'] = array( $output['enabled_filters'][0] );
		}

		if ( ! Post_Lattice_Features::can_use( Post_Lattice_Features::TAG_FILTERS ) ) {
			$output['enabled_filters'] = array_values( array_diff( $output['enabled_filters'], array( 'tag' ) ) );
			$output['include_tags']    = array();
			$output['exclude_tags']    = array();
		}

		if ( ! Post_Lattice_Features::can_use( Post_Lattice_Features::YEAR_FILTERS ) ) {
			$output['enabled_filters'] = array_values( array_diff( $output['enabled_filters'], array( 'year' ) ) );
			$output['years']           = array();
			if ( 'year' === $output['filter_type'] ) {
				$output['filter_type'] = 'category';
			}
		}

		if ( ! Post_Lattice_Features::can_use( Post_Lattice_Features::RELATED_CONTEXT ) ) {
			$output['related_mode'] = 0;
		}

		if ( ! in_array( $output['card_badge'], Post_Lattice_Defaults::allowed_badges(), true ) ) {
			$output['card_badge'] = 'category';
		}

		if ( ! in_array( $output['default_sort'], Post_Lattice_Defaults::allowed_sorts(), true ) ) {
			$output['default_sort'] = 'newest';
		}

		if ( ! in_array( $output['default_view'], Post_Lattice_Defaults::allowed_views(), true ) ) {
			$output['default_view'] = 'grid';
		}

		return $output;
	}

	/**
	 * Clamp numeric fields to safe ranges.
	 *
	 * @param string $key   Option key.
	 * @param int    $value Incoming value.
	 * @return int
	 */
	private static function clamp_int( $key, $value ) {
		$ranges = array(
			'columns_desktop' => array( 2, 4 ),
			'columns_tablet'  => array( 1, 3 ),
			'columns_mobile'  => array( 1, 2 ),
			'columns_4k'      => array( 2, 6 ),
			'page_size'       => array( 3, 48 ),
			'max_posts'       => array( 1, 500 ),
			'excerpt_words'   => array( 8, 80 ),
			'radius'          => array( 0, 32 ),
		);

		if ( ! isset( $ranges[ $key ] ) ) {
			return max( 0, $value );
		}

		return max( $ranges[ $key ][0], min( $ranges[ $key ][1], $value ) );
	}
}
