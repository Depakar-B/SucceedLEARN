<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — Get Started / Buy CTA
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	id="buy"
	class="sl-aml-pe-vc-cta"
	aria-labelledby="sl-aml-pe-vc-cta-title"
>
	<div class="container">

		<div class="sl-aml-pe-vc-cta__grid">

			<div class="sl-aml-pe-vc-cta__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Get Started', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-aml-pe-vc-cta-title">
					<?php
					echo wp_kses_post(
						__(
							'Choose the AML Training Option <span>That Fits Your Needs</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p class="sl-aml-pe-vc-cta__lead">
					<?php
					esc_html_e(
						'Buy the individual AML course at $20 or enquire about organisational deployment, SCORM delivery and the wider SucceedLEARN compliance learning suites.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-aml-pe-vc-cta__actions">
					<a class="sl-content-btn sl-content-btn-primary" href="#contact">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
					</a>
				</div>

			</div>

			<figure class="sl-aml-pe-vc-cta__image">
				<img
					src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/09/last-image_AML.webp' ); ?>"
					alt="<?php esc_attr_e( 'SucceedLEARN AML Course Preview', 'akaza-adventure' ); ?>"
					loading="lazy"
					decoding="async"
				>
			</figure>

		</div>

	</div>
</section>
