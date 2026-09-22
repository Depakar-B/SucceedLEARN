<?php
/**
 * S-Play — Why Gamified Learning Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-play-why"
	aria-labelledby="sl-s-play-why-title"
>
	<div class="container">

		<div class="sl-s-play-why__grid">

			<div class="sl-s-play-why__media">
				<div class="sl-s-play-why__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-s-play-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Engagement That Lasts', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-play-why-title">
					<?php esc_html_e( 'Why Gamified', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Learning Matters', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-play-why__copy">
					<p>
						<?php
						esc_html_e(
							'Creating security awareness is only the beginning; sustaining it is the real challenge. Employees are expected to recognise phishing attempts, protect sensitive information, report suspicious activity, and make secure decisions every day. However, traditional training methods often rely on lengthy modules that can become repetitive and difficult to retain over time.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Gamified learning addresses this challenge by encouraging active participation instead of passive content consumption. Through interactive activities, employees apply their knowledge, receive immediate feedback, and reinforce secure behaviours in an enjoyable and memorable way. This approach not only improves learner engagement but also strengthens knowledge retention, helping organisations build a workforce that is better prepared to identify and respond to everyday cybersecurity risks.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
