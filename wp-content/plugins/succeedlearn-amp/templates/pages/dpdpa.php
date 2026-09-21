<?php
/**
 * SucceedLEARN AMP — DPDPA Compliance Training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/dpdpa.php';

$canonical  = succeedlearn_amp_get_dpdpa_canonical_url();
$page_title = succeedlearn_amp_get_dpdpa_page_title();
$meta_desc  = succeedlearn_amp_get_dpdpa_meta_description();
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
		'dpdpa',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'dpdpa' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'dpdpa', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-dpdpa-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/dpdpa-compliance-training.php
	succeedlearn_amp_dpdpa_partial( 'hero' );
	succeedlearn_amp_dpdpa_partial( 'trusted' );
	succeedlearn_amp_dpdpa_partial( 'breach-scenario' );
	succeedlearn_amp_dpdpa_partial( 'course-coverage' );
	succeedlearn_amp_dpdpa_partial( 'learning' );
	succeedlearn_amp_dpdpa_partial( 'pricing' );
	succeedlearn_amp_dpdpa_partial( 'scorecard-cta' );
	succeedlearn_amp_dpdpa_partial( 'training-records' );
	succeedlearn_amp_dpdpa_partial( 'format-delivery' );
	succeedlearn_amp_dpdpa_partial( 'faq' );
	succeedlearn_amp_dpdpa_partial( 'contact' );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
