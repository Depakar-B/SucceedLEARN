<?php
/**
 * Security Awareness AMP — Training program for every employee.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $audience_items ) || ! is_array( $audience_items ) ) {
	$audience_items = succeedlearn_amp_get_sa_audience_items();
}

if ( empty( $audience_items ) || ! is_array( $audience_items ) ) {
	return;
}
?>
<section
	class="sl-sa-annual-training"
	id="why-annual-training-isnt-enough"
	aria-labelledby="sl-sa-annual-training-title"
>
	<div class="sl-wrap">
		<div class="sl-sa-annual-training__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'One Security Culture. Across the Organisation.', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-sa-annual-training-title">
				<?php esc_html_e( 'Security Awareness Training Program Built for', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Every Employee', 'succeedlearn-amp' ); ?></span>
			</h2>

			<h3 id="sl-sa-annual-training-subtitle">
				<?php esc_html_e( "Cybersecurity is everyone's responsibility, but not every employee faces the same risks.", 'succeedlearn-amp' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'The SucceedLEARN Security Behaviour & Culture Suite enables organisations to build awareness across the workforce through continuous learning, practical simulations and regular reinforcement. From a new employee, learning the fundamentals to teams facing more frequent or complex cyber threats, security awareness can become part of how employees think and act every day.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-sa-annual-training__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-sa-annual-training__card">
					<div class="sl-sa-annual-training__title-row">
						<span class="sl-sa-annual-training__number"><?php echo esc_html( $item['number'] ); ?></span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
