<?php
/**
 * Anti-Bribery AMP: Decision journey.
 *
 * Expected vars: $images, $journey
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="abac-decision-journey" class="sl-section sl-section--alt sl-aml-pe-vc-journey" aria-labelledby="sl-anti-bribery-journey-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Course Journey', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-journey-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'How does the ABAC course build <span>confident employee decisions?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $journey as $step ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $step['num'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="sl-aml-media sl-aml-after">
			<div class="sl-aml-image sl-aml-image--wide">
				<amp-img
					src="<?php echo esc_url( $images['journey'] ); ?>"
					width="1600"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'ABAC course journey from understanding bribery risks to earning the CPD certificate', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>
	</div>
</section>
