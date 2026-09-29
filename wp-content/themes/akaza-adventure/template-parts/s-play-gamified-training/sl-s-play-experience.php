<?php
/**
 * S-Play — Turn Security Awareness Into Active Participation.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-play-experience"
	aria-labelledby="sl-s-play-experience-title"
>
	<div class="container">

		<div class="sl-s-play-experience__grid">

			<div class="sl-s-play-experience__media">
				<div class="sl-s-play-experience__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-s-play-experience__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Make Awareness Participative', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-play-experience-title">
					<?php esc_html_e( 'Turn Security Awareness Into', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Active Participation', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-play-experience__copy">
					<p>
						<?php
						esc_html_e(
							"Cybersecurity awareness shouldn't end when employees complete a course.",
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Play gives organisations an interactive way to keep employees engaged with cybersecurity through games, challenges and decision-based learning experiences that reinforce important security concepts throughout the year.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							"Make security awareness something employees don't just complete - make it something they participate in.",
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<a class="sl-content-btn sl-content-btn-primary" href="#request-demo">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

			</div>

		</div>

	</div>
</section>
