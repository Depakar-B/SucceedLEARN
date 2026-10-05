<?php
/**
 * Modern Slavery Awareness — Reporting and escalation.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array(
		'title' => __( 'Observe', 'akaza-adventure' ),
		'text'  => __( 'Focus on what you have directly seen or heard.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Note the facts', 'akaza-adventure' ),
		'text'  => __( 'Record relevant information about what happened, who was involved and when or where it was observed, where known.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Report', 'akaza-adventure' ),
		'text'  => __( 'Raise the concern through the appropriate internal channel, such as a line manager, Compliance or Legal.', 'akaza-adventure' ),
	),
);
?>

<section id="reporting" class="msa-section msa-section--white" aria-labelledby="msa-reporting-title">
	<div class="msa-container">

		<div class="msa-section-intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Reporting and Escalation', 'akaza-adventure' ); ?></span>
			<h2 id="msa-reporting-title">
				<?php esc_html_e( 'Modern Slavery Warning Signs and Reporting:', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'A Clear Three-Step Response', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'The course gives learners a simple process for responding when something does not seem right.', 'akaza-adventure' ); ?></p>
		</div>

		<div class="msa-report">
			<?php foreach ( $steps as $index => $step ) : ?>
				<article class="msa-report__step">
					<span class="msa-report__label"><?php echo esc_html( sprintf( 'STEP %02d', $index + 1 ) ); ?></span>
					<h3><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
