<?php
/**
 * Modern Slavery Awareness — Why it matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pointers = array(
	array(
		'title' => __( 'Understand modern slavery', 'akaza-adventure' ),
		'text'  => __( 'Learn how exploitation can involve coercion, threats, deception, abuse of power or other forms of control.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognise possible warning signs', 'akaza-adventure' ),
		'text'  => __( 'Identify behaviours or circumstances that may indicate a person is being controlled or exploited.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Respond appropriately', 'akaza-adventure' ),
		'text'  => __( 'Know what information to note and where to report a concern internally.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Consider supply-chain risk', 'akaza-adventure' ),
		'text'  => __( 'Relevant procurement learners receive additional guidance on suppliers, due diligence and vendor risk.', 'akaza-adventure' ),
	),
);
?>

<section id="explore" class="msa-section msa-section--white" aria-labelledby="msa-why-title">
	<div class="msa-container msa-answer-grid">

		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Why This Matters', 'akaza-adventure' ); ?></span>
			<h2 id="msa-why-title">
				<?php esc_html_e( 'Why Modern Slavery Awareness Training Matters', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'for UK Workplaces', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Modern slavery can exist in different environments and may not always be immediately obvious.', 'akaza-adventure' ); ?></p>
		</div>

		<div class="msa-timeline">
			<?php foreach ( $pointers as $index => $pointer ) : ?>
				<div class="msa-timeline__item">
					<span class="msa-timeline__marker"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<div class="msa-timeline__copy">
						<strong><?php echo esc_html( $pointer['title'] ); ?></strong>
						<p><?php echo esc_html( $pointer['text'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
