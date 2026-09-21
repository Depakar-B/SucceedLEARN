<?php
/**
 * Secondary global header.
 * Logo left, site nav, Request Demo CTA + sales email.
 * Enable per page via akaza_secondary_header_slugs().
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo_url = 'https://succeedlearn.com/wp-content/uploads/2025/12/logo.webp';
$cta_url  = home_url( '/contact-us/' );
$email    = 'sales@succeedtech.com';

$solutions = array(
	array(
		'label' => __( 'Security Awareness', 'akaza-adventure' ),
		'url'   => home_url( '/security-awareness/' ),
	),
	array(
		'label' => __( 'HR Compliance Suite', 'akaza-adventure' ),
		'url'   => home_url( '/hr-compliance-suite/' ),
	),
	array(
		'label' => __( 'Financial Crime Prevention', 'akaza-adventure' ),
		'url'   => home_url( '/financial-crime-prevention-suite/' ),
	),
	array(
		'label' => __( 'Workplace Health & Safety', 'akaza-adventure' ),
		'url'   => home_url( '/workplace-health-and-safety-suite/' ),
	),
	array(
		'label' => __( 'Code of Conduct', 'akaza-adventure' ),
		'url'   => home_url( '/code-of-conduct-elearning-training/' ),
	),
	array(
		'label' => __( 'Private Equity & Venture Capital Suite', 'akaza-adventure' ),
		'url'   => home_url( '/private-equity-and-venture-capital-suite/' ),
	),
	array(
		'label' => __( 'India ESG Awareness', 'akaza-adventure' ),
		'url'   => home_url( '/india-esg-awareness/' ),
	),
);

$who_we_are = array(
	array(
		'label' => __( 'Contact Us', 'akaza-adventure' ),
		'url'   => home_url( '/contact-us/' ),
	),
	array(
		'label' => __( 'About Us', 'akaza-adventure' ),
		'url'   => home_url( '/about-us/' ),
	),
);
?>
<header id="top" class="sl-secondary-header" role="banner">
	<div class="sl-secondary-header__inner">
		<a class="sl-secondary-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'SucceedLEARN home', 'akaza-adventure' ); ?>">
			<img
				src="<?php echo esc_url( $logo_url ); ?>"
				alt="SucceedLEARN"
				width="150"
				height="50"
				decoding="async"
				fetchpriority="high"
			/>
		</a>

		<button
			class="sl-secondary-header__toggle"
			type="button"
			aria-expanded="false"
			aria-controls="sl-secondary-nav"
			data-sl-secondary-nav-toggle
		>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'akaza-adventure' ); ?></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</button>

		<nav id="sl-secondary-nav" class="sl-secondary-header__nav" aria-label="<?php esc_attr_e( 'Primary', 'akaza-adventure' ); ?>">
			<ul class="sl-secondary-header__menu">
				<li>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'akaza-adventure' ); ?></a>
				</li>

				<li class="sl-secondary-header__has-dropdown sl-secondary-header__has-dropdown--wide" data-sl-secondary-dropdown>
					<button type="button" class="sl-secondary-header__trigger" aria-expanded="false" aria-haspopup="true">
						<?php esc_html_e( 'By Solution', 'akaza-adventure' ); ?>
						<span class="sl-secondary-header__arrow" aria-hidden="true"></span>
					</button>
					<ul class="sl-secondary-header__dropdown">
						<?php foreach ( $solutions as $item ) : ?>
							<li>
								<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>

				<li>
					<a href="<?php echo esc_url( home_url( '/by-courses-best-elearning-courses-succeedlearn/' ) ); ?>">
						<?php esc_html_e( 'By Courses', 'akaza-adventure' ); ?>
					</a>
				</li>

				<li class="sl-secondary-header__has-dropdown" data-sl-secondary-dropdown>
					<button type="button" class="sl-secondary-header__trigger" aria-expanded="false" aria-haspopup="true">
						<?php esc_html_e( 'Who We Are', 'akaza-adventure' ); ?>
						<span class="sl-secondary-header__arrow" aria-hidden="true"></span>
					</button>
					<ul class="sl-secondary-header__dropdown">
						<?php foreach ( $who_we_are as $item ) : ?>
							<li>
								<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>

			<div class="sl-secondary-header__actions">
				<a class="sl-secondary-header__cta" href="<?php echo esc_url( $cta_url ); ?>">
					<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
				</a>
				<a class="sl-secondary-header__email" href="<?php echo esc_url( 'mailto:' . $email ); ?>">
					<?php echo esc_html( $email ); ?>
				</a>
			</div>
		</nav>
	</div>
</header>
