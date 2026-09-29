<?php
/**
 * S-Play — From Employee Participation to Actionable Insights.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$s_play_delivery_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/09/Visibility-into-Gamified-eLearning.webp' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Visibility-into-Gamified-eLearning.webp';
?>

<section
	class="sl-s-play-delivery"
	aria-labelledby="sl-s-play-delivery-title"
>
	<div class="container">

		<div class="sl-s-play-delivery__grid">

			<div class="sl-s-play-delivery__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Campaign Visibility', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-play-delivery-title">
					<?php esc_html_e( 'From Employee Participation to', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Actionable Insights', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-s-play-delivery__subtitle">
					<?php esc_html_e( 'Keep Employee Engagement Measurable', 'akaza-adventure' ); ?>
				</h3>

				<div class="sl-s-play-delivery__copy">
					<p>
						<?php
						esc_html_e(
							'Gamified learning should be engaging for employees while still giving administrators visibility into campaign activity.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Play allows organisations to monitor gamified security awareness campaigns and employee participation, helping teams understand how learning activities are progressing across the workforce.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'For organisations using the wider SucceedLEARN Security Behaviour & Culture Suite, S-Play activity can contribute to broader awareness and behavioural visibility through S-Metrics.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'This helps organisations treat gamified learning as part of a measurable security awareness programme rather than an isolated employee activity.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

			<div class="sl-s-play-delivery__media">
				<div class="sl-s-play-delivery__image">
					<img
						src="<?php echo esc_url( $s_play_delivery_image ); ?>"
						alt="<?php esc_attr_e( 'Visibility into gamified eLearning', 'akaza-adventure' ); ?>"
						width="720"
						height="720"
						loading="lazy"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>
</section>
