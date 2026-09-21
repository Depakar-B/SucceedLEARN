<?php
/**
 * Legal pages — shared AMP helpers and partial loader.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a legal section partial.
 *
 * @param string $name Partial basename without .php.
 */
function succeedlearn_amp_legal_partial( $name ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/legal/' . sanitize_file_name( (string) $name ) . '.php';
	if ( is_readable( $path ) ) {
		include $path;
	}
}

/**
 * @return string
 */
function succeedlearn_amp_get_legal_home_amp_url() {
	return function_exists( 'succeedlearn_amp_url' )
		? succeedlearn_amp_url( home_url( '/' ) )
		: home_url( '/' );
}

/**
 * @param string   $default_path Default path when no page is found.
 * @param string[] $slugs        Page slugs to try.
 * @return string
 */
function succeedlearn_amp_resolve_legal_canonical_url( $default_path, $slugs = array() ) {
	$canonical = home_url( $default_path );
	foreach ( (array) $slugs as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			$link = get_permalink( $page );
			if ( $link ) {
				return $link;
			}
		}
	}
	return $canonical;
}

/**
 * Output shared legal page inline CSS.
 */
function succeedlearn_amp_output_legal_inline_css() {
	$legal_css = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'styles/sl-legal-amp.css';
	if ( is_readable( $legal_css ) ) {
		echo file_get_contents( $legal_css ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped,WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	}
}

/**
 * Render legal page main content (breadcrumb → hero → TOC → body).
 *
 * Expected vars: $home_amp, $breadcrumb_label, $legal_eyebrow, $legal_title,
 *                $legal_lead, $toc_items, $sections_path
 */
function succeedlearn_amp_render_legal_main() {
	?>
	<main id="main-content" class="sl-legal-amp">
		<div class="sl-wrap sl-legal-amp__wrap">
			<?php
			succeedlearn_amp_legal_partial( 'breadcrumbs' );
			succeedlearn_amp_legal_partial( 'hero' );
			succeedlearn_amp_legal_partial( 'toc' );
			succeedlearn_amp_legal_partial( 'body' );
			?>
		</div>
	</main>
	<?php
}
