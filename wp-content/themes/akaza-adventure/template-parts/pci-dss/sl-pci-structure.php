<?php
/**
 * PCI DSS — Course Structure.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = array(
	__( 'Visually engaging animated explainers', 'akaza-adventure' ),
	__( 'Concise, structured micro-learning modules', 'akaza-adventure' ),
	__( 'Scenario-based interactive decision-making exercises', 'akaza-adventure' ),
	__( 'Compliance-aligned regulatory examples', 'akaza-adventure' ),
	__( 'Integrated knowledge checks and quizzes', 'akaza-adventure' ),
	__( 'Comprehensive final assessment with certification', 'akaza-adventure' ),
);
?>

<section
	class="sl-pci-structure"
	aria-labelledby="sl-pci-structure-title"
>
	<div class="container">

		<div class="sl-pci-structure__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How the Course is Built', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-structure-title">
				<?php esc_html_e( 'Course', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Structure', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-pci-structure__grid">

			<article class="sl-pci-structure__card">
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Learning Elements', 'akaza-adventure' ); ?>
				</h3>
				<ul class="sl-pci-structure__list">
					<?php foreach ( $learning_elements as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>

			<article class="sl-pci-structure__card">
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Format & Accessibility', 'akaza-adventure' ); ?>
				</h3>
				<p>
					<?php
					esc_html_e(
						'Fully responsive interface across desktop, tablet, and mobile — complete with a learner dashboard, progress tracking, automated reminder prompts, and seamless integration with your existing LMS or HR systems.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

			<article class="sl-pci-structure__card">
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Certificate', 'akaza-adventure' ); ?>
				</h3>
				<p>
					<?php
					esc_html_e(
						'Upon successful completion, you receive a CPD certificate valid as proof of training.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

		</div>

	</div>
</section>
