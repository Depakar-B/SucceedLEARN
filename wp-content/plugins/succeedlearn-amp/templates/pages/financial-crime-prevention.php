<?php
/**
 * SucceedLEARN AMP — Financial Crime Prevention.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/financial-crime-prevention.php';

$canonical  = succeedlearn_amp_get_fcp_canonical_url();
$page_title = succeedlearn_amp_get_fcp_page_title();
$meta_desc  = succeedlearn_amp_get_fcp_meta_description();
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
		'financial_crime_prevention',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'financial-crime-prevention' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'financial_crime_prevention', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-fcp-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/financial-crime-prevention.php
	succeedlearn_amp_fcp_partial( 'hero' );
	succeedlearn_amp_fcp_partial( 'page-guide' );
	succeedlearn_amp_fcp_partial( 'what-is-financial-crime' );
	succeedlearn_amp_fcp_partial( 'why-it-matters' );
	succeedlearn_amp_fcp_partial( 'online-employee-training' );
	succeedlearn_amp_fcp_partial( 'six-core-course-areas' );
	succeedlearn_amp_fcp_partial( 'training-at-a-glance' );
	succeedlearn_amp_fcp_partial( 'training-by-role' );
	succeedlearn_amp_fcp_partial( 'flexible-implementation' );
	succeedlearn_amp_fcp_partial( 'cpd' );
	succeedlearn_amp_fcp_partial( 'faq' );
	succeedlearn_amp_fcp_partial( 'contact' );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
