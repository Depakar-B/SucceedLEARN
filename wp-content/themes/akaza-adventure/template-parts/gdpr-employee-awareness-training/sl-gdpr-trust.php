<?php
/**
 * SucceedLEARN — GDPR Trust & Compliance
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gdpr_clients = array(
	'TCS',
	'Air India',
	'DHL',
	'Lupin',
	'RazorPay',
	'Chargebee',
	'Lenovo',
	'The Economist',
);

$gdpr_standards = array(
	array(
		'title' => 'ISO 27001:2022',
		'text'  => 'Information security aligned',
	),
	array(
		'title' => 'SOC 2',
		'text'  => 'Security and control focused',
	),
	array(
		'title' => 'GDPR-aligned',
		'text'  => 'Privacy awareness focused',
	),
);
?>

<section
	class="sl-gdpr-trust"
	id="gdpr-trust"
	aria-labelledby="sl-gdpr-trust-title"
>

	<div class="container">

		<div class="sl-gdpr-trust__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Trusted & Aligned', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-gdpr-trust-title">
				<?php esc_html_e( 'Built for organisations where', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'privacy matters.', 'akaza-adventure' ); ?>
				</span>
			</h2>

		</div>


		<div class="sl-gdpr-trust__layout">

			<!-- Client Trust -->
			<div class="sl-gdpr-trust__clients">

				<div class="sl-gdpr-trust__section-header">

					<div class="sl-gdpr-trust__section-icon" aria-hidden="true">

						<svg
							width="22"
							height="22"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						>
							<path
								d="M4 20V10L12 5L20 10V20"
								stroke="currentColor"
								stroke-width="1.6"
								stroke-linecap="round"
								stroke-linejoin="round"
							/>

							<path
								d="M8 20V14H16V20"
								stroke="currentColor"
								stroke-width="1.6"
								stroke-linejoin="round"
							/>

						</svg>

					</div>

					<div>

						<span>
							<?php esc_html_e( 'Trusted by teams at', 'akaza-adventure' ); ?>
						</span>

						<p>
							<?php
							esc_html_e(
								'Organisations choose practical learning to strengthen employee awareness.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</div>


				<div class="sl-gdpr-trust__client-grid">

					<?php foreach ( $gdpr_clients as $client ) : ?>

						<div class="sl-gdpr-trust__client">
							<?php echo esc_html( $client ); ?>
						</div>

					<?php endforeach; ?>

				</div>

			</div>


			<!-- Standards -->
			<div class="sl-gdpr-trust__standards">

				<div class="sl-gdpr-trust__section-header">

					<div class="sl-gdpr-trust__section-icon" aria-hidden="true">

						<svg
							width="22"
							height="22"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						>
							<path
								d="M12 3L19 6V11.5C19 16.2 16.1 20.4 12 21C7.9 20.4 5 16.2 5 11.5V6L12 3Z"
								stroke="currentColor"
								stroke-width="1.6"
								stroke-linejoin="round"
							/>

							<path
								d="M9 12L11 14L15 10"
								stroke="currentColor"
								stroke-width="1.6"
								stroke-linecap="round"
								stroke-linejoin="round"
							/>

						</svg>

					</div>

					<div>

						<span>
							<?php esc_html_e( 'Aligned with recognised frameworks', 'akaza-adventure' ); ?>
						</span>

						<p>
							<?php
							esc_html_e(
								'Training supports privacy, security and compliance awareness.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</div>


				<div class="sl-gdpr-trust__standard-list">

					<?php foreach ( $gdpr_standards as $standard ) : ?>

						<div class="sl-gdpr-trust__standard">

							<span
								class="sl-gdpr-trust__standard-check"
								aria-hidden="true"
							>
								✓
							</span>

							<div>

								<strong>
									<?php echo esc_html( $standard['title'] ); ?>
								</strong>

								<span>
									<?php echo esc_html( $standard['text'] ); ?>
								</span>

							</div>

						</div>

					<?php endforeach; ?>

				</div>

			</div>

		</div>

	</div>

</section>