<?php
/**
 * S-Play AMP — Designed for the Teams Driving Security Culture.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = function_exists( 'succeedlearn_amp_get_sp_teams' )
	? succeedlearn_amp_get_sp_teams()
	: array();

if ( empty( $team_groups ) ) {
	return;
}
?>
<section class="sl-s-play-teams" aria-labelledby="sl-s-play-teams-title">
	<div class="sl-wrap">
		<div class="sl-s-play-teams__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Security Culture Across the Organisation', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-play-teams-title" class="sl-h2">
				<?php esc_html_e( 'Designed for the Teams Driving', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'S-Play gives the teams responsible for security awareness another way to keep employees engaged beyond formal training.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-play-teams__grid sl-amp-card-grid">
			<?php foreach ( $team_groups as $index => $team_group ) : ?>
				<article class="sl-s-play-teams__card">
					<div class="sl-s-play-teams__card-title">
						<span class="sl-s-play-teams__number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3 class="sl-panel-title"><?php echo esc_html( $team_group['title'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $team_group['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
