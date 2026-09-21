<?php
/**
 * Blog archive helpers — custom listing page (no default WP archive UI).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request uses the Blog page template.
 *
 * Covers both direct page-template views and the Posts page index (home.php).
 *
 * @return bool
 */
function akaza_is_blog_page() {
	if ( is_page_template( 'page-templates/blog.php' ) || is_page_template( 'blog.php' ) ) {
		return true;
	}

	if ( is_home() && ! is_front_page() ) {
		return true;
	}

	if ( is_page( 'blog' ) ) {
		return true;
	}

	return false;
}

/**
 * Newsletter category slug.
 *
 * @return string
 */
function akaza_newsletter_category_slug() {
	return 'newsletter';
}

/**
 * Whether a category term is the newsletter category.
 *
 * @param mixed $term Term object or array.
 * @return bool
 */
function akaza_is_newsletter_term( $term ) {
	$slug = '';
	$name = '';

	if ( $term instanceof WP_Term ) {
		$slug = (string) $term->slug;
		$name = (string) $term->name;
	} elseif ( is_array( $term ) ) {
		$slug = isset( $term['slug'] ) ? (string) $term['slug'] : '';
		$name = isset( $term['name'] ) ? (string) $term['name'] : '';
	}

	if ( in_array( $slug, array( 'newsletter', 'newsletters' ), true ) ) {
		return true;
	}

	return 0 === strcasecmp( $name, 'Newsletter' );
}

/**
 * Newsletter category term ID, or 0 if missing.
 *
 * @return int
 */
function akaza_newsletter_category_id() {
	foreach ( array( 'newsletter', 'newsletters' ) as $slug ) {
		$term = get_category_by_slug( $slug );
		if ( $term && ! is_wp_error( $term ) ) {
			return (int) $term->term_id;
		}
	}

	$named = get_terms(
		array(
			'taxonomy'   => 'category',
			'name'       => 'Newsletter',
			'hide_empty' => false,
			'number'     => 1,
		)
	);

	if ( ! is_wp_error( $named ) && ! empty( $named[0] ) && $named[0] instanceof WP_Term ) {
		return (int) $named[0]->term_id;
	}

	return 0;
}

/**
 * Whether the current request uses the Newsletter page template.
 *
 * @return bool
 */
function akaza_is_newsletter_page() {
	return is_page_template( 'page-templates/newsletter.php' ) || is_page_template( 'newsletter.php' );
}

/**
 * Whether the current request is a blog category archive (not Newsletter).
 *
 * @return bool
 */
function akaza_is_blog_category() {
	if ( ! is_category() ) {
		return false;
	}

	$term = get_queried_object();
	if ( ! ( $term instanceof WP_Term ) ) {
		return false;
	}

	return ! akaza_is_newsletter_term( $term );
}

/**
 * Redirect the Newsletter category archive to the Newsletter listing page.
 */
function akaza_redirect_newsletter_category_archive() {
	if ( ! is_category() ) {
		return;
	}

	$term = get_queried_object();
	if ( ! ( $term instanceof WP_Term ) || ! akaza_is_newsletter_term( $term ) ) {
		return;
	}

	$url = function_exists( 'akaza_newsletter_listing_url' )
		? akaza_newsletter_listing_url()
		: home_url( '/newsletter/' );

	wp_safe_redirect( $url, 301 );
	exit;
}
add_action( 'template_redirect', 'akaza_redirect_newsletter_category_archive', 5 );

/**
 * Bypass Thim Elementor Kit archive-post layout on the theme blog page.
 *
 * @param bool   $skip Skip plugin template override.
 * @param string $tab  Thim module tab.
 * @return bool
 */
function akaza_blog_bypass_thim_ekit( $skip, $tab ) {
	if ( 'archive-post' === $tab && ( akaza_is_blog_page() || akaza_is_newsletter_page() || akaza_is_blog_category() ) ) {
		return true;
	}

	if ( 'single-post' === $tab && is_singular( 'post' ) ) {
		return true;
	}

	return $skip;
}
add_filter( 'thim_ekit/modules/template_include', 'akaza_blog_bypass_thim_ekit', 10, 2 );

/**
 * Force the theme blog listing template over plugin overrides.
 *
 * @param string $template Path to current template.
 * @return string
 */
function akaza_blog_force_template( $template ) {
	if ( is_singular( 'post' ) ) {
		$single = AKAZA_DIR . '/single.php';
		if ( file_exists( $single ) ) {
			return $single;
		}
		return $template;
	}

	if ( akaza_is_blog_category() ) {
		$category_template = AKAZA_DIR . '/category.php';
		if ( file_exists( $category_template ) ) {
			return $category_template;
		}
		return $template;
	}

	if ( ! akaza_is_blog_page() ) {
		return $template;
	}

	$blog_template = AKAZA_DIR . '/page-templates/blog.php';
	if ( file_exists( $blog_template ) ) {
		return $blog_template;
	}

	return $template;
}
add_filter( 'template_include', 'akaza_blog_force_template', 99 );

/**
 * Remove Thim EKit body class when using the theme blog layout.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_blog_body_class_cleanup( $classes ) {
	if ( ! akaza_is_blog_page() && ! akaza_is_newsletter_page() && ! akaza_is_blog_category() ) {
		return $classes;
	}

	return array_values( array_diff( $classes, array( 'thim-ekit-template' ) ) );
}
add_filter( 'body_class', 'akaza_blog_body_class_cleanup', 100 );

/**
 * Get blog categories with published posts.
 *
 * @return WP_Term[]
 */
function akaza_get_blog_categories() {
	$terms = get_categories(
		array(
			'hide_empty' => true,
			'orderby'    => 'name',
			'order'      => 'ASC',
		)
	);

	if ( ! is_array( $terms ) ) {
		return array();
	}

	return array_values(
		array_filter(
			$terms,
			function ( $term ) {
				return ! akaza_is_newsletter_term( $term );
			}
		)
	);
}

/**
 * Orderby args for blog queries.
 *
 * @param string $sort Sort key.
 * @return array
 */
function akaza_blog_sort_args( $sort = 'newest' ) {
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
 * Estimated read time for a post.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function akaza_blog_read_time( $post_id ) {
	$post = get_post( $post_id );
	if ( ! $post ) {
		return '';
	}

	$content = wp_strip_all_tags( $post->post_content );
	$words   = str_word_count( $content );
	$minutes = max( 1, (int) ceil( $words / 200 ) );

	return sprintf(
		/* translators: %d: number of minutes */
		_n( '%d min read', '%d min read', $minutes, 'akaza-adventure' ),
		$minutes
	);
}

/**
 * Format blog post data for archive cards.
 *
 * @param int $post_id Post ID.
 * @return array|null
 */
function akaza_format_blog_card( $post_id ) {
	$post = get_post( $post_id );
	if ( ! $post || 'publish' !== $post->post_status || 'post' !== $post->post_type ) {
		return null;
	}

	$thumbnail = get_the_post_thumbnail_url( $post_id, 'akaza-blog-card' );
	if ( ! $thumbnail ) {
		$thumbnail = get_the_post_thumbnail_url( $post_id, 'akaza-course-card' );
	}
	if ( ! $thumbnail ) {
		$thumbnail = get_the_post_thumbnail_url( $post_id, 'medium' );
	}

	$excerpt_raw = $post->post_excerpt;
	if ( empty( $excerpt_raw ) ) {
		$excerpt_raw = $post->post_content;
	}
	$excerpt = wp_trim_words( wp_strip_all_tags( $excerpt_raw ), 28, '…' );

	$terms            = get_the_category( $post_id );
	$categories       = array();
	$category_slugs   = array();
	$primary_category = null;

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			if ( function_exists( 'akaza_is_newsletter_term' ) && akaza_is_newsletter_term( $term ) ) {
				continue;
			}
			$categories[] = array(
				'id'   => (int) $term->term_id,
				'name' => $term->name,
				'slug' => $term->slug,
			);
			$category_slugs[] = $term->slug;
		}
		$primary_category = ! empty( $categories ) ? $categories[0] : null;
	}

	return array(
		'id'               => $post_id,
		'title'            => get_the_title( $post_id ),
		'excerpt'          => $excerpt,
		'thumbnail'        => $thumbnail ? $thumbnail : '',
		'url'              => get_permalink( $post_id ),
		'date'             => get_the_date( '', $post_id ),
		'date_iso'         => get_the_date( 'c', $post_id ),
		'read_time'        => akaza_blog_read_time( $post_id ),
		'categories'       => $categories,
		'category_slugs'   => $category_slugs,
		'primary_category' => $primary_category,
		'sort_date'        => (int) get_post_time( 'U', true, $post_id ),
		'year'             => get_the_date( 'Y', $post_id ),
	);
}

/**
 * Get all published blog posts formatted for cards.
 *
 * @param string $sort Sort key.
 * @return array
 */
function akaza_get_blog_posts( $sort = 'newest' ) {
	if ( function_exists( 'akaza_maybe_seed_blog_demo' ) ) {
		akaza_maybe_seed_blog_demo();
	}

	$query = array(
		'post_type'              => 'post',
		'posts_per_page'         => -1,
		'post_status'            => 'publish',
		'fields'                 => 'ids',
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => true,
	);

	$newsletter_id = akaza_newsletter_category_id();
	if ( $newsletter_id ) {
		$query['category__not_in'] = array( $newsletter_id );
	}

	$post_ids = get_posts(
		array_merge(
			$query,
			akaza_blog_sort_args( $sort )
		)
	);

	$posts = array();
	foreach ( $post_ids as $post_id ) {
		if ( function_exists( 'akaza_is_newsletter_post' ) && akaza_is_newsletter_post( $post_id ) ) {
			continue;
		}
		$card = akaza_format_blog_card( $post_id );
		if ( $card ) {
			$posts[] = $card;
		}
	}

	return $posts;
}

/**
 * Get published blog posts for a single category, formatted for cards.
 *
 * @param int    $term_id Category term ID.
 * @param string $sort    Sort key.
 * @return array
 */
function akaza_get_blog_posts_for_category( $term_id, $sort = 'newest' ) {
	$term_id = absint( $term_id );
	if ( ! $term_id ) {
		return array();
	}

	if ( function_exists( 'akaza_maybe_seed_blog_demo' ) ) {
		akaza_maybe_seed_blog_demo();
	}

	$post_ids = get_posts(
		array_merge(
			array(
				'post_type'              => 'post',
				'posts_per_page'         => -1,
				'post_status'            => 'publish',
				'fields'                 => 'ids',
				'no_found_rows'          => true,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => true,
				'cat'                    => $term_id,
			),
			akaza_blog_sort_args( $sort )
		)
	);

	$posts = array();
	foreach ( $post_ids as $post_id ) {
		if ( function_exists( 'akaza_is_newsletter_post' ) && akaza_is_newsletter_post( $post_id ) ) {
			continue;
		}
		$card = akaza_format_blog_card( $post_id );
		if ( $card ) {
			$posts[] = $card;
		}
	}

	return $posts;
}

/**
 * Category archive hero subtitle (H2) from term meta.
 *
 * @param int $term_id Term ID.
 * @return string
 */
function akaza_get_category_subtitle( $term_id ) {
	$term_id = absint( $term_id );
	if ( ! $term_id ) {
		return '';
	}

	$subtitle = get_term_meta( $term_id, 'akaza_category_subtitle', true );
	return is_string( $subtitle ) ? trim( $subtitle ) : '';
}

/**
 * Get published newsletter posts formatted for cards.
 *
 * @param string $sort Sort key.
 * @return array
 */
function akaza_get_newsletter_posts( $sort = 'newest' ) {
	if ( function_exists( 'akaza_maybe_seed_newsletter_demo' ) ) {
		akaza_maybe_seed_newsletter_demo();
	}

	$post_ids = get_posts(
		array_merge(
			array(
				'post_type'              => 'post',
				'posts_per_page'         => -1,
				'post_status'            => 'publish',
				'fields'                 => 'ids',
				'no_found_rows'          => true,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => true,
				'category_name'          => akaza_newsletter_category_slug(),
			),
			akaza_blog_sort_args( $sort )
		)
	);

	$posts = array();
	foreach ( $post_ids as $post_id ) {
		$card = akaza_format_blog_card( $post_id );
		if ( $card ) {
			$posts[] = $card;
		}
	}

	return $posts;
}

/**
 * Unique years from newsletter cards, newest first.
 *
 * @param array $posts Formatted cards.
 * @return string[]
 */
function akaza_get_newsletter_years( $posts ) {
	$years = array();

	foreach ( $posts as $post ) {
		if ( empty( $post['year'] ) ) {
			continue;
		}
		$years[ (string) $post['year'] ] = true;
	}

	$years = array_keys( $years );
	rsort( $years, SORT_NUMERIC );

	return $years;
}

/**
 * Enqueue blog archive assets.
 */
function akaza_blog_archive_assets() {
	if ( ! akaza_is_blog_page() && ! akaza_is_newsletter_page() && ! akaza_is_blog_category() ) {
		return;
	}

	$css = AKAZA_DIR . '/assets/css/blog-archive.css';
	$js  = AKAZA_DIR . '/assets/js/blog-archive.js';

	wp_enqueue_style(
		'akaza-blog-archive',
		AKAZA_URI . '/assets/css/blog-archive.css',
		array( 'akaza-main' ),
		file_exists( $css ) ? (string) filemtime( $css ) : AKAZA_VERSION
	);

	wp_enqueue_script(
		'akaza-blog-archive',
		AKAZA_URI . '/assets/js/blog-archive.js',
		array(),
		file_exists( $js ) ? (string) filemtime( $js ) : AKAZA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'akaza_blog_archive_assets', 25 );

/**
 * Body class for blog archive layout.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_blog_archive_body_class( $classes ) {
	if ( akaza_is_blog_page() || akaza_is_newsletter_page() || akaza_is_blog_category() ) {
		$classes[] = 'slf-blog-archive-page';
	}
	return $classes;
}
add_filter( 'body_class', 'akaza_blog_archive_body_class' );

/**
 * Category add-form field: hero subtitle (H2).
 */
function akaza_category_subtitle_add_field() {
	?>
	<div class="form-field term-akaza-subtitle-wrap">
		<label for="akaza_category_subtitle"><?php esc_html_e( 'Hero subtitle (H2)', 'akaza-adventure' ); ?></label>
		<input type="text" name="akaza_category_subtitle" id="akaza_category_subtitle" value="" />
		<p class="description">
			<?php esc_html_e( 'Shown under the category name on the category archive. Use the Description field above for the page lead text.', 'akaza-adventure' ); ?>
		</p>
	</div>
	<?php
}
add_action( 'category_add_form_fields', 'akaza_category_subtitle_add_field' );

/**
 * Category edit-form field: hero subtitle (H2).
 *
 * @param WP_Term $term Term being edited.
 */
function akaza_category_subtitle_edit_field( $term ) {
	$subtitle = ( $term instanceof WP_Term ) ? akaza_get_category_subtitle( $term->term_id ) : '';
	?>
	<tr class="form-field term-akaza-subtitle-wrap">
		<th scope="row">
			<label for="akaza_category_subtitle"><?php esc_html_e( 'Hero subtitle (H2)', 'akaza-adventure' ); ?></label>
		</th>
		<td>
			<input type="text" name="akaza_category_subtitle" id="akaza_category_subtitle" value="<?php echo esc_attr( $subtitle ); ?>" class="regular-text" />
			<p class="description">
				<?php esc_html_e( 'Shown under the category name on the category archive. Use the Description field for the page lead text.', 'akaza-adventure' ); ?>
			</p>
		</td>
	</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'akaza_category_subtitle_edit_field' );

/**
 * Save category hero subtitle term meta.
 *
 * @param int $term_id Term ID.
 */
function akaza_save_category_subtitle( $term_id ) {
	$term_id = absint( $term_id );
	if ( ! $term_id ) {
		return;
	}

	if ( ! isset( $_POST['akaza_category_subtitle'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
		return;
	}

	$subtitle = sanitize_text_field( wp_unslash( $_POST['akaza_category_subtitle'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

	if ( '' === $subtitle ) {
		delete_term_meta( $term_id, 'akaza_category_subtitle' );
		return;
	}

	update_term_meta( $term_id, 'akaza_category_subtitle', $subtitle );
}
add_action( 'created_category', 'akaza_save_category_subtitle' );
add_action( 'edited_category', 'akaza_save_category_subtitle' );
