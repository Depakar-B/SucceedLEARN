<?php
/**
 * SMCR Training for Private Equity & Venture Capital Firms — Hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/SMCR_Hero-section.webp';
?>

<section
	id="smcr-hero"
	class="sl-smcr-hero"
	aria-labelledby="sl-smcr-hero-title"
>
	<img
		class="sl-smcr-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'SMCR compliance training', 'akaza-adventure' ); ?>"
		decoding="async"
	>

	<div class="container">
		<div class="sl-smcr-hero__content">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'SMCR Compliance Training', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-smcr-hero-title">
				<?php esc_html_e( 'SMCR Training for Private Equity & Venture Capital Firms', 'akaza-adventure' ); ?>
			</h1>

			<div class="sl-smcr-hero__description">
				<p class="sl-smcr-hero__lead">
					<?php
					esc_html_e(
						'Role-relevant SMCR training for UK private equity and venture capital teams, with dedicated learning for employees and Senior Managers.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Help learners connect Conduct Rules and individual accountability with practical decisions involving investments, investor reporting, operations, oversight and escalation.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-hero-actions">
				<div class="sl-smcr-hero__cta-item">
					<span class="sl-smcr-hero__cta-label">
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
				<div class="sl-smcr-hero__cta-item">
					<span class="sl-smcr-hero__cta-label">
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

			<ul class="sl-smcr-hero__highlights">
				<li class="sl-smcr-hero__highlight">
					<span class="sl-smcr-hero__highlight-title">
						<?php esc_html_e( 'UK SMCR Training', 'akaza-adventure' ); ?>
					</span>
				</li>
				<li class="sl-smcr-hero__highlight">
					<span class="sl-smcr-hero__highlight-title">
						<?php esc_html_e( 'Employees Course', 'akaza-adventure' ); ?>
					</span>
				</li>
				<li class="sl-smcr-hero__highlight">
					<span class="sl-smcr-hero__highlight-title">
						<?php esc_html_e( 'Senior Managers Course', 'akaza-adventure' ); ?>
					</span>
				</li>
				<li class="sl-smcr-hero__highlight">
					<span class="sl-smcr-hero__highlight-title">
						<?php esc_html_e( 'PE/VC Scenarios', 'akaza-adventure' ); ?>
					</span>
				</li>
			</ul>

		</div>
	</div>
</section>
