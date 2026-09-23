<?php
/**
 * SucceedLEARN
 * AML Training for Private Equity & Venture Capital — Hero
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/AML-Hero-Section.webp';
?>

<section
	class="sl-aml-pe-vc-hero"
	aria-labelledby="sl-aml-pe-vc-hero-title"
>
	<img
		class="sl-aml-pe-vc-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'AML Course Hero Image', 'akaza-adventure' ); ?>"
		decoding="async"
	>

	<div class="container">
		<div class="sl-aml-pe-vc-hero__content">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Anti-Money Laundering Awareness Training', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-aml-pe-vc-hero-title">
				<?php
				echo wp_kses_post(
					__(
						'AML Training for <span>Private Equity &amp; Venture Capital</span>',
						'akaza-adventure'
					)
				);
				?>
			</h1>

			<p class="sl-aml-pe-vc-hero__lead">
				<?php
				esc_html_e(
					'Practical AML training built around the financial crime risks investment professionals encounter across investor onboarding, due diligence, deal assessment and ongoing monitoring.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'Build awareness of KYC, CDD, EDD, beneficial ownership, MLRO responsibilities, CFT, CPF and important UK and US anti-money laundering frameworks.',
					'akaza-adventure'
				);
				?>
			</p>

			<ul class="sl-aml-pe-vc-hero__tags">
				<li><?php esc_html_e( 'AML & KYC', 'akaza-adventure' ); ?></li>
				<li><?php esc_html_e( 'CDD & EDD', 'akaza-adventure' ); ?></li>
				<li><?php esc_html_e( 'CFT & CPF', 'akaza-adventure' ); ?></li>
				<li><?php esc_html_e( 'FCA & MLRO', 'akaza-adventure' ); ?></li>
				<li><?php esc_html_e( 'UK & US AML Laws', 'akaza-adventure' ); ?></li>
			</ul>

			<div class="sl-hero-actions">
				<div class="sl-aml-pe-vc-hero__cta-item">
					<span class="sl-aml-pe-vc-hero__cta-label">
						<?php esc_html_e( 'Individual', 'akaza-adventure' ); ?>
					</span>
					<a class="sl-hero-btn sl-hero-btn-primary" href="#buy">
						<?php esc_html_e( 'Buy Now @ $20', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>
				<div class="sl-aml-pe-vc-hero__cta-item">
					<span class="sl-aml-pe-vc-hero__cta-label">
						<?php esc_html_e( 'Organisation', 'akaza-adventure' ); ?>
					</span>
					<a class="sl-hero-btn sl-hero-btn-secondary" href="#organisations">
						<?php esc_html_e( 'Explore More', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>
