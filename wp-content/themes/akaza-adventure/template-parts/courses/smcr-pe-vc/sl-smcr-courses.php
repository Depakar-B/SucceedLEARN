<?php
/**
 * SMCR Training for PE & VC Firms — Role-Based Learning.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$courses = array(
	array(
		'mod'         => 'employee',
		'eyebrow'     => __( 'Employees Course', 'akaza-adventure' ),
		'title'       => __( 'SMCR Training for Employees', 'akaza-adventure' ),
		'description' => __( 'Build practical understanding of the SMCR framework and the six Individual Conduct Rules through situations relevant to PE and VC employees.', 'akaza-adventure' ),
		'features'    => array(
			__( 'SMCR structure and employee categories', 'akaza-adventure' ),
			__( 'Six Individual Conduct Rules', 'akaza-adventure' ),
			__( 'PE/VC-relevant workplace scenarios', 'akaza-adventure' ),
			__( 'Annual attestation', 'akaza-adventure' ),
			__( 'Reporting and escalation', 'akaza-adventure' ),
			__( 'Scenario-based assessment', 'akaza-adventure' ),
		),
	),
	array(
		'mod'         => 'manager',
		'eyebrow'     => __( 'Senior Managers Course', 'akaza-adventure' ),
		'title'       => __( 'SMCR Training for Senior Managers', 'akaza-adventure' ),
		'description' => __( 'Develop understanding of Senior Manager accountability, reasonable steps, delegation, oversight, documentation and additional Conduct Rules.', 'akaza-adventure' ),
		'features'    => array(
			__( 'Statement of Responsibilities', 'akaza-adventure' ),
			__( 'Duty of Responsibility', 'akaza-adventure' ),
			__( 'Reasonable steps', 'akaza-adventure' ),
			__( 'Additional Senior Manager Conduct Rules', 'akaza-adventure' ),
			__( 'Delegation and oversight', 'akaza-adventure' ),
			__( 'Recordkeeping and breach reporting', 'akaza-adventure' ),
		),
	),
);
?>

<section
	id="courses"
	class="sl-smcr-courses"
	aria-labelledby="sl-smcr-courses-title"
>
	<div class="container">

		<div class="sl-smcr-courses__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Role-Based Learning', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-smcr-courses-title">
				<?php esc_html_e( 'UK SMCR Training Courses for Employees and Senior Managers', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php
				esc_html_e(
					"Choose learning that reflects the learner's responsibilities rather than using the same content for every role.",
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-smcr-courses__grid">
			<?php foreach ( $courses as $course ) : ?>
				<article class="sl-smcr-courses__card sl-smcr-courses__card--<?php echo esc_attr( $course['mod'] ); ?>">

					<span class="sl-smcr-courses__eyebrow">
						<?php echo esc_html( $course['eyebrow'] ); ?>
					</span>

					<h3 class="sl-panel-title">
						<?php echo esc_html( $course['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $course['description'] ); ?>
					</p>

					<ul class="sl-smcr-courses__list">
						<?php foreach ( $course['features'] as $feature ) : ?>
							<li><?php echo esc_html( $feature ); ?></li>
						<?php endforeach; ?>
					</ul>

				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
