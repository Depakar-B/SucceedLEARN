<?php
/**
 * Defensive Driving AMP — Learning / behaviour section.
 *
 * Expected vars: $learning_points, $hero_img
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section">
	<div class="sl-wrap sl-dd-split">
		<div class="sl-dd-split__content">
			<div class="sl-dd-section-head">
				<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Learning that changes behaviour', 'succeedlearn-amp' ); ?></span>
				<h2>
					<?php esc_html_e( 'Put learners in the', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'driver’s seat', 'succeedlearn-amp' ); ?></span>
				</h2>
				<p><?php esc_html_e( 'Decision-based activities move employees from passive awareness to active judgement. Learners encounter tailgating, blind spots, mobile distraction, fatigue, weather and low visibility-and choose the safest response.', 'succeedlearn-amp' ); ?></p>
			</div>
			<ul class="sl-dd-points">
				<?php foreach ( $learning_points as $point ) : ?>
					<li><?php echo esc_html( $point ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="sl-dd-split__media">
			<amp-img
				src="<?php echo esc_url( $hero_img ); ?>"
				width="1200"
				height="900"
				layout="responsive"
				alt="<?php esc_attr_e( 'Defensive driving course scenario', 'succeedlearn-amp' ); ?>"
			></amp-img>
		</div>
	</div>
</section>
