<?php
/**
 * S-Play AMP — Security Awareness Games That Put Knowledge Into Practice.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$games = function_exists( 'succeedlearn_amp_get_sp_games' )
	? succeedlearn_amp_get_sp_games()
	: array();

if ( empty( $games ) ) {
	return;
}
?>
<section class="sl-s-play-games" aria-labelledby="sl-s-play-games-title">
	<div class="sl-wrap">
		<div class="sl-s-play-games__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Play games', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-play-games-title" class="sl-h2">
				<?php esc_html_e( 'Security Awareness Games That Put', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Knowledge Into Practice', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-s-play-games__subtitle">
				<?php esc_html_e( 'Different Ways to Play. One Goal: Reinforce Security Awareness.', 'succeedlearn-amp' ); ?>
			</h3>
			<p><?php esc_html_e( 'S-Play includes a growing collection of cybersecurity awareness games designed to reinforce security knowledge through different forms of interaction.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-play-games__grid sl-amp-card-grid">
			<?php foreach ( $games as $game ) : ?>
				<article class="sl-s-play-games__card">
					<div class="sl-s-play-games__media">
						<amp-img
							src="<?php echo esc_url( succeedlearn_amp_upload_url( $game['image'] ) ); ?>"
							width="800"
							height="500"
							layout="responsive"
							alt="<?php echo esc_attr( $game['title'] ); ?>"
						></amp-img>
					</div>
					<div class="sl-s-play-games__body">
						<h3 class="sl-panel-title"><?php echo esc_html( $game['title'] ); ?></h3>
						<p class="sl-s-play-games__tagline"><?php echo esc_html( $game['tagline'] ); ?></p>
						<div class="sl-s-play-games__copy">
							<?php foreach ( $game['paragraphs'] as $paragraph ) : ?>
								<p><?php echo esc_html( $paragraph ); ?></p>
							<?php endforeach; ?>
						</div>
						<p class="sl-s-play-games__meta">
							<strong><?php esc_html_e( 'Learning Style:', 'succeedlearn-amp' ); ?></strong>
							<?php echo esc_html( $game['learning_style'] ); ?>
						</p>
						<p class="sl-s-play-games__meta">
							<strong><?php esc_html_e( 'Focus:', 'succeedlearn-amp' ); ?></strong>
							<?php echo esc_html( $game['focus'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
