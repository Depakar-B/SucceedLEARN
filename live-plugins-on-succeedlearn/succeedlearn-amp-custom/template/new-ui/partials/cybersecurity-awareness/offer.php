<?php
/**
 * Cybersecurity Awareness AMP — One Month, One Price Offer.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	class="sl-section sl-cyber-awareness-offer"
	id="one-month-one-price"
	aria-labelledby="sl-cyber-awareness-offer-title"
>
	<div class="sl-wrap">
		<div class="sl-cyber-awareness-offer__panel">
			<div class="sl-cyber-awareness-offer__heading">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Complete Security Awareness Package', 'succeedlearn-amp' ); ?>
				</span>
				<div class="sl-cyber-awareness-offer__title-row">
					<h2 id="sl-cyber-awareness-offer-title" class="sl-h2">
						<?php esc_html_e( 'One month, One Price, Once in a lifetime offer', 'succeedlearn-amp' ); ?>
					</h2>
					<p class="sl-cyber-awareness-offer__availability">
						<?php esc_html_e( 'Available only for October 2026', 'succeedlearn-amp' ); ?>
					</p>
				</div>
				<h3 class="sl-panel-title"><?php esc_html_e( 'No Per user rate, No Implementation charges', 'succeedlearn-amp' ); ?></h3>
			</div>

			<div class="sl-cyber-awareness-offer__offer">
				<div class="sl-cyber-awareness-offer__item">
					<div class="sl-cyber-awareness-offer__item-content">
						<span class="sl-cyber-awareness-offer__item-label">
							<?php esc_html_e( 'Complete package', 'succeedlearn-amp' ); ?>
						</span>
						<p><?php esc_html_e( 'Comprehensive annual security awareness training', 'succeedlearn-amp' ); ?></p>
					</div>
				</div>

				<div class="sl-cyber-awareness-offer__operator" aria-hidden="true"><span>+</span></div>

				<div class="sl-cyber-awareness-offer__item">
					<div class="sl-cyber-awareness-offer__item-content">
						<span class="sl-cyber-awareness-offer__item-label">
							<?php esc_html_e( 'Included', 'succeedlearn-amp' ); ?>
						</span>
						<p><?php esc_html_e( '10 phishing simulations per user', 'succeedlearn-amp' ); ?></p>
					</div>
				</div>

				<div class="sl-cyber-awareness-offer__operator" aria-hidden="true"><span>=</span></div>

				<div class="sl-cyber-awareness-offer__price">
					<span class="sl-cyber-awareness-offer__price-label">
						<?php esc_html_e( 'One complete offer', 'succeedlearn-amp' ); ?>
					</span>
					<div class="sl-cyber-awareness-offer__price-value">
						<span class="sl-cyber-awareness-offer__currency"><?php echo esc_html( succeedlearn_amp_csa_currency_symbol() ); ?></span>
						<span class="sl-cyber-awareness-offer__amount">50</span>
					</div>
					<span class="sl-cyber-awareness-offer__price-note">
						<?php esc_html_e( 'One month campaign offer', 'succeedlearn-amp' ); ?>
					</span>
				</div>
			</div>

			<div class="sl-cyber-awareness-offer__footnote">
				<p class="sl-cyber-awareness-offer__footnote-text">
					<?php
					if ( succeedlearn_amp_csa_is_uk() ) {
						esc_html_e(
							'* This price (£50) is only for up to 100 users. For higher user counts, the price gets better.',
							'succeedlearn-amp'
						);
					} else {
						esc_html_e(
							'* This price ($50) is only for up to 100 users. For higher user counts, the price gets better. Click here for details.',
							'succeedlearn-amp'
						);
					}
					?>
				</p>
				<a class="sl-btn sl-btn--primary" href="#pricing">
					<?php esc_html_e( 'View Pricing', 'succeedlearn-amp' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
