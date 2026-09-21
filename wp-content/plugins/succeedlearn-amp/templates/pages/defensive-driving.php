<?php
/**
 * SucceedLEARN AMP — Online Defensive Driving Training for Employees.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/defensive-driving.php';

$canonical        = succeedlearn_amp_get_dd_canonical_url();
$hero_img         = succeedlearn_amp_get_dd_hero_image();
$page_title       = succeedlearn_amp_get_dd_page_title();
$meta_desc        = succeedlearn_amp_get_dd_meta_description();
$course_stats     = succeedlearn_amp_get_dd_course_stats();
$course_features  = succeedlearn_amp_get_dd_course_features();
$highlights       = succeedlearn_amp_get_dd_highlights();
$risk_cards       = succeedlearn_amp_get_dd_risk_cards();
$modules          = succeedlearn_amp_get_dd_modules();
$learning_points  = succeedlearn_amp_get_dd_learning_points();
$regions          = succeedlearn_amp_get_dd_regions();
$audience_points  = succeedlearn_amp_get_dd_audience_points();
$delivery_cards   = succeedlearn_amp_get_dd_delivery_cards();
$faq_items        = succeedlearn_amp_get_dd_faq_items();
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
		'defensive_driving',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'defensive-driving' )
	);
	?>
	.sl-dd-hero__bg{background-image:url(<?php echo esc_url( $hero_img ); ?>)}
	</style>
	<?php succeedlearn_amp_output_components( 'defensive_driving', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-dd-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/courses/defensive-driving.php
	succeedlearn_amp_dd_partial( 'hero' );
	succeedlearn_amp_dd_partial( 'highlights' );
	succeedlearn_amp_dd_partial( 'risk-overview' );
	succeedlearn_amp_dd_partial( 'curriculum' );
	succeedlearn_amp_dd_partial( 'learning' );
	succeedlearn_amp_dd_partial( 'localisation' );
	succeedlearn_amp_dd_partial( 'audience' );
	succeedlearn_amp_dd_partial( 'delivery' );
	succeedlearn_amp_dd_partial( 'faq' );
	succeedlearn_amp_dd_partial( 'cta' );
	succeedlearn_amp_dd_partial( 'contact' );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
