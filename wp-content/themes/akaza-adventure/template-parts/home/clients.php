<?php
/**
 * Homepage — Clients / trusted-by logo carousel.
 *
 * Left intro stays static; right side scrolls as a dual-row marquee (both rows right → left).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$uploads_base = akaza_get_client_logos_uploads_url();
$marquee      = akaza_get_client_logos_marquee_rows();
$row_one      = $marquee['row_one'];
$row_two      = $marquee['row_two'];

/**
 * Render one logo list (JS duplicates the set for a seamless loop).
 *
 * @param array  $clients      Filename => label map.
 * @param string $row_id       Accessible label id suffix.
 * @param string $uploads_base Uploads base URL.
 */
$render_row = static function ( $clients, $row_id, $uploads_base ) {
	?>
	<ul class="slf-clients__logos" data-clients-set="<?php echo esc_attr( $row_id ); ?>">
		<?php foreach ( $clients as $file => $name ) : ?>
			<li class="slf-clients__logo">
				<img
					src="<?php echo esc_url( $uploads_base . '/' . ltrim( $file, '/' ) ); ?>"
					alt="<?php echo esc_attr( $name ); ?>"
					width="150"
					height="64"
					loading="eager"
					decoding="async"
				>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
};
?>
<section class="slf-clients" aria-labelledby="clients-heading" data-clients-carousel>
	<div class="slf-clients__layout">
		<div class="slf-clients__intro">
			<h2 id="clients-heading" class="slf-clients__title">
				Trusted by Leading <span>700+</span> Organisations
			</h2>
			<p class="slf-clients__sub">Building safer, compliant, and resilient workplaces worldwide.</p>
			<a class="sl-content-btn sl-content-btn-primary" href="<?php echo esc_url( akaza_page_url( 'clients' ) ); ?>">
				<?php esc_html_e( 'View all clients', 'akaza-adventure' ); ?>
			</a>
		</div>

		<div class="slf-clients__carousel" role="region" aria-label="<?php esc_attr_e( 'Client logos', 'akaza-adventure' ); ?>">
			<div class="slf-clients__row" data-clients-row data-direction="left">
				<div class="slf-clients__track" data-clients-track>
					<?php $render_row( $row_one, 'one', $uploads_base ); ?>
				</div>
			</div>
			<div class="slf-clients__row" data-clients-row data-direction="left">
				<div class="slf-clients__track" data-clients-track>
					<?php $render_row( $row_two, 'two', $uploads_base ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
