<?php
/**
 * S-Play — Turn Security Awareness into an Experience Employees Enjoy.
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
					<?php esc_html_e( 'Make Awareness Enjoyable', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-play-experience-title">
					<?php esc_html_e( 'Turn Security Awareness into an', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Experience Employees Enjoy', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-play-experience__copy">
					<p>
						<?php
						esc_html_e(
							'Building a security-conscious workforce requires more than mandatory training - it requires continuous engagement. S-Play transforms cybersecurity awareness into an interactive learning experience that encourages participation, reinforces secure behaviours, and helps employees confidently recognise and respond to everyday cyber threats.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Whether used alongside annual awareness programmes or as part of a continuous learning strategy, S-Play helps organisations create a more engaging, resilient, and security-aware workforce.',
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
