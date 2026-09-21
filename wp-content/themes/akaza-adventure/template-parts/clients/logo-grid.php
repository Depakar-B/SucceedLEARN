<?php
/**
 * Clients page — full logo grid.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$client_logos = akaza_get_client_logos();
$uploads_base = akaza_get_client_logos_uploads_url();

if ( empty( $client_logos ) ) {
	return;
}
?>
<section class="sl-clients-grid-section" aria-label="<?php esc_attr_e( 'Client logos', 'akaza-adventure' ); ?>">
	<div class="sl-clients-grid-section__container">
		<div class="sl-clients-page__grid" role="list">
			<?php foreach ( $client_logos as $file => $name ) : ?>
				<div class="sl-clients-page__cell" role="listitem">
					<img
						src="<?php echo esc_url( $uploads_base . '/' . ltrim( $file, '/' ) ); ?>"
						alt="<?php echo esc_attr( $name ); ?>"
						width="140"
						height="64"
						loading="lazy"
						decoding="async"
					>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
