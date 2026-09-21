<?php
/**
 * Breadcrumb helpers for AMP templates.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether breadcrumbs should render on the current request.
 *
 * @return bool
 */
function elearnposh_amp_should_show_breadcrumbs() {
	if ( is_front_page() ) {
		return false;
	}

	if ( function_exists( 'elearnposh_is_webinar_landing_page' ) && elearnposh_is_webinar_landing_page() ) {
		return false;
	}

	$post_id = get_queried_object_id();
	$slug    = $post_id ? get_post_field( 'post_name', $post_id ) : '';
	if ( $slug && in_array(
		$slug,
		array(
			'posh-annual-webinar-for-ic-members',
			'posh-webinar-for-ic-members',
			'purchase-confirmation',
			'posh-compliance-essentials-webinar',
		),
		true
	) ) {
		return false;
	}

	/**
	 * Filter whether AMP breadcrumbs should display.
	 *
	 * @param bool $show Whether to show breadcrumbs.
	 */
	return (bool) apply_filters( 'elearnposh_amp_should_show_breadcrumbs', true );
}

/**
 * Slugs routed as POSH course / solutions landing pages.
 *
 * @return array<string>
 */
function elearnposh_amp_get_posh_course_breadcrumb_slugs() {
	$slugs = array(
		'posh-training-for-employees',
		'posh-for-employees',
		'posh-foundation',
		'posh-pro',
		'posh-for-managers',
		'posh-training-for-managers',
		'posh-for-ic-members',
		'posh-for-higher-educational-institutions',
		'pocso-prevention-of-child-sexual-abuse',
		'unconscious-bias',
		'bias',
		'equality-and-diversity',
		'sexual-harassment-prevention-for-us',
	);

	if ( class_exists( '\ElearnPOSH\AMP\Plugin' ) ) {
		$config = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
		if ( $config && method_exists( $config, 'get_extra_course_template_slugs' ) ) {
			$extra  = $config->get_extra_course_template_slugs();
			$slugs  = array_merge( $slugs, is_array( $extra ) ? $extra : array() );
		}
	}

	return array_values( array_unique( array_map( 'sanitize_title', $slugs ) ) );
}

/**
 * Whether the page belongs under the POSH Courses breadcrumb parent.
 *
 * @param int    $post_id Post ID.
 * @param string $slug    Post slug.
 * @return bool
 */
function elearnposh_amp_is_posh_course_breadcrumb_page( $post_id, $slug = '' ) {
	$post_id = absint( $post_id );
	if ( ! $slug && $post_id ) {
		$post = get_post( $post_id );
		$slug = ( $post && isset( $post->post_name ) ) ? $post->post_name : '';
	}
	$slug = sanitize_title( $slug );

	if ( class_exists( '\ElearnPOSH\AMP\Plugin' ) ) {
		$config = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
		if ( $config ) {
			if ( method_exists( $config, 'is_course_page' ) && $config->is_course_page( $post_id ) ) {
				return true;
			}
			if ( method_exists( $config, 'is_global_course_page' ) && $config->is_global_course_page( $post_id ) ) {
				return true;
			}
		}
	}

	return $slug && in_array( $slug, elearnposh_amp_get_posh_course_breadcrumb_slugs(), true );
}

/**
 * Resolve a configured AMP page permalink by map key.
 *
 * @param string $map_key Map key from Config::get_amp_page_map().
 * @return string
 */
function elearnposh_amp_breadcrumb_page_url( $map_key ) {
	if ( ! class_exists( '\ElearnPOSH\AMP\Config' ) ) {
		return '';
	}

	$plugin = \ElearnPOSH\AMP\Plugin::get_instance();
	$config = $plugin ? $plugin->get_config() : null;
	if ( ! $config || ! method_exists( $config, 'resolve_page_id_by_map_key' ) ) {
		return '';
	}

	$page_id = $config->resolve_page_id_by_map_key( $map_key );

	return $page_id ? elearnposh_amp_get_post_amp_url( $page_id ) : '';
}

/**
 * Build breadcrumb items for the current AMP view.
 *
 * Each item: array( 'label' => string, 'url' => string optional ).
 *
 * @param int $post_id Optional post ID.
 * @return array<int, array{label:string,url?:string}>
 */
function elearnposh_amp_get_breadcrumb_items( $post_id = 0 ) {
	if ( ! elearnposh_amp_should_show_breadcrumbs() ) {
		return array();
	}

	if ( ! $post_id ) {
		$post_id = get_queried_object_id();
	}
	$post_id = absint( $post_id );

	$items = array(
		array(
			'label' => __( 'Home', 'elearnposh-amp' ),
			'url'   => elearnposh_amp_url( '/' ),
		),
	);

	if ( is_archive() ) {
		if ( is_category() || is_tag() || is_tax() ) {
			$term = get_queried_object();
			if ( $term && ! is_wp_error( $term ) ) {
				$items[] = array( 'label' => $term->name );
			}
		} else {
			$items[] = array( 'label' => post_type_archive_title( '', false ) ?: __( 'Archive', 'elearnposh-amp' ) );
		}

		return apply_filters( 'elearnposh_amp_breadcrumb_items', $items, $post_id );
	}

	$post = $post_id ? get_post( $post_id ) : null;
	if ( ! $post ) {
		return apply_filters( 'elearnposh_amp_breadcrumb_items', $items, $post_id );
	}

	$slug = sanitize_title( $post->post_name );
	$config = class_exists( '\ElearnPOSH\AMP\Plugin' ) ? \ElearnPOSH\AMP\Plugin::get_instance()->get_config() : null;

	if ( 'post' === $post->post_type ) {
		$newsletter_cat = $config ? $config->get( 'newsletter_category', 'newsletter' ) : 'newsletter';

		if ( has_category( $newsletter_cat, $post ) ) {
			$newsletter_url = elearnposh_amp_breadcrumb_page_url( 'newsletter-list' );
			if ( $newsletter_url ) {
				$items[] = array(
					'label' => __( 'Newsletter', 'elearnposh-amp' ),
					'url'   => $newsletter_url,
				);
			}
		} else {
			$blog_url = elearnposh_amp_breadcrumb_page_url( 'blog-list' );
			if ( $blog_url ) {
				$items[] = array(
					'label' => __( 'Blog', 'elearnposh-amp' ),
					'url'   => $blog_url,
				);
			}
		}

		$title = get_the_title( $post );
		if ( function_exists( 'mb_strimwidth' ) && mb_strlen( $title ) > 52 ) {
			$title = mb_strimwidth( $title, 0, 52, '…' );
		} elseif ( strlen( $title ) > 52 ) {
			$title = substr( $title, 0, 52 ) . '…';
		}
		$items[] = array( 'label' => $title );
		return apply_filters( 'elearnposh_amp_breadcrumb_items', $items, $post_id );
	}

	if ( 'page' === $post->post_type ) {
		if ( $config && method_exists( $config, 'is_newsletter_page' ) && $config->is_newsletter_page( $post_id ) ) {
			$items[] = array( 'label' => __( 'Newsletter', 'elearnposh-amp' ) );
			return apply_filters( 'elearnposh_amp_breadcrumb_items', $items, $post_id );
		}

		if ( $config && method_exists( $config, 'is_blog_page' ) && $config->is_blog_page( $post_id ) ) {
			$items[] = array( 'label' => __( 'Blog', 'elearnposh-amp' ) );
			return apply_filters( 'elearnposh_amp_breadcrumb_items', $items, $post_id );
		}

		if ( in_array( $slug, array( 'she-box' ), true ) ) {
			$posh_act_url = elearnposh_amp_breadcrumb_page_url( 'posh-act' );
			if ( $posh_act_url ) {
				$items[] = array(
					'label' => __( 'POSH Act', 'elearnposh-amp' ),
					'url'   => $posh_act_url,
				);
			}
		} elseif ( in_array( $slug, array( 'posh-annual-webinar-for-ic-members', 'posh-webinar-for-ic-members', 'purchase-confirmation' ), true ) ) {
			$webinars_url = elearnposh_amp_breadcrumb_page_url( 'our-webinars' );
			if ( $webinars_url ) {
				$items[] = array(
					'label' => __( 'Our Webinars', 'elearnposh-amp' ),
					'url'   => $webinars_url,
				);
			}
		} elseif ( elearnposh_amp_is_posh_course_breadcrumb_page( $post_id, $slug ) ) {
			$items[] = array(
				'label' => __( 'Solutions', 'elearnposh-amp' ),
				'url'   => elearnposh_amp_url( '/#elearning-courses' ),
			);
		} else {
			$ancestors = array_reverse( array_map( 'absint', get_post_ancestors( $post_id ) ) );
			foreach ( $ancestors as $ancestor_id ) {
				$items[] = array(
					'label' => get_the_title( $ancestor_id ),
					'url'   => elearnposh_amp_to_amp_url( get_permalink( $ancestor_id ) ),
				);
			}
		}

		$items[] = array( 'label' => get_the_title( $post ) );
	}

	return apply_filters( 'elearnposh_amp_breadcrumb_items', $items, $post_id );
}

/**
 * Output breadcrumb navigation markup (once per page).
 *
 * @param int $post_id Optional post ID.
 */
function elearnposh_amp_render_breadcrumbs( $post_id = 0 ) {
	static $rendered = false;
	if ( $rendered ) {
		return;
	}

	$items = elearnposh_amp_get_breadcrumb_items( $post_id );
	if ( count( $items ) < 2 ) {
		return;
	}

	$rendered = true;
	$path     = ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/breadcrumbs.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}
