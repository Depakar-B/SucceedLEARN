<?php
/**
 * S-Signs — Designed for the Teams Driving Security Culture.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = array(
	array(
		'title' => __( 'Information Security & Cybersecurity Teams', 'akaza-adventure' ),
		'text'  => __( 'Reinforce priority cyber risks and behaviours through targeted visual campaigns.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Compliance & Risk Teams', 'akaza-adventure' ),
		'text'  => __( 'Support ongoing communication around information security, privacy and relevant organisational responsibilities.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Learning & Development Teams', 'akaza-adventure' ),
		'text'  => __( 'Extend key learning messages beyond formal courses through continuous visual reinforcement.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'HR & People Teams', 'akaza-adventure' ),
		'text'  => __( 'Integrate security reminders into employee communications, onboarding and workplace engagement initiatives.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Leadership', 'akaza-adventure' ),
		'text'  => __( 'Support an environment where cybersecurity remains visible across the organisation throughout the year.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-signs-teams"
	aria-labelledby="sl-s-signs-teams-title"
>
	<div class="container">

		<div class="sl-s-signs-teams__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Culture Across the Organisation', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-teams-title">
				<?php esc_html_e( 'Designed for the Teams Driving', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Signs gives security, compliance and people teams an easy way to maintain awareness between formal learning activities.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-signs-teams__grid">

			<?php foreach ( $team_groups as $team_group ) : ?>

				<article class="sl-s-signs-teams__card">
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
