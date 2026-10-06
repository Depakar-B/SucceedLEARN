<?php
/** DPDPA AMP - Outcomes. @package SucceedLEARN\AMP */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = array(
	array(
		'icon'  => 'search',
		'title' => __( 'Spot personal data', 'succeedlearn-amp' ),
		'text'  => __( "From a customer's email to an employee ID linked to a person.", 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'layers',
		'title' => __( 'Handle it safely', 'succeedlearn-amp' ),
		'text'  => __( 'Approved systems and need-to-know access, from collection to deletion.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'inbox',
		'title' => __( 'Route requests right', 'succeedlearn-amp' ),
		'text'  => __( 'Access, correction and erasure requests reach the right team, fast.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'flag',
		'title' => __( 'Report early', 'succeedlearn-amp' ),
		'text'  => __( 'If they suspect a breach, they escalate it instead of waiting.', 'succeedlearn-amp' ),
	),
);
?>
<section class="sl-section sl-dpdpa-outcomes" aria-labelledby="sl-dpdpa-outcomes-title">
	<div class="sl-wrap">
		<header class="sl-dpdpa-section-head">
			<h2 id="sl-dpdpa-outcomes-title" class="sl-h2"><?php esc_html_e( 'What your people do differently after ', 'succeedlearn-amp' ); ?><span><?php esc_html_e( '25 minutes', 'succeedlearn-amp' ); ?></span></h2>
		</header>
		<div class="sl-dpdpa-outcomes__grid sl-amp-card-grid">
			<?php foreach ( $items as $item ) : ?>
				<article class="sl-card sl-dpdpa-card">
					<span class="sl-dpdpa-card__icon" aria-hidden="true"><?php succeedlearn_amp_dpdpa_render_icon( $item['icon'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="sl-dpdpa-section-actions">
			<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'book' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Book a 20-min demo', 'succeedlearn-amp' ); ?></button>
		</div>
	</div>
</section>
