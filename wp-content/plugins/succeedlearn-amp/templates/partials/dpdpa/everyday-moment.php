<?php
/** DPDPA AMP - Everyday data slips. @package SucceedLEARN\AMP */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = array(
	array(
		'icon'  => 'mail',
		'title' => __( 'The wrong recipient', 'succeedlearn-amp' ),
		'text'  => __( 'A customer spreadsheet attached to the wrong email.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'link',
		'title' => __( 'The open file link', 'succeedlearn-amp' ),
		'text'  => __( 'A shared folder anyone with the link can see.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'print',
		'title' => __( 'The forgotten printout', 'succeedlearn-amp' ),
		'text'  => __( 'Employee details left on the office printer.', 'succeedlearn-amp' ),
	),
);
?>
<section class="sl-section sl-section--alt sl-dpdpa-everyday" aria-labelledby="sl-dpdpa-everyday-title">
	<div class="sl-wrap">
		<header class="sl-dpdpa-section-head">
			<h2 id="sl-dpdpa-everyday-title" class="sl-h2"><?php esc_html_e( 'Most data slips happen on an ', 'succeedlearn-amp' ); ?><span><?php esc_html_e( 'ordinary workday', 'succeedlearn-amp' ); ?></span></h2>
			<p class="sl-lead"><?php esc_html_e( 'They usually start with a busy person moving fast. The course trains the pause that catches them.', 'succeedlearn-amp' ); ?></p>
		</header>
		<div class="sl-dpdpa-card-grid sl-amp-card-grid">
			<?php foreach ( $items as $item ) : ?>
				<article class="sl-card sl-dpdpa-card">
					<span class="sl-dpdpa-card__icon" aria-hidden="true"><?php succeedlearn_amp_dpdpa_render_icon( $item['icon'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="sl-highlight sl-dpdpa-everyday__callout">
			<p><?php esc_html_e( 'We make sure your people spot these moments before they become incidents.', 'succeedlearn-amp' ); ?></p>
			<button type="button" class="sl-dpdpa-text-btn" <?php echo succeedlearn_amp_scroll_tap_attr( 'book' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'See the scenario they practise', 'succeedlearn-amp' ); ?> <span aria-hidden="true">→</span></button>
		</div>
	</div>
</section>
