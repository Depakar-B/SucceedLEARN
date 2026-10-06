<?php
/**
 * SMCR PE/VC AMP: Practical Learning.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="practical-learning" class="sl-section sl-section--alt sl-smcr-pe-vc-practical-learning" aria-labelledby="sl-smcr-pe-vc-practical-learning-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Practical Learning', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-practical-learning-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Scenario-Based SMCR Training for Private Equity and Venture Capital <span>Teams</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['practical_learning'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Scenario-based SMCR training for private equity and venture capital teams', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p>
				<?php esc_html_e( 'The supplied courses use realistic decision points rather than relying only on definitions and regulatory terminology.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Learners consider situations involving investments, reporting, due diligence, operations, regulatory interaction and Senior Manager oversight.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-highlight">
			<p>
				<?php esc_html_e( 'Both modules conclude with scenario-based assessments designed to test understanding of the course material.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
