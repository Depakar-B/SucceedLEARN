<?php
/**
 * SMCR Training for PE & VC Firms — Employees Learning Path.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_areas = array(
	__( 'Understand the SMCR structure and relevant categories', 'akaza-adventure' ),
	__( 'Recognise what each Individual Conduct Rule expects', 'akaza-adventure' ),
	__( 'Apply the rules to practical workplace decisions', 'akaza-adventure' ),
	__( 'Understand when concerns should be reported or escalated', 'akaza-adventure' ),
);
?>

<section
	id="employees-learning"
	class="sl-smcr-employees"
	aria-labelledby="sl-smcr-employees-title"
>
	<div class="container">

		<div class="sl-smcr-employees__grid">

			<div class="sl-smcr-employees__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Employees Learning Path', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-smcr-employees-title">
					<?php esc_html_e( 'SMCR Training for Employees: FCA Conduct Rules and Workplace', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Responsibilities', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e(
						'The Employees course helps learners understand where they sit within the SMCR structure and what the six Individual Conduct Rules mean for day-to-day behaviour.',
						'akaza-adventure'
					); ?>
				</p>

				<p>
					<?php esc_html_e(
						'Practical situations help connect the rules with decisions involving investor information, due diligence, operations, valuations, confidential information and regulatory interaction.',
						'akaza-adventure'
					); ?>
				</p>

				<div class="sl-smcr-employees__learning">

					<h3 class="sl-panel-title">
						<?php esc_html_e( 'Key Learning Areas', 'akaza-adventure' ); ?>
					</h3>

					<ul class="sl-list">
						<?php foreach ( $learning_areas as $index => $learning_area ) : ?>
							<li class="sl-list-item">
								<span class="sl-list-item__label" aria-hidden="true">
									<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
								</span>

								<span class="sl-list-item__text">
									<?php echo esc_html( $learning_area ); ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>

				</div>

			</div>

			<div class="sl-smcr-employees__media">
				<div class="sl-smcr-employees__image">
					<div class="sl-smcr-employees__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>