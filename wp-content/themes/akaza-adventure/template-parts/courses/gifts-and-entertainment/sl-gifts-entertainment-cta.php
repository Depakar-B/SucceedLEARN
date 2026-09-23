<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * CTA Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	id="buy"
	class="sl-gifts-entertainment-cta"
	aria-labelledby="sl-gifts-entertainment-cta-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-cta__panel">

			<div class="sl-gifts-entertainment-cta__content">

				<span class="sl-gifts-entertainment-cta__eyebrow">
					<?php
					esc_html_e(
						'SucceedLEARN PE/VC Compliance',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-gifts-entertainment-cta-title">
					<?php
					echo wp_kses_post(
						__(
							'Gifts and Entertainment Training for Your <span>PE/VC Compliance Programme</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p class="sl-gifts-entertainment-cta__description">
					<?php
					esc_html_e(
						'Explore practical, scenario-led learning designed to help PE/VC professionals recognise gifts and entertainment compliance risks across UK and US business environments.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-content-actions">

					<a
						class="sl-content-btn sl-content-btn-primary"
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
						class="sl-content-btn sl-content-btn-secondary"
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

			<div
				class="sl-gifts-entertainment-cta__visual"
				aria-hidden="true"
			>
				<div class="sl-gifts-entertainment-cta__visual-ring"></div>

				<div class="sl-gifts-entertainment-cta__visual-core">
					<span>PE/VC</span>
					<small>Compliance</small>
				</div>

				<div class="sl-gifts-entertainment-cta__visual-line sl-gifts-entertainment-cta__visual-line--one"></div>
				<div class="sl-gifts-entertainment-cta__visual-line sl-gifts-entertainment-cta__visual-line--two"></div>
				<div class="sl-gifts-entertainment-cta__visual-line sl-gifts-entertainment-cta__visual-line--three"></div>
			</div>

		</div>

	</div>
</section>