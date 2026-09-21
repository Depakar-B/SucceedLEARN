<?php
/**
 * SucceedLEARN AMP — Contact Us
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/contact.php';
require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/clients.php';

$canonical  = succeedlearn_amp_get_contact_canonical_url();
$hero_img   = succeedlearn_amp_get_contact_hero_image();
$page_title = succeedlearn_amp_get_contact_page_title();
$meta_desc  = succeedlearn_amp_get_contact_meta_description();

extract( succeedlearn_amp_prepare_home_clients_context(), EXTR_SKIP ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( wp_strip_all_tags( $meta_desc ) ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( succeedlearn_amp_get_favicon_url() ); ?>" />
	<title><?php echo esc_html( $page_title . ' | SucceedLEARN' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php
	succeedlearn_amp_output_page_styles(
		'contact',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'contact', 'solutions-cards' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'contact', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-contact-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/contact-us.php
	// Pass vars explicitly — partial includes run inside a function scope.
	succeedlearn_amp_contact_partial( 'hero', compact( 'hero_img' ) );
	succeedlearn_amp_contact_partial( 'form', compact( 'page_title', 'canonical' ) );
	succeedlearn_amp_contact_partial( 'stats' );
	succeedlearn_amp_contact_partial(
		'clients',
		compact( 'client_logos', 'uploads_base', 'show_view_all', 'clients_page_url' )
	);
	succeedlearn_amp_contact_partial(
		'solutions',
		array(
			'cta_href' => '#contact',
		)
	);
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
