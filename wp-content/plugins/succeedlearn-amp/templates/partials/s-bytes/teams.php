<?php
/**
 * S-Bytes AMP — Designed for the Teams Driving Security Culture.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = succeedlearn_amp_get_sbytes_teams();

if ( empty( $team_groups ) ) {
	return;
}
?>
<section id="teams-driving-security-culture" class="sl-sbytes-teams" aria-labelledby="sl-sbytes-teams-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-teams__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'For Security Culture Teams', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-sbytes-teams-title" class="sl-h2">
				<?php esc_html_e( 'Designed for the Teams Driving', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Building a strong security culture requires more than sending employees another annual course.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'S-Bytes gives the teams responsible for security awareness a practical way to maintain engagement and reinforce key messages throughout the year.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-sbytes-teams__grid sl-amp-card-grid">
			<?php foreach ( $team_groups as $team_group ) : ?>
				<article class="sl-sbytes-teams__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $team_group['title'] ); ?></h3>
					<p><?php echo esc_html( $team_group['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
