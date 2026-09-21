<?php
/**
 * Single post helpers — blog and newsletter article pages.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether a post is in the Newsletter category.
 *
 * @param int $post_id Post ID. Defaults to current post.
 * @return bool
 */
function akaza_is_newsletter_post( $post_id = 0 ) {
	$post_id = $post_id ? absint( $post_id ) : (int) get_queried_object_id();
	if ( ! $post_id ) {
		return false;
	}

	$terms = get_the_category( $post_id );
	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return false;
	}

	foreach ( $terms as $term ) {
		if ( function_exists( 'akaza_is_newsletter_term' ) && akaza_is_newsletter_term( $term ) ) {
			return true;
		}
		if ( in_array( $term->slug, array( 'newsletter', 'newsletters' ), true ) ) {
			return true;
		}
		if ( 0 === strcasecmp( (string) $term->name, 'Newsletter' ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Newsletter listing page URL.
 *
 * @return string
 */
function akaza_newsletter_listing_url() {
	return function_exists( 'akaza_page_url' ) ? akaza_page_url( 'newsletter' ) : home_url( '/newsletter/' );
}

/**
 * Related posts for a single article.
 *
 * Newsletter posts pull other newsletters. Blog posts pull the same topic
 * category, excluding the newsletter category.
 *
 * @param int $post_id Post ID.
 * @param int $count   Number of cards.
 * @return array
 */
function akaza_get_related_posts( $post_id, $count = 3 ) {
	$post_id = absint( $post_id );
	$count   = max( 1, absint( $count ) );

	if ( ! $post_id ) {
		return array();
	}

	$is_newsletter = akaza_is_newsletter_post( $post_id );
	$exclude       = array( $post_id );
	$ids           = array();

	$query = array(
		'post_type'              => 'post',
		'post_status'            => 'publish',
		'posts_per_page'         => $count,
		'post__not_in'           => $exclude,
		'fields'                 => 'ids',
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => true,
		'orderby'                => 'date',
		'order'                  => 'DESC',
	);

	if ( $is_newsletter ) {
		$query['category_name'] = function_exists( 'akaza_newsletter_category_slug' )
			? akaza_newsletter_category_slug()
			: 'newsletter';
		$ids = get_posts( $query );
	} else {
		$category_ids  = array();
		$newsletter_id = function_exists( 'akaza_newsletter_category_id' ) ? akaza_newsletter_category_id() : 0;
		$terms         = get_the_category( $post_id );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				if ( $newsletter_id && (int) $term->term_id === $newsletter_id ) {
					continue;
				}
				$category_ids[] = (int) $term->term_id;
			}
		}

		if ( $category_ids ) {
			$query['category__in'] = $category_ids;
		}

		if ( $newsletter_id ) {
			$query['category__not_in'] = array( $newsletter_id );
		}

		$ids = get_posts( $query );

		if ( count( $ids ) < $count ) {
			$needed          = $count - count( $ids );
			$exclude         = array_merge( $exclude, $ids );
			$fill            = $query;
			$fill['post__not_in'] = $exclude;
			$fill['posts_per_page'] = $needed;
			unset( $fill['category__in'] );
			$ids = array_merge( $ids, get_posts( $fill ) );
		}
	}

	$posts = array();
	foreach ( $ids as $id ) {
		$card = function_exists( 'akaza_format_blog_card' ) ? akaza_format_blog_card( $id ) : null;
		if ( $card ) {
			$posts[] = $card;
		}
		if ( count( $posts ) >= $count ) {
			break;
		}
	}

	return $posts;
}

/**
 * Whether the editor TOC checkbox is on for a post.
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function akaza_post_toc_enabled( $post_id = 0 ) {
	$post_id = $post_id ? absint( $post_id ) : (int) get_queried_object_id();
	if ( ! $post_id ) {
		return false;
	}

	return (bool) get_post_meta( $post_id, 'akaza_show_toc', true );
}

/**
 * Whether the TOC should render (meta on and at least one H2).
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function akaza_post_has_toc( $post_id = 0 ) {
	$post_id = $post_id ? absint( $post_id ) : (int) get_queried_object_id();
	if ( ! $post_id || ! akaza_post_toc_enabled( $post_id ) ) {
		return false;
	}

	return ! empty( akaza_get_post_toc_items( $post_id ) );
}

/**
 * Unique slug for a heading, avoiding collisions.
 *
 * @param string $text Heading text.
 * @param array  $used Used ids.
 * @return string
 */
function akaza_toc_unique_id( $text, array &$used ) {
	$base = sanitize_title( $text );
	if ( '' === $base ) {
		$base = 'section';
	}

	$id    = $base;
	$index = 2;
	while ( isset( $used[ $id ] ) ) {
		$id = $base . '-' . $index;
		++$index;
	}
	$used[ $id ] = true;

	return $id;
}

/**
 * H2 items for the table of contents.
 *
 * @param int $post_id Post ID.
 * @return array<int, array{id:string,title:string}>
 */
function akaza_get_post_toc_items( $post_id ) {
	static $cache = array();

	$post_id = absint( $post_id );
	if ( ! $post_id ) {
		return array();
	}

	if ( isset( $cache[ $post_id ] ) ) {
		return $cache[ $post_id ];
	}

	$post = get_post( $post_id );
	if ( ! $post ) {
		$cache[ $post_id ] = array();
		return $cache[ $post_id ];
	}

	$content = $post->post_content;
	if ( has_blocks( $content ) ) {
		$content = do_blocks( $content );
	} else {
		$content = wpautop( $content );
	}

	$items             = akaza_parse_toc_h2s( $content );
	$cache[ $post_id ] = $items;

	return $items;
}

/**
 * Parse H2 headings from HTML.
 *
 * @param string $html Content HTML.
 * @return array<int, array{id:string,title:string}>
 */
function akaza_parse_toc_h2s( $html ) {
	if ( ! is_string( $html ) || false === stripos( $html, '<h2' ) ) {
		return array();
	}

	$previous = libxml_use_internal_errors( true );
	$dom      = new DOMDocument();
	$wrapped  = '<?xml encoding="utf-8"><div id="akaza-toc-root">' . $html . '</div>';
	$loaded   = $dom->loadHTML( $wrapped, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
	libxml_clear_errors();
	libxml_use_internal_errors( $previous );

	if ( ! $loaded ) {
		return array();
	}

	$root = $dom->getElementById( 'akaza-toc-root' );
	if ( ! $root ) {
		return array();
	}

	$items = array();
	$used  = array();
	$nodes = $root->getElementsByTagName( 'h2' );

	foreach ( $nodes as $node ) {
		$title = trim( preg_replace( '/\s+/', ' ', $node->textContent ) );
		if ( '' === $title ) {
			continue;
		}

		$existing = $node->getAttribute( 'id' );
		$id       = $existing ? $existing : akaza_toc_unique_id( $title, $used );
		if ( $existing ) {
			$used[ $existing ] = true;
		}

		$items[] = array(
			'id'    => $id,
			'title' => $title,
		);
	}

	return $items;
}

/**
 * Add ids to article H2s so TOC links can scroll.
 *
 * @param string $content Rendered post HTML.
 * @param int    $post_id Post ID.
 * @return string
 */
function akaza_inject_toc_heading_ids_for_post( $content, $post_id ) {
	$post_id = absint( $post_id );
	if ( ! $post_id || ! akaza_post_toc_enabled( $post_id ) ) {
		return $content;
	}

	if ( ! is_string( $content ) || false === stripos( $content, '<h2' ) ) {
		return $content;
	}

	$previous = libxml_use_internal_errors( true );
	$dom      = new DOMDocument();
	$wrapped  = '<?xml encoding="utf-8"><div id="akaza-toc-root">' . $content . '</div>';
	$loaded   = $dom->loadHTML( $wrapped, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
	libxml_clear_errors();
	libxml_use_internal_errors( $previous );

	if ( ! $loaded ) {
		return $content;
	}

	$root = $dom->getElementById( 'akaza-toc-root' );
	if ( ! $root ) {
		return $content;
	}

	$used  = array();
	$nodes = $root->getElementsByTagName( 'h2' );

	foreach ( $nodes as $node ) {
		$title = trim( preg_replace( '/\s+/', ' ', $node->textContent ) );
		if ( '' === $title ) {
			continue;
		}

		$existing = $node->getAttribute( 'id' );
		if ( $existing ) {
			$used[ $existing ] = true;
			continue;
		}

		$node->setAttribute( 'id', akaza_toc_unique_id( $title, $used ) );
	}

	$html = '';
	foreach ( $root->childNodes as $child ) {
		$html .= $dom->saveHTML( $child );
	}

	return $html ? $html : $content;
}

/**
 * the_content filter — inject TOC heading ids on desktop single posts.
 *
 * @param string $content Post content.
 * @return string
 */
function akaza_inject_toc_heading_ids( $content ) {
	if ( ! is_singular( 'post' ) || ! in_the_loop() || ! is_main_query() ) {
		return $content;
	}

	$post_id = get_the_ID();
	if ( ! $post_id ) {
		return $content;
	}

	return akaza_inject_toc_heading_ids_for_post( $content, $post_id );
}
add_filter( 'the_content', 'akaza_inject_toc_heading_ids', 20 );

/**
 * Cookie that keeps the TOC panel available after akaza_toc=1 is stripped from the URL.
 */
function akaza_toc_editor_cookie_name() {
	return 'akaza_toc_ui';
}

/**
 * Current request wants the hidden TOC editor panel.
 *
 * @param string $flag Raw query value.
 * @return bool
 */
function akaza_toc_flag_is_on( $flag ) {
	$flag = sanitize_key( (string) $flag );
	return '1' === $flag || 'true' === $flag || 'yes' === $flag;
}

/**
 * TOC checkbox is hidden unless unlocked with &akaza_toc=1 (then the URL is cleaned).
 *
 * @return bool
 */
function akaza_is_toc_editor_unlocked() {
	if ( ! is_admin() ) {
		return false;
	}

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( isset( $_GET['akaza_toc'] ) && akaza_toc_flag_is_on( wp_unslash( $_GET['akaza_toc'] ) ) ) {
		return true;
	}

	$cookie = akaza_toc_editor_cookie_name();
	if ( isset( $_COOKIE[ $cookie ] ) && akaza_toc_flag_is_on( wp_unslash( $_COOKIE[ $cookie ] ) ) ) {
		return true;
	}

	return false;
}

/**
 * Remember unlock, then drop akaza_toc from the address bar.
 */
function akaza_toc_editor_clean_url() {
	if ( ! is_admin() || ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	global $pagenow;
	if ( ! in_array( $pagenow, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}

	if ( ! isset( $_GET['akaza_toc'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$flag   = sanitize_key( wp_unslash( $_GET['akaza_toc'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$cookie = akaza_toc_editor_cookie_name();
	$secure = is_ssl();

	if ( akaza_toc_flag_is_on( $flag ) ) {
		setcookie( $cookie, '1', 0, defined( 'SITECOOKIEPATH' ) ? SITECOOKIEPATH : '/', COOKIE_DOMAIN, $secure, true );
		$_COOKIE[ $cookie ] = '1';
	} elseif ( '0' === $flag || 'off' === $flag || 'no' === $flag ) {
		setcookie( $cookie, '', time() - 3600, defined( 'SITECOOKIEPATH' ) ? SITECOOKIEPATH : '/', COOKIE_DOMAIN, $secure, true );
		unset( $_COOKIE[ $cookie ] );
	} else {
		return;
	}

	$target = remove_query_arg( 'akaza_toc' );
	if ( $target ) {
		wp_safe_redirect( $target );
		exit;
	}
}
add_action( 'admin_init', 'akaza_toc_editor_clean_url', 1 );

/**
 * Register TOC post meta.
 */
function akaza_register_toc_meta() {
	register_post_meta(
		'post',
		'akaza_show_toc',
		array(
			'type'              => 'boolean',
			'single'            => true,
			'default'           => false,
			'show_in_rest'      => true,
			'sanitize_callback' => static function ( $value ) {
				return (bool) $value;
			},
			'auth_callback'     => static function () {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'akaza_register_toc_meta' );

/**
 * Hidden editor checkbox — only when ?akaza_toc=1 is on the edit URL.
 */
function akaza_toc_meta_box() {
	if ( ! akaza_is_toc_editor_unlocked() ) {
		return;
	}

	add_meta_box(
		'akaza-show-toc',
		__( 'Table of contents', 'akaza-adventure' ),
		'akaza_toc_meta_box_render',
		'post',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'akaza_toc_meta_box' );

/**
 * Render TOC meta box.
 *
 * @param WP_Post $post Post.
 */
function akaza_toc_meta_box_render( $post ) {
	wp_nonce_field( 'akaza_save_toc', 'akaza_toc_nonce' );
	$checked = (bool) get_post_meta( $post->ID, 'akaza_show_toc', true );
	?>
	<label for="akaza_show_toc">
		<input type="checkbox" name="akaza_show_toc" id="akaza_show_toc" value="1" <?php checked( $checked ); ?>>
		<?php esc_html_e( 'Show table of contents', 'akaza-adventure' ); ?>
	</label>
	<p class="description">
		<?php esc_html_e( 'Adds a sticky sidebar of this post’s H2 headings. Visitors only see it when this is checked.', 'akaza-adventure' ); ?>
	</p>
	<?php
}

/**
 * Save TOC meta.
 *
 * @param int $post_id Post ID.
 */
function akaza_save_toc_meta( $post_id ) {
	if ( ! isset( $_POST['akaza_toc_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['akaza_toc_nonce'] ) ), 'akaza_save_toc' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['akaza_show_toc'] ) ) {
		update_post_meta( $post_id, 'akaza_show_toc', 1 );
	} else {
		delete_post_meta( $post_id, 'akaza_show_toc' );
	}
}
add_action( 'save_post_post', 'akaza_save_toc_meta' );

/**
 * Enqueue single-post assets.
 */
function akaza_single_post_assets() {
	if ( ! is_singular( 'post' ) ) {
		return;
	}

	$archive_css = AKAZA_DIR . '/assets/css/blog-archive.css';
	$single_css  = AKAZA_DIR . '/assets/css/single-post.css';

	wp_enqueue_style(
		'akaza-blog-archive',
		AKAZA_URI . '/assets/css/blog-archive.css',
		array( 'akaza-main' ),
		file_exists( $archive_css ) ? (string) filemtime( $archive_css ) : AKAZA_VERSION
	);

	wp_enqueue_style(
		'akaza-single-post',
		AKAZA_URI . '/assets/css/single-post.css',
		array( 'akaza-main', 'akaza-blog-archive' ),
		file_exists( $single_css ) ? (string) filemtime( $single_css ) : AKAZA_VERSION
	);

	if ( akaza_post_has_toc() ) {
		$toc_js = AKAZA_DIR . '/assets/js/single-post-toc.js';
		wp_enqueue_script(
			'akaza-single-post-toc',
			AKAZA_URI . '/assets/js/single-post-toc.js',
			array(),
			file_exists( $toc_js ) ? (string) filemtime( $toc_js ) : AKAZA_VERSION,
			array(
				'strategy'  => 'defer',
				'in_footer' => true,
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'akaza_single_post_assets', 25 );

/**
 * Body class for single post layout.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_single_post_body_class( $classes ) {
	if ( ! is_singular( 'post' ) ) {
		return $classes;
	}

	$classes[] = 'slf-single-post';

	if ( akaza_is_newsletter_post() ) {
		$classes[] = 'slf-single-post--newsletter';
	}

	if ( akaza_post_has_toc() ) {
		$classes[] = 'slf-single-post--toc';
	}

	return $classes;
}
add_filter( 'body_class', 'akaza_single_post_body_class' );
