<?php
/**
 * Financial Crime Prevention — Training at a glance section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_overview = array(
	array(
		'title' => __( 'Learning purpose', 'akaza-adventure' ),
		'text'  => __( 'Help employees recognise risk, apply controls and escalate concerns appropriately.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Learning approach', 'akaza-adventure' ),
		'text'  => __( 'Scenario-based eLearning supported by knowledge checks and assessments.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Risk coverage', 'akaza-adventure' ),
		'text'  => __( 'Six connected areas covering major financial crime and compliance risks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Employee application', 'akaza-adventure' ),
		'text'  => __( 'Role-relevant decisions involving customers, transactions, third parties and information.', 'akaza-adventure' ),
	),
);

$demo_url = '#contact';
?>
<section
	id="training-at-a-glance"
	class="sl-fcp-learning-overview"
	aria-labelledby="sl-fcp-learning-overview-title"
>
	<div class="container">

		<div class="sl-fcp-learning-overview__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning overview', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-learning-overview-title">
				<?php esc_html_e( 'Financial Crime Prevention Training at a Glance', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php esc_html_e( 'This section focuses on the learning experience and purpose. Technical delivery information appears separately below.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-fcp-learning-overview__grid">
			<?php foreach ( $learning_overview as $item ) : ?>
				<article class="sl-fcp-learning-overview__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-fcp-actions">
			<a href="<?php echo esc_url( $demo_url ); ?>" class="sl-content-btn sl-content-btn-primary">
				<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
			</a>
		</div>

	</div>
</section>
