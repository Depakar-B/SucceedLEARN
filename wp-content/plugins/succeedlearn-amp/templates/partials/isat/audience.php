<?php
/**
 * ISAT AMP — Who should take the training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = succeedlearn_amp_get_isat_audience_items();
?>
<section
	class="sl-isat-audience"
	id="who-should-take-information-security-awareness-training"
	aria-labelledby="sl-isat-audience-title"
>
	<div class="sl-wrap">
		<div class="sl-isat-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who It\'s For', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-isat-audience-title" class="sl-h2">
				<?php esc_html_e( 'Built for Employees Across', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'the Organization', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Information security is not only the responsibility of IT or cybersecurity teams.', 'succeedlearn-amp' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The course is designed for employees who interact with organizational systems, information, devices, and digital communication as part of their everyday work.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-isat-audience__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-isat-audience__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
