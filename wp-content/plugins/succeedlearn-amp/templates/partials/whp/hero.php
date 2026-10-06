<?php
/**
 * WHP AMP: Hero.
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="workplace-harassment-training" class="sl-section sl-section--alt sl-whp-hero" aria-labelledby="sl-whp-hero-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Global Workplace Compliance Training', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-whp-hero-title">
			<?php esc_html_e( 'Workplace Harassment Prevention Training for Global Teams', 'succeedlearn-amp' ); ?>
		</h1>

		<h2 class="sl-whp-hero__tagline">
			<?php esc_html_e( 'One workplace standard. Training shaped for every region.', 'succeedlearn-amp' ); ?>
		</h2>

		<div class="sl-whp-media">
			<div class="sl-whp-image sl-whp-image--wide">
				<amp-img
					src="<?php echo esc_url( $images['hero'] ); ?>"
					width="1586"
					height="992"
					layout="responsive"
					alt="<?php esc_attr_e( 'Global team collaborating in a hybrid workplace harassment prevention training session', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-whp-copy">
			<p><?php esc_html_e( 'A workplace policy may apply across your organisation. However, the laws, responsibilities and reporting procedures behind it can change from one location to another.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Employees need to recognise inappropriate conduct. Supervisors need to know when and how to respond. Complaint-handling teams may need a deeper understanding of procedures, confidentiality and fair inquiry.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( "SucceedLEARN's online Workplace Harassment Prevention Training helps organisations assign learning according to each employee's location, role and responsibilities.", 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-hero-actions sl-whp-hero__actions">
			<button
				type="button"
				class="sl-hero-btn sl-hero-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'training-by-region' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Explore Training by Region', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
			<button
				type="button"
				class="sl-hero-btn sl-hero-btn-secondary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
