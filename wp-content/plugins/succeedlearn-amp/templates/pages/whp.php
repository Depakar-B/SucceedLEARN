<?php
/**
 * SucceedLEARN AMP: Workplace Harassment Prevention Training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/whp.php';

$canonical           = succeedlearn_amp_get_whp_canonical_url();
$page_title          = succeedlearn_amp_get_whp_page_title();
$meta_desc           = succeedlearn_amp_get_whp_meta_description();
$images              = succeedlearn_amp_get_whp_images();
$flags               = succeedlearn_amp_get_whp_flags();
$region_examples     = succeedlearn_amp_get_whp_region_examples();
$questions           = succeedlearn_amp_get_whp_questions();
$regional_training   = succeedlearn_amp_get_whp_regional_training();
$course_selection    = succeedlearn_amp_get_whp_course_selection();
$audiences           = succeedlearn_amp_get_whp_audiences();
$customisation_items = succeedlearn_amp_get_whp_customisation_items();
$delivery_options    = succeedlearn_amp_get_whp_delivery_options();
$reasons             = succeedlearn_amp_get_whp_reasons();
$prevention_items    = succeedlearn_amp_get_whp_prevention_items();
$faq_items           = succeedlearn_amp_get_whp_faq_items();

$whp_partial_args = compact(
	'canonical',
	'page_title',
	'images',
	'flags',
	'region_examples',
	'questions',
	'regional_training',
	'course_selection',
	'audiences',
	'customisation_items',
	'delivery_options',
	'reasons',
	'prevention_items',
	'faq_items'
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
		'whp',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'whp' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'whp', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-whp-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/workplace-harassment-prevention-training.php
	succeedlearn_amp_whp_partial( 'hero', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'region-specific', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'training', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'regional-training', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'course-selection', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'recognition', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'learning', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'policy-learning', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'delivery', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'why', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'prevention', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'faq', $whp_partial_args );
	succeedlearn_amp_whp_partial( 'contact', $whp_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
