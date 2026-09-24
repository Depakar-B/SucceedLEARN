<?php
/**
 * UK Cyber Essentials — Designed for everyday situations.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = array(
	array(
		'title' => __( 'Focused Learning Modules', 'akaza-adventure' ),
		'text'  => __( 'Selected modules address employee security behaviours relevant to Cyber Essentials and the organisation’s broader cybersecurity environment.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Scenario-Based Learning', 'akaza-adventure' ),
		'text'  => __( 'Practical workplace situations help employees understand how security risks may appear during everyday use of organisational systems and devices.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Knowledge Checks', 'akaza-adventure' ),
		'text'  => __( 'Interactive questions reinforce important security concepts throughout the learning journey.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Final Assessment', 'akaza-adventure' ),
		'text'  => __( 'A final assessment helps evaluate understanding after completion of the assigned training.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Flexible Online Learning', 'akaza-adventure' ),
		'text'  => __( 'Training can be delivered digitally across supported devices to office-based, remote and hybrid workforces.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-ukce-designed"
	id="practical-everyday-security-awareness"
	aria-labelledby="sl-ukce-designed-title"
>
	<div class="container">

		<div class="sl-ukce-designed__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Experience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-designed-title">
				<?php esc_html_e( 'Designed Based on Practical, Everyday', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Awareness Situations', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<h3 class="sl-ukce-designed__subhead">
			<?php esc_html_e( 'Learning elements', 'akaza-adventure' ); ?>
		</h3>

		<div class="sl-ukce-designed__grid">
			<?php foreach ( $learning_elements as $index => $element ) : ?>
				<article class="sl-ukce-designed__card">
					<div class="sl-ukce-designed__title-row">
						<span class="sl-ukce-designed__number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3><?php echo esc_html( $element['title'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $element['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-ukce-designed__panels">

			<article class="sl-ukce-designed__panel">
				<h3><?php esc_html_e( 'Format & accessibility', 'akaza-adventure' ); ?></h3>
				<p>
					<?php esc_html_e( 'Fully responsive interface across desktop, tablet, and mobile — complete with a learner dashboard, progress tracking, automated reminder prompts, and seamless integration with your existing LMS or HR systems.', 'akaza-adventure' ); ?>
				</p>
			</article>

			<article class="sl-ukce-designed__panel">
				<h3><?php esc_html_e( 'Certificate', 'akaza-adventure' ); ?></h3>
				<p>
					<?php esc_html_e( 'Upon successful completion, you receive a CPD certificate valid as proof of training.', 'akaza-adventure' ); ?>
				</p>
			</article>

		</div>

	</div>
</section>
