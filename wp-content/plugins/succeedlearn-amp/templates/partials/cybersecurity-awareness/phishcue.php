<?php
/**
 * Cybersecurity Awareness AMP — Phishcue section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phishcue_image = succeedlearn_amp_get_csa_phishcue_image();
$features       = array(
	'Simple Outlook reporting workflow',
	'Central collection of reported emails',
	'Header, link and attachment analysis',
	'Message classification and tracking',
	'Automated employee confirmation',
	'Security-team review dashboard',
);
?>
<section class="sl-section sl-csa-phishcue" id="phishcue" aria-labelledby="sl-csa-phishcue-title">
	<div class="sl-wrap sl-csa-two-col">
		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'PhishCue (Available only for Microsoft Office Customers) ', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-csa-phishcue-title" class="sl-h2">
				<?php echo wp_kses_post( __( 'When an employee spots a suspicious email, <span>what happens next?</span>', 'succeedlearn-amp' ) ); ?>
			</h2>
			<p class="sl-lead">
				<?php esc_html_e( 'PhishCue enables employees to report suspicious emails using Outlook’s default Report button. It automatically routes reported emails, submits relevant reports to Microsoft, provides detailed analysis for the IT team, and converts confirmed phishing emails into simulation templates for future employee awareness campaigns.', 'succeedlearn-amp' ); ?>
			</p>
			<ul class="sl-csa-checklist">
				<?php foreach ( $features as $feature ) : ?>
					<li>
						<span aria-hidden="true">&#10003;</span>
						<?php echo esc_html( $feature ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<button
				type="button"
				class="sl-btn sl-btn--primary sl-csa-phishcue__cta"
				data-cta="phishcue-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Explore PhishCue in a demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
		<div class="sl-csa-phishcue__visual">
			<div class="sl-csa-phishcue__image">
				<amp-img
					src="<?php echo esc_url( $phishcue_image ); ?>"
					width="1400"
					height="700"
					layout="responsive"
					alt="<?php esc_attr_e( 'PhishCue reporting workflow from suspicious email to resolution', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	</div>
</section>
