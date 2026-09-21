<?php
/**
 * SucceedLEARN — DPDPA Breach Scenario
 *
 * Section: How a DPDPA breach actually happens
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-dpdpa-breach-scenario"
	aria-labelledby="sl-dpdpa-breach-scenario-title"
>
	<div class="container">

		<div class="sl-dpdpa-breach-scenario__grid">

			<!-- Left: Content -->
			<div class="sl-dpdpa-breach-scenario__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'How a DPDPA breach actually happens', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-dpdpa-breach-scenario-title">
					<?php esc_html_e( 'No malware. No intrusion. Just a', 'akaza-adventure' ); ?>
					<span>
						<?php esc_html_e( 'Tuesday afternoon.', 'akaza-adventure' ); ?>
					</span>
				</h2>

				<div class="sl-dpdpa-breach-scenario__body">

					<p>
						<?php esc_html_e(
							'At 2:14pm someone needs to send an updated customer list to three colleagues. At 2:15pm it goes to a saved group of 217 people instead, with 1,204 customer records attached.',
							'akaza-adventure'
						); ?>
					</p>

					<p class="sl-highlight">
						<?php esc_html_e(
							'Under the DPDPA, that is a reportable personal data breach. The employee who sent it almost certainly does not know that.',
							'akaza-adventure'
						); ?>
					</p>

				</div>

			</div>

			<!-- Right: Image -->
			<div class="sl-dpdpa-breach-scenario__media">

				<div class="sl-dpdpa-breach-scenario__image">
					<img
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dpdpa-breach-scenario.webp' ); ?>"
						alt="<?php esc_attr_e( 'Illustration representing a DPDPA personal data breach scenario', 'akaza-adventure' ); ?>"
						width="720"
						height="520"
						loading="lazy"
					>
				</div>

				<p class="sl-dpdpa-breach-scenario__caption">
					<?php esc_html_e(
						"This isn't a hypothetical. It's the knowledge check your employees actually see, in module 11.",
						'akaza-adventure'
					); ?>
				</p>

			</div>

		</div>

	</div>
</section>