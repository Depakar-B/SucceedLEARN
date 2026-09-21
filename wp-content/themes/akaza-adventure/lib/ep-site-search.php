<?php
/**
 * Shared site search — AJAX suggestions + results helpers.
 *
 * Used by Akaza Header Footer (ahf_site_search) and the theme search page.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Post types included in site search.
 *
 * @return string[]
 */
function ep_site_search_post_types() {
	$types = array( 'post', 'page' );

	if ( function_exists( 'akaza_course_post_type' ) ) {
		$types[] = akaza_course_post_type();
	} else {
		if ( post_type_exists( 'course' ) ) {
			$types[] = 'course';
		} elseif ( post_type_exists( 'lp_course' ) ) {
			$types[] = 'lp_course';
		}
	}

	/**
	 * Filter searchable post types.
	 *
	 * @param string[] $types Post types.
	 */
	return array_values( array_unique( apply_filters( 'ep_site_search_post_types', $types ) ) );
}

/**
 * Page / post IDs that should never appear in search.
 *
 * @return int[]
 */
function ep_site_search_excluded_ids() {
	$ids = array();

	$front = (int) get_option( 'page_on_front' );
	if ( $front ) {
		$ids[] = $front;
	}

	$exclude_slugs = array(
		'cart',
		'checkout',
		'my-account',
		'wishlist',
		'thank-you',
		'order-received',
		'lost-password',
		'wp-login',
	);

	foreach ( $exclude_slugs as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post ) {
			$ids[] = (int) $page->ID;
		}
	}

	/**
	 * Filter excluded post IDs.
	 *
	 * @param int[] $ids Post IDs.
	 */
	return array_values( array_unique( array_filter( array_map( 'intval', apply_filters( 'ep_site_search_excluded_ids', $ids ) ) ) ) );
}

/**
 * Whether a query is only stopwords / too generic to search.
 *
 * @param string $query Raw query.
 * @return bool
 */
function ep_site_search_is_trivial_query( $query ) {
	$query = trim( wp_strip_all_tags( (string) $query ) );
	if ( '' === $query ) {
		return true;
	}

	if ( function_exists( 'wp_get_search_stopwords' ) ) {
		$stopwords = wp_get_search_stopwords();
	} else {
		$stopwords = array( 'a', 'an', 'and', 'are', 'as', 'at', 'be', 'by', 'for', 'from', 'in', 'is', 'it', 'of', 'on', 'or', 'that', 'the', 'this', 'to', 'was', 'with' );
	}

	$tokens = preg_split( '/[\s,\.\-_\/]+/u', mb_strtolower( $query ), -1, PREG_SPLIT_NO_EMPTY );
	if ( empty( $tokens ) ) {
		return true;
	}

	$meaningful = array_filter(
		$tokens,
		static function ( $token ) use ( $stopwords ) {
			$token = (string) $token;
			if ( mb_strlen( $token ) < 2 ) {
				return false;
			}
			return ! in_array( $token, $stopwords, true );
		}
	);

	return empty( $meaningful );
}

/**
 * Human label for a post type.
 *
 * @param string $post_type Post type.
 * @return string
 */
function ep_site_search_type_label( $post_type ) {
	$post_type = (string) $post_type;

	if ( in_array( $post_type, array( 'course', 'lp_course' ), true ) ) {
		return __( 'Course', 'akaza-adventure' );
	}

	if ( 'post' === $post_type ) {
		return __( 'Article', 'akaza-adventure' );
	}

	if ( 'page' === $post_type ) {
		return __( 'Page', 'akaza-adventure' );
	}

	$obj = get_post_type_object( $post_type );
	if ( $obj && ! empty( $obj->labels->singular_name ) ) {
		return (string) $obj->labels->singular_name;
	}

	return __( 'Result', 'akaza-adventure' );
}

/**
 * Clean excerpt for a post.
 *
 * @param WP_Post $post Post object.
 * @param int     $words Word count.
 * @return string
 */
function ep_site_search_excerpt( WP_Post $post, $words = 28 ) {
	$text = $post->post_excerpt;
	if ( '' === trim( (string) $text ) ) {
		$text = $post->post_content;
	}

	$text = wp_strip_all_tags( strip_shortcodes( (string) $text ) );
	$text = preg_replace( '/\s+/u', ' ', $text );
	$text = trim( (string) $text );

	if ( '' === $text ) {
		return '';
	}

	$title = trim( html_entity_decode( get_the_title( $post ), ENT_QUOTES, 'UTF-8' ) );
	if ( $title && 0 === stripos( $text, $title ) ) {
		$text = trim( substr( $text, strlen( $title ) ) );
		$text = ltrim( $text, " \t\n\r\0\x0B-|:." );
	}

	if ( '' === $text ) {
		return '';
	}

	return wp_trim_words( $text, (int) $words, '…' );
}

/**
 * Format one result row.
 *
 * @param WP_Post $post Post.
 * @return array
 */
function ep_site_search_format_result( WP_Post $post ) {
	$type = $post->post_type;

	return array(
		'id'         => (int) $post->ID,
		'title'      => html_entity_decode( get_the_title( $post ), ENT_QUOTES, 'UTF-8' ),
		'url'        => get_permalink( $post ),
		'excerpt'    => ep_site_search_excerpt( $post ),
		'type'       => $type,
		'type_label' => ep_site_search_type_label( $type ),
	);
}

/**
 * Prefer title matches, then keep WP relevance order.
 *
 * @param WP_Post[] $posts Posts.
 * @param string    $query Search query.
 * @return WP_Post[]
 */
function ep_site_search_rank_posts( array $posts, $query ) {
	$query_l = mb_strtolower( trim( (string) $query ) );
	if ( '' === $query_l || count( $posts ) < 2 ) {
		return $posts;
	}

	$scored = array();
	foreach ( $posts as $index => $post ) {
		$title = mb_strtolower( html_entity_decode( get_the_title( $post ), ENT_QUOTES, 'UTF-8' ) );
		$score = 0;

		if ( $title === $query_l ) {
			$score = 300;
		} elseif ( 0 === mb_strpos( $title, $query_l ) ) {
			$score = 200;
		} elseif ( false !== mb_strpos( $title, $query_l ) ) {
			$score = 100;
		}

		$tokens = preg_split( '/\s+/u', $query_l, -1, PREG_SPLIT_NO_EMPTY );
		if ( is_array( $tokens ) ) {
			foreach ( $tokens as $token ) {
				if ( mb_strlen( $token ) >= 2 && false !== mb_strpos( $title, $token ) ) {
					$score += 20;
				}
			}
		}

		// Courses ahead of pages/posts when scores tie.
		if ( in_array( $post->post_type, array( 'course', 'lp_course' ), true ) ) {
			$score += 5;
		} elseif ( 'page' === $post->post_type ) {
			$score += 2;
		}

		$scored[] = array(
			'score' => $score,
			'index' => $index,
			'post'  => $post,
		);
	}

	usort(
		$scored,
		static function ( $a, $b ) {
			if ( $a['score'] === $b['score'] ) {
				return $a['index'] <=> $b['index'];
			}
			return $b['score'] <=> $a['score'];
		}
	);

	return array_map(
		static function ( $row ) {
			return $row['post'];
		},
		$scored
	);
}

/**
 * Run site search.
 *
 * @param string $query Search query.
 * @param array  $args  {
 *     @type string $mode     suggest|full
 *     @type int    $per_page Results per page
 *     @type int    $paged    Page number
 * }
 * @return array{query:string,total:int,results:array,message?:string}
 */
function ep_site_search( $query, $args = array() ) {
	$query = sanitize_text_field( wp_unslash( (string) $query ) );
	$args  = wp_parse_args(
		$args,
		array(
			'mode'     => 'suggest',
			'per_page' => 8,
			'paged'    => 1,
		)
	);

	$mode     = 'full' === $args['mode'] ? 'full' : 'suggest';
	$per_page = max( 1, min( 50, (int) $args['per_page'] ) );
	$paged    = max( 1, (int) $args['paged'] );

	$payload = array(
		'query'   => $query,
		'total'   => 0,
		'results' => array(),
	);

	if ( ep_site_search_is_trivial_query( $query ) ) {
		$payload['message'] = __( 'Try a more specific term — for example a course name, solution, or topic.', 'akaza-adventure' );
		return $payload;
	}

	$fetch = ( 'suggest' === $mode ) ? min( 24, max( $per_page * 2, 12 ) ) : $per_page;

	$q_args = array(
		's'              => $query,
		'post_type'      => ep_site_search_post_types(),
		'post_status'    => 'publish',
		'posts_per_page' => $fetch,
		'paged'          => ( 'suggest' === $mode ) ? 1 : $paged,
		'orderby'        => 'relevance',
		'no_found_rows'  => false,
		'ep_site_search' => true,
	);

	$excluded = ep_site_search_excluded_ids();
	if ( ! empty( $excluded ) ) {
		$q_args['post__not_in'] = $excluded;
	}

	/**
	 * Filter WP_Query args for site search.
	 *
	 * @param array  $q_args Query args.
	 * @param string $query  Search string.
	 * @param array  $args   Mode args.
	 */
	$q_args = apply_filters( 'ep_site_search_query_args', $q_args, $query, $args );

	$wp_query = new WP_Query( $q_args );
	$posts    = is_array( $wp_query->posts ) ? $wp_query->posts : array();
	$posts    = ep_site_search_rank_posts( $posts, $query );

	if ( 'suggest' === $mode ) {
		$posts = array_slice( $posts, 0, $per_page );
	}

	$results = array();
	foreach ( $posts as $post ) {
		if ( $post instanceof WP_Post ) {
			$results[] = ep_site_search_format_result( $post );
		}
	}

	$payload['total']   = (int) $wp_query->found_posts;
	$payload['results'] = $results;

	if ( empty( $results ) ) {
		$payload['message'] = sprintf(
			/* translators: %s: search query */
			__( 'No results for "%s". Try another keyword or browse courses and solutions.', 'akaza-adventure' ),
			$query
		);
	}

	return $payload;
}
