<?php
/**
 * Modern Slavery Awareness — Learning outcomes.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$outcomes = array(
	array(
		'label' => 'DEFINE',
		'title' => __( 'Understand modern slavery', 'akaza-adventure' ),
		'text'  => __( 'Recognise what modern slavery means and the different forms it can take.', 'akaza-adventure' ),
	),
	array(
		'label' => 'RECOGNISE',
		'title' => __( 'Identify warning signs', 'akaza-adventure' ),
		'text'  => __( 'Recognise behaviours and circumstances that may indicate exploitation or control.', 'akaza-adventure' ),
	),
	array(
		'label' => 'REPORT',
		'title' => __( 'Report appropriately', 'akaza-adventure' ),
		'text'  => __( 'Know how to record relevant facts and report concerns through the right channels.', 'akaza-adventure' ),
	),
	array(
		'label' => 'PROCUREMENT',
		'title' => __( 'Reduce supply-chain risk', 'akaza-adventure' ),
		'text'  => __( 'Relevant learners explore supplier due diligence and practical vendor-selection considerations.', 'akaza-adventure' ),
	),
);
?>

<section id="outcomes" class="msa-section msa-section--white" aria-labelledby="msa-outcomes-title">
	<div class="msa-container">

		<div class="msa-section-intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?></span>
			<h2 id="msa-outcomes-title">
				<?php esc_html_e( 'Modern Slavery Awareness Course:', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'What Will Learners Be Able to Do?', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'The course focuses on practical awareness and appropriate workplace behaviour.', 'akaza-adventure' ); ?></p>
		</div>

		<div class="msa-outcomes">
			<?php foreach ( $outcomes as $index => $outcome ) : ?>
				<article class="msa-outcomes__step">
					<span class="msa-outcomes__number">
						<?php echo esc_html( sprintf( '%02d / %s', $index + 1, $outcome['label'] ) ); ?>
					</span>
					<h3><?php echo esc_html( $outcome['title'] ); ?></h3>
					<p><?php echo esc_html( $outcome['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
