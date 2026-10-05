<?php
/**
 * S-Sync AMP — Designed for Enterprise IT & Security Teams.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = function_exists( 'succeedlearn_amp_get_ssync_enterprise_items' )
	? succeedlearn_amp_get_ssync_enterprise_items()
	: array();

if ( empty( $team_groups ) ) {
	return;
}
?>
<section class="sl-s-sync-enterprise" aria-labelledby="sl-s-sync-enterprise-title">
	<div class="sl-wrap">
		<div class="sl-s-sync-enterprise__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Built for Enterprise Teams', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-sync-enterprise-title" class="sl-h2">
				<?php esc_html_e( 'Designed for Enterprise', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'IT & Security Teams', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-s-sync-enterprise__subtitle">
				<?php esc_html_e( 'Built for the Teams Managing Technology, Identity and Security Awareness', 'succeedlearn-amp' ); ?>
			</h3>
		</div>
		<div class="sl-s-sync-enterprise__cards sl-amp-card-grid">
			<?php foreach ( $team_groups as $team_group ) : ?>
				<article class="sl-s-sync-enterprise__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $team_group['title'] ); ?></h3>
					<p><?php echo esc_html( $team_group['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
