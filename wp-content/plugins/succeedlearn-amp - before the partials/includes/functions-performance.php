<?php
/**
 * Performance / AMP HTML helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @return bool
 */
function succeedlearn_amp_is_serving_amp() {
	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		return true;
	}
	if ( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() ) {
		return true;
	}
	if ( function_exists( 'amp_is_request' ) && amp_is_request() ) {
		return true;
	}
	if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return true;
	}
	$uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	return (bool) ( $uri && preg_match( '#/amp/?(\?|$)#', $uri ) );
}

/**
 * @param string $path Path or URL.
 * @return string
 */
function succeedlearn_amp_url( $path = '/' ) {
	$url = ( 0 === strpos( (string) $path, 'http' ) ) ? $path : home_url( $path );
	if ( function_exists( 'ampforwp_url_controller' ) ) {
		$converted = ampforwp_url_controller( $url );
		if ( is_string( $converted ) && $converted ) {
			return $converted;
		}
	}
	if ( function_exists( 'amp_add_paired_endpoint' ) ) {
		return amp_add_paired_endpoint( $url );
	}
	return add_query_arg( 'amp', '1', $url );
}

/**
 * Sanitize an element id for AMP scrollTo targets.
 *
 * @param string $target_id Raw id.
 * @return string
 */
function succeedlearn_amp_sanitize_scroll_target_id( $target_id ) {
	return (string) preg_replace( '/[^a-zA-Z0-9_-]/', '', (string) $target_id );
}

/**
 * Top offset (px) when scrolling to in-page anchors — clears the fixed AMP header.
 *
 * @return int
 */
function succeedlearn_amp_get_scroll_offset() {
	/**
	 * Filter AMP in-page scroll top offset in pixels.
	 *
	 * @param int $offset Offset in pixels.
	 */
	return (int) apply_filters( 'succeedlearn_amp_scroll_offset', 120 );
}

/**
 * AMP `on="tap:…"` attribute for smooth in-page scroll (avoids hash jumps).
 *
 * @param string       $target_id      Target element id.
 * @param int          $duration       Scroll duration in ms.
 * @param string|array $prefix_actions Optional tap actions before scrollTo.
 * @return string Empty or ` on="tap:…"`.
 */
function succeedlearn_amp_scroll_tap_attr( $target_id, $duration = 400, $prefix_actions = array() ) {
	$id = succeedlearn_amp_sanitize_scroll_target_id( $target_id );
	if ( '' === $id ) {
		return '';
	}

	$actions = array();
	foreach ( (array) $prefix_actions as $action ) {
		$action = trim( (string) $action );
		if ( '' !== $action ) {
			$actions[] = $action;
		}
	}
	$actions[] = sprintf(
		"AMP.scrollTo(id='%s', duration=%d, position='top')",
		$id,
		max( 0, (int) $duration )
	);

	return ' on="tap:' . esc_attr( implode( ', ', $actions ) ) . '"';
}

/**
 * @param string $name Style partial basename (without extension).
 */
function succeedlearn_amp_include_style_partial( $name ) {
	$base = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'styles/' . sanitize_file_name( $name );

	$css_path = $base . '.css';
	if ( is_readable( $css_path ) ) {
		// Prefer plain CSS files — avoids PHP include fatals some hosts trigger on style partials.
		echo file_get_contents( $css_path ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped,WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		return;
	}

	$php_path = $base . '.php';
	if ( is_readable( $php_path ) ) {
		include $php_path;
	}
}

/**
 * @param string   $page_type Page type.
 * @param string[] $style_files Cached style files.
 * @param string[] $always_inline Always-inline partials.
 */
function succeedlearn_amp_output_page_styles( $page_type, $style_files = array(), $always_inline = array() ) {
	$shared      = array( 'menu', 'footer', 'scroll-to-top' );
	$extra       = array_values( array_unique( array_merge( (array) $style_files, (array) $always_inline ) ) );
	$cache_extra = array_values( array_diff( $extra, $shared, (array) $always_inline ) );
	$cache_files = array_values( array_unique( array_merge( $shared, $cache_extra ) ) );

	if ( class_exists( '\\SucceedLEARN\\AMP\\Performance_Optimizer' ) ) {
		$optimizer = \SucceedLEARN\AMP\Performance_Optimizer::get_instance();
		$css       = $optimizer->get_optimized_css( $page_type, $cache_files );
		if ( $css ) {
			echo $css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			foreach ( $cache_files as $file ) {
				succeedlearn_amp_include_style_partial( $file );
			}
		}
	} else {
		foreach ( $cache_files as $file ) {
			succeedlearn_amp_include_style_partial( $file );
		}
	}

	foreach ( (array) $always_inline as $file ) {
		succeedlearn_amp_include_style_partial( $file );
	}
}

/**
 * @param string   $page_type Page type.
 * @param string[] $additional Extra components.
 */
function succeedlearn_amp_output_components( $page_type, $additional = array() ) {
	if ( class_exists( '\\SucceedLEARN\\AMP\\Performance_Optimizer' ) ) {
		\SucceedLEARN\AMP\Performance_Optimizer::get_instance()->output_amp_components( $page_type, $additional );
	}
}

/**
 * Collect compiled CSS for a page (used by template + post-tree-shake restore).
 *
 * @param string   $page_type Page type.
 * @param string[] $style_files Cached style files.
 * @param string[] $always_inline Always-inline partials.
 * @return string
 */
function succeedlearn_amp_get_page_styles_css( $page_type, $style_files = array(), $always_inline = array() ) {
	ob_start();
	succeedlearn_amp_output_page_styles( $page_type, $style_files, $always_inline );
	return trim( (string) ob_get_clean() );
}

/**
 * After AMPforWP tree shaking, restore SucceedLEARN amp-custom CSS when stripped.
 *
 * @param string $html HTML.
 * @return string
 */
function succeedlearn_amp_restore_custom_amp_css( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}
	if ( ! succeedlearn_amp_is_serving_amp() ) {
		return $html;
	}
	// Only restore when our markup is present but our selectors are missing from CSS.
	if ( false === strpos( $html, 'sl-hero' ) && false === strpos( $html, 'amp-site-header' ) ) {
		return $html;
	}
	if ( false !== strpos( $html, 'sl-blog' ) || false !== strpos( $html, 'sl-blog-page' ) || false !== strpos( $html, 'sl-courses' ) || false !== strpos( $html, 'sl-courses-page' ) ) {
		return $html;
	}
	if ( false !== strpos( $html, '.sl-hero' ) && false !== strpos( $html, '.amp-site-header' ) ) {
		return $html;
	}

	$hero_bg = get_template_directory_uri() . '/assets/images/hero-bg.jpg';
	$css     = succeedlearn_amp_get_page_styles_css( 'home', array( 'home-page' ), array( 'home-sections', 'contact-form' ) );
	$css    .= '.sl-hero{background-image:url(' . esc_url_raw( $hero_bg ) . ')}';

	if ( '' === trim( $css ) ) {
		return $html;
	}

	if ( preg_match( '/<style\b[^>]*\bamp-custom\b[^>]*>.*?<\/style>/is', $html ) ) {
		$html = preg_replace(
			'/(<style\b[^>]*\bamp-custom\b[^>]*>)(.*?)(<\/style>)/is',
			'$1' . $css . '$3',
			$html,
			1
		);
	} else {
		$html = preg_replace(
			'/<\/head>/i',
			'<style amp-custom>' . $css . '</style></head>',
			$html,
			1
		);
	}

	return $html;
}

/**
 * @return string
 */
function succeedlearn_amp_get_favicon_url() {
	$icon = get_site_icon_url( 32 );
	if ( $icon ) {
		return $icon;
	}
	$theme = get_template_directory_uri() . '/assets/images/logo-mark.svg';
	return $theme;
}

/**
 * Fixed widgets (scroll-to-top).
 */
function succeedlearn_amp_render_fixed_widgets() {
	static $done = false;
	if ( $done ) {
		return;
	}
	$done = true;
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/scroll-to-top.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * Lightweight AMP HTML finalize for output buffer.
 *
 * @param string $html HTML.
 * @return string
 */
function succeedlearn_amp_finalize_amp_html( $html ) {
	// Do not restore CSS here: this runs as an output-buffer display handler
	// and must not call ob_start() (PHP fatal → empty page).
	return succeedlearn_amp_sanitize_amp_html( $html, false );
}

/**
 * @param string $html HTML fragment.
 * @return string
 */
function succeedlearn_amp_sanitize_amp_fragment( $html ) {
	return succeedlearn_amp_sanitize_amp_html( $html, true );
}

/**
 * @param string $html HTML.
 * @param bool   $fragment_only Fragment mode.
 * @return string
 */
function succeedlearn_amp_sanitize_amp_html( $html, $fragment_only = false ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}

	// Convert plain <img> to amp-img when possible.
	$html = preg_replace_callback(
		'/<img\b([^>]*)>/i',
		static function ( $m ) {
			$attrs = $m[1];
			if ( false !== stripos( $attrs, 'amp-img' ) ) {
				return $m[0];
			}
			$src = '';
			if ( preg_match( '/\bsrc=["\']([^"\']+)["\']/i', $attrs, $sm ) ) {
				$src = $sm[1];
			}
			if ( ! $src ) {
				return '';
			}
			$width  = 600;
			$height = 400;
			if ( preg_match( '/\bwidth=["\']?(\d+)/i', $attrs, $wm ) ) {
				$width = (int) $wm[1];
			}
			if ( preg_match( '/\bheight=["\']?(\d+)/i', $attrs, $hm ) ) {
				$height = (int) $hm[1];
			}
			$alt = '';
			if ( preg_match( '/\balt=["\']([^"\']*)["\']/i', $attrs, $am ) ) {
				$alt = $am[1];
			}
			$class = '';
			if ( preg_match( '/\bclass=["\']([^"\']*)["\']/i', $attrs, $cm ) ) {
				$class = $cm[1];
			}
			return sprintf(
				'<amp-img src="%s" width="%d" height="%d" layout="responsive" alt="%s"%s></amp-img>',
				esc_url( $src ),
				$width,
				$height,
				esc_attr( $alt ),
				$class ? ' class="' . esc_attr( $class ) . '"' : ''
			);
		},
		$html
	);

	// Strip inline event handlers.
	$html = preg_replace( '/\s+on[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $html );

	if ( ! $fragment_only ) {
		// Ensure amp attribute on html.
		if ( preg_match( '/<html\b/i', $html ) && ! preg_match( '/<html\b[^>]*\bamp\b/i', $html ) ) {
			$html = preg_replace( '/<html\b/i', '<html amp', $html, 1 );
		}
	}

	return $html;
}
