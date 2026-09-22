<?php
/**
 * Page brand colours per page template (contact form, scroll-to-top, progress bar).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Site-wide default chrome brand (CTA orange).
 *
 * @return array{brand:string,brand_hover:string,rgb:string}
 */
function akaza_get_default_page_brand() {
	return array(
		'brand'       => '#ea3e24',
		'brand_hover' => '#d4331c',
		'rgb'         => '234, 62, 36',
	);
}

/**
 * Brand tokens for page-specific UI accents.
 * Always returns a brand: mapped template, homepage CTA, or site default.
 *
 * @param string $page_template Optional page template path.
 * @return array{brand:string,brand_hover:string,rgb:string}
 */
function akaza_get_page_brand( $page_template = '' ) {
	if ( '' === $page_template && is_singular( 'page' ) ) {
		$page_template = (string) get_page_template_slug( get_queried_object_id() );
	}

	$cta_brand = array(
		'brand'       => '#ea3e24',
		'brand_hover' => '#d4331c',
		'rgb'         => '234, 62, 36',
	);

	$dd_brand = array(
		'brand'       => '#6b3df4',
		'brand_hover' => '#5529d4',
		'rgb'         => '107, 61, 244',
	);

	$blue_brand = array(
		'brand'       => '#1472ba',
		'brand_hover' => '#1169ab',
		'rgb'         => '20, 114, 186',
	);

	if (
		is_front_page()
		|| 'page-templates/homepage-fast.php' === $page_template
		|| ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() && ! ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) )
	) {
		return $cta_brand;
	}

	if ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) {
		return $blue_brand;
	}

	// Defensive Driving marketing course / demo page.
	if ( 'page-templates/defensive-driving.php' === $page_template ) {
		return $dd_brand;
	}

	if ( function_exists( 'akaza_is_single_course_page' ) && akaza_is_single_course_page() ) {
		$course_id = get_queried_object_id();
		$mapped    = function_exists( 'akaza_get_mapped_course_template_part' )
			? akaza_get_mapped_course_template_part( $course_id )
			: '';
		if ( $mapped && false !== strpos( $mapped, 'defensive-driving' ) ) {
			return $dd_brand;
		}
	}

	$brands = array(
		'page-templates/homepage-fast.php' => $cta_brand,
		'page-templates/defensive-driving.php' => $dd_brand,
		'page-templates/global-workplace-compliance-training-for-employees.php' => array(
			'brand'       => '#1472ba',
			'brand_hover' => '#1169ab',
			'rgb'         => '20, 114, 186',
		),
		'page-templates/diversity-equality-inclusion-belonging-training.php' => array(
			'brand'       => '#135db7',
			'brand_hover' => '#0f4f9c',
			'rgb'         => '19, 93, 183',
		),
		'page-templates/inclusive-workplace-training.php' => array(
			'brand'       => '#177e89',
			'brand_hover' => '#126b74',
			'rgb'         => '23, 126, 137',
		),
		'page-templates/financial-crime-prevention.php' => array(
			'brand'       => '#1472ba',
			'brand_hover' => '#1169ab',
			'rgb'         => '20, 114, 186',
		),
		'page-templates/page-contact.php' => $blue_brand,
		'page-templates/page-about.php'   => $blue_brand,
		'page-templates/page-clients.php' => $blue_brand,
		'page-templates/privacy-policy.php' => array(
			'brand'       => '#1472ba',
			'brand_hover' => '#16234e',
			'rgb'         => '20, 114, 186',
		),
		'page-templates/terms-and-conditions.php' => array(
			'brand'       => '#1472ba',
			'brand_hover' => '#16234e',
			'rgb'         => '20, 114, 186',
		),
		'page-templates/s-phish-report.php' => array(
			'brand'       => '#1472ba',
			'brand_hover' => '#16234e',
			'rgb'         => '20, 114, 186',
		),
	);

	if ( '' !== $page_template && isset( $brands[ $page_template ] ) ) {
		return $brands[ $page_template ];
	}

	return akaza_get_default_page_brand();
}

/**
 * @param string $page_template Optional page template path.
 * @return array{brand:string,brand_hover:string,rgb:string}
 */
function akaza_get_contact_form_brand( $page_template = '' ) {
	$form_default = array(
		'brand'       => '#1472ba',
		'brand_hover' => '#16234e',
		'rgb'         => '20, 114, 186',
	);

	$brand = akaza_get_page_brand( $page_template );
	$hex   = strtolower( $brand['brand'] );

	// Orange page chrome is not the contact-form default.
	if ( in_array( $hex, array( '#ea3e24', '#ea3f23' ), true ) ) {
		return $form_default;
	}

	return $brand;
}

/**
 * Inline CSS custom properties for branded chrome (scroll-to-top, etc.).
 *
 * @return string Style attribute fragment (always present).
 */
function akaza_get_page_brand_style_attr() {
	$brand = akaza_get_page_brand();

	return sprintf(
		' style="--sl-page-brand:%1$s;--sl-page-brand-hover:%2$s;--sl-page-brand-rgb:%3$s;"',
		esc_attr( $brand['brand'] ),
		esc_attr( $brand['brand_hover'] ),
		esc_attr( $brand['rgb'] )
	);
}

/**
 * Print global chrome tokens (read progress, scroll-to-top).
 * Late footer so it wins over Insert Headers and Footers snippets.
 */
function akaza_print_page_brand_chrome_styles() {
	if ( is_admin() || ( function_exists( 'akaza_is_amp' ) && akaza_is_amp() ) ) {
		return;
	}
	?>
<style id="akaza-page-brand-chrome">
:root {
	--sl-chrome-fill: #1472ba;
	--sl-chrome-shadow-rgb: 20, 114, 186;
	--sl-chrome-accent: #1472ba;
}
#read-progress-wrap {
	background: rgba(0, 0, 0, 0.08);
}
#read-progress-bar {
	width: 100% !important;
	transform: scaleX(var(--sl-read-progress, 0));
	transform-origin: left center;
	will-change: transform;
	background: var(--sl-chrome-fill, #1472ba) !important;
}
.progress-square__rect {
	stroke: var(--sl-chrome-accent, #1472ba) !important;
}
#sl-scroll-top .sl-scroll-top {
	background: var(--sl-chrome-fill, #1472ba);
	box-shadow: 0 6px 18px rgba(var(--sl-chrome-shadow-rgb, 20, 114, 186), 0.38);
}
#sl-scroll-top .sl-scroll-top:hover,
#sl-scroll-top .sl-scroll-top:focus {
	filter: brightness(1.06);
}
#sl-scroll-top .sl-scroll-top:focus-visible {
	outline-color: rgba(var(--sl-chrome-shadow-rgb, 20, 114, 186), 0.45);
}
</style>
	<?php
}
add_action( 'wp_footer', 'akaza_print_page_brand_chrome_styles', 99 );

/**
 * Output AMP-safe contact form brand CSS for the current page.
 */
function akaza_amp_contact_form_brand_styles() {
	if ( ! function_exists( 'akaza_is_amp' ) || ! akaza_is_amp() ) {
		return;
	}

	$brand   = akaza_get_contact_form_brand();
	$primary = $brand['brand'];
	$hover   = $brand['brand_hover'];
	$rgb     = $brand['rgb'];
	?>
	.scf-form-wrap {
		--scf-brand: <?php echo esc_html( $primary ); ?>;
		--scf-brand-hover: <?php echo esc_html( $hover ); ?>;
		--scf-brand-fill: linear-gradient(180deg, #4d7ed6 0%, #1a3b87 100%);
	}
	.scf-submit {
		background: var(--scf-brand-fill);
		background-color: transparent;
		color: #fff;
		border: 1px solid transparent;
		border-radius: 8px;
		padding: 0.85rem 1.5rem;
		font-size: 1rem;
		font-weight: 600;
		width: fit-content;
		min-width: 148px;
		display: inline-block;
		margin: 1.25rem 0 0;
		box-shadow: 0 6px 16px rgba(26, 59, 135, 0.22);
	}
	.scf-submit:hover,
	.scf-submit:focus {
		background: var(--scf-brand-fill);
		background-color: transparent;
		filter: brightness(1.05);
	}
	.scf-field input:not([type="checkbox"]):not([type="radio"]):focus,
	.scf-field select:focus,
	.scf-field textarea:focus {
		border-color: var(--scf-border, #d7e3ef);
		box-shadow: none;
	}
	.scf-checkbox a {
		color: <?php echo esc_html( $primary ); ?>;
	}
	.scf-checkbox a:hover,
	.scf-checkbox a:focus {
		color: <?php echo esc_html( $hover ); ?>;
	}
	.scf-lightbox-button {
		background: linear-gradient(180deg, #4d7ed6 0%, #1a3b87 100%);
		color: #fff;
		border: 1px solid transparent;
		border-radius: 8px;
		padding: 0.75rem 1.25rem;
		font-weight: 600;
	}
	<?php
}
add_action( 'amp_post_template_css', 'akaza_amp_contact_form_brand_styles', 20 );
