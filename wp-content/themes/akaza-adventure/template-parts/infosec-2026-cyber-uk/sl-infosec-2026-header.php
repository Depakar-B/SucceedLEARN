<?php
/**
 * Infosec 2026 Cyber — custom single-page header.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo_url = '';
$logo_alt = 'SucceedLEARN';

if ( class_exists( 'AHF_Config' ) ) {
	$config = AHF_Config::get();
	$logo   = isset( $config['logo'] ) && is_array( $config['logo'] ) ? $config['logo'] : array();

	if ( ! empty( $logo['scrolled_url'] ) ) {
		$logo_url = (string) $logo['scrolled_url'];
	} elseif ( ! empty( $logo['url'] ) ) {
		$logo_url = (string) $logo['url'];
	}

	if ( ! empty( $logo['alt'] ) ) {
		$logo_alt = (string) $logo['alt'];
	}
}

if ( '' === $logo_url ) {
	$logo_url = 'https://succeedlearn.com/wp-content/uploads/2025/12/logo.webp';
}

$nav_items = array(
	array(
		'label' => __( 'Campaign', 'akaza-adventure' ),
		'href'  => '#campaign',
	),
	array(
		'label' => __( 'Testing', 'akaza-adventure' ),
		'href'  => '#testing',
	),
	array(
		'label' => __( 'Challenge', 'akaza-adventure' ),
		'href'  => '#challenge',
	),
	array(
		'label' => __( 'How it works', 'akaza-adventure' ),
		'href'  => '#how-the-campaign-works',
	),
	array(
		'label' => __( 'Terms', 'akaza-adventure' ),
		'href'  => '#terms-and-conditions',
	),
);
?>
<header class="sl-infosec-header" id="sl-infosec-header" role="banner">
	<div class="container">
		<div class="sl-infosec-header__inner">
			<a class="sl-infosec-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img
					src="<?php echo esc_url( $logo_url ); ?>"
					alt="<?php echo esc_attr( $logo_alt ); ?>"
					width="180"
					height="40"
					decoding="async"
				>
			</a>

			<nav class="sl-infosec-header__nav" aria-label="<?php esc_attr_e( 'Page sections', 'akaza-adventure' ); ?>">
				<ul class="sl-infosec-header__nav-list">
					<?php foreach ( $nav_items as $item ) : ?>
						<li>
							<a class="sl-infosec-header__nav-link" href="<?php echo esc_attr( $item['href'] ); ?>">
								<?php echo esc_html( $item['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<div class="sl-infosec-header__actions">
				<a class="sl-content-btn sl-content-btn-primary sl-infosec-header__cta" href="#contact">
					<?php esc_html_e( 'Contact us', 'akaza-adventure' ); ?>
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M5 12h13M13 6l6 6-6 6" />
					</svg>
				</a>
			</div>
		</div>
	</div>
</header>
