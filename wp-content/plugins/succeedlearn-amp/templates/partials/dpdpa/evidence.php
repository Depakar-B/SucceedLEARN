<?php
/**
 * DPDPA AMP - Evidence for auditors and leadership.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array(
	array(
		'icon'  => 'hand',
		'title' => __( 'Interactive assessment', 'succeedlearn-amp' ),
		'text'  => __( 'Drag-and-drop, reveal cards and real scenarios.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'chart',
		'title' => __( 'Completion by department', 'succeedlearn-amp' ),
		'text'  => __( 'Scores and status for every team, at a glance.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'bell',
		'title' => __( 'Reminder emails', 'succeedlearn-amp' ),
		'text'  => __( "Automatic nudges for anyone who hasn't started.", 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'verified',
		'title' => __( 'Verified certificates', 'succeedlearn-amp' ),
		'text'  => __( 'Issued automatically after passing, as a record of course completion.', 'succeedlearn-amp' ),
	),
	array(
		'icon'  => 'box',
		'title' => __( 'Your choice of platform', 'succeedlearn-amp' ),
		'text'  => __( 'Our LMS, or a SCORM file for yours.', 'succeedlearn-amp' ),
	),
);

$evidence_image = array(
	'src'    => 'https://succeedlearn.com/wp-content/uploads/2026/10/admin-dashboard-screenshot.webp',
	'alt'    => __( 'SucceedLEARN LMS report dashboard for DPDPA training', 'succeedlearn-amp' ),
	'width'  => 1168,
	'height' => 688,
);
?>
<section class="sl-section sl-section--alt sl-dpdpa-evidence" aria-labelledby="sl-dpdpa-evidence-title">
	<div class="sl-wrap">
		<header class="sl-dpdpa-section-head">
			<h2 id="sl-dpdpa-evidence-title" class="sl-h2">
				<?php esc_html_e( 'Evidence you can show ', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'auditors and leadership', 'succeedlearn-amp' ); ?></span>
			</h2>
		</header>

		<div class="sl-dpdpa-evidence__grid">
			<?php foreach ( $items as $item ) : ?>
				<article class="sl-dpdpa-evidence__card">
					<span class="sl-dpdpa-evidence__icon" aria-hidden="true"><?php succeedlearn_amp_dpdpa_render_icon( $item['icon'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<figure class="sl-dpdpa-evidence__visual">
			<amp-img
				src="<?php echo esc_url( $evidence_image['src'] ); ?>"
				width="<?php echo esc_attr( (string) $evidence_image['width'] ); ?>"
				height="<?php echo esc_attr( (string) $evidence_image['height'] ); ?>"
				layout="responsive"
				alt="<?php echo esc_attr( $evidence_image['alt'] ); ?>"
			></amp-img>
		</figure>

		<div class="sl-dpdpa-section-actions">
			<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'book' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Book a 20-min demo', 'succeedlearn-amp' ); ?></button>
			<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'book' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Get pricing for your headcount', 'succeedlearn-amp' ); ?></button>
		</div>
	</div>
</section>
