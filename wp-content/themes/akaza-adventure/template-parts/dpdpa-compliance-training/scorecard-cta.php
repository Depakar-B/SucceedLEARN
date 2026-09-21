<?php
/**
 * DPDPA Compliance Training — Scorecard CTA.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-dpdpa-scorecard-cta" aria-labelledby="sl-dpdpa-scorecard-cta-title">
	<div class="container">
		<div class="sl-dpdpa-scorecard-cta__inner">
			<span class="sl-dpdpa-scorecard-cta__eyebrow">
				<?php esc_html_e( 'Not ready to talk yet?', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-dpdpa-scorecard-cta-title">
				<?php esc_html_e( 'Find your', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'DPDPA training gaps', 'akaza-adventure' ); ?></span>
				<?php esc_html_e( 'in four minutes', 'akaza-adventure' ); ?>
			</h2>
			<p>
				<?php esc_html_e( 'Fifteen questions, a scored result you can forward to whoever else signs off.', 'akaza-adventure' ); ?>
			</p>
			<a
				class="sl-content-btn sl-content-btn-primary"
				href="<?php echo esc_url( home_url( '/dpdpa-readiness-scorecard/' ) ); ?>"
			>
				<?php esc_html_e( 'Take the Readiness Scorecard', 'akaza-adventure' ); ?>
				<span aria-hidden="true">→</span>
			</a>
		</div>
	</div>
</section>
