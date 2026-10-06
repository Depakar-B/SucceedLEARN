<?php
/**
 * Secure Coding — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = get_theme_file_uri( '/assets/images/secure-coding/secure-coding-hero.svg' );

$facts = array(
	__( '45 minutes, self-paced', 'akaza-adventure' ),
	__( 'Beginner-friendly', 'akaza-adventure' ),
	__( 'Scenario-led learning', 'akaza-adventure' ),
	__( 'Assessment & certificate generation', 'akaza-adventure' ),
);
?>

<section
	class="sl-sc-hero"
	aria-labelledby="sl-sc-hero-title"
>
	<div class="container">

		<div class="sl-sc-hero__grid">

			<div class="sl-sc-hero__content">

				<div class="sl-sc-hero__breadcrumb">
					<span>
						<?php esc_html_e( 'Home / Secure Coding', 'akaza-adventure' ); ?>
					</span>
				</div>

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Application Security eLearning', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-sc-hero-title">
					<?php
					echo wp_kses(
						__( 'Secure Coding Practices <span>Training for Developers</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h1>

				<p class="sl-sc-hero__lead">
					<?php
					esc_html_e(
						'Help developers recognise security risk before it reaches production. This practical eLearning course builds secure-by-default habits across the software development lifecycle — without turning security into a separate, specialist-only activity.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-sc-hero__actions sl-hero-actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-hero-btn sl-hero-btn-secondary" href="#curriculum">
						<?php esc_html_e( 'View Course Topics', 'akaza-adventure' ); ?>
					</a>
				</div>

				<ul class="sl-sc-hero__facts" aria-label="<?php esc_attr_e( 'Course facts', 'akaza-adventure' ); ?>">
					<?php foreach ( $facts as $fact ) : ?>
						<li>
							<span class="sl-sc-hero__tick" aria-hidden="true">✓</span>
							<?php echo esc_html( $fact ); ?>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

			<div class="sl-sc-hero__visual">
				<div class="sl-sc-hero__image">
					<img
						src="<?php echo esc_url( $hero_image ); ?>"
						alt="<?php esc_attr_e( 'Secure coding illustration showing a secure code editor with a shield and connected software components', 'akaza-adventure' ); ?>"
						width="900"
						height="700"
						loading="eager"
						decoding="async"
					/>
				</div>
				<div class="sl-sc-hero__floating-label">
					<span class="sl-sc-hero__status-dot"></span>
					<span><?php esc_html_e( 'Secure by design', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
