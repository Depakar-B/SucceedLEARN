<?php
/**
 * SucceedLEARN AMP — US Sexual Harassment Prevention Training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/us-harassment.php';

$canonical            = succeedlearn_amp_get_us_harassment_canonical_url();
$page_title           = succeedlearn_amp_get_us_harassment_page_title();
$meta_desc            = succeedlearn_amp_get_us_harassment_meta_description();
$faq_items            = succeedlearn_amp_get_us_harassment_faq_items();
$coverage_items       = succeedlearn_amp_get_us_harassment_coverage_items();
$jurisdictions        = succeedlearn_amp_get_us_harassment_jurisdictions();
$employee_topics      = succeedlearn_amp_get_us_harassment_employee_topics();
$supervisor_topics    = succeedlearn_amp_get_us_harassment_supervisor_topics();
$decision_rows        = succeedlearn_amp_get_us_harassment_decision_rows();
$journey              = succeedlearn_amp_get_us_harassment_journey();
$customisation_items  = succeedlearn_amp_get_us_harassment_customisation_items();

$us_harassment_partial_args = compact(
	'canonical',
	'page_title',
	'faq_items',
	'coverage_items',
	'jurisdictions',
	'employee_topics',
	'supervisor_topics',
	'decision_rows',
	'journey',
	'customisation_items'
);
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
		'us_sexual_harassment',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'us-harassment' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'us_sexual_harassment', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-us-harassment-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/us-sexual-harassment-prevention-training.php
	succeedlearn_amp_us_harassment_partial( 'hero', $us_harassment_partial_args );
	succeedlearn_amp_us_harassment_partial( 'coverage', $us_harassment_partial_args );
	succeedlearn_amp_us_harassment_partial( 'requirements', $us_harassment_partial_args );
	succeedlearn_amp_us_harassment_partial( 'learning-paths', $us_harassment_partial_args );
	succeedlearn_amp_us_harassment_partial( 'workplace', $us_harassment_partial_args );
	succeedlearn_amp_us_harassment_partial( 'workforce', $us_harassment_partial_args );
	succeedlearn_amp_us_harassment_partial( 'faq', $us_harassment_partial_args );
	succeedlearn_amp_us_harassment_partial( 'contact', $us_harassment_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
