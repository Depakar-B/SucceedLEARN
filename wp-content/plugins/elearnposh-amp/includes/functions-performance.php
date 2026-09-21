<?php
/**
 * Performance Helper Functions
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get optimized CSS for page
 *
 * @param string $page_type Page type (home, course, blog, etc.).
 * @param array  $style_files Array of style file names to include.
 * @return string Optimized CSS.
 */
function elearnposh_amp_get_optimized_css( $page_type, $style_files = array() ) {
	$style_files = array_values(
		array_unique(
			array_merge(
				array( 'bottom-bar', 'demo-btn', 'breadcrumbs' ),
				(array) $style_files
			)
		)
	);
	$optimizer = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
	return $optimizer->get_optimized_css( $page_type, $style_files );
}

/**
 * Output optimized CSS for page
 *
 * @param string $page_type Page type.
 * @param array  $style_files Array of style file names to include.
 */
function elearnposh_amp_output_optimized_css( $page_type, $style_files = array() ) {
	$css = elearnposh_amp_get_optimized_css( $page_type, $style_files );
	if ( '' === trim( $css ) ) {
		require_once ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-styles.php';
		elearnposh_amp_include_inline_styles( $style_files );
		return;
	}
	echo $css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Include one templates/styles/*.php partial into amp-custom (bypasses upload cache).
 *
 * @param string $name Style file name without .php.
 */
function elearnposh_amp_include_style_partial( $name ) {
	$path = ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/' . sanitize_file_name( $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * Output menu/footer CSS + optional page partials (reliable on ?amp=1).
 *
 * @param string $page_type     Optimizer page type key.
 * @param array  $style_files   Extra style partials under templates/styles/.
 * @param array  $always_inline Partials always included after cache (page-specific; never skipped).
 */
function elearnposh_amp_output_page_styles( $page_type, $style_files = array(), $always_inline = array() ) {
	$shared        = array( 'menu', 'footer', 'bottom-bar', 'demo-btn', 'breadcrumbs' );
	$extra         = array_diff( array_unique( array_merge( (array) $style_files, (array) $always_inline ) ), $shared );
	// Page partials in $always_inline are appended after cache — keep them out of the bundle to avoid duplication and the 75KB amp-custom limit.
	$cache_extra   = array_diff( $extra, array_unique( (array) $always_inline ) );
	$cache_files   = array_values( array_unique( array_merge( $shared, $cache_extra ) ) );
	$optimizer     = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
	$css           = $optimizer->get_optimized_css( $page_type, $cache_files );

	if ( '' !== trim( $css ) ) {
		echo $css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		require_once ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-styles.php';
		elearnposh_amp_include_inline_styles( $cache_files );
	}

	foreach ( array_unique( (array) $always_inline ) as $partial ) {
		elearnposh_amp_include_style_partial( $partial );
	}

	// After bundled/tree-shaken CSS so scroll-to-top rules stay current (AMPforWP caches amp-custom).
	elearnposh_amp_include_style_partial( 'scroll-to-top' );
}

/**
 * Output AMP component scripts for page
 *
 * @param string $page_type Page type.
 * @param array  $additional_components Additional components needed.
 */
function elearnposh_amp_output_components( $page_type, $additional_components = array() ) {
	$optimizer = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
	$optimizer->output_amp_components( $page_type, $additional_components );
}

/**
 * Remove legacy newsletter AMP lightboxes (submit-* attrs outside <form> — invalid).
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_remove_legacy_newsletter_lightboxes( $html ) {
	if ( false === stripos( $html, 'ns-success-lightbox' ) && false === stripos( $html, 'ns-error-lightbox' ) ) {
		return $html;
	}

	$html = preg_replace(
		'/<amp-lightbox\b[^>]*\bid=["\']ns-success-lightbox["\'][^>]*>[\s\S]*?<\/amp-lightbox>\s*/i',
		'',
		$html
	);

	return preg_replace(
		'/<amp-lightbox\b[^>]*\bid=["\']ns-error-lightbox["\'][^>]*>[\s\S]*?<\/amp-lightbox>\s*/i',
		'',
		$html
	);
}

/**
 * Inject valid AMP form response blocks when legacy newsletter markup is detected.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_inject_newsletter_form_responses( $html ) {
	if ( false === stripos( $html, 'ns-amp-subscription-form' ) ) {
		return $html;
	}

	if ( preg_match( '/<form\b[^>]*\bid=["\']ns-amp-subscription-form["\'][^>]*>[\s\S]*?<div\s+submit-success\b/i', $html ) ) {
		return $html;
	}

	$inject  = '<div submit-success><template type="amp-mustache"><div class="ans-message ans-success">{{message}}</div></template></div>';
	$inject .= '<div submit-error><template type="amp-mustache"><div class="ans-message ans-error">';
	$inject .= '{{#errors.email}}{{errors.email.message}}{{/errors.email}}';
	$inject .= '{{#errors.name}}{{errors.name.message}}{{/errors.name}}';
	$inject .= '{{^errors.email}}{{^errors.name}}{{message}}{{/errors.name}}{{/errors.email}}';
	$inject .= '</div></template></div>';

	return preg_replace(
		'/(<form\b[^>]*\bid=["\']ns-amp-subscription-form["\'][^>]*>[\s\S]*?)(<\/form>)/i',
		'$1' . $inject . '$2',
		$html,
		1
	);
}

/**
 * Remove nested <!DOCTYPE> and <html> tags injected inside the root document.
 *
 * The head-buffer sanitizer used to treat fragments as full documents and inject
 * a second doctype/html block inside <head>, which breaks AMP on dozens of URLs.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_remove_nested_document_tags( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}

	$html = preg_replace( '/^\xEF\xBB\xBF/', '', $html );

	if ( ! preg_match( '/<html\b/i', $html ) ) {
		return $html;
	}

	$offset = 0;
	if ( preg_match( '/^\s*<!DOCTYPE\s+html[^>]*>/i', $html, $doctype_match, PREG_OFFSET_CAPTURE ) ) {
		$offset = $doctype_match[0][1] + strlen( $doctype_match[0][0] );
	}

	if ( ! preg_match( '/<html\b[^>]*>/i', $html, $open_match, PREG_OFFSET_CAPTURE, $offset ) ) {
		return $html;
	}

	$root_open_pos = $open_match[0][1];
	$root_open_len = strlen( $open_match[0][0] );
	$close_pos     = strripos( $html, '</html>' );

	if ( false === $close_pos || $close_pos <= $root_open_pos ) {
		return $html;
	}

	$inner_start = $root_open_pos + $root_open_len;
	$inner       = substr( $html, $inner_start, $close_pos - $inner_start );

	$inner = preg_replace( '/<!DOCTYPE\s+html[^>]*>\s*/i', '', $inner );
	$inner = preg_replace( '/<\/?html\b[^>]*>\s*/i', '', $inner );

	return substr( $html, 0, $inner_start ) . $inner . substr( $html, $close_pos );
}

/**
 * Whether HTML is a full document (not a fragment embedded in a template).
 *
 * Must match only at the start of the string — a literal "<html" in post body
 * must not trigger full-document DOM handling (that injects a second doctype/html).
 *
 * @param string $html HTML.
 * @return bool
 */
function elearnposh_amp_is_full_html_document( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return false;
	}

	return (bool) preg_match( '/^\s*<!DOCTYPE\s+html\b/i', $html )
		|| (bool) preg_match( '/^\s*<html\b/i', $html );
}

/**
 * Ensure a full AMP page has exactly one canonical <!doctype html> at the start.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_ensure_amp_doctype( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}

	$html = elearnposh_amp_remove_nested_document_tags( $html );

	if ( ! preg_match( '/<html\b/i', $html ) ) {
		return $html;
	}

	$html = preg_replace( '/<!DOCTYPE\s+html[^>]*>\s*/i', '', $html );
	$html = ltrim( $html );

	return "<!doctype html>\n" . $html;
}

/**
 * AMP boilerplate style block required in every valid AMP document head.
 *
 * @return string
 */
function elearnposh_amp_mandatory_boilerplate_markup() {
	return '<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>'
		. '<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>';
}

/**
 * Ensure <html> carries the mandatory amp attribute.
 *
 * @param string $html Full AMP HTML document.
 * @return string
 */
function elearnposh_amp_ensure_html_amp_attribute( $html ) {
	if ( ! is_string( $html ) || '' === $html || false === stripos( $html, '<html' ) ) {
		return $html;
	}

	return preg_replace_callback(
		'/<html\b([^>]*)>/i',
		static function ( $matches ) {
			$attrs = $matches[1];
			if ( preg_match( '/\b(?:amp|⚡)\b/u', $attrs ) ) {
				return $matches[0];
			}

			return '<html amp' . $attrs . '>';
		},
		$html,
		1
	);
}

/**
 * Inject v0.js and amp-boilerplate when HTML minifiers strip mandatory AMP head tags.
 *
 * @param string $html Full AMP HTML document.
 * @return string
 */
function elearnposh_amp_ensure_mandatory_amp_head_tags( $html ) {
	if ( ! is_string( $html ) || '' === $html || false === stripos( $html, '<html' ) ) {
		return $html;
	}

	if ( ! preg_match( '#<script\b[^>]*\bsrc=["\']https://cdn\.ampproject\.org/v0\.js["\']#i', $html ) ) {
		$v0 = '<script async src="https://cdn.ampproject.org/v0.js"></script>';
		if ( preg_match( '/<meta\b[^>]*\bcharset[^>]*>/i', $html ) ) {
			$html = preg_replace( '/(<meta\b[^>]*\bcharset[^>]*>)/i', '$1' . $v0, $html, 1 );
		} elseif ( preg_match( '/<head\b[^>]*>/i', $html ) ) {
			$html = preg_replace( '/(<head\b[^>]*>)/i', '$1' . $v0, $html, 1 );
		}
	}

	if ( ! preg_match( '/<style\b[^>]*\bamp-boilerplate\b/i', $html ) ) {
		$html = elearnposh_amp_insert_before_amp_custom_style( $html, elearnposh_amp_mandatory_boilerplate_markup() );
	}

	return $html;
}

/**
 * AMP requires rel=noopener on links that open in a new tab.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_fix_external_link_attributes( $html ) {
	if ( false === stripos( $html, '<a' ) || false === stripos( $html, 'target=' ) ) {
		return $html;
	}

	return preg_replace_callback(
		'/<a\b([^>]*)>/i',
		static function ( $matches ) {
			$attrs = $matches[1];
			if ( ! preg_match( '/\btarget\s*=\s*(["\'])_blank\1/i', $attrs ) ) {
				return $matches[0];
			}

			if ( preg_match( '/\brel\s*=\s*(["\'])([^"\']*)\1/i', $attrs, $rel_match ) ) {
				$rel = $rel_match[2];
				if ( false !== stripos( $rel, 'noopener' ) ) {
					return $matches[0];
				}
				$new_rel = trim( $rel . ' noopener noreferrer' );
				$attrs   = preg_replace(
					'/\brel\s*=\s*(["\'])[^"\']*\1/i',
					'rel=' . $rel_match[1] . $new_rel . $rel_match[1],
					$attrs,
					1
				);
				return '<a' . $attrs . '>';
			}

			return '<a' . $attrs . ' rel="noopener noreferrer">';
		},
		$html
	);
}

/**
 * Keep submit-error / submit-success only on direct children of <form>.
 *
 * @param string $html            HTML fragment or document.
 * @param bool   $fragment_only   When true, never treat as a full document.
 * @return string
 */
function elearnposh_amp_fix_form_response_attributes( $html, $fragment_only = false ) {
	if ( false === stripos( $html, 'submit-error' ) && false === stripos( $html, 'submit-success' ) ) {
		return $html;
	}

	$doctype    = '';
	$root_open  = '';
	$root_close = '';
	$work       = $html;

	if ( ! $fragment_only && elearnposh_amp_is_full_html_document( $html ) ) {
		if ( preg_match( '/^\s*(<!DOCTYPE\s+html[^>]*>)/i', $html, $doctype_match ) ) {
			$doctype = $doctype_match[1];
			$work    = substr( $html, strlen( $doctype_match[0] ) );
		}
		$work = ltrim( $work );
		if ( preg_match( '/^(<html\b[^>]*>)(.*)(<\/html>)\s*$/is', $work, $root_match ) ) {
			$root_open  = $root_match[1];
			$work       = $root_match[2];
			$root_close = $root_match[3];
		}
	}

	if ( class_exists( 'DOMDocument' ) ) {
		libxml_use_internal_errors( true );
		$doc    = new DOMDocument();
		$flags  = LIBXML_HTML_NODEFDTD | LIBXML_COMPACT;
		$prefix = '<?xml encoding="UTF-8">';
		$loaded = $doc->loadHTML( $prefix . '<div id="elearnposh-amp-root">' . $work . '</div>', $flags );
		$root   = $doc->getElementById( 'elearnposh-amp-root' );

		if ( $loaded && $root ) {
			$all = $root->getElementsByTagName( '*' );
			foreach ( $all as $el ) {
				if ( ! ( $el instanceof DOMElement ) ) {
					continue;
				}
				if ( ! $el->hasAttribute( 'submit-error' ) && ! $el->hasAttribute( 'submit-success' ) ) {
					continue;
				}
				$parent = $el->parentNode;
				if ( ! $parent || 'form' !== strtolower( $parent->nodeName ) ) {
					$el->removeAttribute( 'submit-error' );
					$el->removeAttribute( 'submit-success' );
				}
			}

			$out = '';
			foreach ( $root->childNodes as $child ) {
				$out .= $doc->saveHTML( $child );
			}

			$html = $doctype;
			if ( '' !== $doctype ) {
				$html .= "\n";
			}
			$html .= $root_open . $out . $root_close;
		}
		libxml_clear_errors();
		return $html;
	}

	// Fallback when DOM is unavailable.
	return preg_replace_callback(
		'/<amp-lightbox\b[^>]*\bid=["\']ns-(?:error|success)-lightbox["\'][^>]*>[\s\S]*?<\/amp-lightbox>/i',
		static function ( $block ) {
			return preg_replace( '/\s(submit-error|submit-success)\b/i', '', $block[0] );
		},
		$html
	);
}

/**
 * Fix invalid AMP form markup (e.g. legacy newsletter shortcode output).
 *
 * @param string $html          HTML fragment.
 * @param bool   $fragment_only When true, never run full-document DOM handling.
 * @return string
 */
function elearnposh_amp_sanitize_amp_form_markup( $html, $fragment_only = false ) {
	if ( '' === $html ) {
		return $html;
	}

	// AMP forms with action-xhr must not also have action= (wmpro / third-party shortcodes).
	if ( false !== stripos( $html, '<form' ) && false !== stripos( $html, 'action-xhr' ) ) {
		$html = preg_replace_callback(
			'/<form\b[^>]*>/i',
			static function ( $matches ) {
				$tag = $matches[0];
				if ( false === stripos( $tag, 'action-xhr' ) ) {
					return $tag;
				}
				// Strip action= when action-xhr is present.
				$tag = preg_replace( '/\saction=(["\'])[^"\']*\1/i', '', $tag );
				// AMP forbids __amp_source_origin in action-xhr (runtime adds it).
				$tag = preg_replace_callback(
					'/\s(action-xhr=(["\']))([^"\']*)\2/i',
					static function ( $m ) {
						$url = preg_replace( '/([?&])__amp_source_origin=[^&]*&?/', '$1', $m[3] );
						$url = rtrim( (string) $url, '?&' );
						return ' ' . $m[1] . $url . $m[2];
					},
					$tag
				);
				return $tag;
			},
			$html
		);
	}

	$needs_sanitize = false !== stripos( $html, 'submit-error' )
		|| false !== stripos( $html, 'submit-success' )
		|| false !== stripos( $html, 'reset-on-success' )
		|| false !== stripos( $html, 'ns-success-lightbox' )
		|| false !== stripos( $html, 'ns-error-lightbox' );

	if ( ! $needs_sanitize ) {
		return $html;
	}

	$html = elearnposh_amp_remove_legacy_newsletter_lightboxes( $html );

	// AMP: submit-error / submit-success must be on div, not span.
	$html = preg_replace(
		'/<span(\s+submit-(?:error|success)\b[^>]*)>(\s*<template\b[^>]*\btype\s*=\s*(?:["\'])?amp-mustache(?:["\'])?[^>]*>.*?<\/template>\s*)<\/span>/is',
		'<div$1>$2</div>',
		$html
	);

	// Strip submit-* from any remaining span (legacy per-field captcha markup).
	$html = preg_replace( '/<span([^>]*)\s(submit-error|submit-success)\b([^>]*)>/i', '<span$1$3>', $html );

	// reset-on-success is not valid on a plain <form> in AMP HTML (legacy newsletter template).
	$html = preg_replace(
		'/(<form\b[^>]*?)\sreset-on-success(?:=(?:["\'][^\s"\']*["\']|[^\s>]+))?/i',
		'$1',
		$html
	);

	// submit-error / submit-success must be direct children of <form> (not inside amp-lightbox wrappers).
	$html = elearnposh_amp_fix_form_response_attributes( $html, $fragment_only );

	$html = elearnposh_amp_inject_newsletter_form_responses( $html );

	return $html;
}

/**
 * Remove invalid attributes from amp-img (e.g. loading="lazy" from legacy templates).
 *
 * @param string $html HTML fragment.
 * @return string
 */
function elearnposh_amp_sanitize_amp_img_markup( $html ) {
	if ( '' === $html || false === stripos( $html, 'amp-img' ) ) {
		return $html;
	}

	$strip_attrs = array( 'loading', 'fetchpriority', 'decoding', 'referrerpolicy', 'crossorigin', 'importance' );

	return preg_replace_callback(
		'/<amp-img\b[^>]*>/i',
		static function ( $matches ) use ( $strip_attrs ) {
			$tag = $matches[0];
			foreach ( $strip_attrs as $attr ) {
				$tag = preg_replace( '/\s' . preg_quote( $attr, '/' ) . '(?:=(?:["\'][^\s"\']*["\']|[^\s>]+))?/i', '', $tag );
			}
			if ( preg_match( '/\bsrc=(["\'])([^"\']*)\1/i', $tag, $src_match ) ) {
				$clean_src = elearnposh_amp_resolve_media_url( $src_match[2] );
				if ( '' !== $clean_src && $clean_src !== $src_match[2] ) {
					$tag = preg_replace(
						'/\bsrc=(["\'])([^"\']*)\1/i',
						'src="' . esc_attr( $clean_src ) . '"',
						$tag,
						1
					);
				}
			}
			return $tag;
		},
		$html
	);
}

/**
 * Read a single attribute value from an img/picture tag attribute string.
 *
 * @param string $attrs Attribute string.
 * @param string $name  Attribute name.
 * @return string
 */
function elearnposh_amp_resolve_img_attribute( $attrs, $name ) {
	if ( ! preg_match( '/\b' . preg_quote( $name, '/' ) . '=(["\'])([^"\']*)\1/i', $attrs, $match ) ) {
		return '';
	}

	return html_entity_decode( $match[2], ENT_QUOTES, 'UTF-8' );
}

/**
 * Pick the largest candidate URL from a srcset attribute value.
 *
 * @param string $srcset Srcset attribute value.
 * @return string
 */
function elearnposh_amp_pick_largest_srcset_url( $srcset ) {
	$best_url = '';
	$best_w   = 0;

	foreach ( preg_split( '/\s*,\s*/', (string) $srcset ) as $candidate ) {
		$candidate = trim( $candidate );
		if ( '' === $candidate ) {
			continue;
		}

		$parts = preg_split( '/\s+/', $candidate );
		$url   = $parts[0];
		$w     = 0;
		if ( isset( $parts[1] ) && preg_match( '/(\d+)w/i', $parts[1], $width_match ) ) {
			$w = (int) $width_match[1];
		}

		if ( $w >= $best_w ) {
			$best_w   = $w;
			$best_url = $url;
		}
	}

	return $best_url;
}

/**
 * Strip invisible Unicode and stray whitespace from media URLs.
 *
 * @param string $url Media URL.
 * @return string
 */
function elearnposh_amp_clean_media_url( $url ) {
	if ( ! is_string( $url ) || '' === $url ) {
		return '';
	}

	$url = html_entity_decode( $url, ENT_QUOTES, 'UTF-8' );
	$url = preg_replace( '/[\x{200B}-\x{200D}\x{FEFF}\x{2060}\x{00A0}]+/u', '', $url );
	$url = trim( $url );

	return $url;
}

/**
 * Resolve a media URL for AMP output: clean artifacts and fall back to production uploads on local when the file is missing.
 *
 * @param string $url Media URL.
 * @return string
 */
function elearnposh_amp_resolve_media_url( $url ) {
	$url = elearnposh_amp_clean_media_url( $url );
	if ( '' === $url || ! preg_match( '#/wp-content/uploads/(.+)$#i', $url, $matches ) ) {
		return $url;
	}

	$relative = $matches[1];
	// Paths in URLs are percent-encoded (e.g. spaces as %20); decode before file_exists().
	$relative_path = rawurldecode( $relative );
	$upload        = wp_upload_dir();
	if ( empty( $upload['error'] ) ) {
		$local_file = wp_normalize_path( trailingslashit( $upload['basedir'] ) . $relative_path );
		if ( file_exists( $local_file ) ) {
			return $url;
		}
	}

	$host = wp_parse_url( home_url(), PHP_URL_HOST );
	if ( is_string( $host ) && false === stripos( $host, 'elearnposh.com' ) ) {
		return 'https://elearnposh.com/wp-content/uploads/' . $relative;
	}

	return $url;
}

/**
 * Get a cleaned post thumbnail URL for AMP/newsletter templates.
 *
 * @param int    $post_id Post ID.
 * @param string $size    Image size.
 * @return string
 */
function elearnposh_amp_get_post_thumbnail_url( $post_id, $size = 'medium_large' ) {
	$url = get_the_post_thumbnail_url( $post_id, $size );
	if ( ! is_string( $url ) || '' === $url ) {
		$attachment_id = get_post_thumbnail_id( $post_id );
		if ( $attachment_id ) {
			$url = wp_get_attachment_image_url( $attachment_id, 'full' );
		}
	}

	return is_string( $url ) && '' !== $url ? elearnposh_amp_resolve_media_url( $url ) : '';
}

/**
 * Rewrite img/amp-img src and srcset URLs in post HTML (local missing files → production).
 *
 * @param string $html Post content HTML.
 * @return string
 */
function elearnposh_amp_resolve_content_media_urls( $html ) {
	if ( ! is_string( $html ) || '' === $html || false === stripos( $html, 'src' ) ) {
		return $html;
	}

	$attrs = array( 'src', 'srcset', 'data-src', 'data-lazy-src', 'data-original', 'data-orig-file' );

	return preg_replace_callback(
		'/\b(' . implode( '|', $attrs ) . ')=(["\'])([^"\']*)\2/i',
		static function ( $matches ) {
			$attr = strtolower( $matches[1] );
			$raw  = html_entity_decode( $matches[3], ENT_QUOTES, 'UTF-8' );

			if ( 'srcset' === $attr ) {
				$resolved_parts = array();
				foreach ( preg_split( '/\s*,\s*/', $raw ) as $candidate ) {
					$candidate = trim( $candidate );
					if ( '' === $candidate ) {
						continue;
					}
					$bits = preg_split( '/\s+/', $candidate );
					if ( ! empty( $bits[0] ) ) {
						$bits[0] = elearnposh_amp_resolve_media_url( $bits[0] );
						$resolved_parts[] = implode( ' ', $bits );
					}
				}
				$resolved = implode( ', ', $resolved_parts );
			} else {
				$resolved = elearnposh_amp_resolve_media_url( $raw );
			}

			if ( '' === $resolved || 0 === strpos( $resolved, 'data:' ) ) {
				return $matches[0];
			}

			return $attr . '="' . esc_attr( $resolved ) . '"';
		},
		$html
	);
}

/**
 * Resolve a usable image URL from img tag attributes (handles lazy-load placeholders).
 *
 * @param string $attrs Img tag attribute string.
 * @return string
 */
function elearnposh_amp_resolve_img_src( $attrs ) {
	$src = elearnposh_amp_resolve_img_attribute( $attrs, 'src' );

	if ( '' === $src || 0 === strpos( $src, 'data:' ) ) {
		foreach ( array( 'data-src', 'data-lazy-src', 'data-original', 'data-orig-file' ) as $attr ) {
			$candidate = elearnposh_amp_resolve_img_attribute( $attrs, $attr );
			if ( '' !== $candidate && 0 !== strpos( $candidate, 'data:' ) ) {
				$src = $candidate;
				break;
			}
		}
	}

	if ( ( '' === $src || 0 === strpos( $src, 'data:' ) ) ) {
		$srcset = elearnposh_amp_resolve_img_attribute( $attrs, 'srcset' );
		if ( '' !== $srcset ) {
			$src = elearnposh_amp_pick_largest_srcset_url( $srcset );
		}
	}

	return elearnposh_amp_resolve_media_url( $src );
}

/**
 * Resolve attachment ID and dimensions for an image URL.
 *
 * @param string $src Image URL.
 * @return array{width:int,height:int,attachment_id:int,alt:string}
 */
function elearnposh_amp_resolve_attachment_image_meta( $src ) {
	static $meta_cache = array();

	$meta = array(
		'width'           => 0,
		'height'          => 0,
		'attachment_id'   => 0,
		'alt'             => '',
	);

	if ( '' === $src || ! function_exists( 'attachment_url_to_postid' ) ) {
		return $meta;
	}

	if ( isset( $meta_cache[ $src ] ) ) {
		return $meta_cache[ $src ];
	}

	$attachment_id = attachment_url_to_postid( $src );
	if ( ! $attachment_id && preg_match( '/^(.+)(-\d+x\d+)(\.[a-z0-9]+)$/i', $src, $size_match ) ) {
		$base_src = $size_match[1] . $size_match[3];
		if ( isset( $meta_cache[ $base_src ] ) && $meta_cache[ $base_src ]['attachment_id'] > 0 ) {
			$attachment_id = $meta_cache[ $base_src ]['attachment_id'];
		} else {
			$attachment_id = attachment_url_to_postid( $base_src );
		}
	}

	if ( ! $attachment_id ) {
		return $meta;
	}

	$meta['attachment_id'] = (int) $attachment_id;

	if ( function_exists( 'wp_get_attachment_metadata' ) ) {
		$image_meta = wp_get_attachment_metadata( $attachment_id );
		if ( is_array( $image_meta ) ) {
			$meta['width']  = isset( $image_meta['width'] ) ? (int) $image_meta['width'] : 0;
			$meta['height'] = isset( $image_meta['height'] ) ? (int) $image_meta['height'] : 0;
		}
	}

	if ( function_exists( 'get_post_meta' ) ) {
		$media_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
		if ( is_string( $media_alt ) && '' !== $media_alt ) {
			$meta['alt'] = $media_alt;
		}
	}

	$meta_cache[ $src ] = $meta;

	return $meta;
}

/**
 * Build an amp-img tag from img attributes.
 *
 * @param string $attrs Img tag attribute string.
 * @return string
 */
function elearnposh_amp_build_amp_img_from_img_attrs( $attrs ) {
	$src = elearnposh_amp_resolve_img_src( $attrs );
	if ( '' === $src || 0 === strpos( $src, 'data:' ) ) {
		return '';
	}

	$width  = 0;
	$height = 0;
	if ( preg_match( '/\bwidth=(["\']?)(\d+)\1/i', $attrs, $width_match ) ) {
		$width = (int) $width_match[2];
	}
	if ( preg_match( '/\bheight=(["\']?)(\d+)\1/i', $attrs, $height_match ) ) {
		$height = (int) $height_match[2];
	}

	$alt   = elearnposh_amp_resolve_img_attribute( $attrs, 'alt' );
	$class = elearnposh_amp_resolve_img_attribute( $attrs, 'class' );

	$attachment_meta = elearnposh_amp_resolve_attachment_image_meta( $src );
	if ( $width <= 0 && $attachment_meta['width'] > 0 ) {
		$width = $attachment_meta['width'];
	}
	if ( $height <= 0 && $attachment_meta['height'] > 0 ) {
		$height = $attachment_meta['height'];
	}
	if ( '' === $alt && '' !== $attachment_meta['alt'] ) {
		$alt = $attachment_meta['alt'];
	}

	if ( $width <= 0 ) {
		$width = 600;
	}
	if ( $height <= 0 ) {
		$height = 400;
	}

	$layout = 'responsive';
	if ( preg_match( '/\b(img-100|size-small)\b/i', $class ) ) {
		$width  = 100;
		$height = 100;
	} elseif ( preg_match( '/\bimg-120\b/i', $class ) ) {
		$width  = 120;
		$height = 120;
	} elseif ( preg_match( '/\b(avatar|size-thumbnail)\b/i', $class ) ) {
		$width  = min( $width, 96 );
		$height = min( $height, 96 );
	}

	$class_attr = '' !== $class ? ' class="' . esc_attr( $class ) . '"' : '';

	return '<amp-img src="' . esc_url( elearnposh_amp_resolve_media_url( $src ) ) . '" width="' . esc_attr( (string) $width ) . '" height="' . esc_attr( (string) $height ) . '" alt="' . esc_attr( $alt ) . '" layout="' . esc_attr( $layout ) . '"' . $class_attr . '></amp-img>';
}

/**
 * Convert <picture> blocks to amp-img using the inner img/source URLs.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_convert_picture_elements_to_amp_img( $html ) {
	if ( false === stripos( $html, '<picture' ) ) {
		return $html;
	}

	return preg_replace_callback(
		'/<picture\b[^>]*>[\s\S]*?<\/picture>/i',
		static function ( $matches ) {
			$picture_html = $matches[0];

			if ( preg_match( '/<img\b([^>]*)\/?>/i', $picture_html, $img_match ) ) {
				$amp_img = elearnposh_amp_build_amp_img_from_img_attrs( $img_match[1] );
				if ( '' !== $amp_img ) {
					return $amp_img;
				}
			}

			if ( preg_match_all( '/<source\b([^>]*)\/?>/i', $picture_html, $source_matches, PREG_SET_ORDER ) ) {
				foreach ( $source_matches as $source_match ) {
					$srcset = elearnposh_amp_resolve_img_attribute( $source_match[1], 'srcset' );
					$src    = elearnposh_amp_pick_largest_srcset_url( $srcset );
					if ( '' === $src ) {
						$src = elearnposh_amp_resolve_img_attribute( $source_match[1], 'src' );
					}
					if ( '' !== $src && 0 !== strpos( $src, 'data:' ) ) {
						$attachment_meta = elearnposh_amp_resolve_attachment_image_meta( $src );
						$width           = $attachment_meta['width'] > 0 ? $attachment_meta['width'] : 600;
						$height          = $attachment_meta['height'] > 0 ? $attachment_meta['height'] : 400;
						$alt             = $attachment_meta['alt'];

						return '<amp-img src="' . esc_url( $src ) . '" width="' . esc_attr( (string) $width ) . '" height="' . esc_attr( (string) $height ) . '" alt="' . esc_attr( $alt ) . '" layout="responsive"></amp-img>';
					}
				}
			}

			return '';
		},
		$html
	);
}

/**
 * Convert raw img tags in AMP output to amp-img.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_convert_img_tags_to_amp_img( $html ) {
	if ( false === stripos( $html, '<img' ) && false === stripos( $html, '<picture' ) ) {
		return $html;
	}

	$html = elearnposh_amp_convert_picture_elements_to_amp_img( $html );

	if ( false === stripos( $html, '<img' ) ) {
		return $html;
	}

	// Unwrap lazy-load fallbacks so the real <img> can be converted.
	$html = preg_replace( '/<noscript>\s*(<img\b[^>]*\/?>)\s*<\/noscript>/i', '$1', $html );

	return preg_replace_callback(
		'/<img\b([^>]*)\/?>/i',
		static function ( $matches ) {
			$amp_img = elearnposh_amp_build_amp_img_from_img_attrs( $matches[1] );
			return '' !== $amp_img ? $amp_img : '';
		},
		$html
	);
}

/**
 * Remove banned HTML event handler attributes from AMP output.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_strip_banned_event_attributes( $html ) {
	if ( ! preg_match( '/\son[a-z]+\s*=/i', $html ) ) {
		return $html;
	}

	return preg_replace( '/\s+on[a-z]+\s*=\s*(["\'])[^"\']*\1/i', '', $html );
}

/**
 * Remove a top-level HTML element by id attribute.
 *
 * @param string $html HTML fragment.
 * @param string $id   Element id.
 * @return string
 */
function elearnposh_amp_strip_html_element_by_id( $html, $id ) {
	$pattern = '/<div\b[^>]*\bid=(["\'])' . preg_quote( $id, '/' ) . '\1/i';
	if ( ! preg_match( $pattern, $html, $match, PREG_OFFSET_CAPTURE ) ) {
		return $html;
	}

	$start = $match[0][1];
	$pos   = $start + strlen( $match[0][0] );
	$depth = 1;
	$len   = strlen( $html );

	while ( $pos < $len && $depth > 0 ) {
		if ( ! preg_match( '/<\/?div\b[^>]*>/i', $html, $tag, PREG_OFFSET_CAPTURE, $pos ) ) {
			break;
		}

		$tag_str = $tag[0][0];
		if ( preg_match( '/<\/div\b/i', $tag_str ) ) {
			$depth--;
		} elseif ( preg_match( '/<div\b/i', $tag_str ) ) {
			$depth++;
		}

		$pos = $tag[0][1] + strlen( $tag_str );
		if ( 0 === $depth ) {
			return substr( $html, 0, $start ) . substr( $html, $pos );
		}
	}

	return $html;
}

/**
 * Strip wp-admin-bar markup from cached or polluted AMP HTML for anonymous visitors.
 *
 * @param string $html Full or partial HTML.
 * @return string
 */
function elearnposh_amp_remove_admin_bar_from_html( $html ) {
	if ( ! is_string( $html ) || '' === $html || is_user_logged_in() ) {
		return $html;
	}
	$has_wpadminbar = false !== stripos( $html, 'wpadminbar' );
	$has_admin_bar_class = (bool) preg_match(
		'/<(html|body)\b[^>]*\sclass=(["\'])[^"\']*\badmin-bar\b/i',
		$html
	);
	if ( ! $has_wpadminbar && ! $has_admin_bar_class ) {
		return $html;
	}

	$html = elearnposh_amp_strip_html_element_by_id( $html, 'wpadminbar' );
	$html = preg_replace_callback(
		'/<(html|body)\b([^>]*)>/i',
		static function ( $matches ) {
			$tag   = $matches[1];
			$attrs = $matches[2];
			if ( ! preg_match( '/\sclass=(["\'])([^"\']*)\1/i', $attrs, $class_match ) ) {
				return $matches[0];
			}

			$quote   = $class_match[1];
			$classes = preg_split( '/\s+/', trim( $class_match[2] ) );
			$classes = array_values(
				array_filter(
					$classes,
					static function ( $class_name ) {
						return 'admin-bar' !== $class_name;
					}
				)
			);

			if ( empty( $classes ) ) {
				$attrs = preg_replace( '/\sclass=(["\'])[^"\']*\1/i', '', $attrs );
			} else {
				$attrs = preg_replace(
					'/\sclass=(["\'])[^"\']*\1/i',
					' class=' . $quote . implode( ' ', $classes ) . $quote,
					$attrs
				);
			}

			return '<' . $tag . $attrs . '>';
		},
		$html
	);
	$html = preg_replace( '/\sclass=(["\'])\s*\1/i', '', $html );
	$html = preg_replace_callback(
		'/<html([^>]*)>/i',
		static function ( $matches ) {
			$attrs = $matches[1];
			if ( ! preg_match( '/\sstyle=(["\'])([^"\']*)\1/i', $attrs, $style_match ) ) {
				return $matches[0];
			}

			$style = preg_replace( '/margin-top:\s*32px\s*!important;?|margin-top:\s*32px;?/i', '', $style_match[2] );
			$style = trim( $style, '; ' );
			if ( '' === $style ) {
				$attrs = preg_replace( '/\sstyle=(["\'])[^"\']*\1/i', '', $attrs );
			} else {
				$attrs = preg_replace(
					'/\sstyle=(["\'])[^"\']*\1/i',
					' style="' . esc_attr( $style ) . '"',
					$attrs
				);
			}

			return '<html' . $attrs . '>';
		},
		$html,
		1
	);

	return $html;
}

/**
 * Remove !important from inline style attributes (disallowed in AMP HTML).
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_strip_inline_style_important( $html ) {
	if ( false === stripos( $html, '!important' ) || false === stripos( $html, 'style=' ) ) {
		return $html;
	}

	return preg_replace_callback(
		'/\sstyle=(["\'])([^"\']*)\1/i',
		static function ( $matches ) {
			$quote = $matches[1];
			$style = preg_replace( '/\s*!important\b/i', '', $matches[2] );
			$style = trim( $style, '; ' );
			if ( '' === $style ) {
				return '';
			}

			return ' style=' . $quote . $style . $quote;
		},
		$html
	);
}

/**
 * Ensure elements with AMP actions (on="...") are focusable and have a valid role.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_fix_on_attribute_accessibility( $html ) {
	if ( false === stripos( $html, 'on=' ) ) {
		return $html;
	}

	$native_interactive = array( 'a', 'button', 'input', 'select', 'textarea', 'option', 'details', 'summary', 'form' );

	return preg_replace_callback(
		'/<([a-z][a-z0-9-]*)\b((?:[^>"\']|"[^"]*"|\'[^\']*\')*)\bon\s*=\s*(["\'])(.*?)\3((?:[^>"\']|"[^"]*"|\'[^\']*\')*)>/is',
		static function ( $matches ) use ( $native_interactive ) {
			$tag   = strtolower( $matches[1] );
			$attrs = trim( $matches[2] . ' on=' . $matches[3] . $matches[4] . $matches[3] . ' ' . $matches[5] );

			if ( in_array( $tag, $native_interactive, true ) ) {
				if ( 'button' === $tag && ! preg_match( '/\brole\s*=/i', $attrs ) ) {
					$attrs .= ' role="button"';
				} elseif ( 'a' === $tag && ! preg_match( '/\brole\s*=/i', $attrs ) ) {
					$attrs .= ' role="link"';
				} elseif ( 'form' === $tag && ! preg_match( '/\brole\s*=/i', $attrs ) ) {
					// GSC AMP: on= requires role + tabindex even on <form> (newsletter/contact forms).
					$attrs .= ' role="form"';
				}
				// AMP validator requires tabindex on every element that has on=, including <form>.
				if ( ! preg_match( '/\btabindex\s*=/i', $attrs ) ) {
					$attrs .= ' tabindex="0"';
				}
				return '<' . $tag . ' ' . trim( $attrs ) . '>';
			}

			if ( ! preg_match( '/\brole\s*=/i', $attrs ) ) {
				$attrs .= ' role="button"';
			}
			if ( ! preg_match( '/\btabindex\s*=/i', $attrs ) ) {
				$attrs .= ' tabindex="0"';
			}

			return '<' . $tag . ' ' . trim( $attrs ) . '>';
		},
		$html
	);
}

/**
 * Keep only the first rel=canonical link in the document.
 *
 * Matches quoted, unquoted, and spaced rel values (AMPforWP + SEO plugins vary).
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_dedupe_canonical_links( $html ) {
	if ( false === stripos( $html, 'canonical' ) || false === stripos( $html, '<link' ) ) {
		return $html;
	}

	$pattern = '/<link\b(?=[^>]*\brel\s*=\s*["\']?\s*canonical\s*["\']?)[^>]*\/?>/i';
	if ( ! preg_match( $pattern, $html ) ) {
		return $html;
	}

	$seen = 0;
	return preg_replace_callback(
		$pattern,
		static function ( $matches ) use ( &$seen ) {
			$seen++;
			return 1 === $seen ? $matches[0] : '';
		},
		$html
	);
}

/**
 * Convert raw iframe embeds to amp-iframe where possible.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_convert_iframes_to_amp_iframe( $html ) {
	if ( false === stripos( $html, '<iframe' ) ) {
		return $html;
	}

	return preg_replace_callback(
		'/<iframe\b([^>]*)>[\s\S]*?<\/iframe>/i',
		static function ( $matches ) {
			$attrs = $matches[1];
			if ( ! preg_match( '/\bsrc=(["\'])([^"\']+)\1/i', $attrs, $src_match ) ) {
				return '';
			}

			$src = html_entity_decode( $src_match[2], ENT_QUOTES, 'UTF-8' );
			if ( '' === $src || 0 === strpos( $src, 'javascript:' ) ) {
				return '';
			}

			return '<div class="ep-amp-iframe-wrap" style="position:relative;width:100%;max-width:100%;padding-top:56.25%;margin:16px 0;">'
				. '<amp-iframe layout="fill" sandbox="allow-scripts allow-same-origin allow-popups" src="' . esc_url( $src ) . '">'
				. '<div placeholder class="ep-amp-iframe-placeholder">' . esc_html__( 'Loading embed…', 'elearnposh-amp' ) . '</div>'
				. '</amp-iframe></div>';
		},
		$html
	);
}

/**
 * Whether the current request is serving an AMP document.
 *
 * @return bool
 */
function elearnposh_amp_is_serving_amp() {
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
	$uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	return (bool) preg_match( '#(/amp/?$|/amp/|[?&]amp=)#i', $uri );
}

/**
 * Remove TinyMCE bookmark spans and other editor artifacts from post HTML.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_strip_tinymce_editor_artifacts( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}

	// Repeat — corrupted editor markup can nest bookmarks inside broken <style> blocks.
	$prev = null;
	while ( $prev !== $html ) {
		$prev = $html;
		$html = preg_replace( '/<span[^>]*\bdata-mce-type=["\']bookmark["\'][^>]*>[\s\S]*?<\/span>/i', '', $html );
		$html = preg_replace( '/<span[^>]*\bmce_SELRES_start\b[^>]*>[\s\S]*?<\/span>/i', '', $html );
	}

	return $html;
}

/**
 * Remove external stylesheet links (invalid in AMP; fonts/CSS belong in amp-custom).
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_strip_disallowed_link_tags( $html ) {
	if ( false === stripos( $html, '<link' ) ) {
		return $html;
	}

	return preg_replace( '/<link\b[^>]*\brel\s*=\s*(["\']?)(?:stylesheet|alternate\s+stylesheet|prefetch\s+stylesheet)\1[^>]*\/?>/i', '', $html );
}

/**
 * Remove <style> tags that are not amp-boilerplate or amp-custom (invalid in AMP).
 *
 * Post content from the classic editor can contain corrupted TinyMCE bookmark markup
 * inside plain <style> blocks; those must be stripped even when the document has no
 * explicit <body> tag (e.g. after HTML minification).
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_strip_disallowed_style_tags( $html ) {
	if ( false === stripos( $html, '<style' ) ) {
		return $html;
	}

	$pattern = '/<style(?![^>]*\bamp-(?:boilerplate|custom)\b)[^>]*>[\s\S]*?<\/style>/i';

	// Repeat until stable — nested/corrupted editor markup can leave multiple blocks.
	$prev = null;
	while ( $prev !== $html ) {
		$prev = $html;
		$html = preg_replace( $pattern, '', $html );
	}

	// Drop unclosed <style> blocks (missing </style>).
	$html = preg_replace( '/<style(?![^>]*\bamp-(?:boilerplate|custom)\b)[^>]*>[\s\S]*$/i', '', $html );

	// Remove orphan opening tags with no content.
	$html = preg_replace( '/<style(?![^>]*\bamp-(?:boilerplate|custom)\b)[^>]*\/?>/i', '', $html );

	return $html;
}

/**
 * Remove style tags outside head (only amp-boilerplate and amp-custom allowed in head).
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_strip_style_tags_outside_head( $html ) {
	if ( false === stripos( $html, '<style' ) ) {
		return $html;
	}

	$html = elearnposh_amp_strip_disallowed_style_tags( $html );

	if ( false === stripos( $html, '<body' ) ) {
		return $html;
	}

	$parts = preg_split( '/(<body\b[^>]*>)/i', $html, 2, PREG_SPLIT_DELIM_CAPTURE );
	if ( count( $parts ) < 3 ) {
		return $html;
	}

	$head      = $parts[0];
	$body_open = $parts[1];
	$body      = $parts[2];

	/*
	 * AMP allows style[amp-custom] and style[amp-boilerplate] only in <head>.
	 * Any style tag in <body> is invalid and must be removed.
	 */
	$body = preg_replace( '/<style\b[^>]*>[\s\S]*?<\/style>/i', '', $body );

	return $head . $body_open . $body;
}

/**
 * Restore a valid AMP document skeleton when HTML minifiers strip <head>/<body>.
 *
 * W3 Total Cache and similar plugins can emit:
 *   <html amp> <meta …> … <amp-sidebar> … </footer></html>
 * which fails AMP validation ("only allowed inside the body section").
 *
 * @param string $html Full AMP HTML document.
 * @return string
 */
function elearnposh_amp_ensure_document_structure( $html ) {
	if ( ! is_string( $html ) || '' === $html || false === stripos( $html, '<html' ) ) {
		return $html;
	}

	$has_head_open  = (bool) preg_match( '/<head\b/i', $html );
	$has_head_close = (bool) preg_match( '/<\/head>/i', $html );
	$has_body_open  = (bool) preg_match( '/<body\b/i', $html );
	$has_body_close = (bool) preg_match( '/<\/body>/i', $html );

	if ( $has_head_open && $has_head_close && $has_body_open && $has_body_close ) {
		return $html;
	}

	$body_start_pattern = '/(?=<(?:body\b|amp-sidebar\b|amp-lightbox\b|header\b|main\b|footer\b|nav\b|article\b|div\s+class=["\']amp-content-wrapper|span\s+id=["\']ep-page-top))/i';

	if ( ! $has_head_open && preg_match( '/<html\b[^>]*>/i', $html ) ) {
		$html = preg_replace( '/(<html\b[^>]*>)/i', '$1<head>', $html, 1 );
		$has_head_open = true;
	}

	if ( ! $has_body_open && preg_match( $body_start_pattern, $html, $body_match, PREG_OFFSET_CAPTURE ) ) {
		$insert = $has_head_close ? '<body>' : '</head><body>';
		$pos    = $body_match[0][1];
		$html   = substr( $html, 0, $pos ) . $insert . substr( $html, $pos );
		$has_body_open  = true;
		$has_head_close = true;
	}

	if ( $has_head_open && ! $has_head_close && $has_body_open && preg_match( '/<body\b[^>]*>/i', $html, $body_open_match, PREG_OFFSET_CAPTURE ) ) {
		$pos  = $body_open_match[0][1];
		$html = substr( $html, 0, $pos ) . '</head>' . substr( $html, $pos );
		$has_head_close = true;
	}

	if ( false !== stripos( $html, '</html>' ) && ! $has_body_close ) {
		$html = preg_replace( '/<\/html>/i', '</body></html>', $html, 1 );
	}

	return $html;
}

/**
 * Normalize the mandatory AMP viewport meta tag.
 *
 * @param string $html Full AMP HTML document.
 * @return string
 */
function elearnposh_amp_fix_viewport_meta( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}

	$required     = 'width=device-width,minimum-scale=1,initial-scale=1';
	$viewport_tag = '<meta name="viewport" content="' . $required . '">';

	$html = preg_replace( '/<meta\b[^>]*\bname=(["\'])viewport\1[^>]*\/?>/i', '', $html );

	if ( preg_match( '/<meta\b[^>]*\bcharset[^>]*>/i', $html ) ) {
		return preg_replace( '/(<meta\b[^>]*\bcharset[^>]*>)/i', '$1' . $viewport_tag, $html, 1 );
	}

	return preg_replace( '/(<html\b[^>]*>)/i', '$1' . $viewport_tag, $html, 1 );
}

/**
 * Insert markup before the first <style amp-custom> block (required AMP head order).
 *
 * @param string $html  Full document HTML.
 * @param string $chunk Markup to insert.
 * @return string
 */
function elearnposh_amp_insert_before_amp_custom_style( $html, $chunk ) {
	if ( '' === $chunk ) {
		return $html;
	}

	if ( preg_match( '/<style\b[^>]*\bamp-custom\b/i', $html, $match, PREG_OFFSET_CAPTURE ) ) {
		$pos = $match[0][1];
		return substr( $html, 0, $pos ) . $chunk . substr( $html, $pos );
	}

	if ( preg_match( '/<\/head>/i', $html ) ) {
		return preg_replace( '/<\/head>/i', $chunk . '</head>', $html, 1 );
	}

	return $html;
}

/**
 * Inject AMP extension scripts required by markup but missing from <head>.
 *
 * Extension scripts must appear before <style amp-custom> — scripts after amp-custom
 * are ignored by the AMP validator (e.g. footer newsletter <form> needs amp-form).
 *
 * @param string $html Full AMP HTML document.
 * @return string
 */
function elearnposh_amp_ensure_required_amp_extension_scripts( $html ) {
	if ( ! is_string( $html ) || '' === $html || false === stripos( $html, '<html' ) ) {
		return $html;
	}

	$extensions = array(
		'amp-analytics'  => array(
			'markup' => '/<amp-analytics\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-analytics-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-form'       => array(
			'markup' => '/<form\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-recaptcha-input' => array(
			'markup' => '/<amp-recaptcha-input\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-recaptcha-input-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-lightbox'   => array(
			'markup' => '/<amp-lightbox\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-lightbox-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-mustache'   => array(
			'markup' => '/<template\b[^>]*\btype\s*=\s*(["\'])amp-mustache\1/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
			'attr'   => 'custom-template',
		),
		'amp-bind'       => array(
			'markup' => '/<amp-state\b|\[[a-zA-Z][a-zA-Z0-9-]*\]|AMP\.setState/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-bind-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-accordion'  => array(
			'markup' => '/<amp-accordion\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-sidebar'    => array(
			'markup' => '/<amp-sidebar\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-social-share' => array(
			'markup' => '/<amp-social-share\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-social-share-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-youtube'    => array(
			'markup' => '/<amp-youtube\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-youtube-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-iframe'     => array(
			'markup' => '/<amp-iframe\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-iframe-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-position-observer' => array(
			'markup' => '/<amp-position-observer\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-position-observer-0.1.js',
			'attr'   => 'custom-element',
		),
		'amp-animation'  => array(
			'markup' => '/<amp-animation\b/i',
			'url'    => 'https://cdn.ampproject.org/v0/amp-animation-0.1.js',
			'attr'   => 'custom-element',
		),
	);

	$script_pattern = '/<script\b(?=[^>]*\basync\b)(?=[^>]*\b(?:custom-element|custom-template)\s*=)[^>]*><\/script>\s*/i';
	$collected      = array();

	$html = preg_replace_callback(
		$script_pattern,
		static function ( $match ) use ( &$collected ) {
			$tag = $match[0];
			if ( preg_match( '/\b(?:custom-element|custom-template)\s*=\s*(["\'])([^"\']+)\1/i', $tag, $name_match ) ) {
				$collected[ strtolower( $name_match[2] ) ] = trim( $tag );
			}
			return '';
		},
		$html
	);

	foreach ( $extensions as $component => $cfg ) {
		if ( ! preg_match( $cfg['markup'], $html ) ) {
			continue;
		}
		if ( isset( $collected[ strtolower( $component ) ] ) ) {
			continue;
		}
		$collected[ strtolower( $component ) ] = '<script async ' . $cfg['attr'] . '="' . esc_attr( $component ) . '" src="' . esc_url( $cfg['url'] ) . '"></script>';
	}

	if ( empty( $collected ) ) {
		return $html;
	}

	return elearnposh_amp_insert_before_amp_custom_style( $html, implode( '', $collected ) );
}

/**
 * Repair amp-bind markup broken by HTML minifiers.
 *
 * A ternary in [text]="… ? 'Show less' : 'View more'" can become <span less : more>.
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_fix_mangled_amp_bind_attributes( $html ) {
	if ( false === stripos( $html, 'ep-scroll-to-top' ) && false === stripos( $html, 'newsletter-related' ) && false === stripos( $html, 'eposh-vz-head' ) && false === stripos( $html, '<span' ) ) {
		return $html;
	}

	// [class]="…eposh-vz-head…" → <header class="eposh-vz-head" eposh-vz-head--visible :> (AMPforWP minify).
	$html = preg_replace_callback(
		'/<header\b([^>]*)>/i',
		static function ( $m ) {
			$attrs = $m[1];
			if ( false === stripos( $attrs, 'eposh-vz-head' ) ) {
				return $m[0];
			}
			$attrs = preg_replace( '/\seposh-vz-head--visible\b/i', '', $attrs );
			$attrs = preg_replace( '/\s*:>/', '', $attrs );
			return '<header' . $attrs . '>';
		},
		$html
	);

	// [class]="…ep-scroll-to-top-wrap is-visible…" → <div … class="ep-scroll-to-top-wrap" is-visible :>.
	$html = preg_replace(
		'/<div\s+id=(["\'])ep-scroll-to-top\1\s+class=(["\'])ep-scroll-to-top-wrap\2\s+is-visible\s*:>/i',
		'<div id=$1ep-scroll-to-top$1 class=$2ep-scroll-to-top-wrap$2>',
		$html
	);

	// [aria-hidden]="…" on scroll button → <button … : aria-label=…>.
	$html = preg_replace(
		'/(<button\b[^>]*\bclass=(["\'])ep-scroll-to-top\2[^>]*)\s+:\s+/i',
		'$1 ',
		$html
	);

	if ( false === stripos( $html, 'newsletter-related' ) && false === stripos( $html, '<span' ) ) {
		return $html;
	}

	// [class]="… 'newsletter-related expanded' …" → <div class="newsletter-related" expanded>.
	$html = preg_replace(
		'/<div\s+class=(["\'])newsletter-related\1\s+expanded\b/i',
		'<div class=$1newsletter-related$1',
		$html
	);

	// [text]="… ? 'Show less' : 'View more'" → <span less : more>.
	if ( false !== stripos( $html, '<span' ) ) {
		$html = preg_replace(
			'/<span\s+less\s*:\s*more[^>]*>\s*([^<]*?)\s*<\/span>/i',
			'<span>$1</span>',
			$html
		);
	}

	return $html;
}

/**
 * Run all AMP HTML sanitizers on a buffer or fragment.
 *
 * @param string $html          HTML.
 * @param bool   $fragment_only When true, never inject doctype/html wrappers (post body, head buffer).
 * @return string
 */
function elearnposh_amp_sanitize_amp_html( $html, $fragment_only = false ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}

	$html = elearnposh_amp_strip_tinymce_editor_artifacts( $html );
	$html = elearnposh_amp_strip_disallowed_style_tags( $html );
	$html = elearnposh_amp_sanitize_amp_form_markup( $html, $fragment_only );
	$html = elearnposh_amp_sanitize_amp_img_markup( $html );
	$html = elearnposh_amp_convert_img_tags_to_amp_img( $html );
	$html = elearnposh_amp_strip_banned_event_attributes( $html );
	$html = elearnposh_amp_strip_inline_style_important( $html );
	$html = elearnposh_amp_fix_on_attribute_accessibility( $html );
	$html = elearnposh_amp_fix_mangled_amp_bind_attributes( $html );
	$html = elearnposh_amp_fix_external_link_attributes( $html );
	$html = elearnposh_amp_dedupe_canonical_links( $html );
	$html = elearnposh_amp_convert_iframes_to_amp_iframe( $html );
	$html = elearnposh_amp_strip_style_tags_outside_head( $html );
	if ( false === stripos( $html, '<amp-web-push' ) ) {
		$html = preg_replace( '/<script[^>]*amp-web-push[^>]*><\/script>/i', '', $html );
	}
	$html = elearnposh_amp_remove_admin_bar_from_html( $html );

	if ( ! $fragment_only ) {
		$html = elearnposh_amp_strip_disallowed_link_tags( $html );
		$html = elearnposh_amp_ensure_document_structure( $html );
		$html = elearnposh_amp_fix_viewport_meta( $html );
		$html = elearnposh_amp_ensure_html_amp_attribute( $html );
		$html = elearnposh_amp_ensure_mandatory_amp_head_tags( $html );
		$html = elearnposh_amp_ensure_required_amp_extension_scripts( $html );
		if ( class_exists( 'EPA_AMP' ) && method_exists( 'EPA_AMP', 'inject_amp_styles' ) ) {
			$html = EPA_AMP::inject_amp_styles( $html );
		}
		$html = elearnposh_amp_ensure_amp_doctype( $html );
		$html = elearnposh_amp_repair_amp_custom_css_syntax( $html );
	}

	return $html;
}

/**
 * Remove invalid amp-custom selectors (e.g. html.,body.) after AMPforWP tree shaking.
 *
 * @param string $html Full AMP document.
 * @return string
 */
function elearnposh_amp_repair_amp_custom_css_syntax( $html ) {
	if ( ! is_string( $html ) || '' === $html || false === stripos( $html, 'amp-custom' ) ) {
		return $html;
	}

	return preg_replace_callback(
		'/(<style\b[^>]*\bamp-custom\b[^>]*>)(.*?)(<\/style>)/is',
		static function ( $matches ) {
			$css = $matches[2];
			$css = preg_replace( '/html\.,\s*body\.\s*\{[^}]*\}/', '', $css );
			$css = preg_replace( '/#wp--root-default\b/', '#wp-admin-bar-root-default', $css );
			// AMP forbids @container and container-* properties.
			$css = preg_replace( '/@container\b[^{]*\{(?:[^{}]++|\{[^{}]*\})*\}/i', '', $css );
			$css = preg_replace( '/\bcontainer-(?:type|name)\s*:[^;]+;?/i', '', $css );
			return $matches[1] . $css . $matches[3];
		},
		$html,
		1
	);
}

/**
 * Repair amp-bind markup broken by AMPforWP HTML minification (runs after tree shaking).
 *
 * @param string $html Full AMP document.
 * @return string
 */
function elearnposh_amp_repair_mangled_amp_bind_markup( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}

	return elearnposh_amp_fix_mangled_amp_bind_attributes( $html );
}

/**
 * Append CSS to the amp-custom block (runs after AMPforWP tree shaking).
 *
 * @param string $html Full AMP document.
 * @param string $css  Minified CSS chunk.
 * @return string
 */
function elearnposh_amp_append_amp_custom_css( $html, $css ) {
	$css = trim( (string) $css );
	if ( '' === $css || false === stripos( $html, 'amp-custom' ) ) {
		return $html;
	}

	return preg_replace(
		'/(<style\b[^>]*\bamp-custom\b[^>]*>)(.*?)(<\/style>)/is',
		'$1$2' . $css . '$3',
		$html,
		1
	);
}

/**
 * Re-apply layout CSS removed by AMPforWP tree shaking on custom page templates.
 *
 * @param string $html Full AMP document.
 * @return string
 */
function elearnposh_amp_inject_page_specific_amp_custom_css( $html ) {
	if ( false !== stripos( $html, 'id="contact-us-page"' ) ) {
		$html = elearnposh_amp_append_amp_custom_css(
			$html,
			'@media (max-width:991.98px){#contact-us-page .ep-contact-hero{padding-top:48px;padding-right:20px;padding-bottom:28px;padding-left:20px}#contact-us-page .ep-contact-hero__inner{width:100%}}@media (max-width:767.98px){#contact-us-page .ep-contact-hero{padding-top:56px;padding-right:16px;padding-bottom:24px;padding-left:16px}}'
		);
	}

	if ( class_exists( 'EPA_AMP' ) && method_exists( 'EPA_AMP', 'inject_amp_styles' ) ) {
		$html = EPA_AMP::inject_amp_styles( $html );
	}

	return elearnposh_amp_repair_amp_custom_css_syntax( $html );
}

/**
 * Sanitize a partial HTML chunk (post content, head buffer) without document-level changes.
 *
 * @param string $html HTML fragment.
 * @return string
 */
function elearnposh_amp_sanitize_amp_fragment( $html ) {
	return elearnposh_amp_sanitize_amp_html( $html, true );
}

/**
 * Final pass on full AMP HTML output (sanitize + admin bar strip).
 *
 * @param string $html HTML.
 * @return string
 */
function elearnposh_amp_finalize_amp_html( $html ) {
	return elearnposh_amp_sanitize_amp_html( $html, false );
}

/**
 * Whether the webinar banner should render on the current AMP page.
 *
 * @param int $post_id Optional post ID.
 * @return bool
 */
function elearnposh_amp_is_webinar_banner_active( $post_id = 0 ) {
	$plugin = \ElearnPOSH\AMP\Plugin::get_instance();
	$config = $plugin->get_config();

	if ( empty( $config->get( 'webinar_banner_enabled', false ) ) ) {
		return false;
	}

	if ( '' === trim( (string) $config->get( 'webinar_banner_text', '' ) ) ) {
		return false;
	}

	if ( ! $post_id ) {
		$post_id = absint( get_queried_object_id() );
	}

	$excluded_ids = $config->get( 'webinar_banner_excluded_ids', array() );
	if ( ! empty( $excluded_ids ) && is_array( $excluded_ids ) && $post_id ) {
		if ( in_array( $post_id, array_map( 'absint', $excluded_ids ), true ) ) {
			return false;
		}
	}

	return true;
}

/**
 * Render fixed bottom widgets: webinar banner, WhatsApp CTA, scroll-to-top (once per page).
 */
function elearnposh_amp_render_fixed_widgets() {
	static $rendered = false;
	if ( $rendered ) {
		return;
	}
	$rendered = true;

	$bar_path = ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/bottom-bar.php';
	if ( is_readable( $bar_path ) ) {
		include $bar_path;
	}

	elearnposh_amp_render_scroll_to_top();
}

/**
 * Render fixed bottom-right scroll-to-top control (once per page).
 *
 * @param bool|null $webinar_banner_active When null, read from plugin config.
 */
function elearnposh_amp_render_scroll_to_top( $webinar_banner_active = null ) {
	static $rendered = false;
	if ( $rendered ) {
		return;
	}

	$plugin = \ElearnPOSH\AMP\Plugin::get_instance();
	$config = $plugin->get_config();

	if ( null === $webinar_banner_active ) {
		$webinar_banner_active = elearnposh_amp_is_webinar_banner_active();
	}

	$scroll_top_webinar_banner_active = (bool) $webinar_banner_active;
	$scroll_top_whatsapp_cta_active   = (
		$config->get( 'whatsapp_cta_enabled', false ) &&
		! empty( trim( (string) $config->get( 'whatsapp_cta_phone', '' ) ) )
	);
	$path                             = ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/scroll-to-top.php';
	if ( ! is_readable( $path ) ) {
		return;
	}

	$rendered = true;
	include $path;
}

/**
 * Absolute favicon URL for AMP templates (production asset path).
 *
 * @return string
 */
function elearnposh_amp_get_favicon_url() {
	static $url = null;

	if ( null !== $url ) {
		return $url;
	}

	$url = 'https://elearnposh.com/wp-content/uploads/2019/10/favicon.png';

	return apply_filters( 'elearnposh_amp_favicon_url', $url );
}

