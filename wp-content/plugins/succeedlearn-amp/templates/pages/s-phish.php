<?php
/**
 * SucceedLEARN AMP: S-Phish Phishing Simulation Tool.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/s-phish.php';

$canonical         = succeedlearn_amp_get_s_phish_canonical_url();
$page_title        = succeedlearn_amp_get_s_phish_page_title();
$meta_desc         = succeedlearn_amp_get_s_phish_meta_description();
$images            = succeedlearn_amp_get_s_phish_images();
$works_steps       = succeedlearn_amp_get_s_phish_works_steps();
$campaign_types    = succeedlearn_amp_get_s_phish_campaign_types();
$report_items      = succeedlearn_amp_get_s_phish_report_items();
$security_items    = succeedlearn_amp_get_s_phish_security_items();
$phishcue_features = succeedlearn_amp_get_s_phish_phishcue_features();
$teams             = succeedlearn_amp_get_s_phish_teams();
$comparison_rows   = succeedlearn_amp_get_s_phish_comparison_rows();
$why_choose        = succeedlearn_amp_get_s_phish_why_choose();
$faq_items         = succeedlearn_amp_get_s_phish_faq_items();

$s_phish_partial_args = compact(
	'canonical',
	'page_title',
	'images',
	'works_steps',
	'campaign_types',
	'report_items',
	'security_items',
	'phishcue_features',
	'teams',
	'comparison_rows',
	'why_choose',
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
		's_phish',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'global-sbcs', 's-phish' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 's_phish', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox', 'amp-youtube' ) ); ?>
</head>
<body class="sl-home sl-s-phish-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/s-phish-phishing-simulation.php
	succeedlearn_amp_s_phish_partial( 'hero', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'why', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'learning', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'meet', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'works', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'targeting', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'reporting', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'how-secure', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'phishcue', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'why-choose', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'security-teams', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'suite', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'comparison', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'faq', $s_phish_partial_args );
	succeedlearn_amp_s_phish_partial( 'contact', $s_phish_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
