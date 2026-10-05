<?php
/**
 * Failure to Prevent Fraud — Learning outcomes.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$outcomes = array(
	array(
		'title' => __( 'Understand the Failure to Prevent Fraud context', 'akaza-adventure' ),
		'text'  => __( 'Understand why the corporate offence matters and how associated-person activity can create organisational exposure.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognise relevant fraud risks', 'akaza-adventure' ),
		'text'  => __( 'Identify behaviours including false representation, failure to disclose information and false accounting.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Identify warning signs', 'akaza-adventure' ),
		'text'  => __( 'Notice inconsistent information, resistance to questions, unusual behaviour and weak documentation.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Know when to question information', 'akaza-adventure' ),
		'text'  => __( 'Recognise why relying on assumptions or unverified information can create risk.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Escalate concerns appropriately', 'akaza-adventure' ),
		'text'  => __( 'Understand why early reporting is important and the internal channels that may be available.', 'akaza-adventure' ),
	),
);
?>

<section id="outcomes" class="ftpf-section ftpf-section--white ftpf-outcomes" aria-labelledby="ftpf-outcomes-title">
	<div class="ftpf-container ftpf-outcomes__grid">

		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?></span>
			<h2 id="ftpf-outcomes-title">
				<?php esc_html_e( 'Build confidence to', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'recognise and respond', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Learners connect fraud-prevention principles with the information, behaviour and decisions they may encounter at work.', 'akaza-adventure' ); ?></p>
		</div>

		<ul class="ftpf-outcomes__list">
			<?php foreach ( $outcomes as $outcome ) : ?>
				<li>
					<span class="ftpf-outcomes__icon" aria-hidden="true">&#10003;</span>
					<div>
						<strong><?php echo esc_html( $outcome['title'] ); ?></strong>
						<p><?php echo esc_html( $outcome['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
