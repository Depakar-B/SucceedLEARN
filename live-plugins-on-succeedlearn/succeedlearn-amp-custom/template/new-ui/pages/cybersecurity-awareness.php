<?php
/**
 * SucceedLEARN AMP — Cybersecurity Awareness Month.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/cybersecurity-awareness.php';

$canonical  = succeedlearn_amp_get_csa_canonical_url();
$page_title = succeedlearn_amp_get_csa_page_title();
$meta_desc  = succeedlearn_amp_get_csa_meta_description();
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( wp_strip_all_tags( $meta_desc ) ); ?>" />
	<script type="application/ld+json"><?php echo wp_json_encode( succeedlearn_amp_csa_faq_schema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
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
		'cybersecurity_awareness',
		array( 'home-page' ),
		array( 'home-sections', 'contact-form', 'landing-header', 'cybersecurity-awareness' )
	);
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'cybersecurity_awareness', array( 'amp-form', 'amp-mustache', 'amp-accordion', 'amp-bind', 'amp-lightbox' ) ); ?>
</head>
<body class="sl-home sl-csa-page<?php echo succeedlearn_amp_csa_is_uk() ? ' sl-csa-page--uk' : ''; ?>">
<?php
succeedlearn_amp_render_landing_header(
	array(
		'cta_label'  => __( 'Contact us', 'succeedlearn-amp' ),
		'cta_scroll' => 'contact',
	)
);
?>

<main id="main-content">
	<?php
	// Section order mirrors theme: template-parts/cybersecurity-awareness.php
	succeedlearn_amp_csa_partial( 'hero' );
	succeedlearn_amp_csa_partial( 'offer-strip' );
	succeedlearn_amp_csa_partial( 'offer' );
	succeedlearn_amp_csa_partial( 'campaign' );
	succeedlearn_amp_csa_partial( 'readiness' );
	succeedlearn_amp_csa_partial( 'phishcue' );
	succeedlearn_amp_csa_partial( 'integration' );
	succeedlearn_amp_csa_partial( 'pricing' );
	succeedlearn_amp_csa_partial( 'journey' );
	succeedlearn_amp_csa_partial( 'measure' );
	succeedlearn_amp_csa_partial( 'faq' );
	succeedlearn_amp_csa_partial( 'contact' );
	?>
</main>

<?php succeedlearn_amp_csa_partial( 'footer' ); ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>

