<?php
/**
 * SucceedLEARN AMP: SMCR Training for PE/VC.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/smcr-pe-vc.php';

$canonical              = succeedlearn_amp_get_smcr_pe_vc_canonical_url();
$page_title             = succeedlearn_amp_get_smcr_pe_vc_page_title();
$meta_desc              = succeedlearn_amp_get_smcr_pe_vc_meta_description();
$images                 = succeedlearn_amp_get_smcr_pe_vc_images();
$individual_features    = succeedlearn_amp_get_smcr_pe_vc_individual_features();
$organisation_features  = succeedlearn_amp_get_smcr_pe_vc_organisation_features();
$role_courses           = succeedlearn_amp_get_smcr_pe_vc_role_courses();
$employees_learning     = succeedlearn_amp_get_smcr_pe_vc_employees_learning_areas();
$conduct_rule_scenarios = succeedlearn_amp_get_smcr_pe_vc_conduct_rule_scenarios();
$senior_managers_learning = succeedlearn_amp_get_smcr_pe_vc_senior_managers_learning_areas();
$accountability_points  = succeedlearn_amp_get_smcr_pe_vc_accountability_points();
$course_selection       = succeedlearn_amp_get_smcr_pe_vc_course_selection();
$regulators             = succeedlearn_amp_get_smcr_pe_vc_regulators();
$evc_cards              = succeedlearn_amp_get_smcr_pe_vc_evc_cards();
$faq_items              = succeedlearn_amp_get_smcr_pe_vc_faq_items();

$smcr_partial_args = compact(
	'canonical',
	'page_title',
	'images',
	'individual_features',
	'organisation_features',
	'role_courses',
	'employees_learning',
	'conduct_rule_scenarios',
	'senior_managers_learning',
	'accountability_points',
	'course_selection',
	'regulators',
	'evc_cards',
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
		'smcr_pe_vc',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'smcr-pe-vc' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'smcr_pe_vc', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-smcr-pe-vc-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/courses/smcr-pe-vc.php
	succeedlearn_amp_smcr_pe_vc_partial( 'hero', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'individuals', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'organisations', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'pevc-suite', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'cpd', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'about', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'courses', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'employees', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'conduct-rules', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'senior-managers', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'accountability', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'course-selection', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'regulatory-context', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'practical-learning', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'evc-learning', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'faq', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'cta', $smcr_partial_args );
	succeedlearn_amp_smcr_pe_vc_partial( 'contact', $smcr_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
