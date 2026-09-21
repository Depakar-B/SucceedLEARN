<?php
/**
 * DPDPA Compliance Training — Pricing calculator.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pricing_tiers = array(
	array(
		'label' => __( 'Employees 1 to 1,000', 'akaza-adventure' ),
		'rate'  => '₹200',
	),
	array(
		'label' => __( '1,001 to 2,500', 'akaza-adventure' ),
		'rate'  => '₹180',
	),
	array(
		'label' => __( '2,501 to 5,000', 'akaza-adventure' ),
		'rate'  => '₹160',
	),
	array(
		'label' => __( 'Above 5,000', 'akaza-adventure' ),
		'rate'  => '₹140',
	),
);
?>
<section class="sl-dpdpa-pricing" aria-labelledby="sl-dpdpa-pricing-title">
	<div class="container">
		<div class="sl-dpdpa-section-heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'DPDPA training cost per employee', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-dpdpa-pricing-title">
				<?php esc_html_e( 'Know the price', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'before you talk to anyone.', 'akaza-adventure' ); ?></span>
			</h2>
			<p>
				<?php
				esc_html_e(
					'Most compliance vendors make cost a discovery-call conversation. This is employee training, priced per head, per year, published openly, and it gets cheaper automatically as your workforce grows.',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

		<div class="sl-dpdpa-pricing__grid">
			<div class="sl-dpdpa-pricing__copy">
				<div class="sl-dpdpa-pricing__why">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Why we publish it', 'akaza-adventure' ); ?>
					</span>
					<h3><?php esc_html_e( 'Price is not the objection here. Hiding it is.', 'akaza-adventure' ); ?></h3>
					<p>
						<?php
						esc_html_e(
							'Compliance consultancies typically run engagements costing several lakhs. Your first 1,000 employees are ₹200 each. Every employee after that is billed at a lower rate automatically, so the price never jumps, it only gets better.',
							'akaza-adventure'
						);
						?>
					</p>

					<ul class="sl-dpdpa-pricing__tiers" aria-label="<?php esc_attr_e( 'DPDPA pricing tiers', 'akaza-adventure' ); ?>">
						<?php foreach ( $pricing_tiers as $tier ) : ?>
							<li class="sl-dpdpa-pricing__tier">
								<span class="sl-dpdpa-pricing__tier-label"><?php echo esc_html( $tier['label'] ); ?></span>
								<strong class="sl-dpdpa-pricing__tier-rate"><?php echo esc_html( $tier['rate'] ); ?></strong>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<p class="sl-dpdpa-pricing__note">
					<?php esc_html_e( 'Free customisation of up to 10 minutes of content for our first 25 customers.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div
				class="sl-dpdpa-pricing__calc"
				data-min="50"
				data-max="10000"
				data-step="50"
			>
				<label class="sl-dpdpa-pricing__label" for="dpdpaPricingRange">
					<?php esc_html_e( 'How many employees?', 'akaza-adventure' ); ?>
				</label>

				<div class="sl-dpdpa-pricing__slider">
					<span class="sl-dpdpa-pricing__tip" id="dpdpaPricingCount" aria-live="polite">50 employees</span>
					<div class="sl-dpdpa-pricing__track" aria-hidden="true">
						<span class="sl-dpdpa-pricing__fill"></span>
					</div>
					<input
						class="sl-dpdpa-pricing__range"
						id="dpdpaPricingRange"
						type="range"
						min="50"
						max="10000"
						step="50"
						value="50"
						aria-valuemin="50"
						aria-valuemax="10000"
						aria-valuenow="50"
						aria-valuetext="50 employees"
					>
				</div>

				<div class="sl-dpdpa-pricing__total">
					<span class="sl-dpdpa-pricing__amount" id="dpdpaPricingTotal">₹10,000</span>
					<span class="sl-dpdpa-pricing__period">
						<?php esc_html_e( 'per year, for your whole workforce', 'akaza-adventure' ); ?>
					</span>
					<span class="sl-dpdpa-pricing__unit" id="dpdpaPricingUnit">
						<?php esc_html_e( 'Average ₹200 per employee, per year', 'akaza-adventure' ); ?>
					</span>
				</div>

				<p class="sl-dpdpa-pricing__volume">
					<?php
					esc_html_e(
						'Rate updates automatically as you type. Bundle pricing available with our POSH programmes.',
						'akaza-adventure'
					);
					?>
				</p>

				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Get an exact quote', 'akaza-adventure' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
