<?php
/**
 * PCI DSS — Designed for Practical Everyday Security Awareness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = array(
	array(
		'title' => __( 'Interactive eLearning', 'akaza-adventure' ),
		'text'  => __( 'Structured digital learning designed to make PCI DSS concepts easier for employees to understand.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Role-Relevant Content', 'akaza-adventure' ),
		'text'  => __( 'Different learning experiences based on whether employees require foundational PCI DSS awareness or practical payment-handler training.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Workplace Scenarios', 'akaza-adventure' ),
		'text'  => __( 'Examples and activities help employees connect payment-security principles with workplace situations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Knowledge Checks', 'akaza-adventure' ),
		'text'  => __( 'Interactive questions reinforce understanding throughout the learning experience.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Assessment', 'akaza-adventure' ),
		'text'  => __( 'Assess employee understanding after relevant learning activities.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-pci-structure"
	id="practical-everyday-security-awareness"
	aria-labelledby="sl-pci-structure-title"
>
	<div class="container">

		<div class="sl-pci-structure__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How the Course is Built', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-structure-title">
				<?php esc_html_e( 'Designed Based on Practical, Everyday', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Awareness Situations', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<h3 class="sl-pci-structure__subhead">
			<?php esc_html_e( 'Learning elements', 'akaza-adventure' ); ?>
		</h3>

		<div class="sl-pci-structure__grid">
			<?php foreach ( $learning_elements as $element ) : ?>
				<article class="sl-pci-structure__card">
					<h3><?php echo esc_html( $element['title'] ); ?></h3>
					<p><?php echo esc_html( $element['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-pci-structure__details">

			<div class="sl-pci-structure__detail">
				<h3><?php esc_html_e( 'Format & Accessibility', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Fully responsive interface across desktop, tablet, and mobile — complete with a learner dashboard, progress tracking, automated reminder prompts, and seamless integration with your existing LMS or HR systems.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-pci-structure__detail">
				<h3><?php esc_html_e( 'Certificate', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Upon successful completion, you receive a CPD certificate valid as proof of training.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

		</div>

	</div>
</section>
