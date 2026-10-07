<?php
/**
 * S-Bytes AMP — Built for Every Employee.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = succeedlearn_amp_get_sbytes_employees();

if ( empty( $audiences ) ) {
	return;
}
?>
<section id="built-for-every-employee" class="sl-sbytes-employees" aria-labelledby="sl-sbytes-employees-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-employees__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'For Your Workforce', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-sbytes-employees-title" class="sl-h2">
				<?php esc_html_e( 'Built for Every', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Employee', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Cybersecurity affects employees across every role and department.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'S-Bytes is designed to make continuous security learning accessible without requiring employees to become cybersecurity experts.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-sbytes-employees__grid sl-amp-card-grid">
			<?php foreach ( $audiences as $audience ) : ?>
				<article class="sl-sbytes-employees__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
					<p><?php echo esc_html( $audience['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
