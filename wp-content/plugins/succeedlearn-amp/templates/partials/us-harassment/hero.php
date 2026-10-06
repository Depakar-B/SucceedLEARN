<?php
/**
 * AMP partial — US Sexual Harassment Prevention Training — hero.
 *
 * Wide hero image placement matches AML course AMP hero.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$images = function_exists( 'succeedlearn_amp_get_us_harassment_images' )
	? succeedlearn_amp_get_us_harassment_images()
	: array();
$hero_image = isset( $images['hero'] ) ? $images['hero'] : '';
?>
<section class="sl-section sl-us-harassment-hero" aria-labelledby="sl-us-harassment-hero-title">
	<div class="sl-wrap">
		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'US Sexual Harassment Prevention Training', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-us-harassment-hero-title">
			<?php esc_html_e( 'USA ', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'Sexual Harassment Prevention Training', 'succeedlearn-amp' ); ?></span>
			<span class="sl-us-harassment-hero__audience">
				<?php esc_html_e( 'for Employees and Supervisors', 'succeedlearn-amp' ); ?>
			</span>
		</h1>

		<?php if ( $hero_image ) : ?>
			<div class="sl-us-harassment-hero__media">
				<div class="sl-us-harassment-hero__image sl-us-harassment-hero__image--wide">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="1600"
						height="900"
						layout="responsive"
						alt="<?php esc_attr_e( 'Diverse professionals in a workplace training session for US sexual harassment prevention.', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		<?php endif; ?>

		<h2 class="sl-us-harassment-hero__tagline">
			<?php esc_html_e( 'Train your people for the responsibilities they carry', 'succeedlearn-amp' ); ?>
		</h2>

		<div class="sl-us-harassment-hero__copy">
			<p>
				<?php
				esc_html_e(
					'An employee receives an inappropriate message. A witness is unsure whether to intervene. A supervisor hears a concern during a one-to-one conversation. Each person needs practical guidance, but their responsibilities are not the same.',
					'succeedlearn-amp'
				);
				?>
			</p>
			<p>
				<?php
				esc_html_e(
					"SucceedLEARN’s online US Sexual Harassment Prevention Training provides separate learning paths for employees and supervisors. The courses explain federal principles, workplace expectations and selected state and local requirements through clear examples, scenarios and knowledge checks.",
					'succeedlearn-amp'
				);
				?>
			</p>
			<p>
				<?php
				esc_html_e(
					'Assign training according to where employees work, whether they supervise others and the requirements that apply to your organization.',
					'succeedlearn-amp'
				);
				?>
			</p>
			<p>
				<?php
				esc_html_e(
					'Recognize the conduct. Understand the responsibility. Know what to do next.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</div>

		<div class="sl-hero-actions sl-us-harassment-hero__actions">
			<button
				type="button"
				class="sl-hero-btn sl-hero-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
		</div>
	</div>
</section>
