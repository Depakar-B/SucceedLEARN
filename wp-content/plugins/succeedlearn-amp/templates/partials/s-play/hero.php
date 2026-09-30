<?php
/**
 * S-Play AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_sp_page_title();

$hero_image = function_exists( 'succeedlearn_amp_get_sp_hero_image' )
	? succeedlearn_amp_get_sp_hero_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Gamified-Security-Awareness-Training.webp';
?>
<section class="sl-s-play-hero" aria-labelledby="sl-s-play-hero-title">
	<div class="sl-wrap">
		<?php
		if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
			succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
		}
		?>
		<div class="sl-s-play-hero__grid">
			<div class="sl-s-play-hero__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Play', 'succeedlearn-amp' ); ?></span>
				<h1 id="sl-s-play-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
				<h2 class="sl-hero-h2 sl-s-play-hero__subheading">
					<?php esc_html_e( 'Turn Cybersecurity Learning Into an Experience Employees Want to Engage With', 'succeedlearn-amp' ); ?>
				</h2>
				<p><?php esc_html_e( 'Traditional cybersecurity awareness training can establish essential knowledge, but maintaining employee attention and reinforcing that knowledge over time can be challenging.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'S-Play, the gamified learning solution within the SucceedLEARN Security Behaviour & Culture Suite (SBCS), transforms cybersecurity awareness into an interactive learning experience through security games, challenges and decision-based activities.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Employees actively apply what they know, make security decisions and reinforce important cybersecurity concepts in a format designed to encourage participation and make learning memorable.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'For organisations, S-Play provides a structured way to select, schedule, deliver and monitor gamified security awareness campaigns across the workforce.', 'succeedlearn-amp' ); ?></p>
				<p><strong><?php esc_html_e( 'Play. Learn. Reinforce Secure Behaviour.', 'succeedlearn-amp' ); ?></strong></p>
				<div class="sl-hero-actions sl-s-play-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="hero-trial"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request Demo', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>
			<div class="sl-s-play-hero__media">
				<div class="sl-s-play-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Gamified Security Awareness Training', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
