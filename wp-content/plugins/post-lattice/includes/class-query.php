<?php
/**
 * Post queries and card formatting.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Query published items for the grid.
 */
class Post_Lattice_Query {

	/**
	 * Category taxonomy for a post type.
	 *
	 * @param string $post_type Post type.
	 * @return string
	 */
	public static function taxonomy_for_type( $post_type ) {
		$post_type = $post_type ? $post_type : 'post';

		if ( 'post' === $post_type ) {
			return 'category';
		}

		$taxonomies = get_object_taxonomies( $post_type, 'objects' );

		if ( empty( $taxonomies ) ) {
			return 'category';
		}

		foreach ( $taxonomies as $taxonomy ) {
			if ( ! empty( $taxonomy->hierarchical ) ) {
				return $taxonomy->name;
			}
		}

		$first = reset( $taxonomies );

		return ( is_object( $first ) && ! empty( $first->name ) ) ? (string) $first->name : 'category';
	}

	/**
	 * Terms used as filter pills.
	 *
	 * @param array $config Merged instance config.
	 * @return WP_Term[]
	 */
	public static function filter_terms( $config ) {
		$post_types = self::config_post_types( $config );
		$exclude    = array_map( 'absint', (array) $config['exclude_categories'] );
		$include    = array_map( 'absint', (array) $config['include_categories'] );
		$by_id      = array();

		foreach ( $post_types as $type ) {
			$taxonomy = self::taxonomy_for_type( $type );
			$args     = array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => true,
				'orderby'    => 'name',
				'order'      => 'ASC',
			);
			if ( ! empty( $include ) ) {
				$args['include'] = $include;
			}

			$terms = get_terms( $args );
			if ( is_wp_error( $terms ) || empty( $terms ) ) {
				continue;
			}

			foreach ( $terms as $term ) {
				if ( in_array( (int) $term->term_id, $exclude, true ) ) {
					continue;
				}
				$by_id[ (int) $term->term_id ] = $term;
			}
		}

		return array_values( $by_id );
	}

	/**
	 * Tags used as filter values.
	 *
	 * @param array $config Merged instance config.
	 * @return WP_Term[]
	 */
	public static function filter_tags( $config ) {
		$terms = get_terms(
			array(
				'taxonomy'   => 'post_tag',
				'hide_empty' => true,
				'orderby'    => 'name',
				'order'      => 'ASC',
			)
		);

		if ( is_wp_error( $terms ) || empty( $terms ) ) {
			return array();
		}

		return array_values( $terms );
	}

	/**
	 * Unique years from formatted cards, newest first.
	 *
	 * @param array $cards Formatted cards.
	 * @return string[]
	 */
	public static function years_from_cards( $cards ) {
		$years = array();

		foreach ( (array) $cards as $card ) {
			if ( empty( $card['year'] ) ) {
				continue;
			}
			$years[ (string) $card['year'] ] = true;
		}

		$years = array_keys( $years );
		rsort( $years, SORT_NUMERIC );

		return $years;
	}

	/**
	 * WP_Query orderby args.
	 *
	 * @param string $sort Sort key.
	 * @return array
	 */
	public static function sort_args( $sort ) {
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
	 * Estimated read time.
	 *
	 * @param int $post_id Post ID.
	 * @return string
	 */
	public static function read_time( $post_id ) {
		$post = get_post( $post_id );

		if ( ! $post ) {
			return '';
		}

		$content = wp_strip_all_tags( $post->post_content );
		$words   = str_word_count( $content );
		$minutes = max( 1, (int) ceil( $words / 200 ) );

		return sprintf(
			/* translators: %d: minutes */
			_n( '%d min read', '%d min read', $minutes, 'post-lattice' ),
			$minutes
		);
	}

	/**
	 * Format one card.
	 *
	 * @param int    $post_id  Post ID.
	 * @param array  $config   Instance config.
	 * @param string $taxonomy Term taxonomy.
	 * @return array|null
	 */
	public static function format_card( $post_id, $config, $taxonomy ) {
		$post = get_post( $post_id );

		if ( ! $post || 'publish' !== $post->post_status ) {
			return null;
		}

		$thumbnail = get_the_post_thumbnail_url( $post_id, 'plt-card' );

		if ( ! $thumbnail ) {
			$thumbnail = get_the_post_thumbnail_url( $post_id, 'medium_large' );
		}

		if ( ! $thumbnail ) {
			$thumbnail = get_the_post_thumbnail_url( $post_id, 'medium' );
		}

		$excerpt_raw = $post->post_excerpt;

		if ( '' === trim( (string) $excerpt_raw ) ) {
			$excerpt_raw = $post->post_content;
		}

		$excerpt = wp_trim_words(
			wp_strip_all_tags( $excerpt_raw ),
			max( 8, (int) $config['excerpt_words'] ),
			'…'
		);

		$terms            = get_the_terms( $post_id, $taxonomy );
		$categories       = array();
		$category_slugs   = array();
		$primary_category = null;
		$exclude          = array_map( 'absint', (array) $config['exclude_categories'] );
		$tag_slugs        = array();

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				if ( in_array( (int) $term->term_id, $exclude, true ) ) {
					continue;
				}

				$categories[]     = array(
					'id'   => (int) $term->term_id,
					'name' => $term->name,
					'slug' => $term->slug,
				);
				$category_slugs[] = $term->slug;
			}

			$primary_category = ! empty( $categories ) ? $categories[0] : null;
		}

		$tags = get_the_terms( $post_id, 'post_tag' );
		if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
			foreach ( $tags as $tag ) {
				$tag_slugs[] = (string) $tag->slug;
			}
		}

		return array(
			'id'               => (int) $post_id,
			'title'            => get_the_title( $post_id ),
			'excerpt'          => $excerpt,
			'thumbnail'        => $thumbnail ? $thumbnail : '',
			'url'              => get_permalink( $post_id ),
			'date'             => get_the_date( '', $post_id ),
			'date_iso'         => get_the_date( 'c', $post_id ),
			'read_time'        => self::read_time( $post_id ),
			'categories'       => $categories,
			'category_slugs'   => $category_slugs,
			'primary_category' => $primary_category,
			'tag_slugs'        => $tag_slugs,
			'sort_date'        => (int) get_post_time( 'U', true, $post_id ),
			'year'             => get_the_date( 'Y', $post_id ),
		);
	}

	/**
	 * Fetch formatted cards.
	 *
	 * @param array $config Instance config.
	 * @return array
	 */
	public static function get_cards( $config ) {
		$post_types = self::config_post_types( $config );
		$taxonomy   = self::taxonomy_for_type( $post_types[0] );
		$max      = max( 1, (int) $config['max_posts'] );

		$query = array(
			'post_type'              => $post_types,
			'posts_per_page'         => $max,
			'post_status'            => 'publish',
			'fields'                 => 'ids',
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => true,
			'ignore_sticky_posts'    => true,
		);

		$tax_query = array();

		if ( ! empty( $config['include_categories'] ) ) {
			$tax_query[] = array(
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => array_map( 'absint', $config['include_categories'] ),
			);
		}

		if ( ! empty( $config['exclude_categories'] ) ) {
			$tax_query[] = array(
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => array_map( 'absint', $config['exclude_categories'] ),
				'operator' => 'NOT IN',
			);
		}

		if ( Post_Lattice_Features::can_use( Post_Lattice_Features::TAG_FILTERS ) ) {
			if ( ! empty( $config['include_tags'] ) ) {
				$tax_query[] = array(
					'taxonomy' => 'post_tag',
					'field'    => 'term_id',
					'terms'    => array_map( 'absint', (array) $config['include_tags'] ),
				);
			}

			if ( ! empty( $config['exclude_tags'] ) ) {
				$tax_query[] = array(
					'taxonomy' => 'post_tag',
					'field'    => 'term_id',
					'terms'    => array_map( 'absint', (array) $config['exclude_tags'] ),
					'operator' => 'NOT IN',
				);
			}
		}

		if ( ! empty( $config['years'] ) ) {
			$date_query = array( 'relation' => 'OR' );

			foreach ( (array) $config['years'] as $year ) {
				$year = absint( $year );
				if ( ! $year ) {
					continue;
				}
				$date_query[] = array(
					'year' => $year,
				);
			}

			if ( count( $date_query ) > 1 ) {
				$query['date_query'] = $date_query; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_date_query
			}
		}

		if ( ! empty( $config['related_mode'] ) && Post_Lattice_Features::can_use( Post_Lattice_Features::RELATED_CONTEXT ) ) {
			$current_id = get_queried_object_id();
			$current_id = $current_id ? absint( $current_id ) : 0;

			if ( $current_id && is_singular( $post_types ) ) {
				$query['post__not_in'] = array( $current_id ); // phpcs:ignore WordPressVIPMinimum.Performance.WPQueryParams.PostNotIn_post__not_in -- Single current post excluded in related mode.
				$current_terms         = get_the_terms( $current_id, $taxonomy );

				if ( ! empty( $current_terms ) && ! is_wp_error( $current_terms ) ) {
					$current_term_ids = array_map(
						function ( $term ) {
							return (int) $term->term_id;
						},
						$current_terms
					);

					if ( ! empty( $current_term_ids ) ) {
						$tax_query[] = array(
							'taxonomy' => $taxonomy,
							'field'    => 'term_id',
							'terms'    => $current_term_ids,
						);
					}
				}
			}
		}

		if ( count( $tax_query ) > 1 ) {
			$tax_query['relation'] = 'AND';
		}

		if ( ! empty( $tax_query ) ) {
			$query['tax_query'] = $tax_query; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
		}

		$post_ids = get_posts(
			array_merge(
				$query,
				self::sort_args( $config['default_sort'] )
			)
		);

		$cards = array();

		foreach ( $post_ids as $post_id ) {
			$card = self::format_card( (int) $post_id, $config, $taxonomy );

			if ( $card ) {
				$cards[] = $card;
			}
		}

		return $cards;
	}

	/**
	 * Normalize post types from config with fallback.
	 *
	 * @param array $config Instance config.
	 * @return string[]
	 */
	private static function config_post_types( $config ) {
		$post_types = isset( $config['post_types'] ) ? (array) $config['post_types'] : array();
		$post_types = array_values(
			array_filter(
				array_map( 'sanitize_key', $post_types ),
				'post_type_exists'
			)
		);

		if ( empty( $post_types ) ) {
			$fallback = isset( $config['post_type'] ) ? sanitize_key( (string) $config['post_type'] ) : 'post';
			$post_types[] = post_type_exists( $fallback ) ? $fallback : 'post';
		}

		return array_values( array_unique( $post_types ) );
	}
}
