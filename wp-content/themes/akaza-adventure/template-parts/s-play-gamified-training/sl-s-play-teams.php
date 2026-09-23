<?php
/**
 * S-Play — Designed for the Teams Driving Security Culture.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = array(
	array(
		'title' => __( 'Information Security & Cybersecurity Teams', 'akaza-adventure' ),
		'text'  => __( 'Reinforce important cyber risks through interactive campaigns and practical security challenges.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Compliance & Risk Teams', 'akaza-adventure' ),
		'text'  => __( 'Complement existing security and compliance awareness initiatives with ongoing employee engagement.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Learning & Development Teams', 'akaza-adventure' ),
		'text'  => __( 'Introduce gamification into the learning experience and diversify how cybersecurity concepts are reinforced.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'HR & People Teams', 'akaza-adventure' ),
		'text'  => __( 'Incorporate engaging security-awareness activities into broader employee learning and communication initiatives.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Leadership', 'akaza-adventure' ),
		'text'  => __( 'Support an organisational culture where cybersecurity remains visible, participative and relevant throughout the year.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-play-teams"
	aria-labelledby="sl-s-play-teams-title"
>
	<div class="container">

		<div class="sl-s-play-teams__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Culture Across the Organisation', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-teams-title">
				<?php esc_html_e( 'Designed for the Teams Driving', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Play gives the teams responsible for security awareness another way to keep employees engaged beyond formal training.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-play-teams__grid">

			<?php foreach ( $team_groups as $team_group ) : ?>

				<article class="sl-s-play-teams__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $team_group['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $team_group['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
