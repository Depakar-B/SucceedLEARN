<?php
/**
 * SucceedLEARN AMP — Thank You
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical   = home_url( '/thank-you/' );
$contact_url = home_url( '/contact-us/' );
foreach ( array( 'thank-you', 'thankyou' ) as $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			$canonical = $link;
			break;
		}
	}
}

$home_amp    = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( home_url( '/' ) ) : home_url( '/' );
$contact_amp = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( $contact_url ) : $contact_url;
$lead        = __( 'Thanks for getting in touch — we will respond shortly.', 'succeedlearn-amp' );
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
	<meta name="description" content="<?php echo esc_attr( wp_strip_all_tags( $lead ) ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( succeedlearn_amp_get_favicon_url() ); ?>" />
	<title><?php echo esc_html( 'Thank You | SucceedLEARN' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php
	succeedlearn_amp_output_page_styles( 'thankyou', array( 'home-page' ), array( 'home-sections' ) );
	$legal_css = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'styles/sl-legal-amp.css';
	if ( is_readable( $legal_css ) ) {
		echo file_get_contents( $legal_css ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped,WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	}
	?>
	.sl-thankyou-panel{margin:24px 0 0;padding:28px 24px;border:1px solid rgba(22,35,78,.1);border-radius:16px;background:#fff;text-align:center}
	.sl-thankyou-panel .sl-cta-buttons{justify-content:center;margin-top:18px}
	</style>
	<?php succeedlearn_amp_output_components( 'thankyou', array( 'amp-sidebar' ) ); ?>
</head>
<body class="sl-home sl-legal-amp-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content" class="sl-legal-amp">
	<div class="sl-wrap sl-legal-amp__wrap">

		<nav class="sl-legal-amp__crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'succeedlearn-amp' ); ?>">
			<a href="<?php echo esc_url( $home_amp ); ?>"><?php esc_html_e( 'Home', 'succeedlearn-amp' ); ?></a>
			<span aria-hidden="true"> / </span>
			<span><?php esc_html_e( 'Thank You', 'succeedlearn-amp' ); ?></span>
		</nav>

		<header class="sl-legal-amp__hero">
			<p class="sl-legal-amp__eyebrow"><?php esc_html_e( 'SucceedLEARN', 'succeedlearn-amp' ); ?></p>
			<h1><?php esc_html_e( 'Thank You', 'succeedlearn-amp' ); ?></h1>
			<p class="sl-legal-amp__lead"><?php echo esc_html( $lead ); ?></p>
		</header>

		<div class="sl-thankyou-panel">
			<p><?php esc_html_e( 'Your message has been received. A member of our team will get back to you as soon as possible.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-cta-buttons">
				<a class="sl-btn sl-btn--primary" href="<?php echo esc_url( $home_amp ); ?>"><?php esc_html_e( 'Back to Home', 'succeedlearn-amp' ); ?></a>
				<a class="sl-btn sl-btn--secondary" href="<?php echo esc_url( $contact_amp ); ?>"><?php esc_html_e( 'Contact Us', 'succeedlearn-amp' ); ?></a>
			</div>
		</div>

	</div>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
