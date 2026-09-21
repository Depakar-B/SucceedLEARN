<?php
/**
 * Cybersecurity Awareness Month AMP - Hero.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-cyber-awareness-hero"
	aria-labelledby="sl-cyber-awareness-hero-title"
>
	<div class="sl-wrap">
		<div class="sl-cyber-awareness-hero__grid">

			<div class="sl-cyber-awareness-hero__content">
				<span class="sl-eyebrow sl-home-sub-heading">
					<?php esc_html_e( 'Unbelievable Offer for October 2026', 'succeedlearn-amp' ); ?>
				</span>

				<h1 id="sl-cyber-awareness-hero-title">
					<?php
					if ( succeedlearn_amp_csa_is_uk() ) {
						esc_html_e( 'Cyber Security Awareness Month ', 'succeedlearn-amp' );
					} else {
						esc_html_e( 'Cybersecurity Awareness Month ', 'succeedlearn-amp' );
					}
					?>
					<span><?php esc_html_e( 'October 2026', 'succeedlearn-amp' ); ?></span>
				</h1>

				<h2 class="sl-cyber-awareness-hero__tagline">
					<?php
					esc_html_e(
						'Train your people. Test their readiness. Strengthen your human firewall.',
						'succeedlearn-amp'
					);
					?>
				</h2>

				<p class="sl-cyber-awareness-hero__description">
					<?php
					echo esc_html( succeedlearn_amp_get_csa_meta_description() );
					?>
				</p>

				<div class="sl-cyber-awareness-hero__actions">
					<button
						type="button"
						class="sl-btn sl-btn--primary sl-cyber-awareness-hero__cta sl-cyber-awareness-hero__cta--primary"
						data-cta="hero-offer"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'pricing' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php
						echo wp_kses(
							__( 'Claim the <span class="sl-csa-oct-tag">October</span> Offer', 'succeedlearn-amp' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						);
						?>
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
						class="sl-btn sl-btn--secondary sl-cyber-awareness-hero__cta sl-cyber-awareness-hero__cta--secondary"
						data-cta="hero-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Book a Demo', 'succeedlearn-amp' ); ?>
					</button>
				</div>
			</div>

			<div class="sl-cyber-awareness-hero__visual">
				<div class="sl-cyber-awareness-hero__image">
					<amp-img
						src="<?php echo esc_url( succeedlearn_amp_get_csa_hero_image() ); ?>"
						width="1200"
						height="900"
						layout="responsive"
						alt="<?php echo esc_attr( succeedlearn_amp_csa_is_uk() ? __( 'October Cyber Security Awareness: measurable action', 'succeedlearn-amp' ) : __( 'October Cybersecurity Awareness: measurable action', 'succeedlearn-amp' ) ); ?>"
					></amp-img>
				</div>
			</div>

		</div>
	</div>
</section>
