<?php
/**
 * Political Donations Training — Inside the Course.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_topics = array(
	array(
		'title'       => __( 'Political Contributions and Regulatory Scrutiny', 'akaza-adventure' ),
		'description' => __( 'Regulatory scrutiny and political contribution risk', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'What Constitutes a Political Donation?', 'akaza-adventure' ),
		'description' => __( 'Monetary and in-kind political support', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Internal Approval and Pre-Clearance', 'akaza-adventure' ),
		'description' => __( 'Internal approval and compliance pre-clearance', 'akaza-adventure' ),
	),
);
?>

<section
	id="course-inside"
	class="sl-political-donations-inside"
	aria-labelledby="sl-political-donations-inside-title"
>
	<div class="container">

		<div class="sl-political-donations-inside__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Inside the course', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-political-donations-inside-title">
				<?php esc_html_e( 'Explore Scenario-Based Compliance E-Learning for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Investment Professionals', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Visual explanations and practical scenarios help learners understand how political activity can become a compliance issue.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-political-donations-inside__grid">

			<?php foreach ( $course_topics as $topic ) : ?>

				<article class="sl-political-donations-inside__card">

					<div class="sl-political-donations-inside__image">
						<div class="sl-political-donations-inside__image-placeholder">
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</div>
					</div>

					<div class="sl-political-donations-inside__content">

						<h3 class="sl-panel-title">
							<?php echo esc_html( $topic['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $topic['description'] ); ?>
						</p>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>