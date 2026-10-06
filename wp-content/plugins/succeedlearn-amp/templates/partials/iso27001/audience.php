<?php
/**
 * ISO 27001 AMP — Who should take the training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = succeedlearn_amp_get_iso27001_audience_items();
?>
<section
	class="sl-iso27-audience"
	id="who-should-take-iso-27001-training"
	aria-labelledby="sl-iso27-audience-title"
>
	<div class="sl-wrap">
		<div class="sl-iso27-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who It\'s For', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-iso27-audience-title" class="sl-h2">
				<?php esc_html_e( 'Designed for Employees', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Across the Organisation', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'ISO 27001 awareness should not be positioned as training only for cybersecurity or IT teams. This course is suitable for:', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-iso27-audience__grid">
			<?php foreach ( $audience_items as $item ) : ?>
				<article class="sl-iso27-audience__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
