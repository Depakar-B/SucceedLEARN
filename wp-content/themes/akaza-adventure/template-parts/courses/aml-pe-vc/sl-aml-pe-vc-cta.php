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

				<div
					class="sl-aml-pe-vc-cta__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'SucceedLEARN AML Course Preview placeholder', 'akaza-adventure' ); ?>"
				>
					<span><?php esc_html_e( 'SucceedLEARN AML Course Preview', 'akaza-adventure' ); ?></span>
					<small>
						<?php
						esc_html_e(
							'Replace with an approved screenshot showing the AML learner experience.',
							'akaza-adventure'
						);
						?>
					</small>
				</div>

			</div>

			<div class="sl-aml-pe-vc-cta__panel">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Enquiry', 'akaza-adventure' ); ?>
				</span>

				<h3><?php esc_html_e( 'Start Your SucceedLEARN Learning Journey', 'akaza-adventure' ); ?></h3>

				<p>
					<?php
					esc_html_e(
						'Tell us whether you are purchasing the individual course or exploring training for your organisation.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-content-actions">
					<a class="sl-content-btn sl-content-btn-primary" href="#contact">
						<?php esc_html_e( 'Buy Now @ $20', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
					<a class="sl-content-btn sl-content-btn-secondary" href="#contact">
						<?php esc_html_e( 'Request Org Demo', 'akaza-adventure' ); ?>
					</a>
				</div>

			</div>

		</div>

	</div>
</section>
