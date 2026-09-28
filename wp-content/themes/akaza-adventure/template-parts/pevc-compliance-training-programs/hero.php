<?php
/**
 * PE/VC Homepage — Hero section.
 *
 * Full-bleed background image pattern (matches gifts / political donations hero).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/PEVC-Hero-section-image.webp';

$hero_values = array(
	__( 'Reduce risk', 'akaza-adventure' ),
	__( 'Build trust', 'akaza-adventure' ),
	__( 'Create lasting value', 'akaza-adventure' ),
);
?>
<section class="sl-pevc-hero" aria-labelledby="sl-pevc-hero-title">
	<img
		class="sl-pevc-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Private Equity and Venture Capital compliance training', 'akaza-adventure' ); ?>"
		decoding="async"
	>

	<div class="container">
		<div class="sl-pevc-hero__content">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Private Equity & Venture Capital', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-pevc-hero-title">
				<?php esc_html_e( 'Compliance learning', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'for what’s next.', 'akaza-adventure' ); ?></span>
			</h1>

			<div class="sl-pevc-hero__copy">
				<p class="sl-pevc-hero__lead">
					<?php
					esc_html_e(
						'Equip your people with the knowledge to recognise risk, understand their responsibilities, meet regulatory expectations and make better-informed decisions.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Practical compliance eLearning designed around the realities of UK Private Equity and Venture Capital firms.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-pevc-hero__actions sl-training-actions">
				<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>
				<a class="sl-hero-btn sl-hero-btn-secondary" href="#courses">
					<?php esc_html_e( 'Explore the PE/VC Suite', 'akaza-adventure' ); ?>
				</a>
			</div>

			<ul class="sl-pevc-hero__highlights">
				<?php foreach ( $hero_values as $value ) : ?>
					<li class="sl-pevc-hero__highlight">
						<span class="sl-pevc-hero__highlight-title">
							<?php echo esc_html( $value ); ?>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>
	</div>
</section>
