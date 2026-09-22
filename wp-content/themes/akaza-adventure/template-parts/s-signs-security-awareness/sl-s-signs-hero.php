<?php
/**
 * S-Signs — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-signs-hero"
	aria-labelledby="sl-s-signs-hero-title"
>
	<div class="container">

		<div class="sl-s-signs-hero__grid">

			<div class="sl-s-signs-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'S-Signs', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-s-signs-hero-title">
					<?php esc_html_e( 'Visual Security Awareness Posters & Digital Nudges', 'akaza-adventure' ); ?>
				</h1>

				<p>
					<?php
					esc_html_e(
						'Awareness training is most effective when security messages remain visible beyond the training session. Employees make hundreds of security-related decisions every day, and timely visual reminders play an important role in reinforcing secure behaviours, encouraging vigilance, and keeping cybersecurity top of mind.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						"S-Signs is SucceedLEARN's visual security awareness solution that provides organisations with a comprehensive library of professionally designed cybersecurity awareness posters and digital nudges. Covering a wide range of information security topics, S-Signs enables organisations to reinforce awareness across offices, hybrid workplaces, and remote teams through engaging visual communication that is simple, memorable, and easy to deploy.",
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Whether displayed across workplace notice boards, digital signage or shared through email campaigns, S-Signs helps organisations continuously reinforce security awareness and strengthen everyday cyber-safe behaviours.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-hero-actions sl-s-signs-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<div class="sl-s-signs-hero__media">
				<div class="sl-s-signs-hero__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
