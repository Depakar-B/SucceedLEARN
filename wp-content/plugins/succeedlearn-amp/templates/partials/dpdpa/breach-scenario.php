<?php
/**
 * DPDPA Compliance Training AMP - Breach scenario.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$breach_image_url = function_exists( 'succeedlearn_amp_dpdpa_breach_scenario_image_url' )
	? succeedlearn_amp_dpdpa_breach_scenario_image_url()
	: '';
?>

<section
	class="sl-section sl-dpdpa-breach-scenario"
	aria-labelledby="sl-dpdpa-breach-scenario-title"
>
	<div class="sl-wrap">
		<div class="sl-dpdpa-breach-scenario__grid">

			<div class="sl-dpdpa-breach-scenario__content">
				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'How a DPDPA breach actually happens',
						'succeedlearn-amp'
					);
					?>
				</span>

				<h2
					id="sl-dpdpa-breach-scenario-title"
					class="sl-h2"
				>
					<?php
					esc_html_e(
						'No malware. No intrusion. Just a ',
						'succeedlearn-amp'
					);
					?>

					<span>
						<?php
						esc_html_e(
							'Tuesday afternoon.',
							'succeedlearn-amp'
						);
						?>
					</span>
				</h2>

				<div class="sl-dpdpa-breach-scenario__body">
					<p>
						<?php
						esc_html_e(
							'At 2:14pm someone needs to send an updated customer list to three colleagues. At 2:15pm it goes to a saved group of 217 people instead, with 1,204 customer records attached.',
							'succeedlearn-amp'
						);
						?>
					</p>

					<div class="sl-highlight">
						<p>
							<?php
							esc_html_e(
								'Under the DPDPA, that is a reportable personal data breach. The employee who sent it almost certainly does not know that.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</div>
			</div>

			<div class="sl-dpdpa-breach-scenario__media">
				<?php if ( '' !== $breach_image_url ) : ?>
					<div class="sl-dpdpa-breach-scenario__image">
						<amp-img
							src="<?php echo esc_url( $breach_image_url ); ?>"
							width="720"
							height="520"
							layout="responsive"
							alt="<?php esc_attr_e( 'Illustration representing a DPDPA personal data breach scenario', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php else : ?>
					<div
						class="sl-dpdpa-breach-scenario__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'DPDPA personal data breach scenario image placeholder', 'succeedlearn-amp' ); ?>"
					>
						<span>
							<?php esc_html_e( 'Scenario image placeholder', 'succeedlearn-amp' ); ?>
						</span>
					</div>
				<?php endif; ?>

				<p class="sl-dpdpa-breach-scenario__caption">
					<?php
					esc_html_e(
						"This isn't a hypothetical. It's the knowledge check your employees actually see, in module 11.",
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>

		</div>
	</div>
</section>