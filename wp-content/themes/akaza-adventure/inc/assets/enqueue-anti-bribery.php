<?php
/**
 * Anti-Bribery and Anti-Corruption eLearning course marketing assets.
 *
 * CSS lives in assets/css/courses/anti-bribery-anti-corruption/
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue course foundation + per-section styles.
 */
function akaza_enqueue_anti_bribery_assets() {
	akaza_enqueue_course_marketing_styles(
		'',
		array(
			'shared_sections' => false,
		)
	);

	$folder = 'courses/anti-bribery-anti-corruption';
	$deps   = array( 'akaza-course-global' );

	$sections = array(
		'sl-anti-bribery-hero',
		'sl-anti-bribery-overview',
		'sl-anti-bribery-learning-outcomes',
		'sl-anti-bribery-topics',
		'sl-anti-bribery-decision-journey',
		'sl-abac-scenario-showcase',
		'sl-abac-delivery-options',
		'sl-abac-target-audience',
		'sl-abac-laws-covered',
	);

	foreach ( $sections as $section ) {
		akaza_enqueue_theme_style(
			'akaza-' . $section,
			"{$folder}/{$section}.css",
			$deps
		);
	}

	akaza_enqueue_theme_script(
		'akaza-sl-abac-scenario-showcase',
		'courses/anti-bribery-anti-corruption/sl-abac-scenario-showcase.js'
	);
	akaza_enqueue_theme_script(
		'akaza-sl-abac-laws-covered',
		'courses/anti-bribery-anti-corruption/sl-abac-laws-covered.js'
	);

	// Opt-in bordered pill eyebrow (sl-global-sub-heading.css).
	akaza_enqueue_theme_style(
		'akaza-global-sub-heading',
		'sl-global-sub-heading.css',
		array( 'akaza-main', 'akaza-global-title-accent' )
	);

	// Individuals / Organisations sections + FCP course suite.
	akaza_enqueue_theme_style( 'akaza-global-course-buy-options', 'sl-global-course-buy-options.css', array( 'akaza-course-global' ) );
	akaza_enqueue_theme_style( 'akaza-global-fcp-suite', 'sl-global-fcp-suite.css', array( 'akaza-course-global' ) );
	akaza_enqueue_theme_style( 'akaza-fcp-sl-fcp-cpd', 'financial-crime-prevention/fcp-sl-fcp-cpd.css', array( 'akaza-course-global' ) );

	// Global FAQ component (registered in enqueue-core.php).
	wp_enqueue_style( 'akaza-global-faq' );
	wp_enqueue_script( 'akaza-global-faq' );

	akaza_enqueue_theme_style(
		'akaza-sl-abac-faq',
		"{$folder}/sl-abac-faq.css",
		array( 'akaza-course-global', 'akaza-global-faq' )
	);

	// Global contact section + course enquiry form.
	akaza_enqueue_theme_style( 'akaza-contact-form', 'contact-from.css', array( 'akaza-main' ) );
	wp_enqueue_style( 'akaza-global-contact' );
	akaza_enqueue_theme_style(
		'akaza-sl-abac-contact',
		"{$folder}/sl-abac-contact.css",
		array( 'akaza-course-global', 'akaza-global-contact', 'akaza-contact-form' )
	);

	// Page-level background rhythm; loads after every section stylesheet.
	akaza_enqueue_theme_style(
		'akaza-sl-anti-bribery-page',
		"{$folder}/sl-anti-bribery-page.css",
		array( 'akaza-sl-abac-contact', 'akaza-sl-abac-faq', 'akaza-global-fcp-suite', 'akaza-fcp-sl-fcp-cpd' )
	);

	akaza_inline_anti_bribery_styles(
		array_merge(
			array_map(
				static function ( $section ) {
					return 'akaza-' . $section;
				},
				$sections
			),
			array(
				'akaza-global-course-buy-options',
				'akaza-global-fcp-suite',
				'akaza-fcp-sl-fcp-cpd',
				'akaza-sl-abac-faq',
				'akaza-sl-abac-contact',
				'akaza-sl-anti-bribery-page',
			)
		)
	);
}

/**
 * Print the ABAC page stylesheets as one inline <style> block at the end of <head>
 * (after every linked stylesheet) instead of separate cached <link> files.
 *
 * Only theme CSS files without relative url() references may be listed here.
 *
 * @param string[] $handles Enqueued style handles, in cascade order.
 */
function akaza_inline_anti_bribery_styles( $handles ) {
	$styles = wp_styles();
	$css    = '';

	foreach ( $handles as $handle ) {
		if ( empty( $styles->registered[ $handle ] ) ) {
			continue;
		}

		$src = strtok( (string) $styles->registered[ $handle ]->src, '?' );

		if ( 0 !== strpos( $src, AKAZA_URI ) ) {
			continue;
		}

		$path = AKAZA_DIR . substr( $src, strlen( AKAZA_URI ) );

		if ( ! is_readable( $path ) ) {
			continue;
		}

		// A UTF-8 BOM is harmless in a linked file but invalidates the first rule once inlined.
		$file_css = (string) file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		$file_css = preg_replace( '/^\xEF\xBB\xBF/', '', $file_css );

		$css .= "/* {$handle} */\n" . $file_css . "\n";
		wp_dequeue_style( $handle );
	}

	if ( '' === $css ) {
		return;
	}

	$css = str_ireplace( '</style', '', $css );

	add_action(
		'wp_head',
		static function () use ( $css ) {
			echo '<style id="akaza-anti-bribery-inline-css">' . "\n" . $css . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		},
		999
	);
}
