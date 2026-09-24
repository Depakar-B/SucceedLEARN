<?php
/**
 * S-Metrics — Designed for the Teams Driving Security Culture.
 *
 * Layout matches S-Aware security-teams (2-up, numbered cards, last centered).
 * Content and typography unchanged.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = array(
	array(
		'title' => __( 'Information Security & Cybersecurity Teams', 'akaza-adventure' ),
		'text'  => __( 'Monitor employee awareness, phishing behaviour and campaign performance while identifying areas requiring additional reinforcement.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Compliance & Risk Teams', 'akaza-adventure' ),
		'text'  => __( 'Maintain visibility into training records, campaign history and awareness activity that may support governance and audit requirements.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Learning & Development Teams', 'akaza-adventure' ),
		'text'  => __( 'Track participation, completion and assessment performance across security learning initiatives.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'HR & People Teams', 'akaza-adventure' ),
		'text'  => __( 'Monitor assigned awareness activity across employee populations and support follow-up where required.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Leadership', 'akaza-adventure' ),
		'text'  => __( 'Access clearer programme-level reporting that helps communicate security awareness activity and progress across the organisation.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-metrics-features"
	aria-labelledby="sl-s-metrics-features-title"
>
	<div class="container">

		<div class="sl-s-metrics-features__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Culture Across the Organisation', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-metrics-features-title">
				<?php esc_html_e( 'Designed for the Teams Driving', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'akaza-adventure' ); ?></span>
			</h2>

			<p class="sl-s-metrics-features__lead">
				<?php
				esc_html_e(
					'S-Metrics gives different organisational teams a shared view of security-awareness activity and programme performance.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-metrics-features__grid">

			<?php foreach ( $team_groups as $index => $team_group ) : ?>

				<article class="sl-s-metrics-features__card">

					<div class="sl-s-metrics-features__card-title">
						<span class="sl-s-metrics-features__number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3 class="sl-panel-title">
							<?php echo esc_html( $team_group['title'] ); ?>
						</h3>
					</div>

					<p>
						<?php echo esc_html( $team_group['text'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
