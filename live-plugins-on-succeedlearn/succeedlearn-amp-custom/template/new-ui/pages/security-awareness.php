<?php
/**
 * SucceedLEARN AMP — Security Awareness & Behaviour Culture Suite.
 *
 * New-UI variant for succeedlearn-amp-custom (live).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/security-awareness.php';

$canonical        = succeedlearn_amp_get_sa_canonical_url();
$page_title       = succeedlearn_amp_get_sa_page_title();
$meta_desc        = succeedlearn_amp_get_sa_meta_description();
$platform_img     = succeedlearn_amp_get_sa_platform_image();
$suite_products   = succeedlearn_amp_get_sa_suite_products();
$behaviour_steps  = succeedlearn_amp_get_sa_behaviour_steps();
$achieve_items    = succeedlearn_amp_get_sa_achieve_items();
$leadership_items = succeedlearn_amp_get_sa_leadership_items();
$audience_items   = succeedlearn_amp_get_sa_audience_items();
$process_items    = succeedlearn_amp_get_sa_process_items();
$comparison_items = succeedlearn_amp_get_sa_comparison_items();
$activity_values  = succeedlearn_amp_get_sa_activity_values();
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( wp_strip_all_tags( $meta_desc ) ); ?>" />
	<script type="application/ld+json"><?php echo wp_json_encode( succeedlearn_amp_sa_faq_schema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
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
		'security_awareness',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'menu', 'breadcrumbs', 'footer', 'security-awareness' )
	);
	?>
	</style>
	<?php
	succeedlearn_amp_output_components(
		'security_awareness',
		array( 'amp-form', 'amp-mustache', 'amp-accordion', 'amp-bind', 'amp-lightbox', 'amp-sidebar', 'amp-carousel' )
	);
	?>
</head>
<body class="sl-home sl-sap-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	succeedlearn_amp_sa_partial( 'hero' );
	succeedlearn_amp_sa_partial( 'platform' );
	succeedlearn_amp_sa_partial( 'suite' );
	succeedlearn_amp_sa_partial( 'behaviour' );
	succeedlearn_amp_sa_partial( 'lifecycle' );
	succeedlearn_amp_sa_partial( 'achieve' );
	succeedlearn_amp_sa_partial( 'leadership' );
	succeedlearn_amp_sa_partial( 'annual-training' );
	succeedlearn_amp_sa_partial( 'process' );
	succeedlearn_amp_sa_partial( 'comparison' );
	succeedlearn_amp_sa_partial( 'faq' );
	succeedlearn_amp_sa_partial( 'contact' );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php
if ( function_exists( 'succeedlearn_amp_render_fixed_widgets' ) ) {
	succeedlearn_amp_render_fixed_widgets();
}
?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
