<?php
/**
 * S-Phish AMP: Designed for the Teams Driving Security Culture.
 *
 * Expected vars: $teams
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="security-culture-teams" class="sl-section sl-s-phish-teams" aria-labelledby="sl-s-phish-teams-title">
	<div class="sl-wrap">
		<div class="sl-s-phish-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Security Culture & Collaboration', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-s-phish-teams-title" class="sl-h2">
				<?php esc_html_e( 'Designed for the Teams Driving', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'succeedlearn-amp' ); ?></span>
			</h2>

			<div class="sl-s-phish-copy">
				<p><?php esc_html_e( 'Building employee resilience against phishing often requires collaboration between cybersecurity, compliance, learning and people functions.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'S-Phish provides the behavioural visibility and learning interventions these teams need to contribute to a more resilient workforce.', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>

		<div class="sl-s-phish-cards sl-s-phish-cards--grid">
			<?php foreach ( $teams as $team ) : ?>
				<article class="sl-s-phish-card">
					<h3 class="sl-panel-title"><?php echo esc_html( $team['title'] ); ?></h3>
					<p><?php echo esc_html( $team['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
