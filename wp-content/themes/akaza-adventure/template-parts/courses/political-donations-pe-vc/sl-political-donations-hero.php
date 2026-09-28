<?php
/**
 * Political Donations Training — Hero.
 *
 * Full-bleed background image pattern (matches gifts / SMCR hero).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Hero-section_Political-Donations.webp';
?>

<section
	class="sl-political-donations-hero"
	aria-labelledby="sl-political-donations-hero-title"
>
	<img
		class="sl-political-donations-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Political donations compliance training', 'akaza-adventure' ); ?>"
		decoding="async"
	>

	<div class="container">
		<div class="sl-political-donations-hero__content">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Political Donations Compliance Learning', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-political-donations-hero-title">
				<?php esc_html_e( 'Political Donations Training for PE & VC Professionals', 'akaza-adventure' ); ?>
			</h1>

			<div class="sl-political-donations-hero__copy">

				<p>
					<?php esc_html_e( 'Help investment teams recognise when political activity can create compliance, anti-bribery, conflict of interest or cross-border regulatory risk.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'This practical SucceedLEARN course combines investment-sector scenarios with UK political donations considerations and US Pay-to-Play awareness.', 'akaza-adventure' ); ?>
				</p>

			</div>

			<div class="sl-hero-actions sl-political-donations-hero__actions">
				<div class="sl-political-donations-hero__cta-item">
					<span class="sl-political-donations-hero__cta-label">
						<?php esc_html_e( 'Individual', 'akaza-adventure' ); ?>
					</span>
					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#individuals"
					>
						<?php esc_html_e( 'Buy Now @ $20', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>
				<div class="sl-political-donations-hero__cta-item">
					<span class="sl-political-donations-hero__cta-label">
						<?php esc_html_e( 'Organisation', 'akaza-adventure' ); ?>
					</span>
					<a
						class="sl-hero-btn sl-hero-btn-secondary"
						href="#organisations"
					>
						<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

			<ul class="sl-political-donations-hero__highlights">
				<li class="sl-political-donations-hero__highlight">
					<span class="sl-political-donations-hero__highlight-title">
						<?php esc_html_e( 'Political contributions', 'akaza-adventure' ); ?>
					</span>
				</li>
				<li class="sl-political-donations-hero__highlight">
					<span class="sl-political-donations-hero__highlight-title">
						<?php esc_html_e( 'Anti-bribery risk', 'akaza-adventure' ); ?>
					</span>
				</li>
				<li class="sl-political-donations-hero__highlight">
					<span class="sl-political-donations-hero__highlight-title">
						<?php esc_html_e( 'UK & US context', 'akaza-adventure' ); ?>
					</span>
				</li>
				<li class="sl-political-donations-hero__highlight">
					<span class="sl-political-donations-hero__highlight-title">
						<?php esc_html_e( 'Investment-sector scenarios', 'akaza-adventure' ); ?>
					</span>
				</li>
			</ul>

		</div>
	</div>
</section>
