<?php
/**
 * S-Play — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-play-hero"
	aria-labelledby="sl-s-play-hero-title"
>
	<div class="container">

		<div class="sl-s-play-hero__grid">

			<div class="sl-s-play-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'S-Play', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-s-play-hero-title">
					<?php esc_html_e( 'Gamified Security Awareness Training', 'akaza-adventure' ); ?>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Turn Cybersecurity Learning Into an Experience Employees Want to Engage With', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Traditional cybersecurity awareness training can establish essential knowledge, but maintaining employee attention and reinforcing that knowledge over time can be challenging.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'S-Play, the gamified learning solution within the SucceedLEARN Security Behaviour & Culture Suite (SBCS), transforms cybersecurity awareness into an interactive learning experience through security games, challenges and decision-based activities.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Employees actively apply what they know, make security decisions and reinforce important cybersecurity concepts in a format designed to encourage participation and make learning memorable.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'For organisations, S-Play provides a structured way to select, schedule, deliver and monitor gamified security awareness campaigns across the workforce.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<strong>
						<?php
						esc_html_e(
							'Play. Learn. Reinforce Secure Behaviour.',
							'akaza-adventure'
						);
						?>
					</strong>
				</p>

				<div class="sl-hero-actions sl-s-play-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<div class="sl-s-play-hero__media">
				<div class="sl-s-play-hero__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
