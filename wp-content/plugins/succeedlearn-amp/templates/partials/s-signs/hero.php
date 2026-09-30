<?php
/**
 * S-Signs AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = ! empty( $page_title )
	? $page_title
	: succeedlearn_amp_get_ss_page_title();

$hero_image = function_exists( 'succeedlearn_amp_get_ss_hero_image' )
	? succeedlearn_amp_get_ss_hero_image()
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/S-Signs-Posters-Digital-Reminders.webp';
?>
<section class="sl-s-signs-hero" aria-labelledby="sl-s-signs-hero-title">
	<div class="sl-wrap">
		<?php
		if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
			succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
		}
		?>
		<div class="sl-s-signs-hero__grid">
			<div class="sl-s-signs-hero__content">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Signs', 'succeedlearn-amp' ); ?></span>
				<h1 id="sl-s-signs-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
				<h2 class="sl-hero-h2 sl-s-signs-hero__subheading">
					<?php esc_html_e( 'Keep Cybersecurity Visible. Reinforce Secure Behaviour Every Day', 'succeedlearn-amp' ); ?>
				</h2>
				<p><?php esc_html_e( 'Security awareness is most effective when important messages remain visible long after formal training ends.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'Employees make security-related decisions throughout their working day — opening emails, handling information, using devices, working remotely, interacting with systems and responding to suspicious activity.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'S-Signs is the visual reinforcement solution within the SucceedLEARN Security Behaviour & Culture Suite, providing organisations with a growing library of professionally designed cybersecurity awareness posters, digital security reminders and behavioural nudges.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'From phishing and password security to remote working, AI security and mobile-device safety, S-Signs helps organisations keep cybersecurity visible across offices, hybrid workplaces and remote teams through clear, memorable visual communication.', 'succeedlearn-amp' ); ?></p>
				<p><strong><?php esc_html_e( 'See It. Remember It. Act Securely.', 'succeedlearn-amp' ); ?></strong></p>
				<div class="sl-hero-actions sl-s-signs-hero__actions">
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
			<div class="sl-s-signs-hero__media">
				<div class="sl-s-signs-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="800"
						height="600"
						layout="responsive"
						alt="<?php esc_attr_e( 'S-Signs posters and digital reminders', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
