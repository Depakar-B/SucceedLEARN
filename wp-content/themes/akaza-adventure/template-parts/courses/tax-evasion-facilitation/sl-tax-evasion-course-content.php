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
		'src'         => 'https://succeedlearn.com/wp-content/uploads/2026/10/Tax-Evasion_Risk-Matrix.webp',
	),
	array(
		'number'      => '02',
		'title'       => __( 'Due Diligence and Tax Evasion Risk', 'akaza-adventure' ),
		'description' => __( 'Understand how business relationships, transaction complexity and identified risks can influence scrutiny and review.', 'akaza-adventure' ),
		'image'       => __( 'Due Diligence Visual', 'akaza-adventure' ),
		'src'         => 'https://succeedlearn.com/wp-content/uploads/2026/10/Tax-Evasion_Due-Diligence.webp',
	),
	array(
		'number'      => '03',
		'title'       => __( 'Anti-Tax Evasion Policy and Process Design', 'akaza-adventure' ),
		'description' => __( 'Consider responsibilities, policy scope, checkpoints, reporting mechanisms, audit processes and the response to policy breaches.', 'akaza-adventure' ),
		'image'       => __( 'Policy / Process Workflow', 'akaza-adventure' ),
		'src'         => 'https://succeedlearn.com/wp-content/uploads/2026/10/Tax-Evasion_Policy-workflow.webp',
	),
	array(
		'number'      => '04',
		'title'       => __( 'Tax Evasion Prevention Communication and Training', 'akaza-adventure' ),
		'description' => __( 'Explore leadership endorsement, internal communication, employee training and appropriate channels for reinforcing organisational expectations.', 'akaza-adventure' ),
		'image'       => __( 'Communication & Training Visual', 'akaza-adventure' ),
		'src'         => 'https://succeedlearn.com/wp-content/uploads/2026/10/Tax-evasion_Communication.webp',
	),
	array(
		'number'      => '05',
		'title'       => __( 'Reporting Suspected Facilitation of Tax Evasion', 'akaza-adventure' ),
		'description' => __( 'Understand the importance of accessible reporting processes, clear ownership, appropriate record keeping and escalation.', 'akaza-adventure' ),
		'image'       => __( 'Reporting Workflow', 'akaza-adventure' ),
		'src'         => 'https://succeedlearn.com/wp-content/uploads/2026/10/Tax-evasion_Reporting-workflow.webp',
	),
	array(
		'number'      => '06',
		'title'       => __( 'Monitoring and Reviewing Tax Evasion Prevention Controls', 'akaza-adventure' ),
		'description' => __( 'Explore ongoing review, red-flag assessment, auditing, record keeping and the need to update processes when weaknesses are identified.', 'akaza-adventure' ),
		'image'       => __( 'Monitoring / Review Dashboard', 'akaza-adventure' ),
		'src'         => 'https://succeedlearn.com/wp-content/uploads/2026/10/Tax-Evasion_Monitoring-dashboard.webp',
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

			<?php foreach ( $course_content as $item ) : ?>

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

						<img
							class="sl-tax-evasion-course-content__image"
							src="<?php echo esc_url( $item['src'] ); ?>"
							alt="<?php echo esc_attr( $item['image'] ); ?>"
							loading="lazy"
							decoding="async"
						>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>