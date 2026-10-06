<?php
/**
 * PE/VC Suite AMP — Programme approach.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $programme_steps ) || ! is_array( $programme_steps ) ) {
	$programme_steps = succeedlearn_amp_get_pevc_programme_steps();
}
?>
<section id="programme" class="sl-pevc-programme" aria-labelledby="sl-pevc-programme-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'A role-based approach', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-pevc-programme-title" class="sl-h2">
			<?php esc_html_e( 'Building an Effective PE and VC Compliance Training Programme', 'succeedlearn-amp' ); ?>
		</h2>

		<p class="sl-pevc-programme__lead">
			<?php
			esc_html_e(
				'Start with responsibilities and risk, then map the learning that each learner group needs.',
				'succeedlearn-amp'
			);
			?>
		</p>

		<div class="sl-pevc-programme__grid sl-amp-card-grid">
			<?php foreach ( $programme_steps as $step ) : ?>
				<article class="sl-pevc-programme__card">
					<span class="sl-pevc-programme__num" aria-hidden="true"><?php echo esc_html( $step['num'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
