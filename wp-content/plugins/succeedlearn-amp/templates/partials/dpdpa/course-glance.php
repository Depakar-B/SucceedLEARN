<?php
/** DPDPA AMP - Course at a glance. @package SucceedLEARN\AMP */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$items = array(
	array( 'icon' => 'clock', 'label' => __( 'Duration', 'succeedlearn-amp' ), 'value' => __( 'About 25 minutes', 'succeedlearn-amp' ), 'text' => __( 'Self-paced', 'succeedlearn-amp' ) ),
	array( 'icon' => 'users', 'label' => __( 'Audience', 'succeedlearn-amp' ), 'value' => __( 'Every employee', 'succeedlearn-amp' ), 'text' => __( 'All functions, foundational level', 'succeedlearn-amp' ) ),
	array( 'icon' => 'video', 'label' => __( 'Format', 'succeedlearn-amp' ), 'value' => __( 'Animated', 'succeedlearn-amp' ), 'text' => __( 'Real workplace examples', 'succeedlearn-amp' ) ),
	array( 'icon' => 'hand', 'label' => __( 'Interactions', 'succeedlearn-amp' ), 'value' => __( 'Interactive', 'succeedlearn-amp' ), 'text' => __( 'Reveal cards, drag-and-drop, scenarios', 'succeedlearn-amp' ) ),
	array( 'icon' => 'check', 'label' => __( 'Assessment', 'succeedlearn-amp' ), 'value' => __( '80% to pass', 'succeedlearn-amp' ), 'text' => __( 'From a larger question bank', 'succeedlearn-amp' ) ),
	array( 'icon' => 'certificate', 'label' => __( 'Certificate', 'succeedlearn-amp' ), 'value' => __( 'On completion', 'succeedlearn-amp' ), 'text' => __( 'Issued automatically on passing', 'succeedlearn-amp' ) ),
	array( 'icon' => 'cube', 'label' => __( 'Delivery', 'succeedlearn-amp' ), 'value' => __( 'LMS or SCORM', 'succeedlearn-amp' ), 'text' => __( 'Ours or yours', 'succeedlearn-amp' ) ),
	array( 'icon' => 'scale', 'label' => __( 'Built on', 'succeedlearn-amp' ), 'value' => __( 'DPDP Act, 2023', 'succeedlearn-amp' ), 'text' => __( 'With context on the Rules, 2025', 'succeedlearn-amp' ) ),
);
?>
<section class="sl-section sl-dpdpa-course-glance" aria-labelledby="sl-dpdpa-glance-title">
	<div class="sl-wrap">
		<header class="sl-dpdpa-section-head">
			<h2 id="sl-dpdpa-glance-title" class="sl-h2"><?php esc_html_e( 'DPDPA training course ', 'succeedlearn-amp' ); ?><span><?php esc_html_e( 'at a glance', 'succeedlearn-amp' ); ?></span></h2>
		</header>
		<div class="sl-dpdpa-course-glance__grid">
			<?php foreach ( $items as $item ) : ?>
				<article class="sl-dpdpa-course-glance__item">
					<span class="sl-dpdpa-course-glance__icon" aria-hidden="true"><?php succeedlearn_amp_dpdpa_render_icon( $item['icon'] ); ?></span>
					<span><?php echo esc_html( $item['label'] ); ?></span>
					<strong><?php echo esc_html( $item['value'] ); ?></strong>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
