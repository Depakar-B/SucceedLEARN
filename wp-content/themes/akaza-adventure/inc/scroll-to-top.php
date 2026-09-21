<?php
/**
 * Extracted from functions.php (inc\scroll-to-top.php)
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Whether the current request is AMP (skip theme scroll-to-top).
 *
 * @return bool
 */
function akaza_is_amp() {
	if ( class_exists( 'AHF_AMP' ) && method_exists( 'AHF_AMP', 'is_amp' ) ) {
		return (bool) AHF_AMP::is_amp();
	}
	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		return true;
	}
	if ( function_exists( 'amp_is_request' ) && amp_is_request() ) {
		return true;
	}
	return false;
}

/**
 * Enqueue shared scroll-to-top assets (non-AMP only).
 */
function akaza_enqueue_scroll_to_top() {
	if ( akaza_is_amp() || is_admin() ) {
		return;
	}

	$css = AKAZA_DIR . '/assets/css/scroll-to-top.css';
	$js  = AKAZA_DIR . '/assets/js/scroll-to-top.js';

	wp_enqueue_style(
		'akaza-scroll-to-top',
		AKAZA_URI . '/assets/css/scroll-to-top.css',
		array( 'akaza-main' ),
		file_exists( $css ) ? (string) filemtime( $css ) : AKAZA_VERSION
	);

	$brand_css = AKAZA_DIR . '/assets/css/contact-form-brand.css';
	if ( file_exists( $brand_css ) ) {
		wp_enqueue_style(
			'akaza-contact-form-brand',
			AKAZA_URI . '/assets/css/contact-form-brand.css',
			array( 'akaza-scroll-to-top' ),
			(string) filemtime( $brand_css )
		);
	}

	wp_enqueue_script(
		'akaza-scroll-to-top',
		AKAZA_URI . '/assets/js/scroll-to-top.js',
		array(),
		file_exists( $js ) ? (string) filemtime( $js ) : AKAZA_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'akaza_enqueue_scroll_to_top', 30 );

/**
 * Print scroll-to-top markup once in the footer (non-AMP only).
 */
function akaza_render_scroll_to_top() {
	static $done = false;
	if ( $done || akaza_is_amp() || is_admin() ) {
		return;
	}
	$done = true;
	?>
	<div id="sl-scroll-top" class="sl-scroll-top-wrap is-branded">
		<button
			type="button"
			class="sl-scroll-top"
			aria-label="<?php esc_attr_e( 'Back to top', 'akaza-adventure' ); ?>"
			title="<?php esc_attr_e( 'Back to top', 'akaza-adventure' ); ?>"
		>
			<span class="sl-scroll-top__icon" aria-hidden="true"></span>
		</button>
	</div>
	<?php
}
add_action( 'wp_footer', 'akaza_render_scroll_to_top', 40 );
