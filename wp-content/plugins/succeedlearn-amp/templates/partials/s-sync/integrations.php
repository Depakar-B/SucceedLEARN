<?php
/**
 * S-Sync AMP — Enterprise Integration capabilities.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$integrations = function_exists( 'succeedlearn_amp_get_ssync_integrations' )
	? succeedlearn_amp_get_ssync_integrations()
	: array();

if ( empty( $integrations ) ) {
	return;
}
?>
<section class="sl-s-sync-integrations" aria-labelledby="sl-s-sync-integrations-title">
	<div class="sl-wrap">
		<div class="sl-s-sync-integrations__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Enterprise Integrations', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-sync-integrations-title" class="sl-h2">
				<?php esc_html_e( 'Enterprise Integration', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'capabilities', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-s-sync-integrations__subtitle">
				<?php esc_html_e( 'Connect Security Awareness With Your Existing Technology Environment', 'succeedlearn-amp' ); ?>
			</h3>
			<p><?php esc_html_e( 'S-Sync is designed to fit naturally within your existing IT environment, helping organisations automate user management and streamline security awareness deployment.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-sync-integrations__grid sl-amp-card-grid">
			<?php foreach ( $integrations as $item ) : ?>
				<article class="sl-s-sync-integrations__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
