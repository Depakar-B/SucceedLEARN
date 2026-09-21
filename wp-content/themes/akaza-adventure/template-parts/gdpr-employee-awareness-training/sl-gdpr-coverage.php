<?php
/**
 * GDPR Employee Awareness — Course Coverage.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-gdpr-coverage"
	aria-labelledby="sl-gdpr-coverage-title"
>
	<div class="container">

		<div class="sl-gdpr-coverage__grid">

			<!-- Left: Image -->
			<div class="sl-gdpr-coverage__visual">

				<div class="sl-gdpr-coverage__image">
					<div
						class="sl-gdpr-coverage__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'GDPR course overview image placeholder', 'akaza-adventure' ); ?>"
					>
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>
				</div>

			</div>

			<!-- Right: Content -->
			<div class="sl-gdpr-coverage__content">

				<div class="sl-gdpr-coverage__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Built for EU GDPR, and Only EU GDPR', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-gdpr-coverage-title">
						<?php esc_html_e( 'Everything Your Team Needs on', 'akaza-adventure' ); ?>
						<span><?php esc_html_e( 'GDPR.', 'akaza-adventure' ); ?></span>
					</h2>

					<p>
						<?php esc_html_e( 'The course covers the regulation end to end: the principles, the six lawful bases, all eight data subject rights, privacy by design, ten real breach scenarios, and a dedicated module on lawful sales outreach across the EU, the one thing most awareness training skips.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<div class="sl-highlight">
					<p>
						<strong>
							<?php esc_html_e( 'If your people handle EU personal data, this is the course.', 'akaza-adventure' ); ?>
						</strong>
						<?php esc_html_e( ' If you also operate in India, pair it with our DPDPA training.', 'akaza-adventure' ); ?>
					</p>
				</div>

				<div class="sl-gdpr-coverage__actions">
					<a
						class="sl-content-btn sl-content-btn-primary"
						href="#contact"
					>
						<?php esc_html_e( 'Reach Us Out', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

		</div>

	</div>
</section>