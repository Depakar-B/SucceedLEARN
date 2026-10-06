<?php
/**
 * SMCR PE/VC AMP: Senior Manager Accountability.
 *
 * Expected vars: $accountability_points
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="senior-manager-accountability" class="sl-section sl-smcr-pe-vc-accountability" aria-labelledby="sl-smcr-pe-vc-accountability-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Senior Manager Accountability', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-smcr-pe-vc-accountability-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Are Reasonable Steps Under SMCR for Senior <span>Managers?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'In the supplied Senior Managers course, reasonable steps are explored through practical oversight activities such as delegation, control reviews, escalation and follow-up.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-cards">
			<?php foreach ( $accountability_points as $point ) : ?>
				<article class="sl-aml-card">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $point['num'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $point['title'] ); ?></h3>
					<p><?php echo esc_html( $point['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
