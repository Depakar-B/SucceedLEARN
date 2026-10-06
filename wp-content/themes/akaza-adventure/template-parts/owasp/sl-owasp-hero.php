<?php
/**
 * OWASP — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = get_theme_file_uri( '/assets/images/owasp/owasp-secure-dev-illustration.svg' );

$highlights = array(
	__( 'OWASP Top 10:2025 coverage', 'akaza-adventure' ),
	__( 'Built for developers & technical teams', 'akaza-adventure' ),
	__( 'Practical scenarios & knowledge checks', 'akaza-adventure' ),
	__( 'Secure Coding & Secure SDLC principles', 'akaza-adventure' ),
);
?>

<section class="sl-owasp-hero" aria-labelledby="sl-owasp-hero-title">
	<div class="container">
		<div class="sl-owasp-hero__grid">

			<div class="sl-owasp-hero__content">
				<div class="sl-owasp-hero__breadcrumb">
					<span><?php esc_html_e( 'Home / OWASP Top 10', 'akaza-adventure' ); ?></span>
				</div>

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'OWASP Top 10:2025 · Secure Application Development', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-owasp-hero-title">
					<?php
					echo wp_kses(
						__( 'OWASP Top 10:2025 Training for <span>Developers</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h1>

				<p class="sl-owasp-hero__lead">
					<?php
					esc_html_e(
						'Help your development teams understand the application-security risks that matter most — how common weaknesses occur, how they may be exploited, and the practical development practices that can reduce risk.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Move beyond simply knowing vulnerability names. Build the security mindset required to recognise weaknesses earlier and make more secure decisions throughout the software development lifecycle.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-owasp-hero__actions sl-hero-actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-hero-btn sl-hero-btn-secondary" href="#course-content">
						<?php esc_html_e( 'Explore Course Content', 'akaza-adventure' ); ?>
					</a>
				</div>

				<ul class="sl-owasp-hero__points" aria-label="<?php esc_attr_e( 'Course highlights', 'akaza-adventure' ); ?>">
					<?php foreach ( $highlights as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-owasp-hero__visual">
				<img
					src="<?php echo esc_url( $hero_image ); ?>"
					alt="<?php esc_attr_e( 'Illustration of secure application development and OWASP Top 10 risk awareness', 'akaza-adventure' ); ?>"
					width="900"
					height="700"
					loading="eager"
					decoding="async"
				/>
			</div>

		</div>
	</div>
</section>
