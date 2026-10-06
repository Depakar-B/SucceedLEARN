<?php
/**
 * SMCR PE/VC AMP: FCA Conduct Rules.
 *
 * Expected vars: $images, $conduct_rule_scenarios
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="conduct-rules" class="sl-section sl-smcr-pe-vc-conduct-rules" aria-labelledby="sl-smcr-pe-vc-conduct-rules-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'FCA Conduct Rules Training', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-conduct-rules-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'How Do FCA Conduct Rules Apply to PE and VC <span>Employees?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['conduct_rules'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'SMCR training for employees', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<p class="sl-aml-lead">
			<?php esc_html_e( 'The course places Conduct Rules in situations relevant to private equity and venture capital, helping learners recognise when individual conduct can affect investors, the firm or regulatory interactions.', 'succeedlearn-amp' ); ?>
		</p>

		<div class="sl-aml-cards">
			<?php foreach ( $conduct_rule_scenarios as $scenario ) : ?>
				<article class="sl-aml-card">
					<h3 class="sl-panel-title"><?php echo esc_html( $scenario['title'] ); ?></h3>
					<p><?php echo esc_html( $scenario['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
