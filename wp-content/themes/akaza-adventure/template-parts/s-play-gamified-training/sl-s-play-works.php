<?php
/**
 * S-Play — How S-Play Works.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array(
		'number' => '01',
		'title'  => __( 'Select S-Play', 'akaza-adventure' ),
		'text'   => __( 'Choose from an expanding library of interactive security awareness games designed to reinforce different cybersecurity concepts. Whether you want to strengthen phishing awareness, improve password security, or reinforce general cyber hygiene, administrators can select the game that best aligns with their learning objectives.', 'akaza-adventure' ),
	),
	array(
		'number' => '02',
		'title'  => __( 'Select Users', 'akaza-adventure' ),
		'text'   => __( 'Assign games across the entire organisation or target specific departments, locations, teams, or custom employee groups. This flexibility enables organisations to tailor learning experiences based on business functions, user roles, or areas requiring additional awareness.', 'akaza-adventure' ),
	),
	array(
		'number' => '03',
		'title'  => __( 'Schedule', 'akaza-adventure' ),
		'text'   => __( 'Launch campaigns immediately or schedule them for a future date as part of an ongoing security awareness programme. Administrators can plan awareness activities in advance, ensuring continuous employee engagement without interrupting daily business operations.', 'akaza-adventure' ),
	),
	array(
		'number' => '04',
		'title'  => __( 'Review & Launch', 'akaza-adventure' ),
		'text'   => __( 'Before publishing, review the selected game, assigned users, and campaign schedule to ensure everything is configured as intended. Once confirmed, launch the campaign with a single click, allowing employees to participate in engaging security awareness games while administrators monitor campaign progress.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-play-works"
	aria-labelledby="sl-s-play-works-title"
>
	<div class="container">

		<div class="sl-s-play-works__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Simple Campaign Setup', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-works-title">
				<?php esc_html_e( 'How', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'S-Play Works', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					"Launching a gamified security awareness campaign with S-Play is simple, structured, and designed to fit seamlessly into your organisation's awareness programme.",
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-play-works__grid">

			<?php foreach ( $steps as $step ) : ?>

				<article class="sl-s-play-works__card">
					<span class="sl-s-play-works__number" aria-hidden="true">
						<?php echo esc_html( $step['number'] ); ?>
					</span>
					<h3 class="sl-panel-title">
						<?php echo esc_html( $step['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $step['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
