<?php
/**
 * SucceedLEARN
 * Insider Trading eLearning
 * Course Hero Section
 *
 * Full-bleed background image pattern (matches PE/VC homepage hero).
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/insider_trading_Hero-section.webp';
?>

<section
	class="sl-insider-trading-hero"
	aria-labelledby="sl-insider-trading-hero-title"
>
	<img
		class="sl-insider-trading-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Insider trading illustration with market charts, a financial report and a confidential file', 'akaza-adventure' ); ?>"
		decoding="async"
		fetchpriority="high"
	>

	<div class="container">

		<div class="sl-insider-trading-hero__content">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Financial Crime Prevention',
					'akaza-adventure'
				);
				?>
			</span>

			<h1 id="sl-insider-trading-hero-title">
				<?php
				echo wp_kses_post(
					__(
						'Insider Trading <span>eLearning</span>',
						'akaza-adventure'
					)
				);
				?>
			</h1>

			<div class="sl-insider-trading-hero__description">

				<p>
					<strong>
						<?php
						esc_html_e(
							'Insider Trading eLearning',
							'akaza-adventure'
						);
						?>
					</strong>
					<?php
					esc_html_e(
						' helps employees recognise sensitive or non-public information, understand when trading or sharing information may create compliance risk, and make better-informed decisions before they act.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'The learning connects workplace decisions with important concepts associated with Market Abuse Regulations, UK MAR, US SEC requirements and India SEBI Regulation.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<div class="sl-hero-actions">

				<a
					class="sl-hero-btn sl-hero-btn-primary"
					href="#contact"
				>
					<?php
					esc_html_e(
						'Request a Demo',
						'akaza-adventure'
					);
					?>
					<span aria-hidden="true">→</span>
				</a>

				<a
					class="sl-hero-btn sl-hero-btn-secondary"
					href="#"
				>
					<?php
					esc_html_e(
						'Buy the Course',
						'akaza-adventure'
					);
					?>
				</a>

			</div>

		</div>

	</div>
</section>
