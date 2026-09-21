<?php
/**
 * SucceedLEARN — FERPA Staff Awareness
 *
 * Section: Pricing
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ferpa_pricing = array(
	array(
		'seats'   => '1 to 99',
		'price'   => '$20',
		'details' => '',
		'tone'    => '',
	),
	array(
		'seats'   => '100 to 499',
		'price'   => '$16',
		'details' => 'Save 20%',
		'tone'    => 'save',
	),
	array(
		'seats'   => '500 to 1,999',
		'price'   => '$13',
		'details' => 'Save 35%',
		'tone'    => 'save',
	),
	array(
		'seats'   => '2,000 or more',
		'price'   => 'Talk to us',
		'details' => 'Custom terms',
		'tone'    => 'custom',
	),
);
?>

<section
	class="sl-ferpa-pricing"
	id="pricing"
	aria-labelledby="sl-ferpa-pricing-title"
>
	<div class="container">

		<div class="sl-ferpa-pricing__grid">

			<!-- LEFT CONTENT -->
			<div class="sl-ferpa-pricing__content">

				<div class="sl-ferpa-pricing__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Pricing', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-ferpa-pricing-title">
						<?php esc_html_e( 'We publish it.', 'akaza-adventure' ); ?>
						<span>
							<?php esc_html_e( 'Most FERPA providers do not.', 'akaza-adventure' ); ?>
						</span>
					</h2>

					<p>
						<?php esc_html_e( 'Annual per-seat subscription. Every tier includes the certificate, completion reporting, SCORM delivery and LMS integration.', 'akaza-adventure' ); ?>
					</p>

				</div>


				<!-- WHY THIS MATTERS -->
				<div class="sl-ferpa-pricing__why">

					<p>
						<strong>
							<?php esc_html_e( 'Why this matters.', 'akaza-adventure' ); ?>
						</strong>

						<?php esc_html_e( 'Most FERPA training providers require an enquiry form before quoting. Published comparable options include per-learner rates around $110 and annual site subscriptions in the hundreds of dollars. If you are building a budget line for a district or a campus, you should not have to sit through a sales call to get a number.', 'akaza-adventure' ); ?>
					</p>

				</div>

			</div>


			<!-- RIGHT PRICING TABLE -->
			<div class="sl-ferpa-pricing__table-wrap">

				<div class="sl-ferpa-pricing__table">

					<div class="sl-ferpa-pricing__table-head">

						<div>
							<?php esc_html_e( 'Seats', 'akaza-adventure' ); ?>
						</div>

						<div>
							<?php esc_html_e( 'Per seat / year', 'akaza-adventure' ); ?>
						</div>

						<div aria-hidden="true"></div>

					</div>


					<div class="sl-ferpa-pricing__table-body">

						<?php foreach ( $ferpa_pricing as $tier ) : ?>

							<div class="sl-ferpa-pricing__row">

								<div class="sl-ferpa-pricing__seats">
									<?php echo esc_html( $tier['seats'] ); ?>
								</div>

								<div class="sl-ferpa-pricing__price">
									<?php echo esc_html( $tier['price'] ); ?>
								</div>

								<div class="sl-ferpa-pricing__details">

									<?php if ( ! empty( $tier['details'] ) ) : ?>

										<span class="sl-ferpa-pricing__detail sl-ferpa-pricing__detail--<?php echo esc_attr( $tier['tone'] ); ?>">
											<?php echo esc_html( $tier['details'] ); ?>
										</span>

									<?php endif; ?>

								</div>

							</div>

						<?php endforeach; ?>

					</div>

				</div>

			</div>

		</div>

	</div>
</section>