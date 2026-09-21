<?php
/**
 * SucceedLEARN AMP — Privacy Policy
 *
 * Layout: heading → description → TOC → content
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical = home_url( '/privacy-policy/' );
$page      = get_page_by_path( 'privacy-policy' );
if ( $page instanceof WP_Post ) {
	$canonical = get_permalink( $page );
}

$home_amp = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( home_url( '/' ) ) : home_url( '/' );
$lead     = __( 'How SucceedLEARN collects, uses, and protects your personal information when you visit our website, purchase or subscribe to our courses, enrol in training programs, or interact with our platform.', 'succeedlearn-amp' );

$toc_items = array(
	array( 'id' => 'introduction', 'title' => __( '1. Introduction', 'succeedlearn-amp' ) ),
	array( 'id' => 'information-we-collect', 'title' => __( '2. Information We Collect', 'succeedlearn-amp' ) ),
	array( 'id' => 'how-we-collect', 'title' => __( '3. How We Collect Information', 'succeedlearn-amp' ) ),
	array( 'id' => 'how-we-use', 'title' => __( '4. How We Use Your Information', 'succeedlearn-amp' ) ),
	array( 'id' => 'cookies', 'title' => __( '5. Cookies', 'succeedlearn-amp' ) ),
	array( 'id' => 'data-security', 'title' => __( '6. Data Security', 'succeedlearn-amp' ) ),
	array( 'id' => 'third-party', 'title' => __( '7. Third-Party Access and Disclosure', 'succeedlearn-amp' ) ),
	array( 'id' => 'data-retention', 'title' => __( '8. Data Retention Policy', 'succeedlearn-amp' ) ),
	array( 'id' => 'international-transfer', 'title' => __( '10. International Data Transfers', 'succeedlearn-amp' ) ),
	array( 'id' => 'representative', 'title' => __( '11. Representative', 'succeedlearn-amp' ) ),
	array( 'id' => 'user-rights', 'title' => __( '12. User Rights and Controls', 'succeedlearn-amp' ) ),
	array( 'id' => 'policy-updates', 'title' => __( '13. Policy Updates', 'succeedlearn-amp' ) ),
	array( 'id' => 'contact-us', 'title' => __( '14. Contact Us', 'succeedlearn-amp' ) ),
);

$sections = function_exists( 'get_theme_file_path' )
	? get_theme_file_path( 'template-parts/privacy-policy/sections.php' )
	: '';
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
	<title><?php echo esc_html( 'Privacy Policy | SucceedLEARN' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php
	succeedlearn_amp_output_page_styles( 'privacy', array( 'home-page' ), array( 'home-sections' ) );
	$legal_css = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'styles/sl-legal-amp.css';
	if ( is_readable( $legal_css ) ) {
		echo file_get_contents( $legal_css ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped,WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	}
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'privacy', array( 'amp-sidebar', 'amp-accordion' ) ); ?>
</head>
<body class="sl-home sl-legal-amp-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content" class="sl-legal-amp">
	<div class="sl-wrap sl-legal-amp__wrap">

		<nav class="sl-legal-amp__crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'succeedlearn-amp' ); ?>">
			<a href="<?php echo esc_url( $home_amp ); ?>"><?php esc_html_e( 'Home', 'succeedlearn-amp' ); ?></a>
			<span aria-hidden="true"> / </span>
			<span><?php esc_html_e( 'Privacy Policy', 'succeedlearn-amp' ); ?></span>
		</nav>

		<header class="sl-legal-amp__hero">
			<p class="sl-legal-amp__eyebrow"><?php esc_html_e( 'Legal', 'succeedlearn-amp' ); ?></p>
			<h1><?php esc_html_e( 'Privacy Policy', 'succeedlearn-amp' ); ?></h1>
			<p class="sl-legal-amp__lead"><?php echo esc_html( $lead ); ?></p>
		</header>

		<nav class="sl-legal-amp__toc" aria-labelledby="sl-legal-amp-toc-title">
			<h2 id="sl-legal-amp-toc-title" class="sl-legal-amp__toc-title"><?php esc_html_e( 'On this page', 'succeedlearn-amp' ); ?></h2>
			<ol class="sl-legal-amp__toc-list">
				<?php foreach ( $toc_items as $item ) : ?>
					<li>
						<?php if ( function_exists( 'succeedlearn_amp_scroll_tap_attr' ) ) : ?>
							<button
								type="button"
								class="sl-legal-amp__toc-link"
								<?php echo succeedlearn_amp_scroll_tap_attr( $item['id'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							><?php echo esc_html( $item['title'] ); ?></button>
						<?php else : ?>
							<a class="sl-legal-amp__toc-link" href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</nav>

		<div class="sl-legal-amp__body">
			<?php
			if ( $sections && is_readable( $sections ) ) {
				include $sections;
			}
			?>
		</div>

	</div>
</main>

<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>
