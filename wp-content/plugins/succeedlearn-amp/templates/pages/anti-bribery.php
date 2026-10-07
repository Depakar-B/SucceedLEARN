<?php
/**
 * SucceedLEARN AMP: Anti-Bribery and Anti-Corruption eLearning.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/anti-bribery.php';

$canonical             = succeedlearn_amp_get_anti_bribery_canonical_url();
$page_title            = succeedlearn_amp_get_anti_bribery_page_title();
$meta_desc             = succeedlearn_amp_get_anti_bribery_meta_description();
$images                = succeedlearn_amp_get_anti_bribery_images();
$individual_features   = succeedlearn_amp_get_anti_bribery_individual_features();
$organisation_features = succeedlearn_amp_get_anti_bribery_organisation_features();
$outcomes              = succeedlearn_amp_get_anti_bribery_outcomes();
$topics                = succeedlearn_amp_get_anti_bribery_topics();
$scenario_features     = succeedlearn_amp_get_anti_bribery_scenario_features();
$scenarios             = succeedlearn_amp_get_anti_bribery_scenarios();
$journey               = succeedlearn_amp_get_anti_bribery_journey();
$delivery              = succeedlearn_amp_get_anti_bribery_delivery();
$audience              = succeedlearn_amp_get_anti_bribery_audience();
$laws                  = succeedlearn_amp_get_anti_bribery_laws();
$contact_steps         = succeedlearn_amp_get_anti_bribery_contact_steps();
$faq_items             = succeedlearn_amp_get_anti_bribery_faq_items();

$abac_partial_args = compact(
	'canonical',
	'page_title',
	'images',
	'individual_features',
	'organisation_features',
	'outcomes',
	'topics',
	'scenario_features',
	'scenarios',
	'journey',
	'delivery',
	'audience',
	'laws',
	'contact_steps',
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
		'anti_bribery',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'anti-bribery' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'anti_bribery', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-anti-bribery-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/courses/anti-bribery-anti-corruption.php
	succeedlearn_amp_anti_bribery_partial( 'hero', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'individuals', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'organisations', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'fcp-suite', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'overview', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'learning-outcomes', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'topics', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'scenarios', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'journey', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'delivery', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'audience', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'laws', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'cpd', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'faq', $abac_partial_args );
	succeedlearn_amp_anti_bribery_partial( 'contact', $abac_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
