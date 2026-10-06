<?php
/**
 * AMP partial — UK Sexual Harassment Prevention Training — hero.
 *
 * Stacked: copy + CTA, then wide hero image.
 *
 * Expected vars: $page_title
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$images     = function_exists( 'succeedlearn_amp_get_uk_harassment_images' )
	? succeedlearn_amp_get_uk_harassment_images()
	: array();
$hero_image = isset( $images['hero'] ) ? $images['hero'] : '';
?>
<section
	id="hero"
	class="sl-section sl-uk-harassment-hero"
	aria-labelledby="sl-uk-harassment-hero-title"
>
	<div class="sl-wrap">
		<?php
		if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
			succeedlearn_amp_render_hero_breadcrumbs(
				! empty( $page_title )
					? $page_title
					: __( 'UK Sexual Harassment Prevention Training', 'succeedlearn-amp' )
			);
		}
		?>

		<span class="sl-eyebrow sl-home-sub-heading">
			<?php esc_html_e( 'Clear expectations. Confident decisions. Safer workplaces', 'succeedlearn-amp' ); ?>
		</span>

		<h1 id="sl-uk-harassment-hero-title">
			<?php esc_html_e( 'UK ', 'succeedlearn-amp' ); ?>
			<span><?php esc_html_e( 'Sexual Harassment Prevention Training', 'succeedlearn-amp' ); ?></span>
		</h1>

		<h2 class="sl-uk-harassment-hero__tagline">
			<?php esc_html_e( 'A respectful workplace starts with knowing what to do', 'succeedlearn-amp' ); ?>
		</h2>

		<div class="sl-uk-harassment-hero__copy">
			<p>
				<?php esc_html_e( 'Preventing sexual harassment requires more than publishing a policy. Workers need to understand the standards expected of them and feel confident responding when something does not seem right.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( "SucceedLEARN's UK Preventing Sexual Harassment Training turns an important workplace responsibility into focused, accessible online learning.", 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Created for workers in England, Scotland and Wales, the course supports organisations seeking to strengthen awareness and reinforce a proactive approach to prevention.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-hero-actions sl-uk-harassment-hero__actions">
			<button
				type="button"
				class="sl-hero-btn sl-hero-btn-primary"
				data-cta="uk-harassment-hero-demo"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
		</div>

		<?php if ( $hero_image ) : ?>
			<div class="sl-uk-harassment-hero__media">
				<div class="sl-uk-harassment-hero__image sl-uk-harassment-hero__image--wide">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="1600"
						height="900"
						layout="responsive"
						alt="<?php esc_attr_e( 'UK professionals in a workplace training session on sexual harassment prevention.', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
