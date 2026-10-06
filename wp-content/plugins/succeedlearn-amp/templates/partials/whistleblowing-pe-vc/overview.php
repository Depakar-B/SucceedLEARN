<?php
/**
 * Whistleblowing PE/VC AMP: What Is Whistleblowing Training?
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="overview" class="sl-section sl-aml-pe-vc-overview" aria-labelledby="sl-whistleblowing-pe-vc-overview-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Whistleblowing Training Explained', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-overview-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Is Whistleblowing Training and Why Does It <span>Matter?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['overview'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Whistleblowing training explained for investment professionals', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p>
				<?php esc_html_e( 'Whistleblowing training helps employees recognise potential wrongdoing, understand when a concern may need to be raised and follow the appropriate process for speaking up.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'In investment environments, concerns can arise around sensitive financial information, transaction activity, market conduct, conflicts of interest and regulatory obligations.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'SucceedLEARN brings these principles into a practical business context so learners can understand what to look for and how to respond appropriately.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
