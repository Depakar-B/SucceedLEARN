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
		'text'   => __( 'Choose from the available library of interactive security awareness games based on the cybersecurity concepts and behaviours you want to reinforce. Different game formats provide different ways for employees to apply, revisit and test their security knowledge.', 'akaza-adventure' ),
	),
	array(
		'number' => '02',
		'title'  => __( 'Select Users', 'akaza-adventure' ),
		'text'   => __( 'Deploy campaigns across the organisation or target specific departments, locations or custom user groups. This allows organisations to align gamified learning with different workforce populations and awareness initiatives.', 'akaza-adventure' ),
	),
	array(
		'number' => '03',
		'title'  => __( 'Schedule', 'akaza-adventure' ),
		'text'   => __( 'Launch campaigns immediately or schedule them for a future date as part of an ongoing security awareness programme. Administrators can plan awareness activities in advance, ensuring continuous employee engagement without interrupting daily business operations.', 'akaza-adventure' ),
	),
	array(
		'number' => '04',
		'title'  => __( 'Review & Launch', 'akaza-adventure' ),
		'text'   => __( 'Review the selected game, assigned users and campaign configuration before launch. Once confirmed, launch the campaign and monitor employee participation and campaign progress.', 'akaza-adventure' ),
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
				<?php esc_html_e( 'How S-Play Works', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-works-title">
				<?php esc_html_e( 'Launch Gamified Security Awareness', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'in Four Steps', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					"S-Play makes it straightforward to incorporate cybersecurity games for employees into an organisation's wider security awareness programme.",
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
