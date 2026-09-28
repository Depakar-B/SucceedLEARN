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
					esc_html_e(
						'Gifts and Entertainment Training for Your PE/VC Compliance Programme',
						'akaza-adventure'
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

			</div>

			<div class="sl-gifts-entertainment-cta__actions">

				<a
					class="sl-content-btn sl-content-btn-primary"
					href="#contact"
				>
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

				<a
					class="sl-content-btn sl-content-btn-secondary"
					href="#"
				>
					<?php esc_html_e( 'Buy the Course', 'akaza-adventure' ); ?>
				</a>

			</div>

		</div>

	</div>
</section>
