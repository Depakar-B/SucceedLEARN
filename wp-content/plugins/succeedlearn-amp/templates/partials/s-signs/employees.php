<?php
/**
 * S-Signs AMP — Built for Every Employee.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = function_exists( 'succeedlearn_amp_get_ss_employees' )
	? succeedlearn_amp_get_ss_employees()
	: array();

if ( empty( $audiences ) ) {
	return;
}
?>
<section class="sl-s-signs-employees" aria-labelledby="sl-s-signs-employees-title">
	<div class="sl-wrap">
		<div class="sl-s-signs-employees__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Workforce Coverage', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-signs-employees-title" class="sl-h2">
				<?php esc_html_e( 'Built for', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Every Employee', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Cybersecurity awareness needs to remain relevant across the workforce, regardless of role or location.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'S-Signs provides a simple way to keep important security messages visible to different employee populations.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-signs-employees__grid sl-amp-card-grid">
			<?php foreach ( $audiences as $audience ) : ?>
				<article class="sl-s-signs-employees__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
					<p><?php echo esc_html( $audience['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
