<?php
/**
 * SucceedLEARN AMP — UK Sexual Harassment Prevention Training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/uk-harassment.php';

$canonical            = succeedlearn_amp_get_uk_harassment_canonical_url();
$page_title           = succeedlearn_amp_get_uk_harassment_page_title();
$meta_desc            = succeedlearn_amp_get_uk_harassment_meta_description();
$action_points        = succeedlearn_amp_get_uk_harassment_action_points();
$prevention_points    = succeedlearn_amp_get_uk_harassment_prevention_points();
$learning_points      = succeedlearn_amp_get_uk_harassment_learning_points();
$course_topics        = succeedlearn_amp_get_uk_harassment_course_topics();
$workplace_settings   = succeedlearn_amp_get_uk_harassment_workplace_settings();
$customisation_items  = succeedlearn_amp_get_uk_harassment_customisation_items();
$faq_items            = succeedlearn_amp_get_uk_harassment_faq_items();

$uk_harassment_partial_args = compact(
	'canonical',
	'page_title',
	'action_points',
	'prevention_points',
	'learning_points',
	'course_topics',
	'workplace_settings',
	'customisation_items',
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
		'uk_sexual_harassment',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'uk-harassment' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'uk_sexual_harassment', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-uk-harassment-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/uk-sexual-harassment-prevention-training.php
	succeedlearn_amp_uk_harassment_partial( 'hero', $uk_harassment_partial_args );
	succeedlearn_amp_uk_harassment_partial( 'action', $uk_harassment_partial_args );
	succeedlearn_amp_uk_harassment_partial( 'prevention', $uk_harassment_partial_args );
	succeedlearn_amp_uk_harassment_partial( 'learning', $uk_harassment_partial_args );
	succeedlearn_amp_uk_harassment_partial( 'coverage', $uk_harassment_partial_args );
	succeedlearn_amp_uk_harassment_partial( 'settings', $uk_harassment_partial_args );
	succeedlearn_amp_uk_harassment_partial( 'customisation', $uk_harassment_partial_args );
	succeedlearn_amp_uk_harassment_partial( 'faq', $uk_harassment_partial_args );
	succeedlearn_amp_uk_harassment_partial( 'contact', $uk_harassment_partial_args );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
