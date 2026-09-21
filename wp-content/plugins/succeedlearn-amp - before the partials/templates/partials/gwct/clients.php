<?php
/**
 * GWCT AMP — Clients section.
 *
 * Expected vars: $client_logos, $uploads_base, $show_view_all, $clients_page_url
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-clients">
	<div class="sl-wrap" style="text-align:center">
		<h2 class="sl-h2 sl-clients__title"><?php echo wp_kses_post( __( 'Trusted by Leading <span>700+</span> Organisations', 'succeedlearn-amp' ) ); ?></h2>
		<p class="sl-lead"><?php esc_html_e( 'Building safer, compliant, and resilient workplaces worldwide.', 'succeedlearn-amp' ); ?></p>
		<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/clients-logos.php'; ?>
	</div>
</section>
