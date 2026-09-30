<?php
/**
 * S-Play AMP — Built for Every Employee.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = function_exists( 'succeedlearn_amp_get_sp_employees' )
	? succeedlearn_amp_get_sp_employees()
	: array();

if ( empty( $audiences ) ) {
	return;
}
?>
<section class="sl-s-play-employees" aria-labelledby="sl-s-play-employees-title">
	<div class="sl-wrap">
		<div class="sl-s-play-employees__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Workforce Coverage', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-play-employees-title" class="sl-h2">
				<?php esc_html_e( 'Built for', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Every Employee', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Cybersecurity affects employees across roles, departments and levels of technical knowledge.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'S-Play provides an approachable way for different employee populations to actively engage with security concepts.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-play-employees__grid sl-amp-card-grid">
			<?php foreach ( $audiences as $audience ) : ?>
				<article class="sl-s-play-employees__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
					<p><?php echo esc_html( $audience['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
