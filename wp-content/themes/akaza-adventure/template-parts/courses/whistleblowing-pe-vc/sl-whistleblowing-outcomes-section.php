<?php
/**
 * Whistleblowing Training — Learning Outcomes.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$outcomes = array(
	array(
		'title' => __( 'Recognise concerns', 'akaza-adventure' ),
		'text'  => __( 'Understand the types of wrongdoing that may need to be raised.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Understand key protections', 'akaza-adventure' ),
		'text'  => __( 'Build awareness of the legal and regulatory context introduced in the course.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Know how to speak up', 'akaza-adventure' ),
		'text'  => __( 'Understand the importance of using appropriate reporting routes and following internal policy.', 'akaza-adventure' ),
	),
);
?>

<section
	id="learning-outcomes"
	class="sl-whistleblowing-outcomes-section"
	aria-labelledby="sl-whistleblowing-outcomes-title"
>
	<div class="container">

		<div class="sl-whistleblowing-outcomes-section__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-whistleblowing-outcomes-title">
				<?php esc_html_e( 'What Will Employees Learn from Whistleblowing', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Training?', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-whistleblowing-outcomes-section__grid">
			<?php foreach ( $outcomes as $outcome ) : ?>
				<article class="sl-whistleblowing-outcomes-section__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $outcome['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $outcome['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>