<?php
/**
 * SucceedLEARN — S-Aware
 *
 * Section: S-Aware Hero
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-saware-hero"
	aria-labelledby="sl-saware-hero-title"
>
	<div class="container">

		<div class="sl-saware-hero__grid">

			<!-- Left: Content -->
			<div class="sl-saware-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'S-Aware', 'akaza-adventure' ); ?>
				</span>

				<!-- Temporary H1 -->
				<h1 class="sl-saware-hero__title">
					<?php esc_html_e( 'Security Awareness Training', 'akaza-adventure' ); ?>
				</h1>

				<h2 id="sl-saware-hero-title">
					<?php esc_html_e( 'Security Awareness Training That Builds the Foundation for', 'akaza-adventure' ); ?>
					<span>
						<?php esc_html_e( 'Lasting Behaviour Change', 'akaza-adventure' ); ?>
					</span>
				</h2>

				<p>
					<?php esc_html_e(
						'Equip employees with the knowledge and practical understanding they need to recognise cyber risks, make informed security decisions, and contribute to a stronger security culture.',
						'akaza-adventure'
					); ?>
				</p>

				<p>
					<?php esc_html_e(
						'S-Aware delivers engaging, scenario-based security and privacy awareness training designed to help organisations move beyond compliance-driven learning and build the knowledge foundation for continuous security behaviour change.',
						'akaza-adventure'
					); ?>
				</p>

				<div class="sl-hero-actions sl-saware-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>


			<!-- Right: Image -->
			<div class="sl-saware-hero__media">

				<div class="sl-saware-hero__image-placeholder">
					<span>
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</span>
				</div>

			</div>

		</div>

	</div>
</section>