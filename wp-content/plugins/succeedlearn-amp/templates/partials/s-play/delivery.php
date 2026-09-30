<?php
/**
 * S-Play AMP — Visibility Into Gamified Learning.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$delivery_image = function_exists( 'succeedlearn_amp_get_sp_delivery_image' )
	? succeedlearn_amp_get_sp_delivery_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Visibility-into-Gamified-eLearning.webp';
?>
<section class="sl-s-play-delivery" aria-labelledby="sl-s-play-delivery-title">
	<div class="sl-wrap">
		<div class="sl-s-play-delivery__grid">
			<div class="sl-s-play-delivery__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Campaign Visibility', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-s-play-delivery-title" class="sl-h2">
					<?php esc_html_e( 'Visibility Into', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Gamified Learning', 'succeedlearn-amp' ); ?></span>
				</h2>
				<h3 class="sl-s-play-delivery__subtitle">
					<?php esc_html_e( 'Keep Employee Engagement Measurable', 'succeedlearn-amp' ); ?>
				</h3>
				<div class="sl-s-play-delivery__copy">
					<p><?php esc_html_e( 'Gamified learning should be engaging for employees while still giving administrators visibility into campaign activity.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Play allows organisations to monitor gamified security awareness campaigns and employee participation, helping teams understand how learning activities are progressing across the workforce.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'For organisations using the wider SucceedLEARN Security Behaviour & Culture Suite, S-Play activity can contribute to broader awareness and behavioural visibility through S-Metrics.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'This helps organisations treat gamified learning as part of a measurable security awareness programme rather than an isolated employee activity.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>
			<div class="sl-s-play-delivery__media">
				<div class="sl-s-play-delivery__image">
					<amp-img
						src="<?php echo esc_url( $delivery_image ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Visibility into gamified eLearning', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
