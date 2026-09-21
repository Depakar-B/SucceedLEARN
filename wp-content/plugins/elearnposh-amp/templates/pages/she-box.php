<?php
/**
 * SHe-Box guide page (AMP).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';
require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/she-box-helpers.php';

$theme_she_box_helpers = get_stylesheet_directory() . '/she-box-helpers.php';
if ( is_readable( $theme_she_box_helpers ) ) {
	require_once $theme_she_box_helpers;
}

global $redux_builder_amp;

$config  = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
$post_id = absint( get_the_ID() );
if ( ! $post_id ) {
	$post_id = $config->resolve_page_id_by_map_key( 'she-box' );
}
$post_body_class = 'post-' . $post_id;

$she_box_page_url = function_exists( 'elearnposh_get_she_box_page_url' )
	? elearnposh_get_she_box_page_url()
	: elearnposh_amp_get_she_box_page_url();
$posh_act_page_url = function_exists( 'elearnposh_get_posh_act_page_url' )
	? elearnposh_get_posh_act_page_url()
	: ( $config->resolve_page_id_by_map_key( 'posh-act' ) ? get_permalink( $config->resolve_page_id_by_map_key( 'posh-act' ) ) : home_url( '/posh-act/' ) );

$she_box_title = __( 'SHe-Box: Workplace Sexual Harassment Complaint Portal', 'elearnposh-amp' );
$wp_page_title = $post_id ? get_the_title( $post_id ) : '';
if ( ! empty( $wp_page_title ) ) {
	$she_box_title = $wp_page_title;
}
if ( function_exists( 'elearnposh_normalize_she_box_text' ) ) {
	$she_box_title = elearnposh_normalize_she_box_text( $she_box_title );
}

$she_box_toc = elearnposh_amp_she_box_page_toc();

$she_box_schema = array(
	'@context' => 'https://schema.org',
	'@graph'   => array(
		array(
			'@type'       => 'WebPage',
			'@id'         => $she_box_page_url . '#webpage',
			'url'         => $she_box_page_url,
			'name'        => $she_box_title,
			'description' => 'Complete guide to SHe-Box (Sexual Harassment electronic Box): filing complaints, organisation registration, nodal officers, state-wise requirements, and employer responsibilities under the POSH Act.',
			'isPartOf'    => array(
				'@type' => 'WebSite',
				'@id'   => home_url( '/#website' ),
				'url'   => home_url( '/' ),
				'name'  => get_bloginfo( 'name' ),
			),
			'inLanguage'  => 'en-IN',
		),
		array(
			'@type'            => 'Article',
			'@id'              => $she_box_page_url . '#article',
			'headline'         => $she_box_title,
			'url'              => $she_box_page_url,
			'mainEntityOfPage' => array( '@id' => $she_box_page_url . '#webpage' ),
			'author'           => array(
				'@type' => 'Organization',
				'name'  => get_bloginfo( 'name' ),
				'url'   => home_url( '/' ),
			),
			'publisher'        => array(
				'@type' => 'Organization',
				'name'  => get_bloginfo( 'name' ),
				'url'   => home_url( '/' ),
			),
			'inLanguage'       => 'en-IN',
		),
		array(
			'@type'           => 'BreadcrumbList',
			'@id'             => $she_box_page_url . '#breadcrumb',
			'itemListElement' => array(
				array(
					'@type'    => 'ListItem',
					'position' => 1,
					'name'     => 'Home',
					'item'     => home_url( '/' ),
				),
				array(
					'@type'    => 'ListItem',
					'position' => 2,
					'name'     => 'POSH Act',
					'item'     => $posh_act_page_url,
				),
				array(
					'@type'    => 'ListItem',
					'position' => 3,
					'name'     => 'SHe-Box',
					'item'     => $she_box_page_url,
				),
			),
		),
	),
);
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( $she_box_title ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		html {
			scroll-padding-top: 200px;
		}

		#topofthepage {
			scroll-margin-top: 0;
		}
		body.she-box-amp-body {
			font-family: 'Nunito Sans', Arial, sans-serif;
			margin: 0;
			padding: 100px 0 0;
			background: #f6f9fd;
			color: #0d2238;
		}
		body.she-box-amp-body a {
			color: inherit;
		}
		.amp-content-wrapper--she-box {
			margin: 0;
			padding: 0;
			width: 100%;
		}
		@media (max-width: 640px) {
			body.she-box-amp-body {
				padding-top: 90px;
			}
		}
		<?php
		elearnposh_amp_output_page_styles( 'she-box', array(), array( 'contact-form', 'posh-act-page', 'she-box-page' ) );
		?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $she_box_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'she-box', array( 'amp-form', 'amp-mustache', 'amp-youtube', 'amp-accordion' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class . ' she-box-amp-body posh-act-amp-body' ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper amp-content-wrapper--she-box">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
		<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/she-box-main.php'; ?>
	</div>
	<a
		class="pa-connect-fab"
		href="#pa-guide-contact-mobile"
		aria-label="<?php esc_attr_e( 'Need help with POSH training or SHe-Box compliance? Let us connect', 'elearnposh-amp' ); ?>"
	><?php esc_html_e( "Let's Connect", 'elearnposh-amp' ); ?></a>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
