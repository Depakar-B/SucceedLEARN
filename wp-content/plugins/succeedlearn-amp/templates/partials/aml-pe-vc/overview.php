<?php
/**
 * AML PE/VC AMP: What Is Anti-Money Laundering?
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="overview" class="sl-section sl-aml-pe-vc-overview" aria-labelledby="sl-aml-pe-vc-overview-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Definition of AML', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-aml-pe-vc-overview-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Is <span>Anti-Money Laundering?</span>', 'succeedlearn-amp' ),
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
					alt="<?php esc_attr_e( 'AML Course Introduction Visual', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p>
				<?php esc_html_e( 'Money laundering is the process of disguising the criminal origin of illicit funds so that they appear to come from legitimate sources.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'For investment professionals, AML awareness matters because high-value transactions, cross-border capital, complex ownership structures and offshore fund flows can create financial crime exposure.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-highlight">
			<p>
				<strong><?php esc_html_e( 'In this course', 'succeedlearn-amp' ); ?></strong>
			</p>
			<p>
				<?php esc_html_e( 'Learners connect core AML principles with practical situations involving investors, beneficial ownership, source of funds, due diligence and suspicious activity.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
