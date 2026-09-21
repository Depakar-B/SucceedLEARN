<?php
/**
 * Client logos grid (shared by home and contact AMP pages).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/home-client-logos-data.php';

$config           = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
$clients_list_id  = $config->resolve_page_id_by_map_key( 'clients-list' );
$clients_list_url = $clients_list_id ? elearnposh_amp_get_post_amp_url( $clients_list_id ) : elearnposh_amp_url( '/clients-list/' );
$visible_logos = array_slice( (array) $client_logos, 0, 16 );

if ( empty( $visible_logos ) ) {
	return;
}

?>
<section class="clients-section">
	<h2 class="eposh-section-title"><?php esc_html_e( 'Trusted by Leading Organizations Across India', 'elearnposh-amp' ); ?></h2>
	<p class="clients-section__lead"><?php esc_html_e( 'From startups to large enterprises, teams trust us for POSH & compliance training', 'elearnposh-amp' ); ?></p>
	<div class="clients-grid" role="region" aria-label="<?php esc_attr_e( 'Client logos', 'elearnposh-amp' ); ?>">
		<?php foreach ( $visible_logos as $logo ) : ?>
			<div class="clients-logo">
				<amp-img
					src="<?php echo esc_url( $logo['src'] ); ?>"
					width="150"
					height="72"
					layout="fixed"
					alt="<?php echo esc_attr( $logo['alt'] ); ?>">
				</amp-img>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="clients-cta">
		<a class="amp-pc-btn" href="<?php echo esc_url( $clients_list_url ); ?>">
			<?php esc_html_e( 'View All Clients', 'elearnposh-amp' ); ?>
		</a>
	</div>
</section>
