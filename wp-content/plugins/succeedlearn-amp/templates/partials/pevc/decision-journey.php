<?php
/**
 * PE/VC Suite AMP — Decision journey.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $decision_steps ) || ! is_array( $decision_steps ) ) {
	$decision_steps = succeedlearn_amp_get_pevc_decision_steps();
}
?>
<section class="sl-pevc-decision" aria-labelledby="sl-pevc-decision-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'From awareness to action', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-pevc-decision-title" class="sl-h2">
			<?php esc_html_e( 'Turning PE and VC Compliance Training into Better Decisions', 'succeedlearn-amp' ); ?>
		</h2>

		<p class="sl-pevc-decision__lead">
			<?php
			esc_html_e(
				'Compliance learning becomes more useful when employees can translate knowledge into action in real situations.',
				'succeedlearn-amp'
			);
			?>
		</p>

		<div class="sl-pevc-decision__grid sl-amp-card-grid">
			<?php foreach ( $decision_steps as $step ) : ?>
				<div class="sl-pevc-decision__step">
					<div class="sl-pevc-decision__icon" aria-hidden="true">
						<?php echo esc_html( $step['num'] ); ?>
					</div>
					<h3 class="sl-panel-title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
