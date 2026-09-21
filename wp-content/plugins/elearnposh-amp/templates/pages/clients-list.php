<?php
/**
 * Clients List Page Template (AMP)
 *
 * Page ID: 23486
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_client_data = get_stylesheet_directory() . '/partials/clients-list-logos-data.php';
if ( is_readable( $theme_client_data ) ) {
	// Logo categories are stored on $GLOBALS inside the data file.
	require $theme_client_data;
}

$all_logos  = function_exists( 'ep_get_clients_list_logos_flat' ) ? ep_get_clients_list_logos_flat() : array();
$logo_count = count( $all_logos );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php esc_html_e( 'Clients', 'elearnposh-amp' ); ?> - eLearnPOSH</title>
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>
		<?php
		elearnposh_amp_output_page_styles( 'clients', array(), array( 'clients-page', 'page-hero-subtitle' ) );
		?>
	</style>

	<?php
	foreach ( array_slice( $all_logos, 0, 12 ) as $logo ) {
		echo '<link rel="preload" as="image" href="' . esc_url( $logo['src'] ) . '">';
	}
	?>

	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'home' ); ?>
</head>
<body>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

	<div class="amp-content-wrapper">
		<div class="clients-page-container">
			<?php elearnposh_amp_render_breadcrumbs(); ?>
			<header class="clients-page-hero">
				<h1 class="clients-page-title"><?php esc_html_e( 'Our Clients', 'elearnposh-amp' ); ?></h1>
				<p class="clients-page-subtitle ep-page-hero__subtitle">
					<?php
					printf(
						/* translators: %d: number of client organizations */
						esc_html__( 'Trusted by %d leading organizations across India for POSH and workplace compliance training.', 'elearnposh-amp' ),
						(int) $logo_count
					);
					?>
				</p>
			</header>

			<?php
			$ep_clients_use_amp = true;
			require get_stylesheet_directory() . '/partials/clients-list-sections.php';
			?>
		</div>
	</div>

	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
	<?php do_action( 'amp_post_template_footer' ); ?>
</body>
</html>
