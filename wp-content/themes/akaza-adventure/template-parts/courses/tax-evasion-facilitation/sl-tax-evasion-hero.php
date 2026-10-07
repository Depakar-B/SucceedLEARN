<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Tax-Evasion_Hero-section.webp';
?>

<section
	id="course-hero"
	class="sl-tax-evasion-hero"
	aria-labelledby="sl-tax-evasion-hero-title"
>
	<img
		class="sl-tax-evasion-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Criminal Finances Act 2017 book with the UK royal coat of arms', 'akaza-adventure' ); ?>"
		decoding="async"
		fetchpriority="high"
	>

	<div class="container">

		<div class="sl-tax-evasion-hero__grid">

			<!-- Hero Content -->
			<div class="sl-tax-evasion-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Preventing Facilitation of Tax Evasion Compliance Training', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-tax-evasion-hero-title">
					<?php esc_html_e( 'Preventing the Facilitation of', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Tax Evasion Training', 'akaza-adventure' ); ?></span>
				</h1>

				<div class="sl-tax-evasion-hero__copy">

					<p>
						<?php
						echo wp_kses_post(
							__( 'SucceedLEARN’s <strong>Preventing the Facilitation of Tax Evasion</strong> training helps senior leaders and relevant employees understand the Criminal Finances Act 2017, recognise tax evasion facilitation risks and understand how those risks can be identified, prevented and reported.', 'akaza-adventure' )
						);
						?>
					</p>

					<p>
						<?php esc_html_e( 'Learners explore tax evasion, risk assessment, due diligence, policy development, communication and training, internal reporting, and ongoing monitoring and review.', 'akaza-adventure' ); ?>
					</p>

				</div>
				<div class="sl-hero-actions sl-hero-actions--labelled">
					<div class="sl-hero-cta-item">
						<span class="sl-hero-cta-label"><?php esc_html_e( 'Individual', 'akaza-adventure' ); ?></span>
						<a class="sl-hero-btn sl-hero-btn-primary" href="#contact"><?php esc_html_e( 'Buy Now @ $18', 'akaza-adventure' ); ?> <span aria-hidden="true">→</span></a>
					</div>
					<div class="sl-hero-cta-item">
						<span class="sl-hero-cta-label"><?php esc_html_e( 'Organisation', 'akaza-adventure' ); ?></span>
						<a class="sl-hero-btn sl-hero-btn-secondary" href="#organisations"><?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?></a>
					</div>
				</div>

				<div
					class="sl-tax-evasion-hero__tags"
					aria-label="<?php esc_attr_e( 'Course features', 'akaza-adventure' ); ?>"
				>

					<span class="sl-tax-evasion-hero__tag">
						<?php esc_html_e( 'CPD-Certified', 'akaza-adventure' ); ?>
					</span>

					<span class="sl-tax-evasion-hero__tag">
						<?php esc_html_e( '30-Minute eLearning', 'akaza-adventure' ); ?>
					</span>

					<span class="sl-tax-evasion-hero__tag">
						<?php esc_html_e( 'Knowledge Checks', 'akaza-adventure' ); ?>
					</span>

					<span class="sl-tax-evasion-hero__tag">
						<?php esc_html_e( 'Assessment Included', 'akaza-adventure' ); ?>
					</span>

				</div>

			</div>

		</div>

	</div>
</section>
