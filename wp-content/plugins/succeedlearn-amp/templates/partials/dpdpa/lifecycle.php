<?php
/** DPDPA AMP - Data lifecycle. @package SucceedLEARN\AMP */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$steps = array(
	array( 'icon' => 'collect', 'title' => __( 'Collect', 'succeedlearn-amp' ), 'text' => __( 'Only what the purpose needs', 'succeedlearn-amp' ) ),
	array( 'icon' => 'classify', 'title' => __( 'Classify', 'succeedlearn-amp' ), 'text' => __( 'Recognise it, apply the right care', 'succeedlearn-amp' ) ),
	array( 'icon' => 'store', 'title' => __( 'Store', 'succeedlearn-amp' ), 'text' => __( 'Approved places, protected access', 'succeedlearn-amp' ) ),
	array( 'icon' => 'share', 'title' => __( 'Share', 'succeedlearn-amp' ), 'text' => __( 'Right recipient, right channel', 'succeedlearn-amp' ) ),
	array( 'icon' => 'retain', 'title' => __( 'Retain', 'succeedlearn-amp' ), 'text' => __( 'Only as long as needed', 'succeedlearn-amp' ) ),
	array( 'icon' => 'delete', 'title' => __( 'Delete', 'succeedlearn-amp' ), 'text' => __( 'Dispose of copies safely', 'succeedlearn-amp' ) ),
);
?>
<section class="sl-section sl-section--alt sl-dpdpa-lifecycle" id="lifecycle" aria-labelledby="sl-dpdpa-lifecycle-title">
	<div class="sl-wrap">
		<header class="sl-dpdpa-section-head">
			<h2 id="sl-dpdpa-lifecycle-title" class="sl-h2"><?php esc_html_e( 'DPDP Act training built around the ', 'succeedlearn-amp' ); ?><span><?php esc_html_e( 'full data lifecycle', 'succeedlearn-amp' ); ?></span></h2>
			<p class="sl-lead"><?php esc_html_e( 'Weak handling at any stage creates risk, so the course covers all six.', 'succeedlearn-amp' ); ?></p>
		</header>
		<div class="sl-dpdpa-lifecycle__grid">
			<?php foreach ( $steps as $step ) : ?>
				<article class="sl-dpdpa-lifecycle__step">
					<span class="sl-dpdpa-lifecycle__icon" aria-hidden="true"><?php succeedlearn_amp_dpdpa_render_icon( $step['icon'] ); ?></span>
					<h3 class="sl-panel-title"><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="sl-dpdpa-section-actions">
			<a class="sl-content-btn sl-content-btn-secondary" href="#outline"><?php esc_html_e( 'View the course outline', 'succeedlearn-amp' ); ?></a>
		</div>
	</div>
</section>
