<?php
/**
 * HTML Site Map Page Template (AMP)
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ep_get_html_sitemap_sections' ) ) {
	$ep_sitemap_helper = get_stylesheet_directory() . '/lib/ep-sitemap-page.php';
	if ( is_readable( $ep_sitemap_helper ) ) {
		require_once $ep_sitemap_helper;
	}
}

require ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/amp-page-shell-start.php';

global $redux_builder_amp;

$post_id         = absint( get_the_ID() );
$post_body_class = 'post-' . $post_id;
$page_permalink  = get_permalink( $post_id ) ?: home_url( '/site-map/' );
$page_title      = get_the_title( $post_id ) ?: __( 'Site Map', 'elearnposh-amp' );

$sitemap_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'WebPage',
	'name'        => $page_title,
	'description' => __( 'Browse key pages on eLearnPOSH.com.', 'elearnposh-amp' ),
	'url'         => $page_permalink,
	'inLanguage'  => get_bloginfo( 'language' ),
	'publisher'   => array(
		'@type' => 'Organization',
		'name'  => 'eLearnPOSH',
		'url'   => home_url( '/' ),
	),
);
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php echo esc_html( $page_title ); ?> - eLearnPOSH</title>
	<link rel="dns-prefetch" href="https://cdn.ampproject.org" />
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		body{font-family:'Nunito Sans',Arial,sans-serif;margin:0;padding:0;padding-top:100px !important;background:#f6f9fd;color:#0f172a}
	<?php elearnposh_amp_output_optimized_css( 'course', array( 'menu', 'footer' ) ); ?>
	.pfe{--bg:#fff;--text:#0d2238;--muted:#54708d;--line:#d9e6f6;--container:min(1290px,100%);background:var(--bg);color:var(--text);font-family:"Inter","Segoe UI",Arial,sans-serif;overflow-x:hidden;padding:0 0 22px}
	.pfe *{box-sizing:border-box}.pfe-wrap{width:var(--container);margin:0 auto}
	.pfe-hero,.pfe-section{padding:18px 16px}
	.pfe-hero{background:radial-gradient(900px 460px at 0% 0%,rgba(47,144,239,.14),transparent 70%),#fff}
	.pfe-hero h1{margin:0 0 10px;font-size:clamp(1.85rem,1.2rem + 2.2vw,3rem);line-height:1.12}
	.pfe-sub{margin:0;color:var(--muted);font-size:16px;line-height:1.75}
	.pfe-sitemap-grid{display:grid;grid-template-columns:1fr;gap:16px}
	.pfe-sitemap-col{background:#fff;border:1px solid rgba(20,114,186,.12);border-radius:14px;padding:18px 16px;box-shadow:0 8px 24px rgba(11,35,58,.06)}
	.pfe-sitemap-col h2{margin:0 0 12px;font-size:1.05rem;color:var(--text);font-weight:700}
	.pfe-sitemap-col ul{margin:0;padding:0;list-style:none}
	.pfe-sitemap-col li{margin:0 0 8px}
	.pfe-sitemap-col a{color:#0d73d4;text-decoration:underline;font-size:15px;line-height:1.5}
	@media (min-width:641px){.pfe-hero,.pfe-section{padding:24px 20px}.pfe-sitemap-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
	@media (min-width:992px){.pfe-sitemap-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
	</style>
	<script type="application/ld+json"><?php echo elearnposh_amp_encode_page_schema_json_ld( $sitemap_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
	<?php elearnposh_amp_output_components( 'course' ); ?>
</head>
<body class="<?php echo esc_attr( $post_body_class ); ?>">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>
	<div class="amp-content-wrapper">
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
		<main class="pfe">
			<section class="pfe-hero">
				<div class="pfe-wrap">
				<?php elearnposh_amp_render_breadcrumbs(); ?>
					<h1><?php echo esc_html( $page_title ); ?></h1>
					<p class="pfe-sub"><?php esc_html_e( 'Browse key pages, solutions, resources, and legal information on eLearnPOSH.com.', 'elearnposh-amp' ); ?></p>
				</div>
			</section>
			<section class="pfe-section">
				<div class="pfe-wrap pfe-sitemap-grid">
					<?php if ( function_exists( 'ep_get_html_sitemap_sections' ) ) : ?>
						<?php foreach ( ep_get_html_sitemap_sections() as $section ) : ?>
							<div class="pfe-sitemap-col">
								<h2><?php echo esc_html( $section['title'] ); ?></h2>
								<ul>
									<?php foreach ( $section['links'] as $link ) : ?>
										<li><a href="<?php echo esc_url( $link[1] ); ?>"><?php echo esc_html( $link[0] ); ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</section>
		</main>
	</div>
	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>
