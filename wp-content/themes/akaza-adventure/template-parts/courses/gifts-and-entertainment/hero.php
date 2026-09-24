<?php
/**
 * SucceedLEARN
 * Gifts and Entertainment Training for PE/VC Professionals
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Hero-section-image_gifts.webp';
?>

<section
	class="sl-gifts-entertainment-hero"
	aria-labelledby="sl-gifts-entertainment-hero-title"
>
	<img
		class="sl-gifts-entertainment-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Gifts and entertainment compliance training', 'akaza-adventure' ); ?>"
		decoding="async"
	>

	<div class="container">
		<div class="sl-gifts-entertainment-hero__content">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Gifts and entertainment compliance',
					'akaza-adventure'
				);
				?>
			</span>

			<h1 id="sl-gifts-entertainment-hero-title">
				<?php
				esc_html_e(
					'Gifts and Entertainment Training for PE/VC Professionals',
					'akaza-adventure'
				);
				?>
			</h1>

			<h2>
				<?php
				esc_html_e(
					'Make informed decisions. Build trusted relationships.',
					'akaza-adventure'
				);
				?>
			</h2>

			<div class="sl-gifts-entertainment-hero__description">

				<p>
					<?php
					esc_html_e(
						'Help your teams recognise when gifts, entertainment and hospitality are reasonable business courtesies, and when they may create a compliance concern.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Designed for private equity and venture capital professionals, this scenario-led e-learning course uses situations relevant to both the UK and the US, including interactions with investors, advisers, vendors, portfolio company contacts and government officials.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<div class="sl-hero-actions">
				<div class="sl-gifts-entertainment-hero__cta-item">
					<span class="sl-gifts-entertainment-hero__cta-label">
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
				<div class="sl-gifts-entertainment-hero__cta-item">
					<span class="sl-gifts-entertainment-hero__cta-label">
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

			<ul class="sl-gifts-entertainment-hero__highlights">

				<li class="sl-gifts-entertainment-hero__highlight">
					<span class="sl-gifts-entertainment-hero__highlight-title">
						<?php
						esc_html_e(
							'PE/VC-specific scenarios',
							'akaza-adventure'
						);
						?>
					</span>
				</li>

				<li class="sl-gifts-entertainment-hero__highlight">
					<span class="sl-gifts-entertainment-hero__highlight-title">
						<?php
						esc_html_e(
							'UK and US context',
							'akaza-adventure'
						);
						?>
					</span>
				</li>

				<li class="sl-gifts-entertainment-hero__highlight">
					<span class="sl-gifts-entertainment-hero__highlight-title">
						<?php
						esc_html_e(
							'Interactive decision-making',
							'akaza-adventure'
						);
						?>
					</span>
				</li>

			</ul>

		</div>
	</div>
</section>
