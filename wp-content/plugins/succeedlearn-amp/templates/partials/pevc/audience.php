<?php
/**
 * PE/VC Suite AMP — Audience / roles.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $audience_roles ) || ! is_array( $audience_roles ) ) {
	$audience_roles = succeedlearn_amp_get_pevc_audience_roles();
}
?>
<section class="sl-pevc-audience" aria-labelledby="sl-pevc-audience-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Designed for every role', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-pevc-audience-title" class="sl-h2">
			<?php esc_html_e( 'Role-Based Compliance Training for Private Equity and Venture Capital Firms', 'succeedlearn-amp' ); ?>
		</h2>

		<p class="sl-pevc-audience__lead">
			<?php
			esc_html_e(
				'Different employees face different risks. Course assignment should reflect the responsibilities attached to each role.',
				'succeedlearn-amp'
			);
			?>
		</p>

		<div class="sl-pevc-audience__grid sl-amp-card-grid">
			<?php foreach ( $audience_roles as $role ) : ?>
				<div class="sl-pevc-audience__item">
					<div class="sl-pevc-audience__icon" aria-hidden="true">
						<?php echo esc_html( $role['num'] ); ?>
					</div>
					<strong><?php echo esc_html( $role['title'] ); ?></strong>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
