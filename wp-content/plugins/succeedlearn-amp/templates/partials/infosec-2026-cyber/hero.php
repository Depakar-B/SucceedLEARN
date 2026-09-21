<?php
/**
 * Infosec Cybersecurity Awareness Month 2026 AMP - Hero.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-infosec-2026-cyber-hero"
	aria-labelledby="sl-infosec-2026-cyber-hero-title"
>
	<div class="sl-wrap">
		<div class="sl-infosec-2026-cyber-hero__head">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php
				esc_html_e(
					'Limited-period campaign',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h1 id="sl-infosec-2026-cyber-hero-title">
				<?php
				echo wp_kses_post(
					__(
						'Cybersecurity Awareness Month <span>2026</span>',
						'succeedlearn-amp'
					)
				);
				?>
			</h1>
		</div>

		<div class="sl-infosec-2026-cyber-hero__grid">
			<div class="sl-infosec-2026-cyber-hero__content">
				<h2 class="sl-infosec-2026-cyber-hero__tagline">
					<?php
					esc_html_e(
						'Don’t Just Train Your Employees. Test Their Cyber Readiness.',
						'succeedlearn-amp'
					);
					?>
				</h2>

				<div class="sl-infosec-2026-cyber-hero__intro">
					<p>
						<?php
						esc_html_e(
							'Your employees are one of your organization’s most important lines of defense.',
							'succeedlearn-amp'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'But phishing attacks are becoming harder to recognize. AI-assisted emails, impersonation, social engineering and increasingly convincing fraudulent communications mean that knowing about phishing isn’t always enough.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</div>

				<p class="sl-infosec-2026-cyber-hero__hook">
					<?php
					echo wp_kses(
						__(
							'The real question:<br>what happens when the <strong>phishing email actually arrives?</strong>',
							'succeedlearn-amp'
						),
						array(
							'br'     => array(),
							'strong' => array(),
						)
					);
					?>
				</p>

				<p class="sl-infosec-2026-cyber-hero__closing">
					<?php
					esc_html_e(
						'This Cybersecurity Awareness Month gives your employees the opportunity to put their awareness into practice through a controlled phishing simulation and gives your organization measurable insight into how prepared your workforce really is.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<div class="sl-infosec-2026-cyber-hero__actions">
					<button
						type="button"
						class="sl-btn sl-btn--primary sl-infosec-2026-cyber-hero__cta sl-infosec-2026-cyber-hero__cta--primary"
						data-cta="hero-request-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Be a part of the cyber readiness challenge', 'succeedlearn-amp' ); ?>

						<svg
							viewBox="0 0 24 24"
							aria-hidden="true"
							focusable="false"
						>
							<path d="M5 12h13M13 6l6 6-6 6" />
						</svg>
					</button>

					<button
						type="button"
						class="sl-btn sl-btn--secondary sl-infosec-2026-cyber-hero__cta sl-infosec-2026-cyber-hero__cta--secondary"
						data-cta="hero-view-terms"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'terms-and-conditions' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'View Terms', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<div class="sl-infosec-2026-cyber-hero__media">
				<div class="sl-infosec-2026-cyber-hero__image">
					<amp-img
						src="<?php echo esc_url( succeedlearn_amp_get_infosec_hero_image() ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Cybersecurity Awareness Month 2026', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
