<?php
/**
 * S-Signs AMP — Build Visual Security Awareness Campaigns Throughout the Year.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$campaigns = function_exists( 'succeedlearn_amp_get_ss_campaigns' )
	? succeedlearn_amp_get_ss_campaigns()
	: array();

if ( empty( $campaigns ) ) {
	return;
}
?>
<section class="sl-s-signs-distribution" aria-labelledby="sl-s-signs-distribution-title">
	<div class="sl-wrap">
		<div class="sl-s-signs-distribution__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Year-Round Campaigns', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-signs-distribution-title" class="sl-h2">
				<?php esc_html_e( 'Build Visual Security Awareness Campaigns', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Throughout the Year', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'S-Signs can support both ongoing reinforcement and targeted cybersecurity campaigns.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Organisations can use visual awareness content for:', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-signs-distribution__cards sl-amp-card-grid">
			<?php foreach ( $campaigns as $campaign ) : ?>
				<article class="sl-s-signs-distribution__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $campaign['title'] ); ?></h3>
					<p><?php echo esc_html( $campaign['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
