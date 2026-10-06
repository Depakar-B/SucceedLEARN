<?php
/**
 * S-Phish AMP: PhishCue (employee reporting for Microsoft users).
 *
 * Expected vars: $images, $phishcue_features
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="phishcue" class="sl-section sl-s-phish-phishcue" aria-labelledby="sl-s-phish-phishcue-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'PhishCue (Available only for Microsoft Users)', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-s-phish-phishcue-title" class="sl-h2">
			<?php esc_html_e( 'When an Employee Spots a Suspicious Email,', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'What Happens Next?', 'succeedlearn-amp' ); ?></span>
		</h2>

		<h3 class="sl-panel-title">
			<?php esc_html_e( 'From Employee Reporting to Security-Team Action', 'succeedlearn-amp' ); ?>
		</h3>

		<div class="sl-s-phish-media">
			<div class="sl-s-phish-image">
				<div class="sl-img-crop">
					<amp-img
						src="<?php echo esc_url( $images['phishcue'] ); ?>"
						layout="fill"
						object-fit="cover"
						alt="<?php esc_attr_e( 'PhishCue reporting workflow from suspicious email to security-team action', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>

		<div class="sl-s-phish-copy">
			<p><?php esc_html_e( 'PhishCue makes it simple for employees to report suspicious emails directly through Outlook’s default Report button. Once reported, the email enters a centralised workflow where it can be analysed, classified and reviewed by the security team.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Relevant reports can be submitted to Microsoft, while employees receive automated confirmation that their report has been received. Security teams gain the visibility needed to investigate reported messages, review potential threats and track their status from a central dashboard.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'And when a reported email is confirmed as phishing, it can be converted into a simulation template, turning a real-world threat into a practical learning opportunity for future phishing awareness campaigns.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-highlight sl-s-phish-phishcue__response">
			<p><?php esc_html_e( 'One report creates a connected response:', 'succeedlearn-amp' ); ?></p>
			<p class="sl-s-phish-flow"><?php esc_html_e( 'Report → Analyse → Classify → Review → Reinforce', 'succeedlearn-amp' ); ?></p>
		</div>

		<ul class="sl-list sl-s-phish-features" role="list">
			<?php foreach ( $phishcue_features as $feature ) : ?>
				<li class="sl-list-item">
					<span class="sl-list-item__label"><?php echo esc_html( $feature['title'] ); ?></span>
					<span class="sl-list-item__text"><?php echo esc_html( $feature['text'] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
