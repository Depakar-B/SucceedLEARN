<?php
/**
 * SMCR Training for PE & VC Firms — Senior Manager Accountability.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$accountability_points = array(
	array(
		'num'         => '01',
		'title'       => __( 'Clear Responsibilities', 'akaza-adventure' ),
		'description' => __( 'Establish clear reporting lines, responsibilities and oversight arrangements.', 'akaza-adventure' ),
	),
	array(
		'num'         => '02',
		'title'       => __( 'Active Oversight', 'akaza-adventure' ),
		'description' => __( 'Monitor delegated work, challenge weaknesses and respond to emerging risks or red flags.', 'akaza-adventure' ),
	),
	array(
		'num'         => '03',
		'title'       => __( 'Documented Actions', 'akaza-adventure' ),
		'description' => __( 'Maintain records, audit trails and evidence of important decisions and oversight actions.', 'akaza-adventure' ),
	),
);
?>

<section
	id="senior-manager-accountability"
	class="sl-smcr-accountability"
	aria-labelledby="sl-smcr-accountability-title"
>
	<div class="container">

		<div class="sl-smcr-accountability__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Senior Manager Accountability', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-smcr-accountability-title">
				<?php esc_html_e( 'What Are Reasonable Steps Under SMCR for Senior', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Managers?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e(
					'In the supplied Senior Managers course, reasonable steps are explored through practical oversight activities such as delegation, control reviews, escalation and follow-up.',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-smcr-accountability__grid">

			<?php foreach ( $accountability_points as $point ) : ?>

				<article class="sl-smcr-accountability__card">

					<span class="sl-smcr-accountability__number" aria-hidden="true">
						<?php echo esc_html( $point['num'] ); ?>
					</span>

					<h3 class="sl-panel-title">
						<?php echo esc_html( $point['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $point['description'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>