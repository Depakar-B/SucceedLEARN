<?php
/**
 * Cybersecurity Awareness — custom single-page header.
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
		'label' => __( 'PhishCue', 'akaza-adventure' ),
		'href'  => '#phishcue',
	),
	array(
		'label' => __( 'Pricing', 'akaza-adventure' ),
		'href'  => '#pricing',
	),
	array(
		'label' => __( 'FAQs', 'akaza-adventure' ),
		'href'  => '#frequently-asked-questions',
	),
);
?>
<header class="sl-csa-header" id="sl-csa-header" role="banner">
	<div class="container">
		<div class="sl-csa-header__inner">
			<span class="sl-csa-header__logo">
				<img
					src="<?php echo esc_url( $logo_url ); ?>"
					alt="<?php echo esc_attr( $logo_alt ); ?>"
					width="180"
					height="40"
					decoding="async"
				>
			</span>

			<nav class="sl-csa-header__nav" aria-label="<?php esc_attr_e( 'Page sections', 'akaza-adventure' ); ?>">
				<ul class="sl-csa-header__nav-list">
					<?php foreach ( $nav_items as $item ) : ?>
						<li>
							<a class="sl-csa-header__nav-link" href="<?php echo esc_attr( $item['href'] ); ?>">
								<?php echo esc_html( $item['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<a class="sl-content-btn sl-content-btn-primary" href="#pricing">
				<?php
				echo wp_kses(
					__( 'Claim the <span class="sl-csa-oct-tag">October</span> Offer', 'akaza-adventure' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				);
				?>
				<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M5 12h13M13 6l6 6-6 6" />
				</svg>
			</a>
		</div>
	</div>
</header>
