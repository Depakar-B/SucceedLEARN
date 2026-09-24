<?php
/**
 * Whistleblowing Training — Hero.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$hero_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Whistle-blowing-hero-section.webp';
?>

<section
	id="hero"
	class="sl-whistleblowing-hero"
	aria-labelledby="sl-whistleblowing-hero-title"
>
	<img
		class="sl-whistleblowing-hero__bg-image"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt="<?php esc_attr_e( 'Whistleblowing compliance training', 'akaza-adventure' ); ?>"
		decoding="async"
	>

	<div class="container">
		<div class="sl-whistleblowing-hero__content">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Whistleblowing compliance', 'akaza-adventure' ); ?>
			</span>

			<h1 id="sl-whistleblowing-hero-title">
				<?php esc_html_e( 'Whistleblowing Training for Private Equity & Venture Capital', 'akaza-adventure' ); ?>
			</h1>

			<h2>
				<?php esc_html_e( 'Recognise concerns. Understand the protections. Know when and how to speak up.', 'akaza-adventure' ); ?>
			</h2>

			<div class="sl-whistleblowing-hero__description">
				<p>
					<?php
					esc_html_e(
						'Practical whistleblowing training created for investment professionals, using scenarios relevant to financial information, deal activity, conflicts, conduct and reporting concerns.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-hero-actions">
				<div class="sl-whistleblowing-hero__cta-item">
					<span class="sl-whistleblowing-hero__cta-label">
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
				<div class="sl-whistleblowing-hero__cta-item">
					<span class="sl-whistleblowing-hero__cta-label">
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

			<ul class="sl-whistleblowing-hero__highlights">
				<li class="sl-whistleblowing-hero__highlight">
					<span class="sl-whistleblowing-hero__highlight-title">
						<?php esc_html_e( 'UK-focused learning', 'akaza-adventure' ); ?>
					</span>
				</li>
				<li class="sl-whistleblowing-hero__highlight">
					<span class="sl-whistleblowing-hero__highlight-title">
						<?php esc_html_e( 'Investment-sector scenarios', 'akaza-adventure' ); ?>
					</span>
				</li>
				<li class="sl-whistleblowing-hero__highlight">
					<span class="sl-whistleblowing-hero__highlight-title">
						<?php esc_html_e( 'Practical examples', 'akaza-adventure' ); ?>
					</span>
				</li>
			</ul>

		</div>
	</div>
</section>
