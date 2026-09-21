<?php
/**
 * Whistleblowing Training — Course Content.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_content = array(
	array(
		'title' => __( 'Whistleblowing fundamentals', 'akaza-adventure' ),
		'text'  => __( 'What whistleblowing means and why it matters.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'UK and US legal context', 'akaza-adventure' ),
		'text'  => __( 'Key frameworks introduced in the course.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Relevant workplace scenarios', 'akaza-adventure' ),
		'text'  => __( 'Examples involving financial and investment activity.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Concerns vs grievances', 'akaza-adventure' ),
		'text'  => __( 'Clear distinctions between different workplace issues.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Reporting awareness', 'akaza-adventure' ),
		'text'  => __( 'How appropriate reporting routes fit into speaking up.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Scenario-based assessment', 'akaza-adventure' ),
		'text'  => __( 'Test understanding through practical workplace situations.', 'akaza-adventure' ),
	),
);
?>

<section
	id="course-content"
	class="sl-whistleblowing-content"
	aria-labelledby="sl-whistleblowing-content-title"
>
	<div class="container">

		<div class="sl-whistleblowing-content__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course Content', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-whistleblowing-content-title">
				<?php esc_html_e( 'What Is Included in SucceedLEARN Whistleblowing', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Training?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course focuses on the essential knowledge employees need to recognise concerns and respond appropriately.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-whistleblowing-content__grid">
			<?php foreach ( $course_content as $item ) : ?>
				<article class="sl-whistleblowing-content__card">

					<span
						class="sl-whistleblowing-content__check"
						aria-hidden="true"
					>
						✓
					</span>

					<div class="sl-whistleblowing-content__card-body">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $item['text'] ); ?>
						</p>
					</div>

				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>