<?php
/**
 * S-Aware — Built for Every Employee
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$workforce_groups = array(
	array(
		'title'       => __( 'New Joiners', 'akaza-adventure' ),
		'description' => __( 'Establish security expectations from the beginning by incorporating cybersecurity awareness into employee onboarding and helping new employees understand their responsibilities from day one.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Employees Across the Organisation', 'akaza-adventure' ),
		'description' => __( "Build a consistent foundation of security awareness across departments and functions, regardless of an employee's level of technical knowledge.", 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Managers & People Leaders', 'akaza-adventure' ),
		'description' => __( 'Help managers understand important security risks and reinforce responsible security behaviours within their teams.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Remote & Hybrid Workforces', 'akaza-adventure' ),
		'description' => __( 'Support employees working across offices, homes and distributed environments with awareness of the security considerations associated with modern ways of working.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Role-Relevant & Higher-Risk Groups', 'akaza-adventure' ),
		'description' => __( 'Where required, organisations can build learning programmes around the security awareness needs of particular employee groups, functions or risk profiles.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-saware-workforce" aria-labelledby="sl-saware-workforce-title">
	<div class="container">

		<div class="sl-saware-workforce__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Designed for Your Workforce', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-saware-workforce-title">
				<?php esc_html_e( 'Built for Every', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Employee', 'akaza-adventure' ); ?></span>
			</h2>

			<div class="sl-saware-workforce__intro">
				<p>
					<?php
					esc_html_e(
						'Cybersecurity affects everyone, but employees encounter risk in different ways depending on their roles, responsibilities and working environments.',
						'akaza-adventure'
					);
					?>
				</p>
				<p>
					<?php
					esc_html_e(
						'S-Aware is designed to make essential security knowledge understandable and relevant across the organisation.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

		</div>

		<div class="sl-saware-workforce__grid">

			<?php foreach ( $workforce_groups as $index => $workforce_group ) : ?>

				<article class="sl-saware-workforce__card">

					<div class="sl-saware-workforce__card-title">
						<span class="sl-saware-workforce__number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3 class="sl-panel-title">
							<?php echo esc_html( $workforce_group['title'] ); ?>
						</h3>
					</div>

					<p>
						<?php echo esc_html( $workforce_group['description'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
