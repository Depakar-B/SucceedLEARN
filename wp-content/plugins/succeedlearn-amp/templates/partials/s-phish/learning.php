<?php
/**
 * S-Phish AMP: Transform Phishing Failures into Learning Opportunities.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="transform-phishing-failures" class="sl-section sl-s-phish-learning" aria-labelledby="sl-s-phish-learning-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Learning Opportunities', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-s-phish-learning-title" class="sl-h2">
			<?php esc_html_e( 'Transform Phishing Failures into', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'Learning Opportunities', 'succeedlearn-amp' ); ?></span>
		</h2>

		<h3 class="sl-panel-title">
			<?php esc_html_e( 'Test Employees. Then Help Them Improve', 'succeedlearn-amp' ); ?>
		</h3>

		<div class="sl-s-phish-media">
			<div class="sl-s-phish-image sl-s-phish-image--square">
				<amp-img
					src="<?php echo esc_url( $images['learning'] ); ?>"
					width="1250"
					height="1250"
					layout="responsive"
					alt="<?php esc_attr_e( 'S-Phish continuous improvement cycle: Simulate, Identify Risky Behaviour, Reinforce Learning, Improve Behaviour, Test Again', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-s-phish-copy">
			<p>
				<?php esc_html_e( "The purpose of phishing simulation isn't simply to identify mistakes, but to help employees make safer decisions when a genuine threat appears.", 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'S-Phish turns risky interactions into immediate learning opportunities by automatically enrolling employees who interact with simulated phishing emails into targeted remedial training. This allows organisations to address knowledge gaps and reinforce secure behaviours while the simulated experience is still fresh, rather than waiting for the next scheduled awareness course.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Over repeated campaigns, this creates a continuous feedback loop:', 'succeedlearn-amp' ); ?>
			</p>
			<p class="sl-s-phish-flow">
				<?php esc_html_e( 'Simulate → Identify Risky Behaviour → Reinforce Learning → Improve Behaviour → Test Again', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'By connecting phishing simulations with targeted learning, S-Phish transforms campaign results from a measure of failure into an opportunity for continuous, measurable behavioural improvement.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
