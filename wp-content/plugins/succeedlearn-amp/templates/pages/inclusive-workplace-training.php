<?php
/**
 * SucceedLEARN AMP — Inclusive Workplace Training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/inclusive-workplace-training.php';

$canonical  = succeedlearn_amp_get_iwt_canonical_url();
$page_title = succeedlearn_amp_get_iwt_page_title();
$meta_desc  = succeedlearn_amp_get_iwt_meta_description();
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
		'inclusive_workplace_training',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'inclusive-workplace-training' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'inclusive_workplace_training', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-inclusive-training-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/inclusive-workplace-training.php
	succeedlearn_amp_iwt_partial( 'hero' );
	succeedlearn_amp_iwt_partial( 'stats' );
	succeedlearn_amp_iwt_partial( 'clients' );
	succeedlearn_amp_iwt_partial( 'modules-overview' );
	succeedlearn_amp_iwt_partial( 'what-is-inclusive' );
	succeedlearn_amp_iwt_partial( 'why-training' );
	succeedlearn_amp_iwt_partial( 'courses' );
	succeedlearn_amp_iwt_partial( 'choose-training' );
	succeedlearn_amp_iwt_partial( 'customise' );
	succeedlearn_amp_iwt_partial( 'global-workforce' );
	succeedlearn_amp_iwt_partial( 'followthrough' );
	succeedlearn_amp_iwt_partial( 'faq' );
	succeedlearn_amp_iwt_partial( 'cta' );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
