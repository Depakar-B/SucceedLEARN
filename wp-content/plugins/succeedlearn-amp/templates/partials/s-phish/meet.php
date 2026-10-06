<?php
/**
 * S-Phish AMP: Meet S-Phish (intro video).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="meet-s-phish" class="sl-section sl-section--alt sl-s-phish-meet" aria-labelledby="sl-s-phish-meet-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Meet S-Phish', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-s-phish-meet-title" class="sl-h2">
			<?php esc_html_e( 'Meet S-Phish:', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( "SucceedLEARN's Phishing Simulation Tool", 'succeedlearn-amp' ); ?></span>
		</h2>

		<h3 class="sl-panel-title">
			<?php esc_html_e( 'Turn Phishing Awareness into Practical Readiness', 'succeedlearn-amp' ); ?>
		</h3>

		<div class="sl-s-phish-media">
			<div class="sl-s-phish-meet__video">
				<amp-youtube
					data-videoid="lTYBm9qCN-k"
					layout="responsive"
					width="16"
					height="9"
					data-param-rel="0"
					data-param-modestbranding="1"
					data-param-playsinline="1"
					title="<?php esc_attr_e( "Meet S-Phish: SucceedLEARN's Phishing Simulation Tool", 'succeedlearn-amp' ); ?>"
				></amp-youtube>
			</div>
		</div>

		<div class="sl-s-phish-copy">
			<p>
				<?php esc_html_e( 'S-Phish is a comprehensive phishing simulation platform designed to help organisations assess, strengthen and continuously monitor employee resilience against phishing and social engineering threats.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Administrators can create and manage realistic phishing campaigns, select relevant attack scenarios, target different employee populations, control campaign schedules and analyse employee responses through detailed reporting.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( "But S-Phish isn't designed simply to identify who clicked.", 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'When risky behaviour occurs, simulation outcomes can become learning opportunities. Targeted remedial awareness training helps employees understand what they missed and reinforces safer responses while the experience is still relevant.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<p class="sl-s-phish-meet__closing">
			<?php esc_html_e( 'Rather than treating phishing simulation as a one-off test, organisations can use S-Phish as part of an ongoing programme for understanding and strengthening human cyber resilience.', 'succeedlearn-amp' ); ?>
		</p>
	</div>
</section>
