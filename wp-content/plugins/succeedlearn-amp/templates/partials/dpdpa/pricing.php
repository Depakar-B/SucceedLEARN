<?php
/**
 * DPDPA Compliance Training AMP - Pricing calculator.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pricing_tiers = function_exists( 'succeedlearn_amp_dpdpa_pricing_tiers' )
	? succeedlearn_amp_dpdpa_pricing_tiers()
	: array();
?>

<section
	class="sl-section sl-section--alt sl-dpdpa-pricing"
	aria-labelledby="sl-dpdpa-pricing-title"
>
	<div class="sl-wrap">

		<header class="sl-dpdpa-section-heading sl-dpdpa-pricing__heading">
			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'DPDPA training cost per employee',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h2
				id="sl-dpdpa-pricing-title"
				class="sl-h2"
			>
				<?php esc_html_e( 'Know the price ', 'succeedlearn-amp' ); ?>

				<span>
					<?php
					esc_html_e(
						'before you talk to anyone.',
						'succeedlearn-amp'
					);
					?>
				</span>
			</h2>

			<p class="sl-lead">
				<?php
				esc_html_e(
					'Most compliance vendors make cost a discovery-call conversation. This is employee training, priced per head, per year, published openly, and it gets cheaper automatically as your workforce grows.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</header>

		<div class="sl-dpdpa-pricing__grid">

			<div class="sl-dpdpa-pricing__copy">
				<div class="sl-dpdpa-pricing__why">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Why we publish it', 'succeedlearn-amp' ); ?>
					</span>

					<h3 class="sl-panel-title">
						<?php
						esc_html_e(
							'Price is not the objection here. Hiding it is.',
							'succeedlearn-amp'
						);
						?>
					</h3>

					<p>
						<?php
						esc_html_e(
							'Compliance consultancies typically run engagements costing several lakhs. Your first 1,000 employees are ₹200 each. Every employee after that is billed at a lower rate automatically, so the price never jumps, it only gets better.',
							'succeedlearn-amp'
						);
						?>
					</p>

					<ul
						class="sl-list sl-list--2up sl-dpdpa-pricing__tiers"
						aria-label="<?php esc_attr_e( 'DPDPA pricing tiers', 'succeedlearn-amp' ); ?>"
					>
						<?php foreach ( $pricing_tiers as $tier ) : ?>
							<li class="sl-list-item sl-dpdpa-pricing__tier">
								<span class="sl-dpdpa-pricing__tier-label">
									<?php echo esc_html( $tier['label'] ); ?>
								</span>

								<strong class="sl-dpdpa-pricing__tier-rate">
									<?php echo esc_html( $tier['rate'] ); ?>
								</strong>

								<span class="sl-dpdpa-pricing__tier-period">
									<?php esc_html_e( 'per employee, per year', 'succeedlearn-amp' ); ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="sl-highlight sl-dpdpa-pricing__note">
					<p>
						<?php
						esc_html_e(
							'Free customisation of up to 10 minutes of content for our first 25 customers.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</div>
			</div>

			<div class="sl-dpdpa-pricing__calc">
				<amp-state id="dpdpaPricing">
					<script type="application/json">
						{
							"employees": 50,
							"total": 10000,
							"average": 200
						}
					</script>
				</amp-state>

				<label
					class="sl-dpdpa-pricing__label"
					for="dpdpa-pricing-range"
				>
					<?php esc_html_e( 'How many employees?', 'succeedlearn-amp' ); ?>
				</label>

				<output
					class="sl-dpdpa-pricing__count"
					for="dpdpa-pricing-range"
					[text]="dpdpaPricing.employees + ' employees'"
				>
					<?php esc_html_e( '50 employees', 'succeedlearn-amp' ); ?>
				</output>

				<div
					class="sl-dpdpa-pricing__slider"
					[style]="'--pct:' + ((dpdpaPricing.employees - 50) / 9950 * 100)"
					style="--pct: 0"
				>
					<div
						class="sl-dpdpa-pricing__track"
						aria-hidden="true"
					>
						<span class="sl-dpdpa-pricing__fill"></span>
					</div>

					<input
						class="sl-dpdpa-pricing__range"
						id="dpdpa-pricing-range"
						type="range"
						min="50"
						max="10000"
						step="50"
						value="50"
						aria-label="<?php esc_attr_e( 'Number of employees', 'succeedlearn-amp' ); ?>"
						on="input-throttled:AMP.setState({
							dpdpaPricing: {
								employees: event.value,
								total: event.value &lt;= 1000
									? event.value * 200
									: event.value &lt;= 2500
										? 200000 + (event.value - 1000) * 180
										: event.value &lt;= 5000
											? 470000 + (event.value - 2500) * 160
											: 870000 + (event.value - 5000) * 140,
								average: Math.round(
									(
										event.value &lt;= 1000
											? event.value * 200
											: event.value &lt;= 2500
												? 200000 + (event.value - 1000) * 180
												: event.value &lt;= 5000
													? 470000 + (event.value - 2500) * 160
													: 870000 + (event.value - 5000) * 140
									) / event.value
								)
							}
						})"
					>
				</div>

				<div class="sl-dpdpa-pricing__total">
					<span
						class="sl-dpdpa-pricing__amount"
						[text]="'₹' + dpdpaPricing.total"
					>
						₹10,000
					</span>

					<span class="sl-dpdpa-pricing__period">
						<?php
						esc_html_e(
							'per year, for your whole workforce',
							'succeedlearn-amp'
						);
						?>
					</span>

					<span
						class="sl-dpdpa-pricing__unit"
						[text]="'Average ₹' + dpdpaPricing.average + ' per employee, per year'"
					>
						<?php
						esc_html_e(
							'Average ₹200 per employee, per year',
							'succeedlearn-amp'
						);
						?>
					</span>
				</div>

				<p class="sl-dpdpa-pricing__volume">
					<?php
					esc_html_e(
						'Rate updates automatically as you move the slider. Bundle pricing available with our POSH programmes.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<div class="sl-dpdpa-pricing__actions">
					<button
						type="button"
						class="sl-content-btn sl-content-btn-primary"
						data-cta="dpdpa-pricing-quote"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Get an exact quote', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

		</div>
	</div>
</section>