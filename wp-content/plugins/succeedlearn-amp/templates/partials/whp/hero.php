<?php
/**
 * Workplace Harassment Prevention Training AMP — Hero section.
 *
 * Paste AMP hero markup here.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="workplace-harassment-training"
	class="sl-section sl-harassment-hero"
	aria-labelledby="sl-harassment-hero-title"
>
	<div class="sl-wrap">
		<div class="sl-harassment-hero__grid">
			<div class="sl-harassment-hero__content">
				<div class="sl-harassment-hero__heading">
					<span class="sl-eyebrow sl-home-sub-heading">
						<?php
						esc_html_e(
							'Global Workplace Compliance Training',
							'succeedlearn-amp'
						);
						?>
					</span>

					<h1 id="sl-harassment-hero-title">
						<?php
						esc_html_e(
							'Workplace Harassment Prevention Training for Global Teams',
							'succeedlearn-amp'
						);
						?>
					</h1>

					<h2>
						<?php
						esc_html_e(
							'One workplace standard. Training shaped for every region.',
							'succeedlearn-amp'
						);
						?>
					</h2>
				</div>

				<div class="sl-harassment-hero__intro">
					<p>
						<?php
						esc_html_e(
							'A workplace policy may apply across your organisation. However, the laws, responsibilities and reporting procedures behind it can change from one location to another.',
							'succeedlearn-amp'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Employees need to recognise inappropriate conduct. Supervisors need to know when and how to respond. Complaint-handling teams may need a deeper understanding of procedures, confidentiality and fair inquiry.',
							'succeedlearn-amp'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							"SucceedLEARN's online Workplace Harassment Prevention Training helps organisations assign learning according to each employee's location, role and responsibilities.",
							'succeedlearn-amp'
						);
						?>
					</p>
				</div>

				<div class="sl-harassment-hero__actions">
					<button
						type="button"
						class="sl-btn sl-btn--primary sl-harassment-hero__cta sl-harassment-hero__cta--primary"
						data-cta="hero-training-regions"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'training-by-region' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Explore Training by Region', 'succeedlearn-amp' ); ?>
						<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<path d="M5 12h13M13 6l6 6-6 6" />
						</svg>
					</button>

					<button
						type="button"
						class="sl-btn sl-btn--secondary sl-harassment-hero__cta sl-harassment-hero__cta--secondary"
						data-cta="hero-request-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<div class="sl-harassment-hero__visual">
				<div
					class="sl-harassment-hero__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Workplace harassment prevention training visual placeholder', 'succeedlearn-amp' ); ?>"
				>
					<div class="sl-harassment-hero__placeholder-content">
						<span
							class="sl-harassment-hero__placeholder-icon"
							aria-hidden="true"
						>
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M12 3.5 19 6v5.5c0 4.3-2.8 7.6-7 9-4.2-1.4-7-4.7-7-9V6l7-2.5Z" />
								<path d="m9 12 2 2 4-4" />
							</svg>
						</span>

						<span class="sl-harassment-hero__placeholder-title">
							<?php esc_html_e( 'Hero Image Placeholder', 'succeedlearn-amp' ); ?>
						</span>

						<span class="sl-harassment-hero__placeholder-size">
							<?php esc_html_e( 'Recommended: 720 × 760 px', 'succeedlearn-amp' ); ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>