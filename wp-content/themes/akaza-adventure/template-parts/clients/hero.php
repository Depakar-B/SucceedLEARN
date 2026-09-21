<?php
/**
 * Clients page — hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo_count = count( akaza_get_client_logos() );
?>
<section class="sl-clients-hero" aria-labelledby="sl-clients-hero-title">
	<div class="sl-clients-hero__container">
		<?php
		if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
			akaza_render_hero_breadcrumbs();
		}
		?>

		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Our Clients', 'akaza-adventure' ); ?>
		</span>

		<h1 id="sl-clients-hero-title" class="sl-clients-hero__title">
			<?php esc_html_e( 'Trusted by Leading', 'akaza-adventure' ); ?>
			<span>
				<?php
				echo esc_html(
					sprintf(
						/* translators: %d: approximate client count */
						__( '%d+ Organisations', 'akaza-adventure' ),
						max( 60, $logo_count )
					)
				);
				?>
			</span>
		</h1>

		<p class="sl-clients-hero__lead">
			<?php esc_html_e( 'Building safer, compliant, and resilient workplaces worldwide.', 'akaza-adventure' ); ?>
		</p>
	</div>
</section>
