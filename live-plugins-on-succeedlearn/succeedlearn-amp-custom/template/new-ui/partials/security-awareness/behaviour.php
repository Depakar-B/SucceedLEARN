<?php
/**
 * Security Awareness AMP — From Awareness to Behaviour Change.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $behaviour_steps ) || ! is_array( $behaviour_steps ) ) {
	$behaviour_steps = succeedlearn_amp_get_sa_behaviour_steps();
}

if ( empty( $behaviour_steps ) || ! is_array( $behaviour_steps ) ) {
	return;
}

$step_count = count( $behaviour_steps );
?>
<section class="sl-sa-behaviour" id="from-awareness-to-behaviour-change" aria-labelledby="sl-sa-behaviour-title">
	<div class="sl-wrap">
		<div class="sl-sa-behaviour__header">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'CONTINUOUS SECURITY BEHAVIOUR CHANGE', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-sa-behaviour-title">
				<?php esc_html_e( 'Continuous Behaviour Change.', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Simplify administration.', 'succeedlearn-amp' ); ?></span>
				<?php esc_html_e( 'Scale your awareness programme.', 'succeedlearn-amp' ); ?>
			</h2>
			<h3><?php esc_html_e( 'From Awareness to Behaviour Change', 'succeedlearn-amp' ); ?></h3>
			<p><?php esc_html_e( 'A strong security culture is not created through a single intervention. It develops through repeated experiences that help employees learn, practise, recognise, respond and improve. Instead of managing disconnected awareness activities, organisations can build a coordinated programme in which each intervention supports the next.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'The SucceedLEARN Security Behaviour & Culture Suite brings these experiences together into one continuous cycle.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-sa-behaviour__steps">
			<?php foreach ( $behaviour_steps as $index => $step ) : ?>
				<article class="sl-sa-behaviour__card">
					<div class="sl-sa-behaviour__card-top">
						<span class="sl-sa-behaviour__number"><?php echo esc_html( $step['number'] ); ?></span>
						<?php if ( $index < $step_count - 1 ) : ?>
							<span class="sl-sa-behaviour__line" aria-hidden="true"></span>
						<?php endif; ?>
					</div>
					<div class="sl-sa-behaviour__card-body">
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['text'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
