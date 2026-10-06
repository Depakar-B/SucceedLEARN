<?php
/**
 * SucceedLEARN AMP — Whistleblowing Training for PE/VC.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/whistleblowing-pe-vc.php';

$canonical             = succeedlearn_amp_get_whistleblowing_pe_vc_canonical_url();
$page_title            = succeedlearn_amp_get_whistleblowing_pe_vc_page_title();
$meta_desc             = succeedlearn_amp_get_whistleblowing_pe_vc_meta_description();
$images                = succeedlearn_amp_get_whistleblowing_pe_vc_images();
$individual_features   = succeedlearn_amp_get_whistleblowing_pe_vc_individual_features();
$organisation_features = succeedlearn_amp_get_whistleblowing_pe_vc_organisation_features();
$designed_features     = succeedlearn_amp_get_whistleblowing_pe_vc_designed_features();
$audiences             = succeedlearn_amp_get_whistleblowing_pe_vc_audiences();
$misconduct_items      = succeedlearn_amp_get_whistleblowing_pe_vc_misconduct_items();
$course_slides         = succeedlearn_amp_get_whistleblowing_pe_vc_course_slides();
$regulatory_frameworks = succeedlearn_amp_get_whistleblowing_pe_vc_regulatory_frameworks();
$faq_items             = succeedlearn_amp_get_whistleblowing_pe_vc_faq_items();

$whistleblowing_partial_args = compact(
	'canonical',
	'page_title',
	'images',
	'individual_features',
	'organisation_features',
	'designed_features',
	'audiences',
	'misconduct_items',
	'course_slides',
	'regulatory_frameworks',
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
		'whistleblowing_pe_vc',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'whistleblowing-pe-vc' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'whistleblowing_pe_vc', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-whistleblowing-pe-vc-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/courses/whistleblowing-pe-vc.php
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'hero', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'individuals', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'organisations', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'pevc-suite', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'cpd', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'overview', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'designed', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'audience', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'misconduct', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'course', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'regulatory', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'faq', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'cta', $whistleblowing_partial_args );
	succeedlearn_amp_whistleblowing_pe_vc_partial( 'contact', $whistleblowing_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
