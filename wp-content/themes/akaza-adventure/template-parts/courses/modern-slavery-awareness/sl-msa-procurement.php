<?php
/**
 * Modern Slavery Awareness — Optional procurement pathway.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pointers = array(
	array(
		'title' => __( 'Check supplier due diligence', 'akaza-adventure' ),
		'text'  => __( 'Follow relevant screening and review processes before onboarding and throughout supplier relationships.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Review supplier policies and controls', 'akaza-adventure' ),
		'text'  => __( 'Look for standards relating to labour practices, worker protections and responsible sourcing.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Assess transparency', 'akaza-adventure' ),
		'text'  => __( 'Consider whether a supplier can clearly explain how labour is sourced, managed and monitored.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Watch for commercial red flags', 'akaza-adventure' ),
		'text'  => __( 'Unusually low pricing, vague workforce arrangements or inconsistent information may justify further review.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Understand subcontracting and keep records', 'akaza-adventure' ),
		'text'  => __( 'Consider visibility and oversight, and document relevant decisions, checks and risk considerations.', 'akaza-adventure' ),
	),
);
?>

<section id="procurement" class="msa-section msa-section--grey" aria-labelledby="msa-procurement-title">
	<div class="msa-container msa-procurement">

		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Optional Procurement Pathway', 'akaza-adventure' ); ?></span>
			<h2 id="msa-procurement-title">
				<?php esc_html_e( 'Procurement and Supply-Chain Modern Slavery Training', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'for UK Organisations', 'akaza-adventure' ); ?></span>
			</h2>
			<p>
				<?php esc_html_e( 'Learners involved in procurement or vendor selection receive additional content on reducing modern slavery risk across supplier relationships.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="msa-procurement__pointers">
			<?php foreach ( $pointers as $pointer ) : ?>
				<div class="msa-procurement__pointer">
					<span class="msa-arrow-circle" aria-hidden="true">→</span>
					<div>
						<strong><?php echo esc_html( $pointer['title'] ); ?></strong>
						<p><?php echo esc_html( $pointer['text'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
