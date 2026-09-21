<?php
/**
 * POSH Act reference page (AMP).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';
require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/posh-act-helpers.php';

$theme_she_box_helpers = get_stylesheet_directory() . '/she-box-helpers.php';
if ( is_readable( $theme_she_box_helpers ) ) {
	require_once $theme_she_box_helpers;
}
$she_box_page_url = function_exists( 'elearnposh_get_she_box_page_url' )
	? elearnposh_get_she_box_page_url()
	: elearnposh_amp_get_she_box_page_url();

global $redux_builder_amp;

$config  = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
$post_id = absint( get_the_ID() );
if ( ! $post_id ) {
	$post_id = $config->resolve_page_id_by_map_key( 'posh-act' );
}
$post_body_class   = 'post-' . $post_id;
$posh_act_page_url   = get_permalink( $post_id ) ?: home_url( '/posh-act/' );
$posh_act_hero_title = __( 'All you need to know about POSH Act', 'elearnposh-amp' );
$wp_page_title     = $post_id ? get_the_title( $post_id ) : '';
if ( ! empty( $wp_page_title ) ) {
	$posh_act_hero_title = $wp_page_title;
}

$brochure_source_url = 'https://elearnposh.com/eLearnPOSH-Brochure.pdf';
$brochure_url        = esc_url( $brochure_source_url );
$posh_act_toc        = elearnposh_amp_posh_act_page_toc();

$posh_act_schema = array(
	'@context' => 'https://schema.org',
	'@graph'   => array(
		array(
			'@type'            => 'WebPage',
			'@id'              => $posh_act_page_url . '#webpage',
			'url'              => $posh_act_page_url,
			'name'             => $posh_act_hero_title,
			'description'      => 'Complete guide to the POSH Act (Sexual Harassment of Women at Workplace Act, 2013): compliance, definitions, complaint procedure, redressal, confidentiality, and employer duties in India.',
			'isPartOf'         => array(
				'@type' => 'WebSite',
				'@id'   => home_url( '/#website' ),
				'url'   => home_url( '/' ),
				'name'  => get_bloginfo( 'name' ),
			),
			'inLanguage'       => 'en-IN',
			'about'            => array(
				'@type'         => 'Legislation',
				'name'          => 'Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013',
				'alternateName' => 'POSH Act',
			),
		),
		array(
			'@type'            => 'Article',
			'@id'              => $posh_act_page_url . '#article',
			'headline'         => $posh_act_hero_title,
			'url'              => $posh_act_page_url,
			'mainEntityOfPage' => array( '@id' => $posh_act_page_url . '#webpage' ),
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
			'articleSection'   => array(
				'Compliance to POSH Act',
				'Definitions',
				'Features',
				'Complaining Procedure',
				'Redressal Process',
				'Confidentiality',
				'Appeal',
				'Background of POSH Act',
			),
		),
		array(
			'@type'           => 'BreadcrumbList',
			'@id'             => $posh_act_page_url . '#breadcrumb',
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
					'name'     => $posh_act_hero_title,
					'item'     => $posh_act_page_url,
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
	<title><?php echo esc_html( $posh_act_hero_title ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		html {
			scroll-padding-top: calc(var(--pa-header-offset, 88px) + 1rem);
		}

		#topofthepage {
			scroll-margin-top: 0;
		}
		body.posh-act-amp-body {
			font-family: 'Nunito Sans', Arial, sans-serif;
			margin: 0;
			padding: 100px 0 0;
			background: #f6f9fd;
			color: #0d2238;
		}
		body.posh-act-amp-body a {
			color: inherit;
		}
		body.posh-act-amp-body .pa-mobile-nav a,
		body.posh-act-amp-body #posh-act-toc-accordion a {
			color: #0d73d4;
		}
		.amp-content-wrapper--posh-act {
			margin: 0;
			padding: 0;
			width: 100%;
		}
		@media (max-width: 640px) {
			body.posh-act-amp-body {
				padding-top: 90px;
			}
		}
		<?php
		elearnposh_amp_output_page_styles( 'posh-act', array(), array( 'contact-form', 'posh-act-page' ) );
		?>
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $posh_act_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'posh-act', array( 'amp-form', 'amp-mustache', 'amp-youtube', 'amp-accordion' ) ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class . ' posh-act-amp-body' ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper amp-content-wrapper--posh-act">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
		<?php
		ob_start();
		include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/posh-act-main.php';
		echo elearnposh_amp_posh_act_prepare_content( ob_get_clean() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	</div>
	<a
		class="pa-connect-fab"
		href="#pa-guide-contact-mobile"
		aria-label="<?php esc_attr_e( 'Need help with POSH compliance? Let us connect', 'elearnposh-amp' ); ?>"
	><?php esc_html_e( "Let's Connect", 'elearnposh-amp' ); ?></a>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
