<?php
/**
 * Security Awareness AMP — Designed for Security, Compliance and People Leaders.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $leadership_items ) || ! is_array( $leadership_items ) ) {
	$leadership_items = succeedlearn_amp_get_sa_leadership_items();
}

if ( empty( $leadership_items ) || ! is_array( $leadership_items ) ) {
	return;
}
?>
<section
	class="sl-sa-leadership"
	id="security-leadership"
	aria-labelledby="sl-sa-leadership-title"
>
	<div class="sl-wrap">
		<div class="sl-sa-annual-training__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'One Platform. Multiple Stakeholders.', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-sa-leadership-title">
				<?php esc_html_e( 'Designed for', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security, Compliance and People Leaders', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Security awareness involves multiple teams across an organisation. SucceedLEARN brings together the capabilities required by security, compliance, HR, learning, and business leaders within one platform.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-sa-annual-training__grid">
			<?php foreach ( $leadership_items as $item ) : ?>
				<article class="sl-sa-annual-training__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
