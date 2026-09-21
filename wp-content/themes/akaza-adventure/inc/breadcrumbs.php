<?php
/**
 * Automatic breadcrumbs for all pages except the homepage.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether breadcrumbs should render on the current request.
 *
 * Cached per request — body_class + render both call this.
 *
 * @return bool
 */
function akaza_should_show_breadcrumbs() {
	static $show = null;

	if ( null !== $show ) {
		return $show;
	}

	if ( is_front_page() || is_page_template( 'page-templates/homepage-fast.php' ) ) {
		$show = false;
		return $show;
	}

	if ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) {
		$show = false;
		return $show;
	}

	$show = true;
	return $show;
}

/**
 * Append ancestor pages for a given page ID.
 *
 * @param array $items   Breadcrumb items.
 * @param int   $page_id Page ID.
 * @return array
 */
function akaza_breadcrumb_add_page_ancestors( $items, $page_id ) {
	$ancestors = array_reverse( array_map( 'intval', get_post_ancestors( $page_id ) ) );

	foreach ( $ancestors as $ancestor_id ) {
		$items[] = array(
			'label' => get_the_title( $ancestor_id ),
			'url'   => get_permalink( $ancestor_id ),
		);
	}

	return $items;
}

/**
 * Blog/posts index crumb label and URL.
 *
 * @return array{label: string, url: string, page_id: int}
 */
function akaza_breadcrumb_posts_page() {
	$posts_page = (int) get_option( 'page_for_posts' );

	if ( $posts_page ) {
		return array(
			'label'   => get_the_title( $posts_page ),
			'url'     => get_permalink( $posts_page ),
			'page_id' => $posts_page,
		);
	}

	return array(
		'label'   => __( 'Blog', 'akaza-adventure' ),
		'url'     => home_url( '/blog/' ),
		'page_id' => 0,
	);
}

/**
 * Course archive label.
 *
 * @return string
 */
function akaza_breadcrumb_courses_label() {
	if ( function_exists( 'learn_press_page_title' ) ) {
		$title = learn_press_page_title( false );
		if ( $title ) {
			return $title;
		}
	}

	return __( 'Courses', 'akaza-adventure' );
}

/**
 * Course archive URL.
 *
 * @return string
 */
function akaza_breadcrumb_courses_url() {
	if ( function_exists( 'akaza_course_post_type' ) ) {
		$url = get_post_type_archive_link( akaza_course_post_type() );
		if ( $url ) {
			return $url;
		}
	}

	return function_exists( 'akaza_page_url' ) ? akaza_page_url( 'courses' ) : home_url( '/courses/' );
}

/**
 * Build breadcrumb items for the current request.
 *
 * Cached per request so body_class, enqueue, and hero render share one build.
 *
 * @return array<int, array{label: string, url?: string, current?: bool}>
 */
function akaza_get_breadcrumbs() {
	static $items = null;

	if ( null !== $items ) {
		return $items;
	}

	if ( ! akaza_should_show_breadcrumbs() ) {
		$items = array();
		return $items;
	}

	$items = array(
		array(
			'label' => __( 'Home', 'akaza-adventure' ),
			'url'   => home_url( '/' ),
		),
	);

	if ( is_home() && ! is_front_page() ) {
		$blog = akaza_breadcrumb_posts_page();
		if ( $blog['page_id'] ) {
			$items = akaza_breadcrumb_add_page_ancestors( $items, $blog['page_id'] );
		}
		$items[] = array(
			'label'   => $blog['label'],
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_singular( 'post' ) ) {
		$is_newsletter = function_exists( 'akaza_is_newsletter_post' ) && akaza_is_newsletter_post();

		if ( $is_newsletter ) {
			$newsletter_url = function_exists( 'akaza_newsletter_listing_url' )
				? akaza_newsletter_listing_url()
				: home_url( '/newsletter/' );
			$items[]        = array(
				'label' => __( 'Newsletter', 'akaza-adventure' ),
				'url'   => $newsletter_url,
			);
		} else {
			$blog = akaza_breadcrumb_posts_page();
			if ( $blog['page_id'] ) {
				$items = akaza_breadcrumb_add_page_ancestors( $items, $blog['page_id'] );
			}
			$items[] = array(
				'label' => $blog['label'],
				'url'   => $blog['url'],
			);

			$categories    = get_the_category();
			$newsletter_id = function_exists( 'akaza_newsletter_category_id' ) ? akaza_newsletter_category_id() : 0;
			if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
				$primary = $categories[0];
				foreach ( $categories as $term ) {
					if ( $newsletter_id && (int) $term->term_id === $newsletter_id ) {
						continue;
					}
					$primary = $term;
					break;
				}
				if ( ! $newsletter_id || (int) $primary->term_id !== $newsletter_id ) {
					$items[] = array(
						'label' => $primary->name,
						'url'   => get_category_link( $primary->term_id ),
					);
				}
			}
		}

		$items[] = array(
			'label'   => get_the_title(),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_category() ) {
		$blog = akaza_breadcrumb_posts_page();
		if ( $blog['page_id'] ) {
			$items = akaza_breadcrumb_add_page_ancestors( $items, $blog['page_id'] );
		}
		$items[] = array(
			'label' => $blog['label'],
			'url'   => $blog['url'],
		);
		$items[] = array(
			'label'   => single_cat_title( '', false ),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_tag() ) {
		$blog = akaza_breadcrumb_posts_page();
		$items[] = array(
			'label' => $blog['label'],
			'url'   => $blog['url'],
		);
		$items[] = array(
			'label'   => single_tag_title( '', false ),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_page() ) {
		$page_id = get_queried_object_id();
		$items   = akaza_breadcrumb_add_page_ancestors( $items, $page_id );
		$items[] = array(
			'label'   => get_the_title( $page_id ),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) {
		$items[] = array(
			'label'   => akaza_breadcrumb_courses_label(),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_singular( array( 'course', 'lp_course' ) ) ) {
		$items[] = array(
			'label' => akaza_breadcrumb_courses_label(),
			'url'   => akaza_breadcrumb_courses_url(),
		);
		$items[] = array(
			'label'   => get_the_title(),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_search() ) {
		$items[] = array(
			'label'   => sprintf(
				/* translators: %s: search query */
				__( 'Search results for "%s"', 'akaza-adventure' ),
				get_search_query()
			),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_404() ) {
		$items[] = array(
			'label'   => __( 'Page not found', 'akaza-adventure' ),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_post_type_archive() ) {
		$items[] = array(
			'label'   => post_type_archive_title( '', false ),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_tax() ) {
		$term = get_queried_object();
		if ( $term && ! is_wp_error( $term ) ) {
			$taxonomy = get_taxonomy( $term->taxonomy );
			if ( $taxonomy && ! empty( $taxonomy->object_type ) ) {
				$post_type = $taxonomy->object_type[0];
				if ( in_array( $post_type, array( 'course', 'lp_course' ), true ) ) {
					$items[] = array(
						'label' => akaza_breadcrumb_courses_label(),
						'url'   => akaza_breadcrumb_courses_url(),
					);
				}
			}
			$items[] = array(
				'label'   => $term->name,
				'url'     => '',
				'current' => true,
			);
			return $items;
		}
	}

	if ( is_singular() ) {
		$items[] = array(
			'label'   => get_the_title(),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	if ( is_archive() ) {
		$items[] = array(
			'label'   => wp_strip_all_tags( get_the_archive_title() ),
			'url'     => '',
			'current' => true,
		);
		return $items;
	}

	array_pop( $items );
	return $items;
}

/**
 * Render breadcrumb navigation.
 *
 * @param bool $inline Render inside page hero (no bar below header).
 */
function akaza_render_breadcrumbs( $inline = false ) {
	if ( ! akaza_should_show_breadcrumbs() ) {
		return;
	}

	$items = akaza_get_breadcrumbs();
	if ( count( $items ) < 2 ) {
		return;
	}

	get_template_part(
		'template-parts/breadcrumbs',
		null,
		array(
			'items'  => $items,
			'inline' => $inline,
		)
	);
}

/**
 * Render breadcrumbs at the top of a page hero.
 */
function akaza_render_hero_breadcrumbs() {
	akaza_render_breadcrumbs( true );
}

add_filter( 'body_class', 'akaza_breadcrumbs_body_class' );

/**
 * Body class when breadcrumbs are visible.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function akaza_breadcrumbs_body_class( $classes ) {
	$crumbs = akaza_get_breadcrumbs();
	if ( count( $crumbs ) >= 2 ) {
		$classes[] = 'slf-has-breadcrumbs';
	}
	return $classes;
}

/**
 * Enqueue breadcrumb styles.
 */
function akaza_breadcrumbs_assets() {
	if ( ! akaza_should_show_breadcrumbs() ) {
		return;
	}

	$css  = AKAZA_DIR . '/assets/css/breadcrumbs.css';
	$deps = array( 'akaza-main' );

	if (
		wp_style_is( 'akaza-blog-archive', 'registered' )
		|| ( function_exists( 'akaza_is_blog_page' ) && akaza_is_blog_page() )
		|| ( function_exists( 'akaza_is_newsletter_page' ) && akaza_is_newsletter_page() )
		|| ( function_exists( 'akaza_is_blog_category' ) && akaza_is_blog_category() )
	) {
		$deps[] = 'akaza-blog-archive';
	}

	if ( wp_style_is( 'akaza-courses-archive', 'registered' ) || ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) ) {
		$deps[] = 'akaza-courses-archive';
	}

	wp_enqueue_style(
		'akaza-breadcrumbs',
		AKAZA_URI . '/assets/css/breadcrumbs.css',
		$deps,
		file_exists( $css ) ? (string) filemtime( $css ) : AKAZA_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'akaza_breadcrumbs_assets', 30 );
