<?php
/**
 * SucceedLEARN AMP — Cybersecurity Awareness Training for BFSI & PE/VC.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/bfsi.php';

$canonical  = succeedlearn_amp_get_bfsi_canonical_url();
$page_title = succeedlearn_amp_get_bfsi_page_title();
$meta_desc  = succeedlearn_amp_get_bfsi_meta_description();
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( wp_strip_all_tags( $meta_desc ) ); ?>" />
	<script type="application/ld+json"><?php echo wp_json_encode( succeedlearn_amp_bfsi_faq_schema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
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
		'bfsi',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'breadcrumbs', 'bfsi' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'bfsi', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-carousel', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-bfsi-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/security-awareness-training-bfsi-pe-vc.php
	succeedlearn_amp_bfsi_partial( 'hero' );
	succeedlearn_amp_bfsi_partial( 'why' );
	succeedlearn_amp_bfsi_partial( 'learn' );
	succeedlearn_amp_bfsi_partial( 'risks' );
	succeedlearn_amp_bfsi_partial( 'scenarios' );
	succeedlearn_amp_bfsi_partial( 'laws' );
	succeedlearn_amp_bfsi_partial( 'structure' );
	succeedlearn_amp_bfsi_partial( 'outline' );
	succeedlearn_amp_bfsi_partial( 'action' );
	succeedlearn_amp_bfsi_partial( 'cases' );
	succeedlearn_amp_bfsi_partial( 'choose' );
	succeedlearn_amp_bfsi_partial( 'audience' );
	succeedlearn_amp_bfsi_partial( 'more' );
	succeedlearn_amp_bfsi_partial( 'faq' );
	succeedlearn_amp_bfsi_partial( 'contact' );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
