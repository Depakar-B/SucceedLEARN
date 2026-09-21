<?php
/**
 * SucceedLEARN AMP Clients Page
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/clients.php';

$uploads_base  = content_url( '/uploads/2026/03' );
$client_logos  = succeedlearn_amp_get_client_logos();
$contact_url   = home_url( '/contact-us/' );
$show_view_all = false;
$canonical     = home_url( '/clients/' );

if ( class_exists( '\\SucceedLEARN\\AMP\\Plugin' ) ) {
	$config = \SucceedLEARN\AMP\Plugin::get_instance()->get_config();
	if ( $config && method_exists( $config, 'get_clients_url' ) ) {
		$canonical = $config->get_clients_url();
	}
}

$clients_page_url = $canonical;
$contact_amp_url  = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $contact_url ) : $contact_url;
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<link rel="shortcut icon" href="<?php echo esc_url( succeedlearn_amp_get_favicon_url() ); ?>" />
	<title><?php echo esc_html( 'Our Clients | SucceedLEARN' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php succeedlearn_amp_output_page_styles( 'clients', array( 'home-page' ), array( 'home-sections' ) ); ?>
	</style>
	<?php succeedlearn_amp_output_components( 'clients', array( 'amp-sidebar', 'amp-accordion' ) ); ?>
</head>
<body class="sl-home sl-clients-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<section class="sl-section sl-clients">
		<div class="sl-wrap" style="text-align:center">
			<p class="sl-eyebrow"><?php esc_html_e( 'Our Clients', 'succeedlearn-amp' ); ?></p>
			<h1 class="sl-h2"><?php esc_html_e( 'Trusted by Leading 60+ Organisations', 'succeedlearn-amp' ); ?></h1>
			<p class="sl-lead"><?php esc_html_e( 'Building safer, compliant, and resilient workplaces worldwide.', 'succeedlearn-amp' ); ?></p>
			<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/clients-logos.php'; ?>
			<p class="sl-clients__page-cta">
				<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $contact_amp_url ); ?>"><?php esc_html_e( 'Talk to Us', 'succeedlearn-amp' ); ?></a>
			</p>
		</div>
	</section>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
