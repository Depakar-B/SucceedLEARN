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

				<p>
					<?php
					esc_html_e(
						'Traditional cybersecurity awareness training often struggles to maintain employee attention, leading to low participation, reduced knowledge retention, and awareness fatigue. Employees may complete mandatory training, but without regular engagement, important security concepts are easily forgotten.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'S-Play transforms cybersecurity awareness into an engaging, game-based learning experience that reinforces secure behaviours through interactive challenges, decision-making activities, and knowledge-based games. Designed for organisations looking to improve employee participation and strengthen security culture, S-Play combines gamified learning with structured campaign management, making it easy to launch, schedule, and monitor awareness games across the organisation.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-hero-actions sl-s-play-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
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
