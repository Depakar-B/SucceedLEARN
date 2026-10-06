<?php
/**
 * S-Phish AMP: Flexible Campaign Targeting.
 *
 * Expected vars: $images, $campaign_types
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="target-right-employees" class="sl-section sl-section--alt sl-s-phish-targeting" aria-labelledby="sl-s-phish-targeting-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Flexible Campaign Targeting', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-s-phish-targeting-title" class="sl-h2">
			<?php esc_html_e( 'Target the Right Employees with the', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'Right Simulation', 'succeedlearn-amp' ); ?></span>
		</h2>

		<div class="sl-s-phish-media">
			<div class="sl-s-phish-image sl-s-phish-image--square">
				<amp-img
					src="<?php echo esc_url( $images['targeting'] ); ?>"
					width="1254"
					height="1254"
					layout="responsive"
					alt="<?php esc_attr_e( 'Target the right employees with the right phishing simulation', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-s-phish-copy">
			<p><?php esc_html_e( 'Not every employee encounters cyber risk in exactly the same way.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'S-Phish gives administrators flexibility to conduct broader organisation-wide campaigns as well as more focused simulations for selected employee groups.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Campaigns can therefore be structured around different organisational populations and awareness objectives rather than relying exclusively on identical simulations for the entire workforce.', 'succeedlearn-amp' ); ?></p>
		</div>

		<ul class="sl-list sl-list--2up sl-s-phish-list" role="list">
			<?php foreach ( $campaign_types as $campaign_type ) : ?>
				<li class="sl-list-item">
					<span class="sl-s-phish-check" aria-hidden="true">✓</span>
					<span class="sl-list-item__text"><?php echo esc_html( $campaign_type ); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
