<?php
/**
 * SucceedLEARN AMP — Global Workplace Compliance Training for Employees.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/gwct.php';

$canonical          = succeedlearn_amp_get_gwct_canonical_url();
$hero_img           = succeedlearn_amp_get_gwct_hero_image();
$page_title         = succeedlearn_amp_get_gwct_page_title();
$meta_desc          = succeedlearn_amp_get_gwct_meta_description();
$behaviour_modules  = succeedlearn_amp_get_gwct_behaviour_modules();
$solutions          = succeedlearn_amp_get_gwct_solutions();
$why_choose_cards   = succeedlearn_amp_get_gwct_why_choose_cards();
$impact_themes      = succeedlearn_amp_get_gwct_impact_themes();
$faq_items          = succeedlearn_amp_get_gwct_faq_items();
$testimonials       = succeedlearn_amp_get_gwct_testimonials();

extract( succeedlearn_amp_prepare_gwct_clients_context(), EXTR_SKIP ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
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
		'global_workplace_compliance',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'gwct' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'global_workplace_compliance', array( 'amp-form', 'amp-mustache', 'amp-sidebar', 'amp-accordion', 'amp-bind' ) ); ?>
</head>
<body class="sl-home sl-gwct-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content">
	<?php
	succeedlearn_amp_gwct_partial( 'hero' );
	succeedlearn_amp_gwct_partial( 'stats' );
	succeedlearn_amp_gwct_partial( 'clients' );
	succeedlearn_amp_gwct_partial( 'behaviour' );
	succeedlearn_amp_gwct_partial( 'cta' );
	succeedlearn_amp_gwct_partial( 'solutions' );
	succeedlearn_amp_gwct_partial( 'why-choose' );
	succeedlearn_amp_gwct_partial( 'impact' );
	succeedlearn_amp_gwct_partial( 'testimonials' );
	succeedlearn_amp_gwct_partial( 'faq' );
	succeedlearn_amp_gwct_partial( 'contact' );
	?>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
