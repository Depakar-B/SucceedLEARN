<?php
/**
 * SucceedLEARN AMP: Private Equity and Venture Capital Suite.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/pevc.php';

$canonical         = succeedlearn_amp_get_pevc_canonical_url();
$page_title        = succeedlearn_amp_get_pevc_page_title();
$meta_desc         = succeedlearn_amp_get_pevc_meta_description();
$images            = succeedlearn_amp_get_pevc_images();
$hero_values       = succeedlearn_amp_get_pevc_hero_values();
$pricing_items     = succeedlearn_amp_get_pevc_pricing_items();
$courses           = succeedlearn_amp_get_pevc_courses();
$fcp_course        = succeedlearn_amp_get_pevc_fcp_course();
$why_items         = succeedlearn_amp_get_pevc_why_items();
$decision_steps    = succeedlearn_amp_get_pevc_decision_steps();
$audience_roles    = succeedlearn_amp_get_pevc_audience_roles();
$programme_steps   = succeedlearn_amp_get_pevc_programme_steps();
$delivery_options  = succeedlearn_amp_get_pevc_delivery_options();
$contact_benefits  = succeedlearn_amp_get_pevc_contact_benefits();
$faq_items         = succeedlearn_amp_get_pevc_faq_items();

$pevc_partial_args = compact(
	'canonical',
	'page_title',
	'images',
	'hero_values',
	'pricing_items',
	'courses',
	'fcp_course',
	'why_items',
	'decision_steps',
	'audience_roles',
	'programme_steps',
	'delivery_options',
	'contact_benefits',
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
	<script type="application/ld+json"><?php echo wp_json_encode( succeedlearn_amp_pevc_faq_schema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
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
		'pevc',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-sub-heading', 'pevc' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'pevc', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-pevc-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/pevc-compliance-training-programs.php
	succeedlearn_amp_pevc_partial( 'hero', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'pricing', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'suite', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'why-it-matters', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'decision-journey', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'image', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'audience', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'programme', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'delivery', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'faq', $pevc_partial_args );
	succeedlearn_amp_pevc_partial( 'contact', $pevc_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
