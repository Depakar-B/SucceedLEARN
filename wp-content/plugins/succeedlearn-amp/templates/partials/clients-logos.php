<?php
/**
 * Client logo grid markup.
 *
 * Expected vars:
 * - $client_logos (array<string,string>) filename => label
 * - $uploads_base (string) uploads base URL ending without trailing slash preferred
 * - $show_view_all (bool) whether to render the View all CTA (when clients page exists)
 * - $clients_page_url (string) destination for View all
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $client_logos ) || ! is_array( $client_logos ) ) {
	return;
}

$uploads_base     = isset( $uploads_base ) ? untrailingslashit( (string) $uploads_base ) : untrailingslashit( content_url( '/uploads/2026/03' ) );
$show_view_all    = ! empty( $show_view_all );
$clients_page_url = ! empty( $clients_page_url ) ? $clients_page_url : home_url( '/clients/' );
?>
<div class="sl-clients__grid" role="list">
	<?php foreach ( $client_logos as $file => $name ) : ?>
		<div class="sl-clients__cell" role="listitem">
			<amp-img
				src="<?php echo esc_url( $uploads_base . '/' . ltrim( $file, '/' ) ); ?>"
				width="140"
				height="64"
				layout="responsive"
				alt="<?php echo esc_attr( $name ); ?>"
			></amp-img>
		</div>
	<?php endforeach; ?>
</div>
<?php if ( $show_view_all ) : ?>
	<div class="sl-clients__cta">
		<a class="sl-btn sl-btn--primary sl-clients__view-all" href="<?php echo esc_url( $clients_page_url ); ?>">
			<?php esc_html_e( 'View All Clients', 'succeedlearn-amp' ); ?>
		</a>
	</div>
<?php endif; ?>
