<?php
/**
 * SucceedLEARN AMP: Gifts and Entertainment Training for PE/VC Professionals.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/gifts-and-entertainment.php';

$canonical             = succeedlearn_amp_get_gifts_and_entertainment_canonical_url();
$page_title            = succeedlearn_amp_get_gifts_and_entertainment_page_title();
$meta_desc             = succeedlearn_amp_get_gifts_and_entertainment_meta_description();
$images                = succeedlearn_amp_get_gifts_and_entertainment_images();
$individual_features   = succeedlearn_amp_get_gifts_and_entertainment_individual_features();
$organisation_features = succeedlearn_amp_get_gifts_and_entertainment_organisation_features();
$risk_items            = succeedlearn_amp_get_gifts_and_entertainment_risk_items();
$decision_consider     = succeedlearn_amp_get_gifts_and_entertainment_decision_consider();
$decision_avoid        = succeedlearn_amp_get_gifts_and_entertainment_decision_avoid();
$outcomes              = succeedlearn_amp_get_gifts_and_entertainment_outcomes();
$audience              = succeedlearn_amp_get_gifts_and_entertainment_audience();
$high_risk_cards       = succeedlearn_amp_get_gifts_and_entertainment_high_risk_cards();
$legal_context         = succeedlearn_amp_get_gifts_and_entertainment_legal_context();
$faq_items             = succeedlearn_amp_get_gifts_and_entertainment_faq_items();

$gifts_partial_args = compact(
	'canonical',
	'page_title',
	'images',
	'individual_features',
	'organisation_features',
	'risk_items',
	'decision_consider',
	'decision_avoid',
	'outcomes',
	'audience',
	'high_risk_cards',
	'legal_context',
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
		'gifts_and_entertainment',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-course-suite', 'global-sub-heading', 'gifts-and-entertainment' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'gifts_and_entertainment', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-gifts-and-entertainment-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/courses/gifts-and-entertainment.php
	succeedlearn_amp_gifts_and_entertainment_partial( 'hero', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'individuals', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'organisations', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'pevc-suite', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'cpd', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'overview', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'risk', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'decisions', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'learning-outcomes', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'target-audience', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'high-risk', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'legal-context', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'practical-elearning', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'faq', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'cta', $gifts_partial_args );
	succeedlearn_amp_gifts_and_entertainment_partial( 'contact', $gifts_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
