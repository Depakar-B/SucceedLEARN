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
	$shared      = array(
		'menu',
		'global-foundation',
		'global-ui',
		'global-ui-buttons',
		'global-panel-title',
		'global-highlight',
		'footer',
		'scroll-to-top',
		'breadcrumbs',
	);
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

	/**
	 * After core AMP page styles are printed into amp-custom.
	 * Plugins (e.g. Email CTA) may echo additional CSS here.
	 *
	 * @param string $page_type Page type.
	 */
	do_action( 'succeedlearn_amp_after_page_styles', $page_type );
}

/**
 * @param string   $page_type Page type.
 * @param string[] $additional Extra components.
 */
function succeedlearn_amp_output_components( $page_type, $additional = array() ) {
	/**
	 * Filter extra AMP components for the current page.
	 *
	 * @param string[] $additional Extra component slugs (e.g. amp-form).
	 * @param string   $page_type  Page type.
	 */
	$additional = apply_filters( 'succeedlearn_amp_additional_components', (array) $additional, $page_type );

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
 * Force GDPR card grid breakpoints after AMP CSS post-processing.
 *
 * Tree shaking / later amp-custom chunks can wipe tablet 2-col rules.
 * Re-append page-scoped rules at the end of amp-custom.
 *
 * @param string $html Full AMP HTML.
 * @return string
 */
function succeedlearn_amp_reinforce_gdpr_risk_cards_css( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}
	if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && ! succeedlearn_amp_is_serving_amp() ) {
		return $html;
	}
	$has_risk     = false !== strpos( $html, 'sl-gdpr-risk__cards' );
	$has_reasons  = false !== strpos( $html, 'sl-gdpr-reasons__grid' );
	$has_format   = false !== strpos( $html, 'sl-gdpr-format-delivery__stats' );
	$has_preview  = false !== strpos( $html, 'sl-gdpr-request-preview__details' );
	if ( ! $has_risk && ! $has_reasons && ! $has_format && ! $has_preview ) {
		return $html;
	}

	$css = '';
	if ( $has_risk ) {
		$css .= '.sl-gdpr-page .sl-gdpr-risk__cards{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:100%}'
			. '@media(min-width:700px){.sl-gdpr-page .sl-gdpr-risk__cards{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}}'
			. '@media(min-width:1000px){.sl-gdpr-page .sl-gdpr-risk__cards{grid-template-columns:repeat(4,minmax(0,1fr));gap:22px}}';
	}
	if ( $has_reasons ) {
		$css .= '.sl-gdpr-page .sl-gdpr-reasons__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:100%}'
			. '@media(min-width:700px){.sl-gdpr-page .sl-gdpr-reasons__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:20px}'
			. '.sl-gdpr-page .sl-gdpr-reasons__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}}'
			. '@media(min-width:1000px){.sl-gdpr-page .sl-gdpr-reasons__grid{grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}'
			. '.sl-gdpr-page .sl-gdpr-reasons__grid>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}';
	}
	if ( $has_format ) {
		$css .= '.sl-gdpr-page .sl-gdpr-format-delivery__stats{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:100%}'
			. '@media(min-width:768px){.sl-gdpr-page .sl-gdpr-format-delivery__stats{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}}'
			. '@media(min-width:1000px){.sl-gdpr-page .sl-gdpr-format-delivery__stats{grid-template-columns:repeat(4,minmax(0,1fr));gap:24px}}'
			. '.sl-gdpr-page .sl-gdpr-format-delivery__formats-heading{padding-bottom:18px}'
			. '@media(min-width:768px){.sl-gdpr-page .sl-gdpr-format-delivery__formats-heading{padding-bottom:20px}}'
			. '@media(min-width:1000px){.sl-gdpr-page .sl-gdpr-format-delivery__formats-heading{padding-bottom:22px}}';
	}
	if ( $has_preview ) {
		$css .= '.sl-gdpr-page .sl-gdpr-request-preview__details{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;width:100%}'
			. '.sl-gdpr-page .sl-gdpr-request-preview__detail{margin:0;min-width:0;width:100%;box-sizing:border-box}'
			. '@media(min-width:768px){.sl-gdpr-page .sl-gdpr-request-preview__details{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:16px}}';
	}

	if ( '' === $css ) {
		return $html;
	}

	if ( preg_match( '/<style\b[^>]*\bamp-custom\b[^>]*>.*?<\/style>/is', $html ) ) {
		return (string) preg_replace(
			'/(<style\b[^>]*\bamp-custom\b[^>]*>)(.*?)(<\/style>)/is',
			'$1$2' . $css . '$3',
			$html,
			1
		);
	}

	return $html;
}

/**
 * Force GWCT contact-direct buttons: 1-col mobile, 2-col tablet+.
 *
 * @param string $html Full AMP HTML.
 * @return string
 */
function succeedlearn_amp_reinforce_gwct_contact_direct_css( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}
	if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && ! succeedlearn_amp_is_serving_amp() ) {
		return $html;
	}
	if ( false === strpos( $html, 'sl-gwct-contact-direct__grid' ) ) {
		return $html;
	}

	$css = '.sl-gwct-page .sl-gwct-contact-direct__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:12px;width:100%}'
		. '.sl-gwct-page .sl-gwct-contact-direct__item,.sl-gwct-page .sl-gwct-contact__whatsapp{width:100%;max-width:100%;min-width:0;box-sizing:border-box}'
		. '@media(min-width:700px){.sl-gwct-page .sl-gwct-contact-direct__grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}}'
		. '@media(max-width:699px){.sl-gwct-page .sl-gwct-contact-direct__grid{grid-template-columns:minmax(0,1fr)}}';

	if ( preg_match( '/<style\b[^>]*\bamp-custom\b[^>]*>.*?<\/style>/is', $html ) ) {
		return (string) preg_replace(
			'/(<style\b[^>]*\bamp-custom\b[^>]*>)(.*?)(<\/style>)/is',
			'$1$2' . $css . '$3',
			$html,
			1
		);
	}

	return $html;
}

/**
 * Force CoC features grid: 1-col mobile, 2-col tablet, 4-col desktop.
 *
 * @param string $html Full AMP HTML.
 * @return string
 */
function succeedlearn_amp_reinforce_coc_features_css( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}
	if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && ! succeedlearn_amp_is_serving_amp() ) {
		return $html;
	}
	if ( false === strpos( $html, 'sl-code-conduct-features__grid' ) ) {
		return $html;
	}

	$css = '.sl-coc-page .sl-code-conduct-features.sl-section{position:relative;z-index:1;padding:60px 16px;background:#fff}'
		. '.sl-coc-page .sl-code-conduct-features__heading{width:100%;margin:0 0 34px;text-align:left}'
		. '.sl-coc-page .sl-code-conduct-features__heading h2{margin:0 0 16px;color:#16234e}'
		. '.sl-coc-page .sl-code-conduct-features__heading h2>span{color:#1472ba}'
		. '.sl-coc-page .sl-code-conduct-features__heading p{width:100%;margin:0;color:#4A4A4A;font-size:16px;line-height:1.7}'
		. '.sl-coc-page .sl-code-conduct-features__grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:100%}'
		. '.sl-coc-page .sl-code-conduct-features__card{display:flex;align-items:center;gap:14px;min-width:0;width:100%;min-height:82px;margin:0;padding:18px 20px;border:1px solid rgba(107,124,147,.18);border-radius:14px;background:#f5f5f5;box-sizing:border-box}'
		. '.sl-coc-page .sl-code-conduct-features__icon{display:inline-flex;align-items:center;justify-content:center;flex:0 0 30px;width:30px;height:30px;margin:0;color:#1472ba}'
		. '.sl-coc-page .sl-code-conduct-features__icon svg{display:block;width:26px;height:26px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}'
		. '.sl-coc-page .sl-code-conduct-features__label{display:block;flex:1 1 auto;min-width:0;margin:0;color:#16234e;font-size:16px;font-weight:700;line-height:1.4;overflow-wrap:anywhere}'
		. '@media(min-width:768px){.sl-coc-page .sl-code-conduct-features.sl-section{padding-top:75px;padding-bottom:75px}.sl-coc-page .sl-code-conduct-features__heading{margin-bottom:38px}.sl-coc-page .sl-code-conduct-features__grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px;width:100%}.sl-coc-page .sl-code-conduct-features__card{min-height:94px;padding:20px 24px;gap:16px}.sl-coc-page .sl-code-conduct-features__grid>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}}'
		. '@media(min-width:1000px){.sl-coc-page .sl-code-conduct-features.sl-section{padding-top:90px;padding-bottom:90px}.sl-coc-page .sl-code-conduct-features__heading{margin-bottom:42px}.sl-coc-page .sl-code-conduct-features__grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:24px;width:100%}.sl-coc-page .sl-code-conduct-features__card{min-height:104px;padding:22px 24px}.sl-coc-page .sl-code-conduct-features__grid>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}}';

	if ( preg_match( '/<style\b[^>]*\bamp-custom\b[^>]*>.*?<\/style>/is', $html ) ) {
		return (string) preg_replace(
			'/(<style\b[^>]*\bamp-custom\b[^>]*>)(.*?)(<\/style>)/is',
			'$1$2' . $css . '$3',
			$html,
			1
		);
	}

	return $html;
}

/**
 * Force shared AMP card-grid breakpoints after CSS post-processing.
 *
 * Use class `sl-amp-card-grid` on any card row:
 * - mobile: 1 col
 * - tablet+: 2 col (odd last card centered half-width)
 * Opt out with `sl-amp-card-grid--1col` to keep 1 col at all widths.
 * Page CSS can still set 3/4 columns at desktop.
 *
 * @param string $html Full AMP HTML.
 * @return string
 */
function succeedlearn_amp_reinforce_card_grid_css( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}
	if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && ! succeedlearn_amp_is_serving_amp() ) {
		return $html;
	}
	if ( false === strpos( $html, 'sl-amp-card-grid' ) ) {
		return $html;
	}

	$css = '.sl-amp-card-grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:100%}'
		. '.sl-amp-card-grid>*{min-width:0;width:100%;margin:0;box-sizing:border-box}'
		. '@media(min-width:768px){.sl-amp-card-grid:not(.sl-amp-card-grid--1col){display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px;width:100%}'
		. '.sl-amp-card-grid:not(.sl-amp-card-grid--1col)>:last-child:nth-child(odd){grid-column:1/-1;justify-self:center;width:100%;max-width:calc((100% - 20px)/2)}}'
		. '.sl-amp-card-grid--1col,.sl-amp-card-grid.sl-amp-card-grid--1col{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;width:100%}'
		. '.sl-amp-card-grid--1col>:last-child:nth-child(odd){grid-column:auto;justify-self:stretch;max-width:none}';

	if ( preg_match( '/<style\b[^>]*\bamp-custom\b[^>]*>.*?<\/style>/is', $html ) ) {
		return (string) preg_replace(
			'/(<style\b[^>]*\bamp-custom\b[^>]*>)(.*?)(<\/style>)/is',
			'$1$2' . $css . '$3',
			$html,
			1
		);
	}

	return $html;
}

/**
 * Resolve a wp-content/uploads asset URL (local file or production fallback).
 *
 * @param string $path Path under uploads/ (e.g. "2026/08/Reality.webp").
 * @return string
 */
function succeedlearn_amp_upload_url( $path ) {
	if ( function_exists( 'akaza_upload_url' ) ) {
		return akaza_upload_url( $path );
	}

	$path  = ltrim( (string) $path, '/' );
	$path  = preg_replace( '#^uploads/#', '', $path );
	$local = WP_CONTENT_DIR . '/uploads/' . $path;

	if ( file_exists( $local ) ) {
		return content_url( '/uploads/' . $path );
	}

	return 'https://succeedlearn.com/wp-content/uploads/' . $path;
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

/**
 * Render hero breadcrumbs on AMP pages (reuses theme trail when available).
 *
 * @param string $fallback_label Optional current-page label if theme trail is unavailable.
 */
function succeedlearn_amp_render_hero_breadcrumbs( $fallback_label = '' ) {
	static $done = false;
	if ( $done ) {
		return;
	}

	if ( is_front_page() ) {
		return;
	}

	$items = array();

	if ( function_exists( 'akaza_get_breadcrumbs' ) ) {
		$items = akaza_get_breadcrumbs();
	}

	if ( count( $items ) < 2 ) {
		$label = '' !== $fallback_label
			? $fallback_label
			: ( function_exists( 'get_the_title' ) ? get_the_title() : '' );

		if ( '' === $label ) {
			return;
		}

		$items = array(
			array(
				'label' => __( 'Home', 'succeedlearn-amp' ),
				'url'   => home_url( '/' ),
			),
			array(
				'label'   => $label,
				'url'     => '',
				'current' => true,
			),
		);
	}

	foreach ( $items as &$item ) {
		if ( empty( $item['current'] ) && ! empty( $item['url'] ) ) {
			$item['url'] = succeedlearn_amp_url( $item['url'] );
		}
	}
	unset( $item );

	$done = true;

	$partial = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/shared/breadcrumbs.php';
	if ( ! is_readable( $partial ) ) {
		return;
	}

	// phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable -- plugin template path.
	include $partial;
}
