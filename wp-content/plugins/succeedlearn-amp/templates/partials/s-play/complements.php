<?php
/**
 * S-Play AMP — The Gamified Learning Layer.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$complements_image = function_exists( 'succeedlearn_amp_get_sp_complements_image' )
	? succeedlearn_amp_get_sp_complements_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Why-Gamified-Security-Awareness-Matters.webp';
?>
<section class="sl-s-play-complements" aria-labelledby="sl-s-play-complements-title">
	<div class="sl-wrap">
		<div class="sl-s-play-complements__grid">
			<div class="sl-s-play-complements__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Meet S-Play', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-s-play-complements-title" class="sl-h2">
					<?php esc_html_e( 'The Gamified Learning Layer of', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'SucceedLEARN SBCS', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-s-play-complements__copy">
					<p><?php esc_html_e( 'S-Play brings gamification into cybersecurity awareness training, giving organisations another way to reinforce important security concepts throughout the employee learning journey.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Through interactive security games and challenges, employees can revisit cybersecurity concepts in a format that encourages active participation rather than passive content consumption.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'S-Play can be used alongside foundational security awareness training, phishing simulations, microlearning and other awareness activities to introduce additional engagement and reinforcement throughout the year.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( "For administrators, campaigns can be targeted to relevant employee groups, scheduled according to the organisation's awareness calendar and monitored after launch.", 'succeedlearn-amp' ); ?></p>
					<p><strong><?php esc_html_e( 'Learn the concept. Play the challenge. Reinforce the behaviour.', 'succeedlearn-amp' ); ?></strong></p>
				</div>
			</div>
			<div class="sl-s-play-complements__media">
				<div class="sl-s-play-complements__image">
					<amp-img
						src="<?php echo esc_url( $complements_image ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'The gamified learning layer of SucceedLEARN SBCS', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
