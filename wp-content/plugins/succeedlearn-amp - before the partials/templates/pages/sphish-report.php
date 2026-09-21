<?php
/**
 * SucceedLEARN AMP — S-PhishReport
 *
 * Layout: heading → description → TOC → content
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$canonical = home_url( '/s-phish-report/' );
$page      = get_page_by_path( 's-phish-report' );
if ( $page instanceof WP_Post ) {
	$canonical = get_permalink( $page );
}

$home_amp = function_exists( 'succeedlearn_amp_url' ) ? succeedlearn_amp_url( home_url( '/' ) ) : home_url( '/' );
$lead     = __( 'Privacy Policy and Terms of Use for the S-PhishReport Google Add-On, provided by Succeed Technologies Pvt Ltd.', 'succeedlearn-amp' );

$toc_items = array(
	array( 'id' => 'introduction', 'title' => __( '1. Introduction', 'succeedlearn-amp' ) ),
	array( 'id' => 'overview', 'title' => __( '2. Overview', 'succeedlearn-amp' ) ),
	array( 'id' => 'key-features', 'title' => __( '3. Key Features', 'succeedlearn-amp' ) ),
	array( 'id' => 'permissions-and-scopes', 'title' => __( '4. Permissions and Scopes', 'succeedlearn-amp' ) ),
	array( 'id' => 'data-privacy-and-security', 'title' => __( '5. Data Privacy and Security', 'succeedlearn-amp' ) ),
	array( 'id' => 'admin-configuration', 'title' => __( '6. Admin Configuration and Deployment', 'succeedlearn-amp' ) ),
	array( 'id' => 'use-of-data', 'title' => __( '7. Use of Data', 'succeedlearn-amp' ) ),
	array( 'id' => 'changes-to-policy', 'title' => __( '8. Changes to This Policy', 'succeedlearn-amp' ) ),
	array( 'id' => 'disclaimer', 'title' => __( '9. Disclaimer', 'succeedlearn-amp' ) ),
);

$sections = function_exists( 'get_theme_file_path' )
	? get_theme_file_path( 'template-parts/s-phish-report/sections.php' )
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
	<title><?php echo esc_html( 'S-PhishReport | SucceedLEARN' ); ?></title>
	<link rel="preconnect" href="https://cdn.ampproject.org" />
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
	<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php
	succeedlearn_amp_output_page_styles( 'sphish_report', array( 'home-page' ), array( 'home-sections' ) );
	$legal_css = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'styles/sl-legal-amp.css';
	if ( is_readable( $legal_css ) ) {
		echo file_get_contents( $legal_css ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped,WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	}
	?>
	</style>
	<?php succeedlearn_amp_output_components( 'sphish_report', array( 'amp-sidebar', 'amp-accordion' ) ); ?>
</head>
<body class="sl-home sl-legal-amp-page">
<?php include SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<main id="main-content" class="sl-legal-amp">
	<div class="sl-wrap sl-legal-amp__wrap">

		<nav class="sl-legal-amp__crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'succeedlearn-amp' ); ?>">
			<a href="<?php echo esc_url( $home_amp ); ?>"><?php esc_html_e( 'Home', 'succeedlearn-amp' ); ?></a>
			<span aria-hidden="true"> / </span>
			<span><?php esc_html_e( 'S-PhishReport', 'succeedlearn-amp' ); ?></span>
		</nav>

		<header class="sl-legal-amp__hero">
			<p class="sl-legal-amp__eyebrow"><?php esc_html_e( 'Legal', 'succeedlearn-amp' ); ?></p>
			<h1><?php esc_html_e( 'S-PhishReport', 'succeedlearn-amp' ); ?></h1>
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
