<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Course Content.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_content = array(
	array(
		'number'      => '01',
		'title'       => __( 'Tax Evasion Risk Assessment', 'akaza-adventure' ),
		'description' => __( 'Explore internal and external risk factors, map business processes and consider likelihood and impact when prioritising potential exposure.', 'akaza-adventure' ),
		'image'       => __( 'Risk Matrix', 'akaza-adventure' ),
	),
	array(
		'number'      => '02',
		'title'       => __( 'Due Diligence and Tax Evasion Risk', 'akaza-adventure' ),
		'description' => __( 'Understand how business relationships, transaction complexity and identified risks can influence scrutiny and review.', 'akaza-adventure' ),
		'image'       => __( 'Due Diligence Visual', 'akaza-adventure' ),
	),
	array(
		'number'      => '03',
		'title'       => __( 'Anti-Tax Evasion Policy and Process Design', 'akaza-adventure' ),
		'description' => __( 'Consider responsibilities, policy scope, checkpoints, reporting mechanisms, audit processes and the response to policy breaches.', 'akaza-adventure' ),
		'image'       => __( 'Policy / Process Workflow', 'akaza-adventure' ),
	),
	array(
		'number'      => '04',
		'title'       => __( 'Tax Evasion Prevention Communication and Training', 'akaza-adventure' ),
		'description' => __( 'Explore leadership endorsement, internal communication, employee training and appropriate channels for reinforcing organisational expectations.', 'akaza-adventure' ),
		'image'       => __( 'Communication & Training Visual', 'akaza-adventure' ),
	),
	array(
		'number'      => '05',
		'title'       => __( 'Reporting Suspected Facilitation of Tax Evasion', 'akaza-adventure' ),
		'description' => __( 'Understand the importance of accessible reporting processes, clear ownership, appropriate record keeping and escalation.', 'akaza-adventure' ),
		'image'       => __( 'Reporting Workflow', 'akaza-adventure' ),
	),
	array(
		'number'      => '06',
		'title'       => __( 'Monitoring and Reviewing Tax Evasion Prevention Controls', 'akaza-adventure' ),
		'description' => __( 'Explore ongoing review, red-flag assessment, auditing, record keeping and the need to update processes when weaknesses are identified.', 'akaza-adventure' ),
		'image'       => __( 'Monitoring / Review Dashboard', 'akaza-adventure' ),
	),
);
?>

<section
	id="course-content"
	class="sl-tax-evasion-course-content"
	aria-labelledby="sl-tax-evasion-course-content-title"
>
	<div class="container">

		<div class="sl-tax-evasion-course-content__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Preventing Facilitation of Tax Evasion Course Content', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-tax-evasion-course-content-title">
				<?php esc_html_e( 'What Does the Preventing Facilitation of Tax Evasion', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Training Cover?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course moves from understanding the legislation and identifying exposure through to risk assessment, due diligence, policy design, communication, reporting and ongoing monitoring and review.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-tax-evasion-course-content__list">

			<?php foreach ( $course_content as $index => $item ) : ?>

				<article class="sl-tax-evasion-course-content__item">

					<div class="sl-tax-evasion-course-content__number" aria-hidden="true">
						<?php echo esc_html( $item['number'] ); ?>
					</div>

					<div class="sl-tax-evasion-course-content__text">

						<h3 class="sl-panel-title">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $item['description'] ); ?>
						</p>

					</div>

					<div class="sl-tax-evasion-course-content__media">

						<div class="sl-tax-evasion-course-content__image-placeholder">
							<span class="sl-tax-evasion-course-content__image-label">
								<?php
								echo esc_html(
									sprintf(
										/* translators: %d is the image number. */
										__( 'Image %02d', 'akaza-adventure' ),
										$index + 5
									)
								);
								?>
							</span>

							<strong>
								<?php echo esc_html( $item['image'] ); ?>
							</strong>
						</div>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>