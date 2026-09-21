<?php
/**
 * Defensive Driving AMP — Risk overview section.
 *
 * Expected vars: $risk_cards
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section">
	<div class="sl-wrap">
		<div class="sl-dd-risk-intro">
			<span class="sl-dd-risk-intro__eyebrow"><?php esc_html_e( 'Safety Beyond the Workplace Gate', 'succeedlearn-amp' ); ?></span>
			<h2>
				<?php esc_html_e( 'Driving for work is work.', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Manage the risk.', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Employees drive to meet customers, make deliveries, travel between sites and complete everyday business tasks. Each journey can expose the employee, the public and the organisation to risk. Defensive driving training goes beyond traffic rules. It builds a proactive mindset: observe earlier, anticipate mistakes, preserve time and space, and choose the safest response.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-dd-risk-grid">
			<?php foreach ( $risk_cards as $card ) : ?>
				<article class="sl-dd-risk-card">
					<div class="sl-dd-risk-card__icon" aria-hidden="true"><?php echo esc_html( $card['icon'] ); ?></div>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
