<?php
/**
 * PE/VC Homepage — Pricing banner.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pricing_items = array(
	__( 'Complete PE/VC compliance learning suite', 'akaza-adventure' ),
	__( 'Financial Crime Prevention learning included', 'akaza-adventure' ),
	__( 'One simple annual per-user price', 'akaza-adventure' ),
	__( 'Assign learning according to role', 'akaza-adventure' ),
	__( 'Suitable for firm-wide and targeted programmes', 'akaza-adventure' ),
	__( 'Hosted and SCORM delivery options', 'akaza-adventure' ),
);
?>
<section class="sl-pevc-pricing" aria-labelledby="sl-pevc-pricing-title">
	<div class="container">
		<div class="sl-pevc-pricing__banner">

			<div class="sl-pevc-pricing__copy">
				<span class="sl-pevc-pricing__badge">
					<?php esc_html_e( 'Complete PE/VC Suite', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-pevc-pricing-title">
					<?php esc_html_e( 'Avail the whole PE/VC Suite', 'akaza-adventure' ); ?>
				</h2>

				<div class="sl-pevc-pricing__price">
					<?php esc_html_e( '$24 per user, per year', 'akaza-adventure' ); ?>
				</div>

				<p class="sl-pevc-pricing__lead">
					<?php
					echo wp_kses_post(
						__(
							'Equivalent to just <strong>$2 per user, per month</strong> for the complete PE/VC compliance learning package.',
							'akaza-adventure'
						)
					);
					?>
				</p>

				<div class="sl-pevc-pricing__actions sl-training-actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#contact">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-hero-btn sl-hero-btn-secondary" href="#courses">
						<?php esc_html_e( 'Explore the Suite', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

			<ul class="sl-pevc-pricing__list">
				<?php foreach ( $pricing_items as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>

		</div>
	</div>
</section>
