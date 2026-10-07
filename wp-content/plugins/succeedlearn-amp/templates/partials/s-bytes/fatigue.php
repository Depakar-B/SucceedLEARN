<?php
/**
 * S-Bytes AMP — Security Awareness Without the Learning Fatigue.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$points        = succeedlearn_amp_get_sbytes_fatigue_points();
$fatigue_image = succeedlearn_amp_get_sbytes_fatigue_image();
?>
<section id="without-learning-fatigue" class="sl-sbytes-fatigue" aria-labelledby="sl-sbytes-fatigue-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-fatigue__layout">
			<div class="sl-sbytes-fatigue__media">
				<div class="sl-sbytes-fatigue__image">
					<amp-img
						src="<?php echo esc_url( $fatigue_image ); ?>"
						width="960"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Security awareness without learning fatigue', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
			<div class="sl-sbytes-fatigue__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Complement Formal Training', 'succeedlearn-amp' ); ?></span>
				<h2 id="sl-sbytes-fatigue-title" class="sl-h2">
					<?php esc_html_e( 'Security Awareness Without the', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Learning Fatigue', 'succeedlearn-amp' ); ?></span>
				</h2>
				<div class="sl-sbytes-fatigue__body">
					<p><?php esc_html_e( "Longer awareness programmes have an important role in building foundational knowledge. But every security message doesn't require another full course. S-Bytes complements formal security awareness training by giving organisations a lighter way to reinforce individual topics throughout the year. A short microlearning intervention can remind employees about a behaviour at exactly the point where reinforcement is useful - without requiring another lengthy learning session.", 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'This makes S-Bytes particularly useful for:', 'succeedlearn-amp' ); ?></p>
				</div>
				<?php if ( ! empty( $points ) ) : ?>
				<ul class="sl-list sl-sbytes-fatigue__list">
					<?php foreach ( $points as $point ) : ?>
						<li class="sl-list-item"><span aria-hidden="true">✓</span> <?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				<p class="sl-sbytes-fatigue__closing"><?php esc_html_e( "The objective isn't to replace foundational awareness training.", 'succeedlearn-amp' ); ?></p>
				<p class="sl-sbytes-tagline"><?php esc_html_e( "It is to make sure employees don't forget it.", 'succeedlearn-amp' ); ?></p>
			</div>
		</div>
	</div>
</section>
